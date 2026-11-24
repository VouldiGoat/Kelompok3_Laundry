<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni Pelanggan - Laundry Azzam</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Lenis Smooth Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.18/dist/lenis.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/landing/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/testimoni.css') }}">
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
                <a href="{{ route('status_pesanan') }}" class="nav-link">Status Pesanan</a>
                <a href="{{ route('testimoni') }}" class="nav-link active">Testimoni</a>

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


    {{-- ==================== TESTIMONIALS SECTION ==================== --}}
    <section class="testimoni-section" id="testimoni">

        {{-- Header --}}
        <div class="testimoni-header" data-animate="fade-up">
            <h2 class="testimoni-title">Kata Pelanggan Kami</h2>
            <p class="testimoni-subtitle">Cerita nyata dari pelanggan Laundry Azzam.</p>
        </div>

        {{-- Rating Summary Box --}}
        <div class="rating-summary-box" data-animate="fade-up" data-delay="100">
            {{-- Big Score Side --}}
            <div class="rating-score-side">
                <div class="rating-big-num">4.5</div>
                <div class="rating-stars-row">
                    {{-- 4 Full Stars + 1 Half Star --}}
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    <svg width="18" height="18" viewBox="0 0 24 24"><defs><linearGradient id="halfStarGrad"><stop offset="50%" stop-color="#f59e0b"/><stop offset="50%" stop-color="#cbd5e1"/></linearGradient></defs><path fill="url(#halfStarGrad)" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                </div>
                <span class="rating-count-text">18 ulasan</span>
            </div>

            {{-- Breakdown Bars Side --}}
            <div class="rating-bars-side">
                {{-- 5 Star --}}
                <div class="rating-bar-row">
                    <span class="rating-bar-label">5 ★</span>
                    <div class="rating-bar-track">
                        <div class="rating-bar-fill" style="width: 61%;"></div>
                    </div>
                    <span class="rating-bar-count">11</span>
                </div>
                {{-- 4 Star --}}
                <div class="rating-bar-row">
                    <span class="rating-bar-label">4 ★</span>
                    <div class="rating-bar-track">
                        <div class="rating-bar-fill" style="width: 28%;"></div>
                    </div>
                    <span class="rating-bar-count">5</span>
                </div>
                {{-- 3 Star --}}
                <div class="rating-bar-row">
                    <span class="rating-bar-label">3 ★</span>
                    <div class="rating-bar-track">
                        <div class="rating-bar-fill" style="width: 11%;"></div>
                    </div>
                    <span class="rating-bar-count">2</span>
                </div>
            </div>
        </div>

        {{-- Filter Buttons --}}
        <div class="testimoni-filters" data-animate="fade-up" data-delay="150">
            <button type="button" class="filter-btn active" data-filter="all">Semua</button>
            <button type="button" class="filter-btn" data-filter="5">5 ★</button>
            <button type="button" class="filter-btn" data-filter="4">4 ★</button>
            <button type="button" class="filter-btn" data-filter="3">3 ★</button>
        </div>

        {{-- 12 Cards Grid --}}
        <div class="testimoni-grid" id="testimoniGrid" data-animate="fade-up" data-delay="200">

            {{-- Card 1 --}}
            <div class="testimoni-card" data-rating="5">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-mint">R</div>
                        <div>
                            <h4 class="user-name">Rina Safitri</h4>
                            <div class="user-service-time">Cuci Komplit | 2 hari lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Bajunya wangi, rapi, dan selesai tepat waktu. Sudah langganan hampir setahun.</p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="testimoni-card" data-rating="5">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-peach">H</div>
                        <div>
                            <h4 class="user-name">Hendra Gunawan</h4>
                            <div class="user-service-time">Bed Cover | 3 hari lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Bed cover jadi seperti baru. Harganya bersahabat, hasilnya memuaskan.</p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="testimoni-card" data-rating="4">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-mint">M</div>
                        <div>
                            <h4 class="user-name">Maya Lestari</h4>
                            <div class="user-service-time">Cuci Express | 5 hari lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star-empty" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Layanan express sangat membantu saat butuh cepat. Hanya antreannya agak ramai.</p>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="testimoni-card" data-rating="5">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-peach">B</div>
                        <div>
                            <h4 class="user-name">Budi Santoso</h4>
                            <div class="user-service-time">Sepatu/Tas | 1 minggu lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Sepatu putih saya kembali bersih tanpa merusak bahan. Mantap!</p>
                </div>
            </div>

            {{-- Card 5 --}}
            <div class="testimoni-card" data-rating="5">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-mint">D</div>
                        <div>
                            <h4 class="user-name">Dewi Anggraini</h4>
                            <div class="user-service-time">Cuci Lipat | 1 minggu lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Admin ramah dan cepat membalas. Cucian diantar sampai rumah.</p>
                </div>
            </div>

            {{-- Card 6 --}}
            <div class="testimoni-card" data-rating="4">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-peach">Y</div>
                        <div>
                            <h4 class="user-name">Yudi Pratama</h4>
                            <div class="user-service-time">Setrika Saja | 2 minggu lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star-empty" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Setrikaannya licin dan rapi. Cocok untuk baju kerja.</p>
                </div>
            </div>

            {{-- Card 7 --}}
            <div class="testimoni-card" data-rating="5">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-mint">S</div>
                        <div>
                            <h4 class="user-name">Siti Nurhaliza</h4>
                            <div class="user-service-time">Boneka | 2 minggu lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Boneka anak saya wangi lagi dan tetap lembut. Terima kasih!</p>
                </div>
            </div>

            {{-- Card 8 --}}
            <div class="testimoni-card" data-rating="5">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-peach">A</div>
                        <div>
                            <h4 class="user-name">Andi Wijaya</h4>
                            <div class="user-service-time">Dry Clean | 3 minggu lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Sepatu putih saya kembali bersih tanpa merusak bahan. Mantap!</p>
                </div>
            </div>

            {{-- Card 9 --}}
            <div class="testimoni-card" data-rating="4">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-mint">T</div>
                        <div>
                            <h4 class="user-name">Tiara Putri</h4>
                            <div class="user-service-time">Selimut/Sprei | 1 bulan lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star-empty" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Selimut dan sprei jadi segar dan bebas debu. Pasti pesan lagi.</p>
                </div>
            </div>

            {{-- Card 10 --}}
            <div class="testimoni-card" data-rating="4">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-peach">R</div>
                        <div>
                            <h4 class="user-name">Rizky Ramadhan</h4>
                            <div class="user-service-time">Cuci Lipat | 1 bulan lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star-empty" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Hasil cuci bagus, tapi saya berharap jam operasionalnya lebih panjang.</p>
                </div>
            </div>

            {{-- Card 11 --}}
            <div class="testimoni-card" data-rating="5">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-mint">S</div>
                        <div>
                            <h4 class="user-name">Wulan Sari</h4>
                            <div class="user-service-time">Cuci Komplit | 1 bulan lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Pelayanan ramah, hasil cucian wangi dan tempat sangat rapi.</p>
                </div>
            </div>

            {{-- Card 12 --}}
            <div class="testimoni-card" data-rating="5">
                <div>
                    <div class="card-user-info">
                        <div class="user-avatar avatar-peach">A</div>
                        <div>
                            <h4 class="user-name">Fatimah Azzahra</h4>
                            <div class="user-service-time">Ambal | 1 bulan lalu</div>
                        </div>
                    </div>
                    <div class="card-stars">
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="card-comment">Karpet ambal di rumah dibersihkan menyeluruh. Puas sekali.</p>
                </div>
            </div>

        </div>

        {{-- Tulis Testimoni Form Box --}}
        <div class="tulis-testimoni-wrapper" data-animate="fade-up" data-delay="250">
            <div class="tulis-testimoni-card">
                <h3 class="tulis-title">Tulis Testimoni</h3>

                @if(session('success'))
                    <div class="form-alert-box">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('testimoni.store') }}" method="POST">
                    @csrf
                    <div class="form-group-item">
                        <input type="text" name="nama_pemesan" class="form-input-text" placeholder="Nama Anda" required>
                    </div>

                    <div class="form-group-item">
                        <select name="rating" class="form-select-rating" required>
                            <option value="5" selected>★★★★★ (5 Bintang - Sangat Puas)</option>
                            <option value="4">★★★★☆ (4 Bintang - Puas)</option>
                            <option value="3">★★★☆☆ (3 Bintang - Cukup)</option>
                            <option value="2">★★☆☆☆ (2 Bintang - Kurang)</option>
                            <option value="1">★☆☆☆☆ (1 Bintang - Sangat Kurang)</option>
                        </select>
                    </div>

                    <div class="form-group-item">
                        <textarea name="comment" class="form-input-text form-textarea" placeholder="Pengalaman Anda" rows="3" required></textarea>
                    </div>

                    <div>
                        <button type="submit" class="btn-kirim-testimoni">Kirim</button>
                    </div>
                </form>
            </div>
        </div>

    </section>


    {{-- ==================== FOOTER ==================== --}}
    <footer class="footer">
        <div class="footer-container">

            {{-- Col 1: Brand & Desc --}}
            <div class="footer-col footer-brand" data-animate="fade-up">
                <a href="{{ route('home') }}" class="footer-logo">
                    <img src="{{ asset('images/logo-laundry.png') }}" alt="Laundry Azzam Since 2010">
                </a>
                <p class="footer-tagline">
                    Laundry Azzam, solusi laundry praktis, bersih, dan terpercaya untuk Anda.
                </p>
            </div>

            {{-- Divider --}}
            <div class="footer-divider"></div>

            {{-- Col 2: Navigation Links (2 sub-columns) --}}
            <div class="footer-col footer-links-group" data-animate="fade-up" data-delay="100">
                <div class="footer-links">
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('tentang') }}">Tentang Kami</a>
                    <a href="{{ route('layanan.user') }}">Layanan</a>
                </div>
                <div class="footer-links">
                    <a href="{{ route('home') }}#daftar-harga">Daftar Harga</a>
                    <a href="{{ route('status_pesanan') }}">Status Pesanan</a>
                    <a href="{{ route('testimoni') }}">Testimoni</a>
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
                    <a href="https://www.instagram.com/zmiiaz_?dmpr=bnF5MnBtM3A5d3Fr" aria-label="Instagram">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="https://chat.whatsapp.com/JUYljGIrZAmHtE5vQSsE1m?s=cl&p=a&iam=2" aria-label="WhatsApp">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/?locale=id_ID" aria-label="Facebook">
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

    {{-- Testimonial Filter Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const cards = document.querySelectorAll('.testimoni-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const filter = this.getAttribute('data-filter');

                    cards.forEach(card => {
                        const rating = card.getAttribute('data-rating');
                        if (filter === 'all' || rating === filter) {
                            card.style.display = 'flex';
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
