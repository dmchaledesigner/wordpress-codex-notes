


		 <?php if ( is_home() ) { ?>

		<a href="<?php echo get_option('home'); ?>/contact-us/" class="sidebanner">

			<?php if(is_page('corporate')) { ?>

			<img src="<?php echo get_bloginfo('template_directory'); ?>/_inc/img/image001.gif" alt="Corporate packages - Enquire now." />

			<?php } elseif(is_page('aviators-cottage')) { ?>

			<img src="<?php echo get_bloginfo('template_directory'); ?>/_inc/img/image002.gif" alt="Enquire about the Aviator's Cottage." />

			<?php } elseif(is_page('leisure-family')) { ?>

			<img src="<?php echo get_bloginfo('template_directory'); ?>/_inc/img/image004.gif" alt="Family packages - Equire now." />

			<?php } elseif(is_page('weddings')) { ?>

			<img src="<?php echo get_bloginfo('template_directory'); ?>/_inc/img/image005.gif" alt="Wedding packages - Enquire now." />

			<?php } else { ?>

			<img src="<?php echo get_bloginfo('template_directory'); ?>/_inc/img/image003.gif" alt="Enquire about our packages." />

			<?php } ?>

