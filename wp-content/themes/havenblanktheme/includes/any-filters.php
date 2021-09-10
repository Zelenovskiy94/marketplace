<?php

// Add title for img
function haven_blank_theme_restore_image_title( $html, $id ) {
	$attachment = get_post($id);
	$mytitle = $attachment->post_title;
	return str_replace('<img', '<img title="' . $mytitle . '" ' , $html);
}
add_filter( 'media_send_to_editor', 'haven_blank_theme_restore_image_title', 15, 2 );

// Disable update for the acf plugin
function filter_plugin_updates( $value ) {
	unset( $value->response['advanced-custom-fields-pro/acf.php'] );
	return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

// Add the icon for parent menu item
function nav_menu_item_change_submenu( $item_output, $item, $depth, $args ) {
	if ( in_array( 'menu-item-has-children', $item->classes ) ) {
		$item_output .= '<span class="parent-icon"></span>';
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'nav_menu_item_change_submenu', 10, 4 );

//auction title template loop
function woocommerce_template_loop_product_title() {
	echo '<div class="h4">' . get_the_title() . '</div>';
}
add_filter( 'woocommerce_template_loop_product_title', 'woocommerce_template_loop_product_title', 10, 4 );


function woocommerce_template_loop_price() {
	wc_get_template( 'loop/price.php' );
}

add_filter( 'woocommerce_template_loop_price', 'woocommerce_template_loop_price', 10, 4 );

//sorting auctions
function custom_woocommerce_auctions_orderby() {
	return array(
		'auction_end'      => esc_html__( 'Ending Soonest', 'wc_simple_auctions' ),
		'date'             => esc_html__( 'Newly Listed', 'woocommerce' ),
		'price'            => esc_html__( '$: Lowest First', 'wc_simple_auctions' ),
		'price-desc'       => esc_html__( '$: Highest First', 'wc_simple_auctions' ), 
		'auction_started'  => esc_html__( '# of bids: Fewest First', 'wc_simple_auctions' ),
		'auction_activity' => esc_html__( '# of bids: Most First', 'wc_simple_auctions' ),
		'most_comments'    => esc_html__( 'Most Comments', 'woocommerce' ),
	);
}
add_filter( 'woocommerce_auctions_orderby', 'custom_woocommerce_auctions_orderby' );
 
//sorting by comments
function custom_woocommerce_get_catalog_ordering_comments_args( $args ) {
	
    $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    $fallback = (string) apply_filters( 'wc_extra_sorting_options_fallback', 'title', $orderby_value ); 
	$fallback_order = (string) apply_filters( 'wc_extra_sorting_options_fallback_order', 'ASC', $orderby_value );
	if ( 'most_comments' == $orderby_value ) {
        $args['order'] = 'DESC';
		$args['orderby']  = [ 'meta_value_num' => 'DESC', $fallback => $fallback_order ];
		$args['meta_key'] = '_wc_review_count';

    }
    return $args;
}

add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_comments_args' );


add_filter( 'woocommerce_get_image_size_thumbnail', 'archive_thumbnail_size' );
 
function archive_thumbnail_size( $size ){
		$size['width'] = 392;
		$size['height'] = 176;
		return $size;
}


add_filter( 'wcfmmp_is_allow_sold_by_label', 'plugins_remove_element' );
add_filter( 'wcfm_is_pref_vendor_reviews', 'plugins_remove_element' );
 
function plugins_remove_element( ){
		return false;
}

