(function() {

    //create empty object in the global em variable
    em.clipboard = {};

    //call any functions to be trigger on dom ready
    em.clipboard.init = function() {
        em.clipboard.setup();
    };

    em.clipboard.setup = function() {

        var clipboard = new Clipboard('.js-copy');

        clipboard.on('success', function(e) {

            $(e.trigger).find('i').removeClass('fa-clipboard'); 
            $(e.trigger).find('i').addClass('fa-check');

            e.clearSelection();

        });

        clipboard.on('error', function(e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
    };

})();