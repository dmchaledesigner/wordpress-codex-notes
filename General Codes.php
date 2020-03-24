
excerpt only on the content area (not using the excerpt itself)..

<?php echo wp_trim_words( get_the_content(), 40 ); ?>

for the excerpt, use...
<?php the_excerpt(); ?>

-------------------------------------------------------------------------

for linking images and stylesheets...

-------------------------------------------------------------------------

<?php echo get_template_directory_uri(); ?>/


-------------------------------------------------------------------------

to hide the admin bar when logged in (functions.php)

-------------------------------------------------------------------------

add_action('set_current_user', 'csstricks_hide_admin_bar');
function csstricks_hide_admin_bar() {
  if (current_user_can('edit_posts')) {
    show_admin_bar(false);
  }
}

-------------------------------------------------------------------------

Page templates....
place this at the top of a new php page...

-------------------------------------------------------------------------


/**
 * Template Name: hometest
 *
 * A custom page template with the left sidebar.
 *
 *
 * @package WordPress
 * @subpackage Expedia_WP
 * @since Expedia Theme 1.0
 */





 List of Pages in Dropdown Menu
 ----------------------------------


 <form action="<?php bloginfo('url'); ?>" method="get">
<?php wp_dropdown_pages('include=532,389,417,450,472,510,502,520 &selected=532'); ?>
<input type="submit" name="submit" value="Click here" /></form>




_______________________________________________________


Adding multiple style sheets

-----------------------------------------------


<?php if (is_front_page) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
<?php } else { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style2.css" type="text/css" media="screen" />
<?php } ?>


_______________________________________________________________________________


Load Different headers for Specific Posts in wordpress according to their Category

----------------------------------------------------------------------


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

It tells to load a different header to the page depending on the category of posts chosen,








For custom navigation..

-------------------------------------------------------------------------

<?php wp_nav_menu( array( 'menu' => 'menu nav name here' ) ); ?>

Dont forget to register your nav by means of a function.



function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}

add_action( 'init', 'register_my_menus' );

or

register_nav_menus( array(
    'pluginbuddy_mobile' => 'PluginBuddy Mobile Navigation Menu',
    'footer_menu' => 'My Custom Footer Menu',
) );



Call the Navigation and dont forget to click the theme menu selector!!! for bootstrap

<?php if ( has_nav_menu( 'footer-menu' ) ) {

                                   wp_nav_menu( array(
                                        'menu'            => 'footermenu',
                                        'theme_location'  => 'footer-menu',
                                        'depth'           => 1,
                                        'container'       => 'false',
                                        'menu_class'      => 'navbottom',
                                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                        'walker'          => new wp_bootstrap_navwalker()
                                        )
                                    );
                                }

                                ?>



to register a navigation without adding the menu to the dashboard
<?php wp_nav_menu( array( 'menu' => 'menu nav name here' ) ); ?>


without the container surrounding the <ul>
<?php wp_nav_menu( array( 'menu' => 'Main Menu', 'container' => 'false' ) ); ?>


or we can not register the menu and just call it by its name...


1. Create a Menu and call it 'Side Nagivation'

2. Now call it in your code
 <?php wp_nav_menu( array('menu' => 'Side Nagivation', 'menu_class' => 'footer-nav', 'container' => 'false') ); ?>






Link to good tut here
http://justintadlock.com/archives/2010/06/01/goodbye-headaches-hello-menus
& here
http://justintadlock.com/archives/2013/08/07/social-media-nav-menus




_______________________________________________________

permalinks...

-------------------------------------------------------------------------


<?php the_permalink();?> and <?php $permalink = get_permalink( $id ); ?>
are two different things.
The first is used in general loops in <a> links. They automatically pick up
the link reference from each post.
The second is 'get_permalink();' which in turn needs to be echo'ed.
 <a href="<?php echo get_permalink( 268 ); ?>">My link to a post or page</a>
 The above shows the example and within the parenthesis, we have the ID of the page
 we want to link to ( if we dont want to link to a post in the loop). In this case,
 we want to link to a page with an ID of 268. No quotes or ID has tag is needed.

alternatively...we can get the page by its title instead of its ID.

<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Monthly Events' ) ) ); ?>">Monthly Events</a>


_______________________________________________________


General Calling of posts...

-------------------------------------------------------------------------


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_post_thumbnail('full'); ?>
		<?php the_content(); ?>
<?php endwhile; ?>



_______________________________________________________


General Calling of a single post

-------------------------------------------------------------------------


<?php query_posts ('id => 53 & showposts=1'); ?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

                <h4><?php the_title(); ?></h4>
            <?php the_content(); ?>


<?php endwhile;
else: ?>

<?php endif; ?>


_______________________________________________________

calling of posts using divs
-------------------------------------------------------------------------


<?php

$args = array('cat' => 3);
$category_posts = new WP_Query($args);

if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>



		<div class="3u">
          <section>
            <div class="mbox-style">
              <h2 class="title"><?php the_title(); ?></h2>
              <div class="content">
                <p class="subtitle"><?php the_excerpt(); ?></p>
              </div>
              <p class="button-style2"><a href="<?php the_excerpt(); ?>">More Details</a></p>
            </div>
          </section>
        </div>


