<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan - Laundry Azzam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tambah_layanan.css') }}">
</head>
<body>
    <div class="layout">
        @include('partials.sidebar', ['active' => 'pesanan'])

        <main class="main">
            {{-- Topbar --}}
            <header class="topbar">
                <div class="user-pill">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#23783b"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 3a3 3 0 1 1-3 3 3 3 0 0 1 3-3zm0 14.2a7.2 7.2 0 0 1-6-3.22c.03-1.99 4-3.08 6-3.08s5.97 1.09 6 3.08a7.2 7.2 0 0 1-6 3.22z"/></svg>
                    <span>Admin</span>
                </div>
            </header>

            {{-- Form Page Header --}}
            <div class="form-header">
                <div class="form-header-title">
                    <h1>Tambah Pesanan</h1>
                    <p>Isi data berikut lalu simpan.</p>
                </div>
                <div class="form-header-quote">
                    <span>Jaga kualitas, setiap cucian</span>
                </div>
            </div>

            {{-- Form Card --}}
            <div class="form-card">
                <form action="{{ route('pesanan') }}" method="GET">
                    <div class="form-grid">
                        {{-- Row 1 --}}
                        <div class="form-group">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input type="text" id="nama_pelanggan" name="nama_pelanggan">
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input type="text" id="no_hp" name="no_hp">
                        </div>

                        {{-- Row 2 --}}
                        <div class="form-group">
                            <label for="jenis_layanan">Jenis Layanan</label>
                            <input type="text" id="jenis_layanan" name="jenis_layanan">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="text" id="tanggal_masuk" name="tanggal_masuk">
                        </div>

                        {{-- Row 3 --}}
                        <div class="form-group">
                            <label for="berat_jumlah">Berat / Jumlah</label>
                            <input type="text" id="berat_jumlah" name="berat_jumlah">
                        </div>

                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="text" id="total_harga" name="total_harga">
                        </div>

                        {{-- Row 4 --}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" id="status" name="status">
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('pesanan') }}" class="btn-save">Simpan</a>
                        <a href="{{ route('pesanan') }}" class="btn-cancel">Batal</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
