<?php
/**
 * Plugin Name:  NextGen Fusion — Pages
 * Plugin URI:   https://nextgenfusion.in
 * Description:  Automatically creates and styles all core website pages for NextGen Fusion — Home, About Us, Services, Contact, Privacy Policy, and Terms of Service. No page builder required. Activate to publish.
 * Version:      1.0.0
 * Author:       NextGen Fusion
 * Author URI:   https://nextgenfusion.in
 * License:      GPL-2.0-or-later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  nextgen-fusion-pages
 */

defined( 'ABSPATH' ) || exit;

define( 'NGF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'NGF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'NGF_VERSION',    '1.0.0' );
define( 'NGF_OPT_PAGES',  'ngf_page_ids' );

require_once NGF_PLUGIN_DIR . 'includes/pages.php';

/* ─── Activation: create all pages ──────────────────────────── */
register_activation_hook( __FILE__, 'ngf_activate' );

function ngf_activate() {
	ngf_create_pages();
}

function ngf_create_pages() {
	$defs   = ngf_get_page_definitions();
	$stored = (array) get_option( NGF_OPT_PAGES, [] );

	foreach ( $defs as $slug => $data ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			$stored[ $slug ] = $existing->ID;
			continue;
		}
		$id = wp_insert_post( [
			'post_title'   => sanitize_text_field( $data['title'] ),
			'post_name'    => sanitize_title( $slug ),
			'post_content' => $data['content'],
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_author'  => 1,
		] );
		if ( ! is_wp_error( $id ) ) {
			$stored[ $slug ] = $id;
		}
	}
	update_option( NGF_OPT_PAGES, $stored );
}

/* ─── Helper: is this an NGF page? ──────────────────────────── */
function ngf_is_ngf_page() {
	$stored = (array) get_option( NGF_OPT_PAGES, [] );
	if ( empty( $stored ) ) {
		return false;
	}
	global $post;
	return $post && in_array( $post->ID, $stored, true );
}

/* ─── Enqueue assets only on NGF pages ──────────────────────── */
add_action( 'wp_enqueue_scripts', 'ngf_enqueue_assets' );

function ngf_enqueue_assets() {
	if ( ! ngf_is_ngf_page() ) {
		return;
	}
	wp_enqueue_style(
		'ngf-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Manrope:wght@300;400;500;600;700&display=swap',
		[],
		null
	);
	wp_enqueue_style(
		'ngf-pages',
		NGF_PLUGIN_URL . 'assets/css/ngf-pages.css',
		[ 'ngf-google-fonts' ],
		NGF_VERSION
	);
}

/* ─── Add body class so CSS can override the theme ──────────── */
add_filter( 'body_class', 'ngf_body_class' );

function ngf_body_class( $classes ) {
	if ( ngf_is_ngf_page() ) {
		$classes[] = 'ngf-page';
	}
	return $classes;
}

/* ─── Remove wpautop on NGF pages so raw HTML is not mangled ── */
add_action( 'template_redirect', 'ngf_remove_autop' );

function ngf_remove_autop() {
	if ( ngf_is_ngf_page() ) {
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_content', 'wptexturize' );
	}
}

/* ─── Replace %%NGF_*%% placeholders in stored page content ─── */
add_filter( 'the_content', 'ngf_replace_placeholders', 5 );

function ngf_replace_placeholders( $content ) {
	if ( false === strpos( $content, '%%NGF_' ) ) {
		return $content;
	}

	$stored   = (array) get_option( NGF_OPT_PAGES, [] );
	$logo_url = esc_url( NGF_PLUGIN_URL . 'assets/images/logo.png' );

	$get_url = function ( $key ) use ( $stored ) {
		return ! empty( $stored[ $key ] ) ? esc_url( get_permalink( (int) $stored[ $key ] ) ) : '#';
	};

	$find = [
		'%%NGF_LOGO%%',
		'%%NGF_URL_HOME%%',
		'%%NGF_URL_ABOUT%%',
		'%%NGF_URL_SERVICES%%',
		'%%NGF_URL_CONTACT%%',
		'%%NGF_URL_PRIVACY%%',
		'%%NGF_URL_TERMS%%',
		'%%NGF_URL_TERMS_C%%',
		'%%NGF_URL_REFUND%%',
		'%%NGF_URL_CANCEL%%',
		'%%NGF_URL_SHIPPING%%',
	];

	$replace = [
		$logo_url,
		$get_url( 'ngf-home' ),
		$get_url( 'about-us' ),
		$get_url( 'services' ),
		$get_url( 'contact' ),
		$get_url( 'privacy-policy' ),
		$get_url( 'terms-of-service' ),
		$get_url( 'terms-and-conditions' ),
		$get_url( 'refund-policy' ),
		$get_url( 'cancellation-policy' ),
		$get_url( 'shipping-policy' ),
	];

	return str_replace( $find, $replace, $content );
}
