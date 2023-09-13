/*nuevo script de otra pagina------*/

jQuery(window).on("load", function () {
    "use strict";

    /*  ===================================
     Loading Timeout
     ====================================== */
    $("#loader-fade").fadeOut(800);
});

jQuery(function ($) {
    "use strict";

    var $window = $(window);
    var windowsize = $(window).width();

    /* ===================================
       Nav Scroll
       ====================================== */

    $(".scroll").on("click", function(event){
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top - 40}, 1100);
    });

    /*----- counter js ----*/
    $(".demo-banner").appear(function () {
        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 5000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });

    /* ====================================
       Nav Fixed On Scroll
       ======================================= */

    if ($("nav.navbar").hasClass("static-nav")) {
        $(window).on("scroll", function () {
            var $scroll = $window.scrollTop();
            if ($scroll >= 80) {
                $('header').addClass('header-appear');
            } else {
                $('header').removeClass('header-appear');
            }
        });
    }

    /*bottom menu fix*/
    if ($("nav.navbar").hasClass("bottom-nav")) {
        var navHeight = $(".bottom-nav").offset().top;
        $(window).on("scroll", function () {
            if ($window.scrollTop() > navHeight) {
                $('.bottom-nav').addClass('fixed-menu');
            } else {
                $('.bottom-nav').removeClass('fixed-menu');
            }
        });
    }
    if ($("nav.navbar").hasClass("bottom-nav")) {
        $(window).on("scroll", function () {
            var $scroll = $window.scrollTop();
            var $bottom = $(".bottom-nav");
            if ($scroll >= 400) {
                $bottom.addClass("scroll-menu");
            } else {
                $bottom.removeClass("scroll-menu");
            }
        });
    }
    $(window).on('scroll', function () {
        if ($(this).scrollTop() >= 80) { // Set position from top to add class
            $('header').addClass('header-appear');
        }
        else {
            $('header').removeClass('header-appear');
        }
    });


    /* ===================================
       Side Menu
       ====================================== */

    if ($("#sidemenu_toggle").length) {
        $("#sidemenu_toggle").on("click", function () {
            $(".pushwrap").toggleClass("active");
            $(".side-menu").addClass("side-menu-active"), $("#close_side_menu").fadeIn(700)
        }), $("#close_side_menu").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $(this).fadeOut(200), $(".pushwrap").removeClass("active")
        }), $(".side-nav .navbar-nav .nav-link").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $("#close_side_menu").fadeOut(200), $(".pushwrap").removeClass("active")
        }), $("#btn_sideNavClose").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $("#close_side_menu").fadeOut(200), $(".pushwrap").removeClass("active")
        })
    }

    /* ===================================
       About Box Hover Setting
       ====================================== */
    $(".about-box").on("mouseenter", function () {
        $(".about-box.active").addClass("about-box-green");
    })

    $(".about-box").on("mouseleave", function () {
        $(".about-box.active").removeClass("about-box-green");
    })
    /* =====================================
            Wow
       ======================================== */

    if ($(window).width() > 767) {
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });
        new WOW().init();
    }

    /* ----- Full Screen ----- */
    function resizebanner() {
        var $fullscreen = $(".full-screen");
        $fullscreen.css("height", $window.height());
        $fullscreen.css("width", $window.width());
    }
    resizebanner();
    $window.resize(function () {
        resizebanner();
    });


    /* ===================================
       Features Section Number Scroller
       ====================================== */

    $(".stats").each(function () {
        $('.numscroller').appear(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 5000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });

    /* ===================================
       Equal Heights
       ====================================== */
    checheight();
    $window.on("resize", function () {
        checheight();
    });

    function checheight() {
        var $smae_height = $(".equalheight");
        if ($smae_height.length) {
            if (windowsize > 767) {
                $smae_height.matchHeight({
                    property: "height",
                });
            }
        }
    }

    /* ===================================
       Animated Progress Bar
       ====================================== */

    $(".progress-bar").each(function () {
        $(this).appear(function () {
            $(this).animate({width: $(this).attr("aria-valuenow") + "%"}, 2000)
        });
    });

    /* ===================================
       Parallax
       ====================================== */

    if (windowsize > 992) {
        $(".parallaxie").parallaxie({
            speed: 0.4,
            offset: 0
        });
    }

    /* ===================================
       Popup Icons
       ====================================== */
    $(function(){
        var elems = [$('i.circle-bg-fb'), $('i.circle-bg-tw'), $('i.circle-bg-p'), $('i.circle-bg-i')];
        var cls = ["circle-bg-fb-end", "circle-bg-tw-end", "circle-bg-p-end", "circle-bg-i-end",];

        $('.social-icons-popup').on("mouseenter", function(){
            for(var i=0; i<elems.length; i++) {
                elems[i].addClass(cls[i]);
            };
        }).on("click", function(){
            for(var i=0; i<elems.length; i++) {
                elems[i].removeClass(cls[i]);
            };
        });
    });

    /* ===================================
       Cube Portfolio
       ====================================== */

    // init cubeportfolio
    var singlePage = $('#js-singlePage-container').children('div');
    $('#js-grid-slider-projects').cubeportfolio({
        layoutMode: 'grid',
        drag: true,
        auto: false,
        autoTimeout: 5000,
        autoPauseOnHover: true,
        showNavigation: true,
        showPagination: false,
        rewindNav: false,
        scrollByPage: false,
        caption: 'zoom',
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 4
        }, {
            width: 1100,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 1,
            options: {
                gapVertical: 10
            }
        }],
        gapHorizontal: 20,
        gapVertical: 20,

        displayType: 'fadeIn',
        displayTypeSpeed: 100,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

        // singlePage popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageAnimation: 'fade',
        singlePageCallback: function(url, element) {
            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
            var indexElement = $(element).parents('.cbp-item').index(),
                item = singlePage.eq(indexElement);

            item.find('img').each(function(index, el) {
                var attr = el.getAttribute('data-cbp-src');

                if (attr) {
                    el.setAttribute('src', attr);
                    el.removeAttribute('data-cbp-src');
                }
            });

            this.updateSinglePage(item.html());
        },
    });

    /* ===================================
       Fancy Box
       ====================================== */
    $('[data-fancybox]').fancybox({
        protect: true,
        animationEffect: "fade",
        hash: null,
    });

    /* =====================================
       Select
       ======================================== */
    $(document).ready(function(){

        // Initialize select2
        $("#services").select2();

    });

    /* ===================================
       Owl Carousel
       ====================================== */

    /* Team Classic */
    $(".team-classic.owl-team").owlCarousel({
        items: 3,
        margin: 30,
        dots: true,
        nav: false,
        loop:true,
        autoplay: true,
        smartSpeed:500,
        navSpeed: true,
        autoplayHoverPause:true,
        responsiveClass:true,
        responsive: {
            992: {
                items: 3
            },
            600: {
                items: 2
            },
            320: {
                items: 1
            }
        }
    });

    /* Brand Carousel */
    $('.brand-carousel').owlCarousel({
        margin: 75,
        nav: false,
        navText: [
            '<i class="ti ti-angle-left"></i>',
            '<i class="ti ti-angle-right"></i>'
        ],
        dots: false,
        autoWidth: false,
        autoplay: 300,
        autoplayHoverPause: false,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            600: {
                items: 4
            },
            1000: {
                items: 5
            }
        }
    });

    /* Request */
    $(".owl-split").owlCarousel({
        items: 1,
        margin: 0,
        dots: false,
        nav: false,
        loop: true,
        autoplay: true,
        smartSpeed:500,
        navSpeed: true,
        autoplayHoverPause:true,
        responsiveClass:true
    });

    /* ===================================
       Slick
       ====================================== */

    $('.testimonial-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        asNavFor: '.testimonial-nav'
    });
    $('.testimonial-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.testimonial-for',
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000
    });

    /* ===================================
       Revolution Slider
       ====================================== */

    /*Standard*/
    $("#secondary-banner").show().revolution({
        sliderType: "standard",
        sliderLayout: "fullscreen",
        scrollbarDrag: "true",
        dottedOverlay: "none",
        navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            mouseScrollReverse: "default",
            onHoverStop: "on",
            touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            },
            bullets: {
                enable: true,
                hide_onmobile: false,
                style: "awaza",
                hide_onleave: false,
                direction: "vertical",
                h_align: "left",
                v_align: "center",
                h_offset: 50,
                v_offset: 0,
                space: 5,
                tmp: '<div class="tp-bullet-number"><span class="tp-count">{{param1}}</span><span class="tp-bullet-line"></span></div>'
            }
        },
        viewPort: {
            enable: true,
            outof: "pause",
            visible_area: "90%"
        },
        responsiveLevels: [1240, 1024, 778, 480],
        visibilityLevels: [1240, 1024, 778, 480],
        gridwidth: [1240, 1024, 778, 480],
        gridheight: [868, 768, 960, 720],
        lazyType: "none",
        parallax: {
            type: "mouse",
            origo: "slidercenter",
            speed: 9000,
            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
            disable_onmobile: "on"
        },
        shadow: 0,
        spinner: "off",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
        }
    });

});

