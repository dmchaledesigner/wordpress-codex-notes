        <div class="row">
            <?php

            $args = array(
                'post_status' => 'publish',
                'hide_empty' => false
            );
            
            //$categories = get_categories( $args );

            $categories = get_terms( array('topics'), $args );
            $cn = 0;
            $i = 0;

            foreach ( $categories as $category ) {
                $cn++;
                if ( $category->name == 'Uncategorized' )
                    continue;

                $args = array(
                    'posts_per_page' => 3,
                    'orderby' => 'rand',
                    'post_type' => 'guide',
                    //'category' => $category->term_id,
                    'tax_query' => array(
                        array(
                        'taxonomy' => 'topics',
                        'field' => 'term_id',
                        'terms' => $category->term_id)
                    ),
                    'post_status' => 'publish',
                );

                $show_guides = get_posts( $args );
                $cat_icon_id = get_field( '_topic_icon', $category );
                $cat_icon = wp_get_attachment_image_src( $cat_icon_id, 'full' );


                if ( $i % 3 == 0 && $i != 0 ) {
                    echo '</div><div class="row">';
                }
                ?>

                <div class="col-md-4 guides-cat">
                    <div class="guides-cat-inner">
                        <h3>
                            <?php if ( $cat_icon[0] ): ?>
                                <img src="<?php echo $cat_icon[0]; ?>" alt="<?php echo $category->name; ?>">
                            <?php endif; ?>
                            <a href="<?php echo str_replace( '/blog', '', get_term_link( $category->term_id ) ); ?>" class="txt-blue"><?php echo $category->name; ?>.</a>

                        </h3>
                        <p class="guides-cat-text"><?php $cat_desc = ( $category->description ); echo strip_tags($cat_desc); ?></p>
                        <p><?php if ( count( $show_guides ) > 0 ) { ?><strong>Top Guides</strong><?php } ?></p>
                        <ul class="guides-cat-links">
                            <?php foreach ( $show_guides as $guide ) { ?>
                                <li><a href="<?php echo get_permalink( $guide->ID ); ?>" class="txt-dark-grey"><?php echo $guide->post_title; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php $i++; } ?>
        </div>