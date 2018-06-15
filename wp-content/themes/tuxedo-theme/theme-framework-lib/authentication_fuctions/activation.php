<?php if(!is_user_logged_in()){ 
    global $wpdb;
    $user_status = 1;
    $key = $_GET['key'];
    $wpdb->update($wpdb->users, array('user_status' => $user_status), array('user_activation_key' => $key));
        echo '<div class="successMsg"><strong>Congratulations</strong><br /><br />Your account has been activated. Click here to <strong><a href="'.get_bloginfo('home').'/signin">Signin</a></strong></div>';
    } 
?>