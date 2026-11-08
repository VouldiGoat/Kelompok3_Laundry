/**
 * Laundry Azzam - Dashboard JS
 * Animations & Interactions
 */
document.addEventListener('DOMContentLoaded', () => {
    // Animate Chart Bars on Load
    const bars = document.querySelectorAll('.bar-fill');
    bars.forEach((bar) => {
        const targetHeight = bar.style.height;
        bar.style.height = '0%';
        setTimeout(() => {
            bar.style.height = targetHeight;
        }, 150);
    });

    // Tooltip for chart bars
    bars.forEach((bar) => {
        bar.parentElement.setAttribute('title', `Volume: ${bar.style.height}`);
    });

    // Prevent Back Cache Loop
    for (let i = 0; i < 5; i++) {
        history.pushState({ dashboard: true }, '', location.href);
    }
    window.addEventListener('popstate', () => {
        history.pushState({ dashboard: true }, '', location.href);
    });
});

