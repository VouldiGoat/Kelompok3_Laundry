<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - Laundry Azzam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pesanan.css') }}">
</head>
<body>
    <div class="layout">
        @include('partials.sidebar', ['active' => 'pesanan'])

        <main class="main">
            {{-- Topbar --}}
            <header class="topbar">
                <div class="user-pill">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="#2e7d32"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 3a3 3 0 1 1-3 3 3 3 0 0 1 3-3zm0 14.2a7.2 7.2 0 0 1-6-3.22c.03-1.99 4-3.08 6-3.08s5.97 1.09 6 3.08a7.2 7.2 0 0 1-6 3.22z"/></svg>
                    <span>Admin</span>
                </div>
            </header>

            {{-- Welcome Banner --}}
            <section class="banner">
                <div class="banner-info">
                    <h1>Pesanan</h1>
                    <p>Kelola semua pesanan laundry pelanggan disini.</p>
                </div>
                <div class="banner-side">
                    <div class="banner-quote">
                        <span>Jaga kualitas<br>setiap cucian</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2e7d32" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1.1L12 21.2l7.8-7.7 1-1.1a5.5 5.5 0 0 0 0-7.8z"/></svg>
                    </div>
                    <img src="{{ asset('storage/landing/banner.png') }}" alt="Basket" class="banner-img">
                </div>
            </section>

            {{-- Action Bar --}}
            <div class="action-bar">
                <button class="btn-add">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    <span>Tambah Pesanan</span>
                </button>
                <div class="search-box">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" placeholder="Cari nama pelanggan, nomor pesanan..." id="searchInput">
                </div>
            </div>

            {{-- Table Card --}}
            <div class="table-card">
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Pesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Jenis layanan</th>
                                <th>Tanggal Masuk</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    {{-- Nomor urut --}}
                                    <td>{{ $loop->iteration }}</td>

                                    {{-- Nomor pesanan --}}
                                    <td>
                                        ORD-{{ str_pad($order->orders_id, 5, '0', STR_PAD_LEFT) }}
                                    </td>

                                    {{-- Nama pelanggan --}}
                                    <td>{{ $order->nama_pemesan }}</td>

                                    {{-- Jenis layanan --}}
                                    <td>{{ $order->services_name ?? '-' }}</td>

                                    {{-- Tanggal masuk --}}
                                    <td>
                                        {{ $order->created_at
                                            ? \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')
                                            : '-' }}
                                    </td>

                                    {{-- Status pesanan --}}
                                    <td>{{ $order->orders_status ?? 'PENDING' }}</td>

                                    {{-- Total harga --}}
                                    <td>
                                        Rp {{ number_format($order->total, 0, ',', '.') }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td>-</td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="8" class="empty-state">
                                        Belum ada data pesanan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
                <div class="card-footer-bar">
                    <span class="pagination-info">Menampilkan {{ $orders->count() }} dari {{ $orders->count() }} pesanan</span>
                    <div class="pagination">
                        <button class="page-btn page-nav" title="Sebelumnya" disabled>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                        </button>
                        <button class="page-btn page-num active">1</button>
                        <button class="page-btn page-nav" title="Selanjutnya">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/pesanan.js') }}"></script>
</body>
</html>

