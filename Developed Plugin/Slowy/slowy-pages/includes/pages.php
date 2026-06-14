<?php
/**
 * SLOWY generated page definitions.
 *
 * @package Slowy_Pages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Page definitions keyed by slug.
 *
 * @return array
 */
function slowy_get_page_definitions() {
	return array(
		'about-us'             => array(
			'title'   => 'About Us',
			'content' => slowy_page_about(),
		),
		'collections'          => array(
			'title'   => 'Collections',
			'content' => slowy_page_collections(),
		),
		'contact'              => array(
			'title'   => 'Contact Us',
			'content' => slowy_page_contact(),
		),
		'privacy-policy'       => array(
			'title'   => 'Privacy Policy',
			'content' => slowy_page_privacy(),
		),
		'terms-and-conditions' => array(
			'title'   => 'Terms & Conditions',
			'content' => slowy_page_terms(),
		),
		'return-refund-policy' => array(
			'title'   => 'Return & Refund Policy',
			'content' => slowy_page_return_refund(),
		),
		'cancellation-policy'  => array(
			'title'   => 'Cancellation Policy',
			'content' => slowy_page_cancellation(),
		),
		'shipping-policy'      => array(
			'title'   => 'Shipping Policy',
			'content' => slowy_page_shipping(),
		),
	);
}

function slowy_page_header( $eyebrow, $title, $intro ) {
	return '
<section class="slowy-hero">
  <div class="slowy-wrap">
    <a class="slowy-wordmark" href="%%URL_HOME%%" aria-label="SLOWY home">SLOWY</a>
    <span class="slowy-eyebrow">' . $eyebrow . '</span>
    <h1>' . $title . '</h1>
    <p>' . $intro . '</p>
  </div>
</section>';
}

function slowy_contact_card() {
	return '
<aside class="slowy-contact-card">
  <h2>Contact SLOWY</h2>
  <ul class="slowy-contact-list">
    <li><span>Email</span><a href="mailto:%%EMAIL%%">%%EMAIL%%</a></li>
    <li><span>Call / WhatsApp</span><a href="%%WHATSAPP%%" target="_blank" rel="noopener">%%PHONE%%</a></li>
    <li><span>Address</span><strong>%%ADDRESS%%</strong></li>
    <li><span>Support Hours</span><strong>%%SUPPORT_HOURS%%</strong></li>
  </ul>
</aside>';
}

