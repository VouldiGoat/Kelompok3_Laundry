<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Laundry Azzam</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

    <div class="dashboard-wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <div class="logo-section">
                <h2>Laundry Azzam</h2>
                <p>Admin Dashboard</p>
            </div>

            <nav>
                <a href="{{ route('dashboard') }}" class="active">
                    Dashboard
                </a>

                <a href="#">
                    Services
                </a>

                <a href="#">
                    Orders
                </a>

                <a href="#">
                    Payments
                </a>

                <a href="#">
                    Reviews
                </a>
            </nav>

            <div class="sidebar-bottom">

                <p class="admin-name">
                    Login sebagai:
                    <strong>{{ session('admin_username') }}</strong>
                </p>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="logout-button">
                        Logout
                    </button>
                </form>

            </div>

        </aside>


        <!-- MAIN CONTENT -->
        <main class="main-content">

            <!-- HEADER -->
            <div class="top-header">

                <div>
                    <h1>Dashboard</h1>
                    <p>Selamat datang di Dashboard Admin Laundry Azzam.</p>
                </div>

            </div>


            <!-- STAT CARDS -->
            <div class="stats-grid">

                <div class="stat-card">
                    <div class="stat-icon">
                        
                    </div>



                <div class="stat-card">
                    <div class="stat-icon">
                        
                    </div>

                    <div>
                        <p>Total Services</p>
                        <h2>{{ $serviceCount }}</h2>
                    </div>
                </div>


                <div class="stat-card">
                    <div class="stat-icon">
                        
                    </div>

                    <div>
                        <p>Total Orders</p>
                        <h2>{{ $orderCount }}</h2>
                    </div>
                </div>


                <div class="stat-card">
                    <div class="stat-icon">
                        
                    </div>

                    <div>
                        <p>Order Details</p>
                        <h2>{{ $orderDetailCount }}</h2>
                    </div>
                </div>


                <div class="stat-card">
                    <div class="stat-icon">
                        
                    </div>

                    <div>
                        <p>Total Payments</p>
                        <h2>{{ $paymentCount }}</h2>
                    </div>
                </div>


                <div class="stat-card">
                    <div class="stat-icon">
                        
                    </div>

                    <div>
                        <p>Total Reviews</p>
                        <h2>{{ $reviewCount }}</h2>
                    </div>
                </div>

            </div>

            <!-- SERVICES -->
            <section class="data-section">

                <div class="section-header">
                    <div>
                        <h2>Data Services</h2>
                        <p>Daftar layanan laundry.</p>
                    </div>
                </div>

                <div class="table-container">

                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Service</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($services as $service)

                                <tr>
                                    <td>{{ $service->services_id }}</td>

                                    <td>
                                        <strong>{{ $service->services_name }}</strong>
                                    </td>

                                    <td>
                                        {{ $service->description }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($service->price, 0, ',', '.') }}
                                    </td>

                                    <td>

                                        @if($service->is_active)

                                            <span class="status active">
                                                Aktif
                                            </span>

                                        @else

                                            <span class="status inactive">
                                                Tidak Aktif
                                            </span>

                                        @endif

                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="empty">
                                        Belum ada data service.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>


            <!-- ORDERS -->
            <section class="data-section">

                <div class="section-header">
                    <div>
                        <h2>Data Orders</h2>
                        <p>Daftar pesanan laundry.</p>
                    </div>
                </div>

                <div class="table-container">

                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pemesan</th>
                                <th>Service ID</th>
                                <th>Alamat</th>
                                <th>Pickup</th>
                                <th>Delivery</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($orders as $order)

                                <tr>

                                    <td>
                                        {{ $order->orders_id }}
                                    </td>

                                    <td>
                                        <strong>{{ $order->nama_pemesan }}</strong>
                                    </td>

                                    <td>
                                        {{ $order->services_id }}
                                    </td>

                                    <td>
                                        {{ $order->addresses }}
                                    </td>

                                    <td>
                                        {{ $order->pickup_date }}
                                        <br>
                                        <small>{{ $order->pickup_time }}</small>
                                    </td>

                                    <td>
                                        {{ $order->delivery_date ?? '-' }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($order->total, 0, ',', '.') }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="empty">
                                        Belum ada data order.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>


            <!-- ORDER DETAILS -->
            <section class="data-section">

                <div class="section-header">

                    <div>
                        <h2>Data Order Details</h2>
                        <p>Detail dan status setiap order.</p>
                    </div>

                </div>

                <div class="table-container">

                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Service ID</th>
                                <th>Status</th>
                                <th>Dokumen</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($orderDetails as $detail)

                                <tr>

                                    <td>
                                        {{ $detail->order_detail_id }}
                                    </td>

                                    <td>
                                        {{ $detail->orders_id }}
                                    </td>

                                    <td>
                                        {{ $detail->services_id }}
                                    </td>

                                    <td>

                                        @if($detail->orders_status === 'COMPLETE')

                                            <span class="status active">
                                                COMPLETE
                                            </span>

                                        @else

                                            <span class="status pending">
                                                PENDING
                                            </span>

                                        @endif

                                    </td>

                                    <td>
                                        {{ $detail->order_detail_dok }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="empty">
                                        Belum ada order detail.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>


            <!-- PAYMENTS -->
            <section class="data-section">

                <div class="section-header">

                    <div>
                        <h2>Data Payments</h2>
                        <p>Daftar pembayaran order.</p>
                    </div>

                </div>

                <div class="table-container">

                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Metode</th>
                                <th>Jumlah</th>
                                <th>Dibayar</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($payments as $payment)

                                <tr>

                                    <td>
                                        {{ $payment->payment_id }}
                                    </td>

                                    <td>
                                        {{ $payment->order_id }}
                                    </td>

                                    <td>
                                        <span class="method">
                                            {{ $payment->payment_method }}
                                        </span>
                                    </td>

                                    <td>
                                        Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ $payment->paid_at ?? '-' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="empty">
                                        Belum ada data pembayaran.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>


            <!-- REVIEWS -->
            <section class="data-section">

                <div class="section-header">

                    <div>
                        <h2>Data Reviews</h2>
                        <p>Review dari pelanggan.</p>
                    </div>

                </div>

                <div class="table-container">

                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pemesan</th>
                                <th>Rating</th>
                                <th>Komentar</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($reviews as $review)

                                <tr>

                                    <td>
                                        {{ $review->reviews_id }}
                                    </td>

                                    <td>
                                        <strong>{{ $review->nama_pemesan }}</strong>
                                    </td>

                                    <td>
                                        <span class="rating">
                                            {{ $review->rating }}/5
                                        </span>
                                    </td>

                                    <td>
                                        {{ $review->comment }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4" class="empty">
                                        Belum ada review.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>

        </main>

    </div>

</body>
</html>