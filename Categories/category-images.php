===============
category images
==============


<!-- Install the plugin "categories images"

Upload images to your categories individually

Create a page template to display the categories desired
and insert code to call in your categotries.

Reference the site below and alter your code to suit


http://zahlan.net/blog/2012/06/categories-images/


--> 




<!--
This one is from lynda.com
 -->

NEEDS TO BE ADJUSTED WITH $ARGS


<?php

if(function_exists('z_taxonomy_image_url')) && (z_taxonomy_image_url() != null){

	foreach (get_terms('latest_works') as $cat) : ?>

                             <li>
                             <?php echo '<div class="figure">'; ?>
                             <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
                             <?php  echo '<h3>' . $cat->name . '</h3>'; 
                             		echo '<p>' . term_description($cat->term_id) . '</p>';
                             		echo '</div>'; ?>
                             </li>


                             <?php endforeach; ?>


}








?>



THIS ONE WORKS FOR SURE...


<ul>
 		





						<?php foreach (get_terms('latest_works') as $cat) : ?>

                             <li>
                             <?php echo '<div class="figure">'; ?>
                             <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
                             <?php  echo '<h3>' . $cat->name . '</h3>'; 
                             		echo '<p>' . term_description($cat->term_id) . '</p>';
                             		echo '</div>'; ?>
                             </li>


                             <?php endforeach; ?>
</ul>
