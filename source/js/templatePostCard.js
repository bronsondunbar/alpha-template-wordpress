
/* Template Post Cards */

$(document).ready(function () {

  /* Fix single item in carousel */

  $("#carousel-desktop > .carousel-inner > .item").each(function() {

    var numberOfItems = $(".grid > .post", $(this)).length;

    if (numberOfItems == 1) {

      $(this).children(".grid").children(".post").addClass("carousel-post");

    } else if (numberOfItems == 2) {

      $(this).children(".grid").children(".post").addClass("carousel-post");

    }

    var heightOfCard = $(".grid > .post").css("height");
    var heightOfCardCaption = $(".grid > .post > .post-caption").css("height");
    var heightOfImage = parseInt(heightOfCard) - parseInt(heightOfCardCaption);

    $(this).children(".grid").children(".post").children("a").children(".post-image").css("height", heightOfImage);
    $(this).children(".grid").children(".post").children(".post-caption").css("height", heightOfCardCaption);

  });

  var heightOfCard = $("#carousel-mobile > .carousel-inner > .item > .post").css("height");
  var heightOfCardCaption = $("#carousel-mobile > .carousel-inner > .item > .post > .post-caption").css("height");
  var heightOfImage = parseInt(heightOfCard) - parseInt(heightOfCardCaption);

  $("#carousel-mobile > .carousel-inner > .item > .post > a > .post-image").css("height", heightOfImage);
  $("#carousel-mobile > .carousel-inner > .item > .post > .post-caption").css("height", heightOfCardCaption);

});