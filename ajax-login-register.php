<?php 


require get_template_directory() . '/ajax-login-register/add-to-menu.php';
require get_template_directory() . '/ajax-login-register/ajax-handle.php';
require get_template_directory() . '/ajax-login-register/form-attach-to-footer.php';

function yourname_ajax_login_scripts() {
	wp_enqueue_style( 'user-login', get_template_directory_uri() . '/ajax-login-register/user-login.css', array(), null );
	wp_enqueue_script( 'ajax-login-register-script', get_template_directory_uri() . '/ajax-login-register/ajax.js', array( 'jquery' ), null, true );
	wp_localize_script('ajax-login-register-script', 'yournameajax', array( 
			    	'ajaxurl' => admin_url( 'admin-ajax.php' ),
			    ));
}
add_action( 'wp_enqueue_scripts', 'yourname_ajax_login_scripts' );