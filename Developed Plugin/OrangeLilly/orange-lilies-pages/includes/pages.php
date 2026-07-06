<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Page registry. The Home page is intentionally NOT created — per brand
 * direction the theme/Elementor home page is kept. %%URL_HOME%% resolves
 * to the site root in the main plugin file.
 */
function ol_get_all_pages() {
	return [
		'about-us'             => [ 'title' => 'About Us',                   'content' => ol_page_about() ],
		'services'             => [ 'title' => 'Our Products',               'content' => ol_page_services() ],
		'sustainability'       => [ 'title' => 'Sustainability',             'content' => ol_page_sustainability() ],
		'contact'              => [ 'title' => 'Contact',                    'content' => ol_page_contact() ],
		'privacy-policy'       => [ 'title' => 'Privacy Policy',             'content' => ol_page_privacy() ],
		'terms-of-service'     => [ 'title' => 'Terms of Service',           'content' => ol_page_tos() ],
		'terms-and-conditions' => [ 'title' => 'Terms &amp; Conditions',     'content' => ol_page_tandc() ],
		'refund-policy'        => [ 'title' => 'Refund &amp; Return Policy', 'content' => ol_page_refund() ],
		'cancellation-policy'  => [ 'title' => 'Cancellation Policy',        'content' => ol_page_cancel() ],
		'shipping-policy'      => [ 'title' => 'Shipping &amp; Delivery Policy', 'content' => ol_page_shipping() ],
	];
}

/* ═══════════════════════════════════════════════════════════════
   ABOUT US
═══════════════════════════════════════════════════════════════ */
function ol_page_about() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="ol-hero">
  <div class="ol-wrap">
    <span class="ol-chip">Our Story</span>
    <img src="%%BRAND_LOGO%%" alt="Orange Lilies" class="ol-hero-logo">
    <h1 class="ol-h1">About <span class="ol-accent-text">Orange Lilies</span></h1>
    <p class="ol-hero-intro">Empowering women with comfort, confidence, and care — every day, everywhere. Orange Lilies was born from a simple idea: to make period care easy, dignified, and empowering for every woman.</p>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-two-col">
      <div class="ol-two-col-content">
        <span class="ol-chip">Who We Are</span>
        <h2>Period Care, Reimagined for Real Life</h2>
        <p>Orange Lilies was founded by a passionate, women-led team in India, with a mission to create products that blend comfort, hygiene, and freedom — so you can live every day with confidence.</p>
        <p>From our innovative disposable period panties to our commitment to sustainability and quality, every detail is designed with you in mind. We believe that period care should never hold you back — it should help you thrive.</p>
        <p>As part of The Kutumb Group — an ISO 9001:2015 GMP certified company — we hold ourselves to the highest standards of safety, hygiene and quality, so every product earns your trust.</p>
        <div class="ol-btn-group" style="margin-top:32px;">
          <a href="%%URL_SERVICES%%" class="ol-btn">Explore Our Products</a>
          <a href="%%URL_CONTACT%%" class="ol-btn ol-btn-outline">Get In Touch</a>
        </div>
      </div>
      <div>
        <ul class="ol-feature-list">
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-venus"></i></div>
            <div class="ol-feature-text">
              <strong>Women-Led &amp; Women-First</strong>
              <span>Built by women who understand what real comfort and dignity during periods truly mean.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-flask"></i></div>
            <div class="ol-feature-text">
              <strong>Dermatologically Tested</strong>
              <span>Every product is dermatologically tested and quality-assured for your safety and peace of mind.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-leaf"></i></div>
            <div class="ol-feature-text">
              <strong>Eco-Conscious</strong>
              <span>We use eco-friendly materials and responsible packaging to protect the planet for future generations.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-certificate"></i></div>
            <div class="ol-feature-text">
              <strong>ISO 9001:2015 GMP Certified</strong>
              <span>The Kutumb Group is certified to globally recognised quality-management standards.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-heart"></i></div>
            <div class="ol-feature-text">
              <strong>Comfort First</strong>
              <span>Gentle, soft and secure by design — so you can focus on living your life.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-globe"></i></div>
            <div class="ol-feature-text">
              <strong>A Movement, Not Just a Brand</strong>
              <span>We exist to uplift, educate and empower women everywhere.</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-surface2);">
  <div class="ol-wrap">
    <div class="ol-grid-2">
      <div class="ol-card">
        <span class="ol-card-icon"><i class="fa-solid fa-bullseye"></i></span>
        <h3>Our Mission</h3>
        <p>To redefine period comfort and hygiene for women everywhere, through innovative, safe, and accessible products that inspire confidence and well-being.</p>
      </div>
      <div class="ol-card">
        <span class="ol-card-icon"><i class="fa-solid fa-eye"></i></span>
        <h3>Our Vision</h3>
        <p>A world where every woman can embrace her period with pride, comfort, and freedom — without compromise. Together, we strive to uplift, educate, and empower women everywhere.</p>
      </div>
    </div>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-section-heading">
      <span class="ol-chip">What We Stand For</span>
      <h2 class="ol-h2">Our Values</h2>
      <div class="ol-divider"></div>
      <p>Six promises that guide every product we make and every decision we take.</p>
    </div>
    <div class="ol-grid">
      <div class="ol-value-card">
        <div class="ol-value-icon"><i class="fa-solid fa-heart"></i></div>
        <h3>Comfort First</h3>
        <p>We design every product to feel gentle, soft, and secure — so you can focus on living your life.</p>
      </div>
      <div class="ol-value-card">
        <div class="ol-value-icon"><i class="fa-solid fa-hand-fist"></i></div>
        <h3>Empowerment</h3>
        <p>We believe in supporting women's confidence, dignity, and independence — every day of the month.</p>
      </div>
      <div class="ol-value-card">
        <div class="ol-value-icon"><i class="fa-solid fa-lightbulb"></i></div>
        <h3>Innovation</h3>
        <p>We're always improving — bringing you the latest in period care technology and design.</p>
      </div>
      <div class="ol-value-card">
        <div class="ol-value-icon"><i class="fa-solid fa-leaf"></i></div>
        <h3>Sustainability</h3>
        <p>We use eco-friendly materials and responsible practices to protect our planet for future generations.</p>
      </div>
      <div class="ol-value-card">
        <div class="ol-value-icon"><i class="fa-solid fa-shield-halved"></i></div>
        <h3>Quality</h3>
        <p>Every product is dermatologically tested and quality-assured for your safety and peace of mind.</p>
      </div>
      <div class="ol-value-card">
        <div class="ol-value-icon"><i class="fa-solid fa-handshake"></i></div>
        <h3>Community</h3>
        <p>We're more than a brand — we're a movement for better period care, education, and support.</p>
      </div>
    </div>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-surface2);">
  <div class="ol-wrap">
    <div class="ol-section-heading">
      <span class="ol-chip">Meet Our Team</span>
      <h2 class="ol-h2">The People Behind Orange Lilies</h2>
      <div class="ol-divider"></div>
      <p>Driven by empathy, quality and an unwavering belief in women's well-being.</p>
    </div>
    <div class="ol-team-grid">
      <div class="ol-team-card">
        <div class="ol-team-head">
          <div class="ol-team-avatar">KT</div>
          <div>
            <h3 class="ol-team-name">Kanika Tomar</h3>
            <span class="ol-team-role">Founder &amp; CEO</span>
          </div>
        </div>
        <p>Kanika is the visionary force behind Orange Lilies, blending innovation with compassion to create products that empower women and set new standards in quality and care.</p>
        <p>With a background in product development and a deep understanding of women's needs, Kanika is dedicated to breaking taboos around menstrual health. She believes in making period care accessible, dignified, and comfortable for all. Her leadership inspires the team to always put women first, ensuring that every product reflects empathy, quality, and empowerment.</p>
      </div>
      <div class="ol-team-card">
        <div class="ol-team-head">
          <div class="ol-team-avatar">SL</div>
          <div>
            <h3 class="ol-team-name">Sanam Lamba</h3>
            <span class="ol-team-role">Founder &amp; CEO</span>
          </div>
        </div>
        <p>Sanam brings strategic insight and creative energy to Orange Lilies, building a vibrant community and driving the brand's mission to inspire confidence and positive change.</p>
        <p>With expertise in business strategy and a passion for women's wellness, Sanam ensures that Orange Lilies is not just a product, but a movement. He is committed to fostering open conversations about periods, supporting education initiatives, and making a real difference in the lives of women — creating a supportive, inclusive space where every woman feels heard and empowered.</p>
      </div>
    </div>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-cta">
      <h2>Join the Orange Lilies Movement</h2>
      <p>Discover period care that puts your comfort, confidence and the planet first. We'd love to welcome you to the family.</p>
      <div class="ol-btn-group">
        <a href="%%URL_SERVICES%%" class="ol-btn">Shop Our Range</a>
        <a href="%%URL_SUSTAINABILITY%%" class="ol-btn ol-btn-outline">Our Sustainability Promise</a>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   OUR PRODUCTS  (slug: services)
═══════════════════════════════════════════════════════════════ */
function ol_page_services() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="ol-hero">
  <div class="ol-wrap">
    <span class="ol-chip">What We Offer</span>
    <h1 class="ol-h1">Our <span class="ol-accent-text">Products</span></h1>
    <p class="ol-hero-intro">Thoughtfully engineered period care that blends comfort, hygiene and freedom. Designed for real life, tested for your safety, and made with the planet in mind.</p>
  </div>
</div>

<div class="ol-stats">
  <div class="ol-stats-inner">
    <div class="ol-stat-item">
      <span class="ol-stat-number">100%</span>
      <span class="ol-stat-label">Leak Confidence</span>
    </div>
    <div class="ol-stat-item">
      <span class="ol-stat-number">Soft</span>
      <span class="ol-stat-label">Skin-Friendly Feel</span>
    </div>
    <div class="ol-stat-item">
      <span class="ol-stat-number">Eco</span>
      <span class="ol-stat-label">Responsible Materials</span>
    </div>
    <div class="ol-stat-item">
      <span class="ol-stat-number">Tested</span>
      <span class="ol-stat-label">Dermatologically Safe</span>
    </div>
  </div>
</div>

