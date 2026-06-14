<?php
/**
 * Plugin Name: SLOWY Pages
 * Description: Creates SLOWY content pages except the homepage: About, Contact, Categories, Privacy, Terms, Returns, Cancellation, and Shipping.
 * Version:     1.0.0
 * Author:      SLOWY
 * Author URI:  https://www.slowy.in/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: slowy-pages
 *
 * @package Slowy_Pages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SLOWY_PAGES_VERSION', '1.0.0' );
define( 'SLOWY_PAGES_PATH', plugin_dir_path( __FILE__ ) );
define( 'SLOWY_PAGES_URL', plugin_dir_url( __FILE__ ) );
define( 'SLOWY_PAGES_CSS_FILE', SLOWY_PAGES_PATH . 'assets/css/slowy-pages.css' );
define( 'SLOWY_PAGES_ASSET_VERSION', file_exists( SLOWY_PAGES_CSS_FILE ) ? SLOWY_PAGES_VERSION . '-' . filemtime( SLOWY_PAGES_CSS_FILE ) : SLOWY_PAGES_VERSION );

define( 'SLOWY_BRAND_NAME', 'SLOWY' );
define( 'SLOWY_SITE_URL', 'https://www.slowy.in/' );
define( 'SLOWY_EMAIL', 'contact@slowy.in' );
define( 'SLOWY_PHONE', '8787040771' );
define( 'SLOWY_WHATSAPP', '918787040771' );
define( 'SLOWY_ADDRESS', 'Sujanganj, Jaunpur, Uttar Pradesh, 222143 India' );
define( 'SLOWY_SUPPORT_HOURS', 'Monday to Saturday, 10 AM - 7 PM' );
define( 'SLOWY_LAST_UPDATED', '10 June 2026' );

require_once SLOWY_PAGES_PATH . 'includes/pages.php';

register_activation_hook( __FILE__, 'slowy_pages_activate' );

/**
 * Create/update all plugin pages on activation.
 */
function slowy_pages_activate() {
	slowy_pages_sync_pages();
	slowy_create_product_categories();
	flush_rewrite_rules();
}

add_action( 'admin_init', 'slowy_pages_maybe_sync_pages' );

/**
 * Refresh generated pages when plugin content version changes.
 */
function slowy_pages_maybe_sync_pages() {
	if ( get_option( 'slowy_pages_content_version' ) !== SLOWY_PAGES_VERSION ) {
		slowy_pages_sync_pages();
		slowy_create_product_categories();
	}
}

/**
 * Create or update pages without duplicating slugs.
 */
function slowy_pages_sync_pages() {
	$definitions = slowy_get_page_definitions();
	$page_ids    = get_option( 'slowy_page_ids', array() );

	if ( ! is_array( $page_ids ) ) {
		$page_ids = array();
	}

	foreach ( $definitions as $slug => $definition ) {
		$content = '<!-- wp:html -->' . "\n" . $definition['content'] . "\n" . '<!-- /wp:html -->';
		$page    = get_page_by_path( $slug, OBJECT, 'page' );

		if ( $page instanceof WP_Post ) {
			wp_update_post(
				array(
					'ID'             => (int) $page->ID,
					'post_title'     => wp_specialchars_decode( $definition['title'], ENT_QUOTES ),
					'post_content'   => $content,
					'post_status'    => 'publish',
					'post_type'      => 'page',
					'comment_status' => 'closed',
					'ping_status'    => 'closed',
				)
			);
			$page_ids[ $slug ] = (int) $page->ID;
			slowy_pages_apply_full_width_layout( (int) $page->ID );
			continue;
		}

		$page_id = wp_insert_post(
			array(
				'post_title'     => $definition['title'],
				'post_name'      => $slug,
				'post_content'   => $content,
				'post_status'    => 'publish',
				'post_type'      => 'page',
				'post_author'    => 1,
				'comment_status' => 'closed',
				'ping_status'    => 'closed',
			)
		);

		if ( $page_id && ! is_wp_error( $page_id ) ) {
			$page_ids[ $slug ] = (int) $page_id;
			slowy_pages_apply_full_width_layout( (int) $page_id );
		}
	}

	update_option( 'slowy_page_ids', $page_ids );
	update_option( 'slowy_pages_content_version', SLOWY_PAGES_VERSION );
}

