
/* WordPress */



	$(".comment-reply-link").addClass("btn btn-default");

	var levelOne = $("#navbar > li > ul").length;
	var levelTwo = $("#navbar > li > ul > li > ul").length;
	var levelThree = $("#navbar > li > ul > li > ul > li > ul").length;

	$(".sub-menu").removeClass("sub-menu").addClass("submenus submenu");
	$(".menu-item-has-children > a").append("<i class='fa fa-chevron-right' aria-hidden='true'></i>");

	if (levelOne > 0) {

		var titleText = $("#navbar > li > a").text();
		var titleText = titleText.replace(/ /g, '-');
		var titleText = titleText.toLowerCase();

		$("#navbar > li > ul").each(function() {
			$(this).insertAfter($(this).parent());
			$(this).prev("li").find("a").attr("href", "/menu");
			$(this).prev("li").find("a").addClass("navbar-content-item");
			$(this).append("<li><a href='/menu' class='go-back'>Back</a></li>");
		});

		
	};

	if (levelTwo > 0) {

		var titleText = $("#navbar > li > a").contents().get(0).nodeValue
		var titleText = titleText.replace(/ /g, '-');
		var titleText = titleText.toLowerCase();

		$("#navbar > ul > li > ul").each(function() {
			$(this).insertAfter($(this).parent());
			$(this).prev("li").find("a").attr("href", "/" + titleText);
			$(this).prev("li").find("a").addClass("navbar-content-sub-item");
			$(this).append("<li><a href='/" + titleText + "' class='go-back'>Back</a></li>");
		});
	}

	if (levelThree > 0) {
		var titleText = $("#navbar > ul > li > a").contents().get(0).nodeValue
		var titleText = titleText.replace(/ /g, '-');
		var titleText = titleText.toLowerCase();

		$("#navbar > ul > ul > li > ul").each(function() {
			$(this).insertAfter($(this).parent());
			$(this).prev("li").find("a").attr("href", "/" + titleText);
			$(this).prev("li").find("a").addClass("navbar-content-sub-item");
			$(this).append("<li><a href='/" + titleText + "' class='go-back'>Back</a></li>");
		});
	}

	$("#footer > li", $(this)).each(function () {
		if ($(this).hasClass("menu-item-has-children")) {
			$(this).hide();
		}
	})



