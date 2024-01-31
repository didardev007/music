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



function updateViewCountOnFrontend(trackId, newViewCount) {
    // Update the view count dynamically on the frontend
    let viewedElement = document.getElementById('viewed' + trackId);
    if (viewedElement) {
        let updatedViewCount = parseInt($('#viewed' + trackId).data('viewed')) + newViewCount;
        // Use the translations variable
        let translatedLabel = window.translations.viewedLabel;
        // Update the view count with the translated label
        viewedElement.innerHTML = translatedLabel + ': ' + updatedViewCount;
    }
}


function incrementViewCount(trackId) {
    // Retrieve the initial view count value from the data attribute
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
        data: JSON.stringify({ track_id: trackId}),
        success: function (data) {
            if (data.success) {
                console.log('View count incremented for track ' + trackId);
                console.log('Updated view count:', data.listened);

                // Update the view count on the frontend
                updateViewCountOnFrontend(trackId, data.listened);
            } else {
                console.error('Failed to increment view count for track ' + trackId);
            }
        },
    });
}
function toggleFavorite(button) {
    let form = button.parentElement;

    $.ajax({
        url: form.action,
        type: 'POST',
        data: $(form).serialize(),
        success: function(data) {
            if (data.success) {

                // Toggle heart icon
                $(button).toggleClass('bi-heart bi-heart-fill');
            } else {
                console.error('Failed to toggle favorite status');
            }
        },
        error: function(error) {
            console.error('AJAX request failed: ', error);
        }
    });
}








