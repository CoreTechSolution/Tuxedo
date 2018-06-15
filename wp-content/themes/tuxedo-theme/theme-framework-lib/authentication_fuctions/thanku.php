<?php
$action = decripted($_GET['action']);
	if($action == 'registration'){
		echo "<p class='successMsg'>Thankyou for registration. Please check your email to activate your account.</p>";
	}
	if($action == 'forgotpassword'){
		echo "<p class='successMsg'>Please check your registered email and click on the reset password link.</p>";
	}
	if($action == 'resetpassword'){
?>
	<p class='successMsg'>Your password updated successfully. Please click here to <a class="alink" href="<?php bloginfo('home'); ?>/signin">Login</a>.</p>
<?php } ?>