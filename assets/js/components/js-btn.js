$('.js-btn--overflow').click(function(event){
	var originalHref = $(this).attr("href");
	event.preventDefault();
	var resizeElement = $(this).closest(".coffee")
	var elementOffset = $(resizeElement).offset();
	var $tempOverlayBack = $("<div class='btn-overflow-overlay-back' style='background:#ff0060;z-index:10;position:fixed;display:none;top:0;left:0;width:100%;height:100%;'></div>")
	var $tempOverlay = $("<div class='btn-overflow-overlay' style='background:#fff;z-index:1000;position:fixed;display:none;'></div>")
	$("body").append($tempOverlayBack);
    $("body").append($tempOverlay);
	$tempOverlay.css("width",$(resizeElement).width());
	$tempOverlay.css("height",$(resizeElement).height());
	$tempOverlay.css("top",elementOffset.top-$(window).scrollTop());
	$tempOverlay.css("left",elementOffset.left);
	$tempOverlay.css("z-index",100);
	$tempOverlay.fadeIn(function(){
		$tempOverlayBack.fadeIn("slow");
		$(this).animate({
			left: 0,
			width:"100%",
			height:"100%",
			top:0
		}, 600, function() {
			window.location.href = originalHref;
		});
	});
})