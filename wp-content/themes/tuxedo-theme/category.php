<?php get_header(); ?>
<div id="innerContent">
	<div class="maincontent">
        <div class="section group">
            <div class="col span_12_of_12"><h1 class="innerSectionHeader">Category : <?php single_cat_title(); ?></h1> </div>
        </div>
	    <div class="section group">
	        <div class="col span_9_of_12">
                <?php if( have_posts() ): ?>
                <?php while( have_posts() ): the_post(); ?>
                    <div class="section group">
                        <?php if(has_post_thumbnail()){ ?>
                        <div class="col span_6_of_12"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('imgsize_523_439');?></a></div>
                        <div class="col span_6_of_12">
                            <div class="blog_display">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php $p_id = get_the_ID(); ?>
                                <div class="post_content"><p><?php echo content(40, $p_id); ?></p></div>
                            </div>
                        </div>
                        <?php } else { ?>
                            <div class="col span_12_of_12">
                                <div class="blog_display">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php $p_id = get_the_ID(); ?>
                                    <div class="post_content"><p><?php echo content(80, $p_id); ?></p></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="section group">
                        <div class="col span_12_of_12"><div class="postReadMorebg"><a href="<?php the_permalink(); ?>">Read More</a></div></div>
                    </div>
                <?php endwhile; ?>  
                <?php endif; ?>    
                <div class="pagenavi"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>
                <?php wp_reset_postdata(); ?>
	        </div>
            <div class="col span_3_of_12"> 
                <?php get_sidebar(); ?>                
	        </div>
	    </div>
	</div>
</div>
<?php get_footer(); ?>