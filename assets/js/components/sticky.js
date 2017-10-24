/*

HOW TO USE:

Scrolls across the parent component. Viewports 992 and higher
<div data-sticky="parent" data-sticky-viewport="> 992">
    <div>The child element will stick</div>
</div>

Scrolls to the $(window).scrollTop() 2000px and unsticks. All viewports
<div data-sticky="2000px">
    <div>The child element will stick</div>
</div>

Scrolls to the very bottom of the document. All Viewports
<div data-sticky>
    <div>The child element will stick</div>
</div>

*/
(function() {

    // create empty object in the global em var, dont forget to add the init call in the main.js!
    em.sticky = {
        elements: $("*[data-swiss-sticky]"),
        windowScrollTopLast: $(window).scrollTop(),
        windowDirection: ""
    };

    // call any functions to be trigger on dom ready
    em.sticky.init = function() {

        em.sticky.defineStickyEnd();

        setTimeout(function(){ 
            em.sticky.defineStickyEnd();
        }, 500);

    };

    em.sticky.defineStickyEnd = function(){

        $(em.sticky.elements).each(function(){

            var dataSticky = $(this).data("swiss-sticky");

            // CASE: data-sticky="parent" stops at the end of the parent
            if(dataSticky == "parent"){

                var dataStickyEnd = $(this).parent().outerHeight()+$(this).parent().offset().top-$(this).outerHeight();
                $(this).attr("data-sticky-end",dataStickyEnd);

            // CASE: data-sticky="1000px" stops when scroll position gets here
            } else if(dataSticky.search("px") !== -1){ 

                $(this).attr("data-sticky-end",dataSticky.replace("px",""));

            // CASE: data-sticky="" sticks to the very end of the website by default
            } else {

                $(this).attr("data-sticky-end",$(document).height());

            }

            // define default paraments
            $(this).attr("data-sticky-status","");
            $(this).attr("data-sticky-original-top", $(this).offset().top);
            $(this).attr("style", "height:"+$(this).height()+"px;position:relative;");

        });

    };

    em.sticky.render = function() {

        var windowScrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();

        $(em.sticky.elements).each(function(){

            if(em.sticky.checkViewport($(this))){

                var thisOffsetTop = $(this).offset().top; // $(this).data("sticky-end")
                var thisOffsetLeft = $(this).offset().left;
                var negativeSpace = 0;
                var stickyTarget = $(this).children(":first");
                var thisFinalTop;

                // create negative space. If elment is higher than window then this is required for repositioning.
                if($(this).height() > windowHeight){
                    negativeSpace = $(this).height()-windowHeight;
                }

                // check if direction was changed
                if(em.sticky.direction() !== em.sticky.windowDirection && $(this).data("sticky-status") == "active" ){

                    // calculate absolute position
                    if(em.sticky.direction() == "up"){
                        thisFinalTop = windowScrollTop-$(this).parent().offset().top-negativeSpace;
                    } else {
                        thisFinalTop = windowScrollTop-$(this).parent().offset().top;
                    }

                    $(this).data("sticky-status","direction-change");

                    // detache from fixed and palce in absolute space.
                    $(stickyTarget).attr("style","margin:0;position:absolute;z-index:100;top:"+thisFinalTop+"px;width:"+$(this).width()+"px;");
                }

                em.sticky.windowDirection = em.sticky.direction();
                
                // element is above viewport
                if($(this).data("sticky-end") <= windowScrollTop-negativeSpace && $(this).data("sticky-status") !== "above"){

                    $(this).data("sticky-status","above");
                    thisFinalTop = $(this).data("sticky-end")-$(this).parent().offset().top;
                    $(stickyTarget).attr("style","margin:0;position:absolute;z-index:100;top:"+thisFinalTop+"px;width:"+$(this).width()+"px;");
     
                // element is sticky GOING UP
                } else if(windowScrollTop-negativeSpace >= thisOffsetTop && windowScrollTop < $(this).data("sticky-end") && windowScrollTop < $(stickyTarget).offset().top && em.sticky.windowScrollTopLast > windowScrollTop && $(this).data("sticky-status") !== "active" ){

                    $(this).data("sticky-status","active");
                    $(stickyTarget).attr("style","margin:0;position:fixed;z-index:100;top:0px;width:"+$(this).width()+"px;");

     
                // element is sticky GOING DOWN
                } else if(windowScrollTop-negativeSpace >= thisOffsetTop && windowScrollTop < $(this).data("sticky-end") && windowScrollTop+windowHeight > $(stickyTarget).offset().top+$(stickyTarget).height() && em.sticky.windowScrollTopLast < windowScrollTop && $(this).data("sticky-status") !== "active" ){

                    $(this).data("sticky-status","active");
                    $(stickyTarget).attr("style","margin:0;position:fixed;z-index:100;top:-"+negativeSpace+"px;width:"+$(this).width()+"px;");

                // element below viewport 
                } else if(windowScrollTop <= thisOffsetTop && $(this).data("sticky-status") !== "below"){

                    $(this).data("sticky-status","below");
                    $(stickyTarget).attr("style","margin:0;");

                }

            }

        });

        // Update window position so we can check it later.
        em.sticky.windowScrollTopLast = windowScrollTop;

    };


    // function to check the direction of the browser scroll
    em.sticky.direction = function(){
        var windowScrollTop = $(window).scrollTop();
        var direction = "down";

        if(em.sticky.windowScrollTopLast > windowScrollTop){
            direction = "up";
        } else {
            direction = "down";
        }

        return direction;
    };

    em.sticky.checkViewport = function(stickyParent){

        if($(stickyParent).data("swiss-sticky-viewport")){
            var viewportParam = $(stickyParent).data("swiss-sticky-viewport");
            var viewportValue;
            
            if(viewportParam.search("> ") !== -1){
                viewportValue = Number(viewportParam.replace("> ", ""));

                if(window.outerWidth < viewportValue){
                    return false;
                }

            } else {
                viewportValue = Number(viewportParam.replace("< ", ""));

                if(window.outerWidth > viewportValue){
                    return false;
                }

            }
        }

        return true;
    };

})();
