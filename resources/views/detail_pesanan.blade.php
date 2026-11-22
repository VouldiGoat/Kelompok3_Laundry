<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pesanan - Laundry Azzam</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/detail_pesanan.css') }}?v=4">
</head>

<body>

    <div class="layout">

        @include('partials.sidebar', ['active' => 'detail'])

        <main class="main">

            {{-- TOPBAR --}}
            <header class="topbar">
                <div class="user-pill">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#23783b">
                        <path d="M12 2a10 10 0 1 0 10 10 10 10 0 0 0-10-10zm0 3a3 3 0 1 1-3 3 3 3 0 0 1 3-3zm0 14.2a7.2 7.2 0 0 1-6-3.22c.03-1.99 4-3.08 6-3.08s5.97 1.09 6 3.08a7.2 7.2 0 0 1-6 3.22z"/>
                    </svg>

                    <span>{{ session('admin_username', 'Admin') }}</span>

                </div>
            </header>


            {{-- BANNER --}}
            <section class="banner">

                <div class="banner-info">
                    <h1>Detail Pesanan</h1>

                    <p>
                        Kelola informasi dan dokumen pesanan pelanggan.
                    </p>
                </div>

                <div class="banner-side">

                    <div class="banner-quote">
                        <span>Jaga kualitas<br>setiap cucian</span>

                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#23783b" stroke-width="2">
                            <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 0 0-7.8 7.8l1 1.1L12 21.2l7.8-7.7 1-1.1a5.5 5.5 0 0 0 0-7.8z"/>
                        </svg>
                    </div>

                    <img
                        src="{{ asset('images/banner.png') }}"
                        alt="Basket"
                        class="banner-img"
                    >

                </div>

            </section>


            {{-- NOTIFIKASI --}}
            @if (session('success'))
                <div class="detail-alert detail-alert-success">
                    {{ session('success') }}
                </div>
            @endif


            {{-- SEARCH --}}
            <div class="action-bar">

                <div class="search-box">

                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8c8c8e" stroke-width="2.8">
                        <circle cx="10.5" cy="10.5" r="7"/>
                        <line x1="21" y1="21" x2="15.8" y2="15.8"/>
                    </svg>

                    <input
                        type="text"
                        placeholder="Cari nomor pesanan atau nama pelanggan..."
                        id="searchInput"
                    >

                </div>

            </div>


            {{-- TABLE --}}
            <div class="table-card">

                <div class="table-wrap">

                    <table>

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Pesanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody id="orderTable">

                            @forelse ($orders as $order)

                                <tr
                                    class="order-row"
                                    data-search="{{ 'ORD-' . str_pad($order->orders_id, 5, '0', STR_PAD_LEFT) . ' ' . $order->nama_pemesan }}"
                                >

                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <strong>
                                            ORD-{{ str_pad($order->orders_id, 5, '0', STR_PAD_LEFT) }}
                                        </strong>
                                    </td>

                                    <td>
                                        <a
                                            href="{{ route('detail_pesanan.show', $order->orders_id) }}"
                                            class="btn-detail"
                                        >
                                            Detail
                                        </a>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="empty-state">
                                        Belum ada data pesanan.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- FOOTER --}}
                <div class="card-footer-bar">

                    <span class="pagination-info" id="paginationInfo">
                        Menampilkan {{ $orders->count() }} dari {{ $orders->count() }} pesanan
                    </span>

                </div>

            </div>

        </main>

    </div>


    {{-- SEARCH SCRIPT --}}
    <script>
        const searchInput = document.getElementById('searchInput');

        const orderRows = document.querySelectorAll('.order-row');

        const paginationInfo = document.getElementById('paginationInfo');

        // Menghitung jumlah baris yang tampil
        function filterOrders() {

            const keyword = searchInput.value.toLowerCase();

            let visibleCount = 0;

            orderRows.forEach(function(row) {

                const searchText = row.dataset.search.toLowerCase();

                const match = searchText.includes(keyword);

                row.style.display = match ? '' : 'none';

                if (match) {
                    visibleCount++;
                }

            });

            paginationInfo.textContent =
                'Menampilkan ' + visibleCount +
                ' dari ' + orderRows.length + ' pesanan';
        }

        searchInput.addEventListener('input', filterOrders);
    </script>

</body>
</html>
