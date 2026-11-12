<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    // Menampilkan semua data layanan
    public function index()
    {
        // Mengambil semua data dari tabel services
        $layanans = DB::table('services')
            ->orderBy('services_id', 'desc')
            ->get();

        // Mengirim data ke halaman layanan
        return view('layanan', compact('layanans'));
    }


    // Menghapus data layanan
    public function destroy($id)
    {
        // Memeriksa apakah layanan tersedia
        $layanan = DB::table('services')
            ->where('services_id', $id)
            ->first();

        // Jika layanan tidak ditemukan
        if (!$layanan) {
            abort(404);
        }

        // Memeriksa apakah layanan sudah digunakan pesanan
        $hasOrders = DB::table('orders')
            ->where('services_id', $id)
            ->exists();

        // Jika layanan sudah digunakan, penghapusan ditolak
        if ($hasOrders) {
            return redirect()
                ->route('layanan')
                ->with(
                    'error',
                    'Layanan tidak bisa dihapus karena sudah digunakan dalam pesanan.'
                );
        }

        // Menghapus layanan berdasarkan ID
        DB::table('services')
            ->where('services_id', $id)
            ->delete();

        // Kembali ke halaman layanan
        return redirect()
            ->route('layanan')
            ->with('success', 'Layanan berhasil dihapus!');
    }
}
