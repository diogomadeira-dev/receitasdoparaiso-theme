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

if ( ! function_exists( 'storefront_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function storefront_cart_link() {
		if ( ! storefront_woo_cart_available() ) {
			return;
		}
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">			
            <label tabindex="0" class="btn btn-ghost btn-circle">
               <div class="indicator">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>           
                  <span class="badge-cart badge-sm indicator-item text-xxs"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
               </div>
            </label>
        </a>
		<?php
	}
}

if ( ! function_exists( 'storefront_header_cart' ) ) {
	/**
	 * Display Header Cart
	 *
	 * @since  1.0.0
	 * @uses  storefront_is_woocommerce_activated() check if WooCommerce is activated
	 * @return void
	 */
	function storefront_header_cart() {
		if ( storefront_is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
			?>
		<ul id="site-header-cart" class="site-header-cart w-96 text-right">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php storefront_cart_link(); ?>
			</li>
			<li class="text-left">
				<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
			</li>
		</ul>
			<?php
		}
	}
}

function rceitasdoparaiso_customizer_remove( $wp_customize ) {
	$wp_customize->remove_panel( 'themes' );
}
add_action( 'customize_register', 'rceitasdoparaiso_customizer_remove' );


function disable_all_widgets( $sidebars_widgets ) {
  $sidebars_widgets = array( false );

  return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'disable_all_widgets' );


function rceitasdoparaiso_customize_register( $wp_customize ) {

	$wp_customize->remove_section('custom_css');	
	$wp_customize->remove_section('storefront_layout');	
	$wp_customize->remove_section('storefront_typography');	
	$wp_customize->remove_section('storefront_more');	
	$wp_customize->remove_section( 'static_front_page');
	$wp_customize->remove_section( 'background_image');
	$wp_customize->remove_section( 'header_image');
	$wp_customize->remove_section( 'title_tagline');
	$wp_customize->remove_section( 'storefront_footer');
	$wp_customize->remove_section( 'storefront_buttons');
	// $wp_customize->remove_panel( 'nav_menus');
	// $wp_customize->remove_panel( 'widgets');
}
add_action( 'customize_register', 'rceitasdoparaiso_customize_register', 20 );


// //Remove top level admin menus
// function remove_admin_menus() {
//     remove_menu_page( 'edit-comments.php' );
//     remove_menu_page( 'link-manager.php' );
//     remove_menu_page( 'tools.php' );
//     remove_menu_page( 'plugins.php' );
//     remove_menu_page( 'users.php' );
//     remove_menu_page( 'options-general.php' );
//     remove_menu_page( 'upload.php' );
//     remove_menu_page( 'edit.php' );
//     remove_menu_page( 'edit.php?post_type=page' );
//     remove_menu_page( 'themes.php' );
// }


// //Remove sub level admin menus
// function remove_admin_submenus() {
//     remove_submenu_page( 'themes.php', 'theme-editor.php' );
//     remove_submenu_page( 'themes.php', 'themes.php' );
//     remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
//     remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
//     remove_submenu_page( 'edit.php', 'post-new.php' );
//     remove_submenu_page( 'themes.php', 'nav-menus.php' );
//     remove_submenu_page( 'themes.php', 'widgets.php' );
//     remove_submenu_page( 'themes.php', 'theme-editor.php' );
//     remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
//     remove_submenu_page( 'plugins.php', 'plugin-install.php' );
//     remove_submenu_page( 'users.php', 'users.php' );
//     remove_submenu_page( 'users.php', 'user-new.php' );
//     remove_submenu_page( 'upload.php', 'media-new.php' );
//     remove_submenu_page( 'options-general.php', 'options-writing.php' );
//     remove_submenu_page( 'options-general.php', 'options-discussion.php' );
//     remove_submenu_page( 'options-general.php', 'options-reading.php' );
//     remove_submenu_page( 'options-general.php', 'options-discussion.php' );
//     remove_submenu_page( 'options-general.php', 'options-media.php' );
//     remove_submenu_page( 'options-general.php', 'options-privacy.php' );
//     remove_submenu_page( 'options-general.php', 'options-permalinks.php' );
//     remove_submenu_page( 'index.php', 'update-core.php' );
// }

// add_action( 'admin_menu', 'remove_admin_menus' );
// add_action( 'admin_menu', 'remove_admin_submenus' );





