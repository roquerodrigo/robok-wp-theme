window.jQuery = window.$ = require('jquery');

import Popper from 'popper.js';

window.Popper = Popper;

// require('bootstrap/js/dist/alert');
require('bootstrap/js/dist/button');
// require('bootstrap/js/dist/carousel');
require('bootstrap/js/dist/collapse');
require('bootstrap/js/dist/dropdown');
require('bootstrap/js/dist/modal');
// require('bootstrap/js/dist/popover');
require('bootstrap/js/dist/scrollspy');
require('bootstrap/js/dist/tab');
// require('bootstrap/js/dist/tooltip');
require('bootstrap/js/dist/util');

require('owl.carousel');

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(".navbar").offset().top > 50) {
            $(".fixed-top").addClass("top-nav-collapse").addClass("bg-dark");
        } else {
            $(".fixed-top").removeClass("top-nav-collapse").removeClass("bg-dark");
        }
    });

    $('.testimonials').owlCarousel({
        autoHeight: true,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplayHoverPause: true,
        nav: false,
        items: 1,
    });

    $('.sponsors').owlCarousel({
        autoHeight: true,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 9000,
        autoplayHoverPause: true,
        items: 5,
        nav: false,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 3,
            },
            768: {
                items: 4,
            },
            992: {
                items: 6,
            },
            1200: {
                items: 6,
            }
        }
    });

    $('.parallax')
        .each(function () {
            let $obj = $(this);

            $(window)
                .scroll(function () {
                    let yPos = -($(window).scrollTop() / 2);

                    let bgpos = '50% ' + yPos + 'px';

                    $obj.css('background-position', bgpos);
                })
                .resize(function () {
                    $('.parallax').height(($(window).height() / 1.8) + 'px');
                    console.log($(window).width());
                });

        })
        .height(($(window).height() / 1.8) + 'px');

    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });

    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    }, 'slow');
});