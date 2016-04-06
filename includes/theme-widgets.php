<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Load the widgets, with support for overriding the widget via a child theme.
/*-----------------------------------------------------------------------------------*/

$widgets = array(							
	'widget/widget-services.php',
	'widget/widget-socials.php',
	'widget/widget-contact.php',
	'widget/widget-blog.php',
	'widget/widget-recent-post-slider.php',
);
			
foreach ( $widgets as $w ) {
	locate_template( $w, true );
}

/*---------------------------------------------------------------------------------*/
/* Deregister Default Widgets */
/*---------------------------------------------------------------------------------*/
if (!function_exists( 'mystyle_deregister_widgets')) {
	function mystyle_deregister_widgets(){
	    //unregister_widget( 'WP_Widget_Search' );         
	}
}
add_action( 'widgets_init', 'mystyle_deregister_widgets' );  


?>