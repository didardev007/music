<div class="col p-2 {{ !request()->routeIs('tracks.index') ? 'h-100' : ''}}">
    <div class="card h-100">
        <div class="card-body">
            <div class="row align-items-center mt-2">
                <div class="col-5 col-md-5 col-lg-5 col-xl-3">
                    <div class="position-relative">
                        <!-- Make the image a circle and add spinning class -->
                        <a href="{{ route('tracks.show', $obj->id) }}" class="link-dark h6 text-decoration-none">
                            <img src="{{ asset('storage/' . $obj->image) }}" alt="{{ $obj->image }}"
                                 class="img-fluid
                        rounded-circle text-center albumImage{{ $obj->id }}"
                                 style="width: 100%; height: auto; aspect-ratio: 1/1;">
                        </a>
                    </div>
                </div>
                <div
                    class="col-5 col-md-5 col-lg-5 col-xl-7">
                    <a href="{{ route('tracks.show', $obj->id) }}" class="link-dark h6 text-decoration-none">
                        {{ $obj->name }}
                    </a>
                    <div class="small">
                        <div class="text-danger-emphasis">
                            @lang('app.artist'): <a
                                href="{{ route('tracks.index', ['artist' => $obj->artist->slug]) }}"
                                class="text-decoration-none">{{ $obj->artist->getName() }}</a>
                        </div>
                        @isset($obj->album_id)
                            <div class="text-danger-emphasis">
                                @lang('app.album'): <a href="{{ route('tracks.index', ['album' => $obj->album->slug]) }}" class="text-decoration-none">{{ $obj->album->getName() }}</a>
                            </div>
                        @endisset
                        <div class="text-danger-emphasis">
                            @lang('app.genre'): <a href="{{ route('tracks.index', ['genre' => $obj->genre->slug]) }}" class="text-decoration-none">{{ $obj->genre->getName() }}</a>
                        </div>
                        <div>
                            @lang('app.size'): <span class="text-success">{{ $obj->size_mb() }} Mb</span>
                        </div>
                        <div class="text-danger-emphasis viewed{{ $obj->id }}">
                            @lang('app.viewed'): {{ $obj->viewed }}
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="d-block">
                        <div class="text-end">
                            <button class="btn btn-md btn-outline-danger bi bi-play-btn playPauseButton{{$obj->id}}" onclick="togglePlayPause('{{$obj->id}}', '{{ asset('storage/' . $obj->mp3_path) }}')">
                            </button>
                        </div>
                        <div class="text-end my-2">
{{--                            Download button using HTML link tag--}}
                            <a href="{{ asset('storage/' . $obj->mp3_path) }}" download="{{ $obj->mp3_path }}">
                                <button class="btn btn-md
                            btn-outline-danger bi
                            bi-download">
                                </button>
                            </a>
                        </div>
                        <div class="text-end">
                            @auth
                                @if (Auth::user()->checkFavorite($obj))
                                    <form action="{{ route('removeFavorite', ['trackId' => $obj->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-md
                            btn-outline-danger bi
                            bi-heart-fill">
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('addFavorite', ['trackId' => $obj->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-md
                            btn-outline-danger bi
                            bi-heart">
                                        </button>
                                    </form>
                                @endif
                            @else
                                <form action="{{ route('register') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-md
                            btn-outline-danger bi
                            bi-heart">
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

