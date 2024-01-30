let currentTrackId = 0;
let audio = new Audio();

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

    let playButton = document.getElementsByClassName('playPauseButton' + trackId);
    let albumImage = document.getElementsByClassName('albumImage' + trackId);

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
        data: JSON.stringify({ track_id: trackId }),
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
