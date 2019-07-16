<?php
/**
 * Automatically add a Login link to Primary Menu
 */

function yourname_login_link_to_menu ( $items, $args ) {
    if( ! is_user_logged_in() && $args->theme_location == apply_filters('login_menu_location', 'menu-1') ) {
        $items .= '<li class="menu-item"><a href="#yourname-login">'.__( 'Login/Register', 'yourname' ).'</a></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'yourname_login_link_to_menu', 10, 2 );