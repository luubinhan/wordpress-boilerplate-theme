<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

global $post;
$cates = wp_get_post_categories($post->ID);

$class_name = "rpwe-clearfix clearfix grid-item ";
$args = array(
		'category__in'				=> $cates,
		'numberposts'				=> $instance['posts_num'],
		'post__not_in'				=>  array($post->ID),
	);


$related = get_posts($args);

if (  $related ) :

?>
<div class="rpwe-block">
	<ul class="rpwe-ul clearfix">
		<?php foreach ( $related as $post ): setup_postdata($post); ?>
			<li class="<?php echo $class_name; ?>" id="post-<?php the_ID(); ?>">				
				<h4 class="post-widget-caption"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				<div class="post-meta">
					<div class="post-date">
						<?php $date_format = get_option( 'date_format' ); ?>
						<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time($date_format); ?></time>
					</div> <!-- post-date -->
					<div class="post-category">
			  			<?php the_category(' | '); ?>			
			  		</div>
		  		</div> <!-- post-meta -->
				<div class="post-excert">
					<?php the_excerpt_max_charlength(140); ?>
				</div><!-- post-excert -->
			</li>
		<?php endforeach; wp_reset_postdata();?>
	</ul>
</div>
<?php endif;  ?>
