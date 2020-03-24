====================
is_page() conditional statement
=====================

http://www.themelab.com/ultimate-guide-wordpress-conditional-tags/



Conditional statements allow us to change elements of wordpress page / post on the fly.
we can say IF THIS is this...then do THAT....IF not then do something else
OR we can use mutiple statements within each other which could be relevant to different pages.

eg

<?php         
 
if ( is_home()) {

echo "Welcome to Our Blog!!";

}

?>

The above sample uses is(home()) which is used to the blog or index.php page or a wordpress site.
What we are saying is, if this page is the blog, then echo (display) the string Welcome to our Blog!!

We usually place this code in the page itself, however we can inject it into the functions.php if we want to target different pages.

==================
THE IS_PAGE()
==================

using is_page instead of is home allows us to target an individual page by its id
The below is a simple example. It will echo the string on the page with the ID of 7

<?php         
 
if ( is_page(7)) {

echo "Welcome to Our Blog!!";

}

?>

===============================
ADDING A DIV WITH A CLASS TO OUR CONDITION
===============================
To get the class active...PHP interprets the quote character special, it marks the start or end of a string literal. Either escape your quotes using a backslash or use other single quotes. This will create our class string whereas if html is inputted normally, php will interpret it as a complete string which we dont want.
eg.

<?php         
 
if ( is_page(4)) {

    $container = 'This is some content';
}
 echo "<div class=\"wrong\">wrong</div>";

?>

alteratively we could echo a variable of the div instead of having it all as one.


<?php         
 
if ( is_page(4)) {

    $myDiv = "<div class=\"wrong\">wrong</div>";
}
 echo $myDiv;

?>

===============================
MULTIPLE CONDITIONAL
===============================

Let us say that you want to show a different logo on your website in different areas of your website. How would you do this? The answer is simple: We use else and elseif statements. The code below shows how this can be achieved.


<?php 

if ( is_home() || is_front_page() ) { ?>
  
<img src="logo-home.png" />

<?php 

} elseif ( is_category() ) { ?>

<img src="logo-category.png" />

<?php 

} elseif ( is_single() ) { ?>

<img src="logo-blog-post.png" />

<?php 

} elseif ( is_page() ) { ?>

<img src="logo-page.png" />

<?php 

}

else { ?>

<img src="logo-general.png" />

<?php 

}

?>



=================
IS PAGE TEMPPLATE
==================



<?php

if(is_page_template('page-thankyou.php')){ ?>

 <style>

	// add css rules here 


 </style>

<? }





