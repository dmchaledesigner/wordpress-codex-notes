<!-- Enqueue JS AND CSS -->




<!-- CSS -->


<?php 
wp_register_style( 'Font_Awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
wp_enqueue_style('Font_Awesome');
?>


<!-- JS -->

<?php 
wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', null, null, true );
wp_enqueue_script('jQuery');

?>



<?php

wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', null, null, true );
wp_enqueue_script('jQuery');
wp_register_script( 'TweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js', null, null, true );
wp_enqueue_script('TweenMax');
wp_register_script( 'Slick', 'https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js', null, null, true );
wp_enqueue_script('Slick'); 

?>