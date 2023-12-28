<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\PlaylistController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [DashboardController::class,'index'])->name('dashboard');

Route::get('/admin/album',[AlbumController::class, 'index'])->name('album');
Route::get('/admin/track',[TrackController::class, 'index'])->name('track');
Route::get('/admin/genre',[GenreController::class, 'index'])->name('genre');
Route::resource('artist',ArtistController::class, ['as' => 'admin'])->except(['show']);
Route::get('/admin/user',[UserController::class, 'index'])->name('user');
Route::get('/admin/playlist',[PlaylistController::class, 'index'])->name('playlist');