<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>
<div class="col span_1_of_3">
<div class="productImg">
<div <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
        <!-- <a href="<?php the_permalink(); ?>" style="display: block; height: 100%;"> -->
        <div class="productCaption">
            <div class="productPrice"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></div>
            <div class="iconsClass">
                <div class="section group">
                    <div class="col span_9_of_12"><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/quickview.png" /></a></div>
                    <div class="col span_2_of_12"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist icon="http://tuxedo.coregensolutions.com/wp-content/themes/tuxedo-theme/images/heart.png"]'); ?></div>
                    <div class="col span_1_of_12"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/search-icon.png" /></a></div>
                </div>
            </div>
        </div>
        <!-- </a> -->

		<!-- <h3><?php the_title(); ?></h3> -->

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			//do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

	<?php

		/**
		 * woocommerce_after_shop_loop_item hook
		 *
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		//do_action( 'woocommerce_after_shop_loop_item' );

	?>

</div>
</div>
</div>