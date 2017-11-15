
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

  }); 

});

$(document).ready(function () {

  var screenResolution = $(document).width();

  if (screenResolution > 425) {

    var heightOfCard = $(".grid > .post").css("height");
    var heightOfCardCaption = $(".grid > .post > .post-caption").css("height");
    var heightOfImage = parseInt(heightOfCard) - parseInt(heightOfCardCaption);

    $(".grid").children(".post").children("a").children(".post-image").css("height", heightOfImage);
    $(".grid").children(".post").children(".post-caption").css("height", heightOfCardCaption);

  } else {

    var x = $("#carousel-mobile > .carousel-inner > .item > .post").css("height");
    var heightOfCardCaption = $("#carousel-mobile > .carousel-inner > .item > .post > .post-caption").css("height");
    var heightOfImage = parseInt(heightOfCard) - parseInt(heightOfCardCaption);

    console.log(heightOfImage);

    $("#carousel-mobile > .carousel-inner > .item > .post > a > .post-image").css("height", heightOfImage + "px");
    $("#carousel-mobile > .carousel-inner > .item > .post > .post-caption").css("height", heightOfCardCaption);

  }  

})