

IS IF STATEMENTS

============
For stylesheets
============

Add this to the header.php file usually under the meta tags, where you're stylesheets are usually placed.
IF ya cant read what this is doin, then you've had it !!!!! :D


<?php if (is_front_page) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
<?php } else { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style2.css" type="text/css" media="screen" />
<?php } ?>



INline Styles for a child page - goes into the header()

<?php

    if(is_page( 123 )): ?>

    <style>
        
         .page-template-back-to-business-landing .section .right > .top > .two{
              width: 100%;
              background: red;
            }

    </style>

    <?php endif; ?>





Adding elements to a specific page use 'is_page();'



<?php         
 
if ( is_page(4)) {

    $container = 'This is some content';

}

echo $container;

 echo "<div class=\"wrong\">Some content</div>";

?>


adding a div with  class
==============

<?php         
 
if ( is_page(4)) {

    $myDiv = "<div class=\"wrong\">wrong</div>";
}
 echo $myDiv;

?>


selecting a page and assigning it individual styling
=======================


<?php
                if(is_page('About')){
                echo '<style type="text/css">body{background:yellow;}</style>';
                }
?>



<?php
if ( is_home() ) {
    echo '<style type="text/css">body{background:black;}</style>';

} elseif ( is_tree( '11' ) == $post->post_parent ) {
    echo '<style type="text/css">body{background:yellow;}</style>';

} elseif ( is_tree( '37' ) == $post->post_parent ) {
    echo '<style type="text/css">body{background:orange;}</style>';

} else {
    echo '<style type="text/css">body{background:red;}</style>';
} ?>





NOTE:

BETTER USE ALL OF THE ABOVE IN A FUNCTION - Keeps things cleaner and neater!!!!

<?php
function for_page() {
  if( is_page( 2576 ) ) {
        ?> <style>
            
            header#header,
            div.footer-widgets { display:none; }
                
            </style>
        <?php
    }
}
add_action( 'wp', 'for_page' ); ?>



<?php

// instead of using the header.php we create functions instead

function sv_add_page_coupon_notice( $content ) {
    if( is_page( array( 2, 189 ) ) ) {
        echo '<div class="coupon-notice">Thanks for visiting! As a gift, here\'s a coupon code you can use in our shop: <code>20off</code></div>';
    }
    return $content;
}
add_filter( 'the_content', 'sv_add_page_coupon_notice' );


?>





