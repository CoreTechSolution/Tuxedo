<?php
$order_id = $_GET['oid'];
?>
<h2>Order #<?php echo $order_id; ?> Details</h2>
        <h3><?php get_total_amount($order_id); ?>. Customer IP: <?php echo get_post_meta($order_id,'_customer_ip_address',true); ?></h3>    
<table style="width: 100%;">
            <tr>
                <td style="width: 30%;">
                    <div>
                        <h4>General Details</h4>
                        <p><strong>Order Date</strong> : <?php echo get_the_time('jS F, Y', $order_id); ?> at <?php echo get_the_time('H:i', $order_id); ?></p>
                        <p><strong>Order Status</strong> : <?php get_order_status($order_id); ?></p>
                    </div>
                </td>
                <td style="width: 30%;">
                    <div>
                        <h4>Billing Details</h4>
                        <?php
                        $countries = new WC_Countries;
                        $billing_country = get_post_meta($order_id,'_billing_country',true);
                        $billing_state = get_post_meta($order_id,'_billing_state',true);
                        
                        $billing_state_full = ( $billing_country && $billing_state && isset( $countries->states[ $billing_country ][ $billing_state ] ) ) ? $countries->states[ $billing_country ][ $billing_state ] : $billing_state;
                        $billing_country_full = ( $billing_country && isset( $countries->countries[ $billing_country ] ) ) ? $countries->countries[ $billing_country ] : $billing_country;
                        
                        // clear the $countries object when we're done to free up memory
                        unset($countries);
                        ?>
                        <p><strong>Address</strong></p>
                        <div><?php echo get_post_meta($order_id, '_billing_first_name', true).' '.get_post_meta($order_id, '_billing_last_name', true); ?></div>
                        <div><?php echo get_post_meta($order_id, '_billing_address_1', true); ?></div>
                        <div><?php echo get_post_meta($order_id, '_billing_address_2', true); ?></div>
                        <div><?php echo get_post_meta($order_id, '_billing_city', true); ?> - <?php echo get_post_meta($order_id, '_billing_postcode', true); ?></div>
                        <div><?php echo $billing_state_full; ?>, <?php echo $billing_country_full; ?></div>
                        
                        <p><strong>Email</strong> : <?php echo get_post_meta($order_id, '_billing_email', true); ?></p>
                        <p><strong>Phone</strong> : <?php echo get_post_meta($order_id, '_billing_phone', true); ?></p>
                        
                    </div>
                </td>
                <td style="width: 30%;">
                    <div>
                        <h4>Shipping Details</h4>
                        <?php
                        $countries = new WC_Countries;
                        $shipping_country = get_post_meta($order_id,'_shipping_country',true);
                        $shipping_state = get_post_meta($order_id,'_shipping_state',true);
                        
                        $shipping_state_full = ( $billing_country && $billing_state && isset( $countries->states[ $billing_country ][ $billing_state ] ) ) ? $countries->states[ $billing_country ][ $billing_state ] : $billing_state;
                        $shipping_country_full = ( $billing_country && isset( $countries->countries[ $billing_country ] ) ) ? $countries->countries[ $billing_country ] : $billing_country;
                        
                        // clear the $countries object when we're done to free up memory
                        unset($countries);
                        ?>
                        <p><strong>Address</strong></p>
                        <div><?php echo get_post_meta($order_id, '_shipping_first_name', true).' '.get_post_meta($order_id, '_shipping_last_name', true); ?></div>
                        <div><?php echo get_post_meta($order_id, '_shipping_address_1', true); ?></div>
                        <div><?php echo get_post_meta($order_id, '_shipping_address_2', true); ?></div>
                        <div><?php echo get_post_meta($order_id, '_shipping_city', true); ?> - <?php echo get_post_meta($order_id, '_shipping_postcode', true); ?></div>
                        <div><?php echo $shipping_state_full; ?>, <?php echo $shipping_country_full; ?></div>
                    </div>
                </td>
            </tr>
        </table>