<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  	
  
    <div <?php post_class('page-container') ?> id="post-<?php the_ID(); ?>">   
      <h1 class="page-title"><?php the_title(); ?></h1>
      <div class="page-content">
        <?php the_content(); ?>  
      </div> <!-- page-content -->     
    </div><!-- page-container -->

  <?php endwhile; endif; ?>   
  <?php dynamic_sidebar('sidebar-1'); ?>
<?php get_footer(); ?>
