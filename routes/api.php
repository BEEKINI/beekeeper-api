<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ManageHoneyProdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HiveController;
use App\Http\Controllers\ApiaryController;
use App\Http\Controllers\ApiAuthController;

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('apiaries', ApiaryController::class);
    Route::resource('hives', HiveController::class);

    Route::post('/logout', [ApiAuthController::class, 'logout']);

    Route::controller( ManageHoneyProdController::class)
        ->prefix('/honey-prod')->group(function () {
            Route::get('/', 'index');
            Route::get('/create', 'create');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::get('/{id}/edit', 'edit');
        });
});
