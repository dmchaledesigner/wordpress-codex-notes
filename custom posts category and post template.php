What if you want to create a custom template for WordPress Posts, which belong to a specific category. You need to create a function and preferably save it in your theme’s functions.php file.

Here’s how to create a custom post template for a specific category:


<?php
 
function get_custom_cat_template($single_template) {
     global $post;
 
       if ( in_category( 'category-name' )) {
          $single_template = dirname( __FILE__ ) . '/single-template.php';
     }
     return $single_template;
}
 
add_filter( "single_template", "get_custom_cat_template" ) ;
 add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 132, 133, true );
?>

What you have to do is just copy and paste this code in your functions.php file and don’t forget to change ‘category-name’ to the name of the category you are aiming and, of course, change ‘/single-template.php’ to your post template file for this category.


Now we must copy the single.php file and call it single-'name of category'.php. within this file we place our loop like so...

     <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h4><?php the_title(); ?></h4>
            <?php the_post_thumbnail(full); ?>
            <p><?php the_content(); ?></p>



        <?php endwhile; else: ?>

        <div class="post">
        <p><?php _e('Sorry, no posts matched your criteria.', "hi-rezz"); ?></p>
        </div>

    <?php endif; ?>

    now we call in our category into our page....



<?php
 
$args = array('post_type' => 'Menu', 'order' => 'ASC');
$category_posts = new WP_Query($args);
 
if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>
 

    <li>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <?php the_post_thumbnail(full); ?>
        <p><?php the_excerpt(); ?></p>
    </li>


<?php
endwhile;
else:
?>
 
Oops, there are no posts.
 
<?php
endif;
?>



for custom single post type...

just add replace this in the functions file

<?php
 
function get_custom_post_type_template($single_template) {
     global $post;
 
       if ($post->post_type == 'custom-post-type') {
          $single_template = dirname( __FILE__ ) . '/single-template.php';
     }
     return $single_template;
}
 
add_filter( "single_template", "get_custom_post_type_template" ) ;
 
?>