<div class="sliderclass">
  <?php global $virtue_premium; 
                if( isset( $virtue_premium['shop_slider_size']))  { $slideheight =  $virtue_premium['shop_slider_size']; } else { $slideheight = 400; }
                if( isset( $virtue_premium['shop_slider_size_width']))  {$slidewidth = $virtue_premium['shop_slider_size_width']; } else { $slidewidth = 1170; }
                $captions = $virtue_premium['shop_slider_captions'];
                $slides = $virtue_premium['shop_slider_images'];
                ?>
    <div id="imageslider" class="container">
    <div class="flexslider loading" style="max-width:<?php echo $slidewidth;?>px;">
        <ul class="slides">
            <?php foreach ($slides as $slide) : 
                    $image = aq_resize($slide['url'], $slidewidth, $slideheight, true);
                    if($image == "") { $image = $slide['url']; }  ?>
                      <li> 
                        <?php if($slide['link'] != '') echo '<a href="'.$slide['link'].'">'; ?>
                          <img src="<?php echo $image; ?>" alt="<?php echo $slide['description']?>" title="<?php echo $slide['title'] ?>" />
                              <?php if ($captions == '1') { ?> 
                                <div class="flex-caption">
              								  <?php if ($slide['title'] != '') echo '<div class="captiontitle headerfont">'.$slide['title'].'</div>'; ?>
              								  <?php if ($slide['description'] != '') echo '<div><div class="captiontext headerfont"><p>'.$slide['description'].'</p></div></div>';?>
                                </div> 
                              <?php } ?>
                        <?php if($slide['link'] != '') echo '</a>'; ?>
                      </li>
                  <?php endforeach; ?>
        </ul>
      </div> <!--Flex Slides-->


      <?php  global $virtue_premium; 
          $transtype = $virtue_premium['shop_trans_type']; if ($transtype == '') $transtype = 'slide';
          $transtime = $virtue_premium['shop_slider_transtime']; if ($transtime == '') $transtime = '300'; 
          $autoplay = $virtue_premium['shop_slider_autoplay']; if ($autoplay == '') $autoplay = 'true'; 
          $pausetime = $virtue_premium['shop_slider_pausetime']; if ($pausetime == '') $pausetime = '7000'; 
      ?>
      <script type="text/javascript">
            jQuery(window).load(function () {
                jQuery('.flexslider').flexslider({
                    animation: "<?php echo $transtype ?>",
                    animationSpeed: <?php echo $transtime ?>,
                    slideshow: <?php echo $autoplay ?>,
                    slideshowSpeed: <?php echo $pausetime ?>,

                    before: function(slider) {
                      slider.removeClass('loading');
                    }  
                  });
                });
      </script>
    </div>
  </div>