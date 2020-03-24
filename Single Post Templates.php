Single Post Templates:

Copy the following code to a page..


<?php
/*
Single Post Template: Industrial
*/

get_header(); ?>


Add content from single.php to this file and adjust to meet your design.
and save it as single-industrial.php This will pick up the post template.

Now add the plugin 'Single Post Template'.

Open your post and select "industrial" from the dropdown similar to page template.



Alternatively we can use an IF statement at the top of our single.php

Like this....

On top of our single.php page, add this code

<?php
if(in_category(32)) {
// Custom Template for Single Posts in Category 32
include 'single-32.php';
} else {
?>

Which says IF in category 32 then use single32.php
ELSE use single.php

So we create a single32.php page, drop the content from single.php into it
and modify to suit.

Full tutorial here...
http://bavotasan.com/2009/custom-template-for-single-posts-in-wordpress/





Use of the Single Post template -> Paul Byrne Architects
=====================================

Create the single-x.php and add the the template statement at the top of the page.
This will only be used if a certain element of the page ie category name is different.
So we can call in the category_name(4) say for instance.


The way Pail Byrne is done, is the the posts title is on the left, and the content of the page
is displayed on the right when the title is clicked.

left side
===========
[wrap the below in a div col-sm-4]
1. We create a category and enter posts.
2. Use wp-query to call in the category and echo the title only attached with a permalink



right side
===========
[wrap the below in a div col-sm-8]
1. We will use   <?php get_template_part(); ?> for this and insert a new file with a general loop calling in 'the_content' of the category from the left side
3. Create a file called gallery.php and inside it place our loop as below. save into the 'inc' folder.

<?php
/**
 * The default template for displaying general content only
 */
?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <p><?php the_content(); ?></p>
        
    <?php endwhile; // End while have_posts() ?>

<?php else: ?>

    <?php get_404_template(); ?>

<?php endif; // End if have_posts() ?>


4. Now the template part becomes  
   <div class="col-sm-8 no-gutter gallery">
          <?php get_template_part( 'inc/snippets/gallery' ); ?>
</div>

Now whatever we place in the content of each post will be displayed.
With PByrne, we placed the wow slider.

However if we want to display a title or excpert etc we simply go into the gallery .php and add the code as needed.



