/**
 * assets/js/layout.js
 * ─────────────────────────────────────────────────────────────
 * Handles:
 *  1. Sidebar toggle (desktop collapse + mobile slide)
 *  2. Page loading bar (completes when window finishes loading)
 *  3. Page-transition click intercept (shows loader before nav)
 *  4. Sidebar state persistence across pages (localStorage)
 * ─────────────────────────────────────────────────────────────
 */

(function () {
    'use strict';

    /* ── 1. SIDEBAR ─────────────────────────────────────────── */
    const sidebar  = document.getElementById('sidebar');
    const overlay  = document.getElementById('sidebarOverlay');
    const isMobile = () => window.innerWidth <= 768;

    // Restore sidebar state on desktop
    if (!isMobile() && localStorage.getItem('sidebarCollapsed') === 'true') {
        document.body.classList.add('sidebar-collapsed');
    }

    window.toggleSidebar = function () {
        if (isMobile()) {
            // Mobile: slide sidebar in/out
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        } else {
            // Desktop: collapse/expand with margin shift
            document.body.classList.toggle('sidebar-collapsed');
            localStorage.setItem(
                'sidebarCollapsed',
                document.body.classList.contains('sidebar-collapsed')
            );
        }
    };

    window.closeSidebar = function () {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    };

    // Close on resize to desktop
    window.addEventListener('resize', function () {
        if (!isMobile()) closeSidebar();
    });

    /* ── 2. LOADING BAR ─────────────────────────────────────── */
    const loader = document.getElementById('pageLoader');

    function finishLoader() {
        if (!loader) return;
        loader.classList.add('done');
        // Remove from DOM after fade-out
        setTimeout(() => loader.remove(), 400);
    }

    // Complete bar when page is fully loaded
    if (document.readyState === 'complete') {
        finishLoader();
    } else {
        window.addEventListener('load', finishLoader);
    }

    // Safety fallback — never leave bar stuck
    setTimeout(finishLoader, 4000);

    /* ── 3. PAGE TRANSITION INTERCEPT ───────────────────────── */
    // When the user clicks any sidebar nav-item, briefly show a
    // fresh loading bar before the browser navigates away.
    document.querySelectorAll('.nav-item:not(.logout)').forEach(function (link) {
        link.addEventListener('click', function (e) {
            const href = link.getAttribute('href');
            if (!href || href === '#' || href === window.location.pathname) return;

            e.preventDefault();

            // Re-inject a fresh loader bar
            const newLoader = document.createElement('div');
            newLoader.className = 'page-loader';
            newLoader.style.cssText = 'width:0%;opacity:1;';
            document.body.prepend(newLoader);

            // Animate to 90% instantly
            requestAnimationFrame(function () {
                newLoader.style.transition = 'width 0.3s ease';
                newLoader.style.width = '90%';
            });

            // Fade page content out
            const content = document.getElementById('pageContent');
            if (content) {
                content.style.transition = 'opacity 0.18s ease';
                content.style.opacity = '0';
            }

            // Navigate after short delay so animation is visible
            setTimeout(function () {
                window.location.href = href;
            }, 260);
        });
    });

})();