<?php

namespace App\Http\Controllers;

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
}
