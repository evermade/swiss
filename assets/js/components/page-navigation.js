(function() {

	em.pagenavigation = {};

	em.pagenavigation.init = function(){
		$(".js-page-navigation__mobile-toggle").on("click", function(){
			$("body").toggleClass("page-navigation--open");
			return false;
		});

		var windowLastScrollPosition = 0;

		if($(window).width() < 992){
			$(window).scroll(function(){
				if(windowLastScrollPosition > $(window).scrollTop()){
					$('.page-navigation').removeClass("page-navigation--scroll-hidden");
				} else if($(window).scrollTop() > $('.page-navigation').height()){
					$('.page-navigation').addClass("page-navigation--scroll-hidden");
				} else {
					$('.page-navigation').removeClass("page-navigation--scroll-hidden");
				}

				windowLastScrollPosition = $(window).scrollTop();
			})
		}
	};

})();