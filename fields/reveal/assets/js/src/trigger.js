var rvlTrigger = (function () {
	var fn = {};
	var timeout = 0;
	var timer = null;
	var data_refresh = 0;
	var trigger = false;

	fn.init = function(field) {
		data_refresh = field.data('refresh');
		rvlTrigger.events(field);
	};

	fn.events = function(field) {
		$('.field input, .field textarea').blur(function(e) {
			if($('.bars').hasClass('rvl-active')) {
				if(trigger == false) {
					fn.refresh();
				}
			}
		});

		$('.field-content input[type="checkbox"], .field-content input[type="radio"]').click(function(e) {
			if($('.bars').hasClass('rvl-active')) {
				fn.trigger(true);
				fn.refresh();
				trigger = false;
			}
		});

		$('.field-content select').change(function(e) {
			if($('.bars').hasClass('rvl-active')) {
				fn.trigger(true);
				fn.refresh();
				trigger = false;
			}
		});

		$('.field-content input, .field-content textarea').on('input propertychange', function() {
			if($('.bars').hasClass('rvl-active')) {
				fn.trigger(true);
				fn.cases();
				$(this).focus();
			}
		});
	};

	fn.trigger = function(type) {
		trigger = type;
		$('.field-content input, .field-content textarea').trigger('blur');
	};

	fn.cases = function() {
		if(timer) {
			clearTimeout(timer);
			timer = null;
		}
		if(timeout > $.now()) {
			timer = setTimeout(function(){
				fn.cases();
			}, data_refresh);
		} else {
			timeout = $.now() + data_refresh;
			fn.refresh();
			trigger = false;
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