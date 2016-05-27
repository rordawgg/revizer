"use strict";

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