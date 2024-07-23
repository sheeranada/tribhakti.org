<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

Route::prefix('user')->group(function () {
    Route::post('login', [UserController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        #user account
        Route::post('register', [UserController::class, 'registerUser']);
        Route::post('logout', [UserController::class, 'logout']);
        Route::get('show', [UserController::class, 'showUser']);
    });
});
