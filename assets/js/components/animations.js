(function() {

    // create empty object in the global em variable
    em.animations = {
        elements: {},
        winWidthOk: false
    };

    // call any functions to be trigger on dom ready
    em.animations.init = function(){
        em.animations.capture();
        em.animations.checkRequiredWidth();
        em.animations.animateFirstBlockIn();
        em.animations.setup();
    };

    em.animations.capture = function() {
        em.animations.elements = $("[data-animate]");
    };

    em.animations.checkRequiredWidth = function() {
        if(window.innerWidth>1024) {
            em.animations.winWidthOk = true;
            em.animations.animate();
            em.animations.animateFirstBlockIn();
        }
        else {
            em.animations.winWidthOk = false;
        }
    };

    em.animations.canWe = function(){
        if(em.animations.elements.length && em.animations.winWidthOk === true) {
            return true;
        }

        return false;
    };

    em.animations.setup = function(){

        $(window).on("scroll", function() {
            
            em.parallax.render();
            em.sticky.render();

            if(!em.animations.canWe()) {
                return false;
            }

            em.animations.animate();

        }).scroll();
    };

    em.animations.animate = function() {
        em.animations.elements.each(function() {

            var $win = $(window),
                $el = $(this),
                scrollTop = $win.scrollTop(),
                windowHeight = $win.height(),
                elTop = $el.offset().top;

            // el.toggleClass( el.data("animate"), elTop < (scrollTop+windowHeight));

            if(elTop < (scrollTop+windowHeight)) {
                $el.addClass($el.data("animate"));
            }
        });
    };

    em.animations.animateFirstBlockIn = function() {
        if(em.animations.canWe()) {
            var $el = $('.main-header > section.hero + section');
            var $container = $el.find('div').eq(0);

            if(!$el.hasClass('toBeAnimated')) {
                $container.addClass('animated fadeInUp');
            }
            else {
                $container.css({opacity: 1});
            }
        }
    };
})();