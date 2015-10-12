<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php

// Register widgetized areas
// Get sidebar: dynamic_sidebar('[id]');
if (!function_exists( 'the_widgets_init')) {
	function the_widgets_init() {		
		
	    if ( !function_exists( 'register_sidebar') )
	    return;
	
	    register_sidebar(array( 
			'name'          => 'Primary',
			'id'            => 'primary',
			'description'   => "This sidebar display on Blog List, Blog Single", 
			'before_widget' => '<div id="%1$s" class="widget widget-container %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>'
	    ));
	    register_sidebar(array( 
			'name'          => 'Home',
			'id'            => 'home-primary',
			'description'   => "This sidebar display on Home Page", 
			'before_widget' => '<div id="%1$s" class="widget widget-container %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>'
	    ));    	    
	}
}

add_action( 'init', 'the_widgets_init' );
    
?>