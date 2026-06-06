<?php
/**
 * Plugin Name: Royal Vastar Header & Footer
 * Plugin URI:  https://royalvastar.com/
 * Description: Auto-injects branded header and footer site-wide. Configure under Appearance → Royal Vastar Header & Footer. Shortcodes [rv_header] and [rv_footer] also available for manual placement.
 * Version:     1.1.0
 * Author:      Royal Vastar
 * Author URI:  https://royalvastar.com/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: royal-vastar-hf
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'RV_HF_DIR',     plugin_dir_path( __FILE__ ) );
define( 'RV_HF_URL',     plugin_dir_url( __FILE__ ) );
define( 'RV_HF_VERSION', '1.1.0' );
define( 'RV_HF_LOGO_URL', 'https://limegreen-gaur-701943.hostingersite.com/wp-content/uploads/2026/05/Royal-Vaster-1.png' );

/* ── Default contact details (overridable in settings) ───────── */
define( 'RV_HF_DEF_WHATSAPP',  '447908369765' );
define( 'RV_HF_DEF_EMAIL',     'royalvastar@icloud.com' );
define( 'RV_HF_DEF_INSTAGRAM', 'https://www.instagram.com/royalvastar' );

/* Flag: prevents double-injection when both wp_body_open and wp_footer fire */
global $rv_hdr_injected;
$rv_hdr_injected = false;

/* ── Activation: default options ─────────────────────────────── */
register_activation_hook( __FILE__, 'rv_hf_activate' );

function rv_hf_activate() {
	if ( get_option( 'rv_hf_enable_header' ) === false ) {
		update_option( 'rv_hf_enable_header', '1' );
	}
	if ( get_option( 'rv_hf_enable_footer' ) === false ) {
		update_option( 'rv_hf_enable_footer', '1' );
	}
}

/* ── Enqueue assets on every front-end page ───────────────────── */
add_action( 'wp_enqueue_scripts', 'rv_hf_enqueue_assets' );

function rv_hf_enqueue_assets() {
	wp_enqueue_style(
		'rv-font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
		[],
		'6.4.0'
	);
	wp_enqueue_style(
		'rv-hf-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Manrope:wght@300;400;500;600;700&display=swap',
		[],
		null
	);
	wp_enqueue_style(
		'rv-hf',
		RV_HF_URL . 'assets/css/rv-hf.css',
		[ 'rv-font-awesome', 'rv-hf-google-fonts' ],
		RV_HF_VERSION
	);
}

/* ── Body class: adds padding-top offset for fixed header ─────── */
add_filter( 'body_class', 'rv_hf_body_class' );

