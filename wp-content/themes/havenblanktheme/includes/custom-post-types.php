<?php
// Register Custom Post Type Smart Pools
function custom_post_types() {

	// register_post_type( 'smart-pools', array(
	// 	'labels'             => array(
	// 		'name'               => 'Smart pools',
	// 		'singular_name'      => 'Smart pool',
	// 		'add_new'            => 'Add new',
	// 		'add_new_item'       => 'Add new item',
	// 		'edit_item'          => 'Edit item',
	// 		'new_item'           => 'New item',
	// 		'view_item'          => 'View item',
	// 		'search_items'       => 'Searh item',
	// 		'not_found'          => 'Item not found',
	// 		'not_found_in_trash' => 'Not found in Trash',
	// 		'parent_item_colon'  => '',
	// 		'menu_name'          => 'Smart pools'
	// 	),
	// 	'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	// 	'taxonomies'            => array( ),
	// 	'hierarchical'          => false,
	// 	'public'                => true,
	// 	'show_ui'               => true,
	// 	'show_in_menu'          => true,
	// 	'menu_position'         => 5,
	// 	'show_in_admin_bar'     => true,
	// 	'show_in_nav_menus'     => true,
	// 	'can_export'            => true,
	// 	'has_archive'           => false,
	// 	'exclude_from_search'   => false,
	// 	'publicly_queryable'    => true,
	// 	'capability_type'       => 'post',
	// ) );

}
add_action( 'init', 'custom_post_types', 0 );
