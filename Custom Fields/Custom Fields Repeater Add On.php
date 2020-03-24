<!--

Custom Fields Repeater Add On

1. Activate and install the Repeater Add On with ACF

2. Create a Custom Field and Select the Repeater from the drop down.
This enables us to add a group of required fields to one field name.
IE, we can have a field called Staff Members and within that field, the Repeater can hold information
for the staff image, position, quote etc.

Dont forget to assign the field to the page of post you want to apply it to.

Sample of a loop with a Staff Member image etc.


-->

<div id="content">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('content', 'page'); ?>

<?php if(get_field('staff_members')); ?>

        <div class="staff-members">

        <?php while(has_sub_field('staff_members')); ?>

        <div class="staff-member">
        <img src="<?php $image = get_sub_field('image'); echo $image['url']; ?>" />
        <h2><?php the_sub_field('name'); ?></h2>
        <p><?php the_sub_field('quote'); ?></p>
        </div>


        <?php endwhile; ?>
        <? endif; ?>




</div><!--close staff members-->
</div><!--close content-->


<!--

ref: http://www.advancedcustomfields.com/add-ons/repeater-field/

Snippets for ACF
http://www.advancedcustomfields.com/resources/image/

or use....

-->


<?php if ( get_field( 'slides' ) ) : // repeater field ?>

    <ul class="slider">
        <?php while ( the_repeater_field( 'slides' ) ) :
            $image = get_sub_field( 'slide' ); // sub-field image ID
            $slide = wp_get_attachment_image_src( $image, 'slides' );
            $alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
            ?>
            <li><img src="<?php echo $slide[0]; ?>" alt="<?php echo $alt; ?>"></li>
        <?php endwhile; ?>
    </ul>

<?php endif; ?>


<!-- NOTE the field and subfield relationship -->



<!-- -------------------------------
ADDING A SINGLE IMAGE
--------------------------------

1. Create a custom Field called 'Pageimage'

2. Select 'Repeater' from the dropdown and add a Subfield called 'Image'.

3. In the 'image' subfield settings,  make sure you have selected the return value as 'Object', with C/Logic set to No.

4.  You can add another subfield eg, a title using 'text' from the dropdown and call it 'title'.

5. Assign the Custom field to a page or post via the 'location rule'.

6. Open your page / post and you shall see your 'add image' button and text are where the custom field has been applied.
Add your image and insert sample text for you title subfield.

7. Go to your page code and where you want your custom field to appear use this code.... -->

<?php

$image = get_field('image');

if( !empty($image) ): ?>
<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
<h2><?php the_sub_field('title'); ?></h2>

 <?php endif;

 ?>


<!-- -----------------------------------------------
ADDING A SINGLE IMAGE WITH HEADER AND CAPTION
------------------------------------------------ -->



<!--
As above.....

Create the Field.

Add repeater field containing image, text for heading and text for caption

As similar code suggests.....

-->




   <!--Flex Slider-->
                                          <div id="flexslider_main" class="flexslider">

                                            <ul class="slides">
                                                    <?php if (have_posts()) : ?>
                                                    <?php while (have_posts()) : the_post(); ?>

                                                    <?php $slides = get_field('slider');
                                                    $i = 1;

                                                    foreach ($slides as $slide){?>

                                                    <li>
                                                    <img src="<?php echo $slide['image']; ?>" class="slide_image img<?php echo $i; ?>"/>
                                                    <h2><?php echo $slide['heading']; ?></h2>
                                                    <p><?php echo $slide ['caption']; ?></p>
                                                    </li>

                                                    <?php $i++;
                                                    } ?>

                                                    <?php endwhile; else: echo 'No slide images found'; ?>
                                                    <?php endif; ?>
                                                    </ul>
                                                    </div>
      <!--Flex Slider-->






<!--       For looping through posts
      =====================

      Create a Custom field for your page
      Then add a field, (this will be the parent).
      Select Repeater -> these will be sub fields
      Add an image, text etc

        Place the html inside a loop like so...

        Note the variable declared at the start.
        These are the parent and sub fields we want to add.
        They simply are declared and placed into the html. -->




                <div class="row">

                        <?php

                        $repeaterAbout = 'bottom-products';
                        $bottomTitle = 'thumbnail-title';
                        $bottomImage = 'thumb-image';

                         if(get_field( $repeaterAbout )): ?>

                            <?php while(has_sub_field( $repeaterAbout )): ?>

                                <div class="col-md-4">
                                    <div class="imgbox">
                                    <div class="overlay-about-product"><h4><a href=""><?php the_sub_field( $bottomTitle ); ?></a></h4></div>
                                     <img src="<?php $image = get_sub_field( $bottomImage ); echo $image['url']; ?>" />

                                    </div>
                                </div>

                            <?php endwhile; ?>

                        <?php endif; ?>



                </div>









EXAMPLE OF FOR LOOP FOR POSTS ETC

===================






<section class="container-fluid homepage-posts">

          <?php
                $products = get_field('feature_products');
                $numberofproducts = count($products);
                $count = 0;

                    while( have_rows('feature_products') ): the_row();

            $image = get_sub_field('product_image'); ?>

            <?php if($count == 0) { ?>

            <div class="row postbox">
                           <div class="col-sm-12">
                                <div class="imgbox">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                                </div>
                                <div class="contentbox ">
                                    <h3 class="homepage-posts"><?php the_sub_field('product_name'); ?><span> <?php the_sub_field('product_span'); ?></span></h3>
                                    <p><?php the_sub_field('product_text'); ?></p>
                                    <a href="<?php the_sub_field('product_link'); ?>" class="btn btn-grey">view <?php the_sub_field('product_name'); ?></a>
                                    <a href="<?php the_sub_field('gallery_link'); ?>" class="btn btn-transparent">view gallery</a>
                </div>


                </div>
                   </div>

            <?php $count++ ?>

                        <?php } elseif ($count == 1) { ?>

                <div class="row postbox postblock">
                    <div class="col-sm-6">
                        <div class="imgbox">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                        </div>
                        <div class="contentbox js-equal-height">
                            <h3 class="homepage-posts"><?php the_sub_field('product_name'); ?><span><?php the_sub_field('product_span'); ?></span></h3>
                            <p><?php the_sub_field('product_text'); ?></p>
                            <a href="<?php the_sub_field('product_link'); ?>" class="btn btn-grey">view <?php the_sub_field('product_name'); ?></a>
                            <a href="<?php the_sub_field('gallery_link'); ?>" class="btn btn-transparent">view gallery</a>
                        </div>
                    </div>
                        <?php $count++ ?>

                        <?php } elseif ($count == 2) { ?>

                    <div class="col-sm-6 postblock">
                        <div class="imgbox">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                        </div>
                        <div class="contentbox js-equal-height">
                            <h3 class="homepage-posts"><?php the_sub_field('product_name'); ?><span><?php the_sub_field('product_span'); ?></span></h3>
                            <p><?php the_sub_field('product_text'); ?></p>
        <a href="<?php the_sub_field('product_link'); ?>" class="btn btn-grey">view <?php the_sub_field('product_name'); ?></a>
                            <a href="<?php the_sub_field('gallery_link'); ?>" class="btn btn-transparent">view gallery</a>
                        </div>
                    </div>
            </div>
                        <?php $count++ ?>

                        <?php }; ?>

        <?php endwhile; ?>




        </section>


