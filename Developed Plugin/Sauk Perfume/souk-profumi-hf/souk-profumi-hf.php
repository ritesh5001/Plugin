<?php
/**
 * Plugin Name: Souk Profumi Header & Footer
 * Description: Auto-injects branded header and footer site-wide. Configure under Appearance → Souk Profumi Header & Footer. Shortcodes [sp_header] and [sp_footer] also available.
 * Version:     1.0.4
 * Author:      Souk Profumi
 * Author URI:  https://soukprofumi.it/
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/* =====================================================================
 * EDIT THESE CONSTANTS WITH YOUR REAL DATA
 * ===================================================================== */
define( 'SP_HF_LOGO_URL',  'https://pink-bat-240785.hostingersite.com/wp-content/uploads/2026/06/Sauk.png' );
define( 'SP_HF_WHATSAPP',  '393000000000' );   // intl format, no + (used ONLY in the WhatsApp button)

// Social URLs — leave blank to hide that icon
define( 'SP_HF_INSTAGRAM', '' );
define( 'SP_HF_FACEBOOK',  '' );
define( 'SP_HF_TIKTOK',    '' );

define( 'SP_HF_VERSION', '1.0.4' );
define( 'SP_HF_URL',  plugin_dir_url( __FILE__ ) );
define( 'SP_HF_PATH', plugin_dir_path( __FILE__ ) );

/* =====================================================================
 * Activation
 * ===================================================================== */
function sp_hf_activate() {
    if ( get_option( 'sp_hf_enable_header' ) === false ) update_option( 'sp_hf_enable_header', '1' );
    if ( get_option( 'sp_hf_enable_footer' ) === false ) update_option( 'sp_hf_enable_footer', '1' );
}
register_activation_hook( __FILE__, 'sp_hf_activate' );

/* =====================================================================
 * Settings helpers
 * ===================================================================== */
function sp_hf_get_url_override( $option_name, $default_url ) {
    $value = trim( (string) get_option( $option_name, '' ) );
    return $value !== '' ? $value : $default_url;
}

function sp_hf_get_social_url( $option_name, $default_url = '' ) {
    $value = get_option( $option_name, null );
    if ( $value === null ) {
        $value = $default_url;
    }
    return trim( (string) $value );
}

function sp_hf_get_whatsapp_number() {
    $value = get_option( 'sp_hf_whatsapp_number', null );
    if ( $value === null ) {
        $value = SP_HF_WHATSAPP;
    }
    return preg_replace( '/[^0-9]/', '', (string) $value );
}

function sp_hf_link_option_names() {
    return array(
        'sp_hf_logo_image_url',
        'sp_hf_logo_link_url',
        'sp_hf_search_action_url',
        'sp_hf_account_url',
        'sp_hf_cart_url',
        'sp_hf_header_home_url',
        'sp_hf_header_about_url',
        'sp_hf_header_collections_url',
        'sp_hf_header_contact_url',
        'sp_hf_footer_home_url',
        'sp_hf_footer_about_url',
        'sp_hf_footer_collections_url',
        'sp_hf_footer_contact_url',
        'sp_hf_footer_privacy_url',
        'sp_hf_footer_terms_service_url',
        'sp_hf_footer_terms_conditions_url',
        'sp_hf_footer_refund_url',
        'sp_hf_footer_cancellation_url',
        'sp_hf_footer_shipping_url',
        'sp_hf_instagram_url',
        'sp_hf_facebook_url',
        'sp_hf_tiktok_url',
    );
}

/* =====================================================================
 * Front-end assets — always enqueue
 * ===================================================================== */
function sp_hf_enqueue() {
    wp_enqueue_style(
        'sp-hf-fa',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(), '6.4.0'
    );
    wp_enqueue_style(
        'sp-hf-fonts',
        'https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap',
        array(), null
    );
    wp_enqueue_style(
        'sp-hf',
        SP_HF_URL . 'assets/css/sp-hf.css',
        array(), SP_HF_VERSION
    );
}
add_action( 'wp_enqueue_scripts', 'sp_hf_enqueue' );

/* =====================================================================
 * Body class
 * ===================================================================== */
function sp_hf_body_class( $classes ) {
    if ( get_option( 'sp_hf_enable_header', '1' ) === '1' ) {
        $classes[] = 'sp-header-active';
    }
    return $classes;
}
add_filter( 'body_class', 'sp_hf_body_class' );

