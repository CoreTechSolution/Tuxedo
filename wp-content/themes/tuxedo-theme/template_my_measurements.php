<?php /* Template Name: My Measurements */ ?>
<?php get_header(); ?>
<?php if(is_user_logged_in()){ ?>
<?php global $user_ID; ?>
<div id="innerContent">
	<div class="maincontent">
	    <div class="section group">
	        <div class="col span_12_of_12"> 
                <div class="container">
                    <h1 style="text-align: center;">My Measurements</h1>
                    <p style="text-align: center;">Enter, check, or change your measurements.</p>
                    <div class="section group">
                        <div class="col span_4_of_12">
                            <div class="measureSizes">
                                <h1>THE BASICS</h1>
                                <table>
                                    <tr>
                                        <th>HEIGHT</th>
                                        <td><?php echo get_user_meta($user_ID, 'height_ft', true); ?>' <?php echo get_user_meta($user_ID, 'height_inch', true); ?>"</td>
                                    </tr>
                                    <tr>
                                        <th>WEIGHT</th>
                                        <td><?php echo get_user_meta($user_ID, 'weight_lbs', true); ?> lbs.</td>
                                    </tr>
                                    <tr>
                                        <th>SHOULDERS</th>
                                        <td><?php echo get_user_meta($user_ID, 'shoulder', true); ?></td>
                                    </tr>
                                    <tr>
                                        <th>CHEST</th>
                                        <td><?php echo get_user_meta($user_ID, 'chest', true); ?></td>
                                    </tr>
                                    <tr>
                                        <th>STOMACH</th>
                                        <td><?php echo get_user_meta($user_ID, 'stomach', true); ?></td>
                                    </tr>
                                    <tr>
                                        <th>PREFERRED FIT</th>
                                        <td><?php echo get_user_meta($user_ID, 'preferredfit', true); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col span_4_of_12">
                            <div class="measureSizes">
                                <h1>MY EXACT SIZE</h1>
                                <table>
                                    <tr>
                                        <th>JACKET</th>
                                        <td><?php echo get_user_meta($user_ID, 'chest_size_in', true); ?> <?php echo get_user_meta($user_ID, 'chest_length_in', true); ?></td>
                                    </tr>
                                    <tr>
                                        <th>WAIST</th>
                                        <td><?php echo get_user_meta($user_ID, 'waist_size_in', true); ?></td>
                                    </tr>
                                    <tr>
                                        <th>INSEAM</th>
                                        <td><?php echo get_user_meta($user_ID, 'waist_length_in', true); ?></td>
                                    </tr>
                                    <tr>
                                        <th>NECK</th>
                                        <td><?php echo get_user_meta($user_ID, 'neck_size_in', true); ?></td>
                                    </tr>
                                    <tr>
                                        <th>SLEEVE</th>
                                        <td><?php echo get_user_meta($user_ID, 'sleeve_size_in', true); ?></td>
                                    </tr>
                                    <tr>
                                        <th>SHOE</th>
                                        <td><?php echo get_user_meta($user_ID, 'shoe_size_in', true); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col span_4_of_12">
                            <div class="measureSizes">
                                <h1>MY MEASUREMENTS</h1>
                                <table>
                                    <tr>
                                        <th>NECK</th>
                                        <td><?php echo get_user_meta($user_ID, 'my_neck_size', true); ?>"</td>
                                    </tr>
                                    <tr>
                                        <th>UNDERARM</th>
                                        <td><?php echo get_user_meta($user_ID, 'my_chest_size', true); ?>"</td>
                                    </tr>
                                    <tr>
                                        <th>OVERARM</th>
                                        <td><?php echo get_user_meta($user_ID, 'my_overarm_size', true); ?>"</td>
                                    </tr>
                                    <tr>
                                        <th>JACKET</th>
                                        <td><?php echo get_user_meta($user_ID, 'my_jacket_length', true); ?>"</td>
                                    </tr>
                                    <tr>
                                        <th>SHOULDER</th>
                                        <td><?php echo get_user_meta($user_ID, 'my_shoulders_size', true); ?>"</td>
                                    </tr>
                                    <tr>
                                        <th>ARM</th>
                                        <td><?php echo get_user_meta($user_ID, 'my_arms_size', true); ?>"</td>
                                    </tr>
                                    <tr>
                                        <th>WAIST</th>
                                        <td><?php echo get_user_meta($user_ID, 'my_waist', true); ?>"</td>
                                    </tr>
                                    <tr>
                                        <th>HIP</th>
                                        <td><?php echo get_user_meta($user_ID, 'my_hip', true); ?>"</td>
                                    </tr>
                                    <tr>
                                        <th>PANT</th>
                                        <td><?php echo get_user_meta($user_ID, 'my_outseam', true); ?>"</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div><br /><br />
                    <p style="text-align: center;"><a href="<?php bloginfo('url'); ?>/update-your-measurements">UPDATE YOUR MEASUREMENTS</a></p>
                </div>                         
	        </div>
	    </div>
	</div>
</div>
<?php } else { header('Location: '.get_bloginfo('home').'/update-your-measurements'); } ?>
<?php get_footer(); ?>