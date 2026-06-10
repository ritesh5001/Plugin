<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function rv_get_all_pages() {
	return [
		'rv-home'              => [ 'title' => 'Home',                       'content' => rv_page_home() ],
		'about-us'             => [ 'title' => 'About Us',                   'content' => rv_page_about() ],
		'services'             => [ 'title' => 'Services',                   'content' => rv_page_services() ],
		'contact'              => [ 'title' => 'Contact',                    'content' => rv_page_contact() ],
		'privacy-policy'       => [ 'title' => 'Privacy Policy',             'content' => rv_page_privacy() ],
		'terms-of-service'     => [ 'title' => 'Terms of Service',           'content' => rv_page_tos() ],
		'terms-and-conditions' => [ 'title' => 'Terms &amp; Conditions',     'content' => rv_page_tandc() ],
		'refund-policy'        => [ 'title' => 'Refund &amp; Return Policy', 'content' => rv_page_refund() ],
		'cancellation-policy'  => [ 'title' => 'Cancellation Policy',        'content' => rv_page_cancel() ],
		'shipping-policy'      => [ 'title' => 'Shipping &amp; Delivery Policy', 'content' => rv_page_shipping() ],
	];
}

/* ═══════════════════════════════════════════════════════════════
   HOME
═══════════════════════════════════════════════════════════════ */
function rv_page_home() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="rv-hero">
  <div class="rv-wrap">
    <span class="rv-chip">Premium UK Fashion</span>
    <img src="%%BRAND_LOGO%%" alt="Royal Vastar" class="rv-hero-logo">
    <h1 class="rv-h1">Royal Vastar</h1>
    <p class="rv-hero-intro">Your destination for stylish, trendy, and premium fashion wear. We focus on providing high-quality clothing with modern designs at affordable prices — delivering fashionable outfits that combine comfort, style, and confidence for everyday wear.</p>
    <div class="rv-btn-group" style="margin-top:36px;">
      <a href="https://wa.me/447908369765" class="rv-btn" target="_blank" rel="noopener">&#128247; Order on WhatsApp</a>
      <a href="%%URL_SERVICES%%" class="rv-btn rv-btn-outline">Shop Collections</a>
    </div>
  </div>
</div>

<div class="rv-stats">
  <div class="rv-stats-inner">
    <div class="rv-stat-item">
      <span class="rv-stat-number">500+</span>
      <span class="rv-stat-label">Happy Customers</span>
    </div>
    <div class="rv-stat-item">
      <span class="rv-stat-number">Premium</span>
      <span class="rv-stat-label">Quality Fabrics</span>
    </div>
    <div class="rv-stat-item">
      <span class="rv-stat-number">Fast</span>
      <span class="rv-stat-label">UK Delivery</span>
    </div>
    <div class="rv-stat-item">
      <span class="rv-stat-number">Easy</span>
      <span class="rv-stat-label">7-Day Returns</span>
    </div>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-section-heading">
      <span class="rv-chip">What We Offer</span>
      <h2 class="rv-h2">Fashion That Speaks Your Style</h2>
      <div class="rv-divider"></div>
      <p>Every piece in our collection is carefully selected to ensure the best quality and latest trends for our customers.</p>
    </div>
    <div class="rv-grid">
      <div class="rv-card">
        <span class="rv-card-icon">&#128084;</span>
        <h3>Men's Wear</h3>
        <p>Explore our curated range of men's clothing — from smart-casual shirts to modern streetwear styles, designed for the confident man.</p>
        <ul>
          <li>Premium quality fabrics</li>
          <li>Modern, contemporary designs</li>
          <li>Comfortable everyday fits</li>
        </ul>
      </div>
      <div class="rv-card">
        <span class="rv-card-icon">&#128141;</span>
        <h3>Women's Wear</h3>
        <p>Discover elegant and trendy women's clothing that effortlessly blends style, comfort, and confidence for every occasion.</p>
        <ul>
          <li>Versatile day-to-night looks</li>
          <li>Flattering, fashion-forward cuts</li>
          <li>High-quality materials</li>
        </ul>
      </div>
      <div class="rv-card">
        <span class="rv-card-icon">&#128081;</span>
        <h3>Accessories &amp; Premium</h3>
        <p>Complete your look with our exclusive accessories and premium collection — crafted for those who demand the finest.</p>
        <ul>
          <li>Exclusive limited-edition pieces</li>
          <li>Premium material selection</li>
          <li>Perfect gift options</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-surface);">
  <div class="rv-wrap">
    <div class="rv-section-heading">
      <span class="rv-chip">Why Royal Vastar</span>
      <h2 class="rv-h2">Quality You Can Trust</h2>
      <div class="rv-divider"></div>
    </div>
    <ul class="rv-why-list">
      <li>
        <span class="rv-why-icon">&#10004;</span>
        <div class="rv-why-text">
          <strong>Quality Fabrics</strong>
          <span>We source only premium materials that look great and stand the test of time.</span>
        </div>
      </li>
      <li>
        <span class="rv-why-icon">&#128293;</span>
        <div class="rv-why-text">
          <strong>Trendy Designs</strong>
          <span>Stay ahead of fashion with our regularly updated, trend-led collections.</span>
        </div>
      </li>
      <li>
        <span class="rv-why-icon">&#128176;</span>
        <div class="rv-why-text">
          <strong>Affordable Prices</strong>
          <span>Premium fashion doesn't have to break the bank. We keep pricing fair and transparent.</span>
        </div>
      </li>
      <li>
        <span class="rv-why-icon">&#128666;</span>
        <div class="rv-why-text">
          <strong>Fast UK Delivery</strong>
          <span>Orders dispatched within 1–3 working days. Standard delivery 2–5 working days.</span>
        </div>
      </li>
      <li>
        <span class="rv-why-icon">&#128260;</span>
        <div class="rv-why-text">
          <strong>Easy Returns</strong>
          <span>Not satisfied? Return within 7 days of delivery — no unnecessary hassle.</span>
        </div>
      </li>
      <li>
        <span class="rv-why-icon">&#128172;</span>
        <div class="rv-why-text">
          <strong>Dedicated Support</strong>
          <span>Real people ready to help via email, WhatsApp, or Instagram DM.</span>
        </div>
      </li>
    </ul>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-cta">
      <h2>Ready to Elevate Your Wardrobe?</h2>
      <p>Browse our latest collections and find your perfect style today. Reach out on WhatsApp for personalised assistance.</p>
      <div class="rv-btn-group">
        <a href="%%URL_SERVICES%%" class="rv-btn">Shop Collections</a>
        <a href="https://wa.me/447908369765" class="rv-btn rv-btn-outline" target="_blank" rel="noopener">&#128247; WhatsApp Us</a>
      </div>
    </div>
  </div>
