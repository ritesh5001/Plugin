<?php
/**
 * Plugin Name: Orange Lilies Pages
 * Plugin URI:  https://orangelilies.com/
 * Description: Creates all Orange Lilies content pages on activation — About, Our Products, Sustainability, Contact, and all policy pages — with branded, full-width styling baked in. No page builder required.
 * Version:     1.2.2
 * Author:      Orange Lilies
 * Author URI:  https://orangelilies.com/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: orange-lilies-pages
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'OL_PAGES_DIR',     plugin_dir_path( __FILE__ ) );
define( 'OL_PAGES_URL',     plugin_dir_url( __FILE__ ) );
define( 'OL_PAGES_VERSION', '1.2.2' );
define( 'OL_PAGES_CSS_FILE', OL_PAGES_DIR . 'assets/css/ol-pages.css' );
define( 'OL_PAGES_ASSET_VERSION', OL_PAGES_VERSION . '-' . ( file_exists( OL_PAGES_CSS_FILE ) ? filemtime( OL_PAGES_CSS_FILE ) : OL_PAGES_VERSION ) );

/* Default logo — shared with the Header & Footer plugin via the
   ol_hf_logo_url option, so changing it once updates both plugins. */
define( 'OL_LOGO_URL', 'https://orangelilies.com/wp-content/uploads/2026/07/OL-Orange@2x.png' );

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
		'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,400;1,500;1,600&family=Manrope:wght@300;400;500;600;700;800&display=swap',
		[],
		null
	);
	/* Font Awesome powers the page icons. Same handle/URL as the Header &
	   Footer plugin, so it loads only once when both plugins are active. */
	wp_enqueue_style(
		'ol-font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
		[],
		'6.5.2'
	);
	wp_enqueue_style(
		'ol-pages',
		OL_PAGES_URL . 'assets/css/ol-pages.css',
		[ 'ol-google-fonts', 'ol-font-awesome' ],
		OL_PAGES_ASSET_VERSION
	);
	wp_add_inline_style( 'ol-pages', ol_pages_palette_override_css() );
}

/* Re-declare the palette with !important so no theme (Elementor, XStore,
   Astra, etc.) can recolour our pages. Mirrors the values in ol-pages.css. */
function ol_pages_palette_override_css() {
	return <<<'CSS'
:root {
  --ol-color-1: #e8780a !important;
  --ol-color-2: #fffaf3 !important;
  --ol-color-3: #f3a44e !important;
  --ol-color-4: #cf6f08 !important;
  --ol-color-5: #34302b !important;
  --ol-bg: #fffaf3 !important;
  --ol-gradient: #fdeede !important;
  --ol-gradient2: #fde3c6 !important;
  --ol-primary: #2f2a24 !important;
  --ol-accent: #e8780a !important;
  --ol-violet: #cf6f08 !important;
  --ol-indigo: #f3a44e !important;
  --ol-surface: #ffffff !important;
  --ol-surface2: #fbeeda !important;
  --ol-border: #f1e3cd !important;
  --ol-white: #ffffff !important;
  --ol-text: #3c3833 !important;
  --ol-muted: #6f665b !important;
  --ol-link: #cf6f08 !important;
}
body.ol-page {
  background-color: #fffaf3 !important;
  color: #3c3833 !important;
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
  color: #2f2a24 !important;
}
body.ol-page p,
body.ol-page li,
body.ol-page .ol-hero-intro,
body.ol-page .ol-muted-text {
  color: #3c3833 !important;
}
body.ol-page .ol-cta h2 { color: #ffffff !important; }
body.ol-page .ol-cta p  { color: rgba(255,255,255,0.92) !important; }
CSS;
}

/* ── Scroll-reveal: lift & fade-in sections as they enter view ───
   Progressive enhancement — the .ol-reveal hiding class is added by JS,
   so with JS off (or before the script runs) all content stays visible. */
add_action( 'wp_footer', 'ol_pages_reveal_script', 20 );

function ol_pages_reveal_script() {
	if ( ! ol_is_plugin_page() ) {
		return;
	}
	?>
<script>
(function () {
  if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  var sel = [
    '.ol-section-heading', '.ol-card', '.ol-value-card', '.ol-team-card',
    '.ol-two-col-content', '.ol-feature-list > li', '.ol-step', '.ol-stat-item',
    '.ol-cta', '.ol-banner', '.ol-policy-section', '.ol-contact-panel',
    '.ol-form-panel', '.ol-hero-intro', '.ol-hero .ol-btn-group'
  ].map(function (s) { return 'body.ol-page ' + s; }).join(',');

  var els = document.querySelectorAll(sel);
  if (!els.length) return;

  if (!('IntersectionObserver' in window)) return; // leave content visible

  els.forEach(function (el) { el.classList.add('ol-reveal'); });

  /* stagger siblings inside grids/rows for an elegant cascade */
  document.querySelectorAll(
    'body.ol-page .ol-grid, body.ol-page .ol-grid-2, body.ol-page .ol-team-grid, ' +
    'body.ol-page .ol-process, body.ol-page .ol-feature-list, body.ol-page .ol-stats-inner'
  ).forEach(function (group) {
    Array.prototype.slice.call(group.children).forEach(function (child, i) {
      if (child.classList && child.classList.contains('ol-reveal')) {
        child.style.transitionDelay = ((i % 4) * 90) + 'ms';
      }
    });
  });

  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) {
      if (en.isIntersecting) { en.target.classList.add('ol-in'); io.unobserve(en.target); }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -7% 0px' });

  els.forEach(function (el) { io.observe(el); });
})();
</script>
	<?php
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
