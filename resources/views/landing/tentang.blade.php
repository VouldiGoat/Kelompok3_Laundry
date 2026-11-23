<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Laundry Azzam</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Lenis Smooth Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.18/dist/lenis.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/landing/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/tentang.css') }}">
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
                <a href="{{ route('tentang') }}" class="nav-link active">Tentang Kami</a>
                <a href="{{ route('layanan.user') }}" class="nav-link">Layanan</a>
                <a href="{{ route('status_pesanan') }}" class="nav-link">Status Pesanan</a>
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


    {{-- ==================== CERITA & KOMITMEN KAMI ==================== --}}
    <section class="about-card-section" id="cerita">
        <div class="about-card-wrapper" data-animate="fade-up">

            {{-- Left: Storefront Image --}}
            <div class="about-store-img-box" data-animate="fade-right" data-delay="100">
                <img src="{{ asset('images/about-store.png') }}" alt="Toko Laundry Azzam">
            </div>

            {{-- Center: Story & Features --}}
            <div class="about-story-content" data-animate="fade-up" data-delay="150">
                <span class="about-badge">Tentang Kami</span>
                <h2 class="about-story-title">Cerita & Komitmen Kami</h2>
                <p class="about-story-desc">
                    Laundry Azzam adalah layanan laundry profesional yang berdiri sejak 2010. Kami berkomitmen memberikan pelayanan terbaik kepada setiap pelanggan dengan deterjen berkualitas, mesin modern, dan tenaga kerja yang berpengalaman agar pakaian selalu bersih, wangi, dan terawat.
                </p>

                {{-- 3 Mini Features --}}
                <div class="about-features-row">
                    {{-- 1. Bersih & Higienis --}}
                    <div class="about-feat-item" data-animate="fade-up" data-delay="250">
                        <div class="feat-circle-icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                <polyline points="9 12 11 14 15 10"/>
                            </svg>
                        </div>
                        <div class="feat-labels">
                            <h4>Bersih & Higienis</h4>
                            <p>Pakaian lebih sehat</p>
                        </div>
                    </div>

                    {{-- 2. Pelayanan Ramah --}}
                    <div class="about-feat-item" data-animate="fade-up" data-delay="350">
                        <div class="feat-circle-icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                            </svg>
                        </div>
                        <div class="feat-labels">
                            <h4>Pelayanan Ramah</h4>
                            <p>Kepuasan pelanggan prioritas kami</p>
                        </div>
                    </div>

                    {{-- 3. Tepat Waktu --}}
                    <div class="about-feat-item" data-animate="fade-up" data-delay="450">
                        <div class="feat-circle-icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </div>
                        <div class="feat-labels">
                            <h4>Tepat Waktu</h4>
                            <p>Pesanan sesuai jadwal</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Handwritten Quote --}}
            <div class="about-quote-box" data-animate="fade-left" data-delay="200">
                <span class="quote-text">
                    Karena pakaian bersih<br>
                    adalah awal dari<br>
                    hari yang lebih baik
                </span>
                <span class="quote-heart">♡</span>
            </div>

        </div>
    </section>


    {{-- ==================== VISI & MISI KAMI ==================== --}}
    <section class="visi-misi-section" id="visi-misi">
        <div class="visi-misi-wrapper" data-animate="fade-up">
            <h2 class="visi-misi-title" data-animate="fade-up" data-delay="100">Visi & Misi Kami</h2>

            <div class="visi-misi-grid">
                {{-- Box Visi --}}
                <div class="vm-box" data-animate="fade-right" data-delay="200">
                    <h3>Visi</h3>
                    <p>
                        Menjadi penyedia layanan laundry profesional terdepan, terpercaya, dan pilihan utama bagi masyarakat dengan mengutamakan standar kebersihan serta keharuman maksimal, kecepatan dan ketepatan waktu pengerjaan, serta inovasi layanan digital yang modern demi memberikan kemudahan, keamanan, dan kenyamanan perawatan pakaian keluarga setiap hari.
                    </p>
                </div>

                {{-- Box Misi --}}
                <div class="vm-box" data-animate="fade-left" data-delay="300">
                    <h3>Misi</h3>
                    <p>
                        <strong>1. Kualitas Cuci Terbaik:</strong> Menggunakan mesin modern dan deterjen ramah lingkungan yang aman bagi serat pakaian.
                    </p>
                    <p>
                        <strong>2. Tepat Waktu & Teliti:</strong> Menerapkan quality control ketat agar setiap cucian selesai bersih, rapi, dan sesuai jadwal.
                    </p>
                    <p>
                        <strong>3. Kemudahan Layanan Digital:</strong> Menyediakan pemesanan dan pelacakan status cucian berbasis web yang praktis dan transparan.
                    </p>
                </div>
            </div>
        </div>
    </section>


    {{-- ==================== KEUNGGULAN PROSES KAMI ==================== --}}
    <section class="keunggulan-section" id="keunggulan">
        <div class="keunggulan-header" data-animate="fade-up">
            <h2>Keunggulan Proses Kami</h2>
            <p>Kami menerapkan standar terbaik di setiap tahap pencucian untuk menjaga kualitas pakaian Anda.</p>
        </div>

        <div class="keunggulan-grid">
            {{-- Card 1: Deterjen Ramah Lingkungan --}}
            <div class="keunggulan-card card-mint" data-animate="fade-up" data-delay="100">
                <div class="k-icon-circle k-icon-mint">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/>
                        <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
                    </svg>
                </div>
                <h3>Deterjen Ramah Lingkungan</h3>
                <p>Formula aktif lembut untuk serat pakaian dan tidak merusak lingkungan.</p>
            </div>

            {{-- Card 2: Mesin Modern & Higienis --}}
            <div class="keunggulan-card card-peach" data-animate="fade-up" data-delay="250">
                <div class="k-icon-circle k-icon-peach">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="2" width="16" height="20" rx="3" ry="3"/>
                        <circle cx="12" cy="13" r="5"/>
                        <path d="M12 10a3 3 0 0 1 3 3"/>
                        <line x1="8" y1="6" x2="8.01" y2="6"/>
                        <line x1="11" y1="6" x2="11.01" y2="6"/>
                    </svg>
                </div>
                <h3>Mesin Modern & Higienis</h3>
                <p>Menggunakan mesin cuci dan pengering dengan teknologi terkini.</p>
            </div>

            {{-- Card 3: Quality Control Ketat --}}
            <div class="keunggulan-card card-mint" data-animate="fade-up" data-delay="400">
                <div class="k-icon-circle k-icon-mint">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <polyline points="9 12 11 14 15 10"/>
                    </svg>
                </div>
                <h3>Quality Control Ketat</h3>
                <p>Setiap pakaian diperiksa dengan teliti dari proses cuci hingga setrika.</p>
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
