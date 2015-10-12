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
			
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'widget_services', 
			'description' => __('Dev :: Services ')
		);
		parent::__construct( false, __( 'Dev :: Services ', 'devinition' ), $widget_ops );    	
	}

	function widget($args, $instance) {
           
			extract( $args );		
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Dev :: Services' : $instance['title'], $instance, $this->id_base);
			
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
		$instance['layout'] = strip_tags($new_instance['layout']);
		$instance['radio'] = strip_tags($new_instance['radio']);
        return $instance;
	}
	
	function form( $instance ) {
		if( $instance) {
		     $title = esc_attr($instance['title']);		 
		     $select = esc_attr($instance['layout']); // Added
		     $radio = esc_attr($instance['radio']); // Added
		} else {
		     $title = 'News Block';		    
		     $select = ''; // Added
		     $radio = ''; // Added
		}		
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('full'); ?>"><?php _e('Show full post?'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('full'); ?>" name="<?php echo $this->get_field_name('full'); ?>" type="checkbox" cheked="<?php echo ($instance['full'] == true?'true':''); ?>" /></p> 
        <p>
			<label for="<?php echo $this->get_field_id('layout'); ?>"><?php _e('layout'); ?></label>
			<select name="<?php echo $this->get_field_name('layout'); ?>" id="<?php echo $this->get_field_id('layout'); ?>" class="widefat">
			<?php
				$options = array('lorem', 'ipsum', 'dolorem');
				foreach ($options as $option) {
					echo '<option value="' . $option . '" id="' . $option . '"', $select == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
			?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('radio'); ?>"><?php _e('radio'); ?></label>
			
			<?php
				$radios = array('radio1', 'radio2', 'radio3');
				foreach ($radios as $radio1) {
					echo '<input type="radio" name="'.$this->get_field_name('radio').'" value="' . $radio1 . '" id="' . $radio1 . '"', $radio == $radio1 ? ' checked="true"' : '', '>', $radio1, '</input>';
				}
			?>
	
		</p>
<?php
	}
}

register_widget( 'Dev_Services' );
?>
