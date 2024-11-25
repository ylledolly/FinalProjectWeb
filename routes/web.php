<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Middleware\CheckAge;

Route::get('/', [HomeController::class, 'index'])->middleware(CheckAge::class)->name('home'); // Home page route

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index'); // Dashboard main page
    Route::get('/user/{userId}', [DashboardController::class, 'show'])->name('dashboard.user'); // User-specific dashboard page
});

// Access Denied route
Route::get('/access-denied', function () {
    return view('access-denied');  // Display an access denied page
})->name('access.denied');

Route::get('/', [LandingPageController::class, 'index'])->name('landing');