</div>

<div class="rv-home-footer">
  <div class="rv-home-footer-inner">
    <div class="rv-home-footer-col">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="%%URL_HOME%%">Home</a></li>
        <li><a href="%%URL_ABOUT%%">About Us</a></li>
        <li><a href="%%URL_SERVICES%%">Collections</a></li>
        <li><a href="%%URL_CONTACT%%">Contact Us</a></li>
      </ul>
    </div>
    <div class="rv-home-footer-col">
      <h4>Our Policies</h4>
      <ul>
        <li><a href="%%URL_PRIVACY%%">Privacy Policy</a></li>
        <li><a href="%%URL_TERMS%%">Terms of Service</a></li>
        <li><a href="%%URL_TERMS_C%%">Terms &amp; Conditions</a></li>
        <li><a href="%%URL_REFUND%%">Refund &amp; Return Policy</a></li>
        <li><a href="%%URL_CANCEL%%">Cancellation Policy</a></li>
        <li><a href="%%URL_SHIPPING%%">Shipping Policy</a></li>
      </ul>
    </div>
    <div class="rv-home-footer-col">
      <h4>Contact</h4>
      <ul>
        <li><a href="https://wa.me/447908369765" target="_blank" rel="noopener">WhatsApp: +44 7908 369765</a></li>
        <li><a href="mailto:royalvastar@icloud.com">royalvastar@icloud.com</a></li>
        <li><a href="https://www.instagram.com/royalvastar" target="_blank" rel="noopener">@royalvastar</a></li>
      </ul>
    </div>
  </div>
  <div class="rv-home-footer-bottom">
    &copy; 2026 Royal Vastar. All rights reserved. &mdash;
    <a href="%%URL_PRIVACY%%">Privacy Policy</a> &middot;
    <a href="%%URL_TERMS%%">Terms of Service</a> &middot;
    Developed by <a href="https://nextgenfusion.in/" target="_blank" rel="noopener">NextGen Fusion</a>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   ABOUT US
═══════════════════════════════════════════════════════════════ */
function rv_page_about() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="rv-hero">
  <div class="rv-wrap">
    <span class="rv-chip">Our Story</span>
    <h1 class="rv-h1">About <span class="rv-gold-text">Royal Vastar</span></h1>
    <p class="rv-hero-intro">We are more than a fashion brand — we are a statement. Royal Vastar was founded with a single mission: to make premium, trendy fashion accessible to everyone.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-two-col">
      <div class="rv-two-col-content">
        <span class="rv-chip">Who We Are</span>
        <h2>Bringing Royal Style to Everyday Fashion</h2>
        <p>Royal Vastar was born from a passion for fashion and a deep commitment to quality. We believe that every person deserves to feel confident, stylish, and comfortable — without compromising on quality or spending a fortune.</p>
        <p>Our collections are thoughtfully curated to reflect the latest global trends while staying true to timeless elegance. From everyday casual wear to standout statement pieces, Royal Vastar has something for every taste and occasion.</p>
        <p>Based in the UK, we proudly serve customers across the country with fast delivery, hassle-free returns, and exceptional customer care. Customer satisfaction is not just a goal — it is the foundation of everything we do.</p>
        <p>Thank you for choosing Royal Vastar. We look forward to being your favourite fashion destination.</p>
        <div class="rv-btn-group" style="margin-top:32px;">
          <a href="%%URL_CONTACT%%" class="rv-btn">Get In Touch</a>
          <a href="%%URL_SERVICES%%" class="rv-btn rv-btn-outline">View Collections</a>
        </div>
      </div>
      <div>
        <ul class="rv-feature-list">
          <li>
            <div class="rv-feature-icon">&#128081;</div>
            <div class="rv-feature-text">
              <strong>Premium Quality</strong>
              <span>Every item is carefully selected for fabric quality, stitching precision, and lasting comfort.</span>
            </div>
          </li>
          <li>
            <div class="rv-feature-icon">&#10024;</div>
            <div class="rv-feature-text">
              <strong>Latest Trends</strong>
              <span>Our buyers stay ahead of global fashion trends so our collections are always fresh and relevant.</span>
            </div>
          </li>
          <li>
            <div class="rv-feature-icon">&#128176;</div>
            <div class="rv-feature-text">
              <strong>Affordable Luxury</strong>
              <span>We work directly with trusted suppliers to bring you premium fashion at prices that make sense.</span>
            </div>
          </li>
          <li>
            <div class="rv-feature-icon">&#128666;</div>
            <div class="rv-feature-text">
              <strong>Fast UK Delivery</strong>
              <span>Dispatched within 1–3 working days and delivered in 2–5 working days across the UK.</span>
            </div>
          </li>
          <li>
            <div class="rv-feature-icon">&#128260;</div>
            <div class="rv-feature-text">
              <strong>Hassle-Free Returns</strong>
              <span>7-day return policy on all eligible items. Shop with complete confidence.</span>
            </div>
          </li>
          <li>
            <div class="rv-feature-icon">&#128172;</div>
            <div class="rv-feature-text">
              <strong>Dedicated Support</strong>
              <span>Friendly team available via email, WhatsApp, and Instagram — always ready to help.</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-surface);">
  <div class="rv-wrap">
    <div class="rv-cta">
      <h2>Join the Royal Vastar Family</h2>
      <p>Hundreds of satisfied customers across the UK trust Royal Vastar for their fashion needs. Discover why.</p>
      <div class="rv-btn-group">
        <a href="%%URL_SERVICES%%" class="rv-btn">Explore Collections</a>
        <a href="%%URL_CONTACT%%" class="rv-btn rv-btn-outline">Contact Us</a>
      </div>
    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}

