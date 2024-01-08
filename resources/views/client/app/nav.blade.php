<div class="container-xl bg-info-subtle mt-5">
    <nav class="navbar navbar-expand-lg fw-bold">
        <div class="container-fluid">
            <a class="navbar-brand text-danger-emphasis" href="{{ route('home') }}">@lang('app.music')</a>
            <div class="d-flex me-lg-2 order-lg-1">
                <div class="row row-cols-3 align-items-center g-0">
                    <div class="col">
                        <a href="{{ route('locale', 'en') }}">
                            <button class="btn btn-small text-danger-emphasis fw-bold">
                                Eng
                            </button>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('locale', 'ru') }}">
                            <button class="btn btn-small text-danger-emphasis fw-bold">
                                Рус
                            </button>
                        </a>
                    </div>
                    @auth
                        <div class="col">
                            <a href="{{ route('register') }}">
                                <button class="btn btn-small text-danger-emphasis fw-bold">
                                    {{ auth()->user()->name }}
                                </button>
                            </a>
                        </div>
                    @else
                        <div class="col">
                            <a href="{{ route('register') }}">
                                <button class="btn btn-small text-danger-emphasis bi bi-person-square fw-bold"></button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-warning-emphasis"
                           href="{{ route('artists.index') }}">@lang('app.artists')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning-emphasis"
                           href="{{ route('albums.index') }}">@lang('app.albums')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning-emphasis"
                           href="{{ route('playlists.index') }}">@lang('app.playlists')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning-emphasis"
                           href="{{ route('genres.index') }}">@lang('app.genres')</a>
                    </li>
                </ul>
                @if(request()->is('/'))
                    <form class="d-flex" action="{{ route('search') }}" method="get">
                        @csrf
                        <input class="form-control me-2" type="text" name="query" value="{{ old('query', $query ?? '') }}"
                               placeholder="@lang('app.search')">
                        <button class="btn btn-sm btn-outline-success fw-bold"
                                type="submit">@lang('app.search')</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
</div>