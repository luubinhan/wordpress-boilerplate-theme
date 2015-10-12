<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php get_header(); ?>

  <div id="main" role="main">
      <h1>Not found</h1>
      <p><span frown>:(</span></p>
  </div>

<?php get_footer(); ?>