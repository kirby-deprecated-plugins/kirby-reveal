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
var RevealOpen = (function () {
	var fn = {};

	// Event open preview
	fn.event = function( field, data ) {
		field.find('.reveal-open-trigger' ).click(function() {
			fn.open(field);
			//RevealIframe.setHeight( field );
			RevealTextarea.resize( field );
			RevealIframe.setContent( field, data);
		});
	};

	// Open
	fn.open = function(field) {
		$('body').find('.reveal').removeAttr('data-reveal-open');
			$('body').find('.reveal').next().removeAttr('data-reveal-active');
			field.find('.reveal').attr('data-reveal-open', true);
			field.find('.reveal').next().attr('data-reveal-active', true);
			$('body').addClass('reveal-open');
	};

	// Is open
	fn.isOpen = function() {
		return $('body').hasClass('reveal-open');
	}

	return fn;
})();
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
(function($) {
	// Init
	$.fn.reveal = function() {
		return this.each(function() {
			var field = $(this);
			var fieldname = 'reveal';

			if(field.data( fieldname )) {
				return true;
			} else {
				field.data( fieldname, true );
			}

			$.fn.actions( field, $.fn.getData( field ) );
		});
	};

	$.fn.getData = function( field ) {
		var data_str = field.find('.reveal').attr('data-reveal');
		return jQuery.parseJSON( data_str );
	}

	$.fn.actions = function( field, data ) {
		RevealClose.action(field);
		RevealIframe.setTemplate(field, data);
		$.fn.events( field, data );
	};

	// Events
	$.fn.events = function( field, data ) {
		RevealRefresh.event( field, data );
		RevealModal.event( field, data );
		RevealTextarea.onClick( field, data );
		RevealKey.event(field, data);
		RevealOpen.event(field, data);
		RevealClose.event(field);
		RevealResize.event( field );
		RevealIframe.eventLoaded( field, data );
	};

})(jQuery);
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