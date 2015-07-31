(function() {

	em.helper = {};

	em.helper.init = function(){
		em.helper.imgRemoveDimensions();
		em.helper.resizeVideos();
		em.helper.spemail();
		em.helper.jumpTo();
		em.helper.toggleHeroNav();
		em.helper.hashCheck();
		em.helper.goToNext();
	};

	em.helper.hashCheck = function(){
		if(window.location.hash) {
			var el = $('[data-jump="'+window.location.hash.substring(1)+'"]').eq(0);

			if(el.length==1){
			   var target = el.offset();

			   setTimeout(function(){
					$('html,body').stop(true, true).animate({
						scrollTop: target.top
					 }, 400, function(){
				   });
				}, 1000);
			   
			}
		}
	};

	em.helper.attachUserAgent = function(){
		var doc = document.documentElement;
		doc.setAttribute('data-useragent', navigator.userAgent);
	};

	em.helper.toggleHeroNav = function(){
		if($('header.main-header').next().hasClass('hero')){
			$('body').addClass('js-hero-active');
		}
	};

	em.helper.imgRemoveDimensions = function(){
		$("img").each(function(){ 
			$(this).removeAttr("width");
			$(this).removeAttr("height");
		});
	};

	em.helper.goToNext = function(){
		$(".js-go-to-next").on("click", function(e) {
			e.preventDefault();
			var el = $(this);
			var next = el.closest("section").next();

			var target = $(next).offset();

		   $('html,body').stop(true, true).animate({
				scrollTop: target.top
			 }, 400, function(){
				 //window.location.hash = id;
		   });
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