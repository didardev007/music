<div class="col p-2">
    <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center mt-2">
                <div class="col-5 col-md-5 col-lg-5 col-xl-3">
                    <div class="position-relative">
                        <!-- Make the image a circle and add spinning class -->
                        <img src="{{ asset('storage/' . $track->image) }}" alt="{{ $track->image }}"
                             class="img-fluid
                        rounded-circle"
                             id="albumImage{{$track->id}}" style="width: 100%; height: auto; aspect-ratio: 1/1;">
                    </div>
                </div>
                <div class="col-5 col-md-5 col-lg-5 col-xl-7">
                    <a href="{{ route('tracks.show', $track->id) }}" class="link-dark h6 text-decoration-none">
                        {{ $track->name }}
                    </a>
                    <div class="small">
                        <div class="text-danger-emphasis">
                            @lang('app.artist'): <a
                                href="{{ route('tracks.index', ['artist' => $track->artist->slug]) }}"
                                class="text-decoration-none">{{ $track->artist->name }}</a>
                        </div>
                        @isset($track->album)
                            <div class="text-danger-emphasis">
                                @lang('app.album'): <a
                                    href="{{ route('tracks.index', ['album' => $track->album->slug]) }}"
                                    class="text-decoration-none">{{ $track->album->name }}</a>
                            </div>
                        @endisset
                        <div class="text-danger-emphasis">
                            @lang('app.genre'): <a href="{{ route('tracks.index', ['genre' => $track->genre->slug]) }}"
                                                   class="text-decoration-none">{{ $track->genre->name }}</a>
                        </div>
                        <div>
                            @lang('app.size'): <span class="text-success">{{ $track->size_mb() }} Mb</span>
                        </div>
                    </div>
                    {{--<div class="d-none d-lg-block">
                        <div class="text-success">
                            {{ $track->durability }} <span class="text-dark">@lang('app.minutes')</span>
                        </div>
                        <div>
                            @lang('app.releasedAt'): <span
                                class="text-danger">{{ \Carbon\Carbon::parse($track->release_date)->format('d M Y') }}</span>
                        </div>
                        <div>
                            @lang('app.addedAt'): <span
                                class="text-danger">{{ \Carbon\Carbon::parse($track->created_at)->format('d M Y') }}</span>
                        </div>
                        <div>
                            @lang('app.viewed'): <span class="text-success">{{ $track->viewed }}</span>
                        </div>
                    </div>--}}
                </div>
                <div class="col-2">
                    <div class="d-block">
                        <div class="text-end">
                            <!-- Add the play/pause button using Bootstrap icons -->
                            <button class="btn btn-md btn-outline-danger bi bi-play-btn"
                                    id="playPauseButton{{$track->id}}" onclick="togglePlayPause('{{$track->id}}',
                                    '{{ asset('storage/' . $track->mp3_path) }}')">
                            </button>
                        </div>
                        <div class="text-end my-2">
                            <!-- Download button using HTML link tag -->
                            <a href="{{ asset('storage/' . $track->mp3_path) }}" download="{{ $track->name }}">
                                <button class="btn btn-md
                            btn-outline-danger bi
                            bi-download">
                                </button>
                            </a>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-md btn-outline-danger bi bi-heart{{ $track->is_favorite ? '-fill' : '' }}"
                                type="submit" id="favorite">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript function to play/pause audio and update image animation -->
@push('scripts')
    <script>
        let currentTrackId = null;
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
            audio.src = audioPath;
            audio.play()
                .then(() => {
                    // Start spinning animation
                    document.getElementById('albumImage' + trackId).classList.add('spinning');
                    // Change button icon to pause
                    document.getElementById('playPauseButton' + trackId).classList.remove('bi-play-btn');
                    document.getElementById('playPauseButton' + trackId).classList.add('bi-pause-btn');
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
                document.getElementById('albumImage' + currentTrackId).classList.remove('spinning');
                // Change button icon to play
                document.getElementById('playPauseButton' + currentTrackId).classList.remove('bi-pause-btn');
                document.getElementById('playPauseButton' + currentTrackId).classList.add('bi-play-btn');

                currentTrackId = null;
            }
        }

        audio.addEventListener('ended', function () {
            // Reset image animation and button icon when audio ends
            document.getElementById('albumImage' + currentTrackId).classList.remove('spinning');
            document.getElementById('playPauseButton' + currentTrackId).classList.remove('bi-pause-btn');
            document.getElementById('playPauseButton' + currentTrackId).classList.add('bi-play-btn');

            currentTrackId = null;
        });
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
