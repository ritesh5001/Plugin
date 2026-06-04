<?php
/**
 * Page definitions — every page's title + raw HTML content.
 * Content is wrapped in <!-- wp:html --> blocks and uses %%PLACEHOLDERS%%
 * resolved at runtime via the_content filter.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function sp_get_page_definitions() {
    return array(
        'sp-home'                => array( 'title' => 'Home',                       'content' => sp_page_home() ),
        'about-us'               => array( 'title' => 'About Us',                   'content' => sp_page_about() ),
        'services'               => array( 'title' => 'Our Collections',            'content' => sp_page_services() ),
        'contact'                => array( 'title' => 'Contact',                    'content' => sp_page_contact() ),
        'privacy-policy'         => array( 'title' => 'Privacy Policy',             'content' => sp_page_privacy() ),
        'terms-of-service'       => array( 'title' => 'Terms of Service',           'content' => sp_page_tos() ),
        'terms-and-conditions'   => array( 'title' => 'Terms & Conditions',         'content' => sp_page_tc() ),
        'refund-policy'          => array( 'title' => 'Refund & Return Policy',     'content' => sp_page_refund() ),
        'cancellation-policy'    => array( 'title' => 'Cancellation Policy',        'content' => sp_page_cancel() ),
        'shipping-policy'        => array( 'title' => 'Shipping & Delivery Policy', 'content' => sp_page_shipping() ),
    );
}

/* ============================================================
 * HOME
 * ============================================================ */
function sp_page_home() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero sp-hero--home">
  <div class="sp-hero__inner">
    <img class="sp-hero__logo" src="%%BRAND_LOGO%%" alt="Souk Profumi"/>
    <span class="sp-eyebrow">Profumi Arabi di Nicchia</span>
    <h1 class="sp-h1">The Art of Arabian &amp; Niche Perfumery</h1>
    <p class="sp-lede">Discover an exquisitely curated collection of authentic Arabian fragrances and rare niche creations — sourced from trusted houses, presented with the reverence true perfumery deserves.</p>
    <div class="sp-hero__cta">
      <a class="sp-btn sp-btn--primary" href="%%URL_SERVICES%%">Explore Collections</a>
      <a class="sp-btn sp-btn--ghost" href="%%URL_ABOUT%%">Our Story</a>
    </div>
  </div>
</section>

<section class="sp-section">
  <div class="sp-section__head">
    <span class="sp-eyebrow">Why Souk Profumi</span>
    <h2 class="sp-h2">A House Built on Authenticity</h2>
    <p class="sp-sub">Every bottle in our atelier is selected with care, sourced through trusted channels, and presented with the integrity that defines fine perfumery.</p>
  </div>
  <div class="sp-grid sp-grid--4">
    <article class="sp-card">
      <div class="sp-card__icon">◆</div>
      <h3>100% Authentic</h3>
      <p>Every fragrance is genuine, sourced from trusted suppliers and renowned fragrance houses.</p>
    </article>
    <article class="sp-card">
      <div class="sp-card__icon">◆</div>
      <h3>Niche Curation</h3>
      <p>A carefully selected library of rare niche creations and timeless Arabian classics.</p>
    </article>
    <article class="sp-card">
      <div class="sp-card__icon">◆</div>
      <h3>Arabian Heritage</h3>
      <p>Deep oud compositions, luxurious oriental blends, and the soul of Middle Eastern perfumery.</p>
    </article>
    <article class="sp-card">
      <div class="sp-card__icon">◆</div>
      <h3>Secure Shopping</h3>
      <p>Encrypted checkout, trusted payment providers, and discreet, protective shipping.</p>
    </article>
  </div>
</section>

<section class="sp-stats">
  <div class="sp-stats__inner">
    <div class="sp-stat"><span class="sp-stat__num">500+</span><span class="sp-stat__label">Fragrances Curated</span></div>
    <div class="sp-stat"><span class="sp-stat__num">100%</span><span class="sp-stat__label">Authentic Sourcing</span></div>
    <div class="sp-stat"><span class="sp-stat__num">50+</span><span class="sp-stat__label">Houses Represented</span></div>
    <div class="sp-stat"><span class="sp-stat__num">24/7</span><span class="sp-stat__label">Customer Support</span></div>
  </div>
</section>

