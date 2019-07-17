<?php

/**
 * Plugin Name: Ajax Login Register
 * Plugin URI:  https://github.com/farhan01617/wp-ajax-login-register-popup
 * Description: Handle the basics with this plugin.
 * Version:     1.0.0
 * Author:      Farhan Khan
 * Author URI:  https://github.com/farhan01617
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: alg
 * Domain Path: /languages
 */

require plugin_dir_path( __FILE__ ).'add-to-menu.php';
require plugin_dir_path( __FILE__ ).'ajax-handle.php';
require plugin_dir_path( __FILE__ ).'form-attach-to-footer.php';

function yourname_ajax_login_scripts() {
	wp_enqueue_style( 'user-login', plugin_dir_url( __FILE__ ).'user-login.css', array(), null );
	wp_enqueue_script( 'ajax-login-register-script', plugin_dir_url( __FILE__ ) .'ajax.js', array( 'jquery' ), null, true );
	wp_localize_script('ajax-login-register-script', 'yournameajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'yourname_ajax_login_scripts' );