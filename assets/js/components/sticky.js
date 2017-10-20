/*

HOW TO USE:
<div data-sticky="parent"></div>    // scrolls across the parent component
<div data-sticky="2000px"></div>    // scrolls to the $(window).scrollTop() 2000px and unsticks
<div data-sticky></div>             // scrolls to the very bottom of the document

*/
(function() {

    // create empty object in the global em var, dont forget to add the init call in the main.js!
    em.sticky = {
        elements: $("*[data-sticky]")
    };

    // call any functions to be trigger on dom ready
    em.sticky.init = function() {

        em.sticky.defineAttributes();

        setTimeout(function(){ 
            em.sticky.defineAttributes();
        }, 500);

    };

    em.sticky.defineAttributes = function(){

        $(em.sticky.elements).each(function(){

            var dataSticky = $(this).data("sticky");

            // CASE: data-sticky="parent" stops at the end of the parent
            if(dataSticky == "parent"){

                var dataStickyEnd = $(this).parent().outerHeight()+$(this).parent().offset().top-$(this).outerHeight();
                $(this).attr("data-sticky-end",dataStickyEnd);

            // CASE: data-sticky="1000px" stops when scroll position gets here
            } else if(dataSticky.search("px")){

                $(this).attr("data-sticky-end",dataSticky.replace("px",""));

            // CASE: data-sticky="" sticks to the very end of the website by default
            } else {

                $(this).attr("data-sticky-end",$(window).height());

            }

            // define default paraments

            $(this).attr("data-sticky-status","");
            $(this).attr("data-sticky-original-top", $(this).offset().top);

        });

    };

    em.sticky.render = function() {

        var windowScrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();

        $(em.sticky.elements).each(function(){
            var thisOffsetTop = $(this).offset().top;
            var thisOffsetLeft = $(this).offset().left;

            if($(this).data("sticky-end") <= windowScrollTop && $(this).data("sticky-status") !== "above"){

                var thisFinalTop = $(this).data("sticky-end")-$(this).parent().offset().top;
                $(this).data("sticky-status","above");
                $(this).attr("style","position:absolute;z-index:100;top:"+thisFinalTop+"px;left:"+thisOffsetLeft+";width:"+$(this).width()+"px;");

            } else if(windowScrollTop >= $(this).data("sticky-original-top") && $(this).data("sticky-status") !== "active" && windowScrollTop < $(this).data("sticky-end")){

                $(this).data("sticky-status","active");
                $(this).attr("style","position:fixed;z-index:100;top:0;left:"+thisOffsetLeft+";width:"+$(this).width()+"px;");

            } else if($(this).data("sticky-original-top") >= windowScrollTop && $(this).data("sticky-status") !== "below"){

                $(this).data("sticky-status","below");
                $(this).attr("style","");

            }

            
        });
    };

})();
