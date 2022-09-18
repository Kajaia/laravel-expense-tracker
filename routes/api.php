<?php

use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function() { 
    Route::middleware('guest')->group(function() {
        Route::post('/register', RegisterController::class);
        Route::post('/login', LoginController::class);
    });
    
    Route::middleware('auth:sanctum')->group(function() {
        Route::post('/logout', LogoutController::class);

        Route::get('/balance', [ActivityController::class, 'balance']);
        Route::put('/activities/create', [ActivityController::class, 'addActivity']);
        Route::get('/activities/all', [ActivityController::class, 'activities']);
        Route::get('/activities/expenses', [ActivityController::class, 'expenses']);
    });
});