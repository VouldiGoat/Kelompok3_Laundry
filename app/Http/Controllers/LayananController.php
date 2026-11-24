<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    // Menampilkan seluruh data layanan
    public function index()
    {
        $layanans = Service::orderBy('services_id', 'desc')
            ->get();

        return view('layanan', compact('layanans'));
    }


    // Menampilkan form tambah layanan
    public function create()
    {
        return view('tambah_layanan');
    }


    // Menyimpan layanan baru
    public function store(Request $request)
    {
        // Validasi data dari form
        $validated = $request->validate([
            'services_name' => 'required|string|max:100',

            'description' => 'nullable|string',

            'price' => 'required|numeric|min:0|max:9999999999.99',

            'is_active' => 'required|boolean',
        ]);

        // Menyimpan layanan menggunakan Model Service
        Service::create($validated);

        // Kembali ke halaman layanan
        return redirect()
            ->route('layanan')
            ->with('success', 'Layanan berhasil ditambahkan!');
    }


    // Menghapus layanan
    public function destroy($id)
    {
        // Mencari layanan berdasarkan ID
        $layanan = Service::findOrFail($id);

        // Memeriksa apakah layanan sudah digunakan pesanan
        $hasOrders = Order::where('services_id', $id)->exists();

        if ($hasOrders) {
            return redirect()
                ->route('layanan')
                ->with(
                    'error',
                    'Layanan tidak bisa dihapus karena sudah digunakan dalam pesanan.'
                );
        }

        // Menghapus layanan
        $layanan->delete();

        return redirect()
            ->route('layanan')
            ->with('success', 'Layanan berhasil dihapus!');
    }


// Menampilkan modal edit layanan
public function edit($id)
{
    // Mengambil seluruh layanan untuk tabel
    $layanans = Service::orderBy('services_id', 'desc')
        ->get();

    // Mengambil layanan berdasarkan ID yang diklik
    $currentLayanan = Service::findOrFail($id);

    // Mengirim data ke halaman layanan
    return view('layanan', compact(
        'layanans',
        'currentLayanan'
    ));
}


    // Menyimpan perubahan layanan
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $validated = $request->validate([

            'services_name' => 'required|string|max:100',

            'price' => 'required|numeric|min:0|max:9999999999.99',

            'description' => 'nullable|string',

            'is_active' => 'required|in:0,1',

        ]);

        // Mencari layanan berdasarkan ID
        $layanan = Service::findOrFail($id);

        // Memperbarui seluruh data layanan
        $layanan->update([

            'services_name' => $validated['services_name'],

            'price' => $validated['price'],

            'description' => $validated['description'] ?? null,

            'is_active' => (int) $validated['is_active'],

        ]);

        // Kembali ke halaman layanan
        return redirect()
            ->route('layanan')
            ->with('success', 'Data layanan berhasil diperbarui!');
    }

}
