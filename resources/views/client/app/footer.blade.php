<div class="container-xl">
    <footer class="row row-cols-1 row-cols-sm-2 justify-content-between align-items-center py-5 border-top">
        <div class="col mb-3 text-center">
            <a href="/" class="mb-3 link-dark text-decoration-none">
                <h2 class="bi bi-music-note-list text-danger-emphasis"></h2>
            </a>
            <p class="text-muted">&copy; {{ date('Y') }}</p>
        </div>

        <div class="col mb-3 text-center">
            <h5 class="text-danger-emphasis bi bi-list"></h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="/" class="nav-link p-0 text-warning-emphasis">@lang('app.home')
                    </a></li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-warning-emphasis p-0" href="{{ route('artists.index') }}">@lang('app.artists')</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-warning-emphasis p-0" href="{{ route('albums.index') }}">@lang('app.albums')
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-warning-emphasis p-0" href="{{ route('playlists.index') }}">@lang('app.playlists')
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-warning-emphasis p-0" href="{{ route('genres.index') }}">@lang('app.genres')
                    </a>
                </li>
            </ul>
        </div>
    </footer>
</div>
