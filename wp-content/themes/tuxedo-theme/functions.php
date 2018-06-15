<?php
//remove_action( 'admin_notices', 'woothemes_updater_notice' );
add_filter('wp_mail_from_name', 'new_mail_from_name'); 
function new_mail_from_name($old) {
	$site_title = get_bloginfo( 'name' );
	return $site_title;
}

function remove_core_updates(){
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');


register_nav_menus( array(
    'topmenu' => __( 'Top Menu'),
    'information' => __('Information'),
    'customerservice' => __('Customer Service'),
    'extras' => __('Extras'),
    'footerlinks' => __('Footer Links'),
    //'subscribermenu' =>__('Subscriber Menu')
));

function encripted($data){
	$key1 = '644CBEF595BC9';
	$final_data = $key1.'|'.$data;
	$val = base64_encode(base64_encode(base64_encode($final_data)));
	return $val;
}
function decripted($data){
	$val = base64_decode(base64_decode(base64_decode($data)));
	$final_data = explode('|', $val);
	return $final_data[1];
}
add_theme_support( 'post-thumbnails' );
add_image_size('imgsize_80_80', 80, 80, array( 'center', 'center' ), true);
add_image_size('imgsize_175_92', 175, 92, array( 'center', 'center' ), true);
add_image_size('imgsize_523_439', 523, 439, array( 'center', 'center' ), true);
add_image_size('imgsize_934_611', 934, 611, array( 'center', 'center' ), true);
add_image_size('imgsize_175_92', 175, 92, array( 'center', 'center' ), true);

register_sidebar(array('name'=>'Blog Sidebar Widget',
    'before_widget' => '<div class="sidebar_content">',
    'after_widget' => '</div>',
    'before_title' => '<h2 style="">',
    'after_title' => '</h2>',
));
register_sidebar(array('name'=>'Newsletter Widget',
    'before_widget' => '<div class="newsletter-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h2 style="display:none">',
    'after_title' => '</h2>',
));
function limitcontent_by_id($limit, $postid) {
    $post = get_page($postid);
    $fullContent = $post->post_content; 
    $content = explode(' ', $fullContent, $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}
function content($limit, $postid) {
    $post = get_post($postid);
    $fullContent = $post->post_content; 
    $content = explode(' ', $fullContent, $limit);
    if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
    } else {
    $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}
function limitcontent($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}
if (!current_user_can('administrator')):
    show_admin_bar(false);
endif;

add_theme_support('woocommerce');

//require_once (dirname(__FILE__) . '/sample/sample-config.php');

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
   unset( $tabs['reviews'] );
   //unset( $tabs['additional_information'] );
   return $tabs;
}

add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );
/** Remove Showing results functionality site-wide */
function woocommerce_result_count() {
       return;
}

if(!class_exists('ReduxFramework')){
    require_once( dirname( __FILE__ ) . '/theme-framework-lib/redux/ReduxCore/framework.php' );
}

if(!isset($redux_demo)){
    require_once( dirname( __FILE__ ) . '/theme-framework-lib/redux/admin-config.php' );
}

function get_user_role($userid){ 
    if(is_user_logged_in()){
    	$user_info = get_userdata($userid);
     	$role = implode(', ', $user_info->roles);
     	return $role;
    }
}

add_action('init', 'clientlogo_register');
function clientlogo_register() {
    $labels = array(
        'name' => _x('Client Logos', 'post type general name'),
        'singular_name' => _x('Client Logos Item', 'post type singular name'),
        'add_new' => _x('Add New', 'portfolio item'),
        'add_new_item' => __('Add New Client Logos'),
        'edit_item' => __('Edit Client Logos Item'),
        'new_item' => __('New Client Logos Item'),
        'view_item' => __('View Client Logos Item'),
        'search_items' => __('Search Client Logos'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' => get_stylesheet_directory_uri() . '/images/client-logo.png',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','thumbnail')
    );
    register_post_type( 'clientlogo' , $args );
}

