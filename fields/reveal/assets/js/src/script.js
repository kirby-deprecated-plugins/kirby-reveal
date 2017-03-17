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

			rvlAction.init();
			rvlTrigger.init(field);
			rvlScroll.init(scrolltimer);
		});
	};
})(jQuery);