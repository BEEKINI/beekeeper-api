<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiaryController;
use App\Http\Controllers\ApiAuthController;

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // for apiaries
    Route::resource('apiaries', ApiaryController::class);

    Route::post('/logout', [ApiAuthController::class, 'logout']);
});