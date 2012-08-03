/**
 * User's programs
 */
$(document).ready(function() {
	$('dd .actions').hide();
	$('dd')
		.mouseenter(function() {
			$(this).find('.actions').fadeIn('fast');
		})
		.mouseleave(function() {
			$(this).find('.actions').fadeOut('fast');
		})
});