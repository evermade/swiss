(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.resize = {};

	//call any functions to be trigger on dom ready
	em.resize.init = function(){
		em.resize.dom();
	};

	em.resize.dom  = function(){
		//a global resize listener, rather than many, place your method calls in here
		//in future maybe attach this to a array to methods are relative to content
		$( window ).resize(function() {
			$("body.nav-open .navtoggle").click();
		});
	};

})();