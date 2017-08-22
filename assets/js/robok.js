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

//jQuery to collapse the navbar on scroll
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
            items: 5,
        },
        1200: {
            items: 5,
        }
    }
});

$('.recent-posts').owlCarousel({
    autoHeight: true,
    loop: true,
    margin: 0,
    autoplay: true,
    autoplayTimeout: 8000,
    autoplayHoverPause: true,
    items: 3,
    nav: false,
    responsive: {
        0: {
            items: 1,
        },
        576: {
            items: 1,
        },
        768: {
            items: 3,
        },
        992: {
            items: 3,
        },
        1200: {
            items: 3,
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