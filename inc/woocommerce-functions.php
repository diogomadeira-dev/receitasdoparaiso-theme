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
