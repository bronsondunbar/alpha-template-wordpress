
/* Template scroll reveal */

$(document).scroll(function (){

	/* Reveal posts as they come into view */

    $('.posts').each( function(i){
        
        var bottom_of_object = $(this).offset().top + 300;
        var bottom_of_window = $(window).scrollTop() + $(window).height();
        
        if (bottom_of_window > bottom_of_object) {

            if (!$(this).hasClass('in-viewport')) {
              $(this).velocity('transition.slideUpIn', { stagger: 700 }).delay(2000);
              $(this).addClass('in-viewport');
            }

        }
        
    }); 

});