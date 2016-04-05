(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.dev = {};

	//call any functions to be trigger on dom ready
	em.dev.init = function(){
		em.dev.toolbox();
	};

	em.dev.toolbox = function(){
		$('.toolbox__navbar .toolbox__open').on('click', function(e){
			e.preventDefault();
			$('body').toggleClass('js-toolbox-open');
			$(this).next().toggleClass('js-show');		
		});

		//lets toggle the code
		$('.js-toggle-code').on('click', function(e){
			e.preventDefault();
			var el = $(this);
			var parent = el.closest('.toolbox__item');
			parent.find('.toolbox__item__code').toggleClass('hidden');		
		});

 		$(document).on('keydown', function(e){
		    if(e.which == 84){
		        $('.toolbox__navbar .toolbox__open').click();
		    }
		});
	};

})();