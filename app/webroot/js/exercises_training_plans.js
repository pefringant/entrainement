/**
 * Training plans exercises
 */
$(document).ready(function() {
	$('ol .actions').hide();
	$('ol li')
		.mouseenter(function() {
			$(this).addClass('dd-hover').find('.actions').show();
		})
		.mouseleave(function() {
			$(this).removeClass('dd-hover').find('.actions').fadeOut('fast');
		})
});