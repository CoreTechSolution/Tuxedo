<?php 
global $user_ID;
if(isset($_POST['update'])){
    if(!empty($_POST['pwd1']) && !empty($_POST['pwd2'])){
        if($_POST['pwd1'] == $_POST['pwd2']){
            wp_set_password( $_POST['pwd1'], $user_ID );
        }
    }
    
    if($_FILES["profile_pic"]["error"] == 0) {
        echo ABSPATH . "wp-admin" . '/includes/image.php';
        require_once(ABSPATH . "wp-admin" . '/includes/image.php'); 
        require_once(ABSPATH . "wp-admin" . '/includes/file.php'); 
        require_once(ABSPATH . "wp-admin" . '/includes/media.php');
        
        $image = array();
        $image = $_FILES["profile_pic"]; 
        if ($image['size']) {     // if it is an image     
            if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {       
                $override = array('test_form' => false);       // save the file, and store an array, containing its location in $file       
                $file = wp_handle_upload( $image, $override );
                $attachment = array(
                    'post_title' => $image['name'],
                    'post_content' => '',
                    'post_type' => 'attachment',
                    'post_mime_type' => $image['type'],
                    'guid' => $file['url']
                ); 
                $attach_id = wp_insert_attachment( $attachment, $file[ 'file' ]);
                $attach_data = wp_generate_attachment_metadata( $attach_id, $file['file'] );
                wp_update_attachment_metadata( $attach_id, $attach_data );
                 
                update_user_meta($user_ID, 'profile_pic', $attach_id);     
            } else {       // Not an image.        
                // Die and let the user know that they made a mistake.       
                wp_die('No image was uploaded.');     
                }   
            }
    }
    
    $display_name = $_POST['fname'].' '.$_POST['lname'];
    wp_update_user(array('ID' => $user_ID, 'display_name' => $display_name));
    
    update_user_meta($user_ID, 'first_name', $_POST['fname']);
    update_user_meta($user_ID, 'last_name', $_POST['lname']);
    update_user_meta($user_ID, 'phone', $_POST['phone']);
    update_user_meta($user_ID, 'city', $_POST['city']);
    update_user_meta($user_ID, 'state', $_POST['state']);
    update_user_meta($user_ID, 'zipcode', $_POST['zipcode']);
    update_user_meta($user_ID, 'country', $_POST['country']);
    header('Location: '.get_bloginfo('url').'/my-profile');
}

?>
<div class="commonForm1">
    <form id="joinus" action="" method="post" enctype="multipart/form-data">
        <div class="section group">
            <div class="col span_1_of_2">
                <label>First Name <span>*</span></label>
                <input type="text" name="fname" value="<?php echo get_user_meta($user_ID, 'first_name', true); ?>" />
            </div>
            <div class="col span_1_of_2">
                <label>Last Name <span>*</span></label>
                <input type="text" name="lname" value="<?php echo get_user_meta($user_ID, 'last_name', true); ?>" />
            </div>
        </div>
        <div class="section group">
            <div class="col span_1_of_2">
                <label>Email Address</label>
                <input type="text" readonly="readonly" name="email_address" value="<?php echo get_the_author_meta('user_email', $user_ID); ?>" />
            </div>
            <div class="col span_1_of_2">
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo get_user_meta($user_ID, 'phone', true); ?>" />
            </div>
        </div>
        <div class="section group">
            <div class="col span_1_of_2">
                <label>Password <span>*</span></label>
                <input id="pwd1" type="password" name="pwd1" />
            </div>
            <div class="col span_1_of_2">
                <label>Confirm Password <span>*</span></label>
                <input id="pwd2" type="password" name="pwd2" />
            </div>
        </div>
        <div class="section group">
            <div class="col span_1_of_2">
                <label>City <span>*</span></label>
                <input type="text" name="city" value="<?php echo get_user_meta($user_ID, 'city', true); ?>" />
            </div>
            <div class="col span_1_of_2">
                <label>State/Province/County</label>
                <input type="text" name="state" value="<?php echo get_user_meta($user_ID, 'state', true); ?>" />
            </div>
        </div>
        <div class="section group">
            <div class="col span_1_of_2">
                <label>Postcode / Zip</label>
                <input type="text" name="zipcode" value="<?php echo get_user_meta($user_ID, 'zipcode', true); ?>" />
            </div>
            <div class="col span_1_of_2">
                <label>Country <span>*</span></label>
                <select name="country">
                    <option value="">Select Country</option>
                    <?php $xml=simplexml_load_file(get_template_directory()."/theme-framework-lib/authentication_fuctions/country.xml") or die("Error: Cannot create object"); ?>
                    <?php foreach($xml->children() as $country) { ?>
                    <option value="<?php echo $country->iso_code; ?>" <?php if(get_user_meta($user_ID, 'country', true) == $country->iso_code){echo 'selected="selected"';} ?>><?php echo $country->name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="section group">
            <div class="col span_1_of_2">
                <label>Profile Picture</label>
                <input type="file" name="profile_pic" />
            </div>
            <div class="col span_1_of_2">
                <label style="padding-top: 15px;"></label>
                <input type="submit" name="update" value="Update" />
            </div>
        </div>
    </form>
</div>
<script>
jQuery(document).ready(function(){
    jQuery('#joinus').validate({
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