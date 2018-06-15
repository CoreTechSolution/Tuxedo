<?php get_header(); ?>
<div id="banner">
    <?php echo do_shortcode('[rev_slider banner]'); ?>
</div>
<div id="contentBlock">
	<div class="maincontent">
	    <div class="section group">
	        <div class="col span_12_of_12"> 
                <h1 class="sectionHeader">Tuxedo</h1>
                <p class="paragraphSize20">In just 10 minutes you can build your tuxedo. Book your wedding or event.</p>
                <div class="section group">
                    <?php $my_query = new WP_Query( array( 
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'meta_key' => '_featured', 
                            'meta_value' => 'yes',
                            'posts_per_page' => 3
                            ) );
                            
                        if( $my_query->have_posts() ):
                    ?>
                    <?php while( $my_query->have_posts() ): $my_query->the_post(); ?>
                    <?php $postid = get_the_ID(); ?>
                    <div class="col span_4_of_12">
                        <div class="productImg" title="<?php  ?>">
                            <?php echo get_featured_image($postid, 'shop_catalog_image_size'); ?>
                            <div class="productCaption">
                                <div class="productPrice"><?php echo get_woocommerce_currency_symbol( $currency ); ?> <?php echo display_product_price($postid); ?></div>
                                <div class="iconsClass">
                                    <div class="section group">
                                        <div class="col span_9_of_12"><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/quickview.png" /></a></div>
                                        <div class="col span_2_of_12"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist icon="http://tuxedo.coregensolutions.com/wp-content/themes/tuxedo-theme/images/heart.png"]'); ?></div>
                                        <div class="col span_1_of_12"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/search-icon.png" /></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="buttonClass"><a href="<?php bloginfo('url'); ?>/our-collection">SHOP THE COLLECTION</a></div>
	        </div>
	    </div>
        <!--  -->
        <div class="section group">
            <div class="col span_12_of_12"><h1 class="sectionHeader sectionHeader1">How it Works</h1></div>
        </div>
        <div class="section group">
            <div class="col span_7_of_12"><img src="<?php bloginfo('template_directory'); ?>/images/how-it-works.jpg" /></div>
            <div class="col span_5_of_12">
                <div class="howitworks">
                    <h2>We design and manufacture</h2>
                    <p>We design and manufacture the highest quality product on the rental market, with an exceptional fit and a seamless experience.</p>
                    <p>Our suits would retail for $1200, but we offer them starting at $95</p>
                    <div class="buttonClass"><a href="<?php bloginfo('url'); ?>/our-collection">SHOP THE COLLECTION</a></div>
                </div>
            </div>
        </div>
        <div class="section group">
            <div class="col span_12_of_12"><h1 class="sectionHeader">Blog</h1></div>
        </div>
	</div>
</div>
<div class="blogSection">
    <div class="maincontent">
        <div class="section group">
            <div class="col span_12_of_12">
                <?php
                    $blog_args1 = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 1,
                        'order' => 'DESC',
                        'orderby' => 'date'
                    );
                    
                    $blog_query1 = new WP_Query( $blog_args1 );
                ?>
                    <?php if ( $blog_query1->have_posts() ) : ?>
                    <?php while ( $blog_query1->have_posts() ) : $blog_query1->the_post(); ?>
                <div class="">
                    <h1><?php the_time('F d, Y'); ?></h1>
                    <div class="divider" style="padding-bottom: 10px;"></div>
                    <h2 class="blogTitle"><?php the_title(); ?></h2>
                    <div class="divider" style="padding: 10px 0 16px;"></div>
                    <div class="postby">BY <?php echo ucwords(get_the_author()); ?> | <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?> | <?php comments_number('0 Comments', '1 Comment', '% Comments' );?></div>
                    <div class="whiteButtonClass"><a href="<?php the_permalink(); ?>">READ THE ARTICLE</a></div>
                </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    
            </div>
        </div>
    </div>
</div>
<div class="contentBlock">
    <div class="maincontent">
        <br /><br /><br />
        <div class="section group">
        <?php
            $blog_args2 = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 2,
                'order' => 'DESC',
                'orderby' => 'date',
                'meta_key' => 'featured_post',
                'meta_value' => 1
            );
            
            $blog_query2 = new WP_Query( $blog_args2 );
        ?>
            <?php if ( $blog_query2->have_posts() ) : ?>
            <?php while ( $blog_query2->have_posts() ) : $blog_query2->the_post(); ?>
            <div class="col span_6_of_12">
                <div class="smallBog">
                    <?php the_post_thumbnail('imgsize_523_439');?>
                    <div class="blogCaption">
                        <div class="topbar"></div>
                        <h1>LOOK OF THE DAY</h1>
                        <div class="bottombar"></div>
                        <p><?php the_title(); ?></p>
                        <div class="blackButtonClass"><a href="<?php the_permalink(); ?>">READ THE ARTICLE</a></div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="section group">
            <div class="col span_12_of_12"><h1 class="sectionHeader">Contact</h1></div>
        </div>
        <div class="section group">
            <div class="col span_4_of_12">
                <div class="homeContact">
                    <h1>BOOKING AGENCY</h1>
                    <div class="dividerBlack"></div>
                    <p><?php echo $options['booking-agency']; ?></p>
                </div>
            </div>
            <div class="col span_4_of_12">
                <div class="homeContact">
                    <h1>PHONE / FAX</h1>
                    <div class="dividerBlack"></div>
                    <p><?php echo $options['phone-fax']; ?></p>
                </div>
            </div>
            <div class="col span_4_of_12">
                <div class="homeContact">
                    <h1>EMAIL</h1>
                    <div class="dividerBlack"></div>
                    <p><?php echo $options['email']; ?></p>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="section group">
            <div class="col span_12_of_12">
                <div class="logoSliderSection">
                <ul id="flexisel">
                <?php
                    $clientlogo_args = array(
                        'post_type' => 'clientlogo',
                        'post_status' => 'publish',
                        'order' => 'DESC',
                        'orderby' => 'date',
                    );
                    $clientlogo_query = new WP_Query( $clientlogo_args );
                ?>
                <?php if ( $clientlogo_query->have_posts() ) : ?>
                    <?php while ( $clientlogo_query->have_posts() ) : $clientlogo_query->the_post(); ?>
                        <li><?php if(has_post_thumbnail()){ the_post_thumbnail( 'imgsize_175_92' ); } ?></li>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>                                                 
                </ul>
                </div>
            </div>
        </div><br />
    </div>
</div>
<?php get_footer(); ?>