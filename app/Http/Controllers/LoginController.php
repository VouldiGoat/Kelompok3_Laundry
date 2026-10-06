<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
{
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return view('login');
}
}
