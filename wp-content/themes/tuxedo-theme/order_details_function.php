<?php
$order_id = $_GET['oid'];
?>
<style>
.jagsAdminPanel .wrapper{
    background: #FFFFFF;
    padding: 15px;
}
.jagsAdminPanel td{
    vertical-align: top;
}
</style>
<h2>Rental Orders Details</h2>
<div class="jagsAdminPanel">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="postbox-container-1" class="postbox-container">
                <div class="wrapper">
                
                </div>
            </div>
            <div id="postbox-container-2" class="postbox-container">
                <div class="wrapper">
                <?php get_template_part('order_parts/order_details'); ?>
                </div><br />
                <div class="wrapper">
                <?php get_template_part('order_parts/order_details'); ?>
                </div>
            </div>
        </div>
    </div>
</div>