(function() {

	//create empty object in the global em variable
	em.listing = {};

	//call any functions to be trigger on dom ready
	em.listing.init = function() {
		em.listing.overlay();
	};

    em.listing.overlay = function() {
        //hover over image to show overlay
        var ext = $('.listing-item--extend');

        ext.each(function() {
            var self = $(this);
            var img = self.find('.listing-item__image');

            if (Modernizr.touch) {
                img.on('click', function() {
                    $(this).toggleClass('active');
                });
            } else {
                img.hover(function() {
                    $(this).toggleClass('active');
                });
            }
        });
    }

})();