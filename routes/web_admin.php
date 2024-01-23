<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\PlaylistController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;


Route::controller(LoginController::class)
    ->name('admin.')
    ->group(function () {
        Route::get('login', 'create')->middleware('guest')->name('login');
        Route::post('login', 'store')->middleware('guest');
        Route::post('logout', 'destroy')->middleware('auth')->name('logout');
    });



Route::middleware(['auth', 'check.admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/album', AlbumController::class)->except(['show']);
        Route::resource('/track', TrackController::class)->except(['show']);
        Route::resource('/genre', GenreController::class)->except(['show']);
        Route::resource('/artist', ArtistController::class)->except(['show']);
        Route::resource('/user', UserController::class)->except(['show']);
        Route::resource('/playlist', PlaylistController::class)->except(['show']);
        Route::post('/playlist/{id}/attach', [PlaylistController::class, 'attach'])->name('playlist.attach');
        Route::post('/playlist/{id}/detach', [PlaylistController::class, 'detach'])->name('playlist.detach');

    });