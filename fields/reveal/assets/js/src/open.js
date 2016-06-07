var RevealOpen = (function () {
	var fn = {};

	// Event open preview
	fn.event = function( field, data ) {
		field.find('.reveal-open-trigger' ).click(function() {
			fn.open(field);
			//RevealIframe.setHeight( field );
			RevealTextarea.resize( field );
			RevealIframe.setContent( field, data);
		});
	};

	// Open
	fn.open = function(field) {
		$('body').find('.reveal').removeAttr('data-reveal-open');
			$('body').find('.reveal').next().removeAttr('data-reveal-active');
			field.find('.reveal').attr('data-reveal-open', true);
			field.find('.reveal').next().attr('data-reveal-active', true);
			$('body').addClass('reveal-open');
	};

	// Is open
	fn.isOpen = function() {
		return $('body').hasClass('reveal-open');
	}

	return fn;
})();