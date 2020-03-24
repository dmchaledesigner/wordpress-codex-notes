<?php ?>
	<article id="post-<?php the_ID();?>" <?php post_class();
?>>


		<div class="entry-content">


<?php if (have_rows('flexible_content')):// if the flexible content block name exists
while (have_rows('flexible_content')):the_row(); //  while the flexible content block name exists ?>


					<?php // first block ?>
					<?php		if (get_row_layout() == 'image_text_overlay'):// get this layout fields block from the flexible content area ?>
												
												<section class="text-overlay">
												<h1><?php the_sub_field('overlay_text');?></h1>
												<?php $background_image = get_sub_field('background_image');?>
												<img src="<?php echo $background_image['url'];?>">
												</section>

							<?php // second block ?>
							<?php  elseif (get_row_layout() == 'image_and_text_block'):// get this layout fields block from the flexible content area ?>
							
												<section class="text-centered">
													<?php $featured_image = get_sub_field('featured_image');?>
												<img src="<?php echo $featured_image['url'];?>">
																		<section class="text-block">
																		<?php the_sub_field('description_text');?>
																		</section>
												</section>

							<?php // third block ?>
							<?php  elseif (get_row_layout() == 'callout_blocks'):// get this layout fields block from the flexible content area  ?>

												<?php // repeater block ?>
												<?php if (have_rows('block_collection')):// get this REPEATER layout fields block from the flexible content area ?>
																										<section class="text-callout">
																										<?php while (have_rows('block_collection')):the_row();?>
																								<?php $block_image = get_sub_field('block_image');?>
																										<section class="text-callout-block">
																										<h1><?php the_sub_field('block_text');?></h1>
																										<img src="<?php echo $block_image['url'];?>">
																										</section>
																			<?php endwhile;?><!-- block collection while -->
																										</section>

														<?php endif;?><!-- block collection if -->
														<?php endif;?>




<?php endwhile;?>
		<?php endif;?>



		</div><!-- .entry-content -->
</article><!-- #post-## -->