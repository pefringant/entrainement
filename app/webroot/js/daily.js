/**
 * Daily users and their programs
 */
$(document).ready(function() {
/**
 * Modal init
 */
	$('#modalLayer').modal({
		show: false
	});

/**
 * Modal openers
 * Using .on() to trigger ajax added links
 * @see http://api.jquery.com/on/
 */
	$('.daily').on('click', 'a[data-toggle=modal]', function(e) {
		e.preventDefault();
		$('#modalLayer').html('').load($(this).attr('href'));
	});

/**
 * Popovers
 */
	$('#usersList').popover({
		selector: 'a[rel=popover]',
	});

/**
 * jQuery Masonry to float elements
 */
	$('#usersList').masonry({
		itemSelector : '.user-program',
		columnWidth : 324
	});
});