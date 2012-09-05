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
	$('#users-daily').on('click', 'a[data-toggle=modal]', function(e) {
		e.preventDefault();
		$('#modalLayer').html('').load($(this).attr('href'));
	});

/**
 * Popovers
 */
	$('body').popover({
		selector: 'a[rel=popover]',
	});

/**
 * Collapsible
 */
	$('.training-plan-body')
		.on('hidden', function () {
			$(this).parent().find('i').removeClass().addClass('icon-plus');
			$('#usersList').masonry('reload');
		})
		.on('shown', function () {
			$(this).parent().find('i').removeClass().addClass('icon-minus');
			$('#usersList').masonry('reload');
		})
	;

/**
 * jQuery Masonry to float elements
 */
	$('#usersList').masonry({
		itemSelector : '.program',
		columnWidth : 324
	});
});