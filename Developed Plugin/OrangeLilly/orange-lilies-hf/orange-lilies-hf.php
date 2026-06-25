<?php
/**
 * Plugin Name: Orange Lilies Header & Footer
 * Plugin URI:  https://orangelilies.com/
 * Description: Auto-injects a branded header and footer site-wide. Configure logo, contact details and all header/footer links under Appearance → Orange Lilies Header & Footer. Shortcodes [ol_header] and [ol_footer] also available for manual placement.
 * Version:     1.1.3
 * Author:      Orange Lilies
 * Author URI:  https://orangelilies.com/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: orange-lilies-hf
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'OL_HF_DIR',     plugin_dir_path( __FILE__ ) );
define( 'OL_HF_URL',     plugin_dir_url( __FILE__ ) );
define( 'OL_HF_VERSION', '1.1.3' );
define( 'OL_HF_CSS_FILE', OL_HF_DIR . 'assets/css/ol-hf.css' );
define( 'OL_HF_ASSET_VERSION', OL_HF_VERSION . '-' . ( file_exists( OL_HF_CSS_FILE ) ? filemtime( OL_HF_CSS_FILE ) : OL_HF_VERSION ) );
define( 'OL_HF_LOGO_URL', 'https://orangelilies.com/wp-content/uploads/2026/06/logo-1.png' );

/* ── Default brand & contact details (all overridable in settings) ─ */
define( 'OL_HF_DEF_TAGLINE',   'Confidence of Freshness' );
define( 'OL_HF_DEF_DESC',      'Women-led period care from The Kutumb Group — comfort, hygiene and freedom, designed to empower women every day.' );
define( 'OL_HF_DEF_WHATSAPP',  '918368615088' );
define( 'OL_HF_DEF_EMAIL',     'info@orangelilies.com' );
define( 'OL_HF_DEF_ADDRESS',   'E 44, Okhla Phase 2, New Delhi 110020, India' );
define( 'OL_HF_DEF_INSTAGRAM', 'https://www.instagram.com/orangelilies.in' );
define( 'OL_HF_DEF_FACEBOOK',  'https://www.facebook.com/Orangelilies/' );
define( 'OL_HF_DEF_TWITTER',   'https://x.com/orangelilies_' );
define( 'OL_HF_DEF_YOUTUBE',   'https://www.youtube.com/@orangelilies' );
define( 'OL_HF_DEF_LINKTREE',  'https://linktr.ee/orangelilies_' );

/* Flag: prevents double-injection when both wp_body_open and wp_footer fire */
global $ol_hdr_injected;
$ol_hdr_injected = false;

/* ── Activation: default options ─────────────────────────────── */
register_activation_hook( __FILE__, 'ol_hf_activate' );

function ol_hf_activate() {
	if ( get_option( 'ol_hf_enable_header' ) === false ) {
		update_option( 'ol_hf_enable_header', '1' );
	}
	if ( get_option( 'ol_hf_enable_footer' ) === false ) {
		update_option( 'ol_hf_enable_footer', '1' );
	}
}

/* ── Enqueue assets on every front-end page ───────────────────── */
add_action( 'wp_enqueue_scripts', 'ol_hf_enqueue_assets' );

function ol_hf_enqueue_assets() {
	wp_enqueue_style(
		'ol-font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
		[],
		'6.5.2'
	);
	wp_enqueue_style(
		'ol-hf-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Manrope:wght@300;400;500;600;700&display=swap',
		[],
		null
	);
	wp_enqueue_style(
		'ol-hf',
		OL_HF_URL . 'assets/css/ol-hf.css',
		[ 'ol-font-awesome', 'ol-hf-google-fonts' ],
		OL_HF_ASSET_VERSION
	);
	wp_add_inline_style( 'ol-hf', ol_hf_palette_override_css() );
}

/* Re-declare the palette with !important so the header/footer always
   render in the brand colours regardless of the active theme. */
function ol_hf_palette_override_css() {
	return <<<'CSS'
:root {
  --ol-color-1: #e8780a !important;
  --ol-color-2: #fffaf3 !important;
  --ol-color-3: #f3a44e !important;
  --ol-color-4: #cf6f08 !important;
  --ol-color-5: #34302b !important;
  --ol-bg: #fffaf3 !important;
  --ol-primary: #2f2a24 !important;
  --ol-accent: #e8780a !important;
  --ol-violet: #cf6f08 !important;
  --ol-indigo: #f3a44e !important;
  --ol-surface: #ffffff !important;
  --ol-surface2: #fbeeda !important;
  --ol-border: #f1e3cd !important;
  --ol-hdr-grad-a: #f0982a !important;
  --ol-hdr-grad-b: #e8780a !important;
  --ol-white: #ffffff !important;
  --ol-text: #3c3833 !important;
  --ol-muted: #6f665b !important;
  --ol-wa-green: #25d366 !important;
}
CSS;
}

/* ── Body class: adds padding-top offset for fixed header ─────── */
add_filter( 'body_class', 'ol_hf_body_class' );

function ol_hf_body_class( $classes ) {
	if ( ! is_admin() && get_option( 'ol_hf_enable_header', '1' ) === '1' ) {
		$classes[] = 'ol-header-active';
	}
	return $classes;
}

