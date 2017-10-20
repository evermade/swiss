(function() {

    // WILL BE REWRITTEN FOR SURE

    em.section = {

    };

    em.section.init = function() {

        $( window ).scroll(function() {
            em.parallax.render();
            em.section.pinelement();
        });

    };

    em.section.pinelement = function() {

        $('.js-section__section-scroll').each(function(){

            if($(window).scrollTop() > $(this).parent().offset().top+$(this).parent().height()-$(this).height()){

                // fix to the bottom
                $(this).removeClass("b-section__blocks--fixed");
                $(this).parent().addClass("b-section--fixed-bottom");
                $(this).attr("style","");

            } else if($(window).scrollTop() >= $(this).parent().offset().top){

                // element is pinned
                $(this).css("width", $(this).width());
                $(this).css("left", $(this).offset().left);
                $(this).addClass("b-section__blocks--fixed");
                $(this).parent().removeClass("b-section--fixed-bottom");

            } else {

                // fix to the top
                $(this).attr("style","");
                $(this).removeClass("b-section__blocks--fixed");
                $(this).parent().removeClass("b-section--fixed-bottom");

            }

        });

    };

})();
