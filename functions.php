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
* Enable dashicons
*/

function load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'load_dashicons');

/**
* Disable Media Buttons
*/

function RemoveAddMediaButtonsForNonAdmins(){
    remove_action( 'media_buttons', 'media_buttons' );
}
add_action('admin_head', 'RemoveAddMediaButtonsForNonAdmins');

/**
* Register Custom Post Type
*/
function receitas() {

	$labels = array(
		'name'                  => _x( 'Receitas', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Receita', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Receitas', 'text_domain' ),
		'name_admin_bar'        => __( 'Receitas', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todas', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar receita', 'text_domain' ),
		'add_new'               => __( 'Adicionar', 'text_domain' ),
		'new_item'              => __( 'Adicionar receita', 'text_domain' ),
		'edit_item'             => __( 'Editar receita', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Imagem', 'text_domain' ),
		'set_featured_image'    => __( 'Carregar imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Utilzar como imagem', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Receita', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 2,
		'menu_icon'             => 'dashicons-youtube',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'receitas',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'receitas', $args );

}
add_action( 'init', 'receitas', 0 );



// Meta-Box Generator
// How to use: $meta_value = get_post_meta( $post_id, $field_id, true );
// Example: get_post_meta( get_the_ID(), "my_metabox_field", true );

class recipeMetabox {

  private $screens = array('receitas');

  private $fields = array(
    array(
      'label' => 'URL',
      'id' => 'url',
      'type' => 'url',
      ),
    array(
      'label' => 'Date',
      'id' => 'date',
      'type' => 'date',
      )  
  );

  public function __construct() {
    add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
    add_action( 'save_post', array( $this, 'save_fields' ) );
  }

  public function add_meta_boxes() {
    foreach ( $this->screens as $s ) {
      add_meta_box(
        'recipe',
        __( 'Detalhes', 'textdomain' ),
        array( $this, 'meta_box_callback' ),
        $s,
        'normal',
        'default'
      );
    }
  }

  public function meta_box_callback( $post ) {
    wp_nonce_field( 'recipe_data', 'recipe_nonce' ); 
    echo "Detalhes da receita";
    $this->field_generator( $post );
  }

  public function field_generator( $post ) {
    $output = '';
    foreach ( $this->fields as $field ) {
      $label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
      $meta_value = get_post_meta( $post->ID, $field['id'], true );
      if ( empty( $meta_value ) ) {
        if ( isset( $field['default'] ) ) {
          $meta_value = $field['default'];
        }
      }
      switch ( $field['type'] ) {
        default:
          $input = sprintf(
          '<input %s id="%s" name="%s" type="%s" value="%s">',
          $field['type'] !== 'color' ? 'style="width: 100%"' : '',
          $field['id'],
          $field['id'],
          $field['type'],
          $meta_value
        );
      }
      $output .= $this->format_rows( $label, $input );
    }
    echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
  }

  public function format_rows( $label, $input ) {
    return '<div style="margin-top: 10px;"><strong>'.$label.'</strong></div><div>'.$input.'</div>';
  }

  

  public function save_fields( $post_id ) {
    if ( !isset( $_POST['recipe_nonce'] ) ) {
      return $post_id;
    }
    $nonce = $_POST['recipe_nonce'];
    if ( !wp_verify_nonce( $nonce, 'recipe_data' ) ) {
      return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return $post_id;
    }
    foreach ( $this->fields as $field ) {
      if ( isset( $_POST[ $field['id'] ] ) ) {
        switch ( $field['type'] ) {
          case 'email':
            $_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
            break;
          case 'text':
            $_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
            break;
        }
        update_post_meta( $post_id, $field['id'], $_POST[ $field['id'] ] );
      } else if ( $field['type'] === 'checkbox' ) {
        update_post_meta( $post_id, $field['id'], '0' );
      }
    }
  }

}

if (class_exists('recipeMetabox')) {
  new recipeMetabox;
};

      