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
                <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                <a href="{{ route('tentang') }}" class="nav-link">Tentang Kami</a>
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

            {{-- ==================== FORM CARD ==================== --}}

            <div class="order-card">

                {{-- Pesan berhasil --}}
                @if (session('success'))
                    <div class="form-alert form-alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Pesan validasi --}}
                @if ($errors->any())
                    <div class="form-alert form-alert-error">
                        <strong>Mohon periksa kembali data pesanan Anda.</strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('pesan.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="order-grid">

                        {{-- ROW 1: NAMA DAN LAYANAN --}}

                        <div class="order-group">
                            <label for="nama_pemesan">Nama Lengkap</label>

                            <input
                                type="text"
                                id="nama_pemesan"
                                name="nama_pemesan"
                                value="{{ old('nama_pemesan') }}"
                                placeholder="Masukkan nama lengkap"
                                maxlength="100"
                                required
                            >

                            @error('nama_pemesan')
                                <small class="form-error">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="order-group">
                            <label for="services_id">Layanan</label>

                            <select
                                id="services_id"
                                name="services_id"
                                required
                            >
                                <option value="">-- Pilih Layanan --</option>

                                @forelse ($services as $service)
                                    <option
                                        value="{{ $service->services_id }}"
                                        data-price="{{ $service->price }}"
                                        @selected(old('services_id') == $service->services_id)
                                    >
                                        {{ $service->services_name }}
                                        - Rp {{ number_format($service->price, 0, ',', '.') }}/Kg
                                    </option>
                                @empty
                                    <option value="" disabled>
                                        Belum ada layanan tersedia
                                    </option>
                                @endforelse

                            </select>

                            @error('services_id')
                                <small class="form-error">{{ $message }}</small>
                            @enderror
                        </div>


                        {{-- ROW 2: BERAT DAN TANGGAL JEMPUT --}}

                        <div class="order-group">
                            <label for="jumlah">Berat / Jumlah (Kg)</label>

                            <input
                                type="number"
                                id="jumlah"
                                name="jumlah"
                                value="{{ old('jumlah') }}"
                                placeholder="Contoh: 3"
                                min="0.01"
                                max="999999"
                                step="0.01"
                                required
                            >

                            @error('jumlah')
                                <small class="form-error">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="order-group">
                            <label for="pickup_date">Tanggal Jemput</label>

                            <input
                                type="date"
                                id="pickup_date"
                                name="pickup_date"
                                value="{{ old('pickup_date') }}"
                                min="{{ now()->format('Y-m-d') }}"
                                required
                            >

                            @error('pickup_date')
                                <small class="form-error">{{ $message }}</small>
                            @enderror
                        </div>


                        {{-- ROW 3: JAM JEMPUT DAN TANGGAL ANTAR --}}

                        <div class="order-group">
                            <label for="pickup_time">Jam Jemput</label>

                            <input
                                type="time"
                                id="pickup_time"
                                name="pickup_time"
                                value="{{ old('pickup_time') }}"
                                required
                            >

                            @error('pickup_time')
                                <small class="form-error">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="order-group">
                            <label for="delivery_date">Tanggal Antar (Opsional)</label>

                            <input
                                type="date"
                                id="delivery_date"
                                name="delivery_date"
                                value="{{ old('delivery_date') }}"
                                min="{{ old('pickup_date', now()->format('Y-m-d')) }}"
                            >

                            @error('delivery_date')
                                <small class="form-error">{{ $message }}</small>
                            @enderror
                        </div>


                        {{-- ROW 4: ALAMAT DAN CATATAN --}}

                        <div class="order-group">
                            <label for="addresses">Alamat Jemput</label>

                            <input
                                type="text"
                                id="addresses"
                                name="addresses"
                                value="{{ old('addresses') }}"
                                placeholder="Masukkan alamat lengkap"
                                maxlength="150"
                                required
                            >

                            @error('addresses')
                                <small class="form-error">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="order-group">
                            <label for="notes">Catatan</label>

                            <textarea
                                id="notes"
                                name="notes"
                                rows="3"
                                placeholder="Catatan tambahan untuk pesanan"
                            >{{ old('notes') }}</textarea>

                            @error('notes')
                                <small class="form-error">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>


                        {{-- ZONA PENGIRIMAN --}}
                        <div class="order-group">

                            <label for="delivery_zone_id">
                                Wilayah Penjemputan
                            </label>

                            <select
                                name="delivery_zone_id"
                                id="delivery_zone_id"
                                required
                            >

                                <option value="">-- Pilih Wilayah --</option>

                                @foreach ($zones as $zone)

                                    <option
                                        value="{{ $zone->delivery_zones_id }}"
                                        data-fee="{{ $zone->delivery_fee }}"
                                        @selected(old('delivery_zone_id') == $zone->delivery_zones_id)
                                    >
                                        {{ $zone->zone_name }}
                                        - Rp {{ number_format($zone->delivery_fee, 0, ',', '.') }}
                                    </option>

                                @endforeach

                            </select>

                            @error('delivery_zone_id')
                                <small class="form-error">{{ $message }}</small>
                            @enderror

                        </div>

                    {{-- RINCIAN HARGA OTOMATIS --}}

                    <div class="order-price-summary">

                        <h3>Rincian Pembayaran</h3>

                        <div class="price-row">
                            <span>Subtotal</span>
                            <strong id="subtotalPreview">Rp 0</strong>
                        </div>

                        <div class="price-row">
                            <span>Biaya Antar</span>
                            <strong id="deliveryPreview">Rp 0</strong>
                        </div>

                        <div class="price-row price-total">
                            <span>Total Pembayaran</span>
                            <strong id="totalPreview">Rp 0</strong>
                        </div>

                    </div>


                    {{-- METODE PEMBAYARAN --}}
                    <div class="payment-section">

                        <h3>Metode Pembayaran</h3>

                        <p class="payment-description">
                            Silakan pilih metode pembayaran yang ingin digunakan.
                        </p>


                        <div class="payment-method-grid">

                            {{-- QRIS --}}
                            <label class="payment-option">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="QRIS"
                                    required
                                    @checked(old('payment_method') === 'QRIS')
                                >

                                <span class="payment-option-content">
                                    <strong>QRIS</strong>
                                    <small>Scan QR untuk membayar</small>
                                </span>

                            </label>


                            {{-- BCA --}}
                            <label class="payment-option">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="BCA"
                                    @checked(old('payment_method') === 'BCA')
                                >

                                <span class="payment-option-content">
                                    <strong>BCA</strong>
                                    <small>Transfer Bank BCA</small>
                                </span>

                            </label>


                            {{-- E-WALLET --}}
                            <label class="payment-option">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="E-WALLET"
                                    @checked(old('payment_method') === 'E-WALLET')
                                >

                                <span class="payment-option-content">
                                    <strong>E-Wallet</strong>
                                    <small>DANA / OVO / GoPay</small>
                                </span>

                            </label>


                            {{-- TUNAI --}}
                            <label class="payment-option">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="TUNAI"
                                    @checked(old('payment_method') === 'TUNAI')
                                >

                                <span class="payment-option-content">
                                    <strong>Tunai</strong>
                                    <small>Bayar langsung di kasir</small>
                                </span>

                            </label>

                        </div>


                        @error('payment_method')
                            <small class="form-error">{{ $message }}</small>
                        @enderror


                        {{-- INSTRUKSI QRIS --}}
                        <div id="qrisInstruction" class="payment-instruction" hidden>

                            <h4>Pembayaran QRIS</h4>

                            <div class="qris-demo">

                                {{-- QR ilustrasi, bukan kode QR pembayaran aktif --}}
                                <svg
                                    class="qris-mock"
                                    viewBox="0 0 180 180"
                                    role="img"
                                    aria-label="Ilustrasi QRIS demo, bukan kode pembayaran"
                                >
                                    <rect width="180" height="180" rx="8" fill="#ffffff"/>

                                    {{-- Finder kiri atas --}}
                                    <rect x="12" y="12" width="48" height="48" fill="#111827"/>
                                    <rect x="20" y="20" width="32" height="32" fill="#ffffff"/>
                                    <rect x="28" y="28" width="16" height="16" fill="#111827"/>

                                    {{-- Finder kanan atas --}}
                                    <rect x="120" y="12" width="48" height="48" fill="#111827"/>
                                    <rect x="128" y="20" width="32" height="32" fill="#ffffff"/>
                                    <rect x="136" y="28" width="16" height="16" fill="#111827"/>

                                    {{-- Finder kiri bawah --}}
                                    <rect x="12" y="120" width="48" height="48" fill="#111827"/>
                                    <rect x="20" y="128" width="32" height="32" fill="#ffffff"/>
                                    <rect x="28" y="136" width="16" height="16" fill="#111827"/>

                                    {{-- Pola dekoratif --}}
                                    <g fill="#111827">
                                        <rect x="72" y="12" width="8" height="8"/>
                                        <rect x="88" y="12" width="8" height="8"/>
                                        <rect x="72" y="28" width="8" height="8"/>
                                        <rect x="96" y="36" width="8" height="8"/>
                                        <rect x="72" y="52" width="8" height="8"/>
                                        <rect x="88" y="60" width="8" height="8"/>
                                        <rect x="112" y="72" width="8" height="8"/>
                                        <rect x="128" y="72" width="8" height="8"/>
                                        <rect x="144" y="72" width="8" height="8"/>
                                        <rect x="72" y="88" width="8" height="8"/>
                                        <rect x="88" y="88" width="8" height="8"/>
                                        <rect x="104" y="88" width="8" height="8"/>
                                        <rect x="128" y="96" width="8" height="8"/>
                                        <rect x="152" y="104" width="8" height="8"/>
                                        <rect x="72" y="112" width="8" height="8"/>
                                        <rect x="88" y="120" width="8" height="8"/>
                                        <rect x="104" y="120" width="8" height="8"/>
                                        <rect x="120" y="120" width="8" height="8"/>
                                        <rect x="144" y="128" width="8" height="8"/>
                                        <rect x="72" y="144" width="8" height="8"/>
                                        <rect x="96" y="144" width="8" height="8"/>
                                        <rect x="112" y="152" width="8" height="8"/>
                                        <rect x="136" y="152" width="8" height="8"/>
                                        <rect x="160" y="152" width="8" height="8"/>
                                    </g>

                                    <text
                                        x="90"
                                        y="98"
                                        text-anchor="middle"
                                        font-size="12"
                                        font-weight="bold"
                                        fill="#dc2626"
                                    >
                                        DEMO
                                    </text>
                                </svg>

                                <strong>QRIS LAUNDRY AZZAM</strong>

                                <span>
                                    ILUSTRASI SAJA — BUKAN QR PEMBAYARAN AKTIF
                                </span>

                            </div>

                            <p>
                                Ini hanya tampilan contoh QRIS. Ganti dengan gambar QRIS resmi
                                milik Laundry Azzam sebelum sistem digunakan untuk transaksi nyata.
                            </p>

                        </div>


                        {{-- INSTRUKSI BCA --}}
                        <div id="bcaInstruction" class="payment-instruction" hidden>

                            <h4>Transfer Bank BCA</h4>

                            <p>
                                Nomor rekening dan nama pemilik rekening resmi Laundry Azzam
                                akan dicantumkan di sini.
                            </p>

                            <small>
                                Pastikan rekening tujuan sudah benar sebelum melakukan transfer.
                            </small>

                        </div>


                        {{-- INSTRUKSI E-WALLET --}}
                        <div id="ewalletInstruction" class="payment-instruction" hidden>

                            <h4>Pembayaran E-Wallet</h4>

                            <p>
                                DANA / OVO / GoPay
                            </p>

                            <small>
                                Isi nomor akun resmi Laundry Azzam di sini sebelum digunakan.
                            </small>

                        </div>


                        {{-- INSTRUKSI TUNAI --}}
                        <div id="cashInstruction" class="payment-instruction" hidden>

                            <h4>Pembayaran Tunai</h4>

                            <p>
                                Lakukan pembayaran tunai terlebih dahulu di kasir Laundry Azzam,
                                lalu unggah foto nota pembayaran sebagai bukti.
                            </p>

                        </div>


                        {{-- UPLOAD BUKTI PEMBAYARAN --}}
                        <div class="payment-proof">

                            <label for="payment_proof">
                                Upload Bukti Pembayaran
                            </label>

                            <input
                                type="file"
                                id="payment_proof"
                                name="payment_proof"
                                accept=".jpg,.jpeg,.png,.pdf"
                                required
                            >

                            <small>
                                Format JPG, JPEG, PNG, atau PDF. Maksimal 5 MB.
                            </small>

                            @error('payment_proof')
                                <span class="form-error">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>



                    {{-- ACTION BUTTONS --}}

                    <div class="order-actions">

                        <button
                            type="submit"
                            class="btn-order-submit"
                        >
                            Kirim Pesanan
                        </button>

                        <a
                            href="{{ route('home') }}"
                            class="btn-order-cancel"
                        >
                            Batal
                        </a>

                    </div>

                </form>

            </div>


        </div>
    </main>


    {{-- ==================== FOOTER ==================== --}}
    <footer class="footer" data-animate="fade-up">
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
                    <a href="#beranda">Beranda</a>
                    <a href="{{ route('tentang') }}">Tentang Kami</a>
                    <a href="{{ route('layanan.user') }}">Layanan</a>
                </div>
                <div class="footer-links">
                    <a href="#daftar-harga">Daftar Harga</a>
                    <a href="{{ route('status_pesanan') }}">Status Pesanan</a>
                    <a href="#testimoni">Testimoni</a>
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

        {{-- Bottom Copyright --}}
        <div class="footer-bottom">
            <p>&copy; 2026 Laundry Azzam. All rights reserved</p>
        </div>
    </footer>


    {{-- Lenis Smooth Scroll JS --}}
    <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>

    {{-- JS --}}
    <script src="{{ asset('js/landing/home.js') }}"></script>

    {{-- SCRIPT PEMESANAN LAUNDRY AZZAM --}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        // ==========================================
        // 1. NAVBAR MOBILE
        // ==========================================

        const navToggle = document.getElementById('navToggle');
        const navMenu = document.getElementById('navMenu');

        if (navToggle && navMenu) {
            navToggle.addEventListener('click', function () {
                navToggle.classList.toggle('active');
                navMenu.classList.toggle('open');
            });
        }


        // ==========================================
        // 2. MENGAMBIL ELEMEN FORM
        // ==========================================

        const serviceSelect = document.getElementById('services_id');
        const jumlahInput = document.getElementById('jumlah');
        const zoneSelect = document.getElementById('delivery_zone_id');

        const subtotalPreview = document.getElementById('subtotalPreview');
        const deliveryPreview = document.getElementById('deliveryPreview');
        const totalPreview = document.getElementById('totalPreview');


        // ==========================================
        // 3. FORMAT RUPIAH
        // ==========================================

        function formatRupiah(angka) {
            return 'Rp ' + Math.round(angka).toLocaleString('id-ID');
        }

        // Mengubah nilai dari database menjadi angka
        function getNumericValue(value) {
            const number = Number.parseFloat(value ?? 0);
            return Number.isFinite(number) ? number : 0;
        }


        // ==========================================
        // 4. PERHITUNGAN HARGA OTOMATIS
        // ==========================================

        function calculatePrice() {

            // Mengambil layanan yang dipilih
            const selectedService = serviceSelect?.selectedOptions[0];

            // Mengambil harga layanan dari data-price
            const servicePrice = getNumericValue(
                selectedService?.dataset.price
            );


            // Mengambil jumlah cucian
            const jumlah = Math.max(
                0,
                getNumericValue(jumlahInput?.value)
            );


            // Mengambil zona yang dipilih
            const selectedZone = zoneSelect?.selectedOptions[0];

            // Mengambil biaya antar dari data-fee
            const deliveryFee = getNumericValue(
                selectedZone?.dataset.fee
            );


            // Menghitung subtotal
            const subtotal = servicePrice * jumlah;


            // Menghitung total pembayaran
            const total = subtotal + deliveryFee;


            // Menampilkan subtotal
            if (subtotalPreview) {
                subtotalPreview.textContent = formatRupiah(subtotal);
            }


            // Menampilkan biaya antar
            if (deliveryPreview) {
                deliveryPreview.textContent = formatRupiah(deliveryFee);
            }


            // Menampilkan total
            if (totalPreview) {
                totalPreview.textContent = formatRupiah(total);
            }

        }


        // ==========================================
        // 5. EVENT PERUBAHAN FORM
        // ==========================================

        // Ketika layanan berubah
        serviceSelect?.addEventListener('change', calculatePrice);

        // Ketika berat cucian berubah
        jumlahInput?.addEventListener('input', calculatePrice);

        // Ketika zona pengiriman berubah
        zoneSelect?.addEventListener('change', calculatePrice);

        // Menghitung harga ketika halaman pertama dibuka
        calculatePrice();


        // ==========================================
        // 6. TANGGAL JEMPUT DAN TANGGAL ANTAR
        // ==========================================

        const pickupDate = document.getElementById('pickup_date');
        const deliveryDate = document.getElementById('delivery_date');

        if (pickupDate && deliveryDate) {

            // Mengatur batas minimum tanggal antar
            function updateDeliveryDate() {

                const selectedDate = pickupDate.value;

                if (selectedDate) {
                    deliveryDate.min = selectedDate;
                }

                // Menghapus tanggal antar yang lebih awal
                if (
                    deliveryDate.value &&
                    selectedDate &&
                    deliveryDate.value < selectedDate
                ) {
                    deliveryDate.value = '';
                }
            }

            pickupDate.addEventListener('change', updateDeliveryDate);

            // Menyesuaikan saat halaman dibuka
            updateDeliveryDate();
        }


        // ==========================================
        // 7. METODE PEMBAYARAN
        // ==========================================

        const paymentRadios = document.querySelectorAll(
            'input[name="payment_method"]'
        );


        // Instruksi setiap metode pembayaran
        const paymentInstructions = {
            'QRIS': document.getElementById('qrisInstruction'),
            'BCA': document.getElementById('bcaInstruction'),
            'E-WALLET': document.getElementById('ewalletInstruction'),
            'TUNAI': document.getElementById('cashInstruction')
        };


        // Menampilkan instruksi sesuai metode
        function showPaymentInstruction() {

            // Menyembunyikan semua instruksi
            Object.values(paymentInstructions).forEach(function (element) {
                if (element) {
                    element.hidden = true;
                }
            });


            // Mengambil metode yang dipilih
            const selectedPayment = document.querySelector(
                'input[name="payment_method"]:checked'
            );


            // Jika belum memilih metode
            if (!selectedPayment) {
                return;
            }


            // Menampilkan instruksi metode terpilih
            const selectedInstruction =
                paymentInstructions[selectedPayment.value];

            if (selectedInstruction) {
                selectedInstruction.hidden = false;
            }

        }


        // Event ketika metode pembayaran dipilih
        paymentRadios.forEach(function (radio) {
            radio.addEventListener('change', showPaymentInstruction);
        });


        // Mempertahankan pilihan setelah validasi gagal
        showPaymentInstruction();


    });
    </script>


</body>

</html>
