<?php
/**
 * VOSTRA Pages — page content builders.
 * Each function returns the raw HTML body for one page (without the wp:html
 * wrapper, which is added on insert). Placeholders %%...%% are resolved at
 * runtime by the the_content filter in the main plugin file.
 *
 * @package VOSTRA_Pages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ----------------------------------------------------------------------------
 * Shared building blocks
 * -------------------------------------------------------------------------- */

/**
 * Social icon links — only renders icons whose constant is non-empty.
 *
 * @param string $variant 'hero' or 'footer' for class context.
 * @return string
 */
function vostra_social_links( $variant = 'footer' ) {
	$socials = array(
		'instagram' => array( VOSTRA_INSTAGRAM, 'fa-instagram', 'Instagram' ),
		'facebook'  => array( VOSTRA_FACEBOOK, 'fa-facebook-f', 'Facebook' ),
		'twitter'   => array( VOSTRA_TWITTER, 'fa-x-twitter', 'X' ),
		'youtube'   => array( VOSTRA_YOUTUBE, 'fa-youtube', 'YouTube' ),
		'linkedin'  => array( VOSTRA_LINKEDIN, 'fa-linkedin-in', 'LinkedIn' ),
	);

	$out = '<div class="vos-social vos-social--' . esc_attr( $variant ) . '">';
	$has = false;
	foreach ( $socials as $key => $s ) {
		list( $url, $icon, $label ) = $s;
		if ( empty( $url ) ) {
			continue;
		}
		$has = true;
		$out .= '<a class="vos-social-link" href="' . esc_url( $url ) . '" target="_blank" rel="noopener" aria-label="' . esc_attr( $label ) . '"><i class="fa-brands ' . esc_attr( $icon ) . '"></i></a>';
	}
	$out .= '</div>';

	return $has ? $out : '';
}

/**
 * Reusable bottom CTA panel.
 */
function vostra_cta_panel() {
	$wa = 'https://wa.me/' . preg_replace( '/\D/', '', VOSTRA_WHATSAPP );
	return '
	<section class="vos-cta">
		<div class="vos-cta-inner">
			<span class="vos-eyebrow">Get In Touch</span>
			<h2 class="vos-cta-title">Wear Confidence. Move Different.</h2>
			<p class="vos-cta-text">Questions about sizing, an order, or a collaboration? Our team replies within 24&ndash;48 business hours. Reach out and we&rsquo;ll take care of the rest.</p>
			<div class="vos-cta-actions">
				<a class="vos-btn vos-btn-primary" href="%%URL_CONTACT%%">Contact Us</a>
				<a class="vos-btn vos-btn-ghost" href="' . esc_url( $wa ) . '" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i> WhatsApp Us</a>
			</div>
		</div>
	</section>';
}

/**
 * Full site footer — rendered inside the Home page only.
 */
