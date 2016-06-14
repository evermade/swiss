(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.resize = {};

	//call any functions to be trigger on dom ready with a debounce in place
	em.resize.init = function(){

		var debounceMe = em.helper.debounce(function() {
			em.resize.dom();
		}, 250);

		window.addEventListener('resize', debounceMe);
	};

	em.resize.dom  = function(){
		//a global resize listener, rather than many, place your method calls in here
		//in future maybe attach this to a array to methods are relative to content

		$("body.nav-open .navtoggle").click();
		em.animations.checkRequiredWidth();
		em.helper.resizeVideos();
	};

})();