<section class="sp-section">
  <div class="sp-split">
    <div class="sp-split__media">
      <div class="sp-split__art">
        <img src="%%BRAND_LOGO%%" alt="Souk Profumi"/>
      </div>
    </div>
    <div class="sp-split__copy">
      <span class="sp-eyebrow">Our Promise</span>
      <h2 class="sp-h2">Fragrance as a Personal Expression</h2>
      <p>Perfume is more than a scent — it is memory, identity, and a statement of style. At Souk Profumi we are dedicated to helping you discover compositions that mirror your individuality.</p>
      <ul class="sp-list">
        <li><strong>Rich Oud Compositions</strong> — deep, resinous, unmistakably Arabian.</li>
        <li><strong>Luxurious Oriental Blends</strong> — opulent layers of amber, spice and resin.</li>
        <li><strong>Modern Niche Creations</strong> — singular voices from independent perfumers.</li>
        <li><strong>Timeless Classics</strong> — signature scents that endure across generations.</li>
      </ul>
      <a class="sp-btn sp-btn--primary" href="%%URL_SERVICES%%">Browse the Collections</a>
    </div>
  </div>
</section>

<section class="sp-cta">
  <div class="sp-cta__inner">
    <h2 class="sp-h2">Begin Your Fragrance Journey</h2>
    <p>Speak with our team about your taste, occasion, or the perfect gift. We are honoured to guide you.</p>
    <a class="sp-btn sp-btn--dark" href="%%URL_CONTACT%%">Contact Us</a>
  </div>
</section>

<footer class="sp-home-footer">
  <div class="sp-home-footer__grid">
    <div>
      <img class="sp-home-footer__logo" src="%%BRAND_LOGO%%" alt="Souk Profumi"/>
      <p class="sp-home-footer__tag">Profumi Arabi di Nicchia</p>
      <p class="sp-home-footer__desc">An independent atelier of authentic Arabian and niche fragrances, curated for those who seek the extraordinary.</p>
    </div>
    <div>
      <h4>Discover</h4>
      <ul>
        <li><a href="%%URL_HOME%%">Home</a></li>
        <li><a href="%%URL_ABOUT%%">About Us</a></li>
        <li><a href="%%URL_SERVICES%%">Our Collections</a></li>
        <li><a href="%%URL_CONTACT%%">Contact</a></li>
      </ul>
    </div>
    <div>
      <h4>Policies</h4>
      <ul>
        <li><a href="%%URL_PRIVACY%%">Privacy Policy</a></li>
        <li><a href="%%URL_TERMS%%">Terms of Service</a></li>
        <li><a href="%%URL_TERMS_C%%">Terms &amp; Conditions</a></li>
        <li><a href="%%URL_REFUND%%">Refund &amp; Return</a></li>
        <li><a href="%%URL_CANCEL%%">Cancellation Policy</a></li>
        <li><a href="%%URL_SHIPPING%%">Shipping &amp; Delivery</a></li>
      </ul>
    </div>
    <div>
      <h4>Reach Us</h4>
      <p>Use the floating WhatsApp button at the bottom-right of the screen to chat with our team directly.</p>
      <a class="sp-btn sp-btn--ghost" href="%%URL_CONTACT%%">Open Contact Page</a>
    </div>
  </div>
  <div class="sp-home-footer__bottom">© Souk Profumi · Profumi Arabi di Nicchia · All Rights Reserved.</div>
</footer>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * ABOUT
 * ============================================================ */
function sp_page_about() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">About</span>
    <h1 class="sp-h1">Souk Profumi — Profumi Arabi di Nicchia</h1>
    <p class="sp-lede">We are passionate about bringing the world of authentic niche and Arabian fragrances to perfume lovers who appreciate quality, craftsmanship, and individuality.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-split">
    <div class="sp-split__copy">
      <span class="sp-eyebrow">Our Story</span>
      <h2 class="sp-h2">A Curated House of Fragrance</h2>
      <p>Our carefully curated collection features original perfumes sourced from trusted suppliers and renowned fragrance houses, offering customers access to some of the most sought-after scents from the Middle East and beyond.</p>
      <p>We believe that fragrance is more than just a scent — it is a personal expression, a memory, and a statement of style. Whether you are searching for rich oud compositions, luxurious oriental blends, modern niche creations, or timeless classics, Souk Profumi is dedicated to helping you discover fragrances that reflect your unique personality.</p>
    </div>
    <div class="sp-split__copy">
      <span class="sp-eyebrow">Our Commitment</span>
      <h2 class="sp-h2">What We Stand For</h2>
      <ul class="sp-list">
        <li><strong>100% Authentic Products</strong> — every bottle, verified.</li>
        <li><strong>Niche &amp; Arabian Fragrances</strong> — carefully selected.</li>
        <li><strong>Reliable Customer Service</strong> — responsive and respectful.</li>
        <li><strong>Secure Shopping Experience</strong> — trusted payment partners.</li>
        <li><strong>Passion for Quality &amp; Excellence</strong> — our guiding principle.</li>
      </ul>
    </div>
  </div>
