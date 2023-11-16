<?php 

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
		'taxonomies'            => array( 'category', 'ingredientes' ),
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

/**
* Receitas Meta-Box
*/

function receitas_per_page( $query ) {
	if ( $query->is_archive('receitas') ) {
		set_query_var('posts_per_page', 4);
	}
}
add_action( 'pre_get_posts', 'receitas_per_page' );

/**
* Receitas Meta-Box
*/

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

/**
* Receita Informação Custom Taxonomy
*/

class InformaçãoMetabox {

private $screens = array('receitas');

private $fields = array(
	array(
	'label' => 'Dificuldade',
	'id' => 'select_dificuldade',
	'type' => 'select',
	'options' => array(
		'Muito Fácil',
		'Fácil',
		'Intermédio',
		'Difícil',
		'Muito Difícil',
	),
	),
	array(
	'label' => 'Tempo de preparação (min)',
	'id' => 'number_tempodepreparação',
	'type' => 'number',
	),
	array(
	'label' => 'Tempo total (min)',
	'id' => 'number_tempototal',
	'type' => 'number',
	),
	array(
	'label' => 'Porções',
	'id' => 'number_porções',
	'type' => 'number',
	)  
);

public function __construct() {
	add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
	add_action( 'save_post', array( $this, 'save_fields' ) );
}

public function add_meta_boxes() {
	foreach ( $this->screens as $s ) {
	add_meta_box(
		'Informação',
		__( 'Informação', 'details' ),
		array( $this, 'meta_box_callback' ),
		$s,
		'normal',
		'default'
	);
	}
}

public function meta_box_callback( $post ) {
	wp_nonce_field( 'Informação_data', 'Informação_nonce' ); 
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
		case 'select':
		$input = sprintf(
		'<select id="%s" name="%s">',
		$field['id'],
		$field['id']
		);
		foreach ( $field['options'] as $key => $value ) {
		$field_value = !is_numeric( $key ) ? $key : $value;
		$input .= sprintf(
			'<option %s value="%s">%s</option>',
			$meta_value === $field_value ? 'selected' : '',
			$field_value,
			$value
		);
		}
		$input .= '</select>';
		break;

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
	if ( !isset( $_POST['Informação_nonce'] ) ) {
	return $post_id;
	}
	$nonce = $_POST['Informação_nonce'];
	if ( !wp_verify_nonce( $nonce, 'Informação_data' ) ) {
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

if (class_exists('InformaçãoMetabox')) {
new InformaçãoMetabox;
};


/**
* Ingredientes Custom Taxonomy
*/

function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Ingredientes', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Ingrediente', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Ingredientes', 'text_domain' ),
		'all_items'                  => __( 'Todos os Ingredientes', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Sem resultados', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'taxonomy', array( 'receitas' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );

// ! ADICIONAR QUANTIDADE DO INGREDIENTE E UNIDADE DE MEDIDA

