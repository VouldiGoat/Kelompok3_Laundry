<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PemesananController extends Controller
{
    // Menampilkan form pemesanan
    public function create()
    {
        $services = Service::where('is_active', true)
            ->orderBy('services_name', 'asc')
            ->get();

        return view('landing.pesan', compact('services'));
    }


    // Menyimpan pesanan dan pembayaran
    public function store(Request $request)
    {
        // Validasi semua input pelanggan
        $validated = $request->validate([

            'nama_pemesan' => 'required|string|max:100',

            'services_id' => 'required|integer|exists:services,services_id',

            'jumlah' => 'required|numeric|gt:0|max:999999',

            'pickup_date' => 'required|date|after_or_equal:today',

            'pickup_time' => 'required|date_format:H:i',

            'addresses' => 'required|string|max:150',

            'delivery_date' => 'nullable|date|after_or_equal:pickup_date',

            'notes' => 'nullable|string',

            // Metode pembayaran wajib dipilih
            'payment_method' => 'required|in:QRIS,BCA,E-WALLET,TUNAI',

            // Bukti pembayaran wajib diunggah
            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);


        // Memastikan layanan masih aktif
        $service = Service::where(
            'services_id',
            $validated['services_id']
        )
        ->where('is_active', true)
        ->first();

        if (!$service) {
            return back()
                ->withInput()
                ->withErrors([
                    'services_id' => 'Layanan tidak tersedia atau sudah dinonaktifkan.',
                ]);
        }


        // Menghitung jumlah dan satuan
        $jumlah = (float) $validated['jumlah'];

        $jumlahFormat = rtrim(
            rtrim(number_format($jumlah, 2, '.', ''), '0'),
            '.'
        );

        $satuan = $jumlahFormat . ' Kg';


        // Menghitung harga di backend
        $subtotal = round(
            (float) $service->price * $jumlah,
            2
        );

        // Biaya antar sementara Rp0
        $deliveryFee = 0;

        // Total pembayaran
        $total = $subtotal + $deliveryFee;


        // Menyimpan file bukti pembayaran
        $proofPath = $request->file('payment_proof')
            ->store('payment-proofs', 'public');


        try {

            // Menyimpan pesanan dan pembayaran dalam satu transaksi
            $order = DB::transaction(function () use (
                $validated,
                $service,
                $satuan,
                $subtotal,
                $deliveryFee,
                $total,
                $proofPath
            ) {

                // Membuat pesanan
                $order = Order::create([

                    'services_id' => $service->services_id,

                    'nama_pemesan' => $validated['nama_pemesan'],

                    'addresses' => $validated['addresses'],

                    'pickup_date' => $validated['pickup_date'],

                    'satuan' => $satuan,

                    'pickup_time' => $validated['pickup_time'],

                    'delivery_date' => $validated['delivery_date'] ?? null,

                    'subtotal' => $subtotal,

                    'delivery_fee' => $deliveryFee,

                    'total' => $total,

                    'notes' => $validated['notes'] ?? null,

                    // orders_status otomatis PENDING
                    // order_detail_dok otomatis NULL
                ]);


                // Membuat pembayaran yang terhubung dengan pesanan
                Payment::create([

                    'order_id' => $order->orders_id,

                    'payment_method' => $validated['payment_method'],

                    'amount' => $total,

                    'payment_proof' => $proofPath,

                    'payment_status' => 'MENUNGGU_VERIFIKASI',

                    // Menunggu admin melakukan verifikasi
                    'paid_at' => null,

                    'created_at' => now(),

                ]);

                return $order;
            });


        } catch (\Throwable $e) {

            // Jika transaksi database gagal,
            // hapus juga file yang sudah terlanjur diunggah
            Storage::disk('public')->delete($proofPath);

            throw $e;
        }


        // Kembali ke form dengan pesan berhasil
        return redirect()
            ->route('pesan')
            ->with(
                'success',
                'Pesanan berhasil dikirim! Nomor pesanan Anda: ORD-' .
                str_pad($order->orders_id, 5, '0', STR_PAD_LEFT)
            );
    }
}
