(function() {

    /*
    
    INSTRUCTIONS
    --------
    Apply data-parallax="1" to any element and it will start horizontally gliding.
    The data-parallax value can be anything in between -1 and 1.

    It uses transform: translate(0,value); to readjust the elements position

    <div data-parallax="1"></div>

     */

    // create empty object in the global em var, dont forget to add the init call in the main.js!
    em.parallax = {
        elements: $("*[data-parallax]"),
        windowMiddle: $(window).scrollTop()+$(window).height()/2,
        windowHeight: $(window).height(),
        speedMultiplier: 1.4
    };

    // call any functions to be trigger on dom ready
    em.parallax.init = function() {

    };


    // render() is being called every time you scroll the page
    em.parallax.render = function() {

        em.parallax.windowMiddle = $(window).scrollTop()+$(window).height()/2;
        em.parallax.windowHeight = $(window).height();

        // run through all parallax enabled elements.
        $(em.parallax.elements).each(function(){

            // get the parallax index
            var parallaxIndex = $(this).data("parallax");

            if(parallaxIndex !== 0){
                var assetHeight = $(this).height();
                var assetMiddle = $(this).offset().top+assetHeight/2;
                var differenceIndex = assetMiddle-em.parallax.windowMiddle;
                var visibleArea = assetHeight;

                // if element height is less than viewport height.
                if(visibleArea < em.parallax.windowHeight/2){
                    visibleArea = em.parallax.windowHeight/2;
                    visibleArea = visibleArea+assetHeight;
                }

                // if element is within viewport run through this
                if(differenceIndex > -visibleArea && differenceIndex < visibleArea){

                    // calculate new position
                    var parallaxPosition = (differenceIndex+assetHeight)/(assetHeight+assetHeight);
                    var position = assetHeight*parallaxPosition*parallaxIndex-assetHeight/2*parallaxIndex;
                   
                    if(parallaxIndex < 0){
                        position = assetHeight*parallaxPosition*parallaxIndex-assetHeight/2*parallaxIndex;
                    }

                    // re-adust position
                    $(this).css("transform", "translate(0,"+position*em.parallax.speedMultiplier+"px)");

                }
            }
            
        });

    };

})();
