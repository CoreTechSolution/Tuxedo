<?php /* Template Name: Update Your Measurements */ ?>
<?php get_header(); ?>
<div id="inlineTailorFrom">
    <h1>Send a Tailor</h1>
    <?php echo do_shortcode('[contact-form-7 id="324" title="Send a Tailor"]'); ?>
</div>
<div id="innerContent">
	<div class="maincontent">
	    <div class="section group">
	        <div class="col span_12_of_12"> 
                <div class="container">
                    <h1 style="text-align: center;">Submitting Your Sizes</h1>
                    <p style="text-align: center;">We Have Three Options For Getting Your Size</p>
                    <div class="section group">
                        <div class="col span_4_of_12">
                            <div class="section group">
                                <div class="col span_12_of_12">
                                    <div class="measureSizes1 verticleDiv">
                                        <h1>I KNOW MY SIZES</h1>
                                        <div style="padding: 20px 0;"><img src="<?php bloginfo('template_directory'); ?>/images/iknow_my_size.png" /></div>
                                        <p class="matchheight">If you already know your sizes, simply enter them directly and we'll take care of the rest.</p>
                                        <div class="sizeButton"><a href="<?php bloginfo('url'); ?>/enter-my-sizes">Enter My Sizes</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col span_8_of_12">
                            <div class="measureSizes1"><h1>I NEED HELP FINDING MY SIZES</h1></div>
                            <div class="section group">
                                <div class="col span_5_of_12">
                                    <div style="text-align: center;">
                                        <div style="padding: 18px 0;"><img src="<?php bloginfo('template_directory'); ?>/images/my_measure.png" /></div>
                                        <p class="matchheight">If you already know your sizes, simply enter them directly and we'll take care of the rest.</p>
                                        <div class="sizeButton"><a href="<?php bloginfo('url'); ?>/measure-myself">Measure Myself</a></div>
                                    </div>
                                </div>
                                <div class="col span_2_of_12">
                                    <div style="text-align: center;">
                                        <div class="or">OR</div>
                                    </div>
                                </div>
                                <div class="col span_5_of_12">
                                    <div style="text-align: center;">
                                        <div style="padding: 18px 0;"><img src="<?php bloginfo('template_directory'); ?>/images/send_tailer.png" /></div>
                                        <p class="matchheight">If you already know your sizes, simply enter them directly and we'll take care of the rest.</p>
                                        <div class="sizeButton"><a class="fancybox" href="#inlineTailorFrom" href="<?php bloginfo('url'); ?>">Send a Tailor</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                         
	        </div>
	    </div>
	</div>
</div>
<?php get_footer(); ?>