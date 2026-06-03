<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function bww_get_all_pages() {
	return [
		'bww-home'             => [ 'title' => 'Home',                       'content' => bww_page_home() ],
		'about-us'             => [ 'title' => 'About Us',                   'content' => bww_page_about() ],
		'services'             => [ 'title' => 'Services',                   'content' => bww_page_services() ],
		'contact'              => [ 'title' => 'Contact',                    'content' => bww_page_contact() ],
		'privacy-policy'       => [ 'title' => 'Privacy Policy',             'content' => bww_page_privacy() ],
		'terms-of-service'     => [ 'title' => 'Terms of Service',           'content' => bww_page_tos() ],
		'terms-and-conditions' => [ 'title' => 'Terms & Conditions',         'content' => bww_page_tandc() ],
		'refund-policy'        => [ 'title' => 'Refund & Return Policy',     'content' => bww_page_refund() ],
		'cancellation-policy'  => [ 'title' => 'Cancellation Policy',        'content' => bww_page_cancel() ],
		'shipping-policy'      => [ 'title' => 'Shipping & Delivery Policy', 'content' => bww_page_shipping() ],
	];
}

/* ─────────────────────────────── HOME ──────────────────────── */
function bww_page_home() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="bww-hero">
  <div class="bww-wrap">
    <span class="bww-chip">Handcrafted in India</span>
    <img src="%%BRAND_LOGO%%" alt="Bhola Welding Works" class="bww-hero-logo">
    <h1 class="bww-h1">Bhola Welding Works</h1>
    <p class="bww-hero-intro">Premium handmade steel trishuls crafted with passion and precision in Chhindwara, Madhya Pradesh. Each piece is forged by skilled artisans, built to last, and delivered across all of India.</p>
    <div class="bww-btn-group" style="margin-top:36px;">
      <a href="https://wa.me/918770706900" class="bww-btn" target="_blank" rel="noopener">&#128513; Order on WhatsApp</a>
      <a href="%%URL_SERVICES%%" class="bww-btn bww-btn-outline">View Products</a>
    </div>
  </div>
</div>

<div class="bww-stats">
  <div class="bww-stats-inner">
    <div class="bww-stat-item">
      <span class="bww-stat-number">500+</span>
      <span class="bww-stat-label">Orders Delivered</span>
    </div>
    <div class="bww-stat-item">
      <span class="bww-stat-number">All India</span>
      <span class="bww-stat-label">Delivery Available</span>
    </div>
    <div class="bww-stat-item">
      <span class="bww-stat-number">100%</span>
      <span class="bww-stat-label">Handmade Steel</span>
    </div>
    <div class="bww-stat-item">
      <span class="bww-stat-number">Custom</span>
      <span class="bww-stat-label">Orders Welcome</span>
    </div>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-section-heading">
      <span class="bww-chip">What We Offer</span>
      <h2 class="bww-h2">Crafted with Steel. Built with Pride.</h2>
      <div class="bww-divider"></div>
      <p>Every trishul that leaves our workshop is individually crafted, quality-checked, and safely packed for delivery anywhere in India.</p>
    </div>
    <div class="bww-grid">
      <div class="bww-card">
        <span class="bww-card-icon">&#9953;</span>
        <h3>Custom Design Trishuls</h3>
        <p>Tell us your design, size, or engraving idea and we will craft a one-of-a-kind trishul to your exact specifications.</p>
        <ul>
          <li>Any size from small pooja trishul to large display piece</li>
          <li>Personal name or mantra engraving</li>
          <li>Special finish on request</li>
        </ul>
      </div>
      <div class="bww-card">
        <span class="bww-card-icon">&#9864;</span>
        <h3>Premium Steel Quality</h3>
        <p>We use only high-grade steel in every product. Each trishul is hand-forged and polished for a lasting, rust-resistant finish.</p>
        <ul>
          <li>High-grade steel construction</li>
          <li>Hand-ground and polished edges</li>
          <li>Durable, long-lasting finish</li>
        </ul>
      </div>
      <div class="bww-card">
        <span class="bww-card-icon">&#128666;</span>
        <h3>All India Fast Dispatch</h3>
        <p>We dispatch within 3–5 days of confirmed payment and deliver to every corner of India in 7–10 business days.</p>
        <ul>
          <li>Secure packing to prevent transit damage</li>
          <li>WhatsApp tracking updates</li>
          <li>Delivery to all states and union territories</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-surface);">
  <div class="bww-wrap">
    <div class="bww-section-heading">
      <span class="bww-chip">Why Choose Us</span>
      <h2 class="bww-h2">The Bhola Welding Difference</h2>
      <div class="bww-divider"></div>
    </div>
    <ul class="bww-why-list">
      <li>
        <span class="bww-why-icon">&#9876;</span>
        <div class="bww-why-text">
          <strong>Authentic Handmade Craft</strong>
          <span>Each trishul is individually made by hand — no mass-produced machine parts. Small differences in finish reflect genuine craftsmanship.</span>
        </div>
      </li>
      <li>
        <span class="bww-why-icon">&#127775;</span>
        <div class="bww-why-text">
          <strong>Bulk &amp; Gifting Orders</strong>
          <span>Planning a religious event, mandir installation, or corporate gifting? We accept bulk orders with special pricing and custom packaging.</span>
        </div>
      </li>
      <li>
        <span class="bww-why-icon">&#128222;</span>
        <div class="bww-why-text">
          <strong>Direct from Workshop</strong>
          <span>No middlemen. Order directly from our workshop in Chhindwara via WhatsApp or Instagram and get the best price guaranteed.</span>
        </div>
      </li>
      <li>
        <span class="bww-why-icon">&#128176;</span>
        <div class="bww-why-text">
          <strong>Easy UPI &amp; Bank Transfer</strong>
          <span>Simple, trusted payment options. Pay via UPI (PhonePe, GPay, Paytm) or direct bank transfer with full order confirmation before dispatch.</span>
        </div>
      </li>
    </ul>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-cta">
      <span class="bww-chip">Get Started Today</span>
      <h2>Order Your Trishul Today</h2>
      <p>Message us on WhatsApp with your requirements — size, quantity, or custom design. We respond within hours and guide you through the order process.</p>
      <div class="bww-btn-group">
        <a href="https://wa.me/918770706900" class="bww-btn" target="_blank" rel="noopener">WhatsApp Us Now</a>
        <a href="%%URL_CONTACT%%" class="bww-btn bww-btn-outline">Send Enquiry</a>
      </div>
    </div>
  </div>
