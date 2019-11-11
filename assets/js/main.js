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

            /**
             * navbarHeader()
             * Wyswietlanie gornej belki z glownym menu
             */
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
                    $navbarBannerSpace = $(navbarBannerSpace);
                    
                if($navbarBanner.length > 0) {
                    setNavbarBannerSpace();
                
                    $(window).resize(function() {
                        setNavbarBannerSpace();
                    });
                }

                function setNavbarBannerSpace() {
                    $(navbarBannerSpace).css("padding-top", $navbarBanner.innerHeight());
                }
            }
        };
    }());

    $(function () {
        var homepage = Object.create(Homepage.prototype);
        homepage.init();
    });
}(window, jQuery));