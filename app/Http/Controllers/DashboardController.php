<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah pesanan berdasarkan status.
        $totalOrders = Order::count();
        $pendingOrders = Order::where('orders_status', 'PENDING')->count();
        $completedOrders = Order::where('orders_status', 'COMPLETE')->count();

        // Mengambil lima pesanan terbaru beserta nama layanannya.
        $recentOrders = DB::table('orders')
            ->leftJoin('services', 'orders.services_id', '=', 'services.services_id')
            ->select('orders.*', 'services.services_name')
            ->orderByDesc('orders.orders_id')
            ->limit(5)
            ->get();

        // Mengambil lima pesanan yang sudah selesai.
        $completedActivities = DB::table('orders')
            ->leftJoin('services', 'orders.services_id', '=', 'services.services_id')
            ->where('orders.orders_status', 'COMPLETE')
            ->select(
                'orders.orders_id',
                'orders.nama_pemesan',
                'orders.updated_at',
                'services.services_name'
            )
            ->orderByDesc('orders.updated_at')
            ->limit(5)
            ->get();

        // Menghitung layanan yang paling sering dipesan.
        $popularServices = DB::table('orders')
            ->join('services', 'orders.services_id', '=', 'services.services_id')
            ->select(
                'services.services_id',
                'services.services_name',
                DB::raw('COUNT(orders.orders_id) AS total_orders')
            )
            ->groupBy('services.services_id', 'services.services_name')
            ->orderByDesc('total_orders')
            ->limit(5)
            ->get();

        // Menghitung jumlah pesanan per bulan pada tahun berjalan.
        $chartYear = (int) now()->year;
        $monthNames = [
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
            'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
        ];

        // Skala grafik mengikuti angka 20, 15, 10, 5, dan 0 pada desain.
        $chartScale = 20;
        $chartData = [];

        foreach ($monthNames as $index => $monthName) {
            $monthNumber = $index + 1;

            $orderCount = Order::whereYear('created_at', $chartYear)
                ->whereMonth('created_at', $monthNumber)
                ->count();

            $barHeight = min(($orderCount / $chartScale) * 100, 100);

            $chartData[] = [
                'month' => $monthName,
                'count' => $orderCount,
                'height' => round($barHeight, 2),
            ];
        }

        // Nilai terbesar dipakai untuk membandingkan progress layanan populer.
        $maxPopularOrders = max(1, (int) ($popularServices->max('total_orders') ?? 0));

        $response = response()->view('dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'recentOrders',
            'completedActivities',
            'popularServices',
            'chartYear',
            'chartData',
            'maxPopularOrders'
        ));

        // Mencegah browser menampilkan dashboard lama dari cache setelah logout.
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
    }
}
