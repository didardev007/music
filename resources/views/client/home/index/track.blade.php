<div class="container-xl py-3">
    <div class="h4 text-primary text-center my-3">
        <a href="{{ route('tracks.index') }}" class="text-decoration-none link-primary">@lang('app.tracks')</a>
    </div>
    @foreach($tracks as $track)
        <div class="col">
            <div class="card h-100">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-7 col-md-5 col-lg-4 col-xl-3">
                            <div class="position-relative">
                                <img src="{{ asset('img/real_mic.jpg') }}" alt="" class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="col-5 col-md-7 col-lg-8 col-xl-9">
                            <a href="{{ route('tracks.show', $track->id) }}" class="link-dark h6 text-decoration-none">
                                {{ $track->name }}
                            </a>
                            <div class="small">
                                <div class="text-danger-emphasis">
                                    @lang('app.artist'): <a href="{{ route('tracks.index', ['artist' =>
                                    $track->artist->slug])
                                     }}"
                                               class="text-decoration-none">{{ $track->artist->name }}</a>
                                </div>
                                <div class="text-danger-emphasis">
                                    @lang('app.album'): <a href="{{ route('tracks.index', ['album' =>
                                    $track->album->slug]) }}"
                                              class="text-decoration-none">{{ $track->album->name }}</a>
                                </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>