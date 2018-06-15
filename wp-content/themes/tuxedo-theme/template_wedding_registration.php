<?php /* Template Name: Wedding Registration */ ?>
<?php get_header(); ?>
<?php if(is_user_logged_in()){ ?>
<?php global $user_ID; ?>
<div id="innerContent">
	<div class="maincontent">
	    <div class="section group">
            <div class="col span_3_of_12">
                 <?php get_template_part('theme-framework-lib/dashboard_functions/dashboard_navmenu'); ?>
            </div>
            <div class="col span_9_of_12">
                <h2>Wedding Registration</h2>
                <?php
                    if(isset($_POST['send_invite'])){
                        $args = array(
                            'post_type' => 'wedding_reg',
                            'post_title' => 'Wedding Registration By - '.get_the_author_meta('display_name', $user_ID),
                            'post_status' => 'publish',
                            'post_content' => '',
                            'post_date' => date('Y-m-d H:i:s'),
                        );
                        
                        $new_regisration_id = wp_insert_post($args);
                        
                        foreach($_POST as $k => $v) {
                            add_post_meta($new_regisration_id, $k, $v);
                        }
                        
                        $groomsmen_name = get_post_meta($new_regisration_id, 'groomsmen_name', true);
                        $groomsmen_email_address = get_post_meta($new_regisration_id, 'groomsmen_email_address', true);
                        
                        $groom_name = get_post_meta($new_regisration_id, 'groom_name', true);
                        $groom_email_address = get_post_meta($new_regisration_id, 'groom_email_address', true);
                        
                        array_push($groomsmen_name, $groom_name);
                        array_push($groomsmen_email_address, $groom_email_address);
                        
                        if(!empty($groomsmen_email_address)){
                            for($i=0; $i<count($groomsmen_email_address); $i++){
                                $param = "groomsmen_name=".$groomsmen_name[$i]."&email=".$groomsmen_email_address[$i]."&invited_by=".$user_ID."&productid=".$_POST['productid']."&color=".$_POST['product_color']."&size=".$_POST['product_size']."&regid=".$new_regisration_id;
                                $from = get_option('admin_email');
                                $headers = 'From: '.$from . "\r\n";
                                $headers .= "MIME-Version: 1.0\r\n";
                                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                                $subject = "Tuxedo : Invitation";
                                $msg = "Joining Link :<a href='".get_site_url()."/join?key=".encripted($param)."'>".get_site_url()."/join?key=".encripted($param)."</a>";
                                wp_mail( $groomsmen_email_address[$i], $subject, $msg, $headers );   
                            }
                        }
                    }
                    
                    if(isset($_POST['pay_now'])){
                        $args = array(
                            'post_type' => 'wedding_reg',
                            'post_title' => 'Wedding Registration By - '.get_the_author_meta('display_name', $user_ID),
                            'post_status' => 'publish',
                            'post_content' => '',
                            'post_date' => date('Y-m-d H:i:s'),
                        );
                        
                        $new_regisration_id = wp_insert_post($args);
                        
                        foreach($_POST as $k => $v) {
                            add_post_meta($new_regisration_id, $k, $v);
                        }
                        
                        $groomsmen_name = get_post_meta($new_regisration_id, 'groomsmen_name', true);
                        $groomsmen_email_address = get_post_meta($new_regisration_id, 'groomsmen_email_address', true);
                        
                        $groom_name = get_post_meta($new_regisration_id, 'groom_name', true);
                        $groom_email_address = get_post_meta($new_regisration_id, 'groom_email_address', true);
                        
                        array_push($groomsmen_name, $groom_name);
                        array_push($groomsmen_email_address, $groom_email_address);
                        
                        $count = count($groomsmen_email_address);
                        
                        $_SESSION['email_address'] = $_POST['email_address'];
                        $_SESSION['first_name'] = $_POST['first_name'];
                        $_SESSION['last_name'] = $_POST['last_name'];
                        $_SESSION['invited_by'] = $user_ID;
                        $_SESSION['productid'] = $_POST['productid'];
                        $_SESSION['product_color'] = $_POST['product_color'];
                        $_SESSION['product_size'] = $_POST['product_size'];
                        
                        $productid = $_POST['productid'];
                        
                        $product = wc_get_product( $productid );
                        $available_variations = $product->get_available_variations();
                        foreach($available_variations as $variation){
                            if(($variation['attributes']['attribute_pa_color'] == $_POST['product_color']) && ($variation['attributes']['attribute_pa_size'] == $_POST['product_size'])){
                                $variation_id = $variation['variation_id'];
                                $attr_array = array();
                                $attr_array['color'] = $_POST['product_color'];
                                $attr_array['size'] = $_POST['product_size'];
                                global $woocommerce;
                                $woocommerce->cart->add_to_cart($productid, $count, $variation_id, $attr_array, null);
                                header('Location: '.get_bloginfo('home').'/cart/');
                            }
                        }
                    }
                ?>
                <form action="" method="post">
                    <?php if(!empty($_GET['productid'])){ ?>
                    <?php $productid = $_GET['productid']; ?>
                    <div class="section group">
                        <div class="col span_12_of_12">
                            <div class="singleProduct">
                                <div class="section group">
                                    <div class="col span_4_of_12">
                                        <div>
                                            <?php echo get_featured_image($productid, 'thumb'); ?>
                                        </div>
                                    </div>
                                    <div class="col span_4_of_12">
                                        <div>
                                            <table>
                                                <tr>
                                                    <td class="attr_label">Price : </td>
                                                    <td><?php echo get_woocommerce_currency_symbol( $currency ); ?> <?php echo display_product_price($productid); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="attr_label">Color : </td>
                                                    <td>
                                                        <select name="product_color">
                                                        <?php
                                                        $colors = get_the_terms( $productid, 'pa_color');
 
                                                        foreach ( $colors as $color ) {
                                                        ?>
                                                        <option value="<?php echo $color->slug; ?>"><?php echo ucfirst($color->name); ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="attr_label">Size : </td>
                                                    <td>
                                                        <select name="product_size">
                                                        <?php
                                                        $sizes = get_the_terms( $productid, 'pa_size');
 
                                                        foreach ( $sizes as $size ) {
                                                        ?>
                                                        <option value="<?php echo $size->slug; ?>"><?php echo ucfirst($size->name); ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="attr_label">Components : </td>
                                                    <td>
                                                        <?php $product_components = get_field('product_components', $productid); ?>
                                                        <?php if(!empty($product_components)){ ?>
                                                        <?php echo ucwords(implode(', ', get_field('product_components', $productid))); ?>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col span_4_of_12"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                        <div class="section group">
                            <div class="col span_12_of_12">
                                <p class="infoMsg">Please select a product</p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(!empty($_GET['productid'])){ ?>
                    <br /><h3>Wedding Information</h3>
                    <div class="section group">
                        <div class="col span_4_of_12">
                            <div class="commonForm">
                                <label>Wedding Date</label>
                                <input id="datepicker1" type="text" name="wedding_date" />
                            </div>
                        </div>
                        <div class="col span_4_of_12">
                            <div class="commonForm">
                                <label>Wedding Time</label>
                                <input id="timepicker1" type="text" name="wedding_time" />
                            </div>
                        </div>
                        <div class="col span_4_of_12">
                            <div class="commonForm">
                                <label>Wedding Location</label>
                                <input type="text" name="wedding_locatioin" />
                            </div>
                        </div>
                    </div>
                    <br /><h3>Bride’s Information</h3>
                    <div class="section group">
                        <div class="col span_4_of_12">
                            <div class="commonForm">
                                <label>Bride’s Name</label>
                                <input type="text" name="bride_name" />
                            </div>
                        </div>
                        <div class="col span_4_of_12">
                            <div class="commonForm">
                                <label>Bride’s Email Address</label>
                                <input type="text" name="bride_email_address" />
                            </div>
                        </div>
                        <div class="col span_4_of_12">
                            <div class="commonForm">
                                <label>Bride’s Address</label>
                                <input type="text" name="bride_address" />
                            </div>
                        </div>
                    </div>
                    <div class="section group">
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>City</label>
                                <input type="text" name="bride_city" />
                            </div>
                        </div>
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>State</label>
                                <input type="text" name="bride_state" />
                            </div>
                        </div>
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>ZIP Code</label>
                                <input type="text" name="bride_zip_code" />
                            </div>
                        </div>
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>Bride’s Phone Number</label>
                                <input type="text" name="bride_phone_number" />
                            </div>
                        </div>
                    </div>
                    <br /><h3>Groom’s Information</h3>
                    <div class="section group">
                        <div class="col span_4_of_12">
                            <div class="commonForm">
                                <label>Groom’s Name</label>
                                <input type="text" name="groom_name" />
                            </div>
                        </div>
                        <div class="col span_4_of_12">
                            <div class="commonForm">
                                <label>Groom’s Email Address</label>
                                <input type="text" name="groom_email_address" />
                            </div>
                        </div>
                        <div class="col span_4_of_12">
                            <div class="commonForm">
                                <label>Groom’s Address</label>
                                <input type="text" name="groom_address" />
                            </div>
                        </div>
                    </div>
                    <div class="section group">
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>City</label>
                                <input type="text" name="groom_city" />
                            </div>
                        </div>
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>State</label>
                                <input type="text" name="groom_state" />
                            </div>
                        </div>
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>ZIP Code</label>
                                <input type="text" name="groom_zip_code" />
                            </div>
                        </div>
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>Groom’s Phone Number</label>
                                <input type="text" name="groom_phone_number" />
                            </div>
                        </div>
                    </div>
                    <br /><h3>Future Mailing Information</h3>
                    <div class="section group">
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>Mailing Address</label>
                                <input type="text" name="future_communication_address" />
                            </div>
                        </div>
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>City</label>
                                <input type="text" name="future_communication_city" />
                            </div>
                        </div>
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>State</label>
                                <input type="text" name="future_communication_state" />
                            </div>
                        </div>
                        <div class="col span_3_of_12">
                            <div class="commonForm">
                                <label>ZIP Code</label>
                                <input type="text" name="future_communication_zip_code" />
                            </div>
                        </div>
                    </div>
                    <br /><h3>Groomsmen’s Information</h3>
                    <div class="input_fields_wrap">
                        <div class="section group">
                            <div class="col span_4_of_12">
                                <div class="commonForm">
                                    <label>Groomsmen’s Name</label>
                                    <input type="text" name="groomsmen_name[]" />
                                </div>
                            </div>
                            <div class="col span_4_of_12">
                                <div class="commonForm">
                                    <label>Groomsmen’s Email Address</label>
                                    <input type="text" name="groomsmen_email_address[]" />
                                </div>
                            </div>
                            <div class="col span_4_of_12">
                                <div class="commonForm">
                                    <label>Groomsmen’s Phone Number</label>
                                    <input type="text" name="groomsmen_phone_number[]" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section group">
                        <div class="col span_12_of_12">
                            <input type="hidden" name="productid" value="<?php echo $_GET['productid']; ?>" />
                            <div style="text-align: right;"><button class="add_field_button">Add Grooms Men</button></div>
                            <div style="text-align: right; margin-top: 30px;"><input type="submit" name="send_invite" value="Invite" /> <span class="oblic">/</span> <input type="submit" name="pay_now" value="Pay Now" /></div>
                        </div>
                    </div>
                    <?php } ?>
                </form>
            </div>
	    </div>
	</div>
</div>
<script>
jQuery(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = jQuery(".input_fields_wrap"); //Fields wrapper
    var add_button      = jQuery(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    jQuery(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var append_form = '<div><div class="section group"><div class="col span_4_of_12"><div class="commonForm"><label>Groomsmen’s Name</label><input type="text" name="groomsmen_name[]" /></div></div><div class="col span_4_of_12"><div class="commonForm"><label>Groomsmen’s Email Address</label><input type="text" name="groomsmen_email_address[]" /></div></div><div class="col span_4_of_12"><div class="commonForm"><label>Groomsmen’s Phone Number</label><input type="text" name="groomsmen_phone_number[]" /></div></div></div><a href="#" class="remove_field">Remove</a></div>'
            jQuery(wrapper).append(append_form); //add input box
        }
    });
    
    jQuery(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); jQuery(this).parent('div').remove(); x--;
    })
});
</script>
<?php } else { header('Location: '.get_bloginfo('home').'/sign-in'); } ?>
<?php get_footer(); ?>