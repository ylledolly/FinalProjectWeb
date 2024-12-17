<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAge;
use App\Models\Landing;
use App\Models\UserLogin;


Route::get('/login-page', [UserController::class, 'index'])->name('login-page');
Route::post('/login-page', [UserController::class, 'login'])->name('login.submit');
Route::post('/signup', [UserController::class, 'register'])->name('signup.submit');


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

Route::resource('landings', LandingPageController::class);

Route::get('/BookView', function () {
    return view('BookView');
});

Route::get('/booklist', function () {
    return view('booklist');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['username' => session('user')]);
});
