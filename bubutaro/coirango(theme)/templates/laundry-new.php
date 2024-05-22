<?php /* Template Name: Laundry New */ ?>
<?php get_header(); ?>
<br><br>
<?php

    $facility_name = $facility_type = $facility_address = $image = $post_id = $description = $error = $url_ext = '';
    if(isset($_GET['id'])){
        $my_postid = $_GET['id'];//This is page id or post id
        $content_post = get_post($my_postid);
        $facility_name = $content_post->post_title;
        $description = $content_post->post_content;
        $post_id = $content_post->ID;
        
        $facility_address = get_post_meta( $post_id, 'laundry_area', true );
        $facility_type = get_post_meta( $post_id, 'laundry_type', true );
     
        
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
        $image = $image[0];
        $url_ext = '?id='.$my_postid;
        
    }

    
    if( isset($_POST['action']) && $_POST['action'] == 'add_new_post' ) { // Check what the post type is here instead
	
		// Do some minor form validation to make sure there is content
		if ($_POST['facility_name'] != '' ) { $title =  $_POST['facility_name']; } else { $error .=  '<li>Please enter a facility name</li>'; }
		if ($_POST['facility_type'] != '') { $facility_type = $_POST['facility_type']; } else { $error .= '<li>Please enter the facility type</li>'; }
		if ($_POST['facility_address'] != '') { $facility_address = $_POST['facility_address']; } else { $error .= '<li>Please enter the facility address</li>'; }
		if ($_POST['post_description'] != '') { $description = $_POST['post_description']; } else { $error .= '<li>Please enter the content</li>'; }

		if($error == ''){
    		$post_type = $_POST['upload_post_type'];
    		$upload_file = $_POST['ad_image'];
    		$upload_mime = $_POST['upload_mime'];
            $upload_title = $_POST['upload_title'];
            $upload_id = $_POST['upload_id'];
    		
    		// Add the content of the form to $post as an array
    		$post = array(
    			'post_title'	=> $title,
    			'post_content'	=> $description,
    			'post_status'	=> 'publish', 
    			'post_type'		=> $post_type ,
    			'post_author'   => get_current_user_id()
    		);
    		
    		if(isset($_POST['post_id'])){
    		    
    		    $post_id = $_POST['post_id'];
    		    
    		    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
                $image = $image[0];
                
    		    $post['ID'] = $post_id;
    
    		    wp_update_post($post);
    		    
    		   
    		}else{
    		    $post_id = wp_insert_post($post);   
    		}
    		
            update_post_meta( $post_id, 'laundry_area', sanitize_text_field( $facility_address ) );
            update_post_meta( $post_id, 'laundry_type', sanitize_text_field( $facility_type) );
    
    		if($upload_file != $image){
        		$attachment = array(
                    'post_mime_type' => $upload_mime,
                    'post_title' => sanitize_file_name($upload_title),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                
                
                $attach_id = wp_insert_attachment( $attachment, $upload_file, $post_id );
                set_post_thumbnail( $post_id, $attach_id );
    		   
    		} ?>
    		<script>
    		    window.location.href = "<?php echo get_site_url(); ?>/laundry-list";
    		</script>
    		<?php	
		}else{
	        echo '<div style="background: #f5c1c1;color: #ef1010;margin: 0 auto;width: 80%;"><ul>'.$error.'</ul></div>';
	    }
	} 
    
    


    ?>
    




<!-- Put this in your theme template file -->
<div class="row">
    <div >
        <?php //include (TEMPLATEPATH . '/templates/custom-sidebar.php'); ?>
    </div>
    <div id="postbox">
    	<form id="new_post" name="new_post" method="post" action="<?php echo get_site_url().'/laundry-new'.$url_ext ?>">
    	    <?php if(!empty($post_id)){ ?>
    	        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
    	    <?php } ?>
    		<p><label for="title">Facility Name</label><br />
    		<input type="text" id="facility_name" value="<?php echo $facility_name;  ?>" tabindex="1" size="20" name="facility_name" /></p>
    		
    		<p><label for="title">Facility Type</label><br />
    		<input type="text" id="facility_type" value="<?php echo $facility_type;  ?>" tabindex="1" size="20" name="facility_type" /></p>
    		
    		<p><label for="title">Facility Address</label><br />
    		<input type="text" id="facility_address" value="<?php echo $facility_address;  ?>" tabindex="1" size="20" name="facility_address" /></p>
    		
    		<p><label for="description">Description</label><br />
    		<?php  wp_editor( $description, 'post_description', array( 'theme_advanced_buttons1' => 'bold, italic, ul, pH, pH_min', "media_buttons" => true, "textarea_rows" => 8, "tabindex" => 4 ) ); ?> 
    		</p>
    		
    		<label for="upload_image">
    		    <div id="upload_image_view" <?php if(!empty($image)){ ?> style="background-image:url('<?php echo $image?>');height:150px;width:300px;background-size: cover;" <?php } ?>></div>
                <input id="upload_image" type="hidden" size="36" name="ad_image" value="<?php echo $image; ?>" /> 
                <input id="upload_mime" type="hidden" size="36" name="upload_mime" value="" /> 
                <input id="upload_title" type="hidden" size="36" name="upload_title" value="" /> 
                <input id="upload_id" type="hidden" size="36" name="upload_id" value="" /> 
                
                <input id="upload_image_button" class="button" type="button" value="Upload Image" />
                <br />Upload an image
            </label>
    		
    		<p><?php //wp_dropdown_categories( 'show_option_none=Category&tab_index=4&taxonomy=category' ); ?></p>
    		<?php $btn_text = (!empty($post_id))?'update':'Publish'; ?>
    		<p><input type="submit" value="<?php echo $btn_text; ?>" tabindex="6" id="submit" name="submit" /></p>
    		
    		<input type="hidden" name="upload_post_type" id="upload_post_type" value="laundry" />
    		<input type="hidden" name="action" value="add_new_post" />
    	</form>
    
    </div>
</div>
<style>
    #postbox{
        width: 80%;
        margin: 0 auto;
    }
    #sidebar{
        width: 30%; 
    }
    .row{
        display:flex;
    }

</style>

<script>
    jQuery(document).ready(function($){


    var custom_uploader;


    $('#upload_image_button').click(function(e) {

        e.preventDefault();

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            //console.log(custom_uploader.state().get('selection').toJSON());
            attachment = custom_uploader.state().get('selection').first().toJSON();
            
            $('#upload_image_view').css({"background":"url("+attachment.url+")","height":"150px", "width":"300px", "background-size": "cover"});
            $('#upload_image').val(attachment.url);
            $('#upload_mime').val(attachment.mime);
            $('#upload_title').val(attachment.title);
            $('#upload_id').val(attachment.id);
        });

        //Open the uploader dialog
        custom_uploader.open();

    });


});
    </script>
<?php get_footer(); ?>