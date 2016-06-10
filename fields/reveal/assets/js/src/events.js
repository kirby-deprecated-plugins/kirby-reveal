var RevealEvents = (function () {
	var fn = {};

	fn.init = function( field, data ) {
		RevealRefresh.event( field, data );
		RevealModal.event( field, data );
		RevealTextarea.onClick( field, data );
		RevealKey.event(field, data);
		RevealOpen.event(field, data);
		RevealClose.event(field);
		RevealResize.event( field );
		RevealIframe.eventLoaded( field, data );
	};

	return fn;
})();