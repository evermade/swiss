(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.dev = {};

	//call any functions to be trigger on dom ready
	em.dev.init = function(){
		//em.dev.showOverflown();
	};

	em.dev.showOverflown = function(){

		var docWidth = document.documentElement.offsetWidth;

		[].forEach.call(
		  document.querySelectorAll('*'),
		  function(el) {
		    if (el.offsetWidth > docWidth) {
		      console.log(el);
		    }
		  }
		);

	};

})();