/*----fin de script vb---*/


$(window).on("load", function () {

    "use strict";

    /* ===================================
            Loading Timeout
     ====================================== */

    $('.side-menu').removeClass('hidden');
    $('.shop-card-window').removeClass('hidden');

    setTimeout(function(){
        $('.preloader').fadeOut();
    }, 1000);

});


jQuery(function ($) {


    "use strict";

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 260) { // Set position from top to add class
            $('header').addClass('header-appear');
        }
        else {
            $('header').removeClass('header-appear');
        }
    });

    //scroll to appear
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 500)
            $('.scroll-top-arrow').fadeIn('slow');
        else
            $('.scroll-top-arrow').fadeOut('slow');
    });

    //Click event to scroll to top
    $(document).on('click', '.scroll-top-arrow', function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

    $(".scroll").on("click", function (event) {
        event.preventDefault();
        $("html,body").animate({
            scrollTop: $(this.hash).offset().top - 60}, 1200);
    });

    /* ===================================
        Side Menu
    ====================================== */
    if ($("#sidemenu_toggle").length) {
        $("#sidemenu_toggle").on("click", function () {
            $(".pushwrap").toggleClass("active");
            $(".side-menu").addClass("side-menu-active"), $("#close_side_menu").fadeIn(700)
        }), $("#close_side_menu").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $(this).fadeOut(200), $(".pushwrap").removeClass("active")
        }), $(".side-nav .navbar-nav .scroll").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $("#close_side_menu").fadeOut(200), $(".pushwrap").removeClass("active")
        }), $("#btn_sideNavClose").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $("#close_side_menu").fadeOut(200), $(".pushwrap").removeClass("active")
        });
    }


    /* =====================================
          Parallax
       ====================================== */

    if($(window).width() < 780) {
        $('.parallax').addClass("parallax-disable");
    } else {
        $('.parallax').removeClass("parallax-disable");

        // parallax
        $(".parallax").parallaxie({
            speed: 0.55,
            offset: 0,
        });
    }

    /* ===================================
      Owl Carousel
     ====================================== */

    $('.slider-wrap').owlCarousel({
        items: 4,
        autoplay: 1500,
        smartSpeed: 1500,
        autoplayHoverPause: true,
        slideBy: 1,
        loop: true,
        margin:0,
        dots: false,
        nav: false,
        responsive: {
            1200: {
                items: 4,
            },
            768: {
                items: 3,
            },
            480: {
                items: 2,
            },
            320: {
                items: 1,
            },
        }
    });
    $('.best-products-carousel').owlCarousel({
        items: 4,
        autoplay: 1500,
        smartSpeed: 1500,
        autoplayHoverPause: true,
        slideBy: 1,
        loop: true,
        margin:30,
        dots: false,
        nav: false,
        responsive: {
            1200: {
                items: 4,
            },
            768: {
                items: 3,
            },
            480: {
                items: 2,
            },
            320: {
                items: 1,
            },
        }
    });
    $('#sponser-tags').owlCarousel({

        loop: true,
        margin: 20,
        slideSpeed: 5000,
        slideTransition: 'linear',
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            },
        }

    });
    //Testimonial Slider
    $('.testimonial-carousel').owlCarousel({
        loop: true,
        smartSpeed: 800,
        responsiveClass: true,
        nav:false,
        dots:false,
        autoplay: true,
        margin:0,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 1,
            },
            992: {
                items: 1,
            }
        }
    });
    $('#customNextBtn').click(function() {
        var owl = $('.testimonial-carousel');
        owl.owlCarousel();
        owl.trigger('next.owl.carousel');
    });
    $('#customPrevBtn').click(function() {
        var owl = $('.testimonial-carousel');
        owl.owlCarousel();
        owl.trigger('prev.owl.carousel', [300]);
    });




    /* =====================================
               slider js
     ====================================== */
    if ($(".rev-slider").length) {

        $("#rev_slider_18_1").show().revolution({
            sliderType:"standard",
            jsFileLocation:"//revslider.ads:7080/revslider/public/assets/js/",
            sliderLayout:"fullscreen",
            dottedOverlay:"none",
            delay:9000,
            navigation: {
                keyboardNavigation: "off",
                keyboard_direction: "horizontal",
                mouseScrollNavigation: "off",
                mouseScrollReverse: "default",
                onHoverStop: "off",
                arrows: {
                    style: "gyges",
                    enable: true,
                    hide_onmobile: true,
                    hide_under: 767,
                    hide_onleave: false,
                    tmp: '',
                    left: {
                        h_align: "left",
                        v_align: "center",
                        h_offset: 20,
                        v_offset: 0
                    },
                    right: {
                        h_align: "right",
                        v_align: "center",
                        h_offset: 20,
                        v_offset: 0
                    }
                }
            },
            responsiveLevels: [1240, 1025, 778, 480],
            visibilityLevels: [1240, 1025, 778, 480],
            // gridwidth: [1140, 1025, 768, 480],
            gridwidth: [1140, 1025, 768, 480],
            // gridheight: [660, 650, 600, 490],
            gridheight: [660, 660, 600, 490],
            lazyType:"none",
            shadow:0,
            spinner:"off",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            fullScreenAutoWidth:"off",
            fullScreenAlignForce:"off",
            fullScreenOffsetContainer: "",
            fullScreenOffset: "",
            disableProgressBar:"on",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            debugMode:false,
            fallbacks: {
                simplifyAll:"off",
                nextSlideOnWindowFocus:"off",
                disableFocusListener:false,
            }
        });

    }


    /* =====================================
                shop card js
       ====================================== */
    $("#open-shop-card").on('click',function () {
        $("#shop-card-window").addClass('active');
    });
    $("#close-card-window").on('click',function () {
        $("#shop-card-window").removeClass('active');
    });

    $("#open-shop-card1").on('click',function () {
        $("#shop-card-window").addClass('active');
    });

    /* =====================================
               search box js
      ====================================== */
    // $("#open-search-window").on('click',function () {
    //     $("#search-box-window").addClass('active');
    // });
    // $("#close-search-window").on('click',function () {
    //     $("#search-box-window").removeClass('active');
    // });
    //
    // $("#open-search-window1").on('click',function () {
    //     $("#search-box-window").addClass('active');
    // });

    /*===================================
          Price Range
    ======================================*/

    if ($("#slider-range").length) {
        var marginSlider = document.getElementById('slider-range');

        noUiSlider.create(marginSlider, {
            start: [0, 800],
            margin: 30,
            step: 1,
            connect: true,
            range: {
                'min': 0,
                'max': 1000
            },

        });

        var marginMin = document.getElementById('min-p'),
            marginMax = document.getElementById('max-p');

        marginSlider.noUiSlider.on('update', function (values, handle) {
            if (handle) {
                var str = values[handle]
                var res = str.split(".");
                marginMax.innerHTML = "$" + res[0];
            } else {
                var str = values[handle]
                var res = str.split(".");
                marginMin.innerHTML = "$" + res[0] + " - ";
            }
        });
    }

    /* ===================================
     Product Listing Owl Changes Images
  ====================================== */

    $('.product-listing-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    /*===================================
          Swiper Sync Slider
======================================*/
    if ($("#gallery").length) {
        var galleryTop = new Swiper('#gallery', {
            effect: 'fade',
            direction: 'vertical',
            spaceBetween: 10,
            slidesPerView: 1,
            slidesPerGroup: 1,
            loop: true,
            initialSlide: 0,
            centeredSlides: true,
            loopAdditionalSlides: 5,
            touchRatio: 0.2,

        });

        var galleryThumbs = new Swiper('#thumbs', {
            direction: 'vertical',
            spaceBetween: 10,
            slidesPerView: 3,
            slidesPerGroup: 1,
            loop: true,
            initialSlide: 0,
            centeredSlides: true,
            loopAdditionalSlides: 3,
            touchRatio: 0.2,
            slideToClickedSlide: true
        });

        galleryTop.controller.control = galleryThumbs;
        galleryThumbs.controller.control = galleryTop;
    }


    /*===================================
              Input Number Counter
    ======================================*/


    $('.count').prop('disabled', true);
    $(document).on('click', '.plus', function () {
        $('.count').val(parseInt($('.count').val()) + 1);

    });
    $(document).on('click', '.minus', function () {
        $('.count').val(parseInt($('.count').val()) - 1);
        if ($('.count').val() == 0) {
            $('.count').val(1);

        }
    });

    /*===================================
              //Sticky Filter Nav
    ======================================*/
    var sidebar = $('#product-filter-nav');
    if (sidebar.length) {
        Stickyfill.add(sidebar);
    }
    /*===================================
              open search box window
     ======================================*/
    $('.open_search').on('click', function(event){
        event.stopPropagation();
        $('.search_block').toggleClass('visible');
        $('.search_block .search_input').focus();
        $('.search-overlay').addClass('overlayer');
        $('#sidemenu_toggle').fadeOut(2);
    });
    // close icon script

    $('body').on('click', function(){
        $('.search_block').removeClass('visible');
        $('.search-overlay').removeClass('overlayer');
        $('#sidemenu_toggle').fadeIn(2);
    });

    $('.search_box').on('click', function(event){
        event.stopPropagation();
    });

    $('.search_input').on('keyup', function(event){
        if($(this).val() !== ''){
            $(this).addClass('typing');
        } else {
            $(this).removeClass('typing');
        }
    });

    $(document).on('keyup',function(e){
        if(e.keyCode===27){
            $('.search_block').removeClass('visible');
            $('.search-overlay').removeClass('overlayer');
            $('#sidemenu_toggle').fadeIn(2);
        }
    });
    /* ===================================
              Wow Effects
    ======================================*/
    var wow = new WOW(
        {
            boxClass:'wow',      // default
            animateClass:'animated', // default
            offset:0,          // default
            mobile:false,       // default
            live:true        // default
        }
    );
    wow.init();

});

