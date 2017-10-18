
/* Template filter */

$(document).ready(function () {

	$(".radio li > label").click(function (event) {

		$(".radio li > label > input").prop("checked", false);
		$(this + " > label > input").prop("checked", true);

	});

});