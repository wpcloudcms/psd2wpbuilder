<?php
	global $virtue_premium; 

?>
<div class="sliderclass revslider_home_hidetop">
<?php  
	if( function_exists('putRevSlider') ) {
		putRevSlider( $virtue_premium['rev_slider'] ); 
	} else {
		echo '<p class="error" style="text-align:center; color: red;">'.__("Please Install Revolution Slider Plugin", "virtue").'</p>';
	} ?>
</div><!--sliderclass-->