!function(e){"use strict";var i=function(i,t){this.element=e(i),this.options=t,this.header=e(".jeg_header"),this.loader=e(".jeg_overlay_slider_loader",i),this.slider_wrapper=e(".jeg_overlay_slider_wrapper",i),this.slider_bottom=e(".jeg_overlay_slider_bottom",i),this.slider_bg=e(".jeg_overlay_slider_bg",i),this.caption_container=e(".jeg_overlay_caption_container",i),this.activeid=0,this.previd=0,this.init()};i.DEFAULTS={rtl:!1,fullscreen:!1,breakpoint:1024},i.prototype.init=function(){var i=this,t=i.header;i.options.fullscreen=e(i.element).data("fullscreen"),i.options.shownav=e(i.element).data("nav"),i.resize_wrapper=function(){t=e(i.header).is(":visible")?i.header:e(".jeg_navbar_mobile_wrapper"),e(window).width()>i.options.breakpoint?i.element.height(e(window).height()-e(t).height()):i.element.attr("style",""),i.resize_wrapper_fix()},i.resize_wrapper_fix=function(){if(t=e(i.header).is(":visible")?i.header:e(".jeg_navbar_mobile_wrapper"),e(window).width()>767)i.slider_wrapper.height(i.element.height()+e(t).height()),i.element.height(i.slider_wrapper.height()-e(t).height());else{var r=e(window).height(),a=r>414?.45*r:r;i.slider_wrapper.height(a),i.element.height(a-e(t).height())}},i.options.fullscreen?(i.resize_wrapper(),e(window).bind("resize load",i.resize_wrapper)):(i.resize_wrapper_fix(),e(window).bind("resize load",i.resize_wrapper_fix)),i.do_slider(),i.bind_click()},i.prototype.do_slider=function(){var e=this;e.slider_bottom.owlCarousel({rtl:e.options.rtl,lazyLoad:!0,margin:10,navText:["",""],nav:e.options.shownav,dots:!1,responsive:{0:{items:1},380:{items:2},768:{items:3},1024:{items:4,loop:!0}}}),e.slider_bottom.on("changed.owl.carousel",(function(){e.element.find('.jeg_overlay_slider_item[data-id="'+e.activeid+'"]').addClass("active")}))},i.prototype.bind_click=function(){var i=this;i.element.on("click",".jeg_overlay_slider_item",(function(t){t.preventDefault();var r=e(this).data("id");i.previd=i.activeid,i.activeid=r,i.change_active(this),i.load_background_text(r)}))},i.prototype.change_active=function(i){this.element.find(".jeg_overlay_slider_item").removeClass("active"),e(i).addClass("active")},i.prototype.load_background_text=function(i){var t=this;e(t.loader).stop().fadeIn();var r=t.slider_bg.get(t.previd),a=t.slider_bg.get(i),o=e(a).data("bg"),n=t.caption_container.get(t.previd),s=t.caption_container.get(i);if(e(n).fadeOut(),e(a).hasClass("loaded"))t.change_active_background(r,a,s);else{var d=new Image;e(d).load((function(){i===t.activeid&&(e(a).css("background-image","url("+o+")").addClass("loaded"),t.change_active_background(r,a,s))})).attr("src",o)}},i.prototype.change_active_background=function(i,t,r){e(this.loader).stop().fadeOut(),this.slider_bg.removeClass("active"),e(i).stop().fadeOut(),e(t).stop().fadeIn((function(){e(this).addClass("active")})),e(r).fadeIn()};var t=e.fn.joverlayslider;e.fn.joverlayslider=function(t){return e(this).each((function(){var r=e(this),a=e.extend({},i.DEFAULTS,r.data(),"object"==typeof t&&t),o=r.data("jeg.overlayslider");o||r.data("jeg.overlayslider",o=new i(this,a))}))},e.fn.joverlayslider.Constructor=i,e.fn.joverlayslider.noConflict=function(){return e.fn.joverlayslider=t,this}}(jQuery);