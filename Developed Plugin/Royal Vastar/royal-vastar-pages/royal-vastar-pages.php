<?php
/**
 * Plugin Name: Royal Vastar Pages
 * Plugin URI:  https://royalvastar.com/
 * Description: Creates all website content pages on activation. Includes Home, About, Services, Contact, and all policy pages with branded styling.
 * Version:     1.0.5
 * Author:      Royal Vastar
 * Author URI:  https://royalvastar.com/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: royal-vastar-pages
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'RV_PAGES_DIR',     plugin_dir_path( __FILE__ ) );
define( 'RV_PAGES_URL',     plugin_dir_url( __FILE__ ) );
define( 'RV_PAGES_VERSION', '1.0.5' );
define( 'RV_PAGES_CSS_FILE', RV_PAGES_DIR . 'assets/css/rv-pages.css' );
define( 'RV_PAGES_ASSET_VERSION', RV_PAGES_VERSION . '-' . filemtime( RV_PAGES_CSS_FILE ) );
define( 'RV_LOGO_URL',      'https://limegreen-gaur-701943.hostingersite.com/wp-content/uploads/2026/05/Royal-Vaster-1.png' );

require_once RV_PAGES_DIR . 'includes/pages.php';

/* ── Activation ──────────────────────────────────────────────── */
register_activation_hook( __FILE__, 'rv_pages_activate' );

function rv_pages_activate() {
	rv_create_pages();
	rv_pages_purge_cache();
	flush_rewrite_rules();
}

