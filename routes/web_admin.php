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
        Route::resource('/playlist', PlaylistController::class)->except('show');
    });





//Route::get('/admin', [DashboardController::class,'index'])->name('dashboard');
//Route::resource('/admin/album',AlbumController::class, ['as' => 'admin'])->except(['show']);
//Route::get('/admin/track',[TrackController::class, 'index'])->name('track');
//Route::resource('/admin/genre',GenreController::class, ['as' => 'admin'])->except(['show']);
//Route::resource('admin/artist',ArtistController::class, ['as' => 'admin'])->except(['show']);
//Route::get('/admin/user',[UserController::class, 'index'])->name('user');
//Route::get('/admin/playlist',[PlaylistController::class, 'index'])->name('playlist');