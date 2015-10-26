<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
global $wp_query;
$total_results = $wp_query->found_posts;

?>
<?php get_header(); ?>  

  <?php if (have_posts()) : ?>

    <h1 class="search-title">
      <?php _e( sprintf("Your search for '%s'",get_search_query() ) ); ?>
      <span>
        <?php _e( sprintf("%s results", $total_results ) );  ?>
      </span>
    </h1>
    <div class="search-posts">
      <?php 
        do_action( 'before_blog_post' );
        while (have_posts()) : the_post();  
          get_template_part("content","post");
        endwhile; 
        do_action( 'after_blog_post' );
      ?>
    </div><!-- search-posts -->
  <?php else : ?>
    <div class="no-post-found">
      <?php _e('No posts found. Try a different search?' ); ?>    
    </div>
  <?php endif; ?>
<?php get_footer(); ?>
