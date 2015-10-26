<?php 
if (!defined('ABSPATH')) {
    die('@@'); // Exit if accessed directly
}
?>
<?php get_header(); ?>

<div id="main" role="main">
  <?php if (have_posts()) : ?>
    <?php 
      do_action( 'before_blog_post' );
      while (have_posts()) : the_post(); 
        get_template_part('content','post');
      endwhile; 
      do_action( 'after_blog_post' );
    ?>
    <div><?php next_posts_link('&laquo; Older Entries') ?></div>
    <div><?php previous_posts_link('Newer Entries &raquo;') ?></div>
    
  <?php endif; ?>
</div>
<?php get_footer(); ?>


