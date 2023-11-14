<?php

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function enqueue_styles() {
    wp_enqueue_style( 'storefront-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce/woocommerce.css', array( 'storefront-icons' ), '1.0' );
    wp_enqueue_style( 'storefront-child-style', get_stylesheet_directory_uri() . '/style.css', '', '1.0' );
}

add_action( 'wp_enqueue_scripts', 'dequeue_styles', 99 );
function dequeue_styles() {
    wp_dequeue_style( 'storefront-style' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
