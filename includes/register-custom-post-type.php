<?php  
if ( ! function_exists('crm_post_type') ) {

// Register Custom Post Type
function crm_post_type() {	

	//MAGAZINE
	$labels_article = array(
		'name'                => _x( 'Services', 'Post Type General Name', 'crm' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'crm' ),
		'menu_name'           => __( 'Services', 'crm' ),
		'parent_item_colon'   => __( 'Page Parent:', 'crm' ),
		'all_items'           => __( 'All Services', 'crm' ),
		'view_item'           => __( 'View Service', 'crm' ),
		'add_new_item'        => __( 'Add New Service', 'crm' ),
		'add_new'             => __( 'Add New', 'crm' ),
		'edit_item'           => __( 'Edit Service', 'crm' ),
		'update_item'         => __( 'Update Service', 'crm' ),
		'search_items'        => __( 'Search Service', 'crm' ),
		'not_found'           => __( 'Not found', 'crm' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'crm' ),
	);
	$args_article = array(
		'label'               => __( 'Service', 'crm' ),
		'description'         => __( 'Service post type', 'crm' ),
		'labels'              => $labels_article,
		'supports'            => array( 'title', 'editor', 'thumbnail',  'revisions' ),		
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	register_post_type( 'service', $args_article );

}

// Hook into the 'init' action
add_action( 'init', 'crm_post_type', 0 );

}

?>