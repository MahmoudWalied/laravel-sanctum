<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public Routes
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);


// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);

    Route::resource('/tasks', App\Http\Controllers\TasksController::class);
});
