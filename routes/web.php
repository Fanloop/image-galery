<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthGoogleController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Page\HomePageController;
use App\Http\Controllers\Page\ProfileController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Models\Album;
use App\Models\Follow;
use Illuminate\Contracts\Database\Eloquent\Builder;
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

// Route::get('/testing', Main::class);

Route::get('/', [HomePageController::class, 'root'])->name('main');
Route::get('/test', function () {
    return dd($this->following = Follow::query()->where('user', '$user')
        ->where('following_id', 'haf')
        ->count());
});

Route::middleware('is.login')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', Login::class)->name('login');
        Route::get('/register', Register::class)->name('register');
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
    Route::get('/home', \App\Livewire\App\Layout\Home::class)->name('home');
    Route::prefix('/profile')->name('profile.')->group(function () {
        Route::get('/{id?}', \App\Livewire\App\Layout\Profile::class)->name('user');
    });
    Route::get('/search', \App\Livewire\App\Layout\Search::class)->name('search');
    Route::get('/upload', \App\Livewire\App\Layout\Upload::class)->name('upload');
});
