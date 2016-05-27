"use strict";

$('body').on({
    'mousewheel': function (e) {
        if (e.target.id != 'full-search-cont') return;
        e.preventDefault();
        e.stopPropagation();
    },

    'touchmove': function (e) {
    	if (e.target.id != 'full-search-cont') return;
        e.preventDefault();
        e.stopPropagation();
    }
});

$(document).keydown(function (e) {
	if ((e.keyCode != 38) && (e.keyCode) != 40) return;
	if ($("#full-search-cont").is(":hidden")) return;

    e.preventDefault();
    e.stopPropagation();
});

$(document).ready(function () {
	$(".search-btn").click(function (event) {
		return showSearch(event);
	});

	$("#close-search").click(function (event) {
		return showSearch(event);
	});

	function showSearch(event) {
		event.preventDefault();
		$("#full-search-cont").fadeToggle(200);
		//continue...
	}
});