/**
 * Prefer the common full-width Elementor template when available.
 *
 * @param int $post_id Page ID.
 */
function slowy_pages_apply_full_width_layout( $post_id ) {
	update_post_meta( $post_id, '_wp_page_template', 'elementor_header_footer' );
}

/**
 * Product category tree for WooCommerce sites.
 *
 * @return array
 */
function slowy_product_category_tree() {
	return array(
		'Women'  => array(
			'Clothing'    => array(
				'Kurti'   => array(),
				'T-shirt' => array(),
			),
			'Jewellery'   => array(
				'All Jewellery' => array(),
				'Earrings'      => array(),
				'Bracelets'     => array(),
				'Bangles'       => array(),
				'Jewellery Set' => array(),
				'Mangalsutras'  => array(),
				'Chains'        => array(),
				'Anklet'        => array(),
				'Rings'         => array(),
				'Combos'        => array(),
			),
			'Accessories' => array(
				'Hair Bands'    => array(),
				'Hair Buns'     => array(),
				'Hair Clips'    => array(),
				'Women Watches' => array(),
			),
		),
		'Beauty' => array(
			'Lipstick'            => array(),
			'Eye Shadow & Liner'  => array(),
			'Kajal'               => array(),
			'Nail Paint'          => array(),
			'Makeup Kit'          => array(),
			'Mascara'             => array(),
		),
		'Men'    => array(
			'Men\'s Clothing' => array(),
		),
	);
}

/**
 * Create WooCommerce product categories when product_cat exists.
 */
function slowy_create_product_categories() {
	if ( ! taxonomy_exists( 'product_cat' ) ) {
		return;
	}

	$created = get_option( 'slowy_product_category_ids', array() );
	if ( ! is_array( $created ) ) {
		$created = array();
	}

	slowy_insert_category_branch( slowy_product_category_tree(), 0, $created );
	update_option( 'slowy_product_category_ids', $created );
}

/**
 * Recursively create product categories.
 *
 * @param array $branch Category branch.
 * @param int   $parent Parent term ID.
 * @param array $created Created term IDs.
 */
function slowy_insert_category_branch( $branch, $parent, &$created ) {
	foreach ( $branch as $name => $children ) {
		$term = term_exists( $name, 'product_cat', $parent );

		if ( is_array( $term ) && ! empty( $term['term_id'] ) ) {
			$term_id = (int) $term['term_id'];
		} elseif ( $term ) {
			$term_id = (int) $term;
		} else {
			$result = wp_insert_term(
				$name,
				'product_cat',
				array(
					'parent' => (int) $parent,
					'slug'   => sanitize_title( $name ),
				)
			);

			if ( is_wp_error( $result ) || empty( $result['term_id'] ) ) {
				continue;
			}

			$term_id = (int) $result['term_id'];
		}

		$created[ $name ] = $term_id;

		if ( ! empty( $children ) ) {
			slowy_insert_category_branch( $children, $term_id, $created );
		}
	}
}

/**
 * Return stored generated page IDs.
 *
 * @return array
 */
function slowy_get_page_ids() {
	$page_ids = get_option( 'slowy_page_ids', array() );
	return is_array( $page_ids ) ? $page_ids : array();
}

/**
 * Is the currently viewed page generated by this plugin?
 */
function slowy_is_plugin_page() {
	if ( ! is_singular( 'page' ) ) {
		return false;
	}

	return in_array( (int) get_queried_object_id(), array_map( 'intval', array_values( slowy_get_page_ids() ) ), true );
}

/**
 * Get a generated page URL by slug.
 *
 * @param string $slug Page slug.
 * @return string
 */
