<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}


$columns = $instance["columns"]; 


$class_name = "widget-li ";

switch ($columns) {
	case 2:
		$class_name .= "col-xs-12 col-sm-6 col-md-6";
		break;
	case 3:
		$class_name .= "col-xs-12 col-sm-6 col-md-3";
		break;
	case 4:
		$class_name .= "col-xs-12 col-sm-6 col-md-4";
		break;
	case 6:
		$class_name .= "col-xs-6 col-sm-3 col-md-2";
		break;	
}
$query = new WP_Query( array(
	'post_type'				=> array( 'post' ),
	'showposts'				=> $instance['posts_num'],
	'cat'					=> $instance['posts_cat_id'],
	'ignore_sticky_posts'	=> true,
	'orderby'				=> $instance['posts_orderby'],
	'order'					=> 'dsc',
	'date_query' => array(
		array(
			'after' => $instance['posts_time'],
		),
	),
) );


if ( $query->have_posts() ) :

?>
<div class="container">
	<ul class="ul-posts row nav">
		<?php while ( $query->have_posts() ): $query->the_post(); ?>
			<li class="<?php echo $class_name; ?>" id="post-<?php the_ID(); ?>">				
				<h4 class="post-widget-caption"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				<div class="post-meta">
					<div class="post-date">
						<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F jS, Y'); ?></time>
					</div> <!-- post-date -->
					<div class="post-category">
			  			<?php the_category(' | '); ?>			
			  		</div>
		  		</div> <!-- post-meta -->
				<div class="post-excert">
					<?php the_excerpt_max_charlength(140); ?>
				</div><!-- post-excert -->
			</li>
		<?php endwhile; wp_reset_query();?>
	</ul>
</div>
<?php endif;  ?>
