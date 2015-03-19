<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="main">

  <h2>Links:</h2>
  <ul>
    <?php wp_list_bookmarks(); ?>
  </ul>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