function slowy_get_page_url( $slug ) {
	$page_ids = slowy_get_page_ids();

	if ( ! empty( $page_ids[ $slug ] ) ) {
		$permalink = get_permalink( (int) $page_ids[ $slug ] );
		if ( $permalink ) {
			return $permalink;
		}
	}

	$page = get_page_by_path( $slug, OBJECT, 'page' );
	return $page ? get_permalink( (int) $page->ID ) : home_url( '/' . $slug . '/' );
}

add_filter( 'the_content', 'slowy_replace_placeholders', 20 );

/**
 * Replace runtime links and contact placeholders.
 *
 * @param string $content Page content.
 * @return string
 */
function slowy_replace_placeholders( $content ) {
	if ( ! slowy_is_plugin_page() || false === strpos( $content, '%%' ) ) {
		return $content;
	}

	$contact_card = strtr(
		slowy_contact_card(),
		array(
			'%%EMAIL%%'         => esc_html( SLOWY_EMAIL ),
			'%%PHONE%%'         => esc_html( SLOWY_PHONE ),
			'%%WHATSAPP%%'      => esc_url( 'https://wa.me/' . SLOWY_WHATSAPP ),
			'%%ADDRESS%%'       => esc_html( SLOWY_ADDRESS ),
			'%%SUPPORT_HOURS%%' => esc_html( SLOWY_SUPPORT_HOURS ),
		)
	);

	$map = array(
		'%%URL_HOME%%'       => esc_url( home_url( '/' ) ),
		'%%URL_ABOUT%%'      => esc_url( slowy_get_page_url( 'about-us' ) ),
		'%%URL_CATEGORIES%%' => esc_url( slowy_get_page_url( 'collections' ) ),
		'%%URL_CONTACT%%'    => esc_url( slowy_get_page_url( 'contact' ) ),
		'%%URL_PRIVACY%%'    => esc_url( slowy_get_page_url( 'privacy-policy' ) ),
		'%%URL_TERMS%%'      => esc_url( slowy_get_page_url( 'terms-and-conditions' ) ),
		'%%URL_REFUND%%'     => esc_url( slowy_get_page_url( 'return-refund-policy' ) ),
		'%%URL_CANCEL%%'     => esc_url( slowy_get_page_url( 'cancellation-policy' ) ),
		'%%URL_SHIPPING%%'   => esc_url( slowy_get_page_url( 'shipping-policy' ) ),
		'%%EMAIL%%'          => esc_html( SLOWY_EMAIL ),
		'%%PHONE%%'          => esc_html( SLOWY_PHONE ),
		'%%WHATSAPP%%'       => esc_url( 'https://wa.me/' . SLOWY_WHATSAPP ),
		'%%ADDRESS%%'        => esc_html( SLOWY_ADDRESS ),
		'%%SUPPORT_HOURS%%'  => esc_html( SLOWY_SUPPORT_HOURS ),
		'%%LAST_UPDATED%%'   => esc_html( SLOWY_LAST_UPDATED ),
		'%%CONTACT_CARD%%'   => $contact_card,
	);

	return strtr( $content, $map );
}

add_action( 'template_redirect', 'slowy_disable_default_content_filters' );

/**
 * Keep generated HTML untouched on plugin pages.
 */
function slowy_disable_default_content_filters() {
	if ( slowy_is_plugin_page() ) {
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_content', 'wptexturize' );
	}
}

add_filter( 'body_class', 'slowy_body_class' );

/**
 * Add a body class for scoped CSS.
 *
 * @param string[] $classes Classes.
 * @return string[]
 */
function slowy_body_class( $classes ) {
	if ( slowy_is_plugin_page() ) {
		$classes[] = 'slowy-page';
	}

	return $classes;
}

add_action( 'wp_enqueue_scripts', 'slowy_enqueue_page_assets' );

/**
 * Enqueue assets only on generated pages.
 */
function slowy_enqueue_page_assets() {
	if ( ! slowy_is_plugin_page() ) {
		return;
	}

	wp_enqueue_style(
		'slowy-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Manrope:wght@300;400;500;600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'slowy-pages',
		SLOWY_PAGES_URL . 'assets/css/slowy-pages.css',
		array( 'slowy-google-fonts' ),
		SLOWY_PAGES_ASSET_VERSION
	);
}
