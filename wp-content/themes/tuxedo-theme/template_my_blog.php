<?php /* Template Name: My Blog Template */ ?>
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
                <div class="my-blog">
                    <div class="buttonLink"><a href="<?php bloginfo('url'); ?>/new-blog-post">New Blog Post</a></div><br />
                    <div class="bloglisting">
                        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
                        <?php
                            $query = array(
                                'post_type' => 'post',
                                'author' => $user_ID,
                                'post_status' => array('publish', 'pending'),
                                'orderby'=>'date',
                                'order'=>'DESC'
                            );
                            query_posts($query);
                        ?>
                        <table class="footable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        <?php if ( have_posts() ) { ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                            <tr>
                                <td><a href="<?php bloginfo('url'); ?>/edit-blog-post?postid=<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></td>
                                <td><?php the_time(get_option('date_format')); ?></td>
                                <td><?php echo ucfirst(get_post_status(get_the_ID())); ?></td>
                            </tr>
                            <?php endwhile ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="3">No post created</td>
                            </tr>
                        <?php } ?>
                        <?php wp_reset_query(); ?>
                        </table>
                    </div>
                </div> 
            </div>
	    </div>
	</div>
</div>
<?php } else { header('Location: '.get_bloginfo('home').'/sign-in'); } ?>
<?php get_footer(); ?>