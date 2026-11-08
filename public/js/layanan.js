/**
 * Laundry Azzam - Layanan JS
 * Interactions, Search Filter & Pagination
 */
document.addEventListener('DOMContentLoaded', () => {
    // Add Service Button
    const btnAdd = document.querySelector('.btn-add');
    if (btnAdd) {
        btnAdd.addEventListener('click', () => {
            console.log('Tambah Layanan clicked');
        });
    }

    // Live Search Filter
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('tbody tr:not(:has(.empty-state))');
    const paginationInfo = document.querySelector('.pagination-info');

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            let visibleCount = 0;

            tableRows.forEach((row) => {
                const text = row.textContent.toLowerCase();
                if (text.includes(query)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (paginationInfo) {
                paginationInfo.textContent = `Menampilkan ${visibleCount > 0 ? 1 : 0}-${visibleCount} dari ${visibleCount} layanan`;
            }
        });
    }

    // Action Buttons
    document.querySelectorAll('.act-btn').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const action = btn.getAttribute('title');
            const row = btn.closest('tr');
            const serviceName = row ? row.cells[2].textContent.trim() : '';
            console.log(`Action: ${action} for ${serviceName}`);
        });
    });
});
