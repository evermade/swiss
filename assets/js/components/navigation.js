(function() {

	em.navigation = {};

	em.navigation.init = function(){
		//some menu actions
		$(".mobile-menu-button").on("click", function(){
			$("body").toggleClass("nav-open");
			$(".mobile-menu-button i").toggleClass("fa-bars");
			$(".mobile-menu-button i").toggleClass("fa-times");
			return false;
		});

		$("body").on("click", "body.nav-open", function(e){
		    if(e.target.className !== ".nav-bar .nav"){
		      $("body.nav-open .mobile-menu-button").click();
		    }
		    return true;
		});

		$( window ).resize(function() {
			$("body.nav-open .mobile-menu-button").click();
		});
	};

})();