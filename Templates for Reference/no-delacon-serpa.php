<?php
/*
Template Name: Landing Page Mar 9 Without Delacon
*/

global $template_url,$phone_formatted;
$template_url		= get_template_directory_uri() . '/landingpage-feb17';
$phone_formatted 	= get_field( '_phone_number' );
$phone				= trim( str_replace( ' ', '', $phone_formatted ) );

// Remove all irrelevant styles & scripts. Enqueue the ones for this page
add_action( 'wp_enqueue_scripts', 'landingpagehead', 100 );
function landingpagehead() {
	global $template_url;
	
	wp_dequeue_style( 'RMFtooltip-css' );
	wp_dequeue_style( 'wp-pagenavi' );
	wp_dequeue_style( 'bootstrap' );
	wp_dequeue_style( 'theme' );
	wp_dequeue_style( 'owl-theme' );
	wp_dequeue_style( 'font-awesome' );
	wp_dequeue_style( 'defectors' );
	wp_dequeue_style( 'fancybox' );
	wp_dequeue_style( 'main' );
	wp_dequeue_style( 'responsive' );
	wp_dequeue_style( 'bootstrap-select' );
	wp_dequeue_style( 'app' );
	wp_dequeue_style( 'default' );
	wp_dequeue_style( 'default-date' );
	wp_dequeue_style( 'custom-styles' );
	wp_dequeue_style( 'form-styles' );
	
	wp_dequeue_script( 'smooth-scroll' );
    wp_dequeue_script( 'employsure-script' );
    wp_dequeue_script( 'scrolltoTop' );
    wp_dequeue_script( 'app' );
    wp_dequeue_script( 'picker' );
    wp_dequeue_script( 'picker-date' );
    wp_dequeue_script( 'legacy' );
    wp_dequeue_script( 'default-date' );
    wp_dequeue_script( 'jquery-ui-dialog' );
    wp_dequeue_script( 'landing-script' );
    wp_dequeue_script( 'lead' );
    wp_dequeue_script( 'owl-carousel' );
    wp_dequeue_script( 'bootstrap' );
    wp_dequeue_script( 'jquery-sticky' );
    wp_dequeue_script( 'bootstrap-select' );
    wp_dequeue_script( 'ellipsis' );
    wp_dequeue_script( 'chat-api' );
    
	wp_enqueue_style( 'lp', $template_url . '/style.css', false );
	wp_enqueue_script( 'lp', $template_url . '/js/main.js', array( 'jquery-core' ) );
}

