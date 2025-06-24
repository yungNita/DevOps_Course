<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TerrainController;
use App\Http\Controllers\TerrainImageController;

Route::middleware(['auth'])->group(function () {
    Route::resource('terrains', TerrainController::class);
    Route::resource('terrain-images', TerrainImageController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('favorites', FavoriteController::class);
});