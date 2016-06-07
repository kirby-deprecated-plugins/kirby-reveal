var RevealResize = (function () {
	var fn = {};

	// Event
	fn.event = function( field ) {
		$( window ).resize(function() {
			var em = fn.widthToEm( field );

			if( em < 50 ) {
				RevealClose.action(field);
			} else {
				//RevealIframe.setHeight(field);
			}
		});
	};

	// Width to em
	fn.widthToEm = function( field ) {
		var width = $(window).width();
		var font_size = parseFloat( $("body").css("font-size") );
		return width / font_size;
	};

	return fn;
})();