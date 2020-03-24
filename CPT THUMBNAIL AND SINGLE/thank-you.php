CPT, SINGLE CPT POST, THUMBNAIL AND COMMENTS


1. CREATE THE CUSTOM POST TYPE
    B. ADD THEME THUMBNAIL SUPPORT
    C. THUMBNAIL SIZING FOR CPT 
    
        add_action('init', 'products');

        function products(){
            $products_args = array(
                'label' => __('Products'),
                'singular_label' => __('products'),
                'public'    =>  true,
                'show_ui'   =>  true,
                'capability_type'   =>  'post',
                'hierarchical'  =>  false,
                'has_archive' => true,
                'rewrite' => array('slug' => 'products'),
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

                register_post_type('products', $products_args);
        }
            add_theme_support( 'post-thumbnails' ); // SHOULD BE ALREADY PART OF THE THEME FOR GENERAL SUPPORT
         add_image_size( 'product-thumbnail', 250, 187, true ); //SIZE OF THE IMAGE IN PSD FILE 



2.  ADDING SPECTIFIC FILES FOR OUR CPT TO OVERWRITE SINGLE.PHP
    
        Copy single.php and call it single-products.php (the name of the cpt). Now copy the same file and call it archive-products.php
        These two files work together for our CPT to display the excerpt thumbnail image etc, to full image and content.

        View the two files attached to this folder for reference.

        Note the loop: 

         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h4 class="products"><?php the_title(); ?></h4>
            <?php the_post_thumbnail(full); ?>
            <p><?php the_content(); ?></p>


        <?php endwhile; else: ?>

        <div class="post">
        <p><?php _e('Sorry, no posts matched your criteria.', "hi-rezz"); ?></p>
        </div>

        <?php endif; ?>

        Then if we want to add comments we simply add this code below the above:

        <?php if ( is_single() || is_page() ) : ?>

    <a name="comments"></a>
    <?php if ( have_comments() && comments_open() ) : ?>
        <h4 id="comments"><?php comments_number( 'No Comments', 'One Comment', '% Comments' );?></h4>
        <ul class="commentlist">
            <?php wp_list_comments(); ?>

            <p class="text-right clearfix">
                <?php paginate_comments_links(); ?>
            </p>

            <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
        </ul>
        <div class="well"><?php comment_form(); ?></div>

    <?php else : ?>

        <?php if ( comments_open() ) : ?>
            <div class="well"><?php comment_form(); ?></div>
        <?php endif; ?>

        Not forgetting our header and footer hooks on each page!

        This CPT will display the full image and content, plus comments for the user.




3.  NOW WE CREATE OUR ACTUAL PRODUCTS.PHP PAGE USING TEMPLATE PAGE.
    CREATE THE ALTERNATIVE PAGE IN THE DASHBOARD AND ASIGN THE TEMPLATE "PRODUCTS"

4.  ADDING OUR LOOP AND THUMBNAIL IMAGE, EXCEPT TO THE PRODUCTS.PHP PAGE

