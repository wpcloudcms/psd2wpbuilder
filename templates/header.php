<header id="kad-banner" class="banner headerclass" role="banner" data-header-shrink="0" data-mobile-sticky="0">
<?php if (kadence_display_topbar()) : ?>
  <?php get_template_part('templates/header', 'topbar'); ?>
<?php endif; ?>
 <?php if($header_layout == 'shm') {
           get_template_part('templates/header/shm');
           else {
            get_template_part('templates/header/hms');  } 
        }  ?>
    <?php do_action('kt_after_header_content'); ?>
</header>
