(function() {
    $(document).ready(function() {
        neudrum.event.onReady();
        neudrum.event.listeners();
    });

    $(window).load(function() { 
        neudrum.event.onLoad();
    });
})();