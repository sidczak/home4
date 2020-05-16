const $ = require('jquery');
window.jQuery = $;

(function (win, $) {
    'use strict';

    /**
     * Konstruktor
     */
    function Homepage() {
        throw new TypeError();
    }

    /**
     * Prototyp Homepage
     */
    Homepage.prototype = (function () {

        return {
            init: function () {
                this.navbarHeader();
                this.navbarBanner();
                this.navbarScrollSlide();
                this.modalEmbedClose();
            },

            navbarHeader: function () {
                var navbarHeader = '.navbar',
                    $navbarHeader = $(navbarHeader),
                    fixedClass = 'navbar-transparent';

                if ($navbarHeader.hasClass(fixedClass)) {
                    setFixedClass();

                    $(window).scroll(function() {
                        setFixedClass();
                    });
                }

                function setFixedClass() {
                    if($navbarHeader.length > 0) {
                        if ($navbarHeader.offset().top > 50) {
                            $navbarHeader.removeClass(fixedClass);
                        } else {
                            $navbarHeader.addClass(fixedClass);
                        }
                    }
                }
            },
            navbarBanner: function () {
                var navbarBanner = '.navbar-banner',
                    $navbarBanner = $(navbarBanner),
                    navbarBannerSpace = '.navbar-banner-space',
                    $navbarBannerSpace = $(navbarBannerSpace),
                    browserWidth = $(window).width(),
                    fixedTop = '.fixed-top',
                    $fixedTop = $(fixedTop);
                    
                if($navbarBanner.length > 0) {
                    setNavbarBannerSpace();
                
                    $(window).resize(function() {
                        setNavbarBannerSpace();
                        browserWidth = $(window).width();
                    });
                }

                function setNavbarBannerSpace() {
                    $(navbarBannerSpace).css("padding-top", $navbarBanner.innerHeight());
                }

                if($navbarBanner.length > 0) {
                    hasNavbarBannerScrolled();
                    
                    $(window).scroll(function() {
                        hasNavbarBannerScrolled();
                    });
                }
                
                function hasNavbarBannerScrolled() {
                    // if(browserWidth < 992) {
                        if ($navbarBanner.offset().top > 50) {
                            $(navbarBannerSpace).css("padding-top", 0);
                            $fixedTop.css("top", -$navbarBanner.innerHeight());
                        } else {
                            $(navbarBannerSpace).css("padding-top", $navbarBanner.innerHeight());
                            $fixedTop.css("top", 0);
                        }
                    // }
                }
            },
            navbarScrollSlide: function () {
                $('[data-selector="navbar-scroll-slide"]').click(function (event) {
                    event.preventDefault();
                    homepage.addAnimation(this, 1500);
                });
            },
            addAnimation: function (element, duration) {
                var id = $(element).attr("href");
                var target = $(id).offset().top;
                $('html, body').animate(
                    {scrollTop: target},
                    duration,
                    'easeInOutExpo'
                );
            },
            modalEmbedClose: function () {
                // var videoSrc;
                // $('.btn-play').click(function () {
                //     videoSrc = $(this).data( "src" );
                //     console.log(videoSrc);
                // });

                // $('#exampleModal').on('shown.bs.modal', function () {
                //     $('#exampleModal iframe').attr('src', videoSrc);
                // });

                var videoSrc;
                $('[data-target="#exampleModal"]').click(function () {
                    videoSrc = $(this).data( "src" );
                    $('#exampleModal iframe').attr('src', videoSrc);
                });

                $('#exampleModal').on('hidden.bs.modal', function () {
                    $('#exampleModal iframe').removeAttr('src');
                });
            }
        };
    }());

    $(function () {
        var homepage = Object.create(Homepage.prototype);
        homepage.init();
        win.homepage = homepage;
    });
}(window, jQuery));