<script>
(function($) {
	var reveal_timeout = 0;

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

			// Get data from template
			var data = jQuery.parseJSON( field.find('.reveal').attr('data-reveal') );

			// Init ajax
			$.fn.ajax( field, data );

			// Init events
			$.fn.events( field, data );
		});
	};

	// Events
	$.fn.events = function( field, data ) {
		$.fn.eventClose(field);
		$.fn.eventFocus(field);
		$.fn.eventRefresh(field, data);
		$.fn.eventLock(field);
		$.fn.eventKey( field, data );
		$.fn.eventBlur(field, data);
		$.fn.eventBar(field, data );
	};

	// Event close preview
	$.fn.eventClose = function( field ) {
		field.find('.reveal-close' ).click(function() {
			field.find('.reveal').removeAttr('data-show');
		});
	};

	$.fn.eventBar = function( field, data ) {
		field.find('.reveal .field-buttons button').on("click", function(){
			$.fn.updatePreview( field, data, $(this) );
		});
	};

	// Event focus textarea
	$.fn.eventFocus = function( field ) {
		field.find('.reveal textarea').on("focus", function(){
			field.find('.reveal').attr('data-show', true);
			$.fn.setIframeHeight( field.find('iframe') );
		});
	};

	// Event refresh preview
	$.fn.eventRefresh = function( field, data ) {
		field.find('.reveal-refresh' ).click(function() {
			$.fn.ajax( field, data );
		});
	};

	// Event lock preview
	$.fn.eventLock = function( field ) {
		field.find('.reveal-lock' ).click(function() {
			if( $.fn.lock(field) === "true" ) {
				field.find('.reveal').removeAttr('data-lock');
			} else {
				field.find('.reveal').attr('data-lock', true);
			}
		});
	};

	// Event key textarea
	$.fn.eventKey = function( field, data ) {
		field.find('textarea').on('change keyup keydown paste drop', function() {
			$.fn.updatePreview( field, data, $(this) );
		});
	};

	// Event blur field
	$.fn.eventBlur = function(field, data) {
		$(document).mouseup(function(e) {
			if( $.fn.lock(field) !== "true" ) {
				var container = field.find('.reveal');
				if (!container.is(e.target) && container.has(e.target).length === 0) {
					field.find('.reveal').removeAttr('data-show', true);
				}
			}
		});
	}

	// Update preview with timeout
	$.fn.updatePreview = function(field, data, obj) {
		window.clearTimeout(reveal_timeout);
		reveal_timeout = window.setTimeout(function(){
			$.fn.ajax( field, data );
		}, data.delay );
		return reveal_timeout;
	};

	// Get lock value
	$.fn.lock = function( field ) {
		return field.find('.reveal').attr('data-lock');
	};

	// Content textarea value
	$.fn.content = function( field ) {
		return field.find('textarea').val();
	};

	// Set iframe height
	$.fn.setIframeHeight = function( field ) {
		var iframeHeight = field.contents().find('html').height();

		field.css('height', iframeHeight + 'px');
		field.contents().find('html').css('overflow-y', 'hidden');
	};

	// Ajax call
	$.fn.ajax = function(field, data ) {
		$.ajax({
			url: data.route,
			type: 'POST',
			data: {
				data: $.fn.content( field ),
				fieldkey: data.fieldkey,
				template: data.template
			},
			field: field,
			success: function(result) {
				var iframe = this.field.find('iframe');
				var obj = iframe.attr('srcdoc', result);

				obj.load(function() {
					$.fn.setIframeHeight( $(this) );
				});
			}
		});
	};
})(jQuery);
</script>