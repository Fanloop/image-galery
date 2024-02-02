<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthGoogleController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'work';
})->name('main');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/login', 'loginProses')->name('login.proses');
    Route::post('/register', 'registerProses')->name('register.proses');
    // Route::post('/logout');
});
Route::name('google.')->controller(AuthGoogleController::class)->group(function () {
    Route::get('/auth/google', 'auth')->name('auth');
    Route::get('/callback/google', 'callback')->name('callback');
});
Route::controller(PasswordController::class)->group(function () {
    Route::get('forgot-password', 'forgot')->name('forgot');
    Route::get('reset-password', 'reset')->name('reset');
    Route::post('forgot-password', 'forgotProses')->name('forgot.proses');
    Route::get('reset-password', 'resetProses')->name('reset.proses');
});
