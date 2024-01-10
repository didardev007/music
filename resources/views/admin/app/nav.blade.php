<div class="offcanvas-md offcanvas-end bg-body-tertiary sticky-top" tabindex="-1" id="sidebarMenu"
     aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
            <li class="nav-item h5">
                <a class="nav-link d-flex align-items-center gap-2 active link-dark" aria-current="page"
                   href="{{route('admin.dashboard')}}">
                    <i class="bi bi-speedometer2"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('admin.album.index','admin.album.edit','admin.album.create') ? 'nav-link d-flex align-items-center gap-2 bg-danger py-1 px-2 rounded-4': ''}}"
                   href="{{route('admin.album.index')}}">
                    <i class="bi bi-journal-album text-danger {{request()->routeIs('admin.album.index','admin.album.edit','admin.album.create') ? 'bi bi-journal-album text-dark': ''}}"></i>
                    Album
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('admin.track.index') ? 'nav-link d-flex align-items-center gap-2 bg-primary py-1 px-2 rounded-4': ''}}"
                   href="{{route('admin.track.index')}}">
                    <i class="bi bi-music-player text-primary {{request()->routeIs('admin.track.index') ? 'bi bi-music-player text-light': ''}}"></i>
                    Tracks
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('admin.artist.index') ? 'nav-link d-flex align-items-center gap-2 bg-warning py-1 px-2 rounded-4': ''}}"
                   href="{{route('admin.artist.index')}}">
                    <i class="bi bi-person text-warning {{request()->routeIs('admin.artist.index') ? 'bi bi-person text-light': ''}}"></i>
                    Artist
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('admin.genre.index') ? 'nav-link d-flex align-items-center gap-2 bg-info py-1 px-2 rounded-4': ''}}"
                   href="{{route('admin.genre.index')}}">
                    <i class="bi bi-film text-info {{request()->routeIs('admin.genre.index') ? 'bi bi-film text-light': ''}}"></i>Genre
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('admin.playlist.index') ? 'nav-link d-flex align-items-center gap-2 bg-success py-1 px-2 rounded-4': ''}}"
                   href="{{route('admin.playlist.index')}}">
                    <i class="bi bi-music-note-list text-success {{request()->routeIs('admin.playlist.index') ? 'bi bi-music-note-list text-light': ''}}"></i>Playlist
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('admin.user.index') ? 'nav-link d-flex align-items-center gap-2 bg-secondary py-1 px-2 rounded-4': ''}}"
                   href="{{route('admin.user.index')}}">
                    <i class="bi bi-person-add text-secondary {{request()->routeIs('admin.user.index') ? 'bi bi-person-add text-light': ''}}"></i>
                    User
                </a>
            </li>
        </ul>

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 link-dark" href="{{ route('home') }}" target="_blank">
                    <i class="bi-box-arrow-up-right"></i>Home
                </a>
            </li>
            <li class="nav-item pb-5">
                <a class="nav-link link-danger" href="{{ route('admin.logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout').submit();">
                    <i class="bi bi-x-circle text-danger"></i> Sign Out
                </a>
                <form id="logout" action="{{ route('admin.logout') }}" method="post" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>