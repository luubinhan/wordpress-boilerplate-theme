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
class Dev_Services extends WP_Widget {
			
	function Dev_Services() {
    	$widget_ops = array(
			'classname'   => 'widget_services', 
			'description' => __('Services ')
		);
		parent::WP_Widget( false, __( 'Services ', 'devinition' ), $widget_ops );    	
	}

	function widget($args, $instance) {
           
			extract( $args );		
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Services' : $instance['title'], $instance, $this->id_base);
			
			echo $before_widget;
			
			// Widget title	
			if ( $instance["full"] ) {
				echo '<section class="section_block gray overflow marginbottom"><div class="center">';
			} else {
				echo '<section class="section_block gray overflow"><div class="center">';	
			}
			
				echo '<header class="section_header">';
					echo '<h2>';			
						echo $instance["title"];
					echo '</h2>';
				echo '</header>';
			
			// Post list in widget
			if ( $instance["full"] ) {
				include( locate_template('widget/widget-services-full-front.php') );
			} else {
				include( locate_template('widget/widget-services-front.php') );	
			}
			

			echo '</div></section>';
			echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['full'] = strip_tags($new_instance['full']);
        return $instance;
	}
	
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Services';		
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('full'); ?>"><?php _e('Show full post?'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('full'); ?>" name="<?php echo $this->get_field_name('full'); ?>" type="checkbox" cheked="<?php echo ($instance['full'] == true?'true':''); ?>" /></p> 
<?php
	}
}

register_widget( 'Dev_Services' );
?>