function slowy_page_about() {
	return slowy_page_header(
		'Welcome to SLOWY',
		'Fashion That Speaks Your Style',
		'At SLOWY, fashion is more than style. It is a way to express yourself with confidence, elegance, and comfort.'
	) . <<<'HTML'

<section class="slowy-section">
  <div class="slowy-two-col">
    <div>
      <span class="slowy-kicker">Who We Are</span>
      <h2>Jewellery and fashion selected with care</h2>
      <p>We bring you trendy jewellery and stylish fashion collections designed to make every moment special. From elegant rings and necklaces to everyday outfits and accessories, every product is selected with love, quality, and modern fashion in mind.</p>
      <p>SLOWY was started with a dream to create a stylish and trusted online fashion brand for everyone. We noticed that many people want premium-looking jewellery and fashion at reasonable prices. That is why we created SLOWY, a place where style meets affordability.</p>
    </div>
    <div class="slowy-panel">
      <h3>Our Mission</h3>
      <ul class="slowy-check-list">
        <li>Premium quality products</li>
        <li>Affordable pricing</li>
        <li>Trendy and elegant designs</li>
        <li>Fast and secure shopping experience</li>
      </ul>
      <p>We want every customer to feel confident, stylish, and special while shopping with us.</p>
    </div>
  </div>
</section>

<section class="slowy-section slowy-section-soft">
  <div class="slowy-wrap">
    <div class="slowy-section-head">
      <span class="slowy-kicker">Why Choose SLOWY</span>
      <h2>Designed around trust, quality, and everyday style</h2>
    </div>
    <div class="slowy-grid slowy-grid-3">
      <article class="slowy-card"><span>01</span><h3>Trendy Collections</h3><p>Fresh jewellery, fashion, beauty, and accessory picks selected for modern shoppers.</p></article>
      <article class="slowy-card"><span>02</span><h3>Skin-Friendly Jewellery</h3><p>Thoughtfully selected pieces with premium finishing and daily-wear comfort in mind.</p></article>
      <article class="slowy-card"><span>03</span><h3>Affordable Fashion</h3><p>Premium-looking products at reasonable prices so style stays accessible.</p></article>
      <article class="slowy-card"><span>04</span><h3>Secure Payments</h3><p>Trusted payment gateways and a smooth prepaid checkout experience.</p></article>
      <article class="slowy-card"><span>05</span><h3>Careful Packaging</h3><p>We focus on safe packaging so your order reaches you in good condition.</p></article>
      <article class="slowy-card"><span>06</span><h3>Customer-First Support</h3><p>Questions, order help, and support are available through email, call, and WhatsApp.</p></article>
    </div>
  </div>
</section>

<section class="slowy-section">
  <div class="slowy-promise">
    <div>
      <span class="slowy-kicker">Our Promise</span>
      <h2>Your trust means everything to us</h2>
      <p>We focus on quality products, safe packaging, fast shipping, secure payments, and customer satisfaction. Thank you for choosing SLOWY as your fashion destination.</p>
    </div>
    <a class="slowy-button" href="%%URL_CONTACT%%">Contact Us</a>
  </div>
</section>
HTML;
}

function slowy_page_collections() {
	return slowy_page_header(
		'Shop By Category',
		'SLOWY Collections',
		'Explore SLOWY jewellery, clothing, accessories, and beauty categories arranged for simple shopping.'
	) . <<<'HTML'

<section class="slowy-section">
  <div class="slowy-section-head">
    <span class="slowy-kicker">Main Structure</span>
    <h2>Women</h2>
  </div>
  <div class="slowy-grid slowy-grid-3">
    <article class="slowy-category-card">
      <h3>Clothing</h3>
      <ul>
        <li>Kurti</li>
        <li>T-shirt</li>
        <li>Women&apos;s Clothing</li>
      </ul>
    </article>
    <article class="slowy-category-card">
      <h3>Jewellery</h3>
      <ul>
        <li>All Jewellery</li>
        <li>Earrings</li>
        <li>Bracelets</li>
        <li>Bangles</li>
        <li>Jewellery Set</li>
        <li>Mangalsutras</li>
        <li>Chains</li>
        <li>Anklet</li>
        <li>Rings</li>
        <li>Combos</li>
      </ul>
    </article>
    <article class="slowy-category-card">
      <h3>Accessories</h3>
      <ul>
        <li>Hair Bands</li>
        <li>Hair Buns</li>
        <li>Hair Clips</li>
        <li>Women Watches</li>
        <li>Trendy Accessories</li>
      </ul>
    </article>
  </div>
</section>

<section class="slowy-section slowy-section-soft">
  <div class="slowy-wrap">
    <div class="slowy-grid slowy-grid-2">
      <article class="slowy-category-card slowy-category-card-large">
        <span class="slowy-kicker">Beauty</span>
        <h3>Makeup &amp; Beauty</h3>
        <ul>
          <li>Lipstick</li>
          <li>Eye Shadow &amp; Liner</li>
          <li>Kajal</li>
          <li>Nail Paint</li>
          <li>Makeup Kit</li>
          <li>Mascara</li>
        </ul>
      </article>
      <article class="slowy-category-card slowy-category-card-large">
        <span class="slowy-kicker">Fashion</span>
        <h3>More Collections</h3>
        <ul>
          <li>Men&apos;s Clothing</li>
          <li>Pendants</li>
          <li>Necklaces</li>
          <li>Bracelets</li>
          <li>Rings</li>
          <li>Gift Combos</li>
        </ul>
      </article>
    </div>
  </div>
</section>

<section class="slowy-section">
  <div class="slowy-promise">
    <div>
      <span class="slowy-kicker">Need Help?</span>
      <h2>Ask us about product availability</h2>
      <p>Categories and stock may change as new collections arrive. Contact our support team for help choosing the right product.</p>
    </div>
    <a class="slowy-button" href="%%WHATSAPP%%" target="_blank" rel="noopener">Chat on WhatsApp</a>
  </div>
</section>
HTML;
}

