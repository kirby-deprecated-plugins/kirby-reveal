var RevealTextarea = (function () {
	var fn = {};

	// Resize
	fn.resize = function(field) {
		field.find('textarea').trigger('autosize.resize');
	};

	// Content textarea value
	fn.getContent = function( field ) {
		return field.find('textarea').val();
	};

	// Event bar
	fn.onClick = function( field, data ) {
		field.find('.field-buttons button').on("click", function(){
			RevealIframe.refreshTimeout( field, data );
		});
	};

	return fn;
})();