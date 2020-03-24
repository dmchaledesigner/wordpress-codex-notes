<!-- We can use the ACF box to assign different classes to a div so the color changes or,
give different background images to icons via css background-image or position, or even say, when an item is selected, show html option 1, 2, or 3. -->







<!--

Adding classes to a div via the Select Option
==============================================


1. Create a field inside ACF with the Select Option and call it 'color'

2. Inside the Select window, add some otpions like this
	red: Red
	blue: Blue
	green: Green

3. Add these properties in css
   .green{background: green;}
   .red{background: red;}
   .blue{background: blue;}

-->

<!-- 4. Inside our html we use this code -->
	<div class="<?php the_field('color'); ?>"></div>

<!-- 5. Now in our page we can select what color we wish and the background will change to the color of that was selected.
 -->












Adding a class to the body of a template
==============================================

usually the <?php body_class(); ?> is inside the header.php file so to change a template we need to create a new header or we can just add it to the template and remove it from the header, whichever you decide.
We use this to change the color of particular elements of a template depending on the body class. For instance, make all links with the body class a certain color such as the top menu or h3 tags

1. Create a Select field in ACF called 'custom body class' and add some colors again, same as previous tutorial
   	red: Red
	blue: Blue
	green: Green


2. Add these properties in css but with the body attached
	body.red a{background: red;}
	body.green a{background: green;}
	body.blue a{background: blue;}


3. Now its time to target the <?php body_class(); ?> and add the ACF field to it.

   <body <?php 
   				$classbgcolor = get_field('custom_body_class'); // assign the field to a variable
   				body_class(array($classbgcolor)); // add the variable to the bodyclass array

		?>
	>












Select One block of HTML from Multiple Choices 
=================================================

1. Create our options in the choice area of the ACF Select box and call the field 'footer_vis' as below

	New Footer
	Old Footer



2. Declare an if statement with our options

<?php if(get_field('footer_vis') == 'New Footer' || get_field('footer_vis') == 'Old Footer'):?>


	<!-- NEW FOOTER CODE -->


 	<?php else:?>


	<!-- OLD FOOTER CODE -->

 	<?php endif;?>