function vostra_site_footer() {
	$logo    = VOSTRA_LOGO_URL;
	$brand   = VOSTRA_BRAND_NAME;
	$tag     = VOSTRA_TAGLINE;
	$email   = VOSTRA_EMAIL;
	$phone   = VOSTRA_PHONE;
	$address = VOSTRA_ADDRESS;
	$year    = gmdate( 'Y' );
	$wa      = 'https://wa.me/' . preg_replace( '/\D/', '', VOSTRA_WHATSAPP );
	$social  = vostra_social_links( 'footer' );

	return <<<HTML
	<footer class="vos-footer">
		<div class="vos-footer-grid">
			<div class="vos-footer-col vos-footer-brand">
				<img class="vos-footer-logo" src="$logo" alt="$brand logo" />
				<p class="vos-footer-tag">$tag</p>
				<p class="vos-footer-desc">Premium streetwear designed for confidence, comfort, and durability. Built for everyday wear &mdash; made to last.</p>
				$social
			</div>

			<div class="vos-footer-col">
				<h4 class="vos-footer-head">Quick Links</h4>
				<ul class="vos-footer-links">
					<li><a href="%%URL_HOME%%">Home</a></li>
					<li><a href="%%URL_ABOUT%%">About Us</a></li>
					<li><a href="%%URL_SERVICES%%">What We Offer</a></li>
					<li><a href="%%URL_CONTACT%%">Contact</a></li>
				</ul>
			</div>

			<div class="vos-footer-col">
				<h4 class="vos-footer-head">Policies</h4>
				<ul class="vos-footer-links">
					<li><a href="%%URL_PRIVACY%%">Privacy Policy</a></li>
					<li><a href="%%URL_TERMS%%">Terms of Service</a></li>
					<li><a href="%%URL_TERMS_C%%">Terms &amp; Conditions</a></li>
					<li><a href="%%URL_REFUND%%">Refund &amp; Return Policy</a></li>
					<li><a href="%%URL_CANCEL%%">Cancellation Policy</a></li>
					<li><a href="%%URL_SHIPPING%%">Shipping &amp; Delivery Policy</a></li>
				</ul>
			</div>

			<div class="vos-footer-col">
				<h4 class="vos-footer-head">Get In Touch</h4>
				<ul class="vos-footer-contact">
					<li><i class="fa-brands fa-whatsapp"></i> <a href="$wa" target="_blank" rel="noopener">Chat on WhatsApp</a></li>
					<li><i class="fa-solid fa-phone"></i> <a href="tel:$phone">$phone</a></li>
					<li><i class="fa-solid fa-envelope"></i> <a href="mailto:$email">$email</a></li>
					<li><i class="fa-solid fa-location-dot"></i> $address</li>
				</ul>
			</div>
		</div>

		<div class="vos-footer-bottom">
			<p>&copy; $year $brand. All rights reserved.</p>
			<p>Developed by <a href="https://nextgenfusionl.in" target="_blank" rel="noopener">NextGen Fusion</a></p>
		</div>
	</footer>
HTML;
}

/* ----------------------------------------------------------------------------
 * HOME
 * -------------------------------------------------------------------------- */

function vostra_content_home() {
	$logo   = VOSTRA_LOGO_URL;
	$brand  = VOSTRA_BRAND_NAME;
	$cta    = vostra_cta_panel();
	$footer = vostra_site_footer();

	return <<<HTML
<div class="vos-wrap">

	<section class="vos-hero vos-hero--home">
		<div class="vos-hero-inner">
			<img class="vos-hero-logo" src="$logo" alt="$brand" />
			<span class="vos-eyebrow">Est. 2024 &bull; Premium Streetwear</span>
			<h1 class="vos-hero-title">Focus On<br><span class="vos-accent-text">What Matters.</span></h1>
			<p class="vos-hero-text">$brand creates premium-quality streetwear that combines comfort, style, and durability. New mindset. New standard. New you &mdash; wear confidence, every single day.</p>
			<div class="vos-hero-actions">
				<a class="vos-btn vos-btn-primary" href="%%URL_SERVICES%%">Explore The Collection</a>
				<a class="vos-btn vos-btn-ghost" href="%%URL_ABOUT%%">Our Story</a>
			</div>
		</div>
	</section>

	<section class="vos-section">
		<div class="vos-section-head">
			<span class="vos-eyebrow">Built For Everyday</span>
			<h2 class="vos-section-title">Why VOSTRA</h2>
			<p class="vos-section-sub">Minimal style. Maximum attitude. Every piece is designed with attention to fabric quality, fit, and detail before it ever reaches you.</p>
		</div>
		<div class="vos-grid">
			<article class="vos-card">
				<div class="vos-card-icon"><i class="fa-solid fa-gem"></i></div>
				<h3 class="vos-card-title">Premium Fabric</h3>
				<p class="vos-card-text">Heavyweight, durable cotton built to keep its shape and feel great wash after wash.</p>
			</article>
			<article class="vos-card">
				<div class="vos-card-icon"><i class="fa-solid fa-ruler-combined"></i></div>
				<h3 class="vos-card-title">Oversized Fit</h3>
				<p class="vos-card-text">A clean, modern streetwear silhouette designed to move different and stand out.</p>
			</article>
			<article class="vos-card">
				<div class="vos-card-icon"><i class="fa-solid fa-shield-halved"></i></div>
				<h3 class="vos-card-title">Secure Payments</h3>
				<p class="vos-card-text">Checkout protected by trusted payment providers &mdash; UPI, cards, and net banking.</p>
			</article>
			<article class="vos-card">
				<div class="vos-card-icon"><i class="fa-solid fa-rotate"></i></div>
				<h3 class="vos-card-title">Easy Exchange</h3>
				<p class="vos-card-text">Wrong size? Hassle-free 7-day exchange on unused items with tags attached.</p>
			</article>
		</div>
	</section>

	<section class="vos-stats">
		<div class="vos-stat">
			<span class="vos-stat-num">1&ndash;3</span>
			<span class="vos-stat-label">Day Processing</span>
		</div>
		<div class="vos-stat">
			<span class="vos-stat-num">100%</span>
			<span class="vos-stat-label">Premium Cotton</span>
		</div>
		<div class="vos-stat">
			<span class="vos-stat-num">7-Day</span>
			<span class="vos-stat-label">Easy Exchange</span>
		</div>
		<div class="vos-stat">
			<span class="vos-stat-num">24&ndash;48h</span>
			<span class="vos-stat-label">Support Reply</span>
		</div>
	</section>

	<section class="vos-section vos-section--alt">
		<div class="vos-section-head">
			<span class="vos-eyebrow">The Collection</span>
			<h2 class="vos-section-title">Designed With Intent</h2>
			<p class="vos-section-sub">Statement pieces with a message behind every print &mdash; discipline, focus, and growth.</p>
		</div>
		<div class="vos-grid">
			<article class="vos-card vos-card--feature">
				<span class="vos-card-num">01</span>
				<h3 class="vos-card-title">Discipline</h3>
				<p class="vos-card-text">Do it for your future self. A varsity-inspired statement tee for the relentless.</p>
			</article>
			<article class="vos-card vos-card--feature">
				<span class="vos-card-num">02</span>
				<h3 class="vos-card-title">Blur</h3>
				<p class="vos-card-text">Focus on yourself. Clean design, strong impact &mdash; keep it clean, move different.</p>
			</article>
			<article class="vos-card vos-card--feature">
				<span class="vos-card-num">03</span>
				<h3 class="vos-card-title">Eternal</h3>
				<p class="vos-card-text">Timeless mind. An eternal state of mind, beyond time, beyond limits.</p>
			</article>
		</div>
	</section>

	$cta

	$footer

</div>
HTML;
}

