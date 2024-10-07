<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CekLogin;


// Route::get('/', function () {
//     return redirect()->route('dashboard');
// });
// Route::get('/register', [BackController::class, 'register'])->name('register');
Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');
// Route::post('/post-register', [BackController::class, 'post_register'])->name('post-register');

Route::group(['prefix' => '/', 'middleware' => CekLogin::class], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::group(['prefix' => '/laporan'], function () {
        Route::get('/{divisi}', [LaporanController::class, 'index'])->name('laporan');
    });

});
