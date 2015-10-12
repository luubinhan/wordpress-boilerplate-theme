<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php
/*---------------------------------------------------------------------------------*/
/* Recent Products Widget */
/*---------------------------------------------------------------------------------*/
class Dev_Blog extends WP_Widget {
			
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'widget_contact', 
			'description' => __('Dev :: Blog')
		);
		parent::__construct( false, __( 'Dev :: Blog', '' ), $widget_ops );    	
	}

	function widget($args, $instance) {
           
			extract( $args );		
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Dev :: Blog' : $instance['title'], $instance, $this->id_base);
			
			echo $before_widget;
			// Widget title
			echo $before_title;
			echo $instance["title"];		
			echo $after_title;	

				include( locate_template('widget/widget-blog-front.php') );
				
			echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
        return $instance;
	}
	
	function form( $instance ) {
		if( $instance) {
		     $title = esc_attr($instance['title']);		 

		} else {
		     $title = 'Dev :: Blog';	
		}		
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        
<?php
	}
}

register_widget( 'Dev_Blog' );
?>
