<?php

/**
 * Theme setup.
 */
function receitasdoparaiso_theme_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'receitasdoparaiso_theme_setup' );

/**
 * Enqueue theme assets.
 */
function receitasdoparaiso_theme_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', receitasdoparaiso_theme_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', receitasdoparaiso_theme_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'receitasdoparaiso_theme_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function receitasdoparaiso_theme_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function receitasdoparaiso_theme_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'receitasdoparaiso_theme_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function receitasdoparaiso_theme_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'receitasdoparaiso_theme_nav_menu_add_submenu_class', 10, 3 );

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );

/**
* Admin footer modification
*/
function remove_footer_admin() {
    echo '<span id="footer-thankyou">Powered by Receitas do Paraíso</span>';
}
 
add_filter('admin_footer_text', 'remove_footer_admin');

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
 * Move sales flash to price item
 */
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6);

/**
* Declaring WooCommerce support in themes
*/
function receitasdoparaiso_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 600,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'receitasdoparaiso_add_woocommerce_support' );

/**
* Enable product gallery features (zoom, swipe, lightbox)
*/
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/**
* Disable html tab text-editor
*/

function my_editor_settings($settings) {
	$settings['quicktags'] = false;
	return $settings;
}

add_filter('wp_editor_settings', 'my_editor_settings');

/**
* Disable Media Buttons
*/

function RemoveAddMediaButtonsForNonAdmins(){
    remove_action( 'media_buttons', 'media_buttons' );
}
add_action('admin_head', 'RemoveAddMediaButtonsForNonAdmins');


/**
* Includes
*/

require 'inc/recipes/recipes-functions.php';
require 'inc/woocommerce/woocommerce-functions.php';

/**
* Activate WordPress Maintenance Mode	
*/
// function wp_maintenance_mode() {
// 	if (!current_user_can('edit_themes') || !is_user_logged_in()) {
// 		wp_die('<h1>Em desenvolvimento</h1>');
// 	}
// }

// add_action('get_header', 'wp_maintenance_mode');

/**
* Favicon
*/

function add_my_favicon() {
	$favicon_path = get_template_directory_uri() . '/assets/favicon/';
	
 	echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url($favicon_path) . 'apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32"  href="' . esc_url($favicon_path) . 'favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="' . esc_url($favicon_path) . 'favicon-16x16.png" />
	<link rel="manifest" href="' . esc_url($favicon_path) . 'site.webmanifest" />';
 }
 
 add_action( 'wp_head', 'add_my_favicon' ); //front end
 add_action( 'admin_head', 'add_my_favicon' ); //admin end



