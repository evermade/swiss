(function() {

    // create empty object in the global em var, dont forget to add the init call in the main.js!
    em.flickity = {};

    // call any functions to be trigger on dom ready
    em.flickity.init = function() {
        em.flickity.defaultslick();
    };

    em.flickity.defaultslick  = function() {
        $('.js-flickity').flickity({
            // http://flickity.metafizzy.co/options.html
            // options: option,
        });
    };
})();
