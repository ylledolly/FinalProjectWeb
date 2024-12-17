<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Middleware\CheckAge;
use Apps\Models\UserModel;

// Display the login form (GET request)
Route::get('/', [UserController::class, 'showLoginForm'])->name('login');

// Handle the login form submission (POST request)
Route::post('/login', [UserController::class, 'logrequest'])->name('login.submit'); // Make sure it's 'login.submit' here

// Handle signup
Route::post('/signup', [UserController::class, 'register'])->name('signup.submit');

// Landing page (after successful login)
Route::get('/landing', [LandingPageController::class, 'index'])->name('landing');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index'); // Dashboard main page
    Route::get('/user/{userId}', [DashboardController::class, 'show'])->name('dashboard.user'); // User-specific dashboard page
});

// Access Denied route
Route::get('/access-denied', function () {
    return view('access-denied');  // Display an access denied page
})->name('access.denied');


Route::get('/BookView', function () {
    return view('BookView');
});

Route::get('/booklist', function () {
    return view('booklist');
});

