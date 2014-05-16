<?php
/**
 * @package MyStyle
 * @subpackage Devinition
 */


/* Custom HTML5 Comment Markup
-------------------------------------------------------------- */

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li>
     <article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
       <header class="comment-author vcard">
          <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
          <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
          <time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a></time>
          <?php edit_comment_link(__('(Edit)'),'  ','') ?>
       </header>
       <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
       <?php endif; ?>

       <?php comment_text() ?>

       <nav>
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       </nav>
     </article>
    <!-- </li> is added by wordpress automatically -->
<?php
}

automatic_feed_links();


/* Widgetized Sidebar HTML5 Markup
-------------------------------------------------------------- */

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<section>',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
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


/* REPLACE HOWDY ADMIN
-------------------------------------------------------------- */

function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Chào bạn,', $my_account->title );           
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );


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
load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );


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


/* Custom Login Screen
-------------------------------------------------------------- */

function my_login_screen(){
    echo '<link rel="stylesheet" type="text/css" href="' .$GLOBALS["TEMPLATE_URL"].'/css/wp-login.css'. '">';
}
add_action('login_enqueue_scripts','my_login_screen');