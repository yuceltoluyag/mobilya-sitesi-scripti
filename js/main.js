$(window).scroll(function () {
    if ($(document).scrollTop() > 70) {
        $('nav').addClass('nav-shrink');
    } else {
        $('nav').removeClass('nav-shrink');
    }
});
wow = new WOW({
    animation: {
        duration: 400,
        effects: 'fade stagger(34ms) translateZ(-360px) translateY(10%)',
        easing: 'ease'
    }
});
wow.init();



$(document).ready(function () {
    $('.col-sm-12 .row .sticky').theiaStickySidebar({

        additionalMarginTop: 80
    });
});

