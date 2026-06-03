<?php
/**
 * Page definitions for NextGen Fusion.
 * Each page returns ['title' => string, 'content' => string].
 * Dynamic values use %%NGF_*%% placeholders replaced at runtime.
 */

defined( 'ABSPATH' ) || exit;

function ngf_get_page_definitions() {
	return [
		'ngf-home'             => ngf_page_home(),
		'about-us'             => ngf_page_about(),
		'services'             => ngf_page_services(),
		'contact'              => ngf_page_contact(),
		'privacy-policy'       => ngf_page_privacy(),
		'terms-of-service'     => ngf_page_terms(),
		'terms-and-conditions' => ngf_page_terms_conditions(),
		'refund-policy'        => ngf_page_refund(),
		'cancellation-policy'  => ngf_page_cancellation(),
		'shipping-policy'      => ngf_page_shipping(),
	];
}

/* ═══════════════════════════════════════════════════════════════
   HOME
═══════════════════════════════════════════════════════════════ */
function ngf_page_home() {
	$content = <<<'EOC'
<!-- wp:html -->
<div class="ngf-wrap">

  <section class="ngf-hero">
    <div class="ngf-hero-inner">
      <img src="%%NGF_LOGO%%" alt="NextGen Fusion" class="ngf-hero-logo">
      <span class="ngf-eyebrow">Premium Digital Products</span>
      <h1 class="ngf-hero-title">Craft Your <em>Digital Future</em></h1>
      <p class="ngf-hero-intro">NextGen Fusion delivers high-performance WordPress &amp; Shopify themes and plugins — engineered for speed, designed for impact, and built to grow your business.</p>
      <div class="ngf-hero-cta">
        <a href="%%NGF_URL_SERVICES%%" class="ngf-btn ngf-btn-primary">Explore Products</a>
        <a href="%%NGF_URL_CONTACT%%" class="ngf-btn ngf-btn-outline">Get In Touch</a>
      </div>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <span class="ngf-eyebrow">What We Build</span>
      <h2 class="ngf-section-title">Everything You Need to <span>Dominate Online</span></h2>
      <div class="ngf-grid ngf-grid-3">
        <div class="ngf-card">
          <div class="ngf-card-num">01</div>
          <h3 class="ngf-card-title">WordPress Themes</h3>
          <p class="ngf-card-body">Pixel-perfect, SEO-ready themes that load fast and convert better. Built on clean code with full customization freedom — no bloat, no builder lock-in.</p>
        </div>
        <div class="ngf-card ngf-card-featured">
          <div class="ngf-card-num">02</div>
          <h3 class="ngf-card-title">Shopify Themes</h3>
          <p class="ngf-card-body">Conversion-focused storefronts with polished UX, mobile-first design, and deep Shopify 2.0 section support. Turn browsers into buyers.</p>
        </div>
        <div class="ngf-card">
          <div class="ngf-card-num">03</div>
          <h3 class="ngf-card-title">Plugins &amp; Apps</h3>
          <p class="ngf-card-body">Custom WordPress plugins and Shopify apps crafted to solve real business problems — lean, secure, and perfectly integrated with your stack.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="ngf-stats-bar">
    <div class="ngf-container">
      <div class="ngf-stats-grid">
        <div class="ngf-stat">
          <span class="ngf-stat-num">100+</span>
          <span class="ngf-stat-label">Products Shipped</span>
        </div>
        <div class="ngf-stat">
          <span class="ngf-stat-num">500+</span>
          <span class="ngf-stat-label">Happy Clients</span>
        </div>
        <div class="ngf-stat">
          <span class="ngf-stat-num">2</span>
          <span class="ngf-stat-label">Platforms Supported</span>
        </div>
        <div class="ngf-stat">
          <span class="ngf-stat-num">24/7</span>
          <span class="ngf-stat-label">Support Available</span>
        </div>
      </div>
    </div>
  </section>

  <section class="ngf-section ngf-section-dark">
    <div class="ngf-container">
      <span class="ngf-eyebrow">Why NextGen Fusion</span>
      <h2 class="ngf-section-title">Built Different. <span>By Design.</span></h2>
      <div class="ngf-grid ngf-grid-2">
        <div class="ngf-feature-item">
          <span class="ngf-feature-icon">&#9889;</span>
          <div>
            <h4>Performance First</h4>
            <p>Every product is optimized for Core Web Vitals. Faster sites rank higher and convert better — we build with this reality in mind from day one.</p>
          </div>
        </div>
        <div class="ngf-feature-item">
          <span class="ngf-feature-icon">&#9998;</span>
          <div>
            <h4>Design That Converts</h4>
            <p>Beautiful is not enough. Our designs are grounded in conversion psychology — strategic layouts, persuasive UX flows, and friction-free checkout paths.</p>
          </div>
        </div>
        <div class="ngf-feature-item">
          <span class="ngf-feature-icon">&#128296;</span>
          <div>
            <h4>Code You Can Trust</h4>
            <p>Clean, secure, well-documented code following WordPress and Shopify best practices. No plugin bloat, no security nightmares, no tech debt.</p>
          </div>
        </div>
        <div class="ngf-feature-item">
          <span class="ngf-feature-icon">&#128737;</span>
          <div>
            <h4>Dedicated Support</h4>
            <p>We do not disappear after delivery. Our team is reachable at <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a> with a response within 24 business hours.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ngf-contact-panel">
    <div class="ngf-container">
      <h2>Ready to Build Something Great?</h2>
      <p>Tell us about your project — whether it is a new theme, a custom plugin, or a full digital overhaul, we are ready.</p>
      <a href="%%NGF_URL_CONTACT%%" class="ngf-btn ngf-btn-primary">Start the Conversation</a>
    </div>
  </section>

  <footer class="ngf-site-footer">
    <div class="ngf-container">
      <div class="ngf-footer-grid">
        <div class="ngf-footer-brand">
          <img src="%%NGF_LOGO%%" alt="NextGen Fusion" class="ngf-footer-logo">
          <p>Premium WordPress &amp; Shopify themes and plugins for businesses that refuse to blend in.</p>
          <a href="mailto:contact@nextgenfusion.in" class="ngf-footer-email">contact@nextgenfusion.in</a>
        </div>
        <div class="ngf-footer-links">
          <h5>Company</h5>
          <ul>
            <li><a href="%%NGF_URL_HOME%%">Home</a></li>
            <li><a href="%%NGF_URL_ABOUT%%">About Us</a></li>
            <li><a href="%%NGF_URL_SERVICES%%">Services</a></li>
            <li><a href="%%NGF_URL_CONTACT%%">Contact</a></li>
          </ul>
        </div>
        <div class="ngf-footer-links">
          <h5>Policies</h5>
          <ul>
            <li><a href="%%NGF_URL_PRIVACY%%">Privacy Policy</a></li>
            <li><a href="%%NGF_URL_TERMS%%">Terms of Service</a></li>
            <li><a href="%%NGF_URL_TERMS_C%%">Terms &amp; Conditions</a></li>
            <li><a href="%%NGF_URL_REFUND%%">Refund &amp; Return</a></li>
            <li><a href="%%NGF_URL_CANCEL%%">Cancellation Policy</a></li>
            <li><a href="%%NGF_URL_SHIPPING%%">Shipping Policy</a></li>
          </ul>
        </div>
      </div>
      <div class="ngf-footer-bottom">
        <p>&copy; 2025 NextGen Fusion. All rights reserved.</p>
      </div>
    </div>
  </footer>

</div>
<!-- /wp:html -->
EOC;
	return [ 'title' => 'Home', 'content' => $content ];
}

