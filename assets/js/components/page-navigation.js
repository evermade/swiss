(function() {

	em.pagenavigation = {};

	em.pagenavigation.init = function(){
		$(".c-mobile-toggle").on("click", function(){
			$("body").toggleClass("js-navigation-open");
			return false;
		});

		var windowLastScrollPosition = 0;

		if($(window).width() < 992){
			$(window).scroll(function(){
				if(windowLastScrollPosition > $(window).scrollTop()){
					$('.b-page-navigation').removeClass("page-navigation--scroll-hidden");
				} else if($(window).scrollTop() > $('.b-page-navigation').height()){
					$('.b-page-navigation').addClass("page-navigation--scroll-hidden");
				} else {
					$('.b-page-navigation').removeClass("page-navigation--scroll-hidden");
				}

				windowLastScrollPosition = $(window).scrollTop();
			});
		}
	};

})();