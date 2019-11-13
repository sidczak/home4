(function (win, $) {
    'use strict';

    /**
     * Konstruktor
     */
    function ScrollSection() {
        throw new TypeError();
    }

    /**
     * Prototyp ScrollSection
     */
    ScrollSection.prototype = (function () {

        return {

            init: function () {
                this.navbarScrollSlide();
                this.navbarSidebarGroup();
                this.navbarSidebarSubgroup();
                this.navbarFrameFooter();
                this.navbarFrameIndicators();
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
            
            navbarScrollSlide: function () {
                $('.scroll-indicators a[href^="#"]').click(function (event) {
                    event.preventDefault();
                    scrollSection.addAnimation(this, 1500);
                });

                $(window).scroll(function (e) {
                    isSelected($(window).scrollTop());
                });

                var sections = $('.scroll-indicators a[href^="#"]');
                
                function getTargetTop(elem) {
                    var id = elem.attr("href");
                    var offset = 60;
                    return $(id).offset().top - offset;
                }

                function isSelected(scrolledTo) {
                    var threshold = 100;

                    for (var i = 0; i < sections.length; i++) {
                        var section = $(sections[i]);
                        var target = getTargetTop(section);

                        var target0 = getTargetTop($(sections[0]));
                        
                        if (scrolledTo > target - threshold && scrolledTo < target + threshold) {
                            sections.removeClass("active");
                            section.addClass("active");
                        }
                    }

                    if (scrolledTo < target0 - threshold || scrolledTo > target + 220) {
                        $('.scroll-indicators').addClass('hide');
                    } else {
                        $('.scroll-indicators').removeClass('hide');
                    }
                }
            },

            navbarSidebarGroup: function() {
                $('ul#sidebar li a.subject[href^="#"], [data-sidebar="scroll"][href^="#"]').click(function(event) {
                    event.preventDefault();
                    scrollSection.addAnimation(this, 1000);

                });

                $(window).scroll(function(e){
                    for (var i = 0; i < sections.length; i++) {
                        var section = $(sections[i]);

                        if (section.hasClass("active")) {
                            section.find("ul").slideDown();
                        } else {
                            section.find("ul").slideUp();
                        }
                    }
                });

                var sections = $('.bs-docs-sidebar .nav > li.part');
            },

            navbarSidebarSubgroup: function () {
                $('ul#sidebar li ul li a[href^="#"]').click(function (event) {
                    event.preventDefault();
                    scrollSection.addAnimation(this, 1000);
                });
            },

            navbarFrameFooter: function () {
                $('.frame-footer a[href^="#"]').click(function (event) {
                    event.preventDefault();
                    scrollSection.addAnimation(this, 1500);
                });
            },

            navbarFrameIndicators: function () {
                $('[data-selector="frame-indicators"] a[href^="#"]').click(function (event) {
                    event.preventDefault();
                    scrollSection.addAnimation(this, 1500);
                });
            }
        };
    }());

    $(function () {
        var scrollSection = Object.create(ScrollSection.prototype);
        scrollSection.init();
        win.scrollSection = scrollSection;
    });
}(window, jQuery));