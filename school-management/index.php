<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Schoolify® – The Community of Education</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    /* ===========================
       CSS CUSTOM PROPERTIES
    =========================== */
    :root {
      --color-primary:   #1db88e;
      --color-primary-dark: #17a07a;
      --color-primary-light: #e6f9f4;
      --color-accent:    #0d6efd;
      --color-navy:      #0d1f3c;
      --color-text:      #1a2840;
      --color-muted:     #64748b;
      --color-border:    #e2e8f0;
      --color-bg:        #f0f6ff;
      --color-white:     #ffffff;
      --color-badge-bg:  #d1fae5;
      --color-badge-txt: #065f46;
      --color-strike:    #94a3b8;

      --font-display: 'Nunito', sans-serif;
      --font-body:    'Plus Jakarta Sans', sans-serif;

      --shadow-sm: 0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
      --shadow-md: 0 4px 16px rgba(0,0,0,.08);
      --shadow-lg: 0 12px 40px rgba(0,0,0,.12);
      --shadow-cta: 0 8px 30px rgba(29,184,142,.35);

      --radius-sm:  8px;
      --radius-md:  14px;
      --radius-lg:  22px;
      --radius-pill: 9999px;

      --transition: .22s cubic-bezier(.4,0,.2,1);
      --nav-h: 72px;
    }

    /* ===========================
       RESET & BASE
    =========================== */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }

    body {
      font-family: var(--font-body);
      color: var(--color-text);
      background: var(--color-bg);
      min-height: 100vh;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    img { display: block; max-width: 100%; }
    a  { text-decoration: none; color: inherit; }

    /* ===========================
       NAVBAR
    =========================== */
    .navbar {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 100;
      height: var(--nav-h);
      display: flex;
      align-items: center;
      padding: 0 5%;
      background: rgba(255,255,255,.78);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      border-bottom: 1px solid rgba(255,255,255,.5);
      box-shadow: var(--shadow-sm);
      transition: background var(--transition), box-shadow var(--transition);
    }
    .navbar.scrolled {
      background: rgba(255,255,255,.96);
      box-shadow: var(--shadow-md);
    }

    .nav-logo {
      display: flex;
      flex-direction: column;
      line-height: 1;
      margin-right: auto;
    }
    .nav-logo .brand {
      font-family: var(--font-display);
      font-weight: 900;
      font-size: 1.75rem;
      color: var(--color-navy);
      letter-spacing: -.5px;
    }
    .nav-logo .brand span { color: var(--color-primary); }
    .nav-logo .tagline {
      font-size: .6rem;
      font-weight: 600;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--color-muted);
      margin-top: 2px;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 2.4rem;
      list-style: none;
    }
    .nav-links a {
      font-size: .9rem;
      font-weight: 600;
      color: var(--color-muted);
      transition: color var(--transition);
      position: relative;
    }
    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -3px; left: 0;
      width: 0; height: 2px;
      background: var(--color-primary);
      border-radius: var(--radius-pill);
      transition: width var(--transition);
    }
    .nav-links a:hover { color: var(--color-navy); }
    .nav-links a:hover::after { width: 100%; }

    .btn-cta-nav {
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      padding: .6rem 1.4rem;
      background: var(--color-primary);
      color: var(--color-white);
      font-size: .88rem;
      font-weight: 700;
      border-radius: var(--radius-pill);
      border: none;
      cursor: pointer;
      transition: background var(--transition), transform var(--transition), box-shadow var(--transition);
      box-shadow: var(--shadow-cta);
      white-space: nowrap;
    }
    .btn-cta-nav:hover {
      background: var(--color-primary-dark);
      transform: translateY(-1px);
      box-shadow: 0 10px 36px rgba(29,184,142,.45);
    }
    .btn-cta-nav svg { width: 16px; height: 16px; }

    /* Hamburger */
    .nav-toggle {
      display: none;
      flex-direction: column;
      gap: 5px;
      background: none;
      border: none;
      cursor: pointer;
      padding: 6px;
      margin-left: 1rem;
    }
    .nav-toggle span {
      display: block;
      width: 24px; height: 2px;
      background: var(--color-navy);
      border-radius: 2px;
      transition: var(--transition);
    }
    .nav-toggle.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .nav-toggle.open span:nth-child(2) { opacity: 0; }
    .nav-toggle.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    /* Mobile drawer */
    .mobile-menu {
      display: none;
      position: fixed;
      top: var(--nav-h); left: 0; right: 0;
      background: var(--color-white);
      padding: 1.5rem 5% 2rem;
      box-shadow: var(--shadow-lg);
      z-index: 99;
      flex-direction: column;
      gap: 1.2rem;
      animation: slideDown .25s ease;
    }
    .mobile-menu.open { display: flex; }
    .mobile-menu a {
      font-size: 1rem;
      font-weight: 600;
      color: var(--color-text);
      padding: .5rem 0;
      border-bottom: 1px solid var(--color-border);
    }
    .mobile-menu a:last-child { border-bottom: none; }

    @keyframes slideDown {
      from { opacity:0; transform: translateY(-10px); }
      to   { opacity:1; transform: translateY(0); }
    }

    /* ===========================
       HERO SECTION
    =========================== */
    .hero {
      min-height: 100vh;
      padding-top: var(--nav-h);
      display: grid;
      grid-template-columns: 1fr 1fr;
      align-items: center;
      position: relative;
      overflow: hidden;
    }

    /* Decorative background blobs */
    .hero::before {
      content: '';
      position: absolute;
      top: -10%; right: -5%;
      width: 55%;
      aspect-ratio: 1;
      background: radial-gradient(circle at 60% 40%, rgba(29,184,142,.18) 0%, rgba(13,110,253,.08) 60%, transparent 80%);
      border-radius: 50%;
      pointer-events: none;
    }
    .hero::after {
      content: '';
      position: absolute;
      bottom: -15%; left: -8%;
      width: 40%;
      aspect-ratio: 1;
      background: radial-gradient(circle, rgba(13,110,253,.1) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    /* Grid dots texture */
    .hero-bg-dots {
      position: absolute;
      inset: 0;
      background-image: radial-gradient(circle, #c8d9f5 1px, transparent 1px);
      background-size: 30px 30px;
      opacity: .35;
      pointer-events: none;
    }

    /* ---- LEFT CONTENT ---- */
    .hero-content {
      position: relative;
      z-index: 2;
      padding: 6% 4% 6% 8%;
      max-width: 580px;
    }

    .price-badge {
      display: inline-flex;
      align-items: center;
      gap: .75rem;
      background: var(--color-white);
      border: 1px solid var(--color-border);
      border-radius: var(--radius-md);
      padding: .55rem 1rem;
      box-shadow: var(--shadow-md);
      margin-bottom: 2rem;
      animation: fadeUp .6s .1s both;
    }
    .badge-pill {
      background: var(--color-primary);
      color: var(--color-white);
      font-family: var(--font-display);
      font-weight: 800;
      font-size: .7rem;
      letter-spacing: .06em;
      padding: .3rem .75rem;
      border-radius: var(--radius-pill);
      white-space: nowrap;
    }
    .price-info { line-height: 1.3; }
    .price-info .renews {
      font-size: .9rem;
      font-weight: 700;
      color: var(--color-text);
    }
    .price-info .original {
      font-size: .75rem;
      color: var(--color-strike);
      text-decoration: line-through;
    }

    .hero-headline {
      font-family: var(--font-display);
      font-weight: 900;
      font-size: clamp(2.4rem, 4.5vw, 3.4rem);
      line-height: 1.1;
      color: var(--color-navy);
      letter-spacing: -.5px;
      margin-bottom: 1.1rem;
      animation: fadeUp .6s .2s both;
    }
    .hero-headline .accent { color: var(--color-primary); }

    .hero-sub {
      font-size: 1.05rem;
      line-height: 1.7;
      color: var(--color-muted);
      max-width: 440px;
      margin-bottom: 2.4rem;
      animation: fadeUp .6s .3s both;
    }

    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      align-items: center;
      animation: fadeUp .6s .4s both;
    }

    .btn-primary {
      display: inline-flex;
      align-items: center;
      gap: .6rem;
      padding: .9rem 1.8rem;
      background: var(--color-primary);
      color: var(--color-white);
      font-size: .95rem;
      font-weight: 700;
      border-radius: var(--radius-pill);
      border: none;
      cursor: pointer;
      transition: background var(--transition), transform var(--transition), box-shadow var(--transition);
      box-shadow: var(--shadow-cta);
    }
    .btn-primary:hover {
      background: var(--color-primary-dark);
      transform: translateY(-2px);
      box-shadow: 0 14px 42px rgba(29,184,142,.45);
    }
    .btn-primary .btn-icon {
      width: 26px; height: 26px;
      background: rgba(255,255,255,.25);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background var(--transition);
    }
    .btn-primary:hover .btn-icon { background: rgba(255,255,255,.4); }

    .btn-secondary {
      display: inline-flex;
      align-items: center;
      gap: .6rem;
      padding: .88rem 1.6rem;
      background: var(--color-white);
      color: var(--color-text);
      font-size: .95rem;
      font-weight: 700;
      border-radius: var(--radius-pill);
      border: 1.5px solid var(--color-border);
      cursor: pointer;
      transition: border-color var(--transition), transform var(--transition), box-shadow var(--transition);
      box-shadow: var(--shadow-sm);
    }
    .btn-secondary:hover {
      border-color: var(--color-primary);
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }
    .btn-secondary .btn-icon {
      width: 26px; height: 26px;
      background: var(--color-primary-light);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--color-primary);
    }

    .btn-label { display: flex; flex-direction: column; line-height: 1.2; }
    .btn-label small {
      font-size: .7rem;
      font-weight: 500;
      opacity: .7;
      letter-spacing: .03em;
    }

    /* Trust badges row */
    .trust-row {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      margin-top: 2.8rem;
      animation: fadeUp .6s .5s both;
      flex-wrap: wrap;
    }
    .trust-item {
      display: flex;
      align-items: center;
      gap: .45rem;
      font-size: .78rem;
      font-weight: 600;
      color: var(--color-muted);
    }
    .trust-item .dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: var(--color-primary);
      flex-shrink: 0;
    }

    /* ---- RIGHT VISUAL ---- */
    .hero-visual {
      position: relative;
      z-index: 2;
      height: 100%;
      min-height: calc(100vh - var(--nav-h));
      overflow: hidden;
      animation: fadeIn .9s .15s both;
    }

    .hero-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center top;
      border-radius: var(--radius-lg) 0 0 var(--radius-lg);
      filter: saturate(1.05) brightness(1.02);
    }

    /* Overlay gradient on image */
    .hero-visual::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(
        to right,
        rgba(240,246,255,.7) 0%,
        rgba(240,246,255,.1) 30%,
        transparent 60%
      );
      border-radius: var(--radius-lg) 0 0 var(--radius-lg);
      z-index: 1;
      pointer-events: none;
    }

    /* Floating stat cards on image */
    .float-card {
      position: absolute;
      z-index: 3;
      background: var(--color-white);
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-lg);
      padding: .9rem 1.2rem;
      display: flex;
      align-items: center;
      gap: .75rem;
      animation: floatY 4s ease-in-out infinite;
    }
    .float-card:nth-child(2) { animation-delay: -2s; }
    .float-card:nth-child(3) { animation-delay: -1s; }

    .float-card--students { top: 18%; left: 6%; }
    .float-card--rating   { bottom: 26%; left: 4%; }
    .float-card--lessons  { top: 42%; right: 5%; }

    .fc-icon {
      width: 40px; height: 40px;
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      flex-shrink: 0;
    }
    .fc-icon--green { background: var(--color-primary-light); }
    .fc-icon--blue  { background: #dbeafe; }
    .fc-icon--yellow{ background: #fef9c3; }

    .fc-info { line-height: 1.3; }
    .fc-info strong {
      display: block;
      font-family: var(--font-display);
      font-weight: 800;
      font-size: 1rem;
      color: var(--color-navy);
    }
    .fc-info span {
      font-size: .72rem;
      color: var(--color-muted);
      font-weight: 500;
    }

    @keyframes floatY {
      0%, 100% { transform: translateY(0); }
      50%       { transform: translateY(-8px); }
    }

    /* ===========================
       STATS BAR
    =========================== */
    .stats-bar {
      background: var(--color-white);
      border-top: 1px solid var(--color-border);
      border-bottom: 1px solid var(--color-border);
      padding: 2rem 8%;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 1.5rem;
    }
    .stat-item { text-align: center; }
    .stat-item .num {
      font-family: var(--font-display);
      font-weight: 900;
      font-size: 1.9rem;
      color: var(--color-navy);
      line-height: 1;
    }
    .stat-item .num span { color: var(--color-primary); }
    .stat-item p {
      font-size: .8rem;
      color: var(--color-muted);
      font-weight: 500;
      margin-top: .3rem;
    }

    /* ===========================
       FEATURE CARDS
    =========================== */
    .features {
      padding: 6rem 8%;
      background: var(--color-bg);
    }
    .section-label {
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      font-size: .78rem;
      font-weight: 700;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--color-primary);
      margin-bottom: 1rem;
    }
    .section-label::before {
      content: '';
      display: block;
      width: 20px; height: 2px;
      background: var(--color-primary);
      border-radius: 2px;
    }
    .section-title {
      font-family: var(--font-display);
      font-weight: 900;
      font-size: clamp(1.8rem, 3vw, 2.6rem);
      color: var(--color-navy);
      line-height: 1.2;
      margin-bottom: 1rem;
    }
    .section-sub {
      font-size: .97rem;
      color: var(--color-muted);
      max-width: 520px;
      line-height: 1.7;
      margin-bottom: 3rem;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.5rem;
    }
    .feature-card {
      background: var(--color-white);
      border-radius: var(--radius-lg);
      padding: 2rem 1.8rem;
      border: 1px solid var(--color-border);
      transition: transform var(--transition), box-shadow var(--transition);
      cursor: default;
    }
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-lg);
    }
    .feat-icon {
      width: 50px; height: 50px;
      border-radius: var(--radius-md);
      background: var(--color-primary-light);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      margin-bottom: 1.3rem;
    }
    .feature-card h3 {
      font-family: var(--font-display);
      font-weight: 800;
      font-size: 1.05rem;
      color: var(--color-navy);
      margin-bottom: .5rem;
    }
    .feature-card p {
      font-size: .87rem;
      color: var(--color-muted);
      line-height: 1.6;
    }

    /* ===========================
       PRICING
    =========================== */
    .pricing {
      padding: 6rem 8%;
      background: var(--color-white);
      text-align: center;
    }
    .pricing-cards {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 1.5rem;
      margin-top: 3rem;
    }
    .pricing-card {
      background: var(--color-bg);
      border: 2px solid var(--color-border);
      border-radius: var(--radius-lg);
      padding: 2.5rem 2rem;
      flex: 0 1 290px;
      text-align: left;
      transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition);
      position: relative;
    }
    .pricing-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-lg);
    }
    .pricing-card.featured {
      background: var(--color-navy);
      border-color: var(--color-primary);
      transform: scale(1.03);
    }
    .pricing-card.featured:hover {
      transform: scale(1.03) translateY(-4px);
    }
    .pricing-card.featured h3,
    .pricing-card.featured .price,
    .pricing-card.featured li { color: var(--color-white); }
    .pricing-card.featured .price-period { color: rgba(255,255,255,.6); }
    .pricing-card.featured li::before { color: var(--color-primary); }

    .popular-badge {
      position: absolute;
      top: -14px; left: 50%; transform: translateX(-50%);
      background: var(--color-primary);
      color: white;
      font-size: .7rem;
      font-weight: 800;
      letter-spacing: .08em;
      text-transform: uppercase;
      padding: .3rem 1rem;
      border-radius: var(--radius-pill);
    }
    .pricing-card h3 {
      font-family: var(--font-display);
      font-size: 1rem;
      font-weight: 800;
      color: var(--color-muted);
      text-transform: uppercase;
      letter-spacing: .1em;
      margin-bottom: 1rem;
    }
    .price {
      font-family: var(--font-display);
      font-weight: 900;
      font-size: 2.6rem;
      color: var(--color-navy);
      line-height: 1;
    }
    .price-period {
      font-size: .85rem;
      font-weight: 500;
      color: var(--color-muted);
    }
    .pricing-card ul {
      list-style: none;
      margin: 1.5rem 0 2rem;
      display: flex;
      flex-direction: column;
      gap: .7rem;
    }
    .pricing-card li {
      font-size: .87rem;
      color: var(--color-text);
      display: flex;
      align-items: center;
      gap: .5rem;
    }
    .pricing-card li::before {
      content: '✓';
      font-weight: 800;
      color: var(--color-primary);
    }
    .btn-plan {
      width: 100%;
      padding: .85rem;
      border-radius: var(--radius-pill);
      font-size: .9rem;
      font-weight: 700;
      border: 2px solid var(--color-primary);
      background: transparent;
      color: var(--color-primary);
      cursor: pointer;
      transition: background var(--transition), color var(--transition);
    }
    .btn-plan:hover, .pricing-card.featured .btn-plan {
      background: var(--color-primary);
      color: white;
    }
    .pricing-card.featured .btn-plan:hover {
      background: var(--color-primary-dark);
    }

    /* ===========================
       TESTIMONIALS
    =========================== */
    .testimonials {
      padding: 5rem 8%;
      background: var(--color-bg);
    }
    .testi-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 1.5rem;
      margin-top: 3rem;
    }
    .testi-card {
      background: var(--color-white);
      border-radius: var(--radius-lg);
      padding: 2rem;
      border: 1px solid var(--color-border);
    }
    .stars { color: #f59e0b; font-size: 1rem; letter-spacing: 2px; margin-bottom: 1rem; }
    .testi-text {
      font-size: .9rem;
      color: var(--color-muted);
      line-height: 1.7;
      margin-bottom: 1.5rem;
    }
    .testi-author { display: flex; align-items: center; gap: .75rem; }
    .avatar {
      width: 42px; height: 42px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-display);
      font-weight: 800;
      font-size: .95rem;
      color: white;
      flex-shrink: 0;
    }
    .author-info strong {
      display: block;
      font-size: .88rem;
      font-weight: 700;
      color: var(--color-navy);
    }
    .author-info span { font-size: .75rem; color: var(--color-muted); }

    /* ===========================
       CTA BANNER
    =========================== */
    .cta-banner {
      background: linear-gradient(135deg, var(--color-navy) 0%, #163060 100%);
      padding: 5rem 8%;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .cta-banner::before {
      content: '';
      position: absolute;
      top: -30%; right: -10%;
      width: 500px; aspect-ratio: 1;
      background: radial-gradient(circle, rgba(29,184,142,.2) 0%, transparent 65%);
      border-radius: 50%;
    }
    .cta-banner h2 {
      font-family: var(--font-display);
      font-weight: 900;
      font-size: clamp(2rem, 4vw, 3rem);
      color: white;
      line-height: 1.2;
      margin-bottom: 1rem;
      position: relative;
    }
    .cta-banner p {
      color: rgba(255,255,255,.65);
      font-size: 1rem;
      margin-bottom: 2.5rem;
      position: relative;
    }
    .cta-actions {
      display: flex;
      justify-content: center;
      gap: 1rem;
      flex-wrap: wrap;
      position: relative;
    }

    /* ===========================
       FOOTER
    =========================== */
    .footer {
      background: var(--color-white);
      padding: 3.5rem 8% 2rem;
      border-top: 1px solid var(--color-border);
    }
    .footer-top {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 3rem;
      margin-bottom: 3rem;
    }
    .footer-brand .tagline-full {
      font-size: .88rem;
      color: var(--color-muted);
      line-height: 1.6;
      margin-top: .75rem;
      max-width: 240px;
    }
    .footer-col h4 {
      font-weight: 700;
      font-size: .82rem;
      text-transform: uppercase;
      letter-spacing: .1em;
      color: var(--color-navy);
      margin-bottom: 1rem;
    }
    .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: .6rem; }
    .footer-col li a {
      font-size: .87rem;
      color: var(--color-muted);
      transition: color var(--transition);
    }
    .footer-col li a:hover { color: var(--color-primary); }

    .footer-bottom {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 1.5rem;
      border-top: 1px solid var(--color-border);
      flex-wrap: wrap;
      gap: 1rem;
    }
    .footer-bottom p { font-size: .8rem; color: var(--color-muted); }
    .footer-links { display: flex; gap: 1.5rem; }
    .footer-links a { font-size: .8rem; color: var(--color-muted); transition: color var(--transition); }
    .footer-links a:hover { color: var(--color-primary); }

    /* ===========================
       ANIMATIONS
    =========================== */
    @keyframes fadeUp {
      from { opacity:0; transform: translateY(22px); }
      to   { opacity:1; transform: translateY(0); }
    }
    @keyframes fadeIn {
      from { opacity:0; }
      to   { opacity:1; }
    }

    /* Scroll-reveal */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity .65s ease, transform .65s ease;
    }
    .reveal.visible {
      opacity: 1;
      transform: none;
    }

    /* ===========================
       RESPONSIVE
    =========================== */
    @media (max-width: 960px) {
      .hero {
        grid-template-columns: 1fr;
        min-height: unset;
      }
      .hero-visual {
        min-height: 55vw;
        order: -1;
      }
      .hero-visual::before { border-radius: 0 0 var(--radius-lg) var(--radius-lg); }
      .hero-img { border-radius: 0 0 var(--radius-lg) var(--radius-lg); }
      .hero-content { padding: 3rem 6% 4rem; max-width: 100%; }
      .float-card--lessons { display: none; }
      .footer-top { grid-template-columns: 1fr 1fr; }
    }

    @media (max-width: 640px) {
      .nav-links, .btn-cta-nav { display: none; }
      .nav-toggle { display: flex; }
      .stats-bar { padding: 1.5rem 5%; }
      .features, .pricing, .testimonials { padding: 4rem 5%; }
      .footer-top { grid-template-columns: 1fr; gap: 2rem; }
      .footer { padding: 2.5rem 5% 1.5rem; }
      .cta-banner { padding: 4rem 5%; }
    }
  </style>