add_action( 'admin_menu', 'pilau_change_post_menu_label' );
//add_action( 'init', 'pilau_change_post_object_label' );
function pilau_change_post_menu_label() {
	global $menu;
	$menu[5][0] = 'Blog';
}
function pilau_change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Blog';
	$labels->singular_name = 'Blog';
	$labels->add_new = 'Add Blog';
	$labels->add_new_item = 'Add Blog';
	$labels->edit_item = 'Edit Blog';
	$labels->new_item = 'Blog';
	$labels->view_item = 'View Blog';
	$labels->search_items = 'Search Blog';
	$labels->not_found = 'No Blog found';
	$labels->not_found_in_trash = 'No Blog found in Trash';
}

function get_profile_img($userid){
    $attachment_id = get_user_meta($userid, 'profile_pic', true);
    $image_attributes = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
    if(!empty($image_attributes[0])){
        $return_img = '<img src="'.$image_attributes[0].'" />';
    } else {
        $return_img = '<img src="'.get_bloginfo('template_directory').'/images/noprofile.png" />';
    }
    return $return_img;
}

function get_featured_image($postid, $thumb){
    $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($postid), $thumb );
    ///$image_attributes = wp_get_attachment_image_src( $attachment_id, $thumb );
    if(!empty($image_attributes[0])){
        $return_img = '<img class="ghsdghs" src="'.$image_attributes[0].'" />';
    } else {
        $return_img = '<img class="ghsdghs" src="'.get_bloginfo('template_directory').'/images/noprofile.png" />';
    }
    return $return_img;
}

add_filter('manage_users_columns', 'pippin_add_user_id_column');
function pippin_add_user_id_column($columns) {
    $columns['user_status'] = 'User Status';
    return $columns;
}

add_action('woocommerce_checkout_process', 'custom_checkout_field_validation');
function custom_checkout_field_validation() {
    global $woocommerce;
    global $user_ID;
    if (empty($_POST['born_in'])){
        wc_add_notice( 'Please update your <a href="'.get_bloginfo('url').'/update-your-measurements">measurements</a>', 'error' );
    }
}

add_action( 'template_redirect', 'add_product_to_cart' );
function add_product_to_cart($product_id) {
	if ( ! is_admin() ) {
		$found = false;
		//check if product already in cart
		if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
			foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if ( $_product->id == $product_id )
					$found = true;
			}
			// if product not found, add it
			if ( ! $found )
				WC()->cart->add_to_cart( $product_id );
		} else {
			// if no products in cart, add it
			WC()->cart->add_to_cart( $product_id );
		}
	}
}


/*
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab'] = array(
		'title' 	=> __( 'New Product Tab', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;

}
function woo_new_product_tab_content() {

	// The new tab content

	echo '<h2>New Product Tab</h2>';
	echo '<p>Here\'s your new product tab.</p>';
	
}
*/

add_action('woocommerce_product_write_panel_tabs', 'barcode_product_write_panel_tabs');
function barcode_product_write_panel_tabs(){
    ?>
    <li class="cdog_product_options_tab"><a href="#barcode_product_options"><?php _e('Barcode', 'woocommerce'); ?></a></li>
    <?php
}
add_action('woocommerce_product_write_panels', 'barcode_product_write_panels');
function barcode_product_write_panels(){
    global $post;
    $opening_hours_options = array(
        'title' => get_post_meta($post->ID, 'opening_hours_title', true),
        'content' => get_post_meta($post->ID, 'opening_hours_content', true),
    );
?>
<div id="barcode_product_options" class="panel woocommerce_options_panel">
    <div class="club-opening-hours">
<?php //$sku = get_post_meta($post->ID, '_sku', true); ?>
<?php $sku = 'tux'.$post->ID; ?>
<?php if(!empty($sku)){ ?>
<!-- <div><p>This barcode generated from SKU</p></div> -->
<div style="padding: 50px;"><img alt="<?php echo $sku; ?>" src="<?php bloginfo('template_directory'); ?>/theme-framework-lib/barcode.php?codetype=Code39&size=40&text=<?php echo $sku; ?>" /></div>
<?php } else { ?>
    <p class="error">Please set product SKU to generate the barcode</p>
<?php } ?>
    </div>
</div>
<?php
}

