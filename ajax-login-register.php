<?php

require plugin_dir_path( __FILE__ ).'add-to-menu.php';
require plugin_dir_path( __FILE__ ).'ajax-handle.php';
require plugin_dir_path( __FILE__ ).'form-attach-to-footer.php';

function yourname_ajax_login_scripts() {
	wp_enqueue_style( 'user-login', get_template_directory_uri().'/'.basename(__DIR__) .'/user-login.css', array(), null );
	wp_enqueue_script( 'ajax-login-register-script', get_template_directory_uri().'/'.basename(__DIR__).'/ajax.js', array( 'jquery' ), null, true );
	wp_localize_script('ajax-login-register-script', 'yournameajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'yourname_ajax_login_scripts' );