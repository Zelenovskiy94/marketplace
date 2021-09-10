<?php
/**
 * Auction watchlist link
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product, $post;

if(!(method_exists( $product, 'get_type') && $product->get_type() == 'auction')){
	return;
}
$user_id = get_current_user_id();

?>
<p class="favorite__button">
    <?php if ($product->is_user_watching()): ?>
    	<a href="#remove from watchlist" data-auction-id="<?php echo esc_attr( $product->get_id() ); ?>" class="remove-wsawl favorite__button__active  sa-watchlist-action ">
            <?php echo $GLOBALS['svgs']['btn-favorite']?>
        </a>
    <?php else : ?>
    	<a href="#add_to_watchlist" data-auction-id="<?php echo esc_attr( $product->get_id() ); ?>" class="favorite__button__unactive add-wsawl  sa-watchlist-action <?php if($user_id == 0) echo " no-action ";?>" title="<?php if($user_id == 0) echo 'You must be logged in to use watchlist feature';?>">
            <?php echo $GLOBALS['svgs']['btn-favorite']?>
        </a>
    <?php endif; ?>	
</p>
