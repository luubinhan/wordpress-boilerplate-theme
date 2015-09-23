<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php get_header(); ?>

<div id="main" role="main">
  <?php if (have_posts()) : ?>
    <?php 
      while (have_posts()) : the_post(); 
        get_template_part('content','post');
      endwhile; 
    ?>
    <div><?php next_posts_link('&laquo; Older Entries') ?></div>
    <div><?php previous_posts_link('Newer Entries &raquo;') ?></div>
    
  <?php endif; ?>
</div>
<?php get_footer(); ?>


