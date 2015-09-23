<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
  <?php echo ot_get_option('footer_left'); ?>
  <?php echo ot_get_option('footer_right'); ?>
    
</div> <!--! end of #container -->

  <?php if (ot_get_option('google_analytics_id')): ?>
    <script>
      var _gaq=[['_setAccount','<?php echo ot_get_option('google_analytics_id'); ?>'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  <?php endif ?>
 
			   
  <?php wp_footer(); ?>

</body>
</html>
