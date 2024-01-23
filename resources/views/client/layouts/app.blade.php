<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/splide.min.css') }}" rel="stylesheet">
    @stack('scripts')
</head>
<body>
@include('client.app.alert')
@include('client.app.nav')
@yield('main')
@include('client.app.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
    let currentTrackId = null;
    let audio = new Audio()

    function togglePlayPause(trackId, audioPath) {
        if (currentTrackId === trackId) {
            if (audio.paused) {
                playAudio(trackId, audioPath);
            } else {
                pauseAudio();
            }
        } else {
            // New track, stop current and play new
            pauseAudio();
            playAudio(trackId, audioPath);
        }
    }

    function playAudio(trackId, audioPath) {
        console.log('Playing audio for track ' + trackId);
        audio.src = audioPath;
        audio.play()
            .then(() => {
                // Start spinning animation
                document.getElementsByClassName('albumImage' + trackId)[0].classList.add('spinning');
                // Change button icon to pause
                document.getElementsByClassName('playPauseButton' + trackId)[0].classList.remove('bi-play-btn');
                document.getElementsByClassName('playPauseButton' + trackId)[0].classList.add('bi-pause-btn');

                // Increment view count by making an asynchronous request to the server
                incrementViewCount(trackId);
            })
            .catch((error) => {
                console.error('Error playing audio:', error);
            });

        currentTrackId = trackId;
    }

    function pauseAudio() {
        if (!audio.paused) {
            console.log('Pausing audio for track ' + currentTrackId);
            audio.pause();
            // Stop spinning animation
            document.getElementsByClassName('albumImage' + currentTrackId)[0].classList.remove('spinning');
            // Change button icon to play
            document.getElementsByClassName('playPauseButton' + currentTrackId)[0].classList.remove('bi-pause-btn');
            document.getElementsByClassName('playPauseButton' + currentTrackId)[0].classList.add('bi-play-btn');

            currentTrackId = null;
        }
    }

    audio.addEventListener('ended', function () {
        // Reset image animation and button icon when audio ends
        document.getElementsByClassName('albumImage' + currentTrackId)[0].classList.remove('spinning');
        document.getElementsByClassName('playPauseButton' + currentTrackId)[0].classList.remove('bi-pause-btn');
        document.getElementsByClassName('playPauseButton' + currentTrackId)[0].classList.add('bi-play-btn');

        currentTrackId = null;
    });
</script>
<script>
    function incrementViewCount(trackId) {
        // Make an asynchronous request to the server to increment the view count
        fetch('/tracks/increment-view', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token if using Laravel
            },
            body: JSON.stringify({track_id: trackId}),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('View count incremented for track ' + trackId);
                } else {
                    console.error('Failed to increment view count for track ' + trackId);
                }
            })
            .catch(error => {
                console.error('Error incrementing view count:', error);
            });
    }
</script>
</body>
</html>
