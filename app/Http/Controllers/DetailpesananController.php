<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
        $order = Order::with('service')
            ->findOrFail($id);

        return view('detail_pesanan_show', compact('order'));
    }


    // Memperbarui informasi pesanan oleh admin
    public function update(Request $request, $id)
    {
        // Mencari pesanan berdasarkan ID
        $order = Order::findOrFail($id);

        // Validasi data yang boleh diubah admin
        $validated = $request->validate([
            'orders_status' => 'required|in:PENDING,COMPLETE',

            'delivery_date' => 'nullable|date',

            'notes' => 'nullable|string',

            'dokumen' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        // Memastikan tanggal antar tidak sebelum tanggal jemput
        if (
            !empty($validated['delivery_date']) &&
            Carbon::parse($validated['delivery_date'])
                ->lt(Carbon::parse($order->pickup_date))
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'delivery_date' =>
                        'Tanggal antar tidak boleh sebelum tanggal jemput.',
                ]);
        }

        // Menyimpan nama dokumen lama
        $oldDocument = $order->order_detail_dok;

        // Jika admin mengunggah dokumen baru
        if ($request->hasFile('dokumen')) {

            $file = $request->file('dokumen');

            // Membuat nama dokumen baru yang unik
            $fileName = Str::random(24) . '.' . $file->extension();

            // Menyimpan dokumen di storage/app/public
            Storage::disk('public')->putFileAs(
                '',
                $file,
                $fileName
            );

            // Mengubah kolom dokumen dengan nama file baru
            $order->order_detail_dok = $fileName;
        }

        // Memperbarui status pesanan
        $order->orders_status = $validated['orders_status'];

        // Memperbarui tanggal antar
        $order->delivery_date = $validated['delivery_date'] ?? null;

        // Memperbarui catatan
        $order->notes = $validated['notes'] ?? null;

        // Menyimpan semua perubahan
        $order->save();

        // Menghapus dokumen lama setelah dokumen baru berhasil disimpan
        if (
            $request->hasFile('dokumen') &&
            $oldDocument &&
            $oldDocument !== $order->order_detail_dok
        ) {
            Storage::disk('public')->delete($oldDocument);
        }

        // Kembali ke halaman detail pesanan
        return redirect()
            ->route('detail_pesanan.show', $order->orders_id)
            ->with('success', 'Detail pesanan berhasil diperbarui!');
    }
}
