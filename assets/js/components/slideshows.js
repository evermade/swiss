(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.slideshows = {};

	//call any functions to be trigger on dom ready
	em.slideshows.init = function(){
		em.slideshows.slick();
	};

	em.slideshows.slick  = function(){

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

		$(".slick--hero").slick({
			dots: false,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 4000,
			speed: 500,
			fade: true,
			cssEase: 'linear',
			slidesToScroll: 1
		});

		$(".slick--centermode").slick({
			dots: true,
			speed: 500,
			slidesToShow: 3,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						arrows: true,
						slidesToShow: 2
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 1
					}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
		});


	};

})();