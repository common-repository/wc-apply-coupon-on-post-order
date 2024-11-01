(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 $(document).ready(function(){

	 	$('.rtw_wacpo_apply_coupon').click(function(){
	 		var order_id = $(this).data('order_id');
	 		var coupon_code = $('#rtw_wacpo_coupon_code').val();
	 		
			var data = {
						action   : 'woocommerce_add_coupon_discount',
						order_id : order_id,
						security : rtw_wacpo_js_param.order_item_nonce,
						coupon   : coupon_code
					};

			$.post( rtw_wacpo_js_param.ajax_url, data, function( response ) {
				if(response.success){
					$('.rtw_wacpo_apply_coupon_row').prepend('<div class="woocommerce-message" role="alert"><p>Coupon Applyed successfully.</p></div>');
					window.setTimeout(function() {
						window.location.reload();
					}, 1000);
				}else{
					window.alert( response.data.error );
				}
			},'json');
	 	});
	 });
})( jQuery );
