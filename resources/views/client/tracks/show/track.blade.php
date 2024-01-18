<div class="col p-2">
    <div class="card h-100">
        <div class="card-body">
            <div class="d-block d-md-flex align-items-center">
                <div class="col-6 col-md-5 col-lg-5 col-xl-3 ms-auto me-auto">
                    <div class="position-relative">
                        <!-- Make the image a circle and add spinning class -->
                        <a href="{{ route('tracks.show', $obj->id) }}" class="link-dark h6 text-decoration-none">
                            <img src="{{ asset('storage/' . $obj->image) }}" alt="{{ $obj->image }}"
                                 class="img-fluid
                        rounded-circle text-center"
                                 id="albumImage{{$obj->id}}" style="width: 100%; height: auto; aspect-ratio: 1/1;">
                        </a>
                    </div>
                </div>
                <div
                    class="col-md-5 col-lg-5 col-xl-7 text-center pt-3">
                    <a href="{{ route('tracks.show', $obj->id) }}" class="link-dark h6 text-decoration-none">
                        {{ $obj->getName() }}
                    </a>
                    <div class="small">
                        <div class="text-danger-emphasis">
                            @lang('app.artist'): <a
                                href="{{ route('tracks.index', ['artist' => $obj->artist->slug]) }}"
                                class="text-decoration-none">{{ $obj->artist->getName() }}</a>
                        </div>
                        @isset($obj->album)
                            <div class="text-danger-emphasis">
                                @lang('app.album'): <a
                                    href="{{ route('tracks.index', ['album' => $obj->album->slug]) }}"
                                    class="text-decoration-none">{{ $obj->album->getName() }}</a>
                            </div>
                        @endisset
                        <div class="text-danger-emphasis">
                            @lang('app.genre'): <a href="{{ route('tracks.index', ['genre' => $obj->genre->slug]) }}"
                                                   class="text-decoration-none">{{ $obj->genre->getName() }}</a>
                        </div>
                        <div>
                            @lang('app.size'): <span class="text-success">{{ $obj->size_mb() }} Mb</span>
                        </div>
                    </div>
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
                </div>
                <div class="py-3">
                    <div
                        class="d-flex d-md-block justify-content-center">
                        <div class="ms-auto me-auto">
                            <!-- Add the play/pause button using Bootstrap icons -->
                            <button class="btn btn-md btn-outline-danger bi bi-play-btn"
                                    id="playPauseButton{{$obj->id}}" onclick="togglePlayPause('{{$obj->id}}',
                                    '{{ asset('storage/' . $obj->mp3_path) }}')">
                            </button>
                        </div>
                        <div
                            class="ms-auto me-auto py-md-2">
                            <!-- Download button using HTML link tag -->
                            <a href="{{ asset('storage/' . $obj->mp3_path) }}" download="{{ $obj->mp3_path }}">
                                <button class="btn btn-md
                            btn-outline-danger bi
                            bi-download">
                                </button>
                            </a>
                        </div>
                        <div class="ms-auto me-auto">
                            <button
                                class="btn btn-md btn-outline-danger bi bi-heart{{ $obj->is_favorite ? '-fill' : '' }}"
                                type="submit" id="favorite">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
