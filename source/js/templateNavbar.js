
/* Template navbar */

$(document).ready(function () {

  var scrollPosition = $(window).scrollTop();

  if (scrollPosition > 0) {

    $(".navbar-default").velocity({
        backgroundColor : "#ffffff",
        backgroundColorAlpha : 0.9
    }, 100);

    $(".navbar-default").css("box-shadow", "0px 4px 41px -5px rgba(0,0,0,0.49)");

    $(".navbar-default .navbar-nav li a").velocity({
      color: "#0D3758"
    }, 10);

    $(".navbar-default .navbar-toggle .icon-bar").velocity({
      backgroundColor: "#0D3758"
    }, 10);

    $(".navbar-header > .search > .fa-search").velocity({
      color: "#0D3758"
    }, 10);

    $(".navbar-header > .search > div > input").velocity({
      borderBottomColor: "#0D3758"
    }, 10);

    $(".navbar-header > .search > a").velocity({
      color: "#0D3758"
    }, 10);

    $(".scroll-helper").velocity("fadeOut", {
      duration: 500
    });

  }

  /* Navbar background scroll color animation */

  $("body").waypoint(function() {

    $(".navbar-default").velocity({
        backgroundColor : "#ffffff",
        backgroundColorAlpha : 0
    }, 100);

    $(".navbar-default").css("box-shadow", "none");

    $(".navbar-default .navbar-nav li a").velocity({
      color: "#0D3758"
    }, 10);

    $(".navbar-default .navbar-toggle .icon-bar").velocity({
      backgroundColor: "#0D3758"
    }, 10);

    $(".navbar-header > .search > .fa-search").velocity({
      color: "#0D3758"
    }, 10);

    $(".navbar-header > .search > div > input").velocity({
      borderBottomColor: "#0D3758"
    }, 10);

    $(".navbar-header > .search > a").velocity({
      color: "#0D3758"
    }, 10);

  }, {

    offset: "-1"

  });


  $(".waypoint").waypoint(function() {
 
    $(".navbar-default").velocity({
        backgroundColor : "#ffffff",
        backgroundColorAlpha : 0.9
    }, 100);

    $(".navbar-default").css("box-shadow", "0px 4px 41px -5px rgba(0,0,0,0.49)");

    $(".navbar-default .navbar-nav li a").velocity({
      color: "#0D3758"
    }, 10);

    $(".navbar-default .navbar-toggle .icon-bar").velocity({
      backgroundColor: "#0D3758"
    }, 10);

    $(".navbar-header > .search > .fa-search").velocity({
      color: "#0D3758"
    }, 10);

    $(".navbar-header > .search > div > input").velocity({
      borderBottomColor: "#0D3758"
    }, 10);

    $(".navbar-header > .search > a").velocity({
      color: "#0D3758"
    }, 10);

    $(".scroll-helper").velocity("fadeOut", {
      duration: 500
    });

  }, {

    offset: "1"

  });

  /* Navbar actions */

  $(".navbar-toggle").click(function (event) {
    var navbarContent = $(".navbar-content").css("width");

    if (navbarContent === "350px") {

      $(".navbar-content > div").fadeOut(300, function () {
        $(".navbar-content").velocity({
          "width" : "0px"
        }, 200);
      });

    } else if (navbarContent === "0px") {

      $(".navbar-content").velocity({
        "width" : "350px"
      }, 200, function () {
        $(".navbar-content > div").delay(500).fadeIn(300);
      });

    };
    
  });

  $(".navbar-content-close-btn").click(function (event) {

    $(".navbar-content > div").fadeOut(300, function () {
      $(".navbar-content").velocity({
        "width" : "0px"
      }, 200);
    });

  });

  navbarLevel = 0;

  $(".navbar-content-item").click(function (event) {
    event.preventDefault();

    var linkRef = $(this).attr("href");
    var linkRef = linkRef.replace('/','');

    var titleText = $(this).text();

    if (linkRef != "#") {

      $(this).parents("ul").children("li").hide();
      $(this).parents("li").next(".submenu").velocity({
        left: 0
      }, 200, 'linear');

      navbarLevel ++;

      var currentNavbarItem = $(this).text();
      $(".breadcrumbs").append("<li>" + currentNavbarItem + "</li>");

      var titleText = titleText.replace(/-/g, ' ');
      $(".navbar-title").html(titleText);

    }
  });

  $(".navbar-content-sub-item").click(function (event) {
    event.preventDefault();

    var linkRef = $(this).attr("href");
    var linkRef = linkRef.replace('/','');

    var titleText = $(this).text();

    if (linkRef != "#") {

      $(this).parents("ul").children("li").hide();

      $(this).parents("li").next(".submenu").velocity({
        left: 0
      }, 200, 'linear');

      navbarLevel ++;

      var currentNavbarItem = $(this).text();
      $(".breadcrumbs").append("<li>" + currentNavbarItem + "</li>");

      var titleText = titleText.replace(/-/g, ' ');
      $(".navbar-title").html(titleText);

    }
  });

  $(".go-back").click(function (event) {
    event.preventDefault();

    if (navbarLevel == 1) {

      var linkRef = $(this).attr("href");
      var linkRef = linkRef.replace('/','');

      $(this).closest("ul").velocity({
        left: 400
      }, 100, 'linear');
      $(this).parents("ul").parents("ul").children("li").fadeIn();

      $(".breadcrumbs li:last-child").remove();

      var linkRef = linkRef.replace(/-/g, ' ');
      $(".navbar-title").html(linkRef);

      navbarLevel --;

    } else {

      var linkRef = $(this).attr("href");
      var linkRef = linkRef.replace('/','');

      $(this).closest("ul").velocity({
        left: 400
      }, 100, 'linear');
      $(this).parents("ul").parents("ul").children("li").fadeIn();
      $(this).parents("ul").parents("ul").parents("ul").children("li").hide();

      $(".breadcrumbs li:last-child").remove();

      var linkRef = linkRef.replace(/-/g, ' ');
      $(".navbar-title").html(linkRef);

      navbarLevel --;

    }
  });

  $("section").click(function () {

    var navbarContent = $(".navbar-content").css("width");

    if (navbarContent === "350px") {

      $(".navbar-content > div").fadeOut(300, function () {
        $(".navbar-content").velocity({
          "width" : "0px"
        }, 200);
      });

    }

  })

});