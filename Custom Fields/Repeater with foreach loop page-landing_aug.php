<?php
/**
 * The template for Landing Page Aug 2017
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
/* Template Name: Landing Page Aug 2017 */

get_header(); ?>
<header class="home head_sticky">
	<div id="navigation-sticky-wrapper">
		<div id="navigation">
			<div class="logobar">
				<div class="container">
					<div class="navbar-header">
						<div class="hide-mobile">
							<a class="navbar-brand nbb-full" href="/">
								<img class="img-responsive" src="https://employsure.com.au/wp-content/themes/employsure/images/logo-white_x1.png" alt="" width="180" height="40">
							</a>
						</div>
						<div class="hide-desktop">
							<a class="navbar-brand nbb-naked" href="/">
								<img class="img-responsive" src="https://employsure.com.au/wp-content/themes/employsure/images/logo-black_x1.png" srcset="https://employsure.com.au/wp-content/themes/employsure/images/logo-black_x2.png 1.5x, https://employsure.com.au/wp-content/themes/employsure/images/logo-black_x2.png 2x" alt="" width="180" height="40">
							</a>
						</div>
					</div>
					<div class="tbcalls">
						<span class="txt-grey">Employer Advice</span>
						<strong>1300 832 795</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="visual-land">
<div  id="visual-land" <?php  if ( has_post_thumbnail() ) : ?> style="background: url(<?php the_post_thumbnail_url('full'); ?>) no-repeat;" <?php endif; ?>>
	<?php if ( has_post_thumbnail() ) {
		the_post_thumbnail('full');
	} ?>
	<div class="container">
		<div class="table">
			<div class="cell">
				<?php if($t = get_field('_title')) echo '<h2>'.$t.'</h2>'; ?>
				<?php if($t = get_field('_sub_title')) echo '<h4>'.$t.'</h4>'; ?>
				<a href="#enquire" class="btn-subscribe btn-yellow">ENQUIRE NOW</a>
			</div>
		</div>
	</div>
</div>
</div>
<div class="wrapper">
<section class="section text-s" >
	<div class="container">
		<div class="row">
			<div class="left">
				<?php if($t = get_field('_text_l')) echo $t; ?>
			</div>
			<div class="right">
				<?php if($t = get_field('_text_r')) echo $t; ?>
			</div>
		</div>
	</div>
</section>


<?php if($list = get_field('_list_serv')): // this is the repeater name ?>
<section class="section grey" >
	<div class="container">
	<ul class="serv-list">
		<?php foreach($list as $el): // foreach loop to loop over the repeater items ?>

		<li>
			<?php if($el['_s_image']) // if the image exists, echo: .$repeaterItem[the_field()].
			echo "<a href='".$el['utm_links']."'>";
			echo wp_get_attachment_image($el['_s_image'], 'full', 0, array('title'=> ''));
			echo "</a>";
			?>
			<div class="text-holder">
				<?php if($el['_s_title']) echo '<h2>'.$el['_s_title'].'</h2>'; ?>
				<?php if($el['_sub_title']) echo '<h3>'.$el['_sub_title'].'</h3>'; ?>
				<?php if($el['_s_description']) echo '<p>'.$el['_s_description'].'</p>'; ?>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
	</div>
</section>
<?php endif; ?>
<section class="section text-s view2" >
	<div class="container">
		<div class="row">
			<div class="left">
				<?php if($t = get_field('_text_l2')) echo $t; ?>
			</div>
			<div class="right">
				<?php if($t = get_field('_text_r2')) echo $t; ?>
			</div>
		</div>
	</div>
</section>
<section class="section video text-s grey" >
	<div class="container">
		<div class="row">
			<div class="left">
				<?php if($t = get_field('_video_link')): ?>
					<div data-video="<?php echo $t; ?>" id="video" class='yt-embed-container'>
					  <img src="<?php echo get_field('_video_image'); ?>" alt="Video Cover">
					</div>
				<?php endif; ?>				
			</div>
			<div class="right">
				<?php if($t = get_field('_text_r3')) echo $t; ?>
			</div>
		</div>
	</div>
