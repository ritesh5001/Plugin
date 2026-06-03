<?php
/**
 * Plugin Name: Bhola Welding Works Header & Footer
 * Description: Auto-injects branded header and footer site-wide. Configure under Appearance → BWW Header & Footer. Shortcodes [bww_header] and [bww_footer] also available for manual placement.
 * Version:     1.2.0
 * Author:      Bhola Welding Works
 * Author URI:  https://bholaweldingworks.in/
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'BWW_HF_DIR',     plugin_dir_path( __FILE__ ) );
define( 'BWW_HF_URL',     plugin_dir_url( __FILE__ ) );
define( 'BWW_HF_VERSION', '1.2.0' );

/* Flag: prevents double-injection when both wp_body_open and wp_footer fire */
global $bww_hdr_injected;
$bww_hdr_injected = false;

/* ── Activation: default options ─────────────────────────────── */
register_activation_hook( __FILE__, 'bww_hf_activate' );

function bww_hf_activate() {
	if ( get_option( 'bww_hf_enable_header' ) === false ) {
		update_option( 'bww_hf_enable_header', '1' );
	}
	if ( get_option( 'bww_hf_enable_footer' ) === false ) {
		update_option( 'bww_hf_enable_footer', '1' );
	}
}

/* ── Enqueue assets ───────────────────────────────────────────── */
add_action( 'wp_enqueue_scripts', 'bww_hf_enqueue_assets' );

function bww_hf_enqueue_assets() {
	wp_enqueue_style(
		'bww-font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
		[],
		'6.4.0'
	);
	wp_enqueue_style(
		'bww-hf-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Manrope:wght@300;400;500;600;700&display=swap',
		[],
		null
	);
	wp_enqueue_style(
		'bww-hf',
		BWW_HF_URL . 'assets/css/bww-hf.css',
		[ 'bww-font-awesome', 'bww-hf-google-fonts' ],
		BWW_HF_VERSION
	);
}

/* ── Body class: adds padding-top offset for fixed header ─────── */
add_filter( 'body_class', 'bww_hf_body_class' );

function bww_hf_body_class( $classes ) {
	if ( ! is_admin() && get_option( 'bww_hf_enable_header', '1' ) === '1' ) {
		$classes[] = 'bww-header-active';
	}
	return $classes;
}

/* ══════════════════════════════════════════════════════════════
   AUTO-INJECT — no output buffering, no regex, no blank pages

   Method 1 (preferred): wp_body_open fires right after <body>
   in any theme that calls wp_body_open() — all modern themes.

   Method 2 (fallback):  wp_footer fires before </body> in ALL
   themes. Header is position:fixed so it always appears at top
   regardless of where in the DOM it is inserted.
══════════════════════════════════════════════════════════════ */

/* Method 1: wp_body_open — modern themes (WordPress 5.2+) */
add_action( 'wp_body_open', 'bww_hf_inject_header_body_open', 1 );

function bww_hf_inject_header_body_open() {
	global $bww_hdr_injected;
	if ( $bww_hdr_injected || is_admin() ) {
		return;
	}
	if ( get_option( 'bww_hf_enable_header', '1' ) !== '1' ) {
		return;
	}
	$bww_hdr_injected = true;
	echo bww_render_header(); // phpcs:ignore WordPress.Security.EscapeOutput
}

/* Method 2: wp_footer fallback — themes that don't call wp_body_open */
add_action( 'wp_footer', 'bww_hf_inject_header_footer_fallback', 1 );

function bww_hf_inject_header_footer_fallback() {
	global $bww_hdr_injected;
	if ( $bww_hdr_injected || is_admin() ) {
		return;
	}
	if ( get_option( 'bww_hf_enable_header', '1' ) !== '1' ) {
		return;
	}
	$bww_hdr_injected = true;
	echo bww_render_header(); // phpcs:ignore WordPress.Security.EscapeOutput
}

/* Footer injection — wp_footer priority 5 (after header fallback at 1) */
add_action( 'wp_footer', 'bww_hf_inject_footer', 5 );

function bww_hf_inject_footer() {
	if ( is_admin() ) {
		return;
	}
	if ( get_option( 'bww_hf_enable_footer', '1' ) !== '1' ) {
		return;
	}
	echo bww_render_footer(); // phpcs:ignore WordPress.Security.EscapeOutput
}

