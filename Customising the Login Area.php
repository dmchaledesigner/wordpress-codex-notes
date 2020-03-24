Customising the Login Area

1. Create a foler in your theme called Login

2. In this folder we create a new CSS file to hold the styles for the Login area.
This stops confusion with the styles for the inner design of the site itself.
We can also place any images, logotypes into this folder too.
For the purpose of this tutorial, we will call our CSS file 'customlogin.css'.

3.Now we go to our functions.php file to register our css stylesheet.
Place this code along with the rest of our linked css styles to keep uniform.
As follows...

// custom login styles
function my_login_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/login/customlogin.css'; ?>" type="text/css" media="all" />

    <?php }
    add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
    ?>

4. We can use 'inpect element' in chrome or firefox to find the properties of the login area, then begin styling.

    Because the login area is separate from the rest of the site,
    the body has a class of 'login'.

    Here are some sample CSS which I used,

                             body.login{
                              background-color: #78AA9B;
                            }


                            .login h1 a {
                            background-image: url('../login/logoSmall.png');
                            background-size: 263px 150px;
                            width: 263px;
                            height: 150px;
                            }

                            .login #backtoblog a, .login #nav a{
                                color: #000;
                            }

                            .login #backtoblog a:hover, .login #nav a:hover{
                                color: #fff;
                            }

                            .login form{
                                background-color: #deaf83;
                            }

                            .login label{
                                font-weight: bold;
                                color: #000;
                            }

                            .wp-core-ui .button-primary{
                                background-color: #78AA9B;
                                border: 0px;
                            }

