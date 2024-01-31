let currentTrackId = 0;
let audio = new Audio();
let isPlaying = false;

audio.addEventListener('timeupdate', updateTimeAndProgressBar);

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
    console.log('Playing audio for track ' + trackId)

    fetch('http://music.test/api/v1/tracks/' + trackId)
        .then(response => response.json())
        .then(data => {
            track = data.track;
            updateAudioAndImageSource(trackId);
            updateArtistAndTrackName(trackId);
            console.log(track);
        })
        .catch(error => console.error('Error:', error));

    const player = document.getElementsByClassName('player' + trackId);
    const audioElement = document.getElementsByClassName('audio' + trackId);
    const trackShowUrl = document.getElementsByClassName('trackShowUrl' + trackId);
    const artistName = document.getElementsByClassName('artistName' + trackId);
    const trackName = document.getElementsByClassName('trackName' + trackId);
    const trackImg = document.getElementsByClassName('trackImg' + trackId);
    const progressBar = document.getElementsByClassName('progressBar' + trackId);
    const progressContainer = document.getElementsByClassName('progressContainer');
    const currentTimeSpan = document.getElementsByClassName('currentTime' + trackId);
    const totalDurationSpan = document.getElementsByClassName('totalDuration' + trackId);
    const prevBtn = document.getElementsByClassName('prevButton' + trackId);
    const playPauseBtn = document.getElementsByClassName('playPauseButton' + trackId);
    const nextBtn = document.getElementsByClassName('nextButton' + trackId);

    let playButton = document.getElementsByClassName('playPauseButton' + trackId);
    let albumImage = document.getElementsByClassName('albumImage' + trackId);

    for (const item of player) {
        item.classList.remove('d-none');
    }
    for (const item of playButton) {
        item.classList.add('bi-pause-btn');
        item.classList.remove('bi-play-btn');
        for (const itemElement of albumImage) {
            if (itemElement) {
                itemElement.classList.add('spinning');
            }
        }
    }
    // Increment view count by making an asynchronous request to the server
    incrementViewCount(trackId);

    // Set audio source and play
    audio.src = audioPath;
    audio.play()
        .then(() => {
            // Additional logic after successful audio playback if needed
        })
        .catch((error) => {
            console.error('Error playing audio:', error);
        });

    currentTrackId = trackId;
    console.log(progressContainer)
}


function pauseAudio(trackId) {
    if (!audio.paused) {
        console.log('Pausing audio for track ' + currentTrackId);
        audio.pause();

        let playButton = document.getElementsByClassName('playPauseButton' + currentTrackId);
        let albumImage = document.getElementsByClassName('albumImage' + currentTrackId);

        for (const item of playButton) {
            item.classList.remove('bi-pause-btn');
            item.classList.add('bi-play-btn');
            for (const itemElement of albumImage) {
                if (itemElement) {
                    itemElement.classList.remove('spinning');
                }
            }
        }

        currentTrackId = null;
    }
}


audio.addEventListener('ended', function () {
    // Reset image animation and button icon when audio ends
    let playButton = document.getElementsByClassName('playPauseButton' + currentTrackId);
    let albumImage = document.getElementsByClassName('albumImage' + currentTrackId);

    for (const item of playButton) {
        item.classList.remove('bi-pause-btn');
        item.classList.add('bi-play-btn');
        for (const itemElement of albumImage) {
            if (itemElement) {
                itemElement.classList.remove('spinning');
            }
        }
    }

    currentTrackId = null;
});


function incrementViewCount(trackId) {
    // Make an asynchronous request to the server to increment the view count
    $.ajax({
        url: '/tracks/increment-view', // Your Laravel route
        type: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Cache-Control': 'no-cache, no-store, must-revalidate',
            'Pragma': 'no-cache',
            'Expires': '0'
        },
        data: JSON.stringify({track_id: trackId}),
        success: function (data) {
            if (data.success) {
                console.log('View count incremented for track ' + trackId);
                console.log('Updated view count:', data.listened);
            } else {
                console.error('Failed to increment view count for track ' + trackId);
            }
        },

    });
}

function updateAudioAndImageSource(trackId) {
    let audioElement = document.getElementsByClassName('audio' + trackId);
    let albumImage = document.getElementsByClassName('albumImage' + trackId);

    for (const item of audioElement) {
        item.src = track.mp3_path;
        item.load();
        if (isPlaying) {
            item.play();
        }
    }
    for (const item of albumImage) {
        item.src = track.image;
    }
}

function updateArtistAndTrackName(trackId) {
    let trackShowUrl = document.getElementsByClassName('trackShowUrl' + trackId);
    let artistName = document.getElementsByClassName('artistName' + trackId);
    let trackName = document.getElementsByClassName('trackName' + trackId);

    for (const item of trackShowUrl) {
        item.setAttribute('href', 'http://music.test/tracks/' + track.id);
    }
    for (const item of artistName) {
        item.textContent = track.artist.name;
    }
    for (const item of trackName) {
        item.textContent = track.name;
    }
}

function updateTimeAndProgressBar() {
    let currentTimeSpan = document.getElementsByClassName('currentTime');
    let totalDurationSpan = document.getElementsByClassName('totalDuration');
    let progressBar = document.getElementsByClassName('progressBar');

    const currentTime = formatTime(audio.currentTime);
    const totalDuration = formatTime(audio.duration);

    for (const item of currentTimeSpan) {
        item.textContent = currentTime;
    }
    for (const item of totalDurationSpan) {
        item.textContent = totalDuration;
    }

    const percentage = (audio.currentTime / audio.duration) * 100;

    for (const item of progressBar) {
        item.style.width = percentage + '%';
        item.setAttribute('aria-valuenow', percentage);
        addDynamicAnimation();
    }
}

function updatePlaybackTimeOnClick(event) {
    const progressContainer = document.getElementsByClassName('progressContainer');

    for (const item of progressContainer) {
        const clickX = event.clientX - item.getBoundingClientRect().left;
        const percentage = (clickX / item.offsetWidth) * 100;
        const newTime = (percentage / 100) * audio.duration;

        audio.currentTime = newTime;
        addDynamicAnimation();
    }
    console.log(audio.duration)
}

function addDynamicAnimation(trackId) {
    let progressBar = document.getElementsByClassName('progressBar' + trackId)

    for (const item of progressBar) {
        item.classList.remove('dynamic-animation');
        // Trigger reflow before adding the class to restart the animation
        void item.offsetWidth;
        item.classList.add('dynamic-animation');
    }
}

function formatTime(timeInSeconds) {
    const minutes = Math.floor(timeInSeconds / 60);
    const seconds = Math.floor(timeInSeconds % 60);
    const formattedTime = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    return formattedTime;
}
