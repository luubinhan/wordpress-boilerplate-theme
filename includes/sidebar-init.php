<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php

// Register widgetized areas

if (!function_exists( 'the_widgets_init')) {
	function the_widgets_init() {
		
		
	    if ( !function_exists( 'register_sidebar') )
	    return;
	
	    register_sidebar(array( 'name' => 'Primary','id' => 'primary','description' => "Normal full width sidebar", 'before_widget' => '<div id="%1$s" class="widget moduletable %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Home Primary','id' => 'home-primary','description' => "", 'before_widget' => '<div id="%1$s" class="%2$s">','after_widget' => '</div>'));
	    register_sidebar(array( 'name' => 'Home Column 1','id' => 'home-column-1','description' => "", 'before_widget' => '<div id="%1$s" class="moduletable %2$s">','after_widget' => '</div>'));
	    register_sidebar(array( 'name' => 'Home Column 2','id' => 'home-column-2','description' => "", 'before_widget' => '<div id="%1$s" class="moduletable %2$s">','after_widget' => '</div>'));
	    register_sidebar(array( 'name' => 'Home Column 3','id' => 'home-column-3','description' => "", 'before_widget' => '<div id="%1$s" class="moduletable %2$s">','after_widget' => '</div>'));
	    
	    // Footer sidebar
	    register_sidebar(array( 'name' => 'Cart Widget Homepage','id' => 'cart-sidebar', 'description' => "Display cart on homepage", 'before_widget' => '<div id="%1$s" class="%2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Footer 1','id' => 'footer-1', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Footer 2','id' => 'footer-2', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Footer 3','id' => 'footer-3', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Footer 4','id' => 'footer-4', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Footer 5','id' => 'footer-5', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Footer 6','id' => 'footer-6', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	}
}

add_action( 'init', 'the_widgets_init' );
    
?>