/* ----------------------------------------------------------------------------
 * ABOUT US
 * -------------------------------------------------------------------------- */

function vostra_content_about() {
	$cta = vostra_cta_panel();

	return <<<HTML
<div class="vos-wrap">

	<section class="vos-hero">
		<div class="vos-hero-inner">
			<span class="vos-eyebrow">Our Story</span>
			<h1 class="vos-hero-title">Welcome to VOSTRA</h1>
			<p class="vos-hero-text">Wear Confidence. A growing Indian fashion brand built on quality products, honest service, and continuous improvement.</p>
		</div>
	</section>

	<section class="vos-section">
		<div class="vos-two-col">
			<div class="vos-two-col-main">
				<h2 class="vos-section-title vos-left">Designed for Confidence. Built for Everyday Wear.</h2>
				<p>At VOSTRA, we create premium-quality streetwear that combines comfort, style, and durability. We believe great clothing should not only look good but also feel good and last long.</p>
				<p>Every VOSTRA product is carefully designed with attention to fabric quality, fit, and detail. We work to ensure that each piece meets high standards before it reaches our customers.</p>
				<p>Customer satisfaction is at the heart of everything we do. From secure payments to reliable order processing and dedicated support, we strive to provide a smooth and trustworthy shopping experience.</p>
				<p>As a growing Indian fashion brand, we are committed to building long-term relationships with our customers through quality products, honest service, and continuous improvement.</p>
				<p class="vos-signoff">Thank you for being a part of the VOSTRA journey.</p>
			</div>
			<aside class="vos-two-col-side">
				<h3 class="vos-side-head">What Makes Us Different</h3>
				<ul class="vos-features">
					<li><i class="fa-solid fa-check"></i> Premium, heavyweight fabric built to last</li>
					<li><i class="fa-solid fa-check"></i> Considered fit, finish, and print detail</li>
					<li><i class="fa-solid fa-check"></i> Secure, trusted payment processing</li>
					<li><i class="fa-solid fa-check"></i> Reliable 1&ndash;3 day order processing</li>
					<li><i class="fa-solid fa-check"></i> Easy 7-day exchange policy</li>
					<li><i class="fa-solid fa-check"></i> Dedicated customer support team</li>
				</ul>
				<div class="vos-side-quote">
					&ldquo;New mindset. New standard. New you.&rdquo;
				</div>
			</aside>
		</div>
	</section>

	$cta

</div>
HTML;
}

