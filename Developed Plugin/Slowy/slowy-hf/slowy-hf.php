<?php
/**
 * Plugin Name: SLOWY Header & Footer
 * Description: Auto-injects SLOWY branded header and footer site-wide with editable logo, contact, social, navigation, and policy links.
 * Version:     1.0.1
 * Author:      SLOWY
 * Author URI:  http://slowy.in/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: slowy-hf
 *
 * @package Slowy_HF
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SLOWY_HF_VERSION', '1.0.1' );
define( 'SLOWY_HF_PATH', plugin_dir_path( __FILE__ ) );
define( 'SLOWY_HF_URL', plugin_dir_url( __FILE__ ) );
define( 'SLOWY_HF_CSS_FILE', SLOWY_HF_PATH . 'assets/css/slowy-hf.css' );
define( 'SLOWY_HF_ASSET_VERSION', file_exists( SLOWY_HF_CSS_FILE ) ? SLOWY_HF_VERSION . '-' . filemtime( SLOWY_HF_CSS_FILE ) : SLOWY_HF_VERSION );
define( 'SLOWY_HF_LOGO_URL', 'http://slowy.in/wp-content/uploads/2026/06/Slowy.png' );
define( 'SLOWY_HF_EMAIL', 'contact@slowy.in' );
define( 'SLOWY_HF_PHONE', '8787040771' );
define( 'SLOWY_HF_WHATSAPP', '918787040771' );
define( 'SLOWY_HF_ADDRESS', 'Sujanganj, Jaunpur, Uttar Pradesh, 222143 India' );
define( 'SLOWY_HF_SUPPORT_HOURS', 'Monday to Saturday, 10 AM - 7 PM' );

$GLOBALS['slowy_hf_header_injected'] = false;

register_activation_hook( __FILE__, 'slowy_hf_activate' );

function slowy_hf_activate() {
	if ( false === get_option( 'slowy_hf_enable_header' ) ) {
		update_option( 'slowy_hf_enable_header', '1' );
	}
	if ( false === get_option( 'slowy_hf_enable_footer' ) ) {
		update_option( 'slowy_hf_enable_footer', '1' );
	}
}

function slowy_hf_page_url( $slug, $fallback = '' ) {
	$page = get_page_by_path( $slug, OBJECT, 'page' );
	if ( $page instanceof WP_Post ) {
		$link = get_permalink( (int) $page->ID );
		if ( $link ) {
			return $link;
		}
	}
	return $fallback ? $fallback : home_url( '/' . $slug . '/' );
}

function slowy_hf_get_option( $option, $default = '' ) {
	$value = get_option( $option, null );
	if ( null === $value || '' === $value ) {
		return $default;
	}
	return $value;
}

function slowy_hf_default_links() {
	$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' );
	return array(
		'home'       => home_url( '/' ),
		'shop'       => $shop_url,
		'collections'=> slowy_hf_page_url( 'collections' ),
		'new_arrivals' => $shop_url,
		'best_sellers' => $shop_url,
		'about'      => slowy_hf_page_url( 'about-us' ),
		'contact'    => slowy_hf_page_url( 'contact' ),
		'privacy'    => slowy_hf_page_url( 'privacy-policy' ),
		'terms'      => slowy_hf_page_url( 'terms-and-conditions' ),
		'refund'     => slowy_hf_page_url( 'return-refund-policy' ),
		'cancel'     => slowy_hf_page_url( 'cancellation-policy' ),
		'shipping'   => slowy_hf_page_url( 'shipping-policy' ),
	);
}

function slowy_hf_link_fields() {
	return array(
		'logo_link'   => 'Logo Link',
		'home'        => 'Home Link',
		'shop'        => 'Shop Link',
		'collections' => 'Collections Link',
		'new_arrivals'=> 'New Arrivals Link',
		'best_sellers'=> 'Best Sellers Link',
		'about'       => 'About Link',
		'contact'     => 'Contact Link',
		'privacy'     => 'Privacy Policy Link',
		'terms'       => 'Terms & Conditions Link',
		'refund'      => 'Return & Refund Link',
		'cancel'      => 'Cancellation Policy Link',
		'shipping'    => 'Shipping Policy Link',
		'account'     => 'Account Link',
		'cart'        => 'Cart Link',
		'search'      => 'Search Form Action Link',
		'instagram'   => 'Instagram Link',
		'facebook'    => 'Facebook Link',
		'youtube'     => 'YouTube Link',
	);
}

function slowy_hf_url_for( $key ) {
	$defaults = slowy_hf_default_links();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : home_url( '/' );

	if ( 'logo_link' === $key ) {
		$default = home_url( '/' );
	}
	if ( 'account' === $key ) {
		$default = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : wp_login_url();
	}
	if ( 'cart' === $key ) {
		$default = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/cart/' );
	}
	if ( 'search' === $key ) {
		$default = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
	}
	if ( in_array( $key, array( 'instagram', 'facebook', 'youtube' ), true ) ) {
		$default = '';
	}

	return slowy_hf_get_option( 'slowy_hf_link_' . $key, $default );
}

function slowy_hf_get_logo_url() {
	return slowy_hf_get_option( 'slowy_hf_logo_url', SLOWY_HF_LOGO_URL );
}

function slowy_hf_get_whatsapp() {
	$value = slowy_hf_get_option( 'slowy_hf_whatsapp', SLOWY_HF_WHATSAPP );
	return preg_replace( '/[^0-9]/', '', (string) $value );
}

add_action( 'wp_enqueue_scripts', 'slowy_hf_enqueue_assets' );

function slowy_hf_enqueue_assets() {
	wp_enqueue_style(
		'slowy-hf-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Manrope:wght@300;400;500;600;700;800&family=Poppins:wght@500;600&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'slowy-hf-fa',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
		array(),
		'6.5.2'
	);
	wp_enqueue_style(
		'slowy-hf',
		SLOWY_HF_URL . 'assets/css/slowy-hf.css',
		array( 'slowy-hf-fonts', 'slowy-hf-fa' ),
		SLOWY_HF_ASSET_VERSION
	);
	wp_register_script( 'slowy-hf-js', false, array(), SLOWY_HF_ASSET_VERSION, true );
	wp_enqueue_script( 'slowy-hf-js' );
	wp_add_inline_script(
		'slowy-hf-js',
		"document.addEventListener('click',function(e){var b=e.target.closest('[data-slowy-menu]');if(b){document.body.classList.toggle('slowy-menu-open');}var c=e.target.closest('[data-slowy-close]');if(c){document.body.classList.remove('slowy-menu-open');}var s=e.target.closest('[data-slowy-search]');if(s){e.preventDefault();document.body.classList.toggle('slowy-search-open');}});",
		'after'
	);
}

add_filter( 'body_class', 'slowy_hf_body_class' );

function slowy_hf_body_class( $classes ) {
	if ( ! is_admin() && '1' === get_option( 'slowy_hf_enable_header', '1' ) ) {
		$classes[] = 'slowy-hf-header-active';
	}
	return $classes;
}

add_action( 'wp_body_open', 'slowy_hf_inject_header', 1 );
add_action( 'wp_footer', 'slowy_hf_inject_header_fallback', 1 );
add_action( 'wp_footer', 'slowy_hf_inject_footer', 5 );

function slowy_hf_inject_header() {
	if ( is_admin() || ! empty( $GLOBALS['slowy_hf_header_injected'] ) || '1' !== get_option( 'slowy_hf_enable_header', '1' ) ) {
		return;
	}
	$GLOBALS['slowy_hf_header_injected'] = true;
	echo slowy_hf_render_header(); // phpcs:ignore WordPress.Security.EscapeOutput
}

function slowy_hf_inject_header_fallback() {
	slowy_hf_inject_header();
}

function slowy_hf_inject_footer() {
	if ( is_admin() || '1' !== get_option( 'slowy_hf_enable_footer', '1' ) ) {
		return;
	}
	echo slowy_hf_render_footer(); // phpcs:ignore WordPress.Security.EscapeOutput
}

add_shortcode( 'slowy_header', 'slowy_hf_render_header' );
add_shortcode( 'slowy_footer', 'slowy_hf_render_footer' );

function slowy_hf_render_header() {
	$logo          = esc_url( slowy_hf_get_logo_url() );
	$logo_link     = esc_url( slowy_hf_url_for( 'logo_link' ) );
	$search_action = esc_url( slowy_hf_url_for( 'search' ) );
	$search_hidden = function_exists( 'wc_get_page_permalink' ) ? '<input type="hidden" name="post_type" value="product">' : '';
	$cart_count    = 0;

	if ( function_exists( 'WC' ) && WC()->cart ) {
		$cart_count = (int) WC()->cart->get_cart_contents_count();
	}

	$nav = array(
		'Home'        => slowy_hf_url_for( 'home' ),
		'Shop'        => slowy_hf_url_for( 'shop' ),
		'Collections' => slowy_hf_url_for( 'collections' ),
		'New Arrivals'=> slowy_hf_url_for( 'new_arrivals' ),
		'Best Sellers'=> slowy_hf_url_for( 'best_sellers' ),
		'About Us'    => slowy_hf_url_for( 'about' ),
		'Contact'     => slowy_hf_url_for( 'contact' ),
	);

	ob_start();
	?>
	<header class="slowy-hf-header" role="banner">
	  <div class="slowy-hf-marquee" aria-label="Store offers">
	    <div class="slowy-hf-marquee__track">
	      <div class="slowy-hf-marquee__item"><span class="slowy-hf-marquee__spark">&#10038;</span>Free Shipping Above &#8377;799</div>
	      <div class="slowy-hf-marquee__item"><span class="slowy-hf-marquee__spark">&#10038;</span>Easy Returns</div>
	      <div class="slowy-hf-marquee__item"><span class="slowy-hf-marquee__spark">&#10038;</span>Premium Quality Jewellery</div>
	      <div class="slowy-hf-marquee__item"><span class="slowy-hf-marquee__spark">&#10038;</span>Hypoallergenic &amp; Skin-Friendly</div>
	      <div class="slowy-hf-marquee__item"><span class="slowy-hf-marquee__spark">&#10038;</span>Gift Packaging Available</div>

	      <div class="slowy-hf-marquee__item"><span class="slowy-hf-marquee__spark">&#10038;</span>Free Shipping Above &#8377;799</div>
	      <div class="slowy-hf-marquee__item"><span class="slowy-hf-marquee__spark">&#10038;</span>Easy Returns</div>
	      <div class="slowy-hf-marquee__item"><span class="slowy-hf-marquee__spark">&#10038;</span>Premium Quality Jewellery</div>
	      <div class="slowy-hf-marquee__item"><span class="slowy-hf-marquee__spark">&#10038;</span>Hypoallergenic &amp; Skin-Friendly</div>
	      <div class="slowy-hf-marquee__item"><span class="slowy-hf-marquee__spark">&#10038;</span>Gift Packaging Available</div>
	    </div>
	  </div>
	  <div class="slowy-hf-main">
	    <button class="slowy-hf-icon slowy-hf-menu-button" type="button" aria-label="Open menu" data-slowy-menu><i class="fa-solid fa-bars"></i></button>
	    <a class="slowy-hf-logo" href="<?php echo $logo_link; ?>" aria-label="SLOWY home">
	      <img src="<?php echo $logo; ?>" alt="SLOWY">
	    </a>
	    <nav class="slowy-hf-nav" aria-label="Primary navigation">
	      <?php foreach ( $nav as $label => $url ) : ?>
	        <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
	      <?php endforeach; ?>
	    </nav>
	    <form class="slowy-hf-search" method="get" action="<?php echo $search_action; ?>" role="search">
	      <input type="search" name="s" placeholder="Search products" value="<?php echo esc_attr( get_search_query() ); ?>">
	      <?php echo $search_hidden; // phpcs:ignore WordPress.Security.EscapeOutput ?>
	      <button type="submit" aria-label="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
	    </form>
	    <div class="slowy-hf-actions">
	      <button class="slowy-hf-icon slowy-hf-search-toggle" type="button" aria-label="Search" data-slowy-search><i class="fa-solid fa-magnifying-glass"></i></button>
	      <a class="slowy-hf-icon" href="<?php echo esc_url( slowy_hf_url_for( 'account' ) ); ?>" aria-label="Account"><i class="fa-regular fa-user"></i></a>
	      <a class="slowy-hf-icon slowy-hf-cart" href="<?php echo esc_url( slowy_hf_url_for( 'cart' ) ); ?>" aria-label="Cart"><i class="fa-solid fa-bag-shopping"></i><span><?php echo esc_html( (string) $cart_count ); ?></span></a>
	    </div>
	  </div>
	  <div class="slowy-hf-mobile-panel" aria-label="Mobile navigation">
	    <button class="slowy-hf-close" type="button" data-slowy-close aria-label="Close menu"><i class="fa-solid fa-xmark"></i></button>
	    <?php foreach ( $nav as $label => $url ) : ?>
	      <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
	    <?php endforeach; ?>
	    <a href="https://wa.me/<?php echo esc_attr( slowy_hf_get_whatsapp() ); ?>" target="_blank" rel="noopener">WhatsApp Support</a>
	  </div>
	</header>
	<?php
	return ob_get_clean();
}

function slowy_hf_render_footer() {
	$logo      = esc_url( slowy_hf_get_logo_url() );
	$whatsapp  = slowy_hf_get_whatsapp();
	$email     = sanitize_email( slowy_hf_get_option( 'slowy_hf_email', SLOWY_HF_EMAIL ) );
	$phone     = sanitize_text_field( slowy_hf_get_option( 'slowy_hf_phone', SLOWY_HF_PHONE ) );
	$address   = sanitize_text_field( slowy_hf_get_option( 'slowy_hf_address', SLOWY_HF_ADDRESS ) );
	$hours     = sanitize_text_field( slowy_hf_get_option( 'slowy_hf_support_hours', SLOWY_HF_SUPPORT_HOURS ) );
	$socials   = array(
		'instagram' => array( 'Instagram', 'fa-brands fa-instagram' ),
		'facebook'  => array( 'Facebook', 'fa-brands fa-facebook-f' ),
		'youtube'   => array( 'YouTube', 'fa-brands fa-youtube' ),
	);
	$quick     = array(
		'Home'        => slowy_hf_url_for( 'home' ),
		'Shop'        => slowy_hf_url_for( 'shop' ),
		'Collections' => slowy_hf_url_for( 'collections' ),
		'About Us'    => slowy_hf_url_for( 'about' ),
		'Contact Us'  => slowy_hf_url_for( 'contact' ),
	);
	$policies  = array(
		'Privacy Policy'         => slowy_hf_url_for( 'privacy' ),
		'Terms & Conditions'     => slowy_hf_url_for( 'terms' ),
		'Return & Refund Policy' => slowy_hf_url_for( 'refund' ),
		'Cancellation Policy'    => slowy_hf_url_for( 'cancel' ),
		'Shipping Policy'        => slowy_hf_url_for( 'shipping' ),
	);

	ob_start();
	?>
	<footer class="slowy-hf-footer" role="contentinfo">
	  <div class="slowy-hf-footer-inner">
	    <div class="slowy-hf-footer-brand">
	      <img src="<?php echo $logo; ?>" alt="SLOWY">
	      <p>Trendy jewellery, fashion, beauty, and accessories selected for quality, affordability, and everyday style.</p>
	      <div class="slowy-hf-socials">
	        <?php foreach ( $socials as $key => $data ) : $url = slowy_hf_url_for( $key ); ?>
	          <?php if ( ! empty( $url ) ) : ?>
	            <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( $data[0] ); ?>"><i class="<?php echo esc_attr( $data[1] ); ?>"></i></a>
	          <?php endif; ?>
	        <?php endforeach; ?>
	      </div>
	    </div>
	    <div class="slowy-hf-footer-col">
	      <h3>Quick Links</h3>
	      <?php foreach ( $quick as $label => $url ) : ?>
	        <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
	      <?php endforeach; ?>
	    </div>
	    <div class="slowy-hf-footer-col">
	      <h3>Policies</h3>
	      <?php foreach ( $policies as $label => $url ) : ?>
	        <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
	      <?php endforeach; ?>
	    </div>
	    <div class="slowy-hf-footer-col">
	      <h3>Contact</h3>
	      <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
	      <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
	      <a href="https://wa.me/<?php echo esc_attr( $whatsapp ); ?>" target="_blank" rel="noopener">WhatsApp Support</a>
	      <p><?php echo esc_html( $address ); ?></p>
	      <p><?php echo esc_html( $hours ); ?></p>
	    </div>
	  </div>
	  <div class="slowy-hf-footer-bottom">
	    <span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> SLOWY. Developed by <a href="https://nextgenfusion.in" target="_blank" rel="noopener">NextGen Fusion</a>.</span>
	    <span>www.slowy.in</span>
	  </div>
	</footer>
	<?php
	return ob_get_clean();
}

add_action( 'admin_menu', 'slowy_hf_add_settings_page' );

function slowy_hf_add_settings_page() {
	add_theme_page(
		'SLOWY Header & Footer',
		'SLOWY Header & Footer',
		'manage_options',
		'slowy-hf-settings',
		'slowy_hf_render_settings_page'
	);
}

add_action( 'admin_post_slowy_hf_save', 'slowy_hf_handle_save' );

function slowy_hf_handle_save() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Unauthorized', 'slowy-hf' ) );
	}
	check_admin_referer( 'slowy_hf_save_nonce' );

	update_option( 'slowy_hf_enable_header', isset( $_POST['slowy_hf_enable_header'] ) ? '1' : '0' );
	update_option( 'slowy_hf_enable_footer', isset( $_POST['slowy_hf_enable_footer'] ) ? '1' : '0' );
	update_option( 'slowy_hf_logo_url', isset( $_POST['slowy_hf_logo_url'] ) ? esc_url_raw( trim( wp_unslash( $_POST['slowy_hf_logo_url'] ) ) ) : '' );
	update_option( 'slowy_hf_email', isset( $_POST['slowy_hf_email'] ) ? sanitize_email( wp_unslash( $_POST['slowy_hf_email'] ) ) : '' );
	update_option( 'slowy_hf_phone', isset( $_POST['slowy_hf_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['slowy_hf_phone'] ) ) : '' );
	update_option( 'slowy_hf_whatsapp', isset( $_POST['slowy_hf_whatsapp'] ) ? preg_replace( '/[^0-9]/', '', wp_unslash( $_POST['slowy_hf_whatsapp'] ) ) : '' );
	update_option( 'slowy_hf_address', isset( $_POST['slowy_hf_address'] ) ? sanitize_text_field( wp_unslash( $_POST['slowy_hf_address'] ) ) : '' );
	update_option( 'slowy_hf_support_hours', isset( $_POST['slowy_hf_support_hours'] ) ? sanitize_text_field( wp_unslash( $_POST['slowy_hf_support_hours'] ) ) : '' );

	foreach ( slowy_hf_link_fields() as $key => $label ) {
		update_option( 'slowy_hf_link_' . $key, isset( $_POST[ 'slowy_hf_link_' . $key ] ) ? esc_url_raw( trim( wp_unslash( $_POST[ 'slowy_hf_link_' . $key ] ) ) ) : '' );
	}

	wp_safe_redirect( add_query_arg( array( 'page' => 'slowy-hf-settings', 'saved' => '1' ), admin_url( 'themes.php' ) ) );
	exit;
}

function slowy_hf_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
	  <h1>SLOWY Header & Footer</h1>
	  <?php if ( isset( $_GET['saved'] ) ) : ?>
	    <div class="notice notice-success is-dismissible"><p>Settings saved.</p></div>
	  <?php endif; ?>
	  <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
	    <input type="hidden" name="action" value="slowy_hf_save">
	    <?php wp_nonce_field( 'slowy_hf_save_nonce' ); ?>

	    <h2>Display</h2>
	    <table class="form-table" role="presentation">
	      <tr><th scope="row">Enable Header</th><td><label><input type="checkbox" name="slowy_hf_enable_header" value="1" <?php checked( get_option( 'slowy_hf_enable_header', '1' ), '1' ); ?>> Show header site-wide</label></td></tr>
	      <tr><th scope="row">Enable Footer</th><td><label><input type="checkbox" name="slowy_hf_enable_footer" value="1" <?php checked( get_option( 'slowy_hf_enable_footer', '1' ), '1' ); ?>> Show footer site-wide</label></td></tr>
	    </table>

	    <h2>Brand & Contact</h2>
	    <table class="form-table" role="presentation">
	      <tr><th scope="row"><label for="slowy_hf_logo_url">Logo Image URL</label></th><td><input class="regular-text" id="slowy_hf_logo_url" name="slowy_hf_logo_url" type="url" value="<?php echo esc_attr( slowy_hf_get_logo_url() ); ?>"></td></tr>
	      <tr><th scope="row"><label for="slowy_hf_email">Email</label></th><td><input class="regular-text" id="slowy_hf_email" name="slowy_hf_email" type="email" value="<?php echo esc_attr( slowy_hf_get_option( 'slowy_hf_email', SLOWY_HF_EMAIL ) ); ?>"></td></tr>
	      <tr><th scope="row"><label for="slowy_hf_phone">Phone</label></th><td><input class="regular-text" id="slowy_hf_phone" name="slowy_hf_phone" type="text" value="<?php echo esc_attr( slowy_hf_get_option( 'slowy_hf_phone', SLOWY_HF_PHONE ) ); ?>"></td></tr>
	      <tr><th scope="row"><label for="slowy_hf_whatsapp">WhatsApp Number</label></th><td><input class="regular-text" id="slowy_hf_whatsapp" name="slowy_hf_whatsapp" type="text" value="<?php echo esc_attr( slowy_hf_get_whatsapp() ); ?>"><p class="description">Use country code and numbers only, for example 918787040771.</p></td></tr>
	      <tr><th scope="row"><label for="slowy_hf_address">Address</label></th><td><input class="large-text" id="slowy_hf_address" name="slowy_hf_address" type="text" value="<?php echo esc_attr( slowy_hf_get_option( 'slowy_hf_address', SLOWY_HF_ADDRESS ) ); ?>"></td></tr>
	      <tr><th scope="row"><label for="slowy_hf_support_hours">Support Hours</label></th><td><input class="regular-text" id="slowy_hf_support_hours" name="slowy_hf_support_hours" type="text" value="<?php echo esc_attr( slowy_hf_get_option( 'slowy_hf_support_hours', SLOWY_HF_SUPPORT_HOURS ) ); ?>"></td></tr>
	    </table>

	    <h2>Editable Links</h2>
	    <p>Leave any field blank to use the automatic default page, WooCommerce, or WordPress URL.</p>
	    <table class="form-table" role="presentation">
	      <?php foreach ( slowy_hf_link_fields() as $key => $label ) : ?>
	        <tr>
	          <th scope="row"><label for="slowy_hf_link_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label></th>
	          <td><input class="large-text" id="slowy_hf_link_<?php echo esc_attr( $key ); ?>" name="slowy_hf_link_<?php echo esc_attr( $key ); ?>" type="url" value="<?php echo esc_attr( get_option( 'slowy_hf_link_' . $key, '' ) ); ?>" placeholder="<?php echo esc_attr( slowy_hf_url_for( $key ) ); ?>"></td>
	        </tr>
	      <?php endforeach; ?>
	    </table>

	    <?php submit_button( 'Save SLOWY Header & Footer' ); ?>
	  </form>
	</div>
	<?php
}
