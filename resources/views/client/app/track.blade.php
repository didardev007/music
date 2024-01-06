<div class="col">
    <div class="card h-100">
        <div class="card-body p-2">
            <div class="row align-items-center">
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="position-relative">
                        <img src="{{ asset('img/real_mic.jpg') }}" alt="" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col-4 col-md-6 col-lg-7 col-xl-8">
                    <a href="{{ route('tracks.show', $track->id) }}" class="link-dark h6
                            text-decoration-none">
                        {{ $track->name }}
                    </a>
                    <div class="small">
                        <div class="text-danger-emphasis">
                            @lang('app.artist'): <a href="{{ route('tracks.index', ['artist' =>
                                    $track->artist->slug])
                                     }}"
                                                    class="text-decoration-none">{{ $track->artist->name }}</a>
                        </div>
                        @isset($track->album)
                            <div class="text-danger-emphasis">
                                @lang('app.album'): <a href="{{ route('tracks.index', ['album' =>
                                    $track->album->slug]) }}"
                                                       class="text-decoration-none">{{ $track->album->name }}</a>
                            </div>
                        @endisset
                        <div class="text-danger-emphasis">
                            @lang('app.genre'): <a href="{{ route('tracks.index', ['genre' =>
                                    $track->genre->slug]) }}"
                                                   class="text-decoration-none">{{ $track->genre->name }}</a>
                        </div>
                    </div>
                    <div class="text-success">
                        {{ $track->durability }} <span class="text-dark">@lang('app.minutes')</span>
                    </div>
                    <div>
                        @lang('app.releasedAt'): <span class="text-danger">{{ $track->release_date }}</span>
                    </div>
                    <div>
                        @lang('app.addedAt'): <span class="text-danger">{{ $track->created_at }}</span>
                    </div>
                    <div>
                        @lang('app.viewed'): <span class="text-success">{{ $track->viewed }}</span>
                    </div>
                </div>
                <div class="col-2">
                    <div class="d-md-flex">
                        <div class="text-end me-md-2">
                            <button class="btn btn-md btn-outline-danger bi bi-play-btn"></button>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-md btn-outline-danger bi bi-download"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>