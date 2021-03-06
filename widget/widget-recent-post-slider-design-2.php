  <?php 
global $separator;
global $parents; 
global $post_id;
global $post;
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post_id) ); ?> 
 <div class="post-slides">
	<div class="post-content-position">
	
	<!-- Content-left/right -->
	<div class="post-content-left medium-6 wpcolumns">
		<?php if($showCategory == "true") { ?>
	<div class="recentpost-categories">		
			<?php echo get_the_category_list( $separator, $parents, $post_id ); ?>
		</div>
	<?php } ?>
		  <h2 class="wp-post-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
			<?php if($showDate == "true" || $showAuthor == 'true')    {  ?>	
			<div class="wp-post-date">		
				<?php  if($showAuthor == 'true') { ?> <span><?php  esc_html_e( 'By', 'wp-responsive-recent-post-slider' ); ?> <?php the_author(); ?></span><?php } ?>
				<?php echo ($showAuthor == 'true' && $showDate == 'true') ? '&nbsp;/&nbsp;' : '' ?>
				<?php if($showDate == "true") { echo get_the_date(); } ?>
				</div>
				<?php }   ?>
				<?php if($showContent == "true") {  ?>	
				<div class="wp-post-content">
					<?php
					$customExcerpt = get_the_excerpt();				
					if (has_excerpt($post->ID))  { ?>
						<div class="wp-sub-content"><?php echo $customExcerpt ; ?></div> 
					<?php } else { ?>
					<div class="wp-sub-content"><?php the_excerpt_max_charlength(140); ?></div>					
					<?php } ?>
				</div>
				<?php } ?>
				</div>
				<div class="post-image-bg">
			<img src="<?php echo $feat_image; ?>"alt="<?php the_title(); ?>" />
			</div>
			</div>
	</div>