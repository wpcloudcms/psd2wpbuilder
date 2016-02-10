<div class="sliderclass">
	                    <?php if(isset($virtue_premium['slider_box_layout']) and $virtue_premium['slider_box_layout'] == 'sliderwide') { ?>
    <div id="imageslider" class="container box">
<?php } else { ?>
   <div id="imageslider">
<?php } ?>
			<div class="videofit">
                  <?php global $virtue_premium; echo $virtue_premium['mobile_video_embed'];?>
                  </div>
        </div><!--Container-->
</div><!--feat-->