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

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    autoplay: true,
    items: 1,
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