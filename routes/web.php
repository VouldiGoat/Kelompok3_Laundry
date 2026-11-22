<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\DetailPesananController;


// ======================================
// LANDING PAGE
// ======================================

// Halaman utama tetap bisa diakses publik
Route::get('/', function () {
    return view('landing.home');
})->name('home');

// Halaman Tentang Kami
Route::get('/tentang-kami', function () {
    return view('landing.tentang');
})->name('tentang');

Route::get('/tentang', function () {
    return view('landing.tentang');
});

// ======================================
// FORM PEMESANAN (DARI LANDING PAGE)
// ======================================

// Form pemesanan pelanggan
Route::get('/pesan', [PemesananController::class, 'create'])
    ->name('pesan');

// Mengirim pesanan pelanggan
Route::post('/pesan', [PemesananController::class, 'store'])
    ->name('pesan.store');


// ======================================
// LOGIN
// ======================================

// Menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Memproses login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Memproses logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// ======================================
// SEMUA SECTION ADMIN
// WAJIB LOGIN
// ======================================

Route::prefix('login')
    ->middleware('admin')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Pesanan
        Route::get('/pesanan', [PesananController::class, 'index'])
            ->name('pesanan');

        // Layanan
        
        // Menampilkan halaman layanan
        Route::get('/layanan', [LayananController::class, 'index'])
            ->name('layanan');

        // Menampilkan form tambah layanan
        Route::get('/layanan/tambah', [LayananController::class, 'create'])
            ->name('layanan.create');

        // Menyimpan layanan baru
        Route::post('/layanan', [LayananController::class, 'store'])
            ->name('layanan.store');

        // Menghapus layanan
        Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])
            ->name('layanan.destroy');

        // Detail Pesanan
        
        // Detail Pesanan - Daftar nomor pesanan
        Route::get('/detail-pesanan', [DetailPesananController::class, 'index'])
            ->name('detail_pesanan');

        // Detail Pesanan - Melihat satu pesanan
        Route::get('/detail-pesanan/{id}', [DetailPesananController::class, 'show'])
            ->name('detail_pesanan.show');

        // Detail Pesanan - Menyimpan perubahan admin
        Route::put('/detail-pesanan/{id}', [DetailPesananController::class, 'update'])
            ->name('detail_pesanan.update');

        // Pembayaran
        Route::view('/pembayaran', 'pembayaran')
            ->name('pembayaran.admin');

    });


// ======================================
// PENGALIHAN URL LAMA
// ======================================

// Jika seseorang masih membuka URL lama,
// arahkan ke URL admin yang baru.

Route::redirect('/dashboard', '/login/dashboard');

Route::redirect('/pesanan', '/login/pesanan');

Route::redirect('/layanan', '/login/layanan');

Route::redirect('/detail-pesanan', '/login/detail-pesanan');


// ======================================
// PEMBAYARAN
// ======================================

Route::get('/pembayaran', function () {
    return view('pembayaran');
})->name('pembayaran');


// ======================================
// FORM TAMBAH / EDIT / DETAIL
// ======================================

// Tambah Pesanan
Route::get('/pesanan/tambah', function () {
    return view('tambah_pesanan');
})->name('pesanan.tambah');

// Edit Pesanan
Route::get('/pesanan/edit', function () {
    return view('edit_pesanan');
})->name('pesanan.edit');

// Tambah Layanan
Route::get('/layanan/tambah', function () {
    return view('tambah_layanan');
})->name('layanan.tambah');

// Edit Layanan
Route::get('/layanan/edit', function () {
    return view('edit_layanan');
})->name('layanan.edit');

// Form Detail Pesanan (Tambah / Edit)
Route::get('/pesanan/detail', function () {
    return view('form_detail_pesanan');
})->name('pesanan.detail');


// ======================================
// TOMBOL HAPUS (ACTION DELETE)
// ======================================

// Hapus Layanan
Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])
    ->name('layanan.destroy');

// Hapus Pesanan
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])
    ->name('pesanan.destroy');


