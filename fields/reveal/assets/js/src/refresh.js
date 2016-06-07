var RevealRefresh = (function () {
	var fn = {};

	// Event
	fn.event = function( field, data ) {
		field.find('.reveal-refresh-trigger' ).click(function() {
			RevealIframe.setContent( field, data );
		});
	};

	return fn;
})();