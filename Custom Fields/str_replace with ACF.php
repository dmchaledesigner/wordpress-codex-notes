 <?php
$phone_formatted = get_field('cta_block_1_link');
$phone           = trim(str_replace(' ', '', $phone_formatted));
?>



<?php

$delecon_formatted = trim(str_replace(' ', '', $delecon_number));
?>
<a href="tel:<?php echo str_replace(' ', '', get_field('delecon_number', 'option')); ?>" class="btn-subscribe btn-gold"><?php $delecon_number = the_field('delecon_number', 'option'); ?></a>