function slowy_page_contact() {
	return slowy_page_header(
		'Contact Us',
		'We Would Love to Hear From You',
		'Have questions, suggestions, or need order support? Reach SLOWY by email, call, or WhatsApp during support hours.'
	) . <<<'HTML'

<section class="slowy-section">
  <div class="slowy-two-col slowy-two-col-contact">
    <div>
      <span class="slowy-kicker">Customer Support</span>
      <h2>Fast help for orders, returns, and product questions</h2>
      <p>Contact our team for shipping questions, product information, return and refund support, or suggestions. Please include your order details when contacting us about an existing order.</p>
      <div class="slowy-action-row">
        <a class="slowy-button" href="%%WHATSAPP%%" target="_blank" rel="noopener">WhatsApp Us</a>
        <a class="slowy-button slowy-button-secondary" href="mailto:%%EMAIL%%">Email Support</a>
      </div>
    </div>
    %%CONTACT_CARD%%
  </div>
</section>

<section class="slowy-section slowy-section-soft">
  <div class="slowy-wrap">
    <div class="slowy-grid slowy-grid-3">
      <article class="slowy-card"><span>01</span><h3>Order Support</h3><p>For payment, dispatch, tracking, and delivery related questions.</p></article>
      <article class="slowy-card"><span>02</span><h3>Returns &amp; Refunds</h3><p>For damaged, defective, wrong, missing, or incorrect item claims.</p></article>
      <article class="slowy-card"><span>03</span><h3>Product Help</h3><p>For sizing, product details, jewellery care, and category availability.</p></article>
    </div>
  </div>
</section>
HTML;
}

function slowy_page_privacy() {
	return slowy_page_header(
		'Privacy Policy',
		'How SLOWY Protects Your Information',
		'Last Updated: %%LAST_UPDATED%%. This Privacy Policy explains how we collect, use, and protect your data when you use our website.'
	) . <<<'HTML'

<section class="slowy-section">
  <div class="slowy-policy-layout">
    <article class="slowy-policy">
      <p>At SLOWY, we value your privacy and are committed to protecting your personal information. By using our website, you consent to the practices described in this Privacy Policy.</p>

      <h2>Information We Collect</h2>
      <p>We may collect the following information when you place an order, contact us, or use our website:</p>
      <ul>
        <li>Full name</li>
        <li>Phone number</li>
        <li>Email address</li>
        <li>Billing and shipping address</li>
        <li>Order details</li>
        <li>Device and browser information</li>
      </ul>

      <h2>Payment Information</h2>
      <p>We do not directly collect or store debit or credit card details on our servers. All payments are processed securely through trusted third-party payment gateways.</p>

      <h2>How We Use Your Information</h2>
      <ul>
        <li>Order processing</li>
        <li>Shipping and delivery</li>
        <li>Customer support</li>
        <li>Refund and return handling</li>
        <li>Improving website experience</li>
        <li>Fraud prevention</li>
        <li>Promotional communication</li>
      </ul>

      <h2>Shipping Partners</h2>
      <p>We share necessary details such as name, phone number, and address with courier and shipping partners only for successful delivery of your orders.</p>

      <h2>Data Security</h2>
      <p>We take reasonable security measures to protect your personal data. However, no online platform or internet transmission is completely secure.</p>

      <h2>Marketing &amp; Communication</h2>
      <p>By providing your phone number or email address, you agree to receive order updates, shipping notifications, promotional offers, and WhatsApp, SMS, or email communication. You may opt out of promotional communication anytime.</p>

      <h2>Cookies &amp; Tracking Technologies</h2>
      <p>Our website uses cookies and similar technologies to improve user experience, analyze website traffic, remember user preferences, and show relevant products and offers. You can disable cookies through your browser settings.</p>

      <h2>Your Rights</h2>
      <p>You may request access to your personal data, correction of incorrect information, or deletion of your personal information by contacting us.</p>

      <h2>Data Retention</h2>
      <p>We retain customer and order information only for as long as necessary for legal compliance, tax purposes, business operations, and fraud prevention.</p>

      <h2>Third-Party Services</h2>
      <p>We may use third-party services such as payment gateways, courier companies, analytics providers, and marketing tools. These services have their own privacy policies, and we are not responsible for their practices.</p>

      <h2>External Links</h2>
      <p>Our website may contain links to third-party websites. We are not responsible for their privacy policies, content, or services.</p>

      <h2>Children&apos;s Privacy</h2>
      <p>Our website is not intended for individuals under 18 years of age. We do not knowingly collect personal information from children.</p>

      <h2>Legal Compliance</h2>
      <p>We comply with applicable Indian IT laws and data protection regulations.</p>

      <h2>Policy Updates</h2>
      <p>SLOWY may update this Privacy Policy from time to time. Any changes will be posted on this page with updated revision dates.</p>
    </article>
    %%CONTACT_CARD%%
  </div>
</section>
HTML;
}

