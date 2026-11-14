
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;

// Landing Page
Route::get('/', function () {
    return view('landing.home');
})->name('home');

// Pesan Sekarang (Landing Page Form Pemesanan)
Route::get('/pesan', function () {
    return view('landing.pesan');
})->name('pesan');

// Login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Pesanan
Route::get('/pesanan', [PesananController::class, 'index'])
    ->name('pesanan');

// Tambah Pesanan
Route::get('/pesanan/tambah', function () {
    return view('tambah_pesanan');
})->name('pesanan.tambah');

// Edit Pesanan
Route::get('/pesanan/edit', function () {
    return view('edit_pesanan');
})->name('pesanan.edit');

// Layanan
Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

// Tambah Layanan
Route::get('/layanan/tambah', function () {
    return view('tambah_layanan');
})->name('layanan.tambah');

// Edit Layanan
Route::get('/layanan/edit', function () {
    return view('edit_layanan');
})->name('layanan.edit');

// Detail Pesanan (Tabel)
Route::get('/detail-pesanan', function () {
    return view('detail_pesanan');
})->name('detail_pesanan');

// Form Detail Pesanan (Tambah / Edit)
Route::get('/pesanan/detail', function () {
    return view('form_detail_pesanan');
})->name('pesanan.detail');
