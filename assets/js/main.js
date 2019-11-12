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
            }
        };
    }());

    $(function () {
        var homepage = Object.create(Homepage.prototype);
        homepage.init();
    });
}(window, jQuery));