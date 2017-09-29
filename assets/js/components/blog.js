(function() {

    // create empty object in the global em var, dont forget to add the init call in the main.js!
    em.blog = {};

    // call any functions to be trigger on dom ready
    em.blog.init = function() {
        em.blog.sidebarMobile();
    };

    em.blog.sidebarMobile = function() {

        // On mobile the sidebar widgets open and close when the user clicks them.
        
        $('.js-blog__sidebar-mobile').on("click",function(){
            $(this).parent().toggleClass("c-sidebar-widget--open");
        });
        
    };

})();