add_shortcode( 'phone', 'landingpagephone' );
function landingpagephone() {
	global $phone_formatted;
	return $phone_formatted;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <?php wp_head(); ?>
    
    <!-- Delacon -->
    <script src="http://vxml4.plavxml.com/sited/ref/ctrk/543-<?php echo $delacon_id; ?>" async></script>
</head>
<body <?php body_class(); ?>>
	<header id="work" style="background-image:url(<?php the_field( '_feb_banner' ); ?>)">
		<div id="navigation">
			<div class="logobar">
				<div class="container">
					<a class="navbar-brand nbb-naked" href="/">
						<!-- <img src="<?php // echo $template_url; ?>/images/logo-white_x1.png"  alt="" class="img-responsive" height="40" width="180" /> -->
						<img src="<?php echo $template_url; ?>/images/Employsure_logo_Neg.svg"  alt="" class="img-responsive" height="50" width="190" />
					</a>
					
					<div class="tbcalls">
						<span class="txt-grey"><?php the_field( '_above_phone' ); ?></span> <strong><a href="tel:<?php echo $phone; ?>"><?php echo $phone_formatted; ?></a></strong>
					</div>
				</div>
			</div>
		</div>
		<div class="container header-content txt-center">
			<div class="row">
				<?php echo (get_field('header_content')) ? get_field('header_content') : ''; ?>
				<div class="row twocols">
				  <div class="col-md-6">
					<div class="col">
					  <p><?php echo (get_field('phone_number_text_title')) ? get_field('phone_number_text_title') : ''; ?></p>
					  <a href="tel:<?php echo $phone; ?>" class="btn tel"><span class="call">CALL</span> <strong><?php echo $phone_formatted; ?></strong></a>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="col">
					  <div class="horizontal-or-text"><span>or</span></div>
					  <div class="quote-button">
						<button type="button" class="btn btn-quote open"><?php the_field( '_enquiry_button_text' ); ?></button>
					  </div>          
					</div>
				  </div>
				</div>
				
				<?php the_field('advise_all_areas'); ?>
			</div>
		</div>
	</header>
	
	<?php if( get_field( '_show_feefo_bar' ) ) { ?>
	<section class="feefo-bar-review" id="feefo-bar">
	  <div class="container">
	    <article id="feefo" style="text-align:center;margin-top: 25px;margin-bottom: 15px;" class="" data-url="http://ww2.feefo.com/feefo/xmlfeed.jsp?logon=www.employsure.com.au&amp;since=all">
	        <p>
	          <strong><font size="3em;" font-family="HelveticaRG" ,="" "serif";="" color="grey" ;="">Customers rate Employsure</font></strong>
	          <iframe frameborder="0" src="http://ww2.feefo.com/api/logo?merchantidentifier=employsure&amp;template=bvgos.png" style="position: relative; left: 10px;margin-top: 25px;" width="90" height="60" align="middle" id="page" href="http://ww2.feefo.com/en-au/reviews/employsure/?logon=www.employsure.com.au&amp;since=all" target="page"></iframe>
	          <iframe frameborder="0" src="https://api.feefo.com/api/logo?merchantidentifier=employsure&amp;template=service-white-175x44_en.png" style="position: relative; left: 10px;" width="190" height="50" align="center" seamless="seamless" scrolling="no" id="page" href="http://ww2.feefo.com/en-au/reviews/employsure/?logon=www.employsure.com.au&amp;since=all" target="page"></iframe>
	          <span><strong><font size="3em;" font-family="HelveticaRG" ,="" "serif";="" color="grey" ;="">based on </font></strong><span><strong><font size="3em;" font-family="HelveticaRG" ,="" "serif";="" color="grey" ;=""> reviews.</font></strong></span>
	          <strong><font size="3em;" font-family="HelveticaRG" ,="" "serif";="" color="grey" ;="">Powered by <img src="<?php echo get_template_directory_uri(); ?>/images/feefo-grey-yellow100x23.png" title="Feefo | The Global Feedback Engine" alt="Feefo logo"></font></strong></span>
	        </p>
	    </article>
	  </div>
	</section>
	<?php } ?>
	
	<div class="section grey" >
		<div class="container">
			<h2><?php echo (get_field('how_it_works')) ? get_field('how_it_works') : ''; ?></h2>
			<ul class="info-list">
				<?php 
					if( have_rows('steps') ):
					    while ( have_rows('steps') ) : the_row();
				?>
					<li>
						<img src="<?php the_sub_field('_step_image'); ?>" width="61" height="61" alt="" />
						<div class="t">
							<h4><?php the_sub_field('_step_heading'); ?></h4>
							<?php echo do_shortcode( get_sub_field('_step_text') ); ?>
						</div>
					</li>
				<?php 
					    endwhile;
					endif;
				 ?>
			</ul>
		</div>
	</div>
	<div class="section" >
		<div class="container">
			<?php echo (get_field('_about_employsure')) ? get_field('_about_employsure') : ''; ?>
			<ul class="numb-list">
				<?php 
					if( have_rows('_numb_list') ):
					    while ( have_rows('_numb_list') ) : the_row();
				?>
					<li<?php echo (get_sub_field('small') == 1) ? ' class="small"' : ''; ?>>
						<h4><?php the_sub_field('heading'); ?></h4>
						<p><?php the_sub_field('_num_text'); ?> </p>
					</li>
				<?php
					    endwhile;
					endif;
				 ?>
			</ul>
		</div>
	</div>
	<div class="section grey" >
		<div class="container">
			<h2><?php the_field( '_logo_title' ); ?></h2>
			<div class="logo-container">
				<div class="left">
					<ul >
						<?php 
							if( have_rows('_logos') ):
							    while ( have_rows('_logos') ) : the_row();
						?>
							<li><img class="log" src="<?php the_sub_field('_logo_image'); ?>" alt="" width="166" height="21" /></li>	
						<?php
							    endwhile;
							endif;
						 ?>
						
					</ul>
				</div>
				<div class="right">
					<?php echo (get_field('_logo_right')) ? get_field('_logo_right') : ''; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="section " id="testimonials" >
		<div class="container">
		<div class="test-gall">
			<div class="gmask">
				<ul>
					<?php 
							// check if the repeater field has rows of data
						if( have_rows('_feb_testimonial') ):

						 	// loop through the rows of data
						    while ( have_rows('_feb_testimonial') ) : the_row();
							$postobject = get_sub_field('_testimonial_post');
							
					?>
						<li>
							<div class="photo"><img src="<?php the_sub_field('_testimonial_image'); ?>" width="142" height="142" alt="" /></div>
							<blockquote>

								<q><?php echo apply_filters('the_content', $postobject->post_content);  ?></q>
								<cite><?php echo get_field('_full_name',$postobject->ID); ?></cite>
							</blockquote>
						</li>
					<?php
						    endwhile;
						endif;
					 ?>
					
				</ul>
			</div>
			<ul class="switcher">
				<?php $n = count(get_field('_feb_testimonial')); ?>
				<?php for($x = 1; $x <= $n; $x++): ?>
				<li><a href="#"><?= $x; ?></a></li>
				<?php endfor; ?>
			</ul>
			<a class="prev" href="#">prev</a>
			<a class="next" href="#">next</a>
		</div>
		</div>
	</div>
	<div class="section" id="quote">
	  <div class="container">
	    <div class="row">
	      <?php echo (get_field('_quote')) ? get_field('_quote') : ''; ?>
	    </div>
	    <div class="row  twocols">
	      <div class="col-md-6">
	        <div class="col">
			<p>&nbsp;</p>
			<a href="tel:<?php echo $phone; ?>" class="btn tel"><span class="call">CALL</span><strong><?php echo $phone_formatted; ?></strong></a> 	
	        </div>
	      </div>
	      <div class="col-md-6">
	        <div class="col">
	          <div class="horizontal-or-text"><span>or</span></div>
	          <div class="quote-button">
	            <button type="button" class="btn btn-quote open" data-toggle="modal" data-target="#dfGetRecommendation" data-backdrop="static"><?php the_field( '_enquiry_button_text' ); ?></button>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	<footer id="footer">
		<div class="footer-h">
			<div class="left">
				<?php echo (get_field('_feb_footer')) ? get_field('_feb_footer') : ''; ?>
			</div>
			<div class="right">
				<span class="label"><?php the_field('_feb_footer_right'); ?></span>
				<ul>
					<?php 
						if( have_rows('footer_logo') ):
							while ( have_rows('footer_logo') ) : the_row();
					?>
						<li><img src="<?php the_sub_field('_footer_image'); ?>" alt="" /></li>
					<?php
						    endwhile;
						endif;
					 ?>
				</ul>
			</div>
		</div>
		<div class="bottom">
			<div class="container">
				<span class="copy">&copy; Employsure <?php echo date('Y'); ?> - A Peninsula Group Company</span>
			</div>
		</div>
	</footer>
	
	<?php the_field( '_tracking_codes' ); ?>
	
	<div id="modal">
		<?php echo do_shortcode( '[gravityform id="'.get_field( '_form_id' ).'" title="false" description="false" ajax="true"]' ); ?>
		<a href="#" class="close"></a>
	</div>
	<div id="overlay"></div>

	<?php wp_footer(); ?>
</body>
</html>