</div>

<div class="bww-home-footer">
  <div class="bww-home-footer-inner">
    <div class="bww-home-footer-col">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="%%URL_HOME%%">Home</a></li>
        <li><a href="%%URL_ABOUT%%">About Us</a></li>
        <li><a href="%%URL_SERVICES%%">Services</a></li>
        <li><a href="%%URL_CONTACT%%">Contact</a></li>
      </ul>
    </div>
    <div class="bww-home-footer-col">
      <h4>Policies</h4>
      <ul>
        <li><a href="%%URL_PRIVACY%%">Privacy Policy</a></li>
        <li><a href="%%URL_TERMS%%">Terms of Service</a></li>
        <li><a href="%%URL_TERMS_C%%">Terms &amp; Conditions</a></li>
        <li><a href="%%URL_REFUND%%">Refund Policy</a></li>
        <li><a href="%%URL_CANCEL%%">Cancellation Policy</a></li>
        <li><a href="%%URL_SHIPPING%%">Shipping Policy</a></li>
      </ul>
    </div>
    <div class="bww-home-footer-col">
      <h4>Contact</h4>
      <ul>
        <li><a href="https://wa.me/918770706900">WhatsApp: +91 8770706900</a></li>
        <li><a href="mailto:mukundvishwakarma427@gmail.com">Email Us</a></li>
        <li><a href="https://instagram.com/bhola_welding_works" target="_blank" rel="noopener">Instagram: @bhola_welding_works</a></li>
        <li>Chhindwara, Madhya Pradesh</li>
      </ul>
    </div>
  </div>
  <div class="bww-home-footer-bottom">
    &copy; <span id="bww-year"></span> Bhola Welding Works. All rights reserved. &nbsp;|&nbsp;
    <a href="%%URL_PRIVACY%%">Privacy</a> &nbsp;|&nbsp;
    <a href="%%URL_TERMS%%">Terms</a>
    <script>document.getElementById('bww-year').textContent=new Date().getFullYear();</script>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ─────────────────────────────── ABOUT US ───────────────────── */
function bww_page_about() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="bww-hero">
  <div class="bww-wrap">
    <span class="bww-chip">Our Story</span>
    <h1 class="bww-h1">About Bhola Welding Works</h1>
    <p class="bww-hero-intro">A family-run workshop in the heart of Chhindwara, Madhya Pradesh, dedicated to the ancient craft of forging sacred and decorative steel trishuls for over a decade.</p>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-two-col">
      <div class="bww-two-col-content">
        <span class="bww-chip">Who We Are</span>
        <h2>Born from Craft, Driven by Devotion</h2>
        <p>Bhola Welding Works was founded in Chhindwara, Madhya Pradesh, with a single purpose — to bring the finest handmade steel trishuls to devotees, collectors, and institutions across India.</p>
        <p>Our workshop has grown from a small roadside forge into a trusted name for quality religious metalwork. Every trishul we craft carries the dedication of skilled hands and the fire of a welding torch that has been burning for years.</p>
        <p>We believe that a trishul is not just a product — it is a symbol of strength, devotion, and heritage. That belief drives every stroke of the hammer and every pass of the grinder in our workshop.</p>
        <p>Based in District Chhindwara, Madhya Pradesh (PIN: 480557), we ship to all states and union territories across India. Whether you need a small pooja trishul, a large temple installation piece, or a custom design for a special occasion, we are here to serve you.</p>
        <div style="margin-top:28px;">
          <a href="https://wa.me/918770706900" class="bww-btn" target="_blank" rel="noopener">Enquire on WhatsApp</a>
        </div>
      </div>
      <div>
        <span class="bww-chip">What Sets Us Apart</span>
        <ul class="bww-feature-list">
          <li>
            <div class="bww-feature-icon">&#9876;</div>
            <div class="bww-feature-text">
              <strong>100% Handmade</strong>
              <span>Every trishul is forged, shaped, and finished entirely by hand. No assembly-line shortcuts.</span>
            </div>
          </li>
          <li>
            <div class="bww-feature-icon">&#9864;</div>
            <div class="bww-feature-text">
              <strong>Premium Steel Material</strong>
              <span>We use high-grade steel that resists rust and corrosion, ensuring your trishul lasts for generations.</span>
            </div>
          </li>
          <li>
            <div class="bww-feature-icon">&#127775;</div>
            <div class="bww-feature-text">
              <strong>Custom Orders Welcome</strong>
              <span>From small personalised pieces to large-scale installations — we take on custom work of any complexity.</span>
            </div>
          </li>
          <li>
            <div class="bww-feature-icon">&#128666;</div>
            <div class="bww-feature-text">
              <strong>All India Delivery</strong>
              <span>We deliver safely to every corner of India with secure packing and WhatsApp tracking updates.</span>
            </div>
          </li>
          <li>
            <div class="bww-feature-icon">&#128222;</div>
            <div class="bww-feature-text">
              <strong>Direct Workshop Contact</strong>
              <span>You speak directly to the maker. No sales agents, no call centres — just honest, direct service.</span>
            </div>
          </li>
          <li>
            <div class="bww-feature-icon">&#128176;</div>
            <div class="bww-feature-text">
              <strong>Simple Payments</strong>
              <span>Pay via UPI (PhonePe, GPay, Paytm) or direct bank transfer. Fast, safe, and trusted.</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-surface);">
  <div class="bww-wrap">
    <div class="bww-cta">
      <h2>Ready to Place Your Order?</h2>
      <p>Reach out via WhatsApp or Instagram with your requirements and we will get back to you promptly.</p>
      <div class="bww-btn-group">
        <a href="https://wa.me/918770706900" class="bww-btn" target="_blank" rel="noopener">WhatsApp Us</a>
        <a href="%%URL_CONTACT%%" class="bww-btn bww-btn-outline">Contact Page</a>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ─────────────────────────────── SERVICES ───────────────────── */
