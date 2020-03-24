<?php
/*
Template Name: Landing NEW
*/
get_header(); ?>

<script type="text/javascript">

        </script>

	<?php if(get_field('_slider', 4)):?>
		<div class="slider-holder">
			<div  class="cycle-slideshow" id="slider"
				data-cycle-fx="fade"
				data-cycle-timeout="6000"
				data-cycle-slides = "> div.slide"
				data-cycle-pager = ".pager .content"
				data-cycle-center-vert= "true"
			>
				<?php while(has_sub_field('_slider',4)):?>
					<?php
						$thumb_id = get_sub_field('_slide');
						$thumb_url = wp_get_attachment_image_src($thumb_id,'slider', true);
					?>
					<div class="slide" style="background:url(<?php echo $thumb_url[0];?>) no-repeat 50% 0;background-size:cover;"></div>
				<?php endwhile;?>
			</div>


			<div class="slider-banner">
				<div class="content">
				<img class="slider-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/img-sl.png" alt="image">
				<div class="slider-contact">
					<?php if(get_field('_phone','options')) echo '<div class="phone"><a href="#" onClick="javascript:makePhoneCall(31514,\'0800675699\');return false;">
					<i class="fa fa-phone"></i><div>Call now</div><br/><b>'.get_field('_phone','options').'</b></a></div>'?>
					<?php if(get_field('_slider_text',4)) echo '<h1>'.get_field('_slider_text', 4).'</h1>'?>
				</div>
				</div>
			</div>
		</div>
	<?php endif;?>
	<?php if(get_field('_h_title',4) || get_field('_h_list',4)):?>
		<div id="help">
			<div class="row content">
				<div class="col s12 m7 l7">
				<?php if(get_field('_h_title',4)) echo '<h2>'.get_field('_h_title',4).'</h2>'?>
				<?php if(get_field('_h_list',4)):?>
						<?php if(get_field('_h_title_sub',4)) echo '<h3>'.get_field('_h_title_sub',4).'</h3>'?>
						<ul class="checks">
							<?php while(has_sub_field('_h_list',4)):?>
								<li>
									<?php echo get_sub_field('h_text');?>
								</li>
							<?php endwhile;?>
						</ul>
				<?php endif;?>
				</div>
				<div class="col s12 m5 l5">
					<div class="call-form">
						<a href="#" onClick="javascript:makePhoneCall(31514,'0800675699');return false;"><i class="fa fa-phone"></i><b>CALL </b><?php echo get_field('_phone','options') ?></a><br/>
						<div>or request a call back.</div>
					</div>
						<?php gravity_form( 3, true, true, '', true,true); ?>
				</div>
			</div>
		</div>
	<?php endif;?>
	<?php if($testimonials = get_field('testi',4)):?>
		<div id="testimonials">
			<h3>Employsure is rated <span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span> across 96% client reviews</h3>
			<div class="bordrs">
      <span>
        <span style="font-size: 16px;color: #57646e;">Supporting over 1,000 businesses New Zealand wide</span>
      </span>
    </div>
			<div class="testimonials-slider <?php if( count( $testimonials ) > 1 ) echo 'cycle-slideshow'; ?>"
				<?php if( count( $testimonials ) > 1 ) echo 'data-cycle-fx="scrollHorz"
				data-cycle-timeout="6000"
				data-cycle-slides = "> div.hold"
		    data-cycle-prev=".prevControl"
		    data-cycle-next=".nextControl"
				data-cycle-center-vert= "true"'; ?>
				>
				<?php if( count( $testimonials ) > 1 ) echo '<div class="fa fa-chevron-left prevControl"></div>'; ?>
				<?php while(has_sub_field('testi',4)):?>
				<div class="hold">
					<?php if(get_sub_field('text')) echo '<img src="'.get_sub_field('image').'" />'?>
					<?php if(get_sub_field('text')) echo '<p>”'.get_sub_field('text').'”<br/>'?>
					<?php if(get_sub_field('author')) echo '<span>'.get_sub_field('author').'</span></p>'?>
				</div>
				<?php endwhile;?>
				<?php if( count( $testimonials ) > 1 ) echo '<div class="fa fa-chevron-right nextControl"></div>'; ?>
			</div>
		</div>
	<?php endif;?>
	<?php if(get_field('_s_title',4)):?>
		<div id="support">
			<?php echo get_field('_s_title',4);?><a href="#" onClick="javascript:makePhoneCall(31514,'0800675699');return false;"><i class="fa fa-phone"></i> <?php echo get_field('_phone','options') ?></a>
		</div>
	<?php endif;?>
	<?php if(get_field('_services',4)):?>
		<div id="services">
			<div class="content row" style="padding: 0;">

				<?php while(has_sub_field('_services',4)):?>
					<div class="service col s4 m4 l4">
						<?php if(get_sub_field('_icon')) echo wp_get_attachment_image(get_sub_field('_icon'), 'icon', 0, array('title'=> ''));?>
						<?php if(get_sub_field('_sub_title')) echo '<strong>'.get_sub_field('_sub_title').'</strong>'?>
						<?php if(get_sub_field('_info')) echo '<p>'.get_sub_field('_info').'</p>'?>
					</div>
				<?php endwhile;?>
			</div>
		</div>
	<?php endif;?>

<?php get_footer(); ?>
