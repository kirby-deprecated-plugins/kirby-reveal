<script>
(function($) {
	var splitfield_timeout = 0;

	// Init
	$.fn.splitfield = function() {
		return this.each(function() {
			var field = $(this);
			var fieldname = 'splitfield';

			if(field.data( fieldname )) {
				return true;
			} else {
				field.data( fieldname, true );
			}

			// Get data from template
			var data = jQuery.parseJSON( field.find('.splitfield').attr('data-splitfield') );

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
		field.find('.splitfield-close' ).click(function() {
			field.find('.splitfield').removeAttr('data-show');
		});
	};

	$.fn.eventBar = function( field, data ) {
		field.find('.splitfield .field-buttons button').on("click", function(){
			$.fn.updatePreview( field, data, $(this) );
		});
	};

	// Event focus textarea
	$.fn.eventFocus = function( field ) {
		field.find('.splitfield textarea').on("focus", function(){
			field.find('.splitfield').attr('data-show', true);
			$.fn.setIframeHeight( field.find('iframe') );
		});
	};

	// Event refresh preview
	$.fn.eventRefresh = function( field, data ) {
		field.find('.splitfield-refresh' ).click(function() {
			$.fn.ajax( field, data );
		});
	};

	// Event lock preview
	$.fn.eventLock = function( field ) {
		field.find('.splitfield-lock' ).click(function() {
			if( $.fn.lock(field) === "true" ) {
				field.find('.splitfield').removeAttr('data-lock');
			} else {
				field.find('.splitfield').attr('data-lock', true);
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
				var container = field.find('.splitfield');
				if (!container.is(e.target) && container.has(e.target).length === 0) {
					field.find('.splitfield').removeAttr('data-show', true);
				}
			}
		});
	}

	// Update preview with timeout
	$.fn.updatePreview = function(field, data, obj) {
		window.clearTimeout(splitfield_timeout);
		splitfield_timeout = window.setTimeout(function(){
			$.fn.ajax( field, data );
		}, data.delay );
		return splitfield_timeout;
	};

	// Get lock value
	$.fn.lock = function( field ) {
		return field.find('.splitfield').attr('data-lock');
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