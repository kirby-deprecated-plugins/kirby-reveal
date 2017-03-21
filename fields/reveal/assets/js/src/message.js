var rvlMessage = (function () {
	var fn = {};

	fn.activate = function() {
		$('.rvl-notify').css('top', 0);

		setTimeout(function(){
			$('.rvl-notify').stop().animate({top: -24} ,{duration:500});
		}, 2000);
	};

	return fn;
})();