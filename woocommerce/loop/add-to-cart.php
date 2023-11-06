<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$button_classes = 'h-10 px-4 py-2 bg-neutral-200 text-secondary hover:bg-neutral-300 text-sm font-medium';

echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf(
		'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		// esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		esc_attr( $button_classes ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	),
	$product,
	$args
);

// $button_classes = 'bg-blue-500 text-white py-2 px-4 rounded';
// $quantity = isset( $args['quantity'] ) ? $args['quantity'] : 1;
// $button_text = esc_html( $product->add_to_cart_text() );

// echo apply_filters(
//     'woocommerce_loop_add_to_cart_link',
//     sprintf(
//         '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
//         esc_url( $product->add_to_cart_url() ),
//         esc_attr( $quantity ),
//         esc_attr( $button_classes ),
//         isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
//         $button_text
//     ),
//     $product,
//     $args
// );