function display_product_price($postid){
    $product = wc_get_product( $postid );
    if($product->product_type=='variable') {
        $available_variations = $product->get_available_variations();
        $variation_id=$available_variations[0]['variation_id'];
        $variable_product1= new WC_Product_Variation( $variation_id );
        $regular_price = $variable_product1 ->regular_price;
        $sales_price = $variable_product1 ->sale_price;
    } else {
        $regular_price = get_post_meta( $postid, '_regular_price', true);
    }
    
    return $regular_price;
}
 
add_action('manage_users_custom_column',  'pippin_show_user_id_column_content', 10, 3);
function pippin_show_user_id_column_content($value, $column_name, $user_id) {
    $user = get_userdata( $user_id );
	if ( 'user_status' == $column_name ){
	   if($user->user_status == 1){
	       $status = "Active";
	   }
	}
		return $status;
    return $value;
}

add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ($_POST['pickup']) update_post_meta( $order_id, 'pickup', esc_attr($_POST['pickup']));
	if ($_POST['product_components']) update_post_meta( $order_id, 'product_components', esc_attr($_POST['product_components']));
    if ($_POST['born_in']) update_post_meta( $order_id, 'born_in', esc_attr($_POST['born_in']));
    if ($_POST['chest']) update_post_meta( $order_id, 'chest', esc_attr($_POST['chest']));
    if ($_POST['height_ft']) update_post_meta( $order_id, 'height_ft', esc_attr($_POST['height_ft']));
    if ($_POST['height_inch']) update_post_meta( $order_id, 'height_inch', esc_attr($_POST['height_inch']));
    if ($_POST['preferredfit']) update_post_meta( $order_id, 'preferredfit', esc_attr($_POST['preferredfit']));
    if ($_POST['shoe_size_in']) update_post_meta( $order_id, 'shoe_size_in', esc_attr($_POST['shoe_size_in']));
    if ($_POST['shoulder']) update_post_meta( $order_id, 'shoulder', esc_attr($_POST['shoulder']));
    if ($_POST['stomach']) update_post_meta( $order_id, 'stomach', esc_attr($_POST['stomach']));
    if ($_POST['weight_lbs']) update_post_meta( $order_id, 'weight_lbs', esc_attr($_POST['weight_lbs']));
    if ($_POST['chest_size_in']) update_post_meta( $order_id, 'chest_size_in', esc_attr($_POST['chest_size_in']));
    if ($_POST['chest_length_in']) update_post_meta( $order_id, 'chest_length_in', esc_attr($_POST['chest_length_in']));
    if ($_POST['waist_size_in']) update_post_meta( $order_id, 'waist_size_in', esc_attr($_POST['waist_size_in']));
    if ($_POST['waist_length_in']) update_post_meta( $order_id, 'waist_length_in', esc_attr($_POST['waist_length_in']));
    if ($_POST['neck_size_in']) update_post_meta( $order_id, 'neck_size_in', esc_attr($_POST['neck_size_in']));
    if ($_POST['sleeve_size_in']) update_post_meta( $order_id, 'sleeve_size_in', esc_attr($_POST['sleeve_size_in']));
    if ($_POST['my_neck_size']) update_post_meta( $order_id, 'my_neck_size', esc_attr($_POST['my_neck_size']));
    if ($_POST['my_chest_size']) update_post_meta( $order_id, 'my_chest_size', esc_attr($_POST['my_chest_size']));
    if ($_POST['my_overarm_size']) update_post_meta( $order_id, 'my_overarm_size', esc_attr($_POST['my_overarm_size']));
    if ($_POST['my_jacket_length']) update_post_meta( $order_id, 'my_jacket_length', esc_attr($_POST['my_jacket_length']));
    if ($_POST['my_shoulders_size']) update_post_meta( $order_id, 'my_shoulders_size', esc_attr($_POST['my_shoulders_size']));
    if ($_POST['my_arms_size']) update_post_meta( $order_id, 'my_arms_size', esc_attr($_POST['my_arms_size']));
    if ($_POST['my_waist']) update_post_meta( $order_id, 'my_waist', esc_attr($_POST['my_waist']));
    if ($_POST['my_hip']) update_post_meta( $order_id, 'my_hip', esc_attr($_POST['my_hip']));
    if ($_POST['my_outseam']) update_post_meta( $order_id, 'my_outseam', esc_attr($_POST['my_outseam']));
    
    if ($_POST['event_date']) update_post_meta( $order_id, 'event_date', esc_attr($_POST['event_date']));
    if ($_POST['event_name']) update_post_meta( $order_id, 'event_name', esc_attr($_POST['event_name']));
    if ($_POST['event_type']) update_post_meta( $order_id, 'event_type', esc_attr($_POST['event_type']));
}

