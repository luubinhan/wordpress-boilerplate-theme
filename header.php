<?php
/**
 * @package MyStyle
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
       Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">    

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="icon" href="<?php echo ot_get_option('site_favicon') ?>" type="image/x-icon">
    
    
    <?php 
      // = REGISTER STYLESHEET =
      wp_enqueue_style( "bootstrap-style", "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" );       
      wp_enqueue_style( "style", $GLOBALS["TEMPLATE_RELATIVE_URL"]."style.css" ); 
      wp_enqueue_style( "style-responsive", $GLOBALS["TEMPLATE_RELATIVE_URL"]."style-responsive.css" ); 
    ?>
    

    <?php 
      // = REGISTER JAVASCRIPT =
      wp_enqueue_script( "modernizr", "https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" ); 
      wp_enqueue_script( "bootstrap-script", "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js","jquery","", true ); 
      wp_enqueue_script( "parsley-script", "https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.3.5/parsley.min.js","jquery","", true ); 
      
      wp_enqueue_script( "main", $GLOBALS["TEMPLATE_RELATIVE_URL"]."js/main.js","jquery","", true );
      
    ?>
    
    <!-- END of REGISTER JAVASCRIPT --> 

    <?php  
      /* 
        Enqueue Script And CSS
        Docs: https://github.com/kenwheeler/slick
        Demo: http://kenwheeler.github.io/slick/
      */
      wp_enqueue_style( "slick-style", "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css","style" ); 
      wp_enqueue_style( "slick-theme-style", "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css","style" ); 
      wp_enqueue_style( "recent-post-style", $GLOBALS["TEMPLATE_RELATIVE_URL"]."css/recent-post-slider/recent-post-style.css","style" ); 
       
      wp_enqueue_script( "slick-script", "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js",array("jquery", "main" ),"", true ); 
    ?>

    <!-- Wordpress Head Items -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <?php wp_head(); ?>

</head>
<body <?php body_class('mystyle'); ?>>
  <!--[if lt IE 8]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
  <![endif]-->
  <div class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?> <img src="<?php echo ot_get_option('site_logo'); ?>" alt=""></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <!-- MENU -->
        <?php 
          if ( has_nav_menu( 'primary-menu' ) ) {
            $args = array(
              'theme_location' => 'primary-menu',
              'container'      => false,
              'menu'           => 'primary-menu',                      
              'depth'          => 2,
              'menu_class'     => 'nav navbar-nav',
              'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
              'walker'         => new wp_bootstrap_navwalker()
            );
            wp_nav_menu( $args );
          };  
        ?>  
        <?php get_search_form(); ?>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </div><!-- navbar-default -->
  <div id="container" class="container">    


<!-- END of MENU -->
