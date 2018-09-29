/**
 * form
 * @module
 * @namespace neudrum/form
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

	/**
	 * listeners
	 * @extends neudrum.event.listeners
	 */
	event.listeners = util.extend(event.listeners, function () {
		$('.wpcf7-form-control.wpcf7-submit').on('click', function(){
			$('.form-group').removeClass('has-error');
		});

		$(document).on('wpcf7:invalid', function(event, data) {
			var $invalids = $('.wpcf7-not-valid-tip');
			
			for(var i = 0; i < $invalids.length; i++){
				$invalid = $invalids.eq(i);
				$group   = $invalid.closest('.form-group');
				$input   = $group.find(':input');
				
				$group.addClass('has-error');
				$input.attr('placeholder', $invalid.html());
			}
		});

		$(document).on('wpcf7:mailsent', function() {
			window.location = '/';
		});
	});
})(neudrum.form = {});