
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;

// Landing Page
Route::get('/', function () {
    return view('landing.home');
})->name('home');

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

// Layanan
Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

// Detail Pesanan
Route::get('/detail-pesanan', function () {
    return view('detail_pesanan');
})->name('detail_pesanan');
