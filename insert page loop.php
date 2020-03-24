adding pages to a page.

ie if a homepage has a title and text underneath a featured image, how do we remove
the static html so the text becomes dynamic.

ok so we want to add this text to our homepage, so we remove the title (<h2>) tags
from out html and insert the content into the title and content area of the kitchensink
area of wordpress. save the draft and now go back to where the inline content of the page
was in the html.

first we add our opening and closing loop,

//opening loop
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


		inside we will place what we need to do which is to show our title and,
		we need to show our content which is displayed in the content block of wp.
		
		to do this we add out php string and include what we want to show.
		remember to wrap our title in <h2> tags so its styled in our CSS.
		
		so.....
		
		<?php the_title(); ?>
		<?php the_content(); ?>

//closing loop
<?php endwhile; ?>



note: our code MUST be inside the div that holded our inline content so our CSS
recognises it styling. 

 recap: create a page / or add it to the page template
 		remove the content from the html and insert to kitchen sink
 		add our loop to our php template page and insert what we want to show.