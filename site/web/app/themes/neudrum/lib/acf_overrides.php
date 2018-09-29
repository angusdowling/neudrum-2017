<?php
/*-----------------------------------------------------------------------------------------------------------------------------
                                                ACF OVERRIDES
-----------------------------------------------------------------------------------------------------------------------------*/
function mgt_dequeue_stylesandscripts() {
    if(!is_admin()):
        wp_dequeue_style( 'select2' );
        wp_deregister_style( 'select2' );

        wp_dequeue_script( 'select2');
        wp_deregister_script('select2');
    endif;
}
add_action( 'wp_enqueue_scripts', 'mgt_dequeue_stylesandscripts', 100 );
?>