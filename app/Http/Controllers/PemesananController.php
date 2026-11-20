<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // Menampilkan form pemesanan
    public function create()
    {
        // Mengambil layanan yang masih aktif
        $services = Service::where('is_active', true)
            ->orderBy('services_name', 'asc')
            ->get();

        // Menampilkan halaman pesan dari folder landing
        return view('landing.pesan', compact('services'));
    }


    // Menyimpan pesanan pelanggan
    public function store(Request $request)
    {
        // Validasi data dari form
        $validated = $request->validate([
            'nama_pemesan' => 'required|string|max:100',
            'services_id' => 'required|integer|exists:services,services_id',
            'jumlah' => 'required|numeric|gt:0|max:999999',
            'pickup_date' => 'required|date|after_or_equal:today',
            'pickup_time' => 'required|date_format:H:i',
            'addresses' => 'required|string|max:150',
            'delivery_date' => 'nullable|date|after_or_equal:pickup_date',
            'notes' => 'nullable|string',
        ]);

        // Mengambil layanan yang dipilih pelanggan
        // Layanan harus berstatus aktif
        $service = Service::where('services_id', $validated['services_id'])
            ->where('is_active', true)
            ->first();

        if (!$service) {
            return back()
                ->withInput()
                ->withErrors([
                    'services_id' => 'Layanan tidak tersedia.',
                ]);
        }

        // Mengambil jumlah pesanan
        $jumlah = (float) $validated['jumlah'];

        // Menyimpan jumlah ke kolom satuan
        // Contoh: 3 Kg
        $jumlahFormat = rtrim(
            rtrim(number_format($jumlah, 2, '.', ''), '0'),
            '.'
        );

        $satuan = $jumlahFormat . ' Kg';

        // Menghitung subtotal otomatis
        $subtotal = (float) $service->price * $jumlah;

        // Biaya antar sementara Rp0
        $deliveryFee = 0;

        // Menghitung total otomatis
        $total = $subtotal + $deliveryFee;

        // Menyimpan pesanan ke database
        $order = Order::create([
            'services_id' => $service->services_id,
            'nama_pemesan' => $validated['nama_pemesan'],
            'addresses' => $validated['addresses'],
            'pickup_date' => $validated['pickup_date'],
            'pickup_time' => $validated['pickup_time'],
            'delivery_date' => $validated['delivery_date'] ?? null,
            'satuan' => $satuan,
            'subtotal' => $subtotal,
            'delivery_fee' => $deliveryFee,
            'total' => $total,
            'notes' => $validated['notes'] ?? null,
        ]);

        // Kembali setelah pesanan berhasil dibuat
        return redirect()
            ->route('pesan')
            ->with(
                'success',
                'Pesanan berhasil dikirim! Nomor pesanan: ORD-' .
                str_pad($order->orders_id, 5, '0', STR_PAD_LEFT)
            );
    }
}