/* ═══════════════════════════════════════════════════════════════
   ABOUT US
═══════════════════════════════════════════════════════════════ */
function ngf_page_about() {
	$content = <<<'EOC'
<!-- wp:html -->
<div class="ngf-wrap">

  <section class="ngf-hero ngf-hero-sm">
    <div class="ngf-hero-inner">
      <span class="ngf-eyebrow">Our Story</span>
      <h1 class="ngf-hero-title">About <em>NextGen Fusion</em></h1>
      <p class="ngf-hero-intro">We are a passionate team of designers and developers building premium digital products for WordPress and Shopify — helping businesses of every size make their mark online.</p>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <div class="ngf-two-col">
        <div class="ngf-col">
          <span class="ngf-eyebrow">Who We Are</span>
          <h2 class="ngf-section-title">Builders of the <span>Modern Web</span></h2>
          <p>NextGen Fusion was founded with a single mission: make professional-grade web design accessible to every entrepreneur, startup, and growing business. We believe your website and online store should be a competitive advantage — not a bottleneck.</p>
          <p>Our team combines deep platform expertise across WordPress and Shopify with a relentless focus on design quality, page speed, and conversion optimization. Every product we ship is thoroughly tested, fully documented, and backed by responsive support.</p>
          <p>Whether you are launching a brand-new store, refreshing an existing site, or extending your platform with custom functionality — NextGen Fusion has a solution built for you.</p>
          <a href="%%NGF_URL_SERVICES%%" class="ngf-btn ngf-btn-primary">See Our Services</a>
        </div>
        <div class="ngf-col">
          <div class="ngf-feature-list">
            <div class="ngf-feature-item">
              <span class="ngf-feature-icon">&#10022;</span>
              <div>
                <h4>Custom WordPress Themes</h4>
                <p>Tailor-made themes built to your brand, your industry, and your goals — fully compatible with Gutenberg and leading page builders.</p>
              </div>
            </div>
            <div class="ngf-feature-item">
              <span class="ngf-feature-icon">&#10022;</span>
              <div>
                <h4>Custom Shopify Themes</h4>
                <p>Shopify 2.0 storefronts engineered for maximum conversions and brand impact, with full theme-editor customization for your team.</p>
              </div>
            </div>
            <div class="ngf-feature-item">
              <span class="ngf-feature-icon">&#10022;</span>
              <div>
                <h4>WordPress Plugins</h4>
                <p>Extend your WordPress site with powerful, lean, security-compliant plugins built exactly to your specifications.</p>
              </div>
            </div>
            <div class="ngf-feature-item">
              <span class="ngf-feature-icon">&#10022;</span>
              <div>
                <h4>Shopify Apps</h4>
                <p>Custom Shopify app development to automate workflows, integrate third-party tools, and scale your store operations.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ngf-section ngf-section-dark">
    <div class="ngf-container">
      <span class="ngf-eyebrow">Our Values</span>
      <h2 class="ngf-section-title">What <span>Drives Us</span></h2>
      <div class="ngf-grid ngf-grid-3">
        <div class="ngf-card">
          <div class="ngf-card-num">01</div>
          <h3 class="ngf-card-title">Quality First</h3>
          <p class="ngf-card-body">Every theme, plugin, and app we ship is crafted to the highest standards. No shortcuts, no bloat — just clean, purposeful code that stands the test of time.</p>
        </div>
        <div class="ngf-card ngf-card-featured">
          <div class="ngf-card-num">02</div>
          <h3 class="ngf-card-title">Client Success</h3>
          <p class="ngf-card-body">Your success is our metric. We measure our work by the results it creates for your business — not just by aesthetics or feature lists.</p>
        </div>
        <div class="ngf-card">
          <div class="ngf-card-num">03</div>
          <h3 class="ngf-card-title">Continuous Innovation</h3>
          <p class="ngf-card-body">The web evolves fast. We stay ahead of platform updates, design trends, and performance benchmarks so you never fall behind.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="ngf-contact-panel">
    <div class="ngf-container">
      <h2>Let's Build Together</h2>
      <p>Whether you need a new theme, a custom plugin, or a complete digital overhaul — we are ready to get to work.</p>
      <a href="%%NGF_URL_CONTACT%%" class="ngf-btn ngf-btn-primary">Talk to Our Team</a>
    </div>
  </section>

</div>
<!-- /wp:html -->
EOC;
	return [ 'title' => 'About Us', 'content' => $content ];
}

/* ═══════════════════════════════════════════════════════════════
   SERVICES
═══════════════════════════════════════════════════════════════ */
function ngf_page_services() {
	$content = <<<'EOC'
<!-- wp:html -->
<div class="ngf-wrap">

  <section class="ngf-hero ngf-hero-sm">
    <div class="ngf-hero-inner">
      <span class="ngf-eyebrow">What We Offer</span>
      <h1 class="ngf-hero-title">Our <em>Services</em></h1>
      <p class="ngf-hero-intro">From beautifully crafted themes to powerful custom plugins and apps — NextGen Fusion covers every layer of your WordPress and Shopify presence.</p>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <span class="ngf-eyebrow">WordPress</span>
      <h2 class="ngf-section-title"><span>WordPress</span> Solutions</h2>
      <div class="ngf-grid ngf-grid-2">

        <div class="ngf-card ngf-card-lg">
          <div class="ngf-card-num">01</div>
          <h3 class="ngf-card-title">Custom WordPress Themes</h3>
          <p class="ngf-card-body">We design and develop bespoke WordPress themes that reflect your brand identity — optimized for SEO, speed, and conversions. Built with the WordPress block editor (Gutenberg) and compatible with leading page builders.</p>
          <ul class="ngf-list">
            <li>Full Gutenberg &amp; Full Site Editing (FSE) support</li>
            <li>WooCommerce ready out of the box</li>
            <li>Core Web Vitals and PageSpeed optimized</li>
            <li>Fully responsive on all screen sizes</li>
            <li>Comprehensive documentation included</li>
          </ul>
        </div>

        <div class="ngf-card ngf-card-lg">
          <div class="ngf-card-num">02</div>
          <h3 class="ngf-card-title">Custom WordPress Plugins</h3>
          <p class="ngf-card-body">Need functionality that simply does not exist yet? We build secure, performant WordPress plugins tailored to your exact requirements — from simple shortcodes to complex multi-module systems with admin dashboards.</p>
          <ul class="ngf-list">
            <li>Custom post types, taxonomies &amp; meta</li>
            <li>REST API &amp; third-party integrations</li>
            <li>Admin dashboard panels &amp; settings pages</li>
            <li>WooCommerce extensions &amp; payment gateways</li>
            <li>WordPress Coding Standards (WPCS) compliant</li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <section class="ngf-section ngf-section-dark">
    <div class="ngf-container">
      <span class="ngf-eyebrow">Shopify</span>
      <h2 class="ngf-section-title"><span>Shopify</span> Solutions</h2>
      <div class="ngf-grid ngf-grid-2">

        <div class="ngf-card ngf-card-lg">
          <div class="ngf-card-num">03</div>
          <h3 class="ngf-card-title">Custom Shopify Themes</h3>
          <p class="ngf-card-body">Shopify 2.0 themes that combine stunning visuals with conversion-optimized layouts. Every section is customizable through the Shopify editor — no code required for your team to manage day-to-day changes.</p>
          <ul class="ngf-list">
            <li>Shopify 2.0 flexible section architecture</li>
            <li>Mobile-first, performance-optimized design</li>
            <li>Metafield &amp; metaobject support built in</li>
            <li>Storefront search &amp; filter integration</li>
            <li>Full Theme Store submission readiness</li>
          </ul>
        </div>

        <div class="ngf-card ngf-card-lg">
          <div class="ngf-card-num">04</div>
          <h3 class="ngf-card-title">Custom Shopify Apps</h3>
          <p class="ngf-card-body">Extend your Shopify store far beyond existing apps. We build embedded Shopify apps, public app listings, and private custom solutions using the Shopify App Bridge, Admin API, and Storefront API.</p>
          <ul class="ngf-list">
            <li>Embedded admin &amp; storefront apps</li>
            <li>Shopify Functions &amp; Checkout Extensions</li>
            <li>Third-party API &amp; webhook integrations</li>
            <li>Shopify Billing API integration</li>
            <li>Shopify App Store submission support</li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <span class="ngf-eyebrow">Our Process</span>
      <h2 class="ngf-section-title">How We <span>Work With You</span></h2>
      <div class="ngf-grid ngf-grid-3">
        <div class="ngf-card">
          <div class="ngf-card-num">1</div>
          <h3 class="ngf-card-title">Discovery Call</h3>
          <p class="ngf-card-body">We start with a free consultation to understand your goals, timeline, and budget. No obligation — just a conversation.</p>
        </div>
        <div class="ngf-card ngf-card-featured">
          <div class="ngf-card-num">2</div>
          <h3 class="ngf-card-title">Design &amp; Build</h3>
          <p class="ngf-card-body">Our team designs, develops, and iterates with you at every milestone. Full transparency, no surprises.</p>
        </div>
        <div class="ngf-card">
          <div class="ngf-card-num">3</div>
          <h3 class="ngf-card-title">Launch &amp; Support</h3>
          <p class="ngf-card-body">We handle deployment and provide post-launch support to make sure everything runs smoothly from day one.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="ngf-contact-panel">
    <div class="ngf-container">
      <h2>Get a Custom Quote</h2>
      <p>Every project is unique. Reach out and tell us what you need — we will craft a solution that fits your budget and timeline.</p>
      <a href="%%NGF_URL_CONTACT%%" class="ngf-btn ngf-btn-primary">Request a Quote</a>
    </div>
  </section>

</div>
<!-- /wp:html -->
EOC;
	return [ 'title' => 'Services', 'content' => $content ];
}

