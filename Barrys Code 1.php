<?php
//Output the theme directory URI. Outputs somethng like http://domain.com/wp-content/themes/mytheme/
echo get_template_directory_uri();
 
//How to create a custom page template. Create a new file in your theme's directory and add this to the start of the file:
 
/*
* Template Name: My Page Template
*/
?>
 
<?php
/*
The loop for a single page or post that will output it's title and content useful on custom page templates and single.php
Watch: http://css-tricks.com/video-screencasts/91-the-wordpress-loop/
IGNORE the query posts part of the video
*/
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<?php endwhile; ?>	
 
<?php
/*
Output title of page or post in the loop http://codex.wordpress.org/Function_Reference/the_title
*/
<?php the_title(); ?>
 
<?php
/*
Output content of page or post in the loop http://codex.wordpress.org/Function_Reference/the_content
*/
?>
<?php the_content(); ?>
 
<?php
/*
Output the link to a page or post in the loop http://codex.wordpress.org/Function_Reference/the_permalink
*/
?>
<?php the_permalink(); ?>
 
<?php
/*
WP_Query - useful to output lists of posts or anything to do with retrieving posts
Read up on it here: http://wp.smashingmagazine.com/2013/01/14/using-wp_query-wordpress/
and here for a list of arguments you can pass to it http://codex.wordpress.org/Class_Reference/WP_Query
*/
?>
 
<?php
 
$args = array('cat' => 4);
$category_posts = new WP_Query($args);
 
if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>
 
//code here


endwhile;
else:
?>
 
Oops, there are no posts.
 
<?php
endif;
?>