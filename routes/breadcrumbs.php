<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Playlist;
use App\Models\Track;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > tracks
Breadcrumbs::for('tracks', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Tracks', route('tracks.index'));
});

// Home > tracks > [track]
Breadcrumbs::for('track', function (BreadcrumbTrail $trail, Track $obj) {
    $trail->parent('tracks');
    $trail->push($obj->getName(), route('tracks.show', $obj));
});

// Home > genres
Breadcrumbs::for('genres', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Genres', route('genres.index'));
});

// Home > genres > [genre]
Breadcrumbs::for('genre', function (BreadcrumbTrail $trail, Genre $obj) {
    $trail->parent('genres');
    $trail->push($obj->getName(), route('genres.show', $obj));
});

// Home > artists
Breadcrumbs::for('artists', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Artists', route('artists.index'));
});

// Home > artists > [artist]
Breadcrumbs::for('artist', function (BreadcrumbTrail $trail, Artist $obj) {
    $trail->parent('artists');
    $trail->push($obj->getName(), route('artists.show', $obj));
});

// Home > albums
Breadcrumbs::for('albums', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Albums', route('albums.index'));
});

// Home > albums > [album]
Breadcrumbs::for('album', function (BreadcrumbTrail $trail, Album $obj) {
    $trail->parent('albums');
    $trail->push($obj->getName(), route('albums.show', $obj));
});

// Home > playlists
Breadcrumbs::for('playlists', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Playlists', route('playlists.index'));
});

// Home > playlists > [playlist]
Breadcrumbs::for('playlist', function (BreadcrumbTrail $trail, Playlist $obj) {
    $trail->parent('playlists');
    $trail->push($obj->getName(), route('playlists.show', $obj));
});