/* ═══════════════════════════════════════════════════════════════
   CONTACT
═══════════════════════════════════════════════════════════════ */
function ngf_page_contact() {
	$content = <<<'EOC'
<!-- wp:html -->
<div class="ngf-wrap">

  <section class="ngf-hero ngf-hero-sm">
    <div class="ngf-hero-inner">
      <span class="ngf-eyebrow">Get In Touch</span>
      <h1 class="ngf-hero-title">Contact <em>Us</em></h1>
      <p class="ngf-hero-intro">Have a project in mind or a question about our products? We would love to hear from you. Our team typically responds within 24 business hours.</p>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <div class="ngf-two-col">

        <div class="ngf-col">
          <span class="ngf-eyebrow">Reach Us Directly</span>
          <h2 class="ngf-section-title">Contact <span>Information</span></h2>
          <div class="ngf-contact-info">
            <div class="ngf-contact-item">
              <span class="ngf-contact-icon">&#9993;</span>
              <div>
                <strong>Email</strong>
                <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a>
              </div>
            </div>
            <div class="ngf-contact-item">
              <span class="ngf-contact-icon">&#9201;</span>
              <div>
                <strong>Response Time</strong>
                <span>Within 24 hours on business days</span>
              </div>
            </div>
            <div class="ngf-contact-item">
              <span class="ngf-contact-icon">&#127760;</span>
              <div>
                <strong>Services</strong>
                <span>WordPress &amp; Shopify Themes, Plugins &amp; Apps</span>
              </div>
            </div>
            <div class="ngf-contact-item">
              <span class="ngf-contact-icon">&#128205;</span>
              <div>
                <strong>Based In</strong>
                <span>India — serving clients worldwide</span>
              </div>
            </div>
          </div>

          <div class="ngf-contact-note">
            <p><strong>Before you write:</strong> please include your website URL, the platform (WordPress or Shopify), and a brief description of what you need. This helps us respond with a useful, specific answer right away.</p>
          </div>
        </div>

        <div class="ngf-col">
          <div class="ngf-form-wrap">
            <h3>Send Us a Message</h3>
            [CONTACT_FORM_SHORTCODE]
          </div>
        </div>

      </div>
    </div>
  </section>

</div>
<!-- /wp:html -->
EOC;
	return [ 'title' => 'Contact', 'content' => $content ];
}