add_action( 'add_meta_boxes', 'add_meta_boxes' );

function add_meta_boxes(){
    add_meta_box( 
        'woocommerce-order-my-custom', 
        __( 'User Measurements & Additional Informations' ), 
        'order_my_custom', 
        'shop_order', 
        'normal', 
        'default' 
    );
}
function order_my_custom(){
?>
<style>
table.order_my_custom{
    width: 100%;
}
.order_my_custom table{
    width: 100%;
}
.order_my_custom tr td{
    vertical-align: top;
    text-align: left;
    border: 1px solid #CCCCCC;
    margin-right: 20px;
    padding: 20px;
}
.order_my_custom h2{
    margin-top: 0 !important;
}
.order_my_custom tr td tr td{
    padding: 0 !important;
    margin: 0;
    border:none;
}
</style>
<table class="order_my_custom">
    <tr>
        <td>
            <h2>THE BASICS</h2>
            <table>
                <tr>
                    <th>BORN IN</th>
                    <td><?php echo get_post_meta($_GET['post'], 'born_in', true); ?></td>
                </tr>
                <tr>
                    <th>HEIGHT</th>
                    <td><?php echo get_post_meta($_GET['post'], 'height_ft', true); ?>'<?php echo get_post_meta($_GET['post'], 'height_inch', true); ?>"</td>
                </tr>
                <tr>
                    <th>WEIGHT</th>
                    <td><?php echo get_post_meta($_GET['post'], 'weight_lbs', true); ?></td>
                </tr>
                <tr>
                    <th>SHOULDERS</th>
                    <td><?php echo get_post_meta($_GET['post'], 'shoulder', true); ?></td>
                </tr>
                <tr>
                    <th>CHEST</th>
                    <td><?php echo get_post_meta($_GET['post'], 'chest', true); ?></td>
                </tr>
                <tr>
                    <th>STOMACH</th>
                    <td><?php echo get_post_meta($_GET['post'], 'stomach', true); ?></td>
                </tr>
                <tr>
                    <th>PREFERRED FIT</th>
                    <td><?php echo get_post_meta($_GET['post'], 'preferredfit', true); ?></td>
                </tr>
            </table>
        </td>
        <td>
            <h2>MY EXACT SIZE</h2>
            <table>
                <tr>
                    <th>JACKET</th>
                    <td><?php echo get_post_meta($_GET['post'], 'chest_size_in', true); ?> <?php echo get_post_meta($_GET['post'], 'chest_length_in', true); ?></td>
                </tr>
                <tr>
                    <th>WAIST</th>
                    <td><?php echo get_post_meta($_GET['post'], 'waist_size_in', true); ?></td>
                </tr>
                <tr>
                    <th>INSEAM</th>
                    <td><?php echo get_post_meta($_GET['post'], 'waist_length_in', true); ?></td>
                </tr>
                <tr>
                    <th>NECK</th>
                    <td><?php echo get_post_meta($_GET['post'], 'neck_size_in', true); ?></td>
                </tr>
                <tr>
                    <th>SLEEVE</th>
                    <td><?php echo get_post_meta($_GET['post'], 'sleeve_size_in', true); ?></td>
                </tr>
                <tr>
                    <th>SHOE</th>
                    <td><?php echo get_post_meta($_GET['post'], 'shoe_size_in', true); ?></td>
                </tr>
            </table>
        </td>
        <td>
            <h2>MY MEASUREMENTS</h2>
            <table>
                <tr>
                    <th>NECK</th>
                    <td><?php echo get_post_meta($_GET['post'], 'my_neck_size', true); ?>"</td>
                </tr>
                <tr>
                    <th>UNDERARM</th>
                    <td><?php echo get_post_meta($_GET['post'], 'my_chest_size', true); ?>"</td>
                </tr>
                <tr>
                    <th>OVERARM</th>
                    <td><?php echo get_post_meta($_GET['post'], 'my_overarm_size', true); ?>"</td>
                </tr>
                <tr>
                    <th>JACKET</th>
                    <td><?php echo get_post_meta($_GET['post'], 'my_jacket_length', true); ?>"</td>
                </tr>
                <tr>
                    <th>SHOULDER</th>
                    <td><?php echo get_post_meta($_GET['post'], 'my_shoulders_size', true); ?>"</td>
                </tr>
                <tr>
                    <th>ARM</th>
                    <td><?php echo get_post_meta($_GET['post'], 'my_arms_size', true); ?>"</td>
                </tr>
                <tr>
                    <th>WAIST</th>
                    <td><?php echo get_post_meta($_GET['post'], 'my_waist', true); ?>"</td>
                </tr>
                <tr>
                    <th>HIP</th>
                    <td><?php echo get_post_meta($_GET['post'], 'my_hip', true); ?>"</td>
                </tr>
                <tr>
                    <th>PANT</th>
                    <td><?php echo get_post_meta($_GET['post'], 'my_outseam', true); ?>"</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table class="order_my_custom">
    <tr>
        <td>
            <h2>Additional Informations</h2>
            <div><strong>Product Components : </strong><?php echo get_post_meta($_GET['post'], 'product_components', true); ?></div>
            <div><strong>Pickup : </strong><?php echo get_post_meta($_GET['post'], 'pickup', true); ?></div>
        </td>
    </tr>
</table>
<?php } ?>
<?php
function gillar_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
				<?php
					//echo get_avatar( $comment, 44 );
                ?>
                <div class="comment-text">
                <p class="meta">
                <?php
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( ' - ' ) . '</span>' : ''
					);
                ?>
    			<?php if ( '0' == $comment->comment_approved ) : ?>
    				<?php _e( 'Your comment is awaiting moderation.' ); ?>
    			<?php endif; ?>
        			<section class="comment-content comment">
        				<?php comment_text(); ?>
        				<?php edit_comment_link( __( 'Edit' ), '<strong class="edit-link">', '</strong>' ); ?>
        			</section><!-- .comment-content -->
        				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply' ), 'after' => ' <span></span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                         
                        <?php
        					printf( '<time datetime="%2$s">%3$s</time>',
        						esc_url( get_comment_link( $comment->comment_ID ) ),
        						get_comment_time( 'c' ),
        						/* translators: 1: date, 2: time */
        						sprintf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() )
        					);
        				?>
                        <div style="clear: both;"></div>
                    </p>
                </div>
			</div><!-- .comment-meta -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {

	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}

