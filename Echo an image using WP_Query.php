<!-- Echo an image using WP_Query

------------
Steps
------------

1. Call $args
2. Query the Argument with wp_query
3. Create the loop
4. Create the image loop
5. Add the html
6. End loop

EG. -->

 <?php
                             
   $args = array(
   'cat' => 41
   );

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


    