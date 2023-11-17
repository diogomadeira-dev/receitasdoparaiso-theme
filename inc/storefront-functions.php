<?php

/**
 * Dequeue the Storefront Parent theme core CSS
 */
// function theme_enqueue_styles() {
//     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
//     wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/css/app.css', array( 'parent-style' ) );
// }
// add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX);

/**
* remove storefront sidebar
*/
function remove_storefront_sidebar() {
	if ( is_woocommerce() ) {
		remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
	}
}
add_action( 'get_header', 'remove_storefront_sidebar' );

/**
* @snippet Remove "Default Sorting" Dropdown @ WooCommerce Shop & Archive Pages
*/
function remove_default_sorting_storefront() {
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
 }
 add_action( 'init', 'remove_default_sorting_storefront' );