add_action( 'woocommerce_checkout_order_processed', 'send_sms_to_customer_function' );
function send_sms_to_customer_function($order_id){
    
    $price = 0; 
    $order = new WC_Order( $order_id ); 
    $items = $order->get_items();
    
    foreach ( $items as $item ) { 
        $item_id = $item['product_id']; 
        $product = new WC_Product($item_id); 
        $price = $price + $product->price;
    }
        
    
    
    $msg = "We have received your order #".$order_id." amounting to ".get_woocommerce_currency_symbol( $currency )." ".$price." and it is being processed.";
    
    $user = "formalapproach";
    $password = "uOipPTRd";
    $api_id = "3552358";
    $baseurl ="http://api.clickatell.com";
    
    $billing_country = strtolower(get_post_meta($order_id,'_billing_country', true));
    $billing_phone = get_post_meta($order_id,'_billing_phone', true);
    
    $text = urlencode($msg);
    //$to = "919093207269";
    $xml=simplexml_load_file(get_template_directory()."/country-phone-codes.xml") or die("Error: Cannot create object");
    foreach($xml as $country) { 
        //echo $country['phoneCode'] . ", ";
        if($country['code'] == $billing_country){
            $phone_code = $country['phoneCode'];
        }
    }
    $to = $phone_code.$billing_phone;
 
    // auth call
    $url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";
 
    // do auth call
    $ret = file($url);
 
    // explode our response. return string is on first line of the data returned
    $sess = explode(":",$ret[0]);
    if ($sess[0] == "OK") {
 
        $sess_id = trim($sess[1]); // remove any whitespace
        $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
        
        // do sendmsg call
        $ret = file($url);
        $send = explode(":",$ret[0]);
 
        if ($send[0] == "ID") {
            $report = "successnmessage ID: ". $send[1];
        } else {
            $report = "send message failed";
        }
    } else {
        $report = "Authentication failure: ". $ret[0];
    }
    
    /*$from = get_option('admin_email');
    $headers = 'From: '.$from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $subject = "Activate your account";
    //$msg = "We have received your order ".$order_id." amounting to ".get_woocommerce_currency_symbol( $currency )." ".$price." and it is being processed."; 
    wp_mail( 'bhulbhal1981@gmail.com', $subject, $report, $headers );*/
}
update_option('image_default_align', 'center' );
update_option('image_default_link_type', 'none' );
update_option('image_default_size', 'large' );