<?php
endwhile;
else:
?>

Oops, there are no posts.

<?php
endif;
?>





_______________________________________________________


Relative Paths using site url()

-------------------------------------------------------------------------

<?php echo get_home_url(); // display site url ?> 



<?php $url = site_url( '/careers/'); // url with relative path ?>
<p>Careers: </strong>visit our <a href="<?php echo $url;?>">careers</a> page</p>







_______________________________________________________


Aternative to using the same query on a page ()

-------------------------------------------------------------------------
If we call a category using WP_Query to just call the title, however we want to call a general content area
on a different section of the page we can use    <?php get_template_part( ); ?> with a normal looop inside it,

Here is what we do...

Call our wp_query for the category in a section of a page.
Then we use create a file ...say, its called Gallery.php. (see paul bynre architects for sample)
Inside this file we use a loop such as the below...

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



Then we simply call this into our template page by means of get_template_part
<?php get_template_part( 'inc/snippets/gallery' ); ?>

If we have a post template split where we have a <div class="col-sm-3">,
we add our wp__query category call, then on the <div class="col-sm-9">,
we can have our get_template_part set up.


I used this code within a custom 'single post template' (see other file for this tut)
where i had titles on the left and content on the right to display an inline wow slider.








-------------------------------------------------------------------------


Using wp_query to call in Recent posts given $args isnt a variable
Using 'the_query'

-------------------------------------------------------------------------



<ul>
  <?php $the_query = new WP_Query( 'showposts=5' ); ?>

  <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
  <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>

  <li><?php echo substr(strip_tags($post->post_content), 0, 250);?></li>
  <?php endwhile;?>
</ul>


we can add in post-type, cat, etc will showlast 5 posts from whatever we like using the_query.



_______________________________________________________


Calling of a category  containing a title a featured image and content for products and blog...

-------------------------------------------------------------------------



<?php

$args = array('cat' => 4);
$category_posts = new WP_Query($args);

if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>

<?php $postid = get_the_ID(); ?>
<?php if (has_post_thumbnail( $postid )) : ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); ?>

	<div class="container">
            <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt=""></a>
            </div>

<?php endif; ?>

<?php
endwhile;
else:
?>

Oops, there are no posts.

<?php
endif;
?>







------------------------------------------------

Call of a top level category titles only => get_categories

-------------------------------------------------



<?php
$args = array(
  'orderby' => 'name',
  'parent' => 0
  );
$categories = get_categories( $args );
foreach ( $categories as $category ) {
    echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><br/>';
}
?>




------------------------------------------------

Call of category titles and their descriptions

-------------------------------------------------


<?php
$args = array(
  'orderby' => 'name',
  'order' => 'ASC'
  );
$categories = get_categories($args);
  foreach($categories as $category) {
    echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
    echo '<p> Description:'. $category->description . '</p>';
    echo '<p> Post Count: '. $category->count . '</p>';  }
?>




To show categories without any posts included:

add this to the functions file...

add_filter( 'widget_categories_args', 'wpb_force_empty_cats' );
function wpb_force_empty_cats($cat_args) {
    $cat_args['hide_empty'] = 0;
    return $cat_args;
}




_____________________________________________________


General Calling of pages or posts (in simpler terms)

-------------------------------------------------------------------------


 <?php
              $homepagecontent = get_post(34);
              ?>

              <h2><?php echo $homepagecontent->post_title; ?></h2>
              <p><?php echo get_the_post_thumbnail(34); ?></p>

                 <p><?php echo $homepagecontent->post_content; ?></p>



see this link for instruction

http://codex.wordpress.org/Function_Reference/get_post


_____________________________________________________


General Calling of Single Post by ID WP_Query ....NEVER  use query_posts, use get_posts or WP_Query

-------------------------------------------------------------------------

 <?php
          $args = array(
                         'post_type' => 'post',
                           'ID' => 39, );

                         $the_query = new WP_Query( $args ); ?>


                        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                          <h2 class="welcome"><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>

                            <?php endwhile; else: ?>
                             <p>Sorry, there are no posts to display</p>

                             <?php endif; ?>



_____________________________________________________


General Calling of Categories...

-------------------------------------------------------------------------


<?php

$args = array('cat' => 8);
$category_posts = new WP_Query($args);

if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>


<li><a href="#"><?php the_title(); ?></a></li>


<?php
endwhile;
else:
?>

Oops, there are no posts.

<?php
endif;
?>

_______________________________________________________


Use this code as a loop for the <li> element when there are different css properties
on the first list item compared to the rest of the additional list elements.
Note the <UL> ...loop goes in place of the li's paying particular attention to the
if statement.

-------------------------------------------------------------------------


eg...



