<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - Laundry Azzam</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Lenis Smooth Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.18/dist/lenis.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/landing/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/layanan.css') }}">
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
                <a href="{{ route('layanan.user') }}" class="nav-link active">Layanan</a>
                <a href="{{ route('status_pesanan') }}" class="nav-link">Status Pesanan</a>
                <a href="{{ route('testimoni') }}" class="nav-link">Testimoni</a>

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


    {{-- ==================== PILIHAN LAYANAN LAUNDRY TERBAIK ==================== --}}
    <section class="user-services-section" id="layanan">
        <div class="user-services-header" data-animate="fade-up">
            <span class="user-services-tag">— LAYANAN KAMI —</span>
            <h2 class="user-services-title">Pilihan Layanan Laundry Terbaik</h2>
            <p class="user-services-subtitle">
                Standar perawatan terbaik agar pakaian Anda selalu bersih, higienis, dan terawat.
            </p>
        </div>

        <div class="user-services-wrapper" data-animate="fade-up" data-delay="100">
            <div class="user-services-grid">

                {{-- Card 1: Cuci Komplit --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="50">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="2" width="18" height="20" rx="3" ry="3"/>
                                    <circle cx="12" cy="13" r="5"/>
                                    <path d="M12 10a3 3 0 0 1 3 3"/>
                                    <line x1="7" y1="6" x2="7.01" y2="6"/>
                                    <line x1="10" y1="6" x2="10.01" y2="6"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Cuci Komplit</h3>
                        </div>
                        <p class="service-card-desc">Cuci bersih, wangi, kering sempurna, dan disetrika rapi.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 8.000/kg</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 2: Cuci Lipat --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="100">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a2 2 0 0 0 1.25 1.54L6 11.5V20a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-8.5l1.89-.8a2 2 0 0 0 1.25-1.54l.58-3.47a2 2 0 0 0-1.34-2.23z"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Cuci Lipat</h3>
                        </div>
                        <p class="service-card-desc">Pakaian dicuci bersih, wangi, dan dilipat rapi siap simpan.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 6.000/kg</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 3: Cuci Express --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="150">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 14 14"/>
                                    <path d="M19.5 8l-3-3"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Cuci Express</h3>
                        </div>
                        <p class="service-card-desc">Layanan kilat super cepat selesai dalam beberapa jam.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 12.000/kg</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 4: Setrika Saja --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="200">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 18h18l-3-8H7a4 4 0 0 0-4 4v4z"/>
                                    <path d="M6 10V6a2 2 0 0 1 2-2h8"/>
                                    <circle cx="16" cy="14" r="1" fill="currentColor"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Setrika Saja</h3>
                        </div>
                        <p class="service-card-desc">Pakaian disetrika rapi, licin, dan harum seketika.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 5.000/kg</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 5: Bed Cover --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="250">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 4v16"/>
                                    <path d="M2 8h18a2 2 0 0 1 2 2v10"/>
                                    <path d="M2 17h20"/>
                                    <path d="M6 8v9"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Bed Cover</h3>
                        </div>
                        <p class="service-card-desc">Perawatan khusus bed cover agar higienis dan wangi.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 35.000/pcs</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 6: Selimut/Sprei --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="300">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                                    <path d="M3 10h18"/>
                                    <path d="M7 5v14"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Selimut/Sprei</h3>
                        </div>
                        <p class="service-card-desc">Pencucian mendalam agar segar dan bebas debu.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 20.000/pcs</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 7: Boneka --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="350">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="14" r="7"/>
                                    <circle cx="8" cy="7" r="3"/>
                                    <circle cx="16" cy="7" r="3"/>
                                    <circle cx="10" cy="13" r="1" fill="currentColor"/>
                                    <circle cx="14" cy="13" r="1" fill="currentColor"/>
                                    <path d="M11 16c.6.4 1.4.4 2 0"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Boneka</h3>
                        </div>
                        <p class="service-card-desc">Cuci aman khusus boneka kesayangan hingga ke dalam.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 30.000/kg</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 8: Ambal --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="400">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="4" y="4" width="16" height="16" rx="2"/>
                                    <line x1="4" y1="9" x2="20" y2="9"/>
                                    <line x1="4" y1="15" x2="20" y2="15"/>
                                    <line x1="9" y1="4" x2="9" y2="20"/>
                                    <line x1="15" y1="4" x2="15" y2="20"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Ambal</h3>
                        </div>
                        <p class="service-card-desc">Pembersihan menyeluruh karpet dari noda dan debu.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 15.000/m²</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 9: Sepatu/Tas --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="450">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 17h18a1 1 0 0 0 1-1v-2a4 4 0 0 0-4-4h-3l-3-4H7a4 4 0 0 0-4 4v7z"/>
                                    <path d="M3 17v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2"/>
                                    <line x1="9" y1="10" x2="11" y2="12"/>
                                    <line x1="12" y1="8" x2="14" y2="10"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Sepatu/Tas</h3>
                        </div>
                        <p class="service-card-desc">Deep cleaning profesional agar kembali terawat.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 20.000/pcs</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 10: Dry Clean --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="500">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 3a2 2 0 0 0-2 2c0 1 .5 1.5 2 2.5l7.5 4.5a2 2 0 0 1 1 1.7V17a2 2 0 0 1-2 2H3.5a2 2 0 0 1-2-2v-3.3c0-.7.4-1.3 1-1.7L10 7.5"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Dry Clean</h3>
                        </div>
                        <p class="service-card-desc">Perawatan khusus tanpa air untuk bahan sensitif.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 20.000 /pcs</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 11: Cuci Satuan --}}
                <div class="user-service-card" data-animate="fade-up" data-delay="550">
                    <div>
                        <div class="service-card-top">
                            <div class="service-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                                    <line x1="3" y1="6" x2="21" y2="6"/>
                                    <path d="M16 10a4 4 0 0 1-8 0"/>
                                </svg>
                            </div>
                            <h3 class="service-card-title">Cuci Satuan</h3>
                        </div>
                        <p class="service-card-desc">Perawatan satuan khusus untuk pakaian kesayangan Anda.</p>
                    </div>
                    <div>
                        <div class="service-card-divider"></div>
                        <div class="service-card-bottom">
                            <span class="service-card-price">Rp 20.000 /pcs</span>
                            <a href="{{ route('pesan') }}" class="btn-pesan-card">
                                Pesan
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ==================== CARA PEMESANAN MUDAH ==================== --}}
    <section class="user-steps-section" id="cara-pesan">
        <div class="user-steps-header" data-animate="fade-up">
            <h2 class="user-steps-title">Cara Pemesanan Mudah</h2>
            <p class="user-steps-subtitle">
                Tentukan paket laundry dan jenis layanan yang sesuai dengan kebutuhan pakaian Anda.
            </p>
        </div>

        <div class="user-steps-grid">

            {{-- Step 1 --}}
            <div class="user-step-card" data-animate="fade-up" data-delay="100">
                <span class="step-tag-badge">Langkah 1</span>
                <h3 class="step-card-title">Pilih Layanan</h3>
                <p class="step-card-desc">Tentukan paket laundry sesuai kebutuhan Anda.</p>
            </div>

            {{-- Step 2 --}}
            <div class="user-step-card" data-animate="fade-up" data-delay="200">
                <span class="step-tag-badge">Langkah 2</span>
                <h3 class="step-card-title">Pesan</h3>
                <p class="step-card-desc">Isi detail pesanan dan jadwal penjemputan Anda.</p>
            </div>

            {{-- Step 3 --}}
            <div class="user-step-card" data-animate="fade-up" data-delay="300">
                <span class="step-tag-badge">Langkah 3</span>
                <h3 class="step-card-title">Sedang Diproses</h3>
                <p class="step-card-desc">Pakaian Anda dicuci, dikeringkan, dan disetrika rapi.</p>
            </div>

            {{-- Step 4 --}}
            <div class="user-step-card" data-animate="fade-up" data-delay="400">
                <span class="step-tag-badge">Langkah 4</span>
                <h3 class="step-card-title">Siap di Ambil</h3>
                <p class="step-card-desc">Kami akan memberi notifikasi saat pakaian selesai.</p>
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
</body>
</html>
