<?php 
	global $bigcloudcms_premium; 

	if(isset($bigcloudcms_premium['slider_size_width'])) {$slidewidth = $bigcloudcms_premium['slider_size_width'];} else { $slidewidth = 1600; }
?>
<div class="sliderclass">
	                    <?php if(isset($bigcloudcms_premium['slider_box_layout']) and $bigcloudcms_premium['slider_box_layout'] == 'sliderwide') { ?>
    <div id="imageslider" class="full-slider">
<?php } else { ?>
   <div id="imageslider">
<?php } ?>
			<div class="videofit" style="max-width:<?php echo esc_attr($slidewidth);?>px; margin-left: auto; margin-right:auto;">
                <?php if(!empty($bigcloudcms_premium['video_embed'])) echo $bigcloudcms_premium['video_embed'];?>
            </div>
	</div><!--Container-->
</div><!--feat-->