<section>
              <div class="sbox2">
                <h2>Nulla eleifend</h2>
                <ul class="style1">



                 <?php
                $args = array('cat' => 6);
				$category_posts = new WP_Query($args);
				$i = 0; 

				if($category_posts->have_posts()) :
				while($category_posts->have_posts()) :
					$category_posts->the_post();
					$i++;
				?>
				<?php
					if($i == 1){ ?>
						<li class="first"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php }else{ ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php }
				?>

				<?php
				endwhile;
				else:
				?>
					Oops, there are no posts.
				<?php
				endif;
				?>



                </ul>
              </div>
 </section>



_______________________________________________________

when all column elements are different
we cannot use the above but conditional (if) statement so we need to add
another condition to the statement

-------------------------------------------------------------------------


the html....

<section class="first">
				<span class="pennant"><span class="icon64 icon64-1"></span></span>
				<header>
				<h2>Ipsum consequat</h2>
				</header>
				<p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
				</section>
				</div>

				<div class="4u">
				<section class="middle">
				<span class="pennant pennant-alt"><span class="icon64 icon64-2"></span></span>
				<header>
				<h2>Magna etiam dolor</h2>
				</header>
				<p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
				</section>
				</div>

				<div class="4u">
				<section class="last">
				<span class="pennant pennant-alt2"><span class="icon64 icon64-3"></span></span>
				<header>
				<h2>Tempus adipiscing</h2>
				</header>
				<p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
				</section>
				</div>





for wordpress.....
create category, then its child posts, create a page and assign the icons to that page
as custom fields.




<div class="row">

				<?php
               			$args = array('cat' => 2);
				$category_posts = new WP_Query($args);
				$i = 0;

				if($category_posts->have_posts()) :
				while($category_posts->have_posts()) :
				$category_posts->the_post();
				$i++;
				?>

				<?php
				if($i == 1){ ?>
				<div class="4u">
				<section class="first">
				<span class="pennant"><span class="icon64 icon64-4"></span></span>
				<header>
				<h2><?php the_title(); ?></h2>
				</header>
				<p><?php the_content(); ?></p>
				</section>
				</div>
				<?php }

				if($i == 2){ ?>
				<div class="4u">
				<section class="middle">
			             <span class="pennant pennant-alt"><span class="icon64 icon64-2"></span></span>
				<header>
				<h2><?php the_title(); ?></h2>
				</header>
				<p><?php the_content(); ?></p>
				</section>
				</div>
				<?php }
				?>

                                                    <?php if($i == 3){ ?>
				<div class="4u">
				<section class="last">
				<span class="pennant pennant-alt"><span class="icon64 icon64-2"></span></span>
				<header>
				<h2><?php the_title(); ?></h2>
				</header>
				<p><?php the_content(); ?></p>
				</section>
				</div>
				<?php }
				?>

				<?php
				endwhile;
			             else:
				?>
				Oops, there are no posts.
				<?php
				endif;
				?>


</div>




_________________________________________________________

Calling of images in  a category ie for a slider etc

-------------------------------------------------------------------------



Usually on a flexslider we have a number of <li> elements in the html.
Our images for the slider are coded into each one of the <li>'s.
eg

<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="slide1.jpg" />
    </li>
    <li>
      <img src="slide2.jpg" />
    </li>
    <li>
      <img src="slide3.jpg" />
    </li>
    <li>
      <img src="slide4.jpg" />
    </li>
  </ul>
</div>



add the js, jquery and flexslider js and css files accordingly and replace
the html with the php code below.

Note the <li> element and where it sits in the code.
we could had a caption on here via title or content from a post. then style as needed
via css.

 <div class="flexslider">
  				<ul class="slides">

    				<?php

					$args = array('cat' => 6);
					$category_posts = new WP_Query($args);

					if($category_posts->have_posts()) :
					while($category_posts->have_posts()) :
					$category_posts->the_post();
					?>

					<?php $postid = get_the_ID(); ?>
					<?php if (has_post_thumbnail( $postid )) : ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'single-post-thumbnail' ); ?>

	           			             <li><img src="<?php echo $image[0]; ?>"></li>

					<?php endif; ?>

					<?php
					endwhile;
					else:
					?>

					Oops, there are no posts.

					<?php
					endif;
					?>

  				</ul>
			</div>
?>



_______________________________________________________


custom fields...

-------------------------------------------------------------------------


eg. <?php the_field('title name');?>

eg
 <span class="byline"><?php the_field('welcome', 28);?></span>

 the '28' relates to the page or post the field is associated with.



_______________________________________________________



different header / footer in same site...

-------------------------------------------------------------------------


Create a new header.php file and call is header-new.php
wordpress recognises the 'header-' so we will only need to reference 'new'.
within a newly created page, see the get_header(); code at the start. this is the function
where we will place the new header reference.

so to the get_header(); and within this add 'new'.
so we have get_header('new');
save the file and make sure the page has the template from the dashboard.



_______________________________________________________


child templates

-------------------------------------------------------------------------


load up original template to a folder in htppdocs.
create a seperate folder in htppdocs called x-child theme.

from the original theme. copy over the index.php file. the css styles file, the screenshot.
now in wordpress activate your child theme. when alterations are needed to header.php or
footer.php etc copy them over to your child theme and edit the new ones. NEVER edit
the original. that goes for the functions.php file too!!

