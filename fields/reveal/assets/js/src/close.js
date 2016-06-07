var RevealClose = (function () {
	var fn = {};

	// Event action
	fn.action = function( field ) {
		fn.hide();
		RevealTextarea.resize(field);
	};

	// Event close preview
	fn.event = function( field ) {
		field.find('.reveal-close-trigger' ).click(function() {
			fn.action(field);
		});
	};

	// Remove open
	fn.hide = function() {
		$('.reveal').removeAttr('data-reveal-open');
		$('.reveal').next().removeAttr('data-reveal-active');
		$('body').removeClass('reveal-open');
	};

	return fn;
})();