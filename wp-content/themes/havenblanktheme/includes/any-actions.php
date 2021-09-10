<?php
//timer
add_action( 'woocommerce_product_woocommerce_auction_countdown', 'woocommerce_auction_countdown', 24 );
//btn add to wishlist
add_action( 'woocommerce_product_add_to_watchlist', 'woocommerce_add_to_watchlist', 25 );


function wpspec_show_product_description() {
	echo '<div class="p_md cl_black-500 auctions__item__content__descr">' . get_the_excerpt() . '</div>';
}
add_action( 'woocommerce_product_short_description', 'wpspec_show_product_description', 7 );

// sorting auction
add_action( 'woocommerce_auctions_ordering', 'woocommerce_auctions_ordering' );

//remove product rating 
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );


function total_count_auction() {
    if (is_shop()) {
        $args = array( 'post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1 );
        $products = new WP_Query( $args );
        echo '<span class="p_md cl_yellow">'. $products->found_posts . ' AUCTIONS NOW LIVE</span>';
    }
}
add_action( 'woocommerce_total_count_auction', 'total_count_auction', 5 );


remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');
add_action('woocommerce_template_loop_price', 'woocommerce_template_loop_price');