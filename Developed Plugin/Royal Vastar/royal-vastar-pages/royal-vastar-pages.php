<?php
/**
 * Plugin Name: Royal Vastar Pages
 * Plugin URI:  https://royalvastar.com/
 * Description: Creates all website content pages on activation. Includes Home, About, Services, Contact, and all policy pages with branded styling.
 * Version:     1.0.3
 * Author:      Royal Vastar
 * Author URI:  https://royalvastar.com/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: royal-vastar-pages
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'RV_PAGES_DIR',     plugin_dir_path( __FILE__ ) );
define( 'RV_PAGES_URL',     plugin_dir_url( __FILE__ ) );
define( 'RV_PAGES_VERSION', '1.0.3' );
define( 'RV_LOGO_URL',      'https://limegreen-gaur-701943.hostingersite.com/wp-content/uploads/2026/05/Royal-Vaster-1.png' );

require_once RV_PAGES_DIR . 'includes/pages.php';

/* ── Activation ──────────────────────────────────────────────── */
register_activation_hook( __FILE__, 'rv_pages_activate' );

function rv_pages_activate() {
	rv_create_pages();
	flush_rewrite_rules();
}

function rv_create_pages() {
	$pages    = rv_get_all_pages();
	$page_ids = get_option( 'rv_page_ids', [] );

	foreach ( $pages as $slug => $data ) {
		if ( get_page_by_path( $slug, OBJECT, 'page' ) ) {
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
		RV_PAGES_VERSION
	);
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
