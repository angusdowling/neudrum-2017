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
	exports.pageLoaded = function () {
		util.addGlobalClass('page-loaded');
	}

	/**
	 * pageScrolled
	 * @implements {addGlobalClass}
	 * @implements {removeGlobalClass}
	 */
	exports.pageScrolled = function () {
		var scrolled = $(window).scrollTop();
		var state = 'page-scrolled';

		if (scrolled > 0) {
			util.addGlobalClass(state);
		}

		else {
			util.removeGlobalClass(state);
		}
	}

	/**
	 * onWindowScroll
	 * @extends neudrum.event.onWindowScroll
	 */
	event.onWindowScroll = util.extend(event.onWindowScroll, function () {
		exports.pageScrolled();
	});

	/**
	 * onReady
	 * @extends neudrum.event.onReady
	 */
	event.onReady = util.extend(event.onReady, function () {
		exports.pageLoaded();
		exports.pageScrolled();
	});

})(neudrum.states = {});