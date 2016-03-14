<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php
/*---------------------------------------------------------------------------------*/
/* Related Post By Category Widget */
/*---------------------------------------------------------------------------------*/
class Dev_Related_Post extends WP_Widget {
			
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'widget_related_post', 
			'description' => __('Display related posts from a category')
		);
		parent::__construct( false, __( 'Dev :: Related Post', '' ), $widget_ops );    	
	}

	function widget($args, $instance) {
           
			extract( $args );		
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Dev :: Related Post' : $instance['title'], $instance, $this->id_base);
			
			echo $before_widget;
			// Widget title
			echo $before_title;
			echo $instance["title"];		
			echo $after_title;	

				include( locate_template('widget/widget-related-post-front.php') );

			echo $after_widget;
	}
	
	function update( $new,$old ) {
		$instance = $old;
		$instance['title'] = strip_tags($new['title']);
		$instance['posts_num'] = strip_tags($new['posts_num']);
        return $instance;
	}
	
	function form( $instance ) {
		// Default widget settings
		$defaults = array(
			'title'          => '',
			'posts_num'      => '4',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );		
?>
	<div class="widget-admin-dev">
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">Title:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance["title"] ); ?>" />
		</p>
		<p>
			<label style="width: 55%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_num") ); ?>">Items to show</label>
			<input style="width:20%;" id="<?php echo esc_attr( $this->get_field_id("posts_num") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_num") ); ?>" type="text" value="<?php echo absint($instance["posts_num"]); ?>" size='3' />
		</p>
	</div><!-- widget-admin-dev -->			
<?php
	}
}

register_widget( 'Dev_Related_Post' );
?>