<!-- Featured product: Disposable Period Panties — gallery carousel, pack-size
     selector & size chart. Gallery loads product images image3…image20 from the
     media library; edit the URLS / EXTS list in the script below if names change. -->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Manrope:wght@400;500;600;700;800&display=swap');

  .ol-pd{
    --o:#e8780a; --o2:#cf6f08; --amber:#f0982a; --gold:#c8912f; --ink:#2f2a24; --body:#4a443d; --muted:#7a7065;
    --cream:#fffaf3; --cream2:#fbeeda; --cream3:#fcefd9; --border:#f1e3cd; --peach:#f8e2c4;
    background:radial-gradient(ellipse 60% 50% at 85% 0%,rgba(232,120,10,.06),transparent 60%),var(--cream);
    padding:100px 20px;font-family:'Manrope',sans-serif;color:var(--body);box-sizing:border-box;overflow:hidden;
  }
  .ol-pd *{box-sizing:border-box;}
  .ol-pd__inner{max-width:1160px;margin:0 auto;}

  /* ── Top: gallery + info ── */
  .ol-pd__top{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:start;}

  /* gallery */
  .ol-pd__media{position:relative;width:100%;max-width:480px;margin:0 auto;}
  .ol-pd__stage{position:relative;width:100%;border-radius:28px;overflow:hidden;aspect-ratio:1/1;
    background:linear-gradient(155deg,var(--cream3),var(--peach));border:1px solid var(--border);
    box-shadow:0 44px 80px -36px rgba(216,124,12,.5);}
  .ol-pd__slides{position:absolute;inset:0;}
  .ol-pd__slide{position:absolute!important;inset:0!important;width:100%!important;height:100%!important;
    object-fit:contain!important;padding:7%;opacity:0;transition:opacity .55s ease;}
  .ol-pd__slide.is-active{opacity:1;}
  .ol-pd__ribbon{position:absolute;top:18px;left:18px;z-index:3;
    background:linear-gradient(90deg,var(--amber),var(--o2));color:#fff;font-size:.68rem;font-weight:800;
    letter-spacing:.1em;text-transform:uppercase;padding:8px 16px;border-radius:60px;
    box-shadow:0 14px 26px -10px rgba(216,124,12,.6);}
  .ol-pd__seal{position:absolute;top:16px;right:16px;z-index:3;width:74px;height:74px;border-radius:50%;
    background:rgba(255,255,255,.94);border:1px solid var(--border);box-shadow:0 14px 28px -12px rgba(120,60,0,.5);
    display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;gap:2px;}
  .ol-pd__seal i{color:var(--o);font-size:1.15rem;}
  .ol-pd__seal span{font-size:.52rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--muted);line-height:1.15;}
  .ol-pd__nav{position:absolute;top:50%;transform:translateY(-50%);z-index:3;width:42px;height:42px;border-radius:50%;
    border:none;cursor:pointer;background:rgba(255,255,255,.92);color:var(--ink);font-size:.92rem;
    display:flex;align-items:center;justify-content:center;box-shadow:0 8px 20px -6px rgba(120,60,0,.45);
    transition:background .25s,color .25s,transform .25s;}
  .ol-pd__nav:hover{background:#fff;color:var(--o);transform:translateY(-50%) scale(1.1);}
  .ol-pd__nav--prev{left:14px;} .ol-pd__nav--next{right:14px;}
  .ol-pd__count{position:absolute;bottom:14px;right:14px;z-index:3;background:rgba(47,42,36,.72);color:#fff;
    font-size:.72rem;font-weight:600;padding:5px 12px;border-radius:60px;letter-spacing:.04em;}
  .ol-pd__thumbs{display:flex;gap:10px;margin-top:14px;overflow-x:auto;padding:3px 1px 9px;scrollbar-width:thin;scrollbar-color:var(--peach) transparent;}
  .ol-pd__thumbs::-webkit-scrollbar{height:6px;}
  .ol-pd__thumbs::-webkit-scrollbar-thumb{background:var(--peach);border-radius:60px;}
  .ol-pd__thumb{flex:0 0 64px;width:64px;height:64px;border-radius:12px;overflow:hidden;cursor:pointer;
    border:2px solid transparent;background:#fff;padding:0;transition:border-color .25s,transform .25s;}
  .ol-pd__thumb img{width:100%!important;height:100%!important;object-fit:cover!important;display:block;}
  .ol-pd__thumb.is-active{border-color:var(--o);}
  .ol-pd__thumb:hover{transform:translateY(-2px);}

  /* info */
  .ol-pd__eyebrow{display:block;font-size:.72rem;font-weight:700;letter-spacing:.34em;
    text-transform:uppercase;color:var(--o);margin-bottom:14px;}
  .ol-pd__title{margin:0;font-family:'Playfair Display',serif;font-weight:700;
    font-size:clamp(2rem,3.8vw,3rem);color:var(--ink);line-height:1.1;letter-spacing:-.015em;}
  .ol-pd__title em{font-style:italic;color:var(--o);}
  .ol-pd__rating{display:flex;align-items:center;gap:10px;margin:16px 0 0;font-size:.9rem;color:var(--muted);}
  .ol-pd__rating .stars{color:var(--gold);letter-spacing:2px;font-size:.95rem;}
  .ol-pd__lead{margin:20px 0 0;font-size:1.04rem;line-height:1.8;color:var(--body);}
  .ol-pd__lead strong{color:var(--ink);font-weight:700;}

  .ol-pd__list{list-style:none;margin:24px 0 0;padding:0;display:grid;grid-template-columns:1fr 1fr;gap:13px 22px;}
  .ol-pd__list li{display:flex;align-items:flex-start;gap:10px;font-size:.94rem;color:var(--ink);font-weight:500;}
  .ol-pd__list i{color:var(--o);font-size:.82rem;margin-top:4px;flex-shrink:0;}

  /* Pack Size Variant Selector */
  .ol-pd__variants{margin:28px 0 0;}
  .ol-pd__v-title{margin:0 0 12px;font-size:.85rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:var(--muted);}
  .ol-pd__v-options{display:flex;gap:12px;flex-wrap:wrap;}
  .ol-pd__v-btn{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:14px;border:2px solid var(--border);border-radius:14px;background:#fff;cursor:pointer;transition:all .3s ease;color:var(--ink);text-align:center;}
  .ol-pd__v-btn.is-active{border-color:var(--o);background:rgba(232,120,10,.04);box-shadow:0 8px 20px -8px rgba(232,120,10,.25);}
  .ol-pd__v-btn:hover:not(.is-active){border-color:var(--amber);}
  .ol-pd__v-btn .v-qty{font-size:1.05rem;font-weight:700;margin-bottom:6px;}
  .ol-pd__v-btn .v-save{font-size:.7rem;font-weight:800;color:#1c8a57;background:rgba(30,158,99,.12);padding:3px 8px;border-radius:20px;text-transform:uppercase;letter-spacing:.02em;}

  .ol-pd__buy{margin:28px 0 0;padding:24px 0 0;border-top:1px solid var(--border);}
  .ol-pd__price{display:flex;align-items:center;gap:12px;flex-wrap:wrap;}
  .ol-pd__price b{font-family:'Playfair Display',serif;font-size:2.5rem;color:var(--o2);line-height:1;}
  .ol-pd__price s{color:var(--muted);font-size:1.2rem;}
  .ol-pd__off{background:rgba(30,158,99,.12);color:#1c8a57;font-size:.74rem;font-weight:800;
    letter-spacing:.04em;text-transform:uppercase;padding:6px 12px;border-radius:60px;}
  .ol-pd__taxes{margin:8px 0 0;font-size:.78rem;color:var(--muted);letter-spacing:.02em;}
  .ol-pd__btns{display:flex;gap:12px;flex-wrap:wrap;margin:22px 0 0;}
  .ol-pd__btn{display:inline-flex;align-items:center;gap:9px;font-size:.95rem;font-weight:700;text-decoration:none;
    cursor:pointer;padding:15px 32px;border-radius:60px;border:1.5px solid transparent;
    transition:transform .3s ease,box-shadow .3s ease,background .3s ease,color .3s ease,border-color .3s ease;}
  .ol-pd__btn--solid{background:linear-gradient(95deg,var(--amber),var(--o2));color:#fff;
    box-shadow:0 16px 32px -12px rgba(216,124,12,.6);}
  .ol-pd__btn--solid:hover{transform:translateY(-3px);box-shadow:0 22px 40px -14px rgba(216,124,12,.7);color:#fff;}
  .ol-pd__btn--ghost{background:#fff;color:var(--o);border-color:var(--border);}
  .ol-pd__btn--ghost:hover{transform:translateY(-3px);border-color:var(--o);color:var(--o2);}

  .ol-pd__trust{display:flex;gap:22px;flex-wrap:wrap;margin:22px 0 0;font-size:.82rem;color:var(--muted);}
  .ol-pd__trust span{display:inline-flex;align-items:center;gap:7px;}
  .ol-pd__trust i{color:var(--o);}

  /* ── Editorial details ── */
  .ol-pd__details{margin-top:96px;text-align:center;}
  .ol-pd__dhead{max-width:640px;margin:0 auto 18px;}
  .ol-pd__dhead h3{margin:0;font-family:'Playfair Display',serif;font-weight:700;
    font-size:clamp(1.7rem,3vw,2.3rem);color:var(--ink);letter-spacing:-.01em;}
  .ol-pd__rule{width:96px;height:1px;margin:18px auto 26px;position:relative;
    background:linear-gradient(90deg,transparent,var(--gold),transparent);}
  .ol-pd__rule::after{content:'';position:absolute;top:50%;left:50%;width:6px;height:6px;
    background:var(--o);border-radius:50%;transform:translate(-50%,-50%) rotate(45deg);}
  .ol-pd__copy{max-width:760px;margin:0 auto;color:var(--body);font-size:1.04rem;line-height:1.9;}
  .ol-pd__copy p{margin:0 0 18px;}
  .ol-pd__copy p:last-child{margin-bottom:0;}

  /* ── Spec grid ── */
  .ol-pd__specs{display:grid;grid-template-columns:repeat(4,1fr);gap:22px;margin-top:54px;}
  .ol-pd__spec{background:#fff;border:1px solid var(--border);border-radius:20px;padding:32px 24px;text-align:center;
    box-shadow:0 20px 44px -32px rgba(120,60,0,.4);transition:transform .4s cubic-bezier(.22,.61,.36,1),box-shadow .4s ease;}
  .ol-pd__spec:hover{transform:translateY(-8px);box-shadow:0 34px 60px -34px rgba(216,124,12,.5);}
  .ol-pd__spec-ic{width:56px;height:56px;margin:0 auto 16px;border-radius:16px;display:flex;align-items:center;justify-content:center;
    font-size:1.4rem;color:var(--o);border:1px solid var(--border);
    background:linear-gradient(135deg,rgba(240,152,42,.16),rgba(232,120,10,.10));}
  .ol-pd__spec h4{margin:0 0 6px;font-family:'Playfair Display',serif;font-size:1.05rem;color:var(--ink);}
  .ol-pd__spec p{margin:0;font-size:.9rem;color:var(--muted);line-height:1.55;}

  /* ── Size chart ── */
  .ol-pd__sizewrap{margin-top:84px;text-align:center;}
  .ol-size{max-width:560px;margin:0 auto;border-radius:20px;overflow:hidden;color:#fff;
    background:linear-gradient(150deg,var(--amber),var(--o));
    box-shadow:0 34px 64px -34px rgba(216,124,12,.7);}
  .ol-size__row{display:grid;grid-template-columns:62px 1fr 1.35fr;align-items:center;
    border-bottom:1px dashed rgba(255,255,255,.45);}
  .ol-size__row:last-child{border-bottom:none;}
  .ol-size__c{padding:18px 14px;text-align:center;font-size:1.02rem;font-weight:600;
    border-right:1px dashed rgba(255,255,255,.45);}
  .ol-size__c:last-child{border-right:none;}
  .ol-size__row--head{background:rgba(120,52,0,.28);}
  .ol-size__row--head .ol-size__c{font-family:'Playfair Display',serif;font-weight:700;letter-spacing:.01em;}
  .ol-size__row--active{background:rgba(255,255,255,.16);}
  .ol-size__c--mark i{font-size:1.15rem;color:#fff;}
  .ol-size__note{max-width:560px;margin:18px auto 0;font-size:.88rem;color:var(--muted);}

  /* scroll-reveal (JS-gated) */
  .ol-pd.is-on .rv{opacity:0;transform:translateY(28px);
    transition:opacity .8s cubic-bezier(.22,.61,.36,1),transform .8s cubic-bezier(.22,.61,.36,1);}
  .ol-pd.is-on .rv.in{opacity:1;transform:none;}
  @media(prefers-reduced-motion:reduce){.ol-pd.is-on .rv{opacity:1!important;transform:none!important;}}

  @media(max-width:900px){
    .ol-pd{padding:72px 24px;}
    .ol-pd__top{grid-template-columns:1fr;gap:40px;}
    .ol-pd__media{max-width:480px;margin:0 auto;width:100%;}
    .ol-pd__details{margin-top:72px;}
    .ol-pd__specs{grid-template-columns:1fr 1fr;}
    .ol-pd__sizewrap{margin-top:64px;}
  }
  @media(max-width:520px){
    .ol-pd{padding:54px 20px;}
    .ol-pd__media{max-width:360px;}
    .ol-pd__list{grid-template-columns:1fr;}
    .ol-pd__specs{grid-template-columns:1fr;}
    .ol-pd__btns{gap:10px;}
    .ol-pd__btn{flex:1 1 auto;justify-content:center;}
    .ol-pd__price b{font-size:2.1rem;}
    .ol-size__row{grid-template-columns:42px 1fr 1.2fr;}
    .ol-size__c{padding:13px 7px;font-size:.88rem;}
    .ol-pd__seal{width:58px;height:58px;top:12px;right:12px;}
    .ol-pd__seal i{font-size:.95rem;}
    .ol-pd__ribbon{font-size:.6rem;padding:6px 12px;top:12px;left:12px;}
    .ol-pd__nav{width:36px;height:36px;font-size:.82rem;}
    .ol-pd__nav--prev{left:10px;} .ol-pd__nav--next{right:10px;}
    .ol-pd__thumb{flex:0 0 52px;width:52px;height:52px;}
    .ol-pd__title{font-size:1.85rem;}
  }
</style>

<section class="ol-pd">
  <div class="ol-pd__inner">

    <!-- ── Product top ── -->
    <div class="ol-pd__top">
      <div class="ol-pd__media rv">
        <div class="ol-pd__stage">
          <span class="ol-pd__ribbon">Bestseller</span>
          <span class="ol-pd__seal"><i class="fa-solid fa-shield-heart"></i><span>Derma<br>Tested</span></span>
          <div class="ol-pd__slides" id="olpdSlides">
            <!-- Loading fallback -->
            <div class="ol-pd__slide is-active" style="background:#fff; display:flex; align-items:center; justify-content:center; opacity:1;"><i class="fa-solid fa-spinner fa-spin" style="font-size:2rem; color:#e8780a;"></i></div>
          </div>
          <button class="ol-pd__nav ol-pd__nav--prev" type="button" aria-label="Previous image"><i class="fa-solid fa-chevron-left"></i></button>
          <button class="ol-pd__nav ol-pd__nav--next" type="button" aria-label="Next image"><i class="fa-solid fa-chevron-right"></i></button>
          <span class="ol-pd__count" id="olpdCount">1 / 20</span>
        </div>
        <div class="ol-pd__thumbs" id="olpdThumbs"></div>
      </div>

      <div class="ol-pd__info rv">
        <span class="ol-pd__eyebrow" id="olEyebrow">Orange Lilies &middot; Period Care &middot; Pack of 5</span>
        <h2 class="ol-pd__title">Disposable <em>Period</em> Panties</h2>

        <div class="ol-pd__rating">
          <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
          <span>4.9 &middot; Loved by 2,300+ women</span>
        </div>

        <p class="ol-pd__lead">Period care, redefined. Our signature disposable panty blends reliable, leak-proof protection with all-day softness &mdash; an all-in-one solution that feels exactly like your favourite underwear, only worry-free. <strong id="olLeadPack">Each box contains 5 single-use panties.</strong> Wear it, change it, dispose of it. No pads, no soaking, no compromise.</p>

        <ul class="ol-pd__list">
          <li id="olPackDesc"><i class="fa-solid fa-box-open"></i>Pack of 5 panties per box</li>
          <li><i class="fa-solid fa-check"></i>High-absorbency leak-proof core</li>
          <li><i class="fa-solid fa-check"></i>Ultra-soft, breathable layers</li>
          <li><i class="fa-solid fa-check"></i>Snug, body-hugging fit</li>
          <li><i class="fa-solid fa-check"></i>Day &amp; overnight protection</li>
          <li><i class="fa-solid fa-check"></i>Skin-friendly, dermatologically tested</li>
        </ul>

        <!-- Variant Selector -->
        <div class="ol-pd__variants">
          <h4 class="ol-pd__v-title">Select Pack Size</h4>
          <div class="ol-pd__v-options">

            <!-- Pack of 5 -->
            <button type="button" class="ol-pd__v-btn is-active"
              data-pack="5"
              data-price="220"
              data-strike="299"
              data-url="https://orangelilies.com/product/disposable-period-panties/">
              <span class="v-qty">Pack of 5</span>
              <span class="v-save">Save 26%</span>
            </button>

            <!-- Pack of 10 -->
            <button type="button" class="ol-pd__v-btn"
              data-pack="10"
              data-price="399"
              data-strike="598"
              data-url="https://orangelilies.com/product/disposable-period-panties-pack-of-10/">
              <span class="v-qty">Pack of 10</span>
              <span class="v-save">Save 33%</span>
            </button>

          </div>
        </div>

        <div class="ol-pd__buy">
          <div class="ol-pd__price">
            <b id="olPriceMain">&#8377;220</b>
            <s id="olPriceStrike">&#8377;299</s>
            <span class="ol-pd__off" id="olPriceBadge">Save 26%</span>
          </div>
          <p class="ol-pd__taxes">Offer price &mdash; inclusive of all taxes.</p>
          <div class="ol-pd__btns">
            <!-- This URL updates automatically via JS when a pack is selected -->
            <a href="https://orangelilies.com/product/disposable-period-panties/" id="olBuyBtn" class="ol-pd__btn ol-pd__btn--solid"><i class="fa-solid fa-bag-shopping"></i> Buy Now</a>
            <a href="#ol-size" class="ol-pd__btn ol-pd__btn--ghost"><i class="fa-solid fa-ruler"></i> Size Guide</a>
          </div>
        </div>

        <div class="ol-pd__trust">
          <span><i class="fa-solid fa-truck-fast"></i> Free delivery across India</span>
          <span><i class="fa-solid fa-hand-holding-dollar"></i> COD available</span>
          <span><i class="fa-solid fa-box"></i> 100% discreet packaging</span>
        </div>
      </div>
    </div>

    <!-- ── Editorial description ── -->
    <div class="ol-pd__details">
      <div class="ol-pd__dhead rv">
        <h3>Comfort &amp; Confidence, Reimagined</h3>
        <div class="ol-pd__rule"></div>
      </div>
      <div class="ol-pd__copy rv">
        <p>Orange Lilies Disposable Period Panties are thoughtfully engineered for real life. Each panty features a high-absorbency core that locks in flow and an ultra-soft, breathable outer layer that stays gentle against sensitive skin &mdash; so you stay dry, fresh and secure from the first hour to the last.</p>
        <p>Designed for young girls, working women, travellers and athletes alike, they move with you through every part of your day: the morning commute, the workout, the long-haul flight, the deep night's sleep. No bulk. No shifting. No anxious checks. Just quiet, dependable freedom &mdash; the way period care should always have felt.</p>
        <p>Crafted by a women-led team and made to ISO 9001:2015 GMP-certified standards as part of The Kutumb Group, every Orange Lilies panty is dermatologically tested and responsibly packaged. Confidence of freshness, in every single one.</p>
      </div>

      <!-- ── Spec grid ── -->
      <div class="ol-pd__specs">
        <div class="ol-pd__spec rv">
          <div class="ol-pd__spec-ic"><i class="fa-solid fa-feather"></i></div>
          <h4>Material</h4>
          <p>Soft, breathable, skin-friendly non-woven layers</p>
        </div>
        <div class="ol-pd__spec rv">
          <div class="ol-pd__spec-ic"><i class="fa-solid fa-droplet"></i></div>
          <h4>Absorbency</h4>
          <p>High-capacity core for day &amp; overnight flow</p>
        </div>
        <div class="ol-pd__spec rv">
          <div class="ol-pd__spec-ic"><i class="fa-solid fa-ruler"></i></div>
          <h4>Fit &amp; Sizes</h4>
          <p>Body-hugging stretch fit, available S to XXXL</p>
        </div>
        <div class="ol-pd__spec rv">
          <div class="ol-pd__spec-ic"><i class="fa-solid fa-recycle"></i></div>
          <h4>Use &amp; Care</h4>
          <p>Single-use &mdash; wear, change &amp; bin responsibly</p>
        </div>
      </div>

      <!-- ── Size chart ── -->
      <div class="ol-pd__sizewrap" id="ol-size">
        <div class="ol-pd__dhead rv">
          <h3>Find Your Perfect Fit</h3>
          <div class="ol-pd__rule"></div>
        </div>
        <div class="ol-size rv">
          <div class="ol-size__row ol-size__row--head">
            <div class="ol-size__c ol-size__c--mark">&nbsp;</div>
            <div class="ol-size__c">Size</div>
            <div class="ol-size__c">Waist Size (inches)</div>
          </div>
          <div class="ol-size__row">
            <div class="ol-size__c ol-size__c--mark">&nbsp;</div>
            <div class="ol-size__c">S&ndash;M</div>
            <div class="ol-size__c">22&ndash;30</div>
          </div>
          <div class="ol-size__row">
            <div class="ol-size__c ol-size__c--mark">&nbsp;</div>
            <div class="ol-size__c">M&ndash;L</div>
            <div class="ol-size__c">30&ndash;38</div>
          </div>
          <div class="ol-size__row ol-size__row--active">
            <div class="ol-size__c ol-size__c--mark"><i class="fa-solid fa-check"></i></div>
            <div class="ol-size__c">XL&ndash;XXL</div>
            <div class="ol-size__c">38&ndash;46</div>
          </div>
          <div class="ol-size__row">
            <div class="ol-size__c ol-size__c--mark">&nbsp;</div>
            <div class="ol-size__c">XXL&ndash;XXXL</div>
            <div class="ol-size__c">46&ndash;54</div>
          </div>
        </div>
        <p class="ol-size__note rv">Not sure of your size? Measure around the fullest part of your waist and match it to the chart above.</p>
      </div>
    </div>

  </div>
</section>

<script>
(function () {
  var R = document.querySelector('.ol-pd');
  if (!R) return;

  /* ── Pack Variant Switcher ── */
  var vBtns       = R.querySelectorAll('.ol-pd__v-btn');
  var buyBtn      = document.getElementById('olBuyBtn');
  var priceMain   = document.getElementById('olPriceMain');
  var priceStrike = document.getElementById('olPriceStrike');
  var priceBadge  = document.getElementById('olPriceBadge');
  var eyebrow     = document.getElementById('olEyebrow');
  var leadPack    = document.getElementById('olLeadPack');
  var packDesc    = document.getElementById('olPackDesc');

  if (vBtns.length) {
    vBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        vBtns.forEach(function(b) { b.classList.remove('is-active'); });
        this.classList.add('is-active');

        var pk = this.getAttribute('data-pack');
        var p  = this.getAttribute('data-price');
        var s  = this.getAttribute('data-strike');
        var u  = this.getAttribute('data-url');

        if(priceMain) priceMain.innerHTML = '&#8377;' + p;
        if(priceStrike) priceStrike.innerHTML = '&#8377;' + s;
        if(buyBtn) buyBtn.href = u;

        var savePerc = Math.round(((s - p) / s) * 100);
        if(priceBadge) priceBadge.innerText = 'Save ' + savePerc + '%';

        if(eyebrow) eyebrow.innerHTML = 'Orange Lilies &middot; Period Care &middot; Pack of ' + pk;
        if(leadPack) leadPack.innerText = 'Each box contains ' + pk + ' single-use panties.';
        if(packDesc) packDesc.innerHTML = '<i class="fa-solid fa-box-open"></i>Pack of ' + pk + ' panties per box';
      });
    });
  }


  /* ── Image Gallery ── */
  var URLS = [
    'https://orangelilies.com/wp-content/uploads/2026/06/image3',
    'https://orangelilies.com/wp-content/uploads/2026/06/image4',
    'https://orangelilies.com/wp-content/uploads/2026/06/image5',
    'https://orangelilies.com/wp-content/uploads/2026/06/image6',
    'https://orangelilies.com/wp-content/uploads/2026/06/image7',
    'https://orangelilies.com/wp-content/uploads/2026/06/image8',
    'https://orangelilies.com/wp-content/uploads/2026/06/image9',
    'https://orangelilies.com/wp-content/uploads/2026/06/image10',
    'https://orangelilies.com/wp-content/uploads/2026/06/image11',
    'https://orangelilies.com/wp-content/uploads/2026/06/image12',
    'https://orangelilies.com/wp-content/uploads/2026/06/image13',
    'https://orangelilies.com/wp-content/uploads/2026/06/image14',
    'https://orangelilies.com/wp-content/uploads/2026/06/image15',
    'https://orangelilies.com/wp-content/uploads/2026/06/image16',
    'https://orangelilies.com/wp-content/uploads/2026/06/image17',
    'https://orangelilies.com/wp-content/uploads/2026/06/image18',
    'https://orangelilies.com/wp-content/uploads/2026/06/image19',
    'https://orangelilies.com/wp-content/uploads/2026/06/image20'
  ];

  var EXTS = ['.jpeg', '.jpg', '.png', '.webp'];
  var ALT  = 'Orange Lilies Disposable Period Panties';

  var slidesWrap = R.querySelector('#olpdSlides');
  var thumbsWrap = R.querySelector('#olpdThumbs');
  var countEl    = R.querySelector('#olpdCount');

  if (slidesWrap && thumbsWrap) {
    slidesWrap.innerHTML = '';
    thumbsWrap.innerHTML = '';
    var imgs = [], thumbs = [], cur = 0;

    function refresh() {
      if (cur >= imgs.length) cur = imgs.length - 1;
      if (cur < 0) cur = 0;
      imgs.forEach(function (im, j) { im.classList.toggle('is-active', j === cur); });
      thumbs.forEach(function (tb, j) { tb.classList.toggle('is-active', j === cur); });
      if (countEl) countEl.textContent = (imgs.length ? (cur + 1) : 0) + ' / ' + imgs.length;
    }

    function go(n) {
      if (!imgs.length) return;
      cur = (n + imgs.length) % imgs.length;
      refresh();
      var at = thumbs[cur];

      if (at && thumbsWrap) {
        var thumbCenter = at.offsetLeft + (at.clientWidth / 2);
        var wrapCenter = thumbsWrap.clientWidth / 2;
        thumbsWrap.scrollTo({ left: thumbCenter - wrapCenter, behavior: 'smooth' });
      }
    }

    function drop(slide, thumb) {
      var idx = imgs.indexOf(slide);
      if (idx > -1) { imgs.splice(idx, 1); thumbs.splice(idx, 1); }
      if (slide && slide.parentNode) slide.parentNode.removeChild(slide);
      if (thumb && thumb.parentNode) thumb.parentNode.removeChild(thumb);
      refresh();
    }

    URLS.forEach(function (baseUrl, k) {
      var s = document.createElement('img');
      s.className = 'ol-pd__slide' + (k === 0 ? ' is-active' : '');
      s.alt = ALT + ' — view ' + (k + 1);
      if (k > 0) s.loading = 'lazy';

      var t = document.createElement('button');
      t.type = 'button'; t.className = 'ol-pd__thumb' + (k === 0 ? ' is-active' : '');
      t.setAttribute('aria-label', 'View image ' + (k + 1));
      var ti = document.createElement('img'); ti.alt = ''; ti.loading = 'lazy';
      t.appendChild(ti);

      var ei = 0;
      function setSrc() { s.src = baseUrl + EXTS[ei]; ti.src = baseUrl + EXTS[ei]; }
      s.onerror = function () {
        ei++;
        if (ei < EXTS.length) { setSrc(); }
        else { drop(s, t); }
      };
      setSrc();

      slidesWrap.appendChild(s);
      thumbsWrap.appendChild(t);
      imgs.push(s); thumbs.push(t);
      t.addEventListener('click', function () { cur = imgs.indexOf(s); go(cur); });
    });
    refresh();

    var prev = R.querySelector('.ol-pd__nav--prev');
    var next = R.querySelector('.ol-pd__nav--next');
    if (prev) prev.addEventListener('click', function () { go(cur - 1); });
    if (next) next.addEventListener('click', function () { go(cur + 1); });

    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var timer = null;
    function play() { if (!reduce && !timer) timer = setInterval(function () { go(cur + 1); }, 4500); }
    function stop() { if (timer) { clearInterval(timer); timer = null; } }
    var stage = R.querySelector('.ol-pd__stage');
    if (stage) { stage.addEventListener('mouseenter', stop); stage.addEventListener('mouseleave', play); }
    play();
  }

  /* ── Scroll Reveal ── */
  if ('IntersectionObserver' in window) {
    R.classList.add('is-on');
    var E = [].slice.call(R.querySelectorAll('.rv'));
    E.forEach(function (el, i) { el.style.transitionDelay = ((i % 4) * 90) + 'ms'; });
    var io = new IntersectionObserver(function (en) {
      en.forEach(function (x) { if (x.isIntersecting) { x.target.classList.add('in'); io.unobserve(x.target); } });
    }, { threshold: 0.1, rootMargin: '0px 0px -6% 0px' });
    E.forEach(function (el) { io.observe(el); });
  }
})();
</script>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-section-heading">
      <span class="ol-chip">Our Range</span>
      <h2 class="ol-h2">Comfort You Can Count On</h2>
      <div class="ol-divider"></div>
      <p>Each product is built around the same belief: your period should never hold you back.</p>
    </div>
    <div class="ol-grid">
      <div class="ol-card">
        <div class="ol-card-num">01</div>
        <h3>Disposable Period Panties</h3>
        <p>Our signature innovation. A soft, secure, all-in-one panty that combines reliable protection with all-day comfort — no shifting, no bulk, no worry. Simply wear, change and dispose with ease.</p>
        <ul>
          <li>Comfortable, body-hugging fit</li>
          <li>High-absorbency leak protection</li>
          <li>Breathable, skin-friendly layers</li>
          <li>Convenient single-use hygiene</li>
        </ul>
      </div>
      <div class="ol-card">
        <div class="ol-card-num">02</div>
        <h3>Everyday Comfort Protection</h3>
        <p>Period care that moves with you — at work, at the gym, while you travel or sleep. Designed to feel like a regular panty so you can stay active and confident throughout your cycle.</p>
        <ul>
          <li>Secure all-day &amp; overnight wear</li>
          <li>Soft against sensitive skin</li>
          <li>Discreet, lightweight design</li>
          <li>Freedom to keep doing you</li>
        </ul>
      </div>
      <div class="ol-card">
        <div class="ol-card-num">03</div>
        <h3>Hygiene-First Assurance</h3>
        <p>Backed by The Kutumb Group's ISO 9001:2015 GMP certified standards, every product is dermatologically tested and quality-assured — so you get protection you can genuinely trust.</p>
        <ul>
          <li>Dermatologically tested</li>
          <li>GMP-certified manufacturing</li>
          <li>Rigorous quality checks</li>
          <li>Safe, gentle materials</li>
        </ul>
      </div>
      <div class="ol-card">
        <div class="ol-card-num">04</div>
        <h3>Eco-Conscious Care</h3>
        <p>Comfort for you, care for the planet. We use biodegradable and responsibly sourced materials wherever possible, with recycled and recyclable packaging.</p>
        <ul>
          <li>Biodegradable materials where possible</li>
          <li>Recycled cardboard &amp; paper packaging</li>
          <li>Low-waste, thoughtful design</li>
          <li>Responsible, ethical sourcing</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-surface2);">
  <div class="ol-wrap">
    <div class="ol-section-heading">
      <span class="ol-chip">How It Works</span>
      <h2 class="ol-h2">Easy, Dignified, Worry-Free</h2>
      <div class="ol-divider"></div>
      <p>Period care simplified into a few effortless steps.</p>
    </div>
    <div class="ol-process">
      <div class="ol-step">
        <div class="ol-step-num">1</div>
        <h4>Choose Your Pack</h4>
        <p>Pick the Orange Lilies pack that suits your flow and your routine.</p>
      </div>
      <div class="ol-step">
        <div class="ol-step-num">2</div>
        <h4>Wear With Ease</h4>
        <p>Slip on your period panty just like regular underwear — soft, secure and ready to go.</p>
      </div>
      <div class="ol-step">
        <div class="ol-step-num">3</div>
        <h4>Stay Confident</h4>
        <p>Move, work, travel and rest freely with dependable, all-day protection.</p>
      </div>
      <div class="ol-step">
        <div class="ol-step-num">4</div>
        <h4>Change &amp; Dispose</h4>
        <p>When it's time, change and dispose responsibly in a sanitary bin — never flush.</p>
      </div>
    </div>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-cta">
      <h2>Ready to Feel the Difference?</h2>
      <p>Have a question about our range, sizing or bulk orders? Message us on WhatsApp or email — our team is happy to help.</p>
      <div class="ol-btn-group">
        <a href="https://wa.me/918368615088" class="ol-btn" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp</a>
        <a href="%%URL_CONTACT%%" class="ol-btn ol-btn-outline">Contact Us</a>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   SUSTAINABILITY
═══════════════════════════════════════════════════════════════ */
function ol_page_sustainability() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="ol-hero">
  <div class="ol-wrap">
    <span class="ol-chip ol-chip-violet">Our Promise</span>
    <h1 class="ol-h1"><span class="ol-violet-text">Sustainability</span></h1>
    <p class="ol-hero-intro">Comfort for you, care for the planet. Discover how Orange Lilies is making period care more sustainable — one responsible choice at a time.</p>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-two-col">
      <div class="ol-two-col-content">
        <span class="ol-chip">Why It Matters</span>
        <h2>Small Steps, Big Difference</h2>
        <p>At Orange Lilies, we believe that every small step towards sustainability makes a big difference. The personal care industry generates significant waste, and we are committed to reducing our impact on the environment while supporting the well-being of our customers and communities.</p>
        <p>Sustainability isn't a side project for us — it's woven into how we design products, choose materials and run our supply chain.</p>
      </div>
      <div>
        <ul class="ol-feature-list">
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-leaf"></i></div>
            <div class="ol-feature-text">
              <strong>Eco-Friendly Materials</strong>
              <span>Biodegradable and responsibly sourced materials wherever possible, designed to minimise environmental impact while maximising comfort and protection.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-box-open"></i></div>
            <div class="ol-feature-text">
              <strong>Responsible Packaging</strong>
              <span>Packaging made from recycled cardboard and paper fillers to help reduce waste.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-recycle"></i></div>
            <div class="ol-feature-text">
              <strong>Sustainable Practices</strong>
              <span>From sourcing to shipping, we prioritise sustainability at every step and continuously review our processes.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-handshake"></i></div>
            <div class="ol-feature-text">
              <strong>Partners Who Share Our Values</strong>
              <span>We work only with partners who are committed to ethical, eco-friendly practices.</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-surface2);">
  <div class="ol-wrap">
    <div class="ol-section-heading">
      <span class="ol-chip">Our Green Initiatives</span>
      <h2 class="ol-h2">What We're Working Towards</h2>
      <div class="ol-divider"></div>
    </div>
    <div class="ol-grid">
      <div class="ol-value-card">
        <div class="ol-value-icon"><i class="fa-solid fa-industry"></i></div>
        <h3>Ethical Suppliers</h3>
        <p>We encourage our suppliers to adopt sustainable and ethical practices across the board.</p>
      </div>
      <div class="ol-value-card">
        <div class="ol-value-icon"><i class="fa-solid fa-hands-holding-heart"></i></div>
        <h3>Community Support</h3>
        <p>We support local communities and women-led initiatives for environmental awareness.</p>
      </div>
      <div class="ol-value-card">
        <div class="ol-value-icon"><i class="fa-solid fa-shoe-prints"></i></div>
        <h3>Lower Carbon Footprint</h3>
        <p>We regularly review and improve our supply chain to reduce our carbon footprint.</p>
      </div>
    </div>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-two-col">
      <div class="ol-two-col-content">
        <span class="ol-chip">Certifications &amp; Partnerships</span>
        <h2>Held to a Higher Standard</h2>
        <p>We are proud to collaborate with organizations and partners who share our vision for a greener future. Our products and processes are regularly reviewed to meet high standards of safety, quality, and sustainability.</p>
        <p>We are working towards obtaining more eco-certifications and welcome partnerships that help us do better for the planet. As part of The Kutumb Group, we are ISO 9001:2015 GMP certified — a mark of our ongoing commitment to quality and responsibility.</p>
      </div>
      <div class="ol-two-col-content">
        <span class="ol-chip">How You Can Help</span>
        <h2>Care That Continues at Home</h2>
        <ul class="ol-feature-list" style="margin-top:8px;">
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-trash-can"></i></div>
            <div class="ol-feature-text">
              <strong>Dispose Responsibly</strong>
              <span>Never flush used products — always use a sanitary bin.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-recycle"></i></div>
            <div class="ol-feature-text">
              <strong>Recycle Packaging</strong>
              <span>Recycle our cardboard and paper packaging wherever possible.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-bullhorn"></i></div>
            <div class="ol-feature-text">
              <strong>Spread Awareness</strong>
              <span>Share sustainable period care with friends and family.</span>
            </div>
          </li>
          <li>
            <div class="ol-feature-icon"><i class="fa-solid fa-comment-dots"></i></div>
            <div class="ol-feature-text">
              <strong>Share Your Ideas</strong>
              <span>Send us your feedback to help us improve further.</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-surface2);">
  <div class="ol-wrap">
    <div class="ol-cta">
      <h2>Our Commitment to the Planet</h2>
      <p>We believe that period care should never come at the cost of the planet. Orange Lilies is dedicated to ongoing improvement, transparency, and innovation in sustainability — and we welcome your feedback and ideas.</p>
      <div class="ol-btn-group">
        <a href="https://wa.me/918368615088" class="ol-btn" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i> WhatsApp Us</a>
        <a href="mailto:info@orangelilies.com" class="ol-btn ol-btn-outline">Email info@orangelilies.com</a>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   CONTACT
