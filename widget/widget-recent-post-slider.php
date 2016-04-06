<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php
/*---------------------------------------------------------------------------------*/
/* Recent Products Widget */
/*---------------------------------------------------------------------------------*/
class Dev_Recent_Posts_Slider extends WP_Widget {
			
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'widget_recent_posts_slider', 
			'description' => __('Display recent posts from a category slider layout')
		);
		$control_options = array(
			'width'  => 750,
			'height' => 350
		);
		parent::__construct( false, __( 'Dev :: Recent posts slider', '' ), $widget_ops, $control_options );    	
	}

	function widget($args, $instance) {
           
			extract( $args );		
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Dev :: Recent posts slider' : $instance['title'], $instance, $this->id_base);
			
			echo $before_widget;
			// Widget title
			echo $before_title;
			echo $instance["title"];		
			echo $after_title;	

				include( locate_template('widget/widget-recent-post-slider-front.php') );

			echo $after_widget;
	}
	
	function update( $new,$old ) {
		$instance = $old;
		$instance['title'] = strip_tags($new['title']);
		// Posts
		$instance['posts_thumb'] = $new['posts_thumb']?1:0;
		$instance['posts_category'] = $new['posts_category']?1:0;
		$instance['posts_date'] = $new['posts_date']?1:0;
		$instance['posts_num'] = strip_tags($new['posts_num']);
		$instance['layout'] = strip_tags($new['layout']);
		$instance['posts_cat_id'] = strip_tags($new['posts_cat_id']);
		$instance['posts_orderby'] = strip_tags($new['posts_orderby']);
		$instance['posts_time'] = strip_tags($new['posts_time']);
        return $instance;
	}
	
	function form( $instance ) {
		// Default widget settings
		$defaults = array(
			'title'          => '',
			'posts_thumb'    => 1,
			'posts_category' => 1,
			'posts_date'     => 1,
			'layout'         => 1,
			'posts_num'      => '4',
			'posts_cat_id'   => '0',
			'posts_orderby'  => 'date',
			'posts_time'     => '0',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );		
?>
	<div class="widget-admin-dev">
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">Title:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance["title"] ); ?>" />
		</p>
		<div class="clearfix">
			<div class="widget-col-1">
				
				<p>
					<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_cat_id") ); ?>">Category:</label>
					<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("posts_cat_id"), 'selected' => $instance["posts_cat_id"], 'show_option_all' => 'All', 'show_count' => true ) ); ?>		
				</p>
				<p style="padding-top: 0.3em;">
					<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_orderby") ); ?>">Order by:</label>
					<select style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id("posts_orderby") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_orderby") ); ?>">
					  <option value="date"<?php selected( $instance["posts_orderby"], "date" ); ?>>Most recent</option>
					  <option value="comment_count"<?php selected( $instance["posts_orderby"], "comment_count" ); ?>>Most commented</option>
					  <option value="rand"<?php selected( $instance["posts_orderby"], "rand" ); ?>>Random</option>
					</select>	
				</p>
				<p style="padding-top: 0.3em;">
					<label style="width: 100%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_time") ); ?>">Posts from:</label>
					<select style="width: 100%;" id="<?php echo esc_attr( $this->get_field_id("posts_time") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_time") ); ?>">
					  <option value="0"<?php selected( $instance["posts_time"], "0" ); ?>>All time</option>
					  <option value="1 year ago"<?php selected( $instance["posts_time"], "1 year ago" ); ?>>This year</option>
					  <option value="1 month ago"<?php selected( $instance["posts_time"], "1 month ago" ); ?>>This month</option>
					  <option value="1 week ago"<?php selected( $instance["posts_time"], "1 week ago" ); ?>>This week</option>
					  <option value="1 day ago"<?php selected( $instance["posts_time"], "1 day ago" ); ?>>Past 24 hours</option>
					</select>	
				</p>
			</div>
			<div class="widget-col-2">
				<p>
					<label style="width: 55%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_num") ); ?>">Items to show</label>
					<input style="width:20%;" id="<?php echo esc_attr( $this->get_field_id("posts_num") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_num") ); ?>" type="text" value="<?php echo absint($instance["posts_num"]); ?>" size='3' />
				</p>
				<p>
					<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('posts_thumb') ); ?>" name="<?php echo esc_attr( $this->get_field_name('posts_thumb') ); ?>" <?php checked( (bool) $instance["posts_thumb"], true ); ?>>
					<label for="<?php echo esc_attr( $this->get_field_id('posts_thumb') ); ?>">Show thumbnails</label>
				</p>
				<p>
					<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('posts_category') ); ?>" name="<?php echo esc_attr( $this->get_field_name('posts_category') ); ?>" <?php checked( (bool) $instance["posts_category"], true ); ?>>
					<label for="<?php echo esc_attr( $this->get_field_id('posts_category') ); ?>">Show categories</label>
				</p>
				<p>
					<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('posts_date') ); ?>" name="<?php echo esc_attr( $this->get_field_name('posts_date') ); ?>" <?php checked( (bool) $instance["posts_date"], true ); ?>>
					<label for="<?php echo esc_attr( $this->get_field_id('posts_date') ); ?>">Show dates</label>
				</p>
			</div><!-- col -->
		</div>		
		<hr>
		<p>
			<label for="<?php echo $this->get_field_id('layout'); ?>"><?php _e('Layout'); ?></label>
			
			<div class="clearfix slider-option-widget">
			<?php
				$radios = array('design-1', 'design-2', 'design-3', 'design-4', 'design-5', 'design-6', 'design-7', 'design-8', 'design-9', 'design-10');
				foreach ($radios as $radio1) {
					echo '<div class="design-col ' . $radio1 . '"><span class="input-name"><input type="radio" name="'.$this->get_field_name('layout').'" value="' . $radio1 . '" id="' . $radio1 . '"', $instance["layout"] == $radio1 ? ' checked="true"' : '', '>', $radio1, '</input></span></div>';
				}
			?>
			</div>
		</p>
	</div><!-- widget-admin-dev -->			
<?php
	}
}

register_widget( 'Dev_Recent_Posts_Slider' );
?>
