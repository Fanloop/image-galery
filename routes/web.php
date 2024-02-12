<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthGoogleController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Feature\ComponentController;
use App\Http\Controllers\Feature\Profile\EditController;
use App\Http\Controllers\Page\HomePageController;
use App\Http\Controllers\Page\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomePageController::class, 'root'])->name('main');

Route::middleware('is.login')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::post('/login', 'loginProses')->name('login.proses');
        Route::post('/register', 'registerProses')->name('register.proses');
        Route::get('/logout', 'logout')->name('logout')->withoutMiddleware('is.login');
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
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomePageController::class, 'home'])->name('home');
    Route::prefix('/profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'myProfile'])->name('user');
        Route::get('/edit', [EditController::class, 'index'])->name('edit');
    });
});
