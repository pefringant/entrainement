/**
 * User's programs
 */
$(document).ready(function() {
	$('dd .actions').hide();
	$('dd')
		.mouseenter(function() {
			$(this).addClass('dd-hover').find('.actions').show();
		})
		.mouseleave(function() {
			$(this).removeClass('dd-hover').find('.actions').fadeOut('fast');
		})
});