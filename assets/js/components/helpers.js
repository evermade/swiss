(function() {

	em.helper = {};

	em.helper.init = function(){
		em.helper.imgClear();
		//em.helper.resizeVideos();
		em.helper.spemail();
		em.helper.jumpTo();
		em.helper.equalizeHeight();
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

	//a function to equalize hieghts of elements within a parent
     em.helper.equalizeHeight = function(){

            // if($(window).width() < 768){
            //     return false;
            // }

            $(".js-equalizeHeight").each(function(){
                var el = $(this);
                var largestHeight = 0;
                var divs;

                if(el.data("equalize")){
                    divs = el.find("."+el.data("equalize"));
                }
                else {
                    divs = el.find("> div");
                }

                //get the biggest height
                divs.each(function(){
                    var height = $(this).outerHeight();
                    if(height > largestHeight){
                        largestHeight = height;
                    }
                });

                //set the biggest hieght to all
                divs.each(function(){
                    $(this).css({height: largestHeight});
                });
            });

        };
	
})();