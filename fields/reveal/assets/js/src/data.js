var RevealData = (function () {
	var fn = {};

	// Event
	fn.get = function( field ) {
		var data = field.find('.reveal').attr('data-reveal');
		return jQuery.parseJSON( data );
	};

	return fn;
})();