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
		'shipping-policy'      => [ 'title' => 'Delivery Policy', 'content' => rv_page_shipping() ],
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
        <li><a href="%%URL_SHIPPING%%">Delivery Policy</a></li>
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
    <p class="rv-hero-intro">How Royal Vastar collects, uses and looks after your personal information.</p>
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
        <p>Royal Vastar ("we", "us", "our") respects your privacy and is committed to protecting your personal information. This Privacy Policy explains what information we collect, why we collect it, how we use it and the rights you have in relation to your data when you visit royalvastar.com, contact us or place an order.</p>
        <p>We handle personal information in accordance with the UK General Data Protection Regulation (UK GDPR) and the Data Protection Act 2018. Please read this policy carefully so you understand how and why we use your information.</p>
      </div>

      <div class="rv-policy-section">
        <h2>2. Information We Collect</h2>
        <p>We collect information that you give to us directly when you place an order, contact us or use our website. This may include:</p>
        <ul>
          <li><strong>Identity Data:</strong> First name, last name</li>
          <li><strong>Contact Data:</strong> Email address, phone number, WhatsApp number</li>
          <li><strong>Address Data:</strong> Delivery address and billing address</li>
          <li><strong>Order Data:</strong> products purchased, order value, delivery details and payment method used</li>
          <li><strong>Communication Data:</strong> Messages sent via email, Instagram DM, or WhatsApp</li>
          <li><strong>Technical Data:</strong> IP address, browser type and pages visited, where collected through cookies or similar technologies</li>
        </ul>
        <p>We do not knowingly collect special category data, such as health information, and we do not store full payment card details.</p>
      </div>

      <div class="rv-policy-section">
        <h2>3. How We Collect Your Information</h2>
        <p>We may collect personal information through:</p>
        <ul>
          <li>Order forms and checkout processes on our website</li>
          <li>Emails, WhatsApp messages, and Instagram DMs you send to us</li>
          <li>Cookies and similar tracking technologies when you visit our website</li>
          <li>Interactions with our social media accounts</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>4. Legal Basis for Processing</h2>
        <p>Under UK GDPR, we only use your personal information where we have a lawful basis to do so. This will usually be one or more of the following:</p>
        <ul>
          <li><strong>Contract:</strong> where we need your information to process, fulfil and deliver your order.</li>
          <li><strong>Legitimate Interests:</strong> where it is necessary for running and improving our business, responding to enquiries and helping prevent fraud.</li>
          <li><strong>Consent:</strong> where you have asked to receive marketing or have agreed to optional cookies.</li>
          <li><strong>Legal Obligation:</strong> where we need to keep or share information to comply with the law.</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>5. How We Use Your Information</h2>
        <p>We use your personal information to:</p>
        <ul>
          <li>Process, fulfil and deliver your orders</li>
          <li>Send order confirmations, delivery updates and dispatch notifications</li>
          <li>Respond to enquiries and customer service requests</li>
          <li>Process returns, refunds, and complaints</li>
          <li>Improve our website and services</li>
          <li>Meet our legal, tax and accounting obligations</li>
          <li>Send marketing communications, where you have given consent</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>6. Sharing Your Information</h2>
        <p>We do not sell, trade or rent your personal information. We may share it only where necessary, including with:</p>
        <ul>
          <li><strong>Delivery Partners:</strong> couriers or delivery partners who need your name, address and contact number to deliver your order.</li>
          <li><strong>Payment Providers:</strong> secure payment providers who process transactions on our behalf. We do not store full payment card details.</li>
          <li><strong>Professional or Legal Advisers:</strong> where this is needed for accounting, tax, legal or business purposes.</li>
          <li><strong>Legal Compliance:</strong> where disclosure is required by law, regulation or court order.</li>
        </ul>
        <p>Any third party we use must handle your information securely and only for the purpose for which it was shared.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Data Retention</h2>
        <p>We keep personal information only for as long as reasonably necessary for the purpose it was collected, including legal, tax, accounting and reporting requirements:</p>
        <ul>
          <li>Order and transaction records: normally retained for up to 7 years for tax and accounting record purposes</li>
          <li>Customer service communications: retained for 2 years</li>
          <li>Marketing consent records: retained until you withdraw consent</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>8. Cookies</h2>
        <p>Our website uses cookies and similar technologies to help the site work properly, remember preferences, understand how visitors use the site and improve our services. You can manage or block cookies through your browser settings. Some parts of the website may not work as intended if certain cookies are disabled.</p>
      </div>

      <div class="rv-policy-section">
        <h2>9. Your Rights Under UK GDPR</h2>
        <p>Under UK GDPR, you have a number of rights in relation to your personal information, including:</p>
        <ul>
          <li><strong>Right to Access:</strong> Request a copy of the personal data we hold about you.</li>
          <li><strong>Right to Rectification:</strong> Request correction of inaccurate or incomplete data.</li>
          <li><strong>Right to Erasure:</strong> Request deletion of your data in certain circumstances.</li>
          <li><strong>Right to Restrict Processing:</strong> Request that we limit how we use your data.</li>
          <li><strong>Right to Data Portability:</strong> Receive your data in a structured, commonly used format.</li>
          <li><strong>Right to Object:</strong> Object to processing based on legitimate interests or for direct marketing.</li>
          <li><strong>Right to Withdraw Consent:</strong> Where processing is based on consent, you may withdraw it at any time.</li>
        </ul>
        <p>To exercise any of these rights, please contact us at royalvastar@icloud.com. We will usually respond within one calendar month.</p>
      </div>

      <div class="rv-policy-section">
        <h2>10. Data Security</h2>
        <p>We use appropriate technical and organisational measures to help protect your personal information from accidental loss, misuse, unauthorised access, disclosure or alteration. These include secure website connections and limiting access to personal information where possible.</p>
        <p>No method of transmission over the internet is completely secure, so we cannot guarantee absolute security.</p>
      </div>

      <div class="rv-policy-section">
        <h2>11. Third-Party Links</h2>
        <p>Our website may contain links to third-party websites, including social media profiles. We are not responsible for the content or privacy practices of those websites, and we recommend reading their privacy policies before sharing any personal information with them.</p>
      </div>

      <div class="rv-policy-section">
        <h2>12. Children's Privacy</h2>
        <p>Our products and services are not aimed at children under the age of 16. We do not knowingly collect personal information from children. If you believe a child has provided information to us, please contact us so we can take appropriate steps.</p>
      </div>

      <div class="rv-policy-section">
        <h2>13. Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated effective date, so please check back periodically.</p>
      </div>

      <div class="rv-policy-section">
        <h2>14. Contact &amp; Complaints</h2>
        <p>For questions, requests or complaints about this Privacy Policy, please contact us:</p>
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
    <p class="rv-hero-intro">The terms that apply when you use the Royal Vastar website and services.</p>
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
        <p>By accessing or using the Royal Vastar website (royalvastar.com), you agree to these Terms of Service. If you do not agree with them, you should not use our website or services.</p>
        <p>These terms set out the rules for using our website and buying from us. We may update them from time to time, and the version displayed on this page will apply from the effective date shown above.</p>
      </div>

      <div class="rv-policy-section">
        <h2>2. Use of the Website</h2>
        <p>You agree to use our website only for lawful purposes and in a way that does not infringe the rights of, restrict or prevent anyone else from using the website. You must not:</p>
        <ul>
          <li>Use the website in any unlawful or fraudulent manner</li>
          <li>Transmit unsolicited or unauthorised advertising or promotional material</li>
          <li>Attempt to gain unauthorised access to our website, servers, or databases</li>
          <li>Reproduce, duplicate, copy or resell any part of our website without permission</li>
          <li>Upload or transmit any malicious code, viruses, or harmful content</li>
          <li>Collect or harvest personal data of other users without consent</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>3. Intellectual Property</h2>
        <p>All content on this website, including text, images, logos, designs, graphics and other materials, belongs to Royal Vastar or our content suppliers and is protected by applicable intellectual property laws.</p>
        <p>You must not copy, reproduce, distribute, modify or create derivative works from any website content without our prior written permission. The Royal Vastar name, logo and branding may not be used without consent.</p>
      </div>

      <div class="rv-policy-section">
        <h2>4. Product Information</h2>
        <p>We take reasonable care to ensure that product information on our website is accurate and up to date. However:</p>
        <ul>
          <li>Product images are for guidance only and actual colours may vary slightly depending on screen settings.</li>
          <li>Product descriptions, prices, and availability are subject to change without notice.</li>
          <li>We may refuse or cancel an order if a product is unavailable or a genuine pricing or product error has occurred.</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>5. Orders and Payment</h2>
        <p>By placing an order, you confirm that you are legally able to enter into a contract and that you are at least 18 years old, or that you have permission from a parent or guardian. Payment must be received in full before an order is processed and dispatched.</p>
      </div>

      <div class="rv-policy-section">
        <h2>6. Limitation of Liability</h2>
        <p>To the fullest extent permitted by law, Royal Vastar will not be liable for indirect or consequential loss arising from your use of our website or services.</p>
        <p>Our total liability for any claim relating to an order will not exceed the amount you paid for the product or service that gave rise to the claim.</p>
        <p>Nothing in these terms limits or excludes liability for death or personal injury caused by negligence, fraud or fraudulent misrepresentation, or any other liability that cannot lawfully be limited or excluded.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Third-Party Links</h2>
        <p>Our website may contain links to third-party websites. These links are provided for convenience only. We do not control those websites and are not responsible for their content, availability or privacy practices.</p>
      </div>

      <div class="rv-policy-section">
        <h2>8. Website Availability</h2>
        <p>We aim to keep our website available and secure, but we cannot guarantee that it will always be uninterrupted, error-free or free from harmful components.</p>
        <p>Where permitted by law, the website is provided on an "as is" and "as available" basis. This does not affect any statutory rights you may have when buying goods from us.</p>
      </div>

      <div class="rv-policy-section">
        <h2>9. Consumer Rights</h2>
        <p>Nothing in these Terms of Service affects your statutory rights as a consumer under UK law, including rights under the Consumer Rights Act 2015 and the Consumer Contracts (Information, Cancellation and Additional Charges) Regulations 2013.</p>
      </div>

      <div class="rv-policy-section">
        <h2>10. Governing Law and Jurisdiction</h2>
        <p>These Terms of Service are governed by the laws of England and Wales. Any dispute arising in connection with these terms will be subject to the courts of England and Wales, subject to any mandatory consumer rights that apply to you.</p>
      </div>

      <div class="rv-policy-section">
        <h2>11. Changes to These Terms</h2>
        <p>We may update these Terms of Service from time to time. Any changes will be posted on this page with an updated effective date.</p>
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
    <p class="rv-hero-intro">The terms that apply to orders, payments, delivery and your purchase from Royal Vastar.</p>
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
        <p>By placing an order with Royal Vastar, browsing our website or contacting us to make a purchase, you agree to these Terms and Conditions. If you do not agree with them, you should not place an order or use our services.</p>
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
        <p>All products are subject to availability. We may withdraw or discontinue a product at any time. Product images on our website or social media are provided for guidance; colours, shades and sizing may vary slightly depending on lighting, screen settings and product batches.</p>
        <p>We take reasonable care to ensure product descriptions are accurate. If we identify a genuine error in a product description, price or availability, we will contact you as soon as possible.</p>
      </div>

      <div class="rv-policy-section">
        <h2>4. Pricing</h2>
        <p>All prices are quoted in British Pounds Sterling (GBP). Where VAT applies and is stated, it is included in the displayed price. Prices may change from time to time, but the price payable for an order is the price confirmed when your order is accepted.</p>
        <p>If a genuine pricing error is identified after you place an order, we will contact you to confirm whether you wish to proceed at the correct price or cancel the order for a full refund.</p>
      </div>

      <div class="rv-policy-section">
        <h2>5. Placing an Order</h2>
        <p>Orders may be placed through our website, WhatsApp, email or Instagram DM. When you submit an order, you are making an offer to buy the relevant product. Your order is accepted only when we confirm it in writing and payment has been received.</p>
        <p>You must provide accurate and complete information when placing an order, including your full name, delivery address and contact details. We are not responsible for delay or non-delivery caused by incorrect or incomplete information provided by you.</p>
      </div>

      <div class="rv-policy-section">
        <h2>6. Payment</h2>
        <p>Payment is required in full before your order is processed and dispatched. We accept the payment methods confirmed to you at the time of order. Transactions are processed securely.</p>
        <p>We do not store full payment card or bank details. Any payment information shared with us is used only to process your order.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Cancellations</h2>
        <p>You may request to cancel an order within 12 hours of placing it, provided it has not already been processed or dispatched. To request cancellation, contact us as soon as possible by email, WhatsApp or Instagram DM.</p>
        <p>Once an order has been processed or dispatched, cancellation may not be possible. Please refer to our Cancellation Policy for full details.</p>
      </div>

      <div class="rv-policy-section">
        <h2>8. Delivery</h2>
        <p>We aim to dispatch orders within 1-3 working days of confirmed payment. UK standard delivery usually takes 2-5 working days after dispatch. Delivery times are estimates and may be affected by matters outside our reasonable control, including courier delays, adverse weather or public holidays.</p>
        <p>Royal Vastar is not responsible for delays caused by third-party delivery services or events outside our reasonable control. Please refer to our Delivery Policy for full details.</p>
      </div>

      <div class="rv-policy-section">
        <h2>9. Returns and Refunds</h2>
        <p>We accept eligible returns within 7 days of delivery. Items must be unused, unworn and returned in their original packaging with all tags attached. Sale items, undergarments and other excluded items are non-returnable unless faulty. Customers are responsible for return postage unless the item received is damaged, faulty or incorrect.</p>
        <p>Please refer to our Refund &amp; Return Policy for full details.</p>
      </div>

      <div class="rv-policy-section">
        <h2>10. Damaged or Incorrect Items</h2>
        <p>If you receive a damaged, faulty or incorrect product, please contact us within 48 hours of delivery with clear photographs of the issue. We will arrange a suitable replacement, refund or other remedy at no additional cost to you.</p>
      </div>

      <div class="rv-policy-section">
        <h2>11. Consumer Rights</h2>
        <p>These Terms and Conditions do not affect your statutory rights under UK law, including the Consumer Rights Act 2015. You have the right to receive goods that are as described, of satisfactory quality, and fit for purpose.</p>
      </div>

      <div class="rv-policy-section">
        <h2>12. Limitation of Liability</h2>
        <p>Our total liability to you arising from or in connection with an order will not exceed the total amount paid for that order. We will not be liable for indirect or consequential loss, except where liability cannot be limited or excluded by law.</p>
      </div>

      <div class="rv-policy-section">
        <h2>13. Intellectual Property</h2>
        <p>All content on the Royal Vastar website and social media platforms, including text, images, logos, branding and product photography, belongs to Royal Vastar or is used with permission. Unauthorised use, reproduction or distribution is not permitted.</p>
      </div>

      <div class="rv-policy-section">
        <h2>14. Privacy</h2>
        <p>Your personal information is handled in accordance with our Privacy Policy, which forms part of these Terms and Conditions.</p>
      </div>

      <div class="rv-policy-section">
        <h2>15. Governing Law</h2>
        <p>These Terms and Conditions are governed by the laws of England and Wales. Any dispute will be subject to the courts of England and Wales, subject to any mandatory consumer rights that apply to you.</p>
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
    <p class="rv-hero-intro">Clear information about returns, refunds and what to do if there is an issue with your order.</p>
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
        <p>We want you to be happy with your Royal Vastar purchase. If something is not right, this policy explains when a return may be accepted, how to request one and how refunds are handled.</p>
      </div>

      <div class="rv-policy-section">
        <h2>1. Return Eligibility</h2>
        <p>Eligible returns must be requested within <strong>7 days of the delivery date</strong>. To qualify for a return, the item must meet all of the following conditions:</p>
        <ul>
          <li>The return is requested within 7 calendar days of delivery</li>
          <li>Items must be unused and unworn</li>
          <li>The item is in its original condition and packaging</li>
          <li>All original tags must be attached and intact</li>
          <li>The item has not been washed, altered or damaged after delivery</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>2. Non-Returnable Items</h2>
        <p>The following items cannot be returned or refunded unless they are faulty, damaged on arrival or incorrectly supplied:</p>
        <ul>
          <li>Sale items and items purchased with a discount code</li>
          <li>Undergarments, swimwear, and intimate apparel (for hygiene reasons)</li>
          <li>Items that have been worn, washed, or altered</li>
          <li>Items without original tags or packaging</li>
          <li>Personalised or custom-ordered items</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>3. How to Request a Return</h2>
        <p>To request a return, please follow these steps:</p>
        <ul>
          <li>Contact us within 7 days of delivery by email (royalvastar@icloud.com), WhatsApp or Instagram DM (@royalvastar)</li>
          <li>Include your order details, the item(s) you wish to return, and the reason for the return</li>
          <li>We will review the request and, if approved, provide return instructions and the return address</li>
          <li>Securely package your items and send them back using a tracked postal service</li>
        </ul>
        <p>We strongly recommend using a tracked postal service for returns, as we cannot accept responsibility for items lost in transit before they reach us.</p>
      </div>

      <div class="rv-policy-section">
        <h2>4. Return Postage Costs</h2>
        <p>Customers are responsible for return postage costs, except where:</p>
        <ul>
          <li>You received a damaged or faulty item</li>
          <li>You received an incorrect item (wrong product or size from your order)</li>
        </ul>
        <p>In these cases, we will cover reasonable return postage costs or arrange a suitable return method. Please contact us within <strong>48 hours of delivery</strong> with clear photographs of the issue.</p>
      </div>

      <div class="rv-policy-section">
        <h2>5. Refund Process</h2>
        <p>Once we receive your returned item and inspect it, we will let you know whether the refund has been approved. If approved, your refund will be processed within <strong>5-7 working days</strong>.</p>
        <p>Refunds are issued to the original payment method used for the purchase. The time taken for funds to appear in your account may vary depending on your bank or payment provider.</p>
      </div>

      <div class="rv-policy-section">
        <h2>6. Partial Refunds</h2>
        <p>In some circumstances, a partial refund may be issued where only part of an order is eligible for return, or where an item is returned in a condition that reduces its value.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Exchanges</h2>
        <p>We do not currently offer direct exchanges. If you would like a different size or colour, please return the original item, where eligible, and place a new order for your preferred item.</p>
      </div>

      <div class="rv-policy-section">
        <h2>8. Damaged or Incorrect Items</h2>
        <p>If you receive a damaged, faulty or incorrect item, please contact us within <strong>48 hours of delivery</strong>. Please send:</p>
        <ul>
          <li>Your order confirmation details</li>
          <li>Clear photographs of the damaged, faulty or incorrect item</li>
          <li>A brief description of the issue</li>
        </ul>
        <p>We will arrange an appropriate remedy, such as a replacement or refund, including reasonable return postage costs where applicable.</p>
      </div>

      <div class="rv-policy-section">
        <h2>9. Your Statutory Rights</h2>
        <p>This Returns Policy does not affect your statutory rights under UK consumer law, including your rights under the Consumer Rights Act 2015. If goods are faulty, not as described or not fit for purpose, you may be entitled to a repair, replacement or refund.</p>
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
    <p class="rv-hero-intro">How to request an order cancellation and what happens if your order has already been dispatched.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-policy">

      <div class="rv-policy-meta">
        <span><strong>Business:</strong> Royal Vastar</span>
        <span><strong>Cancellation Window:</strong> Within 12 Hours of Placing an Order</span>
        <span><strong>Governing Law:</strong> England &amp; Wales</span>
      </div>

      <div class="rv-policy-section">
        <h2>1. Cancellation Window</h2>
        <p>You may request to cancel an order within <strong>12 hours</strong> of placing it, provided it has not already been processed or dispatched. Please contact us as soon as possible by email, WhatsApp or Instagram DM.</p>
        <div class="rv-policy-highlight">
          <p><strong>Important:</strong> Once your order has been processed or dispatched, we may no longer be able to cancel it. You may still be able to return eligible items after delivery under our Refund &amp; Return Policy.</p>
        </div>
      </div>

      <div class="rv-policy-section">
        <h2>2. How to Request a Cancellation</h2>
        <p>To request cancellation within the 12-hour window, contact us using one of the following methods:</p>
        <ul>
          <li><strong>Email:</strong> royalvastar@icloud.com - include your order details and use the subject line "Order Cancellation"</li>
          <li><strong>Instagram DM:</strong> @royalvastar - send your order reference and cancellation request</li>
          <li><strong>WhatsApp:</strong> +44 7908 369765</li>
        </ul>
        <p>We will confirm whether cancellation is possible by return message. Please do not assume your order has been cancelled until you have received written confirmation from us.</p>
      </div>

      <div class="rv-policy-section">
        <h2>3. Cancellation After Dispatch</h2>
        <p>If your order has already been dispatched, we are usually unable to cancel or recall it. In this case:</p>
        <ul>
          <li>Please accept the delivery as normal</li>
          <li>Then contact us to initiate a return under our Refund &amp; Return Policy</li>
          <li>Make sure the item is returned unused, unworn and in its original packaging within 7 days of delivery</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>4. Refund for Cancelled Orders</h2>
        <p>If a cancellation is approved and payment has already been made, a full refund will be processed within <strong>5-7 working days</strong> to the original payment method. Processing times may vary depending on your bank or payment provider.</p>
      </div>

      <div class="rv-policy-section">
        <h2>5. Our Right to Cancel</h2>
        <p>Royal Vastar may cancel an order in the following circumstances:</p>
        <ul>
          <li>The item is out of stock or no longer available</li>
          <li>A pricing or product description error has occurred</li>
          <li>There are concerns about fraudulent activity or payment irregularities</li>
          <li>We are unable to deliver to the address provided</li>
        </ul>
        <p>If this happens, we will notify you promptly and provide a full refund if payment has already been received.</p>
      </div>

      <div class="rv-policy-section">
        <h2>6. Consumer Rights</h2>
        <p>Under the Consumer Contracts (Information, Cancellation and Additional Charges) Regulations 2013, you may have a statutory right to cancel certain distance purchases within 14 days of receiving the goods. This right is separate from our 12-hour order cancellation window above.</p>
        <p>To exercise this statutory right, you must tell us in writing within 14 days of delivery. You must then return the goods within 14 days of notifying us. Return postage costs are your responsibility unless the goods are faulty, damaged on arrival or incorrect.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Contact Us</h2>
        <p>For cancellation requests or questions about this policy, please contact us as soon as possible:</p>
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
    <h1 class="rv-h1">Delivery <span class="rv-gold-text">Policy</span></h1>
    <p class="rv-hero-intro">Delivery information for Royal Vastar orders within the United Kingdom.</p>
  </div>
