<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php get_header(); ?>

  <div class="boo-wrapper">
    <div class="boo-name">
    	<span class="boo-hidden">
    		404
    	</span>
    </div>
    <h1>Whoops!</h1>
    <p>
      We couldn't find the page you
      <br />
      were looking for.
    </p>
    <div class="align-center">
    	<a href="<?php echo get_option('home'); ?>/" class="btn btn-light"><?php _e("Back to home","dev" ); ?></a>
    </div>
</div><!-- boo-wrapper -->

<?php get_footer(); ?>