/* ══════════════════════════════════════════════════════════════
   AUTO-INJECT — no output buffering, no regex, no blank pages

   Method 1 (preferred): wp_body_open fires right after <body> in
   any theme that calls wp_body_open() — all modern themes.

   Method 2 (fallback):  wp_footer fires before </body> in ALL
   themes. Header is position:fixed so it always appears at top
   regardless of where in the DOM it is inserted.
══════════════════════════════════════════════════════════════ */

/* Method 1: wp_body_open — modern themes (WordPress 5.2+) */
add_action( 'wp_body_open', 'ol_hf_inject_header_body_open', 1 );

function ol_hf_inject_header_body_open() {
	global $ol_hdr_injected;
	if ( $ol_hdr_injected || is_admin() ) {
		return;
	}
	if ( get_option( 'ol_hf_enable_header', '1' ) !== '1' ) {
		return;
	}
	$ol_hdr_injected = true;
	echo ol_render_header(); // phpcs:ignore WordPress.Security.EscapeOutput
}

/* Method 2: wp_footer fallback — themes that don't call wp_body_open */
add_action( 'wp_footer', 'ol_hf_inject_header_footer_fallback', 1 );

function ol_hf_inject_header_footer_fallback() {
	global $ol_hdr_injected;
	if ( $ol_hdr_injected || is_admin() ) {
		return;
	}
	if ( get_option( 'ol_hf_enable_header', '1' ) !== '1' ) {
		return;
	}
	$ol_hdr_injected = true;
	echo ol_render_header(); // phpcs:ignore WordPress.Security.EscapeOutput
}

/* Footer injection — wp_footer priority 5 (after header fallback at 1) */
add_action( 'wp_footer', 'ol_hf_inject_footer', 5 );

function ol_hf_inject_footer() {
	if ( is_admin() ) {
		return;
	}
	if ( get_option( 'ol_hf_enable_footer', '1' ) !== '1' ) {
		return;
	}
	echo ol_render_footer(); // phpcs:ignore WordPress.Security.EscapeOutput
}

/* ── Shortcodes (manual placement option) ────────────────────── */
add_shortcode( 'ol_header', 'ol_render_header' );
add_shortcode( 'ol_footer', 'ol_render_footer' );

/* ══════════════════════════════════════════════════════════════
   SETTINGS PAGE — Appearance → Orange Lilies Header & Footer
══════════════════════════════════════════════════════════════ */

add_action( 'admin_menu', 'ol_hf_add_settings_page' );

function ol_hf_add_settings_page() {
	add_theme_page(
		'Orange Lilies Header &amp; Footer Settings',
		'Orange Lilies H&amp;F',
		'manage_options',
		'ol-hf-settings',
		'ol_hf_render_settings_page'
	);
}

/* ── Custom form save handler (fires before any HTML output) ─── */
add_action( 'admin_post_ol_hf_save', 'ol_hf_handle_save' );

function ol_hf_handle_save() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Unauthorized' );
	}
	check_admin_referer( 'ol_hf_save_nonce' );

	/* Unchecked checkboxes are absent from POST — use isset() explicitly */
	$header = ( isset( $_POST['ol_hf_enable_header'] ) && $_POST['ol_hf_enable_header'] === '1' ) ? '1' : '0';
	$footer = ( isset( $_POST['ol_hf_enable_footer'] ) && $_POST['ol_hf_enable_footer'] === '1' ) ? '1' : '0';

	update_option( 'ol_hf_enable_header', $header );
	update_option( 'ol_hf_enable_footer', $footer );

	/* ── Branding ────────────────────────────────────────────── */
	update_option( 'ol_hf_logo_url', isset( $_POST['ol_hf_logo_url'] )
		? esc_url_raw( trim( wp_unslash( $_POST['ol_hf_logo_url'] ) ) ) : '' );

	update_option( 'ol_hf_tagline', isset( $_POST['ol_hf_tagline'] )
		? sanitize_text_field( wp_unslash( $_POST['ol_hf_tagline'] ) ) : '' );

	update_option( 'ol_hf_desc', isset( $_POST['ol_hf_desc'] )
		? sanitize_textarea_field( wp_unslash( $_POST['ol_hf_desc'] ) ) : '' );

	/* ── Contact ─────────────────────────────────────────────── */
	update_option( 'ol_hf_whatsapp', isset( $_POST['ol_hf_whatsapp'] )
		? preg_replace( '/[^0-9]/', '', wp_unslash( $_POST['ol_hf_whatsapp'] ) ) : '' );

	update_option( 'ol_hf_email', isset( $_POST['ol_hf_email'] )
		? sanitize_email( wp_unslash( $_POST['ol_hf_email'] ) ) : '' );

	update_option( 'ol_hf_address', isset( $_POST['ol_hf_address'] )
		? sanitize_text_field( wp_unslash( $_POST['ol_hf_address'] ) ) : '' );

	/* ── Social links ────────────────────────────────────────── */
	foreach ( [ 'instagram', 'facebook', 'twitter', 'youtube', 'linktree' ] as $key ) {
		update_option( 'ol_hf_' . $key, isset( $_POST[ 'ol_hf_' . $key ] )
			? esc_url_raw( trim( wp_unslash( $_POST[ 'ol_hf_' . $key ] ) ) ) : '' );
	}

	/* ── Header nav + footer quick links (label + URL rows) ──── */
	update_option( 'ol_hf_nav_links',   ol_hf_collect_link_rows( 'ol_hf_nav' ) );
	update_option( 'ol_hf_quick_links', ol_hf_collect_link_rows( 'ol_hf_quick' ) );

	ol_hf_purge_cache();

	wp_safe_redirect( add_query_arg(
		[ 'page' => 'ol-hf-settings', 'ol_saved' => '1' ],
		admin_url( 'themes.php' )
	) );
	exit;
}

