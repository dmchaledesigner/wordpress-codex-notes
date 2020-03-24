<?php
/*
    Plugin Name: My Custom WP Functions
    Description: Custom Additionals
    Author: David Mchale
    Author URI: http://www.dmchaledesigner.com/
*/



    /*---------------------
 Unregister default widgets.
 ------------------------*/

function custom_unregister_default_widgets() {

    unregister_widget( 'WP_Widget_Archives' );
    unregister_widget( 'WP_Widget_Calendar' );
    unregister_widget( 'WP_Widget_Categories' );
    unregister_widget( 'WP_Widget_Meta' );
    unregister_widget( 'WP_Widget_Pages' );
    unregister_widget( 'WP_Widget_Recent_Comments' );
    unregister_widget( 'WP_Widget_Recent_Posts' );
    unregister_widget( 'WP_Widget_RSS' );
    unregister_widget( 'WP_Widget_Search' );
    unregister_widget( 'WP_Nav_Menu_Widget' );
    unregister_widget( 'WP_Widget_Tag_Cloud' );
    unregister_widget( 'Akismet_Widget' );

}
add_action( 'widgets_init', 'custom_unregister_default_widgets' );


/*-------------------------------
HIDE THEME UPDATES ON DASHBOARD
--------------------------------*/

add_action('admin_menu','wphidenag');
function wphidenag() {
remove_action( 'admin_notices', 'update_nag', 3 );
}


/*---------------------
 Hide dashboard widgets.
 ---------------------*/

function custom_hide_dashboard_widgets() {

    global $wp_meta_boxes;

    // Today widget.
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
    // Last comments.
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
    // Incoming links.
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
    // Plugins.
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
    // WordPress blog.
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
    // WordPress news.
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );

}
add_action( 'wp_dashboard_setup', 'custom_hide_dashboard_widgets' );