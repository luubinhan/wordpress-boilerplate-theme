<?php
/**
 * @package MyStyle
 */

/* Load the theme-specific files, with support for overriding via a child theme.
-------------------------------------------------------------- */

$includes = array(
  'includes/sidebar-init.php',      // Initialize widgetized areas
  'includes/theme-widgets.php',     // Theme widgets
  //'includes/custom-post-type/cpt-team.php',
  //'includes/custom-post-type/cpt-portfolio.php',
  //'includes/custom-post-type/cpt-quote.php',
  'includes/wp-bootstrap-navwalker.php',
  'includes/class-tgm-plugin-activation.php',
  //'includes/register-acf-field.php',     // Theme widgets
  //'includes/register-custom-post-type.php',     // Theme widgets
);

foreach ( $includes as $i ) {
  locate_template( $i, true );
}

/* Custom Functions for CSS/Javascript Versioning
-------------------------------------------------------------- */

$GLOBALS["TEMPLATE_URL"] = get_bloginfo('template_url')."/";
$GLOBALS["TEMPLATE_RELATIVE_URL"] = wp_make_link_relative($GLOBALS["TEMPLATE_URL"]);

/* Remove mot so menu
-------------------------------------------------------------- */

function remove_links_menu() {
  /*remove_menu_page('index.php'); // Dashboard
  remove_menu_page('edit.php'); // Posts
  remove_menu_page('upload.php'); // Media
  remove_menu_page('link-manager.php'); // Links
  remove_menu_page('edit.php?post_type=page'); // Pages
  remove_menu_page('edit-comments.php'); // Comments
  remove_menu_page('themes.php'); // Appearance
  remove_menu_page('plugins.php'); // Plugins
  remove_menu_page('users.php'); // Users
  remove_menu_page('tools.php'); // Tools
  remove_menu_page('options-general.php'); // Settings*/
  remove_menu_page('ot-settings.php'); // Settings*/

}
add_action( 'admin_menu', 'remove_links_menu' );

function remove_customize_page(){
  global $submenu;
  unset($submenu['themes.php'][6]); // remove customize link
}
add_action( 'admin_menu', 'remove_customize_page');

/* Remove Post Via Email
-------------------------------------------------------------- */

add_filter( 'enable_post_by_email_configuration', '__return_false' );


/* HIDE ADMIN COLOR SCHEME OPTION FROM USER PROFILE
-------------------------------------------------------------- */

function admin_color_scheme() {
   global $_wp_admin_css_colors;
   $_wp_admin_css_colors = 0;
}
add_action('admin_head', 'admin_color_scheme');


/* REMOVE SCREEN OPTION
-------------------------------------------------------------- */

function remove_screen_options(){
    return false;
}
//add_filter('screen_options_show_screen', 'remove_screen_options');


/* REMOVE WORDPRESS ADMIN BAR
-------------------------------------------------------------- */

function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
    $wp_admin_bar->remove_menu('customize');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );


/* Disable Admin Bar for All Users Except for Administrators
-------------------------------------------------------------- */

function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}
add_action('after_setup_theme', 'remove_admin_bar');


/* DISABLE UPDATE CORE
-------------------------------------------------------------- */

remove_action ('load-update-core.php', 'wp_update_themes');
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

remove_action ('load-update-core.php', 'wp_update_plugins');
add_filter ('pre_site_transient_update_plugins', create_function ('$a', "return null;") );

/*  WordPress add class to parent element if has submenu
-------------------------------------------------------------- */

if ( ! function_exists( 'alx_setup' ) ) {
  
  function alx_setup() {
    // Enable title tag
    add_theme_support( 'title-tag' );
    
    // Enable automatic feed links
    add_theme_support( 'automatic-feed-links' );
    
    // Enable featured image
    add_theme_support( 'post-thumbnails' );    
    
    // Thumbnail sizes
    add_image_size( 'thumb-small', 160, 160, true );
    add_image_size( 'thumb-standard', 320, 320, true );
    add_image_size( 'thumb-medium', 520, 245, true );
    add_image_size( 'thumb-large', 720, 340, true );
    
  }
  
}
add_action( 'after_setup_theme', 'alx_setup' );