═══════════════════════════════════════════════════════════════ */
function ol_page_contact() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="ol-hero">
  <div class="ol-wrap">
    <span class="ol-chip">Get In Touch</span>
    <h1 class="ol-h1">Contact <span class="ol-accent-text">Orange Lilies</span></h1>
    <p class="ol-hero-intro">Have questions, suggestions or a bulk enquiry? We're here to help. Reach us by email, WhatsApp, or send a message using the form below.</p>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-two-col">

      <div class="ol-contact-panel">
        <h3>Our Contact Details</h3>
        <div class="ol-contact-item">
          <div class="ol-contact-item-icon"><i class="fa-brands fa-whatsapp"></i></div>
          <div class="ol-contact-item-text">
            <strong>WhatsApp / Phone</strong>
            <a href="https://wa.me/918368615088" target="_blank" rel="noopener">+91 83686 15088</a>
          </div>
        </div>
        <div class="ol-contact-item">
          <div class="ol-contact-item-icon"><i class="fa-solid fa-envelope"></i></div>
          <div class="ol-contact-item-text">
            <strong>Email</strong>
            <a href="mailto:info@orangelilies.com">info@orangelilies.com</a>
          </div>
        </div>
        <div class="ol-contact-item">
          <div class="ol-contact-item-icon"><i class="fa-solid fa-location-dot"></i></div>
          <div class="ol-contact-item-text">
            <strong>Address</strong>
            <a href="https://maps.app.goo.gl/LFrAXBt4bpyXE8Xq5" target="_blank" rel="noopener">E 44, Okhla Phase 2, New Delhi 110020, India</a>
          </div>
        </div>
        <div class="ol-contact-item">
          <div class="ol-contact-item-icon"><i class="fa-solid fa-building"></i></div>
          <div class="ol-contact-item-text">
            <strong>Company</strong>
            <span>The Kutumb Group &mdash; ISO 9001:2015 GMP Certified</span>
          </div>
        </div>
        <div class="ol-contact-item">
          <div class="ol-contact-item-icon"><i class="fa-solid fa-clock"></i></div>
          <div class="ol-contact-item-text">
            <strong>Response Time</strong>
            <span>We aim to reply within 24 hours on working days.</span>
          </div>
        </div>
        <div class="ol-social-row">
          <a href="https://wa.me/918368615088" class="ol-social-link" target="_blank" rel="noopener">
            <i class="fab fa-whatsapp" aria-hidden="true"></i> WhatsApp
          </a>
          <a href="https://www.instagram.com/orangelilies_?igsh=dXQ1bjF6NDBjdDJp&utm_source=qr" class="ol-social-link" target="_blank" rel="noopener">
            <i class="fab fa-instagram" aria-hidden="true"></i> Instagram
          </a>
          <a href="https://www.facebook.com/share/192C6vjdCy/?mibextid=wwXIfr" class="ol-social-link" target="_blank" rel="noopener">
            <i class="fab fa-facebook-f" aria-hidden="true"></i> Facebook
          </a>
          <a href="https://x.com/orangelilies_?s=11" class="ol-social-link" target="_blank" rel="noopener">
            <i class="fab fa-x-twitter" aria-hidden="true"></i> X
          </a>
          <a href="https://youtube.com/@orangelilies?si=Q7BKZgD-iQL3EO9z" class="ol-social-link" target="_blank" rel="noopener">
            <i class="fab fa-youtube" aria-hidden="true"></i> YouTube
          </a>
          <a href="https://www.linkedin.com/in/kanikatomar11?utm_source=share_via&utm_content=profile&utm_medium=member_ios" class="ol-social-link" target="_blank" rel="noopener">
            <i class="fab fa-linkedin-in" aria-hidden="true"></i> LinkedIn
          </a>
          <a href="mailto:info@orangelilies.com" class="ol-social-link">
            <i class="far fa-envelope" aria-hidden="true"></i> Email
          </a>
        </div>
      </div>

      <div class="ol-form-panel">
        <h3>Send Us a Message</h3>
        [contact-form-7 id="d1513a7" title="Contact form 1"]
      </div>

    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   PRIVACY POLICY
