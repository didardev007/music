<div class="col p-2">
    <div class="card h-100">
        <div class="card-body">
            <div class="@if (request()->routeIs('tracks.show')) d-block d-md-flex align-items-center @else row align-items-center mt-2 @endif">
                <div class="@if (!request()->routeIs('tracks.show')) col-5 col-md-5 col-lg-5 col-xl-3 @else col-6 col-md-5 col-lg-5 col-xl-3 ms-auto me-auto @endif">
                    <div class="position-relative">
                        <!-- Make the image a circle and add spinning class -->
                        <img src="{{ asset('storage/' . $obj->image) }}" alt="{{ $obj->image }}"
                             class="img-fluid
                        rounded-circle text-center"
                             id="albumImage{{$obj->id}}" style="width: 100%; height: auto; aspect-ratio: 1/1;">
                    </div>
                </div>
                <div class="@if (!request()->routeIs('tracks.show')) col-5 col-md-5 col-lg-5 col-xl-7 @else col-md-5 col-lg-5 col-xl-7 text-center pt-3 @endif">
                    <a href="{{ route('tracks.show', $obj->id) }}" class="link-dark h6 text-decoration-none">
                        {{ $obj->name }}
                    </a>
                    <div class="small">
                        <div class="text-danger-emphasis">
                            @lang('app.artist'): <a
                                href="{{ route('tracks.index', ['artist' => $obj->artist->slug]) }}"
                                class="text-decoration-none">{{ $obj->artist->name }}</a>
                        </div>
                        @isset($obj->album)
                            <div class="text-danger-emphasis">
                                @lang('app.album'): <a
                                    href="{{ route('tracks.index', ['album' => $obj->album->slug]) }}"
                                    class="text-decoration-none">{{ $obj->album->name }}</a>
                            </div>
                        @endisset
                        <div class="text-danger-emphasis">
                            @lang('app.genre'): <a href="{{ route('tracks.index', ['genre' => $obj->genre->slug]) }}"
                                                   class="text-decoration-none">{{ $obj->genre->name }}</a>
                        </div>
                        <div>
                            @lang('app.size'): <span class="text-success">{{ $obj->size_mb() }} Mb</span>
                        </div>
                    </div>
                    @if (request()->routeIs('tracks.show'))
                        <div class="text-success">
                            {{ $obj->durability }} <span class="text-dark">@lang('app.minutes')</span>
                        </div>
                        <div>
                            @lang('app.releasedAt'): <span
                                class="text-danger">{{ \Carbon\Carbon::parse($obj->release_date)->format('d M Y') }}</span>
                        </div>
                        <div>
                            @lang('app.addedAt'): <span
                                class="text-danger">{{ \Carbon\Carbon::parse($obj->created_at)->format('d M Y') }}</span>
                        </div>
                        <div>
                            @lang('app.viewed'): <span class="text-success">{{ $obj->viewed }}</span>
                        </div>
                    @endif
                </div>
                <div class="@if (!request()->routeIs('tracks.show')) col-2 @else py-3 @endif">
                    <div class="@if (request()->routeIs('tracks.show')) d-flex justify-content-center @else d-block @endif">
                        <div class="@if (!request()->routeIs('tracks.show')) text-end @else ms-auto me-auto @endif">
                            <!-- Add the play/pause button using Bootstrap icons -->
                            <button class="btn btn-md btn-outline-danger bi bi-play-btn"
                                    id="playPauseButton{{$obj->id}}" onclick="togglePlayPause('{{$obj->id}}',
                                    '{{ asset('storage/' . $obj->mp3_path) }}')">
                            </button>
                        </div>
                        <div class="@if (!request()->routeIs('tracks.show')) text-end my-2 @else ms-auto me-auto @endif">
                            <!-- Download button using HTML link tag -->
                            <a href="{{ asset('storage/' . $obj->mp3_path) }}" download="{{ $obj->name }}">
                                <button class="btn btn-md
                            btn-outline-danger bi
                            bi-download">
                                </button>
                            </a>
                        </div>
                        <div class="@if (!request()->routeIs('tracks.show')) text-end @else ms-auto me-auto @endif">
                            <button class="btn btn-md btn-outline-danger bi bi-heart{{ $obj->is_favorite ? '-fill' : '' }}"
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
