/* My custom jquery scroll follio code */
jQuery(document).ready( function() {
    "use strict";
    jQuery("#main-menu a, .logo a, .home-logo-text a, .menu a, .scroll-to").bind('click',function(event){

        var headerH = jQuery('.navbar-wrapper').height();
        var scrollId=jQuery(this).attr("href");
        scrollId = scrollId.substr ( scrollId.indexOf ( '#' ) + 1 );
        scrollId='#'+scrollId;
        jQuery("html, body").animate({
            scrollTop: jQuery(scrollId).offset().top - (headerH) + "px"
        }, {
            duration: 1200,
            easing: "easeInOutExpo"
        });

        return false;
        event.preventDefault();
    });


});