/* ----------------------------------------------------------------------------
 * SERVICES / WHAT WE OFFER
 * -------------------------------------------------------------------------- */

function vostra_content_services() {
	$cta = vostra_cta_panel();

	return <<<HTML
<div class="vos-wrap">

	<section class="vos-hero">
		<div class="vos-hero-inner">
			<span class="vos-eyebrow">What We Offer</span>
			<h1 class="vos-hero-title">Minimal Style.<br><span class="vos-accent-text">Maximum Attitude.</span></h1>
			<p class="vos-hero-text">From premium oversized tees to a shopping experience built on trust &mdash; here&rsquo;s everything that comes with wearing VOSTRA.</p>
		</div>
	</section>

	<section class="vos-section">
		<div class="vos-grid">
			<article class="vos-card vos-card--num">
				<span class="vos-card-num">01</span>
				<h3 class="vos-card-title">Premium Streetwear</h3>
				<p class="vos-card-text">Statement oversized tees crafted from heavyweight cotton for a confident, lasting fit.</p>
				<ul class="vos-features vos-features--sm">
					<li><i class="fa-solid fa-check"></i> Heavyweight, durable cotton</li>
					<li><i class="fa-solid fa-check"></i> Clean oversized silhouette</li>
					<li><i class="fa-solid fa-check"></i> Bold, intentional prints</li>
				</ul>
			</article>
			<article class="vos-card vos-card--num">
				<span class="vos-card-num">02</span>
				<h3 class="vos-card-title">Fast Order Processing</h3>
				<p class="vos-card-text">Orders are processed quickly so your fit reaches you without the wait.</p>
				<ul class="vos-features vos-features--sm">
					<li><i class="fa-solid fa-check"></i> 1&ndash;3 business day dispatch</li>
					<li><i class="fa-solid fa-check"></i> Tracking via email or SMS</li>
					<li><i class="fa-solid fa-check"></i> Reliable courier partners</li>
				</ul>
			</article>
			<article class="vos-card vos-card--num">
				<span class="vos-card-num">03</span>
				<h3 class="vos-card-title">Easy Exchange</h3>
				<p class="vos-card-text">Got the wrong size or a defect? We make swaps simple and stress-free.</p>
				<ul class="vos-features vos-features--sm">
					<li><i class="fa-solid fa-check"></i> 7-day exchange window</li>
					<li><i class="fa-solid fa-check"></i> Unused items with tags</li>
					<li><i class="fa-solid fa-check"></i> Quick email support</li>
				</ul>
			</article>
			<article class="vos-card vos-card--num">
				<span class="vos-card-num">04</span>
				<h3 class="vos-card-title">Secure Checkout</h3>
				<p class="vos-card-text">Your payment details stay protected through trusted, encrypted providers.</p>
				<ul class="vos-features vos-features--sm">
					<li><i class="fa-solid fa-check"></i> UPI, cards &amp; net banking</li>
					<li><i class="fa-solid fa-check"></i> Encrypted transactions</li>
					<li><i class="fa-solid fa-check"></i> No data sold to third parties</li>
				</ul>
			</article>
		</div>
	</section>

	<section class="vos-section vos-section--alt">
		<div class="vos-section-head">
			<span class="vos-eyebrow">How It Works</span>
			<h2 class="vos-section-title">From Cart To Confidence</h2>
		</div>
		<div class="vos-steps">
			<div class="vos-step">
				<span class="vos-step-num">1</span>
				<h4>Browse &amp; Choose</h4>
				<p>Pick your statement piece and size from the collection.</p>
			</div>
			<div class="vos-step">
				<span class="vos-step-num">2</span>
				<h4>Secure Checkout</h4>
				<p>Pay safely with your preferred trusted payment method.</p>
			</div>
			<div class="vos-step">
				<span class="vos-step-num">3</span>
				<h4>We Process &amp; Ship</h4>
				<p>Your order is dispatched within 1&ndash;3 business days.</p>
			</div>
			<div class="vos-step">
				<span class="vos-step-num">4</span>
				<h4>Wear Confidence</h4>
				<p>Track your parcel and step out feeling unstoppable.</p>
			</div>
		</div>
	</section>

	$cta

</div>
HTML;
}

