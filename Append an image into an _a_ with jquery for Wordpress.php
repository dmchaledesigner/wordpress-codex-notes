Append an image into an <a> with jquery for Wordpress
=============================================

 $(document).ready(function () {
                $('.desktop-nav-logo a').append('<img src=<?php bloginfo('template_directory'); ?>/img/white-w-logo.svg alt="The Windsor">');
            });

