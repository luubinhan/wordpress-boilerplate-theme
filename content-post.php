<div <?php post_class() ?> id="post-<?php the_ID(); ?>"> 
  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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
  </div>
</div>
