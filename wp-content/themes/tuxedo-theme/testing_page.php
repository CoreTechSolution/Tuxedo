<?php /* Template Name: Testing Page */ ?>

<?php
global $wpdb;
$order_id = 380;
                                    
$table_name_1 = $wpdb->prefix.'woocommerce_order_items';
$table_name_2 = $wpdb->prefix.'woocommerce_order_itemmeta';

$query_1 = "SELECT * FROM $table_name_1 WHERE order_id = $order_id AND order_item_type = 'line_item'";
$result_1 = $wpdb->get_results($query_1);
foreach($result_1 as $r1){
    $order_item_id = $r1->order_item_id;
    $query_2 = "SELECT meta_value FROM $table_name_2 WHERE meta_key = '_qty' AND order_item_id = $order_item_id";
    $ordered_qtn_temp = $wpdb->get_row($query_2);
    $ordered_qtn = $ordered_qtn_temp->meta_value;
    
    $query_3 = "SELECT meta_value FROM $table_name_2 WHERE meta_key = '_product_id' AND order_item_id = $order_item_id";
    $product_id_temp = $wpdb->get_row($query_3);
    $product_id = $product_id_temp->meta_value;
    $available_stock = get_post_meta($product_id, '_stock', true);
    $update_stock = $available_stock+$ordered_qtn;
    update_post_meta($product_id, '_stock', $update_stock);
}
?>