/* ── Shortcodes (manual placement option) ────────────────────── */
add_shortcode( 'bww_header', 'bww_render_header' );
add_shortcode( 'bww_footer', 'bww_render_footer' );

/* ══════════════════════════════════════════════════════════════
   SETTINGS PAGE — Appearance → BWW Header & Footer
══════════════════════════════════════════════════════════════ */

add_action( 'admin_menu', 'bww_hf_add_settings_page' );

function bww_hf_add_settings_page() {
	add_theme_page(
		'BWW Header & Footer Settings',
		'BWW Header & Footer',
		'manage_options',
		'bww-hf-settings',
		'bww_hf_render_settings_page'
	);
}

/* ── Custom form save handler (fires before any HTML output) ─── */
add_action( 'admin_post_bww_hf_save', 'bww_hf_handle_save' );

function bww_hf_handle_save() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Unauthorized' );
	}
	check_admin_referer( 'bww_hf_save_nonce' );

	/* Unchecked checkboxes are absent from POST — use isset() explicitly */
	$header = ( isset( $_POST['bww_hf_enable_header'] ) && $_POST['bww_hf_enable_header'] === '1' ) ? '1' : '0';
	$footer = ( isset( $_POST['bww_hf_enable_footer'] ) && $_POST['bww_hf_enable_footer'] === '1' ) ? '1' : '0';

	update_option( 'bww_hf_enable_header', $header );
	update_option( 'bww_hf_enable_footer', $footer );

	bww_hf_purge_cache();

	wp_safe_redirect( add_query_arg(
		[ 'page' => 'bww-hf-settings', 'bww_saved' => '1' ],
		admin_url( 'themes.php' )
	) );
	exit;
}

/* ── Cache purge: clears server & plugin caches after save ────── */
function bww_hf_purge_cache() {
	wp_cache_flush();

	/* LiteSpeed Cache (common on Hostinger) */
	do_action( 'litespeed_purge_all' );

	/* WP Super Cache */
	if ( function_exists( 'wp_cache_clear_cache' ) ) {
		wp_cache_clear_cache();
	}
	/* W3 Total Cache */
	if ( function_exists( 'w3tc_flush_all' ) ) {
		w3tc_flush_all();
	}
	/* WP Rocket */
	if ( function_exists( 'rocket_clean_domain' ) ) {
		rocket_clean_domain();
	}
	/* Autoptimize */
	if ( class_exists( 'autoptimizeCache' ) ) {
		autoptimizeCache::clearall();
	}
}

