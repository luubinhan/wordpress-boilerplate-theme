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
				'showposts'    => 20					
			);
			$crp_widget = null;
			$crp_widget = new WP_Query($crpw_args);

			$service_page = get_page_link( ot_get_option('service_page_select') );
		?>
		
		<ul>
			<?php 
			
				while ( $crp_widget->have_posts() )	{
				
					$crp_widget->the_post();			
					?>
					<li>
						<a href="<?php echo $service_page .'#service-'. sanitize_title(get_the_title()); ?>">
							<span>
	                        <?php echo the_post_thumbnail(); ?>	                       
	                        </span>
	                        <?php the_title(); ?>
	                    </a>
                    </li>
					<?php
				} //end while loop
				wp_reset_query();
			?>	
		</ul>
  	</nav>  	
<?php endif ?>