<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function () {
    return 'Login berhasil diproses';
});
