<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Landing Page
Route::get('/', function () {
    return view('landing.home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    return redirect()->route('dashboard');
})->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/pesanan', function () {
    return view('pesanan');
})->name('pesanan');

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

Route::get('/detail-pesanan', function () {
    return view('detail_pesanan');
})->name('detail_pesanan');