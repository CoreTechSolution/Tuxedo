<?php
/**
 * Checkout shipping information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $user_ID;
?>
<div class="woocommerce-shipping-fields">
	<?php if ( WC()->cart->needs_shipping_address() === true ) : ?>

		<?php
			if ( empty( $_POST ) ) {

				$ship_to_different_address = get_option( 'woocommerce_ship_to_destination' ) === 'shipping' ? 1 : 0;
				$ship_to_different_address = apply_filters( 'woocommerce_ship_to_different_address_checked', $ship_to_different_address );

			} else {

				$ship_to_different_address = $checkout->get_value( 'ship_to_different_address' );

			}
		?>

		<h3 id="ship-to-different-address">
			<label for="ship-to-different-address-checkbox" class="checkbox"><?php _e( 'Ship to a different address?', 'woocommerce' ); ?></label>
			<input id="ship-to-different-address-checkbox" class="input-checkbox" <?php checked( $ship_to_different_address, 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" />
		</h3>

		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

			<?php foreach ( $checkout->checkout_fields['shipping'] as $key => $field ) : ?>

				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

			<?php endforeach; ?>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() ) : ?>

			<h3><?php _e( 'Additional Information', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<?php foreach ( $checkout->checkout_fields['order'] as $key => $field ) : ?>

			<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

		<?php endforeach; ?>

	<?php endif; ?>    

	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
    <h3>Pick Up</h3>
    <div>
        <select name="pickup">
            <option value="Pick up in store">Pick up in store</option>
            <option value="Deliver to home">Deliver to home</option>
        </select>
    </div><br />
    <div class="buttonLink" style="font-size: 12px; padding: 8px 40px;"><a href="<?php bloginfo('url'); ?>/update-your-measurements">YOUR MEASUREMENTS</a></div>
    
    <input type="hidden" name="born_in" value="<?php echo get_user_meta($user_ID, 'born_in', true); ?>" />
    <input type="hidden" name="chest" value="<?php echo get_user_meta($user_ID, 'chest', true); ?>" />
    <input type="hidden" name="height_ft" value="<?php echo get_user_meta($user_ID, 'height_ft', true); ?>" />
    <input type="hidden" name="height_inch" value="<?php echo get_user_meta($user_ID, 'height_inch', true); ?>" />
    <input type="hidden" name="preferredfit" value="<?php echo get_user_meta($user_ID, 'preferredfit', true); ?>" />
    <input type="hidden" name="shoe_size_in" value="<?php echo get_user_meta($user_ID, 'shoe_size_in', true); ?>" />
    <input type="hidden" name="shoulder" value="<?php echo get_user_meta($user_ID, 'shoulder', true); ?>" />
    <input type="hidden" name="stomach" value="<?php echo get_user_meta($user_ID, 'stomach', true); ?>" />
    <input type="hidden" name="weight_lbs" value="<?php echo get_user_meta($user_ID, 'weight_lbs', true); ?>" />
    <input type="hidden" name="chest_size_in" value="<?php echo get_user_meta($user_ID, 'chest_size_in', true); ?>" />
    <input type="hidden" name="chest_length_in" value="<?php echo get_user_meta($user_ID, 'chest_length_in', true); ?>" />
    <input type="hidden" name="waist_size_in" value="<?php echo get_user_meta($user_ID, 'waist_size_in', true); ?>" />
    <input type="hidden" name="waist_length_in" value="<?php echo get_user_meta($user_ID, 'waist_length_in', true); ?>" />
    <input type="hidden" name="neck_size_in" value="<?php echo get_user_meta($user_ID, 'neck_size_in', true); ?>" />
    <input type="hidden" name="sleeve_size_in" value="<?php echo get_user_meta($user_ID, 'sleeve_size_in', true); ?>" />
    <input type="hidden" name="my_neck_size" value="<?php echo get_user_meta($user_ID, 'my_neck_size', true); ?>" />
    <input type="hidden" name="my_chest_size" value="<?php echo get_user_meta($user_ID, 'my_chest_size', true); ?>" />
    <input type="hidden" name="my_overarm_size" value="<?php echo get_user_meta($user_ID, 'my_overarm_size', true); ?>" />
    <input type="hidden" name="my_jacket_length" value="<?php echo get_user_meta($user_ID, 'my_jacket_length', true); ?>" />
    <input type="hidden" name="my_shoulders_size" value="<?php echo get_user_meta($user_ID, 'my_shoulders_size', true); ?>" />
    <input type="hidden" name="my_arms_size" value="<?php echo get_user_meta($user_ID, 'my_arms_size', true); ?>" />
    <input type="hidden" name="my_waist" value="<?php echo get_user_meta($user_ID, 'my_waist', true); ?>" />
    <input type="hidden" name="my_hip" value="<?php echo get_user_meta($user_ID, 'my_hip', true); ?>" />
    <input type="hidden" name="my_outseam" value="<?php echo get_user_meta($user_ID, 'my_outseam', true); ?>" />
    
    <input type="hidden" name="event_date" value="<?php echo $_POST['event_date']; ?>" />
    <input type="hidden" name="event_name" value="<?php echo $_POST['event_name']; ?>" />
    <input type="hidden" name="event_type" value="<?php echo $_POST['event_type']; ?>" />
</div>
