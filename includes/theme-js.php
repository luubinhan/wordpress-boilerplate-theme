<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php
if ( ! is_admin() ) { add_action( 'wp_enqueue_scripts', 'mystyle_add_javascript' ); }

if ( ! function_exists( 'mystyle_add_javascript' ) ) {
	function mystyle_add_javascript() {
		global $woo_options;

		/*wp_register_script( 'prettyPhoto', get_template_directory_uri() . '/includes/js/jquery.prettyPhoto.js', array( 'jquery' ) );*/
		
		/*
		wp_register_script( 'google-maps', 'http://maps.google.com/maps/api/js?sensor=false' );
		wp_register_script( 'google-maps-markers', get_template_directory_uri() . '/includes/js/markers.js' );
		
		// Load Google Script on Contact Form Page Template
		if ( is_page_template( 'template-contact.php' ) ) {
			wp_enqueue_script( 'google-maps' );
			wp_enqueue_script( 'google-maps-markers' );
		} // End If Statement
		*/		
		
		do_action( 'mystyle_add_javascript' );
	} // End mystyle_add_javascript()
}

if ( ! is_admin() ) { add_action( 'wp_print_styles', 'mystyle_add_css' ); }

if ( ! function_exists( 'mystyle_add_css' ) ) {
	function mystyle_add_css () {
		//wp_register_style( 'prettyPhoto', get_template_directory_uri().'/includes/css/prettyPhoto.css' );
	
		do_action( 'mystyle_add_css' );
	} // End mystyle_add_css()
}

add_action('wp_head','html5_shiv');
function html5_shiv() {
	echo '<!--[if lte IE 8]>';
	echo '<script src="' . esc_url( 'https://html5shiv.googlecode.com/svn/trunk/html5.js' ) . '"></script>'. "\n";
	echo '<![endif]-->';
}
?>