/* =====================================================================
 * Header auto-inject (with double-injection guard)
 * ===================================================================== */
$GLOBALS['sp_hdr_injected'] = false;

function sp_hf_inject_header_body_open() {
    if ( ! empty( $GLOBALS['sp_hdr_injected'] ) ) return;
    if ( get_option( 'sp_hf_enable_header', '1' ) !== '1' ) return;
    $GLOBALS['sp_hdr_injected'] = true;
    echo sp_hf_render_header();
}
add_action( 'wp_body_open', 'sp_hf_inject_header_body_open', 1 );

function sp_hf_inject_header_footer_fallback() {
    if ( ! empty( $GLOBALS['sp_hdr_injected'] ) ) return;
    if ( get_option( 'sp_hf_enable_header', '1' ) !== '1' ) return;
    $GLOBALS['sp_hdr_injected'] = true;
    echo sp_hf_render_header();
}
add_action( 'wp_footer', 'sp_hf_inject_header_footer_fallback', 1 );

/* =====================================================================
 * Footer auto-inject
 * ===================================================================== */
function sp_hf_inject_footer() {
    if ( get_option( 'sp_hf_enable_footer', '1' ) !== '1' ) return;
    echo sp_hf_render_footer();
}
add_action( 'wp_footer', 'sp_hf_inject_footer', 5 );

/* =====================================================================
 * Shortcodes
 * ===================================================================== */
add_shortcode( 'sp_header', 'sp_hf_render_header' );
add_shortcode( 'sp_footer', 'sp_hf_render_footer' );

/* =====================================================================
 * HEADER RENDER
 * ===================================================================== */
