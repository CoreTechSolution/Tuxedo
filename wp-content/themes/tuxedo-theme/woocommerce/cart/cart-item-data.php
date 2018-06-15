<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php
	foreach ( $item_data as $data ) :
		$key = sanitize_text_field( $data['key'] );
?>
    <div><strong><?php echo wp_kses_post( $data['key'] ); ?> : </strong><?php echo wp_kses_post( $data['value'] ); ?></div>
<?php endforeach; ?>