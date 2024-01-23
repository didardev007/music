<div class="container-xl py-1">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('tracks.index', ['newTrack' => 1]) }}" class="text-decoration-none
        link-primary">@lang('app.newTracks')
        </a>
    </div>
    <div id="newTracks-carousel" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($newTracks as $obj)
                    <li class="splide__slide">
                        @include('client.app.track')
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- JavaScript function to play/pause audio and update image animation -->
{{--
@push('scripts')
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
                    document.getElementsByClassName('albumImage' + trackId).classList.add('spinning');
                    // Change button icon to pause
                    document.getElementsByClassName('playPauseButton' + trackId).classList.remove('bi-play-btn');
                    document.getElementsByClassName('playPauseButton' + trackId).classList.add('bi-pause-btn');

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
                document.getElementsByClassName('albumImage' + currentTrackId).classList.remove('spinning');
                // Change button icon to play
                document.getElementsByClassName('playPauseButton' + currentTrackId).classList.remove('bi-pause-btn');
                document.getElementsByClassName('playPauseButton' + currentTrackId).classList.add('bi-play-btn');

                currentTrackId = null;
            }
        }

        audio.addEventListener('ended', function () {
            // Reset image animation and button icon when audio ends
            document.getElementsByClassName('albumImage' + currentTrackId).classList.remove('spinning');
            document.getElementsByClassName('playPauseButton' + currentTrackId).classList.remove('bi-pause-btn');
            document.getElementsByClassName('playPauseButton' + currentTrackId).classList.add('bi-play-btn');

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
                body: JSON.stringify({ track_id: trackId }),
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
@endpush






<style>
    /* CSS for spinning animation */
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .spinning {
        animation: spin 2s linear infinite;
    }
</style>
--}}
