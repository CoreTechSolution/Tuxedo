<?php /* Template Name: Edit Blog Post Template */ ?>
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
                <div class="BlogSectionAdmin dashboardPanel">
                    <h1><?php the_title(); ?></h1>
                    <?php
                        global $user_ID;
                        if(isset($_POST['editpost'])){
                            $postarg = array(
                                'ID'           => $_GET['postid'],
                                'post_title' => $_POST['posttitle'],
                                'post_content' => $_POST['postdescription'],
                                'post_status' => 'pending',
                                'post_category'  => array($_POST['post_cat'])
                            );
                            
                            wp_update_post( $postarg );
                            
                            if($_FILES["featured_img"]["error"] == 0) {
                                
                                require_once(ABSPATH . "wp-admin" . '/includes/image.php'); 
                                require_once(ABSPATH . "wp-admin" . '/includes/file.php'); 
                                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
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
                                        update_post_meta($new_post_id, '_thumbnail_id', $attach_id, true);
                                        //wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $file['file'] ) );   
                                        //add_user_meta($new_user_id, 'profile_pic', wp_get_attachment_url($id));     
                                    } else {       // Not an image.        
                                        // Die and let the user know that they made a mistake.       
                                        wp_die('No image was uploaded.');     
                                        }   
                                    }  
                                }
                            }
                            header('Location: '.get_bloginfo('home').'/blog-list');
                        }
                    ?>
                                <div class="commonForm">
                                    <form id="editpost" action="" method="post" enctype="multipart/form-data">
                                        <div>
                                            <label>Post Title</label>
                                            <input type="text" name="posttitle" value="<?php echo get_the_title( $_GET['postid'] ); ?>" />
                                        </div>
                                        <div style="padding-top: 10px;">
                                            <label>Post Description</label>
                                            <textarea name="postdescription"><?php $post = get_page($_GET['postid']); $content = $post->post_content; echo $content;  ?></textarea>
                                        </div>
                                        <div style="padding-top: 10px;">
                                            <label>Category</label>
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
                                            <select name="post_cat">
                                                <option value="">Select</option>
                                                <?php foreach($categories as $cat){ ?>
                                                <option value="<?php echo $cat->term_id; ?>" <?php if($cat->term_id == $cats[0]->term_id){ echo "selected='selected'"; } ?>><?php echo $cat->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div style="padding-top: 10px;">
                                            <label>Featured Image</label>
                                            <div><?php echo get_the_post_thumbnail( $_GET['postid'], 'thumbnail' ); ?> </div>
                                            <input type="file" name="featured_img" />
                                        </div>
                                        <div style="padding-top: 10px;"><input type="submit" name="editpost" value="Update" /></div>
                                    </form>
                                </div>
                            </div> 
            </div>
	    </div>
	</div>
</div>
<?php } else { header('Location: '.get_bloginfo('home').'/sign-in'); } ?>
<?php get_footer(); ?>