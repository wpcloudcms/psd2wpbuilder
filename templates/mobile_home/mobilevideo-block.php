<div class="sliderclass">
	                    <?php if(isset($bigcloudcms_premium['slider_box_layout']) and $bigcloudcms_premium['slider_box_layout'] == 'sliderwide') { ?>
    <div id="imageslider" class="full-slider">
<?php } else { ?>
   <div id="imageslider">
<?php } ?>
			<div class="videofit">
                  <?php global $bigcloudcms_premium; echo $bigcloudcms_premium['mobile_video_embed'];?>
                  </div>
        </div><!--Container-->
</div><!--feat-->