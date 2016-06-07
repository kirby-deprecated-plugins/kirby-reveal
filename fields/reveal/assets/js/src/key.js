var RevealKey = (function () {
	var fn = {};
	var enter = 0;

	// Event
	fn.event = function( field, data ) {
		fn.key( field, data );
		fn.enter( field, data );
	};

	// Event key textarea
	fn.key = function( field, data ) {
		field.find('textarea').on('input drop', function(e) {
			if( RevealOpen.isOpen() ) {
				RevealIframe.refreshTimeout( field, data );
			}
		});
	};

	// Event enter
	fn.enter = function( field, data ) {
		field.find('textarea').on('keydown', function(e) {
			if( RevealOpen.isOpen() ) {
				if(e.which == 13) {
					if( this.enter == 0 ) {
						RevealIframe.setContent( field, data );
					}
					this.enter = 1;
				} else {
					this.enter = 0;
				}
			}
		});
	};

	return fn;
})();