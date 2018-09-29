/**
 * fx
 * @class
 * @namespace neudrum
 */

(function(exports) {
    var _queue = [],
        _flag  = false,
        _speed = 300;

    /**
     * add
     * Add an animation to the queue
     * @param {object} item - Animation item to be queued
     */
    exports.add = function(item) {
        if(!_flag){
            queue.push(item);
        }
    };

    /**
     * reset
     * Reset animation queue
     */
    exports.reset = function(){
        _queue = [];
    }

    /**
     * run
     * Run any animations in the queue
     */
    exports.run = function() {
        var delay = 0;
        
        if(_flag || _queue.length === 0){
            return false;
        }
        
        _flag = true;
        
        for(var i = 0; i < _queue.length; i++){
            var item     = _queue[i];
            var duration = (typeof item.duration !== "undefined") ? item.duration : _speed;
            
            delay = (i > 0) ? delay + item.duration : delay;
            
            window.setTimeout(item.animation, delay);
        }
        
        window.setTimeout(function(){
            _flag = false;
        },  delay);
        
        exports.reset();
    };
})(neudrum.fx = {});