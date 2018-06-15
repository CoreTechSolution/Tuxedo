<?php $user_role = get_user_role($user_ID); ?>
<div class="dashboard">
    <div class="profileImgage">
        <?php echo get_profile_img($user_ID); ?>
    </div>
    <div class="myaccountMenu">
        <ul>
            <?php if($user_role != 'subscriber'){ ?>
            <li><a href="<?php bloginfo('url'); ?>/my-account"><i class="fa fa-tachometer"></i> Dashboard</a></li>
            <li><a href="<?php bloginfo('url'); ?>/my-profile"><i class="fa fa-user"></i> My Profile</a></li>
            <li><a href="<?php bloginfo('url'); ?>/my-measurements-summary"><i class="fa fa-medium"></i> My Measurements</a></li>
            <li><a href="<?php bloginfo('url'); ?>/wishlist"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
            <li><a href="<?php bloginfo('url'); ?>/wedding-registration"><i class="fa fa-heart"></i> Wedding Registration</a></li>
            <li><a href="<?php bloginfo('url'); ?>/my-blog"><i class="fa fa-rss"></i> My Blog</a></li>
            <?php } else { ?>
            <li><a href="<?php bloginfo('url'); ?>/my-measurements-summary"><i class="fa fa-medium"></i> My Measurements</a></li>
            <?php } ?>
        </ul>
    </div>
</div>