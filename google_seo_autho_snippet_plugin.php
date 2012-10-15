<?php 
/*
*Plugin Name: Google Seo Author Snippet Plugin
*Plugin URI: http://www.smackcoders.com/google-seo-author-snippet-wordpress-plugin.html
*Description: A plugin that Manages the user's social profile details
*Version: 1.0.0
*Author: smackcoders.com
*Author URI: http://www.smackcoders.com
*
* Copyright (C) 2012 Fredrick SujinDoss.M (email : fredrickm@smackcoders.com)
*
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*
* @link http://www.smackcoders.com/google-seo-author-snippet-wordpress-plugin.html

***********************************************************************************************
*/

define('SMACK_IMAGE_URL', get_bloginfo('wpurl').'/wp-content/plugins/google_seo_autho_snippet_plugin/images/');

$FieldNames[0] = array(
		'g_image' => 'googleplus_img0.png',
		'g_image_url' => SMACK_IMAGE_URL,
		'f_image' => 'facebook_img0.png',
		'f_image_url' => SMACK_IMAGE_URL,
		't_image' => 'twitter_img0.png',
		't_image_url' => SMACK_IMAGE_URL,
		'l_image' => 'linkedin_img0.png',
		'l_image_url' => SMACK_IMAGE_URL,
		'location_image' => 'locator_pink.png',
		'location_url' => SMACK_IMAGE_URL,
	);	
$FieldNames[1] = array(
		'g_image' => 'googleplus_img1.png',
		'g_image_url' => SMACK_IMAGE_URL,
		'f_image' => 'facebook_img1.png',
		'f_image_url' => SMACK_IMAGE_URL,
		't_image' => 'twitter_img1.png',
		't_image_url' => SMACK_IMAGE_URL,
		'l_image' => 'linkedin_img1.png',
		'l_image_url' => SMACK_IMAGE_URL,
		'location_image' => 'locator_pink.png',
		'location_url' => SMACK_IMAGE_URL,
	);	
register_deactivation_hook( __FILE__, 'deactivate_now' );
function deactivate_now()
{
	delete_option( 'smack_microdata_settings');
	delete_option( 'smack_microdata_imageset');
	$blogusers = get_users();
	foreach($blogusers as $users){
		delete_user_meta($users->ID, 'smack_social_links' );
		delete_user_meta($users->ID, 'smack_user_geoinfo' );
	}
}
class MyPlugin {
     static function install() {
            // do not generate any output here
     }
}
register_activation_hook( __FILE__, array('MyPlugin', 'install') );
update_option( 'smack_microdata_imageset' , $FieldNames );
require_once 'microdata_form.php';
function admin_menus() {  
	add_menu_page('Plugin settings', 'Google Seo Author Snippet', 'manage_options',  
	       'plugin_configuration', 'microdata_configuration_page');
}  
   add_action("admin_menu", "admin_menus"); 

wp_enqueue_script("microdata_configuration_page", "/wp-content/plugins/google_seo_autho_snippet_plugin/js/smack-microdata.js", array("jquery"));
?>