/* ----------------------------------------------------------------------------
 * CONTACT
 * -------------------------------------------------------------------------- */

function vostra_content_contact() {
	$email  = VOSTRA_EMAIL;
	$phone  = VOSTRA_PHONE;
	$wa     = 'https://wa.me/' . preg_replace( '/\D/', '', VOSTRA_WHATSAPP );
	$social = vostra_social_links( 'hero' );

	return <<<HTML
<div class="vos-wrap">

	<section class="vos-hero">
		<div class="vos-hero-inner">
			<span class="vos-eyebrow">Contact Us</span>
			<h1 class="vos-hero-title">We&rsquo;re Here To Help</h1>
			<p class="vos-hero-text">Questions about our products, orders, or anything else? Reach out &mdash; we aim to respond to all inquiries within 24&ndash;48 business hours.</p>
		</div>
	</section>

	<section class="vos-section">
		<div class="vos-contact-grid">
			<div class="vos-contact-info">
				<h2 class="vos-section-title vos-left">Get In Touch</h2>
				<ul class="vos-contact-list">
					<li>
						<span class="vos-contact-ic"><i class="fa-solid fa-envelope"></i></span>
						<span><strong>Email</strong><a href="mailto:$email">$email</a></span>
					</li>
					<li>
						<span class="vos-contact-ic"><i class="fa-brands fa-whatsapp"></i></span>
						<span><strong>WhatsApp</strong><a href="$wa" target="_blank" rel="noopener">Chat with us</a></span>
					</li>
					<li>
						<span class="vos-contact-ic"><i class="fa-solid fa-phone"></i></span>
						<span><strong>Phone</strong><a href="tel:$phone">$phone</a></span>
					</li>
					<li>
						<span class="vos-contact-ic"><i class="fa-solid fa-clock"></i></span>
						<span><strong>Support Hours</strong>Mon &ndash; Sat &bull; 10:00 AM &ndash; 7:00 PM (IST)</span>
					</li>
				</ul>

				<div class="vos-contact-collab">
					<h3 class="vos-side-head">Business &amp; Collaboration</h3>
					<p>For partnerships, collaborations, or business-related queries, please contact us via email. Your support means everything to us.</p>
				</div>

				$social
			</div>

			<div class="vos-contact-form">
				<h3 class="vos-side-head">Send Us A Message</h3>
				[contact-form-7 id="d1513a7" title="Contact form 1"]
			</div>
		</div>
	</section>

</div>
HTML;
}

/* ----------------------------------------------------------------------------
 * Policy page shell
 * -------------------------------------------------------------------------- */

function vostra_policy_shell( $eyebrow, $title, $intro, $body ) {
	$updated = gmdate( 'F Y' );
	return <<<HTML
<div class="vos-wrap">

	<section class="vos-hero vos-hero--policy">
		<div class="vos-hero-inner">
			<span class="vos-eyebrow">$eyebrow</span>
			<h1 class="vos-hero-title">$title</h1>
			<p class="vos-hero-text">$intro</p>
			<p class="vos-updated">Last updated: $updated</p>
		</div>
	</section>

	<section class="vos-section">
		<div class="vos-policy">
			$body
		</div>
	</section>

</div>
HTML;
}

/* ----------------------------------------------------------------------------
 * PRIVACY POLICY
 * -------------------------------------------------------------------------- */

