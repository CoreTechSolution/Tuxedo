<?php /* Template Name: Measure Myself Step 2 */ ?>
<?php get_header(); ?>
<?php if(is_user_logged_in()){ ?>
<?php global $user_ID; ?>
<div class="measureMyself innerContent">
    <div class="maincontent">
        <div class="section group">
            <div class="col span_12_of_12">
                <h1 style="text-align: center;">Measure Yourself</h1>
            </div>
        </div>
        <div class="section group">
            <div class="col span_12_of_12">
                <div id="crumbs">
                	<ul>
                        <li><a href="#1">About me</a></li>
                		<li><a href="#1">STEP 1</a></li>
                		<li><a href="#2" class="activeState">STEP 2</a></li>
                		<li><a href="#3">STEP 3</a></li>
                		<li><a href="#4">STEP 4</a></li>
                		<li><a href="#5">STEP 5</a></li>
                        <li><a href="#5">STEP 6</a></li>
                        <li><a href="#5">MY SIZE</a></li>
                	</ul>
                </div>
            </div>
            <div class="col span_12_of_12">
                <p>OKAY, NOW IT'S TIME FOR THE CHEST</p>
            </div>
        </div>
        <form method="post" action="<?php bloginfo('url'); ?>/measure-myself-step3">
            <div class="section group">
                <div class="col span_6_of_12">
                    <div class="measureVideo">
                        <iframe src="https://player.vimeo.com/video/55957710?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff" width="450" height="253" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col span_6_of_12">
                    <div class="measureContent">
                        <p>A. CHEST MEASUREMENT</p>
                        <p>Measure around the widest part, with your arms at your side. Relax, breathe, and just hang out like you'd normally stand.</p>
                        <p>MY CHEST IS:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="my_chest_size" style="width: 50px; display: inline-block;" /> in</p>
                        <p>B. OVERARM MEASUREMENT</p>
                        <p>In the same spot, measure over your arms with the tape going over your shoulder blades. Relax, breathe, and just hang out like you'd normally stand.</p>
                        <p>MY OVERARM IS:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="my_overarm_size" style="width: 50px; display: inline-block;" /> in</p>
                    </div>
                </div>
            </div>
            <div class="section group">
            <div class="col span_6_of_12">
                    <div class="alignleft">
                        <input type="submit" name="previous_step" value="Previous Step" />
                    </div>
                </div>
                <div class="col span_6_of_12">
                    <div class="alignright">
                        <input type="submit" name="next_step" value="Next Step" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
jQuery(document).ready(function(){
    var $allVideos = jQuery("iframe");
    $fluidEl = jQuery(".measureVideo");
    $allVideos.each(function() {

		jQuery(this)
			.data('aspectRatio', this.height / this.width)

			// and remove the hard coded width/height
			.removeAttr('height')
			.removeAttr('width');

	});
    
    jQuery(window).resize(function() {

		var newWidth = $fluidEl.width();

		// Resize all videos according to their own aspect ratio
		$allVideos.each(function() {

			var $el = jQuery(this);
			$el
				.width(newWidth)
				.height(newWidth * $el.data('aspectRatio'));

		});
	}).resize();
});
</script>
<?php } else { header('Location: '.get_bloginfo('home').'/sign-in'); } ?>
<?php get_footer(); ?>