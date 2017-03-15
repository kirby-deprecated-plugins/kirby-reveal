var rvl = (function () {
	var fn = {};

	fn.action = function( field ) {
		$('.topbar').append('<div class="rvl-action"><i class="fa fa-toggle-off"></i></div>');

		$('.rvl-action').click(function() {
			if($('.bars').hasClass('rvl-active')) {
				$('.bars').removeClass('rvl-active');
				$('.rvl-action').html('<i class="fa fa-toggle-off"></i>');
			} else {
				$('.bars').addClass('rvl-active');
				$('.rvl-action').html('<i class="fa fa-toggle-on"></i>');
			}
		});
	};

	return fn;
})();