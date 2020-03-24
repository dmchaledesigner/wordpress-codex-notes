<?php

// ACF if Field exists....hide empty values if the field is empty

if ($subHeading):?>
 <h5><?php echo $subHeading;?></h5>
<?php endif;

//?>




<!-- this is better -->

<?php if($t = get_field('field_name')); echo $t; ?>

<?php if($t = get_field('_image')) echo wp_get_attachment_image($t, 'full', 0, array('title'=> '')); ?>

<?php if($el['_l_title']) echo '<h2>'.$el['_l_title'].'</h2>'; ?>







<?php if ($list = get_field('_list_serv')):// this is the repeater name ?>
<section class="section grey" >
	<div class="container">
	

				<ul class="serv-list">

				<?php foreach ($list as $el):// foreach loop to loop over the repeater items ?>

						<li>
							<?php if ($el['_s_image']){ // if the image exists, echo: .$repeaterItem[the_field()].
							echo "<a href='".$el['utm_links']."'>";
							}

							echo wp_get_attachment_image($el['_s_image'], 'full', 0, array('title' => ''));
							echo "</a>"; ?>
								<div class="text-holder">
										<?php if ($el['_s_title']) {
											echo '<h2>';
										}

										echo "<a href='".$el['utm_links']."'>";
										echo $el['_s_title'];
										echo '</a>';
										echo '</h2>';
										?>

										<?php if ($el['_sub_title']) {
											echo '<h3>';
											echo "<a href='".$el['utm_links']."'>";
											echo $el['_sub_title'];
											echo '</a>';
											echo '</h3>';
										?>

										<?php if ($el['_s_description']) {
											echo '<p>'.$el['_s_description'].'</p>';
										}
										?>
								</div>
						</li>
				<?php endforeach;?>
				</ul>
	</div>
</section>
<?php endif;?>


