Taxonomy Notes - Snippets 




Finds the term 'portfolio' in the CPT 'projects'

<?php if( has_term( 'portfolio', 'projects' ) ) {
echo 'some code here';
} else {
echo 'some other code here';
} ?>



Full WP_Query Loop calling specific terms of a taxomony from a cpt

 <?php
                        $args = array(
                          'post_type' => 'product',
                          'tax_query' => array(
                            array(
                              'taxonomy' => 'product_category',
                              'field' => 'slug',
                              'terms' => array('drink', 'food'),
                            )
                          )
                        );

                        $products = new WP_Query( $args );
                        
                        if( $products->have_posts() ) {
                          while( $products->have_posts() ) {
                            $products->the_post();
                            ?>
                              <h1><?php the_title() ?></h1>
                              <div class='content'>
                                <?php the_content() ?>
                              </div>
                            <?php
                          }
                        }
                        else {
                          echo 'Oh ohm no products!';
                        }
                        wp_reset_postdata();

                      ?>



Showing taxonomy term posts from the term civil engineering only

 <?php
                        $args = array(
                          'post_type' => 'Projects',
                          'tax_query' => array(
                            array(
                              'taxonomy' => 'portfolio',
                              'field' => 'slug',
                              'terms' => 'civil_engineering', // add more terms add an array ('term one', 'term2')
                            )
                          )
                        );

                        $terms = new WP_Query( $args );
                        
                        if( $terms->have_posts() ) {
                          while( $terms->have_posts() ) {
                            $terms->the_post();
                            ?>

                             <div class="col span_3 boxholder">
                                        <div class="thumbwrapper">
                                         <a href="<?php the_permalink();?>"><?php the_title(); ?></a>                
                                        <?php the_post_thumbnail(); ?>
                                        </div>
                           </div>


                            <?php
                          }
                        }
                        else {
                          echo 'Oh ohm no products!';
                        }
                        wp_reset_postdata();

                      ?>





Using the Category Images plugin, this enable each term to have an image.
Specific code is used so the image can vbe placed into the loop...
http://zahlan.net/blog/2012/06/categories-images/

<ul>
 <?php foreach (get_terms('portfolio') as $cat) : ?>
                             <li>
                             <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
                             <a href="<?php echo get_term_link($cat->slug, 'portfolio'); ?>"><?php echo $cat->name; ?></a>
                             </li>
                             <?php endforeach; ?>
</ul>




Display posts tagged with bob, under people custom taxonomy, using tax_query:

<?php
$args = array(
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'people',
            'field'    => 'slug',
            'terms'    => 'bob',
        ),
    ),
);

?>
$query = new WP_Query( $args );

<?php 
$query = new WP_Query( $args ); ?>






Code to display posts within a taxonomy term..



                           <?php
                        $args = array(
                          'post_type' => 'Projects',
                            'order' => 'ASC',

                          'tax_query' => array(
                            array(
                              'taxonomy' => 'portfolio',
                              'field' => 'slug',
                              'terms' => 'industrial',
                            )
                          )
                        );

                        $terms = new WP_Query( $args );
                        
                        if( $terms->have_posts() ) {
                          while( $terms->have_posts() ) {
                            $terms->the_post();
                            ?>

                             <div class="col span_3 boxholder">
                                        <div class="thumbwrapper">
                                         <a href="<?php the_permalink();?>"><?php the_title(); ?></a>                
                                        <?php the_post_thumbnail(); ?>
                                        </div>
                           </div>


                            <?php
                          }
                        }
                        else {
                          echo 'Oh ohm no products!';
                        }
                        wp_reset_postdata();

                      ?>