<?php
/**
 * Plugin Name:  NextGen Fusion — Header & Footer
 * Plugin URI:   https://nextgenfusion.in
 * Description:  Registers [ngf_header] and [ngf_footer] shortcodes. Paste them into any Custom HTML block, widget, or theme file to get the NextGen Fusion branded header and footer on any page.
 * Version:      1.0.0
 * Author:       NextGen Fusion
 * Author URI:   https://nextgenfusion.in
 * License:      GPL-2.0-or-later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  ngf-hf
 */

defined( 'ABSPATH' ) || exit;

define( 'NGF_HF_DIR', plugin_dir_path( __FILE__ ) );
define( 'NGF_HF_URL', plugin_dir_url( __FILE__ ) );
define( 'NGF_HF_VER', '1.0.0' );

/* ─── Enqueue assets on every front-end page ────────────────── */
add_action( 'wp_enqueue_scripts', 'ngf_hf_enqueue' );

function ngf_hf_enqueue() {
	wp_enqueue_style(
		'ngf-hf-fa',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
		[],
		'6.4.0'
	);
	wp_enqueue_style(
		'ngf-hf-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Manrope:wght@300;400;500;600;700&display=swap',
		[],
		null
	);
	wp_enqueue_style(
		'ngf-hf-styles',
		NGF_HF_URL . 'assets/css/ngf-hf.css',
		[ 'ngf-hf-fa', 'ngf-hf-fonts' ],
		NGF_HF_VER
	);
}

/* ═══════════════════════════════════════════════════════════════
   SHORTCODE: [ngf_header]
═══════════════════════════════════════════════════════════════ */
add_shortcode( 'ngf_header', 'ngf_render_header' );

function ngf_render_header( $atts ) {
	$logo_url    = esc_url( NGF_HF_URL . 'assets/images/logo.png' );
	$home_url    = esc_url( home_url( '/' ) );
	// Submit to the WooCommerce shop page so results land there; fall back to home URL
	$search_url  = function_exists( 'wc_get_page_permalink' )
		? esc_url( wc_get_page_permalink( 'shop' ) )
		: esc_url( home_url( '/' ) );
	$search_val  = esc_attr( get_search_query() );
	$is_logged   = is_user_logged_in();

	// WooCommerce-aware URLs with graceful fallbacks
	$account_url = function_exists( 'wc_get_page_permalink' )
		? esc_url( wc_get_page_permalink( 'myaccount' ) )
		: esc_url( wp_login_url( get_permalink() ) );

	$cart_url   = function_exists( 'wc_get_cart_url' )
		? esc_url( wc_get_cart_url() )
		: esc_url( home_url( '/cart/' ) );

	$cart_count = ( function_exists( 'WC' ) && WC()->cart )
		? absint( WC()->cart->get_cart_contents_count() )
		: 0;

	$login_url = esc_url( wp_login_url( get_permalink() ) );

	ob_start();
	?>
<header class="ngf-hdr">
  <div class="ngf-hdr-inner">

    <!-- Logo -->
    <div class="ngf-hdr-logo-wrap">
      <a href="<?php echo $home_url; ?>" aria-label="NextGen Fusion Home">
        <img src="<?php echo $logo_url; ?>" alt="NextGen Fusion" class="ngf-hdr-logo">
      </a>
    </div>

    <!-- Search bar -->
    <div class="ngf-hdr-search-wrap">
      <form class="ngf-hdr-search-form" role="search" method="get" action="<?php echo $search_url; ?>">
        <input
          type="search"
          class="ngf-hdr-search-input"
          placeholder="Search for products"
          name="s"
          value="<?php echo $search_val; ?>"
          autocomplete="off"
        >
        <!-- Restrict search to WooCommerce products only -->
        <input type="hidden" name="post_type" value="product">
        <button type="submit" class="ngf-hdr-search-btn" aria-label="Search">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
          </svg>
        </button>
      </form>
    </div>

    <!-- Desktop action links -->
    <div class="ngf-hdr-actions">

      <a href="<?php echo $is_logged ? $account_url : $login_url; ?>" class="ngf-hdr-action-link ngf-hdr-signin">
        <?php echo $is_logged ? esc_html( 'MY ACCOUNT' ) : esc_html( 'SIGN IN' ); ?>
      </a>

      <a href="<?php echo $account_url; ?>" class="ngf-hdr-action-link ngf-hdr-orders" aria-label="My Orders">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <polyline points="23 4 23 10 17 10"/>
          <polyline points="1 20 1 14 7 14"/>
          <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/>
        </svg>
      </a>

      <a href="<?php echo $cart_url; ?>" class="ngf-hdr-action-link ngf-hdr-cart" aria-label="Cart">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
          <line x1="3" y1="6" x2="21" y2="6"/>
          <path d="M16 10a4 4 0 0 1-8 0"/>
        </svg>
        <span class="ngf-hdr-cart-count" aria-label="<?php echo $cart_count; ?> items in cart"><?php echo $cart_count; ?></span>
      </a>

    </div>

    <!-- Mobile hamburger toggle -->
    <button
      class="ngf-hdr-mob-toggle"
      aria-label="Open menu"
      aria-expanded="false"
      onclick="(function(btn){var menu=document.querySelector('.ngf-hdr-mob-menu');var open=menu.classList.toggle('ngf-hdr-mob-open');btn.setAttribute('aria-expanded',open);})(this)"
    >
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
        <line x1="3" y1="6" x2="21" y2="6"/>
        <line x1="3" y1="12" x2="21" y2="12"/>
        <line x1="3" y1="18" x2="21" y2="18"/>
      </svg>
    </button>

  </div>

  <!-- Mobile dropdown nav -->
  <nav class="ngf-hdr-mob-menu" aria-label="Mobile navigation">
    <ul class="ngf-hdr-mob-list">
      <li><a href="<?php echo $home_url; ?>">Home</a></li>
      <li><a href="https://nextgenfusion.in/about-us/">About Us</a></li>
      <li><a href="https://nextgenfusion.in/services/">Services</a></li>
      <li><a href="https://nextgenfusion.in/contact/">Contact</a></li>
      <li class="ngf-hdr-mob-divider"></li>
      <li>
        <a href="<?php echo $is_logged ? $account_url : $login_url; ?>">
          <?php echo $is_logged ? esc_html( 'My Account' ) : esc_html( 'Sign In' ); ?>
        </a>
      </li>
      <li>
        <a href="<?php echo $cart_url; ?>">
          Cart &nbsp;<span class="ngf-hdr-mob-cart-badge"><?php echo $cart_count; ?></span>
        </a>
      </li>
    </ul>
  </nav>

</header>
	<?php
	return ob_get_clean();
}

