(function() {

    // create empty object in the global em var, dont forget to add the init call in the main.js!
    em.toolbox = {};

    // call any functions to be trigger on dom ready
    em.toolbox.init = function() {
        em.toolbox.setup();
        em.toolbox.schemeSwitcher();
    };

    em.toolbox.setup = function() {

    };

    em.toolbox.schemeSwitcher = function() {
        $('.js-toolbox-switch').on("click",function(){
            var activateScheme = $(this).attr("data-activate-scheme");
            $('#js-toolbox-scheme-target').attr("class", "b-toolbox__scheme-wrapper "+activateScheme);
        });
    };

})();