function bww_page_services() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="bww-hero">
  <div class="bww-wrap">
    <span class="bww-chip">Our Products</span>
    <h1 class="bww-h1">Products &amp; Services</h1>
    <p class="bww-hero-intro">From traditional devotional trishuls to custom decorative masterpieces — explore our full range of handcrafted steel products made to order in Chhindwara, MP.</p>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-section-heading">
      <span class="bww-chip">Product Range</span>
      <h2 class="bww-h2">What We Make</h2>
      <div class="bww-divider"></div>
      <p>All products are made from high-grade steel, handcrafted in our Chhindwara workshop, and dispatched with secure packing for safe delivery.</p>
    </div>
    <div class="bww-grid">
      <div class="bww-card">
        <div class="bww-card-num">01</div>
        <h3>Standard Trishul</h3>
        <p>Our classic range of handmade steel trishuls, perfect for pooja rooms, temples, and home décor. Available in multiple sizes to suit any requirement.</p>
        <ul>
          <li>Small (6″–12″), Medium (18″–36″), Large (48″+)</li>
          <li>Polished steel finish</li>
          <li>Suitable for pooja, display, and gifting</li>
          <li>Individually quality-checked before dispatch</li>
        </ul>
      </div>
      <div class="bww-card">
        <div class="bww-card-num">02</div>
        <h3>Custom / Personalised Trishul</h3>
        <p>Have a specific design, size, or personal touch in mind? We accept fully custom orders — from personalised engravings to unique shapes and ornamental detailing.</p>
        <ul>
          <li>Name or mantra engraving on shaft</li>
          <li>Custom size to exact measurements</li>
          <li>Decorative scrollwork and pattern welding</li>
          <li>Unique finish options on request</li>
        </ul>
      </div>
      <div class="bww-card">
        <div class="bww-card-num">03</div>
        <h3>Bulk &amp; Temple Orders</h3>
        <p>Planning a temple installation, large religious event, or gifting project? We handle bulk orders of any quantity with consistent quality and competitive pricing.</p>
        <ul>
          <li>Minimum 5 pieces for bulk pricing</li>
          <li>Uniform quality across the entire batch</li>
          <li>Custom packaging for gifting sets</li>
          <li>Special rates for large orders — contact us</li>
        </ul>
      </div>
      <div class="bww-card">
        <div class="bww-card-num">04</div>
        <h3>Repair &amp; Restoration</h3>
        <p>Have an old or damaged trishul that holds sentimental or religious significance? We offer professional repair and restoration services to bring it back to its former glory.</p>
        <ul>
          <li>Welding of broken or cracked shafts</li>
          <li>Re-grinding and re-polishing of blades</li>
          <li>Handle replacement and refitting</li>
          <li>Contact us via WhatsApp with photos for a quote</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-surface);">
  <div class="bww-wrap">
    <div class="bww-section-heading">
      <span class="bww-chip">How It Works</span>
      <h2 class="bww-h2">From Your Idea to Your Door</h2>
      <div class="bww-divider"></div>
    </div>
    <div class="bww-process">
      <div class="bww-step">
        <div class="bww-step-num">1</div>
        <h4>Choose or Design</h4>
        <p>Pick from our standard range or describe your custom design via WhatsApp or Instagram.</p>
      </div>
      <div class="bww-step">
        <div class="bww-step-num">2</div>
        <h4>Confirm &amp; Pay</h4>
        <p>We confirm the price, size, and delivery timeline. Pay via UPI or Bank Transfer to confirm your order.</p>
      </div>
      <div class="bww-step">
        <div class="bww-step-num">3</div>
        <h4>We Craft It</h4>
        <p>Our artisans handcraft your trishul. Standard orders ready in 3–5 days; custom orders may take longer.</p>
      </div>
      <div class="bww-step">
        <div class="bww-step-num">4</div>
        <h4>Shipped to You</h4>
        <p>Securely packed and dispatched. Tracking details sent via WhatsApp. Delivered in 7–10 business days.</p>
      </div>
    </div>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-cta">
      <span class="bww-chip">Place Your Order</span>
      <h2>Ready to Order?</h2>
      <p>Send us a message on WhatsApp or Instagram with your requirements and we will respond with pricing and timelines within a few hours.</p>
      <div class="bww-btn-group">
        <a href="https://wa.me/918770706900" class="bww-btn" target="_blank" rel="noopener">WhatsApp: +91 8770706900</a>
        <a href="%%URL_CONTACT%%" class="bww-btn bww-btn-outline">Send an Enquiry</a>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ─────────────────────────────── CONTACT ────────────────────── */
