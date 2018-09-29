/**
 * neudrum.event
 * @class
 * @requires jquery.min.js
 * @requires plugins/underscore.min.js
 */

(function(exports) {
    /**
     * listeners
     */
    exports.listeners = function(){
        var lazyResize = _.debounce(exports.onWindowResize, 300);
        var lazyScroll = _.debounce(exports.onWindowScroll, 300);

        $(window).on('resize', lazyResize);
        $(window).on('scroll', lazyScroll);
    };

    /**
     * onReady
     */
    exports.onReady = function(){};

    /**
     * onLoad
     */
    exports.onLoad = function(){};

    /**
     * onWindowScroll
     */
    exports.onWindowScroll = function(){};

    /**
     * onWindowResize
     */
    exports.onWindowResize = function(){
        neudrum.conf.win.w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        neudrum.conf.win.h = window.innerHeight || document.body.offsetHeight || document.documentElement.clientHeight || $(window).height();
    };
})(neudrum.event = {});
    