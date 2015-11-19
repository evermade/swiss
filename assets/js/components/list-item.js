(function() {

	//create empty object in the global em variable
	em.listItem = {};

	//call any functions to be trigger on dom ready
	em.listItem.init = function() {
		em.listItem.overlay();
	};

    em.listItem.overlay = function() {
        //hover over image to show overlay
        var ext = $('.list-item--extend');

        ext.each(function() {
            var self = $(this);
            var img = self.find('.list-item__image');

            if (Modernizr.touch || self.hasClass('list-item--extend--onclick')) {
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