function slowy_page_terms() {
	return slowy_page_header(
		'Terms & Conditions',
		'SLOWY Website Terms',
		'Last Updated: %%LAST_UPDATED%%. By accessing or using our website, you agree to comply with these Terms & Conditions.'
	) . <<<'HTML'

<section class="slowy-section">
  <div class="slowy-policy-layout">
    <article class="slowy-policy">
      <h2>General</h2>
      <p>SLOWY is an online store offering jewellery, clothing, accessories, beauty items, and related fashion products. By using this website, you confirm that you are at least 18 years old or using the website under parental supervision, and that you agree to provide accurate and complete information while placing orders.</p>

      <h2>Product Information</h2>
      <p>We try our best to display products accurately. Slight color variations may occur due to lighting or screen settings. Fashion jewellery may have minor variations in design or finishing. Product images are for representation purposes only. Product availability may change without prior notice.</p>

      <h2>Pricing &amp; Payments</h2>
      <ul>
        <li>All prices are listed in Indian Rupees.</li>
        <li>Prices may change without prior notice.</li>
        <li>We reserve the right to cancel orders with incorrect pricing caused by technical or human errors.</li>
        <li>All payments are processed securely through trusted payment gateways.</li>
        <li>Currently, Cash on Delivery is not available.</li>
      </ul>

      <h2>Order Acceptance</h2>
      <p>SLOWY reserves the right to accept or reject any order, cancel suspicious or fraudulent orders, cancel orders due to stock unavailability, and request additional verification if necessary.</p>

      <h2>Returns &amp; Refunds</h2>
      <p>Returns are accepted only for damaged products, wrong products, or defective items. Return requests must be raised within 2 days of delivery. A proper unboxing video is mandatory. Product must be unused and in original packaging. Without valid unboxing proof, claims may not be accepted.</p>
      <p>Detailed information is available on our <a href="%%URL_REFUND%%">Return &amp; Refund Policy</a> page.</p>

      <h2>Clothing Disclaimer</h2>
      <p>Customers are advised to check size charts carefully before placing orders. Size or fitting issues may not qualify for return unless the wrong item was delivered by SLOWY.</p>

      <h2>Prohibited Activities</h2>
      <ul>
        <li>Placing fake orders</li>
        <li>Using false information</li>
        <li>Abusing offers or discounts</li>
        <li>Attempting hacking or misuse of the website</li>
        <li>Copying website content, logo, or product images</li>
      </ul>
      <p>Violation may result in account restriction or legal action.</p>

      <h2>Communication</h2>
      <p>By using our website, you agree to receive communication from SLOWY via email, SMS, or WhatsApp related to orders, updates, and promotions.</p>

      <h2>Privacy</h2>
      <p>By using this website, you also agree to our <a href="%%URL_PRIVACY%%">Privacy Policy</a> regarding collection and usage of customer information.</p>

      <h2>Limitation of Liability</h2>
      <p>SLOWY shall not be responsible for indirect or incidental damages, technical interruptions, delivery delays caused by courier partners, or customer misuse of products.</p>

      <h2>Force Majeure</h2>
      <p>SLOWY shall not be held responsible for delays or failures caused by events beyond reasonable control including natural disasters, strikes, technical failures, government restrictions, or courier disruptions.</p>

      <h2>Policy Updates</h2>
      <p>SLOWY reserves the right to update these Terms & Conditions at any time without prior notice. Updated versions will be posted on this page.</p>
    </article>
    %%CONTACT_CARD%%
  </div>
</section>
HTML;
}

