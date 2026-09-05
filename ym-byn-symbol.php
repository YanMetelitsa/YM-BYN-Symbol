<?php

/*
* Plugin Name:       YM BYN Symbol
* Description:       Automatically adds the new Belarusian ruble currency symbol to your site, with full WooCommerce support and an option for manual use.
* Version:           1.1.0
* Requires PHP:      7.0
* Requires at least: 4.6
* Tested up to:      7.1
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
define( 'YM_BYN_SYMBOL_PLUGIN_DATA', get_plugin_data( __FILE__, true, false ) );
define( 'YM_BYN_SYMBOL_ROOT_DIR',    plugin_dir_path( __FILE__ ) );
define( 'YM_BYN_SYMBOL_ROOT_URI',    plugin_dir_url( __FILE__ ) );


// Connects styles.
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'ym-byn-symbol-style', YM_BYN_SYMBOL_ROOT_URI . 'assets/css/ym-byn-symbol.css', [], YM_BYN_SYMBOL_PLUGIN_DATA[ 'Version' ] );
});
add_action( 'admin_enqueue_scripts', function () {
	wp_enqueue_style( 'ym-byn-symbol-admin-style', YM_BYN_SYMBOL_ROOT_URI . 'assets/css/ym-byn-symbol-admin.css', [], YM_BYN_SYMBOL_PLUGIN_DATA[ 'Version' ] );
});

// Modifies WooCommerce Currency symbol.
add_filter( 'woocommerce_currency_symbol', function ( string $currency_symbol, string $currency ) : string {
	return 'BYN' === $currency ? ( is_admin() ? 'ƃ' : 'BYN' ) : $currency_symbol;
}, 20, 2 );

// Modifies `<body>` class.
function ym_byn_symbol_body_class ( $classes ) {
	if ( class_exists( 'WooCommerce' ) && in_array( get_woocommerce_currency_symbol(), [ 'BYN', 'ƃ' ] ) ) { // phpcs:ignore
		$new_class = 'wc-byn-currency';

		if ( is_array( $classes ) ) {
			$classes[] = $new_class;
		} elseif ( is_string( $classes ) ) {
			$classes .= " {$new_class}";
		}
	}

	return $classes;
}
add_filter( 'body_class',       'ym_byn_symbol_body_class' );
add_filter( 'admin_body_class', 'ym_byn_symbol_body_class' );