═══════════════════════════════════════════════════════════════ */
function ol_page_privacy() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="ol-hero">
  <div class="ol-wrap">
    <span class="ol-chip ol-chip-violet">Legal</span>
    <h1 class="ol-h1">Privacy <span class="ol-violet-text">Policy</span></h1>
    <p class="ol-hero-intro">Your privacy matters to us. This policy explains how Orange Lilies collects, uses, and protects your personal information.</p>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-policy">

      <div class="ol-policy-meta">
        <span><strong>Business:</strong> Orange Lilies (The Kutumb Group)</span>
        <span><strong>Effective Date:</strong> 1 January 2026</span>
        <span><strong>Governing Law:</strong> India</span>
      </div>

      <div class="ol-policy-section">
        <h2>1. Who We Are</h2>
        <p>Orange Lilies (The Kutumb Group) is a women-led company based in India, dedicated to providing high-quality, innovative period care and personal hygiene products. Our registered office is at E 44, Okhla Phase 2, New Delhi 110020, India.</p>
      </div>

      <div class="ol-policy-section">
        <h2>2. Our Commitment</h2>
        <p>We are committed to protecting your privacy and handling your personal information responsibly and transparently. This policy applies to all personal data collected through our website, online store, and customer support channels.</p>
      </div>

      <div class="ol-policy-section">
        <h2>3. Information We Collect</h2>
        <ul>
          <li><strong>Contact details:</strong> Name, email address, phone number, shipping address.</li>
          <li><strong>Account details:</strong> Login credentials, order history, preferences.</li>
          <li><strong>Payment details:</strong> Transaction amount and payment method (we do not store your card details).</li>
          <li><strong>Technical data:</strong> IP address, device information, browser type, cookies, and usage data.</li>
          <li><strong>Communications:</strong> Messages, emails, and support requests you send to us.</li>
        </ul>
      </div>

      <div class="ol-policy-section">
        <h2>4. How We Use Your Information</h2>
        <ul>
          <li>To process and deliver your orders.</li>
          <li>To communicate with you about your orders, products, and offers.</li>
          <li>To improve our products, services, and website experience.</li>
          <li>To personalize your experience and recommend relevant products.</li>
          <li>To comply with legal obligations and prevent fraud.</li>
          <li>For marketing (with your consent) and customer support.</li>
        </ul>
      </div>

      <div class="ol-policy-section">
        <h2>5. Cookies &amp; Tracking</h2>
        <p>We use cookies and similar technologies to enhance your browsing experience, analyze site traffic, and personalize content. You can manage your cookie preferences in your browser settings. Disabling certain cookies may affect site functionality.</p>
      </div>

      <div class="ol-policy-section">
        <h2>6. How We Share Your Data</h2>
        <ul>
          <li>With trusted third-party service providers (e.g., payment processors, delivery partners) to fulfill your orders and improve our services.</li>
          <li>With government authorities or law enforcement if required by law.</li>
          <li>With your consent, for marketing or promotional purposes.</li>
        </ul>
        <p>We do not sell your personal information to third parties.</p>
      </div>

      <div class="ol-policy-section">
        <h2>7. Data Security</h2>
        <p>We use industry-standard security measures to protect your personal information from unauthorized access, alteration, or disclosure. Only authorized personnel and trusted partners have access to your data for legitimate business purposes.</p>
      </div>

      <div class="ol-policy-section">
        <h2>8. Data Retention</h2>
        <p>We retain your personal information only as long as necessary to fulfill the purposes outlined in this policy or as required by law. When no longer needed, your data is securely deleted or anonymized.</p>
      </div>

      <div class="ol-policy-section">
        <h2>9. Your Rights</h2>
        <ul>
          <li>You can access, update, or correct your personal information by contacting us.</li>
          <li>You can request deletion of your data, subject to legal requirements.</li>
          <li>You can opt out of marketing communications at any time.</li>
        </ul>
      </div>

      <div class="ol-policy-section">
        <h2>10. Children's Privacy</h2>
        <p>Our website and products are intended for adults. We do not knowingly collect personal information from children under 18. If you believe a child has provided us with personal data, please contact us for removal.</p>
      </div>

      <div class="ol-policy-section">
        <h2>11. Links to Other Websites</h2>
        <p>Our website may contain links to third-party sites. We are not responsible for their privacy practices. Please review their privacy policies before providing any personal information.</p>
      </div>

      <div class="ol-policy-section">
        <h2>12. Contact Us</h2>
        <p>If you have any questions, concerns, or requests regarding your privacy or this policy, please contact us:</p>
        <div class="ol-policy-highlight">
          <p><strong>Orange Lilies (The Kutumb Group)</strong><br>
          Email: info@orangelilies.com<br>
          WhatsApp: +91 83686 15088<br>
          Address: E 44, Okhla Phase 2, New Delhi 110020, India</p>
        </div>
      </div>

      <div class="ol-policy-section">
        <h2>13. Policy Updates</h2>
        <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page. Please review this policy regularly for updates.</p>
      </div>

    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   TERMS OF SERVICE
