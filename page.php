<?php
/**
 * @package MyStyle
 */

get_header(); ?>

<div id="main" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class('page-container') ?> id="post-<?php the_ID(); ?>">   
    <h2><?php the_title(); ?></h2>
    <div class="page-content">
      <?php the_content(); ?>  
    </div> <!-- page-content -->     
  </div><!-- page-container -->
  <?php endwhile; endif; ?>
  <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

  <?php comments_template(); ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
