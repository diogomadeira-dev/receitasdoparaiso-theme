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
			echo '<p class="text-xs font-semibold mb-8">Preço promocional válido de ' . $sales_price_date_from . ' a ' . $sales_price_date_to . '</p>';
		}
	}
}

add_action( 'woocommerce_single_product_summary', 'cxc_display_single_sale_price_after_sale_price', 15 );

function bbloomer_hide_add_cart_if_already_purchased( $is_purchasable, $product ) {
    if ( wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) {
       $is_purchasable = false;
    }
    return $is_purchasable;
}
 
add_filter( 'woocommerce_is_purchasable', 'bbloomer_hide_add_cart_if_already_purchased', 9999, 2 );

 /**
*  WooCommerce new product badge 90 days
*/   
function receitas_do_paraiso_new_badge_shop_page() {
   global $product;
   $newness_days = 30;
   $created = strtotime( $product->get_date_created() );
   if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
      echo '<span class="itsnew onsale bg-secondary text-white">' . esc_html__( 'Novo!', 'woocommerce' ) . '</span>';
   }
}

add_action( 'woocommerce_after_shop_loop_item_title', 'receitas_do_paraiso_new_badge_shop_page', 3 );

 /**
*  WooCommerce Check if User Has Purchased Product
*/  
// function bbloomer_user_logged_in_product_already_bought() {
//     global $product;
//     if ( ! is_user_logged_in() ) return;
//     if ( wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) {
//         echo '<div role="alert" class="alert">
//             <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
//             <span>Este produto já foi adquirido</span>
//         </div>';
//     }
// }

// add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_user_logged_in_product_already_bought', 30 );


/**
 * Hide loop read more buttons for out of stock items 
 */
if (!function_exists('woocommerce_template_loop_add_to_cart')) {
	function woocommerce_template_loop_add_to_cart() {
		global $product;
		if ( ! $product->is_in_stock() || ! $product->is_purchasable() ) return;
		wc_get_template('loop/add-to-cart.php');
	}
}


// Add custom button for already purchased products on single product page
function add_custom_button_for_purchased_product($price_html, $product) {
    if ( wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) {
        if ( is_product() && ! is_archive() ) {
            $price_html .= '<div role="alert" class="alert my-4 bg-neutral-50 font-medium w-fit h-12 leading-none flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 text-success" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>Este produto já foi adquirido, descarregue <a class="text-underline text-primary" href="/minha-conta/downloads/">aqui</a>.</span>
        </div>';
        } else {
            $price_html .= '<div role="alert" class="alert my-4 bg-neutral-50 font-medium w-fit h-12 leading-none flex mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 text-success" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>Este produto já foi adquirido</span>
        </div>';
        }
    }
    return $price_html;
}

add_filter('woocommerce_get_price_html', 'add_custom_button_for_purchased_product', 10, 2);


/**

 * WebAppick - Set session variable on page load if the query string has coupon_code variable.

 */

function ts_get_custom_coupon_code_to_session() {

if( isset( $_GET[ 'coupon_code' ] ) ) {

     // Ensure that customer session is started

     if( !WC()->session->has_session() )

         WC()->session->set_customer_session_cookie(true);

     // Check and register coupon code in a custom session variable

     $coupon_code = WC()->session->get( 'coupon_code' );

     if( empty( $coupon_code ) && isset( $_GET[ 'coupon_code' ] ) ) {

         $coupon_code = esc_attr( $_GET[ 'coupon_code' ] );

         WC()->session->set( 'coupon_code', $coupon_code ); // Set the coupon code in session

     }

}

}

add_action( 'init', 'ts_get_custom_coupon_code_to_session' );

/**

 * Apply Coupon code to the cart if the session has coupon_code variable.

 */

function ts_apply_discount_to_cart() {

// Set coupon code

$coupon_code = WC()->session->get( 'coupon_code' );

if ( ! empty( $coupon_code ) && ! WC()->cart->has_discount( $coupon_code ) ){

     WC()->cart->add_discount( $coupon_code ); // apply the coupon discount

     WC()->session->__unset( 'coupon_code' ); // remove coupon code from session

}

}

add_action( 'woocommerce_before_cart_table', 'ts_apply_discount_to_cart', 10, 0 );

// carrinho/?coupon_code=bundle10