function bww_page_contact() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="bww-hero">
  <div class="bww-wrap">
    <span class="bww-chip">Reach Out</span>
    <h1 class="bww-h1">Get in Touch</h1>
    <p class="bww-hero-intro">Have a question about our products, want to place a custom order, or need to check on a delivery? We are here to help — reach us on WhatsApp, Instagram, or email.</p>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-two-col">
      <div>
        <div class="bww-contact-panel">
          <h3>Contact Information</h3>
          <div class="bww-contact-item">
            <div class="bww-contact-item-icon" style="color:var(--bww-gold);">&#128222;</div>
            <div class="bww-contact-item-text">
              <strong>Phone / WhatsApp</strong>
              <a href="tel:+918770706900">+91 8770706900</a>
            </div>
          </div>
          <div class="bww-contact-item">
            <div class="bww-contact-item-icon" style="color:var(--bww-gold);">&#128140;</div>
            <div class="bww-contact-item-text">
              <strong>Email</strong>
              <a href="mailto:mukundvishwakarma427@gmail.com">mukundvishwakarma427@gmail.com</a>
            </div>
          </div>
          <div class="bww-contact-item">
            <div class="bww-contact-item-icon" style="color:var(--bww-gold);">&#128205;</div>
            <div class="bww-contact-item-text">
              <strong>Workshop Location</strong>
              <span>District Chhindwara, Madhya Pradesh – 480557, India</span>
            </div>
          </div>
          <div class="bww-contact-item">
            <div class="bww-contact-item-icon" style="color:var(--bww-gold);">&#128336;</div>
            <div class="bww-contact-item-text">
              <strong>Response Time</strong>
              <span>We typically respond within a few hours on WhatsApp and Instagram.</span>
            </div>
          </div>
          <div class="bww-social-row">
            <a href="https://wa.me/918770706900" class="bww-social-link" target="_blank" rel="noopener">&#128172; WhatsApp</a>
            <a href="https://instagram.com/bhola_welding_works" class="bww-social-link" target="_blank" rel="noopener">&#128247; @bhola_welding_works</a>
          </div>
        </div>
      </div>
      <div>
        <div class="bww-form-panel">
          <h3>Send Us a Message</h3>
          [contact-form-7 id="d1513a7" title="Contact form 1"]
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ─────────────────────────────── PRIVACY POLICY ─────────────── */
function bww_page_privacy() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="bww-hero">
  <div class="bww-wrap">
    <span class="bww-chip">Legal</span>
    <h1 class="bww-h1">Privacy Policy</h1>
    <p class="bww-hero-intro">Bhola Welding Works is committed to protecting your personal information. This policy explains what data we collect, how we use it, and your rights under Indian law.</p>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-policy">
      <div class="bww-policy-meta">
        <span><strong>Effective Date:</strong> 1 January 2025</span>
        <span><strong>Business:</strong> Bhola Welding Works</span>
        <span><strong>Jurisdiction:</strong> India</span>
      </div>

      <div class="bww-policy-section">
        <h2>1. Introduction</h2>
        <p>This Privacy Policy governs the collection, use, and disclosure of personal information provided to Bhola Welding Works ("we," "us," or "our") through our website at <a href="https://bholaweldingworks.in/">bholaweldingworks.in</a>, WhatsApp communications, Instagram messages, and any other channels through which you contact us or place an order.</p>
        <p>By using our website or placing an order, you consent to the practices described in this policy. If you do not agree, please do not use our services.</p>
      </div>

      <div class="bww-policy-section">
        <h2>2. Information We Collect</h2>
        <h3>2.1 Information You Provide Directly</h3>
        <ul>
          <li>Full name and delivery address</li>
          <li>Mobile number and WhatsApp number</li>
          <li>Email address (if provided)</li>
          <li>Order details including product type, size, quantity, and customisation requirements</li>
          <li>Payment confirmation references (UPI transaction ID or bank transfer reference — we do not store card numbers or banking credentials)</li>
        </ul>
        <h3>2.2 Information Collected Automatically</h3>
        <ul>
          <li>IP address and browser type when you visit our website</li>
          <li>Pages visited and time spent on site (via standard WordPress and hosting analytics)</li>
          <li>Cookies set by WordPress and any contact form plugin you interact with</li>
        </ul>
        <h3>2.3 Communications Data</h3>
        <p>If you contact us via WhatsApp, Instagram, or email, we retain those conversation records for order fulfilment and customer service purposes.</p>
      </div>

      <div class="bww-policy-section">
        <h2>3. How We Use Your Information</h2>
        <ul>
          <li>To process and fulfil your order</li>
          <li>To communicate with you regarding order status, dispatch, and delivery</li>
          <li>To respond to enquiries and customer support requests</li>
          <li>To send order confirmation and shipping details via WhatsApp or email</li>
          <li>To improve our website and services based on usage data</li>
          <li>To comply with legal obligations under Indian law</li>
        </ul>
        <div class="bww-policy-highlight">
          <p>We do not sell, rent, or trade your personal information to any third party for marketing purposes.</p>
        </div>
      </div>

      <div class="bww-policy-section">
        <h2>4. Information Sharing</h2>
        <p>We may share your personal information only in the following limited circumstances:</p>
        <ul>
          <li><strong>Delivery partners:</strong> Your name and delivery address are shared with our courier or logistics partner solely for the purpose of delivering your order.</li>
          <li><strong>Legal compliance:</strong> We may disclose information if required to do so by law, court order, or government authority in India.</li>
          <li><strong>Business transfer:</strong> In the unlikely event that our business is sold or transferred, customer data may be transferred as part of that transaction, subject to this privacy policy.</li>
        </ul>
        <p>No other sharing of personal data occurs without your explicit consent.</p>
      </div>

      <div class="bww-policy-section">
        <h2>5. Data Retention</h2>
        <p>We retain your personal information for as long as is necessary to fulfil the purposes described in this policy, or as required by applicable Indian law (typically a minimum of three years for commercial records). After this period, your data will be securely deleted or anonymised.</p>
      </div>

      <div class="bww-policy-section">
        <h2>6. Data Security</h2>
        <p>We take reasonable technical and organisational measures to protect your personal data against unauthorised access, disclosure, alteration, or destruction. However, no internet-based transmission is completely secure and we cannot guarantee absolute security.</p>
      </div>

      <div class="bww-policy-section">
        <h2>7. Cookies</h2>
        <p>Our website uses cookies to ensure basic functionality (such as maintaining your session and storing form inputs). We do not use tracking cookies for advertising purposes. You may disable cookies through your browser settings, but this may affect the functionality of the website.</p>
      </div>

      <div class="bww-policy-section">
        <h2>8. Your Rights</h2>
        <p>Under applicable Indian data protection principles, you have the right to:</p>
        <ul>
          <li>Access the personal information we hold about you</li>
          <li>Request correction of inaccurate data</li>
          <li>Request deletion of your data (subject to our legal retention obligations)</li>
          <li>Withdraw consent for communications at any time</li>
        </ul>
        <p>To exercise any of these rights, please contact us at <a href="mailto:mukundvishwakarma427@gmail.com">mukundvishwakarma427@gmail.com</a> or via WhatsApp at +91 8770706900.</p>
      </div>

      <div class="bww-policy-section">
        <h2>9. Third-Party Links</h2>
        <p>Our website may contain links to external websites (such as Instagram or WhatsApp). We are not responsible for the privacy practices of those third-party platforms. We encourage you to review their privacy policies before providing them with your personal information.</p>
      </div>

      <div class="bww-policy-section">
        <h2>10. Children's Privacy</h2>
        <p>Our services are not directed at children under 18. We do not knowingly collect personal information from minors. If you believe we have inadvertently collected such data, please contact us immediately and we will delete it.</p>
      </div>

      <div class="bww-policy-section">
        <h2>11. Governing Law</h2>
        <p>This Privacy Policy is governed by and construed in accordance with the laws of India. Any disputes arising under this policy shall be subject to the jurisdiction of courts in District Chhindwara, Madhya Pradesh.</p>
      </div>

      <div class="bww-policy-section">
        <h2>12. Contact Us</h2>
        <p>If you have any questions, concerns, or requests regarding this Privacy Policy, please contact us:</p>
        <ul>
          <li>Email: <a href="mailto:mukundvishwakarma427@gmail.com">mukundvishwakarma427@gmail.com</a></li>
          <li>WhatsApp: <a href="https://wa.me/918770706900">+91 8770706900</a></li>
          <li>Instagram: <a href="https://instagram.com/bhola_welding_works" target="_blank" rel="noopener">@bhola_welding_works</a></li>
          <li>Address: District Chhindwara, Madhya Pradesh – 480557, India</li>
        </ul>
      </div>

      <div class="bww-policy-section">
        <h2>13. Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time. Any changes will be published on this page with an updated effective date. Continued use of our services after any such changes constitutes your acceptance of the revised policy.</p>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ─────────────────────────────── TERMS OF SERVICE ───────────── */