</head>
<body>

  <!-- =====================
       NAVBAR
  ===================== -->
  <header class="navbar" id="navbar">
    <a href="#" class="nav-logo" aria-label="Schoolify home">
      <span class="brand">School<span>ify</span><sup>®</sup></span>
      <span class="tagline">The Community of Education</span>
    </a>

    <nav aria-label="Primary navigation">
      <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#pricing">Pricing</a></li>
        <li><a href="#about">About us</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>

    <a href="#" class="btn-cta-nav" style="margin-left:2.5rem;">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8l4 4-4 4M8 12h8"/></svg>
      Go to the app
    </a>

    <button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </header>

  <!-- Mobile menu -->
  <nav class="mobile-menu" id="mobileMenu" aria-label="Mobile navigation">
    <a href="#">Home</a>
    <a href="#pricing">Pricing</a>
    <a href="#about">About us</a>
    <a href="#contact">Contact</a>
    <a href="#" class="btn-primary" style="justify-content:center;border-radius:var(--radius-pill)">Go to the app</a>
  </nav>

  <main>

    <!-- =====================
         HERO
    ===================== -->
    <section class="hero" aria-labelledby="hero-heading">
      <div class="hero-bg-dots" aria-hidden="true"></div>

      <!-- Left -->
      <div class="hero-content">

        <div class="price-badge" role="note" aria-label="Pricing offer">
          <span class="badge-pill">30 DAYS FREE</span>
          <div class="price-info">
            <span class="renews">Renews $11.95 per month</span>
            <span class="original">Original price: $14.95</span>
          </div>
        </div>

        <h1 class="hero-headline" id="hero-heading">
          Your lessons,<br>
          <span class="accent">our tools!</span>
        </h1>

        <p class="hero-sub">
          Schoolify® sets the new standard in classroom engagement and saving teachers valuable time.
        </p>

        <div class="hero-actions">
          <a href="#" class="btn-primary">
            <span class="btn-icon" aria-hidden="true">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
            <span class="btn-label">
              Start your trial
              <small>No payment details required</small>
            </span>
          </a>

          <a href="#" class="btn-secondary">
            <span class="btn-icon" aria-hidden="true">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 12h8M12 8v8"/></svg>
            </span>
            <span class="btn-label">
              Play with whiteboard
              <small>No registration needed</small>
            </span>
          </a>
        </div>

        <div class="trust-row" aria-label="Trust indicators">
          <div class="trust-item"><span class="dot" aria-hidden="true"></span>Trusted by 50,000+ teachers</div>
          <div class="trust-item"><span class="dot" aria-hidden="true"></span>GDPR Compliant</div>
          <div class="trust-item"><span class="dot" aria-hidden="true"></span>Cancel anytime</div>
        </div>
      </div>

      <!-- Right visual -->
      <div class="hero-visual" aria-hidden="true">
        <!-- Placeholder gradient hero image — replace src with real photo -->
        <img
          class="hero-img"
          src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80"
          alt="Teacher writing on whiteboard in classroom"
          loading="eager"
          width="900"
          height="900"
        />

        <!-- Floating stat cards -->
        <div class="float-card float-card--students">
          <div class="fc-icon fc-icon--green" aria-hidden="true">🎓</div>
          <div class="fc-info">
            <strong>2.4M+</strong>
            <span>Active Students</span>
          </div>
        </div>

        <div class="float-card float-card--rating">
          <div class="fc-icon fc-icon--yellow" aria-hidden="true">⭐</div>
          <div class="fc-info">
            <strong>4.9 / 5</strong>
            <span>Teacher Rating</span>
          </div>
        </div>

        <div class="float-card float-card--lessons">
          <div class="fc-icon fc-icon--blue" aria-hidden="true">📘</div>
          <div class="fc-info">
            <strong>180K</strong>
            <span>Lessons Created</span>
          </div>
        </div>
      </div>
    </section>

    <!-- =====================
         STATS BAR
    ===================== -->
    <section class="stats-bar reveal" aria-label="Platform statistics">
      <div class="stat-item">
        <div class="num">50<span>K+</span></div>
        <p>Active Teachers</p>
      </div>
      <div class="stat-item">
        <div class="num">2.4<span>M</span></div>
        <p>Students Engaged</p>
      </div>
      <div class="stat-item">
        <div class="num">180<span>K</span></div>
        <p>Lessons Created</p>
      </div>
      <div class="stat-item">
        <div class="num">4.9<span>★</span></div>
        <p>Average Rating</p>
      </div>
      <div class="stat-item">
        <div class="num">95<span>%</span></div>
        <p>Renewal Rate</p>
      </div>
    </section>

    <!-- =====================
         FEATURES
    ===================== -->
    <section class="features" id="about" aria-labelledby="features-heading">
      <div class="reveal">
        <span class="section-label">Why Schoolify</span>
        <h2 class="section-title" id="features-heading">Everything you need to<br>teach smarter</h2>
        <p class="section-sub">A complete toolkit designed by educators, for educators — interactive lessons, real-time feedback, and powerful management all in one place.</p>
      </div>

      <div class="features-grid">
        <div class="feature-card reveal">
          <div class="feat-icon" aria-hidden="true">🖊️</div>
          <h3>Interactive Whiteboard</h3>
          <p>Engage your class with a powerful real-time whiteboard. Draw, annotate, and collaborate without missing a beat.</p>
        </div>
        <div class="feature-card reveal">
          <div class="feat-icon" aria-hidden="true">📊</div>
          <h3>Live Progress Tracking</h3>
          <p>Monitor student understanding as it happens. Instant feedback loops help you adapt your teaching on the fly.</p>
        </div>
        <div class="feature-card reveal">
          <div class="feat-icon" aria-hidden="true">📋</div>
          <h3>Lesson Planner</h3>
          <p>Build, organize, and reuse lesson plans effortlessly. Save hours every week with smart templates and scheduling.</p>
        </div>
        <div class="feature-card reveal">
          <div class="feat-icon" aria-hidden="true">🎮</div>
          <h3>Gamified Activities</h3>
          <p>Turn quizzes into competitions. Boost participation with leaderboards, points, and game-based learning modules.</p>
        </div>
        <div class="feature-card reveal">
          <div class="feat-icon" aria-hidden="true">🔒</div>
          <h3>Safe & GDPR Compliant</h3>
          <p>Built with student privacy at its core. Fully GDPR compliant and audited by independent security experts.</p>
        </div>
        <div class="feature-card reveal">
          <div class="feat-icon" aria-hidden="true">🌐</div>
          <h3>Works Everywhere</h3>
          <p>Browser-based with no installs needed. Works perfectly on tablets, Chromebooks, smartboards, and phones.</p>
        </div>
      </div>
    </section>

    <!-- =====================
         PRICING
    ===================== -->
    <section class="pricing" id="pricing" aria-labelledby="pricing-heading">
      <div class="reveal">
        <span class="section-label">Pricing</span>
        <h2 class="section-title" id="pricing-heading">Simple, transparent pricing</h2>
        <p class="section-sub" style="margin:0 auto 0;">No hidden fees. Start free for 30 days, cancel anytime.</p>
      </div>

      <div class="pricing-cards reveal">
        <!-- Free -->
        <div class="pricing-card">
          <h3>Free</h3>
          <div class="price">$0 <span class="price-period">/ forever</span></div>
          <ul>
            <li>Up to 30 students</li>
            <li>5 lesson plans</li>
            <li>Basic whiteboard</li>
            <li>Community support</li>
          </ul>
          <button class="btn-plan">Get started</button>
        </div>

        <!-- Pro — featured -->
        <div class="pricing-card featured">
          <span class="popular-badge">Most Popular</span>
          <h3>Pro</h3>
          <div class="price">$11.95 <span class="price-period">/ month</span></div>
          <ul>
            <li>Unlimited students</li>
            <li>Unlimited lesson plans</li>
            <li>Full interactive whiteboard</li>
            <li>Gamified activities</li>
            <li>Live analytics dashboard</li>
            <li>Priority email support</li>
          </ul>
          <button class="btn-plan">Start free trial</button>
        </div>

        <!-- School -->
        <div class="pricing-card">
          <h3>School</h3>
          <div class="price">Custom</div>
          <ul>
            <li>Everything in Pro</li>
            <li>Multi-teacher accounts</li>
            <li>Admin dashboard</li>
            <li>LMS integration</li>
            <li>Dedicated onboarding</li>
          </ul>
          <button class="btn-plan">Contact sales</button>
        </div>
      </div>
    </section>

    <!-- =====================
         TESTIMONIALS
    ===================== -->
    <section class="testimonials reveal" aria-labelledby="testi-heading">
      <span class="section-label">Testimonials</span>
      <h2 class="section-title" id="testi-heading">Loved by teachers worldwide</h2>

      <div class="testi-grid">
        <div class="testi-card reveal">
          <div class="stars" aria-label="5 stars">★★★★★</div>
          <p class="testi-text">"Schoolify has completely transformed how I run my classes. My students are more engaged than ever, and I save at least 3 hours of prep time every week."</p>
          <div class="testi-author">
            <div class="avatar" aria-hidden="true">SM</div>
            <div class="author-info">
              <strong>Sarah Mitchell</strong>
              <span>Year 8 Science Teacher, UK</span>
            </div>
          </div>
        </div>
        <div class="testi-card reveal">
          <div class="stars" aria-label="5 stars">★★★★★</div>
          <p class="testi-text">"The whiteboard tool alone is worth every penny. I use it daily for diagrams and problem-solving sessions. Students can follow along on their tablets seamlessly."</p>
          <div class="testi-author">
            <div class="avatar" aria-hidden="true">JR</div>
            <div class="author-info">
              <strong>James Rodriguez</strong>
              <span>High School Math, USA</span>
            </div>
          </div>
        </div>
        <div class="testi-card reveal">
          <div class="stars" aria-label="5 stars">★★★★★</div>
          <p class="testi-text">"We rolled out Schoolify across 40 teachers this semester. The admin dashboard gives us exactly the visibility we needed. Exceptional platform."</p>
          <div class="testi-author">
            <div class="avatar" aria-hidden="true">AO</div>
            <div class="author-info">
              <strong>Amara Okonkwo</strong>
              <span>Deputy Head, Lagos Academy</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =====================
         CTA BANNER
    ===================== -->
    <section class="cta-banner reveal" id="contact" aria-labelledby="cta-heading">
      <h2 id="cta-heading">Ready to transform your classroom?</h2>
      <p>Join 50,000+ teachers already using Schoolify — free for 30 days, no credit card needed.</p>
      <div class="cta-actions">
        <a href="#" class="btn-primary">
          <span class="btn-icon" aria-hidden="true">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </span>
          <span class="btn-label">Start your free trial<small>No payment details required</small></span>
        </a>
        <a href="#" class="btn-secondary" style="background:transparent;color:white;border-color:rgba(255,255,255,.35);">
          <span class="btn-label">Talk to sales</span>
        </a>
      </div>
    </section>

  </main>

  <!-- =====================
       FOOTER
  ===================== -->
  <footer class="footer">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="#" class="nav-logo">
          <span class="brand" style="font-size:1.5rem;">School<span>ify</span><sup>®</sup></span>
        </a>
        <p class="tagline-full">The community of education. Empowering teachers with tools that make a real difference in every classroom.</p>
      </div>

      <div class="footer-col">
        <h4>Product</h4>
        <ul>
          <li><a href="#">Features</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="#">Whiteboard</a></li>
          <li><a href="#">Integrations</a></li>
          <li><a href="#">Changelog</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="#about">About us</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#">Press</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Support</h4>
        <ul>
          <li><a href="#">Help center</a></li>
          <li><a href="#">Community</a></li>
          <li><a href="#">Status</a></li>
          <li><a href="#">Privacy policy</a></li>
          <li><a href="#">Terms of use</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2026 Schoolify® – The Community of Education. All rights reserved.</p>
      <div class="footer-links">
        <a href="#">Privacy</a>
        <a href="#">Terms</a>
        <a href="#">Cookies</a>
      </div>
    </div>
  </footer>

  <!-- =====================
       JAVASCRIPT
  ===================== -->
  <script>
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
          { suffix: 'M',  target: 2.4 },
          { suffix: 'K',  target: 180 },
          { suffix: '★',  target: 4.9 },
          { suffix: '%',  target: 95 },
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
  </script>
</body>
</html> 