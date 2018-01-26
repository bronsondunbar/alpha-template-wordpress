
/* Template search bar */

$(document).ready(function () {

	/* Animate search bar when in focus */

	$(".navbar-header > .search > input").focus(function () {

	  var screenResolution = $(document).width();

	  switch (screenResolution) {

	    case 1920:

	      $(".navbar-header > .search").velocity({
	        width: "20%"
	      }, 500);
	      break;

	    case 1440:

	      $(".navbar-header > .search").velocity({
	        width: "20%"
	      }, 500);
	      break;

	    case 1024:

	      $(".navbar-header > .search").velocity({
	        width: "30%"
	      }, 500);
	      break;

	  }

	});

	$(".navbar-header > .search > input").blur(function () {

	  var screenResolution = $(document).width();

	  switch (screenResolution) {

	    case 1920:

	      $(".navbar-header > .search").velocity({
	        width: "10%"
	      }, 500);
	      break;

	    case 1440:

	      $(".navbar-header > .search").velocity({
	        width: "15%"
	      }, 500);
	      break;

	    case 1024:

	      $(".navbar-header > .search").velocity({
	        width: "20%"
	      }, 500);
	      break;

	  }
	  
	});

});