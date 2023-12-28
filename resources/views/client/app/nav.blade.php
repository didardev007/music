<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand text-danger-emphasis" href="{{ route('home') }}">Music</a>
        <div class="d-flex me-2 order-lg-1">
            <div class="row row-cols-3 g-0">
                <div class="col">
                    <a href="{{ route('locale', 'en') }}">
                        <button class="btn btn-small text-danger-emphasis">
                            Eng
                        </button>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('locale', 'ru') }}">
                        <button class="btn btn-small text-danger-emphasis">
                            Rus
                        </button>
                    </a>
                </div>
                <div class="col">
                    <button class="btn btn-small text-danger-emphasis bi bi-person-square">
                    </button>
                </div>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link text-warning-emphasis" href="#">Artists</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-warning-emphasis" href="#">Albums</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-warning-emphasis" href="#">Playlists</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-warning-emphasis" href="#">Genres</a>
                </li>
                <hr>
                <li class="nav-item">
                <a class="nav-link text-warning-emphasis" href="#">Artists</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-sm btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>