Although the stylesheet of a child theme should override the stylesheet of a parent, there are many occasions when the parent theme seemingly overrides the styles you have just made for the child. This can have various reasons, not in the least whether you have used the exact parent theme selectors.

To overcome this nuisance it is possible to add the child theme's name to the body in a dynamic way, like:

<body id="<?php print get_stylesheet(); ?>" <?php body_class(); ?>>

This will output:

<body id="child-theme-name" class="the usual wp classes">



_______________________________________________________


Additional 'loop' functions

-------------------------------------------------------------------------



Basic Loop structure...

<?php if(have_posts() ) : while(have_posts() ) : the_post(); ?>

 // stuff goes here
<?php endwhile; endif; ?>



We can tell the loop to only show specific number of posts
by simply adding this line before the loop itself.

<?php query_posts('posts_per_page' => 2, 'order' => 'ASC'); ?>
<?php if(have_posts() ) : while(have_posts() ) : the_post(); ?>

 // stuff goes here
<?php endwhile; endif; ?>


additional to this code, we can tell it to display posts by latest or previous (ASC / DESC)
The '&' is the 'includes' for both functions. we need to add this when adding more functions to the query.

STUDY THIS!!!! THE LOOP and see CSS TRICKS.com for Chris video!
ref: http://codex.wordpress.org/Function_Reference/query_posts


_______________________________________________________


Custom Fields and their types.

-------------------------------------------------------------------------


When we have a have a situation where we have links at the footer of a page,
they are not needed to be dynamic but we need to have their links added.
In the html, CSS, the links to the font will remain the same however we ned to add
a custom field to each of the <li> elements to their live link will be added.

eg... take the code below,

<ul class="contact">
		<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
		<li><a href="#" class="icon icon-facebook"><span></span></a></li>
		<li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
		<li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
		<li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
	</ul>



In wordpress we already have a page created to which these are hardcoded and holds
the rest of the footer elements. Lets say we called our page 'get in touch'

So, after we added our custom fields plugin, and activate it, we dig into our
custom fields section.

add a new group, type say 'facebook' in the field label and the same for the field name.
make sure the location is et to 'page' and of course, is equal to our page, which is
'get in touch'.

add another field for twitter, pinterest etc.

click 'update'.

So when we go into our 'get in touch' page we can see the list of custom fields for this
group has been added. in the facebook section type add the facebook url, same for the
rest of the links.

now back to our footer.php where we have the <ul> above.
on the <li> we have a class="icon icon-twitter. this relates to the font used and the selected
in the font which is being used. we are goin to add a custom field now to each now...

<li><a href="<?php the_field('twitter', 74);?>" class="icon icon-twitter"><span></span></a></li>
<li><a href="<?php the_field('facebook', 74);?>" class="icon icon-facebook"><span></span></a></li>
<li><a href="<?php the_field('dribbble', 74);?>" class="icon icon-dribbble"><span>Pinterest</span></a></li>

	Not after we add our 'field' we add the page id for reference to where its pulling from
	so	say <?php the_field('twitter', 74) means we are calling the twitter link, from
	the custom field added to page, with the ID of 74




-------------------------------------------------------------------------


When we have icons as fonts we use custom fields and add that to the custom field by
the name of the class in the html.

-------------------------------------------------------------------------


html....(see veridical 2)

<div class="column1">
<div class="box">
<span class="icon icon-comments"></span>
<h3>Vestibulum venenatis</h3>
<p>Fermentum nibh augue praesent a lacus at urna congue rutrum.</p>
</div>
</div>


Create a category and add posts to it.
Give title, content etc.
So the icons....
so we need to create a group called portfolio icons(as per the site)
put field and value name the same 'folioicons'
then, post type equal to post
field type is 'select'
and in the choices section.
add comments (enter to next line)
	cogs
	briefcase etc and update/ publish

	So now we must open each post and in our new custom field, assign an icon using the
	custom field given, ie comments, cogs...etc

	update.

	now add our php to the html doc and replace acccordingly.


	somehing like this

	<div class="pbox1">


					<?php

						$args = array('cat' => 3);
						$category_posts = new WP_Query($args);

						if($category_posts->have_posts()) :
						while($category_posts->have_posts()) :
						$category_posts->the_post();
					?>



						<div class="column1">
							<div class="box">
							<span class="icon icon-<?php the_field('icons');?>"></span>
							<h3>Vestibulum venenatis</h3>
							<p>Fermentum nibh augue praesent a lacus at urna congue rutrum.</p>
							</div>
						</div>


<?php
endwhile;
else:
?>

Oops, there are no posts.

<?php
endif;
?>



		</div>



-------------------------------------------------------------------------


posts to only display number of posts...

-------------------------------------------------------------------------

note the category (5) and the number of posts displayed at any one time (3)

