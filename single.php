<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php get_header(); ?>

<div id="main" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div <?php post_class('single-post-container') ?> id="post-<?php the_ID(); ?>">
      <h2><?php the_title(); ?></h2>
      <div class="post-content">
        <?php the_content(); ?>
      </div> <!-- post-content -->
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>   

      <div>
      This entry was posted by <?php the_author() ?>
      on <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('l, F jS, Y') ?></time>
      at <time><?php the_time() ?></time>
      and is filed under <?php the_category(', ') ?>.
      You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

        <?php if ( comments_open() && pings_open() ) {
          // Both Comments and Pings are open ?>
          You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

        <?php } elseif ( !comments_open() && pings_open() ) {
          // Only Pings are Open ?>
          Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

        <?php } elseif ( comments_open() && !pings_open() ) {
          // Comments are open, Pings are not ?>
          You can skip to the end and leave a response. Pinging is currently not allowed.

        <?php } elseif ( !comments_open() && !pings_open() ) {
          // Neither Comments, nor Pings are open ?>
          Both comments and pings are currently closed.

        <?php } edit_post_link('Edit this entry','','.'); ?>
      </div>
      <div><?php previous_post_link('&laquo; %link') ?></div>
      <div><?php next_post_link('%link &raquo;') ?></div>
      <?php comments_template(); ?>
    </div><!-- single-post-container -->
  <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, no posts founded.' ); ?></p>
  <?php endif; ?>
</div> <!-- #main -->

<?php get_footer(); ?>
