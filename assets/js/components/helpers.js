(function() {

	em.helper = {};

	em.helper.init = function(){
		//em.helper.imgClear();
		//em.helper.resizeVideos();
		em.helper.spemail();
		em.helper.jumpTo();
		//em.helper.showOverflown();
		//em.helper.resize();
		em.helper.toggleHeroNav();
	};

	em.helper.toggleHeroNav = function(){
		if($('header.main-header').next().hasClass('hero')){
			$('body').addClass('js-hero-active');
		}
	};

	em.helper.showOverflown = function(){

		var docWidth = document.documentElement.offsetWidth;

		[].forEach.call(
		  document.querySelectorAll('*'),
		  function(el) {
		    if (el.offsetWidth > docWidth) {
		      console.log(el);
		    }
		  }
		);

	};

	em.helper.resize = function(){
		$( window ).resize(function() {
		  for (var i = 0; i < em.helper.resizers.length; i++) {
				em.helper.resizers[i]();
			}
		});
	};

	em.helper.imgClear = function(){
		$("img").each(function(){ 
			$(this).removeAttr("width");
			$(this).removeAttr("height");
		});
	};

	em.helper.resizeVideos  = function(){
		$("iframe").each(function(){ 
			var el = $(this);
			if(!el.attr("data-original-width")){
				el.attr("data-original-width", el.attr("width"));
				el.attr("data-original-height", el.attr("height"));
			}

			el.attr("width", "100%");
			var height = el.attr("data-original-height") * el.width() /  el.attr("data-original-width");
			el.attr("height", height);
		});
	};

	em.helper.spemail = function(){
		$("a.spemail").each(function(index) {
			var el = $(this);
			var address = el.text();
			address = address.replace(/\(at\)/g, '@');
			address = address.replace(/\(dot\)/g, '.');
			el.attr("href", "mailto:"+address);
			el.text(address);
		});
	};

	em.helper.jumpTo = function(){
		$("body").on("click", ".jump", function() {
		   var id = $(this).attr('href');
		   if($(id).length===0) { return false; }

		   var target = $(id).offset();

		   $('html,body').stop(true, true).animate({
				scrollTop: target.top
			 }, 300, function(){
				 window.location.hash = id;
		   });

		   return false;
		});
	};
	
})();