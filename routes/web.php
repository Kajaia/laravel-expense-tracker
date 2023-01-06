<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::view('/login', 'auth.login')->name('login');

    Route::name('auth.')->group(function () {
        Route::post('/register', RegisterController::class)->name('register');
        Route::post('/login', LoginController::class)->name('login');
    });
});

Route::middleware('auth')->group(function () {
    Route::view('/', 'index')->name('home');
    Route::get('/{category:title}', [ActivityController::class, 'show'])
        ->name('activities.show');
    Route::delete('/{category:title}/{activity}', [ActivityController::class, 'destroy'])
        ->name('activities.destroy');

    Route::post('/logout', LogoutController::class)->name('logout');
});