</section>

<section class="sp-section sp-section--surface">
  <div class="sp-section__head">
    <span class="sp-eyebrow">Our Vision</span>
    <h2 class="sp-h2">A Destination for Fragrance Enthusiasts</h2>
    <p class="sp-sub">A place where the rich heritage of Arabian perfumery meets exceptional niche fragrances from around the world — a premium shopping experience built on authenticity, trust, and a genuine love for fine perfumes.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-notice">
    <h3>Authenticity Disclaimer</h3>
    <p>Souk Profumi is an independent reseller of genuine and authentic perfumes. We are not affiliated with, endorsed by, or sponsored by any perfume brand or manufacturer unless explicitly stated.</p>
    <p>All trademarks, brand names, logos, product names, and copyrights displayed on this website are the property of their respective owners and are used solely for identification, informational, and descriptive purposes. Their use does not imply any affiliation, endorsement, or sponsorship by the trademark holders.</p>
  </div>
</section>

<section class="sp-cta">
  <div class="sp-cta__inner">
    <h2 class="sp-h2">Thank you for choosing Souk Profumi</h2>
    <p>We are honoured to be part of your fragrance journey.</p>
    <a class="sp-btn sp-btn--dark" href="%%URL_CONTACT%%">Get in Touch</a>
  </div>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * SERVICES / COLLECTIONS
 * ============================================================ */
function sp_page_services() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Our Collections</span>
    <h1 class="sp-h1">Fragrance Families We Curate</h1>
    <p class="sp-lede">From the deep resins of the Arabian peninsula to the singular voices of independent perfumers, every category is selected with care and intention.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-grid sp-grid--2">
    <article class="sp-num-card">
      <span class="sp-num">01</span>
      <h3>Oud Compositions</h3>
      <p>The unmistakable signature of Arabian perfumery — agarwood at its most expressive, layered with rose, saffron, and amber.</p>
      <ul class="sp-list">
        <li>Pure and blended oud</li>
        <li>Smoky and resinous facets</li>
        <li>Long-lasting on the skin</li>
      </ul>
    </article>
    <article class="sp-num-card">
      <span class="sp-num">02</span>
      <h3>Oriental Blends</h3>
      <p>Opulent compositions built on amber, spice, and balsamic resins — warmth and richness in every drop.</p>
      <ul class="sp-list">
        <li>Amber &amp; benzoin accords</li>
        <li>Spiced oriental layers</li>
        <li>Sensual, character-driven</li>
      </ul>
    </article>
    <article class="sp-num-card">
      <span class="sp-num">03</span>
      <h3>Niche Creations</h3>
      <p>Singular fragrances from independent perfumers — bold, artistic, and made for those who seek the uncommon.</p>
      <ul class="sp-list">
        <li>Independent houses</li>
        <li>Artistic, limited compositions</li>
        <li>For collectors and connoisseurs</li>
      </ul>
    </article>
    <article class="sp-num-card">
      <span class="sp-num">04</span>
      <h3>Timeless Classics</h3>
      <p>Iconic fragrances that have defined generations — the enduring signatures of fine perfumery.</p>
      <ul class="sp-list">
        <li>Heritage compositions</li>
        <li>Signature scents</li>
        <li>Universally admired</li>
      </ul>
    </article>
  </div>
</section>

