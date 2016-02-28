
<?php if (kadence_display_topbar()) : ?>
  <?php get_template_part('templates/header', 'topbar'); ?>
<?php endif; ?>
<header id="kad-banner" class="banner headerclass" data-header-shrink="0" data-mobile-sticky="0">
<?php global $virtue_premium; if(isset($virtue_premium['logo_layout'])) {
            if($virtue_premium['logo_layout'] == 'logocenter') {$logocclass = 'col-md-12'; $menulclass = 'col-md-12';} 
            else if($virtue_premium['logo_layout'] == 'logohalf') {$logocclass = 'col-md-6'; $menulclass = 'col-md-6';}
            else if($virtue_premium['logo_layout'] == 'logowidget') {$logocclass = 'col-md-4'; $menulclass = 'col-md-12';}
            else {$logocclass = 'col-md-4'; $menulclass = 'col-md-8';}
          }
          else {$logocclass = 'col-md-4'; $menulclass = 'col-md-8';} ?>
  <div class="container">  
    <div class="logo-header row">
          <div class="<?php echo esc_attr($logocclass); ?> clearfix kad-header-left">
            <div id="logo" class="logocase">
              <a class="brand logofont" href="<?php echo home_url(); ?>">
                       <?php if (!empty($virtue_premium['x1_virtue_logo_upload']['url'])) { ?> 
                       <div id="thelogo"><img src="<?php echo esc_url($virtue_premium['x1_virtue_logo_upload']['url']); ?>" alt="<?php bloginfo('name');?>" class="kad-standard-logo" />
                         <?php if(!empty($virtue_premium['x2_virtue_logo_upload']['url'])) {?>
                          <img src="<?php echo esc_url($virtue_premium['x2_virtue_logo_upload']['url']);?>" class="kad-retina-logo" alt="<?php bloginfo('name');?>" style="max-height:<?php echo esc_attr($virtue_premium['x1_virtue_logo_upload']['height']);?>px" /> <?php } ?>
                        </div> <?php } else { echo apply_filters('kad_site_name', get_bloginfo('name')); } ?>
              </a>
              <?php if (!empty($virtue_premium['logo_below_text']) ) { ?> <p class="kad_tagline belowlogo-text"><?php echo $virtue_premium['logo_below_text']; ?></p> <?php }?>
            </div> <!-- Close #logo -->
          </div><!-- close col-md-4 -->
          <?php if(isset($virtue_premium['logo_layout']) && $virtue_premium['logo_layout'] == 'logowidget') { ?>
              <div class="col-md-8 kad-header-widget"> <?php 
                if(is_active_sidebar('headerwidget')) { dynamic_sidebar('headerwidget'); } ?>
              </div>
            </div>
          <div class="row"> 
          <?php } ?>
          <div class="<?php echo esc_attr($menulclass); ?> kad-header-right">
          <?php if (has_nav_menu('primary_navigation')) : ?>
            <?php do_action( 'virtue_above_primarymenu' ); ?>
            <nav id="nav-main" class="clearfix" role="navigation">
                <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu'));  ?>
            </nav>
           <?php  endif; ?>
          </div> <!-- Close span7 -->       
    </div> <!-- Close Row -->
    <?php if (has_nav_menu('mobile_navigation')) : ?>
           <div id="mobile-nav-trigger" class="nav-trigger">
              <button class="nav-trigger-case collapsed mobileclass" data-toggle="collapse" rel="nofollow" data-target=".mobile_menu_collapse">
                <span class="kad-navbtn clearfix"><i class="icon-menu"></i></span>
                <?php if(!empty($virtue_premium['mobile_menu_text'])) {$menu_text = $virtue_premium['mobile_menu_text'];} else {$menu_text = __('Menu', 'virtue');} ?>
                <span class="kad-menu-name"><?php echo $menu_text; ?></span>
              </button>
            </div>
            <div id="kad-mobile-nav" class="kad-mobile-nav">
              <div class="kad-nav-inner mobileclass">
                <div id="mobile_menu_collapse" class="kad-nav-collapse collapse mobile_menu_collapse">
                  <?php if(isset($virtue_premium['menu_search']) && $virtue_premium['menu_search'] == '1') {  
                    get_search_form(); 
                  } 
                  if(isset($virtue_premium['mobile_submenu_collapse']) && $virtue_premium['mobile_submenu_collapse'] == '1') {
                    wp_nav_menu( array('theme_location' => 'mobile_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mnav', 'walker' => new kadence_mobile_walker()));
                  } else {
                    wp_nav_menu( array('theme_location' => 'mobile_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mnav'));
                  } ?>
               </div>
            </div>
          </div>   
          <?php  endif; ?> 
    </div><!-- Close logo-header -->
  <?php do_action('kt_before_secondary_navigation'); ?>
  <?php if (has_nav_menu('secondary_navigation')) : ?>
  <section id="cat_nav" class="navclass">
    <div class="container">
     <nav id="nav-secnd" class="clearfix">
     <?php wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'sf-menu')); ?>
   </nav>
    </div><!--close container-->
    </section>
    <?php endif; ?> 
    </header>
     <?php if(isset($virtue_premium['slider_abovebelow_widget']) && $virtue_premium['slider_abovebelow_widget'] == 'sliderabovewidget') { ?>
              <div class="aboveheader col-md-12"> <?php 
                if(is_active_sidebar('slider-above-widget')) { dynamic_sidebar('slider-above-widget'); } ?>
              </div>
               <?php } ?>
      <?php if(isset($virtue_premium['slider_abovebelow_widget']) && $virtue_premium['slider_abovebelow_widget'] == 'sliderbothwidgets') { ?>
              <div class="aboveheader col-md-12"> <?php 
                if(is_active_sidebar('slider-above-widget')) { dynamic_sidebar('slider-above-widget'); } ?>
              </div>
               <?php } ?>
    <div class="featured row">
