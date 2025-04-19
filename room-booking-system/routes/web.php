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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');