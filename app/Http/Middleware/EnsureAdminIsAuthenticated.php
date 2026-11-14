<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminIsAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah admin sudah login
        if (!$request->session()->has('admin_id')) {

            // Jika belum login, arahkan ke halaman login
            // sekaligus menyimpan URL yang ingin diakses
            return redirect()->guest(route('login'));
        }

        // Jika session tersedia, lanjutkan ke halaman tujuan
        return $next($request);
    }
}
