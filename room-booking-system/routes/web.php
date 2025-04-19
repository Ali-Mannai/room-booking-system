<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome'); // Or redirect to login/dashboard
});

Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class)->middleware('admin');
    Route::resource('bookings', BookingController::class);
});

Auth::routes();

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', function (Request $request) {
    // Handle registration logic
})->name('register.post');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', function (Request $request) {
    // Handle login logic
})->name('login.post');
Route::get('/password/reset', function () {
    return view('auth.passwords.email');
})->name('password.request');
Route::post('/password/email', function (Request $request) {
    // Handle password reset email logic
})->name('password.email');
Route::get('/password/reset/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('password.reset');
Route::post('/password/reset', function (Request $request) {
    // Handle password reset logic
})->name('password.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Logged out successfully.');
})->name('logout');
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('admin')->name('admin.dashboard');
Route::get('/user', function () {
    return view('user.dashboard');
})->middleware('auth')->name('user.dashboard');