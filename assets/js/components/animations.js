(function() {

	//create empty object in the global em variable
	em.animations = {
		elements: {}
	};

	//call any functions to be trigger on dom ready
	em.animations.init = function(){
		//em.animations.animateFirstBlockIn();

		em.animations.elements = $("[data-vp-add-class]");

		em.animations.setup();
		
	};

	em.animations.canWe = function(){
		if($(window).width() > 1024 && em.animations.elements.length) {
			return true;
		}

		return false;
	};

	em.animations.setup  = function(){
		
		if(em.animations.canWe()){

			$(window).on("scroll", function() {

				if(!em.animations.canWe()){
					return false;
				}

			    em.animations.elements.each(function(){

			        var win = $(window),
			        	el = $(this),
			        	scrollTop = win.scrollTop(),
			            windowHeight = win.height(),
			            elTop = el.offset().top;

			        //for repeately animate
			        el.toggleClass( el.data("vp-add-class"), elTop < (scrollTop+windowHeight));

			        //for a one time wonder
			        // if(elTop < (scrollTop+windowHeight)){
			        // 	el.addClass( el.data("vp-add-class"));
			        // }
			    });
			}).scroll();
		}
	};

	em.animations.animateFirstBlockIn = function(){
		if($(window).width() > 1024){
			var el = $('.page-blocks > section.hero + section');
			var container = el.find('div').eq(0);

			if(!el.hasClass('toBeAnimated')){
				container.addClass('animated fadeInUp');
			}
			else {
				container.css({opacity: 1});
			}
			
		}
	};

})();