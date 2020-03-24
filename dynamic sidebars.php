---------------------------
Dynamic Sidebars and widgets
---------------------------

see article: http://justintadlock.com/archives/2010/11/08/sidebars-in-wordpress

Dynamic sidebar:
A container for a set of widgets, which the user can set from the Widgets screen in the admin.

Properly registering a sidebar is the most important part of the process because what you set here will trickle down to other sidebar functions you’ll use later. When registering a sidebar or multiple sidebars, you would do so from your theme’s functions.php file.The code shown below is an example of how to properly register a sidebar in WordPress using the register_sidebar() function. In this particular example, you’ll register a sidebar called primary, which will be the example sidebar used throughout the remainder of this tutorial.


Enter into functions.php file....
NB. to register another, simply copy the code within the comments below and paste directly underneath, giving a new id and name


add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {

    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id' => 'primary',
            'name' => __( 'Primary' ),
            'description' => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    )};

    /* Repeat register_sidebar() code for additional sidebars. */
}

To display our dynamic sidebar, we simply enclose insert it into a div container, like this...

    <div id="sidebar-primary" class="sidebar">

            <?php dynamic_sidebar( 'primary' ); ?>

    </div>

    The above is calling a dynamic sidebar called 'primary'.


    Many time we want to add dynamic sidebars to our theme so where there are multiple sidebars,
    we alter the code to say

    <?php get_sidebar(); ?>


    therefore when we have two we say..

    <?php get_sidebar( 'primary' ); ?>

<?php get_sidebar( 'secondary' ); ?>



