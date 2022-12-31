//back to top function
jQuery("#backtotop").click(function () {
    jQuery("body,html").animate({
        scrollTop: 0
    }, 600);
});

//back to top animation
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery("#backtotop").addClass("visible");
    } else {
        jQuery("#backtotop").removeClass("visible");
    }
});

// services animations
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 450) {
        jQuery(".service1").addClass("animated zoomIn visible");
    } else {
        jQuery(".service1").removeClass("animated zoomIn");
        jQuery(".service1").removeClass("visible");
    }
});

//latest news animations
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 1150) {
        jQuery(".latest").addClass("animated fadeInRight visible");
    } else {
        jQuery(".latest").removeClass("animated fadeInRight");
        jQuery(".latest").removeClass("visible");
    }
});
