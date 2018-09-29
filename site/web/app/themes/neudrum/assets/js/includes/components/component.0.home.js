/**
 * states
 * @module
 * @namespace neudrum/states
 * @requires jquery.min.js
 * @author Angus Dowling <angusdowling@live.com.au>
 */

(function (exports) {
	/** 
	 * @type {object}
	 */
	var util = neudrum.util;

	/** 
	 * @type {object}
	 */
	var event = neudrum.event;

	/** 
	 * @type {object}
	 */
	var conf = neudrum.conf;

	var flag = false;


	/**
	 * pageLoaded
	 * @implements {addGlobalClass}
	 */
	exports.openProduct = function (obj) {
		var product = obj.attr('data-index');
		var overlay = $('.product-overlay.'+product);
		$.fn.fullpage.setAllowScrolling(false);

		overlay.addClass('active');
		$('html').addClass('product-overlay-open');
	}

	/**
	 * pageLoaded
	 * @implements {addGlobalClass}
	 */
	exports.closeProduct = function (obj) {
		var overlay = $('.product-overlay');
		$.fn.fullpage.setAllowScrolling(true);

		overlay.removeClass('active');
		$('html').removeClass('product-overlay-open');
	}

	exports.tabAccordion = function(){
		$('#myTab').tabCollapse({
			tabsClass: 'hidden-sm',
			accordionClass: 'visible-sm'
		});
	}

	exports.ctaScroll = function(){
		$.fn.fullpage.moveTo(2); 
	}
	
	exports.contactScroll = function(){
		$.fn.fullpage.moveTo(4); 
	}
	
	exports.aboutScroll = function(){
		$.fn.fullpage.moveTo(3); 
	}

	/**
	 * onReady
	 * @extends neudrum.event.onReady
	 */
	event.listeners = util.extend(event.listeners, function () {
		$('.home-products__product').on('click', function(){
			exports.openProduct($(this));
		});
		
		$('.product-overlay__close').on('click', function(){
			exports.closeProduct();
		});

		$('.home-cta__actions .button').on('click', function(e){
			exports.ctaScroll();
			e.preventDefault();
		});
		
		$('.masthead__about__btn').on('click', function(e){
			exports.aboutScroll();
			e.preventDefault();
		});
		
		$('.masthead__contact__btn').on('click', function(e){
			exports.contactScroll();
			e.preventDefault();
		});
	});


	event.onReady = util.extend(event.onReady, function() {
		exports.tabAccordion();
	});

})(neudrum.states = {});