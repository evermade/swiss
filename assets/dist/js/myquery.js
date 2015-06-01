var em={};$(document).ready(function(){for(var e in em)"function"==typeof em[e].init?em[e].init():console.error("Your block "+e+" doesn't define init-method.")});
!function(){for(var o,e=function(){},n=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeStamp","trace","warn"],r=n.length,i=window.console=window.console||{};r--;)o=n[r],i[o]||(i[o]=e)}();
!function(){em.base={},em.base.init=function(){em.base.example()},em.base.example=function(){}}();
!function(){em.forms={},em.forms.init=function(){},em.forms.gravityForms=function(){$(".gform_wrapper form").each(function(){var e=$(this),i=e.find(".gform_fields .gfield");i.each(function(){var e=$(this),i=e.find(".gfield_label"),t=e.find("input, textarea");t.attr("placeholder",i.text()),Modernizr.input.placeholder&&i.hide(),e.hasClass("gfield_contains_required")&&t.not("textarea").attr("required","required")}),e.find("input[type='submit']").addClass("btn");var t=e.find("select");t.each(function(){var e=$(this);e.wrap('<div class="custom-select"></div>')})})}}();
!function(){em.helper={},em.helper.init=function(){em.helper.imgClear(),em.helper.spemail(),em.helper.jumpTo(),em.helper.equalizeHeight()},em.helper.imgClear=function(){$("img").each(function(){$(this).removeAttr("width"),$(this).removeAttr("height")})},em.helper.resizeVideos=function(){$("iframe").each(function(){var t=$(this);t.attr("data-original-width")||(t.attr("data-original-width",t.attr("width")),t.attr("data-original-height",t.attr("height"))),t.attr("width","100%");var e=t.attr("data-original-height")*t.width()/t.attr("data-original-width");t.attr("height",e)})},em.helper.spemail=function(){$("a.spemail").each(function(t){var e=$(this),i=e.text();i=i.replace(/\(at\)/g,"@"),i=i.replace(/\(dot\)/g,"."),e.attr("href","mailto:"+i),e.text(i)})},em.helper.jumpTo=function(){$("body").on("click",".jump",function(){var t=$(this).attr("href");if(0===$(t).length)return!1;var e=$(t).offset();return $("html,body").stop(!0,!0).animate({scrollTop:e.top},300,function(){window.location.hash=t}),!1})},em.helper.equalizeHeight=function(){$(".js-equalizeHeight").each(function(){var t,e=$(this),i=0;t=e.find(e.data("equalize")?"."+e.data("equalize"):"> div"),t.each(function(){var t=$(this).outerHeight();t>i&&(i=t)}),t.each(function(){$(this).css({height:i})})})}}();
!function(){em.mq={},em.mq.breakpoints={xs:0,sm:768,md:992,lg:1200},em.mq.init=function(){},em.mq.query=function(n,e){n="undefined"!=typeof n?n:"xs",e="undefined"!=typeof e?e:"min";var i=!(!window||!window.matchMedia);if(i&&n in em.mq.breakpoints){var m=window.matchMedia("all and ("+e+"-width: "+em.mq.breakpoints[n]+"px)");return m.matches}return!1}}();
!function(){em.navigation={},em.navigation.init=function(){$(".mobile-menu-button").on("click",function(){return $("body").toggleClass("nav-open"),$(".mobile-menu-button i").toggleClass("fa-bars"),$(".mobile-menu-button i").toggleClass("fa-times"),!1}),$("body").on("click","body.nav-open",function(n){return".nav-bar .nav"!==n.target.className&&$("body.nav-open .mobile-menu-button").click(),!0}),$(window).resize(function(){$("body.nav-open .mobile-menu-button").click()})}}();
!function(){em.slideshows={},em.slideshows.init=function(){},em.slideshows.slick=function(){return"undefined"==typeof $.fn.Slick?!1:void $(".slick").slick({dots:!0,arrows:!1,autoplay:!0,autoplaySpeed:4e4,speed:500,fade:!0,cssEase:"linear",centerMode:!0,slidesToScroll:1})}}();
!function(){em.tabs={},em.tabs.init=function(){},em.tabs.setup=function(){$(".accordion").each(function(){var i=$(this),a=i.find(".accordion__group");i.find(".accordion__title").on("click",function(){var a=$(this);i.find(".accordion__group").removeClass("is-active"),a.closest(".accordion__group").toggleClass("is-active")}),i.find(".accordion__navbar li a").on("click",function(){var n=$(this);a.removeClass("is-active"),i.find(".accordion__navbar li").removeClass("is-active"),n.parent().addClass("is-active");var c=i.find('div[data-content="'+n.attr("href").substring(1)+'"]');c.toggleClass("is-active")})})}}();