function bww_page_tos() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="bww-hero">
  <div class="bww-wrap">
    <span class="bww-chip">Legal</span>
    <h1 class="bww-h1">Terms of Service</h1>
    <p class="bww-hero-intro">These Terms of Service govern your use of the Bhola Welding Works website. Please read them carefully before using our site or placing an order.</p>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-policy">
      <div class="bww-policy-meta">
        <span><strong>Effective Date:</strong> 1 January 2025</span>
        <span><strong>Business:</strong> Bhola Welding Works</span>
        <span><strong>Governing Law:</strong> India</span>
      </div>

      <div class="bww-policy-section">
        <h2>1. Acceptance of Terms</h2>
        <p>By accessing or using the website at <a href="https://bholaweldingworks.in/">bholaweldingworks.in</a> ("the Website"), you agree to be bound by these Terms of Service ("Terms") and our Privacy Policy, which is incorporated herein by reference. If you do not agree to these Terms, you must not use the Website.</p>
        <p>These Terms constitute a legally binding agreement between you ("User") and Bhola Welding Works, a sole proprietorship registered in India with its principal place of business at District Chhindwara, Madhya Pradesh – 480557.</p>
      </div>

      <div class="bww-policy-section">
        <h2>2. Use of the Website</h2>
        <p>You agree to use the Website only for lawful purposes and in a manner that does not infringe the rights of others. You must not:</p>
        <ul>
          <li>Use the Website in any way that violates any applicable local, national, or international law or regulation</li>
          <li>Transmit any unsolicited or unauthorised advertising or promotional material</li>
          <li>Attempt to gain unauthorised access to the Website, its server, or any connected database</li>
          <li>Transmit any data, send or upload any material that contains viruses or any other harmful programs</li>
          <li>Reproduce, copy, or re-sell any part of the Website in breach of these Terms</li>
        </ul>
      </div>

      <div class="bww-policy-section">
        <h2>3. Products and Orders</h2>
        <p>All orders placed through the Website, WhatsApp, or Instagram are subject to our Terms &amp; Conditions, Cancellation Policy, and Shipping Policy. Please review those documents before placing an order.</p>
        <p>We reserve the right to refuse or cancel any order at our sole discretion, including but not limited to cases where product information or pricing is inaccurate, where we suspect fraudulent activity, or where fulfilment is not feasible.</p>
      </div>

      <div class="bww-policy-section">
        <h2>4. Intellectual Property</h2>
        <p>All content on this Website — including text, photographs, graphics, logos, and design elements — is the intellectual property of Bhola Welding Works or its content suppliers and is protected under applicable Indian intellectual property laws.</p>
        <p>You may view and print pages from the Website for personal, non-commercial use only. No content may be reproduced, distributed, published, or used for commercial purposes without our prior written consent.</p>
      </div>

      <div class="bww-policy-section">
        <h2>5. Disclaimer of Warranties</h2>
        <p>The Website and its contents are provided on an "as is" and "as available" basis without any warranties of any kind, either express or implied. We do not warrant that the Website will be uninterrupted, error-free, or free of viruses or other harmful components.</p>
        <p>Product images on the Website are for illustrative purposes. Due to the handmade nature of our products, the actual item may vary slightly in dimensions, finish, or appearance.</p>
      </div>

      <div class="bww-policy-section">
        <h2>6. Limitation of Liability</h2>
        <p>To the fullest extent permitted by applicable Indian law, Bhola Welding Works shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or related to your use of the Website or our products, even if we have been advised of the possibility of such damages.</p>
        <p>Our total liability for any claim arising from the use of the Website or purchase of our products shall not exceed the amount paid by you for the specific product or service giving rise to the claim.</p>
      </div>

      <div class="bww-policy-section">
        <h2>7. Third-Party Links</h2>
        <p>The Website may contain links to third-party websites (including Instagram, WhatsApp, and payment platforms). These links are provided for your convenience only. We have no control over the content of those sites and accept no responsibility for them or for any loss or damage that may arise from your use of them.</p>
      </div>

      <div class="bww-policy-section">
        <h2>8. Changes to Terms</h2>
        <p>We reserve the right to amend these Terms at any time by posting the updated version on the Website. Your continued use of the Website after any such changes constitutes your acceptance of the new Terms. You are responsible for checking this page periodically for changes.</p>
      </div>

      <div class="bww-policy-section">
        <h2>9. Governing Law and Jurisdiction</h2>
        <p>These Terms are governed by the laws of the Republic of India. Any dispute arising under or in connection with these Terms shall be subject to the exclusive jurisdiction of the courts located in District Chhindwara, Madhya Pradesh, India.</p>
      </div>

      <div class="bww-policy-section">
        <h2>10. Contact</h2>
        <p>For any questions or concerns regarding these Terms of Service, please contact us at <a href="mailto:mukundvishwakarma427@gmail.com">mukundvishwakarma427@gmail.com</a> or via WhatsApp at <a href="https://wa.me/918770706900">+91 8770706900</a>.</p>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ─────────────────────────────── TERMS & CONDITIONS ─────────── */
