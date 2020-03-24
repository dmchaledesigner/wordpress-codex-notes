<?php if ( get_field( 'slides' ) ) : // repeater field ?>

    <ul class="slider">


        <?php while ( the_repeater_field( 'slides' ) ) :

        	// vars
            $image = get_sub_field( 'slide' ); // sub-field image ID
            $slide = wp_get_attachment_image_src( $image, 'slides' );
            $alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
            ?>

            <!-- list item -->
            <li><img src="<?php echo $slide[0]; ?>" alt="<?php echo $alt; ?>"></li>
        <?php endwhile; ?>
    </ul>

<?php endif; ?>






<?php

// or we can use the acf options so not attached to one page 

$frontpage_id = get_option( 'page_on_front' );

$banner_gallary = get_field( '_home_banner_images', 'options');
$gallary_count = count( $banner_gallary );

// var_dump( $banner_gallary );

$sat = rand( 1, $gallary_count );

$i = 1; // incrementor

if ( $banner_gallary ) {
    foreach ( $banner_gallary as $item ) {
        if ( $i == $sat ) {
            $banner_img_style = ( $item['url'] ) ? 'style="background-image: url('. $item['url'] .');"' : '';
            break;
        }
        $i++;
    }
}

?>


<header id="home" class="home" <?php echo $banner_img_style; ?>>
</header>