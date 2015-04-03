<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php get_header(); ?>  

  <?php if (have_posts()) : ?>

    <h1 class="search-title">Search Results</h1>
    <div class="search-posts">
      <?php while (have_posts()) : the_post(); ?>
        <div class="search-post">
          <h4 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
          <time><?php the_time('l, F jS, Y') ?></time>
          <div >
            <?php the_tags('Tags: ', ', ', '<br />'); ?> 
            Posted in <?php the_category(', ') ?>          
          </div>
          <div class="post-excerpt"><?php the_excerpt(); ?></div>
        </div><!-- search-post-result -->
      <?php endwhile; ?>
    </div><!-- search-posts -->
  <?php else : ?>
    <div class="no-post-found">
      <?php _e('No posts found. Try a different search?' ); ?>    
    </div>
    <?php get_search_form(); ?>
  <?php endif; ?>
<?php get_footer(); ?>