/* Collect repeatable label+URL rows from POST (empty rows dropped).
   Only called from ol_hf_handle_save(), after the nonce check. */
function ol_hf_collect_link_rows( $prefix ) {
	$labels = isset( $_POST[ $prefix . '_label' ] ) ? (array) $_POST[ $prefix . '_label' ] : [];
	$urls   = isset( $_POST[ $prefix . '_url' ] )   ? (array) $_POST[ $prefix . '_url' ]   : [];
	$rows   = [];
	foreach ( $labels as $i => $label ) {
		$label = sanitize_text_field( wp_unslash( $label ) );
		$url   = isset( $urls[ $i ] ) ? esc_url_raw( trim( wp_unslash( $urls[ $i ] ) ) ) : '';
		if ( $label !== '' && $url !== '' ) {
			$rows[] = [ 'label' => $label, 'url' => $url ];
		}
	}
	return $rows;
}

/* ── Cache purge: clears server & plugin caches after save ────── */
function ol_hf_purge_cache() {
	wp_cache_flush();

	/* LiteSpeed Cache */
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

function ol_hf_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$just_saved = isset( $_GET['ol_saved'] ) && $_GET['ol_saved'] === '1';

	/* Always read fresh from DB — no object-cache confusion */
	wp_cache_delete( 'ol_hf_enable_header', 'options' );
	wp_cache_delete( 'ol_hf_enable_footer', 'options' );

	$header_on = get_option( 'ol_hf_enable_header', '1' ) === '1';
	$footer_on = get_option( 'ol_hf_enable_footer', '1' ) === '1';
	?>
	<style>
		.ol-admin-wrap { max-width: 720px; margin: 32px 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
		.ol-admin-card { background: #ffffff; border: 1px solid #f1e3cd; border-radius: 10px; padding: 28px 32px; margin-bottom: 20px; box-shadow: 0 1px 4px rgba(120,60,0,.06); }
		.ol-admin-card h2 { margin: 0 0 6px; font-size: 1.05rem; color: #2f2a24; display: flex; align-items: center; gap: 8px; }
		.ol-admin-card .ol-card-desc { color: #6f665b; font-size: 0.85rem; margin: 0 0 22px; line-height: 1.6; }
		.ol-toggle-row { display: flex; align-items: center; justify-content: space-between; padding: 18px 0; border-top: 1px solid #f1e3cd; gap: 24px; }
		.ol-toggle-info { flex: 1; }
		.ol-toggle-info strong { font-size: 0.95rem; color: #2f2a24; display: flex; align-items: center; gap: 8px; }
		.ol-toggle-info p { margin: 4px 0 0; font-size: 0.82rem; color: #6f665b; }
		.ol-switch { position: relative; display: inline-block; width: 52px; height: 28px; flex-shrink: 0; }
		.ol-switch input { opacity: 0; width: 0; height: 0; }
		.ol-switch-track { position: absolute; inset: 0; background: #ecd9bd; border-radius: 28px; cursor: pointer; transition: background .25s; }
		.ol-switch-track::before { content: ''; position: absolute; height: 22px; width: 22px; left: 3px; bottom: 3px; background: #ffffff; border-radius: 50%; transition: transform .25s; box-shadow: 0 1px 4px rgba(120,60,0,.2); }
		.ol-switch input:checked + .ol-switch-track { background: #e8780a; }
		.ol-switch input:checked + .ol-switch-track::before { transform: translateX(24px); }
		.ol-badge { display: inline-block; font-size: 0.68rem; font-weight: 700; letter-spacing: .04em; padding: 2px 8px; border-radius: 100px; }
		.ol-badge-on  { background: #fff1e2; color: #c45f00; }
		.ol-badge-off { background: #f4ece0; color: #6f665b; }
		.ol-admin-header { display: flex; align-items: center; gap: 16px; margin-bottom: 24px; padding: 20px 24px; background: linear-gradient(135deg,#fbeeda,#fff3e6); border: 1px solid #f1e3cd; border-radius: 10px; }
		.ol-admin-header img { height: 46px; width: auto; }
		.ol-admin-header h1 { font-size: 1.15rem; font-weight: 700; color: #cf6f08; margin: 0; font-family: Georgia, serif; }
		.ol-admin-header p  { font-size: 0.8rem; color: #6f665b; margin: 2px 0 0; }
		.ol-sc-box { display: inline-block; background: #fbeeda; border: 1px solid #f1e3cd; border-radius: 4px; font-family: 'Courier New', monospace; font-size: 0.88rem; color: #2f2a24; padding: 6px 12px; margin: 4px 0 12px; }
		.ol-submit-row { margin-top: 6px; }
		.ol-field-label { display: block; font-size: 0.85rem; font-weight: 600; color: #2f2a24; margin: 16px 0 6px; }
		.ol-field-label:first-of-type { margin-top: 0; }
		.ol-field-note { font-weight: 400; color: #6f665b; font-size: 0.78rem; }
		.ol-text-input { width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #e7d5ba; border-radius: 6px; font-size: 0.9rem; color: #2f2a24; transition: border-color .2s, box-shadow .2s; }
		.ol-text-input:focus { outline: none; border-color: #e8780a; box-shadow: 0 0 0 3px rgba(232,120,10,.18); }
		textarea.ol-text-input { min-height: 70px; resize: vertical; }
		.ol-field-hint { font-size: 0.8rem; color: #6f665b; margin: 8px 0 0; }
		.ol-logo-preview { display: flex; align-items: center; gap: 12px; margin-top: 14px; padding: 12px 16px; background: #fbeeda; border-radius: 6px; }
		.ol-logo-preview span { font-size: 0.78rem; color: #6f665b; }
		.ol-logo-preview img { max-height: 44px; max-width: 220px; width: auto; height: auto; }
		.ol-link-row { display: grid; grid-template-columns: 1fr 1.4fr; gap: 10px; margin-bottom: 10px; }
		.ol-link-row .ol-text-input { margin: 0; }
		.ol-link-head { display: grid; grid-template-columns: 1fr 1.4fr; gap: 10px; margin-bottom: 6px; font-size: 0.74rem; font-weight: 700; letter-spacing: .04em; text-transform: uppercase; color: #6f665b; }
		.ol-grid-2col { display: grid; grid-template-columns: 1fr 1fr; gap: 12px 18px; }
		@media (max-width:600px){ .ol-grid-2col { grid-template-columns: 1fr; } }
	</style>

	<div class="wrap ol-admin-wrap">

		<div class="ol-admin-header">
			<img src="<?php echo esc_url( ol_hf_get_logo() ); ?>" alt="Orange Lilies">
			<div>
				<h1>Orange Lilies Header &amp; Footer</h1>
				<p>Confidence of Freshness &mdash; v<?php echo esc_html( OL_HF_VERSION ); ?></p>
			</div>
		</div>

		<?php if ( $just_saved ) : ?>
		<div class="notice notice-success is-dismissible" style="border-left-color:#e8780a;">
			<p><strong>&#10003; Settings saved.</strong> Cache cleared automatically. If you still see the old state, hard-refresh your browser (<kbd>Ctrl+Shift+R</kbd> / <kbd>Cmd+Shift+R</kbd>) and clear any server-side cache.</p>
		</div>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="ol_hf_save">
			<?php wp_nonce_field( 'ol_hf_save_nonce' ); ?>

			<div class="ol-admin-card">
				<h2>&#9881; Auto-Inject Settings</h2>
				<p class="ol-card-desc">Toggle header and footer independently. Changes take effect immediately after saving — no theme file editing required.</p>

				<div class="ol-toggle-row">
					<div class="ol-toggle-info">
						<strong>
							Header
							<span class="ol-badge <?php echo $header_on ? 'ol-badge-on' : 'ol-badge-off'; ?>">
								<?php echo $header_on ? 'ON' : 'OFF'; ?>
							</span>
						</strong>
						<p>Injects the branded navigation bar at the top of every page.</p>
					</div>
					<label class="ol-switch" title="Toggle Header">
						<input type="checkbox" name="ol_hf_enable_header" value="1" <?php checked( $header_on ); ?>>
						<span class="ol-switch-track"></span>
					</label>
				</div>

				<div class="ol-toggle-row">
					<div class="ol-toggle-info">
						<strong>
							Footer
							<span class="ol-badge <?php echo $footer_on ? 'ol-badge-on' : 'ol-badge-off'; ?>">
								<?php echo $footer_on ? 'ON' : 'OFF'; ?>
							</span>
						</strong>
						<p>Injects the 4-column footer and WhatsApp floating button on every page.</p>
					</div>
					<label class="ol-switch" title="Toggle Footer">
						<input type="checkbox" name="ol_hf_enable_footer" value="1" <?php checked( $footer_on ); ?>>
						<span class="ol-switch-track"></span>
					</label>
				</div>
			</div>

			<?php
			$logo_val      = esc_attr( get_option( 'ol_hf_logo_url', '' ) );
			$tagline_val   = esc_attr( get_option( 'ol_hf_tagline', '' ) );
			$desc_val      = esc_textarea( get_option( 'ol_hf_desc', '' ) );
			$whatsapp_val  = esc_attr( get_option( 'ol_hf_whatsapp', '' ) );
			$email_val     = esc_attr( get_option( 'ol_hf_email', '' ) );
			$address_val   = esc_attr( get_option( 'ol_hf_address', '' ) );
			$instagram_val = esc_attr( get_option( 'ol_hf_instagram', '' ) );
			$facebook_val  = esc_attr( get_option( 'ol_hf_facebook', '' ) );
			$twitter_val   = esc_attr( get_option( 'ol_hf_twitter', '' ) );
			$youtube_val   = esc_attr( get_option( 'ol_hf_youtube', '' ) );
			$linktree_val  = esc_attr( get_option( 'ol_hf_linktree', '' ) );
			?>

			<div class="ol-admin-card">
				<h2>&#127912; Branding</h2>
				<p class="ol-card-desc">The logo shows in the header and the footer. Tagline and description appear in the footer brand column. Leave a field blank to use the bundled default.</p>

				<label class="ol-field-label">Logo image URL</label>
				<input type="url" name="ol_hf_logo_url" class="ol-text-input" value="<?php echo $logo_val; ?>" placeholder="<?php echo esc_attr( OL_HF_LOGO_URL ); ?>">
				<div class="ol-logo-preview">
					<span>Preview:</span>
					<img src="<?php echo esc_url( ol_hf_get_logo() ); ?>" alt="Logo preview">
				</div>
				<p class="ol-field-hint">Tip: upload your logo under <strong>Media → Add New</strong>, then copy its file URL here. Changing it here also updates the logo on the plugin content pages.</p>

				<label class="ol-field-label">Footer tagline</label>
				<input type="text" name="ol_hf_tagline" class="ol-text-input" value="<?php echo $tagline_val; ?>" placeholder="<?php echo esc_attr( OL_HF_DEF_TAGLINE ); ?>">

				<label class="ol-field-label">Footer description</label>
				<textarea name="ol_hf_desc" class="ol-text-input" placeholder="<?php echo esc_attr( OL_HF_DEF_DESC ); ?>"><?php echo $desc_val; ?></textarea>
			</div>

			<div class="ol-admin-card">
				<h2>&#9742; Contact Details</h2>
				<p class="ol-card-desc">Used across the header, footer contact column, and the floating WhatsApp button. Leave a field blank to keep the default.</p>

				<label class="ol-field-label">WhatsApp / phone number <span class="ol-field-note">(digits only, incl. country code — e.g. 918368615088)</span></label>
				<input type="text" name="ol_hf_whatsapp" class="ol-text-input" value="<?php echo $whatsapp_val; ?>" placeholder="<?php echo esc_attr( OL_HF_DEF_WHATSAPP ); ?>">

				<div class="ol-grid-2col" style="margin-top:6px;">
					<div>
						<label class="ol-field-label">Email address</label>
						<input type="email" name="ol_hf_email" class="ol-text-input" value="<?php echo $email_val; ?>" placeholder="<?php echo esc_attr( OL_HF_DEF_EMAIL ); ?>">
					</div>
					<div>
						<label class="ol-field-label">Address</label>
						<input type="text" name="ol_hf_address" class="ol-text-input" value="<?php echo $address_val; ?>" placeholder="<?php echo esc_attr( OL_HF_DEF_ADDRESS ); ?>">
					</div>
				</div>
			</div>

			<div class="ol-admin-card">
				<h2>&#128279; Social Links</h2>
				<p class="ol-card-desc">Each social icon appears in the header / footer only when its URL is filled in. Clear a field to hide that icon.</p>
				<div class="ol-grid-2col">
					<div>
						<label class="ol-field-label">Instagram URL</label>
						<input type="url" name="ol_hf_instagram" class="ol-text-input" value="<?php echo $instagram_val; ?>" placeholder="<?php echo esc_attr( OL_HF_DEF_INSTAGRAM ); ?>">
					</div>
					<div>
						<label class="ol-field-label">Facebook URL</label>
						<input type="url" name="ol_hf_facebook" class="ol-text-input" value="<?php echo $facebook_val; ?>" placeholder="<?php echo esc_attr( OL_HF_DEF_FACEBOOK ); ?>">
					</div>
					<div>
						<label class="ol-field-label">X (Twitter) URL</label>
						<input type="url" name="ol_hf_twitter" class="ol-text-input" value="<?php echo $twitter_val; ?>" placeholder="<?php echo esc_attr( OL_HF_DEF_TWITTER ); ?>">
					</div>
					<div>
						<label class="ol-field-label">YouTube URL</label>
						<input type="url" name="ol_hf_youtube" class="ol-text-input" value="<?php echo $youtube_val; ?>" placeholder="<?php echo esc_attr( OL_HF_DEF_YOUTUBE ); ?>">
					</div>
					<div>
						<label class="ol-field-label">Linktree URL</label>
						<input type="url" name="ol_hf_linktree" class="ol-text-input" value="<?php echo $linktree_val; ?>" placeholder="<?php echo esc_attr( OL_HF_DEF_LINKTREE ); ?>">
					</div>
				</div>
			</div>

			<?php
			ol_hf_render_link_rows_card(
				'Header Navigation Links',
				'&#129517;',
				'These links appear in the header menu (desktop and mobile). Leave a row blank to remove it. If you clear all rows, the default Home / About Us / Our Products / Sustainability / Contact links are used.',
				'ol_hf_nav',
				ol_hf_get_nav_links()
			);

			ol_hf_render_link_rows_card(
				'Footer Quick Links',
				'&#128279;',
				'The "Quick Links" column in the footer. Leave a row blank to remove it. Clearing all rows restores the defaults. (The Policies column auto-links to your policy pages.)',
				'ol_hf_quick',
				ol_hf_get_quick_links()
			);
			?>

			<div class="ol-submit-row" style="margin-bottom:24px;">
				<?php submit_button( 'Save All Settings', 'primary', 'submit', false ); ?>
			</div>

		</form>

		<div class="ol-admin-card">
			<h2>&#128279; Manual Shortcodes</h2>
			<p class="ol-card-desc">Use these for manual placement. If Auto-Inject is also ON, the header/footer will appear twice — use one method only.</p>
			<p><strong>Header:</strong></p>
			<div class="ol-sc-box">[ol_header]</div>
			<p><strong>Footer:</strong></p>
			<div class="ol-sc-box">[ol_footer]</div>
			<p style="font-size:0.82rem;color:#6f665b;">In PHP templates: <code>&lt;?php echo do_shortcode('[ol_header]'); ?&gt;</code></p>
		</div>

		<div class="ol-admin-card">
			<h2>&#8505; How Injection Works</h2>
			<ul style="color:#6f665b;font-size:0.85rem;line-height:1.8;padding-left:20px;">
				<li>Settings are saved via a secure custom handler — toggling OFF correctly disables injection.</li>
				<li>After saving, all common caches (LiteSpeed, WP Rocket, W3TC, WP Super Cache, Autoptimize) are cleared automatically.</li>
				<li>Header uses <code>wp_body_open</code> (modern themes) with <code>wp_footer</code> as automatic fallback for older themes. The header is <code>position: fixed</code> so it always appears at the top of the viewport.</li>
				<li>Footer uses <code>wp_footer</code> — supported by all properly coded WordPress themes.</li>
				<li>If you see the header/footer appearing twice, auto-inject is ON and a shortcode is also placed somewhere — remove the shortcode.</li>
				<li>After saving, hard-refresh your browser: <kbd>Ctrl+Shift+R</kbd> (Windows) / <kbd>Cmd+Shift+R</kbd> (Mac).</li>
			</ul>
		</div>

	</div>
	<?php
}

/* ── Render a card of repeatable label + URL link rows ───────── */
function ol_hf_render_link_rows_card( $title, $icon, $desc, $prefix, $rows ) {
	/* Always show a couple of spare blank rows so new links can be added */
	$display = array_values( (array) $rows );
	$spare   = max( 2, 7 - count( $display ) );
	for ( $i = 0; $i < $spare; $i++ ) {
		$display[] = [ 'label' => '', 'url' => '' ];
	}
	?>
	<div class="ol-admin-card">
		<h2><?php echo $icon; // safe static markup ?> <?php echo esc_html( $title ); ?></h2>
		<p class="ol-card-desc"><?php echo esc_html( $desc ); ?></p>

		<div class="ol-link-head">
			<span>Label</span>
			<span>URL</span>
		</div>

		<?php foreach ( $display as $row ) : ?>
		<div class="ol-link-row">
			<input type="text" name="<?php echo esc_attr( $prefix ); ?>_label[]" class="ol-text-input" value="<?php echo esc_attr( $row['label'] ); ?>" placeholder="e.g. Home">
			<input type="url"  name="<?php echo esc_attr( $prefix ); ?>_url[]"   class="ol-text-input" value="<?php echo esc_attr( $row['url'] ); ?>" placeholder="https://...">
		</div>
		<?php endforeach; ?>
	</div>
	<?php
}

/* ── Settings link on Plugins page ──────────────────────────── */
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'ol_hf_plugin_action_links' );

function ol_hf_plugin_action_links( $links ) {
	$url  = admin_url( 'themes.php?page=ol-hf-settings' );
	array_unshift( $links, '<a href="' . esc_url( $url ) . '">Settings</a>' );
	return $links;
}

/* ══════════════════════════════════════════════════════════════
   HELPERS
══════════════════════════════════════════════════════════════ */
function ol_hf_page_url( $slug ) {
	$page_ids = get_option( 'ol_page_ids', [] );
	if ( isset( $page_ids[ $slug ] ) ) {
		$url = get_permalink( $page_ids[ $slug ] );
		if ( $url ) return $url;
	}
	$page = get_page_by_path( $slug, OBJECT, 'page' );
	return $page ? get_permalink( $page->ID ) : home_url( '/' . $slug . '/' );
}

/* ── Branding & contact getters (option with fallback default) ── */
function ol_hf_get_logo() {
	$v = trim( (string) get_option( 'ol_hf_logo_url', '' ) );
	return $v !== '' ? $v : OL_HF_LOGO_URL;
}
function ol_hf_get_tagline() {
	$v = trim( (string) get_option( 'ol_hf_tagline', '' ) );
	return $v !== '' ? $v : OL_HF_DEF_TAGLINE;
}
function ol_hf_get_desc() {
	$v = trim( (string) get_option( 'ol_hf_desc', '' ) );
	return $v !== '' ? $v : OL_HF_DEF_DESC;
}
function ol_hf_get_whatsapp() {
	$v = trim( (string) get_option( 'ol_hf_whatsapp', '' ) );
	return $v !== '' ? $v : OL_HF_DEF_WHATSAPP;
}
function ol_hf_get_email() {
	$v = trim( (string) get_option( 'ol_hf_email', '' ) );
	return $v !== '' ? $v : OL_HF_DEF_EMAIL;
}
function ol_hf_get_address() {
	$v = trim( (string) get_option( 'ol_hf_address', '' ) );
	return $v !== '' ? $v : OL_HF_DEF_ADDRESS;
}
function ol_hf_get_social( $key, $default ) {
	$v = trim( (string) get_option( 'ol_hf_' . $key, '' ) );
	return $v !== '' ? $v : $default;
}

/* WhatsApp number formatted for display, e.g. "918368615088" → "+91 83686 15088" */
function ol_hf_whatsapp_display() {
	$d = preg_replace( '/[^0-9]/', '', ol_hf_get_whatsapp() );
	if ( strpos( $d, '91' ) === 0 && strlen( $d ) === 12 ) {
		return '+91 ' . substr( $d, 2, 5 ) . ' ' . substr( $d, 7 );
	}
	return '+' . $d;
}

/* Instagram @handle pulled from the configured profile URL */
function ol_hf_instagram_handle() {
	$url = ol_hf_get_social( 'instagram', OL_HF_DEF_INSTAGRAM );
	$seg = basename( untrailingslashit( wp_parse_url( $url, PHP_URL_PATH ) ?: '' ) );
	return $seg !== '' ? '@' . ltrim( $seg, '@' ) : 'Instagram';
}

/* Returns the configured socials as an icon-ready list (only filled-in ones) */
function ol_hf_get_socials() {
	$defs = [
		'instagram' => [ 'icon' => 'fab fa-instagram', 'label' => 'Instagram', 'def' => OL_HF_DEF_INSTAGRAM ],
		'facebook'  => [ 'icon' => 'fab fa-facebook-f', 'label' => 'Facebook',  'def' => OL_HF_DEF_FACEBOOK ],
		'twitter'   => [ 'icon' => 'fab fa-x-twitter',  'label' => 'X',         'def' => OL_HF_DEF_TWITTER ],
		'youtube'   => [ 'icon' => 'fab fa-youtube',    'label' => 'YouTube',   'def' => OL_HF_DEF_YOUTUBE ],
		'linktree'  => [ 'icon' => 'fas fa-link',       'label' => 'Linktree',  'def' => OL_HF_DEF_LINKTREE ],
	];
	$out = [];
	foreach ( $defs as $key => $d ) {
		$url = ol_hf_get_social( $key, $d['def'] );
		if ( $url !== '' ) {
			$out[] = [ 'url' => $url, 'icon' => $d['icon'], 'label' => $d['label'] ];
		}
	}
	return $out;
}

/* Header nav links — custom rows from settings, else page defaults */
function ol_hf_get_nav_links() {
	$opt = get_option( 'ol_hf_nav_links', [] );
	if ( ! empty( $opt ) && is_array( $opt ) ) {
		return $opt;
	}
	return [
		[ 'label' => 'Home',           'url' => home_url( '/' ) ],
		[ 'label' => 'About Us',       'url' => ol_hf_page_url( 'about-us' ) ],
		[ 'label' => 'Our Products',   'url' => ol_hf_page_url( 'services' ) ],
		[ 'label' => 'Sustainability', 'url' => ol_hf_page_url( 'sustainability' ) ],
		[ 'label' => 'Contact',        'url' => ol_hf_page_url( 'contact' ) ],
	];
}

/* Footer "Quick Links" — custom rows from settings, else page defaults */
function ol_hf_get_quick_links() {
	$opt = get_option( 'ol_hf_quick_links', [] );
	if ( ! empty( $opt ) && is_array( $opt ) ) {
		return $opt;
	}
	return [
		[ 'label' => 'Home',           'url' => home_url( '/' ) ],
		[ 'label' => 'About Us',       'url' => ol_hf_page_url( 'about-us' ) ],
		[ 'label' => 'Our Products',   'url' => ol_hf_page_url( 'services' ) ],
		[ 'label' => 'Sustainability', 'url' => ol_hf_page_url( 'sustainability' ) ],
		[ 'label' => 'Contact',        'url' => ol_hf_page_url( 'contact' ) ],
	];
}

/* ══════════════════════════════════════════════════════════════
   HEADER RENDER
══════════════════════════════════════════════════════════════ */
function ol_render_header() {
	$logo_src = esc_url( ol_hf_get_logo() );
	$home_url = esc_url( home_url( '/' ) );

	$wc_active = class_exists( 'WooCommerce' );
	/* "Shop Now" → WooCommerce shop if present, else the Our Products page,
	   else the site root. */
	if ( $wc_active && function_exists( 'wc_get_page_permalink' ) ) {
		$shop_url = wc_get_page_permalink( 'shop' );
	} else {
		$shop_url = ol_hf_page_url( 'services' );
	}
	$shop_url = esc_url( $shop_url ? $shop_url : home_url( '/' ) );

	$nav_links = ol_hf_get_nav_links();

	ob_start();
	?>
<header class="ol-hdr-bar" role="banner">
  <div class="ol-hdr-inner">

    <a href="<?php echo $home_url; ?>" class="ol-hdr-logo" aria-label="Orange Lilies – Home">
      <img src="<?php echo $logo_src; ?>" alt="Orange Lilies" height="46" width="auto">
    </a>

    <nav class="ol-hdr-nav" aria-label="Primary navigation">
      <?php foreach ( $nav_links as $link ) : ?>
      <a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a>
      <?php endforeach; ?>
    </nav>

    <a href="<?php echo $shop_url; ?>" class="ol-hdr-shop">Shop Now</a>

    <button class="ol-hdr-hamburger" aria-label="Toggle menu" aria-expanded="false" aria-controls="ol-mobile-nav">
      <span></span><span></span><span></span>
    </button>

  </div>

  <nav class="ol-hdr-mobile-nav" id="ol-mobile-nav" aria-label="Mobile navigation" aria-hidden="true">
    <?php foreach ( $nav_links as $link ) : ?>
    <a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a>
    <?php endforeach; ?>
    <a class="ol-mobile-shop" href="<?php echo $shop_url; ?>">Shop Now</a>
  </nav>

</header>

<script>
(function () {
  var ham = document.querySelector('.ol-hdr-hamburger');
  var nav = document.getElementById('ol-mobile-nav');

  function closeNav() {
    if (nav) { nav.classList.remove('ol-open'); nav.setAttribute('aria-hidden','true'); }
    if (ham) ham.setAttribute('aria-expanded','false');
  }

  if (ham && nav) {
    ham.addEventListener('click', function (e) {
      e.stopPropagation();
      var open = nav.classList.toggle('ol-open');
      ham.setAttribute('aria-expanded', open ? 'true' : 'false');
      nav.setAttribute('aria-hidden', open ? 'false' : 'true');
    });
  }

  document.addEventListener('click', function (e) {
    var hdr = document.querySelector('.ol-hdr-bar');
    if (hdr && !hdr.contains(e.target)) closeNav();
  });
})();
</script>
	<?php
	return ob_get_clean();
}

/* ══════════════════════════════════════════════════════════════
   FOOTER RENDER
══════════════════════════════════════════════════════════════ */
function ol_render_footer() {
	$logo_src     = esc_url( ol_hf_get_logo() );
	$current_year = gmdate( 'Y' );
	$site_name    = esc_html( get_bloginfo( 'name' ) );

	$tagline      = esc_html( ol_hf_get_tagline() );
	$desc         = esc_html( ol_hf_get_desc() );
	$wa_number    = ol_hf_get_whatsapp();
	$wa_url       = esc_url( 'https://wa.me/' . $wa_number );
	$wa_display   = esc_html( ol_hf_whatsapp_display() );
	$email        = ol_hf_get_email();
	$address      = esc_html( ol_hf_get_address() );
	$insta_url    = esc_url( ol_hf_get_social( 'instagram', OL_HF_DEF_INSTAGRAM ) );
	$insta_handle = esc_html( ol_hf_instagram_handle() );
	$socials      = ol_hf_get_socials();

	$quick_links = ol_hf_get_quick_links();

	$policy_links = [
		'Privacy Policy'          => ol_hf_page_url( 'privacy-policy' ),
		'Terms of Service'        => ol_hf_page_url( 'terms-of-service' ),
		'Terms &amp; Conditions'  => ol_hf_page_url( 'terms-and-conditions' ),
		'Refund &amp; Return'     => ol_hf_page_url( 'refund-policy' ),
		'Cancellation Policy'     => ol_hf_page_url( 'cancellation-policy' ),
		'Shipping &amp; Delivery' => ol_hf_page_url( 'shipping-policy' ),
	];

	ob_start();
	?>
<footer class="ol-ftr-wrap" role="contentinfo">
  <div class="ol-ftr-grid">

    <!-- Col 1 — Brand -->
    <div class="ol-ftr-brand">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Orange Lilies Home">
        <img src="<?php echo $logo_src; ?>" alt="Orange Lilies" class="ol-ftr-logo" width="155" height="auto">
      </a>
      <p class="ol-ftr-tagline"><?php echo $tagline; ?></p>
      <p class="ol-ftr-brand-desc"><?php echo $desc; ?></p>
      <?php if ( ! empty( $socials ) ) : ?>
      <div class="ol-ftr-socials">
        <?php foreach ( $socials as $s ) : ?>
        <a href="<?php echo esc_url( $s['url'] ); ?>" class="ol-ftr-social-link" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $s['label'] ); ?>">
          <i class="<?php echo esc_attr( $s['icon'] ); ?>" aria-hidden="true"></i>
        </a>
        <?php endforeach; ?>
        <a href="<?php echo $wa_url; ?>" class="ol-ftr-social-link" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
          <i class="fab fa-whatsapp" aria-hidden="true"></i>
        </a>
      </div>
      <?php endif; ?>
    </div>

    <!-- Col 2 — Quick Links -->
    <div class="ol-ftr-col">
      <h4>Quick Links</h4>
      <ul>
        <?php foreach ( $quick_links as $link ) : ?>
        <li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Col 3 — Policies -->
    <div class="ol-ftr-col">
      <h4>Our Policies</h4>
      <ul>
        <?php foreach ( $policy_links as $label => $url ) : ?>
        <li><a href="<?php echo esc_url( $url ); ?>"><?php echo $label; // already escaped above ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Col 4 — Contact -->
    <div class="ol-ftr-col">
      <h4>Contact Us</h4>
      <div class="ol-ftr-contact-item">
        <i class="fab fa-whatsapp" aria-hidden="true"></i>
        <a href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer"><?php echo $wa_display; ?></a>
      </div>
      <div class="ol-ftr-contact-item">
        <i class="fas fa-envelope" aria-hidden="true"></i>
        <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
      </div>
      <?php if ( $insta_url ) : ?>
      <div class="ol-ftr-contact-item">
        <i class="fab fa-instagram" aria-hidden="true"></i>
        <a href="<?php echo $insta_url; ?>" target="_blank" rel="noopener noreferrer"><?php echo $insta_handle; ?></a>
      </div>
      <?php endif; ?>
      <div class="ol-ftr-contact-item">
        <i class="fas fa-location-dot" aria-hidden="true"></i>
        <span><?php echo $address; ?></span>
      </div>
    </div>

  </div>

  <div class="ol-ftr-bottom">
    <span>&copy; <?php echo $current_year; ?> <?php echo $site_name; ?>. All rights reserved.</span>
    <span>&nbsp;&mdash;&nbsp;</span>
    <span>Developed by <a href="https://nextgenfusionl.in" target="_blank" rel="noopener">NextGen Fusion</a></span>
  </div>

</footer>

<!-- WhatsApp floating button -->
<a href="<?php echo $wa_url; ?>" class="ol-wa-btn" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
  <i class="fab fa-whatsapp" aria-hidden="true"></i>
</a>
	<?php
	return ob_get_clean();
}