function bww_page_tandc() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="bww-hero">
  <div class="bww-wrap">
    <span class="bww-chip">Legal</span>
    <h1 class="bww-h1">Terms &amp; Conditions</h1>
    <p class="bww-hero-intro">These Terms &amp; Conditions govern all purchases and orders placed with Bhola Welding Works. By placing an order you agree to these terms in full.</p>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-policy">
      <div class="bww-policy-meta">
        <span><strong>Effective Date:</strong> 1 January 2025</span>
        <span><strong>Business:</strong> Bhola Welding Works, Chhindwara, MP</span>
      </div>

      <div class="bww-policy-section">
        <h2>1. Order Confirmation</h2>
        <p>An order is considered confirmed only after advance payment or full payment is received by Bhola Welding Works. Verbal discussions, WhatsApp messages, or Instagram enquiries do not constitute a confirmed order. We will send an explicit order confirmation once payment is credited to our account.</p>
      </div>

      <div class="bww-policy-section">
        <h2>2. Customisation Orders</h2>
        <p>Customised or personalised trishuls — including orders with specific dimensions, engravings, design modifications, or special finishes — are made exclusively to the buyer's specifications. Such orders are non-cancellable and non-returnable once production has commenced. Please review all customisation details carefully before confirming and making payment.</p>
      </div>

      <div class="bww-policy-section">
        <h2>3. Delivery</h2>
        <p>We provide All India delivery for all orders. Estimated delivery time is 7–10 business days from the date of dispatch, depending on the delivery location. Remote areas or regions with limited courier coverage may take additional time. Bhola Welding Works is not responsible for delays caused by the courier partner beyond our control.</p>
      </div>

      <div class="bww-policy-section">
        <h2>4. Shipping Charges</h2>
        <p>Shipping charges are calculated based on the size, weight, and destination of the order. The applicable shipping charge will be communicated to you at the time of order confirmation. Shipping charges are non-refundable.</p>
      </div>

      <div class="bww-policy-section">
        <h2>5. Damage in Transit</h2>
        <div class="bww-policy-highlight">
          <p>If your order arrives damaged due to mishandling during transit, you must report the damage to us within 24 hours of delivery, along with an unboxing video clearly showing the damage. Claims made after 24 hours or without an unboxing video will not be considered.</p>
        </div>
        <p>Upon verification of the damage report, we will arrange a replacement or repair at our discretion. No cash refund will be issued for transit damage.</p>
      </div>

      <div class="bww-policy-section">
        <h2>6. Return &amp; Exchange</h2>
        <p>Returns and exchanges are only accepted in the following cases:</p>
        <ul>
          <li>The product delivered is damaged (with valid unboxing video submitted within 24 hours of delivery)</li>
          <li>The wrong product was delivered (i.e., different from the confirmed order)</li>
        </ul>
        <p>We do not accept returns or exchanges for reasons such as change of mind, minor variation in finish or dimensions (inherent in handmade products), or any reason not listed above. All return/exchange requests must be initiated within 24 hours of delivery.</p>
      </div>

      <div class="bww-policy-section">
        <h2>7. Product Material &amp; Handmade Variation</h2>
        <p>All trishuls are individually handmade from high-grade steel in our Chhindwara workshop. As each product is crafted by hand, minor differences in finish, surface texture, weight, or design details may occur between pieces. These variations are inherent to handmade craftsmanship and are not considered defects. Product photographs on our website are representative and the actual product may differ slightly in appearance.</p>
      </div>

      <div class="bww-policy-section">
        <h2>8. Safety Notice</h2>
        <p>All trishuls supplied by Bhola Welding Works are sharp steel implements. Please handle them with care and keep them out of the reach of children. Our products are intended for devotional, decorative, or ceremonial purposes. Bhola Welding Works accepts no liability for injury, damage, or harm resulting from misuse, unsafe handling, or use of our products for any illegal, violent, or prohibited activity. By purchasing from us, you confirm that you will use the product responsibly and lawfully.</p>
      </div>

      <div class="bww-policy-section">
        <h2>9. Payment Methods</h2>
        <p>We currently accept the following payment methods:</p>
        <ul>
          <li>UPI (PhonePe, Google Pay, Paytm, and any UPI-enabled app)</li>
          <li>Direct Bank Transfer (NEFT / IMPS / RTGS)</li>
        </ul>
        <p>Payment details will be shared upon order confirmation. Orders are processed only after payment is verified. We do not accept cash on delivery (COD) at this time.</p>
      </div>

      <div class="bww-policy-section">
        <h2>10. Contact Information</h2>
        <p>For any order-related queries, customisation requests, complaints, or general enquiries, please reach us through the following channels. We aim to respond within a few hours during business hours.</p>
        <ul>
          <li>WhatsApp: <a href="https://wa.me/918770706900">+91 8770706900</a></li>
          <li>Instagram: <a href="https://instagram.com/bhola_welding_works" target="_blank" rel="noopener">@bhola_welding_works</a></li>
          <li>Email: <a href="mailto:mukundvishwakarma427@gmail.com">mukundvishwakarma427@gmail.com</a></li>
          <li>Location: District Chhindwara, Madhya Pradesh – 480557, India</li>
        </ul>
        <p><strong>All India Delivery Available.</strong></p>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ─────────────────────────────── REFUND POLICY ──────────────── */
