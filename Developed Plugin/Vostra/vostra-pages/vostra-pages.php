<?php
/**
 * Plugin Name: VOSTRA Pages
 * Description: Creates all website content pages on activation. Self-contained branded pages with baked-in HTML/CSS (no page builder). Includes the full site footer inside the Home page.
 * Version:     1.0.0
 * Author:      VOSTRA
 * Author URI:  https://vostra.in/
 *
 * @package VOSTRA_Pages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

/* ============================================================================
 * EDITABLE SETTINGS
 * ----------------------------------------------------------------------------
 * Change anything below to update the logo, footer links, contact details and
 * social handles everywhere on the site. These are used inside page content
 * and in the placeholder-replacement filter — no Media Library upload needed.
 * ========================================================================== */

// Brand logo (direct image URL already uploaded on your site).
define( 'VOSTRA_LOGO_URL', 'https://vostra.in/wp-content/uploads/vostra-logo.png' );

// Brand / site basics.
define( 'VOSTRA_BRAND_NAME', 'VOSTRA' );
define( 'VOSTRA_TAGLINE', 'Wear Confidence' );
define( 'VOSTRA_SITE_URL', 'https://vostra.in/' );

// Contact details (used on Contact page + footer).
define( 'VOSTRA_EMAIL', 'supportvostra@gmail.com' );
define( 'VOSTRA_WHATSAPP', '919999999999' ); // Full number, country code, no '+'. CHANGE THIS.
define( 'VOSTRA_PHONE', '+91 99999 99999' ); // Display phone. CHANGE THIS.
define( 'VOSTRA_ADDRESS', 'India' );

// Social links — leave any value as an empty string '' to hide that icon.
define( 'VOSTRA_INSTAGRAM', 'https://www.instagram.com/vostra.in?igsh=MWV3ZDM1dGM0Y2xhdw%3D%3D&utm_source=qr' );
define( 'VOSTRA_TWITTER', '' );
define( 'VOSTRA_YOUTUBE', '' );
define( 'VOSTRA_LINKEDIN', '' );

// Policy values used inside generated legal copy.
define( 'VOSTRA_REFUND_DAYS', '7' );
define( 'VOSTRA_COUNTRY', 'India' );

/* ============================================================================
 * BOOTSTRAP
 * ========================================================================== */

define( 'VOSTRA_PAGES_VERSION', '1.0.1' );
define( 'VOSTRA_PAGES_URL', plugin_dir_url( __FILE__ ) );
define( 'VOSTRA_PAGES_PATH', plugin_dir_path( __FILE__ ) );

require_once VOSTRA_PAGES_PATH . 'includes/pages.php';

/**
 * Master map of every page this plugin creates.
 * key = page slug, value = [ title, content-callback ].
 *
 * @return array
 */
function vostra_pages_map() {
	return array(
		'vostra-home'           => array( 'Home', 'vostra_content_home' ),
		'about-us'              => array( 'About Us', 'vostra_content_about' ),
		'services'              => array( 'What We Offer', 'vostra_content_services' ),
		'contact'               => array( 'Contact', 'vostra_content_contact' ),
		'privacy-policy'        => array( 'Privacy Policy', 'vostra_content_privacy' ),
		'terms-of-service'      => array( 'Terms of Service', 'vostra_content_terms_service' ),
		'terms-and-conditions'  => array( 'Terms & Conditions', 'vostra_content_terms_conditions' ),
		'refund-policy'         => array( 'Refund & Return Policy', 'vostra_content_refund' ),
		'cancellation-policy'   => array( 'Cancellation Policy', 'vostra_content_cancellation' ),
		'shipping-policy'       => array( 'Shipping & Delivery Policy', 'vostra_content_shipping' ),
	);
}

/* ============================================================================
 * ACTIVATION — create pages, store IDs
 * ========================================================================== */

register_activation_hook( __FILE__, 'vostra_pages_activate' );

function vostra_pages_activate() {
	$ids = get_option( 'vostra_page_ids', array() );
	if ( ! is_array( $ids ) ) {
		$ids = array();
	}

	foreach ( vostra_pages_map() as $slug => $data ) {
		list( $title, $callback ) = $data;

		// Skip silently if the slug already exists — never duplicate.
		$existing = get_page_by_path( $slug, OBJECT, 'page' );
		if ( $existing instanceof WP_Post ) {
			$ids[ $slug ] = (int) $existing->ID;
			continue;
		}

		$content = '<!-- wp:html -->' . "\n" . call_user_func( $callback ) . "\n" . '<!-- /wp:html -->';

		$page_id = wp_insert_post(
			array(
				'post_title'   => $title,
				'post_name'    => $slug,
				'post_content' => $content,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_author'  => 1,
				'comment_status' => 'closed',
				'ping_status'  => 'closed',
			)
		);

		if ( $page_id && ! is_wp_error( $page_id ) ) {
			$ids[ $slug ] = (int) $page_id;
		}
	}

	// Force Elementor Full Width template on every plugin page (new + existing).
	foreach ( $ids as $page_id ) {
		if ( $page_id ) {
			update_post_meta( (int) $page_id, '_wp_page_template', 'elementor_header_footer' );
		}
	}

	update_option( 'vostra_page_ids', $ids );

	// Set the Home page as the static front page if one isn't already chosen.
	if ( ! empty( $ids['vostra-home'] ) && 'page' !== get_option( 'show_on_front' ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['vostra-home'] );
	}

	flush_rewrite_rules();
}

