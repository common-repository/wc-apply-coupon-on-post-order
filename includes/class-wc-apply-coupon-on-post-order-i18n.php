<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Wc_Apply_Coupon_On_Post_Order
 * @subpackage Wc_Apply_Coupon_On_Post_Order/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wc_Apply_Coupon_On_Post_Order
 * @subpackage Wc_Apply_Coupon_On_Post_Order/includes
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Wc_Apply_Coupon_On_Post_Order_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wc-apply-coupon-on-post-order',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
