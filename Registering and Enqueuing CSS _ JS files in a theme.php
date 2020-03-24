Registering and Enqueuing CSS & JS files in a theme

<?php
function wppro_script_enqueuer() {
    //first we register the styles
    wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.css');
    wp_register_style( 'bootstrap-responsive', get_stylesheet_directory_uri().'/assets/css/bootstrap-responsive.css');
    wp_register_style( 'docs', get_stylesheet_directory_uri().'/assets/css/docs.css');
    wp_register_style( 'prettify', get_stylesheet_directory_uri().'/assets/js/google-code-prettify/prettify.css');


    //now we enqueue them
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'bootstrap-responsive' );
    wp_enqueue_style( 'docs' );
    wp_enqueue_style( 'prettify' );
}

add_action( 'wp_enqueue_scripts', 'wppro_script_enqueuer'); ?>

<!-- // This code above is added to the functions.php file first.
// We first have to register our files and then enque them

// Lets break a line of each code down... -->

<?php wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.css'); ?>
<!-- 
Here we are giving the same of the file and then using dynamic php to access the file added by the path to the file
 -->
   <?php wp_enqueue_style( 'bootstrap' ); ?>
   <!--  Enqueing is configured by simply naming the file

    When adding CSS or Javascript its best we do this to keep our theme clean. Less code in the head the faster it will load.
    For adding custom CSS we can add it to a custom css file add it here, or additional Javascript can be added to a new custom scripts file and added here. -->