/* =====================================
       Portfolio Filter
       ======================================= */

    /*Portfolio Two*/

    var $gallery = $('.gallery').isotope({
        // options
        itemSelector: '.items'
    });

// filter items on button click
    $('.filtering').on('click', 'span', function () {

        var filterValue = $(this).attr('data-filter');
        $gallery.isotope({filter: filterValue});
        $(this).addClass('active').siblings().removeClass('active');

    });


    setTimeout(function (){
        $('.filtering .active').click();
    }, 1500);


      /* ===================================
          Fancy Box
          ====================================== */
          $('[data-fancybox]').fancybox({

        });

//************************CUBE PORTFOLIO FOR GALLERY****************

(function($, window, document, undefined) {
    'use strict';

    // init cubeportfolio
    $('#js-grid-mosaic').cubeportfolio({
        filters: '#js-filters-mosaic',
        layoutMode: 'mosaic',
        sortByDimension: true,
        mediaQueries: [{
            width: 1500,
            cols: 5,
        }, {
            width: 1100,
            cols: 4,
        }, {
            width: 800,
            cols: 3,
        }, {
            width: 480,
            cols: 2,
            options: {
                caption: '',
                gapHorizontal: 15,
                gapVertical: 15,
            }
        }],
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 15,
        gapVertical: 15,
        gridAdjustment: 'responsive',
        caption: 'zoom',
        displayType: 'sequentially',
        displayTypeSpeed: 100,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

        plugins: {
            loadMore: {
                element: '#js-loadMore-mosaic',
                action: 'click',
                loadItems: 3,
            }
        },
    });
})(jQuery, window, document);

