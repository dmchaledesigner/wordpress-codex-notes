<?php
/**
 * Template Name: NivoSlider
 */

get_header(); ?>

<div class="main-wrapper">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                
                            <?php if(get_field('images')): ?>
                            <div id="slider">
                                <?php while(the_repeater_field('images')): ?>
                                 
                                    <img src="<?php echo $image[0]; ?>" alt="<?php  the_sub_field('title');?>" rel="<?php echo $thumb[0]; ?>" />
                                <?php endwhile; ?>
                            </div>
                            <?php endif; ?>

            </div><!-- col -->
        </div><!-- main-row-1 -->

    </div><!-- container -->
</div><!-- main-wrapper -->

<?php get_footer(); ?>
