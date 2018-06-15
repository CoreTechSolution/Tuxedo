<?php
global $wpdb;
$args = array(
    'post_type' => 'shop_order',
    'posts_per_page' => -1,
    'post_status' => 'any'
);
$the_query = new WP_Query( $args );
?>
<style>
.status_text_pending{
    background: #ffba00;
    padding: 3px 5px;
}
.status_text_processing{
    background: #73a724;
    padding: 3px 5px;
}
.status_text_onhold{
    background: #999999;
    padding: 3px 5px;
}
.status_text_completed{
    background: #2ea2cc;
    padding: 3px 5px;
}
.status_text_cancelled{
    background: #a00a00;
    padding: 3px 5px;
}
.status_text_refunded{
    background: #999999;
    padding: 3px 5px;
}
.status_text_failed{
    background: #d0c21f;
    padding: 3px 5px;
}
</style>
<div class="wrap">
    <h2>Rental Orders and Rental Returns</h2>
    <table class="wp-list-table widefat fixed pages">
        <thead>
            <tr>
                <th>Orders #</th>
                <th>Date of Wearing</th>
                <th>Ship to</th>
                <th>Ordered</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Orders #</th>
                <th>Date of Wearing</th>
                <th>Ship to</th>
                <th>Ordered</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </tfoot>
        <tbody>
        <?php if ( $the_query->have_posts() ) { ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php $order_id = get_the_ID(); ?>
            <tr>
                <td><a href="<?php bloginfo('home'); ?>/wp-admin/admin.php?page=rental-orders-details&oid=<?php echo $order_id; ?>">#<?php echo $order_id; ?></a></td>
                <td><?php date_of_wearing($order_id); ?></td>
                <td><?php shipping_address($order_id); ?></td>
                <td><?php item_count($order_id); ?></td>
                <td><?php echo get_the_time('jS F, Y', $order_id); ?></td>
                <td><?php get_total_amount($order_id); ?></td>
                <td><?php get_order_status($order_id); ?></td>
            </tr>
        <?php endwhile; ?>
        <?php } else { ?>
            <tr>
                <td colspan="7">No Rental Order</td>
            </tr>
        <?php } ?>
        <?php wp_reset_postdata(); ?>
        </tbody>
    </table>
</div>