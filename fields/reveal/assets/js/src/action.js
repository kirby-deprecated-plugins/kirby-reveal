var rvlAction = (function () {
	var fn = {};

	fn.init = function() {
		$('.topbar').append('<div class="rvl-action"><i class="fa fa-toggle-off"></i></div>');

		if(localStorage.getItem('rvl-active') !== null) {
			rvlAction.setActive();
		}

		$('.rvl-action').click(function(e) {
			e.preventDefault();
			if($('.bars').hasClass('rvl-active')) {
				rvlAction.setInactive();
			} else {
				rvlAction.setActive();
			}
			$(window).trigger('resize');
			$('body').disableSelection();
			rvlTrigger.refresh();
		});
	};

	fn.setActive = function() {
		$('.bars').addClass('rvl-active');
		$('.rvl-action').html('<i class="fa fa-toggle-on"></i>');
		localStorage.setItem('rvl-active', '1');
	};

	fn.setInactive = function() {
		$('.bars').removeClass('rvl-active');
		$('.rvl-action').html('<i class="fa fa-toggle-off"></i>');
		localStorage.removeItem('rvl-active');
	};

	return fn;
})();