<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Mobility\TrainController;
use App\Models\TrainStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//auth
Route::group([
    'prefix' => 'auth'
], function() {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('/verify-email', [AuthController::class, 'verify_email']);
});

Route::group([
    'prefix' => 'mobility',
    'middleware' => 'auth:sanctum'
], function() {

    //Train
    Route::group([
        'prefix' => 'train'
    ], function() {
        Route::get('/list-station', function() {
            return TrainStation::get();
        });
        Route::post('/create-train', [TrainController::class, 'createTrain']);
        Route::get('/list-train', [TrainController::class, 'listTrain']);
        Route::get('/detail-train/{id}', [TrainController::class, 'detailTrain']);
    });
});
