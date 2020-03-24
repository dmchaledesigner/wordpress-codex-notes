custom post type single template

1. create a custom post for a Menu like the below ...



add_action('init', 'OurMenu');

function OurMenu(){
    $OurMenu_args = array(
        'label' => __('Menu'),
        'singular_label' => __('menu'),
        'public'    =>  true,
        'show_ui'   =>  true,
        'capability_type'   =>  'post',
        'hierarchical'  =>  false,
        'has_archive' => true,
        'rewrite' => array('slug' => 'menu'),
        'rewrite'   =>  true,
        'supports'  =>  array('title',
                                            'editor',
                                            'excerpt',
                                            'trackbacks',
                                            'custom-fields',
                                            'comments',
                                            'revisions',
                                            'thumbnail',
                                            'author',
                                            'page-attributes' )

         );

        register_post_type('menu', $OurMenu_args);
}
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 132, 133, true );



notice how we have added thumbnail support and given it a thumbnail size parameter
which would indicate the size of the image on our psd file.



2.  create a post within our custom post and add some content, a title with a permalink which will link to the single post and add the featured image
which from the psd, should be the same size as the thumbnail provided in our custom post.

3. For a single custom post type template, we need to create another two files.
An archive-x.php file and a single-x.php. Both files will have the same loop for our template.
The archive is created for SEO and the single is for our single posts from the custom post type.

Our files will be called archive-menu.php and single-menu.php which relates to our custom post type.

5. In these files we are goin to say what we want to display when a single post is shown.
we want to output the loop with the title, permalink and a full thumbnail image.

So we add this code to both files (dont forget to include the header() and footer() ).


        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h4><?php the_title(); ?></h4>
            <?php the_post_thumbnail(full); ?>
            <p><?php the_content(); ?></p>



        <?php endwhile; else: ?>

        <div class="post">
        <p><?php _e('Sorry, no posts matched your criteria.', "hi-rezz"); ?></p>
        </div>

    <?php endif; ?>



4. now finally, we call in our custom posts to our page.

within the ul tag we use this code....

eg.
<ul class="menu">

<?php
 
$args = array('post_type' => 'Menu', 'order' => 'ASC');
$category_posts = new WP_Query($args);
 
if($category_posts->have_posts()) :
while($category_posts->have_posts()) :
$category_posts->the_post();
?>
 

    <li>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <p><?php the_excerpt(); ?></p>
        <?php the_post_thumbnail(); ?>
        
    </li>


<?php
endwhile;
else:
?>
 
Oops, there are no posts.
 
<?php
endif;
?>


</ul>


The above code calls in our custom post by CPT name and the rest we already know!


