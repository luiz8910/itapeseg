(function($) {
    "use strict";

    jQuery(document).ready(function(jQuery) {

        /*-----------------------------------------------------------------------------------*/
        /*             jQurey UI
        /*-----------------------------------------------------------------------------------*/

        jQuery( ".accordion" ).accordion({
            collapsible: false,
            active: false,
            heightStyle: false
        });

        jQuery( ".accordion-close" ).accordion({
            collapsible: true,
            active: false,
            heightStyle: false
        });


        jQuery( ".tabs" ).tabs();

        jQuery( "#vtabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
        jQuery( "#vtabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );

        jQuery("area[rel^='prettyPhoto']").prettyPhoto();

        jQuery(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:4000, autoplay_slideshow: true, deeplinking: false});
        jQuery(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:20000, deeplinking: false});

        // hide #back-top first
        jQuery("#back-top").hide();

        // fade in #back-top
        jQuery(function () {
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() > 100) {
                    jQuery('#back-top').fadeIn();

                } else {
                    jQuery('#back-top').fadeOut();
                }
            });

            // scroll body to 0px on click
            jQuery('#back-top a').click(function () {
                jQuery('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });



        /*****************************
         Responsive Menu
         ******************************/

        jQuery(window).load(function(){
            jQuery('#mobnav-btn').click(

                function () {
                    jQuery('.sf-menu').toggleClass("xactive");
                });

            jQuery('.mobnav-subarrow').click(

                function () {
                    jQuery(this).parent().toggleClass("xpopdrop");
                });
        });//]]>



        /*-----------------------------------------------------------------------------------*/
        /*  Isotope JS
        /*-----------------------------------------------------------------------------------*/
        var jQuerycontainer = jQuery('.pro');
        /* filter items when filter link is clicked */
        jQuerycontainer.isotope({layoutMode: 'fitRows', filter: '*'});
        jQuery('#filter a').click(function(){
            var selector = jQuery(this).attr('data-filter');
            jQuerycontainer.isotope({ layoutMode: 'fitRows',filter: selector });
            return false;
        });

        var jQueryoptionSets = jQuery('.option-set'),
            jQueryoptionLinks = jQueryoptionSets.find('a');

        jQueryoptionLinks.click(function(){
            var jQuerythis = jQuery(this);
            // don't proceed if already selected
            if ( jQuerythis.hasClass('active') ) {
                return false;
            }
            var jQueryoptionSet = jQuerythis.parents('.option-set');
            jQueryoptionSet.find('.active').removeClass('active');
            jQuerythis.addClass('active');
        });

        /*********************
         Scroll
         **********************/

        jQuery(window).load(function(){
            jQuery("#first_home").addClass("nav-active");
            var lastId;
            var topMenu = jQuery("#thumbs");

            var topMenuHeight = topMenu.outerHeight()+280;

            var menuItems = topMenu.find("a");

            var scrollItems = menuItems.map(function(){
                var item = jQuery(jQuery(this).attr("href"));
                if (item.length) { return item; }
            });

            jQuery(window).scroll(function(){
                var fromTop = jQuery(this).scrollTop()+topMenuHeight;
                var cur = scrollItems.map(function(){
                    if (jQuery(this).offset().top < fromTop)
                        return this;
                });
                cur = cur[cur.length-1];
                var id = cur && cur.length ? cur[0].id : "";

                if (lastId !== id) {
                    jQuery("#first_home").removeClass("nav-active");
                    lastId = id;
                    menuItems
                        .parent().removeClass("nav-active")
                        .end().filter("[href=#"+id+"]").parent().addClass("nav-active");
                }
            });
        });

        jQuery(window).load(function() {
            jQuery(".spinner").fadeOut("slow");
        })

        // Initialize Masonry
        jQuery('#content02').masonry({
            columnWidth: 569,
            itemSelector: '.masonry',
            isFitWidth: true,
            isAnimated: !Modernizr.csstransitions
        }).imagesLoaded(function() {
            jQuery(this).masonry('reload');
        });

        // Initialize Masonry
        jQuery('#content03').masonry({
            columnWidth: 440,
            itemSelector: '.masonry',
            isFitWidth: true,
            isAnimated: !Modernizr.csstransitions
        }).imagesLoaded(function() {
            jQuery(this).masonry('reload');
        });

        /**********************************
         scroll effect
         **********************************/

        jQuery(function () {
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() > 100) {
                    jQuery('#back-top').fadeIn();
                    jQuery('.navbar-wrapper').css('padding-top', '10px');
                    jQuery('.social_icon').css('padding-top', '18px');
                    jQuery('#main-menu ul li').css('padding-top', '7px');
                    jQuery('#main-menu ul li').css('padding-bottom', '7px');
                    jQuery('#main-menu ul li a').css('padding-top', '11px');
                    jQuery('#main-menu ul li a').css('padding-bottom', '11px');
                    jQuery('#main-menu').css('top', '85px');


                } else {
                    jQuery('#back-top').fadeOut();
                    jQuery('.navbar-wrapper').css('padding-top', '13px');
                    jQuery('.social_icon').css('padding-top', '25px');
                    jQuery('#main-menu ul li').css('padding-top', '19px');
                    jQuery('#main-menu ul li').css('padding-bottom', '19px');
                    jQuery('#main-menu ul li a').css('padding-top', '22px');
                    jQuery('#main-menu ul li a').css('padding-bottom', '22px');
                    jQuery('#main-menu').css('top', '91px');

                }
            });
        });

        jQuery('#image_rotate').innerfade({
            speed: 'slow',
            timeout: 8000,
            type: 'sequence',
            containerheight: 'none'
        });

    });

    jQuery(function() {
        var galleries = jQuery('.ad-gallery').adGallery({
            update_window_hash: false,
            width: false,
            height: false,
            slideshow: {
                enable: false,
                autostart: true,
                speed: 5000,
                start_label: '',
                stop_label: '',
                // Should the slideshow stop if the user scrolls the thumb list?
                stop_on_scroll: false,
                // Wrap around the countdown
                countdown_prefix: '(',
                countdown_sufix: ')',

            },
        });

        /*----------------------------------------------------*/
        /* MOBILE DETECT FUNCTION
        /*----------------------------------------------------*/

        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };

        jQuery('.skill_bg').parallax("50%", 0.4);
        jQuery('.parallax-1').parallax("50%", 0.4);
        jQuery('.client_bg').parallax("50%", 0.4);
        jQuery('.testimonial_bg').parallax("50%", 0.3);

        jQuery('.sf-menu li a').click(function(){

            jQuery('.sf-menu').removeClass('xactive');


        });


    });
    /*----------------------------------------------------*/
