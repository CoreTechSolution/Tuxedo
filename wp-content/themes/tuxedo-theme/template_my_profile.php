<?php /* Template Name: My Profile Template */ ?>
<?php get_header(); ?>
<?php if(is_user_logged_in()){ ?>
<?php global $user_ID; ?>
<div id="innerContent">
	<div class="maincontent">
	    <div class="section group">
            <div class="col span_3_of_12">
                 <?php get_template_part('theme-framework-lib/dashboard_functions/dashboard_navmenu'); ?>
            </div>
            <div class="col span_9_of_12">
                <div class="">
                    <h2>My Profile</h2>
                    <?php get_template_part('theme-framework-lib/dashboard_functions/edit_profile'); ?>  
                </div> 
            </div>
	    </div>
	</div>
</div>
<?php } else { header('Location: '.get_bloginfo('home').'/sign-in'); } ?>
<?php get_footer(); ?>