function bww_hf_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	/* Show saved confirmation (set by handler redirect) */
	$just_saved = isset( $_GET['bww_saved'] ) && $_GET['bww_saved'] === '1';

	/* Always read fresh from DB — no object-cache confusion */
	wp_cache_delete( 'bww_hf_enable_header', 'options' );
	wp_cache_delete( 'bww_hf_enable_footer', 'options' );

	$header_on = get_option( 'bww_hf_enable_header', '1' ) === '1';
	$footer_on = get_option( 'bww_hf_enable_footer', '1' ) === '1';
	?>
	<style>
		.bww-admin-wrap { max-width: 680px; margin: 32px 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
		.bww-admin-card { background: #fff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 28px 32px; margin-bottom: 20px; box-shadow: 0 1px 4px rgba(0,0,0,.06); }
		.bww-admin-card h2 { margin: 0 0 6px; font-size: 1.05rem; color: #1a1a1a; display: flex; align-items: center; gap: 8px; }
		.bww-admin-card .bww-card-desc { color: #666; font-size: 0.85rem; margin: 0 0 22px; line-height: 1.6; }
		.bww-toggle-row { display: flex; align-items: center; justify-content: space-between; padding: 18px 0; border-top: 1px solid #f0f0f0; gap: 24px; }
		.bww-toggle-info { flex: 1; }
		.bww-toggle-info strong { font-size: 0.95rem; color: #1a1a1a; display: flex; align-items: center; gap: 8px; }
		.bww-toggle-info p { margin: 4px 0 0; font-size: 0.82rem; color: #777; }
		/* Toggle switch */
		.bww-switch { position: relative; display: inline-block; width: 52px; height: 28px; flex-shrink: 0; }
		.bww-switch input { opacity: 0; width: 0; height: 0; }
		.bww-switch-track { position: absolute; inset: 0; background: #ccc; border-radius: 28px; cursor: pointer; transition: background .25s; }
		.bww-switch-track::before { content: ''; position: absolute; height: 22px; width: 22px; left: 3px; bottom: 3px; background: #fff; border-radius: 50%; transition: transform .25s; box-shadow: 0 1px 4px rgba(0,0,0,.2); }
		.bww-switch input:checked + .bww-switch-track { background: #C9A84C; }
		.bww-switch input:checked + .bww-switch-track::before { transform: translateX(24px); }
		/* Status badge */
		.bww-badge { display: inline-block; font-size: 0.68rem; font-weight: 700; letter-spacing: .04em; padding: 2px 8px; border-radius: 100px; }
		.bww-badge-on  { background: #e6f4ea; color: #137333; }
		.bww-badge-off { background: #fce8e6; color: #c0392b; }
		/* Logo header */
		.bww-admin-header { display: flex; align-items: center; gap: 16px; margin-bottom: 24px; padding: 20px 24px; background: #0a0a0a; border-radius: 8px; }
		.bww-admin-header img { height: 44px; width: auto; }
		.bww-admin-header h1 { font-size: 1.15rem; font-weight: 700; color: #C9A84C; margin: 0; font-family: Georgia, serif; }
		.bww-admin-header p  { font-size: 0.8rem; color: #888; margin: 2px 0 0; }
		/* Shortcode box */
		.bww-sc-box { display: inline-block; background: #f4f4f4; border: 1px solid #ddd; border-radius: 4px; font-family: 'Courier New', monospace; font-size: 0.88rem; color: #333; padding: 6px 12px; margin: 4px 0 12px; }
		.bww-submit-row { margin-top: 6px; }
	</style>

	<div class="wrap bww-admin-wrap">

		<div class="bww-admin-header">
			<?php
			$logo_src = 'https://mintcream-crane-321031.hostingersite.com/wp-content/uploads/2026/05/Untitled-design-4.png';
			if ( $logo_src ) :
			?>
			<img src="<?php echo esc_url( $logo_src ); ?>" alt="Bhola Welding Works">
			<?php endif; ?>
			<div>
				<h1>BWW Header &amp; Footer</h1>
				<p>Bhola Welding Works &mdash; v<?php echo BWW_HF_VERSION; ?></p>
			</div>
		</div>

		<?php if ( $just_saved ) : ?>
		<div class="notice notice-success is-dismissible" style="border-left-color:#C9A84C;">
			<p><strong>&#10003; Settings saved.</strong> Cache cleared automatically. If you still see the old state, please hard-refresh your browser (<kbd>Ctrl+Shift+R</kbd> / <kbd>Cmd+Shift+R</kbd>) and clear any server-side cache (LiteSpeed / WP Rocket / W3TC).</p>
		</div>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="bww_hf_save">
			<?php wp_nonce_field( 'bww_hf_save_nonce' ); ?>

			<div class="bww-admin-card">
				<h2>&#9881; Auto-Inject Settings</h2>
				<p class="bww-card-desc">Toggle header and footer independently. Changes take effect immediately after saving — no theme file editing needed.</p>

				<div class="bww-toggle-row">
					<div class="bww-toggle-info">
						<strong>
							Header
							<span class="bww-badge <?php echo $header_on ? 'bww-badge-on' : 'bww-badge-off'; ?>">
								<?php echo $header_on ? 'ON' : 'OFF'; ?>
							</span>
						</strong>
						<p>Injects the branded navigation bar at the top of every page.</p>
					</div>
					<label class="bww-switch" title="Toggle Header">
						<input type="checkbox" name="bww_hf_enable_header" value="1" <?php checked( $header_on ); ?>>
						<span class="bww-switch-track"></span>
					</label>
				</div>

				<div class="bww-toggle-row">
					<div class="bww-toggle-info">
						<strong>
							Footer
							<span class="bww-badge <?php echo $footer_on ? 'bww-badge-on' : 'bww-badge-off'; ?>">
								<?php echo $footer_on ? 'ON' : 'OFF'; ?>
							</span>
						</strong>
						<p>Injects the 4-column footer and WhatsApp floating button on every page.</p>
					</div>
					<label class="bww-switch" title="Toggle Footer">
						<input type="checkbox" name="bww_hf_enable_footer" value="1" <?php checked( $footer_on ); ?>>
						<span class="bww-switch-track"></span>
					</label>
				</div>

				<div class="bww-submit-row">
					<?php submit_button( 'Save Settings', 'primary', 'submit', false ); ?>
				</div>
			</div>

		</form>

		<div class="bww-admin-card">
			<h2>&#128279; Manual Shortcodes</h2>
			<p class="bww-card-desc">Use these shortcodes for manual placement. If Auto-Inject is also ON, the header/footer will appear twice — use one method only.</p>
			<p><strong>Header:</strong></p>
			<div class="bww-sc-box">[bww_header]</div>
			<p><strong>Footer:</strong></p>
			<div class="bww-sc-box">[bww_footer]</div>
			<p style="font-size:0.82rem;color:#777;">In PHP templates: <code>&lt;?php echo do_shortcode('[bww_header]'); ?&gt;</code></p>
		</div>

		<div class="bww-admin-card">
			<h2>&#8505; How Injection Works</h2>
			<ul style="color:#555;font-size:0.85rem;line-height:1.8;padding-left:20px;">
				<li>Settings are saved via a secure custom handler — toggling OFF correctly disables injection.</li>
				<li>After saving, all common caches (LiteSpeed, WP Rocket, W3TC, WP Super Cache) are cleared automatically.</li>
				<li>Header uses <code>wp_body_open</code> (modern themes) with <code>wp_footer</code> as automatic fallback for older themes. The header is <code>position: fixed</code> so it always appears at the top.</li>
				<li>Footer uses <code>wp_footer</code> — supported by all properly coded WordPress themes.</li>
				<li>If you see the header/footer appearing twice, auto-inject is ON and a shortcode is also placed somewhere — remove the shortcode.</li>
				<li>After saving, hard-refresh your browser: <kbd>Ctrl+Shift+R</kbd> (Windows) / <kbd>Cmd+Shift+R</kbd> (Mac).</li>
			</ul>
		</div>

	</div>
	<?php
}

/* ── Settings link on Plugins page ──────────────────────────── */
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'bww_hf_plugin_action_links' );

function bww_hf_plugin_action_links( $links ) {
	$url  = admin_url( 'themes.php?page=bww-hf-settings' );
	array_unshift( $links, '<a href="' . esc_url( $url ) . '">Settings</a>' );
	return $links;
}

/* ══════════════════════════════════════════════════════════════
   HELPERS
══════════════════════════════════════════════════════════════ */
function bww_hf_logo_src() {
	return 'https://mintcream-crane-321031.hostingersite.com/wp-content/uploads/2026/05/Untitled-design-4.png';
}

function bww_hf_page_url( $slug ) {
	$page_ids = get_option( 'bww_page_ids', [] );
	if ( isset( $page_ids[ $slug ] ) ) {
		$url = get_permalink( $page_ids[ $slug ] );
		if ( $url ) return $url;
	}
	$page = get_page_by_path( $slug, OBJECT, 'page' );
	return $page ? get_permalink( $page->ID ) : home_url( '/' . $slug . '/' );
}

/* ══════════════════════════════════════════════════════════════
   HEADER RENDER
══════════════════════════════════════════════════════════════ */
function bww_render_header() {
	$logo_src = esc_url( bww_hf_logo_src() );
	$home_url = esc_url( home_url( '/' ) );

	$wc_active     = class_exists( 'WooCommerce' );
	$search_action = $wc_active ? esc_url( wc_get_page_permalink( 'shop' ) ) : esc_url( home_url( '/' ) );
	$cart_count    = $wc_active ? (int) WC()->cart->get_cart_contents_count() : 0;
	$account_url   = $wc_active ? esc_url( wc_get_page_permalink( 'myaccount' ) ) : esc_url( wp_login_url() );

	$nav_links = [
		'Home'     => esc_url( bww_hf_page_url( 'bww-home' ) ),
		'About Us' => esc_url( bww_hf_page_url( 'about-us' ) ),
		'Services' => esc_url( bww_hf_page_url( 'services' ) ),
		'Contact'  => esc_url( bww_hf_page_url( 'contact' ) ),
	];

	ob_start();
	?>
<header class="bww-hdr-bar" role="banner">
  <div class="bww-hdr-inner">

    <a href="<?php echo $home_url; ?>" class="bww-hdr-logo" aria-label="Bhola Welding Works – Home">
      <img src="<?php echo $logo_src; ?>" alt="Bhola Welding Works" height="44" width="auto">
    </a>

    <form class="bww-hdr-search" action="<?php echo $search_action; ?>" method="get" role="search" aria-label="Site search">
      <?php if ( $wc_active ) : ?>
        <input type="hidden" name="post_type" value="product">
      <?php endif; ?>
      <input type="search" name="s" placeholder="Search..." aria-label="Search" value="<?php echo esc_attr( get_search_query() ); ?>">
      <button type="submit" aria-label="Submit search">
        <i class="fas fa-search" aria-hidden="true"></i>
      </button>
    </form>

    <div class="bww-hdr-icons">

      <button class="bww-hdr-icon-btn bww-hdr-search-toggle" aria-label="Toggle search" aria-expanded="false" aria-controls="bww-mobile-search">
        <i class="fas fa-search" aria-hidden="true"></i>
      </button>

      <?php if ( $wc_active ) : ?>
      <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="bww-hdr-icon-btn" aria-label="Cart (<?php echo $cart_count; ?> items)">
        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
        <?php if ( $cart_count > 0 ) : ?>
        <span class="bww-hdr-cart-badge"><?php echo $cart_count; ?></span>
        <?php endif; ?>
      </a>
      <?php endif; ?>

      <a href="<?php echo $account_url; ?>" class="bww-hdr-icon-btn" aria-label="Account">
        <i class="fas fa-user" aria-hidden="true"></i>
      </a>

      <button class="bww-hdr-icon-btn bww-hdr-hamburger" aria-label="Toggle menu" aria-expanded="false" aria-controls="bww-mobile-nav">
        <i class="fas fa-bars" aria-hidden="true"></i>
      </button>

    </div>
  </div>

  <nav class="bww-hdr-mobile-nav" id="bww-mobile-nav" aria-label="Mobile navigation" aria-hidden="true">
    <?php foreach ( $nav_links as $label => $url ) : ?>
    <a href="<?php echo $url; ?>"><?php echo esc_html( $label ); ?></a>
    <?php endforeach; ?>
    <?php if ( $wc_active ) : ?>
    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Shop</a>
    <?php endif; ?>
  </nav>

  <div class="bww-hdr-mobile-search" id="bww-mobile-search" aria-hidden="true">
    <form action="<?php echo $search_action; ?>" method="get" role="search">
      <?php if ( $wc_active ) : ?>
        <input type="hidden" name="post_type" value="product">
      <?php endif; ?>
      <input type="search" name="s" placeholder="Search..." aria-label="Search" value="<?php echo esc_attr( get_search_query() ); ?>">
      <button type="submit" aria-label="Search"><i class="fas fa-search" aria-hidden="true"></i></button>
    </form>
  </div>

</header>

<script>
(function () {
  var ham   = document.querySelector('.bww-hdr-hamburger');
  var nav   = document.getElementById('bww-mobile-nav');
  var stog  = document.querySelector('.bww-hdr-search-toggle');
  var srch  = document.getElementById('bww-mobile-search');

  function closeAll() {
    if (nav)  { nav.classList.remove('bww-open');  nav.setAttribute('aria-hidden','true'); }
    if (srch) { srch.classList.remove('bww-open'); srch.setAttribute('aria-hidden','true'); }
    if (ham)  ham.setAttribute('aria-expanded','false');
    if (stog) stog.setAttribute('aria-expanded','false');
  }

  if (ham && nav) {
    ham.addEventListener('click', function () {
      var open = nav.classList.toggle('bww-open');
      ham.setAttribute('aria-expanded', open ? 'true' : 'false');
      nav.setAttribute('aria-hidden', open ? 'false' : 'true');
      if (open && srch) { srch.classList.remove('bww-open'); srch.setAttribute('aria-hidden','true'); }
    });
  }

  if (stog && srch) {
    stog.addEventListener('click', function () {
      var open = srch.classList.toggle('bww-open');
      stog.setAttribute('aria-expanded', open ? 'true' : 'false');
      srch.setAttribute('aria-hidden', open ? 'false' : 'true');
      if (open) {
        var inp = srch.querySelector('input[type="search"]');
        if (inp) inp.focus();
        if (nav) { nav.classList.remove('bww-open'); nav.setAttribute('aria-hidden','true'); }
      }
    });
  }

  document.addEventListener('click', function (e) {
    var hdr = document.querySelector('.bww-hdr-bar');
    if (hdr && !hdr.contains(e.target)) closeAll();
  });
})();
</script>
	<?php
	return ob_get_clean();
}

/* ══════════════════════════════════════════════════════════════
   FOOTER RENDER
══════════════════════════════════════════════════════════════ */
function bww_render_footer() {
	$logo_src     = esc_url( bww_hf_logo_src() );
	$current_year = date( 'Y' );
	$site_name    = esc_html( get_bloginfo( 'name' ) );

	$quick_links = [
		'Home'     => bww_hf_page_url( 'bww-home' ),
		'About Us' => bww_hf_page_url( 'about-us' ),
		'Services' => bww_hf_page_url( 'services' ),
		'Contact'  => bww_hf_page_url( 'contact' ),
	];

	$policy_links = [
		'Privacy Policy'      => bww_hf_page_url( 'privacy-policy' ),
		'Terms of Service'    => bww_hf_page_url( 'terms-of-service' ),
		'Terms &amp; Conditions' => bww_hf_page_url( 'terms-and-conditions' ),
		'Refund Policy'       => bww_hf_page_url( 'refund-policy' ),
		'Cancellation Policy' => bww_hf_page_url( 'cancellation-policy' ),
		'Shipping Policy'     => bww_hf_page_url( 'shipping-policy' ),
	];

	ob_start();
	?>
<footer class="bww-ftr-wrap" role="contentinfo">
  <div class="bww-ftr-grid">

    <div class="bww-ftr-brand">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Home">
        <img src="<?php echo $logo_src; ?>" alt="Bhola Welding Works" class="bww-ftr-logo" width="155" height="auto">
      </a>
      <p class="bww-ftr-tagline">Handcrafted Steel Trishuls</p>
      <p class="bww-ftr-brand-desc">Premium handmade steel trishuls crafted with precision in Chhindwara, Madhya Pradesh. Custom orders welcome. All India delivery available.</p>
      <div class="bww-ftr-socials">
        <a href="https://instagram.com/bhola_welding_works" class="bww-ftr-social-link" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
          <i class="fab fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="https://wa.me/918770706900" class="bww-ftr-social-link" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
          <i class="fab fa-whatsapp" aria-hidden="true"></i>
        </a>
      </div>
    </div>

    <div class="bww-ftr-col">
      <h4>Quick Links</h4>
      <ul>
        <?php foreach ( $quick_links as $label => $url ) : ?>
        <li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="bww-ftr-col">
      <h4>Policies</h4>
      <ul>
        <?php foreach ( $policy_links as $label => $url ) : ?>
        <li><a href="<?php echo esc_url( $url ); ?>"><?php echo $label; // already escaped above ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="bww-ftr-col">
      <h4>Contact Us</h4>
      <div class="bww-ftr-contact-item">
        <i class="fab fa-whatsapp" aria-hidden="true"></i>
        <a href="https://wa.me/918770706900" target="_blank" rel="noopener noreferrer">+91 8770706900</a>
      </div>
      <div class="bww-ftr-contact-item">
        <i class="fas fa-phone" aria-hidden="true"></i>
        <a href="tel:+918770706900">+91 8770706900</a>
      </div>
      <div class="bww-ftr-contact-item">
        <i class="fas fa-envelope" aria-hidden="true"></i>
        <a href="mailto:mukundvishwakarma427@gmail.com">mukundvishwakarma427@gmail.com</a>
      </div>
      <div class="bww-ftr-contact-item">
        <i class="fab fa-instagram" aria-hidden="true"></i>
        <a href="https://instagram.com/bhola_welding_works" target="_blank" rel="noopener noreferrer">@bhola_welding_works</a>
      </div>
      <div class="bww-ftr-contact-item">
        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
        <span>Chhindwara, Madhya Pradesh – 480557</span>
      </div>
      <div class="bww-ftr-contact-item">
        <i class="fas fa-truck" aria-hidden="true"></i>
        <span>All India Delivery Available</span>
      </div>
    </div>

  </div>

  <div class="bww-ftr-bottom">
    <span>&copy; <?php echo $current_year; ?> <?php echo $site_name; ?>. All rights reserved.</span>
    <span>&nbsp;&mdash;&nbsp;</span>
    <span>Developed by <a href="https://bholaweldingworks.in/" target="_blank" rel="noopener">Bhola Welding Works</a></span>
  </div>

</footer>

<a href="https://wa.me/918770706900" class="bww-wa-btn" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
  <i class="fab fa-whatsapp" aria-hidden="true"></i>
</a>
	<?php
	return ob_get_clean();
}