<section class="sp-section sp-section--surface">
  <div class="sp-section__head">
    <span class="sp-eyebrow">How It Works</span>
    <h2 class="sp-h2">A Considered Experience</h2>
  </div>
  <div class="sp-grid sp-grid--4">
    <div class="sp-step"><span class="sp-step__num">1</span><h4>Discover</h4><p>Browse our curated library of Arabian and niche fragrances.</p></div>
    <div class="sp-step"><span class="sp-step__num">2</span><h4>Select</h4><p>Choose the composition that resonates with you.</p></div>
    <div class="sp-step"><span class="sp-step__num">3</span><h4>Ship</h4><p>Discreet, secure delivery direct to your door.</p></div>
    <div class="sp-step"><span class="sp-step__num">4</span><h4>Enjoy</h4><p>Wear and live the story your fragrance tells.</p></div>
  </div>
</section>

<section class="sp-cta">
  <div class="sp-cta__inner">
    <h2 class="sp-h2">Not sure where to start?</h2>
    <p>Tell us about the scents you love — we will guide you to the right composition.</p>
    <a class="sp-btn sp-btn--dark" href="%%URL_CONTACT%%">Speak With Us</a>
  </div>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * CONTACT
 * ============================================================ */
function sp_page_contact() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Contact</span>
    <h1 class="sp-h1">We Would Love to Hear from You</h1>
    <p class="sp-lede">For enquiries about fragrances, orders, or guidance from our team, reach out via WhatsApp or send a message below.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-split">
    <div class="sp-contact-info">
      <h2 class="sp-h2">Reach Souk Profumi</h2>
      <p>Our team is available to help you choose, source, and discover the right fragrance for any occasion.</p>
      <div class="sp-contact-item">
        <div class="sp-contact-item__icon">✦</div>
        <div>
          <h4>WhatsApp</h4>
          <p>Tap the floating WhatsApp button at the bottom-right of every page to chat with us directly.</p>
        </div>
      </div>
      <div class="sp-contact-item">
        <div class="sp-contact-item__icon">✦</div>
        <div>
          <h4>Send a Message</h4>
          <p>Use the form on this page and our team will respond as soon as possible.</p>
        </div>
      </div>
      <div class="sp-contact-item">
        <div class="sp-contact-item__icon">✦</div>
        <div>
          <h4>Based in Italy</h4>
          <p>Souk Profumi — Profumi Arabi di Nicchia. Shipping across Italy and selected international destinations.</p>
        </div>
      </div>
    </div>
    <div class="sp-contact-form">
      <h3 class="sp-h3">Send Us a Message</h3>
      [contact-form-7 id="d1513a7" title="Contact form 1"]
    </div>
  </div>
</section>

<section class="sp-cta">
  <div class="sp-cta__inner">
    <h2 class="sp-h2">Discover our Collections</h2>
    <p>Browse the curated library of Arabian and niche fragrances.</p>
    <a class="sp-btn sp-btn--dark" href="%%URL_SERVICES%%">Explore Now</a>
  </div>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * PRIVACY POLICY
 * ============================================================ */
