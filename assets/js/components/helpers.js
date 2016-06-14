(function() {

	em.helper = {};

	em.helper.init = function(){
		em.helper.resizeVideos();
		em.helper.jumpTo();
		em.helper.hashCheck();
		em.helper.goToNext();
		em.helper.externalLinks();
	};

	em.helper.debounce = function(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};

	em.helper.externalLinks = function(){
		var anchors = document.querySelectorAll('a');
	    
	    if(anchors.length>0){
	      for (var i = 0; i < anchors.length; ++i) {
			   var a = new RegExp('/' + window.location.host + '/');
			   if(!a.test(anchors[i].href)) {
			       anchors[i].setAttribute("target","_blank");
			   }
			}
		}
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
