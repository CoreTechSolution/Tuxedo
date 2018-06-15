<?php get_header(); ?>
<div id="">
	<div class="maincontent">
	    <div class="section group">
	        <div class="col span_9_of_12">
                <div id="content">
                    <div class="blog_display">
                        <?php while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <div><?php the_content(); ?></div>
                        <div class="woocommerce">
                            <div id="reviews">
                                <?php comments_template(); ?>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>                      
	        </div>
            <div class="col span_3_of_12"> 
                <?php get_sidebar(); ?>                
	        </div>
	    </div>
	</div>
</div>
<?php get_footer(); ?>