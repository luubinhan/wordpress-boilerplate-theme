<?php  
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php  
	$class_name = 'item-post clearfix ';
	$cols_num = ot_get_option('columns_blog');
	switch ($cols_num) {
		case '1':
			$class_name .= 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
			break;		
		case '2':
			$class_name .= 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
			break;
		case '3':
			$class_name .= 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
			break;
		case '4':
			$class_name .= 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
			break;
	}
?>
<div <?php post_class($class_name) ?> id="post-<?php the_ID(); ?>"> 
	<?php $thumbnail_on_off = ot_get_option('thumbnail_on_off'); ?>
	<?php if (has_post_thumbnail() && $thumbnail_on_off == 'on'): ?>
		<div class="the-post-thumbnail">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</div>
	<?php endif; ?>
	<div class="the-post-content">
  		<h2 class="heading-post"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-meta">
			<div class="post-date">
				<?php $date_format = get_option( 'date_format' ); ?>
            	<time datetime="<?php the_time('Y-m-d')?>"><?php the_time($date_format); ?></time>  
			</div> <!-- post-date -->
			<div class="post-category">
				<?php the_category(' | ') ?>			
			</div>
		</div> <!-- post-meta -->
		<div class="post-excert">		
			<?php 
			$max_length = ot_get_option('excerpt_length');
			the_excerpt_max_charlength($max_length); 
			?>
		</div>
	</div>
</div>