function vostra_content_privacy() {
	$brand   = VOSTRA_BRAND_NAME;
	$email   = VOSTRA_EMAIL;
	$country = VOSTRA_COUNTRY;

	$body = <<<HTML
		<p>At $brand, we respect your privacy and are committed to protecting your personal information. This Privacy Policy explains what we collect, how we use it, and the choices you have. By using our website and placing an order, you agree to the practices described below.</p>

		<h2>1. Information We Collect</h2>
		<p>We collect information you provide directly at checkout and when you contact us, including your name, shipping and billing address, email address, and phone number. We also collect limited technical data &mdash; such as device, browser, and usage information &mdash; to operate and improve the site.</p>

		<h2>2. How We Use Your Information</h2>
		<ul>
			<li>To process, fulfil, and deliver your orders.</li>
			<li>To provide customer support and respond to your inquiries.</li>
			<li>To send order updates and tracking details via email or SMS.</li>
			<li>To improve our products, website, and overall shopping experience.</li>
			<li>To detect, prevent, and address fraud or security issues.</li>
		</ul>

		<h2>3. Payment Information</h2>
		<p>Payment information is processed securely through trusted, third-party payment providers. We do not store your full card details on our servers. All transactions are encrypted and handled in line with applicable industry security standards.</p>

		<h2>4. Sharing Your Information</h2>
		<p>We do not sell or share customer data with third parties for marketing purposes. We share information only with service providers who help us run our business &mdash; such as courier partners and payment processors &mdash; and only to the extent needed to deliver your order or comply with the law.</p>

		<h2>5. Cookies</h2>
		<p>Our website may use cookies and similar technologies to remember your preferences, keep your cart working, and understand how the site is used. You can control cookies through your browser settings; disabling them may affect some features.</p>

		<h2>6. Data Retention &amp; Security</h2>
		<p>We retain personal information only for as long as necessary to fulfil the purposes described here and to meet legal or accounting requirements. We apply reasonable technical and organisational measures to protect your data, though no method of transmission over the internet is fully secure.</p>

		<h2>7. Your Rights</h2>
		<p>You may request access to, correction of, or deletion of your personal information, subject to applicable law. To make a request, email us at <a href="mailto:$email">$email</a>.</p>

		<h2>8. Updates To This Policy</h2>
		<p>We may update this Privacy Policy from time to time. Changes take effect once posted on this page. This policy is governed by the laws of $country.</p>

		<h2>9. Contact</h2>
		<p>For any privacy-related questions, contact us at <a href="mailto:$email">$email</a>.</p>
HTML;

	return vostra_policy_shell(
		'Your Privacy Matters',
		'Privacy Policy',
		'We respect your privacy and are committed to protecting your personal information. Here&rsquo;s how we handle your data.',
		$body
	);
}

/* ----------------------------------------------------------------------------
 * TERMS OF SERVICE
 * -------------------------------------------------------------------------- */

function vostra_content_terms_service() {
	$brand   = VOSTRA_BRAND_NAME;
	$email   = VOSTRA_EMAIL;
	$country = VOSTRA_COUNTRY;
	$site    = rtrim( VOSTRA_SITE_URL, '/' );

	$body = <<<HTML
		<p>These Terms of Service govern your use of the $brand website and the purchase of products from us. By accessing $site or placing an order, you agree to be bound by these terms.</p>

		<h2>1. Use Of The Website</h2>
		<p>You agree to use this website for lawful purposes only. Any misuse of the website &mdash; including attempts to disrupt, damage, or gain unauthorised access &mdash; may result in restriction of your access.</p>

		<h2>2. Products &amp; Pricing</h2>
		<p>We make every effort to display our products and prices accurately. Product colours may vary slightly due to screen settings and photography. We reserve the right to update product prices, descriptions, policies, and website content at any time without prior notice.</p>

		<h2>3. Orders &amp; Acceptance</h2>
		<p>All orders are subject to acceptance and availability. We reserve the right to refuse or cancel any order, including where a product is mispriced, out of stock, or where we suspect fraud.</p>

		<h2>4. Payments</h2>
		<p>Payments are processed securely through trusted third-party providers. You confirm that any payment information you provide is accurate and that you are authorised to use the chosen payment method.</p>

		<h2>5. Intellectual Property</h2>
		<p>All content on this website &mdash; including logos, designs, graphics, and text &mdash; is the property of $brand and is protected by applicable intellectual property laws. You may not reproduce or use it without our written permission.</p>

		<h2>6. Limitation Of Liability</h2>
		<p>To the maximum extent permitted by law, $brand is not liable for any indirect or consequential loss arising from the use of our website or products. Delays caused by courier partners, weather, or other unforeseen circumstances are outside our control.</p>

		<h2>7. Governing Law</h2>
		<p>These Terms of Service are governed by and construed in accordance with the laws of $country.</p>

		<h2>8. Contact</h2>
		<p>Questions about these terms? Email us at <a href="mailto:$email">$email</a>.</p>
HTML;

	return vostra_policy_shell(
		'The Essentials',
		'Terms of Service',
		'By using our website and placing an order, you agree to the following terms.',
		$body
	);
}

