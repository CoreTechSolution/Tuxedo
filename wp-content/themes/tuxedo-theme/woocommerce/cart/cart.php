<?php
/**
 * Cart Page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
wc_print_notices();
do_action( 'woocommerce_before_cart' ); ?>
<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">
<?php do_action( 'woocommerce_before_cart_table' ); ?>
<div id="custom_cart">
    <div class="section group">
        <?php do_action( 'woocommerce_before_cart_contents' ); ?>
        <?php
            $args = array(
                //'number'     => $number,
                //'orderby'    => $orderby,
                //'order'      => $order,
                'hide_empty' => 0
            );
            $pcats = array();
            $temporary_cat_ids = array();
            $product_categories = get_terms( 'product_cat', $args );
            foreach($product_categories as $pcat){
                array_push($pcats, $pcat->term_id);
            }
            
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                $term_list = wp_get_post_terms($product_id,'product_cat');
                $product_cat_id = $term_list[0]->term_id;
                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) && in_array($product_cat_id, $pcats) ) {
                    array_push($temporary_cat_ids, $product_cat_id);
        ?>
        <div class="col span_2_of_12">
            <div class="cartProductSection">
                <div class="cartProductImage">
                    <div class="removeCartProduct">
                        <?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
						?>
                    </div>
                    <?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
						if ( ! $_product->is_visible() ) {
							echo $thumbnail;
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
						}
					?>
                </div>
                
                
            </div>
            <div class="cartProductTitle">
                <?php
							if ( ! $_product->is_visible() ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
							}
							// Meta data
							//echo WC()->cart->get_item_data( $cart_item );
							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
							}
						?>
                </div>
                <div class="cartProductPrice">
                    <?php
						echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					?>
                </div>
        </div>
        <?php } ?>
        <?php } ?>
        <?php $result_array = array_diff($pcats,$temporary_cat_ids); ?>
        <?php foreach($result_array as $tmp){ ?>
        <?php $link = get_term_by( 'id', $tmp, 'product_cat' ); ?>
        <?php //print_r($link); ?>
        <div class="col span_2_of_12">
            <a href="<?php echo $term_link = get_term_link( $link ); ?>">
                <div class="cartProductSection">
                    <div class="addProductIcon">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="cartCatTitle">Add <?php echo $link->name; ?></div>
            </a>
        </div>
        <?php } ?>
        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
    </div>
</div>
<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form><br /><br />
<div class="cart-collaterals">
	<?php do_action( 'woocommerce_cart_collaterals' ); ?>
</div>
<?php do_action( 'woocommerce_after_cart' ); ?>