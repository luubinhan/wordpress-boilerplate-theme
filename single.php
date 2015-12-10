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
        <div class="social-link-container">
          <a target="_blank"  href="mailto:?subject=<?php echo urlencode(get_the_title()) ; ?>&amp;body=Check out this site <?php the_permalink(); ?>" class="s-link s-email"></a>
          <a target="_blank"  href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&ptitle=<?php the_title(); ?>" class="s-link s-facebook"></a>
          <a target="_blank"  href="http://twitter.com/share?text=<?php echo urlencode(get_the_title()) ; ?>&url=<?php the_permalink(); ?>" class="s-link s-twitter"></a>
          <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php echo urlencode(get_the_title()) ; ?>" class="s-link s-pinterest"></a>
        </div><!-- social-link-container -->
        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
        <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count"></div>
      </div><!-- social-media-bar -->
      <!-- for Facebook -->          
      <meta property="og:title" content="<?php echo urlencode(get_the_title()) ; ?>" />
      <meta property="og:type" content="article" />
      
      <meta property="og:url" content="<?php the_permalink(); ?>" />
      <meta property="og:description" content="<?php the_excerpt(); ?>" />

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
