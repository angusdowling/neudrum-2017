/**
 * util
 * @module
 * @namespace neudrum/util
 * @author Angus Dowling <angusdowling@live.com.au>
 */

(function (exports) {
	var timers = {};

	/**
	 * extend
	 * @param {function} f - Original function to be extended
	 * @param {function} c - Callback function to be added to original function
	 */
	exports.extend = function (f, c) {
		var cached = f;

		return function () {
			var result = cached.apply(this, arguments);
			c();

			return result;
		};
	}

	/**
	 * toTitleCase
	 * @param {string} str - String to be turned into title case.
	 */
	exports.toTitleCase = function (str) {
		return str.replace(/\w\S*/g, function (txt) { return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase(); });
	}

	/**
	 * isPlaying
	 * @param {object} video - Video object to check if it is currently playing
	 */
	exports.isPlaying = function (video) {
		return !!(video.currentTime > 0 && !video.paused && !video.ended && video.readyState > 2);
	}

	/**
	 * toggleGlobalClass
	 * Add a class to the HTML tag
	 * @implements {checkGlobalClass}
	 */
	exports.toggleGlobalClass = function (cssClass) {
		if (!exports.checkGlobalClass(cssClass)) {
			$('html').addClass(cssClass);
		}
		
		else {
			$('html').removeClass(cssClass);
		}
	}

	/**
	 * addGlobalClass
	 * Add a class to the HTML tag
	 * @implements {checkGlobalClass}
	 */
	exports.addGlobalClass = function (cssClass) {
		if (!exports.checkGlobalClass(cssClass)) {
			$('html').addClass(cssClass);
		}
	}

	/**
	 * removeGlobalClass
	 * Remove a class from the HTML tag
	 * @implements {checkGlobalClass}
	 */
	exports.removeGlobalClass = function (cssClass) {
		if (exports.checkGlobalClass(cssClass)) {
			$('html').removeClass(cssClass);
		}
	}

	/**
	 * getBreakpoint
	 */
	exports.getBreakpoint = function () {
		if (neudrum.conf.win.w > neudrum.conf.bp.lg) {
			return 'desktop'
		}

		else if (neudrum.conf.win.w >= neudrum.conf.bp.md && neudrum.conf.win.w < neudrum.conf.bp.lg) {
			return 'laptop'
		}

		else if (neudrum.conf.win.w >= neudrum.conf.bp.pb && neudrum.conf.win.w < neudrum.conf.bp.md) {
			return 'tablet'
		}

		else if (neudrum.conf.win.w >= 0 && neudrum.conf.win.w < neudrum.conf.bp.pb) {
			return 'mobile'
		}
	}

	/**
	 * currentBreakpoint
	 */
	exports.currentBreakpoint = function (breakpoint) {
		switch (breakpoint) {
			case ('desktop'):
				return neudrum.conf.win.w > neudrum.conf.bp.lg;
				break;
			case ('laptop'):
				return neudrum.conf.win.w >= neudrum.conf.bp.md && neudrum.conf.win.w < neudrum.conf.bp.lg;
				break;
			case ('tablet'):
				return neudrum.conf.win.w >= neudrum.conf.bp.pb && neudrum.conf.win.w < neudrum.conf.bp.md;
				break;
			case ('mobile'):
				return neudrum.conf.win.w >= 0 && neudrum.conf.win.w < neudrum.conf.bp.pb;
				break;
		}
	}

	/**
	 * timedRemoveGlobalClass
	 * Remove a class from the HTML tag based on a timer
	 * @implements {removeGlobalClass}
	 * @implements {addGlobalClass}
	 */
	exports.timedRemoveGlobalClass = function (cssClass, intermediaryCssClass, delay) {
		if (typeof timers[cssClass] === 'undefined') {
			exports.addGlobalClass(intermediaryCssClass);

			timers[cssClass] = setTimeout(function () {
				exports.removeGlobalClass(cssClass);
				exports.removeGlobalClass(intermediaryCssClass);
				delete timers[cssClass];
			}, delay);
		}
	}

	/**
	 * checkGlobalClass
	 * Check if a class has been applied to the HTML tag
	 */
	exports.checkGlobalClass = function (cssClass) {
		var hasClasses = [];
		var $html = $('html');

		if (cssClass.indexOf(' ') !== -1) {
			cssClass = cssClass.split(' ');

			for (var i = 0; i < cssClass.length; i++) {
				hasClasses.push($html.hasClass(cssClass[i]));
			}

			if (hasClasses.indexOf(false) !== -1) {
				return false;
			}
		}

		else {
			return $('html').hasClass(cssClass);
		}

		return true;
	}
})(neudrum.util = {});