// CONTACT FORM WIDGET
    /*----------------------------------------------------*/

    jQuery("form#contactfrm").submit(function(e){
        e.preventDefault();
        name = jQuery('#contact_name').val();
        email = jQuery('#contact_email').val();
        web = jQuery('#contact_web').val();
        msg = jQuery('#contact_message').val();
        var error =0;


        if(name=="Full Name" || jQuery.trim(name).length==0 ){ jQuery("#contact_name").addClass('contant_error'); error =1; }

        if(email=="Your Email"){ jQuery("#contact_email").addClass('contant_error'); error =1; }

        var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);

        if(!pattern.test(email)){ error =1; }

        if(web=="Website" || jQuery.trim(web).length==0){ jQuery("#contact_web").addClass('contant_error'); error =1; }

        if(msg=="Type Message" || jQuery.trim(msg).length==0){ jQuery("#contact_message").addClass('contant_error'); error =1; }

        if(error ==1){
            jQuery("#contact_form_message_box").html('<div class="alert error notifications_content"><p>Error!!!  Fields are required.</p></div>');
        }else{
            jQuery("#contact_form_message_box").html('<div class="alert attention notifications_content"><p>Please wait....</p></div>');
            jQuery.ajax({
                type: "POST",
                url: "libs/submit-form-ajax.php",
                data: 'name='+name+'&email='+email+"&web="+web+"&message="+msg,
                success: function(msg){
                    if(msg=="success"){
                        jQuery("#contact_form_message_box").html('<div class="alert well notifications_content"><p>Well Done :) Your message is sent. Thank you!</p></div>');
                        jQuery('#contact_name').val('Full Name');
                        jQuery('#contact_email').val('Your Email');
                        jQuery('#contact_subject').val('Website');
                        jQuery('#contact_message').val('Type Message');
                    }else{
                        jQuery("#contact_form_message_box").html('<div class="alert error notifications_content"><p>Error!!! Something wrong. Please try again!</p></div>');
                    }
                }

            });
        }
    });
    /* twitter call */
    jQuery.ajax({
        type: "POST",
        url: "tweets/get-tweets.php",
        data: 'user=envato',  //your twitter username
        success: function(msg){
            jQuery("#gettweet").html(msg);
        }
    });
    var revapi;
    jQuery(document).ready(function() {
        revapi = jQuery('.tp-banner').revolution(
            {
                delay:9000,
                startwidth:1170,
                startheight:650,
                hideThumbs:10,
                fullWidth:"on",
                forceFullWidth:"on"
            });

    }); //ready

})(jQuery);
