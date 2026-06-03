<?php
/**
 * Removes plugin settings on uninstall. Order meta is left intact so
 * historical orders keep their split data.
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

delete_option( 'woocommerce_partial_cod_settings' );