/* ═══════════════════════════════════════════════════════════════
   PRIVACY POLICY
═══════════════════════════════════════════════════════════════ */
function ngf_page_privacy() {
	$content = <<<'EOC'
<!-- wp:html -->
<div class="ngf-wrap">

  <section class="ngf-hero ngf-hero-sm">
    <div class="ngf-hero-inner">
      <span class="ngf-eyebrow">Legal</span>
      <h1 class="ngf-hero-title">Privacy <em>Policy</em></h1>
      <p class="ngf-hero-intro">We are committed to protecting your personal information and your right to privacy. This policy explains how we handle your data when you use our website and services.</p>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <div class="ngf-policy-body">

        <p class="ngf-policy-meta">Effective date: 01 January 2025 &nbsp;|&nbsp; Last updated: 01 January 2025 &nbsp;|&nbsp; Applies to: nextgenfusion.in</p>

        <h2>1. Who We Are</h2>
        <p>NextGen Fusion ("we", "our", "us") is a digital products business based in India that develops and sells custom WordPress themes, Shopify themes, WordPress plugins, and Shopify apps. Our website is <strong>nextgenfusion.in</strong> and you can reach us at <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a>.</p>

        <h2>2. Information We Collect</h2>
        <h3>Information you provide directly</h3>
        <ul>
          <li><strong>Contact information:</strong> Name, email address, and any details you include in contact form submissions or email enquiries.</li>
          <li><strong>Purchase information:</strong> Name, billing address, email address, and payment details collected at checkout (payment card data is processed directly by our payment partners — we never store raw card numbers).</li>
          <li><strong>Support communications:</strong> Messages, attachments, and other information you share when requesting help.</li>
        </ul>
        <h3>Information collected automatically</h3>
        <ul>
          <li><strong>Usage data:</strong> IP address, browser type and version, pages visited, time spent on pages, referring URL, and device information.</li>
          <li><strong>Cookies and similar technologies:</strong> See Section 5 for details.</li>
        </ul>

        <h2>3. How We Use Your Information</h2>
        <p>We use your information only for the following purposes:</p>
        <ul>
          <li>To process and fulfil your orders and deliver purchased products.</li>
          <li>To send transactional emails such as purchase receipts and download links.</li>
          <li>To respond to your enquiries and provide customer support.</li>
          <li>To improve our website, products, and services based on usage patterns.</li>
          <li>To detect and prevent fraud or abuse of our services.</li>
          <li>To comply with legal obligations we are subject to.</li>
        </ul>
        <p>We do <strong>not</strong> use your information for unsolicited marketing without your explicit consent.</p>

        <h2>4. Legal Basis for Processing</h2>
        <p>Where applicable under data protection laws (including the EU GDPR and India's Digital Personal Data Protection Act 2023), we process your personal data on the following bases:</p>
        <ul>
          <li><strong>Contract performance:</strong> Processing necessary to complete your purchase and deliver the product.</li>
          <li><strong>Legitimate interests:</strong> Improving our products and preventing fraud, where this is not overridden by your rights.</li>
          <li><strong>Legal obligation:</strong> Where we must process data to comply with applicable laws.</li>
          <li><strong>Consent:</strong> Where you have opted in, such as for marketing communications.</li>
        </ul>

        <h2>5. Cookies</h2>
        <p>We use the following types of cookies on nextgenfusion.in:</p>
        <ul>
          <li><strong>Essential cookies:</strong> Necessary for the website to function correctly (e.g., session management, security tokens). These cannot be disabled.</li>
          <li><strong>Analytics cookies:</strong> Used to understand how visitors interact with our site (e.g., Google Analytics). These are set only with your consent where required by law.</li>
        </ul>
        <p>You can control or delete cookies through your browser settings at any time. Disabling certain cookies may affect website functionality.</p>

        <h2>6. Sharing Your Information</h2>
        <p>We do <strong>not sell or rent</strong> your personal data to any third party. We may share your information with:</p>
        <ul>
          <li><strong>Payment processors</strong> (e.g., Razorpay, Stripe) — solely to complete your transaction.</li>
          <li><strong>Analytics providers</strong> (e.g., Google Analytics) — in aggregated or anonymised form to understand site usage.</li>
          <li><strong>Email service providers</strong> — to deliver transactional and support emails on our behalf.</li>
          <li><strong>Legal authorities</strong> — if required by law, court order, or to protect the rights, property, or safety of NextGen Fusion or others.</li>
        </ul>
        <p>All third-party service providers are contractually required to handle your data securely and in accordance with applicable data protection laws.</p>

        <h2>7. International Data Transfers</h2>
        <p>NextGen Fusion is based in India. If you are accessing our services from outside India, your data may be transferred to and processed in India or in countries where our service providers operate. We take appropriate measures to ensure such transfers comply with applicable data protection laws.</p>

        <h2>8. Data Retention</h2>
        <p>We retain personal data only for as long as necessary to fulfil the purposes described in this policy, including to meet legal, accounting, or reporting requirements. Purchase records are typically retained for seven years for tax and accounting purposes. Contact and support enquiries are retained for up to two years, unless you request earlier deletion.</p>

        <h2>9. Data Security</h2>
        <p>We implement industry-standard technical and organisational measures to protect your personal information against unauthorised access, alteration, disclosure, or destruction. These include encrypted data transmission (HTTPS/TLS), access controls, and regular security reviews. However, no method of electronic transmission or storage is 100% secure, and we cannot guarantee absolute security.</p>

        <h2>10. Your Rights</h2>
        <p>Depending on your location and applicable law, you may have the right to:</p>
        <ul>
          <li>Access the personal data we hold about you.</li>
          <li>Request correction of inaccurate or incomplete data.</li>
          <li>Request deletion of your personal data ("right to be forgotten").</li>
          <li>Object to or restrict processing of your data in certain circumstances.</li>
          <li>Request a portable copy of your data in a machine-readable format.</li>
          <li>Withdraw consent at any time where processing is based on consent.</li>
        </ul>
        <p>To exercise any of these rights, please contact us at <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a>. We will respond within 30 days.</p>

        <h2>11. Third-Party Links</h2>
        <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices of those sites and encourage you to read their privacy policies before providing any personal information.</p>

        <h2>12. Children's Privacy</h2>
        <p>Our services are not directed at individuals under the age of 13 (or 18 where required by local law). We do not knowingly collect personal information from children. If we become aware that we have collected personal information from a child without appropriate consent, we will delete that information promptly.</p>

        <h2>13. Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time. When we make material changes, we will update the "Last updated" date at the top of this page. We encourage you to review this page periodically. Your continued use of our services after changes are posted constitutes your acceptance of the updated policy.</p>

        <h2>14. Contact Us</h2>
        <p>If you have questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us:</p>
        <p>
          <strong>NextGen Fusion</strong><br>
          Email: <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a><br>
          Website: <a href="%%NGF_URL_HOME%%">nextgenfusion.in</a>
        </p>

      </div>
    </div>
  </section>

</div>
<!-- /wp:html -->
EOC;
	return [ 'title' => 'Privacy Policy', 'content' => $content ];
}

/* ═══════════════════════════════════════════════════════════════
   TERMS OF SERVICE
═══════════════════════════════════════════════════════════════ */
function ngf_page_terms() {
	$content = <<<'EOC'
<!-- wp:html -->
<div class="ngf-wrap">

  <section class="ngf-hero ngf-hero-sm">
    <div class="ngf-hero-inner">
      <span class="ngf-eyebrow">Legal</span>
      <h1 class="ngf-hero-title">Terms of <em>Service</em></h1>
      <p class="ngf-hero-intro">Please read these Terms of Service carefully before purchasing or using any NextGen Fusion products or services. By using our website or products you agree to be bound by these terms.</p>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <div class="ngf-policy-body">

        <p class="ngf-policy-meta">Effective date: 01 January 2025 &nbsp;|&nbsp; Last updated: 01 January 2025 &nbsp;|&nbsp; Applies to: nextgenfusion.in</p>

        <h2>1. Acceptance of Terms</h2>
        <p>By accessing nextgenfusion.in, purchasing any product, or engaging our services, you ("the Customer", "you") confirm that you have read, understood, and agree to be legally bound by these Terms of Service ("Terms") and our <a href="%%NGF_URL_PRIVACY%%">Privacy Policy</a>. If you do not agree, you must not use our website or services.</p>
        <p>These Terms apply to all visitors, customers, and others who access or use our website and products.</p>

        <h2>2. Products and Services</h2>
        <p>NextGen Fusion ("we", "us", "our") offers the following digital products and services ("Products"):</p>
        <ul>
          <li>Custom WordPress themes</li>
          <li>Custom Shopify themes</li>
          <li>WordPress plugins</li>
          <li>Shopify apps and extensions</li>
          <li>Related consulting and development services</li>
        </ul>
        <p>Products are provided in the form described on our website at the time of purchase. We reserve the right to modify, update, or discontinue any product at any time with reasonable notice where possible.</p>

        <h2>3. Purchases and Payment</h2>
        <h3>Pricing</h3>
        <p>All prices are listed on our product pages and are exclusive of applicable taxes unless stated otherwise. We reserve the right to change prices at any time. Price changes will not affect orders already placed and confirmed.</p>
        <h3>Payment</h3>
        <p>Payment is processed securely through our authorised payment partners (e.g., Razorpay, Stripe). By placing an order, you authorise us to charge the stated amount to your chosen payment method. We do not store your payment card details.</p>
        <h3>Refund Policy</h3>
        <p>Due to the digital and downloadable nature of our products, all sales are final once the product has been delivered or download access has been granted. We will issue a refund only if:</p>
        <ul>
          <li>The product materially fails to match its published description, or</li>
          <li>The product contains a critical defect that we are unable to resolve within a reasonable time frame.</li>
        </ul>
        <p>Refund requests must be submitted to <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a> within <strong>7 days</strong> of purchase, with a clear description of the issue and any relevant evidence (screenshots, error logs). We do not issue refunds for change-of-mind, accidental purchases after the download link has been used, or incompatibilities caused by third-party plugins or themes outside our control.</p>

        <h2>4. License Grant</h2>
        <p>Upon successful payment, NextGen Fusion grants you a <strong>non-exclusive, non-transferable, limited license</strong> to:</p>
        <ul>
          <li>Install and use the Product on the number of websites or Shopify stores specified in your purchased license tier.</li>
          <li>Modify the Product source files for your own internal use on those licensed sites.</li>
        </ul>
        <h3>What you may NOT do</h3>
        <ul>
          <li>Redistribute, resell, sublicense, or share the Product files with any third party.</li>
          <li>Use the Product as the basis for a competing product or theme/plugin offered for sale or free distribution.</li>
          <li>Remove, alter, or obscure any copyright notices, licence notices, or attribution embedded in the Product files.</li>
          <li>Use the Product on more websites or stores than your license permits without purchasing additional licenses.</li>
          <li>Transfer your license to another person or entity without our prior written consent.</li>
        </ul>

        <h2>5. Intellectual Property</h2>
        <p>All Products, source code, designs, graphics, logos, documentation, and website content are the exclusive intellectual property of NextGen Fusion and are protected by applicable copyright, trademark, and other intellectual property laws. Your license to use our Products does not transfer any ownership rights to you. The "NextGen Fusion" name, logo, and brand are our trademarks and may not be used without our written permission.</p>

        <h2>6. Support and Updates</h2>
        <p>We provide support for our Products via email at <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a>. Support covers installation assistance, bug resolution within the scope of the Product, and usage guidance. Support does not include custom modifications, third-party plugin conflicts (beyond reasonable diagnosis), or hosting-related issues.</p>
        <p>Product updates (bug fixes, compatibility patches, new features) are provided at our discretion. We endeavour to maintain compatibility with major WordPress and Shopify platform updates.</p>

        <h2>7. Prohibited Uses</h2>
        <p>You agree not to use our website or Products to:</p>
        <ul>
          <li>Violate any applicable local, national, or international law or regulation.</li>
          <li>Transmit any unsolicited or unauthorised advertising or promotional material.</li>
          <li>Attempt to gain unauthorised access to any part of our website or systems.</li>
          <li>Introduce malicious code, viruses, trojans, or other harmful material.</li>
          <li>Engage in any conduct that restricts or inhibits the use or enjoyment of our website by others.</li>
        </ul>

        <h2>8. Disclaimer of Warranties</h2>
        <p>TO THE FULLEST EXTENT PERMITTED BY APPLICABLE LAW, OUR PRODUCTS AND SERVICES ARE PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED. WE DO NOT WARRANT THAT THE PRODUCTS WILL BE UNINTERRUPTED, ERROR-FREE, FREE OF VIRUSES, OR SUITABLE FOR YOUR PARTICULAR PURPOSE. YOUR USE OF OUR PRODUCTS IS AT YOUR SOLE RISK.</p>

        <h2>9. Limitation of Liability</h2>
        <p>TO THE FULLEST EXTENT PERMITTED BY LAW, IN NO EVENT SHALL NEXTGEN FUSION, ITS DIRECTORS, EMPLOYEES, OR AGENTS BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES — INCLUDING LOSS OF PROFITS, DATA, OR GOODWILL — ARISING FROM YOUR USE OF OR INABILITY TO USE OUR PRODUCTS OR SERVICES, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</p>
        <p>Our total cumulative liability to you for any claims arising from or relating to these Terms or our Products shall not exceed the total amount you paid us for the specific Product giving rise to the claim in the twelve (12) months preceding the claim.</p>

        <h2>10. Indemnification</h2>
        <p>You agree to defend, indemnify, and hold harmless NextGen Fusion and its affiliates, officers, directors, employees, and agents from any claims, liabilities, damages, losses, costs, and expenses (including reasonable legal fees) arising from: (a) your use of our Products or website; (b) your violation of these Terms; or (c) your violation of any third-party rights.</p>

        <h2>11. Governing Law and Dispute Resolution</h2>
        <p>These Terms and any disputes arising from them are governed by the laws of India, without regard to conflict-of-law principles. Any dispute shall be subject to the exclusive jurisdiction of the competent courts in India. We encourage you to contact us first at <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a> to resolve any concerns informally before resorting to formal legal proceedings.</p>

        <h2>12. Severability</h2>
        <p>If any provision of these Terms is found to be invalid or unenforceable by a court of competent jurisdiction, that provision shall be limited or eliminated to the minimum extent necessary, and the remaining provisions shall continue in full force and effect.</p>

        <h2>13. Changes to These Terms</h2>
        <p>We reserve the right to update these Terms at any time. We will notify you of material changes by updating the "Last updated" date above and, where appropriate, by posting a notice on our website. Your continued use of our services after changes are posted constitutes your acceptance of the revised Terms.</p>

        <h2>14. Contact Us</h2>
        <p>If you have any questions about these Terms of Service, please contact us:</p>
        <p>
          <strong>NextGen Fusion</strong><br>
          Email: <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a><br>
          Website: <a href="%%NGF_URL_HOME%%">nextgenfusion.in</a>
        </p>

      </div>
    </div>
  </section>

</div>
<!-- /wp:html -->
EOC;
	return [ 'title' => 'Terms of Service', 'content' => $content ];
}

/* ═══════════════════════════════════════════════════════════════
   TERMS & CONDITIONS
═══════════════════════════════════════════════════════════════ */
function ngf_page_terms_conditions() {
	$content = <<<'EOC'
<!-- wp:html -->
<div class="ngf-wrap">

  <section class="ngf-hero ngf-hero-sm">
    <div class="ngf-hero-inner">
      <span class="ngf-eyebrow">Legal</span>
      <h1 class="ngf-hero-title">Terms &amp; <em>Conditions</em></h1>
      <p class="ngf-hero-intro">These Terms &amp; Conditions govern your purchase and use of all digital products and services offered by NextGen Fusion. Please read them carefully before placing an order.</p>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <div class="ngf-policy-body">

        <p class="ngf-policy-meta">Effective date: 01 January 2025 &nbsp;|&nbsp; Last updated: 01 January 2025 &nbsp;|&nbsp; Applies to: nextgenfusion.in</p>

        <h2>1. Agreement to Terms</h2>
        <p>By browsing nextgenfusion.in, placing an order, or downloading any product from NextGen Fusion ("we", "us", "our"), you ("the Customer", "you") confirm that you are at least 18 years of age, have the legal authority to enter into this agreement, and fully accept these Terms &amp; Conditions. If you do not agree, please do not use our website or services.</p>

        <h2>2. Products Covered</h2>
        <p>These Terms &amp; Conditions apply to all digital products and related services sold by NextGen Fusion, including but not limited to:</p>
        <ul>
          <li>Custom WordPress themes (individual and multisite licenses)</li>
          <li>Custom Shopify themes</li>
          <li>WordPress plugins (personal and extended licenses)</li>
          <li>Shopify apps and extensions</li>
          <li>Consulting and custom development services</li>
        </ul>

        <h2>3. Ordering and Contract Formation</h2>
        <p>When you place an order on our website, you are making an offer to purchase the selected product. A binding contract is formed when we confirm your order by email and grant you access to the download. We reserve the right to refuse or cancel any order at our discretion (for example, in the event of pricing errors or suspected fraud), in which case a full refund will be issued promptly.</p>

        <h2>4. Pricing, Taxes, and Currency</h2>
        <p>All prices are displayed on our product pages and are subject to change without prior notice. Price changes will not affect orders already confirmed. Prices may be displayed in INR, USD, or both. Applicable taxes (such as GST in India) will be calculated and shown at checkout where required by law. You are responsible for any additional taxes, duties, or levies imposed by your local jurisdiction.</p>

        <h2>5. Payment Terms</h2>
        <p>Full payment is required at the time of purchase. We accept payments via our authorised payment partners (including Razorpay and Stripe). Your payment is processed securely; we do not store raw card or banking credentials on our servers. By submitting payment, you confirm that you are authorised to use the payment method provided.</p>

        <h2>6. Digital Product Delivery</h2>
        <p>All products are delivered digitally. Following successful payment, you will receive an email containing a secure download link, typically within 15 minutes. For detailed delivery terms and troubleshooting, see our <a href="%%NGF_URL_SHIPPING%%">Shipping &amp; Delivery Policy</a>.</p>

        <h2>7. License Types and Permitted Use</h2>
        <p>Upon purchase, you receive a license to use the product as follows:</p>
        <ul>
          <li><strong>Personal / Single-Site License:</strong> Use on one (1) website or Shopify store owned by you.</li>
          <li><strong>Developer / Multi-Site License:</strong> Use on up to the number of sites specified in your license, including client sites.</li>
          <li><strong>Extended License:</strong> Grants rights for use in a paid product or service; consult individual product pages for terms.</li>
        </ul>
        <p>All licenses are <strong>non-exclusive and non-transferable</strong> unless explicitly stated otherwise in writing by NextGen Fusion.</p>

        <h2>8. Permitted Modifications</h2>
        <p>You may modify the product source code for your own use on licensed sites. You may not, however, redistribute modified versions, strip out copyright notices, or use modified versions to create competing products.</p>

        <h2>9. Prohibited Activities</h2>
        <p>The following are strictly prohibited:</p>
        <ul>
          <li>Reselling, sublicensing, gifting, or otherwise transferring the product to any third party.</li>
          <li>Distributing the product (in original or modified form) via any marketplace, torrent, file-sharing platform, or website.</li>
          <li>Using the product to create a competing theme, plugin, or app offered commercially or for free download.</li>
          <li>Reverse-engineering, decompiling, or disassembling any obfuscated or compiled portions of the product beyond what is expressly permitted by law.</li>
          <li>Removing, altering, or concealing any copyright, trademark, or attribution notices within the product files.</li>
          <li>Using our brand name, logo, or trademarks without prior written consent.</li>
        </ul>

        <h2>10. Intellectual Property Rights</h2>
        <p>All intellectual property rights in and to the products — including source code, design assets, documentation, and associated materials — remain the exclusive property of NextGen Fusion. Your purchase grants you a license to use the product; it does not transfer ownership of any intellectual property to you.</p>

        <h2>11. Updates and Compatibility</h2>
        <p>We endeavour to keep our products compatible with major WordPress core updates and Shopify platform changes. Update notifications are sent to the email address on file. However, we do not guarantee that updates will be delivered on any specific schedule, and we are not liable for any incompatibility issues that arise from platform changes outside our control.</p>

        <h2>12. Support Scope</h2>
        <p>Support is provided by email at <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a>. Covered support includes: installation guidance, bug reports relating to the product as shipped, and general usage questions. Not covered: custom modifications requested beyond the product's documented features, conflicts caused by third-party plugins, or hosting-related issues.</p>

        <h2>13. Refunds and Cancellations</h2>
        <p>Refund eligibility and the process for requesting a refund are described in our <a href="%%NGF_URL_REFUND%%">Refund &amp; Return Policy</a>. Order cancellation terms are described in our <a href="%%NGF_URL_CANCEL%%">Cancellation Policy</a>. These documents form part of these Terms &amp; Conditions.</p>

        <h2>14. Warranties and Disclaimer</h2>
        <p>We warrant that our products will substantially perform the features described on their product pages at the time of purchase. Beyond this, TO THE FULLEST EXTENT PERMITTED BY LAW, ALL PRODUCTS ARE PROVIDED "AS IS" WITHOUT ANY FURTHER EXPRESS OR IMPLIED WARRANTIES, INCLUDING WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT.</p>

        <h2>15. Limitation of Liability</h2>
        <p>TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, NEXTGEN FUSION SHALL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, CONSEQUENTIAL, PUNITIVE, OR SPECIAL DAMAGES ARISING FROM YOUR USE OF OUR PRODUCTS. OUR TOTAL LIABILITY FOR ANY CLAIM SHALL NOT EXCEED THE AMOUNT PAID BY YOU FOR THE PRODUCT IN QUESTION.</p>

        <h2>16. Indemnity</h2>
        <p>You agree to indemnify and hold NextGen Fusion, its team members, and contractors harmless from any claims, losses, or expenses (including legal fees) that arise from: (a) your breach of these Terms; (b) your misuse of a product; or (c) content you create using our products that infringes a third party's rights.</p>

        <h2>17. Force Majeure</h2>
        <p>NextGen Fusion shall not be held liable for delays or failures in performance caused by events beyond our reasonable control, including natural disasters, internet outages, payment infrastructure failures, or government actions.</p>

        <h2>18. Governing Law</h2>
        <p>These Terms &amp; Conditions are governed by the laws of India. Any dispute shall be resolved exclusively in the competent courts of India. We encourage you to contact us first to resolve any issue informally before pursuing legal action.</p>

        <h2>19. Severability and Entire Agreement</h2>
        <p>If any provision of these Terms is found unenforceable, the remaining provisions will continue in full effect. These Terms, together with our <a href="%%NGF_URL_PRIVACY%%">Privacy Policy</a>, <a href="%%NGF_URL_REFUND%%">Refund Policy</a>, <a href="%%NGF_URL_CANCEL%%">Cancellation Policy</a>, and <a href="%%NGF_URL_SHIPPING%%">Shipping Policy</a>, constitute the entire agreement between you and NextGen Fusion.</p>

        <h2>20. Changes to These Terms</h2>
        <p>We reserve the right to update these Terms at any time. The "Last updated" date at the top of this page reflects when changes were last made. Continued use of our services after an update constitutes acceptance of the revised Terms.</p>

        <h2>21. Contact</h2>
        <p>
          <strong>NextGen Fusion</strong><br>
          Email: <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a><br>
          Website: <a href="%%NGF_URL_HOME%%">nextgenfusion.in</a>
        </p>

      </div>
    </div>
  </section>

</div>
<!-- /wp:html -->
EOC;
	return [ 'title' => 'Terms &amp; Conditions', 'content' => $content ];
}

/* ═══════════════════════════════════════════════════════════════
   REFUND & RETURN POLICY
═══════════════════════════════════════════════════════════════ */
function ngf_page_refund() {
	$content = <<<'EOC'
<!-- wp:html -->
<div class="ngf-wrap">

  <section class="ngf-hero ngf-hero-sm">
    <div class="ngf-hero-inner">
      <span class="ngf-eyebrow">Legal</span>
      <h1 class="ngf-hero-title">Refund &amp; Return <em>Policy</em></h1>
      <p class="ngf-hero-intro">We stand behind every product we ship. This policy explains when refunds apply, how to request one, and what to expect from the process.</p>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <div class="ngf-policy-body">

        <p class="ngf-policy-meta">Effective date: 01 January 2025 &nbsp;|&nbsp; Last updated: 01 January 2025 &nbsp;|&nbsp; Applies to: nextgenfusion.in</p>

        <h2>1. Nature of Our Products</h2>
        <p>All products sold by NextGen Fusion — WordPress themes, Shopify themes, WordPress plugins, and Shopify apps — are <strong>digital downloads</strong>. Because digital goods are delivered electronically and cannot be physically returned, this policy differs from a traditional retail returns policy. Once a download link is accessed, the product has been delivered.</p>

        <h2>2. Our Refund Commitment</h2>
        <p>We review every refund request fairly and individually. If your purchase genuinely fails to perform as described, we will make it right — either by fixing the problem promptly or by issuing a full refund.</p>

        <div class="ngf-policy-highlight">
          <strong>Refund window:</strong> 7 days from the date of purchase.
        </div>

        <h2>3. Situations Where a Refund Is Granted</h2>
        <p>You are entitled to request a full refund within <strong>7 days of purchase</strong> if any of the following apply:</p>
        <ul>
          <li>The product <strong>materially fails to match its published description</strong> or the features listed on the product page at the time of purchase.</li>
          <li>The product contains a <strong>critical technical defect or bug</strong> that prevents core functionality from working, and our support team is unable to resolve it within 72 hours of a verified, reproducible bug report submitted from a clean environment.</li>
          <li>You were <strong>charged more than once</strong> for the same order due to a payment processing error on our end.</li>
          <li>You did not receive your download link or access credentials within 24 hours of payment and our support team cannot deliver them.</li>
        </ul>

        <h2>4. Situations Where a Refund Is Not Granted</h2>
        <p>Refunds will not be issued in the following circumstances:</p>
        <ul>
          <li><strong>Change of mind</strong> after the download link has been accessed or the product files have been downloaded.</li>
          <li><strong>Buyer error:</strong> purchasing the wrong product, wrong license tier, or wrong platform version.</li>
          <li><strong>Third-party conflicts:</strong> incompatibility with plugins, themes, hosting environments, server configurations, or customisations outside the product's documented scope.</li>
          <li><strong>Hosting or server issues:</strong> problems caused by your server's PHP version, memory limits, file permissions, or other infrastructure factors not meeting the product's minimum requirements.</li>
          <li>Requests submitted <strong>after 7 days</strong> from the date of purchase.</li>
          <li>Products purchased during a <strong>sale or promotional period</strong> where the offer terms stated sales are final.</li>
          <li>Cases where you have violated our <a href="%%NGF_URL_TERMS_C%%">Terms &amp; Conditions</a> (e.g., redistribution of the product).</li>
        </ul>

        <h2>5. How to Request a Refund — Step by Step</h2>
        <ol class="ngf-ordered-list">
          <li>Email <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a> within 7 days of your purchase date.</li>
          <li>Use the subject line: <strong>Refund Request — [Your Order Number] — [Product Name]</strong></li>
          <li>Include: your order confirmation number, the exact product name, a clear description of the issue, steps to reproduce it, and any relevant screenshots or error logs.</li>
          <li>Our team will acknowledge your request within <strong>1 business day</strong>.</li>
          <li>We will attempt to resolve the issue first. If unresolved, we will approve and process the refund within <strong>3 business days</strong> of approval.</li>
        </ol>

        <h2>6. Refund Processing Timeline</h2>
        <p>Approved refunds are returned to the original payment method. Please allow:</p>
        <ul>
          <li><strong>3–5 business days</strong> for us to initiate the refund on our end after approval.</li>
          <li>An additional <strong>5–10 business days</strong> for the amount to appear in your account, depending on your bank or payment provider (Razorpay, Stripe, etc.).</li>
        </ul>
        <p>You will receive a confirmation email once the refund has been initiated from our side.</p>

        <h2>7. Partial Refunds</h2>
        <p>Where only part of a product or service was affected, we may offer a partial refund at our reasonable discretion. This will be discussed with you during the resolution process and agreed before any partial amount is processed.</p>

        <h2>8. No Physical Returns</h2>
        <p>All products are digital — there is nothing physical to return. Please do not send any physical materials to us. We are unable to accept or process physical shipments.</p>

        <h2>9. Dispute Resolution</h2>
        <p>If you are unsatisfied with our refund decision, please escalate in writing to <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a> with "Escalation" in the subject line. We will review the case at a senior level and respond within 5 business days. We are committed to resolving all disputes fairly and promptly.</p>

        <h2>10. Contact</h2>
        <p>
          <strong>NextGen Fusion — Refund Team</strong><br>
          Email: <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a><br>
          Response time: within 1 business day<br>
          Website: <a href="%%NGF_URL_HOME%%">nextgenfusion.in</a>
        </p>

      </div>
    </div>
  </section>

</div>
<!-- /wp:html -->
EOC;
	return [ 'title' => 'Refund &amp; Return Policy', 'content' => $content ];
}

/* ═══════════════════════════════════════════════════════════════
   CANCELLATION POLICY
═══════════════════════════════════════════════════════════════ */
function ngf_page_cancellation() {
	$content = <<<'EOC'
<!-- wp:html -->
<div class="ngf-wrap">

  <section class="ngf-hero ngf-hero-sm">
    <div class="ngf-hero-inner">
      <span class="ngf-eyebrow">Legal</span>
      <h1 class="ngf-hero-title">Cancellation <em>Policy</em></h1>
      <p class="ngf-hero-intro">This policy explains how and when you can cancel an order or ongoing service with NextGen Fusion, and what happens after cancellation.</p>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <div class="ngf-policy-body">

        <p class="ngf-policy-meta">Effective date: 01 January 2025 &nbsp;|&nbsp; Last updated: 01 January 2025 &nbsp;|&nbsp; Applies to: nextgenfusion.in</p>

        <h2>1. Overview</h2>
        <p>Because NextGen Fusion sells <strong>digital products that are delivered instantly</strong> upon payment, the window for cancelling an order is very narrow. This policy clearly defines what can be cancelled, when, and how.</p>

        <h2>2. Cancelling a Product Order</h2>
        <h3>Before the download link is accessed</h3>
        <p>If you have placed an order but have <strong>not yet accessed the download link or received the product files</strong>, you may request a cancellation and full refund by contacting us immediately at <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a>. Please include your order number and reason for cancellation. We will process eligible cancellations within 1 business day.</p>

        <h3>After the download link is accessed</h3>
        <p>Once the download link has been accessed or the product files have been downloaded, the order is considered fulfilled and <strong>cannot be cancelled</strong>. At that point, please refer to our <a href="%%NGF_URL_REFUND%%">Refund &amp; Return Policy</a> if the product has a defect or does not match its description.</p>

        <h2>3. Cancelling Custom Development Services</h2>
        <p>For bespoke development engagements (custom theme builds, plugin development, etc.):</p>
        <ul>
          <li><strong>Before work begins:</strong> You may cancel and receive a full refund of any deposit paid, provided you notify us before we have commenced work (typically within 24 hours of the project kick-off confirmation).</li>
          <li><strong>After work has begun:</strong> Cancellation will result in a charge for work completed to the cancellation date, calculated at our standard hourly or milestone rate. Any remaining balance from your deposit will be refunded.</li>
          <li><strong>After delivery:</strong> No cancellation is available after the final deliverable has been sent to you.</li>
        </ul>
        <p>All cancellation requests for services must be submitted in writing to <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a>.</p>

        <h2>4. Cancelling a Maintenance or Support Subscription</h2>
        <p>If you are subscribed to an ongoing maintenance or support plan:</p>
        <ul>
          <li>You may cancel at any time by emailing <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a> with your account details and a cancellation request.</li>
          <li>Cancellation takes effect at the <strong>end of your current billing period</strong>. You will continue to have access to support until then.</li>
          <li>We do not offer prorated refunds for the unused portion of a billing period, unless the cancellation is triggered by a material failure on our part.</li>
          <li>Annual subscription holders who cancel within 30 days of renewal may request a refund for the unused full months remaining.</li>
        </ul>

        <h2>5. How to Submit a Cancellation Request</h2>
        <ol class="ngf-ordered-list">
          <li>Email <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a> as soon as possible after your purchase.</li>
          <li>Use the subject line: <strong>Cancellation Request — [Your Order Number]</strong></li>
          <li>Include your name, order number, product or service name, and the reason for cancellation.</li>
          <li>Our team will confirm receipt within <strong>1 business day</strong> and advise on eligibility and next steps.</li>
        </ol>

        <h2>6. Cancellations Initiated by NextGen Fusion</h2>
        <p>We reserve the right to cancel an order or terminate service at our discretion in the following circumstances:</p>
        <ul>
          <li>Suspected fraudulent payment or misuse of a promotional offer.</li>
          <li>Pricing errors on our website that resulted in an obviously incorrect price.</li>
          <li>Material breach of our <a href="%%NGF_URL_TERMS_C%%">Terms &amp; Conditions</a>.</li>
          <li>Technical or stock issues that prevent us from fulfilling the order.</li>
        </ul>
        <p>In such cases, we will notify you promptly and issue a full refund of any amount paid.</p>

        <h2>7. Effect of Cancellation</h2>
        <p>Upon a valid cancellation:</p>
        <ul>
          <li>Your license to use the product or service is revoked immediately.</li>
          <li>You are required to delete all copies of any downloaded product files.</li>
          <li>Any refund due will be processed as described in our <a href="%%NGF_URL_REFUND%%">Refund &amp; Return Policy</a>.</li>
        </ul>

        <h2>8. Contact</h2>
        <p>
          <strong>NextGen Fusion</strong><br>
          Email: <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a><br>
          Response time: within 1 business day<br>
          Website: <a href="%%NGF_URL_HOME%%">nextgenfusion.in</a>
        </p>

      </div>
    </div>
  </section>

</div>
<!-- /wp:html -->
EOC;
	return [ 'title' => 'Cancellation Policy', 'content' => $content ];
}

/* ═══════════════════════════════════════════════════════════════
   SHIPPING & DELIVERY POLICY
═══════════════════════════════════════════════════════════════ */
function ngf_page_shipping() {
	$content = <<<'EOC'
<!-- wp:html -->
<div class="ngf-wrap">

  <section class="ngf-hero ngf-hero-sm">
    <div class="ngf-hero-inner">
      <span class="ngf-eyebrow">Legal</span>
      <h1 class="ngf-hero-title">Shipping &amp; Delivery <em>Policy</em></h1>
      <p class="ngf-hero-intro">NextGen Fusion sells exclusively digital products. There is no physical shipping involved. This page explains exactly how your product is delivered and what to do if something goes wrong.</p>
    </div>
  </section>

  <section class="ngf-section">
    <div class="ngf-container">
      <div class="ngf-policy-body">

        <p class="ngf-policy-meta">Effective date: 01 January 2025 &nbsp;|&nbsp; Last updated: 01 January 2025 &nbsp;|&nbsp; Applies to: nextgenfusion.in</p>

        <h2>1. Digital Delivery — No Physical Shipping</h2>
        <p>All products sold by NextGen Fusion — WordPress themes, Shopify themes, WordPress plugins, and Shopify apps — are <strong>100% digital</strong>. We do not sell, stock, or ship any physical goods. No parcel, box, or courier service is involved in any purchase from us.</p>
        <p>Because our products are digital, there are <strong>no shipping charges</strong>, no customs duties, no import taxes, and no delivery wait times associated with physical logistics. The price you see at checkout is the price you pay.</p>

        <h2>2. How Delivery Works</h2>
        <p>Your product is delivered electronically via a secure download link sent to the email address you provide at checkout. Here is the step-by-step process:</p>

        <div class="ngf-grid ngf-grid-3" style="margin-top:1.5rem;margin-bottom:2rem;">
          <div class="ngf-card">
            <div class="ngf-card-num">01</div>
            <h3 class="ngf-card-title">Payment Confirmed</h3>
            <p class="ngf-card-body">Your payment is processed securely by our payment partner. You receive an order confirmation email immediately.</p>
          </div>
          <div class="ngf-card ngf-card-featured">
            <div class="ngf-card-num">02</div>
            <h3 class="ngf-card-title">Download Link Sent</h3>
            <p class="ngf-card-body">Within minutes, a second email containing your secure download link, licence key (where applicable), and documentation link is sent to your inbox.</p>
          </div>
          <div class="ngf-card">
            <div class="ngf-card-num">03</div>
            <h3 class="ngf-card-title">Download &amp; Install</h3>
            <p class="ngf-card-body">Click the link to download a ZIP archive containing the product files and any included documentation. Install on your WordPress site or Shopify store per the included instructions.</p>
          </div>
        </div>

        <h2>3. Delivery Timeframe</h2>
        <p>In the vast majority of cases, your download email arrives within <strong>5–15 minutes</strong> of a successful payment. Delays beyond 60 minutes are rare but can occur due to:</p>
        <ul>
          <li>Email delivery delays caused by your email service provider or spam filters.</li>
          <li>Payment verification delays for certain payment methods (e.g., net banking, UPI).</li>
          <li>Temporary issues with our email delivery infrastructure.</li>
        </ul>
        <p>If you have not received your download link within <strong>24 hours</strong> of payment, please contact us immediately (see Section 7).</p>

        <h2>4. Download Link Validity</h2>
        <p>For security reasons, download links have the following restrictions:</p>
        <ul>
          <li><strong>Expiry:</strong> Download links are valid for <strong>30 days</strong> from the date of issue.</li>
          <li><strong>Download limit:</strong> Each link allows up to <strong>5 download attempts</strong>.</li>
          <li><strong>Expired links:</strong> If your link has expired or you have exceeded the download limit, email us at <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a> with your order number and we will issue a fresh link at no charge.</li>
        </ul>

        <h2>5. What Is Included in Your Download</h2>
        <p>The download ZIP archive for each product typically contains:</p>
        <ul>
          <li>The main product files (theme folder, plugin folder, or app files as applicable).</li>
          <li>A <strong>README / Getting Started</strong> document with installation instructions.</li>
          <li>A <strong>documentation link</strong> pointing to our online help centre for that product.</li>
          <li>Your <strong>licence key</strong> file (where the product requires licence activation).</li>
          <li>Any included <strong>demo content</strong> or starter templates (product-specific).</li>
        </ul>

        <h2>6. System Requirements</h2>
        <p>To use our products, your website or store must meet the following minimum requirements:</p>
        <h3>WordPress Products</h3>
        <ul>
          <li>WordPress version: 5.8 or higher (latest version recommended)</li>
          <li>PHP version: 7.4 or higher (PHP 8.1+ recommended)</li>
          <li>MySQL version: 5.7 or higher / MariaDB 10.3 or higher</li>
          <li>HTTPS enabled on the domain</li>
        </ul>
        <h3>Shopify Products</h3>
        <ul>
          <li>An active Shopify store on any paid plan</li>
          <li>Shopify 2.0 compatibility (Online Store 2.0 themes)</li>
          <li>For apps: Shopify store permissions as specified on the app's product page</li>
        </ul>

        <h2>7. Delivery Problems — What to Do</h2>
        <p>If you experience any delivery issue, take the following steps in order:</p>
        <ol class="ngf-ordered-list">
          <li><strong>Check your spam/junk folder.</strong> Our delivery emails sometimes land there due to spam filter settings.</li>
          <li><strong>Search your inbox</strong> for emails from <em>nextgenfusion.in</em> or "NextGen Fusion".</li>
          <li><strong>Wait up to 60 minutes</strong> — occasional delays occur in payment confirmation or email queues.</li>
          <li>If still unresolved after 60 minutes, email <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a> with subject line: <strong>Delivery Issue — [Your Order Number]</strong>. Include your order number and the email address used at checkout.</li>
        </ol>
        <p>We will resolve all delivery issues within <strong>24 hours</strong>, and in most cases far sooner.</p>

        <h2>8. Re-Downloading Your Purchase</h2>
        <p>We recommend saving your downloaded product files in a secure location (cloud storage, external drive) immediately after download. If you need to re-download within the link's validity window, simply use the original link. For re-download requests outside that window, contact us with your order number.</p>

        <h2>9. No Physical Shipments</h2>
        <p>As stated, NextGen Fusion does not ship physical goods. If you receive any unsolicited physical item claiming to be from NextGen Fusion, please disregard it — we have not sent it — and notify us at <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a>.</p>

        <h2>10. International Customers</h2>
        <p>We serve customers worldwide. Because our products are digital, there are no international shipping fees, customs duties, or import restrictions. Delivery works identically for all customers regardless of location, subject to internet connectivity. Pricing on the website is shown in INR and/or USD; your card issuer may apply a foreign currency conversion fee which is outside our control.</p>

        <h2>11. Contact</h2>
        <p>For any delivery questions or issues:</p>
        <p>
          <strong>NextGen Fusion</strong><br>
          Email: <a href="mailto:contact@nextgenfusion.in">contact@nextgenfusion.in</a><br>
          Subject: <em>Delivery Issue — [Your Order Number]</em><br>
          Response time: within 24 hours (usually within a few hours)<br>
          Website: <a href="%%NGF_URL_HOME%%">nextgenfusion.in</a>
        </p>

      </div>
    </div>
  </section>

</div>
<!-- /wp:html -->
EOC;
	return [ 'title' => 'Shipping &amp; Delivery Policy', 'content' => $content ];
}
