/**
 * Laundry Azzam - Pembayaran JS
 * Toggle payment methods & table search
 */
document.addEventListener('DOMContentLoaded', () => {
    // Toggle Payment Methods (ON / OFF)
    const toggleSwitches = document.querySelectorAll('.toggle-switch');
    toggleSwitches.forEach((toggle) => {
        toggle.addEventListener('click', () => {
            if (toggle.classList.contains('on')) {
                toggle.classList.remove('on');
                toggle.classList.add('off');
                toggle.setAttribute('aria-checked', 'false');
            } else {
                toggle.classList.remove('off');
                toggle.classList.add('on');
                toggle.setAttribute('aria-checked', 'true');
            }
        });
    });

    // Tambah Metode Button
    const btnAddMetode = document.querySelector('.btn-add-metode');
    if (btnAddMetode) {
        btnAddMetode.addEventListener('click', () => {
            console.log('Tambah Metode clicked');
        });
    }

    // Live Search Filter (works when rows are present)
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.querySelector('tbody');
    const paginationInfo = document.querySelector('.pagination-info');

    if (searchInput && tableBody) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            const dataRows = tableBody.querySelectorAll('tr:not(.empty-row)');
            
            if (dataRows.length === 0) return;

            let visibleCount = 0;
            dataRows.forEach((row) => {
                const text = row.textContent.toLowerCase();
                if (text.includes(query)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (paginationInfo) {
                paginationInfo.textContent = `Menampilkan ${visibleCount > 0 ? 1 : 0} dari ${visibleCount} pesanan`;
            }
        });
    }
});
