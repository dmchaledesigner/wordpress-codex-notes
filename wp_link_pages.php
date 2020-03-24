wp_link_pages();

This teach us how to break up a wp page into a series of chunks so we can flip through sections of a pages' content.
It's very easy to accomplish in WordPress and more people should do it. Here's how you can.


EDITING THE PAGE CONTENT
=====================


Simply write your post or page as normal and whenever you need to start a new page, use the '<!--nextpage-->'' quicktag.

This is what our page content would look like...

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis justo eu eros eleifend vulputate. Sed nec tempus ipsum, et suscipit arcu. Donec ut malesuada mi. Fusce fringilla, risus sed faucibus accumsan, metus dolor congue urna, vitae vulputate mauris lacus ut ante. Duis ac sodales tellus. Praesent ut posuere nunc. Nunc neque lacus, eleifend et convallis non, volutpat bibendum eros. Nam egestas sem vel est eleifend sodales. Vestibulum lacinia feugiat placerat. Donec placerat sem pretium consectetur pretium. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc iaculis arcu at finibus rhoncus. Curabitur pellentesque at lacus sed eleifend.
<!--nextpage-->
Proin cursus purus id nisi malesuada, nec placerat libero egestas. Mauris ac bibendum lacus. Sed laoreet bibendum ipsum, ut congue ipsum tempus sed. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras non tortor quis ex ultricies aliquam. Suspendisse suscipit ex mollis ex faucibus, eget efficitur enim facilisis. Sed eget posuere elit. Cras et ex dui. Suspendisse tincidunt vulputate elit id ullamcorper. Nunc blandit nulla ut tortor hendrerit suscipit. In vestibulum et ex sed porttitor. Nullam libero ligula, mattis sed ante vel, gravida fringilla elit. Curabitur aliquam ex interdum nisl consequat, in fermentum ante eleifend. Sed eget sagittis nulla. Praesent quis rutrum ante.
<!--nextpage-->
Aenean congue, tellus in auctor porttitor, lorem velit hendrerit turpis, ac finibus diam quam ac turpis. In volutpat mollis nunc, sit amet porta tellus consectetur sit amet. Phasellus efficitur sem in erat suscipit, nec aliquam quam varius. Quisque tempor nunc sapien, quis placerat est aliquet rutrum. Quisque convallis elit at diam cursus, eu tempus neque rutrum. Etiam gravida risus dolor, pulvinar condimentum lorem pulvinar ut. Integer ac dictum leo. Donec in purus erat. Nulla pellentesque porttitor lorem, in cursus turpis laoreet vitae. Phasellus venenatis libero a facilisis efficitur.



EDITING THE SINGLE.PHP LOOP
=====================

In single.php (or perhaps loop-single.php, which is often called from single.php)
you'll find the WordPress loop which displays your post or page. Here's a cutdown version of that loop...

if (have_posts()) while (have_posts()) : the_post();
 
  the_title();
  the_content();
  wp_link_pages();
 
endif;
endwhile;


This loop displays the post or page title and the content, but notice the wp_link_pages function.
This function displays a set of page links as per the <!--nextpage--> quicktags you put in your post.

Now the page pagination (section splitting) should work!


STYLING THE PAGE LINKS
================

The default output of wp_link_pages is functional but pretty boring. But wp_link_pages also let's us add before and after text to the default output so that we can target the paging links with CSS.

if (have_posts()) while (have_posts()) : the_post();
 
  the_title();
  the_content();
   
  wp_link_pages(array(
    'before' => '<div class="page-link">' . 'Pages:',
    'after' => '</div>'
    ));
 
endif;
endwhile;








