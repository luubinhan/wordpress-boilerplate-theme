<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       anluu.com
 * @since      1.0.0
 *
 * @package    MyStyle
 * @subpackage MyStyle/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MyStyle
 * @subpackage MyStyle/admin
 * @author     Luu Binh An <an.luu@vn.devinition.com>
 */
class Dev_Admin_Hooks
{
	public function __construct()
	{
		add_filter( 'show_admin_bar', array($this, 'global_show_hide_admin_bar' ) );

		/*
		 * Disable Theme Updates
		 * 2.8 to 3.0
		 */
		add_filter( 'pre_transient_update_themes', array($this, 'show_update') );
		/*
		 * 3.0
		 */
		add_filter( 'pre_site_transient_update_themes', array($this, 'show_update') );


		/*
		 * Disable Plugin Updates
		 * 2.8 to 3.0
		 */
		add_action( 'pre_transient_update_plugins', array(&$this, 'show_update') );
		/*
		 * 3.0
		 */
		add_filter( 'pre_site_transient_update_plugins', array($this, 'show_update') );


		/*
		 * Disable Core Updates
		 * 2.8 to 3.0
		 */
		add_filter( 'pre_transient_update_core', array($this, 'show_update') );
		/*
		 * 3.0
		 */
		add_filter( 'pre_site_transient_update_core', array($this, 'show_update') );


		/*
		 * Disable All Automatic Updates
		 * 3.7+
		 *
		 * @author	sLa NGjI's @ slangji.wordpress.com
		 */
		add_filter( 'auto_update_translation', '__return_false' );
		add_filter( 'automatic_updater_disabled', '__return_true' );
		add_filter( 'allow_minor_auto_core_updates', '__return_false' );
		add_filter( 'allow_major_auto_core_updates', '__return_false' );
		add_filter( 'allow_dev_auto_core_updates', '__return_false' );
		add_filter( 'auto_update_core', '__return_false' );
		add_filter( 'wp_auto_update_core', '__return_false' );
		add_filter( 'auto_core_update_send_email', '__return_false' );
		add_filter( 'send_core_update_notification_email', '__return_false' );
		add_filter( 'auto_update_plugin', '__return_false' );
		add_filter( 'auto_update_theme', '__return_false' );
		add_filter( 'automatic_updates_send_debug_email', '__return_false' );
		add_filter( 'automatic_updates_is_vcs_checkout', '__return_true' );
	}
	function global_show_hide_admin_bar(){

			global $show_admin_bar;

			$theroles = ot_get_option( 'show_admin_on_off' );			

			if ( $theroles == "off" ){
				$show_admin_bar = false;
				return false;
			}
			else{
				return true;
			}

	}

	function show_update(){
	  if (ot_get_option('show_update_available') == "off" ) {
	    return true;
	  } else {
	    return false;
	  }
	}
	

}
new Dev_Admin_Hooks();