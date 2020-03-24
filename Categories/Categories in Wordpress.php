Categories in Wordpress
=================

Tut here..
http://www.wpbeginner.com/wp-themes/how-to-create-category-templates-in-wordpress/


==========================

Used to display categories differently.

==========================

1. Create a Category in WP.
2. Create a new file and call it category-name.php
The name relates to the name of the category slug that was just created.

3. Take the content from the category.php file and make ammendments.

4. Save below as category template and amend

<?php
/**
* A Simple Category Template
*/

get_header(); ?> 

<section id="primary" class="site-content">
<div id="content" role="main">

<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

<header class="archive-header">
<h1 class="archive-title">Category: <?php single_cat_title( '', false ); ?></h1>


<?php
// Display optional category description
 if ( category_description() ): ?>
<div class="archive-meta"><?php echo category_description(); ?></div>
<?php endif; ?>
</header>

<?php

// The Loop
while ( have_posts() ) : the_post(); ?>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

<div class="entry">
<?php the_content(); ?>

 <p class="postmetadata"><?php
  comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
?></p>
</div>

<?php endwhile; 

else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>
</div>
</section>


<?php get_sidebar(); ?>
<?php get_footer(); ?>





--------------
OPTION 2
--------------



lets suppose you have a category for featured posts called “Featured”.
Now you want to show some extra information on the category archive page for this particular category.
To do that add this code in category.php file right after <?php if ( have_posts() ) : ?>.


<header class="archive-header">

<?php if(is_category( 'Featured' )) : ?>
    <h1 class="archive-title">Featured Articles:</h1>
<?php  else: ?>
    <h1 class="archive-title">Category Archive: <?php single_cat_title(); ?> </h1>
<?php endif; ?>

</header>





==================================================

DISPLAY POSTS WITH A DIFFERENT TEMPLATE, DEPENDING ON THE CATEGORY

===================================================

ADD TO THE TOP OF SINGPLE.PHP

<?php
if ( in_category('fruit') ) {
    include 'single-fruit.php';
} elseif ( in_category('vegetables') ) {
    include 'single-vegetables.php';
} else {
    // Continue with normal Loop
    if ( have_posts() ) : while ( have_posts() ) : the_post();
    // ...
 }
?>


For just a single category we can write...


<?php get_header(); ?>

<?php
if(in_category('2')) //we use custom category template
{
    include(TEMPLATEPATH. '/single-mycategory.php');
}
else //or we just use single.php format
{?>
    <?php if (have_posts()) while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
    <?php endwhile;
}?>

<?php get_footer(); ?>



=============================================

STYLING CATEGORIES 

==============================================


<link rel="stylesheet" href="<?php bloginfo('template_url')?>/blue.css" type="text/css" media="screen,projection" />
<?php if( in_category( 1 ) ) { ?> <link rel="stylesheet" href="<?php bloginfo('template_url')?>/blue.css" type="text/css" media="screen" /> <?php } 
elseif ( in_category (2) ) { ?> <link rel="stylesheet" href="<?php bloginfo('template_url')?>/yellow.css" type="text/css" media="screen" /> <?php } 
elseif ( in_category (33) ) { ?> <link rel="stylesheet" href="<?php bloginfo('template_url')?>/black.css" type="text/css" media="screen" /> <?php } 
else { ?> <?php } ?>




========================================

LOAD DIFFERENT ELEMENTS DEPENDING ON THE CATEGORY

=======================================



Load Different headers for Specific Posts in wordpress according to their Category

On top of the single.php 

add this IF statement

<?php

$post = $wp_query->post;


if ( in_category('6') ) {
get_header('inner'); 
}elseif (in_category('7') ) {
get_header('inner'); 
} elseif (in_category('8') ) {
get_header('inner'); 
} else {
get_header(); 
}



?>

It tells to load a different header to the page depending on the category of posts chosen








========================================

SHOW ALL CATEGORY HEADINGS

=======================================


    <ul class="blog-cat-lists">
        <?php

        wp_list_categories(array(
                'orderby'  => 'name',
                'order'    => 'ACS',
                'title_li' => '',
            ));

        ?>
        <li><a href="#" class="show-button">More Categories</a></li>


        </ul>


<?php // in jquery could so somethinh like this to hide and show some titles  ?>


    <script>
$("ul.blog-cat-lists li:gt(8):not(:last-child)").hide();

$('ul.blog-cat-lists li a.show-button').click(function(){
$("ul.blog-cat-lists li:gt(2)").show();
$("ul.blog-cat-lists li:last-child").hide();

</script>














