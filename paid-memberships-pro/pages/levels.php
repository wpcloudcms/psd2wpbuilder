<?php 
global $wpdb, $pmpro_msg, $pmpro_msgt, $current_user;

$pmpro_levels = pmpro_getAllLevels(false, true);
$pmpro_level_order = pmpro_getOption('level_order');

if(!empty($pmpro_level_order))
{
	$order = explode(',',$pmpro_level_order);

	//reorder array
	$reordered_levels = array();
	foreach($order as $level_id) {
		foreach($pmpro_levels as $key=>$level) {
			if($level_id == $level->id)
				$reordered_levels[] = $pmpro_levels[$key];
		}
	}

	$pmpro_levels = $reordered_levels;
}

$pmpro_levels = apply_filters("pmpro_levels_array", $pmpro_levels);

if($pmpro_msg)
{
?>
<div class="pmpro_message <?php echo $pmpro_msgt?>"><?php echo $pmpro_msg?></div>
<?php
}
?>
<?php	
	//$count = 0;
	//foreach($pmpro_levels as $level)
	//{
	  if(isset($current_user->membership_level->ID))
		  $current_level = ($current_user->membership_level->ID == $level->id);
	  else
		  $current_level = 'false'
	?>
<div class="row nowplan">Current Plan: <?php echo $current_user->membership_level->name?> @ <?php echo pmpro_getLevelCost($level, true, true);?></div>
<div class="row toggleswitch">
<div class="col-xs-2"></div>
<div class="col-xs-3 monthly black billing" style="text-align: right;">Monthly Billing</div>
<div class="col-xs-2 toggle"> <a id="toggle2" href="#"><img class="toggle1 size-full wp-image-118 aligncenter" src="http://everythingwp.bigcloudcms.com/wp-content/uploads/2016/03/monthly_billing_button.png" alt="monthly_billing_button" width="70" height="35" /></a>
<a id="toggle1" href="#"><img class="toggle2 hidden size-full wp-image-119 aligncenter" src="http://everythingwp.bigcloudcms.com/wp-content/uploads/2016/03/annual_billing_button.png" alt="annual_billing_button" width="70" height="35" /></a></div>
<div class="col-xs-3 annual billing">Annual Billing<br>
Save 50%</div>
<div class="col-xs-2"></div>
</div>
<div class="toggle1 monthly black pb60" style="text-align: center;">Click yearly above and save up to $480 on annual plans</div>
<div class="toggle2 annual pb60 hidden" style="text-align: center;">Save up to $480 on yearly subscriptions</div>
<div class="toggle1">
<div id="shaon-pricing-table" class="row shaon-pricing-table skin-blue style-2">
<div class="col-md-12">
<div class="row">
<div class="col-md-4">
<div class="free pricing-table small">
<ul>
<ul>
	<li class="wppt-package-name top-li-first">
<h5>SMALL</h5>
</li>
	<li class="wppt-package-info free-row-2">
<div class="wppt-info-circle">
<h1>79 <span class="dollar">$</span></h1>
<p class="usdpermo"><strong>USD Per Month</strong>
Minimum 3 months signup</p>

</div></li>
	<li class="feature first-feature pricing-content-row-odd yep"><label class="label label-success"></label>   <span class="ftr">TIMESHEET</span></li>
	<li class="feature pricing-content-row-even blue-row-gray yep"><label class="label label-success"></label>   <span class="ftr">PROJECT SUMMERY</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">TEAM AND CLIENTS</span></li>
	<li class="feature pricing-content-row-even blue-row-gray nope"><label class="label label-success"></label>   <span class="ftr">REPORTS</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">PAYMENT AND INVOICE</span></li>
	<li class="pricing-footer <?php if($current_user->membership_level->ID == '1') { ?> active<?php } ?> footer-row"><a class="btn-pricing btn btn-block" href="/membership-account/membership-checkout/?level=1">CHOOSE</a></li>
</ul>
</ul>
<div class="price-bottom"></div>
</div>
</div>
<div class="col-md-4">
<div class="free pricing-table medium">
<ul>
<ul>
	<li class="wppt-package-name ">
<h5>MEDIUM</h5>
</li>
	<li class="wppt-package-info free-row-2">
<div class="wppt-info-circle">
<h1>99 <span class="dollar">$</span></h1>
<p class="usdpermo"><strong>USD Per Month</strong>
Minimum 3 months signup</p>

