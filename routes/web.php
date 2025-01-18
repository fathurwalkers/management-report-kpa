<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CekLogin;


// ========================================================================================================

// MAINTENANCE ROUTES
// Route::get('/', function () {
//     return view('maintenance');
// });

// ========================================================================================================
// ========================================================================================================

// MAIN ROUTES
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');
Route::group(['prefix' => '/dashboard', 'middleware' => CekLogin::class], function () {

    // Index Route
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/buat-user', [DashboardController::class, 'buat_user'])->name('buat-user');
    Route::get('/tambah-area-kerja', [DashboardController::class, 'tambah_area_kerja'])->name('tambah-area-kerja');
    Route::get('/tambah-periode', [DashboardController::class, 'tambah_periode'])->name('tambah-periode');
    Route::post('/buat-user/proses', [DashboardController::class, 'proses_buat_user'])->name('proses-buat-user');
    Route::get('/file/preview/{id}', [FilingController::class, 'preview'])->name('file-preview');

    // Laporan Route
    Route::group(['prefix' => '/laporan'], function () {
        Route::get('/go/{divisi_nama}', [LaporanController::class, 'index'])->name('laporan');
        Route::get('/get-laporan', [LaporanController::class, 'get_laporan'])->name('get-laporan');
        Route::get('/edit-laporan-view/{id_laporan}', [LaporanController::class, 'edit_laporan_view'])->name('edit-laporan-view');
        Route::post('/hapus-laporan', [LaporanController::class, 'hapus_laporan'])->name('hapus-laporan');
        Route::post('/edit-laporan', [LaporanController::class, 'edit_laporan'])->name('edit-laporan');
        Route::post('/konfirmasi-laporan', [LaporanController::class, 'konfirmasi_laporan'])->name('konfirmasi-laporan');
        Route::post('/proses-laporan', [LaporanController::class, 'proses_laporan'])->name('proses-laporan');
        Route::post('/print-laporan', [LaporanController::class, 'print_laporan'])->name('print-laporan');
        Route::post('/ubah-password', [BackController::class, 'ubah_password'])->name('ubah-password');
    });

    // Divisi Route
    Route::group(['prefix' => '/divisi'], function () {
        Route::get('/go/{divisi_nama}', [DashboardController::class, 'index_divisi'])->name('index-divisi');
    });
});

// Files Route
Route::group(['prefix' => '/archive', 'middleware' => CekLogin::class], function () {
    Route::get('/', [FilingController::class, 'index'])->name('files');
});

Route::get('/generate-area', [GenerateController::class, 'generate_area'])->name('generate-area');
