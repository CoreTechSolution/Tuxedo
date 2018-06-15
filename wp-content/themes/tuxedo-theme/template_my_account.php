<?php /* Template Name: My Account Template */ ?>
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
                <p>Hello <?php echo get_the_author_meta('display_name', $user_ID); ?>, (not <?php echo get_the_author_meta('display_name', $user_ID); ?> <a href="<?php echo wp_logout_url(home_url()); ?>">Sign out</a>). From your account dashboard you can view your recent orders, manage your shipping and billing addresses and edit your password and account details</p>
                <?php while (have_posts()) : the_post(); ?>
                <div><?php the_content(); ?></div>
                <?php endwhile; ?>
            </div>
	    </div>
	</div>
</div>
<?php } else { header('Location: '.get_bloginfo('home').'/sign-in'); } ?>
<?php get_footer(); ?>