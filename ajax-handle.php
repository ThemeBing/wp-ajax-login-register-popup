<?php
// LOGIN
function yourname_login_member(){

  		// Get variables
		$user_login		= $_POST['yourname_user_login'];	
		$user_pass		= $_POST['yourname_user_pass'];


		// Check CSRF token
		if( !check_ajax_referer( 'ajax-login-nonce', 'login-security', false) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Session token has expired, please reload the page and try again', 'yourname').'</div>'));
		}
	 	
	 	// Check if input variables are empty
	 	elseif( empty($user_login) || empty($user_pass) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Please fill all form fields', 'yourname').'</div>'));
	 	} else { // Now we can insert this account

	 		$user = wp_signon( array('user_login' => $user_login, 'user_password' => $user_pass), false );

		    if( is_wp_error($user) ){
				echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.$user->get_error_message().'</div>'));
			} else{
				echo json_encode(array('error' => false, 'message'=> '<div class="alert alert-success">'.__('Login successful, reloading page...', 'yourname').'</div>'));
			}
	 	}

	 	die();
}
add_action('wp_ajax_nopriv_yourname_login_member', 'yourname_login_member');



// REGISTER
function yourname_register_member(){

  		// Get variables
		$user_login	= $_POST['yourname_user_login'];	
		$user_email	= $_POST['yourname_user_email'];
		
		// Check CSRF token
		if( !check_ajax_referer( 'ajax-login-nonce', 'register-security', false) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Session token has expired, please reload the page and try again', 'yourname').'</div>'));
			die();
		}
	 	
	 	// Check if input variables are empty
	 	elseif( empty($user_login) || empty($user_email) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Please fill all form fields', 'yourname').'</div>'));
			die();
	 	}
		
		$errors = register_new_user($user_login, $user_email);	
		
		if( is_wp_error($errors) ){

			$registration_error_messages = $errors->errors;

			$display_errors = '<div class="alert alert-danger">';
			
				foreach($registration_error_messages as $error){
					$display_errors .= '<p>'.$error[0].'</p>';
				}

			$display_errors .= '</div>';

			echo json_encode(array('error' => true, 'message' => $display_errors));

		} else {
			echo json_encode(array('error' => false, 'message' => '<div class="alert alert-success">'.__( 'Registration complete. Please check your e-mail.', 'yourname').'</p>'));
		}
	 

	 	die();
}
add_action('wp_ajax_nopriv_yourname_register_member', 'yourname_register_member');