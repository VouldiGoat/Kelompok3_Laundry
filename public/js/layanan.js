/**
 * Laundry Azzam - Layanan JS
 * Interactions, Search Filter & Pagination
 */
document.addEventListener('DOMContentLoaded', () => {
    // Modal Tambah Layanan
    const btnOpen = document.getElementById('btnOpenModalTambah') || document.querySelector('.btn-add');
    const modal = document.getElementById('modalTambahLayanan');
    const btnCancel = document.getElementById('btnCancelModal');

    if (btnOpen && modal) {
        btnOpen.addEventListener('click', (e) => {
            e.preventDefault();
            modal.style.display = 'flex';
            const nameInput = document.getElementById('services_name');
            if (nameInput) {
                setTimeout(() => nameInput.focus(), 50);
            }
        });
    }

    if (btnCancel && modal) {
        btnCancel.addEventListener('click', (e) => {
            if (btnCancel.tagName === 'BUTTON') {
                e.preventDefault();
                modal.style.display = 'none';
            }
        });
    }

    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                if (btnCancel && btnCancel.tagName === 'A') {
                    window.location.href = btnCancel.getAttribute('href');
                } else {
                    modal.style.display = 'none';
                }
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.style.display === 'flex') {
                if (btnCancel && btnCancel.tagName === 'A') {
                    window.location.href = btnCancel.getAttribute('href');
                } else {
                    modal.style.display = 'none';
                }
            }
        });
    }

    // Modal Edit Layanan
    const editModal = document.getElementById('modalEditLayanan');
    const btnCancelEdit = document.getElementById('btnCancelEditModal');

    document.querySelectorAll('.btn-edit').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            if (editModal) {
                e.preventDefault();
                const name = btn.getAttribute('data-name') || '';
                const price = btn.getAttribute('data-price') || '';
                const desc = btn.getAttribute('data-desc') || '';
                const status = btn.getAttribute('data-status') !== null ? btn.getAttribute('data-status') : '1';

                const editName = document.getElementById('edit_services_name');
                const editPrice = document.getElementById('edit_price');
                const editDesc = document.getElementById('edit_description');
                const editStatus = document.getElementById('edit_is_active');

                if (editName) editName.value = name;
                if (editPrice) editPrice.value = price;
                if (editDesc) editDesc.value = desc;
                if (editStatus) editStatus.value = status;

                editModal.style.display = 'flex';
                if (editName) {
                    setTimeout(() => editName.focus(), 50);
                }
            }
        });
    });

    if (btnCancelEdit && editModal) {
        btnCancelEdit.addEventListener('click', (e) => {
            if (btnCancelEdit.tagName === 'BUTTON') {
                e.preventDefault();
                editModal.style.display = 'none';
            }
        });
    }

    if (editModal) {
        editModal.addEventListener('click', (e) => {
            if (e.target === editModal) {
                if (btnCancelEdit && btnCancelEdit.tagName === 'A') {
                    window.location.href = btnCancelEdit.getAttribute('href');
                } else {
                    editModal.style.display = 'none';
                }
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && editModal.style.display === 'flex') {
                if (btnCancelEdit && btnCancelEdit.tagName === 'A') {
                    window.location.href = btnCancelEdit.getAttribute('href');
                } else {
                    editModal.style.display = 'none';
                }
            }
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
