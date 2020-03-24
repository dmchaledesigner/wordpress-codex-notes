<?php
/**
 * The template for Videos
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
/* Template Name: Videos */


get_header(); ?>
<!-- Header -->



<header id="videos" style="background: url(<?php the_field('header_image',23164); ?>) center center no-repeat; background-size: cover;">
<?php include ('navigation.php');?>
    <!-- header Content -->
    <div class="container header-content txt-center">
        <div class="container header-content text-center">
        <div class="row">
            <div class="col-md-12 rmb-35">
                <h1><span class="txt-white"><?php the_field('header_title',23164); ?></h1>
                <div class="row hc-para">
                    <div class="col-md-12">
                      <p class="txt-white para"><?php the_field('header_subtitle',23164); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    </div>
</header>

<section class="crumbs-toolbar">

    <div class="container">
        <div class="row">

             <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
<?php
if (function_exists('bcn_display')) {
	bcn_display();
}?>
</div>

        </div>
    </div>

</section> <!-- close crumbs-toolbar-->






<section class="section article">



<!-- start of tax term group-->
<div class="container video-layout">


            <?php 
            $terms = get_terms('series');
            
            foreach( $terms as $term ):

            $term_link = get_term_link( $term ); ?> 

              <div class="row term-links"> 

                <div class="col-md-4">
                <a href="<?php echo $term_link; ?>" class="text-left"><?php echo $term->name; ?></a>
                </div>

                <div class="col-md-4 col-md-push-4">
                <a href="<?php echo $term_link; ?>">See more <span> > </span></a>
                </div>

 </div> 



   

    <div class="row movie-row">
                  <?php                         
                      $posts = get_posts(array(
                        'post_type' => 'videos',
                        'order' => 'DESC',
                        'taxonomy' => $term->taxonomy,
                        'term' => $term->slug,                                  
                        'numberposts' => 3, // to show all posts in this taxonomy, could also use 'numberposts' => -1 instead
                      ));

                      foreach($posts as $post): // begin cycle through posts of this taxonmy
                        setup_postdata($post); //set up post data for use in the loop (enables the_title(), etc without specifying a post ID)
                  ?>        
                     

                          <div class="col-xs-12 col-sm-6 col-md-4">

                          <div class="movie-wrapper">
                          
                          <h3><a href="<?php the_permalink();?>"><?php the_field('title', $post);?></a></h3>
                          <p class="para"><?php echo wp_trim_words(get_the_content(), 16, '...');?></p>

                          <div class="img-box">
                          <a href="<?php the_permalink();?>" title="video link"></a>
                           <?php // wp_get_attachment_image( $post->image_id ); ?>
                          <?php echo get_the_post_thumbnail($post, 'video-thumb', array('class' => 'img-responsive'));?>


                          </div>

                          </div>
                        </div>


                      <?php endforeach; ?>
                
     </div><!--close row-->  

            <?php endforeach; ?>





	
</div><!-- end container-->





</section>

<?php get_footer();?>