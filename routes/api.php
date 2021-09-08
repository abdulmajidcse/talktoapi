<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.')->group(function() {
    
    Route::name('v1.')->prefix('v1')->group(function() {
        Route::apiResource('todos', TodoController::class);
        /**
         * Authenticate routes
         */
        Route::middleware('guest:api')->group(function() {
            Route::post('register', [AuthController::class, 'register'])->name('register');
            Route::post('login', [AuthController::class, 'login'])->name('login');
        });

        Route::middleware('auth:api')->group(function() {
            Route::get('user', [AuthController::class, 'user'])->name('user');
            // Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
            // category crud routes
            Route::apiResource('categories', CategoryController::class);
            // post crud routes
            Route::apiResource('posts', PostController::class);
        });
    });

});