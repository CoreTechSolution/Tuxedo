<?php get_header(); ?>
<div id="innerContent">
	<div class="maincontent">
	    <div class="section group">
	        <div class="col span_12_of_12"> 
                <div class="container">
                    <h1 class="innerSectionHeader"><?php the_title(); ?></h1>
                    <?php while (have_posts()) : the_post(); ?>
                    <div><?php the_content(); ?></div>
                    <?php endwhile; ?>  
                </div>                         
	        </div>
	    </div>
	</div>
</div>
<?php get_footer(); ?>