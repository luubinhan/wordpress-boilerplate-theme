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
		$instance['numberOfPosts'] = strip_tags($new_instance['numberOfPosts']);
		$instance['columns'] = strip_tags($new_instance['columns']);
        return $instance;
	}
	
	function form( $instance ) {
		if( $instance) {
		    $title = esc_attr($instance['title']);		 
		    $select = esc_attr($instance['numberOfPosts']);
		    $columns = esc_attr($instance['columns']);
		} else {
		    $title = 'Dev :: Blog';
		    $select = 1;
		    $columns = 2;
		}		
?>
		<!-- Title Option -->
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<!-- Number of Posts Option -->
        <p>
			<label for="<?php echo $this->get_field_id('numberOfPosts'); ?>"><?php _e('Number of Posts'); ?></label>
			<select name="<?php echo $this->get_field_name('numberOfPosts'); ?>" id="<?php echo $this->get_field_id('numberOfPosts'); ?>" class="widefat">
			<?php
				$options = array(1,2,3,4,5,6,7,8,9,10);
				foreach ($options as $option) {
					echo '<option value="' . $option . '" id="' . $option . '"', $select == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
			?>
			</select>
		</p>

		<!-- Columns Option -->
		<p>
			<label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e('Columns'); ?></label>

			<select name="<?php echo $this->get_field_name('columns'); ?>" id="<?php echo $this->get_field_id('columns'); ?>" class="widefat">
			<?php
				$radios = array(2,3,4,6);
				foreach ($radios as $radio1) {
					echo '<option value="' . $radio1 . '" id="' . $radio1 . '"', $columns == $radio1 ? ' selected="selected"' : '', '>', $radio1, '</option>';
				}
			?>
			</select>
		</p>
        
<?php
	}
}

register_widget( 'Dev_Blog' );
?>
