(function() {

	em.navigation = {};

	em.navigation.init = function(){
		//some menu actions
		$(".navtoggle").on("click", function(){
			$("body").toggleClass("nav-open");
			return false;
		});

		$("body").on("click", "body.nav-open", function(e){
		    if(e.target.className !== ".nav-bar .nav"){
		      $("body.nav-open .navtoggle").click();
		    }
		    return true;
		});

		$( window ).resize(function() {
			$("body.nav-open .navtoggle").click();
		});
	};

})();