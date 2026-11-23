<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan - Laundry Azzam</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Lenis Smooth Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.18/dist/lenis.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/landing/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/status_pesanan.css') }}">
</head>

<body>

    {{-- ==================== HEADER / NAVBAR ==================== --}}
    <header class="navbar" id="navbar">
        <div class="navbar-container">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="navbar-logo">
                <img src="{{ asset('images/logo-laundry.png') }}" alt="Laundry Azzam Since 2010">
            </a>

            {{-- Nav Links --}}
            <nav class="navbar-menu" id="navMenu">
                <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                <a href="{{ route('tentang') }}" class="nav-link">Tentang Kami</a>
                <a href="{{ route('layanan.user') }}" class="nav-link">Layanan</a>
                <a href="{{ route('status_pesanan') }}" class="nav-link active">Status Pesanan</a>
                <a href="{{ route('home') }}#testimoni" class="nav-link">Testimoni</a>

                {{-- Mobile Menu Actions --}}
                <div class="mobile-menu-actions">
                    <a href="{{ route('pesan') }}" class="mobile-cta">Pesan Sekarang</a>
                    <a href="{{ route('login') }}" class="mobile-admin">Masuk</a>
                </div>
            </nav>

            {{-- Action Buttons --}}
            <div class="navbar-actions">
                <a href="{{ route('pesan') }}" class="navbar-cta">Pesan Sekarang</a>
                <a href="{{ route('login') }}" class="navbar-btn-login">Masuk</a>
            </div>

            {{-- Mobile Toggle --}}
            <button class="navbar-toggle" id="navToggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>
    </header>


    {{-- ==================== HERO SECTION ==================== --}}
    <section class="hero" id="beranda">
        <div class="hero-container">

            <div class="hero-content" data-animate="fade-right">
                <span class="hero-badge" data-animate="fade-up" data-delay="100">BERSIH, CEPAT & TERPERCAYA</span>
                <h1 class="hero-title" data-animate="fade-up" data-delay="200">
                    Laundry Lebih Mudah,<br>
                    Hidup Lebih Nyaman
                </h1>
                <p class="hero-description" data-animate="fade-up" data-delay="300">
                    Laundry Azzam hadir untuk membantu Anda mencuci pakaian dengan cepat, bersih, dan wangi. Nikmati layanan laundry yang praktis dan terpercaya.
                </p>
            </div>

            <div class="hero-image" data-animate="fade-left" data-delay="200" data-parallax data-speed="1.05">
                <img src="{{ asset('images/banner.png') }}" alt="Laundry Azzam Basket">
            </div>

        </div>
    </section>


    {{-- ==================== STATUS PESANAN SECTION ==================== --}}
    <section class="status-page-section" id="cek-status">

        {{-- Section Header --}}
        <div class="status-page-header" data-animate="fade-up">
            <span class="status-page-tag">— Cek Status —</span>
            <h2 class="status-page-title">Status Pesanan</h2>
            <p class="status-page-subtitle">
                Masukan nomor pesanan (contoh: #024) atau nama Anda.
            </p>
        </div>

        {{-- Search Input Panel --}}
        <div class="status-search-panel" data-animate="fade-up" data-delay="100">
            {{-- Cute Illustration: Clipboard + Checklist + Magnifier --}}
            <div class="search-illu-box">
                <svg width="56" height="56" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Clipboard Board -->
                    <rect x="12" y="10" width="34" height="46" rx="6" fill="#e8f5e9" stroke="#3f9a4b" stroke-width="2.5"/>
                    <rect x="22" y="6" width="14" height="7" rx="3" fill="#3f9a4b"/>
                    <!-- Checklist lines -->
                    <line x1="20" y1="22" x2="38" y2="22" stroke="#48a655" stroke-width="2.5" stroke-linecap="round"/>
                    <polyline points="18,22 19,23 21,21" stroke="#2e7d32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <line x1="20" y1="30" x2="38" y2="30" stroke="#48a655" stroke-width="2.5" stroke-linecap="round"/>
                    <polyline points="18,30 19,31 21,29" stroke="#2e7d32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <line x1="20" y1="38" x2="32" y2="38" stroke="#48a655" stroke-width="2.5" stroke-linecap="round"/>
                    <!-- Magnifying Glass -->
                    <circle cx="42" cy="42" r="11" fill="#ffffff" stroke="#2e7d32" stroke-width="3"/>
                    <circle cx="42" cy="42" r="8" fill="#dcfce7" fill-opacity="0.6"/>
                    <line x1="50" y1="50" x2="58" y2="58" stroke="#2e7d32" stroke-width="3.5" stroke-linecap="round"/>
                </svg>
            </div>

            {{-- Search Form --}}
            <form action="{{ route('status_pesanan') }}" method="GET" class="status-search-form">
                <input type="text"
                       name="q"
                       value="{{ $search ?? '' }}"
                       placeholder="Nomor pesanan/nama"
                       class="status-search-input"
                       required>
                <button type="submit" class="btn-search-status">Cek Status</button>
            </form>
        </div>

        {{-- Order Search Result Information (If submitted) --}}
        @if(isset($hasSearched) && $hasSearched)
            <div class="status-search-result" data-animate="fade-up">
                @if($orderResult)
                    @php
                        $st = strtolower($orderResult->orders_status ?? 'diproses');
                        $isSelesai = str_contains($st, 'selesai') || str_contains($st, 'diambil');
                    @endphp
                    <div class="order-result-card">
                        <div class="order-result-header">
                            <div>
                                <span class="order-result-id">Pesanan #{{ sprintf('%03d', $orderResult->orders_id) }}</span>
                            </div>
                            <div>
                                <span class="order-status-pill {{ $isSelesai ? 'status-pill-green' : 'status-pill-peach' }}">
                                    {{ ucfirst($orderResult->orders_status ?? 'Diproses') }}
                                </span>
                            </div>
                        </div>
                        <div class="order-result-grid">
                            <div class="order-info-item">
                                <small>Nama Pelanggan</small>
                                <span>{{ $orderResult->nama_pemesan ?? '-' }}</span>
                            </div>
                            <div class="order-info-item">
                                <small>Jenis Layanan</small>
                                <span>{{ $orderResult->service->services_name ?? 'Reguler' }}</span>
                            </div>
                            <div class="order-info-item">
                                <small>Tanggal Pesan</small>
                                <span>
                                    {{ $orderResult->created_at ? \Carbon\Carbon::parse($orderResult->created_at)->translatedFormat('d M Y') : '-' }}
                                </span>
                            </div>
                            <div class="order-info-item">
                                <small>Estimasi / Selesai</small>
                                <span>
                                    {{ $orderResult->delivery_date ? \Carbon\Carbon::parse($orderResult->delivery_date)->translatedFormat('d M Y') : 'Sesuai Jadwal' }}
                                </span>
                            </div>
                            <div class="order-info-item">
                                <small>Total Tagihan</small>
                                <span>Rp{{ number_format($orderResult->total ?? 0, 0, ',', '.') }}</span>
                            </div>
                            <div class="order-info-item">
                                <small>Alamat</small>
                                <span>{{ Str::limit($orderResult->addresses ?? '-', 35) }}</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="order-not-found">
                        Nomor pesanan atau nama "<strong>{{ $search }}</strong>" tidak ditemukan. Pastikan nomor pesanan atau nama Anda sudah sesuai.
                    </div>
                @endif
            </div>
        @endif

        {{-- 4 Process Status Cards --}}
        @php
            $currentStatus = strtolower($orderResult->orders_status ?? '');
            $isDiterima = str_contains($currentStatus, 'terima') || str_contains($currentStatus, 'diterima') || str_contains($currentStatus, 'pending');
            $isDiproses = str_contains($currentStatus, 'proses') || str_contains($currentStatus, 'diproses');
            $isSelesai = str_contains($currentStatus, 'selesai') || str_contains($currentStatus, 'completed');
            $isDiambil = str_contains($currentStatus, 'ambil') || str_contains($currentStatus, 'diambil');
        @endphp

        <div class="status-steps-panel" data-animate="fade-up" data-delay="150">
            <div class="status-steps-grid">

                {{-- Step 1: Diterima --}}
                <div class="status-step-card {{ $isDiterima ? 'is-current-step' : '' }}" data-animate="fade-up" data-delay="100">
                    <div class="step-icon-wrap">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                        </svg>
                    </div>
                    <h3 class="step-card-title">Diterima</h3>
                    <p class="step-card-desc">Pesan masuk dan dicatat oleh admin.</p>
                </div>

                {{-- Step 2: Diproses --}}
                <div class="status-step-card {{ $isDiproses ? 'is-current-step' : '' }}" data-animate="fade-up" data-delay="200">
                    <div class="step-icon-wrap">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="2" width="18" height="20" rx="3" ry="3"/>
                            <circle cx="12" cy="13" r="5"/>
                            <path d="M12 10a3 3 0 0 1 3 3"/>
                            <line x1="7" y1="6" x2="7.01" y2="6"/>
                            <line x1="10" y1="6" x2="10.01" y2="6"/>
                        </svg>
                    </div>
                    <h3 class="step-card-title">Diproses</h3>
                    <p class="step-card-desc">Pesanan sedang diproses sesuai jenis layanan yang dipilih.</p>
                </div>

                {{-- Step 3: Selesai --}}
                <div class="status-step-card {{ $isSelesai ? 'is-current-step' : '' }}" data-animate="fade-up" data-delay="300">
                    <div class="step-icon-wrap">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                    <h3 class="step-card-title">Selesai</h3>
                    <p class="step-card-desc">Pesanan sudah selesai diproses.</p>
                </div>

                {{-- Step 4: Diambil --}}
                <div class="status-step-card {{ $isDiambil ? 'is-current-step' : '' }}" data-animate="fade-up" data-delay="400">
                    <div class="step-icon-wrap">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                            <line x1="3" y1="6" x2="21" y2="6"/>
                            <path d="M16 10a4 4 0 0 1-8 0"/>
                        </svg>
                    </div>
                    <h3 class="step-card-title">Diambil</h3>
                    <p class="step-card-desc">Pesanan siap diambil tepat waktu.</p>
                </div>

            </div>
        </div>

    </section>


    {{-- ==================== FOOTER ==================== --}}
    <footer class="footer">
        <div class="footer-container">

            {{-- Col 1: Brand Info --}}
            <div class="footer-col footer-brand" data-animate="fade-up">
                <a href="{{ route('home') }}" class="footer-logo">
                    <img src="{{ asset('images/logo-laundry.png') }}" alt="Laundry Azzam">
                </a>
                <p class="footer-tagline">
                    Laundry Azzam, solusi laundry praktis, bersih, dan terpercaya untuk anda.
                </p>
            </div>

            {{-- Col 2: Navigation Links --}}
            <div class="footer-col footer-nav-group" data-animate="fade-up" data-delay="100">
                <div class="footer-links">
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('tentang') }}">Tentang Kami</a>
                    <a href="{{ route('layanan.user') }}">Layanan</a>
                </div>
                <div class="footer-links">
                    <a href="{{ route('home') }}#daftar-harga">Daftar Harga</a>
                    <a href="{{ route('status_pesanan') }}">Status Pesanan</a>
                    <a href="{{ route('home') }}#testimoni">Testimoni</a>
                </div>
            </div>

            {{-- Divider 1 --}}
            <div class="footer-divider"></div>

            {{-- Col 3: Contact & Address --}}
            <div class="footer-col footer-contact" data-animate="fade-up" data-delay="200">
                <p>Jl. Mistar Cokrokusukmo</p>
                <p>0812 5004 8608</p>
            </div>

            {{-- Divider 2 --}}
            <div class="footer-divider"></div>

            {{-- Col 4: Social Media --}}
            <div class="footer-col footer-social" data-animate="fade-up" data-delay="300">
                <span>Ikuti Kami</span>
                <div class="social-icons">
                    <a href="#" aria-label="Instagram">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="#" aria-label="WhatsApp">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Facebook">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        {{-- Copyright --}}
        <div class="footer-bottom">
            <p>&copy; 2026 Laundry Azzam. All rights reserved</p>
        </div>
    </footer>


    {{-- Lenis Smooth Scroll --}}
    <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>

    {{-- JS --}}
    <script src="{{ asset('js/landing/home.js') }}"></script>
</body>
</html>