<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<img src="<?php echo $image[0]; ?>" alt="" />
<?php else:
	// dynamic_sidebar( 'top-slider-homeonly' );
endif; ?>
</div> 
   <?php if(isset($virtue_premium['slider_box_layout']) and $virtue_premium['slider_box_layout'] == 'sliderwide') { ?>
  <div class="full-slider">
<?php } else { ?>
 <div class="container">
<?php } ?>
       <?php if(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slider_widget_layout'] == 'slideronly') { ?>
    <div class="col-md-12">
        <?php } elseif(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slidernwidget_cols'] == 'col-md-10') { ?> 
        <div class="slider-left col-md-10">
        <?php } elseif(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slidernwidget_cols'] == 'col-md-9') { ?> 
        <div class="slider-left col-md-9">
            <?php } elseif(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slidernwidget_cols'] == 'col-md-8') { ?> 
        <div class="slider-left col-md-8">
            <?php } elseif(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slidernwidget_cols'] == 'col-md-7') { ?> 
        <div class="slider-left col-md-7">
            <?php } elseif(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slidernwidget_cols'] == 'col-md-6') { ?> 
        <div class="slider-left col-md-6">
            <?php } ?>
            <?php
    	$detect = new Mobile_Detect_BigCloudCMS; if($detect->isMobile() && !$detect->isTablet() && $virtue_premium['mobile_switch'] == '1') {
		 		$slider = $virtue_premium['choose_mobile_slider'];
					if ($slider == "rev") {
					get_template_part('templates/mobile_home/mobilerev', 'slider');
				} else if ($slider == "flex") {
					get_template_part('templates/mobile_home/mobileflex', 'slider');
				} else if ($slider == "video") {
					get_template_part('templates/mobile_home/mobilevideo', 'block');
				} else if ($slider == "cyclone") {
					get_template_part('templates/mobile_home/cyclone', 'slider');
				}
			} else { 
			  	if(isset($virtue_premium['choose_slider'])) { 
			  		$slider = $virtue_premium['choose_slider'];
			  	} else {
			  		$slider = 'none';
			  	}
				if ($slider == "rev") {
						if($virtue_premium['above_header_slider'] != 1) {
							get_template_part('templates/home/rev', 'slider');
						}
				} else if ($slider == "ktslider") {
						if($virtue_premium['above_header_slider'] != 1) {
							get_template_part('templates/home/kt', 'slider');
						}
				} else if ($slider == "flex") {
					get_template_part('templates/home/flex', 'slider');
				} else if ($slider == "carousel") {
					get_template_part('templates/home/carousel', 'slider');
				} else if ($slider == "imgcarousel") {
					get_template_part('templates/home/image', 'carousel');
				} else if ($slider == "latest") {
					get_template_part('templates/home/latest', 'slider');
				} else if ($slider == "thumbs") {
					get_template_part('templates/home/thumb', 'slider');
				} else if ($slider == "cyclone") {
					if($virtue_premium['above_header_slider'] != 1) {
						get_template_part('templates/home/cyclone', 'slider');
					}
				} else if ($slider == "fullwidth") {
					get_template_part('templates/home/fullwidth', 'slider');
				} else if ($slider == "video") {
					get_template_part('templates/home/video', 'block');
				}
			} ?>
      <?php if (!empty($virtue_premium['virtue_banner_upload']['url'])) {  ?> 
        <div class="virtue_sitewide_banner"><div class="virtue_banner">
          <?php if (!empty($virtue_premium['virtue_banner_link'])) { ?> <a href="<?php echo esc_url($virtue_premium['virtue_banner_link']);?>"> <?php }?>
          <?php $alt_text = get_post_meta($virtue_premium['virtue_banner_upload']['id'], '_wp_attachment_image_alt', true); ?>
          <img src="<?php echo esc_url($virtue_premium['virtue_banner_upload']['url']); ?>" width="<?php echo esc_attr($virtue_premium['virtue_banner_upload']['width']); ?>" height="<?php echo esc_attr($virtue_premium['virtue_banner_upload']['height']); ?>" alt="<?php echo esc_attr($alt_text);?>" /></div>
          <?php if (!empty($virtue_premium['virtue_banner_link'])) { ?> </a> <?php }?>
        </div> <?php } ?></div>
            
    
     <?php if(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slidernwidget_cols'] == 'col-md-10') { ?> 
        <div class="slider-right col-md-2"> 
        <?php } elseif(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slidernwidget_cols'] == 'col-md-9') { ?> 
        <div class="slider-right col-md-3">
            <?php } elseif(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slidernwidget_cols'] == 'col-md-8') { ?> 
        <div class="slider-right col-md-4">
            <?php } elseif(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slidernwidget_cols'] == 'col-md-7') { ?> 
        <div class="slider-right col-md-5">
            <?php } elseif(isset($virtue_premium['slider_widget_layout']) && $virtue_premium['slidernwidget_cols'] == 'col-md-6') { ?> 
        <div class="slider-right col-md-6">
            <?php } ?>
            <?php if(is_active_sidebar('slider-widget')) { dynamic_sidebar('slider-widget'); } ?>
</div>
    </div></div>
     <?php if(isset($virtue_premium['slider_abovebelow_widget']) && $virtue_premium['slider_abovebelow_widget'] == 'sliderbelowwidget') { ?>
              <div class="belowheader container"> <?php 
                if(is_active_sidebar('slider-below-widget')) { dynamic_sidebar('slider-below-widget'); } ?>
              </div>
            <?php } ?>
         <?php if(isset($virtue_premium['slider_abovebelow_widget']) && $virtue_premium['slider_abovebelow_widget'] == 'sliderbothwidgets') { ?>
              <div class="belowheader container"> <?php 
                if(is_active_sidebar('slider-below-widget')) { dynamic_sidebar('slider-below-widget'); } ?>
              </div>
            <?php } ?>
    <?php do_action('kt_after_header_content'); ?>
