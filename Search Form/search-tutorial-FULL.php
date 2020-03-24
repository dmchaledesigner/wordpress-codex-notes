

<!-- To build a fully functioning search form we need three files

1.search.php - The template which displays our search results
2.content-search.php - this pulls our search items found into the search results page (search.php)
3.searchform.php - this will hold the search form to be later called in using the Wordpress function called <?php get_search_form(); ?>




1 Starting off with the Search Form (sarchform.php)
====================================================
-->


<!-- This should be the only content on the searchform.php page
Note the action is the home url and the name=s which is a wordpress setting while the class for 'form-control' it taken from bootstrap
...and thats it! -->

<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" title="Search" />
</form>








<!-- 2 The search-content.php page - which will hold a 'searched item' to be displayed on the search results page
==============================================================================================================

The contents of this page are as below.
Note the block is wrapped in a col-md-4 so it fits 3 across.
Inside we have given it a post class of search-item so we can target it using SASS.
Here we have included a title, image etc and included the category the item is associated with. 
MAKE SURE THIS TEMPLATE PART IS INSIDE THE TEMPLATE / PARTS FOLDER-->



<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

?>

<div class="col-md-4">

<article id="post-<?php the_ID(); ?>" <?php post_class('search-item'); ?>>

	<h1><?php the_title(); ?></h1>
	
	<?php if( has_post_thumbnail() ): ?>
		<div class="img-box"><?php the_post_thumbnail('thumbnail'); ?></div>
	<?php endif; ?>
	
	<p><?php the_excerpt(); ?></p>

	<small><?php the_category(' '); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>

		<hr>

</div>
	


</article>






<!-- 3 search.php - Our search results page where all results are displayed
=======================================================================


This is just a normal page and can be altered to whatever way you wish.
But we need to call in our template-part from step 2, which is the search-content.php page, something like this... 
Note: get_search_query, the wordpress function to display the search term.
-->




<div class="container">	

<h3 style="background-color: #e3e3e3; color: 797878; text-align: center;">Search Results for '<?php echo get_search_query(); ?>'</h3>
	

<?php 
	if( have_posts() ):
		while( have_posts() ): the_post(); ?>

			<!-- TEMPLATE PART FOR SEARCH POSTS -->
			<?php get_template_part('template-parts/content', 'search'); ?>
		
		<?php endwhile;
	endif; ?>
						
					
	
</div>






<!-- 4 Calling in the searh function
===============================


Now open the page where we want our search form to be placed.
Add this snippet of code to the html -->

<?php get_search_form(); ?>


<!-- Thats it!!!


We can add fucntionality for our form by adding custom code to a new form.
For example we can create a customform called searchform-categories.php
and call it into our html using the parenthesis to target the specific form
ie.  -->

<?php get_search_form('categories'); ?>


http://wpthemetutorial.com/wp_function/get_search_form/





