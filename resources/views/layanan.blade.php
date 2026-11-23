<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - Laundry Azzam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layanan.css') }}">
</head>
<body>
    <div class="layout">
        @include('partials.sidebar', ['active' => 'layanan'])

        <main class="main">
            {{-- Topbar --}}
            <header class="topbar">
                <div class="user-pill">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#23783b"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 3a3 3 0 1 1-3 3 3 3 0 0 1 3-3zm0 14.2a7.2 7.2 0 0 1-6-3.22c.03-1.99 4-3.08 6-3.08s5.97 1.09 6 3.08a7.2 7.2 0 0 1-6 3.22z"/></svg>
                    <span>{{ session('admin_username', 'Admin') }}</span>
                </div>
            </header>

            {{-- Welcome Banner --}}
            <section class="banner">
                <div class="banner-info">
                    <h1>Layanan</h1>
                    <p>Kelola semua pesanan laundry pelanggan disini.</p>
                </div>
                <div class="banner-side">
                    <div class="banner-quote">
                        <span>Jaga kualitas<br>setiap cucian</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#23783b" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1.1L12 21.2l7.8-7.7 1-1.1a5.5 5.5 0 0 0 0-7.8z"/></svg>
                    </div>
                    <img src="{{ asset('images/banner.png') }}" alt="Basket" class="banner-img">
                </div>
            </section>

            {{-- Action Bar --}}
            <div class="action-bar">
                <a href="{{ route('layanan.tambah') }}" class="btn-add">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    <span>Tambah Data</span>
                </a>
                <div class="search-box">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8c8c8e" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="7"/><line x1="21" y1="21" x2="15.8" y2="15.8"/></svg>
                    <input type="text" placeholder="Cari nama Pelanggan" id="searchInput">
                </div>
            </div>

            {{-- Table Card --}}
            <div class="table-card">
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Layanan</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Estimasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($layanans as $layanan)
                                @php
                                    $name = strtolower($layanan->services_name ?? '');
                                    $unit = '/kg';
                                    if (str_contains($name, 'bed cover') || str_contains($name, 'selimut') || str_contains($name, 'sprei') || str_contains($name, 'sepatu') || str_contains($name, 'tas') || str_contains($name, 'dry clean') || str_contains($name, 'jas')) {
                                        $unit = '/pcs';
                                    } elseif (str_contains($name, 'ambal') || str_contains($name, 'karpet')) {
                                        $unit = '/m²';
                                    }

                                    $estimasi = '2 Hari';
                                    if (str_contains($name, 'express') || str_contains($name, 'kilat')) {
                                        $estimasi = '6 Jam';
                                    } elseif (str_contains($name, 'setrika')) {
                                        $estimasi = '1 Hari';
                                    } elseif (str_contains($name, 'karpet') || str_contains($name, 'ambal')) {
                                        $estimasi = '4 Hari';
                                    } elseif (str_contains($name, 'bed cover') || str_contains($name, 'selimut') || str_contains($name, 'sprei') || str_contains($name, 'boneka') || str_contains($name, 'sepatu') || str_contains($name, 'tas') || str_contains($name, 'dry clean') || str_contains($name, 'jas')) {
                                        $estimasi = '3 Hari';
                                    } elseif (isset($layanan->estimasi)) {
                                        $estimasi = $layanan->estimasi;
                                    }
                                @endphp
                                <tr>
                                    <td class="col-no">{{ sprintf('%02d', $loop->iteration) }}</td>

                                    <td class="col-name">{{ $layanan->services_name }}</td>

                                    <td class="col-price">
                                        Rp{{ number_format($layanan->price, 0, ',', '.') }}{{ $unit }}
                                    </td>

                                    <td class="col-desc">"{{ trim($layanan->description ?? '-', "\" \t\n\r\0\x0B") }}"</td>

                                    <td class="col-estimate">{{ $estimasi }}</td>

                                    <td class="col-status">
                                        @if ($layanan->is_active)
                                            <span class="badge-aktif">Aktif</span>
                                        @else
                                            <span class="badge-nonaktif">Nonaktif</span>
                                        @endif
                                    </td>

                                    <td class="col-action">
                                        <div class="actions">
                                            <a href="{{ route('layanan.edit', $layanan->services_id) }}" class="btn-edit">Edit</a>
                                            <form class="table-action-form" action="{{ route('layanan.destroy', $layanan->services_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus layanan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-del">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="empty-state">
                                        Belum ada data layanan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Footer --}}
                <div class="card-footer-bar">
                    <span class="pagination-info">Menampilkan 1 dari {{ $layanans->count() }} pesanan</span>
                    <div class="pagination">
                        <button class="page-btn page-nav" title="Sebelumnya" disabled>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                        </button>
                        <button class="page-btn page-num active">1</button>
                        <button class="page-btn page-nav" title="Selanjutnya">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/layanan.js') }}"></script>
</body>
</html>
