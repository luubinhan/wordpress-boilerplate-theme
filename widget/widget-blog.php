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
			'classname'   => 'widget_blog', 
			'description' => __('Display posts from a category ')
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
	
	function update( $new,$old ) {
		$instance = $old;
		$instance['title'] = strip_tags($new['title']);
		// Posts
		$instance['posts_thumb'] = $new['posts_thumb']?1:0;
		$instance['posts_category'] = $new['posts_category']?1:0;
		$instance['posts_date'] = $new['posts_date']?1:0;
		$instance['posts_num'] = strip_tags($new['posts_num']);
		$instance['posts_cat_id'] = strip_tags($new['posts_cat_id']);
		$instance['posts_orderby'] = strip_tags($new['posts_orderby']);
		$instance['posts_time'] = strip_tags($new['posts_time']);
        return $instance;
	}
	
	function form( $instance ) {
		// Default widget settings
		$defaults = array(
			'title'          => '',
			// posts
			'posts_thumb'    => 1,
			'posts_category' => 1,
			'posts_date'     => 1,
			'columns'        => 1,
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
		<!-- Columns Option -->
		<p>
			<label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e('Columns'); ?></label>

			<select name="<?php echo $this->get_field_name('columns'); ?>" id="<?php echo $this->get_field_id('columns'); ?>" class="widefat">
			<?php
				$radios = array(2,3,4,6);
				foreach ($radios as $radio1) {
					echo '<option value="' . $radio1 . '" id="' . $radio1 . '"', $instance['columns'] == $radio1 ? ' selected="selected"' : '', '>', $radio1, '</option>';
				}
			?>
			</select>
		</p>
		<h4>List Posts</h4>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('posts_thumb') ); ?>" name="<?php echo esc_attr( $this->get_field_name('posts_thumb') ); ?>" <?php checked( (bool) $instance["posts_thumb"], true ); ?>>
			<label for="<?php echo esc_attr( $this->get_field_id('posts_thumb') ); ?>">Show thumbnails</label>
		</p>	
		<p>
			<label style="width: 55%; display: inline-block;" for="<?php echo esc_attr( $this->get_field_id("posts_num") ); ?>">Items to show</label>
			<input style="width:20%;" id="<?php echo esc_attr( $this->get_field_id("posts_num") ); ?>" name="<?php echo esc_attr( $this->get_field_name("posts_num") ); ?>" type="text" value="<?php echo absint($instance["posts_num"]); ?>" size='3' />
		</p>
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
		
		<hr>
		<h4>Post Info</h4>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('posts_category') ); ?>" name="<?php echo esc_attr( $this->get_field_name('posts_category') ); ?>" <?php checked( (bool) $instance["posts_category"], true ); ?>>
			<label for="<?php echo esc_attr( $this->get_field_id('posts_category') ); ?>">Show categories</label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('posts_date') ); ?>" name="<?php echo esc_attr( $this->get_field_name('posts_date') ); ?>" <?php checked( (bool) $instance["posts_date"], true ); ?>>
			<label for="<?php echo esc_attr( $this->get_field_id('posts_date') ); ?>">Show dates</label>
		</p>

		<hr>
	</div><!-- widget-admin-dev -->			
<?php
	}
}

register_widget( 'Dev_Blog' );
?>
