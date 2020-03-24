the dashboard.....

Upload and install the original starkers theme.
Create a page called homepage.
Go to the Settings Section and change your static page to homepage.

the theme php files.....


add fonts links etc to header under the css styles.
 
delete default content in the starkers template
strip out the header.php file so there is nothing below
<body <?php body_class(); ?>>


then for the main content (page.php area),
copy this page and call it home.php
this is higher in the hierarchy so will load before page.php

strip out everything so we just have the get_header(); and get_footer();
...all our html will go between these lines of code.

in the Template Section (comments on top) replace with this code..
<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */
 
 ?>



 
 after this is saved, go to the dashboard again, select our homepage and,
 select our Homepage in the templates menu.
 
 Note the Homepage indicates that this is the homepage area and shows up as a template
 in the dashboard.
 

in our footer, all our footer html nformation will go BEFORE the bottom code show below
<?php >
	wp_footer();
?>


view our page and see our images and css are missing.

copy all our css from the static site folder and paste it below any content
in our themed css file.

next we need to add some php to our image paths to link them to the images folder in the theme
file. ie...

<img src="<?php echo get_template_directory_uri(); ?>/images/...... /">

this links to our theme directory. this will change when we need to make elements dynamic.
ie interactivity, posts, pages, sliders etc.

not plugins such as formidable forms, excerpt, custom fields, custom pages, custom posts,
seo/headspace etc.
