(function ($) {
	'use strict';

	$(document).on('click', '.pcod-mark-balance-paid', function (e) {
		e.preventDefault();
		var $btn = $(this);

		if (!window.confirm(pcodAdmin.i18n.confirm)) {
			return;
		}

		$btn.prop('disabled', true);

		$.post(pcodAdmin.ajaxUrl, {
			action: pcodAdmin.action,
			order_id: $btn.data('order'),
			nonce: $btn.data('nonce')
		})
			.done(function (response) {
				if (response && response.success) {
					window.location.reload();
				} else {
					window.alert((response && response.data && response.data.message) || pcodAdmin.i18n.error);
					$btn.prop('disabled', false);
				}
			})
			.fail(function () {
				window.alert(pcodAdmin.i18n.error);
				$btn.prop('disabled', false);
			});
	});
})(jQuery);
