(function($) {
	$(function() {
		//TableSort
		$('table.sortable').tablesorter({ 
			theme: 'bootstrap',
			headerTemplate: '{content} {icon}',
			widgets    : ['zebra','columns', 'uitheme']
		});
	});
})(jQuery);