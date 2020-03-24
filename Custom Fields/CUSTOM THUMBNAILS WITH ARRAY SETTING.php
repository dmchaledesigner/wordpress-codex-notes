CUSTOM THUMBNAILS WITH ARRAY SETTING

<!--
1. Create custom image size in functions file.
2. Create repeater field in ACF using Repeater Field and and an image as part of the Repeater
3. Add the code below and note the image sizes.
-->


<section class="container padding">

<article class="container padding">
<h1>Latest Listings....something for everyone!</h1>
</article>


<div class="row">


		<?php if( have_rows('properties') ): ?>

		<?php while( have_rows('properties') ): the_row();

		// vars

		$img=get_sub_field('img');
		$size = 'listing-thumbs';
		$thumb = $img['sizes'][ $size ];

		$title= get_sub_field('title');
		$link = get_sub_field('link');
		$content = get_sub_field('content');

		?>

		<div class="col span_6 remax-listings">

		<?php if ($img): ?>
          		<img src="<?php echo $thumb; ?>" alt="<?php echo $img['alt'] ?>">
   		 <?php endif;?>

		<h3><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
		<p><?php echo $content; ?></p>

		</div>


		<?php endwhile; ?>



		<?php endif; ?>



</div>
</section>


