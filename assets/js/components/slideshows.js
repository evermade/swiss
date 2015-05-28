(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.slideshows = {};

	//call any functions to be trigger on dom ready
	em.slideshows.init = function(){
		//em.slideshows.slick();
	};

	em.slideshows.slick  = function(){

		if(typeof $.fn.Slick === 'undefined'){
			return false;
		}

		// $('.slick--cases').slick({
		// 	slidesToShow: 3,
		// 	slidesToScroll: 3,
		// 	dots: true,
		// 	  responsive: [
		// 	      {
		// 	      breakpoint: 1025,
		// 	      settings: {
		// 	        slidesToShow: 2,
		// 	        slidesToScroll: 1,
		// 	        infinite: true,
		// 	        dots: true,
		// 	        arrows:false
		// 	      }
		// 	    },
		// 	    {
		// 	      breakpoint: 480,
		// 	      settings: {
		// 	        slidesToShow: 1,
		// 	        slidesToScroll: 1,
		// 	        arrows:false
		// 	      }
		// 	    }
		// 	  ]
		// });

		$(".slick").slick({
			dots: true,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 40000,
			speed: 500,
			fade: true,
			cssEase: 'linear',
			centerMode: true,
			slidesToScroll: 1
		});

	};

})();