/*  WordPress add class to parent element if has submenu
-------------------------------------------------------------- */

function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown';
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );


/*  Remove deskboard widget
-------------------------------------------------------------- */

function remove_dashboard_widgets()  {
    $remove_defaults_widgets = array(
        'dashboard_incoming_links' => array(
            'page'    => 'dashboard',
            'context' => 'normal'
        ),
        'dashboard_right_now' => array(
            'page'    => 'dashboard',
            'context' => 'normal'
        ),
        'dashboard_recent_drafts' => array(
            'page'    => 'dashboard',
            'context' => 'side'
        ),
        'dashboard_quick_press' => array(
            'page'    => 'dashboard',
            'context' => 'side'
        ),
        'dashboard_plugins' => array(
            'page'    => 'dashboard',
            'context' => 'normal'
        ),
        'dashboard_primary' => array(
            'page'    => 'dashboard',
            'context' => 'side'
        ),
        'dashboard_secondary' => array(
            'page'    => 'dashboard',
            'context' => 'side'
        )
    );
 
    foreach ($remove_defaults_widgets as $wigdet_id => $options)  {
        remove_meta_box($wigdet_id, $options['page'], $options['context']);
    }
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets'  );


/*  Remove tags from posts listing screen
-------------------------------------------------------------- */

function wptutsplus_remove_posts_listing_tags( $columns ) {
    unset( $columns[ 'tags' ] );
    unset( $columns[ 'comments' ] );
    unset( $columns['author'] );
    return $columns;
}
add_action( 'manage_posts_columns', 'wptutsplus_remove_posts_listing_tags' );


/*  Remove some column from pages listing screen
-------------------------------------------------------------- */

function pc_my_custom_pages_columns($columns) {
 
  unset( $columns['author'] );
  unset( $columns[ 'comments' ] );
  unset( $columns[ 'date' ] );
 
  return $columns;
} 
add_filter( 'manage_pages_columns', 'pc_my_custom_pages_columns' );

/*  Remove some default widget
-------------------------------------------------------------- */

function pc_unregister_default_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Recent_Comments');
    //unregister_widget('WP_Widget_Text');
}
add_action( 'widgets_init', 'pc_unregister_default_widgets', 11 );


/*  Option Tree Plugin
-------------------------------------------------------------- */

add_filter( 'ot_theme_mode', '__return_true' );
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

// hide ot docs & settings
add_filter( 'ot_show_pages', '__return_false' ); 

// Create Theme Options without using the UI Builder.
require( trailingslashit( get_template_directory() ) . 'includes/theme-options.php' );


/*  Add support for Featured Images
-------------------------------------------------------------- */

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('index-categories', 694, 150, true);
}


/* Register WP Menus 
-------------------------------------------------------------- */

if ( function_exists( 'wp_nav_menu') ) {
  add_theme_support( 'nav-menus' );
  register_nav_menus( array( 'primary-menu' => __( 'Primary Menu', 'devinition' ) ) );
  register_nav_menus( array( 'home-menu' => __( 'Home Menu', 'devinition' ) ) );
}


