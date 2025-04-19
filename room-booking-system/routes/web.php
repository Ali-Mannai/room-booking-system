<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class)->middleware('admin');
    Route::resource('bookings', BookingController::class);
});

Auth::routes();