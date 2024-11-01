<?php
/**
 * Plugin Name: WP Hide Admin Bar From FrontEnd
 * Plugin URI: https://wordpress.org/plugins/wp-hide-admin-bar-from-frontend/
 * Description: The Plugin helps us to hide/show admin bar in wordpress website front end
 * Version: 1.0.0
 * Author: CodePopular
 * Author URI: https://www.codepopular.com
 * License: GPLv2
 */

  if (!defined('ABSPATH')) die ('No direct access allowed');
class Whabff{

   public function whabff_register(){
     define('WHABFF_REGISTRATION_PAGE_DIRECTORY', plugin_dir_path(__FILE__).'includes/');

     // New menu submenu for plugin options in Settings menu
     add_action('admin_menu', array($this, 'whabff_options_menu'));
     // Add setting option in plugin list
	 add_filter('plugin_action_links_'.plugin_basename(__FILE__), array($this, 'whabff_settings_links'));
   }

    public function whabff_settings_links( $links ) {
		$links[] = '<a href="' .
			admin_url( 'admin.php?page=wp-hide-admin-bar-from-frontend' ) .
			'">' . __('Settings') . '</a>';
		return $links;
   }

   public function whabff_options_menu() {
	add_options_page('Hide/Show Admin Bar', 'Hide/Show Admin Bar', 'manage_options', 'wp-hide-admin-bar-from-frontend', array($this, 'whaff_plugin_pages'));
	
  }

  public function whaff_plugin_pages() {
   $itm = WHABFF_REGISTRATION_PAGE_DIRECTORY.$_GET["page"].'.php';
   include($itm);
  }
   // class hide show formula
  public function whabff_hide_admin_bar(){
  	$codepopular_hide_admin_bar= get_option('codepopular_hide_admin_bar');
	if($codepopular_hide_admin_bar == 'hide'){
	 add_filter('show_admin_bar', '__return_false');
	}
  }

}

if(class_exists('Whabff')) {
$whabff_ob=new Whabff;
$whabff_ob->whabff_register();
$whabff_ob->whabff_hide_admin_bar();
}



?>
