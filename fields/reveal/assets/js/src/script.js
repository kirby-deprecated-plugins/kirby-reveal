(function($) {
	$.fn.reveal = function() {
		return this.each(function() {
			var field = $(this);
			var fieldname = 'reveal';
			var scrolltimer = null;

			if(field.data( fieldname )) {
				return true;
			} else {
				field.data( fieldname, true );
			}

			if(field.data('refresh') != 0) {
				rvlTrigger.init(field);
			}
			rvlAction.init();
			rvlScroll.init(scrolltimer);
		});
	};
})(jQuery);