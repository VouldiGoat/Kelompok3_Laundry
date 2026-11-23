<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DetailPesananController extends Controller
{
    // Menampilkan daftar nomor pesanan
    public function index()
    {
        $orders = Order::orderBy('orders_id', 'desc')
            ->get();

        return view('detail_pesanan', compact('orders'));
    }


    // Menampilkan rincian satu pesanan
    public function show($id)
    {
        // Mengambil pesanan beserta layanan, zona, dan pembayaran
        $order = Order::with([
            'service',
            'deliveryZone',
            'payments',
        ])->findOrFail($id);

        return view('detail_pesanan_show', compact('order'));
    }


    // Memperbarui detail pesanan oleh admin
    public function update(Request $request, $id)
    {
        // Mencari pesanan
        $order = Order::findOrFail($id);

        // Mengambil pembayaran yang terkait
        $payment = $order->payments()->first();


        // Aturan validasi
        $rules = [

            // Status pengerjaan laundry
            'orders_status' => 'required|in:PENDING,COMPLETE',

            // Tanggal antar tidak boleh sebelum tanggal jemput
            'delivery_date' => [
                'nullable',
                'date',
                'after_or_equal:' . $order->pickup_date,
            ],

            // Catatan pelanggan
            'notes' => 'nullable|string',

            // Dokumen pesanan
            'dokumen' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ];


        // Validasi status pembayaran jika transaksi tersedia
        if ($payment) {
            $rules['payment_status'] =
                'required|in:MENUNGGU_VERIFIKASI,TERVERIFIKASI';
        }


        $validated = $request->validate($rules);


        // Pembayaran tidak boleh diverifikasi tanpa bukti
        if (
            $payment &&
            $validated['payment_status'] === 'TERVERIFIKASI' &&
            !$payment->payment_proof
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'payment_status' =>
                        'Pembayaran belum memiliki bukti untuk diverifikasi.',
                ]);
        }


        // Menyimpan path dokumen lama
        $oldDocument = $order->order_detail_dok;

        // Menyiapkan path dokumen baru
        $newDocumentPath = null;


        // Jika admin mengunggah dokumen baru
        if ($request->hasFile('dokumen')) {

            $newDocumentPath = $request->file('dokumen')
                ->store('order-documents', 'public');

            if (!$newDocumentPath) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'dokumen' => 'Dokumen gagal diunggah.',
                    ]);
            }
        }


        try {

            // Memulai transaksi database
            DB::transaction(function () use (
                $order,
                $payment,
                $validated,
                $newDocumentPath
            ) {

                // Memperbarui status pesanan
                $order->orders_status = $validated['orders_status'];

                // Memperbarui tanggal antar
                $order->delivery_date =
                    $validated['delivery_date'] ?? null;

                // Memperbarui catatan
                $order->notes = $validated['notes'] ?? null;

                // Memperbarui dokumen jika ada file baru
                if ($newDocumentPath) {
                    $order->order_detail_dok = $newDocumentPath;
                }

                // Simpan pesanan
                $order->save();


                // Memperbarui status pembayaran
                if ($payment) {

                    $payment->payment_status =
                        $validated['payment_status'];

                    // Menyimpan waktu verifikasi
                    if ($validated['payment_status'] === 'TERVERIFIKASI') {

                        $payment->paid_at =
                            $payment->paid_at ?? now();

                    } else {

                        $payment->paid_at = null;
                    }

                    $payment->save();
                }

            });


        } catch (\Throwable $e) {

            // Menghapus dokumen baru jika database gagal menyimpan
            if ($newDocumentPath) {
                Storage::disk('public')->delete($newDocumentPath);
            }

            throw $e;
        }


        // Menghapus dokumen lama setelah dokumen baru berhasil disimpan
        if (
            $newDocumentPath &&
            $oldDocument &&
            $oldDocument !== $newDocumentPath
        ) {
            Storage::disk('public')->delete($oldDocument);
        }


        // Kembali ke halaman rincian pesanan
        return redirect()
            ->route('detail_pesanan.show', $order->orders_id)
            ->with('success', 'Detail pesanan berhasil diperbarui!');
    }
}
