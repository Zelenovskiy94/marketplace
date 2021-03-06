<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<div class="auctions__item">
	<?php
	//admin settings
	do_action('woocommerce_before_shop_loop_item');
	//image
	do_action('woocommerce_before_shop_loop_item_title');
	//countdown
	do_action('woocommerce_product_woocommerce_auction_countdown');
	?>
	<div class="auctions__item__content">
		<?php
		//title
		do_action('woocommerce_shop_loop_item_title');
		//short description
		do_action('woocommerce_product_short_description');
		//seller
		do_action('woocommerce_after_shop_loop_item_title');
		?>
		<div class="auctions__item__content__bid">
			<?php
			//price bid
			do_action('woocommerce_template_loop_price');

			//favorite
			do_action('woocommerce_product_add_to_watchlist');
			?>
		</div>
	</div>
</div>