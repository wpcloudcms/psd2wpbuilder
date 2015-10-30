<?php get_template_part('templates/head'); ?>
<?php global $virtue_premium; 
  if(isset($virtue_premium["smooth_scrolling"]) && $virtue_premium["smooth_scrolling"] == '1') {$scrolling = '1';}  else if(isset($pinnacle["smooth_scrolling"]) && $pinnacle["smooth_scrolling"] == '2') { $scrolling = '2';} else {$scrolling = '0';}
  if(isset($virtue_premium["smooth_scrolling_hide"]) && $virtue_premium["smooth_scrolling_hide"] == '1') {$scrolling_hide = '1';} else {$scrolling_hide = '0';} 
  if(isset($virtue_premium['virtue_animate_in']) && $virtue_premium['virtue_animate_in'] == '1') {$animate = '1';} else {$animate = '0';}
  if(isset($virtue_premium['sticky_header']) && $virtue_premium['sticky_header'] == '1') {$sticky = '1';} else {$sticky = '0';}
  if(isset($virtue_premium['product_tabs_scroll']) && $virtue_premium['product_tabs_scroll'] == '1') {$pscroll = '1';} else {$pscroll = '0';}
  if(isset($virtue_premium['header_style'])) {$header_style = $virtue_premium['header_style'];} else {$header_style = 'standard';}
  if(isset($virtue_premium['select2_select'])) {$select2_select = $virtue_premium['select2_select'];} else {$select2_select = '1';}
  ?>
<body <?php body_class(); ?> data-smooth-scrolling="<?php echo esc_attr($scrolling);?>" data-smooth-scrolling-hide="<?php echo esc_attr($scrolling_hide);?>" data-jsselect="<?php echo esc_attr($select2_select);?>" data-product-tab-scroll="<?php echo esc_attr($pscroll); ?>" data-animate="<?php echo esc_attr($animate);?>" data-sticky="<?php echo esc_attr($sticky);?>">
<div id="wrapper" class="container">
  <!--[if lt IE 8]><div class="alert"> <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'virtue'); ?></div><![endif]-->

  <header id="kad-banner" class="banner headerclass" role="banner" data-header-shrink="0" data-mobile-sticky="0">
<?php if (kadence_display_topbar()) : ?>
  <?php get_template_part('templates/header', 'topbar'); ?>
<?php endif; ?>
    
    <?php
    do_action('get_header');
    if($header_layout == 'shm') {
           get_template_part('templates/header/header-shm');
           else {
            get_template_part('templates/header/header-hms');  } 
        }  ?>
    <?php do_action('kt_after_header_content'); ?>
</header>

    <div class="contentmenu container">
    <?php if (has_nav_menu('custom_navigation')) : ?>
            <?php do_action( 'virtue_above_custommenu' ); ?>
            <nav class="clearfix" role="navigation">
                <?php wp_nav_menu(array('theme_location' => 'custom_navigation', 'menu_class' => 'sf-menu'));  ?>
            </nav>
           <?php endif; ?>
      </div>
  <div class="row-height">
  <div class="maincontent col-sm-height">
<div class="wrap clearfix row contentbox">

<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<img src="<?php echo $image[0]; ?>" alt="" />
<?php else:
	// dynamic_sidebar( 'top-slider-homeonly' );
endif; ?>
</div>  
 <div class="wrap clearfix contentbox contentclass hfeed" role="document">
        <?php do_action('kt_afterheader');
        include kadence_template_path(); ?>
        
      <?php if (kadence_display_sidebar()) : ?>
      <aside id="ktsidebar" class="<?php echo esc_attr(kadence_sidebar_class()); ?> kad-sidebar" role="complementary">
        <div class="sidebar">
          <?php include kadence_sidebar_path(); ?>
        </div><!-- /.sidebar -->
      </aside><!-- /aside -->
      <?php endif; ?>
      </div><!-- /.row-->
    </div><!-- /.content -->
    </div>
    </div>
  </div><!-- /.wrap -->

  <?php do_action('get_footer');
  get_template_part('templates/footer'); ?>
</div><!--Wrapper-->
</body>
</html>