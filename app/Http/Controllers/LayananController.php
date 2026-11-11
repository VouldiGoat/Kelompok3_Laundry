<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    public function index()
    {

    if (!session()->has('admin_id')) {
            return redirect()->route('login');
        }

        // Mengambil semua data dari tabel services
        $layanans = DB::table('services')
            ->orderBy('services_id', 'desc')
            ->get();

        // Mengirim data ke halaman layanan
        return view('layanan', compact('layanans'));
    }
}