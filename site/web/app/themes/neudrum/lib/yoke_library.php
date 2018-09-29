<?php
/*------------------------------------------------------------------------------------------
---------------------------------- SLUGS MANIPULATIONS -------------------------------------
-------------------------------------------------------------------------------------------*/
function get_the_slug( $id = null ){
	if( empty($id) ) {
		global $post;
		
		if( empty($post) ) {
	      	return ''; // No global $post var available.
		}

	  	$id = $post->ID;
  	}

  	$slug = basename( get_permalink($id) );
  	return $slug;
}

function the_slug( $id = null ){
	echo apply_filters( 'the_slug', get_the_slug($id) );
}



/*------------------------------------------------------------------------------------------
------------------------------ TAXONOMY ARCHIVE PAGINATION ---------------------------------
-------------------------------------------------------------------------------------------*/
// function tdd_tax_filter_posts_per_page( $value ) {
	//if we need custom manipulations
    // return ( is_tax('brand') ) ? 1 : $value;
// }
// add_filter( 'option_posts_per_page', 'tdd_tax_filter_posts_per_page' );
?>