/* ----------------------------------------------------------------------------
 * TERMS & CONDITIONS
 * -------------------------------------------------------------------------- */

function vostra_content_terms_conditions() {
	$brand = VOSTRA_BRAND_NAME;
	$email = VOSTRA_EMAIL;

	$body = <<<HTML
		<p>By placing an order with $brand, you agree to our policies and the terms set out below.</p>

		<h2>1. Agreement</h2>
		<ul>
			<li>By placing an order with $brand, you agree to our policies and terms.</li>
			<li>You confirm that the information you provide at checkout is accurate and complete.</li>
		</ul>

		<h2>2. Products</h2>
		<ul>
			<li>Product colours may vary slightly due to screen settings and photography.</li>
			<li>We work to ensure each piece meets high standards before it reaches you.</li>
		</ul>

		<h2>3. Changes To Pricing &amp; Content</h2>
		<ul>
			<li>We reserve the right to update product prices, policies, and website content without prior notice.</li>
			<li>Promotional offers may be added or withdrawn at our discretion.</li>
		</ul>

		<h2>4. Acceptable Use</h2>
		<ul>
			<li>Any misuse of the website may result in restriction of access.</li>
			<li>You agree not to attempt to interfere with the security or operation of the site.</li>
		</ul>

		<h2>5. Policies By Reference</h2>
		<p>Our Shipping, Refund &amp; Return, Cancellation, and Privacy policies form part of these Terms &amp; Conditions. Please review them alongside this page.</p>

		<h2>6. Contact</h2>
		<p>For any questions about these Terms &amp; Conditions, contact us at <a href="mailto:$email">$email</a>.</p>
HTML;

	return vostra_policy_shell(
		'Please Read',
		'Terms &amp; Conditions',
		'The terms you agree to when shopping with VOSTRA.',
		$body
	);
}

/* ----------------------------------------------------------------------------
 * REFUND & RETURN POLICY
 * -------------------------------------------------------------------------- */

function vostra_content_refund() {
	$brand = VOSTRA_BRAND_NAME;
	$email = VOSTRA_EMAIL;
	$days  = VOSTRA_REFUND_DAYS;

	$body = <<<HTML
		<p>At $brand, we want you to love what you wear. If something isn&rsquo;t right, here&rsquo;s how our exchange and refund process works.</p>

		<h2>1. Return &amp; Exchange Policy</h2>
		<ul>
			<li>We accept exchanges for products that are damaged, defective, or received in the wrong size.</li>
			<li>Exchange requests must be made within $days days of receiving the order.</li>
			<li>Products must be unused, unwashed, and in their original condition with all tags attached.</li>
			<li>Items purchased during special sales or promotional offers may not be eligible for return or exchange.</li>
			<li>To request an exchange, contact us at <a href="mailto:$email">$email</a>.</li>
		</ul>

		<h2>2. Refund Policy</h2>
		<ul>
			<li>Refunds are only provided in cases where an exchange is not possible or if the order cannot be fulfilled.</li>
			<li>Approved refunds will be processed to the original payment method within 5&ndash;10 business days.</li>
			<li>Shipping charges are non-refundable unless the error was on our part.</li>
		</ul>

		<h2>3. How To Request</h2>
		<p>Email <a href="mailto:$email">$email</a> with your order number and, for damaged or defective items, a clear photo. Our team will guide you through the next steps and confirm eligibility.</p>

		<h2>4. Conditions</h2>
		<p>Returned items that arrive used, washed, without tags, or outside the $days-day window may be declined and sent back to you. We inspect every returned item before approving an exchange or refund.</p>

		<h2>5. Contact</h2>
		<p>Questions about a return or refund? Reach us at <a href="mailto:$email">$email</a>.</p>
HTML;

	return vostra_policy_shell(
		'Exchanges &amp; Refunds',
		'Refund &amp; Return Policy',
		'Damaged, defective, or wrong size? Here&rsquo;s how we make it right.',
		$body
	);
}

