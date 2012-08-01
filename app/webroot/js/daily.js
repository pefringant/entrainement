
$(document).ready(function() {
/**
 * Modal init
 */
	$('#modalLayer').modal({
		show: false
	});

/**
 * Modal openers
 * Using .on() to trigger future ajax added <a>
 * @see http://api.jquery.com/on/
 */
	$('.daily').on('click', 'a[data-toggle=modal]', function(e) {
		e.preventDefault();
		$('#modalLayer').html('').load($(this).attr('href'));
	});

/**
 * Tooltips on user names
 */
	$('.user-program-header').tooltip({
		selector: 'a[rel=tooltip]',
		placement: 'right'
	});

/**
 * Tooltips on action buttons
 */
	$('.user-program-body').tooltip({
		selector: 'a[rel=tooltip]',
		placement: 'top'
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