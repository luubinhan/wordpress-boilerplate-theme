<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
  <?php echo ot_get_option('footer_left'); ?>
  <?php echo ot_get_option('footer_right'); ?>
    
</div> <!--! end of #container -->
  <?php $google_analytics_id = ot_get_option('google_analytics_id') ?>
  <?php if ($google_analytics_id): ?>
    <script>
      var _gaq=[['_setAccount','<?php echo $google_analytics_id; ?>'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  <?php endif ?>
 
			   
  <?php wp_footer(); ?>

</body>
</html>
