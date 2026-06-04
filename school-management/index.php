<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Schoolify® – The Community of Education</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="assets/css/index.css" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
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
    
    <div class="hero-visual" aria-hidden="true">
      <video autoplay muted loop playsinline>
          <source src="assets/images/sch-video.mp4" type="video/mp4">
          Your browser does not support the video tag.
      </video>

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

    <div class="hero-bg-dots" aria-hidden="true"></div>

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

  <script src="assets/js/index.js"></script>
</body>
</html> 