═══════════════════════════════════════════════════════════════ */
function ol_page_tos() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="ol-hero">
  <div class="ol-wrap">
    <span class="ol-chip ol-chip-violet">Legal</span>
    <h1 class="ol-h1">Terms of <span class="ol-violet-text">Service</span></h1>
    <p class="ol-hero-intro">The terms that apply when you use the Orange Lilies website and services.</p>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-policy">

      <div class="ol-policy-meta">
        <span><strong>Business:</strong> Orange Lilies (The Kutumb Group)</span>
        <span><strong>Effective Date:</strong> 1 January 2026</span>
        <span><strong>Governing Law:</strong> India</span>
      </div>

      <div class="ol-policy-section">
        <h2>1. Agreement to Terms</h2>
        <p>Welcome to www.orangelilies.com (the "Site"), owned and operated by The Kutumb Group ("Orange Lilies", "we", "us", "our"). By accessing or using our Site and services, you agree to these Terms of Service, our Privacy Policy and our Shipping &amp; Return policies. If you do not agree, please do not use our Site.</p>
      </div>

      <div class="ol-policy-section">
        <h2>2. Use of the Website</h2>
        <p>You agree to use our Site only for lawful purposes and in a way that does not infringe the rights of, restrict or prevent anyone else from using it. You must not:</p>
        <ul>
          <li>Use the Site in any unlawful or fraudulent manner;</li>
          <li>Transmit unsolicited or unauthorised advertising or promotional material;</li>
          <li>Attempt to gain unauthorised access to our Site, servers or databases;</li>
          <li>Reproduce, duplicate, copy or resell any part of our Site without permission;</li>
          <li>Upload or transmit any malicious code, viruses or harmful content;</li>
          <li>Collect or harvest the personal data of other users without consent.</li>
        </ul>
      </div>

      <div class="ol-policy-section">
        <h2>3. Your Account</h2>
        <p>Our Site is intended for adults. You are responsible for maintaining the confidentiality of your account and password and for all activities that occur under your account. If you believe your account security has been compromised, contact us immediately at info@orangelilies.com.</p>
      </div>

      <div class="ol-policy-section">
        <h2>4. Product &amp; Service Information</h2>
        <p>We strive to provide accurate product descriptions and images, but do not guarantee that all information is error-free. Product colours and details may vary. We reserve the right to correct errors and update information at any time.</p>
      </div>

      <div class="ol-policy-section">
        <h2>5. Product Use</h2>
        <p>Our products are for personal use only and should not be resold. Please read all product instructions and consult a specialist if you have concerns. Orange Lilies is not responsible for any adverse effects arising from misuse of the products.</p>
      </div>

      <div class="ol-policy-section">
        <h2>6. Pricing &amp; Payment</h2>
        <p>Prices and availability are subject to change without notice. We accept various payment methods, including credit/debit cards, net banking, UPI, wallets, and Cash on Delivery (for eligible orders within India). Orders may be cancelled or refunded as per our policies.</p>
      </div>

      <div class="ol-policy-section">
        <h2>7. Shipping, Returns &amp; Cancellations</h2>
        <p>Please refer to our Shipping &amp; Delivery Policy, Refund &amp; Return Policy and Cancellation Policy for full details on delivery, returns and cancellations.</p>
      </div>

      <div class="ol-policy-section">
        <h2>8. User Content</h2>
        <p>You are responsible for any content you upload or share on our Site. Do not post unlawful, offensive or infringing material. We reserve the right to remove content and terminate accounts that violate these terms.</p>
      </div>

      <div class="ol-policy-section">
        <h2>9. Intellectual Property</h2>
        <p>All content, trademarks, and materials on this Site are the property of Orange Lilies or its licensors. You may not use, reproduce or distribute any content without our written permission.</p>
      </div>

      <div class="ol-policy-section">
        <h2>10. Limitation of Liability</h2>
        <p>Our Site and products are provided "as is" without warranties of any kind. To the fullest extent permitted by law, Orange Lilies is not liable for any indirect, incidental, or consequential damages arising from your use of the Site or products. Nothing in these terms limits liability that cannot lawfully be limited or excluded.</p>
      </div>

      <div class="ol-policy-section">
        <h2>11. Links to Third-Party Sites</h2>
        <p>Our Site may contain links to third-party websites. We are not responsible for their content or privacy practices. Please review their terms and policies before using those sites.</p>
      </div>

      <div class="ol-policy-section">
        <h2>12. Changes to Terms</h2>
        <p>We may update these Terms of Service at any time. Changes will be posted on this page. Continued use of the Site constitutes acceptance of the updated terms.</p>
      </div>

      <div class="ol-policy-section">
        <h2>13. Governing Law</h2>
        <p>These Terms of Service are governed by the laws of India. Any disputes will be subject to the exclusive jurisdiction of the courts in Delhi, India.</p>
      </div>

      <div class="ol-policy-section">
        <h2>14. Contact Us</h2>
        <p>If you have any questions about these Terms of Service, please contact us:</p>
        <div class="ol-policy-highlight">
          <p><strong>Orange Lilies (The Kutumb Group)</strong><br>
          Email: info@orangelilies.com<br>
          WhatsApp: +91 83686 15088<br>
          Address: E 44, Okhla Phase 2, New Delhi 110020, India</p>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   TERMS & CONDITIONS