function sp_page_privacy() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legal</span>
    <h1 class="sp-h1">Privacy Policy</h1>
    <p class="sp-lede">Last Updated: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>At Souk Profumi (soukprofumi.it), we respect the privacy of our customers and are committed to protecting their personal information. This Privacy Policy explains how we collect, use, store, and protect your personal data when you visit our website or purchase our products.</p>
  <p>This policy has been prepared in accordance with the General Data Protection Regulation (EU) 2016/679 (GDPR) and applicable Italian data protection laws.</p>

  <h2>Information We Collect</h2>

  <h3>Contact Information</h3>
  <p>We may collect:</p>
  <ul>
    <li>Full name</li>
    <li>Email address</li>
    <li>Shipping and billing address</li>
    <li>Telephone or WhatsApp number</li>
  </ul>

  <h3>Payment Information</h3>
  <p>Payment information is securely collected and processed by trusted third-party payment providers. Souk Profumi does not store complete credit or debit card details on its servers.</p>

  <h3>Browsing Information</h3>
  <p>We may collect information through cookies and similar technologies, including:</p>
  <ul>
    <li>IP address</li>
    <li>Browser type</li>
    <li>Device information</li>
    <li>Pages visited</li>
    <li>Website usage statistics</li>
  </ul>

  <h2>How We Use Your Information</h2>

  <h3>Order Processing</h3>
  <p>We use your information to:</p>
  <ul>
    <li>Process and fulfill orders</li>
    <li>Arrange shipping and delivery</li>
    <li>Provide customer support</li>
    <li>Communicate order updates</li>
  </ul>

  <h3>Service Improvement</h3>
  <p>We may use your information to:</p>
  <ul>
    <li>Improve website functionality</li>
    <li>Enhance customer experience</li>
    <li>Analyze website performance and usage</li>
  </ul>

  <h3>Marketing Communications</h3>
  <p>With your consent, we may send promotional emails, newsletters, product updates, and special offers. You may unsubscribe at any time.</p>

  <h2>Data Sharing</h2>
  <p>We do not sell, rent, or trade your personal information to third parties.</p>
  <p>Your information may be shared only with trusted service providers when necessary to:</p>
  <ul>
    <li>Process payments</li>
    <li>Deliver orders</li>
    <li>Provide technical and hosting services</li>
    <li>Comply with legal obligations</li>
  </ul>
  <p>All service providers are required to protect your information and process it in accordance with applicable privacy laws.</p>

  <h2>Data Security</h2>
  <p>We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, loss, misuse, disclosure, or alteration.</p>

  <h2>Data Retention</h2>
  <p>We retain personal information only for as long as necessary to:</p>
  <ul>
    <li>Fulfill contractual obligations</li>
    <li>Provide customer support</li>
    <li>Comply with legal, accounting, and tax requirements</li>
    <li>Resolve disputes and enforce agreements</li>
  </ul>

  <h2>Your Rights Under GDPR</h2>
  <p>Under applicable data protection laws, you have the right to:</p>
  <ul>
    <li>Access your personal data</li>
    <li>Correct inaccurate or incomplete information</li>
    <li>Request deletion of your personal data ("Right to be Forgotten")</li>
    <li>Restrict or object to processing</li>
    <li>Withdraw consent at any time</li>
    <li>Request data portability</li>
    <li>Lodge a complaint with the Italian Data Protection Authority</li>
  </ul>
  <p>For more information, visit: <a href="https://www.garanteprivacy.it/" target="_blank" rel="noopener">https://www.garanteprivacy.it/</a></p>

  <h2>Cookies</h2>
  <p>Our website uses cookies and similar technologies to improve functionality, analyze traffic, and enhance user experience. You may manage or disable cookies through your browser settings; however, some features of the website may not function properly.</p>

  <h2>Changes to This Privacy Policy</h2>
  <p>We reserve the right to update or modify this Privacy Policy at any time. Any changes will be published on this page with an updated revision date.</p>

  <h2>Contact Us</h2>
  <p>If you have any questions regarding this Privacy Policy or the processing of your personal information, please contact us via WhatsApp through the contact information provided on our website.</p>

  <p><strong>Souk Profumi – Profumi Arabi di Nicchia</strong><br/>
  Website: <a href="https://soukprofumi.it" target="_blank" rel="noopener">https://soukprofumi.it</a></p>

  <hr/>

  <p>© 2026 Souk Profumi – Profumi Arabi di Nicchia. All Rights Reserved.</p>
  <p>All trademarks, brand names, logos, and product names displayed on this website are the property of their respective owners and are used solely for identification and descriptive purposes. Their use does not imply any affiliation, endorsement, or sponsorship by the respective trademark owners.</p>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * TERMS OF SERVICE
 * ============================================================ */
