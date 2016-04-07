<?php 
global $separator;
global $parents; 
global $post;
global $post_id;
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post_id) );  ?>  
<div class="post-slides">
	<div class="post-content-position">
		<div class="post-content-left">	
			<?php if($showCategory) { ?>
			<div class="recentpost-categories">		
					<?php echo get_the_category_list( $separator, $parents, $post_id ); ?>
			</div>
			<?php } ?>
		
			<h2 class="wp-post-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
			<?php if($showDate) {  ?>	
				<div class="wp-post-date">					
					<?php echo get_the_date();  ?>
				</div>
			<?php } ?>				
		
			<div class="wp-post-content">
				<div class="wp-sub-content"><?php the_excerpt_max_charlength(140); ?></div>	
			</div>
		</div><!-- post-content-left -->
		<div class="post-image-bg">
			<img src="<?php echo $feat_image; ?>"alt="<?php the_title(); ?>" />
		</div>
	</div><!-- post-content-position -->
</div><!-- post-slides -->