function sp_hf_render_header() {
    $home      = esc_url( home_url( '/' ) );
    $logo      = esc_url( sp_hf_get_url_override( 'sp_hf_logo_image_url', SP_HF_LOGO_URL ) );
    $logo_link = esc_url( sp_hf_get_url_override( 'sp_hf_logo_link_url', home_url( '/' ) ) );

    // Search action — WooCommerce aware
    if ( function_exists( 'wc_get_page_permalink' ) ) {
        $search_default = wc_get_page_permalink( 'shop' );
        $search_hidden = '<input type="hidden" name="post_type" value="product"/>';
    } else {
        $search_default = home_url( '/' );
        $search_hidden = '';
    }
    $search_action = esc_url( sp_hf_get_url_override( 'sp_hf_search_action_url', $search_default ) );

    // Account link
    if ( function_exists( 'wc_get_page_permalink' ) ) {
        $account_default = wc_get_page_permalink( 'myaccount' );
    } else {
        $account_default = wp_login_url();
    }
    $account_url = esc_url( sp_hf_get_url_override( 'sp_hf_account_url', $account_default ) );

    // Cart count
    $cart_count = 0;
    if ( function_exists( 'WC' ) && WC()->cart ) {
        $cart_count = WC()->cart->get_cart_contents_count();
    }
    $cart_default = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/' );
    $cart_url = esc_url( sp_hf_get_url_override( 'sp_hf_cart_url', $cart_default ) );

    // Nav slugs → permalinks
    $nav = array(
        'Home'            => sp_hf_get_url_override( 'sp_hf_header_home_url', sp_hf_url_for( 'sp-home', home_url( '/' ) ) ),
        'About Us'        => sp_hf_get_url_override( 'sp_hf_header_about_url', sp_hf_url_for( 'about-us', home_url( '/' ) ) ),
        'Our Collections' => sp_hf_get_url_override( 'sp_hf_header_collections_url', sp_hf_url_for( 'services', home_url( '/' ) ) ),
        'Contact'         => sp_hf_get_url_override( 'sp_hf_header_contact_url', sp_hf_url_for( 'contact', home_url( '/' ) ) ),
    );

    ob_start(); ?>
<header class="sp-hdr-bar" role="banner">
  <div class="sp-hdr-inner">
    <a class="sp-hdr-logo" href="<?php echo $logo_link; ?>" aria-label="Souk Profumi Home">
      <img src="<?php echo $logo; ?>" alt="Souk Profumi" />
    </a>

    <form class="sp-hdr-search" method="get" action="<?php echo $search_action; ?>" role="search">
      <input type="search" name="s" placeholder="Search fragrances..." value="<?php echo esc_attr( get_search_query() ); ?>" />
      <?php echo $search_hidden; ?>
      <button type="submit" aria-label="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <nav class="sp-hdr-nav-desktop" aria-label="Primary">
      <?php foreach ( $nav as $label => $url ) : ?>
        <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
      <?php endforeach; ?>
    </nav>

    <div class="sp-hdr-icons">
      <button class="sp-hdr-icon" id="spHdrSearchToggle" aria-label="Open search"><i class="fa-solid fa-magnifying-glass"></i></button>
      <?php if ( function_exists( 'WC' ) ) : ?>
        <a class="sp-hdr-icon sp-hdr-cart" href="<?php echo $cart_url; ?>" aria-label="Cart">
          <i class="fa-solid fa-bag-shopping"></i>
          <span class="sp-hdr-cart-count"><?php echo (int) $cart_count; ?></span>
        </a>
      <?php endif; ?>
      <a class="sp-hdr-icon" href="<?php echo $account_url; ?>" aria-label="Account"><i class="fa-regular fa-user"></i></a>
      <button class="sp-hdr-icon sp-hdr-burger" id="spHdrBurger" aria-label="Open menu"><i class="fa-solid fa-bars"></i></button>
    </div>
  </div>

  <div class="sp-hdr-mobile-search" id="spHdrMobileSearch">
    <form method="get" action="<?php echo $search_action; ?>" role="search">
      <input type="search" name="s" placeholder="Search fragrances..." />
      <?php echo $search_hidden; ?>
      <button type="submit" aria-label="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
  </div>

  <nav class="sp-hdr-mobile-nav" id="spHdrMobileNav" aria-label="Mobile">
    <?php foreach ( $nav as $label => $url ) : ?>
      <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
    <?php endforeach; ?>
  </nav>
</header>

<script>
(function(){
  var burger  = document.getElementById('spHdrBurger');
  var nav     = document.getElementById('spHdrMobileNav');
  var sToggle = document.getElementById('spHdrSearchToggle');
  var sBar    = document.getElementById('spHdrMobileSearch');
  function close(el){ if(el) el.classList.remove('is-open'); }
  function toggle(el){ if(el) el.classList.toggle('is-open'); }
  if(burger)  burger.addEventListener('click', function(e){ e.stopPropagation(); close(sBar); toggle(nav); });
  if(sToggle) sToggle.addEventListener('click', function(e){ e.stopPropagation(); close(nav); toggle(sBar); });
  document.addEventListener('click', function(e){
    if (nav  && nav.classList.contains('is-open')  && !nav.contains(e.target)  && e.target !== burger)  close(nav);
    if (sBar && sBar.classList.contains('is-open') && !sBar.contains(e.target) && e.target !== sToggle) close(sBar);
  });
  // Live cart badge refresh (WooCommerce fragments)
  if (typeof jQuery !== 'undefined') {
    jQuery(document.body).on('added_to_cart removed_from_cart wc_fragments_refreshed updated_cart_totals', function(){
      var badges = document.querySelectorAll('.sp-hdr-cart-count');
      jQuery.get(window.location.href, function(html){
        var m = html.match(/sp-hdr-cart-count">(\d+)</);
        if (m) badges.forEach(function(b){ b.textContent = m[1]; });
      });
    });
  }
})();
</script>
<?php
    return ob_get_clean();
}

/* =====================================================================
 * FOOTER RENDER
 * ===================================================================== */
function sp_hf_render_footer() {
    $home      = esc_url( home_url( '/' ) );
    $logo      = esc_url( sp_hf_get_url_override( 'sp_hf_logo_image_url', SP_HF_LOGO_URL ) );
    $logo_link = esc_url( sp_hf_get_url_override( 'sp_hf_logo_link_url', home_url( '/' ) ) );

    $quick = array(
        'Home'            => sp_hf_get_url_override( 'sp_hf_footer_home_url', sp_hf_url_for( 'sp-home', home_url( '/' ) ) ),
        'About Us'        => sp_hf_get_url_override( 'sp_hf_footer_about_url', sp_hf_url_for( 'about-us', home_url( '/' ) ) ),
        'Our Collections' => sp_hf_get_url_override( 'sp_hf_footer_collections_url', sp_hf_url_for( 'services', home_url( '/' ) ) ),
        'Contact'         => sp_hf_get_url_override( 'sp_hf_footer_contact_url', sp_hf_url_for( 'contact', home_url( '/' ) ) ),
    );
    $policies = array(
        'Privacy Policy'             => sp_hf_get_url_override( 'sp_hf_footer_privacy_url', sp_hf_url_for( 'privacy-policy', home_url( '/' ) ) ),
        'Terms of Service'           => sp_hf_get_url_override( 'sp_hf_footer_terms_service_url', sp_hf_url_for( 'terms-of-service', home_url( '/' ) ) ),
        'Terms & Conditions'         => sp_hf_get_url_override( 'sp_hf_footer_terms_conditions_url', sp_hf_url_for( 'terms-and-conditions', home_url( '/' ) ) ),
        'Refund Policy'              => sp_hf_get_url_override( 'sp_hf_footer_refund_url', sp_hf_url_for( 'refund-policy', home_url( '/' ) ) ),
        'Cancellation Policy'        => sp_hf_get_url_override( 'sp_hf_footer_cancellation_url', sp_hf_url_for( 'cancellation-policy', home_url( '/' ) ) ),
        'Shipping & Handling Policy' => sp_hf_get_url_override( 'sp_hf_footer_shipping_url', sp_hf_url_for( 'shipping-policy', home_url( '/' ) ) ),
    );

    $instagram = sp_hf_get_social_url( 'sp_hf_instagram_url', SP_HF_INSTAGRAM );
    $facebook  = sp_hf_get_social_url( 'sp_hf_facebook_url', SP_HF_FACEBOOK );
    $tiktok    = sp_hf_get_social_url( 'sp_hf_tiktok_url', SP_HF_TIKTOK );
    $wa        = sp_hf_get_whatsapp_number();

    ob_start(); ?>
<footer class="sp-ftr" role="contentinfo">
  <div class="sp-ftr-inner">

    <div class="sp-ftr-col sp-ftr-brand">
      <a href="<?php echo $logo_link; ?>" aria-label="Souk Profumi Home"><img class="sp-ftr-logo" src="<?php echo $logo; ?>" alt="Souk Profumi"/></a>
      <p class="sp-ftr-tag">Profumi Arabi di Nicchia</p>
      <p class="sp-ftr-desc">An independent atelier of authentic Arabian and niche fragrances, curated for those who seek the extraordinary.</p>
      <div class="sp-ftr-socials">
        <?php if ( $instagram ) : ?><a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a><?php endif; ?>
        <?php if ( $facebook )  : ?><a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a><?php endif; ?>
        <?php if ( $tiktok )    : ?><a href="<?php echo esc_url( $tiktok ); ?>" target="_blank" rel="noopener" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a><?php endif; ?>
        <?php if ( $wa )             : ?><a href="https://wa.me/<?php echo esc_attr( $wa ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a><?php endif; ?>
      </div>
    </div>

    <div class="sp-ftr-col">
      <h4>Quick Links</h4>
      <ul>
        <?php foreach ( $quick as $label => $url ) : ?>
          <li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="sp-ftr-col">
      <h4>Policies</h4>
      <ul>
        <?php foreach ( $policies as $label => $url ) : ?>
          <li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="sp-ftr-col">
      <h4>Reach Us</h4>
      <p class="sp-ftr-reach">Have a question about our fragrances or an order? Chat with our team using the floating WhatsApp button — we respond quickly and personally.</p>
      <?php if ( $wa ) : ?>
        <a class="sp-ftr-wa-btn" href="https://wa.me/<?php echo esc_attr( $wa ); ?>" target="_blank" rel="noopener">
          <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
        </a>
      <?php endif; ?>
      <p class="sp-ftr-reach sp-ftr-reach--muted">Based in Italy · Shipping nationwide &amp; internationally</p>
    </div>

  </div>

  <div class="sp-ftr-bottom">
    © <?php echo esc_html( date('Y') ); ?> Souk Profumi – Profumi Arabi di Nicchia. All Rights Reserved.
  </div>
</footer>

<?php if ( $wa ) : ?>
<a class="sp-wa-fab" href="https://wa.me/<?php echo esc_attr( $wa ); ?>" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
  <i class="fa-brands fa-whatsapp"></i>
</a>
<?php endif;

    return ob_get_clean();
}

/* =====================================================================
 * Helper — resolve slug to permalink, fallback to home
 * ===================================================================== */
function sp_hf_url_for( $slug, $fallback ) {
    $p = get_page_by_path( $slug );
    if ( $p ) return get_permalink( $p->ID );
    return $fallback;
}

/* =====================================================================
 * Cache purge
 * ===================================================================== */
function sp_hf_purge_cache() {
    wp_cache_flush();
    if ( has_action( 'litespeed_purge_all' ) ) do_action( 'litespeed_purge_all' );
    if ( function_exists( 'wp_cache_clear_cache' ) ) wp_cache_clear_cache();
    if ( function_exists( 'w3tc_flush_all' ) )       w3tc_flush_all();
    if ( function_exists( 'rocket_clean_domain' ) )  rocket_clean_domain();
}

/* =====================================================================
 * Admin — settings page
 * ===================================================================== */
function sp_hf_add_settings_page() {
    add_submenu_page(
        'themes.php',
        'Souk Profumi Header & Footer',
        'Souk Profumi H&F',
        'manage_options',
        'sp-hf-settings',
        'sp_hf_render_settings_page'
    );
}
add_action( 'admin_menu', 'sp_hf_add_settings_page' );

function sp_hf_plugin_action_links( $links ) {
    $url = admin_url( 'themes.php?page=sp-hf-settings' );
    array_unshift( $links, '<a href="' . esc_url( $url ) . '">Settings</a>' );
    return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'sp_hf_plugin_action_links' );

function sp_hf_render_settings_page() {
    if ( ! current_user_can( 'manage_options' ) ) return;

    // Always read fresh
    wp_cache_delete( 'sp_hf_enable_header', 'options' );
    wp_cache_delete( 'sp_hf_enable_footer', 'options' );
    foreach ( sp_hf_link_option_names() as $option_name ) {
        wp_cache_delete( $option_name, 'options' );
    }
    wp_cache_delete( 'sp_hf_whatsapp_number', 'options' );

    $header = get_option( 'sp_hf_enable_header', '1' );
    $footer = get_option( 'sp_hf_enable_footer', '1' );
    $saved  = isset( $_GET['sp_saved'] ) && $_GET['sp_saved'] === '1';
    $url_field = function( $name, $label, $description = '', $placeholder = '' ) {
        ?>
          <tr>
            <th scope="row"><label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label></th>
            <td>
              <input type="url" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( get_option( $name, '' ) ); ?>" class="regular-text" placeholder="<?php echo esc_attr( $placeholder ); ?>"/>
              <?php if ( $description ) : ?><p class="description"><?php echo esc_html( $description ); ?></p><?php endif; ?>
            </td>
          </tr>
        <?php
    };
    ?>
    <div class="wrap sp-hf-settings">
      <h1 style="font-family:Cinzel,serif;color:#8B6A2E;">Souk Profumi — Header &amp; Footer</h1>

      <?php if ( $saved ) : ?>
        <div class="notice notice-success is-dismissible" style="border-left-color:#C99A4B;"><p><strong>Settings saved.</strong> Hard-refresh your front-end (Cmd/Ctrl + Shift + R) to see changes.</p></div>
      <?php endif; ?>

      <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" style="background:#fff;border:1px solid #E8C77E;border-radius:14px;padding:28px;max-width:980px;margin-top:18px;box-shadow:0 10px 30px rgba(139,106,46,.08);">
        <?php wp_nonce_field( 'sp_hf_save_nonce' ); ?>
        <input type="hidden" name="action" value="sp_hf_save"/>

        <h2 style="font-family:Cinzel,serif;margin-top:0;">Display Settings</h2>
        <p style="color:#5C5C5C;">Toggle the branded header and footer site-wide. When OFF, the corresponding section is no longer auto-injected.</p>

        <table class="form-table" role="presentation">
          <tr>
            <th scope="row"><label for="sp_hf_enable_header">Enable Header</label></th>
            <td>
              <label class="sp-switch">
                <input type="checkbox" name="sp_hf_enable_header" id="sp_hf_enable_header" value="1" <?php checked( $header, '1' ); ?>/>
                <span class="sp-slider"></span>
              </label>
              <p class="description">Injects the branded navigation bar on every page.</p>
            </td>
          </tr>
          <tr>
            <th scope="row"><label for="sp_hf_enable_footer">Enable Footer</label></th>
            <td>
              <label class="sp-switch">
                <input type="checkbox" name="sp_hf_enable_footer" id="sp_hf_enable_footer" value="1" <?php checked( $footer, '1' ); ?>/>
                <span class="sp-slider"></span>
              </label>
              <p class="description">Injects the 4-column footer and the floating WhatsApp button.</p>
            </td>
          </tr>
        </table>

        <hr style="margin:24px 0;border:none;border-top:1px solid rgba(201,154,75,.3);"/>
        <h2 style="font-family:Cinzel,serif;">Logo &amp; Header Icon Links</h2>
        <p style="color:#5C5C5C;">Leave a URL field empty to use the plugin's automatic default.</p>
        <table class="form-table" role="presentation">
          <?php
            $url_field( 'sp_hf_logo_image_url', 'Logo Image URL', 'Changes the logo image used in both header and footer.', SP_HF_LOGO_URL );
            $url_field( 'sp_hf_logo_link_url', 'Logo Click URL', 'Changes where the header and footer logos link.', home_url( '/' ) );
            $url_field( 'sp_hf_search_action_url', 'Search Form URL', 'Changes where the search form submits. Empty uses the WooCommerce shop page when available.', home_url( '/' ) );
            $url_field( 'sp_hf_account_url', 'Account Icon URL', 'Changes the user/account icon link. Empty uses My Account or WordPress login.', wp_login_url() );
            $url_field( 'sp_hf_cart_url', 'Cart Icon URL', 'Changes the cart icon link. Empty uses the WooCommerce cart when available.', home_url( '/' ) );
          ?>
        </table>

        <hr style="margin:24px 0;border:none;border-top:1px solid rgba(201,154,75,.3);"/>
        <h2 style="font-family:Cinzel,serif;">Header Navigation Links</h2>
        <table class="form-table" role="presentation">
          <?php
            $url_field( 'sp_hf_header_home_url', 'Header Home URL', '', home_url( '/' ) );
            $url_field( 'sp_hf_header_about_url', 'Header About URL', '', home_url( '/about-us/' ) );
            $url_field( 'sp_hf_header_collections_url', 'Header Collections URL', '', home_url( '/services/' ) );
            $url_field( 'sp_hf_header_contact_url', 'Header Contact URL', '', home_url( '/contact/' ) );
          ?>
        </table>

        <hr style="margin:24px 0;border:none;border-top:1px solid rgba(201,154,75,.3);"/>
        <h2 style="font-family:Cinzel,serif;">Footer Quick Links</h2>
        <table class="form-table" role="presentation">
          <?php
            $url_field( 'sp_hf_footer_home_url', 'Footer Home URL', '', home_url( '/' ) );
            $url_field( 'sp_hf_footer_about_url', 'Footer About URL', '', home_url( '/about-us/' ) );
            $url_field( 'sp_hf_footer_collections_url', 'Footer Collections URL', '', home_url( '/services/' ) );
            $url_field( 'sp_hf_footer_contact_url', 'Footer Contact URL', '', home_url( '/contact/' ) );
          ?>
        </table>

        <hr style="margin:24px 0;border:none;border-top:1px solid rgba(201,154,75,.3);"/>
        <h2 style="font-family:Cinzel,serif;">Footer Policy Links</h2>
        <table class="form-table" role="presentation">
          <?php
            $url_field( 'sp_hf_footer_privacy_url', 'Privacy Policy URL', '', home_url( '/privacy-policy/' ) );
            $url_field( 'sp_hf_footer_terms_service_url', 'Terms of Service URL', '', home_url( '/terms-of-service/' ) );
            $url_field( 'sp_hf_footer_terms_conditions_url', 'Terms & Conditions URL', '', home_url( '/terms-and-conditions/' ) );
            $url_field( 'sp_hf_footer_refund_url', 'Refund Policy URL', '', home_url( '/refund-policy/' ) );
            $url_field( 'sp_hf_footer_cancellation_url', 'Cancellation Policy URL', '', home_url( '/cancellation-policy/' ) );
            $url_field( 'sp_hf_footer_shipping_url', 'Shipping & Handling Policy URL', '', home_url( '/shipping-policy/' ) );
          ?>
        </table>

        <hr style="margin:24px 0;border:none;border-top:1px solid rgba(201,154,75,.3);"/>
        <h2 style="font-family:Cinzel,serif;">Footer Social &amp; WhatsApp Links</h2>
        <table class="form-table" role="presentation">
          <?php
            $url_field( 'sp_hf_instagram_url', 'Instagram URL', 'Leave blank to hide the Instagram icon.', 'https://www.instagram.com/yourprofile/' );
            $url_field( 'sp_hf_facebook_url', 'Facebook URL', 'Leave blank to hide the Facebook icon.', 'https://www.facebook.com/yourpage/' );
            $url_field( 'sp_hf_tiktok_url', 'TikTok URL', 'Leave blank to hide the TikTok icon.', 'https://www.tiktok.com/@yourprofile' );
          ?>
          <tr>
            <th scope="row"><label for="sp_hf_whatsapp_number">WhatsApp Number</label></th>
            <td>
              <input type="text" name="sp_hf_whatsapp_number" id="sp_hf_whatsapp_number" value="<?php echo esc_attr( get_option( 'sp_hf_whatsapp_number', SP_HF_WHATSAPP ) ); ?>" class="regular-text" placeholder="393000000000"/>
              <p class="description">Use international format with numbers only, no plus sign. Leave blank to hide WhatsApp links and the floating button.</p>
            </td>
          </tr>
        </table>

        <p>
          <button type="submit" class="button button-primary" style="background:#1A1A1A;border-color:#1A1A1A;padding:6px 22px;height:auto;">Save Settings</button>
        </p>

        <hr style="margin:24px 0;border:none;border-top:1px solid rgba(201,154,75,.3);"/>
        <h3 style="font-family:Cinzel,serif;">Manual Shortcodes</h3>
        <p>Auto-inject is the default. If you also need to drop the header or footer inside a specific page or template, use:</p>
        <p><code>[sp_header]</code> &nbsp;·&nbsp; <code>[sp_footer]</code></p>
        <p style="color:#8B6A2E;"><strong>Note:</strong> If both auto-inject AND a shortcode are active, the header/footer will appear twice. Use one or the other on that page.</p>
      </form>

      <style>
        .sp-switch{position:relative;display:inline-block;width:54px;height:28px;vertical-align:middle;margin-right:10px;}
        .sp-switch input{opacity:0;width:0;height:0;}
        .sp-slider{position:absolute;cursor:pointer;inset:0;background:#ccc;transition:.3s;border-radius:34px;}
        .sp-slider:before{position:absolute;content:"";height:22px;width:22px;left:3px;bottom:3px;background:#fff;transition:.3s;border-radius:50%;}
        .sp-switch input:checked + .sp-slider{background:linear-gradient(135deg,#E8C77E,#C99A4B);}
        .sp-switch input:checked + .sp-slider:before{transform:translateX(26px);}
      </style>
    </div>
    <?php
}

function sp_hf_handle_save() {
    if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Unauthorized' );
    check_admin_referer( 'sp_hf_save_nonce' );

    $header = ( isset( $_POST['sp_hf_enable_header'] ) && $_POST['sp_hf_enable_header'] === '1' ) ? '1' : '0';
    $footer = ( isset( $_POST['sp_hf_enable_footer'] ) && $_POST['sp_hf_enable_footer'] === '1' ) ? '1' : '0';

    update_option( 'sp_hf_enable_header', $header );
    update_option( 'sp_hf_enable_footer', $footer );

    foreach ( sp_hf_link_option_names() as $option_name ) {
        $value = isset( $_POST[ $option_name ] ) ? wp_unslash( $_POST[ $option_name ] ) : '';
        $value = is_scalar( $value ) ? trim( (string) $value ) : '';
        update_option( $option_name, esc_url_raw( $value ) );
    }

    $whatsapp = isset( $_POST['sp_hf_whatsapp_number'] ) ? wp_unslash( $_POST['sp_hf_whatsapp_number'] ) : '';
    $whatsapp = is_scalar( $whatsapp ) ? (string) $whatsapp : '';
    update_option( 'sp_hf_whatsapp_number', preg_replace( '/[^0-9]/', '', (string) $whatsapp ) );

    sp_hf_purge_cache();

    wp_safe_redirect( add_query_arg(
        array( 'page' => 'sp-hf-settings', 'sp_saved' => '1' ),
        admin_url( 'themes.php' )
    ) );
    exit;
}
add_action( 'admin_post_sp_hf_save', 'sp_hf_handle_save' );