function rv_hf_body_class( $classes ) {
	if ( ! is_admin() && get_option( 'rv_hf_enable_header', '1' ) === '1' ) {
		$classes[] = 'rv-header-active';
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
add_action( 'wp_body_open', 'rv_hf_inject_header_body_open', 1 );

function rv_hf_inject_header_body_open() {
	global $rv_hdr_injected;
	if ( $rv_hdr_injected || is_admin() ) {
		return;
	}
	if ( get_option( 'rv_hf_enable_header', '1' ) !== '1' ) {
		return;
	}
	$rv_hdr_injected = true;
	echo rv_render_header(); // phpcs:ignore WordPress.Security.EscapeOutput
}

/* Method 2: wp_footer fallback — themes that don't call wp_body_open */
add_action( 'wp_footer', 'rv_hf_inject_header_footer_fallback', 1 );

function rv_hf_inject_header_footer_fallback() {
	global $rv_hdr_injected;
	if ( $rv_hdr_injected || is_admin() ) {
		return;
	}
	if ( get_option( 'rv_hf_enable_header', '1' ) !== '1' ) {
		return;
	}
	$rv_hdr_injected = true;
	echo rv_render_header(); // phpcs:ignore WordPress.Security.EscapeOutput
}

/* Footer injection — wp_footer priority 5 (after header fallback at 1) */
add_action( 'wp_footer', 'rv_hf_inject_footer', 5 );

function rv_hf_inject_footer() {
	if ( is_admin() ) {
		return;
	}
	if ( get_option( 'rv_hf_enable_footer', '1' ) !== '1' ) {
		return;
	}
	echo rv_render_footer(); // phpcs:ignore WordPress.Security.EscapeOutput
}

/* ── Shortcodes (manual placement option) ────────────────────── */
add_shortcode( 'rv_header', 'rv_render_header' );
add_shortcode( 'rv_footer', 'rv_render_footer' );

/* ══════════════════════════════════════════════════════════════
   SETTINGS PAGE — Appearance → Royal Vastar Header & Footer
══════════════════════════════════════════════════════════════ */

add_action( 'admin_menu', 'rv_hf_add_settings_page' );

function rv_hf_add_settings_page() {
	add_theme_page(
		'Royal Vastar Header &amp; Footer Settings',
		'RV Header &amp; Footer',
		'manage_options',
		'rv-hf-settings',
		'rv_hf_render_settings_page'
	);
}

/* ── Custom form save handler (fires before any HTML output) ─── */
add_action( 'admin_post_rv_hf_save', 'rv_hf_handle_save' );

function rv_hf_handle_save() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Unauthorized' );
	}
	check_admin_referer( 'rv_hf_save_nonce' );

	/* Unchecked checkboxes are absent from POST — use isset() explicitly */
	$header = ( isset( $_POST['rv_hf_enable_header'] ) && $_POST['rv_hf_enable_header'] === '1' ) ? '1' : '0';
	$footer = ( isset( $_POST['rv_hf_enable_footer'] ) && $_POST['rv_hf_enable_footer'] === '1' ) ? '1' : '0';

	update_option( 'rv_hf_enable_header', $header );
	update_option( 'rv_hf_enable_footer', $footer );

	/* ── Branding & contact ──────────────────────────────────── */
	update_option( 'rv_hf_logo_url', isset( $_POST['rv_hf_logo_url'] )
		? esc_url_raw( trim( wp_unslash( $_POST['rv_hf_logo_url'] ) ) ) : '' );

	update_option( 'rv_hf_whatsapp', isset( $_POST['rv_hf_whatsapp'] )
		? preg_replace( '/[^0-9]/', '', wp_unslash( $_POST['rv_hf_whatsapp'] ) ) : '' );

	update_option( 'rv_hf_email', isset( $_POST['rv_hf_email'] )
		? sanitize_email( wp_unslash( $_POST['rv_hf_email'] ) ) : '' );

	update_option( 'rv_hf_instagram', isset( $_POST['rv_hf_instagram'] )
		? esc_url_raw( trim( wp_unslash( $_POST['rv_hf_instagram'] ) ) ) : '' );

	/* ── Header nav + footer quick links (label + URL rows) ──── */
	update_option( 'rv_hf_nav_links',   rv_hf_collect_link_rows( 'rv_hf_nav' ) );
	update_option( 'rv_hf_quick_links', rv_hf_collect_link_rows( 'rv_hf_quick' ) );

	rv_hf_purge_cache();

	wp_safe_redirect( add_query_arg(
		[ 'page' => 'rv-hf-settings', 'rv_saved' => '1' ],
		admin_url( 'themes.php' )
	) );
	exit;
}

/* Collect repeatable label+URL rows from POST (empty rows dropped).
   Only called from rv_hf_handle_save(), after the nonce check. */
