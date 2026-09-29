<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('login');
    }

    // Memproses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari admin berdasarkan username
        $admin = Admin::where('username', $request->username)->first();

        // Cek admin dan password
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()
                ->withErrors([
                    'username' => 'Username atau password salah.',
                ])
                ->withInput();
        }

        // Simpan data admin ke session
        session([
            'admin_id' => $admin->admin_id,
            'admin_username' => $admin->username,
        ]);

        // Arahkan ke dashboard
        return redirect('/dashboard');
    }

    // Logout
    public function logout()
    {
        session()->forget([
            'admin_id',
            'admin_username',
        ]);

        return redirect('/login');
    }
}