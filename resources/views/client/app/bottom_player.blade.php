<div class="bg-info-subtle py-2 d-none player{{ $obj->id }}">
    <div class="container-xl">
        <div class="text-center d-none">
            <audio src="" id="audio" controls></audio>
        </div>
        <div class="text-center">
            <a href="#" class="text-decoration-none trackShowUrl{{ $obj->id }}">
                <span class="d-none d-md-inline artistName{{ $obj->id }}"></span> <span class="d-none d-md-inline"> - </span> <span class="trackName{{ $obj->id }}"></span>
            </a>
        </div>
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-3">
                <img src="" class="img-fluid rounded-circle albumImage{{ $obj->id }}" style="width: 100px; height: 100px">
            </div>
            <div class="col-6">
                <div class="progress mt-2 progressContainer{{ $obj->id }}">
                    <div class="progress-bar bg-black progressBar" role="progressbar" style="width: 0%"
                         aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex">
                    <div class="me-auto currentTime">0:00</div>
                    <div class="ms-auto totalDuration">0:00</div>
                </div>
            </div>
            <div class="col-3">
                <div class="d-block d-md-flex">
                    <div class="col-4 ms-auto me-auto">
                        <button class="btn btn-danger bi bi-skip-backward-btn prevButton{{ $obj->id }}"></button>
                    </div>
                    <div class="col-4 ms-auto me-auto">
                        <button class="btn btn-danger bi bi-play-btn playPauseButton{{$obj->id}}" onclick="togglePlayPause('{{$obj->id}}', '{{ asset('storage/' . $obj->mp3_path) }}')"></button>
                    </div>
                    <div class="col-4 ms-auto me-auto">
                        <button class="btn btn-danger bi bi-skip-forward-btn nextButton{{ $obj->id }}"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<script>
    const audioElement = document.getElementById('audio');
    const trackShowUrl = document.getElementById('trackShowUrl');
    const artistName = document.getElementById('artistName');
    const trackName = document.getElementById('trackName');
    const trackImg = document.getElementById('trackImg');
    const progressBar = document.getElementById('progressBar');
    const progressContainer = document.getElementById('progressContainer');
    const currentTimeSpan = document.getElementById('currentTime');
    const totalDurationSpan = document.getElementById('totalDuration');
    const prevBtn = document.getElementById('prevButton');
    const playPauseBtn = document.getElementById('playPauseButton');
    const nextBtn = document.getElementById('nextButton');
    let currentIndex = 0;
    let tracks = [];
    let isPlaying = false;

    prevBtn.addEventListener('click', prevButtonClick);
    playPauseBtn.addEventListener('click', playPauseClick);
    nextBtn.addEventListener('click', nextButtonClick);

    audioElement.addEventListener('timeupdate', updateTimeAndProgressBar);
    audioElement.addEventListener('ended', nextButtonClick);

    progressContainer.addEventListener('click', updatePlaybackTimeOnClick);

    fetch('http://music.test/api/v1/tracks')
        .then(response => response.json())
        .then(data => {
            tracks = data.tracks;
            updateAudioAndImageSource();
            updateArtistAndTrackName();
            console.log(tracks);
        })
        .catch(error => console.error('Error:', error));

    function updateArtistAndTrackName() {
        if (tracks.length > 0) {
            artistName.textContent = tracks[currentIndex].artist.name;
            trackName.textContent = tracks[currentIndex].name;
            trackShowUrl.setAttribute('href', 'http://music.test/tracks/' + tracks[currentIndex].id)
        } else {
            console.error('No tracks available.');
        }
    }

    function prevButtonClick() {
        if (currentIndex > 0) {
            currentIndex--;
            isPlaying = true;
            playPauseBtn.classList.remove('bi-play-btn');
            playPauseBtn.classList.add('bi-pause-btn');
            updateAudioAndImageSource();
            updateArtistAndTrackName();
        } else {
            currentIndex = tracks.length - 1;
            isPlaying = true;
            playPauseBtn.classList.remove('bi-play-btn');
            playPauseBtn.classList.add('bi-pause-btn');
            updateAudioAndImageSource();
            updateArtistAndTrackName();
        }
    }

    function nextButtonClick() {
        if (currentIndex < tracks.length - 1) {
            currentIndex++;
            isPlaying = true;
            playPauseBtn.classList.remove('bi-play-btn');
            playPauseBtn.classList.add('bi-pause-btn');
            trackImg.classList.add('spinning');
            updateAudioAndImageSource();
            updateArtistAndTrackName();
        } else {
            currentIndex = 0;
            isPlaying = true;
            trackImg.classList.remove('spinning');
            playPauseBtn.classList.remove('bi-play-btn');
            playPauseBtn.classList.add('bi-pause-btn');
            updateAudioAndImageSource();
            updateArtistAndTrackName();
        }
    }

    function playPauseClick() {
        if (audioElement.paused) {
            audioElement.play();
            isPlaying = true;
            playPauseBtn.classList.remove('bi-play-btn');
            playPauseBtn.classList.add('bi-pause-btn');
            trackImg.classList.add('spinning')
        } else {
            audioElement.pause();
            isPlaying = false;
            trackImg.classList.remove('spinning')
            playPauseBtn.classList.remove('bi-pause-btn');
            playPauseBtn.classList.add('bi-play-btn');
        }
    }

    function updateAudioAndImageSource() {
        if (tracks.length > 0) {
            audioElement.src = tracks[currentIndex].mp3_path;
            trackImg.src = tracks[currentIndex].image;
            audioElement.load();
            if (isPlaying) {
                audioElement.play();
            }
        } else {
            console.error('No tracks available.');
        }
    }

    function updateTimeAndProgressBar() {
        const currentTime = formatTime(audioElement.currentTime);
        const totalDuration = formatTime(audioElement.duration);

        currentTimeSpan.textContent = currentTime;
        totalDurationSpan.textContent = totalDuration;

        const percentage = (audioElement.currentTime / audioElement.duration) * 100;
        progressBar.style.width = percentage + '%';
        progressBar.setAttribute('aria-valuenow', percentage);
        addDynamicAnimation();
    }

    function updatePlaybackTimeOnClick(event) {
        const clickX = event.clientX - progressContainer.getBoundingClientRect().left;
        const percentage = (clickX / progressContainer.offsetWidth) * 100;
        const newTime = (percentage / 100) * audioElement.duration;

        audioElement.currentTime = newTime;
        addDynamicAnimation();
    }

    function addDynamicAnimation() {
        progressBar.classList.remove('dynamic-animation');
        // Trigger reflow before adding the class to restart the animation
        void progressBar.offsetWidth;
        progressBar.classList.add('dynamic-animation');
    }

    function formatTime(timeInSeconds) {
        const minutes = Math.floor(timeInSeconds / 60);
        const seconds = Math.floor(timeInSeconds % 60);
        const formattedTime = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        return formattedTime;
    }
</script>--}}
