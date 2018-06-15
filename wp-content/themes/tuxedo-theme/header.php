<?php ob_start(); ?>
<?php session_start(); ?>
<?php global $options; ?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Responsive and mobile friendly stuff -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php
/*
* Print the <title> tag based on what is being viewed.
*/
global $page, $paged;
wp_title('|', true, 'right');
// Add the blog name.
bloginfo('name');
// Add the blog description for the home/front page.
$site_description = get_bloginfo('description', 'display');
if ($site_description && (is_home() || is_front_page()))
    echo " | $site_description";
// Add a page number if necessary:
if ($paged >= 2 || $page >= 2)
    echo ' | ' . sprintf(__('Page %s', 'twentyeleven'), max($paged, $page));
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- Responsive Stylesheets -->
<link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/css/commoncssloader.css" />
<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="<?php bloginfo('template_directory'); ?>/css/1024.css">
<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="<?php bloginfo('template_directory'); ?>/css/768.css">
<link rel="stylesheet" media="only screen and (max-width: 480px)" href="<?php bloginfo('template_directory'); ?>/css/480.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>?ver=<?php echo(mt_rand(10,100)); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php echo $options['site-favicon']['url']; ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<!-- Custom Responsive Stylesheets -->
<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 993px)" href="<?php bloginfo('template_directory'); ?>/css/mediaquerycss/styleMax1024.css?ver=<?php echo(mt_rand(10,100)); ?>">
<link rel="stylesheet" media="only screen and (max-width: 992px) and (min-width: 769px)" href="<?php bloginfo('template_directory'); ?>/css/mediaquerycss/styleMax992.css?ver=<?php echo(mt_rand(10,100)); ?>">
<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="<?php bloginfo('template_directory'); ?>/css/mediaquerycss/styleMax768.css?ver=<?php echo(mt_rand(10,100)); ?>">
<link rel="stylesheet" media="only screen and (max-width: 480px)" href="<?php bloginfo('template_directory'); ?>/css/mediaquerycss/styleMax480.css?ver=<?php echo(mt_rand(10,100)); ?>">
<?php
/* We add some JavaScript to pages with the comment form
* to support sites with threaded comments (when in use).
*/
if (is_singular() && get_option('thread_comments'))
    wp_enqueue_script('comment-reply');
/* Always have wp_head() just before the closing </head>
* tag of your theme, or you will break many plugins, which
* generally use this hook to add elements to <head> such
* as styles, scripts, and meta tags.
*/
wp_enqueue_script('jquery');
wp_head();
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/jquery.fancybox.css" />
<script src="<?php bloginfo('template_directory'); ?>/js/modernizr-2.8.2-min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/slicknav.css" />
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.slicknav.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox.pack.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.matchHeight-min.js"></script>
<script>
jQuery(function(){
	jQuery('.bottomMenu').slicknav({
	  prependTo:'#rspnavigation',
	  label:''
	});
	jQuery('.matchheight').matchHeight();
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery(".fancybox").fancybox({
	});
});
</script>
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Carme' rel='stylesheet' type='text/css' />
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.flexisel.js"></script>
<script>
jQuery(document).ready(function() {
    jQuery("#flexisel").flexisel({
        visibleItems: 5,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });
/* Responsive caption */
    var img_width = jQuery('.smallBog img').width();
    //jQuery('.smallBog').width(img_width);
    jQuery('.smallBog .blogCaption').css('margin', 30);
   /* jQuery('.smallBog img').resize( function(e){
        var img_width = jQuery('.smallBog img').width();
        jQuery('.smallBog').width(img_width);
        jQuery('.smallBog .blogCaption').css('margin', 30);
    });*/
    jQuery(window).bind('resize', function(e){
        var img_width = jQuery('.smallBog img').width();
        jQuery('.smallBog').css('width', 'auto');
        jQuery('.smallBog .blogCaption').css('margin', 30);
    });
});
</script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="<?php bloginfo('template_directory'); ?>/css/footable.core.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_directory'); ?>/css/footable.standalone.css" rel="stylesheet" type="text/css" />
<script src="<?php bloginfo('template_directory'); ?>/js/footable.all.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
    jQuery('.footable').footable();
});
</script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/additional-methods.js" type="text/javascript"></script>

<!-- DateTimePicker -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/jquery.datetimepicker.css" />
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.datetimepicker.js"></script>
<script>
jQuery(document).ready(function(){
    jQuery('#datepicker1').datetimepicker({
        timepicker:false,
        format:'Y-m-d'
    });
    jQuery('#timepicker1').datetimepicker({
        datepicker:false,
        format:'H:i'
    });
});
</script>
</head>
<body <?php body_class(); ?>>
<div id="headerBlock">
	<div class="maincontent noPadding">
	    <div class="section group">
	        <div class="col span_3_of_12 noMargin">
                <div class="logo">
                    <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></a>
                </div>                         
	        </div>
            <div class="col span_9_of_12 noTopBottomMargin">
                <div class="topMenu">
                    <ul>
                        <?php if(is_user_logged_in()){ ?>
                        <?php global $user_ID; $user_role = get_user_role($user_ID); ?>
                        <?php if($user_role != 'subscriber'){ ?>
                        <li>
                            <img src="<?php bloginfo('template_directory'); ?>/images/login-icon.png" />&nbsp;
                                <a href="<?php bloginfo('url'); ?>/my-account">My Account</a>
                        </li>
                        <?php } ?>
                        <li>
                            <i class="fa fa-sign-out"></i>&nbsp;<a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
                        </li>
                        
                        <?php } else { ?>
                        <li>
                            <img src="<?php bloginfo('template_directory'); ?>/images/login-icon.png" />&nbsp;
                            <a href="<?php bloginfo('url'); ?>/signin">Login</a> / <a href="<?php bloginfo('url'); ?>/signup">Signup</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="<?php global $woocommerce; echo $woocommerce->cart->get_cart_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/cart-icon.png" />&nbsp;<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
                        </li>
                    </ul>
                </div>
                <div style="clear: both;"></div>
                <div class="bottomMenu">
                    <?php wp_nav_menu(array('theme_location' => 'topmenu')); ?>
                </div>                         
	        </div>
	    </div>
	</div>
    <div id="rspnavigation"></div>
</div>