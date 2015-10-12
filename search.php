<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php get_header(); ?>  

  <?php if (have_posts()) : ?>

    <h1 class="search-title"><?php _e("Found:"); ?></h1>
    <div class="search-posts">
      <?php 
        while (have_posts()) : the_post();  
          get_template_part("content","post");
        endwhile; 
      ?>
    </div><!-- search-posts -->
  <?php else : ?>
    <div class="no-post-found">
      <?php _e('No posts found. Try a different search?' ); ?>    
    </div>
    <?php get_search_form(); ?>
  <?php endif; ?>
<?php get_footer(); ?>
