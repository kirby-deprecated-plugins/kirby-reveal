var RevealIframe = (function () {
	var fn = {};
	var reveal_timeout = 0;

	// Event iframe loaded
	fn.eventLoaded = function( field, data ) {
		field.find('iframe').ready(function () {
			//fn.setHeight( field );
		});
	};

	// Set template
	fn.setTemplate = function(field, data ) {
		$.ajax({
			url: data.root + '/plugin.reveal.template2',
			type: 'POST',
			data: {
				id: data.id,
				language: data.language,
				uri: data.uri,
				filename: data.template
			},
			field: field,
			success: function(content) {
				var iframe = field.find('iframe').prop('contentDocument');
				iframe.open();
				iframe.write(content);
			}
		});
	};

	// Set content
	fn.setContent = function(field, data ) {
		$.ajax({
			url: data.root + '/plugin.reveal.content',
			type: 'POST',
			data: {
				id: data.id,
				language: data.language,
				filter: data.filter,
				content: RevealTextarea.getContent( field )
			},
			field: field,
			success: function(content) {
				field.find('iframe').contents().find(data.selector).html(content);
				fn.eventLoaded(field, data);
			}
		});
	};

	// Set height
	fn.setHeight = function( field ) {
		var iframe = field.find('iframe');
		var body = iframe.contents().find('body').height();
		var html = iframe.contents().find('html').height();
		var height = body;


		iframe.css('height', height + 'px');
		iframe.contents().find('body').css('overflow-y', 'hidden');
	};

	// Update preview with timeout
	fn.refreshTimeout = function(field, data) {
		window.clearTimeout(this.reveal_timeout);
		this.reveal_timeout = window.setTimeout(function(){
			RevealIframe.setContent( field, data );
		}, data.delay );
		return this.reveal_timeout;
	};

	return fn;
})();