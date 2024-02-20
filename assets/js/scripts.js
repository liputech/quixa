;(function ($) {

    'use strict';

    var Quixa = {

        _init: function () {

            var offCanvas = {
                menuBar: $('.trigger-off-canvas'),
                drawer: $('.quixa-offcanvas-drawer'),
                drawerClass: '.quixa-offcanvas-drawer',
                menuDropdown: $('.dropdown-menu.depth_0'),
            };

            Quixa.readyFunctionality();
            Quixa.menuDrawerOpen(offCanvas);
            Quixa.offcanvasMenuToggle(offCanvas);
            Quixa.headerSearchOpen();
            Quixa.backToTop();
            Quixa.menuOffset();
            Quixa.slickSlider();
            Quixa.magnificPopup();
        },

        magnificPopup: function (){
            var yPopup = $(".popup-youtube");

            if (yPopup.length) {
                yPopup.magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            }
        },

        slickSlider: function () {
            $('.rt-carousel').css({'opacity': 1, 'transition':'0.4s'})
            if (typeof $.fn.slick == 'function') {
                $('.rt-slick').slick()
            }

            /*{
                dots: true,
                    arrows: false,
                fade: true,
                speed: 100,
                autoplay: true,
                autoplaySpeed: 5000,
                // adaptiveHeight: true,
            }*/

        },

        menuOffset: function () {
            $(".dropdown-menu > li").each(function () {
                var $this = $(this),
                    $win = $(window);

                if ($this.offset().left + ($this.width() + 30) > $win.width() + $win.scrollLeft() - $this.width()) {
                    $this.addClass("dropdown-inverse");
                } else if ($this.offset().left < ($this.width() + 30)) {
                    $this.addClass("dropdown-inverse-left");
                } else {
                    $this.removeClass("dropdown-inverse");
                }
            });
        },


        headerSticky: function () {

            if ($('body').hasClass('has-sticky-header')) {

                var stickyPlaceHolder = $("#rt-sticky-placeholder");
                var mainMenu = $(".main-header-section");
                var menuHeight = mainMenu.outerHeight() || 0;
                var headerTopbar = $('.quixa-topbar').outerHeight() || 0;
                var targrtScroll = headerTopbar + menuHeight;
                if ($('body').hasClass('quixa-header-2')) {
                    targrtScroll = $(window).height() - menuHeight;
                }

                // Main Menu
                if ($(window).scrollTop() > targrtScroll) {
                    mainMenu.addClass('rt-sticky');
                    stickyPlaceHolder.height(menuHeight);
                } else {
                    mainMenu.removeClass('rt-sticky');
                    stickyPlaceHolder.height(0);
                }

                //Mobile Menu
                var mobileMenu = $("#meanmenu");
                var mobileTopHeight = $('#mobile-menu-sticky-placeholder');

                if ($(window).scrollTop() > mobileMenu.outerHeight() + headerTopbar) {
                    mobileMenu.addClass('rt-sticky');
                    mobileTopHeight.height(mobileMenu.outerHeight());
                } else {
                    mobileMenu.removeClass('rt-sticky');
                    mobileTopHeight.height(0);
                }
            }
        },

        readyFunctionality: function () {
            const siteHeader = $('.site-header');
            const paddingTop = siteHeader.height() + siteHeader.position().top + 10;
            $('.has-trheader .quixa-breadcrumb-wrapper').css({'paddingTop': paddingTop + 'px', 'opacity': 1})

            const commentBody = $('.comment-list .comment-body').last().addClass('last-item');
        },

        menuDrawerOpen: function (offCanvas) {
            offCanvas.menuBar.on('click', e => {
                e.preventDefault();
                offCanvas.menuBar.toggleClass('is-open')
                offCanvas.drawer.toggleClass('is-open');
                e.stopPropagation()
            });

            $(document).on('click', e => {
                if (!$(e.target).closest(offCanvas.drawerClass).length) {
                    offCanvas.drawer.removeClass('is-open');
                    offCanvas.menuBar.removeClass('is-open')
                }
            });
        },

        offcanvasMenuToggle: function (offCanvas) {
            offCanvas.drawer.each(function () {
                const caret = $(this).find('.caret');
                caret.on('click', function (e) {
                    e.preventDefault();
                    $(this).closest('li').toggleClass('is-open');
                    $(this).parent().next().slideToggle(300);
                })
            })
        },

        headerSearchOpen: function () {
            $('.quixa-search-trigger').on('click', function (e) {
                e.preventDefault();
                $(this).parent().toggleClass('show');
                e.stopPropagation()
            })
            $(document).on('click', function (e) {
                if (!$(e.target).closest('.quixa-search-form').length) {
                    $('.quixa-search-popup.show').removeClass('show')
                }
            });
        },

        backToTop: function () {
            /* Scroll to top */
            $('.scrollToTop').on('click', function () {
                $('html, body').animate({scrollTop: 0}, 800);
                return false;
            });
        },

        backTopTopScroll: function () {
            if ($(window).scrollTop() > 100) {
                $('.scrollToTop').addClass('show');
            } else {
                $('.scrollToTop').removeClass('show');
            }
        }

    };

    $(document).ready(function (e) {
        Quixa._init();
    });

    $(document).on('load', () => {
        Quixa.menuOffset();
    })

    $(window).on('scroll', (event) => {
        Quixa.headerSticky(event);
        Quixa.backTopTopScroll(event);
    });

    $(window).on('resize', () => {
        Quixa.menuOffset($);
    });

    $(window).on('elementor/frontend/init', () => {
        if (elementorFrontend.isEditMode()) {
            //For all widgets
            elementorFrontend.hooks.addAction('frontend/element_ready/widget', () => {
                Quixa.slickSlider($);
                Quixa.magnificPopup();
            });

        }
    });

    window.Quixa = Quixa;

})(jQuery);