function sp_page_tos() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legal</span>
    <h1 class="sp-h1">Terms of Service</h1>
    <p class="sp-lede">Last Updated: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>Welcome to Souk Profumi (soukprofumi.it). By accessing or using our website, you agree to be bound by these Terms of Service. Please read them carefully before using our services.</p>

  <h2>1. Acceptance of Terms</h2>
  <p>By using the Souk Profumi website you confirm that you are at least 18 years of age and legally capable of entering into a binding contract under Italian and EU law. If you do not agree with these Terms, you must not use the website.</p>

  <h2>2. About Souk Profumi</h2>
  <p>Souk Profumi is an independent reseller of genuine and authentic perfumes, specialising in Arabian and niche fragrances. We are not affiliated with, endorsed by, or sponsored by any perfume brand or manufacturer unless explicitly stated.</p>

  <h2>3. Use of the Website</h2>
  <p>You agree to use the website only for lawful purposes. You shall not:</p>
  <ul>
    <li>Use the website in any way that breaches applicable law or regulation</li>
    <li>Attempt to gain unauthorised access to our systems or data</li>
    <li>Use the website to transmit malicious code, viruses, or harmful material</li>
    <li>Copy, reproduce, or redistribute content without written permission</li>
  </ul>

  <h2>4. Product Information</h2>
  <p>We make every reasonable effort to ensure product descriptions, images, and pricing on the website are accurate. However, slight variations in colour, packaging, or batch may occur, and we do not warrant that all content is entirely error-free.</p>

  <h2>5. Orders and Pricing</h2>
  <p>All prices are displayed in Euro (€) where applicable and may be subject to VAT in accordance with Italian tax law. Orders are confirmed only after successful payment. We reserve the right to refuse or cancel any order at our sole discretion.</p>

  <h2>6. Intellectual Property</h2>
  <p>All website content — including text, graphics, photographs, layouts, and the Souk Profumi name and logo — is the property of Souk Profumi or its content suppliers and is protected by Italian and international intellectual property laws. All third-party trademarks remain the property of their respective owners.</p>

  <h2>7. Limitation of Liability</h2>
  <p>To the maximum extent permitted by law, Souk Profumi shall not be liable for any indirect, incidental, special, or consequential damages arising out of or in connection with your use of the website or products purchased.</p>

  <h2>8. Indemnification</h2>
  <p>You agree to indemnify and hold harmless Souk Profumi, its owners, employees, and partners from any claim or demand arising from your breach of these Terms or violation of any applicable law.</p>

  <h2>9. Modifications</h2>
  <p>We reserve the right to update these Terms of Service at any time. Changes will be effective immediately upon publication on this page.</p>

  <h2>10. Governing Law</h2>
  <p>These Terms are governed by the laws of Italy. Any dispute arising in connection with these Terms shall be subject to the exclusive jurisdiction of the competent Italian courts.</p>

  <h2>11. Contact</h2>
  <p>For questions about these Terms, please reach out via the WhatsApp button on our website or use the form on our <a href="%%URL_CONTACT%%">Contact page</a>.</p>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * TERMS & CONDITIONS
 * ============================================================ */
function sp_page_tc() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legal</span>
    <h1 class="sp-h1">Terms &amp; Conditions</h1>
    <p class="sp-lede">Last Updated: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>These Terms &amp; Conditions govern the purchase of products from Souk Profumi (soukprofumi.it). By placing an order with us you accept the conditions set out below.</p>

  <h2>1. Customer Eligibility</h2>
  <p>To place an order you must be at least 18 years old and provide accurate, current, and complete information during the checkout process.</p>

  <h2>2. Order Acceptance</h2>
  <p>An order is considered accepted only after we send a confirmation email and successfully process payment. We reserve the right to refuse or cancel any order for reasons including but not limited to product availability, pricing errors, or suspected fraud.</p>

  <h2>3. Pricing &amp; Payment</h2>
  <p>All prices are listed in Euro (€) and are inclusive of applicable Italian VAT unless otherwise stated. We accept payments only through secure third-party providers. By submitting payment information, you authorise the relevant provider to charge the total order amount.</p>

  <h2>4. Authenticity Guarantee</h2>
  <p>Souk Profumi guarantees that every fragrance offered on our website is 100% authentic and sourced from trusted suppliers. We are an independent reseller and our products are presented for identification and descriptive purposes only.</p>

  <h2>5. Product Availability</h2>
  <p>Products are subject to availability. In the rare event that an item becomes unavailable after your order has been placed, we will notify you and offer a full refund or a suitable alternative.</p>

  <h2>6. Shipping &amp; Delivery</h2>
  <p>Shipping terms, timeframes, and costs are described in our <a href="%%URL_SHIPPING%%">Shipping &amp; Delivery Policy</a>. Delivery times are estimates and may vary due to customs clearance, courier delays, or other factors outside our control.</p>

  <h2>7. Returns &amp; Refunds</h2>
  <p>Our return and refund process is described in the <a href="%%URL_REFUND%%">Refund &amp; Return Policy</a>. Due to the nature of fragrance products and applicable hygiene regulations, certain conditions apply.</p>

  <h2>8. Cancellations</h2>
  <p>Order cancellations are subject to our <a href="%%URL_CANCEL%%">Cancellation Policy</a>.</p>

  <h2>9. Intellectual Property &amp; Trademarks</h2>
  <p>All trademarks, brand names, logos, product names, and copyrights displayed on this website are the property of their respective owners and are used solely for identification, informational, and descriptive purposes. Their use does not imply any affiliation, endorsement, or sponsorship by the trademark holders.</p>

  <h2>10. Liability</h2>
  <p>Souk Profumi is not liable for allergic reactions, sensitivities, or any indirect damage arising from the use of fragrance products. Customers are advised to review ingredient lists where available and discontinue use if irritation occurs.</p>

  <h2>11. Force Majeure</h2>
  <p>We are not responsible for any delay or failure to perform our obligations caused by circumstances beyond our reasonable control, including but not limited to strikes, transport disruptions, natural events, or governmental restrictions.</p>

  <h2>12. Governing Law &amp; Jurisdiction</h2>
  <p>These Terms &amp; Conditions are governed by the laws of Italy. Any dispute shall fall under the exclusive jurisdiction of the competent Italian courts, without prejudice to the mandatory consumer protection rights granted by EU law.</p>

  <h2>13. Contact</h2>
  <p>For any question regarding these Terms &amp; Conditions, please contact us through the floating WhatsApp button on our website or the form on our <a href="%%URL_CONTACT%%">Contact page</a>.</p>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * REFUND & RETURN POLICY
 * ============================================================ */
