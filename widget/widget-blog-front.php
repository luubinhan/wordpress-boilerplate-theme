<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}

$numberOfPosts = $instance["numberOfPosts"]; 
$columns = $instance["columns"]; 

$args = array(	
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'order'          => 'DESC',
	'orderby'        => 'date',
	'posts_per_page' => $numberOfPosts,
	'nopaging'       => true,
);

$class_name = "col-xs-12 col-sm-6 col-md-4";

switch ($columns) {
	case 2:
		$class_name = "col-xs-12 col-sm-6 col-md-6";
		break;
	case 3:
		$class_name = "col-xs-12 col-sm-6 col-md-3";
		break;
	case 4:
		$class_name = "col-xs-12 col-sm-6 col-md-4";
		break;
	case 6:
		$class_name = "col-xs-6 col-sm-3 col-md-2";
		break;
	
}

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
?>
<ul class="ul-posts">
	<?php while($query->have_posts): the_post(); ?>
	<li class="<?php echo $class_name; ?>" id="post-<?php the_ID(); ?>">
		<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
		<div class="post-meta">
			<div class="post-date">
				<time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time>
			</div> <!-- post-date -->
			<div class="post-category">
	  			<?php the_category(' | ') ?>			
	  		</div>
  		</div> <!-- post-meta -->
		<div class="post-excert">
			<?php the_excerpt_max_charlength(140); ?>
		</div><!-- post-excert -->
	</li>
	<?php endwhile; ?>
</ul>
<?php endif; wp_reset_query(); ?>
