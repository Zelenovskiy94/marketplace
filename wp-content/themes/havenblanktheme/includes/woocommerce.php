<?php

//countdown
if ( ! function_exists( 'woocommerce_auction_countdown' ) ) {
	function woocommerce_auction_countdown() {
		global $product;
		
		if(method_exists( $product, 'get_type') && $product->get_type() == 'auction')
			wc_get_template( 'template-parts/auction/auction-countdown.php' );
	}
}
//btn add to wishlist
if ( ! function_exists( 'woocommerce_add_to_watchlist' ) ) {
    function woocommerce_add_to_watchlist() { 
        global $product;

        if(method_exists( $product, 'get_type') && $product->get_type() == 'auction') {
            wc_get_template( 'template-parts/auction/watchlist-link.php' );
        } 

    }
}
if ( get_option( 'simple_auctions_watchlists', 'yes' ) == 'yes' ) {
    add_action( 'wsa_ajax_watchlist', 'ajax_watchlist_auction');
}
function ajax_watchlist_auction() {

    if ( is_user_logged_in() ) {

        global $product;
        $post_id = intval( $_GET['post_id'] );

        $user_ID = get_current_user_id();
        $product = wc_get_product( $post_id );

        if ( $product ) {
            $post_id = $product->get_main_wpml_product_id();
            if ( $product->is_user_watching() ) {
                    delete_post_meta( $post_id, '_auction_watch', $user_ID );
                    delete_user_meta( $user_ID, '_auction_watch', $post_id );
                    do_action( 'woocommerce_simple_auction_after_delete_fom_watchlist', $post_id, $user_ID );
            } else {

                    add_post_meta( $post_id, '_auction_watch', $user_ID );
                    add_user_meta( $user_ID, '_auction_watch', $post_id );
                    do_action( 'woocommerce_simple_auction_after_add_to_watchlist', $post_id, $user_ID );
            }
            wc_get_template( 'template-parts/auction/watchlist-link.php' );
        }
    } else {
        echo '<p>';
        printf( wp_kses_post( __( 'Sorry, you must be logged in to add auction to watchlist. <a href="%s" class="button">Login &rarr;</a>', 'wc_simple_auctions' ) ), get_permalink( wc_get_page_id( 'myaccount' ) ) );
        echo '</p>';
    }

    exit;
}




?>