function sp_page_refund() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legal</span>
    <h1 class="sp-h1">Refund &amp; Return Policy</h1>
    <p class="sp-lede">Last Updated: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>At Souk Profumi we want every customer to be delighted with their purchase. If you are not satisfied, this policy describes how you may request a return or refund in accordance with Italian and EU consumer protection law.</p>

  <h2>1. Right of Withdrawal</h2>
  <p>In line with Italian Consumer Code (Codice del Consumo) and EU Directive 2011/83/EU, you have the right to withdraw from your purchase within <strong>14 days</strong> of receiving the products, without giving any reason.</p>

  <h2>2. Conditions for Return</h2>
  <p>To be eligible for return, items must be:</p>
  <ul>
    <li>Unopened, unused, and in their original packaging</li>
    <li>With all original seals, plastic wrap, and labels intact</li>
    <li>Returned in resalable condition</li>
  </ul>
  <p>Due to hygiene and safety regulations for fragrance products, items that have been opened, used, or had their original seal broken cannot be accepted for return.</p>

  <h2>3. How to Request a Return</h2>
  <p>To initiate a return, contact us via the WhatsApp button on our website within 14 days of delivery. Please include your order reference and the reason for return.</p>

  <h2>4. Return Shipping</h2>
  <p>Unless the product is defective or incorrectly shipped, return shipping costs are the responsibility of the customer. We recommend using a tracked, insured shipping method, as we cannot guarantee receipt of returned items.</p>

  <h2>5. Refunds</h2>
  <p>Once we receive and inspect the returned product, we will notify you of the approval or rejection of your refund. Approved refunds will be processed to the original payment method within <strong>14 business days</strong> of approval.</p>

  <h2>6. Damaged or Incorrect Items</h2>
  <p>If you receive a product that is damaged, defective, or incorrect, please contact us via WhatsApp within 48 hours of delivery with photographs. We will arrange a replacement or full refund — including return shipping — at no additional cost.</p>

  <h2>7. Non-Refundable Items</h2>
  <ul>
    <li>Opened or used fragrance products</li>
    <li>Items damaged due to customer mishandling</li>
    <li>Gift cards or promotional items</li>
    <li>Sale items marked as final</li>
  </ul>

  <h2>8. Late or Missing Refunds</h2>
  <p>If you have not received a refund after the timeframe above, please check with your bank or payment provider first. If the issue persists, contact us via WhatsApp.</p>

  <h2>9. Contact</h2>
  <p>For all return and refund enquiries, please reach out via the WhatsApp button on our website or use the form on our <a href="%%URL_CONTACT%%">Contact page</a>.</p>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * CANCELLATION POLICY
 * ============================================================ */
