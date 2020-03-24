ACF and background Images
==========================

In the html we use inline styles on our divs instead of using css to apply background images.
This enables us to make the image dynamic with using background images that could usually only be applied via css




HTML
<div class="image" style="background-image: url('image/image1.jpg'); background-size: cover">

In workpress we would have to add <?php get_the_directory_url(); ?>/image/image1.jpg into the above to make the image path work.



ACF

In our  custom fields, make sure we select image url and not the object when making a field



Simply call the field in replace of our inline image style.

<div style="background-image: url( <?php echo $image['url']; ?>); background-size: cover; min-height: 45vh" title="<?php echo $image['alt']; ?>"></div>







For images in a repeater field we can use
===========================================

<div class="col-md-6 featured-image" style="background-image: url(<?php the_sub_field('image');?>)">

Look at the ACF Repeater get_sub_field for instuctions







using 'Image Attachment' selection
==================================



<?php

// ACF with image attachment

$thumb_id  = get_field('_hero_img');
$thumb_url = wp_get_attachment_image_src($thumb_id, 'full', true);


// Where 'full' is, we can replace with a custom size.
?>