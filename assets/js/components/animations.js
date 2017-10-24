const animations = {

    // create some properties
    elements: [],
    winWidthOk: false,

    // call any functions to be trigger on dom ready
    init: function () {
        this.capture();
        this.checkRequiredWidth();
        this.animateFirstBlockIn();
        this.setup();
    },

    capture: function () {
        this.elements = $("[data-animate]");
    },

    checkRequiredWidth: function () {
        if (window.innerWidth > 1024) {
            this.winWidthOk = true;
            this.animate();
            this.animateFirstBlockIn();
        }
        else {
            this.winWidthOk = false;
        }
    },

    canWe: function () {
        if (this.elements.length && this.winWidthOk === true) {
            return true;
        }

        return false;
    },

    setup: function () {
        $(window).on("scroll", () => {

            if (!this.canWe()) {
                return false;
            }

            this.animate();

        }).scroll();
    },

    animate: function () {
        this.elements.each(function () {
            var $win = $(window),
                $el = $(this),
                scrollTop = $win.scrollTop(),
                windowHeight = $win.height(),
                elTop = $el.offset().top;

            // el.toggleClass( el.data("animate"), elTop < (scrollTop+windowHeight));

            if (elTop < (scrollTop + windowHeight)) {
                $el.addClass($el.data("animate"));
            }
        });
    },

    animateFirstBlockIn: function () {
        if (this.canWe()) {
            var $el = $('.main-header > section.hero + section');
            var $container = $el.find('div').eq(0);

            if (!$el.hasClass('toBeAnimated')) {
                $container.addClass('animated fadeInUp');
            }
            else {
                $container.css({ opacity: 1 });
            }
        }
    }

};

animations.init();
