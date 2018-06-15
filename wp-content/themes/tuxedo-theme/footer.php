<?php global $options; ?>
<div id="footerBlock">
	<div class="maincontent">
	    <div class="section group">
	        <div class="col span_2_of_12">
                <h1>Information</h1>
                <div class="fooerNav">
                    <?php wp_nav_menu(array('theme_location' => 'information')); ?>
                </div>
            </div>
            <div class="col span_3_of_12">
                <h1>Customer Service</h1>
                <div class="fooerNav">
                    <?php wp_nav_menu(array('theme_location' => 'customerservice')); ?>
                </div>
            </div>
            <div class="col span_2_of_12">
                <h1>Extras</h1>
                <div class="fooerNav">
                    <?php wp_nav_menu(array('theme_location' => 'extras')); ?>
                </div>
            </div>
            <div class="col span_5_of_12">
                <h1>Newletters</h1>
                <p>Subscribe to receive our news everyday!</p>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Newsletter Widget') ) : ?> <?php endif; ?>
            </div>
	    </div>
        <div class="footerDiv"></div>
        <div class="section group">
            <div class="col span_7_of_12">
                <div class="footerlinks">
                    <?php wp_nav_menu(array('theme_location' => 'footerlinks')); ?>
                </div>
            </div>
            <div class="col span_5_of_12">
                <div class="socialmedia">
                    <nav>
                        <a href="<?php echo $options['facebook-link']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" /></a>
                        <a href="<?php echo $options['pinterest-link']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/pinterest.png" /></a>
                        <a href="<?php echo $options['twitter-link']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" /></a>
                        <a href="<?php echo $options['googleplus-link']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/googleplus.png" /></a>
                        <a href="<?php echo $options['rss-link']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" /></a>
                        <a href="<?php echo $options['youtube-link']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/youtube.png" /></a>
                    </nav>
                </div>
            </div>
        </div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>