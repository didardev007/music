<?php


use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Client\ArtistController;
use App\Http\Controllers\Client\AlbumController;
use App\Http\Controllers\Client\FavoriteController;
use App\Http\Controllers\Client\GenreController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PlaylistController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\Client\TrackController;
use App\Http\Controllers\client\UserController;
use Illuminate\Support\Facades\Route;



Route::get('locale/{locale}', [HomeController::class, 'locale'])->name('locale')->where('locale', '[a-z]+');

Route::controller(HomeController::class)
    ->group(function() {
        Route::get('', 'index')->name('home');
    });

Route::middleware('guest')
    ->group(function () {
        Route::get('register', [RegisterController::class, 'create'])->name('register');
        Route::post('register', [RegisterController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
        Route::resource('users',UserController::class);
        Route::post('/tracks/addFavorite/{trackId}', [FavoriteController::class, 'addToFavorites'])->name('addFavorite');
        Route::delete('/tracks/removeFavorite/{trackId}', [FavoriteController::class, 'removeFromFavorites'])->name('removeFavorite');
    });

Route::resource('tracks', TrackController::class);
Route::resource('artists', ArtistController::class);
Route::resource('genres', GenreController::class);
Route::resource('albums', AlbumController::class);
Route::resource('playlists', PlaylistController::class);
Route::get('/playlists/{playlistId}/{userId}', [FavoriteController::class, 'showFavorites'])->name('favorites');
Route::post('/tracks/increment-view', [TrackController::class , 'incrementView']);
Route::get('/search', [SearchController::class, 'search'])->name('search');
