<?php 
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>

<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<?php dynamic_sidebar( 'primary' ); ?>
<?php get_footer(); ?>