/* ═══════════════════════════════════════════════════════════════
   SERVICES
═══════════════════════════════════════════════════════════════ */
function rv_page_services() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="rv-hero">
  <div class="rv-wrap">
    <span class="rv-chip">What We Offer</span>
    <h1 class="rv-h1">Our <span class="rv-gold-text">Collections</span></h1>
    <p class="rv-hero-intro">Discover our carefully curated fashion collections — premium quality clothing and accessories for every style and every occasion.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-section-heading">
      <span class="rv-chip">Our Collections</span>
      <h2 class="rv-h2">Style for Every Occasion</h2>
      <div class="rv-divider"></div>
      <p>From everyday essentials to statement pieces, each collection is built around quality, comfort, and contemporary design.</p>
    </div>
    <div class="rv-grid">
      <div class="rv-card">
        <div class="rv-card-num">01</div>
        <h3>Men's Wear</h3>
        <p>Our men's collection combines modern design with superior comfort. From formal shirts and smart trousers to casual tees and joggers, we have the perfect outfit for every man, every occasion.</p>
        <ul>
          <li>Formal &amp; smart-casual shirts</li>
          <li>Modern trousers &amp; jeans</li>
          <li>Comfortable casual &amp; sportswear</li>
          <li>Seasonal trend-driven collections</li>
        </ul>
      </div>
      <div class="rv-card">
        <div class="rv-card-num">02</div>
        <h3>Women's Wear</h3>
        <p>Our women's collection celebrates femininity and confidence. Explore elegant dresses, stylish tops, and versatile co-ords that take you effortlessly from day to evening.</p>
        <ul>
          <li>Elegant dresses &amp; maxi styles</li>
          <li>Stylish tops, blouses &amp; knitwear</li>
          <li>Co-ord sets &amp; loungewear</li>
          <li>Fashion-forward seasonal pieces</li>
        </ul>
      </div>
      <div class="rv-card">
        <div class="rv-card-num">03</div>
        <h3>Accessories</h3>
        <p>Complete your look with our handpicked accessories — from statement bags and belts to scarves and hats that add the perfect finishing touch to any outfit.</p>
        <ul>
          <li>Bags, belts &amp; wallets</li>
          <li>Scarves, caps &amp; hats</li>
          <li>Jewellery &amp; fashion watches</li>
          <li>New seasonal accessory drops</li>
        </ul>
      </div>
      <div class="rv-card">
        <div class="rv-card-num">04</div>
        <h3>Premium Collection</h3>
        <p>Our premium line features exclusive, limited-edition pieces crafted from the finest materials. For those who want to make a bold statement and stand apart from the crowd.</p>
        <ul>
          <li>Exclusive limited-edition styles</li>
          <li>Finest fabric &amp; material selection</li>
          <li>Signature Royal Vastar designs</li>
          <li>Ideal for gifts &amp; special occasions</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-surface);">
  <div class="rv-wrap">
    <div class="rv-section-heading">
      <span class="rv-chip">How It Works</span>
      <h2 class="rv-h2">Shop with Confidence</h2>
      <div class="rv-divider"></div>
      <p>Getting your Royal Vastar order is simple and straightforward. Here's how:</p>
    </div>
    <div class="rv-process">
      <div class="rv-step">
        <div class="rv-step-num">1</div>
        <h4>Browse &amp; Choose</h4>
        <p>Explore our collections and find the pieces that match your personal style and budget.</p>
      </div>
      <div class="rv-step">
        <div class="rv-step-num">2</div>
        <h4>Order via WhatsApp</h4>
        <p>Contact us on WhatsApp with your chosen item, size, and delivery address. We'll confirm availability instantly.</p>
      </div>
      <div class="rv-step">
        <div class="rv-step-num">3</div>
        <h4>Confirm &amp; Pay</h4>
        <p>We share your order total and secure payment details. Payments processed promptly and safely.</p>
      </div>
      <div class="rv-step">
        <div class="rv-step-num">4</div>
        <h4>Delivered to Your Door</h4>
        <p>Order dispatched within 1–3 working days. Delivered across the UK in 2–5 working days with tracking.</p>
      </div>
    </div>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-cta">
      <h2>Ready to Find Your Perfect Look?</h2>
      <p>Get in touch today via WhatsApp or email and we'll help you find exactly what you're looking for.</p>
      <div class="rv-btn-group">
        <a href="https://wa.me/447908369765" class="rv-btn" target="_blank" rel="noopener">&#128247; Order on WhatsApp</a>
        <a href="%%URL_CONTACT%%" class="rv-btn rv-btn-outline">Contact Us</a>
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
function rv_page_contact() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="rv-hero">
  <div class="rv-wrap">
    <span class="rv-chip">Get In Touch</span>
    <h1 class="rv-h1">Contact <span class="rv-gold-text">Royal Vastar</span></h1>
    <p class="rv-hero-intro">Have a question about an order, a product, or our services? We're here to help. Reach out via email, WhatsApp, or Instagram DM.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-two-col">

      <div class="rv-contact-panel">
        <h3>Our Contact Details</h3>
        <div class="rv-contact-item">
          <div class="rv-contact-item-icon">&#128247;</div>
          <div class="rv-contact-item-text">
            <strong>WhatsApp</strong>
            <a href="https://wa.me/447908369765" target="_blank" rel="noopener">+44 7908 369765</a>
          </div>
        </div>
        <div class="rv-contact-item">
          <div class="rv-contact-item-icon">&#9993;</div>
          <div class="rv-contact-item-text">
            <strong>Email</strong>
            <a href="mailto:royalvastar@icloud.com">royalvastar@icloud.com</a>
          </div>
        </div>
        <div class="rv-contact-item">
          <div class="rv-contact-item-icon">&#128248;</div>
          <div class="rv-contact-item-text">
            <strong>Instagram</strong>
            <a href="https://www.instagram.com/royalvastar" target="_blank" rel="noopener">@royalvastar</a>
          </div>
        </div>
        <div class="rv-contact-item">
          <div class="rv-contact-item-icon">&#128336;</div>
          <div class="rv-contact-item-text">
            <strong>Response Time</strong>
            <span>We aim to reply within 24 hours on working days.</span>
          </div>
        </div>
        <div class="rv-contact-item">
          <div class="rv-contact-item-icon">&#127981;</div>
          <div class="rv-contact-item-text">
            <strong>Business Name</strong>
            <span>Royal Vastar</span>
          </div>
        </div>
        <div class="rv-social-row">
          <a href="https://wa.me/447908369765" class="rv-social-link" target="_blank" rel="noopener">
            <i class="fab fa-whatsapp" aria-hidden="true"></i> WhatsApp
          </a>
          <a href="https://www.instagram.com/royalvastar" class="rv-social-link" target="_blank" rel="noopener">
            <i class="fab fa-instagram" aria-hidden="true"></i> Instagram
          </a>
          <a href="mailto:royalvastar@icloud.com" class="rv-social-link">
            <i class="far fa-envelope" aria-hidden="true"></i> Email
          </a>
        </div>
      </div>

      <div class="rv-form-panel">
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
function rv_page_privacy() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="rv-hero">
  <div class="rv-wrap">
    <span class="rv-chip">Legal</span>
    <h1 class="rv-h1">Privacy <span class="rv-gold-text">Policy</span></h1>
    <p class="rv-hero-intro">How Royal Vastar collects, uses, and protects your personal information.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-policy">

      <div class="rv-policy-meta">
        <span><strong>Business:</strong> Royal Vastar</span>
        <span><strong>Effective Date:</strong> 1 January 2025</span>
        <span><strong>Governing Law:</strong> United Kingdom</span>
      </div>

      <div class="rv-policy-section">
        <h2>1. Introduction</h2>
        <p>Royal Vastar ("we", "us", "our") is committed to protecting and respecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your personal information when you visit our website royalvastar.com or make a purchase from us.</p>
        <p>This policy complies with the UK General Data Protection Regulation (UK GDPR) and the Data Protection Act 2018. By using our website or purchasing from us, you agree to the terms of this policy. If you do not agree, please do not use our services.</p>
      </div>

      <div class="rv-policy-section">
        <h2>2. Information We Collect</h2>
        <p>We collect personal information that you voluntarily provide when placing an order, contacting us, or interacting with our website, including:</p>
        <ul>
          <li><strong>Identity Data:</strong> First name, last name</li>
          <li><strong>Contact Data:</strong> Email address, phone number, WhatsApp number</li>
          <li><strong>Address Data:</strong> Delivery address and billing address</li>
          <li><strong>Transaction Data:</strong> Products purchased, order amounts, payment method used</li>
          <li><strong>Communication Data:</strong> Messages sent via email, Instagram DM, or WhatsApp</li>
          <li><strong>Technical Data:</strong> IP address, browser type, pages visited (collected automatically via cookies)</li>
        </ul>
        <p>We do not collect or store sensitive personal data (such as health or full financial account data) unless explicitly required and consented to.</p>
      </div>

      <div class="rv-policy-section">
        <h2>3. How We Collect Your Information</h2>
        <p>We collect personal data through:</p>
        <ul>
          <li>Order forms and checkout processes on our website</li>
          <li>Emails, WhatsApp messages, and Instagram DMs you send to us</li>
          <li>Cookies and similar tracking technologies when you visit our website</li>
          <li>Interactions with our social media accounts</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>4. Legal Basis for Processing</h2>
        <p>Under UK GDPR, we rely on the following legal bases for processing your personal data:</p>
        <ul>
          <li><strong>Contract:</strong> Processing is necessary to fulfil your order.</li>
          <li><strong>Legitimate Interests:</strong> To improve our services, respond to enquiries, and prevent fraud.</li>
          <li><strong>Consent:</strong> Where you have explicitly agreed to marketing communications.</li>
          <li><strong>Legal Obligation:</strong> Where required to comply with a legal duty.</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>5. How We Use Your Information</h2>
        <p>We use your personal data to:</p>
        <ul>
          <li>Process and fulfil your orders</li>
          <li>Send order confirmations and dispatch notifications</li>
          <li>Respond to customer service enquiries</li>
          <li>Process returns, refunds, and complaints</li>
          <li>Improve our website and services</li>
          <li>Comply with legal and regulatory obligations</li>
          <li>Send marketing communications (only with your explicit consent)</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>6. Sharing Your Information</h2>
        <p>We do not sell, trade, or rent your personal information to third parties. We may share your data only in the following limited circumstances:</p>
        <ul>
          <li><strong>Delivery Partners:</strong> We share your name, address, and phone number with our courier or delivery partner to fulfil your order.</li>
          <li><strong>Payment Processors:</strong> Secure payment providers who process transactions on our behalf. We do not store full payment card details.</li>
          <li><strong>Legal Compliance:</strong> Where required by law, regulation, or court order.</li>
        </ul>
        <p>All third parties are required to keep your information confidential and to process it only as instructed by us.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Data Retention</h2>
        <p>We retain your personal data only for as long as necessary to fulfil the purposes for which it was collected, including legal, accounting, or reporting requirements:</p>
        <ul>
          <li>Order and transaction data: retained for 7 years (HMRC requirement)</li>
          <li>Customer service communications: retained for 2 years</li>
          <li>Marketing consent records: retained until you withdraw consent</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>8. Cookies</h2>
        <p>Our website uses cookies to enhance your browsing experience. Cookies are small files placed on your device that help us remember your preferences, understand usage patterns, and improve site functionality. You can control cookies through your browser settings. Disabling certain cookies may affect your experience on our site.</p>
      </div>

      <div class="rv-policy-section">
        <h2>9. Your Rights Under UK GDPR</h2>
        <p>You have the following rights regarding your personal data:</p>
        <ul>
          <li><strong>Right to Access:</strong> Request a copy of the personal data we hold about you.</li>
          <li><strong>Right to Rectification:</strong> Request correction of inaccurate or incomplete data.</li>
          <li><strong>Right to Erasure:</strong> Request deletion of your data in certain circumstances.</li>
          <li><strong>Right to Restrict Processing:</strong> Request that we limit how we use your data.</li>
          <li><strong>Right to Data Portability:</strong> Receive your data in a structured, commonly used format.</li>
          <li><strong>Right to Object:</strong> Object to processing based on legitimate interests or for direct marketing.</li>
          <li><strong>Right to Withdraw Consent:</strong> Where processing is based on consent, you may withdraw it at any time.</li>
        </ul>
        <p>To exercise any of these rights, please contact us at royalvastar@icloud.com. We will respond within one calendar month.</p>
      </div>

      <div class="rv-policy-section">
        <h2>10. Data Security</h2>
        <p>We implement appropriate technical and organisational measures to protect your personal data against accidental loss, unauthorised access, disclosure, or destruction, including secure HTTPS connections and restricted internal access to personal data.</p>
        <p>Despite these measures, no internet transmission is completely secure, and we cannot guarantee absolute security.</p>
      </div>

      <div class="rv-policy-section">
        <h2>11. Third-Party Links</h2>
        <p>Our website may contain links to third-party websites (including social media profiles). We are not responsible for the privacy practices of those sites and encourage you to review their own privacy policies.</p>
      </div>

      <div class="rv-policy-section">
        <h2>12. Children's Privacy</h2>
        <p>Our services are not directed at children under the age of 16. We do not knowingly collect personal data from children. If you believe a child has provided us with personal information, please contact us immediately.</p>
      </div>

      <div class="rv-policy-section">
        <h2>13. Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated effective date. We encourage you to review this policy periodically.</p>
      </div>

      <div class="rv-policy-section">
        <h2>14. Contact &amp; Complaints</h2>
        <p>For questions, requests, or complaints about this Privacy Policy, please contact us:</p>
        <div class="rv-policy-highlight">
          <p><strong>Royal Vastar</strong><br>
          Email: royalvastar@icloud.com<br>
          WhatsApp: +44 7908 369765<br>
          Instagram: @royalvastar</p>
        </div>
        <p>If you are unhappy with our response, you have the right to lodge a complaint with the Information Commissioner's Office (ICO) at ico.org.uk or by calling 0303 123 1113.</p>
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
function rv_page_tos() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="rv-hero">
  <div class="rv-wrap">
    <span class="rv-chip">Legal</span>
    <h1 class="rv-h1">Terms of <span class="rv-gold-text">Service</span></h1>
    <p class="rv-hero-intro">The terms that govern your use of the Royal Vastar website and services.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-policy">

      <div class="rv-policy-meta">
        <span><strong>Business:</strong> Royal Vastar</span>
        <span><strong>Effective Date:</strong> 1 January 2025</span>
        <span><strong>Governing Law:</strong> England &amp; Wales</span>
      </div>

      <div class="rv-policy-section">
        <h2>1. Agreement to Terms</h2>
        <p>By accessing or using the Royal Vastar website (royalvastar.com), you agree to be bound by these Terms of Service. If you do not agree to these terms, please do not use our website or services.</p>
        <p>These Terms of Service constitute a legally binding agreement between you and Royal Vastar. We reserve the right to update these terms at any time. Continued use of our website constitutes acceptance of any revised terms.</p>
      </div>

      <div class="rv-policy-section">
        <h2>2. Use of the Website</h2>
        <p>You agree to use our website only for lawful purposes and in a manner that does not infringe the rights of others. You must not:</p>
        <ul>
          <li>Use the website in any unlawful or fraudulent manner</li>
          <li>Transmit unsolicited or unauthorised advertising or promotional material</li>
          <li>Attempt to gain unauthorised access to our website, servers, or databases</li>
          <li>Reproduce, duplicate, copy, or resell any part of our website in violation of these terms</li>
          <li>Upload or transmit any malicious code, viruses, or harmful content</li>
          <li>Collect or harvest personal data of other users without consent</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>3. Intellectual Property</h2>
        <p>All content on this website — including text, images, logos, designs, graphics, and other materials — is the property of Royal Vastar or its content suppliers and is protected by applicable intellectual property laws.</p>
        <p>You may not copy, reproduce, distribute, modify, or create derivative works from any content on our website without our prior written consent. The Royal Vastar name, logo, and branding are protected trademarks.</p>
      </div>

      <div class="rv-policy-section">
        <h2>4. Product Information</h2>
        <p>We make every effort to ensure that the information on our website is accurate and up to date. However:</p>
        <ul>
          <li>Product images are for illustrative purposes and actual colours may vary slightly from screen to screen.</li>
          <li>Product descriptions, prices, and availability are subject to change without notice.</li>
          <li>We reserve the right to refuse or cancel any order if a product is out of stock or a pricing error has occurred.</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>5. Orders and Payment</h2>
        <p>By placing an order, you confirm that you are legally capable of entering into binding contracts and are at least 18 years of age, or have parental/guardian consent. Payment must be received in full before any order is processed and dispatched.</p>
      </div>

      <div class="rv-policy-section">
        <h2>6. Limitation of Liability</h2>
        <p>To the fullest extent permitted by applicable law, Royal Vastar shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or related to your use of our website or services.</p>
        <p>Our total liability to you for any claim shall not exceed the amount paid by you for the specific product or service that is the subject of the claim.</p>
        <p>Nothing in these terms shall limit or exclude our liability for death or personal injury caused by our negligence, fraud or fraudulent misrepresentation, or any other liability that cannot be excluded by law.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Third-Party Links</h2>
        <p>Our website may contain links to third-party websites. These links are provided for your convenience only. We have no control over the content of those sites and accept no responsibility for them or for any loss or damage arising from your use of them.</p>
      </div>

      <div class="rv-policy-section">
        <h2>8. Disclaimer of Warranties</h2>
        <p>Our website and services are provided on an "as is" and "as available" basis without any warranties of any kind, either express or implied, including but not limited to implied warranties of merchantability, fitness for a particular purpose, or non-infringement.</p>
        <p>We do not warrant that the website will be uninterrupted, error-free, or free of viruses or other harmful components.</p>
      </div>

      <div class="rv-policy-section">
        <h2>9. Consumer Rights</h2>
        <p>Nothing in these Terms of Service affects your statutory rights as a consumer under UK law, including rights under the Consumer Rights Act 2015 and the Consumer Contracts (Information, Cancellation and Additional Charges) Regulations 2013.</p>
      </div>

      <div class="rv-policy-section">
        <h2>10. Governing Law and Jurisdiction</h2>
        <p>These Terms of Service shall be governed by and construed in accordance with the laws of England and Wales. Any disputes arising under or in connection with these terms shall be subject to the exclusive jurisdiction of the courts of England and Wales.</p>
      </div>

      <div class="rv-policy-section">
        <h2>11. Changes to These Terms</h2>
        <p>We reserve the right to modify these Terms of Service at any time. Changes will be posted on this page with an updated effective date. Your continued use of our website after such changes constitutes your acceptance of the new terms.</p>
      </div>

      <div class="rv-policy-section">
        <h2>12. Contact Us</h2>
        <p>If you have any questions about these Terms of Service, please contact us:</p>
        <div class="rv-policy-highlight">
          <p><strong>Royal Vastar</strong><br>
          Email: royalvastar@icloud.com<br>
          WhatsApp: +44 7908 369765<br>
          Instagram: @royalvastar</p>
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
function rv_page_tandc() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="rv-hero">
  <div class="rv-wrap">
    <span class="rv-chip">Legal</span>
    <h1 class="rv-h1">Terms &amp; <span class="rv-gold-text">Conditions</span></h1>
    <p class="rv-hero-intro">The specific terms governing orders, payments, and your relationship with Royal Vastar.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-policy">

      <div class="rv-policy-meta">
        <span><strong>Business:</strong> Royal Vastar</span>
        <span><strong>Effective Date:</strong> 1 January 2025</span>
        <span><strong>Governing Law:</strong> England &amp; Wales</span>
      </div>

      <div class="rv-policy-section">
        <h2>1. Acceptance of Terms</h2>
        <p>By placing an order with Royal Vastar, browsing our website, or contacting us for the purpose of purchasing, you accept and agree to be bound by these Terms and Conditions in full. If you do not agree, you must not use our services.</p>
      </div>

      <div class="rv-policy-section">
        <h2>2. Our Details</h2>
        <div class="rv-policy-highlight">
          <p><strong>Business Name:</strong> Royal Vastar<br>
          <strong>Email:</strong> royalvastar@icloud.com<br>
          <strong>WhatsApp:</strong> +44 7908 369765<br>
          <strong>Website:</strong> royalvastar.com</p>
        </div>
      </div>

      <div class="rv-policy-section">
        <h2>3. Products and Availability</h2>
        <p>All products are subject to availability. We reserve the right to discontinue any product at any time without notice. Product images on our website or social media are for illustrative purposes only; actual colours, shades, and sizing may vary slightly.</p>
        <p>We make every reasonable effort to ensure product descriptions are accurate. However, we do not warrant that product descriptions or other content on our website are accurate, complete, or error-free.</p>
      </div>

      <div class="rv-policy-section">
        <h2>4. Pricing</h2>
        <p>All prices are quoted in British Pounds Sterling (GBP) and are inclusive of any applicable VAT where stated. Prices may change without notice. The price payable for an order is the price confirmed at the time the order is accepted.</p>
        <p>We reserve the right to correct any pricing errors. If a pricing error is identified after an order is placed, we will contact you to either confirm the correct price or cancel the order with a full refund.</p>
      </div>

      <div class="rv-policy-section">
        <h2>5. Placing an Order</h2>
        <p>Orders may be placed via our website, WhatsApp, email, or Instagram DM. By submitting an order, you are making an offer to purchase the relevant products. An order is only accepted by us when we confirm it in writing (via email, WhatsApp, or DM) and receive payment.</p>
        <p>You must provide accurate and complete information when placing an order, including your full name, delivery address, and contact details. We are not liable for orders that cannot be delivered due to inaccurate information provided by you.</p>
      </div>

      <div class="rv-policy-section">
        <h2>6. Payment</h2>
        <p>Payment is required in full before your order is processed and dispatched. We accept payments via the methods communicated to you at time of order. All transactions are processed securely.</p>
        <p>We do not store your full payment card or bank details. Any payment information shared with us is used solely to process your order.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Cancellations</h2>
        <p>Orders may be cancelled within 12 hours of being placed, provided the order has not already been processed or dispatched. To cancel, contact us immediately via email or Instagram DM.</p>
        <p>Once an order has been processed or dispatched, cancellation may not be possible. Please refer to our Cancellation Policy for full details.</p>
      </div>

      <div class="rv-policy-section">
        <h2>8. Delivery</h2>
        <p>We aim to dispatch orders within 1–3 working days of confirmed payment. UK standard delivery typically takes 2–5 working days after dispatch. Delivery timescales are estimates and may be affected by factors outside our control (such as courier delays or extreme weather).</p>
        <p>Royal Vastar is not responsible for delays caused by third-party courier services or events outside our reasonable control. Please refer to our Shipping Policy for full details.</p>
      </div>

      <div class="rv-policy-section">
        <h2>9. Returns and Refunds</h2>
        <p>We accept returns within 7 days of delivery. Items must be unused, unworn, and in their original packaging with all tags attached. Sale items and undergarments are non-returnable. Customers are responsible for return shipping costs unless the item received is damaged or incorrect.</p>
        <p>Please refer to our Refund &amp; Return Policy for full details.</p>
      </div>

      <div class="rv-policy-section">
        <h2>10. Damaged or Incorrect Items</h2>
        <p>If you receive a damaged or incorrect product, you must contact us within 48 hours of delivery with supporting photographic evidence. We will arrange a replacement or full refund at no additional cost to you.</p>
      </div>

      <div class="rv-policy-section">
        <h2>11. Consumer Rights</h2>
        <p>These Terms and Conditions do not affect your statutory rights under UK law, including the Consumer Rights Act 2015. You have the right to receive goods that are as described, of satisfactory quality, and fit for purpose.</p>
      </div>

      <div class="rv-policy-section">
        <h2>12. Limitation of Liability</h2>
        <p>Our total liability to you arising from or in connection with any order shall not exceed the total amount you paid for that order. We shall not be liable for any indirect, consequential, or incidental loss or damage howsoever caused.</p>
      </div>

      <div class="rv-policy-section">
        <h2>13. Intellectual Property</h2>
        <p>All content on the Royal Vastar website and social media platforms — including text, images, logos, branding, and product photography — is the intellectual property of Royal Vastar. Unauthorised use, reproduction, or distribution is strictly prohibited.</p>
      </div>

      <div class="rv-policy-section">
        <h2>14. Privacy</h2>
        <p>Your personal information is handled in accordance with our Privacy Policy, which forms part of these Terms and Conditions.</p>
      </div>

      <div class="rv-policy-section">
        <h2>15. Governing Law</h2>
        <p>These Terms and Conditions are governed by the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the courts of England and Wales.</p>
      </div>

      <div class="rv-policy-section">
        <h2>16. Contact Us</h2>
        <p>For any questions about these Terms and Conditions, please contact us:</p>
        <div class="rv-policy-highlight">
          <p><strong>Royal Vastar</strong><br>
          Email: royalvastar@icloud.com<br>
          WhatsApp: +44 7908 369765<br>
          Instagram: @royalvastar</p>
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
function rv_page_refund() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="rv-hero">
  <div class="rv-wrap">
    <span class="rv-chip">Legal</span>
    <h1 class="rv-h1">Refund &amp; Return <span class="rv-gold-text">Policy</span></h1>
    <p class="rv-hero-intro">Your satisfaction is our priority. Here's everything you need to know about returns and refunds.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-policy">

      <div class="rv-policy-meta">
        <span><strong>Business:</strong> Royal Vastar</span>
        <span><strong>Return Window:</strong> 7 Days from Delivery</span>
        <span><strong>Governing Law:</strong> England &amp; Wales</span>
      </div>

      <div class="rv-policy-highlight">
        <p>At Royal Vastar, we want you to be completely satisfied with your purchase. If you are not happy with your order for any eligible reason, we offer a straightforward returns process.</p>
      </div>

      <div class="rv-policy-section">
        <h2>1. Return Eligibility</h2>
        <p>Returns are accepted within <strong>7 days of the delivery date</strong>. To be eligible for a return, items must meet all of the following criteria:</p>
        <ul>
          <li>Returned within 7 calendar days of delivery</li>
          <li>Items must be unused and unworn</li>
          <li>Items must be in their original condition and packaging</li>
          <li>All original tags must be attached and intact</li>
          <li>Items must not be washed, altered, or damaged by the customer</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>2. Non-Returnable Items</h2>
        <p>The following items are not eligible for return or refund under any circumstances:</p>
        <ul>
          <li>Sale items and items purchased with a discount code (unless faulty)</li>
          <li>Undergarments, swimwear, and intimate apparel (for hygiene reasons)</li>
          <li>Items that have been worn, washed, or altered</li>
          <li>Items without original tags or packaging</li>
          <li>Personalised or custom-ordered items</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>3. How to Request a Return</h2>
        <p>To initiate a return, please follow these steps:</p>
        <ul>
          <li>Contact us within 7 days of delivery via email (royalvastar@icloud.com) or Instagram DM (@royalvastar)</li>
          <li>Include your order details, the item(s) you wish to return, and the reason for the return</li>
          <li>We will respond with return instructions and the return address</li>
          <li>Securely package your items and send them back using a tracked postal service</li>
        </ul>
        <p>We strongly recommend using a tracked delivery service for your return, as we cannot be held responsible for items lost in transit.</p>
      </div>

      <div class="rv-policy-section">
        <h2>4. Return Shipping Costs</h2>
        <p>Customers are responsible for the cost of return shipping, except in the following circumstances:</p>
        <ul>
          <li>You received a damaged or defective item</li>
          <li>You received an incorrect item (wrong product or size from your order)</li>
        </ul>
        <p>In these cases, we will cover the return shipping cost or arrange a collection. Please contact us within <strong>48 hours of delivery</strong> with photographic evidence of the issue.</p>
      </div>

      <div class="rv-policy-section">
        <h2>5. Refund Process</h2>
        <p>Once we receive your returned items and complete an inspection, we will notify you of the outcome. If approved, your refund will be processed within <strong>5–7 working days</strong>.</p>
        <p>Refunds will be issued via the original payment method used for the purchase. Please note that the time taken for the refund to appear in your account may vary depending on your bank or payment provider.</p>
      </div>

      <div class="rv-policy-section">
        <h2>6. Partial Refunds</h2>
        <p>In certain circumstances, a partial refund may be issued where only part of an order is eligible for return, or where items show signs of use that do not warrant a full refund.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Exchanges</h2>
        <p>We do not operate a direct exchange programme at this time. If you would like a different size or colour, please return your original item for a refund and place a new order for your preferred item.</p>
      </div>

      <div class="rv-policy-section">
        <h2>8. Damaged or Incorrect Items</h2>
        <p>If you receive a damaged, defective, or incorrect item, please contact us within <strong>48 hours of delivery</strong>. Send us:</p>
        <ul>
          <li>Your order confirmation details</li>
          <li>Clear photographs of the damaged/incorrect item</li>
          <li>A brief description of the issue</li>
        </ul>
        <p>We will arrange a replacement or full refund, including return shipping costs, at no additional cost to you.</p>
      </div>

      <div class="rv-policy-section">
        <h2>9. Your Statutory Rights</h2>
        <p>This Returns Policy does not affect your statutory rights under UK consumer law, including your rights under the Consumer Rights Act 2015. If goods are not of satisfactory quality, not as described, or not fit for purpose, you are entitled to a repair, replacement, or refund.</p>
      </div>

      <div class="rv-policy-section">
        <h2>10. Contact Us</h2>
        <p>If you have any questions about our Refund &amp; Return Policy, please get in touch:</p>
        <div class="rv-policy-highlight">
          <p><strong>Royal Vastar</strong><br>
          Email: royalvastar@icloud.com<br>
          WhatsApp: +44 7908 369765<br>
          Instagram: @royalvastar</p>
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
function rv_page_cancel() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="rv-hero">
  <div class="rv-wrap">
    <span class="rv-chip">Legal</span>
    <h1 class="rv-h1">Cancellation <span class="rv-gold-text">Policy</span></h1>
    <p class="rv-hero-intro">Everything you need to know about cancelling an order with Royal Vastar.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-policy">

      <div class="rv-policy-meta">
        <span><strong>Business:</strong> Royal Vastar</span>
        <span><strong>Cancellation Window:</strong> Within 12 Hours of Order</span>
        <span><strong>Governing Law:</strong> England &amp; Wales</span>
      </div>

      <div class="rv-policy-section">
        <h2>1. Cancellation Window</h2>
        <p>Orders may be cancelled within <strong>12 hours</strong> of being placed, provided the order has not yet been processed or dispatched. To request a cancellation, contact us immediately via email or Instagram DM as soon as possible after placing the order.</p>
        <div class="rv-policy-highlight">
          <p><strong>Important:</strong> Once your order has been processed and dispatched, it can no longer be cancelled. In this case, you may be able to return the item once it has been delivered — please refer to our Refund &amp; Return Policy.</p>
        </div>
      </div>

      <div class="rv-policy-section">
        <h2>2. How to Request a Cancellation</h2>
        <p>To cancel your order within the 12-hour window, contact us immediately via one of the following:</p>
        <ul>
          <li><strong>Email:</strong> royalvastar@icloud.com — include your order details and the subject line "Order Cancellation"</li>
          <li><strong>Instagram DM:</strong> @royalvastar — send your order reference and request for cancellation</li>
          <li><strong>WhatsApp:</strong> +44 7908 369765</li>
        </ul>
        <p>We will confirm cancellation by return message. Please do not assume your order is cancelled until you have received written confirmation from us.</p>
      </div>

      <div class="rv-policy-section">
        <h2>3. Cancellation After Dispatch</h2>
        <p>If your order has already been dispatched, we are unable to cancel or recall it. In this case:</p>
        <ul>
          <li>Please accept the delivery as normal</li>
          <li>Then contact us to initiate a return under our Refund &amp; Return Policy</li>
          <li>Ensure the item is returned unused, unworn, and in original packaging within 7 days of delivery</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>4. Refund for Cancelled Orders</h2>
        <p>If a cancellation is approved and payment has already been made, a full refund will be processed within <strong>5–7 working days</strong> via the original payment method. Processing times may vary depending on your bank or payment provider.</p>
      </div>

      <div class="rv-policy-section">
        <h2>5. Our Right to Cancel</h2>
        <p>Royal Vastar reserves the right to cancel any order in the following circumstances:</p>
        <ul>
          <li>The item is out of stock or no longer available</li>
          <li>A pricing or product description error has occurred</li>
          <li>There are concerns about fraudulent activity or payment irregularities</li>
          <li>We are unable to deliver to the address provided</li>
        </ul>
        <p>In any such case, we will notify you promptly and provide a full refund if payment has been received.</p>
      </div>

      <div class="rv-policy-section">
        <h2>6. Consumer Rights</h2>
        <p>Under the Consumer Contracts (Information, Cancellation and Additional Charges) Regulations 2013, you have a right to cancel distance contracts within 14 days of receiving your goods without giving any reason. This is your statutory right and is separate from our commercial cancellation window described above.</p>
        <p>To exercise your statutory right, you must inform us in writing (email or written notice) within 14 days of delivery. You must then return the goods within 14 days of notifying us. Return shipping costs are your responsibility unless the goods are faulty or incorrect.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Contact Us</h2>
        <p>For cancellation requests or queries about this policy, please contact us urgently:</p>
        <div class="rv-policy-highlight">
          <p><strong>Royal Vastar</strong><br>
          Email: royalvastar@icloud.com<br>
          WhatsApp: +44 7908 369765<br>
          Instagram: @royalvastar</p>
        </div>
        <p>For the fastest response, we recommend contacting us via WhatsApp or Instagram DM.</p>
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
function rv_page_shipping() {
	return <<<'NOWDOC'
<!-- wp:html -->
<div class="rv-hero">
  <div class="rv-wrap">
    <span class="rv-chip">Legal</span>
    <h1 class="rv-h1">Shipping &amp; Delivery <span class="rv-gold-text">Policy</span></h1>
    <p class="rv-hero-intro">Fast, reliable delivery across the United Kingdom. Here's everything you need to know.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-policy">

      <div class="rv-policy-meta">
        <span><strong>Business:</strong> Royal Vastar</span>
        <span><strong>Processing Time:</strong> 1–3 Working Days</span>
        <span><strong>Standard UK Delivery:</strong> 2–5 Working Days</span>
      </div>

      <div class="rv-policy-section">
        <h2>1. Order Processing</h2>
        <p>Orders are processed within <strong>1–3 working days</strong> of confirmed payment. Working days are Monday to Friday, excluding UK public holidays. Orders placed on weekends or public holidays will be processed on the next working day.</p>
        <p>You will receive a dispatch notification (via email, WhatsApp, or Instagram DM) once your order has been packed and handed to our courier partner, including any available tracking information.</p>
      </div>

      <div class="rv-policy-section">
        <h2>2. UK Standard Delivery</h2>
        <p>We deliver to all addresses within the United Kingdom. Standard UK delivery typically takes <strong>2–5 working days</strong> after dispatch. Please note:</p>
        <ul>
          <li>Delivery timescales are estimates and may be affected by courier workload or unforeseen circumstances</li>
          <li>Remote areas (including certain Scottish Highlands, islands, and Northern Ireland postcodes) may experience slightly longer delivery times</li>
          <li>We do not currently offer guaranteed next-day delivery</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>3. Delivery Costs</h2>
        <p>Shipping costs, if any, will be clearly communicated to you at the time of ordering. Any applicable delivery charges will be confirmed before payment is collected. We aim to keep delivery costs as low as possible for our customers.</p>
      </div>

      <div class="rv-policy-section">
        <h2>4. Tracking Your Order</h2>
        <p>Where tracking is available, we will share tracking details with you via WhatsApp or email once your order has been dispatched. You can use the provided tracking number on the courier's website to monitor your delivery status.</p>
        <p>If you have not received tracking information within 5 working days of placing your order, please contact us immediately.</p>
      </div>

      <div class="rv-policy-section">
        <h2>5. Failed Deliveries</h2>
        <p>If a delivery attempt is made and no one is available to receive the parcel, the courier will typically leave a calling card or make alternative arrangements (such as leaving with a neighbour or at a local depot). Please follow the instructions provided by the courier.</p>
        <p>If an order is returned to us due to an incorrect address, failed delivery attempts, or refusal of delivery, we will contact you to arrange re-delivery. Additional shipping costs may apply.</p>
      </div>

      <div class="rv-policy-section">
        <h2>6. Delivery Address Accuracy</h2>
        <p>It is your responsibility to provide a complete and accurate delivery address at the time of ordering. Royal Vastar cannot be held responsible for orders that are delayed or undelivered due to incorrect or incomplete address information provided by the customer.</p>
        <p>If you realise you have entered an incorrect address, please contact us immediately via WhatsApp or email. We will do our best to update the address if the order has not yet been dispatched.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Courier Delays</h2>
        <p>While we always aim to dispatch within our stated timeframes, Royal Vastar is not responsible for delays caused by third-party courier services, adverse weather conditions, industrial action, or other circumstances beyond our control.</p>
        <p>If your order has not arrived within 10 working days of dispatch notification, please contact us and we will investigate with the courier on your behalf.</p>
      </div>

      <div class="rv-policy-section">
        <h2>8. Lost or Stolen Parcels</h2>
        <p>If your tracking shows a parcel has been delivered but you have not received it, please check with neighbours and any safe locations on your property first. If the parcel cannot be located, contact us within <strong>7 days of the marked delivery date</strong> so we can raise a claim with the courier.</p>
        <p>We cannot be held responsible for parcels that are reported as delivered by the courier but claimed as not received, unless there is clear evidence of an error on the courier's part.</p>
      </div>

      <div class="rv-policy-section">
        <h2>9. Damaged Parcels</h2>
        <p>If your parcel arrives visibly damaged, please take photographs of the packaging and contents before opening, and contact us within <strong>48 hours of delivery</strong>. We will raise a claim with the courier and arrange a replacement or refund as appropriate.</p>
      </div>

      <div class="rv-policy-section">
        <h2>10. International Delivery</h2>
        <p>At this time, Royal Vastar ships within the United Kingdom only. We do not currently offer international shipping. We hope to expand our delivery coverage in the future — follow us on Instagram (@royalvastar) for updates.</p>
      </div>

      <div class="rv-policy-section">
        <h2>11. Contact Us</h2>
        <p>For any shipping or delivery queries, please contact us:</p>
        <div class="rv-policy-highlight">
          <p><strong>Royal Vastar</strong><br>
          Email: royalvastar@icloud.com<br>
          WhatsApp: +44 7908 369765<br>
          Instagram: @royalvastar</p>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- /wp:html -->
NOWDOC;
}
