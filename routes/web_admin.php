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

Route::middleware('guest')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store'])->middleware(ProtectAgainstSpam::class);
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout')->middleware(ProtectAgainstSpam::class);
    });

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::controller(DashboardController::class)
            ->group(function () {
                Route::get('', 'index')->name('dashboard');
            });
    });


Route::get('/admin', [DashboardController::class,'index'])->name('dashboard');
Route::resource('/admin/album',AlbumController::class, ['as' => 'admin'])->except(['show']);
Route::get('/admin/track',[TrackController::class, 'index'])->name('track');
Route::resource('/admin/genre',GenreController::class, ['as' => 'admin'])->except(['show']);
Route::resource('admin/artist',ArtistController::class, ['as' => 'admin'])->except(['show']);
Route::get('/admin/user',[UserController::class, 'index'])->name('user');
Route::get('/admin/playlist',[PlaylistController::class, 'index'])->name('playlist');