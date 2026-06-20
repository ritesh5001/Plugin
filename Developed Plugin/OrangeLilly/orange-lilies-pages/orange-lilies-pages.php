<?php
/**
 * Plugin Name: Orange Lilies Pages
 * Plugin URI:  https://orangelilies.com/
 * Description: Creates all Orange Lilies content pages on activation — About, Our Products, Sustainability, Contact, and all policy pages — with branded, full-width styling baked in. No page builder required.
 * Version:     1.0.0
 * Author:      Orange Lilies
 * Author URI:  https://orangelilies.com/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: orange-lilies-pages
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'OL_PAGES_DIR',     plugin_dir_path( __FILE__ ) );
define( 'OL_PAGES_URL',     plugin_dir_url( __FILE__ ) );
define( 'OL_PAGES_VERSION', '1.0.0' );
define( 'OL_PAGES_CSS_FILE', OL_PAGES_DIR . 'assets/css/ol-pages.css' );
define( 'OL_PAGES_ASSET_VERSION', OL_PAGES_VERSION . '-' . ( file_exists( OL_PAGES_CSS_FILE ) ? filemtime( OL_PAGES_CSS_FILE ) : OL_PAGES_VERSION ) );

/* Default logo — shared with the Header & Footer plugin via the
   ol_hf_logo_url option, so changing it once updates both plugins. */
define( 'OL_LOGO_URL', 'https://mistyrose-chamois-793959.hostingersite.com/wp-content/uploads/2026/06/logo-1.png' );

require_once OL_PAGES_DIR . 'includes/pages.php';

/* ── Activation ──────────────────────────────────────────────── */
register_activation_hook( __FILE__, 'ol_pages_activate' );

function ol_pages_activate() {
	ol_create_pages();
	ol_pages_purge_cache();
	flush_rewrite_rules();
}

