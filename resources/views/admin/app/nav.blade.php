
    <div class="offcanvas-md offcanvas-end bg-body-tertiary sticky-top" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item h5">
                    <a class="nav-link d-flex align-items-center gap-2 active link-dark" aria-current="page" href="#">
                        <i class="bi bi-speedometer2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('album') ? 'nav-link d-flex align-items-center gap-2 bg-danger py-1 px-2 rounded-4': ''}}" href="{{route('album')}}">
                       <i class="bi bi-journal-album text-danger {{request()->routeIs('album') ? 'bi bi-journal-album text-dark': ''}}"></i>  Album
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('track') ? 'nav-link d-flex align-items-center gap-2 bg-primary py-1 px-2 rounded-4': ''}}" href="{{route('track')}}">
                       <i class="bi bi-music-player text-primary {{request()->routeIs('track') ? 'bi bi-music-player text-light': ''}}"></i>  Tracks
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('admin.artist.index') ? 'nav-link d-flex align-items-center gap-2 bg-warning py-1 px-2 rounded-4': ''}}" href="{{route('admin.artist.index')}}">
                        <i class="bi bi-person text-warning {{request()->routeIs('admin.artist.index') ? 'bi bi-person text-light': ''}}"></i> Artist
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('admin.genre.index') ? 'nav-link d-flex align-items-center gap-2 bg-info py-1 px-2 rounded-4': ''}}" href="{{route('admin.genre.index')}}">
                        <i class="bi bi-film text-info {{request()->routeIs('admin.genre.index') ? 'bi bi-film text-light': ''}}"></i>Genre
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('playlist') ? 'nav-link d-flex align-items-center gap-2 bg-success py-1 px-2 rounded-4': ''}}" href="{{route('playlist')}}">
                        <i class="bi bi-music-note-list text-success {{request()->routeIs('playlist') ? 'bi bi-music-note-list text-light': ''}}"></i>Playlist
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-dark {{request()->routeIs('user') ? 'nav-link d-flex align-items-center gap-2 bg-secondary py-1 px-2 rounded-4': ''}}" href="{{route('user')}}">
                        <i class="bi bi-person-add text-secondary {{request()->routeIs('user') ? 'bi bi-person-add text-light': ''}}"></i> User
                    </a>
                </li>
            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-dark" href="#">
                        <i class="bi bi-gear text-warning-emphasis"></i>Settings
                    </a>
                </li>
                <li class="nav-item pb-5">
                    <a class="nav-link d-flex align-items-center gap-2 link-danger" href="#">
                        <i class="bi bi-x-circle text-danger"></i>Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>