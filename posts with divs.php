Posts - with DIVS

If we have a div container with divs inside (not lists / <li> elements,
we can style these using the same post snippet below..

<?php
 
$args = array('cat' => 4);
$category_posts = new WP_Query($args);
 
if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>
 
<h1><?php the_title() ?></h1>
<div class='post-content'><?php the_content() ?></div>
<?php
endwhile;
else:
?>
 
Oops, there are no posts.
 
<?php
endif;
?>




except, remove the inner content of the post code ie
from the h1 to the closing div of class content

then insert one of the list divs with the repeated information.



so now we have 



<?php
 
$args = array('cat' => 4);
$category_posts = new WP_Query($args);
 
if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>
 


		<div id="support" class="feature">
				<h4>24/7 Support</h4>
				<p>Lorem ipsum dolor sit port amet, consectetur adipisicing elit, sed do eiusmoc 24/7 support! </p>
				<a href="#" class="read-more">Read More</a>
			</div>


<?php
endwhile;
else:
?>
 
Oops, there are no posts.
 
<?php
endif;
?>


...all we need to do now is to remove the ID value and leave the class of feature
to hold onto the styling for ALL the divs inside the container