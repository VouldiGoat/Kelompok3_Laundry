@php $active = $active ?? 'dashboard'; @endphp
<aside class="sidebar">
    <div class="sidebar-logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo-laundry.png') }}" alt="Laundry Azzam">
        </a>
    </div>

    <nav class="sidebar-nav">
        <a href="{{ route('dashboard') }}" class="{{ $active === 'dashboard' ? 'active' : '' }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('pesanan') }}" class="{{ $active === 'pesanan' ? 'active' : '' }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
            <span>Pesanan</span>
        </a>

        <a href="{{ route('layanan') }}" class="{{ $active === 'layanan' ? 'active' : '' }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>
            <span>Layanan</span>
        </a>

        <a href="{{ route('detail_pesanan') }}" class="{{ $active === 'detail' ? 'active' : '' }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
            <span>Detail Pesanan</span>
        </a>

        <a href="#" class="{{ $active === 'pembayaran' ? 'active' : '' }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
            <span>Pembayaran</span>
        </a>
    </nav>

    
        <div class="sidebar-footer">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">

                    <svg width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">

                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>

                    </svg>

                    <span>Keluar</span>

                </button>
            </form>

        </div>

</aside>

