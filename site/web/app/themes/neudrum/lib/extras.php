<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
	return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
	if (is_feed()) {
		return $title;
	}
	
	$title .= get_bloginfo('name');
	
	return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

/**
 * Custom Post Types
 */
function create_custom_post_types() {
	register_post_type( 'product',
	array(
		'labels'            => array(
			'name'               => __( 'Products' ),
			'singular_name'      => __( 'Product' ),
			'menu_name'          => _x( 'Products', 'admin menu' ),
			'name_admin_bar'     => _x( 'Product', 'add new on admin bar'),
			'add_new'            => _x( 'Add New', 'product' ),
			'add_new_item'       => __( 'Add New Product' ),
			'new_item'           => __( 'New Product' ),
			'edit_item'          => __( 'Edit Product' ),
			'view_item'          => __( 'View Product' ),
			'all_items'          => __( 'All Products' ),
			'search_items'       => __( 'Search Products' ),
			'parent_item_colon'  => __( 'Parent Products:' ),
			'not_found'          => __( 'No products found.' ),
			'not_found_in_trash' => __( 'No products found in Trash.' )
		),
		'public'            => true,
		'show_in_menu'      => true,
		'has_archive'       => true,
		'show_in_nav_menus' => true,
		'menu_icon'         => 'dashicons-groups',
		'supports'          => array( 'title', 'editor', 'thumbnail' ), 
		'rewrite'           => array(
			'with_front' => false
		)
	)
);
}
add_action( 'init', 'create_custom_post_types' );

/**
* Custom Taxonomies
*/
add_action('init', 'create_custom_taxonomies');
function create_custom_taxonomies() {
	register_taxonomy('product_category', array('product'), array(
		'hierarchical' => true,
		'labels' => array(
			'name'              => __('Categories', ''),
			'singular_name'     => _x('category', 'taxonomy singular name', ''),
			'search_items'      => __('Search Categories', ''),
			'all_items'         => __('All Categories', ''),
			'parent_item'       => __('Parent Category', ''),
			'parent_item_colon' => __('Parent Category:', ''),
			'edit_item'         => __('Edit Category', ''),
			'update_item'       => __('Update Category', ''),
			'add_new_item'      => __('Add New Category', ''),
			'new_item_name'     => __('New Category', ''),
		),
		'show_ui' => true,
		'rewrite' => array(
			'slug'       => 'category',
			'with_front' => false,
		),
	));
}

/**
 * Custom Settings Pages
 */
if( function_exists('acf_add_options_page') ) {
	// add parent
	$parent = acf_add_options_page(array(
		'page_title'  => 'Site General Settings',
		'menu_title'  => 'Site Settings',
		'redirect'    => false
	));
	
	// add sub page
	acf_add_options_sub_page(array(
		'page_title'  => 'Developer',
		'menu_title'  => 'Developer',
		'parent_slug'   => $parent['menu_slug'],
	));
}

add_filter('show_admin_bar', '__return_false');