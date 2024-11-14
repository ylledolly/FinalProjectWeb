<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedController;
use App\Http\Middleware\AgeVerify;

Route::get('/', [HomeController::class, 'index'])->middleware(AgeVerify::class)->name('homepage'); 

Route::prefix('/lib')->group(function () {
    Route::get('/', [FeedController::class, 'index'])->name('lib.index'); 
    Route::get('/user/{userId}', [FeedController::class, 'show'])->name('lib.user'); 
});

// Access Denied route
Route::get('/access-denied', function () {
    return view('accessDenied');  
})->name('access.denied');