═══════════════════════════════════════════════════════════════ */
function ol_page_tandc() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="ol-hero">
  <div class="ol-wrap">
    <span class="ol-chip ol-chip-violet">Legal</span>
    <h1 class="ol-h1">Terms &amp; <span class="ol-violet-text">Conditions</span></h1>
    <p class="ol-hero-intro">Please read these Terms &amp; Conditions carefully before using Orange Lilies' website or services.</p>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-policy">

      <div class="ol-policy-meta">
        <span><strong>Business:</strong> Orange Lilies (The Kutumb Group)</span>
        <span><strong>Effective Date:</strong> 1 January 2026</span>
        <span><strong>Governing Law:</strong> India</span>
      </div>

      <div class="ol-policy-section">
        <h2>1. Use of Platform</h2>
        <p>Welcome to www.orangelilies.com (the "Site"). The website is owned and operated by The Kutumb Group ("Orange Lilies"), with its registered office at E 44, Okhla Phase 2, New Delhi 110020, India. By accessing or using our Site, you agree to be bound by these Terms &amp; Conditions, our Privacy Policy, and our Shipping &amp; Return Policy. If you do not agree, please do not use our Site.</p>
      </div>

      <div class="ol-policy-section">
        <h2>2. Privacy Practices</h2>
        <p>Your privacy is important to us. Please review our Privacy Policy to understand how we collect, use, and protect your information.</p>
      </div>

      <div class="ol-policy-section">
        <h2>3. Your Account</h2>
        <p>Our Site is intended for adults. You are responsible for maintaining the confidentiality of your account and password. If you believe your account security has been compromised, contact us immediately at info@orangelilies.com.</p>
      </div>

      <div class="ol-policy-section">
        <h2>4. Product &amp; Service Information</h2>
        <p>We strive to provide accurate product descriptions and images, but do not guarantee that all information is error-free. Product colors and details may vary. We reserve the right to correct errors and update information at any time.</p>
      </div>

      <div class="ol-policy-section">
        <h2>5. Product Use</h2>
        <p>Our products are for personal use only and should not be resold. Please read all product instructions and consult a specialist if you have concerns. Orange Lilies is not responsible for any adverse effects from product use.</p>
      </div>

      <div class="ol-policy-section">
        <h2>6. Pricing &amp; Payment</h2>
        <p>Prices and availability are subject to change without notice. We accept various payment methods, including credit/debit cards, net banking, UPI, wallets, and COD (for eligible orders within India). Orders may be cancelled or refunded as per our policies.</p>
      </div>

      <div class="ol-policy-section">
        <h2>7. Shipping, Returns &amp; Cancellations</h2>
        <p>Please refer to our Shipping &amp; Return Policy for details on delivery, returns, and cancellations.</p>
      </div>

      <div class="ol-policy-section">
        <h2>8. User Content</h2>
        <p>You are responsible for any content you upload or share on our Site. Do not post unlawful, offensive, or infringing material. We reserve the right to remove content and terminate accounts that violate these terms.</p>
      </div>

      <div class="ol-policy-section">
        <h2>9. Intellectual Property</h2>
        <p>All content, trademarks, and materials on this Site are the property of Orange Lilies or its licensors. You may not use, reproduce, or distribute any content without our written permission.</p>
      </div>

      <div class="ol-policy-section">
        <h2>10. Limitation of Liability</h2>
        <p>Our Site and products are provided "as is" without warranties of any kind. Orange Lilies is not liable for any indirect, incidental, or consequential damages arising from your use of the Site or products.</p>
      </div>

      <div class="ol-policy-section">
        <h2>11. Links to Third-Party Sites</h2>
        <p>Our Site may contain links to third-party websites. We are not responsible for their content or privacy practices. Please review their terms and policies before using those sites.</p>
      </div>

      <div class="ol-policy-section">
        <h2>12. Changes to Terms</h2>
        <p>We may update these Terms &amp; Conditions at any time. Changes will be posted on this page. Continued use of the Site constitutes acceptance of the updated terms.</p>
      </div>

      <div class="ol-policy-section">
        <h2>13. Governing Law</h2>
        <p>These Terms &amp; Conditions are governed by the laws of India. Any disputes will be subject to the exclusive jurisdiction of the courts in Delhi, India.</p>
      </div>

      <div class="ol-policy-section">
        <h2>14. Contact Us</h2>
        <p>If you have any questions about these Terms &amp; Conditions, please contact us:</p>
        <div class="ol-policy-highlight">
          <p><strong>Orange Lilies (The Kutumb Group)</strong><br>
          Email: info@orangelilies.com<br>
          WhatsApp: +91 83686 15088<br>
          Address: E 44, Okhla Phase 2, New Delhi 110020, India</p>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   REFUND & RETURN POLICY
