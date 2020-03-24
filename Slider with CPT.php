<!-- // Slider CPT - add to your functions file -->
<?php
add_action('init', 'slider');

function slider(){
    $slider_args = array(
        'label' => __('Slider),
        'singular_label' => __('Slider'),
        'public'    =>  true,
        'jobs_position' => 20,
        'show_ui'   =>  true,
        'capability_type'   =>  'post',
        'hierarchical'  =>  false,
        'has_archive' => true,
        'rewrite' => array('slug' => 'slider'),
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

        register_post_type('slider', $slider_args);
}

?>




// add to your page


<?php
 

 
                $args = array('post_type' => 'slider, 'order' => 'ASC');

                    $category_posts = new WP_Query($args);
 
                    if($category_posts->have_posts()) :
                    while($category_posts->have_posts()) :
                    $category_posts->the_post();
                    ?>
 

                    // featured image, title, custom fields here
    

    
                    <?php endif; ?>

                    <?php
                    endwhile;
                    else:
                    ?>
 
                    Oops, there are no posts.
 
                    <?php
                    endif;
                    ?>