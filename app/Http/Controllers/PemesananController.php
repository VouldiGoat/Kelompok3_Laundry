<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\Payment;
use App\Models\DeliveryZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
    // Menampilkan form pemesanan
    public function create()
    {
        // Mengambil layanan yang masih aktif
        $services = Service::where('is_active', true)
            ->orderBy('services_name', 'asc')
            ->get();

        // Mengambil zona pengiriman yang masih aktif
        $zones = DeliveryZone::where('is_active', true)
            ->orderBy('zone_name', 'asc')
            ->get();

        // Mengirim layanan dan zona ke halaman form
        return view('landing.pesan', compact(
            'services',
            'zones'
        ));
    }


    // Menyimpan pesanan dan pembayaran
    public function store(Request $request)
    {
        // Validasi data pelanggan
        $validated = $request->validate([

            'nama_pemesan' => 'required|string|max:100',

            'services_id' => 'required|integer|exists:services,services_id',

            'delivery_zone_id' => 'required|integer|exists:delivery_zones,delivery_zones_id',

            'jumlah' => 'required|numeric|gt:0|max:999999',

            'pickup_date' => 'required|date|after_or_equal:today',

            'pickup_time' => 'required|date_format:H:i',

            'addresses' => 'required|string|max:150',

            'delivery_date' => 'nullable|date|after_or_equal:pickup_date',

            'notes' => 'nullable|string',

            'payment_method' => 'required|in:QRIS,BCA,E-WALLET,TUNAI',

            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);


        // Pastikan layanan yang dipilih masih aktif
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
                    'services_id' => 'Layanan tidak tersedia.',
                ]);
        }


        // Pastikan zona yang dipilih masih aktif
        $zone = DeliveryZone::where(
            'delivery_zones_id',
            $validated['delivery_zone_id']
        )
        ->where('is_active', true)
        ->first();

        if (!$zone) {
            return back()
                ->withInput()
                ->withErrors([
                    'delivery_zone_id' => 'Zona pengiriman tidak tersedia.',
                ]);
        }


        // Menghitung jumlah cucian
        $jumlah = (float) $validated['jumlah'];

        // Membentuk satuan secara otomatis
        $jumlahFormat = rtrim(
            rtrim(number_format($jumlah, 2, '.', ''), '0'),
            '.'
        );

        $satuan = $jumlahFormat . ' Kg';


        // Menghitung subtotal dari harga layanan
        $subtotal = round(
            (float) $service->price * $jumlah,
            2
        );

        // Mengambil biaya antar dari database zona
        // Bukan dari input browser
        $deliveryFee = (float) $zone->delivery_fee;

        // Menghitung total
        $total = round($subtotal + $deliveryFee, 2);


        // Menyimpan file bukti pembayaran
        $proofPath = $request->file('payment_proof')
            ->store('payment-proofs', 'public');

        if (!$proofPath) {
            return back()
                ->withInput()
                ->withErrors([
                    'payment_proof' => 'Bukti pembayaran gagal diunggah.',
                ]);
        }


        try {

            // Menyimpan pesanan dan pembayaran dalam satu transaksi
            $order = DB::transaction(function () use (
                $validated,
                $service,
                $zone,
                $satuan,
                $subtotal,
                $deliveryFee,
                $total,
                $proofPath
            ) {

                // Membuat data pesanan
                $order = Order::create([

                    'services_id' => $service->services_id,

                    'delivery_zone_id' => $zone->delivery_zones_id,

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

                    // Status dan dokumen menggunakan default/null
                    // dari migration orders
                ]);


                // Membuat data pembayaran
                Payment::create([

                    'order_id' => $order->orders_id,

                    'payment_method' => $validated['payment_method'],

                    'amount' => $total,

                    'payment_proof' => $proofPath,

                    'payment_status' => 'MENUNGGU_VERIFIKASI',

                    'paid_at' => null,

                    'created_at' => now(),

                ]);

                return $order;
            });


        } catch (\Throwable $e) {

            // Menghapus file jika penyimpanan transaksi gagal
            Storage::disk('public')->delete($proofPath);

            throw $e;
        }


        // Kembali ke form setelah pesanan berhasil dibuat
        return redirect()
            ->route('pesan')
            ->with(
                'success',
                'Pesanan berhasil dikirim! Nomor pesanan Anda: ORD-' .
                str_pad($order->orders_id, 5, '0', STR_PAD_LEFT)
            );
    }
}
