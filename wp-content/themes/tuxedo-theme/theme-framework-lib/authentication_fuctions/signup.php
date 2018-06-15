<?php ob_start(); ?>
<?php
if(isset($_POST['register'])){
    global $wpdb;
    if(email_exists($_POST['email_address'])){
        $errorCode = 1;
    } else {
        $new_user_id = wp_insert_user(
            array(
                'user_login'		=> $_POST['email_address'],
                'user_pass'			=> $_POST['pwd1'],
                'user_email'		=> $_POST['email_address'],
                'first_name'		=> $_POST['fname'],
                'last_name'         => $_POST['lname'],
                'role'              => 'customer',
                'user_registered'	=> date('Y-m-d H:i:s')
            )
        );
        add_user_meta($new_user_id,'phone', $_POST['phone']);
        add_user_meta($new_user_id,'city', $_POST['city']);
        add_user_meta($new_user_id,'state', $_POST['state']);
        add_user_meta($new_user_id,'zipcode', $_POST['zipcode']);
        add_user_meta($new_user_id,'country', $_POST['country']);
        
        if(!empty($_SESSION)){
            foreach ($_SESSION as $key=>$val){
                if(!update_user_meta( $new_user_id, $key, $val )){
                	add_user_meta( $new_user_id, $key, $val, true );
                }
            }
        }
        
        $use_woocommerce = 1;
        
        if($use_woocommerce == 1){
            // for billing
            add_user_meta( $new_user_id, 'billing_first_name', $_POST['fname'] );
			add_user_meta( $new_user_id, 'billing_last_name', $_POST['lname'] );
            add_user_meta( $new_user_id, 'billing_company', '' );
			add_user_meta( $new_user_id, 'billing_address_1', '' );
			add_user_meta( $new_user_id, 'billing_address_2', '' );
            add_user_meta( $new_user_id, 'billing_phone', $_POST['phone'] );
			add_user_meta( $new_user_id, 'billing_city', $_POST['city'] );
			add_user_meta( $new_user_id, 'billing_state', $_POST['state'] );
			add_user_meta( $new_user_id, 'billing_postcode', $_POST['zipcode'] );
			add_user_meta( $new_user_id, 'billing_country', $_POST['country'] );
            
            // for Shipping
            add_user_meta( $new_user_id, 'shipping_first_name', $_POST['fname'] );
			add_user_meta( $new_user_id, 'shipping_last_name', $_POST['lname'] );
            add_user_meta( $new_user_id, 'shipping_company', '' );
			add_user_meta( $new_user_id, 'shipping_address_1', '' );
			add_user_meta( $new_user_id, 'shipping_address_2', '' );
            add_user_meta( $new_user_id, 'shipping_phone', $_POST['phone'] );
			add_user_meta( $new_user_id, 'shipping_city', $_POST['city'] );
			add_user_meta( $new_user_id, 'shipping_state', $_POST['state'] );
			add_user_meta( $new_user_id, 'shipping_postcode', $_POST['zipcode'] );
			add_user_meta( $new_user_id, 'shipping_country', $_POST['country'] );
        } 
        
        $key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $_POST['email_address']));
        if(empty($key)) {
    	    $key = wp_generate_password(20, false);
    		$wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $_POST['email_address']));
        }
        // mail to user
        $to1 = $_POST['email_address'];
    	$from1 = "no-reply@".$_SERVER['HTTP_HOST'];
    	$headers1 = 'From: '.$from1. "\r\n";
        $headers1 .= "Reply-To: ".get_option('admin_email')."\r\n";
        $headers1 .= "MIME-Version: 1.0\n"; 
        $headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    	$subject1 = "Activate your account"; 
        if($_POST['fromcheckout'] == 1){
            $msg1 = 'Welcome to Tuxedo. Please click on the link to complete the registration process<br><br>Activation Link :<a href="'.get_site_url().'/activation?key='.$key.'&fc=1" target="_blank">'.get_site_url().'/activation?key='.$key.'</a><br><br>Regards,<br>'.$admin_name;
        } else {
            $msg1 = 'Welcome to Tuxedo. Please click on the link to complete the registration process<br><br>Activation Link :<a href="'.get_site_url().'/activation?key='.$key.'" target="_blank">'.get_site_url().'/activation?key='.$key.'</a><br><br>Regards,<br>'.$admin_name;
        }
    	wp_mail( $to1, $subject1, $msg1, $headers1 );
        // Mail to admin
        $admin_name = get_bloginfo('name');
        $to = get_option('admin_email');
    	$from = "no-reply@".$_SERVER['HTTP_HOST'];
    	$headers = 'From: '.$from . "\r\n";
        $headers .= "Reply-To: ".get_option('admin_email')."\r\n";
        $headers .= "MIME-Version: 1.0\n"; 
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    	$subject = "New User registered"; 
        $msg ='<strong>New User registered</strong><br><br><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="45%"><strong>Name : </strong></td>
                    <td>'.$_POST['fname'].' '.$_POST['lname'].'</td>
                  </tr>
                  <tr>
                    <td><strong>Phone Number : </strong></td>
                    <td>'.$_POST['phone'].'</td>
                  </tr>
                  <tr>
                    <td><strong>Email : </strong></td>
                    <td>'.$_POST['email_address'].'</td>
                  </tr>
                  <tr>
                    <td><strong>City : </strong></td>
                    <td>'.$_POST['city'].'</td>
                  </tr>
                  <tr>
                    <td><strong>State : </strong></td>
                    <td>'.$_POST['state'].'</td>
                  </tr>
                  <tr>
                    <td><strong>ZIP : </strong></td>
                    <td>'.$_POST['zipcode'].'</td>
                  </tr>
                  <tr>
                    <td><strong>Country : </strong></td>
                    <td>'.$_POST['country'].'</td>
                  </tr>
                </table><br><br>Regards,<br>'.$admin_name;
    	wp_mail( $to, $subject, $msg, $headers );
        header("Location: ".get_bloginfo('home')."/thank-you/?action=".encripted('registration'));
    }
}
?>
<div class="commonForm">
    <h2 style="text-align: center;">Signup</h2>
    <?php if($errorCode == 1){ ?>
        <div class="errorMsg">Email address already exists. Please select different valid email address.</div>
    <?php }?>
    <form id="forms" action="" method="post">
        <div>
            <label>First Name <span>*</span></label>
            <input type="text" name="fname" />
        </div>
        <div>
            <label>Last Name <span>*</span></label>
            <input type="text" name="lname" />
        </div>
        <div>
            <label>Email Address <span>*</span></label>
            <input type="text" name="email_address" />
        </div>
        <div>
            <label>Phone</label>
            <input type="text" name="phone" />
        </div>
        <div>
            <label>Password <span>*</span></label>
            <input id="pwd1" type="password" name="pwd1" />
        </div>
        <div>
            <label>Confirm Password <span>*</span></label>
            <input id="pwd2" type="password" name="pwd2" />
        </div>
        <div>
            <label>Country <span>*</span></label>
            <select class="country" name="country">
                <option>Select Country</option>
                <?php 
                    $country_arr = WC()->countries->get_allowed_countries();
                    foreach($country_arr as $key=>$data) {
                ?>
                <option value="<?php echo $key; ?>"><?php echo $data; ?></option>
                <?php } ?>
            </select>
        </div>
        <div id="response"></div>
        <div>
            <label>City <span>*</span></label>
            <input type="text" name="city" />
        </div>
        <div>
            <label>Postcode / Zip</label>
            <input type="text" name="zipcode" />
        </div>
        <!-- 
        <div>
            <label>Country <span>*</span></label>
            <select name="country">
                <option value="">Select Country</option>
                <?php //$xml=simplexml_load_file(get_template_directory()."/theme-framework-lib/authentication_fuctions/country.xml") or die("Error: Cannot create object"); ?>
                <?php //foreach($xml->children() as $country) { ?>
                <option value="<?php //echo $country->iso_code; ?>"><?php //echo $country->name; ?></option>
                <?php // } ?>
            </select>
        </div>
         -->
         
        <div>
            <input type="submit" name="register" value="Signup" />
        </div>
    </form>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery("select.country").change(function(){
        var selectedCountry = jQuery(".country option:selected").val();
        jQuery.ajax({
            type: "POST",
            url: "<?php bloginfo('url'); ?>/get-states",
            data: { country : selectedCountry } 
        }).done(function(data){
            jQuery("#response").html(data);
        });
    });
});
</script>
<script>
jQuery(document).ready(function(){
    jQuery('#forms').validate({
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email_address: {
                required: true,
                email: true
            },
            pwd1:{
                required: true,
                minlength: 8
            },
            pwd2:{
                required: true,
                minlength: 8,
                equalTo: '#pwd1'
            },
            country:{
                required: true
            },
            city:{
                required: true
            }
        },
        messages: {
            
        }
    })
});
</script>