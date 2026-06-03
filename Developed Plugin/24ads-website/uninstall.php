<?php
/**
 * Runs when the plugin is deleted from the WordPress admin.
 * Removes the pages the plugin created and resets the front-page setting.
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$pages = get_posts( array(
	'post_type'   => 'page',
	'post_status' => 'any',
	'numberposts' => -1,
	'meta_key'    => '_a24_file',
	'fields'      => 'ids',
) );

foreach ( $pages as $page_id ) {
	wp_delete_post( $page_id, true );
}

// Reset the front page so the site doesn't 404 on the homepage.
if ( (int) get_option( 'page_on_front' ) && ! get_post( (int) get_option( 'page_on_front' ) ) ) {
	update_option( 'show_on_front', 'posts' );
	update_option( 'page_on_front', 0 );
}
