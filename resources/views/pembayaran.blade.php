<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Laundry Azzam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pembayaran.css') }}">
</head>
<body>
    <div class="layout">
        @include('partials.sidebar', ['active' => 'pembayaran'])

        <main class="main">
            {{-- Topbar --}}
            <header class="topbar">
                <div class="user-pill">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#23783b"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 3a3 3 0 1 1-3 3 3 3 0 0 1 3-3zm0 14.2a7.2 7.2 0 0 1-6-3.22c.03-1.99 4-3.08 6-3.08s5.97 1.09 6 3.08a7.2 7.2 0 0 1-6 3.22z"/></svg>
                    <span>{{ session('admin_username', 'Admin') }}</span>
                </div>
            </header>

            {{-- Welcome Banner --}}
            <section class="banner">
                <div class="banner-info">
                    <h1>Pembayaran</h1>
                    <p>Kelola semua pesanan laundry pelanggan disini.</p>
                </div>
                <div class="banner-side">
                    <div class="banner-quote">
                        <span>Jaga kualitas<br>setiap cucian</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#23783b" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1.1L12 21.2l7.8-7.7 1-1.1a5.5 5.5 0 0 0 0-7.8z"/></svg>
                    </div>
                    <img src="{{ asset('images/banner.png') }}" alt="Basket" class="banner-img">
                </div>
            </section>

            {{-- Action Bar --}}
            <div class="action-bar">
                <button type="button" class="btn-add-metode">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    <span>Tambah Metode</span>
                </button>
                <div class="search-box">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8c8c8e" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="7"/><line x1="21" y1="21" x2="15.8" y2="15.8"/></svg>
                    <input type="text" placeholder="Cari nama Pelanggan" id="searchInput">
                </div>
            </div>

            {{-- Metode Pembayaran Section --}}
            <div class="metode-section">
                <h2 class="metode-title">Metode Pembayaran</h2>

                <div class="metode-grid">
                    {{-- 1. QRIS --}}
                    <div class="metode-card">
                        <div class="metode-body">
                            <div class="brand-badge">
                                <span class="brand-qris">QRIS</span>
                            </div>
                            <div class="metode-info">
                                <span class="metode-name">LAUNDRY AZZAM</span>
                                <span class="metode-desc">(semua e-wallet & e-banking)</span>
                            </div>
                        </div>
                        <div class="metode-footer">
                            <button type="button" class="toggle-switch on" aria-label="Toggle QRIS">
                                <span class="toggle-knob"></span>
                            </button>
                            <button type="button" class="btn-m-edit" title="Edit">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                            </button>
                            <button type="button" class="btn-m-del" title="Hapus">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                            </button>
                        </div>
                    </div>

                    {{-- 2. BCA --}}
                    <div class="metode-card">
                        <div class="metode-body">
                            <div class="brand-badge">
                                <span class="brand-bca">BCA</span>
                            </div>
                            <div class="metode-info">
                                <span class="metode-name">BCA 1234567890</span>
                                <span class="metode-desc">a.n Laundry Azzam</span>
                            </div>
                        </div>
                        <div class="metode-footer">
                            <button type="button" class="toggle-switch on" aria-label="Toggle BCA">
                                <span class="toggle-knob"></span>
                            </button>
                            <button type="button" class="btn-m-edit" title="Edit">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                            </button>
                            <button type="button" class="btn-m-del" title="Hapus">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                            </button>
                        </div>
                    </div>

                    {{-- 3. E-Wallet --}}
                    <div class="metode-card">
                        <div class="metode-body">
                            <div class="brand-badge">
                                <span class="brand-ewallet">E-Wallet</span>
                            </div>
                            <div class="metode-info">
                                <span class="metode-name">DANA/OVO/GOPAY</span>
                                <span class="metode-desc">0812-3456-7890</span>
                            </div>
                        </div>
                        <div class="metode-footer">
                            <button type="button" class="toggle-switch off" aria-label="Toggle E-Wallet">
                                <span class="toggle-knob"></span>
                            </button>
                            <button type="button" class="btn-m-edit" title="Edit">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                            </button>
                            <button type="button" class="btn-m-del" title="Hapus">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                            </button>
                        </div>
                    </div>

                    {{-- 4. Tunai --}}
                    <div class="metode-card">
                        <div class="metode-body">
                            <div class="brand-badge">
                                <span class="brand-tunai">Tunai</span>
                            </div>
                            <div class="metode-info">
                                <span class="metode-name">Bayar langsung di kasir</span>
                                <span class="metode-desc">menggunakan uang fisik</span>
                            </div>
                        </div>
                        <div class="metode-footer">
                            <button type="button" class="toggle-switch on" aria-label="Toggle Tunai">
                                <span class="toggle-knob"></span>
                            </button>
                            <button type="button" class="btn-m-edit" title="Edit">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                            </button>
                            <button type="button" class="btn-m-del" title="Hapus">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabel Riwayat Pembayaran (Data Dikosongkan) --}}
            <div class="table-card">
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Pesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Metode Pembayaran</th>
                                <th>Jenis Layanan</th>
                                <th>Tanggal Masuk</th>
                                <th>Total Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                            </tr>
                        </thead>

 
                        <tbody>

                            @forelse ($payments as $payment)

                                <tr>

                                    {{-- Nomor urut --}}
                                    <td>{{ $loop->iteration }}</td>

                                    {{-- Nomor pesanan --}}
                                    <td>
                                        @if ($payment->order)
                                            ORD-{{ str_pad($payment->order->orders_id, 5, '0', STR_PAD_LEFT) }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    {{-- Nama pelanggan --}}
                                    <td>
                                        {{ $payment->order?->nama_pemesan ?? '-' }}
                                    </td>

                                    {{-- Metode pembayaran --}}
                                    <td>
                                        <span class="payment-method-label">
                                            {{ $payment->payment_method }}
                                        </span>
                                    </td>

                                    {{-- Jenis layanan --}}
                                    <td>
                                        {{ $payment->order?->service?->services_name ?? '-' }}
                                    </td>

                                    {{-- Tanggal masuk --}}
                                    <td>
                                        {{ $payment->created_at
                                            ? \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y')
                                            : '-' }}
                                    </td>

                                    {{-- Total pembayaran --}}
                                    <td>
                                        Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                    </td>

                                    {{-- Status pembayaran --}}
                                    <td>
                                        @if ($payment->payment_status === 'TERVERIFIKASI')
                                            <span class="status-complete">
                                                TERVERIFIKASI
                                            </span>
                                        @else
                                            <span class="status-pending">
                                                MENUNGGU VERIFIKASI
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Bukti pembayaran --}}
                                    <td>
                                        @if ($payment->payment_proof)
                                            <a
                                                href="{{ asset('storage/' . $payment->payment_proof) }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="btn-document"
                                            >
                                                Lihat Bukti
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="9" class="empty-state">
                                        Belum ada data pembayaran.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

                {{-- Pagination Footer --}}
                <div class="card-footer-bar">
                    <span class="pagination-info">Menampilkan {{ $payments->count() }} dari {{ $payments->count() }} pembayaran</span>
                    <div class="pagination">
                        <button class="page-btn page-nav" title="Sebelumnya" disabled>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                        </button>
                        <button class="page-btn page-num active">1</button>
                        <button class="page-btn page-nav" title="Selanjutnya" disabled>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/pembayaran.js') }}"></script>
</body>
</html>
