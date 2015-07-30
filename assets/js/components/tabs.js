(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.tabs = {};

	//call any functions to be trigger on dom ready
	em.tabs.init = function(){
		//em.tabs.setup();
	};

	em.tabs.setup  = function(){

		$(".accordion").each(function(){ 

			var accordion = $(this); //cache the accordion
			var accordionGroups = accordion.find('.accordion__group');

			//an event handler for accordian
			accordion.find('.accordion__title').on('click', function() {
				var title = $(this);

				accordion.find('.accordion__group').removeClass('is-active');
				title.closest('.accordion__group').toggleClass('is-active');
			});

			//an event handler for tabs
			accordion.find('.accordion__navbar li a').on('click', function() {
				var navBarLink = $(this);
				
				//remove all prev active states on groups
				accordionGroups.removeClass('is-active');

				//remove all prev active states on navbar links
				accordion.find('.accordion__navbar li').removeClass('is-active');
				navBarLink.parent().addClass('is-active');
				
				var group = accordion.find('div[data-content="'+navBarLink.attr("href").substring(1)+'"]');
				group.toggleClass('is-active');
			});

		});

	};

})();