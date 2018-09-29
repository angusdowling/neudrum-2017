<?php


/*------------------------------------------------------------------------------------------
---------------------------------- IMAGE HANDLING ------------------------------------------
-------------------------------------------------------------------------------------------*/

// THUMBNAIL IMAGE SIZES

add_action( 'after_setup_theme', 'thumb_sizes_setup' );

function thumb_sizes_setup() {
  //                Name              | Width | height | Crop
  add_image_size( "banner",              1600,   400,    true );
  add_image_size( "home_cta",             588,   686,    true );
}

/*------------------------------------------------------------------------------------------
    IMAGE HELPERS
-------------------------------------------------------------------------------------------*/

function get_all_image_sizes($attachment_id = 0) {
    $sizes = get_intermediate_image_sizes();
    if(!$attachment_id) $attachment_id = get_post_thumbnail_id();

    $images = array();
    foreach ( $sizes as $size ) {
      $img_array = wp_get_attachment_image_src( $attachment_id, $size );
        $images[$size] = $img_array[0];
    }
    $img_array = wp_get_attachment_image_src( $attachment_id, 'full' );
    $images['full'] = $img_array[0];

    return $images;
}

function get_img($img_obj, $size = null) {

  if(empty($img_obj)) {
    $img_obj = get_field("default_image", 'options');
  }

  if(is_string($img_obj)):
    return $img_obj;
  endif;

  if($size == null || empty($img_obj["sizes"][$size])) {
    $return = $img_obj["url"];
  } else {
    $return = $img_obj["sizes"][$size];
  }
  return $return;
}

function get_post_img($id, $size = 'full') {
  if(is_object($id) || is_array($id)) {
    $return    = get_img($id, $size);
  }
  
  else {
    $post      = get_post($id);
    $post_type = $post->post_type;

    switch ($post_type):
      case ('post'):
      case ('page'):
      case ('product'):
          $image_id = get_post_thumbnail_id( $id );
          $src_arr  = wp_get_attachment_image_src( $image_id, $size );
          $return   = $src_arr[0];
        break;
      default:
          $return   = get_img(null, $size);
        break;
    endswitch;
  }

  if(empty($return)) {
    $return = get_img(null, $size);
  }

  if(is_ssl()):
    $src_https = str_replace('http://', 'https://', $return);
    $return = $src_https;
  endif;

  return $return;
}
?>