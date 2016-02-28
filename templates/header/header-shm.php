<?php global $bigcloudcms_premium; if(isset($bigcloudcms_premium['logo_layout'])) {
            if($bigcloudcms_premium['logo_layout'] == 'logocenter') {$logocclass = 'col-md-12'; $menulclass = 'col-md-12';} 
            else if($bigcloudcms_premium['logo_layout'] == 'logohalf') {$logocclass = 'col-md-6'; $menulclass = 'col-md-6';}
            else if($bigcloudcms_premium['logo_layout'] == 'logowidget') {$logocclass = 'col-sm-4'; $menulclass = 'col-md-12';}
            else {$logocclass = 'col-md-4'; $menulclass = 'col-md-8';}
          }
          else {$logocclass = 'col-md-4'; $menulclass = 'col-md-8';} ?>

  <?php do_action('kt_before_secondary_navigation'); ?>
  <?php if (has_nav_menu('secondary_navigation')) : ?>
  <section id="cat_nav" class="navclass"><!-- Start Menu Section -->
    <div class="container">
     <nav id="nav-secnd" class="clearfix">
     <?php wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'sf-menu')); ?>
   </nav>
    </div><!--close container-->
    </section><!-- Close Menu Section -->
    <?php endif; ?> 


<div class="container"><!-- Start Header Container -->
    <div class="row">
          <div class="<?php echo esc_attr($logocclass); ?> clearfix kad-header-left">
            <div id="logo" class="logocase">
              <a class="brand logofont" href="<?php echo home_url(); ?>/">
                       <?php if (!empty($bigcloudcms_premium['x1_bigcloudcms_logo_upload']['url'])) { ?> 
                       <div id="thelogo"><img src="<?php echo esc_url($bigcloudcms_premium['x1_bigcloudcms_logo_upload']['url']); ?>" alt="<?php bloginfo('name');?>" class="kad-standard-logo" />
                         <?php if(!empty($bigcloudcms_premium['x2_bigcloudcms_logo_upload']['url'])) {?>
                          <img src="<?php echo esc_url($bigcloudcms_premium['x2_bigcloudcms_logo_upload']['url']);?>" class="kad-retina-logo" alt="<?php bloginfo('name');?>" style="max-height:<?php echo esc_attr($bigcloudcms_premium['x1_bigcloudcms_logo_upload']['height']);?>px" /> <?php } ?>
                        </div> <?php } else { echo apply_filters('kad_site_name', get_bloginfo('name')); } ?>
              </a>
              <?php if (!empty($bigcloudcms_premium['logo_below_text']) ) { ?> <p class="kad_tagline belowlogo-text"><?php echo $bigcloudcms_premium['logo_below_text']; ?></p> <?php }?>
            </div> <!-- Close #logo -->
          </div><!-- close col-md-4 -->
          <?php if(isset($bigcloudcms_premium['logo_layout']) && $bigcloudcms_premium['logo_layout'] == 'logowidget') { ?>
              <div class="col-sm-8 kad-header-widget"> <?php 
                if(is_active_sidebar('headerwidget')) { dynamic_sidebar('headerwidget'); } ?>
              </div>
            </div>
          <div class="row"> 
          <?php } ?>
          <div class="<?php echo esc_attr($menulclass); ?> kad-header-right">
          <?php if (has_nav_menu('primary_navigation')) : ?>
            <?php do_action( 'bigcloudcms_above_primarymenu' ); ?>
            <nav id="nav-main" class="clearfix" role="navigation">
                <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu'));  ?>
            </nav>
           <?php  endif; ?>
          </div> <!-- Close span7 -->       
    </div> <!-- Close Row -->
    <?php if (has_nav_menu('mobile_navigation')) : ?>
           <div id="mobile-nav-trigger" class="nav-trigger">
              <button class="nav-trigger-case mobileclass" data-toggle="collapse" rel="nofollow" data-target=".mobile_menu_collapse">
                <span class="kad-navbtn clearfix"><i class="icon-menu"></i></span>
                <?php if(!empty($bigcloudcms_premium['mobile_menu_text'])) {$menu_text = $bigcloudcms_premium['mobile_menu_text'];} else {$menu_text = __('Menu', 'bigcloudcms');} ?>
                <span class="kad-menu-name"><?php echo $menu_text; ?></span>
              </button>
            </div>
            <div id="kad-mobile-nav" class="kad-mobile-nav">
              <div class="kad-nav-inner mobileclass">
                <div id="mobile_menu_collapse" class="kad-nav-collapse collapse mobile_menu_collapse">
                  <?php if(isset($bigcloudcms_premium['menu_search']) && $bigcloudcms_premium['menu_search'] == '1') {  
                    get_search_form(); 
                  } 
                  if(isset($bigcloudcms_premium['mobile_submenu_collapse']) && $bigcloudcms_premium['mobile_submenu_collapse'] == '1') {
                    wp_nav_menu( array('theme_location' => 'mobile_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mnav', 'walker' => new kadence_mobile_walker()));
                  } else {
                    wp_nav_menu( array('theme_location' => 'mobile_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mnav'));
                  } ?>
               </div>
            </div>
          </div>   
          <?php  endif; ?> 
          <?php if (!empty($bigcloudcms_premium['bigcloudcms_banner_upload']['url'])) {  ?> 
        <div class="bigcloudcms_sitewide_banner"><div class="bigcloudcms_banner">
          <?php if (!empty($bigcloudcms_premium['bigcloudcms_banner_link'])) { ?> <a href="<?php echo esc_url($bigcloudcms_premium['bigcloudcms_banner_link']);?>"> <?php }?>
          <?php $alt_text = get_post_meta($bigcloudcms_premium['bigcloudcms_banner_upload']['id'], '_wp_attachment_image_alt', true); ?>
          <img src="<?php echo esc_url($bigcloudcms_premium['bigcloudcms_banner_upload']['url']); ?>" width="<?php echo esc_attr($bigcloudcms_premium['bigcloudcms_banner_upload']['width']); ?>" height="<?php echo esc_attr($bigcloudcms_premium['bigcloudcms_banner_upload']['height']); ?>" alt="<?php echo esc_attr($alt_text);?>" /></div>
          <?php if (!empty($bigcloudcms_premium['bigcloudcms_banner_link'])) { ?> </a> <?php }?>
        </div> <?php } ?>
  </div> <!-- Close Header Container -->

        <div class="header-slider"><!-- Open Header Slider -->
             <?php global $bigcloudcms_premium; 
    			$detect = new Mobile_Detect_BigCloudCMS; if($detect->isMobile() && !$detect->isTablet() && $bigcloudcms_premium['mobile_switch'] == '1') {
		 		$slider = $bigcloudcms_premium['choose_mobile_slider'];
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
			  	if(isset($bigcloudcms_premium['choose_slider'])) { 
			  		$slider = $bigcloudcms_premium['choose_slider'];
			  	} else {
			  		$slider = 'none';
			  	}
				if ($slider == "rev") {
						if($bigcloudcms_premium['above_header_slider'] != 1) {
							get_template_part('templates/home/rev', 'slider');
						}
				} else if ($slider == "ktslider") {
						if($bigcloudcms_premium['above_header_slider'] != 1) {
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
					if($bigcloudcms_premium['above_header_slider'] != 1) {
						get_template_part('templates/home/cyclone', 'slider');
					}
				} else if ($slider == "fullwidth") {
					get_template_part('templates/home/fullwidth', 'slider');
				} else if ($slider == "video") {
					get_template_part('templates/home/video', 'block');
				}
			} ?>
            </div><!-- Close Header Slider -->