<?php

/**
 * Theme setup.
 */
function receitasdoparaiso_theme_setup() {
	add_theme_support( 'title-tag' );

	// register_nav_menus(
	// 	array(
	// 		'primary' => __( 'Primary Menu', 'tailpress' ),
	// 	)
	// );

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

    wp_enqueue_style('tailpress-child', receitasdoparaiso_theme_asset('css/app.css'), array(), $theme->get('Version'));
    wp_enqueue_script('tailpress-child', receitasdoparaiso_theme_asset('js/app.js'), array(), $theme->get('Version'));
}

add_action( 'wp_enqueue_scripts', 'receitasdoparaiso_theme_enqueue_scripts', PHP_INT_MAX );

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

/* Redirect /loja1 TO /loja */
function wpc_shop_url_redirect() {
    if(strpos($_SERVER['REQUEST_URI'], 'loja1') !== false){
        wp_redirect( home_url( '/loja/' ) );
        exit();
    }
}
add_action( 'template_redirect', 'wpc_shop_url_redirect' );

/**
* Includes
*/

require 'inc/woocommerce-functions.php';
require 'inc/storefront-functions.php';

/**
* Admin footer modification
*/
function remove_footer_admin() {
	$theme = wp_get_theme();

	echo '<span id="footer-thankyou">Powered by Receitas do Paraíso - Versão ' . $theme->get('Version') . '</span>';
}
 
add_filter('admin_footer_text', 'remove_footer_admin');


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
	$favicon_path = get_stylesheet_directory_uri() . '/assets/favicon/';
	
 	echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url($favicon_path) . 'apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32"  href="' . esc_url($favicon_path) . 'favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="' . esc_url($favicon_path) . 'favicon-16x16.png" />
	<link rel="manifest" href="' . esc_url($favicon_path) . 'site.webmanifest" />';
 }
 
 add_action( 'wp_head', 'add_my_favicon' ); //front end
 add_action( 'admin_head', 'add_my_favicon' ); //admin end


/**
* Disable Gutenberg for receitas post type
*/
function prefix_disable_gutenberg($current_status, $post_type) {
    if ($post_type === 'receitas') return false;
    return $current_status;
}
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);


/**
* Set new admin theme
*/
function receitas_do_paraiso_admin_color_scheme() {
	//Get the theme directory
	$theme_dir = get_stylesheet_directory_uri();

	//Receitas do Paraíso
	wp_admin_css_color( 'receitas_do_paraiso', __( 'Receitas do Paraíso' ),
		$theme_dir . '/css/admin.css',
		array( '#242424', '#fff', '#fb9819' , '#ec7418')
	);
}
add_action('admin_init', 'receitas_do_paraiso_admin_color_scheme');

/**
* Disable admin color picker for admin
*/
function admin_color_scheme() {
	global $_wp_admin_css_colors;
	$_wp_admin_css_colors = 0;
 }
 add_action('admin_head', 'admin_color_scheme');

/**
* Set default admin color picker for admin
*/
function update_user_option_admin_color( $color_scheme ) {
    $color_scheme = 'receitas_do_paraiso';

    return $color_scheme;
}
add_filter( 'get_user_option_admin_color', 'update_user_option_admin_color', 5 );

/*
 ==================
 Simple Ajax Search
======================   
*/
// add the ajax fetch js
add_action( 'wp_footer', 'fetch_ajax' );
function fetch_ajax() {
?>
<script type="text/javascript">
function fetch(){

	jQuery('#loading-spinner').show();
	jQuery('#search-content').hide();

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
        success: function(data) {
			jQuery('#loading-spinner').hide();
			jQuery('#search-content').show();
            jQuery('#datafetch').html( data );
        },
		error: function () {
			jQuery('#loading-spinner').hide();
			jQuery('#search-content').hide();
		}
    });

}
</script>

<?php
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');


function data_fetch(){

    $the_query = new WP_Query( 
		array(
			'posts_per_page' => -1, 
			's' => esc_attr( $_POST['keyword'] ), 
			'post_type' => array('receitas') 
		) 
	);
    if( $the_query->have_posts() ) :?>
	  <p id="loading-spinner">loading...</p>
      <ul id="search-content" class="overflow-y-scroll">
      	<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
            <li><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></li>
        <?php endwhile; ?>
     </ul>
	<?php else : ?>
		
		<p>sem resultados</p>

       <?php wp_reset_postdata();  
    endif;

    die();
}



function rp_options($atts) {
    $atts = shortcode_atts(array(
        'key' => '', 
    ), $atts, 'rp_options');

    $options = get_option('wp_react_plugin_boilerplate_options');

    if (is_array($options) && !empty($atts['key']) && isset($options[$atts['key']])) {
        $value = $options[$atts['key']];
    } else {
        $value = 'Value not found';
    }

    return $value;
}

add_shortcode('rp_options', 'rp_options');