<ul>
<?php query_posts('cat=5&showposts=3'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <li><?php the_post_thumbnail( ); ?><h2><?php the_title(); ?></h2><?php the_content(); ?></li>


<?php endwhile; else: ?>
<?php endif; ?>
</ul>



-------------------------------------------------------------------------


for pages....(alternative).

-------------------------------------------------------------------------
<div id="post-wrapper">

 <ul>
<?php
  $args=array(
  'orderby' =>'parent',
  'order' =>'asc',
  'post_type' =>'page',
  'post__in' => array(76,78,79),
   );
   $page_query = new WP_Query($args); ?>



<?php while ($page_query->have_posts()) : $page_query->the_post(); ?>

    <li><?php the_post_thumbnail( ); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink();?>">
    <?php the_block('page_link'); ?></a>

    </li>
<?php endwhile; ?>
</ul>
</div>


-------------------------------------------------------------------------

Date format - showing in latest post by default only

-------------------------------------------------------------------------


When we have more than one post in a category and we call <?php the_date(); ?>
only the latest post will show the date. In order to display (echo) our date in all posts
we must GET the date...

ie <?php echo get_the_date(); ?>

nb. every time we 'get' something it has to be echoed (displayed) first.
pass in an argument such as M for month
<?php echo get_the_date(M); ?>

D for Day of the week
lower case 'd' for the day in numerical form.



______________________________________________

Creating a category and showing its name first, then loop etc.

-------------------------------------------------------------------------


In some instances its better to create a category with looping posts, instead of creating a page
just to show its title via custom fields.

So it we have a title and 4 posts, instead of creating a page for this, especially if there
are two to three columns of the same layout we can create a function and pass in the ID of the category
into a H2 tag. Then we can place the contents of the category in a loop in the next section.
Easy!!!

<h2><?php echo get_cat_name(8);?></h2>

The above is the code we use to echo the title of the category.
we change the centre line to a <h2> etc so we can see this. The above simply shows
/ displays the meta info.

We replace the 6 with the ID of our category.
Then we add our loop after for your posts via category


-------------------------------------------------------------------------


Reversing Posts in a Category

-------------------------------------------------------------------------


<?php

							$args = array('cat' => 4, 'order' => 'ASC');
							$category_posts = new WP_Query($args);

							if($category_posts->have_posts()) :
							while($category_posts->have_posts()) :
							$category_posts->the_post();
							?>



							Note that in the array, we are calling the category of 5
							and the 'order' is going to tell the loop to echo in reverse.
							opposite of ASC is DESC. to display random posts we replace order with
							'orderby' and ASC with 'rand' ie 'orderby' => 'rand'





-------------------------------------------------------------------------


Adding more functionality to our array...

							Note where we have placed our 'order'...

<?php

							$args = array('cat' => 4, 'order' => 'ASC', 'posts_per_page' => '6');
							$category_posts = new WP_Query($args);

							if($category_posts->have_posts()) :
							while($category_posts->have_posts()) :
							$category_posts->the_post();
							?>



							...we have told our argument to only display 6 posts.
							useful if we have a page with multiple posts however on our homepage
							where we have added a blog page, to only display 6 posts.
							however on the blog page itself, ALL posts will automatically show.



-------------------------------------------------------------------------


Reversing Posts in a General Loop

-------------------------------------------------------------------------



<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

now right before this line of code, we write..

<?php global $query_string; query_posts($query_string . "&order=ASC"); ?>



-------------------------------------------------------------------------


effects...


-------------------------------------------------------------------------



SCROLLING
================
hardcode the links and add a class

.scrollto

<a href="class="scrollto"></a>

give the section the class
<sction class="portfolio">

now add the script to a new file called custom.js

$(function(){


	//Scroll to chapter
	$("a.scrollto").on("click", function(){
	    var selector = $(this).attr("href");
	    var element_top = $(selector).offset().top;

	    $("html, body").animate({ scrollTop: element_top }, 2000, "swing");
	    return false;
    });

});



-------------------------------------------------------------------------


styling your posts (when clicked)


-------------------------------------------------------------------------

The styling for posts is done through the single.php file

Open it and you will find the hooks for both header(); and footer(); along with
the default template loop.

So we need to remove the default, wrap it in a div class, and style it with CSS.

In the Single.php file we should be left with something like this.....



get_header(); ?>

<div class="postings">
<h3><?php the_title(); ?></h3>
<p><?php the_content(); ?></p>
</div>


<?php get_footer(); ?>



We've added a div class and added a title and content, wrapping each in a h3 and p element.
Note that comments box etc have been removed when we click our post.

Now we need to add our CSS to style the above simply like this....

.postings{
width: 1000px;
margin: 0 auto;
background-color: #fff;
padding: 20px;
}

.postings h3, .postings p{
color: #000;

}


Add the rest of the style as you see fit.
Add in the image etc if you want this displayed.



-------------------------------------------------------------------------


custom post types


-------------------------------------------------------------------------


This enable us to have a sub post category which we will place in the lefthand
navigation list amongst the rest of our features in wordpress.

Custom post types are new post types you can create.
A custom post type can be added to WordPress via the register_post_type() function.
This function allows you to define a new post type by its labels, supported features, availability and other specifics.

Note that you must call register_post_type() before the admin_menu and after the after_setup_theme action hooks.
A good hook to use is the init hook.


To Create a basic custom post type, we can install the plugin called
'custom post type ui'

When activated, go to the control panel on the left and you will see a tool called CPT UI.
Open this, name a custom post type ie. Movies. The field label is the section that is shown
in the left sidebar so we put 'Movies' here too. Fill the singular section called Movie
and click 'create custom post type'.

On the left now we will see our Custom Section for adding posts!!!

HOWEVER....when we view our page we notice that our custom posts are not displayed.
WE need to query the 'movies posts, but if we do, we lose our regular posts so we
need to create an array in order to display more than one post type.

In our loop.php file we need to add some code to the top of our document, just under the comment
section and above the closing ?> tag.

query_posts(array('post_type' => array('post', 'movies')));

first we are querying our post type and then we are passing an array into it to show the custom post type.

see http://www.youtube.com/watch?v=sDs5DE0Edf4 for the 'how to'


..............................
custom post type by function.php (hard coding a custom post type)
..............................


In this example we will show you how to register 2 custom post types(books and cars) as well as set the page editor options.
To start, you’ll need to add the code below to your ‘functions.php’ file.

This is how you ‘register’ Custom Post Types(CPT) in your Wordpress installation.

function custom_post_types() {

  register_post_type(
    'testimonials', array(
      'labels' => array('name' => __( 'Books' ), 'singular_name' => __( 'Book' ) ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );


}
add_action( 'init', 'custom_post_types' );

-----------------

<?php

$args = array('post_type' => 'testimonials', 'order' => 'ASC');
$category_posts = new WP_Query($args);

if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>


<li><a href="#"><?php the_title(); ?></a></li>


<?php
endwhile;
else:
?>

Oops, there are no posts.

<?php
endif;
?>


// note we need to call the post type by the name it was called in, within the parenthesis before the array when we added the code to our functions.php page



/////

Now to add a second, just register it after the first, making sure we stay within the function.


function custom_post_types() {

  register_post_type(
    'books, array(
      'labels' => array('name' => __( 'Books' ), 'singular_name' => __( 'Book' ) ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );

  register_post_type(
    'cars', array(
      'labels' => array('name' => __( 'Cars' ), 'singular_name' => __( 'Car' ) ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );

}
add_action( 'init', 'custom_post_types' );


WE can add more supports from our code in the plug in.
ie.

					'supports' => array(
										'title',
										'editor',
										'excerpt',
										'trackbacks',
										'custom-fields',
										'comments',
										'revisions',
										'thumbnail',
										'author',
										'page-attributes',
										'post-formats'),








We still need to call this in our loop.php file so dont forget!!!
query_posts(array('post_type' => array('post', 'books', 'cars')));

otherwise our new custom posts will not be displayed on your site, only in the dashboard.

Here is how we call the code for a custom post type called 'books'

	To call custom post types into our html we need to use the same WP_Query
	with slight adjustments. Replace the 'cat' in the array with 'post_type' and the name of the custom post type
	See below

<?php

$args = array('post_type' => 'books', 'order' => 'ASC');
$category_posts = new WP_Query($args);

if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>


<li><a href="#"><?php the_title(); ?></a></li>


<?php
endwhile;
else:
?>

Oops, there are no posts.

<?php
endif;
?>





----------------------------------

Media Queries

---------------------------------


Add this to the <head> section of html

<meta name="HandheldFriendly" content="True"/>
<meta name="MobileOptimized" content="320"/>
<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>

Add this to your CSS file......

@media only screen and (min-width:0) and (max-width:320px){

elements and properties for reduced size of up tp 320px go here

}

@media only screen and (min-width:0) and (max-width:480px){

elements and properties for reduced size of up tp 480px go here

}




The width and height could be anything,
it really depends on what your want displayed on the screen at a specific width or height.
You can also just specify a maximum width or height, e.g:

@media only screen and (max-width:1600px){
elements and properties for reduced size of up tp 1600px go here

}


..............................
The Bootstrap Navwalker for Responsive Navbar
..............................

When Bootrap CSS and JS files are added to yout wordpress header.php file,
dont forget to add jQuery too, which is added before ANY javascript script files.

Once we have that done, we need to create a navigation in wordress.
Added your pages, create a menu with a name 'primary'.

Add the Bootstrap Navwalker.php file inside your theme folder.

In our functions.php file, we need to add this code to the bottom of our page.
This calls in the navwalker.php file we just introduced to our theme....

require_once('wp_bootstrap_navwalker.php');


Then we register our Menu's, This enable the Menu Hierarchy so we can select Footer Menu etc
Add this to our functions file...

function registerbootstrapmenu() {

    register_nav_menus( array(
        'main-menu'   => 'Main Menu',
        'custom-menu' => 'Custom Menu',
        'footer-menu' => 'Footer Menu',
        'blog-menu'   => 'Blog Menu'
    ) );

}
add_action( 'bootstrap', 'registerbootstrapmenu' );


Next we add our menu with the array for the custom navigation to our header.php file.
Study it and see that in the html, the icons for the responsive section is added.
In the php, the custom navigation menu name is relative also....

 <nav class="navbar navbar-inverse" role="navigation" id="primary_navigation">
   <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>


        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>



    </div>
</nav>




Useful note: Centering the nav items with CSS...


.navbar .nav li {
    width: 100px; /* or whatever width you want for items */
    display: inline-block;
    float: none;
}
.navbar .nav {
    float: none;
    text-align: center;
}




-------------------------------------------------------------
Adding Ressonsive images to thumbnail images for Bootstrap
-----------------------------------------------------------

eg

<?php

						$args = array(
							'cat' => 2,
							'order' =>'asc',
							);
						$category_posts = new WP_Query($args);

						if($category_posts->have_posts()) :
						while($category_posts->have_posts()) :
						$category_posts->the_post();
						?>


						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<div class="box-team wow bounceInDown" data-wow-delay="0.1s">

	                    <?php
					        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					            the_post_thumbnail( 'full', array( 'class'  => 'img-responsive' ) ); // show featured image
					        }
					    ?>
	                    <h4><?php the_title(); ?></h4>
	                    <p><?php the_excerpt(); ?> </p>
						</div>
	                	</div>








_______________________________________________________


Log in a WordPress user with custom text

-------------------------------------------------------------------------

add this to the functions file....
change the text in the <p> for custom log in details.


function auto_login( $user ) {
    $username = $user;
    if ( !is_user_logged_in() ) {
        $user = get_userdatabylogin( $username );
        $user_id = $user->ID;
        wp_set_current_user( $user_id, $user_login );
        wp_set_auth_cookie( $user_id );
        do_action( 'wp_login', $user_login );
    }
}




-------------------------------------------------------------------------
Enqueue scripts and stylesheets
-------------------------------------------------------------------------

This is an example of how to load both css and javascript files to the functions.php file instead of adding to the wp head.
This file is saying if the user is the administrator, these scripts will load.
First we have the css 'styles.css' file, then bootstrap.

We deregister the wordpress jquery and register the jQuery CDN from google.

Then we have our javascript which contains the bootstrap and a hard copy of jquery.
Finally we have a scripts.js file to which we ad any additional jquery we code by customly.

function my_scripts() {

    if ( !is_admin() ) {

        $template_url = get_template_directory_uri();

        // Register stylesheets.
        wp_register_style( 'bootstrap', $template_url . '/css/bootstrap.css', array(), '3.0.2', 'all' );

        // Load bootstrap stylesheet.
        wp_enqueue_style( 'bootstrap' );

        // Load main stylesheet.
        wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.0.0', 'all' );

        // Deregister WordPress jQuery.
        wp_deregister_script( 'jquery' );

        // Register Google CDN jQuery.
        wp_register_script( 'jquery-google', ("https://code.jquery.com/jquery-1.10.2.min.js"), array(), '1.10.2', true);

        // Load scripts.
        wp_enqueue_script( 'jquery-google' );
        wp_enqueue_script( 'bootstrap', $template_url . '/js/bootstrap.min.js', array( 'jquery-google' ), '3.0.2', true );
        wp_enqueue_script( 'plugins', $template_url . '/js/plugins.js', array( 'jquery-google' ), '1.0.0', true );
        wp_enqueue_script( 'scripts', $template_url . '/js/scripts.js', array( 'jquery-google' ), '1.0.0', true );

    }

}
add_action( 'wp_enqueue_scripts', 'my_scripts' );




-------------------------------------------------------------------------
Adding widget area to a specific section of a page.
-------------------------------------------------------------------------


First we need to add this code to our functions file..

//  Adding more Widget Areas to the Sidebar
//
 register_sidebar( array(
 'name' => __( 'Publications', 'YourChildThemeName' ),
 'id' => 'publications',
 'description' => __( 'A List of Publications', 'YourChildThemeName' ),
 'before_widget' => '<li id="%1$s">',
 'after_widget' => '</li>',
 'before_title' => '<h3>',
 'after_title' => '</h3>',
) );

we created an array which adds a new sidebar but replaces default one.

Now we need to create a new page from our page.php page and
create a template page called customwidget.php

remove the sidebar(); and replace that line of code with the following...
what it will do is replace the content of the default sidebar area..

<?php if ( is_active_sidebar( 'publications' )) { ?>
 <div id="secondary" class="widget-area" role="complementary">
            <ul class="xoxo">
                <?php dynamic_sidebar( 'publications' );} ?>
            </ul>
 </div><!-- #publication .widget-area -->


We then go into the dashboard, create a page and select the template page we created.


Now we need to go into our widget area and see we have a new area called publications.
Drag and drop wp calendars etc into the area and save.


In order to view our new content of widgets we need to go into our html and call in our page
ie              <?php
                    $homepagecontent = get_post(24);
                     ?>




-------------------------------------------------------------------------
Shortcodes and using Contact Form 7 Plugin
-------------------------------------------------------------------------


Add the contact 7 plugin. Create a form and a shortcode is generated.
This is consistent with other plugins so we will use the same method.

Create a template page....say, for this purpose, call it contact.php
When we have our div wrapper for the form and page layout out etc
we go back to the contact form and take a look at its generated shortcode.

Eg of a shortcode from contact 7.
[contact-form-7 id="36" title="test form"]

The echo this in our div we will wrap it in php ,like this
<?php echo do_shortcode('[contact-form-7 id="36" title="test form"]'); ?>

Before we add a while loop for a page or post that will show title or content

So with a post, we create a post and add it to our div...

callin in the post by its ID then echo the php shortcode.

<?php echo do_shortcode('[contact-form-7 id="36" title="test form"]'); ?>




-------------------------------------------------------------------------
Slider with Category Name using Flexslider
-------------------------------------------------------------------------

download flexslider slider folder


footer.php
include..

<script type="text/javascript" src="<?php bloginfo( 'template_url' );?>/js/jquery.flexslider.js" ></script>

                <script type="text/javascript">
                    // Can also be used with $(document).ready()
                    jQuery(window).load(function() {
                      jQuery('.flexslider').flexslider({
                        animation: "slide"
                      });
                    });
                </script>


home.php file
include


        <div class="flexslider">
                 <ul class="slides">

                 <?php
                 query_posts(array('category_name' => 'Featured', 'posts_per_page' => 3));
                 if(have_posts()) : while(have_posts()) : the_post();
                 ?>

                        <li class="featured-game">
                        <?php the_post_thumbnail(); ?>
                          </li>

        <?php
            endwhile;
            endif;

            wp_reset_query();
        ?>
    </ul>
  </div>




add category and posts with featured images

add js and css file...
the add this piece of css to rid the buttons on left...

.flex-control-nav{
    display: none;
}


Use the title and content of each post to add content to the slider
using relative and absolute positioning. see example css below.

li.featured-game h3{
position: absolute;
left: 50%;
top: 30px;
 color: #fff;
 font-weight: bold;
 font-size: 45px;
 margin: 0;
 padding: 0;
}


li.featured-game p{
position: absolute;
left: 50%;
top: 70px;
 color: #fff;
 font-weight: normal;
 font-size: 25px;
 margin: 0;
 padding: 0;
}


dont foget the wrap the_title(); and the_content(); in a h3 and a p tag


-------------------------------------------------------------------------
Slider with Shortcodes
-------------------------------------------------------------------------


Download a plugin like Nivoslider or Soliloquy and activate it.
Create a new slider in the slider panel (not on the page!).

Copy the shortcode from the slider field and add it to our echo shortcode.

Our ECHO shortcode...

<?php echo do_shortcode('[your code here]'); ?>

Now with our code from the plugin...

<?php echo do_shortcode('[soliloquy id="39"]'); ?>



            - - - - - - - - - - - - - - - - - - - -
_____OVERWRITING INLINE STYLE BY PLUGINS_____________

html

<div style="background: red;">
    The inline styles for this div should make it red.
</div>


css override

div[style] {
   background: yellow !important;
}

Use [style] and !important; when needed


-------------------------------------------------------------------------
Slider with Custom Fields and Repeater from ACF
-------------------------------------------------------------------------



IMPORTANT!!
ACF and the latest Repeater Plugin does NOT work with creating a slider.
We need to use the older ACF plugin which has the repeater plugin installed.
Add the plugin given by Sammi. Go into the Custom Fields settings, Activate 'Repeater'
and enter the serial number  QJF7-L4IX-UCNP-RF2W to get this going.

Give your custom field a name... slider

then from the Field Type Menu, select 'Repeater'

Add a subfield for an image, one for a Heading and one for a Caption.
if we click on these items we can change it to image or text etc.
Image for the images and text for the header and caption.



download flexslider slider folder and push the css and js into their relevant folders
add css in the header this to the footer....

footer.php
include..

script type="text/javascript" src="<?php bloginfo( 'template_url' );?>/js/jquery.flexslider.js" ></script>

                <script type="text/javascript">
                    // Can also be used with $(document).ready()
                    jQuery(window).load(function() {
                      jQuery('.flexslider').flexslider({
                        animation: "slide"
                      });
                    });
                </script>


now the home.php file ...



<div class="banner">
                                          <!--Flex Slider-->
                                          <div id="flexslider_main" class="flexslider">

                                            <ul class="slides">
                                              <?php if (have_posts()) : ?>
                                                  <?php while (have_posts()) : the_post(); ?>

                                                    <?php $slides = get_field('slider'); //the name of the field
                                                    $i = 1;

                                                    foreach ($slides as $slide){?>

                                                      <li>
                                                        <img src="<?php echo $slide['image']; ?>" class="slide_image img<?php echo $i; ?>"/>
                                                       <h2 class="header"><?php echo $slide['heading']; ?></h2>
                                                      </li>

                                                      <?php $i++;
                                                    } ?>

                                                <?php endwhile; else: echo 'No slide images found'; ?>
                                              <?php endif; ?>
                                            </ul>
                                          </div>
                                        <!--Flex Slider-->

</div><!--close banner-->