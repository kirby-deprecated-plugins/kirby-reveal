var rvlTrigger = (function () {
	var fn = {};
	var timeout = 0;
	var timer = null;
	var data_refresh = 0;

	fn.init = function(field) {
		data_refresh = field.data('refresh');
		rvlTrigger.events();
	};

	fn.events = function() {
		$('.field input, .field textarea').first().blur(function(e) {
			fn.cases();
		});

		$('.field-content input[type="checkbox"], .field-content input[type="radio"]').click(function(e) {
			fn.trigger();
		});

		$('.field-content select').change(function(e) {
			fn.trigger();
		});

		$('.field-content input, .field-content textarea').on('input propertychange', function() {
			fn.trigger();
			$(this).focus();
		});
	};

	fn.trigger = function() {
		$('.field-content input, .field-content textarea').trigger('blur');
	};

	fn.cases = function() {
		if(timer) {
			clearTimeout(timer);
			timer = null;
		}
		if(timeout > $.now()) {
			timer = setTimeout(function(){
				console.log('TIMEOUT trigger');
				fn.cases();
			}, data_refresh);
		} else {
			timeout = $.now() + data_refresh;
			fn.refresh();
		}
	};

	fn.refresh = function() {
		rvlScroll.setScroll();
		rvlTrigger.reloadIframe();
	};

	fn.reloadIframe = function() {
		var src = $('.rvl-iframe iframe:last-child').attr('src');
		var scrolltop = $('.rvl-iframe iframe:last-child').contents().scrollTop();

		$('.rvl-iframe iframe:first-child').attr('src', src).load(function() {
			$('.rvl-iframe iframe:first-child').before($('.rvl-iframe iframe:last-child'));
			$('.rvl-iframe iframe').contents().scrollTop(scrolltop);
			rvlScroll.onScroll();
			rvlMessage.activate();
			$(this).unbind();
		});
	};

	return fn;
})();