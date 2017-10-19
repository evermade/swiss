(function() {

    // create empty object in the global em var, dont forget to add the init call in the main.js!
    em.section = {

    };

    // call any functions to be trigger on dom ready
    em.section.init = function() {
        em.section.parallax();
    };

    em.section.parallax = function() {
        em.section.assetParallaxRender();

        $( window ).scroll(function() {
            em.section.assetParallaxRender();
            em.section.scrollsection();
        });

    };

        em.section.scrollsection = function() {
            $('.js-section__section-scroll').each(function(){
                if($(window).scrollTop() > $(this).parent().offset().top+$(this).parent().height()-$(this).height()){
                    $(this).removeClass("b-section__blocks--fixed");
                    $(this).parent().addClass("b-section--fixed-bottom");
                    $(this).attr("style","");
                } else if($(window).scrollTop() >= $(this).parent().offset().top){
                    $(this).css("width", $(this).width());
                    $(this).css("left", $(this).offset().left);
                    $(this).addClass("b-section__blocks--fixed");
                    $(this).parent().removeClass("b-section--fixed-bottom");
                } else {
                    $(this).attr("style","");
                    $(this).removeClass("b-section__blocks--fixed");
                    $(this).parent().removeClass("b-section--fixed-bottom");
                }
            });
        };

        em.section.assetParallaxRender = function(){
            var windowMiddle = $(window).scrollTop()+$(window).height()/2;
            $('.js-section__asset').each(function(){
                var parallaxIndex = $(this).data("parallax-index");
                if(parallaxIndex !== 0){
                    var assetHeight = $(this).height();
                    var assetMiddle = $(this).offset().top+assetHeight/2;
                    var differenceIndex = assetMiddle-windowMiddle;
                    var visibleArea = assetHeight;

                    if(visibleArea < $(window).height()/2){
                        visibleArea = $(window).height()/2;
                        visibleArea = visibleArea+assetHeight;
                    }

                    if(differenceIndex > -visibleArea && differenceIndex < visibleArea){

                        var parallaxPosition = (differenceIndex+assetHeight)/(assetHeight+assetHeight);
                        var position = assetHeight*parallaxPosition*parallaxIndex-assetHeight/2*parallaxIndex;
                        

                        if(parallaxIndex < 0){
                            position = assetHeight*parallaxPosition*parallaxIndex-assetHeight/2*parallaxIndex;
                        }

                        console.log(position);

                        $(this).css("transform", "translate(0,"+position+"px)");

                    }
                } else {
                    $(this).removeClass("js-section__asset");
                }
                
            });
        };

})();
