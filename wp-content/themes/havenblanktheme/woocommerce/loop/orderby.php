<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="sort">
	<span class="p_md cl_yellow"><?php esc_attr_e( 'Sort by: ', 'woocommerce' ); ?></span>
	<div class="sort__item p_md sort__current">
		<?php if ($catalog_orderby_options[$orderby]) {
				echo $catalog_orderby_options[$orderby] .' <i class="chevron-icon">' . $GLOBALS["svgs"]["chevron-icon"]  . '</i> ';
				
			} else {
				echo current($catalog_orderby_options) .' <i class="chevron-icon">' . $GLOBALS["svgs"]["chevron-icon"]  . '</i> ';
			}
		?>
	</div>
	<div class="sort__dropdown">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<a class="sort__item cl_black-50 p_md <?php echo $catalog_orderby_options[$orderby] == $name ?  'sort__item__active' : ''; ?>" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) )?>?orderby=<?php echo $id ?>" > <?php echo esc_attr( $name )?></a>
		<?php endforeach; ?>
	</div>

<?php ?>


</div>
