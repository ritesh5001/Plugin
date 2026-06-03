(function ($) {
	'use strict';

	function refresh() {
		var $panel = $('.payment_method_partial_cod .pcod-checkout-panel');
		if (!$panel.length) {
			return;
		}

		$.post(pcodCheckout.ajaxUrl, { action: pcodCheckout.action }, function (response) {
			if (!response || !response.success) {
				return;
			}
			$panel.find('.pcod-advance').html(response.data.advance);
			$panel.find('.pcod-balance').html(response.data.balance);
		});
	}

	$(document.body).on('updated_checkout', refresh);
})(jQuery);
