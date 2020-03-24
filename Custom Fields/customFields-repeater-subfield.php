
					<?php

					$images = get_field('image_gallery');
					$numberofimages = count($images);
					$count = 0; // the counter


					if( $images ): ?>
					<?php foreach( $images as $image ): ?>

					<?php if($count == 0) { // counter is equal to 0 ?>
							<a href="<?php echo $image['url']; ?>" class="gallery portfolio-main-image">
							<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" class="rsp-img" /></a>

							<?php if($numberofimages > 1) { echo '<div class="portfolio-gallery">'; }?>

							<?php $count++ ?>

							<?php } else { ?>

							<a href="<?php echo $image['url']; ?>" class="portfolio-thumb-image gallery">
								<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
							</a>
						<?php }; ?>
					<?php endforeach; ?>
					<?php if($numberofimages > 1) { echo '</div>'; }?>
					<?php endif; ?>








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





<!-- 
 CUSTOM FIELDS WITH SANDBOX FILTERING
-->

<?php

$images = get_field('images', 160);

if( $images ): ?>
   <?php
    $unique_id = 00; ?>
    <ul class="clearfix portfolio-images portfolio-area">
        <?php foreach( $images as $image ): ?>
            <li class="portfolio-item2" data-id="id-<?php echo $unique_id;?>"  data-type="<?php echo $image['caption']; ?>">
                <a class="fancybox" href="<?php echo $image['sizes']['large']; ?>">
                     <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" /></a></li>
        <?php $unique_id ++;?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