function sp_page_cancel() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legal</span>
    <h1 class="sp-h1">Cancellation Policy</h1>
    <p class="sp-lede">Last Updated: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>This Cancellation Policy sets out how and when an order placed on soukprofumi.it may be cancelled.</p>

  <h2>1. Cancellation Window</h2>
  <p>Orders may be cancelled free of charge within <strong>12 hours</strong> of being placed, provided the order has not yet been packed or shipped.</p>

  <h2>2. How to Cancel</h2>
  <p>To cancel an order, contact us as soon as possible via the WhatsApp button on our website. Please include your order reference number. We will confirm the cancellation in writing once processed.</p>

  <h2>3. Orders Already Shipped</h2>
  <p>If an order has already been packed or dispatched, it can no longer be cancelled. In that case, you may request a return once the parcel has been delivered, in accordance with our <a href="%%URL_REFUND%%">Refund &amp; Return Policy</a>.</p>

  <h2>4. Refunds for Cancelled Orders</h2>
  <p>Refunds for successfully cancelled orders are processed to the original payment method within <strong>7–14 business days</strong>, depending on your bank or payment provider.</p>

  <h2>5. Cancellation by Souk Profumi</h2>
  <p>We reserve the right to cancel any order — and refund in full — in the following cases:</p>
  <ul>
    <li>Product unavailability after order placement</li>
    <li>Pricing or description errors</li>
    <li>Suspected fraudulent transactions</li>
    <li>Failure to meet shipping or payment verification requirements</li>
    <li>Circumstances beyond our reasonable control</li>
  </ul>

  <h2>6. Contact</h2>
  <p>For cancellation requests, please contact us via the WhatsApp button on our website or use the form on our <a href="%%URL_CONTACT%%">Contact page</a>.</p>
</section>
<!-- /wp:html -->
HTML;
}

/* ============================================================
 * SHIPPING & DELIVERY POLICY
 * ============================================================ */
function sp_page_shipping() {
    return <<<'HTML'
<!-- wp:html -->
<section class="sp-hero">
  <div class="sp-hero__inner">
    <span class="sp-eyebrow">Legal</span>
    <h1 class="sp-h1">Shipping &amp; Delivery Policy</h1>
    <p class="sp-lede">Last Updated: 2026</p>
  </div>
</section>

<section class="sp-section sp-legal">
  <p>This Shipping &amp; Delivery Policy describes how Souk Profumi processes, packages, and delivers orders placed through soukprofumi.it.</p>

  <h2>1. Order Processing</h2>
  <p>Orders are processed within <strong>1–3 business days</strong> after payment confirmation. Orders placed on weekends or Italian public holidays are processed on the next working day.</p>

  <h2>2. Shipping Destinations</h2>
  <p>We ship across Italy and to selected international destinations. Available shipping options and rates are displayed at checkout based on your delivery address.</p>

  <h2>3. Delivery Timeframes</h2>
  <ul>
    <li><strong>Italy:</strong> typically 2–5 business days after dispatch</li>
    <li><strong>European Union:</strong> typically 5–10 business days after dispatch</li>
    <li><strong>International:</strong> typically 7–21 business days after dispatch (subject to customs)</li>
  </ul>
  <p>Delivery times are estimates and may vary due to courier capacity, customs clearance, or events outside our control.</p>

  <h2>4. Shipping Costs</h2>
  <p>Shipping costs are calculated at checkout based on order weight and destination. Promotional free shipping offers, where applicable, will be displayed during checkout.</p>

  <h2>5. Order Tracking</h2>
  <p>Once your order has been dispatched, you will receive a confirmation with a tracking number. You may use this number to monitor the progress of your shipment.</p>

  <h2>6. Packaging</h2>
  <p>All fragrances are packaged discreetly and securely to protect against breakage during transit. Glass items are wrapped with extra padding to prevent damage.</p>

  <h2>7. Customs, Duties &amp; Taxes</h2>
  <p>International orders may be subject to import duties, taxes, or customs fees applied by the destination country. These charges are the responsibility of the recipient and are not included in the product price or shipping cost.</p>

  <h2>8. Failed or Refused Deliveries</h2>
  <p>If a parcel is returned to us due to an incorrect address, refusal to accept delivery, or failure to collect from a depot, the customer may be required to cover re-shipping costs.</p>

  <h2>9. Lost or Damaged Shipments</h2>
  <p>If your parcel is lost in transit or arrives damaged, please contact us via WhatsApp within 48 hours of the expected delivery date or actual delivery. We will work with the courier to investigate and provide a replacement or refund where appropriate.</p>

  <h2>10. Contact</h2>
  <p>For any shipping-related enquiry, please reach out via the WhatsApp button on our website or use the form on our <a href="%%URL_CONTACT%%">Contact page</a>.</p>
</section>
<!-- /wp:html -->
HTML;
}
