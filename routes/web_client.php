<?php


use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Client\ArtistController;
use App\Http\Controllers\Client\AlbumController;
use App\Http\Controllers\Client\GenreController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PlaylistController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\Client\TrackController;
use App\Http\Controllers\client\UserController;
use Illuminate\Support\Facades\Route;




Route::controller(HomeController::class)
    ->group(function() {
        Route::get('', 'index')->name('home');
        Route::get('locale/{locale}', 'locale')->name('locale')->where('locale', '[a-z]+');
    });

Route::middleware('guest')
    ->group(function () {
        Route::get('register', [RegisterController::class, 'create'])->name('register');
        Route::post('register', [RegisterController::class, 'store']);
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });

Route::resource('tracks', TrackController::class);
Route::resource('artists', ArtistController::class);
Route::resource('genres', GenreController::class);
Route::resource('albums', AlbumController::class);
Route::resource('playlists', PlaylistController::class);
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::resource('user', UserController::class);