var accordion = $('body').find('[data-behavior="accordion"]');
var expandedClass = 'is-expanded';

$.each(accordion, function () { // loop through all accordions on the page

    var accordionItems = $(this).find('[data-binding="expand-accordion-item"]');

    $.each(accordionItems, function () { // loop through all accordion items of each accordion
        var $this = $(this);
        var triggerBtn = $this.find('[data-binding="expand-accordion-trigger"]');

        var setHeight = function (nV) {
            // set height of inner content for smooth animation
            var innerContent = nV.find('.accordion__content-inner')[0],
                maxHeight = $(innerContent).outerHeight(),
                content = nV.find('.accordion__content')[0];

            if (!content.style.height || content.style.height === '0px') {
                $(content).css('height', maxHeight);
            } else {
                $(content).css('height', '0px');
            }
        };

        var toggleClasses = function (event) {
            var clickedItem = event.currentTarget;
            var currentItem = $(clickedItem).parent();
            var clickedContent = $(currentItem).find('.accordion__content')
            $(currentItem).toggleClass(expandedClass);
            setHeight(currentItem);

            if ($(currentItem).hasClass('is-expanded')) {
                $(clickedItem).attr('aria-selected', 'true');
                $(clickedItem).attr('aria-expanded', 'true');
                $(clickedContent).attr('aria-hidden', 'false');

            } else {
                $(clickedItem).attr('aria-selected', 'false');
                $(clickedItem).attr('aria-expanded', 'false');
                $(clickedContent).attr('aria-hidden', 'true');
            }
        }

        triggerBtn.on('click', event, function (e) {
            e.preventDefault();
            toggleClasses(event);
        });

        // open tabs if the spacebar or enter button is clicked whilst they are in focus
        $(triggerBtn).on('keydown', event, function (e) {
            if (e.keyCode === 13 || e.keyCode === 32) {
                e.preventDefault();
                toggleClasses(event);
            }
        });
    });

});
