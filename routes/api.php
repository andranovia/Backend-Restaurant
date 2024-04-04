<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::get('user', function () {
            return auth()->user();
        })->middleware('auth:sanctum');
        Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout'])->name('logout');
    });



    Route::get('restaurants', [RestaurantController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('restaurants/{id}', [RestaurantController::class, 'show']);
});