function bww_page_refund() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="bww-hero">
  <div class="bww-wrap">
    <span class="bww-chip">Legal</span>
    <h1 class="bww-h1">Refund &amp; Return Policy</h1>
    <p class="bww-hero-intro">Please read our refund and return policy carefully before placing an order with Bhola Welding Works.</p>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-policy">
      <div class="bww-policy-meta">
        <span><strong>Effective Date:</strong> 1 January 2025</span>
        <span><strong>Business:</strong> Bhola Welding Works</span>
      </div>

      <div class="bww-policy-section">
        <div class="bww-policy-highlight">
          <p>Bhola Welding Works operates a strict No Refund policy. All sales are final. We do not offer monetary refunds under any circumstances once an order is confirmed and payment is received.</p>
        </div>
      </div>

      <div class="bww-policy-section">
        <h2>1. No Refund Policy</h2>
        <p>All products sold by Bhola Welding Works are handmade to order and are non-refundable. Once an order is confirmed and payment is made, we do not issue cash refunds, UPI reversals, or bank transfer refunds for any reason including but not limited to:</p>
        <ul>
          <li>Change of mind or personal preference</li>
          <li>Minor variation in finish, texture, or dimensions (inherent to handmade products)</li>
          <li>Delay in delivery caused by courier partners or unforeseen circumstances</li>
          <li>Inability to receive the delivery at the provided address</li>
        </ul>
      </div>

      <div class="bww-policy-section">
        <h2>2. Exchange Policy (Damaged or Wrong Product Only)</h2>
        <p>We offer a product exchange in the following limited circumstances only:</p>
        <ul>
          <li><strong>Damaged Product:</strong> The product was damaged during transit. You must report the damage within 24 hours of delivery with an unboxing video clearly showing the damage and the packaging.</li>
          <li><strong>Wrong Product:</strong> We delivered a product that does not match your confirmed order specifications (e.g., different size or product type than ordered).</li>
        </ul>
        <p>Exchange requests must be made within 24 hours of delivery via WhatsApp at <a href="https://wa.me/918770706900">+91 8770706900</a> with supporting photographs or video. Requests made after 24 hours will not be considered.</p>
        <p>Upon verification, we will arrange for the return of the original product and dispatch a replacement. You may be responsible for return shipping charges in some cases.</p>
      </div>

      <div class="bww-policy-section">
        <h2>3. Custom and Personalised Orders</h2>
        <p>Custom orders — including trishuls made to specific dimensions, with engravings, or with special design modifications — are entirely non-returnable and non-exchangeable. These products are made exclusively for the buyer and cannot be resold or repurposed.</p>
      </div>

      <div class="bww-policy-section">
        <h2>4. Cancellations</h2>
        <p>For information on cancelling an order, please refer to our <a href="%%URL_CANCEL%%">Cancellation Policy</a>. Cancellations are subject to separate terms and advance payments may not be refunded if production has already commenced.</p>
      </div>

      <div class="bww-policy-section">
        <h2>5. Contact for Exchange Requests</h2>
        <p>All exchange requests must be initiated through:</p>
        <ul>
          <li>WhatsApp: <a href="https://wa.me/918770706900">+91 8770706900</a> (preferred — attach video/photos)</li>
          <li>Email: <a href="mailto:mukundvishwakarma427@gmail.com">mukundvishwakarma427@gmail.com</a></li>
          <li>Instagram DM: <a href="https://instagram.com/bhola_welding_works" target="_blank" rel="noopener">@bhola_welding_works</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ─────────────────────────────── CANCELLATION POLICY ────────── */
function bww_page_cancel() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="bww-hero">
  <div class="bww-wrap">
    <span class="bww-chip">Legal</span>
    <h1 class="bww-h1">Cancellation Policy</h1>
    <p class="bww-hero-intro">Understand when and how you can cancel an order placed with Bhola Welding Works.</p>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-policy">
      <div class="bww-policy-meta">
        <span><strong>Effective Date:</strong> 1 January 2025</span>
        <span><strong>Business:</strong> Bhola Welding Works</span>
      </div>

      <div class="bww-policy-section">
        <h2>1. Cancellation Before Production</h2>
        <p>You may request to cancel your order before production of your trishul has commenced. To do so, contact us within 2 hours of placing your order via WhatsApp at <a href="https://wa.me/918770706900">+91 8770706900</a>, providing your order details and the reason for cancellation.</p>
        <p>If the cancellation request is received before any work on your order has begun, we will process the cancellation and, where applicable, credit your advance payment (minus any administrative fee) back to you.</p>
      </div>

      <div class="bww-policy-section">
        <h2>2. Cancellation After Production Has Started</h2>
        <div class="bww-policy-highlight">
          <p>Once production of your order has commenced, cancellation is not possible under any circumstances. Materials will have been sourced and workshop time allocated specifically for your order.</p>
        </div>
        <p>If you attempt to cancel after production has started, your advance payment will be forfeited in full. No refund or credit will be issued.</p>
      </div>

      <div class="bww-policy-section">
        <h2>3. Custom / Personalised Orders</h2>
        <p>Customised orders — including trishuls made to specific measurements, with engravings, or with unique design modifications — are non-cancellable once the order has been confirmed and payment has been received. By placing a custom order, you acknowledge that the item is being made exclusively for you and cannot be resold.</p>
      </div>

      <div class="bww-policy-section">
        <h2>4. Cancellation by Bhola Welding Works</h2>
        <p>We reserve the right to cancel any order at our sole discretion, including in cases where:</p>
        <ul>
          <li>The ordered item is no longer available or feasible to produce</li>
          <li>Payment is not received within the agreed timeframe</li>
          <li>Fraudulent or suspicious activity is suspected</li>
          <li>The delivery address is outside our serviceable areas</li>
        </ul>
        <p>In the event that we cancel your order, we will notify you promptly and refund any payment already received in full.</p>
      </div>

      <div class="bww-policy-section">
        <h2>5. How to Request a Cancellation</h2>
        <p>All cancellation requests must be submitted promptly via one of the following channels, including your name, order details, and reason for cancellation:</p>
        <ul>
          <li>WhatsApp: <a href="https://wa.me/918770706900">+91 8770706900</a> (fastest response)</li>
          <li>Email: <a href="mailto:mukundvishwakarma427@gmail.com">mukundvishwakarma427@gmail.com</a></li>
          <li>Instagram DM: <a href="https://instagram.com/bhola_welding_works" target="_blank" rel="noopener">@bhola_welding_works</a></li>
        </ul>
        <p>We will acknowledge your request within a few hours during business hours and confirm whether the cancellation is possible based on the current production status of your order.</p>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ─────────────────────────────── SHIPPING POLICY ────────────── */
