<?php /* Template Name: Measure Myself Two */ ?>
<?php get_header(); ?>
<div class="measureMyself innerContent">
    <div class="maincontent">
        <div class="section group">
            <div class="col span_12_of_12">
                <h1 style="text-align: center;">Measure Yourself</h1>
            </div>
        </div>
        <form method="post" action="<?php bloginfo('url'); ?>/measure-myself-final">
            <div class="section group">
                <div class="col span_4_of_12">
                    <div class="myselftwo">
                        <table>
                            <tr>
                                <th>NECK SIZE:</th>
                                <td><input type="text" name="neck_size" value="<?php echo get_user_meta($user_ID, 'my_neck_size', true); ?>" /> <span>in</span><div class="videoTutorial"><a class="various" data-fancybox-type="iframe" href="https://player.vimeo.com/video/55957716"><i class="fa fa-video-camera"></i></a></div></td>
                            </tr>
                        </table>
                        <p>Measure around neck neck where the shirt collar would be. Leave enough room for a finger or two.</p>
                    </div>
                    <div class="myselftwo">
                        <table>
                            <tr>
                                <th>CHEST UNDERARM:</th>
                                <td><input type="text" name="chest_size" value="<?php echo get_user_meta($user_ID, 'my_chest_size', true); ?>" /> <span>in</span> <div class="videoTutorial"><a class="various" data-fancybox-type="iframe" href="https://player.vimeo.com/video/55957710"><i class="fa fa-video-camera"></i></a></div></td>
                            </tr>
                        </table>
                        <p>Measure around the widest part of the chest, under the arms.</p>
                    </div>
                    <div class="myselftwo">
                        <table>
                            <tr>
                                <th>CHEST OVERARM:</th>
                                <td><input type="text" name="overarm_size" value="<?php echo get_user_meta($user_ID, 'my_overarm_size', true); ?>" /> <span>in</span> <div class="videoTutorial"><a class="various" data-fancybox-type="iframe" href="https://player.vimeo.com/video/55957710"><i class="fa fa-video-camera"></i></a></div></td>
                            </tr>
                        </table>
                        <p>Measure around the widest part of the chest, over the arms.</p>
                    </div>
                </div>
                <div class="col span_4_of_12">
                    <div class="myselftwo">
                        <table>
                            <tr>
                                <th>JACKET LENGTH:</th>
                                <td><input type="text" name="jacket_length" value="<?php echo get_user_meta($user_ID, 'my_jacket_length', true); ?>" /> <span>in</span> <div class="videoTutorial"><a class="various" data-fancybox-type="iframe" href="https://player.vimeo.com/video/55958110"><i class="fa fa-video-camera"></i></a></div></td>
                            </tr>
                        </table>
                        <p>Place the tape at the shoulder and collar seam. Measure straight down the arm to the thumb joint.</p>
                    </div>
                    <div class="myselftwo">
                        <table>
                            <tr>
                                <th>SHOULDERS:</th>
                                <td><input type="text" name="shoulders_size" value="<?php echo get_user_meta($user_ID, 'my_shoulders_size', true); ?>" /> <span>in</span> <div class="videoTutorial"><a class="various" data-fancybox-type="iframe" href="https://player.vimeo.com/video/55957709"><i class="fa fa-video-camera"></i></a></div></td>
                            </tr>
                        </table>
                        <p>Measure from where the shoulder and armhole seam meet, across the back to the same spot on the other side.</p>
                    </div>
                    <div class="myselftwo">
                        <table>
                            <tr>
                                <th>SLEEVE LENGTH:</th>
                                <td><input type="text" name="arms_size" value="<?php echo get_user_meta($user_ID, 'my_arms_size', true); ?>" /> <span>in</span> <div class="videoTutorial"><a class="various" data-fancybox-type="iframe" href="https://player.vimeo.com/video/55957709"><i class="fa fa-video-camera"></i></a></div></td>
                            </tr>
                        </table>
                        <p>Measure from where the shoulder seam and armhole meet, straight down the arm to the middle of the wrist.</p>
                    </div>
                </div>
                <div class="col span_4_of_12">
                    <div class="myselftwo">
                        <table>
                            <tr>
                                <th>WAIST:</th>
                                <td><input type="text" name="waist" value="<?php echo get_user_meta($user_ID, 'my_waist', true); ?>" /> <span>in</span> <div class="videoTutorial"><a class="various" data-fancybox-type="iframe" href="https://player.vimeo.com/video/55957713"><i class="fa fa-video-camera"></i></a></div></td>
                            </tr>
                        </table>
                        <p>Follow the top of the pants around the body. Don’t worry if this measurement is different from your normal pant size.</p>
                    </div>
                    <div class="myselftwo">
                        <table>
                            <tr>
                                <th>HIPS:</th>
                                <td><input type="text" name="hip" value="<?php echo get_user_meta($user_ID, 'my_hip', true); ?>" /> <span>in</span> <div class="videoTutorial"><a class="various" data-fancybox-type="iframe" href="https://player.vimeo.com/video/55957713"><i class="fa fa-video-camera"></i></a></div></td>
                            </tr>
                        </table>
                        <p>Measure around the widest part of the hips, usually across the middle of the rear.</p>
                    </div>
                    <div class="myselftwo">
                        <table>
                            <tr>
                                <th>PANT OUTSEAM:</th>
                                <td><input type="text" name="outseam" value="<?php echo get_user_meta($user_ID, 'my_outseam', true); ?>" /> <span>in</span> <div class="videoTutorial"><a class="various" data-fancybox-type="iframe" href="https://player.vimeo.com/video/55957715"><i class="fa fa-video-camera"></i></a></div></td>
                            </tr>
                        </table>
                        <p>Measure from the top of the waistband to about one and a half inches from the ground.</p>
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
                        <input type="hidden" name="shoe_size" value="<?php echo $_POST['shoe_size'] ?>" />
                        <input type="hidden" name="shoulder" value="<?php echo $_POST['shoulder'] ?>" />
                        <input type="hidden" name="stomach" value="<?php echo $_POST['stomach'] ?>" />
                        <input type="hidden" name="weight_lbs" value="<?php echo $_POST['weight_lbs'] ?>" />
                        <input type="submit" name="next_step" value="Next Step" />
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