
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LayananController;

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
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');;

// Pesanan
Route::get('/pesanan', [PesananController::class, 'index'])
    ->name('pesanan');

// Layanan
Route::get('/layanan', [LayananController::class, 'index'])
    ->name('layanan');

// Detail Pesanan
Route::get('/detail-pesanan', [PesananController::class, 'show'])
    ->name('detail_pesanan');
