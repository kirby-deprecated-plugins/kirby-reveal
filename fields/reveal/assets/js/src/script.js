(function($) {
	// Init
	$.fn.reveal = function() {
		return this.each(function() {
			var field = $(this);
			var fieldname = 'reveal';

			if(field.data( fieldname )) {
				return true;
			} else {
				field.data( fieldname, true );
			}

			$.fn.actions( field, $.fn.getData( field ) );
		});
	};

	$.fn.getData = function( field ) {
		var data_str = field.find('.reveal').attr('data-reveal');
		return jQuery.parseJSON( data_str );
	}

	$.fn.actions = function( field, data ) {
		RevealClose.action(field);
		RevealIframe.setTemplate(field, data);
		$.fn.events( field, data );
	};

	// Events
	$.fn.events = function( field, data ) {
		RevealRefresh.event( field, data );
		RevealModal.event( field, data );
		RevealTextarea.onClick( field, data );
		RevealKey.event(field, data);
		RevealOpen.event(field, data);
		RevealClose.event(field);
		RevealResize.event( field );
		RevealIframe.eventLoaded( field, data );
	};

})(jQuery);