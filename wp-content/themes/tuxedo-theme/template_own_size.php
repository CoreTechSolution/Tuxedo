<?php /* Template Name: Own Sizes */ ?>
<?php get_header(); ?>
<div id="ownsizeTemplate">
<?php
if(isset($_POST['save_data'])){
    if(is_user_logged_in()){
        global $user_ID;
        if(!update_user_meta( $user_ID, 'born_in', $_POST['born_in'] )){
        	add_user_meta( $user_ID, 'born_in', $_POST['born_in'], true );
        }
        if(!update_user_meta( $user_ID, 'chest', $_POST['chest'] )){
        	add_user_meta( $user_ID, 'chest', $_POST['chest'], true );
        }
        if(!update_user_meta( $user_ID, 'height_ft', $_POST['height_ft'] )){
        	add_user_meta( $user_ID, 'height_ft', $_POST['height_ft'], true );
        }
        if(!update_user_meta( $user_ID, 'height_inch', $_POST['height_inch'] )){
        	add_user_meta( $user_ID, 'height_inch', $_POST['height_inch'], true );
        }
        if(!update_user_meta( $user_ID, 'preferredfit', $_POST['preferredfit'] )){
        	add_user_meta( $user_ID, 'preferredfit', $_POST['preferredfit'], true );
        }
        if(!update_user_meta( $user_ID, 'shoe_size_in', $_POST['shoe_size_in'] )){
        	add_user_meta( $user_ID, 'shoe_size_in', $_POST['shoe_size_in'], true );
        }
        if(!update_user_meta( $user_ID, 'shoulder', $_POST['shoulder'] )){
        	add_user_meta( $user_ID, 'shoulder', $_POST['shoulder'], true );
        }
        if(!update_user_meta( $user_ID, 'stomach', $_POST['stomach'] )){
        	add_user_meta( $user_ID, 'stomach', $_POST['stomach'], true );
        }
        if(!update_user_meta( $user_ID, 'weight_lbs', $_POST['weight_lbs'] )){
        	add_user_meta( $user_ID, 'weight_lbs', $_POST['weight_lbs'], true );
        }
        if(!update_user_meta( $user_ID, 'chest_size_in', $_POST['chest_size_in'] )){
        	add_user_meta( $user_ID, 'chest_size_in', $_POST['chest_size_in'], true );
        }
        if(!update_user_meta( $user_ID, 'chest_length_in', $_POST['chest_length_in'] )){
        	add_user_meta( $user_ID, 'chest_length_in', $_POST['chest_length_in'], true );
        }
        if(!update_user_meta( $user_ID, 'waist_size_in', $_POST['waist_size_in'] )){
        	add_user_meta( $user_ID, 'waist_size_in', $_POST['waist_size_in'], true );
        }
        if(!update_user_meta( $user_ID, 'waist_length_in', $_POST['waist_length_in'] )){
        	add_user_meta( $user_ID, 'waist_length_in', $_POST['waist_length_in'], true );
        }
        if(!update_user_meta( $user_ID, 'neck_size_in', $_POST['neck_size_in'] )){
        	add_user_meta( $user_ID, 'neck_size_in', $_POST['neck_size_in'], true );
        }
        if(!update_user_meta( $user_ID, 'sleeve_size_in', $_POST['sleeve_size_in'] )){
        	add_user_meta( $user_ID, 'sleeve_size_in', $_POST['sleeve_size_in'], true );
        }
        $success = 1;
    } else {
        $_SESSION['born_in'] = $_POST['born_in'];
        $_SESSION['chest'] = $_POST['chest'];
        $_SESSION['height_ft'] = $_POST['height_ft'];
        $_SESSION['height_inch'] = $_POST['height_inch'];
        $_SESSION['preferredfit'] = $_POST['preferredfit'];
        $_SESSION['shoe_size_in'] = $_POST['shoe_size_in'];
        $_SESSION['shoulder'] = $_POST['shoulder'];
        $_SESSION['stomach'] = $_POST['stomach'];
        $_SESSION['weight_lbs'] = $_POST['weight_lbs'];
        $_SESSION['chest_size_in'] = $_POST['chest_size_in'];
        $_SESSION['chest_length_in'] = $_POST['chest_length_in'];
        $_SESSION['waist_size_in'] = $_POST['waist_size_in'];
        $_SESSION['waist_length_in'] = $_POST['waist_length_in'];
        $_SESSION['neck_size_in'] = $_POST['neck_size_in'];
        $_SESSION['sleeve_size_in'] = $_POST['sleeve_size_in'];
        $success = 2;
    }
}
?>
<?php if($success == 1){ ?>
<div class="maincontent">
    <div class="section group">
        <div class="col span_12_of_12">
        <?php echo "<p class='successMsg'>Successfully Updated</p>"; ?>
        </div>
    </div>
</div>
<?php } ?>
<?php if($success == 2){ ?>
<div class="maincontent">
    <div class="section group">
        <div class="col span_12_of_12">
        <?php echo "<p class='successMsg'>Thank you for your basic measurements. <a href='".get_bloginfo('url')."/our-collection/'>Click Here</a> to continue shoping.</p>"; ?>
        </div>
    </div>
</div>
<?php } ?>
	<form method="post" action="">
        <div class="maincontent">
    	    <div class="section group">
    	        <div class="col span_3_of_12"> 
                    <div>
                        <div class="labelClass1">JACKET SIZE</div>
                        <div>Enter chest then length<br />(e.g. 40 / R)</div>
                        <div class="labelClass">CHEST</div>
                        <div>
                            <select name="chest_size_in">
                                <option value="">CHEST</option>
                                <?php for($i=34; $i<=58; $i = $i+2){ ?>
                                <option value="<?php echo $i; ?>" <?php if(get_user_meta($user_ID, 'chest_size_in', true) == $i){ echo 'selected = "selected"'; } ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div><br />
                        <div class="labelClass">LENGTH</div>
                        <div>
                            <select name="chest_length_in">
                                <option value="">LENGTH</option>
                                <option value="XS" <?php if(get_user_meta($user_ID, 'chest_length_in', true) == 'XS'){ echo 'selected = "selected"'; } ?>>Extra Short</option>
                                <option value="S" <?php if(get_user_meta($user_ID, 'chest_length_in', true) == 'S'){ echo 'selected = "selected"'; } ?>>Short</option>
                                <option value="R" <?php if(get_user_meta($user_ID, 'chest_length_in', true) == 'R'){ echo 'selected = "selected"'; } ?>>Regular</option>
                                <option value="L" <?php if(get_user_meta($user_ID, 'chest_length_in', true) == 'L'){ echo 'selected = "selected"'; } ?>>Long</option>
                                <option value="XL" <?php if(get_user_meta($user_ID, 'chest_length_in', true) == 'XL'){ echo 'selected = "selected"'; } ?>>Extra Long</option>
                            </select>
                        </div>
                    </div>                         
    	        </div>
                <div class="col span_3_of_12"> 
                    <div>
                        <div class="labelClass1">PANT SIZE</div>
                        <div>Enter waist then inseam length<br />(e.g. 34 / 32)</div>
                        <div class="labelClass">WAIST</div>
                        <div>
                            <select name="waist_size_in">
                                <option value="">WAIST</option>
                                <?php for($i=28; $i<=54; $i = $i+2){ ?>
                                <option value="<?php echo $i; ?>" <?php if(get_user_meta($user_ID, 'waist_size_in', true) == $i){ echo 'selected = "selected"'; } ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div><br />
                        <div class="labelClass">LENGTH</div>
                        <div>
                            <select name="waist_length_in">
                                <option value="">LENGTH</option>
                                <?php for($i=26; $i<=38; $i = $i+2){ ?>
                                <option value="<?php echo $i; ?>" <?php if(get_user_meta($user_ID, 'waist_length_in', true) == $i){ echo 'selected = "selected"'; } ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>                         
    	        </div>
                <div class="col span_3_of_12"> 
                    <div>
                        <div class="labelClass1">SHIRT SIZE</div>
                        <div>Enter neck then sleeve<br />(e.g. 16 / 34)</div>
                        <div class="labelClass">NECK</div>
                        <div>
                            <select name="neck_size_in">
                                <option value="">NECK</option>
                                <?php for($i=14; $i<=20; $i++){ ?>
                                <option value="<?php echo $i; ?>" <?php if(get_user_meta($user_ID, 'neck_size_in', true) == $i){ echo 'selected = "selected"'; } ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div><br />
                        <div class="labelClass">SLEEVE</div>
                        <div>
                            <select name="sleeve_size_in">
                                <option value="">SLEEVE</option>
                                <?php for($i=31; $i<=39; $i++){ ?>
                                <option value="<?php echo $i; ?>" <?php if(get_user_meta($user_ID, 'sleeve_size_in', true) == $i){ echo 'selected = "selected"'; } ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>                         
    	        </div>
                <div class="col span_3_of_12"> 
                    <div>
                        <div class="labelClass1">PREFERRED FIT</div>
                        <div>
                            <div class="radioButtonGroup"><input type="radio" name="preferredfit" value="Classic" <?php if($_POST['preferredfit'] == 'Classic'){ echo 'checked = "checked"'; } ?> /> Classic</div>
                            <div class="radioButtonGroup"><input type="radio" name="preferredfit" value="Slim" <?php if($_POST['preferredfit'] == 'Slim'){ echo 'checked = "checked"'; } ?> /> Slim</div>
                        </div><br />
                        <div class="labelClass">SHOE SIZE</div>
                        <div>
                            <select name="shoe_size_in">
                                <option value="">SHOE SIZE</option>
                                <?php for($i=6; $i<=11; $i++){ ?>
                                <option value="<?php echo $i; ?>" <?php if($_POST['shoe_size'] == $i){ echo 'selected = "selected"'; } ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>                         
    	        </div>
    	    </div>
            <div class="section group">
                <div class="col span_12_of_12">
                    <div style="text-align: right;">
                        <input type="hidden" name="born_in" value="<?php echo $_POST['born_in']; ?>" />
                        <input type="hidden" name="chest" value="<?php echo $_POST['chest']; ?>" />
                        <input type="hidden" name="height_ft" value="<?php echo $_POST['height_ft']; ?>" />
                        <input type="hidden" name="height_inch" value="<?php echo $_POST['height_inch']; ?>" />
                        <input type="hidden" name="shoulder" value="<?php echo $_POST['shoulder']; ?>" />
                        <input type="hidden" name="stomach" value="<?php echo $_POST['stomach']; ?>" />
                        <input type="hidden" name="weight_lbs" value="<?php echo $_POST['weight_lbs']; ?>" />
                        <input type="submit" name="save_data" value="SUBMIT" />
                    </div>
                </div>
            </div>
    	</div>
    </form>
</div>
<?php get_footer(); ?>