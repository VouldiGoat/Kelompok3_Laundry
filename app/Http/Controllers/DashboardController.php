<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Service;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah admin sudah login
        if (!session()->has('admin_id')) {
            return redirect()->route('login');
        }

        // Jumlah data
        $adminCount = Admin::count();
        $serviceCount = Service::count();
        $orderCount = Order::count();
        $orderDetailCount = OrderDetail::count();
        $paymentCount = Payment::count();
        $reviewCount = Review::count();

        // Ambil semua data
        $admins = Admin::orderBy('admin_id', 'desc')->get();
        $services = Service::orderBy('services_id', 'desc')->get();
        $orders = Order::orderBy('orders_id', 'desc')->get();
        $orderDetails = OrderDetail::orderBy('order_detail_id', 'desc')->get();
        $payments = Payment::orderBy('payment_id', 'desc')->get();
        $reviews = Review::orderBy('reviews_id', 'desc')->get();

        $response = response()->view('dashboard', compact(
            'adminCount',
            'serviceCount',
            'orderCount',
            'orderDetailCount',
            'paymentCount',
            'reviewCount',
            'admins',
            'services',
            'orders',
            'orderDetails',
            'payments',
            'reviews'
        ));

        $response->headers->set(
            'Cache-Control',
            'no-cache, no-store, must-revalidate'
        );
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
    }
}