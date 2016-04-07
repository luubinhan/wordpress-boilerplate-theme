<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}


$layout            = $instance["layout"]; 
$dotsv             = $instance["dotsv"];
$arrowsv           = $instance["arrowsv"];
$speedv            = $instance["speedv"];
$autoplayv         = $instance["autoplayv"];
$autoplayIntervalv = $instance["autoplayIntervalv"];
$showCategory = $instance["posts_category"];
$showDate = $instance["posts_date"];
$showThumb = $instance["posts_thumb"];

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
<div class="recent-post-slider <?php echo $layout; ?>">
	<ul class="ul-posts row nav">
		<?php 
		while ( $query->have_posts() ): $query->the_post(); 
			switch ($layout) {
				case "design-1":
					include( locate_template('widget/widget-recent-post-slider-design-1.php') );
					break;
				case "design-2":
					include( locate_template('widget/widget-recent-post-slider-design-2.php') );
					break;
				case "design-3":
					include( locate_template('widget/widget-recent-post-slider-design-3.php') );
					break;
				case "design-4":
					include( locate_template('widget/widget-recent-post-slider-design-4.php') );
					break;	
				case "design-5":
					include( locate_template('widget/widget-recent-post-slider-design-5.php') );
					break;
				case "design-6":
					include( locate_template('widget/widget-recent-post-slider-design-6.php') );
					break;
				case "design-7":
					include( locate_template('widget/widget-recent-post-slider-design-7.php') );
					break;
				case "design-8":
					include( locate_template('widget/widget-recent-post-slider-design-8.php') );
					break;
				case "design-9":
					include( locate_template('widget/widget-recent-post-slider-design-9.php') );
					break;
				case "design-10":
					include( locate_template('widget/widget-recent-post-slider-design-10.php') );
					break;
			}
		endwhile; 
		wp_reset_query();?>
	</ul>
</div><!-- recent-post-slider -->

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.recent-post-slider.<?php echo $layout; ?>').slick({
			dots: <?php echo $dotsv; ?>,
			infinite: true,
			arrows: <?php echo $arrowsv; ?>,
			speed: <?php echo $speedv; ?>,
			autoplay: <?php echo $autoplayv; ?>,						
			autoplaySpeed: <?php echo $autoplayIntervalv; ?>,
			slidesToShow: 1,
			slidesToScroll: 1,
			responsive: [
				{
				  breakpoint: 768,
				  settings: {
				    slidesToShow: 1,
				    slidesToScroll: 1,
				    infinite: true,
				    dots: true
				  }
				},
				{
				  breakpoint: 640,
				  settings: {
				    slidesToShow: 1,
				    slidesToScroll: 1
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
				    slidesToShow: 1,
				    slidesToScroll: 1
				  }
				}
			]
		});
	});
</script>
<?php endif;  ?>


