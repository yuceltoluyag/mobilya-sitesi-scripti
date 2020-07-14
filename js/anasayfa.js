$(document).ready(function () {
    wh = $(window).height();
    ww = $(window).width();
    $(".hero-carousel-wrapper").css({
        "height": wh,
        "width": ww
    });
    var time = 12;
    var $progressBar, $bar, $elem, isPause, tick, percentTime;
    $("#owl-1").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 500,
        singleItem: true,
        afterInit: progressBar,
        afterMove: moved,
        startDragging: pauseOnDragging
    });

    function progressBar(elem) {
        $elem = elem;
        buildProgressBar();
        start();
    }

    function buildProgressBar() {
        $progressBar = $("<div>", {
            id: "progressBar"
        });
        $bar = $("<div>", {
            id: "bar"
        });
        $progressBar.append($bar).prependTo($elem);
    }

    function start() {
        percentTime = 0;
        isPause = false;
        tick = setInterval(interval, 10);
    };

    function interval() {
        if (isPause === false) {
            percentTime += 1 / time;
            $bar.css({
                width: percentTime + "%"
            });
            if (percentTime >= 100) {
                $elem.trigger('owl.next')
            }
        }
    }

    function pauseOnDragging() {
        isPause = true;
    }

    function moved() {
        clearTimeout(tick);
        start();
    }
});
