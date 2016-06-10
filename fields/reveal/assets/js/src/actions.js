var RevealActions = (function () {
	var fn = {};

	fn.init = function( field, data ) {
		RevealClose.action(field);
		RevealIframe.setTemplate(field, data);
		RevealEvents.init( field, data );
	};

	return fn;
})();