function slowy_page_return_refund() {
	return slowy_page_header(
		'Return & Refund Policy',
		'SLOWY Return & Refund Rules',
		'Last Updated: %%LAST_UPDATED%%. Please read this policy carefully before placing an order.'
	) . <<<'HTML'

<section class="slowy-section">
  <div class="slowy-policy-layout">
    <article class="slowy-policy">
      <p>At SLOWY, we strive to provide quality products and a smooth shopping experience.</p>

      <h2>Eligible Returns</h2>
      <p>Returns will only be accepted if the product received is damaged, the wrong product was received, or a defective item was received. Products must be unused, unwashed, and in original packaging with tags intact.</p>

      <h2>Return Request Time</h2>
      <p>Customers must raise a return request within 2 days of delivery. Return requests made after 2 days may not be accepted.</p>

      <h2>Unboxing Video Required</h2>
      <p>A proper unboxing video is mandatory for any return, missing item, or damage claim.</p>
      <ul>
        <li>Video must start before opening the package.</li>
        <li>Shipping label must be clearly visible.</li>
        <li>Video should be continuous without cuts or edits.</li>
      </ul>
      <p>Without a valid unboxing video, return or refund requests may be rejected.</p>

      <h2>Non-Returnable Conditions</h2>
      <ul>
        <li>Product is used, worn, or washed.</li>
        <li>Product is damaged by customer misuse.</li>
        <li>No unboxing video is provided.</li>
        <li>Return request is made after 2 days.</li>
        <li>Customer changes mind after purchase.</li>
        <li>Minor color variation occurs due to lighting or screen settings.</li>
        <li>Sale or discounted products, if applicable.</li>
      </ul>

      <h2>Jewellery Return Policy</h2>
      <p>For hygiene and safety reasons, certain jewellery items such as earrings may not be eligible for return unless received damaged or defective.</p>

      <h2>Clothing Return Policy</h2>
      <p>Customers are advised to check product details and size information carefully before placing orders. Size or fitting issues may not qualify for return unless the wrong size was delivered by SLOWY.</p>

      <h2>Refund Process</h2>
      <p>Once the returned product is received and inspected, approved refunds will be processed within 5-7 business days. Refund will be credited to the original payment method. Shipping charges, if any, are non-refundable.</p>

      <h2>Order Cancellation</h2>
      <p>Orders can only be cancelled before dispatch. Once shipped, cancellation requests may not be accepted.</p>

      <h2>Missing or Incorrect Items</h2>
      <p>If you receive missing products, incorrect items, or an empty package, please contact us within 24 hours of delivery with proper unboxing proof.</p>

      <h2>Important Notice</h2>
      <p>SLOWY reserves the right to reject return or refund requests if policy conditions are not met.</p>
    </article>
    %%CONTACT_CARD%%
  </div>
</section>
HTML;
}

