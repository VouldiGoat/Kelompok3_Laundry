<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LayananController;


// ======================================
// LANDING PAGE
// ======================================

// Halaman utama tetap bisa diakses publik
Route::get('/', function () {
    return view('landing.home');
})->name('home');

// Pesan Sekarang (Landing Page Form Pemesanan)
Route::get('/pesan', function () {
    return view('landing.pesan');
})->name('pesan');


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
        Route::get('/layanan', [LayananController::class, 'index'])
            ->name('layanan');

        // Detail Pesanan
        Route::view('/detail-pesanan', 'detail_pesanan')
            ->name('detail_pesanan');

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
