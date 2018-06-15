<?php /* Template Name: Measure Myself */ ?>
<?php get_header(); ?>
<div class="measureMyself innerContent">
    <div class="maincontent">
        <div class="section group">
            <div class="col span_12_of_12">
                <h1 style="text-align: center;">Measure Yourself</h1>
            </div>
        </div>
        <div class="section group">
            <div class="col span_12_of_12 noMargin">
                <p>FIRST, LET'S SET UP YOUR MEASUREMENT PROFILE</p>
            </div>
        </div>
        <form method="post" action="<?php bloginfo('url'); ?>/measure-myself-two">
        <div class="section group">
            <div class="col span_4_of_12">
                <div class="verticleDiv matchheight">
                    <p style="text-align: left;">Get started by filling in your height, weight, age, and shoe size.</p>
                    <table class="body_sizes">
                        <tr>
                            <th>HEIGHT</th>
                            <td>
                                <div style="float: left;">
                                    <div style="float: left;">
                                        <select name="height_ft" style="width: 65px;">
                                            <option value="4" <?php if(get_user_meta($user_ID, 'height_ft', true) == 4){ echo 'selected = "selected"'; } ?>>4</option>
                                            <option value="5" <?php if(get_user_meta($user_ID, 'height_ft', true) == 5){ echo 'selected = "selected"'; } ?>>5</option>
                                            <option value="6" <?php if(get_user_meta($user_ID, 'height_ft', true) == 6){ echo 'selected = "selected"'; } ?>>6</option>
                                            <option value="7" <?php if(get_user_meta($user_ID, 'height_ft', true) == 7){ echo 'selected = "selected"'; } ?>>7</option>
                                        </select>
                                    </div>
                                    <div style="float: left;" class="unitpos"> ft</div>
                                </div>
                                <div style="float: left; padding-left: 20px;">
                                    <div style="float: left;">
                                        <select name="height_inch" style="width: 65px;">
                                            <?php for($i=0; $i<=12; $i++){ ?>
                                            <option value="<?php echo $i; ?>" <?php if(get_user_meta($user_ID, 'height_inch', true) == $i){ echo 'selected = "selected"'; } ?>><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div style="float: left;" class="unitpos"> in</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>WEIGHT</th>
                            <td><input name="weight_lbs" value="<?php echo get_user_meta($user_ID, 'weight_lbs', true); ?>" style="width: 53px;" /> <span style="font-size: 16px;">lbs</span></td>
                        </tr>
                        <tr>
                            <th>BORN IN</th>
                            <td>
                                <select name="born_in" style="width: 65px;">
                                    <?php 
                                        $firstYear = (int)date('Y') - 100;
                                        $lastYear = (int)date('Y');
                                    ?>
                                    <?php for($i=$firstYear; $i<=$lastYear; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(get_user_meta($user_ID, 'born_in', true) == $i){ echo 'selected = "selected"'; } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>SHOE SIZE</th>
                            <td>
                                <select name="shoe_size" style="width: 65px;">
                                    <?php for($i=6; $i<=11; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(get_user_meta($user_ID, 'shoe_size_in', true) == $i){ echo 'selected = "selected"'; } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col span_8_of_12">
                <p>Please tell us a little bit about your body type.</p>
                <div class="section group">
                    <div class="col span_3_of_12">
                        <div>
                            <img src="<?php bloginfo('template_directory'); ?>/images/shoulders.png" />
                            <div class="labelClass">SHOULDERS</div>
                            <div class="radioButtonGroup"><input type="radio" name="shoulder" value="Square" <?php if(get_user_meta($user_ID, 'shoulder', true) == 'Square'){ echo 'checked="checked"'; } ?> /> Square</div>
                            <div class="radioButtonGroup"><input type="radio" name="shoulder" value="Normal" <?php if(get_user_meta($user_ID, 'shoulder', true) == 'Normal'){ echo 'checked="checked"'; } ?> /> Normal</div>
                            <div class="radioButtonGroup"><input type="radio" name="shoulder" value="Sloping" <?php if(get_user_meta($user_ID, 'shoulder', true) == 'Sloping'){ echo 'checked="checked"'; } ?> /> Sloping</div>
                        </div>
                    </div>
                    <div class="col span_3_of_12">
                        <div>
                            <img src="<?php bloginfo('template_directory'); ?>/images/chest.png" />
                            <div class="labelClass">CHEST</div>
                            <div class="radioButtonGroup"><input type="radio" name="chest" value="Muscular" <?php if(get_user_meta($user_ID, 'chest', true) == 'Muscular'){ echo 'checked="checked"'; } ?> /> Muscular</div>
                            <div class="radioButtonGroup"><input type="radio" name="chest" value="Regular" <?php if(get_user_meta($user_ID, 'chest', true) == 'Regular'){ echo 'checked="checked"'; } ?> /> Regular</div>
                            <div class="radioButtonGroup"><input type="radio" name="chest" value="Hefty" <?php if(get_user_meta($user_ID, 'chest', true) == 'Hefty'){ echo 'checked="checked"'; } ?> /> Hefty</div>
                        </div>
                    </div>
                    <div class="col span_3_of_12">
                        <div>
                            <img src="<?php bloginfo('template_directory'); ?>/images/stomach.png" />
                            <div class="labelClass">STOMACH</div>
                            <div class="radioButtonGroup"><input type="radio" name="stomach" value="Flat" <?php if(get_user_meta($user_ID, 'stomach', true) == 'Flat'){ echo 'checked="checked"'; } ?> /> Flat</div>
                            <div class="radioButtonGroup"><input type="radio" name="stomach" value="Average" <?php if(get_user_meta($user_ID, 'stomach', true) == 'Average'){ echo 'checked="checked"'; } ?> /> Average</div>
                            <div class="radioButtonGroup"><input type="radio" name="stomach" value="Rounded" <?php if(get_user_meta($user_ID, 'stomach', true) == 'Rounded'){ echo 'checked="checked"'; } ?> /> Rounded</div>
                        </div>
                    </div>
                    <div class="col span_3_of_12">
                        <div>
                            <img src="<?php bloginfo('template_directory'); ?>/images/preferredfit.png" />
                            <div class="labelClass">PREFERRED FIT</div>
                            <div class="radioButtonGroup"><input type="radio" name="preferredfit" value="Classic" <?php if(get_user_meta($user_ID, 'preferredfit', true) == 'Classic'){ echo 'checked="checked"'; } ?> /> Classic</div>
                            <div class="radioButtonGroup"><input type="radio" name="preferredfit" value="Slim" <?php if(get_user_meta($user_ID, 'preferredfit', true) == 'Slim'){ echo 'checked="checked"'; } ?> /> Slim</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section group">
            <div class="col span_12_of_12">
                <div class="alignright"><input type="submit" name="next_step" value="Next Step" /></div>
            </div>
        </div>
        </form>
    </div>
</div>
<?php get_footer(); ?>