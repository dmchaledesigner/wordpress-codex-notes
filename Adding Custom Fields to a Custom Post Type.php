Adding Custom Fields to a Custom Post Type

For this tutorial, we have a project called “The Bookworm Blog,” for which we’re going to need a “Book” custom post type.
The code for that is as follows:



<?php
/*
Plugin Name: Bookworm Blog Custom Post Types
Description: Custom Post Types for "The Bookworm Blog" website.
Author: Tracy Rotton
Author URI: http://www.taupecat.com
*/

add_action( 'init', 'bookworm_blog_cpt' );

function bookworm_blog_cpt() {

register_post_type( 'book', array(
  'labels' => array(
    'name' => 'Books',
    'singular_name' => 'Book',
   ),
  'description' => 'Books which we will be discussing on this blog.',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'editor', 'custom-fields' ) // Not Custom Fields in the support arrray!
));
}



ut what if we want more fields than the WordPress standards? I’ve enabled the “custom-fields” capability here for illustration purposes,
but WordPress native custom fields are not very intuitive for our client. So we need to turn to a third-party plugin.

Download, install and activate Advanced Custom Fields

Create your field group

Create your loop on your template page where data will be displayed.


<?php
 
$args = array('post_type' => 'Menu', 'order' => 'ASC');
$category_posts = new WP_Query($args);
 
if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>
 

    <li>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <p><?php the_excerpt(); ?></p>
        <p><?php get_field( 'field_name' ) ?></p>
        // or <p><?php the_field( 'field_name ') ?>
        <?php the_post_thumbnail(); ?>
        
    </li>


<?php
endwhile;
else:
?>
 
Oops, there are no posts.
 
<?php
endif;
?>