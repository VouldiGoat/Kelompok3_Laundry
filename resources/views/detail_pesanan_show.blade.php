<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rincian Pesanan - Laundry Azzam</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/detail_pesanan.css') }}">
</head>

<body>

<div class="layout">

    @include('partials.sidebar', ['active' => 'detail'])

    <main class="main">

        {{-- TOPBAR --}}
        <header class="topbar">
            <div class="user-pill">
                <span>{{ session('admin_username', 'Admin') }}</span>
            </div>
        </header>


        {{-- BANNER --}}
        <section class="banner">
            <div class="banner-info">
                <h1>Rincian Pesanan</h1>
                <p>Informasi lengkap pesanan pelanggan Laundry Azzam.</p>
            </div>
        </section>


        {{-- PESAN BERHASIL --}}
        @if (session('success'))
            <div class="detail-alert detail-alert-success">
                {{ session('success') }}
            </div>
        @endif


        {{-- PESAN VALIDASI --}}
        @if ($errors->any())
            <div class="detail-alert detail-alert-error">
                <strong>Periksa kembali data yang dimasukkan:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- NOMOR PESANAN --}}
        <div class="detail-page-actions">

            <a href="{{ route('detail_pesanan') }}" class="btn-back">
                &larr; Kembali
            </a>

            <h2>
                ORD-{{ str_pad($order->orders_id, 5, '0', STR_PAD_LEFT) }}
            </h2>

        </div>


        {{-- INFORMASI PESANAN --}}
        <section class="detail-card">

            <h3>Informasi Pelanggan</h3>

            <div class="detail-grid">

                <div class="detail-item">
                    <span>Nama Pemesan</span>
                    <strong>{{ $order->nama_pemesan }}</strong>
                </div>

                <div class="detail-item">
                    <span>Jenis Layanan</span>
                    <strong>{{ $order->service?->services_name ?? '-' }}</strong>
                </div>

                <div class="detail-item">
                    <span>Jumlah / Satuan</span>
                    <strong>{{ $order->satuan }}</strong>
                </div>

                <div class="detail-item">
                    <span>Alamat Jemput</span>
                    <strong>{{ $order->addresses }}</strong>
                </div>

                <div class="detail-item">
                    <span>Tanggal Jemput</span>
                    <strong>{{ \Carbon\Carbon::parse($order->pickup_date)->format('d/m/Y') }}</strong>
                </div>

                <div class="detail-item">
                    <span>Jam Jemput</span>
                    <strong>{{ $order->pickup_time }}</strong>
                </div>

                <div class="detail-item">
                    <span>Tanggal Antar</span>
                    <strong>
                        {{ $order->delivery_date
                            ? \Carbon\Carbon::parse($order->delivery_date)->format('d/m/Y')
                            : 'Belum ditentukan' }}
                    </strong>
                </div>

                <div class="detail-item">
                    <span>Tanggal Pemesanan</span>
                    <strong>
                        {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}
                    </strong>
                </div>

            </div>

        </section>


        {{-- INFORMASI PEMBAYARAN --}}
        <section class="detail-card">

            <h3>Rincian Harga</h3>

            <div class="detail-grid">

                <div class="detail-item">
                    <span>Harga Layanan</span>
                    <strong>
                        Rp {{ number_format($order->service?->price ?? 0, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="detail-item">
                    <span>Subtotal</span>
                    <strong>
                        Rp {{ number_format($order->subtotal, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="detail-item">
                    <span>Biaya Antar</span>
                    <strong>
                        Rp {{ number_format($order->delivery_fee, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="detail-item detail-total">
                    <span>Total Pembayaran</span>
                    <strong>
                        Rp {{ number_format($order->total, 0, ',', '.') }}
                    </strong>
                </div>

            </div>

        </section>


        {{-- CATATAN DAN DOKUMEN --}}
        <section class="detail-card">

            <h3>Dokumen dan Catatan Pesanan</h3>

            <div class="detail-grid">

                <div class="detail-item">
                    <span>Status Pesanan</span>

                    @if ($order->orders_status === 'COMPLETE')
                        <span class="status-complete">COMPLETE</span>
                    @else
                        <span class="status-pending">PENDING</span>
                    @endif
                </div>

                <div class="detail-item">
                    <span>Catatan Pelanggan</span>

                    <strong>
                        {{ $order->notes ?: 'Tidak ada catatan.' }}
                    </strong>
                </div>

                <div class="detail-item detail-document">

                    <span>Dokumen Pesanan</span>

                    @if ($order->order_detail_dok)

                        <a
                            href="{{ asset('storage/' . $order->order_detail_dok) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="btn-document"
                        >
                            Lihat Dokumen
                        </a>

                    @else

                        <strong>Belum ada dokumen.</strong>

                    @endif

                </div>

            </div>

        </section>


        {{-- FORM PENGELOLAAN ADMIN --}}
        <section class="detail-card admin-edit-card">

            <h3>Kelola Detail Pesanan</h3>

            <p class="detail-description">
                Admin dapat mengubah status, tanggal antar, catatan,
                dan menambahkan dokumen pesanan.
            </p>


            <form
                action="{{ route('detail_pesanan.update', $order->orders_id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                {{-- STATUS --}}
                <div class="form-group">

                    <label for="orders_status">
                        Status Pesanan
                    </label>

                    <select name="orders_status" id="orders_status" required>

                        <option
                            value="PENDING"
                            @selected(old('orders_status', $order->orders_status) === 'PENDING')
                        >
                            PENDING
                        </option>

                        <option
                            value="COMPLETE"
                            @selected(old('orders_status', $order->orders_status) === 'COMPLETE')
                        >
                            COMPLETE
                        </option>

                    </select>

                </div>


                {{-- TANGGAL ANTAR --}}
                <div class="form-group">

                    <label for="delivery_date">
                        Tanggal Antar
                    </label>

                    <input
                        type="date"
                        name="delivery_date"
                        id="delivery_date"
                        value="{{ old('delivery_date', $order->delivery_date) }}"
                    >

                    @error('delivery_date')
                        <small class="form-error">{{ $message }}</small>
                    @enderror

                </div>


                {{-- CATATAN --}}
                <div class="form-group">

                    <label for="notes">
                        Catatan Pesanan
                    </label>

                    <textarea
                        name="notes"
                        id="notes"
                        rows="4"
                    >{{ old('notes', $order->notes) }}</textarea>

                </div>


                {{-- DOKUMEN --}}
                <div class="form-group">

                    <label for="dokumen">
                        Upload Dokumen Pesanan
                    </label>

                    <input
                        type="file"
                        name="dokumen"
                        id="dokumen"
                        accept=".pdf,.jpg,.jpeg,.png"
                    >

                    <small class="form-help">
                        Format yang diperbolehkan: PDF, JPG, JPEG, dan PNG.
                        Maksimal 5 MB.
                    </small>

                    @error('dokumen')
                        <small class="form-error">{{ $message }}</small>
                    @enderror

                </div>


                {{-- TOMBOL --}}
                <div class="form-actions">

                    <button type="submit" class="btn-save-detail">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('detail_pesanan') }}" class="btn-back">
                        Batal
                    </a>

                </div>

            </form>

        </section>

    </main>

</div>

</body>
</html>
