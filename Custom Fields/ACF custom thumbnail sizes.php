ACF custom thumbnail sizes


Add custom image sizes to the functions file..


<?php

if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

	if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'gallerythumb', 360, 280, true );
}

?>

Always make sure the images are larger than the custom sizes specified!!!


Now we have to regenerate the image sizes by using Regenerate Thumbnails plugin.
Install, activate and run on all images after the functions above have been declared.



When using the repeater field with images, note that we ue the array when adding images, not the url

Study the code below and see how it works, then look at how the images from the gallery are called, by url






Repeater with array....


<div class="row whyplayposts">


				<?php if( have_rows('play_posts') ): ?>


				<?php while( have_rows('play_posts') ): the_row();

					// vars
					$whyimage = get_sub_field('why_img');
					$whytitle = get_sub_field('why_post-title');
					$whyspan = get_sub_field('post-title-span');
					$whycontent = get_sub_field('why_content');

					?>


					<div class="col-md-4">
						<div class="postwrapper js-equal-height">

							<div class="imgbox">
							<img class="img-reponsive" src="<?php echo $whyimage['sizes']['gallerythumb']; ?>" alt="<?php echo $whyimage['alt']; ?>" />
							</div>

							<div class="content">
							<h4><?php echo $whytitle; ?> <span><?php echo $whyspan; ?></span></h4>
							<p><?php echo $whycontent; ?></p>
							</div>

						</div>
					</div>



					<?php endwhile; ?>

					</ul>

					<?php endif; ?>



		</div>








//ACF Gallery that uses IMG url only



<?php

						$galimages = get_field('gallery');





						if( $galimages ): ?>
						    <ul>
						        <?php foreach( $galimages as $galimage ): ?>
						   <li>
							<div class="col-xs-6 col-sm-6 col-md-4">
								<div class="imgbox">

								<a href="<?php echo $galimage['url']; ?>"><img rel="lightbox[gallery]" src="<?php echo $galimage['sizes']['gallerythumb']; ?>"  /></a>


								</div>
							</div>


						     </li>
						        <?php endforeach; ?>
						    </ul>
						<?php endif; ?>








WP IMAGE ATTACHMENT
====================


<div class="intro-box">
                   
     <?php echo wp_get_attachment_image( $intro_box[$image], 'full' ); ?>

?>




