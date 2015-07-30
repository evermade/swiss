(function() {

	//create empty object in the global em variable
	em.gallery = {};

	//call any functions to be trigger on dom ready
	em.gallery.init = function(){
		em.gallery.flickr();
	};

	em.gallery.flickr  = function(){
		$(".gallery--flickr .gallery__images").justifiedGallery({
            rowHeight : 250,
            margins: 10,
            captions: false
        });

        function setUpGallery(){
            var galleryWidth = $("body").outerWidth();
            $(".gallery--flickr .gallery__images").width(galleryWidth);
        }

        setUpGallery();

        $(window).resize(function() {
            setUpGallery();
        });
	};

})();