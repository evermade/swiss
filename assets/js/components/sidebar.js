(function() {

    // create empty object in the global em var, dont forget to add the init call in the main.js!
    em.sidebar = {};

    // call any functions to be trigger on dom ready
    em.sidebar.init = function() {
        em.sidebar.setup();
    };

    em.sidebar.setup = function() {
        $('.js-sidebar-widget-mobile-open').on("click",function(){
            $(this).parent().toggleClass("c-sidebar-widget--open");
        });
    };

})();
