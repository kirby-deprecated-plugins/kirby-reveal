var RevealModal = (function () {
	var fn = {};

	// Event action
	fn.action = function( field ) {
		fn.event(field);
	};

	// Event close preview
	fn.event = function( field ) {
		$('.modal, .structure-add-button, .modal .btn-cancel').click(function() {
			console.log('NJA');
			$( "[data-reveal-open]" ).closest('.field').each(function( index ) {
				console.log('JAA');
				RevealClose.action($( this ));
			});

			$('.reveal').removeAttr('data-reveal-open');
			$('.reveal').next().removeAttr('data-reveal-active');
			$('body').removeClass('reveal-open');

			RevealTextarea.resize(field);
		});
	};

	return fn;
})();