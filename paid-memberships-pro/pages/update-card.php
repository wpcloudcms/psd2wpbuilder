<?php
	global $wpdb, $current_user, $pmpro_msg, $pmpro_msgt, $show_paypal_link;
	global $bfirstname, $blastname, $baddress1, $baddress2, $bcity, $bstate, $bzipcode, $bcountry, $bphone, $bemail, $bconfirmemail, $CardType, $AccountNumber, $ExpirationMonth, $ExpirationYear;
    
    //if a member is logged in, show them some info here (1. past invoices. 2. billing information with button to update.)
	if($current_user->membership_level->ID)
	{
    ?>
    <div class="current-plan">	
		<h2>Current Plan</h2> <strong><?php //echo $current_user->membership_level->name?></strong>
		<ul>
		<?php if($current_user->membership_level->billing_amount > 0) { ?>
			<li>You are on the <?php echo $current_user->membership_level->name?> <strong>@ <?php echo $pmpro_currency_symbol?><?php echo $current_user->membership_level->billing_amount?>/Month</strong></li>
            <li>Your next payment is <?php echo $pmpro_currency_symbol?><?php echo $current_user->membership_level->billing_amount?> on <strong><?php $nextpayment = pmpro_next_payment(); echo date("F j, Y", $nextpayment)?></strong></li>
            
        <div class="btns"><a class="green" href="/upgrade/">Switch Plan</a> <a class="grey" href="/membership-account/membership-cancel/?level=<?php echo $current_user->membership_level->cycle_number?>">Cancel Plan</a></div>
            </ul>
            </div>