<?php /* Template Name: Join */ ?>
<?php get_header(); ?>
<div id="innerContent">
	<div class="maincontent">
	    <div class="section group">
	        <div class="col span_12_of_12">
                <?php
                    $key = decripted($_GET['key']);
                    $temp_param = explode('&', $key);
                    
                    $param = explode('=', $temp_param[0]);
                    $groomsmen_name = $param[1];
                                        
                    $param = explode('=', $temp_param[1]);
                    $email_address = $param[1];
                    
                    $param = explode('=', $temp_param[2]);
                    $invited_by = $param[1];
                    
                    $param = explode('=', $temp_param[3]);
                    $productid = $param[1];
                    
                    $param = explode('=', $temp_param[4]);
                    $color = $param[1];
                    
                    $param = explode('=', $temp_param[5]);
                    $size = $param[1];
                    
                    $new_user_id = wp_insert_user(
                        array(
                            'user_login'		=> $email_address,
                            'user_pass'			=> '123abc',
                            'user_email'		=> $email_address,
                            'first_name'		=> '',
                            'last_name'         => '',
                            'display_name'      => $groomsmen_name,
                            'role'              => 'subscriber',
                            'user_registered'	=> date('Y-m-d H:i:s')
                        )
                    );
                    add_user_meta($new_user_id,'invited_by', $invited_by);
                    global $wpdb;

                    $user_status = 1;
                    
                    $wpdb->update($wpdb->users, array('user_status' => $user_status), array('user_email' => $email_address));
                    
                    $login_data = array();
            		$login_data['user_login'] = $email_address;
            		$login_data['user_password'] = '123abc';
            		$login_data['remember'] = 'false';
                    $user_verify = wp_signon( $login_data, true );
                    
                    if ( is_wp_error($user_verify) ){
                        $user_verify->get_error_message(); 
                        $errorCode = 1;
                    } else {
                        global $user_ID;
                        $product = wc_get_product( $productid );
                        $available_variations = $product->get_available_variations();
                        foreach($available_variations as $variation){
                            //print_r($variation);
                            //print_r($variation['attributes']);
                            //echo $variation['attributes']['attribute_pa_color'];
                            
                            if(($variation['attributes']['attribute_pa_color'] == $color) && ($variation['attributes']['attribute_pa_size'] == $size)){
                                $variation_id = $variation['variation_id'];
                                $attr_array = array();
                                $attr_array['color'] = $color;
                                $attr_array['size'] = $size;
                                global $woocommerce;
                                $woocommerce->cart->add_to_cart($productid, 1, $variation_id, $attr_array, null);
                                header('Location: '.get_bloginfo('home').'/cart/');
                            }
                        }
                    }
                ?>
            </div>
	    </div>
	</div>
</div>
<?php get_footer(); ?>