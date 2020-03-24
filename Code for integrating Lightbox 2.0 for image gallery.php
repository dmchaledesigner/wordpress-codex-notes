Code for integrating Lightbox 2.0 for image gallery within a UL tag

<li>
  <a rel="lightbox" href="<?php $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id,'large', true);
                echo $image_url[0];  ?>">
                
                <?php the_post_thumbnail('thumbnail'); ?>
                </a>
</li>