/* Code to add extra column in Order page (WP Admin Page) */
add_filter("manage_edit-shop_order_columns", "woo_order_extra_columns");
function woo_order_extra_columns($columns){
    
    $new_columns = (is_array($columns)) ? $columns : array();
    unset($new_columns['customer_message']);
    $new_columns['wearing_date'] = __('Date of Wearing');
	return $new_columns;
}

add_action("manage_posts_custom_column",  "woo_order_extra_columns_content");
function woo_order_extra_columns_content($column){
    global $post, $woocommerce, $the_order;
    $order_id = $post->ID;
    switch ($column){
        case "wearing_date":
            $wearing_date = get_post_meta($order_id, 'event_date', true);
            if($wearing_date){
                echo date('jS F, Y', strtotime($wearing_date));
            } else {
                echo '-';
            }
		break;	
    }
}

/* Code for custom order for woocommerce */
add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page() {
    add_submenu_page( 'woocommerce', 'Process Returned Garments', 'Process Returned Garments', 'manage_options', 'process-garments', 'process_garments_function' );
    //add_submenu_page('', 'Order Details', 'Order Details', 'manage_options', 'rental-orders-details', 'order_details_function'); 
}

function date_of_wearing($order_id){
    $wearing_date = get_post_meta($order_id, 'event_date', true);
    if($wearing_date){
        echo date('jS F, Y', strtotime($wearing_date));
    } else {
        echo '-';
    }
}

function shipping_address($order_id){
    echo get_post_meta($order_id, '_shipping_first_name', true).', '.get_post_meta($order_id, '_shipping_last_name', true).', '.get_post_meta($order_id, '_shipping_address_1', true).', '.get_post_meta($order_id, '_shipping_address_2', true).', '. get_post_meta($order_id, '_shipping_city', true).', '.get_post_meta($order_id, '_shipping_state', true).', '.get_post_meta($order_id, '_shipping_country', true).', '.get_post_meta($order_id, '_shipping_postcode', true);
}

function item_count($order_id){
    global $wpdb;
    $order = new WC_Order( $order_id );
    $items = $order->get_items();
    $total_items = 0;
    foreach ( $items as $item ) {
        //$product_name = $item['name'];
        //$product_id = $item['product_id'];
        //$product_variation_id = $item['variation_id'];
        $total_items++;
    }
    if($total_items == 1){
        echo $total_items.' Item';
    } else {
        echo $total_items.' Items';
    }
}

function get_total_amount($order_id){
    $order = wc_get_order( $order_id );
    echo $total = get_woocommerce_currency_symbol( $currency ).' '.(float) $order->get_total();
    echo '<small class="meta"> Via '.get_post_meta($order_id, '_payment_method_title', true).'</small>';
}


function generate_barcode($product_id){
    $barcode_str = $product_id;
?>
<img alt="<?php echo $barcode_str; ?>" src="<?php bloginfo('template_directory'); ?>/theme-framework-lib/barcode.php?codetype=Code39&size=40&text=<?php echo $barcode_str; ?>" />
<?php } ?>
<?php

?>