function rv_create_pages() {
	$pages    = rv_get_all_pages();
	$page_ids = get_option( 'rv_page_ids', [] );

	foreach ( $pages as $slug => $data ) {
		$existing_page = get_page_by_path( $slug, OBJECT, 'page' );

		if ( $existing_page ) {
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

	update_option( 'rv_page_ids', $page_ids );
}

function rv_pages_purge_cache() {
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
function rv_is_plugin_page() {
	if ( ! is_singular( 'page' ) ) {
		return false;
	}
	$page_ids = get_option( 'rv_page_ids', [] );
	return in_array( get_the_ID(), array_values( $page_ids ), true );
}

function rv_get_page_id( $slug ) {
	$page_ids = get_option( 'rv_page_ids', [] );
	if ( isset( $page_ids[ $slug ] ) ) {
		return $page_ids[ $slug ];
	}
	$page = get_page_by_path( $slug, OBJECT, 'page' );
	return $page ? $page->ID : 0;
}

function rv_get_page_url( $slug ) {
	$id = rv_get_page_id( $slug );
	return $id ? get_permalink( $id ) : home_url( '/' . $slug . '/' );
}

/* ── Enqueue assets only on plugin pages ─────────────────────── */
add_action( 'wp_enqueue_scripts', 'rv_enqueue_page_assets' );

function rv_enqueue_page_assets() {
	if ( ! rv_is_plugin_page() ) {
		return;
	}
	wp_enqueue_style(
		'rv-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Manrope:wght@300;400;500;600;700&display=swap',
		[],
		null
	);
	wp_enqueue_style(
		'rv-pages',
		RV_PAGES_URL . 'assets/css/rv-pages.css',
		[ 'rv-google-fonts' ],
		RV_PAGES_ASSET_VERSION
	);
	wp_add_inline_style( 'rv-pages', rv_pages_palette_override_css() );
}

function rv_pages_palette_override_css() {
	return <<<'CSS'
:root {
  --rv-color-1: #f7f1e8 !important;
  --rv-color-2: #eee2d2 !important;
  --rv-color-3: #171717 !important;
  --rv-color-4: #5b5148 !important;
  --rv-bg: #f7f1e8 !important;
  --rv-gradient: #eee2d2 !important;
  --rv-primary: #171717 !important;
  --rv-accent: #b08a4a !important;
  --rv-surface: #ffffff !important;
  --rv-surface2: #eee2d2 !important;
  --rv-border: #d8c3a1 !important;
  --rv-gold-light: #d8c3a1 !important;
  --rv-gold-dark: #b08a4a !important;
  --rv-white: #ffffff !important;
  --rv-text: #171717 !important;
  --rv-muted: #5b5148 !important;
  --rv-glow: rgba(176,138,74,0.25) !important;
  --rv-glow-strong: rgba(176,138,74,0.45) !important;
}
body.rv-page {
  background-color: #f7f1e8 !important;
  color: #171717 !important;
}
body.rv-page .rv-hero {
  background: linear-gradient(160deg, #f7f1e8 0%, #eee2d2 50%, #f7f1e8 100%) !important;
  border-bottom-color: #d8c3a1 !important;
}
body.rv-page .rv-section,
body.rv-page .rv-home-footer {
  background-color: #f7f1e8 !important;
}
body.rv-page .rv-stats,
body.rv-page .rv-card,
body.rv-page .rv-contact-panel,
body.rv-page .rv-form-panel {
  background: #ffffff !important;
  border-color: #d8c3a1 !important;
}
body.rv-page .rv-cta {
  background: linear-gradient(135deg, #ffffff 0%, #eee2d2 100%) !important;
  border-color: #d8c3a1 !important;
}
body.rv-page h1,
body.rv-page h2,
body.rv-page h3,
body.rv-page h4,
body.rv-page .rv-h1,
body.rv-page .rv-h2,
body.rv-page .rv-h3,
body.rv-page .rv-card h3,
body.rv-page .rv-why-text strong {
  color: #171717 !important;
}
body.rv-page p,
body.rv-page li,
body.rv-page span,
body.rv-page .rv-hero-intro,
body.rv-page .rv-muted-text {
  color: #5b5148 !important;
}
body.rv-page .rv-chip,
body.rv-page .rv-gold-text,
body.rv-page a,
body.rv-page .rv-card-icon,
body.rv-page .rv-stat-number {
  color: #b08a4a !important;
}
body.rv-page .rv-btn {
  background: #b08a4a !important;
  border-color: #b08a4a !important;
  color: #171717 !important;
}
body.rv-page .rv-btn:hover,
body.rv-page .rv-btn-outline {
  background: transparent !important;
  color: #b08a4a !important;
}
CSS;
}

/* ── Body class on plugin pages ──────────────────────────────── */
add_filter( 'body_class', 'rv_add_body_class' );

function rv_add_body_class( $classes ) {
	if ( rv_is_plugin_page() ) {
		$classes[] = 'rv-page';
	}
	return $classes;
}

/* ── Disable content filters on plugin pages ─────────────────── */
add_action( 'template_redirect', 'rv_disable_content_filters' );

function rv_disable_content_filters() {
	if ( ! rv_is_plugin_page() ) {
		return;
	}
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_content', 'wptexturize' );
	remove_filter( 'the_content', 'capital_P_dangit' );
}

/* ── Replace %%PLACEHOLDER%% tokens at runtime ───────────────── */
add_filter( 'the_content', 'rv_replace_placeholders', 20 );

function rv_replace_placeholders( $content ) {
	if ( ! rv_is_plugin_page() ) {
		return $content;
	}

	/* Logo is shared with the Header & Footer plugin so changing it once
	   updates both. Falls back to the bundled default when unset. */
	$logo = get_option( 'rv_hf_logo_url', '' );
	if ( empty( $logo ) ) {
		$logo = RV_LOGO_URL;
	}

	$map = [
		'%%BRAND_LOGO%%'   => esc_url( $logo ),
		'%%URL_HOME%%'     => esc_url( rv_get_page_url( 'rv-home' ) ),
		'%%URL_ABOUT%%'    => esc_url( rv_get_page_url( 'about-us' ) ),
		'%%URL_SERVICES%%' => esc_url( rv_get_page_url( 'services' ) ),
		'%%URL_CONTACT%%'  => esc_url( rv_get_page_url( 'contact' ) ),
		'%%URL_PRIVACY%%'  => esc_url( rv_get_page_url( 'privacy-policy' ) ),
		'%%URL_TERMS%%'    => esc_url( rv_get_page_url( 'terms-of-service' ) ),
		'%%URL_TERMS_C%%'  => esc_url( rv_get_page_url( 'terms-and-conditions' ) ),
		'%%URL_REFUND%%'   => esc_url( rv_get_page_url( 'refund-policy' ) ),
		'%%URL_CANCEL%%'   => esc_url( rv_get_page_url( 'cancellation-policy' ) ),
		'%%URL_SHIPPING%%' => esc_url( rv_get_page_url( 'shipping-policy' ) ),
	];

	return str_replace( array_keys( $map ), array_values( $map ), $content );
}
