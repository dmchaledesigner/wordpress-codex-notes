How to show image and category name from a taxonomy


<ul>

   <?php 

             $args = array(
             'number'     => $number,
            'orderby'    => $orderby,
             'order'      => $order,
             'taxonomy' => 'product_cat',
            'parent' => 0,
            "hide" => -1,                                                                              
             );

             $product_categories = get_categories($args);

             foreach( $product_categories as $cat )
             {
                echo '<li>';
                echo '<a href="' . get_category_link( $cat ) . '">' . $cat->name . '</a>';



                echo '</li>'

                ;}

              ?>

             </ul>

            


Now we need to add a plugin for a category image, add the image and call it via the plugin documentation.



or we could use ....


<?php

             foreach (get_terms('latest_works') as $cat) : ?>
             <li>
             <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
             <a href="<?php echo get_term_link($cat->slug, 'latest_works'); ?>"><?php echo $cat->name; ?></a>
             </li>
             <?php endforeach; ?>