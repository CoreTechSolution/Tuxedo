<?php /* Template Name: Blog Template */ ?>
<?php get_header(); ?>
<div id="content">
	<div class="maincontent">
        <div class="section group">
            <div class="col span_12_of_12"><h1 class="innerSectionHeader"><?php the_title(); ?></h1> </div>
        </div>
	    <div class="section group">
	        <div class="col span_9_of_12">
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
                <?php $my_query = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 6, 'orderby' => 'date', 'order' => 'DESC', 'paged' => $paged ) ); ?>
                <?php if( $my_query->have_posts() ): ?>
                <?php while( $my_query->have_posts() ): $my_query->the_post(); ?>
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
                <div class="pagenavi"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $my_query ) ); } ?></div>
                <?php wp_reset_postdata(); ?>
	        </div>
            <div class="col span_3_of_12"> 
                <?php get_sidebar(); ?>                
	        </div>
	    </div>
	</div>
</div>
<?php get_footer(); ?>