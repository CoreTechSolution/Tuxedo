<?php /* Template Name: Measure Myself Final */ ?>
<?php get_header(); ?>
<div class="measureMyself innerContent">
    <div class="maincontent">
        <div class="section group">
            <div class="col span_12_of_12">
                <h1 style="text-align: center;">Measure Yourself</h1>
                <p>If you know any of your sizes, go ahead and enter them below. If you're unsure, simply leave them blank and hit 'Submit' to complete the process.</p>
            </div>
        </div>
        <?php
        if(isset($_POST['submit'])){
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
                
                if(!update_user_meta( $user_ID, 'my_neck_size', $_POST['neck_size'] )){
                	add_user_meta( $user_ID, 'my_neck_size', $_POST['neck_size'], true );
                }
                if(!update_user_meta( $user_ID, 'my_chest_size', $_POST['chest_size'] )){
                	add_user_meta( $user_ID, 'my_chest_size', $_POST['chest_size'], true );
                }
                if(!update_user_meta( $user_ID, 'my_overarm_size', $_POST['overarm_size'] )){
                	add_user_meta( $user_ID, 'my_overarm_size', $_POST['overarm_size'], true );
                }
                if(!update_user_meta( $user_ID, 'my_jacket_length', $_POST['jacket_length'] )){
                	add_user_meta( $user_ID, 'my_jacket_length', $_POST['jacket_length'], true );
                }
                if(!update_user_meta( $user_ID, 'my_shoulders_size', $_POST['shoulders_size'] )){
                	add_user_meta( $user_ID, 'my_shoulders_size', $_POST['shoulders_size'], true );
                }
                if(!update_user_meta( $user_ID, 'my_arms_size', $_POST['arms_size'] )){
                	add_user_meta( $user_ID, 'my_arms_size', $_POST['arms_size'], true );
                }
                if(!update_user_meta( $user_ID, 'my_waist', $_POST['waist'] )){
                	add_user_meta( $user_ID, 'my_waist', $_POST['waist'], true );
                }
                if(!update_user_meta( $user_ID, 'my_hip', $_POST['hip'] )){
                	add_user_meta( $user_ID, 'my_hip', $_POST['hip'], true );
                }
                if(!update_user_meta( $user_ID, 'my_outseam', $_POST['outseam'] )){
                	add_user_meta( $user_ID, 'my_outseam', $_POST['outseam'], true );
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
                
                $_SESSION['my_neck_size'] = $_POST['neck_size'];
                $_SESSION['my_chest_size'] = $_POST['chest_size'];
                $_SESSION['my_overarm_size'] = $_POST['overarm_size'];
                $_SESSION['my_jacket_length'] = $_POST['jacket_length'];
                $_SESSION['my_shoulders_size'] = $_POST['shoulders_size'];
                $_SESSION['my_arms_size'] = $_POST['arms_size'];
                $_SESSION['my_waist'] = $_POST['waist'];
                $_SESSION['my_hip'] = $_POST['hip'];
                $_SESSION['my_outseam'] = $_POST['outseam'];
                $success = 2;
            }
        }
        ?>
        <?php if($success == 1){ ?>
        <div class="section group">
            <div class="col span_12_of_12">
            <?php echo "<p class='successMsg' style='text-align:left;'>Successfully Updated</p>"; ?>
            </div>
        </div>
        <?php } ?>
        <?php if($success == 2){ ?>
        <div class="section group">
            <div class="col span_12_of_12">
            <?php echo "<p class='successMsg' style='text-align:left;'>Thank you for your measurements. <a href='".get_bloginfo('url')."/our-collection/'>Click Here</a> to continue shoping.</p>"; ?>
            </div>
        </div>
        <?php } ?>
        <form method="post" action="">
            <div class="section group">
    	        <div class="col span_4_of_12"> 
                    <div class="measureMyselfFinal">
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
                <div class="col span_4_of_12"> 
                    <div class="measureMyselfFinal">
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
                <div class="col span_4_of_12"> 
                    <div class="measureMyselfFinal">
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
    	    </div>
            <div class="section group">
                <div class="col span_12_of_12">
                    <div class="alignright">
                        <input type="hidden" name="born_in" value="<?php echo $_POST['born_in'] ?>" />
                        <input type="hidden" name="chest" value="<?php echo $_POST['chest'] ?>" />
                        <input type="hidden" name="height_ft" value="<?php echo $_POST['height_ft'] ?>" />
                        <input type="hidden" name="height_inch" value="<?php echo $_POST['height_inch'] ?>" />
                        <input type="hidden" name="preferredfit" value="<?php echo $_POST['preferredfit'] ?>" />
                        <input type="hidden" name="shoe_size_in" value="<?php echo $_POST['shoe_size'] ?>" />
                        <input type="hidden" name="shoulder" value="<?php echo $_POST['shoulder'] ?>" />
                        <input type="hidden" name="stomach" value="<?php echo $_POST['stomach'] ?>" />
                        <input type="hidden" name="weight_lbs" value="<?php echo $_POST['weight_lbs'] ?>" />
                        
                        <input type="hidden" name="neck_size" value="<?php echo $_POST['neck_size'] ?>" />
                        <input type="hidden" name="chest_size" value="<?php echo $_POST['chest_size'] ?>" />
                        <input type="hidden" name="overarm_size" value="<?php echo $_POST['overarm_size'] ?>" />
                        <input type="hidden" name="jacket_length" value="<?php echo $_POST['jacket_length'] ?>" />
                        <input type="hidden" name="shoulders_size" value="<?php echo $_POST['shoulders_size'] ?>" />
                        <input type="hidden" name="arms_size" value="<?php echo $_POST['arms_size'] ?>" />
                        <input type="hidden" name="waist" value="<?php echo $_POST['waist'] ?>" />
                        <input type="hidden" name="hip" value="<?php echo $_POST['hip'] ?>" />
                        <input type="hidden" name="outseam" value="<?php echo $_POST['outseam'] ?>" />
                        <input type="submit" name="submit" value="SUBMIT" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
});
</script>
<?php get_footer(); ?>