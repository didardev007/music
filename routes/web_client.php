<?php


use App\Http\Controllers\Client\ArtistController;
use App\Http\Controllers\Client\AlbumController;
use App\Http\Controllers\Client\GenreController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\TrackController;
use Illuminate\Support\Facades\Route;




Route::controller(HomeController::class)
    ->group(function() {
        Route::get('', 'index')->name('home');
        Route::get('locale/{locale}', 'locale')->name('locale')->where('locale', '[a-z]+');
    });

Route::resource('tracks', TrackController::class);
Route::resource('artists', ArtistController::class);
Route::resource('genres', GenreController::class);
Route::resource('album', AlbumController::class);