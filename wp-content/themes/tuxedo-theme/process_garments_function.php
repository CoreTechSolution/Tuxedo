<?php
if(isset($_POST['update_process'])){
    global $wpdb;
    $barcode = explode('-', $_POST['barcode']);
    $product_id = $barcode[1];
    $order_id = $barcode[0];
    $returned_product_status = $_POST['returned_product_status'];
    
    if($returned_product_status == 'dry_cleaning'){
        $status = 'Dry Cleaning';
    }
    if($returned_product_status == 'add_to_invenroty'){
        $status = 'Add to Inventory';
        //$product = wc_get_product( $product_id );
        //print_r($product);
        $order = new WC_Order( $order_id );
        $items = $order->get_items();
        foreach ( $items as $item ) {
            $ordered_product_id = $item['product_id'];
            if($ordered_product_id == $product_id){
                $ordered_product_qty = $item['qty'];
                $product_variation_id = $item['variation_id'];
                if(!empty($product_variation_id)){
                    $current_stock = get_post_meta( $product_variation_id, '_stock', true );
                    $increased_stock = $current_stock+$ordered_product_qty;
                    update_post_meta( $product_id, '_stock', $increased_stock );
                } else {
                    $current_stock = get_post_meta( $product_id, '_stock', true );
                    $increased_stock = $current_stock+$ordered_product_qty;
                    update_post_meta( $product_id, '_stock', $increased_stock );
                }
            }
        }
    }
    update_post_meta($product_id, 'returned_product_status', $status);
}
?>
<div class="wrap">
    <h2>Process Returned Garments</h2>
    <form method="post" action="">
        <table class="wp-list-table widefat fixed pages">
            <tr>
                <td style="width: 150px;">
                    <label><strong>Barcode</strong></label>
                </td>
                <td><input type="text" name="barcode" /></td>
            </tr>
            <tr>
                <td>
                    <label><strong>Status</strong></label>
                </td>
                <td>
                    <select name="returned_product_status">
                        <option value="dry_cleaning">Dry Cleaning</option>
                        <option value="add_to_invenroty">Add to Inventory</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input class="button-primary" type="submit" name="update_process" value="Update" /></td>
            </tr>
        </table>
    </form>
</div>