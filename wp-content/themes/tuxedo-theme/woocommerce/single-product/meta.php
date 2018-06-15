<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<?php $product_components = get_field('product_components', $product_id); ?>
    <?php if(!empty($product_components)){ ?>
    <div class="components"><strong>Components</strong> : <?php echo implode(', ', get_field('product_components', $product_id)); ?></div>
<?php } ?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span>.</span>

	<?php endif; ?>

	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '.</span>' ); ?>

	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '.</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
<div class="viewMeasurements">
    <?php if(is_user_logged_in()){ ?>
    <?php global $user_ID; $role = get_user_role($user_ID); ?>
    <?php if($role != 'subscriber'){ ?>
    <p><a style="padding: 4px 13px;" href="<?php bloginfo('url'); ?>/wedding-registration/?productid=<?php echo $product->id; ?>">Add to Wedding Registration</a></p>
    <?php } ?>
    <?php } ?>
    <p><a href="<?php bloginfo('url'); ?>/my-measurements">VIEW YOUR MEASUREMENTS</a></p>
</div>