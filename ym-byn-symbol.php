<?php

/*
* Plugin Name:       YM BYN Symbol
* Description:       Provides the capability to display the Belarusian ruble symbol on your website.
* Version:           1.0.0
* Requires PHP:      7.0
* Requires at least: 4.6
* Tested up to:      7.0
* Author:            Yan Metelitsa
* Author URI:        https://yanmet.com/
* License:           GPLv3
* License URI:       https://www.gnu.org/licenses/gpl-3.0.html
* Text Domain:       ym-byn-symbol
*/

// Exits if accessed directly.
defined( 'ABSPATH' ) || exit;

// Gets plugin data.
if ( ! function_exists( 'get_plugin_data' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

// Defines Plugin constants.
define( 'YMBYN_PLUGIN_DATA', get_plugin_data( __FILE__, true, false ) );
define( 'YMBYN_ROOT_DIR', plugin_dir_path( __FILE__ ) );
define( 'YMBYN_ROOT_URI', plugin_dir_url( __FILE__ ) );

// Connects styles.
function ymbyn_enqueue_scripts () {
	wp_enqueue_style( 'ymbyn-style', YMBYN_ROOT_URI . 'assets/css/ymbyn.css', [], YMBYN_PLUGIN_DATA[ 'Version' ] );
}
add_action( 'wp_enqueue_scripts', 'ymbyn_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'ymbyn_enqueue_scripts' );

// Modifies WooCommerce Currency symbol.
add_filter( 'woocommerce_currency_symbol', function ( string $currency_symbol, string $currency ) : string {
	return 'BYN' === $currency ? 'BYN' : $currency_symbol;
}, 20, 2 );