</section>
<?php if($list = get_field('_list_link')): ?>
<section class="section" >
	<div class="container">
	<ul class="link-list">
		<?php foreach($list as $el): ?>
		<li>
			<?php if($el['_l_image']) echo wp_get_attachment_image($el['_l_image'], 'full', 0, array('title'=> '')); ?>
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

<section id="why" class="section">

	test
	<div class="container">
		<div class="row">
			<?php if($t = get_field('_why_title')) echo '<h2>'.$t.'</h2>'; ?>
			<?php if($list = get_field('why_area')): ?>
			<ul>
				<?php
				$i = 0;
					$len = count($list);
					foreach ($list as $el) { ?>
						<li>
								<?php if ($i <= 4) { ?>
									<?php if($el['_why_sub_title']) echo '<h3><span class="counter">'.$el['_why_sub_title'].'</span>+</h3>'; ?>
									<?php if($el['_why_description']) echo '<p>'.$el['_why_description'].'</p>'; ?>
								<?php } ?>

								<?php if ($i == $len - 1) { ?>
									<?php if($el['_why_sub_title']) echo '<h3><span>'.$el['_why_sub_title'].'</span></h3>'; ?>
									<?php if($el['_why_description']) echo '<p>'.$el['_why_description'].'</p>'; ?>
								<?php } ?>
						</li>
						<?php $i++; 
						} ?>
				 </ul>
		<?php endif; ?> 
		<?php 
			$r = get_field('_why_btn_label'); 
			if (!$r) $r = "Click Here";
		?>
		 <?php if($t = get_field('_why_btn')) echo '<button type="button" class="btn" data-toggle="modal" data-target="#form-popup" data-backdrop="static">'.$r.'</button>'; ?>
		</div>
	</div>
</section>
<section id="enquire">
<div class="container">
		<div class="row">
			<div class="tel-details-wrapper">
				<div class="left">
					<h1>Don't delay.</h1>
					<p>Build a safe and fair workplace today and benefit from our <strong>10% discount on all dual contracts until 31 October.</strong></p>

					<div id="tel-display">
					<h3>Safety can't wait, call today.</h3>
					<span class="tel"><a onClick="ga(‘send’, ‘event’, ‘safeworkmonth, ‘click);" href="tel:1300832795" id="tel-number">1300 832 795</a></span>
					</div>
				</div>
			</div>
	<div class="right">
		<?php gravity_form(49, false, false, false, '', false, 10); ?>
	</div>
	</div>
	</div>
</section>
</div>
<footer class="footer-white">
	<div class="credit">
		<div class="container">
			<div class="row">
				<p class="copy">&copy; Employsure 2017 - A Peninsula Group Company</p>
			</div>
		</div>
	</div>
</footer>



<!-- Marin Scripts for clickTag Tracking -->
<script type="text/javascript">



	var telNumber = jQuery('#tel-number');
	var ctaFooter = jQuery('#gform_submit_button_49');

			jQuery(ctaFooter).attr('onclick', 'ga(‘send’, ‘event’, ‘safeworkmonth’, ‘submit);');

			jQuery(telNumber).click(function() {
		  		jQuery("span.tel").append("<iframe src=\"https://rs.gwallet.com/r1/pixel/x46521\" width=\"0\" height=\"0\" style=\"display:none;visibility:hidden\"></iframe>");
		  		// alert('this is the number');
				});



			jQuery(ctaFooter).click(function() {
		  		jQuery(".gform_footer top_label").append("<iframe src=\"https://rs.gwallet.com/r1/pixel/x46520\" width=\"0\" height=\"0\" style=\"display:none;visibility:hidden\"></iframe>");
		  		// alert("this is the cta");
				});



</script>






<!-- Function to hide tel number after business Hours -->
<script type="text/javascript">

var d = new Date(); 
var dateString = d.toString();
var stringChars =  dateString.substring(0, 3); 
var hours = d.getHours(); 
var element = document.getElementById('tel-display'); 


  if( (stringChars != "Sat" || stringChars != "Sun") && (hours > 8 && hours < 18) ){
		element.setAttribute('class', 'show');
		  }else{
		      element.removeAttribute('class', 'show');
		  }


</script>




<?php wp_footer(); ?>