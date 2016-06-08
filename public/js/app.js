"use strict";


/*
* jQuery extensions
*/
jQuery.fn.extend({
  atTop: function() {
    return $(this).prop("offsetTop") <= $(this).parent().scrollTop();
  },

  setClassIfNot: function(className) {
  	if (!$(this).hasClass("active")) {
  		$(this).addClass("active");
  	}

  	return $(this);
  },

  removeClassIfSet: function(className) {
  	if ($(this).hasClass("active")) {
  		$(this).removeClass("active");
  	}

  	return $(this);
  }

});


/*
* Helper functions
*/
function checkNav() {
	if ($(".container").atTop()) {
		$("#sm-nav").setClassIfNot("active");
	} else {
		$("#sm-nav").removeClassIfSet("active");
	}
}

function showSearch(event) {
  event.preventDefault();
  $("#full-search-cont").fadeToggle(200);
  $("#full-search-cont").find("input[type='text']").focus();
}


/*
* Event handlers
*/
$('body').on({
    'mousewheel': function (e) {
    	checkNav();

        if (e.target.id != 'full-search-cont') return;
        e.preventDefault();
        e.stopPropagation();
    },

    'touchmove': function (e) {
    	checkNav();

    	if (e.target.id != 'full-search-cont') return;
        e.preventDefault();
        e.stopPropagation();
    }
});

$(document).keydown(function (e) {
	checkNav();

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
});