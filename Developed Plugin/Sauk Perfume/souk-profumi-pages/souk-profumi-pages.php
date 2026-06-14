<?php
/**
 * Plugin Name: Souk Profumi Pages
 * Description: Creates all website content pages on activation.
 * Version:     1.0.3
 * Author:      Souk Profumi
 * Author URI:  https://soukprofumi.it/
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

// ===== EDIT THIS CONSTANT WITH YOUR REAL LOGO URL =====
define( 'SP_LOGO_URL', 'https://soukprofumi.it/wp-content/uploads/2026/06/Sauk.png' );

define( 'SP_PAGES_VERSION', '1.0.2' );
define( 'SP_PAGES_PATH', plugin_dir_path( __FILE__ ) );
define( 'SP_PAGES_URL',  plugin_dir_url( __FILE__ ) );

require_once SP_PAGES_PATH . 'includes/pages.php';

/* ------------------------------------------------------------------
 * Activation: create pages, store IDs in sp_page_ids
 * ------------------------------------------------------------------ */
function sp_pages_sync_pages() {
    $defs = sp_get_page_definitions();
    $ids  = get_option( 'sp_page_ids', array() );

    foreach ( $defs as $slug => $def ) {
        $existing = get_page_by_path( $slug );
        if ( $existing ) {
            $ids[ $slug ] = (int) $existing->ID;
            wp_update_post( array(
                'ID'           => (int) $existing->ID,
                'post_title'   => $def['title'],
                'post_content' => $def['content'],
            ) );
            sp_pages_apply_full_width_layout( (int) $existing->ID );
            continue;
        }
        $id = wp_insert_post( array(
            'post_title'   => $def['title'],
            'post_name'    => $slug,
            'post_content' => $def['content'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_author'  => 1,
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
        ) );
        if ( $id && ! is_wp_error( $id ) ) {
            $ids[ $slug ] = (int) $id;
            sp_pages_apply_full_width_layout( (int) $id );
        }
    }

    update_option( 'sp_page_ids', $ids );
    update_option( 'sp_pages_content_version', SP_PAGES_VERSION );
}

function sp_pages_apply_full_width_layout( $post_id ) {
    update_post_meta( $post_id, '_wp_page_template', 'elementor_header_footer' );
}

function sp_pages_activate() {
    sp_pages_sync_pages();
}
register_activation_hook( __FILE__, 'sp_pages_activate' );

function sp_pages_maybe_sync_pages() {
    if ( get_option( 'sp_pages_content_version' ) !== SP_PAGES_VERSION ) {
        sp_pages_sync_pages();
    }
}
add_action( 'admin_init', 'sp_pages_maybe_sync_pages' );

/* ------------------------------------------------------------------
 * Is current post one of our plugin pages?
 * ------------------------------------------------------------------ */
function sp_is_plugin_page( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }
    if ( ! $post_id ) return false;
    $ids = get_option( 'sp_page_ids', array() );
    return in_array( (int) $post_id, array_map( 'intval', $ids ), true );
}

/* ------------------------------------------------------------------
 * Placeholder replacement on the_content
 * ------------------------------------------------------------------ */
function sp_replace_placeholders( $content ) {
    if ( ! is_singular( 'page' ) || ! sp_is_plugin_page() ) {
        return $content;
    }
    $ids = get_option( 'sp_page_ids', array() );
    $url = function( $slug ) use ( $ids ) {
        if ( empty( $ids[ $slug ] ) ) return home_url( '/' . $slug . '/' );
        $p = get_permalink( $ids[ $slug ] );
        return $p ? $p : home_url( '/' . $slug . '/' );
    };
    $map = array(
        '%%BRAND_LOGO%%'   => esc_url( SP_LOGO_URL ),
        '%%URL_HOME%%'     => esc_url( $url( 'sp-home' ) ),
        '%%URL_ABOUT%%'    => esc_url( $url( 'about-us' ) ),
        '%%URL_SERVICES%%' => esc_url( $url( 'services' ) ),
        '%%URL_CONTACT%%'  => esc_url( $url( 'contact' ) ),
        '%%URL_PRIVACY%%'  => esc_url( $url( 'privacy-policy' ) ),
        '%%URL_TERMS%%'    => esc_url( $url( 'terms-of-service' ) ),
        '%%URL_TERMS_C%%'  => esc_url( $url( 'terms-and-conditions' ) ),
        '%%URL_REFUND%%'   => esc_url( $url( 'refund-policy' ) ),
        '%%URL_CANCEL%%'   => esc_url( $url( 'cancellation-policy' ) ),
        '%%URL_SHIPPING%%' => esc_url( $url( 'shipping-policy' ) ),
    );
    return strtr( $content, $map );
}
add_filter( 'the_content', 'sp_replace_placeholders', 9 );

/* ------------------------------------------------------------------
 * Remove wpautop/wptexturize on plugin pages
 * ------------------------------------------------------------------ */
function sp_disable_autop() {
    if ( is_singular( 'page' ) && sp_is_plugin_page() ) {
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_content', 'wptexturize' );
    }
}
add_action( 'template_redirect', 'sp_disable_autop' );

/* ------------------------------------------------------------------
 * Body class
 * ------------------------------------------------------------------ */
function sp_body_class( $classes ) {
    if ( is_singular( 'page' ) && sp_is_plugin_page() ) {
        $classes[] = 'sp-page';
    }
    return $classes;
}
add_filter( 'body_class', 'sp_body_class' );

/* ------------------------------------------------------------------
 * Enqueue CSS + fonts only on plugin pages
 * ------------------------------------------------------------------ */
function sp_pages_enqueue() {
    if ( ! is_singular( 'page' ) || ! sp_is_plugin_page() ) return;
    wp_enqueue_style(
        'sp-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap',
        array(), null
    );
    wp_enqueue_style(
        'sp-pages',
        SP_PAGES_URL . 'assets/css/sp-pages.css',
        array(), SP_PAGES_VERSION
    );
}
add_action( 'wp_enqueue_scripts', 'sp_pages_enqueue' );
