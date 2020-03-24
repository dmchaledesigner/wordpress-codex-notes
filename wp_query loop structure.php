<?php

            $args = array();                                                                                                                    //arguments

            $x = new WP_Query($args);                                                                                                   //query


             if($X->have_posts()) :                                                                                                          //loop
            while($X->have_posts()) :
            $X->the_post();
            ?>


            // My Code here


        <?php                                                                                                                                           //end while
        endwhile;
        else:
        ?>

        Oops, there are no posts.

        <?php
        endif;
        ?>





    Example:



    <?php

            $custom_query = new WP_Query('cat=-9'); // exclude category 9

            while($custom_query->have_posts()) : $custom_query->the_post(); ?>

            <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php the_content(); ?>
            </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); // reset the query

            ?>