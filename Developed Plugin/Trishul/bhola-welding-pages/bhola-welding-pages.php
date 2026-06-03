<?php
/**
 * Plugin Name: Bhola Welding Works Pages
 * Description: Creates all website content pages on activation. Includes Home, About, Services, Contact, and all policy pages with branded styling.
 * Version:     1.0.0
 * Author:      Bhola Welding Works
 * Author URI:  https://bholaweldingworks.in/
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'BWW_PAGES_DIR',     plugin_dir_path( __FILE__ ) );
define( 'BWW_PAGES_URL',     plugin_dir_url( __FILE__ ) );
define( 'BWW_PAGES_VERSION', '1.0.0' );

require_once BWW_PAGES_DIR . 'includes/pages.php';

/* ── Activation ──────────────────────────────────────────────── */
register_activation_hook( __FILE__, 'bww_pages_activate' );

function bww_pages_activate() {
	bww_upload_logo();
	bww_create_pages();
	flush_rewrite_rules();
}

function bww_upload_logo() {
	if ( get_option( 'bww_logo_id' ) ) {
		return;
	}

	$logo_path = BWW_PAGES_DIR . 'assets/images/logo.png';
	if ( ! file_exists( $logo_path ) ) {
		return;
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$upload_dir  = wp_upload_dir();
	$dest_name   = 'bhola-welding-works-logo.png';
	$dest_path   = $upload_dir['path'] . '/' . $dest_name;

	if ( ! copy( $logo_path, $dest_path ) ) {
		return;
	}

	$attachment = [
		'guid'           => $upload_dir['url'] . '/' . $dest_name,
		'post_mime_type' => 'image/png',
		'post_title'     => 'Bhola Welding Works Logo',
		'post_content'   => '',
		'post_status'    => 'inherit',
	];

	$attachment_id = wp_insert_attachment( $attachment, $dest_path );
	if ( is_wp_error( $attachment_id ) ) {
		return;
	}

	$metadata = wp_generate_attachment_metadata( $attachment_id, $dest_path );
	wp_update_attachment_metadata( $attachment_id, $metadata );
	update_option( 'bww_logo_id', $attachment_id );
}

function bww_create_pages() {
	$pages   = bww_get_all_pages();
	$page_ids = get_option( 'bww_page_ids', [] );

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

	update_option( 'bww_page_ids', $page_ids );
}

/* ── Helpers ─────────────────────────────────────────────────── */
function bww_is_plugin_page() {
	if ( ! is_singular( 'page' ) ) {
		return false;
	}
	$page_ids = get_option( 'bww_page_ids', [] );
	return in_array( get_the_ID(), array_values( $page_ids ), true );
}

function bww_get_page_id( $slug ) {
	$page_ids = get_option( 'bww_page_ids', [] );
	if ( isset( $page_ids[ $slug ] ) ) {
		return $page_ids[ $slug ];
	}
	$page = get_page_by_path( $slug, OBJECT, 'page' );
	return $page ? $page->ID : 0;
}

/* ── Enqueue assets only on plugin pages ─────────────────────── */
add_action( 'wp_enqueue_scripts', 'bww_enqueue_page_assets' );

function bww_enqueue_page_assets() {
	if ( ! bww_is_plugin_page() ) {
		return;
	}

	wp_enqueue_style(
		'bww-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Manrope:wght@300;400;500;600;700&display=swap',
		[],
		null
	);

	wp_enqueue_style(
		'bww-pages',
		BWW_PAGES_URL . 'assets/css/bww-pages.css',
		[ 'bww-google-fonts' ],
		BWW_PAGES_VERSION
	);
}

/* ── Body class on plugin pages ──────────────────────────────── */
add_filter( 'body_class', 'bww_add_body_class' );

function bww_add_body_class( $classes ) {
	if ( bww_is_plugin_page() ) {
		$classes[] = 'bww-page';
	}
	return $classes;
}

/* ── Disable content filters on plugin pages ─────────────────── */
add_action( 'template_redirect', 'bww_disable_content_filters' );

function bww_disable_content_filters() {
	if ( ! bww_is_plugin_page() ) {
		return;
	}
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_content', 'wptexturize' );
	remove_filter( 'the_content', 'capital_P_dangit' );
}

/* ── Replace placeholders at runtime ────────────────────────────── */
add_filter( 'the_content', 'bww_replace_placeholders', 20 );

function bww_replace_placeholders( $content ) {
	if ( ! bww_is_plugin_page() ) {
		return $content;
	}

	$logo_url = 'https://mintcream-crane-321031.hostingersite.com/wp-content/uploads/2026/05/Untitled-design-4.png';

	$map = [
		'%%BRAND_LOGO%%'  => esc_url( $logo_url ),
		'%%URL_HOME%%'    => esc_url( bww_get_page_url( 'bww-home' ) ),
		'%%URL_ABOUT%%'   => esc_url( bww_get_page_url( 'about-us' ) ),
		'%%URL_SERVICES%%'=> esc_url( bww_get_page_url( 'services' ) ),
		'%%URL_CONTACT%%' => esc_url( bww_get_page_url( 'contact' ) ),
		'%%URL_PRIVACY%%' => esc_url( bww_get_page_url( 'privacy-policy' ) ),
		'%%URL_TERMS%%'   => esc_url( bww_get_page_url( 'terms-of-service' ) ),
		'%%URL_TERMS_C%%' => esc_url( bww_get_page_url( 'terms-and-conditions' ) ),
		'%%URL_REFUND%%'  => esc_url( bww_get_page_url( 'refund-policy' ) ),
		'%%URL_CANCEL%%'  => esc_url( bww_get_page_url( 'cancellation-policy' ) ),
		'%%URL_SHIPPING%%'=> esc_url( bww_get_page_url( 'shipping-policy' ) ),
	];

	return str_replace( array_keys( $map ), array_values( $map ), $content );
}

function bww_get_page_url( $slug ) {
	$id = bww_get_page_id( $slug );
	return $id ? get_permalink( $id ) : home_url( '/' . $slug . '/' );
}
