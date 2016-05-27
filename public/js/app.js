"use strict";

$(document).ready(function () {
	$(".search-btn").click(function (event) {
		return showSearch(event);
	});

	$("#close-search").click(function (event) {
		return showSearch(event);
	});

	$('body').on({
	    'mousewheel': function(e) {
	        if (e.target.id != 'full-search-cont') return;
	        e.preventDefault();
	        e.stopPropagation();
	    }
	})

	function showSearch(event) {
		event.preventDefault();
		$("#full-search-cont").fadeToggle(200);
		//continue...
	}
});