<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
$partners_gallery = ot_get_option('partners_gallery');
?>
<?php if ( !empty($partners_gallery) ): ?>
	<nav id="service_nav">
		<?php  
			
			$crpw_args=array(
				'post_status'  => 'publish',
				'post_type'    => 'service',		   
				'showposts'    => 20,
				'order' => 'ASC'					
			);
			$crp_widget = null;
			$crp_widget = new WP_Query($crpw_args);

			$service_page = get_page_link( ot_get_option('service_page_select') );
		?>	
		<div class="split">
			<?php 
			
				while ( $crp_widget->have_posts() )	{
				
					$crp_widget->the_post();			
					?>
					<article id="<?php echo 'service-'. sanitize_title(get_the_title()); ?>" class="split_content">
						<figure class="split_visual left"><?php echo the_post_thumbnail(); ?>	  </figure>
						<div class="content right">
							<h2><?php the_title(); ?></h2>
							<p><?php the_content(); ?></p>
						</div>						
                    </article>
					<?php
				} //end while loop
				wp_reset_query();
			?>	
		</div>
  	</nav>  	
<?php endif ?>