<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Laundry Azzam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="layout">
        @include('partials.sidebar', ['active' => 'dashboard'])

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
                    <h1>Selamat Datang, Admin!</h1>
                    <p>Pantau aktivitas laundry dan kelola pesanan dengan mudah melalui dashboard ini.</p>
                </div>
                <div class="banner-side">
                    <div class="banner-quote">
                        <span>Bersihnya<br>bikin nyaman</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2e7d32" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1.1L12 21.2l7.8-7.7 1-1.1a5.5 5.5 0 0 0 0-7.8z"/></svg>
                    </div>
                    <img src="{{ asset('storage/landing/banner.png') }}" alt="Basket" class="banner-img">
                </div>
            </section>

            {{-- Summary Cards --}}
            <section class="stats">
                <div class="stat-card stat-green">
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    </div>
                    <div>
                        <small>Total Pesanan</small>
                        <h2>0</h2>
                        <span>0 dari kemarin</span>
                    </div>
                </div>

                <div class="stat-card stat-orange">
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    </div>
                    <div>
                        <small>Total Pesanan</small>
                        <h2>0</h2>
                        <span>0 dari kemarin</span>
                    </div>
                </div>

                <div class="stat-card stat-mint">
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                    </div>
                    <div>
                        <small>Selesai</small>
                        <h2>0</h2>
                        <span>0 dari kemarin</span>
                    </div>
                </div>
            </section>

            {{-- Grid Content --}}
            <div class="content-grid">
                {{-- Left Col --}}
                <div class="col-left">
                    {{-- Pesanan Terbaru --}}
                    <div class="card">
                        <div class="card-head">
                            <div class="card-title">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2e7d32" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
                                <h3>Pesanan terbaru</h3>
                            </div>
                            <a href="#" class="btn-more">Lihat Semua &rarr;</a>
                        </div>
                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th><th>Nama</th><th>Layanan</th><th>Status</th><th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="empty-state">Belum ada pesanan terbaru.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Grafik Pesanan --}}
                    <div class="card">
                        <div class="card-head">
                            <div class="card-title">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2e7d32" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                                <h3>Grafik Pesanan</h3>
                            </div>
                            <a href="#" class="btn-more">Lihat Semua &rarr;</a>
                        </div>
                        <div class="chart-box">
                            <div class="chart-y">
                                <span>20</span><span>15</span><span>10</span><span>5</span><span>0</span>
                            </div>
                            <div class="chart-bars">
                                @php
                                    $chartData = [
                                        'Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0,
                                        'Mei' => 0, 'Jun' => 0, 'Jul' => 0, 'Agu' => 0,
                                        'Sep' => 0, 'Okt' => 0, 'Nov' => 0, 'Des' => 0
                                    ];
                                @endphp
                                @foreach($chartData as $month => $height)
                                <div class="bar-col">
                                    <div class="bar-fill" style="height: {{ $height }}%"></div>
                                    <span class="bar-lbl">{{ $month }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Col --}}
                <div class="col-right">
                    {{-- Aktivitas Terbaru --}}
                    <div class="card">
                        <div class="card-head">
                            <div class="card-title">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2e7d32" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <h3>Aktivitas Terbaru</h3>
                            </div>
                            <a href="#" class="btn-more">Lihat Semua &rarr;</a>
                        </div>
                        <div class="activity-list">
                            <div class="activity-empty">Belum ada aktivitas terbaru.</div>
                        </div>
                    </div>

                    {{-- Layanan Populer --}}
                    <div class="card">
                        <div class="card-head">
                            <div class="card-title">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2e7d32" stroke-width="2"><path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>
                                <h3>Layanan Populer</h3>
                            </div>
                            <a href="#" class="btn-more">Lihat Semua &rarr;</a>
                        </div>
                        <div class="popular-list">
                            <div class="activity-empty">Belum ada data layanan populer.</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
