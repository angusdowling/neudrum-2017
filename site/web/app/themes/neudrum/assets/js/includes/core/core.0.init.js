/**
 * neudrum
 * @class
 * @requires jquery.min.js
 * @author Angus Dowling <angusdowling@live.com.au>
 */

(function(exports) {
    /**
     * conf
     */
    exports.conf = {
        win: {
            w: window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
            h: window.innerHeight || document.body.offsetHeight || document.documentElement.clientHeight || $(window).height()
        },
    
        bp: {
            xs: 320,
            mb: 480,
            pb: 640,
            sm: 768,
            md: 992,
            lg: 1200
        },
    
        _flag: false
    };
})(this.neudrum = {});
