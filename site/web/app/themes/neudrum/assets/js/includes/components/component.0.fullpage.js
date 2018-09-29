/**
 * example
 * @class
 * @namespace neudrum
 */

(function(exports) {
    var conf  = neudrum.conf,
        util  = neudrum.util,
        event = neudrum.event,
        fx    = neudrum.fx;

    exports.scrollobject = null;

    
    exports.init = function()
    {
        exports.scrollobject = $('#fullpage').fullpage({
            slidesNavigation  : true,
            keyboardScrolling : true,
            animateAnchor     : true,
            scrollHorizontally: true,
            css3              : true,
            scrollingSpeed    : 700,
            autoScrolling     : true,
            animateAnchor     : true,
            controlArrows     : false,
            responsiveSlides  : true,
            navigation        : true,
            navigationPosition: 'left',
            navigationTooltips: ['First', 'Second', 'Third']
        });
    }

    exports.responsive = function()
    {
        if(util.currentBreakpoint('mobile') || util.currentBreakpoint('tablet')){
            $.fn.fullpage.setResponsive(true);
        }
        
        else {
            $.fn.fullpage.setResponsive(false);
        }
    }

    /**
     * onReady
     * @extends neudrum.event.onReady
     */
    event.onReady = util.extend(event.onReady, function(){
        exports.init();
        exports.responsive();
    });

    event.onWindowResize = util.extend(event.onWindowResize, function(){
        exports.responsive();
    });
})(neudrum.fullpage = {});