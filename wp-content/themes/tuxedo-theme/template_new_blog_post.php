<?php /* Template Name: New Blog Post Template */ ?>
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
                <div class="dashboardPanel newblog">
                    <h1><?php the_title(); ?></h1>
                    <?php
                        global $user_ID;
                        if(isset($_POST['add_post'])){
                            $postarg = array(
                                'post_type' => 'post',
                                'post_author' => $user_ID,
                                'post_title' => $_POST['post_title'],
                                'post_content' => $_POST['post_content'],
                                'post_status' => 'pending',
                                'post_category'  => array($_POST['post_category']),
                                'post_date' => date('Y-m-d H:i:s')
                            );
                            require_once(ABSPATH . "wp-admin" . '/includes/image.php'); 
                            require_once(ABSPATH . "wp-admin" . '/includes/file.php'); 
                            require_once(ABSPATH . "wp-admin" . '/includes/media.php');
                                
                            $new_post_id = wp_insert_post( $postarg );
                            
                            $keys = array_keys($_FILES);
                            foreach ( $_FILES as $image ) {   // if a files was upload   
                            if ($image['size']) {     // if it is an image     
                                if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {       
                                    $override = array('test_form' => false);       // save the file, and store an array, containing its location in $file       
                                    $file = wp_handle_upload( $image, $override );
                                    $attachment = array(
                                        'post_title' => $image['name'],
                                        'post_content' => '',
                                        'post_type' => 'attachment',
                                        'post_mime_type' => $image['type'],
                                        'guid' => $file['url']
                                    );
                                    
                                    $attach_id = wp_insert_attachment( $attachment, $file[ 'file' ], $new_post_id);
                                    $attach_data = wp_generate_attachment_metadata( $attach_id, $file['file'] );
                                    wp_update_attachment_metadata( $attach_id, $attach_data );
                                    add_post_meta($new_post_id, '_thumbnail_id', $attach_id, true);
                                    //wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $file['file'] ) );   
                                    //add_user_meta($new_user_id, 'profile_pic', wp_get_attachment_url($id));     
                                } else {       // Not an image.        
                                    // Die and let the user know that they made a mistake.       
                                    wp_die('No image was uploaded.');     
                                    }   
                                }  
                            } //
                            header('Location: '.get_bloginfo('home').'/my-blog');
                        }
                    ?>
                    <div class="commonForm">
                        <form id="" action="" method="post" enctype="multipart/form-data">
                            <div>
                                <label>Post Title</label>
                                <input type="text" name="post_title" />
                            </div>
                            <div>
                                <label>Post Description</label>
                                <textarea name="post_content"></textarea>
                            </div>
                            <div style="width: 50%;">
                                <label>Category</label>
                                <select name="post_category">
                                    <?php
                                        $cat_args = array(
                                        	'type'                     => 'post',
                                        	'child_of'                 => 0,
                                        	'parent'                   => '',
                                        	'orderby'                  => 'name',
                                        	'order'                    => 'ASC',
                                        	'hide_empty'               => 1,
                                        	'hierarchical'             => 1,
                                        	'exclude'                  => 1,
                                        	'include'                  => '',
                                        	'number'                   => '',
                                        	'taxonomy'                 => 'category',
                                        	'pad_counts'               => false 
                                        );
                                        $categories = get_categories( $cat_args );
                                        //print_r($categories);
                                        $cats = get_the_category($_GET['postid']);
                                        //print_r($cats);
                                    ?>
                                    <option value="">Select Category</option>
                                    <?php foreach($categories as $cat){ ?>
                                    <option value="<?php echo $cat->term_id; ?>" <?php if($cat->term_id == $cats[0]->term_id){ echo "selected='selected'"; } ?>><?php echo $cat->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label>Featured Image</label>
                                <input type="file" name="featured_image" />
                            </div>
                            <div>
                                <input type="submit" name="add_post" value="Create Post" />
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
	    </div>
	</div>
</div>
<?php } else { header('Location: '.get_bloginfo('home').'/sign-in'); } ?>
<?php get_footer(); ?>