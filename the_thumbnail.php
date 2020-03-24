<?php
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('full');
}
?>



To display a CPT with a thumbnail image, and then display the full image when the posts is opened...

Say we have a CPT of posts called Menu.
Measure the width and height of the single post thumbnail image in the PSD.
As an example, say 150px x 150px....

Go to your theme functions.php file and add this code:

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 250, 250, true ); // Normal post thumbnails

    add_image_size( 'smallmenu-thumbnail', 400, 400, true ); // Medium thumbnail size
    add_image_size( 'largemenu-thumbnail', 700, 700, true ); // Big thumbnail size
}

add_image_size( 'menu-thumbnail', 150, 150, true );

The above code is given the parameter of the 'menu' CPT we are creating
and will only be associated with this CPT.

So now we create a single-menu.php file so WP knows to use this file and not the themes' single.php file.
We also need to create an archive-menu.php file for SEO.

Now we simply drop in our loop for the CPT and change the thumbnail to 'full'.

Like this...


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h4><?php the_title(); ?></h4>
            <?php the_post_thumbnail(full); ?>
            <p><?php the_content(); ?></p>



        <?php endwhile; else: ?>

        <div class="post">
        <p><?php _e('Sorry, no posts matched your criteria.', "hi-rezz"); ?></p>
        </div>

    <?php endif; ?>




On our page where the thumbnail size is displayed, in our loop we place


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h4><?php the_title(); ?></h4>
            <?php the_post_thumbnail('menu-thumbnail'); ?> //this relates to the  ''add_thumbnail_size''
            <p><?php the_content(); ?></p>



        <?php endwhile; else: ?>

        <div class="post">
        <p><?php _e('Sorry, no posts matched your criteria.', "hi-rezz"); ?></p>
        </div>

    <?php endif; ?>





<?php the_post_thumbnail('thumbnail', array('class' => 'your-class-name')); ?>





Dont forget to leave the header and footer hooks!
Just replace the content with the above
 transmi

or use this for FEATURED image with a bg as a replacement in the IF statement

<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); ?>

        <section class="hero inner-hero bg-dark-red ">

<?php
                if ( has_post_thumbnail() ) {
                    echo the_post_thumbnail( 'full', array('class' => "inner-hero-image hero-image animated fadeIn"));
                } else { ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() )  ?>/images/inner-hero-slim.jpg" alt="East perth" class="inner-hero-image hero-image animated fadeIn ">
<?php } ?>







<?php
$image = get_field( '_image');
?>

<div class="intro-box">
                   
     <?php echo wp_get_attachment_image( $intro_box[$image], 'full' ); ?>

?>