function slowy_page_cancellation() {
	return slowy_page_header(
		'Cancellation Policy',
		'Cancelling a SLOWY Order',
		'Last Updated: %%LAST_UPDATED%%. Orders can be cancelled only before dispatch.'
	) . <<<'HTML'

<section class="slowy-section">
  <div class="slowy-policy-layout">
    <article class="slowy-policy">
      <h2>Before Dispatch</h2>
      <p>You may request cancellation before your order is dispatched. To request cancellation, contact SLOWY support with your order number and registered phone number or email address.</p>

      <h2>After Dispatch</h2>
      <p>Once an order has been shipped, cancellation requests may not be accepted. If there is a genuine issue such as a damaged, defective, or wrong product, please follow our <a href="%%URL_REFUND%%">Return &amp; Refund Policy</a>.</p>

      <h2>Payment Reversal</h2>
      <p>If an eligible prepaid order is cancelled before dispatch, the refund will be initiated to the original payment method. Processing timelines may depend on the payment gateway or bank.</p>

      <h2>Right to Cancel</h2>
      <p>SLOWY may cancel orders due to stock unavailability, incorrect pricing, suspicious activity, payment issues, incomplete shipping details, or other operational reasons.</p>
    </article>
    %%CONTACT_CARD%%
  </div>
</section>
HTML;
}

function slowy_page_shipping() {
	return slowy_page_header(
		'Shipping Policy',
		'SLOWY Shipping & Delivery',
		'Last Updated: %%LAST_UPDATED%%. We are committed to delivering your orders safely and on time.'
	) . <<<'HTML'

<section class="slowy-section">
  <div class="slowy-policy-layout">
    <article class="slowy-policy">
      <h2>Order Processing Time</h2>
      <p>Orders are usually processed within 1-2 business days after confirmation. Orders placed on Sundays or public holidays may be processed on the next working day.</p>

      <h2>Shipping Timeline</h2>
      <ul>
        <li>Metro Cities: 3-7 business days</li>
        <li>Other Locations: 5-10 business days</li>
      </ul>
      <p>Delivery timelines may vary depending on location, courier availability, weather conditions, festivals, or unforeseen circumstances.</p>

      <h2>Cash on Delivery</h2>
      <p>Currently, Cash on Delivery service is not available on SLOWY. Customers can place orders using secure prepaid payment methods available during checkout. SLOWY may introduce Cash on Delivery service in the future without prior notice.</p>

      <h2>Shipping Charges</h2>
      <ul>
        <li>Free shipping is available on orders above Rs. 799.</li>
        <li>Orders below Rs. 799 may include standard shipping charges.</li>
        <li>Shipping charges, if applicable, will be shown during checkout.</li>
      </ul>

      <h2>Secure Payments</h2>
      <p>All payments are processed through trusted and secure payment gateways. We support UPI, debit and credit cards, net banking, and wallet payments.</p>

      <h2>Order Tracking</h2>
      <p>Once your order is shipped, tracking details will be shared via SMS, WhatsApp, or email. Customers can track their order using the provided tracking link.</p>

      <h2>Delivery Delays</h2>
      <p>While we try our best to deliver orders on time, delays may occur due to courier partner issues, weather conditions, public holidays, high order volume, or remote locations. SLOWY is not responsible for delays caused by third-party courier services.</p>

      <h2>Incorrect Address</h2>
      <p>Customers are responsible for providing accurate shipping details. If incorrect or incomplete address information is provided, delivery may fail, additional shipping charges may apply, or order cancellation may occur.</p>

      <h2>Lost or Missing Packages</h2>
      <p>If your order is marked as delivered but not received, please contact us within 24 hours of delivery status update. We will coordinate with the courier partner for investigation.</p>
    </article>
    %%CONTACT_CARD%%
  </div>
</section>
HTML;
}
