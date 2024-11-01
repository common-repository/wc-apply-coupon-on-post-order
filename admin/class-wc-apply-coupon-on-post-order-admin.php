<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Wc_Apply_Coupon_On_Post_Order
 * @subpackage Wc_Apply_Coupon_On_Post_Order/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wc_Apply_Coupon_On_Post_Order
 * @subpackage Wc_Apply_Coupon_On_Post_Order/admin
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Wc_Apply_Coupon_On_Post_Order_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	public $rtw_wacpo_aplly_coupon_request = NULL;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Add setting tab in woocommerce settings section. 
	 *
	 * @since    1.0.0
	 */
	public function rtw_wacpo_wc_settings_tabs_array($settings_tabs){

		$settings_tabs['rtw_wacpo'] = __( 'WC Apply Coupon on Placed Order', 'wc-apply-coupon-on-post-order' );
		return $settings_tabs;

	}

	/**
	 * setting tab content callback plugin admin settings. 
	 *
	 * @since    1.0.0
	 */
	public function rtw_wacpo_settings_tabs_callback(){

		woocommerce_admin_fields( $this->rtw_wacpo_get_settings() );
	}

	/**
	 * Setting creation of plugin. 
	 *
	 * @since    1.0.0
	 */
	public function rtw_wacpo_get_settings(){
		$settings = array(
			'section_title' => array(
				'name'     => __( 'WooCommerce Apply Coupon on Placed Order Settings', 'wc-apply-coupon-on-post-order' ),
				'type'     => 'title',
				'desc'     => '',
				'id'       => 'rtw_wacpo_wc_settings_tab_section_title'
			),

			array(
				'name' 		=> __( 'Enable', 'wc-apply-coupon-on-post-order' ),
				'type' 		=> 'checkbox',
				'desc' 		=> __( 'Enable to activate plugin.', 'wc-apply-coupon-on-post-order' ),
				'id'   		=> 'rtw_wacpo_enable',
				'default'	=> 'no'
			),

			array(
				'title'    => __( 'Select the orderstatus in which Coupon will apply on order', 'wc-apply-coupon-on-post-order' ),
				'desc'     => __( 'Select Order status on which you want to allow customer to apply coupon on order.', 'wc-apply-coupon-on-post-order' ),
				'class'    => 'wc-enhanced-select ',
				'css'      => 'min-width:300px;',
				'default'  => '',
				'type'     => 'multiselect',
				'options'  => wc_get_order_statuses(),
				'desc_tip' =>  true,
				'id' 		=> 'rtw_wacpo_selected_order_status'
			),

			array(
				'name' 		=> __( 'Maximum Allowed Days', 'wc-apply-coupon-on-post-order' ),
				'type' 		=> 'number',
				'desc' 		=> __( 'Enter maximum allowed days that needed to apply coupon', 'wc-apply-coupon-on-post-order' ),
				'id'   		=> 'rtw_wacpo_max_order_days',
				'default'	=> '0'
			),

			array(
				'name' 		=> __( 'Minimum Order Amount', 'wc-apply-coupon-on-post-order' ),
				'type' 		=> 'number',
				'desc' 		=> __( 'Enter minimum order amount that needed to apply coupon', 'wc-apply-coupon-on-post-order' ),
				'id'   		=> 'rtw_wacpo_min_order_amount',
				'default'	=> '0'
			),

			array(
				'name' 		=> __( 'Maximum Coupons Count', 'wc-apply-coupon-on-post-order' ),
				'type' 		=> 'number',
				'desc' 		=> __( 'Enter maximum allowed count of coupon that will apply', 'wc-apply-coupon-on-post-order' ),
				'id'   		=> 'rtw_wacpo_max_coupon_count',
				'default'	=> '0'
			),

			'section_end' => array(
				'type' => 'sectionend',
				'id' => 'wc_settings_tab_demo_section_end'
			)
		);

		return apply_filters( 'wc_settings_tab_rtw_wacpo_settings', $settings );
	}

	/**
	 * Saving plugin setting tab settings in option table. 
	 *
	 * @since    1.0.0
	 */
	public function rtw_wacpo_save_settings_callback(){

		woocommerce_update_options( $this->rtw_wacpo_get_settings() );
	}

}
