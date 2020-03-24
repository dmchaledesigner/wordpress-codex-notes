<?php get_header();?>
<!-- Header -->
<?php

$banner_img_style = ($v = get_banner_image_style_value())?'style="'.$v.'"':'';

?>
<style>
.stButton .stLarge
{
	height: 20px !important;
    width: 20px !important;
}
.share-text
{
	text-transform: uppercase;
	color: #5c6771;
	font: 14px/22px "Helvetica77", sans-serif;
}
.stButton .stLarge:hover
{
	background-position: 0px !important;
}
.share-this .st_linkedin_large .stLarge {


}
.share-this .st_facebook_large .stLarge {

}
.share-this .st_twitter_large .stLarge {

}
.share-this .st_email_large .stLarge {

}
</style>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<header id="guides-category" <?php echo $banner_img_style?>>
<?php include ('navigation.php');?>
<!-- header Content -->
    <div class="container header-content">
<?php /*<div class="backto"><a href="/guides" class="txt-white">Back to employer guides </a></div>*/?>
<div class="header-content-inner text-center">
<?php

//echo $cur_cat_id = get_cat_id( single_cat_title("",false) );
$cur_cat_id = $wp_query->get_queried_object_id();
$term       = get_term_by('id', $cur_cat_id, $taxonomy);

// $cat_icon_id = get_field( '_topic_icon', $term );
// $cat_icon = wp_get_attachment_image_src( $cat_icon_id, 'full' );

?>

<h1>
<span class="txt-white"><?php echo single_cat_title();?></span>
<?php if ($cat_icon):?><img src="<?php echo $cat_icon[0];?>" alt="<?php echo single_cat_title();?>"><?php endif;
?>
            </h1>
            <div class="hc-para">
                <p class="txt-white para"><?php echo strip_tags($term->description);?></p>
            </div>
        </div>
    </div>

    <div class="shape bg-x-blue"></div>
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



<section class="section">

<!-- start of tax term group-->
<div class="container video-layout">


<div class="row">

<?php $wp_query; // echo '<pre>'.print_r($wp_query,true).'</pre>'; ?>


            <?php $i=0; if(have_posts()) : while(have_posts()) : the_post(); $i++; ?>
            

            <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="movie-wrapper">

                            <div class="img-box">
                                        <a href="<?php the_permalink();?>" title="video link"></a>
                                        <?php the_post_thumbnail('video-thumb', array('class' => 'img-responsive')); ?>

                                    </div>


                                <h3><a href="<?php the_permalink();?>"><?php the_field('title'); ?></a></h3>
                                <p class="para"><?php echo wp_trim_words( get_the_content(), 16, '...' ); ?></p>
                                    
                            </div>
                    </div>

				<?php 
					if( $i % 2 == 0 ) echo '<div class="space-2"></div>'; 
					if( $i % 3 == 0 ) echo '<div class="space-3"></div>';
				?>
                    

            <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

</div>
    
</div><!-- end container-->
</section>



<section>
    






</section>


<?php get_footer();?>