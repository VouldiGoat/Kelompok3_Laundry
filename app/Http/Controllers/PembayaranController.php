<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class PembayaranController extends Controller
{
    // Menampilkan daftar pembayaran pelanggan
    public function index()
    {
        // Mengambil pembayaran beserta pesanan dan layanan
        $payments = Payment::with([
            'order.service'
        ])
        ->orderBy('payment_id', 'desc')
        ->get();

        // Mengirim data ke halaman pembayaran
        return view('pembayaran', compact('payments'));
    }
}
