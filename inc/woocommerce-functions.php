<?php

/**
* Require WooCommerce to be active and if it isn’t, display the admin notice.
*/
function check_woocommerce_plugin() {
    // Check if WooCommerce is installed and activated
    if (class_exists('WooCommerce')) {
        return true;
    }
    return false;
}

function woocommerce_alert() {
    if (!check_woocommerce_plugin()) {
        add_action('admin_notices', 'woocommerce_not_installed_alert');
    }
}

function woocommerce_not_installed_alert() {
    echo '<div class="error"><p><strong>Alerta:</strong> O plugin WooCommerce não está instalado ou ativado. Instale e active o WooCommerce para utilizar todas as funcionalidades deste tema.</p></div>';
}

add_action('admin_init', 'woocommerce_alert');

/**
 * Disable reviews.
 */
function iconic_disable_reviews() {
	remove_post_type_support( 'product', 'comments' );
}

add_action( 'init', 'iconic_disable_reviews' );

/**
* Hide Added to Cart message in Woocommerce
*/
// add_filter( 'wc_add_to_cart_message_html', '__return_false' );

/**
 * Move sales flash to price item
 */
// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6);

/**
* Declaring WooCommerce support in themes
*/
// function receitasdoparaiso_add_woocommerce_support() {
// 	add_theme_support( 'woocommerce', array(
// 		'thumbnail_image_width' => 600,
// 		'single_image_width'    => 300,

//         'product_grid'          => array(
//             'default_rows'    => 3,
//             'min_rows'        => 2,
//             'max_rows'        => 8,
//             'default_columns' => 4,
//             'min_columns'     => 2,
//             'max_columns'     => 5,
//         ),
// 	) );
// }
// add_action( 'after_setup_theme', 'receitasdoparaiso_add_woocommerce_support' );

/**
* Enable product gallery features (zoom, swipe, lightbox)
*/
// add_theme_support( 'wc-product-gallery-zoom' );
// add_theme_support( 'wc-product-gallery-lightbox' );
// add_theme_support( 'wc-product-gallery-slider' );


/**
*  Show sales schedule on product
*/
function cxc_display_single_sale_price_after_sale_price() {
	global $product;
	if ( is_object( $product ) && $product->is_on_sale() ) {
        $sales_price_from = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );
        $sales_price_to = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
		if ( ! empty( $sales_price_to ) ) {
            $sales_price_date_from = date( "d/m/y", $sales_price_from );
            $sales_price_date_to   = date( "d/m/y", $sales_price_to );
			echo '<p class="font-semibold mb-8">Preço promocional válido de ' . $sales_price_date_from . ' a ' . $sales_price_date_to . '</p>';
		}
	}
}

add_action( 'woocommerce_single_product_summary', 'cxc_display_single_sale_price_after_sale_price', 15 );

 /**
*  WooCommerce Check if User Has Purchased Product
*/  
function bbloomer_user_logged_in_product_already_bought() {
    global $product;
    if ( ! is_user_logged_in() ) return;
    if ( wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) {
       echo '<div><p class="text-sm text-primary">Adquirido</p></div>';
    }
}

add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_user_logged_in_product_already_bought', 30 );

function bbloomer_hide_add_cart_if_already_purchased( $is_purchasable, $product ) {
    if ( wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) {
       $is_purchasable = false;
    }
    return $is_purchasable;
}
 
add_filter( 'woocommerce_is_purchasable', 'bbloomer_hide_add_cart_if_already_purchased', 9999, 2 );



