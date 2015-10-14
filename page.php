<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
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

<?php get_footer(); ?>
