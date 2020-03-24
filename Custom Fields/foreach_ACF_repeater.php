<?php 


// page: employsure.com.au => Safework Month Campaign 2017
// treat repeaters like associative arrays. key => value pairs




// echo array[key][value];

if($list = get_field('_list_link')): // the reapeater field name?> 
<section class="section" >
	<div class="container">
	<ul class="link-list">
		<?php foreach($list as $el): ?>
		<li>
			<?php if($el['_l_image']) echo wp_get_attachment_image($el['_l_image'], 'full', 0, array('title'=> '')); // ['_l_image'] refers to the image inside the repeater field ?>
			<div class="text-holder">
				<?php 
					$target = '';
					if ($el['_open_in_new_tab']) $target = ' target="_blank" ';
				?>
				<?php if($el['_l_title']) echo '<h2>'.$el['_l_title'].'</h2>'; ?>
				<?php if($el['l_sub_title']) echo '<h3>'.$el['l_sub_title'].'</h3>'; ?>
				<?php if($el['_s_description']) echo '<p>'.$el['_s_description'].'</p>'; ?>
				<?php if($el['_l_link']) echo '<a href='.$el['_l_link'].' class="btn"'.$target.'>'; ?>
				<?php if($el['_l_text_btn']) echo $el['_l_text_btn']; ?>
				<?php if($el['_l_link']) echo '</a>'; ?>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
	</div>
</section>
<?php endif; ?>








<?php // another example 


		// if the repeeater field exists
		// show the section of the html the repeater fields are in
		// then loop through the repeater using a foreach loop
		// end if the foreach loop
		// end the if statement


?>




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
										}

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












