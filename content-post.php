<?php  
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php  
	$class_name = 'item-post clearfix ';
	switch (ot_get_option('columns_blog')) {
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
	<?php if (has_post_thumbnail() && ot_get_option('thumbnail_on_off') == 'on'): ?>
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
			$max_length = !empty( ot_get_option('excerpt_length') ) ? ot_get_option('excerpt_length') : 250;
			the_excerpt_max_charlength($max_length); 
			?>
		</div>
	</div>
</div>