function ol_create_pages() {
	$pages    = ol_get_all_pages();
	$page_ids = get_option( 'ol_page_ids', [] );

	foreach ( $pages as $slug => $data ) {
		$existing_page = get_page_by_path( $slug, OBJECT, 'page' );

		if ( $existing_page ) {
			/* Refresh content but never create duplicates */
			wp_update_post( [
				'ID'           => $existing_page->ID,
				'post_title'   => wp_specialchars_decode( $data['title'], ENT_QUOTES ),
				'post_content' => $data['content'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
			] );
			$page_ids[ $slug ] = $existing_page->ID;
			continue;
		}

		$id = wp_insert_post( [
			'post_title'   => $data['title'],
			'post_name'    => $slug,
			'post_content' => $data['content'],
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_author'  => 1,
		] );

		if ( ! is_wp_error( $id ) ) {
			$page_ids[ $slug ] = $id;
		}
	}

	update_option( 'ol_page_ids', $page_ids );
}

function ol_pages_purge_cache() {
	wp_cache_flush();

	if ( function_exists( 'rocket_clean_domain' ) ) {
		rocket_clean_domain();
	}
	if ( function_exists( 'w3tc_flush_all' ) ) {
		w3tc_flush_all();
	}
	if ( function_exists( 'wp_cache_clear_cache' ) ) {
		wp_cache_clear_cache();
	}
	if ( class_exists( 'LiteSpeed_Cache_API' ) && method_exists( 'LiteSpeed_Cache_API', 'purge_all' ) ) {
		LiteSpeed_Cache_API::purge_all();
	}
	if ( class_exists( 'autoptimizeCache' ) && method_exists( 'autoptimizeCache', 'clearall' ) ) {
		autoptimizeCache::clearall();
	}
}

/* ── Helpers ─────────────────────────────────────────────────── */
function ol_is_plugin_page() {
	if ( ! is_singular( 'page' ) ) {
		return false;
	}
	$page_ids = get_option( 'ol_page_ids', [] );
	return in_array( get_the_ID(), array_values( $page_ids ), true );
}

function ol_get_page_id( $slug ) {
	$page_ids = get_option( 'ol_page_ids', [] );
	if ( isset( $page_ids[ $slug ] ) ) {
		return $page_ids[ $slug ];
	}
	$page = get_page_by_path( $slug, OBJECT, 'page' );
	return $page ? $page->ID : 0;
}

function ol_get_page_url( $slug ) {
	$id = ol_get_page_id( $slug );
	return $id ? get_permalink( $id ) : home_url( '/' . $slug . '/' );
}

/* ── Enqueue assets only on plugin pages ─────────────────────── */
add_action( 'wp_enqueue_scripts', 'ol_enqueue_page_assets' );

function ol_enqueue_page_assets() {
	if ( ! ol_is_plugin_page() ) {
		return;
	}
	wp_enqueue_style(
		'ol-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Manrope:wght@300;400;500;600;700&display=swap',
		[],
		null
	);
	wp_enqueue_style(
		'ol-pages',
		OL_PAGES_URL . 'assets/css/ol-pages.css',
		[ 'ol-google-fonts' ],
		OL_PAGES_ASSET_VERSION
	);
	wp_add_inline_style( 'ol-pages', ol_pages_palette_override_css() );
}

/* Re-declare the palette with !important so no theme (Elementor, XStore,
   Astra, etc.) can recolour our pages. Mirrors the values in ol-pages.css. */
function ol_pages_palette_override_css() {
	return <<<'CSS'
:root {
  --ol-color-1: #ec7505 !important;
  --ol-color-2: #ffffff !important;
  --ol-color-3: #7d7abc !important;
  --ol-color-4: #6457a6 !important;
  --ol-color-5: #223843 !important;
  --ol-bg: #ffffff !important;
  --ol-gradient: #f4f2fb !important;
  --ol-gradient2: #fff3e6 !important;
  --ol-primary: #223843 !important;
  --ol-accent: #ec7505 !important;
  --ol-violet: #6457a6 !important;
  --ol-indigo: #7d7abc !important;
  --ol-surface: #ffffff !important;
  --ol-surface2: #f6f4fc !important;
  --ol-border: #e6e1f4 !important;
  --ol-white: #ffffff !important;
  --ol-text: #2f3e48 !important;
  --ol-muted: #5a6772 !important;
  --ol-link: #6457a6 !important;
}
body.ol-page {
  background-color: #ffffff !important;
  color: #2f3e48 !important;
}
body.ol-page h1,
body.ol-page h2,
body.ol-page h3,
body.ol-page h4,
body.ol-page .ol-h1,
body.ol-page .ol-h2,
body.ol-page .ol-h3,
body.ol-page .ol-card h3,
body.ol-page .ol-why-text strong {
  color: #223843 !important;
}
body.ol-page p,
body.ol-page li,
body.ol-page .ol-hero-intro,
body.ol-page .ol-muted-text {
  color: #2f3e48 !important;
}
body.ol-page .ol-cta h2 { color: #ffffff !important; }
body.ol-page .ol-cta p  { color: rgba(255,255,255,0.92) !important; }
CSS;
}

/* ── Body class on plugin pages ──────────────────────────────── */
add_filter( 'body_class', 'ol_add_body_class' );

function ol_add_body_class( $classes ) {
	if ( ol_is_plugin_page() ) {
		$classes[] = 'ol-page';
	}
	return $classes;
}

/* ── Disable content filters on plugin pages (keep raw HTML clean) ─ */
add_action( 'template_redirect', 'ol_disable_content_filters' );

function ol_disable_content_filters() {
	if ( ! ol_is_plugin_page() ) {
		return;
	}
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_content', 'wptexturize' );
	remove_filter( 'the_content', 'capital_P_dangit' );
}

/* ── Replace %%PLACEHOLDER%% tokens at runtime ───────────────── */
add_filter( 'the_content', 'ol_replace_placeholders', 20 );

function ol_replace_placeholders( $content ) {
	if ( ! ol_is_plugin_page() ) {
		return $content;
	}

	/* Logo is shared with the Header & Footer plugin so changing it once
	   updates both. Falls back to the bundled default when unset. */
	$logo = get_option( 'ol_hf_logo_url', '' );
	if ( empty( $logo ) ) {
		$logo = OL_LOGO_URL;
	}

	$map = [
		'%%BRAND_LOGO%%'        => esc_url( $logo ),
		/* No Home page is created — Home points at the site root. */
		'%%URL_HOME%%'          => esc_url( home_url( '/' ) ),
		'%%URL_ABOUT%%'         => esc_url( ol_get_page_url( 'about-us' ) ),
		'%%URL_SERVICES%%'      => esc_url( ol_get_page_url( 'services' ) ),
		'%%URL_SUSTAINABILITY%%'=> esc_url( ol_get_page_url( 'sustainability' ) ),
		'%%URL_CONTACT%%'       => esc_url( ol_get_page_url( 'contact' ) ),
		'%%URL_PRIVACY%%'       => esc_url( ol_get_page_url( 'privacy-policy' ) ),
		'%%URL_TERMS%%'         => esc_url( ol_get_page_url( 'terms-of-service' ) ),
		'%%URL_TERMS_C%%'       => esc_url( ol_get_page_url( 'terms-and-conditions' ) ),
		'%%URL_REFUND%%'        => esc_url( ol_get_page_url( 'refund-policy' ) ),
		'%%URL_CANCEL%%'        => esc_url( ol_get_page_url( 'cancellation-policy' ) ),
		'%%URL_SHIPPING%%'      => esc_url( ol_get_page_url( 'shipping-policy' ) ),
	];

	return str_replace( array_keys( $map ), array_values( $map ), $content );
}
