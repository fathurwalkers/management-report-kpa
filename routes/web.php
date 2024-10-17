<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CekLogin;

Route::get('/', function () {
    return redirect()->route('home');
});
// Route::get('/register', [BackController::class, 'register'])->name('register');
Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');
// Route::post('/post-register', [BackController::class, 'post_register'])->name('post-register');
Route::group(['prefix' => '/dashboard', 'middleware' => CekLogin::class], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::group(['prefix' => '/laporan'], function () {
        Route::get('/go/{divisi_nama}', [LaporanController::class, 'index'])->name('laporan');
        Route::get('/get-laporan', [LaporanController::class, 'get_laporan'])->name('get-laporan');
        Route::post('/hapus-laporan', [LaporanController::class, 'hapus_laporan'])->name('hapus-laporan');
        Route::post('/edit-laporan', [LaporanController::class, 'edit_laporan'])->name('edit-laporan');
        Route::post('/konfirmasi-laporan', [LaporanController::class, 'konfirmasi_laporan'])->name('konfirmasi-laporan');
        Route::post('/proses-laporan', [LaporanController::class, 'proses_laporan'])->name('proses-laporan');
        Route::post('/print-laporan', [LaporanController::class, 'print_laporan'])->name('print-laporan');
    });
    Route::group(['prefix' => '/divisi'], function () {
        Route::get('/go/{divisi_nama}', [DashboardController::class, 'index_divisi'])->name('index-divisi');
    });
});