// NOTE: pages are intentionally NOT deleted on deactivation.

/* ============================================================================
 * HELPERS
 * ========================================================================== */

/** @return int[] slug => post ID */
function vostra_get_page_ids() {
	$ids = get_option( 'vostra_page_ids', array() );
	return is_array( $ids ) ? $ids : array();
}

/** Is the current singular view one of our plugin pages? */
function vostra_is_plugin_page() {
	if ( ! is_singular( 'page' ) ) {
		return false;
	}
	$ids = array_map( 'intval', array_values( vostra_get_page_ids() ) );
	return in_array( (int) get_queried_object_id(), $ids, true );
}

/** Safe permalink for a slug, falling back to home_url. */
function vostra_url( $slug ) {
	$ids = vostra_get_page_ids();
	if ( ! empty( $ids[ $slug ] ) ) {
		$link = get_permalink( (int) $ids[ $slug ] );
		if ( $link ) {
			return $link;
		}
	}
	$page = get_page_by_path( $slug, OBJECT, 'page' );
	return $page ? get_permalink( $page->ID ) : home_url( '/' );
}

/* ============================================================================
 * PLACEHOLDER REPLACEMENT (runtime, on the_content)
 * ========================================================================== */

add_filter( 'the_content', 'vostra_replace_placeholders', 20 );

function vostra_replace_placeholders( $content ) {
	if ( false === strpos( $content, '%%' ) ) {
		return $content;
	}

	$map = array(
		'%%BRAND_LOGO%%'   => esc_url( VOSTRA_LOGO_URL ),
		'%%URL_HOME%%'     => esc_url( vostra_url( 'vostra-home' ) ),
		'%%URL_ABOUT%%'    => esc_url( vostra_url( 'about-us' ) ),
		'%%URL_SERVICES%%' => esc_url( vostra_url( 'services' ) ),
		'%%URL_CONTACT%%'  => esc_url( vostra_url( 'contact' ) ),
		'%%URL_PRIVACY%%'  => esc_url( vostra_url( 'privacy-policy' ) ),
		'%%URL_TERMS%%'    => esc_url( vostra_url( 'terms-of-service' ) ),
		'%%URL_TERMS_C%%'  => esc_url( vostra_url( 'terms-and-conditions' ) ),
		'%%URL_REFUND%%'   => esc_url( vostra_url( 'refund-policy' ) ),
		'%%URL_CANCEL%%'   => esc_url( vostra_url( 'cancellation-policy' ) ),
		'%%URL_SHIPPING%%' => esc_url( vostra_url( 'shipping-policy' ) ),
	);

	return strtr( $content, $map );
}

/* ============================================================================
 * ASSETS — only on plugin pages
 * ========================================================================== */

add_action( 'wp_enqueue_scripts', 'vostra_enqueue_assets' );

function vostra_enqueue_assets() {
	if ( ! vostra_is_plugin_page() ) {
		return;
	}

	// Google Fonts: Cinzel (headings) + Manrope (body).
	wp_enqueue_style(
		'vostra-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Manrope:wght@300;400;500;600;700;800&display=swap',
		array(),
		null
	);

	// Font Awesome for contact / social / feature icons.
	wp_enqueue_style(
		'vostra-fa',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
		array(),
		'6.4.0'
	);

	wp_enqueue_style(
		'vostra-pages',
		VOSTRA_PAGES_URL . 'assets/css/vos-pages.css',
		array( 'vostra-fonts', 'vostra-fa' ),
		VOSTRA_PAGES_VERSION
	);
}

/* ============================================================================
 * BODY CLASS — full-width + branded background
 * ========================================================================== */

add_filter( 'body_class', 'vostra_body_class' );

function vostra_body_class( $classes ) {
	if ( vostra_is_plugin_page() ) {
		$classes[] = 'vos-page';
	}
	return $classes;
}

/* ============================================================================
 * CONTENT PROTECTION — keep raw HTML intact on plugin pages
 * ========================================================================== */

add_action( 'template_redirect', 'vostra_disable_formatting' );

function vostra_disable_formatting() {
	if ( vostra_is_plugin_page() ) {
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_content', 'wptexturize' );
	}
}

/* ============================================================================
 * SETTINGS QUICK-LINK on the Plugins screen
 * ========================================================================== */

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'vostra_action_links' );

function vostra_action_links( $links ) {
	$home = vostra_url( 'vostra-home' );
	$links[] = '<a href="' . esc_url( $home ) . '" target="_blank">View Site</a>';
	return $links;
}
