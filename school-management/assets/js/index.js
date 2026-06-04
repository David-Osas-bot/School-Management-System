// Navbar scroll effect
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 20);
}, { passive: true });

// Mobile nav toggle
const toggle = document.getElementById('navToggle');
const mobileMenu = document.getElementById('mobileMenu');
toggle.addEventListener('click', () => {
    const isOpen = mobileMenu.classList.toggle('open');
    toggle.classList.toggle('open', isOpen);
    toggle.setAttribute('aria-expanded', isOpen);
});
// Close on link click
mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
        mobileMenu.classList.remove('open');
        toggle.classList.remove('open');
        toggle.setAttribute('aria-expanded', false);
    });
});

// Scroll-reveal with IntersectionObserver
const revealEls = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
            // Stagger siblings inside a grid
            const delay = entry.target.closest('.features-grid, .testi-grid, .pricing-cards')
                ? [...entry.target.parentElement.children].indexOf(entry.target) * 80
                : 0;
            setTimeout(() => entry.target.classList.add('visible'), delay);
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

revealEls.forEach(el => observer.observe(el));

// Animated counter for stats
function animateCount(el, target, suffix = '') {
    const duration = 1600;
    const start = performance.now();
    const isDecimal = String(target).includes('.');
    const step = (now) => {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const value = eased * target;
        el.textContent = (isDecimal ? value.toFixed(1) : Math.round(value)) + suffix;
        if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
}

const statsSection = document.querySelector('.stats-bar');
const statsObserver = new IntersectionObserver(([entry]) => {
    if (entry.isIntersecting) {
        const configs = [
            { suffix: 'K+', target: 50 },
            { suffix: 'M', target: 2.4 },
            { suffix: 'K', target: 180 },
            { suffix: '★', target: 4.9 },
            { suffix: '%', target: 95 },
        ];
        document.querySelectorAll('.stat-item .num').forEach((el, i) => {
            const { suffix, target } = configs[i];
            const span = el.querySelector('span');
            el.textContent = '';
            animateCount(el, target, '');
            if (span) el.appendChild(span);
            // Re-attach suffix span
            setTimeout(() => {
                const num = parseFloat(el.textContent);
                el.innerHTML = (String(target).includes('.') ? num.toFixed(1) : Math.round(num)) + `<span>${suffix}</span>`;
            }, 1700);
        });
        statsObserver.unobserve(entry.target);
    }
}, { threshold: 0.3 });
statsObserver.observe(statsSection);