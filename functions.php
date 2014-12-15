<?php
/**
 * @package MyStyle
 */

/* Load the theme-specific files, with support for overriding via a child theme.
-------------------------------------------------------------- */

$includes = array(
  'includes/theme-js.php',        // Load JavaScript via wp_enqueue_script
  'includes/sidebar-init.php',      // Initialize widgetized areas
  'includes/theme-widgets.php',     // Theme widgets
  //'includes/register-custom-post-type.php',     // Theme widgets
);

foreach ( $includes as $i ) {
  locate_template( $i, true );
}

/* Widgetized Sidebar HTML5 Markup
-------------------------------------------------------------- */

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<section class="widget-wrap">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}


/* Custom Functions for CSS/Javascript Versioning
-------------------------------------------------------------- */

$GLOBALS["TEMPLATE_URL"] = get_bloginfo('template_url')."/";
$GLOBALS["TEMPLATE_RELATIVE_URL"] = wp_make_link_relative($GLOBALS["TEMPLATE_URL"]);


/* Add ?v=[last modified time] to style sheets
-------------------------------------------------------------- */

function versioned_stylesheet($relative_url, $add_attributes=""){
  echo '<link rel="stylesheet" href="'.versioned_resource($relative_url).'" '.$add_attributes.'>'."\n";
}


/* Add ?v=[last modified time] to javascripts
-------------------------------------------------------------- */

function versioned_javascript($relative_url, $add_attributes=""){
  echo '<script src="'.versioned_resource($relative_url).'" '.$add_attributes.'></script>'."\n";
}


/* Add ?v=[last modified time] to a file url
-------------------------------------------------------------- */

function versioned_resource($relative_url){
  $file = $_SERVER["DOCUMENT_ROOT"].$relative_url;
  $file_version = "";

  if(file_exists($file)) {
    $file_version = "?v=".filemtime($file);
  }

  return $relative_url.$file_version;
}


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


/* CHANG DESKBOAR FOOTER
-------------------------------------------------------------- */

function remove_footer_admin () {
    echo "Product of Devinition. Power by Wordpress";
}
add_filter('admin_footer_text', 'remove_footer_admin'); 


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
//require( trailingslashit( get_template_directory() ) . 'includes/theme-options.php' );


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


/**
 * Recognized Social Links
 *
 * Returns an array of all recognized social links.
 *
 * @uses      apply_filters()
 *
 * @param     string  $field_id ID that's passed to the filters.
 * @return    array
 *
 * @access    public
 * @since     2.4.0
 */
if ( ! function_exists( 'ot_recognized_social_links' ) ) {

  function ot_recognized_social_links( $field_id = '' ) {

    return apply_filters( 'ot_recognized_social_links', array(
      'facebook'    => __( 'Facebook', 'option-tree' ),
      'twitter'     => __( 'Twitter', 'option-tree' ),
      'google-plus' => __( 'Google+', 'option-tree' ),
      'linkedin'    => __( 'LinkedIn', 'option-tree' ),
      'vk'          => __( 'VK.com', 'option-tree' ),
      'pinterest'   => __( 'Pinterest', 'option-tree' ),
      'flickr'      => __( 'Flickr', 'option-tree' ),
      'dribbble'    => __( 'Dribbble', 'option-tree' ),
      'youtube'     => __( 'Youtube', 'option-tree' ),
      'vimeo'       => __( 'Vimeo', 'option-tree' ),
      'soundcloud'  => __( 'SoundCloud', 'option-tree' ),
      'skype'       => __( 'Skype', 'option-tree' ),
      'tumblr'      => __( 'Tumblr', 'option-tree' ),
      'github'      => __( 'Github', 'option-tree' ),
      'digg'        => __( 'Digg', 'option-tree' ),
      'delicious'   => __( 'Delicious', 'option-tree' ),
      'forrst'      => __( 'Forrst', 'option-tree' )
    ), $field_id );

  }

}

/**
 * Social Links option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.4.0
 */
if ( ! function_exists( 'ot_type_social_links' ) ) {

  function ot_type_social_links( $args = array() ) {

    /* turns arguments array into variables */
    extract( $args );

    /* verify a description */
    $has_desc = $field_desc ? true : false;

    /* format setting outer wrapper */
    echo '<div class="format-setting type-social-links ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

      /* description */
      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';

        /**
         * load the default filterable social links if nothing 
         * has been set in the choices array.
         */
        if ( empty( $field_choices ) ) {
          $field_choices = array();
          foreach( ot_recognized_social_links( $field_id ) as $value => $label ) {
            $field_choices[] = array(
              'value' => $value,
              'label' => $label
            );
          }
        }

        /* Social links input */
        foreach ( (array) $field_choices as $key => $choice ) {
          echo '<p>';
            echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $choice['value'] ) .'"><span class="icon ot-icon-' . $choice['value'] . '"> </span> ' . $choice['label'] . '</label>';
            echo '<input type="text" name="' . esc_attr( $field_name ) . '[' . esc_attr( $choice['value'] ) . ']" id="' . esc_attr( $field_id ) . '-' . esc_attr( $choice['value'] ) .'" value="' . ( isset( $field_value[$choice['value']] ) ? esc_attr( $field_value[$choice['value']] ) : '' ) . '" class="widefat option-tree-ui-input ' . esc_attr( $field_class ) . '" />';
          echo '</p>';
        }

      echo '</div>';

    echo '</div>';

  }

}