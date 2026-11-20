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


                <form action="{{ route('pesan.store') }}" method="POST">

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


                    {{-- RINCIAN HARGA OTOMATIS --}}

                    <div class="order-price-summary">

                        <h3>Rincian Pembayaran</h3>

                        <div class="price-row">
                            <span>Subtotal</span>
                            <strong id="subtotalPreview">Rp 0</strong>
                        </div>

                        <div class="price-row">
                            <span>Biaya Antar</span>
                            <strong>Rp 0</strong>
                        </div>

                        <div class="price-row price-total">
                            <span>Total Pembayaran</span>
                            <strong id="totalPreview">Rp 0</strong>
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
            // Mengambil elemen pilihan layanan dan jumlah cucian
    const serviceSelect = document.getElementById('services_id');
    const jumlahInput = document.getElementById('jumlah');

    // Elemen untuk menampilkan harga
    const subtotalPreview = document.getElementById('subtotalPreview');
    const totalPreview = document.getElementById('totalPreview');

    // Biaya antar sementara Rp0
    const deliveryFee = 0;

    // Mengubah angka menjadi format Rupiah
    function formatRupiah(angka) {
        return 'Rp ' + Math.round(angka).toLocaleString('id-ID');
    }

    // Menghitung harga pesanan
    function calculatePrice() {

        // Mendapatkan pilihan layanan pelanggan
        const selectedOption =
            serviceSelect.options[serviceSelect.selectedIndex];

        // Mengambil harga dari pilihan layanan
        const price = Number(
            selectedOption?.dataset.price || 0
        );

        // Mengambil jumlah cucian
        const jumlah = Number(jumlahInput.value || 0);

        // Menghitung subtotal dan total
        const subtotal = price * jumlah;
        const total = subtotal + deliveryFee;

        // Memperbarui tampilan harga
        subtotalPreview.textContent = formatRupiah(subtotal);
        totalPreview.textContent = formatRupiah(total);
    }

    // Hitung ulang jika layanan berubah
    serviceSelect.addEventListener('change', calculatePrice);

    // Hitung ulang jika jumlah berubah
    jumlahInput.addEventListener('input', calculatePrice);

    // Hitung harga saat halaman pertama dibuka
    calculatePrice();


    // Menyesuaikan tanggal antar dengan tanggal jemput
    const pickupDate = document.getElementById('pickup_date');
    const deliveryDate = document.getElementById('delivery_date');

    pickupDate.addEventListener('change', function () {

        deliveryDate.min = this.value;

        if (
            deliveryDate.value &&
            deliveryDate.value < this.value
        ) {
            deliveryDate.value = '';
        }
    });
    </script>
</body>

</html>
