<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CekLogin;

Route::get('/', function () {
    return view('maintenance');
});

// Route::get('/', function () {
//     return redirect()->route('home');
// });

// // Route::get('/register', [BackController::class, 'register'])->name('register');
// Route::get('/login', [BackController::class, 'login'])->name('login');
// Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
// Route::post('/logout', [BackController::class, 'logout'])->name('logout');
// // Route::post('/post-register', [BackController::class, 'post_register'])->name('post-register');
// Route::group(['prefix' => '/dashboard', 'middleware' => CekLogin::class], function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('home');

//     // Laporan Route
//     Route::group(['prefix' => '/laporan'], function () {
//         Route::get('/go/{divisi_nama}', [LaporanController::class, 'index'])->name('laporan');
//         Route::get('/get-laporan', [LaporanController::class, 'get_laporan'])->name('get-laporan');
//         Route::post('/hapus-laporan', [LaporanController::class, 'hapus_laporan'])->name('hapus-laporan');
//         Route::post('/edit-laporan', [LaporanController::class, 'edit_laporan'])->name('edit-laporan');
//         Route::post('/konfirmasi-laporan', [LaporanController::class, 'konfirmasi_laporan'])->name('konfirmasi-laporan');
//         Route::post('/proses-laporan', [LaporanController::class, 'proses_laporan'])->name('proses-laporan');
//         Route::post('/print-laporan', [LaporanController::class, 'print_laporan'])->name('print-laporan');
//         Route::post('/ubah-password', [BackController::class, 'ubah_password'])->name('ubah-password');
//     });

//     // Divisi Route
//     Route::group(['prefix' => '/divisi'], function () {
//         Route::get('/go/{divisi_nama}', [DashboardController::class, 'index_divisi'])->name('index-divisi');
//     });
// });

// // Files Route
// Route::group(['prefix' => '/archive', 'middleware' => CekLogin::class], function () {
//     Route::get('/', [FilingController::class, 'index'])->name('files');
// });

// Route::get('/generate-area', [GenerateController::class, 'generate_area'])->name('generate-area');