/* ----------------------------------------------------------------------------
 * CANCELLATION POLICY
 * -------------------------------------------------------------------------- */

function vostra_content_cancellation() {
	$brand = VOSTRA_BRAND_NAME;
	$email = VOSTRA_EMAIL;

	$body = <<<HTML
		<p>We process orders quickly so they reach you fast. This means the window to cancel is short &mdash; please review the details below.</p>

		<h2>1. Cancellation Window</h2>
		<ul>
			<li>Orders can be cancelled only before they are processed for shipping.</li>
			<li>Because we typically process orders within 1&ndash;3 business days, cancellation requests should be sent as soon as possible after ordering.</li>
			<li>Once an order has been dispatched, it can no longer be cancelled &mdash; you may instead request an exchange where eligible.</li>
		</ul>

		<h2>2. How To Cancel</h2>
		<p>To request a cancellation, email <a href="mailto:$email">$email</a> with your order number and the reason for cancellation. We will confirm whether your order is still eligible to be cancelled.</p>

		<h2>3. Refunds On Cancelled Orders</h2>
		<ul>
			<li>If a cancellation is approved before dispatch, any amount paid will be refunded to the original payment method within 5&ndash;10 business days.</li>
			<li>Orders placed during special sales or promotional offers may have limited cancellation eligibility.</li>
		</ul>

		<h2>4. Cancellations By VOSTRA</h2>
		<p>We reserve the right to cancel any order due to stock unavailability, pricing errors, or suspected fraud. In such cases, you will be notified and fully refunded.</p>

		<h2>5. Contact</h2>
		<p>For cancellation requests or questions, contact us at <a href="mailto:$email">$email</a>.</p>
HTML;

	return vostra_policy_shell(
		'Changed Your Mind?',
		'Cancellation Policy',
		'How and when you can cancel an order with VOSTRA.',
		$body
	);
}

/* ----------------------------------------------------------------------------
 * SHIPPING & DELIVERY POLICY
 * -------------------------------------------------------------------------- */

function vostra_content_shipping() {
	$brand = VOSTRA_BRAND_NAME;
	$email = VOSTRA_EMAIL;

	$body = <<<HTML
		<p>At $brand, we strive to process and ship your orders as quickly as possible.</p>

		<h2>1. Order Processing</h2>
		<ul>
			<li>Orders are typically processed within 1&ndash;3 business days.</li>
			<li>Once your order is shipped, tracking details will be shared via email or SMS.</li>
		</ul>

		<h2>2. Delivery Times</h2>
		<ul>
			<li>Delivery times may vary depending on your location.</li>
			<li>Delays caused by courier partners, weather conditions, or unforeseen circumstances may occur.</li>
			<li>Estimated delivery timelines are indicative and not guaranteed.</li>
		</ul>

		<h2>3. Tracking Your Order</h2>
		<p>After dispatch, you will receive tracking details by email or SMS. Please allow a short time for the tracking information to update on the courier&rsquo;s system.</p>

		<h2>4. Shipping Charges</h2>
		<p>Any applicable shipping charges are shown at checkout before you pay. Shipping charges are non-refundable unless an error was made on our part.</p>

		<h2>5. Incorrect Address Or Failed Delivery</h2>
		<p>Please ensure your shipping address is accurate and complete. We are not responsible for delays or non-delivery caused by an incorrect address provided at checkout.</p>

		<h2>6. Contact</h2>
		<p>For any shipping or delivery questions, contact us at <a href="mailto:$email">$email</a>.</p>
HTML;

	return vostra_policy_shell(
		'Getting It To You',
		'Shipping &amp; Delivery Policy',
		'We strive to process and ship your orders as quickly as possible.',
		$body
	);
}