function bww_page_shipping() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="bww-hero">
  <div class="bww-wrap">
    <span class="bww-chip">Legal</span>
    <h1 class="bww-h1">Shipping &amp; Delivery Policy</h1>
    <p class="bww-hero-intro">Everything you need to know about how Bhola Welding Works packs, ships, and delivers your order across India.</p>
  </div>
</div>

<div class="bww-section" style="background:var(--bww-dark);">
  <div class="bww-wrap">
    <div class="bww-policy">
      <div class="bww-policy-meta">
        <span><strong>Effective Date:</strong> 1 January 2025</span>
        <span><strong>Business:</strong> Bhola Welding Works, Chhindwara, MP</span>
      </div>

      <div class="bww-policy-section">
        <h2>1. Delivery Coverage</h2>
        <p>Bhola Welding Works provides delivery across all of India — including all 28 states and 8 Union Territories. We ship to residential addresses, temples, commercial addresses, and PO boxes where courier service is available.</p>
        <div class="bww-policy-highlight">
          <p>All India Delivery Available — from Kashmir to Kanyakumari.</p>
        </div>
      </div>

      <div class="bww-policy-section">
        <h2>2. Dispatch Timeline</h2>
        <p>Orders are dispatched from our workshop in Chhindwara, Madhya Pradesh, within <strong>3–5 business days</strong> of confirmed payment. For custom or bulk orders, the dispatch timeline may be longer and will be communicated to you at the time of order confirmation.</p>
      </div>

      <div class="bww-policy-section">
        <h2>3. Estimated Delivery Time</h2>
        <p>After dispatch, estimated delivery times are as follows:</p>
        <ul>
          <li><strong>Nearby states (MP, UP, Maharashtra, Rajasthan, Gujarat, etc.):</strong> 3–5 business days</li>
          <li><strong>Most other states:</strong> 5–8 business days</li>
          <li><strong>Remote or hilly areas (North-East, J&amp;K, Ladakh, Andaman, etc.):</strong> 10–15 business days</li>
        </ul>
        <p>These are estimates only. Actual delivery times may vary due to courier operations, weather, public holidays, or other factors beyond our control. Our overall estimated delivery window is <strong>7–10 business days</strong> from dispatch for most locations.</p>
      </div>

      <div class="bww-policy-section">
        <h2>4. Shipping Charges</h2>
        <p>Shipping charges are calculated based on the following factors:</p>
        <ul>
          <li>Dimensional weight and actual weight of the package</li>
          <li>Delivery destination (city, state, and PIN code)</li>
          <li>Number of pieces in the order</li>
        </ul>
        <p>The exact shipping charge will be confirmed to you before payment. Shipping charges are non-refundable. For bulk orders, we may negotiate special shipping rates — please discuss this at the time of placing your bulk order.</p>
      </div>

      <div class="bww-policy-section">
        <h2>5. Packaging</h2>
        <p>All trishuls are individually wrapped and packed in protective material to prevent movement and damage during transit. Large or sharp-edged items are wrapped in bubble wrap and placed in reinforced cardboard boxes. We take full care in packing your order for safe delivery.</p>
      </div>

      <div class="bww-policy-section">
        <h2>6. Tracking &amp; Updates</h2>
        <p>Once your order is dispatched, we will send you the tracking details (courier name and AWB/tracking number) via WhatsApp at the number provided at the time of order. You can use this tracking number to monitor your delivery on the courier's website or app.</p>
        <p>If you do not receive tracking details within 6 business days of payment, please contact us.</p>
      </div>

      <div class="bww-policy-section">
        <h2>7. Damage in Transit</h2>
        <p>Despite our careful packaging, damage can occasionally occur during transit. If your order arrives damaged:</p>
        <ul>
          <li>Do not discard the original packaging</li>
          <li>Record an <strong>unboxing video</strong> clearly showing the condition of the package and the product</li>
          <li>Report the damage to us <strong>within 24 hours of delivery</strong> via WhatsApp with the video and photographs</li>
        </ul>
        <p>Claims made after 24 hours or without an unboxing video cannot be processed. Upon verification, we will arrange a replacement at no additional cost to you.</p>
      </div>

      <div class="bww-policy-section">
        <h2>8. Incorrect Delivery Address</h2>
        <p>Please ensure the delivery address you provide is accurate and complete, including PIN code. Bhola Welding Works is not responsible for delays or failed deliveries caused by an incorrect, incomplete, or undeliverable address provided by the customer. Additional charges may apply for re-delivery attempts.</p>
      </div>

      <div class="bww-policy-section">
        <h2>9. Failed Delivery / Return to Origin</h2>
        <p>If the courier is unable to deliver your order after multiple attempts (due to absence at the address, refused delivery, or undeliverable address), the package may be returned to our workshop. In such cases, re-dispatch charges will apply. We will contact you via WhatsApp to resolve the delivery.</p>
      </div>

      <div class="bww-policy-section">
        <h2>10. Contact for Shipping Queries</h2>
        <ul>
          <li>WhatsApp: <a href="https://wa.me/918770706900">+91 8770706900</a> (fastest)</li>
          <li>Email: <a href="mailto:mukundvishwakarma427@gmail.com">mukundvishwakarma427@gmail.com</a></li>
          <li>Instagram: <a href="https://instagram.com/bhola_welding_works" target="_blank" rel="noopener">@bhola_welding_works</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}
