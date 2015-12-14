<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php get_header(); ?>


  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div <?php post_class('single-post-container') ?> id="post-<?php the_ID(); ?>">
      <h1 class="single-post-title"><?php the_title(); ?></h1>
      <div class="social-media-bar">
        <div class="deal-option-title">
          <?php _e("Deel deze deal","devinition"); ?>
        </div>
        <?php include(locate_template( 'partials-share.php' )); ?>
      </div><!-- social-media-bar -->
     

      <div class="post-meta muted">        
        <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('l, F jS, Y') ?></time>
        at <time><?php the_time() ?></time>
        , <?php the_category(' | ') ?>
      </div><!-- post-meta -->

      <div class="post-content">
        <?php the_content(); ?>
      </div> <!-- post-content -->     

      <?php 
        if ( comments_open() ): 
          comments_template();
        endif;
      ?>

      <div class="paged">
        <div class="next-post">
          <?php next_post_link('%link &raquo;') ?>
        </div>
        <div class="prev-post">
          <?php previous_post_link('&laquo; %link') ?>
        </div>
      </div><!-- paged --> 

    </div><!-- single-post-container -->
  <?php endwhile; endif; ?>
<?php get_footer(); ?>
