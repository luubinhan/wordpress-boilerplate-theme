<?php  
if ( ! function_exists('cpt_quote') ) {

// Register Custom Post Type
function cpt_quote() {

	$labels = array(
		'name'                => _x( 'Quote', 'Post Type General Name', 'wise' ),
		'singular_name'       => _x( 'Quote', 'Post Type Singular Name', 'wise' ),
		'menu_name'           => __( 'Quote', 'wise' ),
		'name_admin_bar'      => __( 'Quote', 'wise' ),
		'parent_item_colon'   => __( 'Parent Item:', 'wise' ),
		'all_items'           => __( 'All Items', 'wise' ),
		'add_new_item'        => __( 'Add New Item', 'wise' ),
		'add_new'             => __( 'Add New', 'wise' ),
		'new_item'            => __( 'New Item', 'wise' ),
		'edit_item'           => __( 'Edit Item', 'wise' ),
		'update_item'         => __( 'Update Item', 'wise' ),
		'view_item'           => __( 'View Item', 'wise' ),
		'search_items'        => __( 'Search Item', 'wise' ),
		'not_found'           => __( 'Not found', 'wise' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'wise' ),
	);
	$args = array(
		'label'               => __( 'Quote', 'wise' ),
		'labels'              => $labels,
		'supports'            => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-quote',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'quote', $args );

}
add_action( 'init', 'cpt_quote', 0 );

}
?>