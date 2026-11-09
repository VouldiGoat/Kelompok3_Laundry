<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Azzam - Bersih, Cepat & Terpercaya</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Lenis Smooth Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.18/dist/lenis.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/landing/home.css') }}">
</head>

<body>

    {{-- ==================== HEADER / NAVBAR ==================== --}}
    <header class="navbar" id="navbar">
        <div class="navbar-container">

            {{-- Logo --}}
            <a href="#beranda" class="navbar-logo">
                <img src="{{ asset('images/logo-laundry.png') }}" alt="Laundry Azzam Since 2010">
            </a>

            {{-- Nav Links --}}
            <nav class="navbar-menu" id="navMenu">
                <a href="#beranda" class="nav-link active">Beranda</a>
                <a href="#tentang" class="nav-link">Tentang Kami</a>
                <a href="#layanan" class="nav-link">Layanan</a>
                <a href="#daftar-harga" class="nav-link">Daftar Harga</a>
                <a href="#status-pesanan" class="nav-link">Status Pesanan</a>
                <a href="#testimoni" class="nav-link">Testimoni</a>
            </nav>

            {{-- CTA Button --}}
            <a href="#pesan" class="navbar-cta">Pesan Sekarang</a>

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
                    V-Express Laundry hadir untuk membantu Anda mencuci pakaian dengan cepat, bersih, dan wangi. Nikmati layanan laundry yang praktis dan terpercaya.
                </p>
            </div>

            <div class="hero-image" data-animate="fade-left" data-delay="200" data-parallax data-speed="1.05">
                <img src="{{ asset('storage/landing/banner.png') }}" alt="Laundry Azzam Basket">
            </div>

        </div>
    </section>


    {{-- ==================== TENTANG KAMI ==================== --}}
    <section class="about" id="tentang">
        <div class="about-container">

            {{-- Left: Storefront Image with decorative corner --}}
            <div class="about-image-wrapper" data-animate="fade-right">
                <img src="{{ asset('images/about-store.png') }}" alt="Tentang Laundry Azzam" class="about-image">
            </div>

            {{-- Center: Content --}}
            <div class="about-content" data-animate="fade-up" data-delay="150">
                <span class="section-badge">Tentang Kami</span>
                <h2 class="about-title">Laundry Azzam</h2>
                <p class="about-description">
                    Laundry Azzam adalah layanan laundry yang profesional yang berdiri sejak
                    2010 dan berkomitmen untuk memberikan pelayanan terbaik kepada
                    setiap pelanggan. Kami menggunakan deterjen berkualitas, mesin
                    modern, dan tenaga kerja yang berpengalaman agar pakaian selalu
                    bersih, wangi, dan terawat.
                </p>

                {{-- Features badges --}}
                <div class="about-features">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <strong>Bersih & Higienis</strong>
                            <small>Pakaian lebih sehat.</small>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <strong>Pelayanan Ramah</strong>
                            <small>Kepuasan pelanggan prioritas kami.</small>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <strong>Tepat Waktu</strong>
                            <small>Selalu tepat waktu.</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Handwritten Quote --}}
            <div class="about-quote" data-animate="fade-left" data-delay="250">
                <p class="quote-text">
                    Karena pakaian bersih<br>
                    adalah awal dari<br>
                    hari yang lebih baik
                </p>
                <div class="quote-heart">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#2E7D32" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </div>
            </div>

        </div>
    </section>


    {{-- ==================== LAYANAN ==================== --}}
    <section class="services" id="layanan">
        <div class="services-container">

            <div class="services-header" data-animate="fade-up">
                <span class="section-label">— LAYANAN KAMI —</span>
            </div>

            <h2 class="services-title" data-animate="fade-up" data-delay="100">Pilihan Layanan Laundry Terbaik</h2>
            <p class="services-subtitle" data-animate="fade-up" data-delay="200">
                Kami menyediakan berbagai layanan laundry untuk memenuhi kebutuhan Anda.
            </p>

            <div class="services-grid">

                {{-- Card 1: Cuci & Lipat --}}
                <div class="service-card theme-mint" data-animate="fade-up" data-delay="0">
                    <div class="service-icon">
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#2E7D32" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 10h16l-1.5 10a2 2 0 0 1-2 1.8H7.5a2 2 0 0 1-2-1.8L4 10z"/>
                            <path d="M7 10V7a5 5 0 0 1 10 0v3"/>
                            <line x1="9" y1="14" x2="9" y2="18"/>
                            <line x1="12" y1="14" x2="12" y2="18"/>
                            <line x1="15" y1="14" x2="15" y2="18"/>
                        </svg>
                    </div>
                    <h3 class="service-name">Cuci & Lipat</h3>
                    <p class="service-desc">Cuci bersih dan lipat rapi untuk pakaian anda.</p>
                </div>

                {{-- Card 2: Setrika --}}
                <div class="service-card theme-peach" data-animate="fade-up" data-delay="100">
                    <div class="service-icon">
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 18h18l-3-8H7a4 4 0 0 0-4 4v4z"/>
                            <path d="M6 10V6a2 2 0 0 1 2-2h8"/>
                            <circle cx="16" cy="14" r="1.2" fill="#D97706"/>
                        </svg>
                    </div>
                    <h3 class="service-name">Setrika</h3>
                    <p class="service-desc">Pakaian lebih rapi dan siap pakai.</p>
                </div>

                {{-- Card 3: Laundry Express --}}
                <div class="service-card theme-mint" data-animate="fade-up" data-delay="200">
                    <div class="service-icon">
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#2E7D32" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a2 2 0 0 0 1.25 1.54L6 11.5V20a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-8.5l1.89-.8a2 2 0 0 0 1.25-1.54l.58-3.47a2 2 0 0 0-1.34-2.23z"/>
                            <line x1="12" y1="8" x2="12" y2="13"/>
                            <line x1="10" y1="10" x2="14" y2="10"/>
                        </svg>
                    </div>
                    <h3 class="service-name">Laundry Express</h3>
                    <p class="service-desc">Layanan cepat untuk kebutuhan mendesak.</p>
                </div>

                {{-- Card 4: Cuci Selimut --}}
                <div class="service-card theme-peach" data-animate="fade-up" data-delay="300">
                    <div class="service-icon">
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="6" width="18" height="12" rx="3"/>
                            <path d="M3 11h18"/>
                            <path d="M8 6v5"/>
                            <path d="M13 6v5"/>
                        </svg>
                    </div>
                    <h3 class="service-name">Cuci Selimut</h3>
                    <p class="service-desc">Selimut bersih, bebas debu, dan wangi tahan lama.</p>
                </div>

                {{-- Card 5: Cuci Sepatu --}}
                <div class="service-card theme-mint" data-animate="fade-up" data-delay="400">
                    <div class="service-icon">
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#2E7D32" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 17h18a1 1 0 0 0 1-1v-2a4 4 0 0 0-4-4h-3l-3-4H7a4 4 0 0 0-4 4v7z"/>
                            <path d="M3 17v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2"/>
                            <line x1="9" y1="10" x2="11" y2="12"/>
                            <line x1="12" y1="8" x2="14" y2="10"/>
                        </svg>
                    </div>
                    <h3 class="service-name">Cuci Sepatu</h3>
                    <p class="service-desc">Sepatu bersih, seperti baru kembali.</p>
                </div>

            </div>

        </div>
    </section>


    {{-- ==================== FOOTER ==================== --}}
    <footer class="footer" data-animate="fade-up">
        <div class="footer-container">

            {{-- Col 1: Brand --}}
            <div class="footer-col footer-brand" data-animate="fade-up" data-delay="0">
                <img src="{{ asset('images/logo-laundry.png') }}" alt="Laundry Azzam" class="footer-logo">
                <p>
                    Laundry Azzam, solusi laundry praktis, bersih, dan terpercaya untuk anda.
                </p>
            </div>

            {{-- Col 2: Navigation Links --}}
            <div class="footer-col footer-nav-group" data-animate="fade-up" data-delay="100">
                <div class="footer-links">
                    <a href="#beranda">Beranda</a>
                    <a href="#tentang">Tentang Kami</a>
                    <a href="#layanan">Layanan</a>
                </div>
                <div class="footer-links">
                    <a href="#daftar-harga">Daftar Harga</a>
                    <a href="#status-pesanan">Status Pesanan</a>
                    <a href="#testimoni">Testimoni</a>
                </div>
            </div>

            {{-- Col 3: Contact & Address --}}
            <div class="footer-col footer-contact" data-animate="fade-up" data-delay="200">
                <p>Jl. Mistar Cokrokusukmo</p>
                <p>0812 5004 8608</p>
            </div>

            {{-- Col 4: Social Media --}}
            <div class="footer-col footer-social" data-animate="fade-up" data-delay="300">
                <span>Ikuti Kami</span>
                <div class="social-icons">
                    <a href="#" aria-label="Instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="WhatsApp">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Facebook">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        {{-- Bottom Copyright --}}
        <div class="footer-bottom">
            <p>&copy; 2026 Laundry Azzam. All rights reserved</p>
        </div>
    </footer>


    {{-- Lenis Smooth Scroll JS --}}
    <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>

    {{-- JS --}}
    <script src="{{ asset('js/landing/home.js') }}"></script>

</body>

</html>
