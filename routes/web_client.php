<?php


use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\TrackController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class,'index'])->name('home');

Route::resource('tracks', TrackController::class);