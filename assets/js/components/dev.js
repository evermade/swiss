(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.dev = {};

	//call any functions to be trigger on dom ready
	em.dev.init = function(){
		em.dev.toolbox();
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

	em.dev.toolbox = function(){
		$('.toolbox__navbar__bar').on('click', function(e){
			e.preventDefault();
			$('.body').toggleClass('js-toolbox-open');
			$(this).next().toggleClass('js-show');		
		});

		//using event delegation to attach event handler to the body when toolbox is opened so we can shut upon loss of focus
		$("body").on("click", ".body.js-toolbox-open", function(e){

		    if(!$(e.target).closest('.toolbox__navbar').length || $(e.target).closest('a').length) {
		      $('.toolbox__navbar__bar').click();
		    }

		    return true;
 		});
	}

})();