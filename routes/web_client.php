<?php


use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\TrackController;
use Illuminate\Support\Facades\Route;




Route::controller(HomeController::class)
    ->group(function() {
        Route::get('', 'index')->name('home');
        Route::get('locale/{locale}', 'locale')->name('locale')->where('locale', '[a-z]+');
    });

Route::resource('tracks', TrackController::class);