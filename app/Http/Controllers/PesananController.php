<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index()
    {

        // Mengambil semua data pesanan
        $orders = DB::table('orders')
            ->leftJoin(
                'services',
                'orders.services_id',
                '=',
                'services.services_id'
            )
            ->select(
                'orders.*',
                'services.services_name'
            )
            ->orderBy('orders.orders_id', 'desc')
            ->get();

        // Mengirim data pesanan ke halaman Blade
        return view('pesanan', compact('orders'));
    }

    
        
        // Menghapus pesanan
        public function destroy($id)
        {
            // Memulai transaksi database
            DB::transaction(function () use ($id) {

                // Mencari pesanan berdasarkan ID
                $order = Order::findOrFail($id);

                // Menghapus pembayaran yang terhubung
                Payment::where('order_id', $order->orders_id)
                    ->delete();

                // Menghapus pesanan
                $order->delete();

            });

            // Kembali ke halaman pesanan
            return redirect()
                ->route('pesanan')
                ->with('success', 'Pesanan berhasil dihapus!');
        }



}
