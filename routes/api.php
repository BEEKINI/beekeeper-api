<?php

use App\Http\Controllers\ApiaryController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\HiveController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\ManageHoneyProdController;
use App\Http\Controllers\SwarmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('apiaries', ApiaryController::class);
    Route::resource('hives', HiveController::class);
    Route::resource('swarms', SwarmController::class);

    Route::post('/logout', [ApiAuthController::class, 'logout']);

    Route::controller( ManageHoneyProdController::class)
        ->prefix('/honey-prod')->group(function () {
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'update');
            Route::delete('/{id}', 'destroy');
        });

    Route::controller(InterventionController::class)
        ->prefix('/interventions')->group(function () {
            Route::get('all/{apiaryId}', 'index');
            Route::post('/', 'store');
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'update');
            Route::delete('/{id}', 'destroy');
        });

    Route::controller(SwarmController::class)
        ->prefix('/swarms')->group(function () {
            Route::post('/clone/{swarmOriginID}', 'cloneSwarm');
            Route::get('/{swarm}/ascendant', 'ascendantSwarm');
        });

});
