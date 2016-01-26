/*##############*/
/* OWL-carousel */
/*##############*/
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: true
            },
            1000: {
                items: 2,
                nav: true,
                navText: ["<div class='owl-prev dots-arrow-btn' style=''><svg><circle class='knot knot-1' r='3' cx='28' cy='30' data-svg-origin='12 27' style=''></circle><circle class='knot' r='3' cx='33' cy='12' data-svg-origin='30 9' style='transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);'></circle><circle class='knot' r='3' cx='33' cy='48' data-svg-origin='30 45' style='transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);'></circle><line class='line-1' x1='28' y1='30' x2='28' y2='12' data-svg-origin='15 30' style=''></line><line class='line-2' x1='28' y1='30' x2='28' y2='48' data-svg-origin='15 30' style=''></line></svg></div>", "<div class='owl-next dots-arrow-btn' style=''><svg><circle class='knot knot-2' r='3' cx='28' cy='30' data-svg-origin='12 27' style=''></circle><circle class='knot' r='3' cx='33' cy='12' data-svg-origin='30 9' style='transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);'></circle><circle class='knot' r='3' cx='33' cy='48' data-svg-origin='30 45' style='transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);'></circle><line class='line-3' x1='28' y1='30' x2='28' y2='12' data-svg-origin='15 30' style=''></line><line class='line-4' x1='28' y1='30' x2='28' y2='48' data-svg-origin='15 30' style=''></line></svg></div>"],
                loop: false,
                margin: 60,
            }
        }
    })
})