/* ═══════════════════════════════════════════════════════════════
   SHORTCODE: [ngf_footer]
═══════════════════════════════════════════════════════════════ */
add_shortcode( 'ngf_footer', 'ngf_render_footer' );

function ngf_render_footer( $atts ) {
	$logo_url    = esc_url( NGF_HF_URL . 'assets/images/logo.png' );
	$year        = esc_html( gmdate( 'Y' ) );
	$site_name   = esc_html( get_bloginfo( 'name' ) );

	ob_start();
	?>
<footer class="ngf-ftr">
  <div class="ngf-ftr-inner">
    <div class="ngf-ftr-row-top">

      <!-- ── Brand column ────────────────────────────── -->
      <div class="ngf-ftr-col-wide">
        <a href="https://nextgenfusion.in/" aria-label="NextGen Fusion Home">
          <img src="<?php echo $logo_url; ?>" alt="NextGen Fusion" class="ngf-ftr-brand-logo">
        </a>
        <p class="ngf-ftr-desc">
          <strong>NextGen Fusion</strong><br>
          Premium WordPress &amp; Shopify themes and plugins — crafted for speed, beauty, and conversion. Your digital future starts here.
        </p>
        <div class="ngf-ftr-social-wrap">
          <!-- Update these hrefs with your real social URLs -->
          <a href="#" target="_blank" rel="noopener noreferrer" class="ngf-ftr-social-link" aria-label="Follow on Instagram">
            <i class="fa-brands fa-instagram" aria-hidden="true"></i>
          </a>
          <a href="#" target="_blank" rel="noopener noreferrer" class="ngf-ftr-social-link" aria-label="Follow on LinkedIn">
            <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
          </a>
          <a href="#" target="_blank" rel="noopener noreferrer" class="ngf-ftr-social-link" aria-label="Follow on X">
            <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
          </a>
          <a href="#" target="_blank" rel="noopener noreferrer" class="ngf-ftr-social-link" aria-label="Follow on YouTube">
            <i class="fa-brands fa-youtube" aria-hidden="true"></i>
          </a>
        </div>
      </div>

      <!-- ── Policies column ─────────────────────────── -->
      <div class="ngf-ftr-col-std">
        <h3 class="ngf-ftr-head">Our Policies</h3>
        <ul class="ngf-ftr-nav-list">
          <li><a href="https://nextgenfusion.in/privacy-policy/">Privacy Policy</a></li>
          <li><a href="https://nextgenfusion.in/terms-of-service/">Terms of Service</a></li>
          <li><a href="https://nextgenfusion.in/terms-and-conditions/">Terms &amp; Conditions</a></li>
          <li><a href="https://nextgenfusion.in/refund-policy/">Refund &amp; Return</a></li>
          <li><a href="https://nextgenfusion.in/cancellation-policy/">Cancellation Policy</a></li>
          <li><a href="https://nextgenfusion.in/shipping-policy/">Shipping Policy</a></li>
        </ul>
      </div>

      <!-- ── Quick Links column ──────────────────────── -->
      <div class="ngf-ftr-col-std">
        <h3 class="ngf-ftr-head">Quick Links</h3>
        <ul class="ngf-ftr-nav-list">
          <li><a href="https://nextgenfusion.in/">Home</a></li>
          <li><a href="https://nextgenfusion.in/about-us/">About Us</a></li>
          <li><a href="https://nextgenfusion.in/services/">Services</a></li>
          <li><a href="https://nextgenfusion.in/contact/">Contact Us</a></li>
          <li><a href="https://nextgenfusion.in/ngf-home/">Our Work</a></li>
        </ul>
      </div>

      <!-- ── Get in Touch column ─────────────────────── -->
      <div class="ngf-ftr-col-std">
        <h3 class="ngf-ftr-head">Get In Touch</h3>
        <ul class="ngf-ftr-nav-list">
          <li>
            <a href="mailto:contact@nextgenfusion.in">
              <i class="fa-regular fa-envelope" aria-hidden="true"></i>
              contact@nextgenfusion.in
            </a>
          </li>
          <li>
            <a href="https://nextgenfusion.in/contact/">
              <i class="fa-regular fa-message" aria-hidden="true"></i>
              Send a Message
            </a>
          </li>
          <li>
            <a href="https://nextgenfusion.in/services/">
              <i class="fa-regular fa-file-lines" aria-hidden="true"></i>
              Request a Quote
            </a>
          </li>
          <!-- Update href with your WhatsApp number -->
          <li>
            <a href="https://wa.me/91XXXXXXXXXX" target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
              WhatsApp Us
            </a>
          </li>
        </ul>
      </div>

    </div>
  </div>

  <!-- ── Bottom bar ──────────────────────────────────── -->
  <div class="ngf-ftr-row-btm">
    <div class="ngf-ftr-btm-inner">
      <div class="ngf-ftr-copy">
        &copy; <?php echo $year; ?> <?php echo $site_name; ?>. Developed by
        <a href="https://nextgenfusion.in/" target="_blank" rel="noopener noreferrer">NextGen Fusion</a>
      </div>
      <!-- Replace the src with your preferred payment icons image -->
      <div class="ngf-ftr-pay-wrap">
        <img
          src="https://jayantitextiles.in/wp-content/uploads/2026/01/Footer-payment-icons-1-1536x242-1-600x52-1.webp"
          alt="Secure Payment Options"
          class="ngf-ftr-pay-img"
          loading="lazy"
        >
      </div>
    </div>
  </div>

</footer>

<!-- ── WhatsApp floating button — update the phone number in href ── -->
<a
  href="https://wa.me/91XXXXXXXXXX"
  class="ngf-wa-float"
  target="_blank"
  rel="noopener noreferrer"
  aria-label="Chat on WhatsApp"
>
  <svg class="ngf-wa-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" aria-hidden="true">
    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zM223.9 413.2c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 334.1l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3s19.9 53.7 22.6 57.4c2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
  </svg>
</a>
	<?php
	return ob_get_clean();
}