═══════════════════════════════════════════════════════════════ */
function ol_page_refund() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="ol-hero">
  <div class="ol-wrap">
    <span class="ol-chip ol-chip-violet">Legal</span>
    <h1 class="ol-h1">Refund &amp; Return <span class="ol-violet-text">Policy</span></h1>
    <p class="ol-hero-intro">Clear information about returns, refunds and what to do if there is an issue with your Orange Lilies order.</p>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-policy">

      <div class="ol-policy-meta">
        <span><strong>Business:</strong> Orange Lilies (The Kutumb Group)</span>
        <span><strong>Return Window:</strong> 7 Days from Delivery</span>
        <span><strong>Governing Law:</strong> India</span>
      </div>

      <div class="ol-policy-highlight">
        <p>We want you to be happy with your Orange Lilies purchase. Because our products are intimate hygiene items, special hygiene rules apply to returns. This policy explains when a return may be accepted, how to request one, and how refunds are handled.</p>
      </div>

      <div class="ol-policy-section">
        <h2>1. Hygiene Notice</h2>
        <p>Orange Lilies products are personal intimate-hygiene products. For health and safety reasons, items that have been opened, used, or had their hygiene seal broken <strong>cannot be returned or exchanged</strong>, unless they are faulty, damaged on arrival, or incorrectly supplied. This is in line with standard practice for sanitary and personal-care goods.</p>
      </div>

      <div class="ol-policy-section">
        <h2>2. Return Eligibility</h2>
        <p>Eligible returns must be requested within <strong>7 days of the delivery date</strong>. To qualify, the item must meet all of the following conditions:</p>
        <ul>
          <li>The return is requested within 7 calendar days of delivery;</li>
          <li>The product is unused, unopened and with its hygiene seal fully intact;</li>
          <li>The item is in its original condition and packaging with all labels attached;</li>
          <li>You can provide proof of purchase (order number or invoice).</li>
        </ul>
      </div>

      <div class="ol-policy-section">
        <h2>3. Non-Returnable Items</h2>
        <p>The following cannot be returned or refunded unless they are faulty, damaged on arrival or incorrectly supplied:</p>
        <ul>
          <li>Any product that has been opened, used or had its hygiene seal broken;</li>
          <li>Items purchased on sale or with a discount/promotional code;</li>
          <li>Items returned without original packaging or proof of purchase;</li>
          <li>Free gifts and promotional items.</li>
        </ul>
      </div>

      <div class="ol-policy-section">
        <h2>4. Damaged, Faulty or Incorrect Items</h2>
        <p>If you receive a damaged, faulty or incorrect item, please contact us within <strong>48 hours of delivery</strong> with:</p>
        <ul>
          <li>Your order confirmation details;</li>
          <li>Clear photographs of the product and outer packaging;</li>
          <li>A brief description of the issue.</li>
        </ul>
        <p>Once verified, we will arrange a suitable remedy — a replacement or a full refund — at no additional cost to you, including reasonable return shipping where applicable.</p>
      </div>

      <div class="ol-policy-section">
        <h2>5. How to Request a Return</h2>
        <ul>
          <li>Contact us within 7 days of delivery by email (info@orangelilies.com) or WhatsApp (+91 83686 15088);</li>
          <li>Include your order details, the item(s) concerned, and the reason for the return;</li>
          <li>We will review the request and, if approved, share return instructions and the return address;</li>
          <li>Securely pack the item and send it using a trackable courier service.</li>
        </ul>
        <p>We recommend using a trackable service, as we cannot accept responsibility for items lost in transit before they reach us.</p>
      </div>

      <div class="ol-policy-section">
        <h2>6. Return Shipping Costs</h2>
        <p>Where a return is approved for an eligible unopened item due to a change of mind, return shipping costs are the customer's responsibility. Where the item is damaged, faulty or incorrect, Orange Lilies will cover reasonable return shipping costs.</p>
      </div>

      <div class="ol-policy-section">
        <h2>7. Refund Process</h2>
        <p>Once we receive and inspect your returned item, we will notify you whether the refund is approved. Approved refunds are processed within <strong>7 working days</strong> to the original payment method.</p>
        <p>For Cash on Delivery (COD) orders, refunds are issued via bank transfer or UPI to details you provide. The time for funds to appear may vary depending on your bank or payment provider.</p>
      </div>

      <div class="ol-policy-section">
        <h2>8. Partial Refunds</h2>
        <p>A partial refund may be issued where only part of an order is eligible for return, or where an eligible item is returned in a condition that reduces its value.</p>
      </div>

      <div class="ol-policy-section">
        <h2>9. Exchanges</h2>
        <p>We do not currently offer direct exchanges. If you need a different option, please return the eligible original item and place a new order.</p>
      </div>

      <div class="ol-policy-section">
        <h2>10. Contact Us</h2>
        <p>If you have any questions about our Refund &amp; Return Policy, please get in touch:</p>
        <div class="ol-policy-highlight">
          <p><strong>Orange Lilies (The Kutumb Group)</strong><br>
          Email: info@orangelilies.com<br>
          WhatsApp: +91 83686 15088<br>
          Address: E 44, Okhla Phase 2, New Delhi 110020, India</p>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   CANCELLATION POLICY
