$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "fade",
        animationLoop: true,
        controlNav: true,
        directionNav: false
    });
});


$(document).ready(function() {
      $('.preloading').fadeOut();
    $('#carousel_vertical_slide, #carousel-testimonial-1, #carousel-testimonial-2, #carousel_fade, #carousel_vertical_testimonial, #carousel_fade_icons, #carousel-support, #carousel_fade_2, #carousel_testimonial_2').carousel({
        interval: 3000
    });
    $('#logokhan').hover(function() {
        $(this).addClass('animated tada');
    }, function() {
        $(this).removeClass('animated tada');
    });
    //            Responsive Videos
    $("#main-media").fitVids();
    ///////////// HEIGHT OF FIRST FRAME OF WEBSITE

    //////// NICE SCROLL JS
    $(function() {
        $("html").niceScroll({
            horizrailenabled: false
        });
    });
});
///////////// ANCHOR SCROLLS    


//
//  
// Cache selectors
var lastId,
    topMenu = $(".nav"),
    topMenuHeight = topMenu.outerHeight() + 50,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function() {
        var item = $($(this).attr("href"));
        if (item.length) {
            return item;
        }
        ///////////////TWITTER 

        // $('.tweets').each(function() {
        //     var tweets = $(this),
        //         data = tweets.data() || {};
        //     tweets.tweet({
        //         modpath: 'assets/twitter/',
        //         username: data.username,
        //         count: data.count,
        //         template: "{text}{time}",
        //         loading_text: 'loading twitter feed...'
        //     });
        // });
        ///////////////FANCYBOX 
        $(".fancybox-media").fancybox({
            arrows: true,
            padding: 0,
            closeBtn: true,
            openEffect: 'fade',
            closeEffect: 'fade',
            prevEffect: 'fade',
            nextEffect: 'fade',
            helpers: {
                media: {},
                overlay: {
                    locked: false
                },
                buttons: false,
                title: {
                    type: 'inside'
                }
            },
            beforeLoad: function() {
                var el, id = $(this.element).data('title-id');
                if (id) {
                    el = $('#' + id);
                    if (el.length) {
                        this.title = el.html();
                    }
                }
            }
        });
    });