function rv_hf_collect_link_rows( $prefix ) {
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
function rv_hf_purge_cache() {
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

function rv_hf_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$just_saved = isset( $_GET['rv_saved'] ) && $_GET['rv_saved'] === '1';

	/* Always read fresh from DB — no object-cache confusion */
	wp_cache_delete( 'rv_hf_enable_header', 'options' );
	wp_cache_delete( 'rv_hf_enable_footer', 'options' );

	$header_on = get_option( 'rv_hf_enable_header', '1' ) === '1';
	$footer_on = get_option( 'rv_hf_enable_footer', '1' ) === '1';
	?>
	<style>
		.rv-admin-wrap { max-width: 680px; margin: 32px 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
		.rv-admin-card { background: #fff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 28px 32px; margin-bottom: 20px; box-shadow: 0 1px 4px rgba(0,0,0,.06); }
		.rv-admin-card h2 { margin: 0 0 6px; font-size: 1.05rem; color: #1a1a1a; display: flex; align-items: center; gap: 8px; }
		.rv-admin-card .rv-card-desc { color: #666; font-size: 0.85rem; margin: 0 0 22px; line-height: 1.6; }
		.rv-toggle-row { display: flex; align-items: center; justify-content: space-between; padding: 18px 0; border-top: 1px solid #f0f0f0; gap: 24px; }
		.rv-toggle-info { flex: 1; }
		.rv-toggle-info strong { font-size: 0.95rem; color: #1a1a1a; display: flex; align-items: center; gap: 8px; }
		.rv-toggle-info p { margin: 4px 0 0; font-size: 0.82rem; color: #777; }
		.rv-switch { position: relative; display: inline-block; width: 52px; height: 28px; flex-shrink: 0; }
		.rv-switch input { opacity: 0; width: 0; height: 0; }
		.rv-switch-track { position: absolute; inset: 0; background: #ccc; border-radius: 28px; cursor: pointer; transition: background .25s; }
		.rv-switch-track::before { content: ''; position: absolute; height: 22px; width: 22px; left: 3px; bottom: 3px; background: #fff; border-radius: 50%; transition: transform .25s; box-shadow: 0 1px 4px rgba(0,0,0,.2); }
		.rv-switch input:checked + .rv-switch-track { background: #C9A040; }
		.rv-switch input:checked + .rv-switch-track::before { transform: translateX(24px); }
		.rv-badge { display: inline-block; font-size: 0.68rem; font-weight: 700; letter-spacing: .04em; padding: 2px 8px; border-radius: 100px; }
		.rv-badge-on  { background: #e6f4ea; color: #137333; }
		.rv-badge-off { background: #fce8e6; color: #c0392b; }
		.rv-admin-header { display: flex; align-items: center; gap: 16px; margin-bottom: 24px; padding: 20px 24px; background: #0D3320; border-radius: 8px; }
		.rv-admin-header img { height: 44px; width: auto; }
		.rv-admin-header h1 { font-size: 1.15rem; font-weight: 700; color: #C9A040; margin: 0; font-family: Georgia, serif; }
		.rv-admin-header p  { font-size: 0.8rem; color: #A0C4A8; margin: 2px 0 0; }
		.rv-sc-box { display: inline-block; background: #f4f4f4; border: 1px solid #ddd; border-radius: 4px; font-family: 'Courier New', monospace; font-size: 0.88rem; color: #333; padding: 6px 12px; margin: 4px 0 12px; }
		.rv-submit-row { margin-top: 6px; }
		.rv-field-label { display: block; font-size: 0.85rem; font-weight: 600; color: #1a1a1a; margin: 16px 0 6px; }
		.rv-field-label:first-of-type { margin-top: 0; }
		.rv-field-note { font-weight: 400; color: #999; font-size: 0.78rem; }
		.rv-text-input { width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cfcfcf; border-radius: 6px; font-size: 0.9rem; color: #1a1a1a; transition: border-color .2s, box-shadow .2s; }
		.rv-text-input:focus { outline: none; border-color: #C9A040; box-shadow: 0 0 0 3px rgba(201,160,64,.18); }
		.rv-field-hint { font-size: 0.8rem; color: #777; margin: 8px 0 0; }
		.rv-logo-preview { display: flex; align-items: center; gap: 12px; margin-top: 14px; padding: 12px 16px; background: #0D3320; border-radius: 6px; }
		.rv-logo-preview span { font-size: 0.78rem; color: #A0C4A8; }
		.rv-logo-preview img { max-height: 40px; max-width: 200px; width: auto; height: auto; }
		.rv-link-row { display: grid; grid-template-columns: 1fr 1.4fr; gap: 10px; margin-bottom: 10px; }
		.rv-link-row .rv-text-input { margin: 0; }
		.rv-link-head { display: grid; grid-template-columns: 1fr 1.4fr; gap: 10px; margin-bottom: 6px; font-size: 0.74rem; font-weight: 700; letter-spacing: .04em; text-transform: uppercase; color: #999; }
	</style>

	<div class="wrap rv-admin-wrap">

		<div class="rv-admin-header">
			<img src="<?php echo esc_url( RV_HF_LOGO_URL ); ?>" alt="Royal Vastar">
			<div>
				<h1>Royal Vastar Header &amp; Footer</h1>
				<p>Royal Vastar &mdash; v<?php echo RV_HF_VERSION; ?></p>
			</div>
		</div>

		<?php if ( $just_saved ) : ?>
		<div class="notice notice-success is-dismissible" style="border-left-color:#C9A040;">
			<p><strong>&#10003; Settings saved.</strong> Cache cleared automatically. If you still see the old state, hard-refresh your browser (<kbd>Ctrl+Shift+R</kbd> / <kbd>Cmd+Shift+R</kbd>) and clear any server-side cache.</p>
		</div>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="rv_hf_save">
			<?php wp_nonce_field( 'rv_hf_save_nonce' ); ?>

			<div class="rv-admin-card">
				<h2>&#9881; Auto-Inject Settings</h2>
				<p class="rv-card-desc">Toggle header and footer independently. Changes take effect immediately after saving — no theme file editing required.</p>

				<div class="rv-toggle-row">
					<div class="rv-toggle-info">
						<strong>
							Header
							<span class="rv-badge <?php echo $header_on ? 'rv-badge-on' : 'rv-badge-off'; ?>">
								<?php echo $header_on ? 'ON' : 'OFF'; ?>
							</span>
						</strong>
						<p>Injects the branded navigation bar at the top of every page.</p>
					</div>
					<label class="rv-switch" title="Toggle Header">
						<input type="checkbox" name="rv_hf_enable_header" value="1" <?php checked( $header_on ); ?>>
						<span class="rv-switch-track"></span>
					</label>
				</div>

				<div class="rv-toggle-row">
					<div class="rv-toggle-info">
						<strong>
							Footer
							<span class="rv-badge <?php echo $footer_on ? 'rv-badge-on' : 'rv-badge-off'; ?>">
								<?php echo $footer_on ? 'ON' : 'OFF'; ?>
							</span>
						</strong>
						<p>Injects the 4-column footer and WhatsApp floating button on every page.</p>
					</div>
					<label class="rv-switch" title="Toggle Footer">
						<input type="checkbox" name="rv_hf_enable_footer" value="1" <?php checked( $footer_on ); ?>>
						<span class="rv-switch-track"></span>
					</label>
				</div>
			</div>

			<?php
			$logo_val      = esc_attr( get_option( 'rv_hf_logo_url', '' ) );
			$whatsapp_val  = esc_attr( get_option( 'rv_hf_whatsapp', '' ) );
			$email_val     = esc_attr( get_option( 'rv_hf_email', '' ) );
			$instagram_val = esc_attr( get_option( 'rv_hf_instagram', '' ) );
			?>

			<div class="rv-admin-card">
				<h2>&#127912; Branding</h2>
				<p class="rv-card-desc">The logo shows in the header, the footer, and the home-page hero. Leave blank to use the bundled default logo.</p>

				<label class="rv-field-label">Logo image URL</label>
				<input type="url" name="rv_hf_logo_url" class="rv-text-input" value="<?php echo $logo_val; ?>" placeholder="<?php echo esc_attr( RV_HF_LOGO_URL ); ?>">
				<?php $logo_preview = $logo_val !== '' ? get_option( 'rv_hf_logo_url' ) : RV_HF_LOGO_URL; ?>
				<div class="rv-logo-preview">
					<span>Preview:</span>
					<img src="<?php echo esc_url( $logo_preview ); ?>" alt="Logo preview">
				</div>
				<p class="rv-field-hint">Tip: upload your logo under <strong>Media → Add New</strong>, then copy its file URL here.</p>
			</div>

			<div class="rv-admin-card">
				<h2>&#9742; Contact &amp; Social</h2>
				<p class="rv-card-desc">Used across the header, footer contact column, social icons, and the floating WhatsApp button. Leave a field blank to keep the default.</p>

				<label class="rv-field-label">WhatsApp number <span class="rv-field-note">(digits only, incl. country code — e.g. 447908369765)</span></label>
				<input type="text" name="rv_hf_whatsapp" class="rv-text-input" value="<?php echo $whatsapp_val; ?>" placeholder="<?php echo esc_attr( RV_HF_DEF_WHATSAPP ); ?>">

				<label class="rv-field-label">Email address</label>
				<input type="email" name="rv_hf_email" class="rv-text-input" value="<?php echo $email_val; ?>" placeholder="<?php echo esc_attr( RV_HF_DEF_EMAIL ); ?>">

				<label class="rv-field-label">Instagram profile URL</label>
				<input type="url" name="rv_hf_instagram" class="rv-text-input" value="<?php echo $instagram_val; ?>" placeholder="<?php echo esc_attr( RV_HF_DEF_INSTAGRAM ); ?>">
			</div>

			<?php
			rv_hf_render_link_rows_card(
				'Header Navigation',
				'&#129517;',
				'These links appear in the header menu. Leave a row blank to remove it. If you clear all rows, the default Home / About / Services / Contact links are used.',
				'rv_hf_nav',
				rv_hf_get_nav_links()
			);

			rv_hf_render_link_rows_card(
				'Footer Quick Links',
				'&#128279;',
				'The "Quick Links" column in the footer. Leave a row blank to remove it. Clearing all rows restores the defaults. (Policy links auto-link to your policy pages.)',
				'rv_hf_quick',
				rv_hf_get_quick_links()
			);
			?>

			<div class="rv-submit-row" style="margin-bottom:24px;">
				<?php submit_button( 'Save All Settings', 'primary', 'submit', false ); ?>
			</div>

		</form>

		<div class="rv-admin-card">
			<h2>&#128279; Manual Shortcodes</h2>
			<p class="rv-card-desc">Use these shortcodes for manual placement. If Auto-Inject is also ON, the header/footer will appear twice — use one method only.</p>
			<p><strong>Header:</strong></p>
			<div class="rv-sc-box">[rv_header]</div>
			<p><strong>Footer:</strong></p>
			<div class="rv-sc-box">[rv_footer]</div>
			<p style="font-size:0.82rem;color:#777;">In PHP templates: <code>&lt;?php echo do_shortcode('[rv_header]'); ?&gt;</code></p>
		</div>

		<div class="rv-admin-card">
			<h2>&#8505; How Injection Works</h2>
			<ul style="color:#555;font-size:0.85rem;line-height:1.8;padding-left:20px;">
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
function rv_hf_render_link_rows_card( $title, $icon, $desc, $prefix, $rows ) {
	/* Always show a couple of spare blank rows so new links can be added */
	$display = array_values( (array) $rows );
	$spare   = max( 2, 6 - count( $display ) );
	for ( $i = 0; $i < $spare; $i++ ) {
		$display[] = [ 'label' => '', 'url' => '' ];
	}
	?>
	<div class="rv-admin-card">
		<h2><?php echo $icon; // safe static markup ?> <?php echo esc_html( $title ); ?></h2>
		<p class="rv-card-desc"><?php echo esc_html( $desc ); ?></p>

		<div class="rv-link-head">
			<span>Label</span>
			<span>URL</span>
		</div>

		<?php foreach ( $display as $row ) : ?>
		<div class="rv-link-row">
			<input type="text" name="<?php echo esc_attr( $prefix ); ?>_label[]" class="rv-text-input" value="<?php echo esc_attr( $row['label'] ); ?>" placeholder="e.g. Home">
			<input type="url"  name="<?php echo esc_attr( $prefix ); ?>_url[]"   class="rv-text-input" value="<?php echo esc_attr( $row['url'] ); ?>" placeholder="https://...">
		</div>
		<?php endforeach; ?>
	</div>
	<?php
}

/* ── Settings link on Plugins page ──────────────────────────── */
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'rv_hf_plugin_action_links' );

function rv_hf_plugin_action_links( $links ) {
	$url  = admin_url( 'themes.php?page=rv-hf-settings' );
	array_unshift( $links, '<a href="' . esc_url( $url ) . '">Settings</a>' );
	return $links;
}

/* ══════════════════════════════════════════════════════════════
   HELPERS
══════════════════════════════════════════════════════════════ */
function rv_hf_page_url( $slug ) {
	$page_ids = get_option( 'rv_page_ids', [] );
	if ( isset( $page_ids[ $slug ] ) ) {
		$url = get_permalink( $page_ids[ $slug ] );
		if ( $url ) return $url;
	}
	$page = get_page_by_path( $slug, OBJECT, 'page' );
	return $page ? get_permalink( $page->ID ) : home_url( '/' . $slug . '/' );
}

/* ── Branding & contact getters (option with fallback default) ── */
function rv_hf_get_logo() {
	$v = trim( (string) get_option( 'rv_hf_logo_url', '' ) );
	return $v !== '' ? $v : RV_HF_LOGO_URL;
}

function rv_hf_get_whatsapp() {
	$v = trim( (string) get_option( 'rv_hf_whatsapp', '' ) );
	return $v !== '' ? $v : RV_HF_DEF_WHATSAPP;
}

function rv_hf_get_email() {
	$v = trim( (string) get_option( 'rv_hf_email', '' ) );
	return $v !== '' ? $v : RV_HF_DEF_EMAIL;
}

function rv_hf_get_instagram() {
	$v = trim( (string) get_option( 'rv_hf_instagram', '' ) );
	return $v !== '' ? $v : RV_HF_DEF_INSTAGRAM;
}

/* WhatsApp number formatted for display, e.g. "+44 7908 369765" → falls
   back to a "+<digits>" form for custom numbers we can't pattern-match. */
function rv_hf_whatsapp_display() {
	$d = preg_replace( '/[^0-9]/', '', rv_hf_get_whatsapp() );
	if ( strpos( $d, '44' ) === 0 && strlen( $d ) === 12 ) {
		return '+44 ' . substr( $d, 2, 4 ) . ' ' . substr( $d, 6 );
	}
	return '+' . $d;
}

/* Instagram @handle pulled from the configured profile URL */
function rv_hf_instagram_handle() {
	$url = rv_hf_get_instagram();
	$seg = basename( untrailingslashit( wp_parse_url( $url, PHP_URL_PATH ) ?: '' ) );
	return $seg !== '' ? '@' . ltrim( $seg, '@' ) : 'Instagram';
}

/* Header nav links — custom rows from settings, else the page defaults */
function rv_hf_get_nav_links() {
	$opt = get_option( 'rv_hf_nav_links', [] );
	if ( ! empty( $opt ) && is_array( $opt ) ) {
		return $opt;
	}
	return [
		[ 'label' => 'Home',     'url' => rv_hf_page_url( 'rv-home' )  ],
		[ 'label' => 'About Us', 'url' => rv_hf_page_url( 'about-us' ) ],
		[ 'label' => 'Services', 'url' => rv_hf_page_url( 'services' ) ],
		[ 'label' => 'Contact',  'url' => rv_hf_page_url( 'contact' )  ],
	];
}

/* Footer "Quick Links" — custom rows from settings, else page defaults */
function rv_hf_get_quick_links() {
	$opt = get_option( 'rv_hf_quick_links', [] );
	if ( ! empty( $opt ) && is_array( $opt ) ) {
		return $opt;
	}
	return [
		[ 'label' => 'Home',     'url' => rv_hf_page_url( 'rv-home' )  ],
		[ 'label' => 'About Us', 'url' => rv_hf_page_url( 'about-us' ) ],
		[ 'label' => 'Services', 'url' => rv_hf_page_url( 'services' ) ],
		[ 'label' => 'Contact',  'url' => rv_hf_page_url( 'contact' )  ],
	];
}

/* ══════════════════════════════════════════════════════════════
   HEADER RENDER
══════════════════════════════════════════════════════════════ */
function rv_render_header() {
	$logo_src = esc_url( rv_hf_get_logo() );
	$home_url = esc_url( home_url( '/' ) );

	$wc_active     = class_exists( 'WooCommerce' );
	$search_action = $wc_active ? esc_url( wc_get_page_permalink( 'shop' ) ) : esc_url( home_url( '/' ) );
	$cart_count    = $wc_active ? (int) WC()->cart->get_cart_contents_count() : 0;
	$account_url   = $wc_active ? esc_url( wc_get_page_permalink( 'myaccount' ) ) : esc_url( wp_login_url() );

	$nav_links = rv_hf_get_nav_links();

	ob_start();
	?>
<header class="rv-hdr-bar" role="banner">
  <div class="rv-hdr-inner">

    <a href="<?php echo $home_url; ?>" class="rv-hdr-logo" aria-label="Royal Vastar – Home">
      <img src="<?php echo $logo_src; ?>" alt="Royal Vastar" height="44" width="auto">
    </a>

    <form class="rv-hdr-search" action="<?php echo $search_action; ?>" method="get" role="search" aria-label="Site search">
      <?php if ( $wc_active ) : ?>
        <input type="hidden" name="post_type" value="product">
      <?php endif; ?>
      <input type="search" name="s" placeholder="Search..." aria-label="Search" value="<?php echo esc_attr( get_search_query() ); ?>">
      <button type="submit" aria-label="Submit search">
        <i class="fas fa-search" aria-hidden="true"></i>
      </button>
    </form>

    <div class="rv-hdr-icons">

      <button class="rv-hdr-icon-btn rv-hdr-search-toggle" aria-label="Toggle search" aria-expanded="false" aria-controls="rv-mobile-search">
        <i class="fas fa-search" aria-hidden="true"></i>
      </button>

      <?php if ( $wc_active ) : ?>
      <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="rv-hdr-icon-btn" aria-label="Cart (<?php echo $cart_count; ?> items)">
        <i class="fas fa-shopping-bag" aria-hidden="true"></i>
        <?php if ( $cart_count > 0 ) : ?>
        <span class="rv-hdr-cart-badge"><?php echo $cart_count; ?></span>
        <?php endif; ?>
      </a>
      <?php endif; ?>

      <a href="<?php echo $account_url; ?>" class="rv-hdr-icon-btn" aria-label="Account">
        <i class="fas fa-user" aria-hidden="true"></i>
      </a>

      <button class="rv-hdr-icon-btn rv-hdr-hamburger" aria-label="Toggle menu" aria-expanded="false" aria-controls="rv-mobile-nav">
        <i class="fas fa-bars" aria-hidden="true"></i>
      </button>

    </div>
  </div>

  <nav class="rv-hdr-mobile-nav" id="rv-mobile-nav" aria-label="Mobile navigation" aria-hidden="true">
    <?php foreach ( $nav_links as $link ) : ?>
    <a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a>
    <?php endforeach; ?>
    <?php if ( $wc_active ) : ?>
    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Shop</a>
    <?php endif; ?>
  </nav>

  <div class="rv-hdr-mobile-search" id="rv-mobile-search" aria-hidden="true">
    <form action="<?php echo $search_action; ?>" method="get" role="search">
      <?php if ( $wc_active ) : ?>
        <input type="hidden" name="post_type" value="product">
      <?php endif; ?>
      <input type="search" name="s" placeholder="Search Royal Vastar..." aria-label="Search" value="<?php echo esc_attr( get_search_query() ); ?>">
      <button type="submit" aria-label="Search"><i class="fas fa-search" aria-hidden="true"></i></button>
    </form>
  </div>

</header>

<script>
(function () {
  var ham   = document.querySelector('.rv-hdr-hamburger');
  var nav   = document.getElementById('rv-mobile-nav');
  var stog  = document.querySelector('.rv-hdr-search-toggle');
  var srch  = document.getElementById('rv-mobile-search');

  function closeAll() {
    if (nav)  { nav.classList.remove('rv-open');  nav.setAttribute('aria-hidden','true'); }
    if (srch) { srch.classList.remove('rv-open'); srch.setAttribute('aria-hidden','true'); }
    if (ham)  ham.setAttribute('aria-expanded','false');
    if (stog) stog.setAttribute('aria-expanded','false');
  }

  if (ham && nav) {
    ham.addEventListener('click', function () {
      var open = nav.classList.toggle('rv-open');
      ham.setAttribute('aria-expanded', open ? 'true' : 'false');
      nav.setAttribute('aria-hidden', open ? 'false' : 'true');
      if (open && srch) { srch.classList.remove('rv-open'); srch.setAttribute('aria-hidden','true'); }
    });
  }

  if (stog && srch) {
    stog.addEventListener('click', function () {
      var open = srch.classList.toggle('rv-open');
      stog.setAttribute('aria-expanded', open ? 'true' : 'false');
      srch.setAttribute('aria-hidden', open ? 'false' : 'true');
      if (open) {
        var inp = srch.querySelector('input[type="search"]');
        if (inp) inp.focus();
        if (nav) { nav.classList.remove('rv-open'); nav.setAttribute('aria-hidden','true'); }
      }
    });
  }

  document.addEventListener('click', function (e) {
    var hdr = document.querySelector('.rv-hdr-bar');
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
function rv_render_footer() {
	$logo_src     = esc_url( rv_hf_get_logo() );
	$current_year = gmdate( 'Y' );
	$site_name    = esc_html( get_bloginfo( 'name' ) );

	$wa_number    = rv_hf_get_whatsapp();
	$wa_url       = esc_url( 'https://wa.me/' . $wa_number );
	$wa_display   = esc_html( rv_hf_whatsapp_display() );
	$email        = rv_hf_get_email();
	$insta_url    = esc_url( rv_hf_get_instagram() );
	$insta_handle = esc_html( rv_hf_instagram_handle() );

	$quick_links = rv_hf_get_quick_links();

	$policy_links = [
		'Privacy Policy'         => rv_hf_page_url( 'privacy-policy' ),
		'Terms of Service'       => rv_hf_page_url( 'terms-of-service' ),
		'Terms &amp; Conditions' => rv_hf_page_url( 'terms-and-conditions' ),
		'Refund Policy'          => rv_hf_page_url( 'refund-policy' ),
		'Cancellation Policy'    => rv_hf_page_url( 'cancellation-policy' ),
		'Shipping Policy'        => rv_hf_page_url( 'shipping-policy' ),
	];

	ob_start();
	?>
<footer class="rv-ftr-wrap" role="contentinfo">
  <div class="rv-ftr-grid">

    <!-- Col 1 — Brand -->
    <div class="rv-ftr-brand">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Royal Vastar Home">
        <img src="<?php echo $logo_src; ?>" alt="Royal Vastar" class="rv-ftr-logo" width="155" height="auto">
      </a>
      <p class="rv-ftr-tagline">Premium Fashion Wear</p>
      <p class="rv-ftr-brand-desc">Your destination for stylish, trendy, and premium fashion wear. High-quality clothing with modern designs at affordable prices — comfort, style, and confidence for everyday wear.</p>
      <div class="rv-ftr-socials">
        <a href="<?php echo $insta_url; ?>" class="rv-ftr-social-link" target="_blank" rel="noopener noreferrer" aria-label="Follow on Instagram">
          <i class="fab fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="<?php echo $wa_url; ?>" class="rv-ftr-social-link" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
          <i class="fab fa-whatsapp" aria-hidden="true"></i>
        </a>
      </div>
    </div>

    <!-- Col 2 — Quick Links -->
    <div class="rv-ftr-col">
      <h4>Quick Links</h4>
      <ul>
        <?php foreach ( $quick_links as $link ) : ?>
        <li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Col 3 — Policies -->
    <div class="rv-ftr-col">
      <h4>Our Policies</h4>
      <ul>
        <?php foreach ( $policy_links as $label => $url ) : ?>
        <li><a href="<?php echo esc_url( $url ); ?>"><?php echo $label; // already escaped above ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Col 4 — Contact -->
    <div class="rv-ftr-col">
      <h4>Contact Us</h4>
      <div class="rv-ftr-contact-item">
        <i class="fab fa-whatsapp" aria-hidden="true"></i>
        <a href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer"><?php echo $wa_display; ?></a>
      </div>
      <div class="rv-ftr-contact-item">
        <i class="fas fa-envelope" aria-hidden="true"></i>
        <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
      </div>
      <div class="rv-ftr-contact-item">
        <i class="fab fa-instagram" aria-hidden="true"></i>
        <a href="<?php echo $insta_url; ?>" target="_blank" rel="noopener noreferrer"><?php echo $insta_handle; ?></a>
      </div>
      <div class="rv-ftr-contact-item">
        <i class="fas fa-clock" aria-hidden="true"></i>
        <span>Mon–Fri, replies within 24 hours</span>
      </div>
    </div>

  </div>

  <div class="rv-ftr-bottom">
    <span>&copy; <?php echo $current_year; ?> <?php echo $site_name; ?>. All rights reserved.</span>
    <span>&nbsp;&mdash;&nbsp;</span>
    <span>Developed by <a href="https://royalvastar.com/" target="_blank" rel="noopener">Royal Vastar</a></span>
  </div>

</footer>

<!-- WhatsApp floating button -->
<a href="<?php echo $wa_url; ?>" class="rv-wa-btn" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
  <i class="fab fa-whatsapp" aria-hidden="true"></i>
</a>
	<?php
	return ob_get_clean();
}
