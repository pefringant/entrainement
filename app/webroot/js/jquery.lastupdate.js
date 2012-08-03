/**
 * Add a css class on an element based on URL hash
 */
(function ($) {
	$.fn.lastupdate = function() {
		if (window.location.hash) {
			console.log(window.location.hash);
			$(window.location.hash).addClass('last-update');
		}
	};
})(jQuery);