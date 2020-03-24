<?php 

/*Template name: Project Categories*/

get_header(); ?>
	
<?php $options = get_option('salient'); ?> 



<div class="home-wrap">

	<div class="container main-content">
		
		<div class="row">
	                           
                               <div id="about us" class="col span_12 ">


                            <ul class="taxonomyCategories">

                            <?php

                                $custom_terms = get_terms('portfolio');

                                foreach($custom_terms as $custom_term) {
                                    $args = array('post_type' => 'projects',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'portfolio',
                                                'field' => 'slug',
                                                'terms' => $custom_term->slug,
                                            ),
                                        ),
                                     );

                                     $loop = new WP_Query($args);
                                     if($loop->have_posts()) {
                                       while($loop->have_posts()) : $loop->the_post();


                                        echo '<li>'.'<a href="' . $term_link . '">' .$custom_term->name.'</a>';
                                        echo wp_get_attachment_image( $term->image_id, '' );
                                        echo '<p>'. get_the_content() .'</p>'.'</li>';


                                        endwhile;
                                     }
                                }
                                
                                 wp_reset_query();


                                ?>

</ul>


                                </div>

		</div><!--/row-->
		
		
			

	</div><!--/container-->

</div><!--/home-wrap-->
	
<?php get_footer(); ?>