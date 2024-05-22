<?php 
/** 
 * Template Name: Custom Login 
**/


if(isset($_POST['wp-submit'])){
    //print_r($_POST);
    $user_login = $user_email = $_POST['log'];
    $user_password = $_POST['pwd'];
    $user_data = array(
        'user_login'    =>      $user_login,
        'user_pass'     =>      $user_password,
        'user_email'    =>      $user_email,
    );
    
    // Inserting new user to the db
    //wp_insert_user( $user_data );
    
    $creds = array();
    $creds['user_login'] = $user_login;
    $creds['user_password'] = $user_password;
    $creds['remember'] = true;
    
    $user = wp_signon( $creds, false );
   
    if($user->errors){
        $error = $user->errors;
        if(isset($error['invalid_username'])){
            echo $error['invalid_username'][0];
        }else if(isset($error['incorrect_password'])){
            echo $error['incorrect_password'][0];
        }else if(isset($error['incorrect_email'])){
            echo $error['incorrect_email'][0];
        }
       
    }else{
        $userID = $user->ID;
        
        wp_set_current_user( $userID, $user_login );
        wp_set_auth_cookie( $userID, true, false );
        wp_redirect(home_url());
        die; // You have to die here
    }
}



get_header();

?>
<div class="row">
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
<form name="loginform" id="loginform" action="" method="post">
	<div class="m">
		<label for="user_login">Username or Email Address</label>
		<input type="text" name="log" id="user_login" class="input" value="" size="20" required autocapitalize="off">
	</div>

	<div class="user-pass-wrap m">
		<label for="user_pass">Password</label>
		<div class="wp-pwd">
			<input type="password" name="pwd" id="user_pass" class="input password-input" required value="" size="20">
		</div>
	</div>
	<div class="d-flex p-2">
	    <button class="btn btn-primary" type="submit" name="wp-submit" id="wp-submit">Log In</button>
	</div>
	<?php echo do_shortcode('[miniorange_social_login]'); ?>    
</form>
</div>
<div class="col-md-3"></div>
</div>
</div>
<?php 
get_footer();