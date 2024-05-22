<?php /* Template Name: Custom Signup */ ?>

<?php get_header(); ?>

<br><br>

<?php 

require_once(ABSPATH . 'wp-admin/includes/image.php');

require_once(ABSPATH . 'wp-admin/includes/file.php');

require_once(ABSPATH . 'wp-admin/includes/media.php');



$errors = array();

if(isset($_POST['submit'])){

    $username = $_POST['username'];

    $firstname = $_POST['fname'];

    $lastname = $_POST['lname'];

    $password = $_POST['password'];

    $email = $_POST['email'];

    if ( empty( $username ) || empty( $password ) || empty( $email ) ) {

        $errors[] = 'Username is missing';

    }

    

    if ( 4 > strlen( $username ) ) {

        $errors[] = 'Username too short. At least 4 characters is required';

    }

    

    if ( username_exists( $username ) ){

       $errors[] = 'Sorry, that username already exists!';

    }

    

    if ( !is_email( $email ) ) {

        $errors[] = 'Email is not valid';

    }



    if ( email_exists( $email ) ) {

        $errors[] = 'Email Already in use';

    }

    

    if ( !empty($errors) ) {

        echo "<div style='width:50%;margin:0 auto;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;'>";

        foreach ( $errors as $error ) {

         

            echo '<div>';

            echo '<strong>ERROR</strong>:';

            echo $error . '<br/>';

            echo '</div>';

             

        }

        echo "</div><br>";

     

    }else{

        

        $userdata = array(

            'user_login'    =>   $username,

            'user_email'    =>   $email,

            'user_pass'     =>   $password,

            'first_name'    =>   $firstname,

            'last_name'     =>   $lastname

        );

        $user = wp_insert_user( $userdata );

        if(!empty($user)){

            if($_FILES['uploadedfile']['name'] != ''){

                $uploadedfile = $_FILES['uploadedfile'];

                $upload_overrides = array( 'test_form' => false );

            

                $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

                $imageurl = "";

                if ( $movefile && ! isset( $movefile['error'] ) ) {

                    $imageurl = $movefile['url'];

                   //echo "url : ".$imageurl;

                } else {

                    echo $movefile['error'];

                }

            }

            update_user_meta($user,'moopenid_user_avatar', $imageurl);

            echo "<div style='background: #cfefcf;color: #035303;padding: 10px;width: 50%;margin: 0 auto;'>You are registrated successfull!</div>";

        }

        

    }

  

}



?>





<form action="" method="post" style="width:50%;margin:0 auto;" enctype="multipart/form-data">

    <div>

        <label for="firstname">First Name</label>

        <input type="text" name="fname" value="<?php echo ( isset( $_POST['fname']) ? $firstname : null ) ?>" required>

    </div>

     

    <div>

        <label for="website">Last Name</label>

        <input type="text" name="lname" value="<?php echo ( isset( $_POST['lname']) ? $lastname : null ) ?>" required>

    </div>

    

    <div>

        <label for="username">Username <strong>*</strong></label>

        <input type="text" name="username" value="<?php echo ( isset( $_POST['username'] ) ? $username : null ) ?>" required>

    </div>

    

    <div>

        <label for="email">Email <strong>*</strong></label>

        <input type="text" name="email" value="<?php echo ( isset( $_POST['email']) ? $email : null ) ?>" required>

    </div>

    

    <div>

        <label for="password">Password <strong>*</strong></label>

        <input type="password" name="password" value="<?php echo ( isset( $_POST['password'] ) ? $password : null ) ?>" required>

    </div>

     

    <div>

        <label for="upload"><?php _e('Choose an image from your computer:','user-avatar'); ?></label><br /><input type="file" id="upload" name="uploadedfile" />

            <input type="hidden" name="action" value="save" />

            <?php wp_nonce_field('user-avatar') ?>

    </div>

    

    <div>

        <br>

        <input type="submit" name="submit" value="Register"/>

    </div>

</form>