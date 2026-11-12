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
        // Jika sudah login, langsung ke dashboard
        if (session()->has('admin_id')) {
            return redirect()->route('dashboard');
        }

        // Menampilkan halaman login
        $response = response()->view('login');

        // Mencegah halaman login tersimpan di cache
        $response->headers->set(
            'Cache-Control',
            'no-cache, no-store, must-revalidate'
        );

        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
    }


    // Memproses login admin
    public function login(Request $request)
    {
        // Validasi username dan password
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mencari admin berdasarkan username
        $admin = Admin::where(
            'username',
            $validated['username']
        )->first();

        // Memeriksa akun dan password
        if (
            !$admin ||
            !Hash::check($validated['password'], $admin->password)
        ) {
            return back()
                ->withErrors([
                    'username' => 'Username atau password salah.',
                ])
                ->withInput($request->only('username'));
        }

        // Mengganti ID session setelah login berhasil
        $request->session()->regenerate();

        // Menyimpan identitas admin ke session
        $request->session()->put([
            'admin_id' => $admin->admin_id,
            'admin_username' => $admin->username,
        ]);

        // Menuju halaman yang diminta sebelumnya,
        // atau dashboard jika tidak ada URL tujuan
        return redirect()->intended(route('dashboard'));
    }


    // Memproses logout admin
    public function logout(Request $request)
    {
        // Menghapus seluruh session
        $request->session()->invalidate();

        // Membuat token CSRF baru
        $request->session()->regenerateToken();

        // Kembali ke halaman login
        return redirect()->route('login');
    }
}
