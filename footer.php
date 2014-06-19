<?php
/**
 * @package MyStyle
 * @subpackage Devinition
 */
?>

    <p>
      <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
      and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
      <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
    </p>
</div> <!--! end of #container -->

  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>js/vendor/jquery-1.8.0.min.js"><\/script>')</script>

  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/plugins.js") ?>
  <?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/main.js") ?>

  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
			   
  <?php wp_footer(); ?>

</body>
</html>