</div></li>
	<li class="feature first-feature pricing-content-row-odd yep"><label class="label label-success"></label>   <span class="ftr">TIMESHEET</span></li>
	<li class="feature pricing-content-row-even free-row-gray yep"><label class="label label-success"></label>   <span class="ftr">PROJECT SUMMERY</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">TEAM AND CLIENTS</span></li>
	<li class="feature pricing-content-row-even free-row-gray nope"><label class="label label-success"></label>   <span class="ftr">REPORTS</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">PAYMENT AND INVOICE</span></li>
	<li class="pricing-footer <?php if($current_user->membership_level->ID == '2') { ?> active<?php } ?> footer-row"><a class="btn-pricing btn btn-block" href="/membership-account/membership-checkout/?level=2">CHOOSE</a></li>
</ul>
</ul>
<div class="price-bottom"></div>
</div>
</div>
<div class="col-md-4">
<div class="free pricing-table large">
<ul>
<ul>
	<li class="wppt-package-name top-li-last">
<h5>LARGE</h5>
</li>
	<li class="wppt-package-info free-row-2">
<div class="wppt-info-circle">
<h1>199 <span class="dollar">$</span></h1>
<p class="usdpermo"><strong>USD Per Month</strong>
Minimum 3 months signup</p>

</div></li>
	<li class="feature first-feature pricing-content-row-odd yep"><label class="label label-success"></label>   <span class="ftr">TIMESHEET</span></li>
	<li class="feature pricing-content-row-even free-row-gray yep"><label class="label label-success"></label>   <span class="ftr">PROJECT SUMMERY</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">TEAM AND CLIENTS</span></li>
	<li class="feature pricing-content-row-even free-row-gray nope"><label class="label label-success"></label>   <span class="ftr">REPORTS</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">PAYMENT AND INVOICE</span></li>
	<li class="pricing-footer <?php if($current_user->membership_level->ID == '3') { ?> active<?php } ?> footer-row"><a class="btn-pricing btn btn-block" href="/membership-account/membership-checkout/?level=3">CHOOSE</a></li>
</ul>
</ul>
<div class="price-bottom"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="toggle2 hidden">
<div id="shaon-pricing-table" class="row shaon-pricing-table skin-blue style-2">
<div class="col-md-12">
<div class="row">
<div class="col-md-4">
<div class="free pricing-table small">
<ul>
<ul>
	<li class="wppt-package-name top-li-first">
<h5>SMALL</h5>
</li>
	<li class="wppt-package-info free-row-2">
<div class="wppt-info-circle">
<h1>69 <span class="dollar">$</span></h1>
<p class="usdpermo"><strong>USD Per Month</strong>
(billed yearly)</p>
<p class="usave">you save $120</p>

</div></li>
	<li class="feature first-feature pricing-content-row-odd yep"><label class="label label-success"></label>   <span class="ftr">TIMESHEET</span></li>
	<li class="feature pricing-content-row-even blue-row-gray yep"><label class="label label-success"></label>   <span class="ftr">PROJECT SUMMERY</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">TEAM AND CLIENTS</span></li>
	<li class="feature pricing-content-row-even blue-row-gray nope"><label class="label label-success"></label>   <span class="ftr">REPORTS</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">PAYMENT AND INVOICE</span></li>
	<li class="pricing-footer <?php if($current_user->membership_level->ID == '4') { ?> active<?php } ?> footer-row"><a class="btn-pricing btn btn-block" href="/membership-account/membership-checkout/?level=4">CHOOSE</a></li>
</ul>
</ul>
<div class="price-bottom"></div>
</div>
</div>
<div class="col-md-4">
<div class="free pricing-table medium">
<ul>
<ul>
	<li class="wppt-package-name ">
<h5>MEDIUM</h5>
</li>
	<li class="wppt-package-info free-row-2">
<div class="wppt-info-circle">
<h1>79 <span class="dollar">$</span></h1>
<p class="usdpermo"><strong>USD Per Month</strong>
(billed yearly)</p>
<p class="usave">you save $120</p>

