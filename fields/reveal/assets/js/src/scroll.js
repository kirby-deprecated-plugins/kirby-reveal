var rvlScroll = (function () {
	var fn = {};
	var scrolltimer = null;

	fn.init = function(field, stimer) {
		scrolltimer = stimer;
		fn.onLoad();
	};

	fn.gotoScroll = function() {
		if(localStorage.getItem('rvl-scroll') !== null) {
			$('.rvl-iframe iframe').contents().scrollTop(parseInt(localStorage.getItem('rvl-scroll')));
		}
	};

	fn.onScroll = function() {
		$('.rvl-iframe iframe').contents().scroll(function () {
			fn.clearScrollTimer();
			fn.setScrollTimer();
		});
	};

	fn.clearScrollTimer = function() {
		if(scrolltimer) {
			clearTimeout(scrolltimer);
			scrolltimer = null;
		}
	};

	fn.setScrollTimer = function() {
		scrolltimer = setTimeout(function(){
			fn.setScroll();
		}, 2000);
	};

	fn.setScroll = function() {
		localStorage.setItem('rvl-scroll', fn.getScroll());
	};

	fn.getScroll = function() {
		return $('.rvl-iframe iframe:last-child').contents().scrollTop();
	};

	fn.onLoad = function() {
		$('.rvl-iframe iframe').load(function(){
			fn.gotoScroll();
			fn.onScroll();
			$(this).unbind();
		});
	};

	return fn;
})();