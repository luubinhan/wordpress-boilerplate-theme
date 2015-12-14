<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<div class="social-link-container">
  <a target="_blank"  href="mailto:?subject=<?php echo urlencode(get_the_title()) ; ?>&amp;body=Check out this site <?php the_permalink(); ?>" class="s-link s-email"></a>
  <a target="_blank"  href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&ptitle=<?php the_title(); ?>" class="s-link s-facebook"></a>
  <a target="_blank"  href="http://twitter.com/share?text=<?php echo urlencode(get_the_title()) ; ?>&url=<?php the_permalink(); ?>" class="s-link s-twitter"></a>
  <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php echo urlencode(get_the_title()) ; ?>" class="s-link s-pinterest"></a>
</div><!-- social-link-container -->
<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count"></div>
 <!-- for Facebook -->          
<meta property="og:title" content="<?php echo urlencode(get_the_title()) ; ?>" />
<meta property="og:type" content="article" />

<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:description" content="<?php the_excerpt(); ?>" />