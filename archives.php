<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="main">

  <?php get_search_form(); ?>

    <h2>Archives by Month:</h2>
    <ul>
      <?php wp_get_archives('type=monthly'); ?>
    </ul>

    <h2>Archives by Subject:</h2>
    <ul>
      <?php wp_list_categories(); ?>
    </ul>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