═══════════════════════════════════════════════════════════════ */
function ol_page_cancel() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="ol-hero">
  <div class="ol-wrap">
    <span class="ol-chip ol-chip-violet">Legal</span>
    <h1 class="ol-h1">Cancellation <span class="ol-violet-text">Policy</span></h1>
    <p class="ol-hero-intro">How to request an order cancellation and what happens if your order has already been dispatched.</p>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-policy">

      <div class="ol-policy-meta">
        <span><strong>Business:</strong> Orange Lilies (The Kutumb Group)</span>
        <span><strong>Cancellation Window:</strong> Within 12 Hours of Ordering</span>
        <span><strong>Governing Law:</strong> India</span>
      </div>

      <div class="ol-policy-section">
        <h2>1. Cancellation Window</h2>
        <p>You may request to cancel an order within <strong>12 hours</strong> of placing it, provided it has not already been processed or dispatched. Please contact us as soon as possible by email or WhatsApp.</p>
        <div class="ol-policy-highlight">
          <p><strong>Important:</strong> Once your order has been processed or dispatched, we may no longer be able to cancel it. As our products are intimate hygiene items, returns after delivery are only accepted for unopened, sealed products under our Refund &amp; Return Policy.</p>
        </div>
      </div>

      <div class="ol-policy-section">
        <h2>2. How to Request a Cancellation</h2>
        <ul>
          <li><strong>Email:</strong> info@orangelilies.com — use the subject line "Order Cancellation" and include your order details;</li>
          <li><strong>WhatsApp:</strong> +91 83686 15088 — send your order reference and cancellation request.</li>
        </ul>
        <p>We will confirm whether cancellation is possible by reply. Please do not assume your order is cancelled until you receive written confirmation from us.</p>
      </div>

      <div class="ol-policy-section">
        <h2>3. Cancellation After Dispatch</h2>
        <p>If your order has already been dispatched, we are usually unable to cancel or recall it. In this case:</p>
        <ul>
          <li>Please accept the delivery as normal;</li>
          <li>If the product is unopened with its hygiene seal intact, you may request a return under our Refund &amp; Return Policy within 7 days of delivery;</li>
          <li>Opened or used hygiene products cannot be returned for health and safety reasons.</li>
        </ul>
      </div>

      <div class="ol-policy-section">
        <h2>4. Refund for Cancelled Orders</h2>
        <p>If a cancellation is approved and payment has already been made, a full refund is processed within <strong>7 working days</strong> to the original payment method. For COD orders, no charge applies if cancelled before dispatch. Processing times may vary depending on your bank or payment provider.</p>
      </div>

      <div class="ol-policy-section">
        <h2>5. Our Right to Cancel</h2>
        <p>Orange Lilies may cancel an order in the following circumstances:</p>
        <ul>
          <li>The item is out of stock or no longer available;</li>
          <li>A pricing or product description error has occurred;</li>
          <li>There are concerns about fraudulent activity or payment irregularities;</li>
          <li>We are unable to deliver to the address provided.</li>
        </ul>
        <p>If this happens, we will notify you promptly and provide a full refund if payment has already been received.</p>
      </div>

      <div class="ol-policy-section">
        <h2>6. Contact Us</h2>
        <p>For cancellation requests or questions about this policy, please contact us as soon as possible:</p>
        <div class="ol-policy-highlight">
          <p><strong>Orange Lilies (The Kutumb Group)</strong><br>
          Email: info@orangelilies.com<br>
          WhatsApp: +91 83686 15088<br>
          Address: E 44, Okhla Phase 2, New Delhi 110020, India</p>
        </div>
        <p>For the fastest response, we recommend contacting us via WhatsApp.</p>
      </div>

    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   SHIPPING & DELIVERY POLICY
═══════════════════════════════════════════════════════════════ */
function ol_page_shipping() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="ol-hero">
  <div class="ol-wrap">
    <span class="ol-chip ol-chip-violet">Legal</span>
    <h1 class="ol-h1">Shipping &amp; Delivery <span class="ol-violet-text">Policy</span></h1>
    <p class="ol-hero-intro">Delivery information for Orange Lilies orders across India.</p>
  </div>
</div>

<div class="ol-section" style="background:var(--ol-bg);">
  <div class="ol-wrap">
    <div class="ol-policy">

      <div class="ol-policy-meta">
        <span><strong>Business:</strong> Orange Lilies (The Kutumb Group)</span>
        <span><strong>Processing Time:</strong> 1-3 Working Days</span>
        <span><strong>Standard Delivery:</strong> 3-7 Working Days</span>
      </div>

      <div class="ol-policy-section">
        <h2>1. Order Processing</h2>
        <p>Orders are usually processed within <strong>1-3 working days</strong> of confirmed payment (or order confirmation for COD). Working days are Monday to Saturday, excluding public holidays. Orders placed on Sundays or public holidays are processed on the next working day.</p>
        <p>Once your order is packed and handed to our delivery partner, we will share a dispatch update by email or WhatsApp, including tracking details where available.</p>
      </div>

      <div class="ol-policy-section">
        <h2>2. Delivery Across India</h2>
        <p>We deliver to addresses across India. Standard delivery usually takes <strong>3-7 working days</strong> after dispatch. Please note:</p>
        <ul>
          <li>Delivery timeframes are estimates and may vary by location and courier workload;</li>
          <li>Remote, rural or non-serviceable pin codes may experience longer delivery times;</li>
          <li>Metro cities are typically delivered faster than outlying areas.</li>
        </ul>
      </div>

      <div class="ol-policy-section">
        <h2>3. Delivery Charges</h2>
        <p>Delivery charges, if applicable, are clearly shown at checkout before payment is collected. We aim to keep delivery charges fair and transparent. Free shipping may be offered on eligible orders or promotions.</p>
      </div>

      <div class="ol-policy-section">
        <h2>4. Cash on Delivery (COD)</h2>
        <p>COD is available on eligible orders within India and selected pin codes. A nominal COD handling fee may apply and will be shown at checkout. Please keep the exact amount ready at the time of delivery.</p>
      </div>

      <div class="ol-policy-section">
        <h2>5. Tracking Your Order</h2>
        <p>Where tracking is available, we share the tracking details once your order is dispatched. You can use the tracking number on the courier's website to check the status. If you have not received a dispatch update within 5 working days of ordering, please contact us.</p>
      </div>

      <div class="ol-policy-section">
        <h2>6. Failed Deliveries &amp; Address Accuracy</h2>
        <p>It is your responsibility to provide a complete and accurate delivery address and contact number. Orange Lilies is not responsible for delay or non-delivery caused by incorrect or incomplete address information.</p>
        <p>If a delivery attempt fails or a parcel is returned to us due to an incorrect address, repeated failed attempts or refusal, we will contact you to arrange re-delivery. Additional delivery charges may apply.</p>
      </div>

      <div class="ol-policy-section">
        <h2>7. Courier Delays</h2>
        <p>We aim to dispatch within the stated timeframe, but Orange Lilies is not responsible for delays caused by third-party delivery services, adverse weather, regional disruptions, public holidays or other circumstances beyond our reasonable control. If your order has not arrived within 10 working days of dispatch, please contact us and we will check with the courier on your behalf.</p>
      </div>

      <div class="ol-policy-section">
        <h2>8. Damaged Parcels</h2>
        <p>If your parcel arrives visibly damaged, please take clear photographs of the packaging and contents and contact us within <strong>48 hours of delivery</strong>. We will review the issue and arrange a suitable replacement, refund or courier claim where appropriate, in line with our Refund &amp; Return Policy.</p>
      </div>

      <div class="ol-policy-section">
        <h2>9. International Delivery</h2>
        <p>At this time, Orange Lilies delivers within India only. We do not currently offer international shipping. Follow us on Instagram (@orangelilies.in) for updates.</p>
      </div>

      <div class="ol-policy-section">
        <h2>10. Contact Us</h2>
        <p>For any delivery questions, please contact us:</p>
        <div class="ol-policy-highlight">
          <p><strong>Orange Lilies (The Kutumb Group)</strong><br>
          Email: info@orangelilies.com<br>
          WhatsApp: +91 83686 15088<br>
          Address: E 44, Okhla Phase 2, New Delhi 110020, India</p>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}
