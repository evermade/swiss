(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.masonry = {};

	//call any functions to be trigger on dom ready
	em.masonry.init = function(){
		em.masonry.setup();
	};

	em.masonry.setup  = function(){
		var container = $('div.masonry__items');
	      // initialize Masonry after all images have loaded
	      container.imagesLoaded( function() {
	          container.masonry({
	            itemSelector: 'div.masonry__item'
	          });
	      });
	};

})();