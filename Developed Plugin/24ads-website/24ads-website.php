<?php
/**
 * Plugin Name:       24 Ads Website
 * Plugin URI:        https://24adsmarketing.com/
 * Description:        One-click installer for the full 24 Ads Marketing website. On activation it creates every page (home, about, services, all service pages, clients, contact, career) with the exact same design, and serves them at the original URLs. Just activate and you're live.
 * Version:           1.0.0
 * Author:            24 Ads Marketing
 * Author URI:        https://24adsmarketing.com/
 * License:           GPL-2.0+
 * Text Domain:       a24-website
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

define( 'A24_FILE', __FILE__ );
define( 'A24_DIR', plugin_dir_path( __FILE__ ) );
define( 'A24_URL', plugin_dir_url( __FILE__ ) );
define( 'A24_VER', '1.0.0' );

/**
 * The full site map.
 *
 * slug => [ title, html file in /pages, is the front page? ]
 * The home page uses the slug "home" and is set as the WordPress front page,
 * so it lives at the site root (https://24adsmarketing.com/).
 */
function a24_routes() {
	return array(
		'home'                => array( 'Home',                                 'index.html',               true  ),
		'about'               => array( 'About Us',                             'about.html',               false ),
		'services'            => array( 'Services',                             'services.html',            false ),
		'clients'             => array( 'Clients & Results',                    'clients.html',             false ),
		'contact'             => array( 'Contact Us',                           'contact.html',             false ),
		'career'              => array( 'Career',                               'career.html',              false ),
		'service-performance' => array( 'D2C Performance Marketing',            'service-performance.html', false ),
		'service-shopify'     => array( 'Shopify Website Development',          'service-shopify.html',     false ),
		'service-social'      => array( 'Social Media Management',              'service-social.html',      false ),
		'service-seo'         => array( 'SEO – Search Engine Optimization',     'service-seo.html',         false ),
		'service-marketplace' => array( 'E-commerce Marketplace Management',    'service-marketplace.html', false ),
		'service-graphics'    => array( 'Performance Graphics',                 'service-graphics.html',    false ),
		'service-scaling'     => array( 'Scaling Strategies',                   'service-scaling.html',     false ),
	);
}

/* ============================================================ */
/* ACTIVATION — create every page                               */
/* ============================================================ */

register_activation_hook( __FILE__, 'a24_activate' );

function a24_activate() {

	// Pretty permalinks make the original /about/, /services/ URLs work.
	// If the site is still on plain permalinks, switch to postname.
	if ( '' === get_option( 'permalink_structure' ) ) {
		global $wp_rewrite;
		update_option( 'permalink_structure', '/%postname%/' );
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
	}

	$front_id = 0;

	foreach ( a24_routes() as $slug => $route ) {
		list( $title, $file, $is_front ) = $route;

		$existing = get_page_by_path( $slug, OBJECT, 'page' );

		if ( $existing ) {
			$page_id = $existing->ID;
			// Make sure it is published.
			if ( 'publish' !== $existing->post_status ) {
				wp_update_post( array( 'ID' => $page_id, 'post_status' => 'publish' ) );
			}
		} else {
			$page_id = wp_insert_post( array(
				'post_title'   => $title,
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '<!-- This page is rendered by the "24 Ads Website" plugin. Edit the plugin files to change it. -->',
				'comment_status' => 'closed',
				'ping_status'    => 'closed',
			) );
		}

		if ( is_wp_error( $page_id ) || ! $page_id ) {
			continue;
		}

		// Tag the page so the plugin knows which HTML file to serve.
		update_post_meta( $page_id, '_a24_file', $file );

		if ( $is_front ) {
			$front_id = $page_id;
		}
	}

	// Point the WordPress front page at our Home page.
	if ( $front_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_id );
	}

	flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'a24_deactivate' );

function a24_deactivate() {
	flush_rewrite_rules();
}

/* ============================================================ */
/* RENDER — serve the original HTML at the right URL            */
/* ============================================================ */

add_action( 'template_redirect', 'a24_render_page' );

function a24_render_page() {

	if ( ! is_page() ) {
		return;
	}

	$page_id = get_queried_object_id();
	$file    = get_post_meta( $page_id, '_a24_file', true );

	if ( ! $file ) {
		return; // Not one of our pages — let WordPress handle it.
	}

	$path = A24_DIR . 'pages/' . basename( $file );

	if ( ! file_exists( $path ) ) {
		return;
	}

	$html = file_get_contents( $path );
	$html = a24_rewrite_links( $html );

	// Serve the standalone document and stop — bypasses the theme entirely
	// so the page looks exactly like the original design.
	status_header( 200 );
	if ( ! headers_sent() ) {
		header( 'Content-Type: text/html; charset=UTF-8' );
	}
	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput
	exit;
}

/**
 * Rewrite the static file's local references to live WordPress URLs:
 *  - styles.css / script.js  -> plugin asset URLs (with cache-busting)
 *  - about.html, services.html, ... -> the matching page permalinks
 *  - index.html -> the site home URL
 */
function a24_rewrite_links( $html ) {

	// --- Assets ---
	$css = A24_URL . 'assets/styles.css?ver=' . a24_asset_ver( 'assets/styles.css' );
	$js  = A24_URL . 'assets/script.js?ver=' . a24_asset_ver( 'assets/script.js' );

	$html = str_replace( 'href="styles.css"', 'href="' . esc_url( $css ) . '"', $html );
	$html = str_replace( 'src="script.js"', 'src="' . esc_url( $js ) . '"', $html );

	// --- Internal page links ---
	foreach ( a24_link_map() as $file => $url ) {
		// href="about.html"  and  href="about.html#section"
		$html = str_replace( '"' . $file . '"', '"' . $url . '"', $html );
		$html = str_replace( '"' . $file . '#', '"' . $url . '#', $html );
	}

	return $html;
}

/**
 * Map each original filename to its live permalink. Cached per request.
 */
function a24_link_map() {
	static $map = null;
	if ( null !== $map ) {
		return $map;
	}

	$map = array();
	foreach ( a24_routes() as $slug => $route ) {
		$file     = $route[1];
		$is_front = $route[2];

		if ( $is_front ) {
			$url = home_url( '/' );
		} else {
			$page = get_page_by_path( $slug, OBJECT, 'page' );
			$url  = $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
		}

		$map[ $file ] = $url;
	}

	return $map;
}

function a24_asset_ver( $rel ) {
	$path = A24_DIR . $rel;
	return file_exists( $path ) ? filemtime( $path ) : A24_VER;
}

/* ============================================================ */
/* ADMIN NOTICE — confirm install + link to pages              */
/* ============================================================ */

add_action( 'admin_notices', 'a24_admin_notice' );

function a24_admin_notice() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$screen = get_current_screen();
	if ( ! $screen || 'plugins' !== $screen->id ) {
		return;
	}
	if ( ! get_page_by_path( 'home', OBJECT, 'page' ) ) {
		return;
	}
	echo '<div class="notice notice-success is-dismissible"><p><strong>24 Ads Website is live.</strong> '
		. 'All pages were created and your home page is now the 24 Ads design. '
		. '<a href="' . esc_url( home_url( '/' ) ) . '" target="_blank" rel="noopener">View site &rarr;</a></p></div>';
}
