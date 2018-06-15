<?php /* Template Name: Reset Password Template */ ?>
<?php get_header(); ?>
<div id="">
	<div class="maincontent">
	    <div class="section group">
            <div class="col span_4_of_12"></div>
	        <div class="col span_4_of_12"> 
                <div class="form_container">
                    <?php get_template_part('theme-framework-lib/authentication_fuctions/resetpassword'); ?>
                </div>                         
	        </div>
            <div class="col span_4_of_12"></div>
	    </div>
	</div>
</div>
<?php get_footer(); ?>