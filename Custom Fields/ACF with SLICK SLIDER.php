ACF with SLICK SLIDER
=================

Add sick css and js to Wordpress Theme

Declare Custom Fields using the Repeater Field,
with image, caption etc

Use the Loop in addition to the html like so

<section class="hero-image ">

				<?php if( have_rows('slider') ): ?>

				<ul class="slides header-carousel">

				<?php while( have_rows('slider') ): the_row();

					// vars
					$image = get_sub_field('slideimg');
					$content = get_sub_field('slidecontent');
					$link = get_sub_field('slidelink');
					$title = get_sub_field('slidetitle');

					?>

					<li class="slide">
						<div class="headerslider-content">
						 <p class="headerslider-excerpt"><?php echo $title; ?></p>
						 <a class="headerslider-link" href="<?php echo $link; ?>"><?php echo $content; ?></a>
						</div>

						<img class="img-respsonsive sliderfullwidth" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

					</li>

				<?php endwhile; ?>

				</ul>

			<?php endif; ?>

			</section>





To add another slider we need to add another repeater with another name to identlfy that slider


<?php if( have_rows('midslider') ): ?>

				<ul class="slides mid-carousel">

				<?php while( have_rows('midslider') ): the_row();

					// vars
					$midimage = get_sub_field('midimg'); ?>


					<li class="slide">

						<div class="imgbox">
						<img class="img-respsonsive sliderfullwidth" src="<?php echo $midimage['url']; ?>" alt="<?php echo $midimage['alt'] ?>" />
						</div>

					</li>

				<?php endwhile; ?>

				</ul>

			<?php endif; ?>







<!-- Then activate the Javscript -->


Note using 'jQuery' onload function is safe mode as '$' sometimes isnt recognised by wordpress
jQuery(document).ready(function($){


     $('.header-carousel').slick({
       	dots: true,
  	infinite: true,
  	speed: 500,
  	fade: true,
  	cssEase: 'linear',
   	autoplay:true
      });


    });