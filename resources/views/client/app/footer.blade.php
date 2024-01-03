<div class="container">
    <footer class="row row-cols-1 row-cols-sm-2 justify-content-between py-5 my-5 border-top">
        <div class="col mb-3">
            <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                <h2 class="bi bi-music-note-list text-danger-emphasis"></h2>
            </a>
            <p class="text-muted">&copy; 2024</p>
        </div>

        <div class="col mb-3">
            <h5 class="text-danger-emphasis bi bi-list"></h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="/" class="nav-link p-0 text-warning-emphasis">Home</a></li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-warning-emphasis p-0" href="{{ route('artists.index') }}">@lang('app.artist')</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-warning-emphasis p-0" href="{{ route('albums.index') }}">@lang('app.album')
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-warning-emphasis p-0" href="{{ route('playlists.index') }}">@lang('app.playlist')
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-warning-emphasis p-0" href="{{ route('genres.index') }}">@lang('app.genre')
                    </a>
                </li>
            </ul>
        </div>
    </footer>
</div>
