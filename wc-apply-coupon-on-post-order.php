<?php

/**
 * The plugin main file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://redefiningtheweb.com
 * @since             1.0.0
 * @package           Wc_Apply_Coupon_On_Post_Order
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Apply Coupon on Placed Order
 * Plugin URI:        https://redefiningtheweb.com/wc-apply-coupon-on-post-order/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            RedefiningTheWeb
 * Author URI:        https://redefiningtheweb.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-apply-coupon-on-post-order
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'RTW_WACPO_VERSION', '1.0.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wc-apply-coupon-on-post-order.php';

/**
 * The function is return settings link in action links of plugin.
 * 
 * @since    1.0.0
 */
function rtw_wacpo_plugin_action_links_callback($actions, $plugin_file){
	$rtw_wacpo_plugin_file_path = plugin_basename ( __FILE__ );
	if ($rtw_wacpo_plugin_file_path == $plugin_file) {
		$settings = array (
				'settings' => '<a href="' . admin_url ( 'admin.php?page=wc-settings&tab=rtw_wacpo' ) . '">' . __ ( 'Settings', 'wc-apply-coupon-on-post-order' ) . '</a>',
		);
		$actions = array_merge ( $settings, $actions );
	}
	return $actions;
}

add_filter( 'plugin_action_links', 'rtw_wacpo_plugin_action_links_callback', 10, 5);

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wc_apply_coupon_on_post_order() {

	$plugin = new Wc_Apply_Coupon_On_Post_Order();
	$plugin->run();

}
run_wc_apply_coupon_on_post_order();