</div>

<div class="rv-section" style="background:var(--rv-bg);">
  <div class="rv-wrap">
    <div class="rv-policy">

      <div class="rv-policy-meta">
        <span><strong>Business:</strong> Royal Vastar</span>
        <span><strong>Processing Time:</strong> 1-3 Working Days</span>
        <span><strong>Standard UK Delivery:</strong> 2-5 Working Days</span>
      </div>

      <div class="rv-policy-section">
        <h2>1. Order Processing</h2>
        <p>Orders are usually processed within <strong>1-3 working days</strong> of confirmed payment. Working days are Monday to Friday, excluding UK public holidays. Orders placed at weekends or on public holidays will be processed on the next working day.</p>
        <p>Once your order has been packed and passed to our delivery partner, we will send a dispatch update by email, WhatsApp or Instagram DM, including tracking details where available.</p>
      </div>

      <div class="rv-policy-section">
        <h2>2. UK Standard Delivery</h2>
        <p>We deliver to addresses within the United Kingdom. Standard UK delivery usually takes <strong>2-5 working days</strong> after dispatch. Please note:</p>
        <ul>
          <li>Delivery timeframes are estimates and may be affected by courier workload or unforeseen circumstances</li>
          <li>Remote areas (including certain Scottish Highlands, islands, and Northern Ireland postcodes) may experience slightly longer delivery times</li>
          <li>We do not currently offer guaranteed next-day delivery</li>
        </ul>
      </div>

      <div class="rv-policy-section">
        <h2>3. Delivery Costs</h2>
        <p>Delivery costs, if applicable, will be clearly confirmed at the time of ordering and before payment is collected. We aim to keep delivery charges fair and transparent.</p>
      </div>

      <div class="rv-policy-section">
        <h2>4. Tracking Your Order</h2>
        <p>Where tracking is available, we will share the tracking details with you once your order has been dispatched. You can use the tracking number on the courier's website to check the delivery status.</p>
        <p>If you have not received a dispatch update within 5 working days of placing your order, please contact us so we can check the status for you.</p>
      </div>

      <div class="rv-policy-section">
        <h2>5. Failed Deliveries</h2>
        <p>If a delivery attempt is made and no one is available to receive the parcel, the courier may leave a calling card or make alternative arrangements, such as leaving it with a neighbour or at a local collection point. Please follow the courier's instructions.</p>
        <p>If an order is returned to us because of an incorrect address, failed delivery attempts or refusal of delivery, we will contact you to arrange re-delivery. Additional delivery charges may apply.</p>
      </div>

      <div class="rv-policy-section">
        <h2>6. Delivery Address Accuracy</h2>
        <p>It is your responsibility to provide a complete and accurate delivery address when placing your order. Royal Vastar is not responsible for delay or non-delivery caused by incorrect or incomplete address information supplied by you.</p>
        <p>If you notice that your address is incorrect, please contact us immediately by WhatsApp or email. We will do our best to update it if the order has not yet been dispatched.</p>
      </div>

      <div class="rv-policy-section">
        <h2>7. Courier Delays</h2>
        <p>We aim to dispatch within the stated timeframe, but Royal Vastar is not responsible for delays caused by third-party delivery services, adverse weather, industrial action, public holidays or other circumstances outside our reasonable control.</p>
        <p>If your order has not arrived within 10 working days of the dispatch notification, please contact us and we will check with the courier on your behalf.</p>
      </div>

      <div class="rv-policy-section">
        <h2>8. Lost or Stolen Parcels</h2>
        <p>If tracking shows that your parcel has been delivered but you have not received it, please first check with neighbours, household members and any safe places around the property. If the parcel still cannot be found, contact us within <strong>7 days of the marked delivery date</strong> so we can raise a query with the courier.</p>
        <p>We cannot accept responsibility for parcels marked as delivered by the courier unless there is clear evidence of an error by the courier or delivery service.</p>
      </div>

      <div class="rv-policy-section">
        <h2>9. Damaged Parcels</h2>
        <p>If your parcel arrives visibly damaged, please take clear photographs of the packaging and contents and contact us within <strong>48 hours of delivery</strong>. We will review the issue and arrange a suitable replacement, refund or courier claim where appropriate.</p>
      </div>

      <div class="rv-policy-section">
        <h2>10. International Delivery</h2>
        <p>At this time, Royal Vastar delivers within the United Kingdom only. We do not currently offer international delivery. We hope to expand our delivery coverage in the future - follow us on Instagram (@royalvastar) for updates.</p>
      </div>

      <div class="rv-policy-section">
        <h2>11. Contact Us</h2>
        <p>For any delivery questions, please contact us:</p>
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
