
$(document).ready(function() {
	$('#modalLayer').modal({
		show: false
	});

	$('a[data-toggle=modal]').click(function(e) {
		e.preventDefault();
		$('#modalLayerBody').load($(this).attr('href'));
	});
});