</div></li>
	<li class="feature first-feature pricing-content-row-odd yep"><label class="label label-success"></label>   <span class="ftr">TIMESHEET</span></li>
	<li class="feature pricing-content-row-even free-row-gray yep"><label class="label label-success"></label>   <span class="ftr">PROJECT SUMMERY</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">TEAM AND CLIENTS</span></li>
	<li class="feature pricing-content-row-even free-row-gray nope"><label class="label label-success"></label>   <span class="ftr">REPORTS</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">PAYMENT AND INVOICE</span></li>
	<li class="pricing-footer <?php if($current_level == '5') { ?> active<?php } ?> footer-row"><a class="btn-pricing btn btn-block" href="/membership-account/membership-checkout/?level=5">CHOOSE</a></li>
</ul>
</ul>
<div class="price-bottom"></div>
</div>
</div>
<div class="col-md-4">
<div class="free pricing-table large">
<ul>
<ul>
	<li class="wppt-package-name top-li-last">
<h5>LARGE</h5>
</li>
	<li class="wppt-package-info free-row-2">
<div class="wppt-info-circle">
<h1>159 <span class="dollar">$</span></h1>
<p class="usdpermo"><strong>USD Per Month</strong>
(billed yearly)</p>
<p class="usave">you save $120</p>

</div></li>
	<li class="feature first-feature pricing-content-row-odd yep"><label class="label label-success"></label>   <span class="ftr">TIMESHEET</span></li>
	<li class="feature pricing-content-row-even free-row-gray yep"><label class="label label-success"></label>   <span class="ftr">PROJECT SUMMERY</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">TEAM AND CLIENTS</span></li>
	<li class="feature pricing-content-row-even free-row-gray nope"><label class="label label-success"></label>   <span class="ftr">REPORTS</span></li>
	<li class="feature pricing-content-row-odd nope"><label class="label label-success"></label>   <span class="ftr">PAYMENT AND INVOICE</span></li>
	<li class="pricing-footer <?php if($current_user->membership_level->ID == '6') { ?> active<?php } ?> footer-row"><a class="btn-pricing btn btn-block" href="/membership-account/membership-checkout/?level=6">CHOOSE</a></li>
</ul>
</ul>
<div class="price-bottom"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="text-center pb60"></div>

<div class="hidden"> <table id="pmpro_levels_table" class="pmpro_checkout">
<thead>
  <tr>
	<th><?php _e('Levels', 'pmpro');?></th>
	<th><?php _e('Prices', 'pmpro');?></th>	
	<th>&nbsp;</th>
  </tr>
</thead>
<tbody>
	
	<tr class="<?php if($count++ % 2 == 0) { ?>odd<?php } ?>">
		<td><?php echo $current_level ? "<strong>{$level->name}</strong>" : $level->name?></td>
		<td>
			<?php 
				if(pmpro_isLevelFree($level))
					$cost_text = "<strong>" . __("Free", "pmpro") . "</strong>";
				else
					$cost_text = pmpro_getLevelCost($level, true, true); 
				$expiration_text = pmpro_getLevelExpiration($level);
				if(!empty($cost_text) && !empty($expiration_text))
					echo $cost_text . "<br />" . $expiration_text;
				elseif(!empty($cost_text))
					echo $cost_text;
				elseif(!empty($expiration_text))
					echo $expiration_text;
			?>
		</td>
		<td>
		<?php if(empty($current_user->membership_level->ID)) { ?>
			<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Select', 'pmpro');?></a>
		<?php } elseif ( !$current_level ) { ?>                	
			<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Select', 'pmpro');?></a>
		<?php } elseif($current_level) { ?>      
			
			<?php
				//if it's a one-time-payment level, offer a link to renew				
				if( pmpro_isLevelExpiringSoon( $current_user->membership_level) ) {
					?>
						<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Renew', 'pmpro');?></a>
					<?php
				} else {
					?>
						<a class="pmpro_btn disabled" href="<?php echo pmpro_url("account")?>"><?php _e('Your&nbsp;Level', 'pmpro');?></a>
					<?php
				}
			?>
			
		<?php } ?>
		</td>
	</tr>
	<?php
	//}
	?>
</tbody>
</table></div>
<nav id="nav-below" class="navigation hidden" role="navigation">
	<div class="nav-previous alignleft">
		<?php if(!empty($current_user->membership_level->ID)) { ?>
			<a href="<?php echo pmpro_url("account")?>"><?php _e('&larr; Return to Your Account', 'pmpro');?></a>
		<?php } else { ?>
			<a href="<?php echo home_url()?>"><?php _e('&larr; Return to Home', 'pmpro');?></a>
		<?php } ?>
	</div>
</nav>
