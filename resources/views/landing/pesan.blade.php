<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Sekarang - Laundry Azzam</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/landing/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/pesan.css') }}">
</head>

<body>

    {{-- ==================== NAVBAR ==================== --}}
    <header class="navbar pesan-navbar" id="navbar">
        <div class="navbar-container">

            {{-- Brand Logo Text --}}
            <a href="{{ route('home') }}" class="pesan-brand-logo">
                <span class="pesan-logo-title">Laundry Azzam</span>
                <span class="pesan-logo-since">Since 2015</span>
            </a>

            {{-- Nav Links --}}
            <nav class="navbar-menu" id="navMenu">
                <a href="{{ route('home') }}#beranda" class="nav-link">Beranda</a>
                <a href="{{ route('home') }}#tentang" class="nav-link">Tentang Kami</a>
                <a href="{{ route('home') }}#layanan" class="nav-link">Layanan</a>
                <a href="{{ route('home') }}#daftar-harga" class="nav-link">Daftar Harga</a>
                <a href="{{ route('home') }}#status-pesanan" class="nav-link">Status Pesanan</a>
                <a href="{{ route('home') }}#testimoni" class="nav-link">Testimoni</a>

                {{-- Mobile Menu Actions --}}
                <div class="mobile-menu-actions">
                    <a href="{{ route('pesan') }}" class="mobile-cta">Pesan Sekarang</a>
                </div>
            </nav>

            {{-- Action Buttons --}}
            <div class="navbar-actions">
                <a href="{{ route('pesan') }}" class="pesan-navbar-btn">Pesan Sekarang</a>
            </div>

            {{-- Mobile Toggle --}}
            <button class="navbar-toggle" id="navToggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>
    </header>


    {{-- ==================== MAIN FORM PESANAN ==================== --}}
    <main class="order-page">
        <div class="order-container">

            {{-- Section Header --}}
            <div class="order-header">
                <span class="order-badge">— PESAN SEKARANG —</span>
                <h1 class="order-title">Form Pemesanan Laundry</h1>
                <p class="order-subtitle">Isi data berikut, kami akan segera memproses cucian Anda.</p>
            </div>

            {{-- Form Card --}}
            <div class="order-card">
                <form action="{{ route('home') }}" method="GET">
                    <div class="order-grid">
                        {{-- Row 1 --}}
                        <div class="order-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap">
                        </div>

                        <div class="order-group">
                            <label for="no_hp">No. HP</label>
                            <input type="text" id="no_hp" name="no_hp">
                        </div>

                        {{-- Row 2 --}}
                        <div class="order-group">
                            <label for="layanan">Layanan</label>
                            <input type="text" id="layanan" name="layanan">
                        </div>

                        <div class="order-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" id="jenis" name="jenis">
                        </div>

                        {{-- Row 3 --}}
                        <div class="order-group">
                            <label for="berat_jumlah">Berat / Jumlah</label>
                            <input type="text" id="berat_jumlah" name="berat_jumlah">
                        </div>

                        <div class="order-group">
                            <label for="tanggal_jemput">Tanggal Jemput</label>
                            <input type="text" id="tanggal_jemput" name="tanggal_jemput">
                        </div>

                        {{-- Row 4 --}}
                        <div class="order-group">
                            <label for="alamat_jemput">Alamat Jemput</label>
                            <input type="text" id="alamat_jemput" name="alamat_jemput">
                        </div>

                        <div class="order-group">
                            <label for="catatan">Catatan</label>
                            <input type="text" id="catatan" name="catatan">
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="order-actions">
                        <a href="{{ route('home') }}" class="btn-order-submit">Kirim Pesanan</a>
                        <a href="{{ route('home') }}" class="btn-order-cancel">Batal</a>
                    </div>
                </form>
            </div>

        </div>
    </main>


    {{-- ==================== FOOTER ==================== --}}
    <footer class="footer-pesan">
        <div class="footer-pesan-container">

            {{-- Col 1: Brand Text --}}
            <div class="footer-pesan-col footer-pesan-brand">
                <h3 class="footer-pesan-title">Laundry Azzam</h3>
                <span class="footer-pesan-since">Since 2015</span>
                <p>
                    Laundry Azzam, solusi laundry praktis,<br>
                    bersih, dan terpercaya untuk Anda.
                </p>
            </div>

            {{-- Col 2: Navigation Links (1 Column) --}}
            <div class="footer-pesan-col footer-pesan-nav">
                <a href="{{ route('home') }}#beranda">Beranda</a>
                <a href="{{ route('home') }}#tentang">Tentang Kami</a>
                <a href="{{ route('home') }}#layanan">Layanan</a>
                <a href="{{ route('home') }}#daftar-harga">Daftar Harga</a>
                <a href="{{ route('home') }}#status-pesanan">Status Pesanan</a>
                <a href="{{ route('home') }}#testimoni">Testimoni</a>
            </div>

            {{-- Col 3: Contact & Address & Masuk Admin --}}
            <div class="footer-pesan-col footer-pesan-contact">
                <p>Jl. Mawar, Kalimantan Tengah</p>
                <p>0812-3456-7890</p>
                <a href="{{ route('login') }}" class="footer-pesan-admin">Masuk Admin</a>
            </div>

            {{-- Col 4: Social Media --}}
            <div class="footer-pesan-col footer-pesan-social">
                <span>Ikuti Kami</span>
                <div class="pesan-social-icons">
                    <a href="#" aria-label="Instagram">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="#" aria-label="WhatsApp">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Facebook">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </footer>

    {{-- Simple toggle script for mobile navbar --}}
    <script>
        var navToggle = document.getElementById('navToggle');
        var navMenu = document.getElementById('navMenu');
        if (navToggle && navMenu) {
            navToggle.addEventListener('click', function () {
                navToggle.classList.toggle('active');
                navMenu.classList.toggle('open');
            });
        }
    </script>
</body>

</html>
