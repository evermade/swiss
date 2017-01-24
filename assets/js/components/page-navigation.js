(function() {

	em.pagenavigation = {};

	em.pagenavigation.init = function(){
		$(".js-b-page-navigation__mobile-toggle").on("click", function(){
			$("body").toggleClass("b-page-navigation--open");
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