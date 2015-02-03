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
    <link rel="shortcut icon" href="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"]; ?>images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"]; ?>images/favicon.ico" type="image/x-icon">
    
    <!-- REGISTER STYLESHEET -->
    <?php wp_register_style( "style", $GLOBALS["TEMPLATE_RELATIVE_URL"]."style.css" ); ?>
    <!-- END of REGISTER STYLESHEET -->
    
    <!-- REGISTER JAVASCRIPT -->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
    <?php wp_register_script( "modernizr", $GLOBALS["TEMPLATE_RELATIVE_URL"]."js/vendor/modernizr-2.6.1.min.js" ); ?>
    <?php wp_register_script( "modernizr", $GLOBALS["TEMPLATE_RELATIVE_URL"]."js/plugins.js" ); ?>
    <?php wp_register_script( "modernizr", $GLOBALS["TEMPLATE_RELATIVE_URL"]."js/main.js" ); ?>
    <!-- END of REGISTER JAVASCRIPT --> 

    <!-- Wordpress Head Items -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
  <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
  <![endif]-->

  <div id="container">
    <header role="banner">
      <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?> <img src="<?php echo ot_get_option('site_logo'); ?>" alt=""></a></h1>
      <p class="description"><?php bloginfo('description'); ?></p>
    </header>
<?php  
  $mystyle_social_links = ot_get_option('mystyle_social_links');
  echo $mystyle_social_links['facebook'];
?>
<!-- MENU -->
<?php 
  if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
    $args = array(
      'theme_location' => 'primary-menu',
      'container'      => false,
      'menu'           => 'primary-menu',                
      'menu_class'     => '',
      'depth'          => 1
    );
    wp_nav_menu( $args );
  };  
?>  
<!-- END of MENU -->