/* TGM Required
-------------------------------------------------------------- */

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {
  /**
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(
    /** This is an example of how to include a plugin pre-packaged with a theme */
   /* array(
      'name'     => 'TGM Example Plugin', // The plugin name
      'slug'     => 'tgm-example-plugin', // The plugin slug (typically the folder name)
      'source'   => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source
      'required' => false,
    ),*/
    /** This is an example of how to include a plugin from the WordPress Plugin Repository */
    array(
      'name' => 'WP-PageNavi',
      'slug' => 'wp-pagenavi',
    ),
    array(
      'name' => 'Velvet Blues Update URLs',
      'slug' => 'velvet-blues-update-urls',
    ),
    array(
      'name' => 'Advanced Custom Fields',
      'slug' => 'advanced-custom-fields',
    ),
  );
  /** Change this to your theme text domain, used for internationalising strings */
  $theme_text_domain = 'tgmpa';
  /**
   * Array of configuration settings. Uncomment and amend each line as needed.
   * If you want the default strings to be available under your own theme domain,
   * uncomment the strings and domain.
   * Some of the strings are added into a sprintf, so see the comments at the
   * end of each line for what each argument will be.
   */
  $config = array(
    /*'domain'       => $theme_text_domain,         // Text domain - likely want to be the same as your theme. */
    /*'default_path' => '',                         // Default absolute path to pre-packaged plugins */
    /*'menu'         => 'install-my-theme-plugins', // Menu slug */
    'strings'        => array(
      /*'page_title'             => __( 'Install Required Plugins', $theme_text_domain ), // */
      /*'menu_title'             => __( 'Install Plugins', $theme_text_domain ), // */
      /*'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', $theme_text_domain ), // %1$s = plugin name */
      /*'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
      /*'button'                 => __( 'Install %s Now', $theme_text_domain ), // %1$s = plugin name */
      /*'installing'             => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name */
      /*'oops'                   => __( 'Something went wrong with the plugin API.', $theme_text_domain ), // */
      /*'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', $theme_text_domain ), // %1$s = plugin name, %2$s = TGMPA page URL */
      /*'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', $theme_text_domain ), // %1$s = plugin name */
      /*'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
      /*'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', $theme_text_domain ), // %1$s = plugin name */
      /*'return'                 => __( 'Return to Required Plugins Installer', $theme_text_domain ), // */
    ),
  );
  tgmpa( $plugins, $config );
}


/* Admin StyleSheet
-------------------------------------------------------------- */

function my_admin_head() {
   echo '<link rel="stylesheet" type="text/css" href="' .$GLOBALS["TEMPLATE_URL"].'/css/wp-admin.css'. '">';
}
add_action('admin_head', 'my_admin_head');

/* Custom Login Screen
-------------------------------------------------------------- */

function my_login_screen(){
    echo '<link rel="stylesheet" type="text/css" href="' .$GLOBALS["TEMPLATE_URL"].'/css/wp-login.css'. '">';
}
add_action('login_enqueue_scripts','my_login_screen');

/* jQuery Enqueue
-------------------------------------------------------------- */

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-2.1.4.min.js", false, null);
   wp_enqueue_script('jquery');
}

/* Define support woocommerce
-------------------------------------------------------------- */

add_action('after_setup_theme','woocommerce_support');
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/* Custom The Excerpt
-------------------------------------------------------------- */

function the_excerpt_max_charlength($charlength) {
  $excerpt = get_the_excerpt();
  $charlength++;

  if ( mb_strlen( $excerpt ) > $charlength ) {
    $subex = mb_substr( $excerpt, 0, $charlength - 5 );
    $exwords = explode( ' ', $subex );
    $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
    if ( $excut < 0 ) {
      echo mb_substr( $subex, 0, $excut );
    } else {
      echo $subex;
    }
    echo '...';
  } else {
    echo $excerpt;
  }
}

/* Echo wrapper for blog post
-------------------------------------------------------------- */

function the_open_wrapper() {
  echo "<div class='row row-posts'>";
}
add_action('before_blog_post','the_open_wrapper' );

function the_close_wrapper() {
  echo "</div>";
}
add_action('after_blog_post','the_close_wrapper' );

// Login Background
function mystyle_custom_login_background() {

  // Background
  $url_bg = ot_get_option('background_login');
  if ($url_bg) {
    echo sprintf('<style type="text/css">body.login {background-image:url(%s);}</style>', $url_bg);
  }
  // Logo
  $url_logo = ot_get_option('logo_login');
  if ($url_logo) {
    echo sprintf('<style type="text/css">body.login h1 {background-image:url(%s);}</style>', $url_logo); 
  }
  
  // Logo
  $url_color = ot_get_option('login_colorpicker');
  if ($url_color) {
    echo sprintf('<style type="text/css">body.login{background-color:%s;}</style>', $url_color); 
  }
}
add_filter( 'login_head', 'mystyle_custom_login_background' );