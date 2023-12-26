{{--<nav class="navbar navbar-expand-lg bg-body-tertiary">--}}
    {{--<div class="container-fluid">--}}
        {{--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">--}}
            {{--<span class="bi bi-chevron-double-down"></span>--}}
        {{--</button>--}}
        {{--<div class="collapse navbar-collapse" id="navbarTogglerDemo01">--}}
            {{--<a class="navbar-brand text-danger-emphasis" href="#">Music</a>--}}
            {{--<ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Artists</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Albums</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Playlists</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Genres</a>--}}
                {{--</li>--}}
                {{--<hr>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Artists</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="d-block d-lg-flex text-center">--}}
            {{--<button class="btn bi bi-search" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"></button>--}}
            {{--<div class="collapse" id="collapseExample">--}}
                {{--<form class="d-flex" role="search">--}}
                    {{--<input class="form-control me-2" type="search" placeholder="Search">--}}
                    {{--<button class="btn btn-outline-success btn-sm bi bi-search" type="submit"></button>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="d-flex">--}}
            {{--<button class="btn btn-sm text-danger-emphasis">--}}
                {{--Rus--}}
            {{--</button>--}}
            {{--<button class="btn btn-sm text-danger-emphasis">--}}
                {{--Eng--}}
            {{--</button>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand text-danger-emphasis" href="#">Music</a>
        <div class="d-flex me-2 order-lg-1">
            <div class="row row-cols-3 g-0">
                <div class="col">
                    <button class="btn btn-small text-danger-emphasis">
                        Eng
                    </button>
                </div>
                <div class="col">
                    <button class="btn btn-small text-danger-emphasis">
                        Rus
                    </button>
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
                <a class="nav-link" href="#">Artists</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Albums</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Playlists</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Genres</a>
                </li>
                <hr>
                <li class="nav-item">
                <a class="nav-link" href="#">Artists</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-sm btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>