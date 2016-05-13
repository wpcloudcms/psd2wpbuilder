<?php
	global $wpdb, $pmpro_msg, $pmpro_msgt, $pmpro_levels, $current_user, $levels, $show_paypal_link, $pmpro_currency_symbol;
	global $free_membership_level, $paid_membership_level, $bfirstname, $blastname, $baddress1, $baddress2, $bcity, $bstate, $bzipcode, $bcountry, $bphone, $bemail, $bconfirmemail, $CardType, $AccountNumber, $ExpirationMonth, $ExpirationYear;
	
	//if a member is logged in, show them some info here (1. past invoices. 2. billing information with button to update.)
	if($current_user->membership_level->ID)
	{
	?>	<div class="current-plan">	
		<h2>Current Plan</h2> <strong><?php //echo $current_user->membership_level->name?></strong>
		<ul>
		<?php if($current_user->membership_level->billing_amount > 0) { ?>
			<li>You are on the <?php echo $current_user->membership_level->name?> <strong>@ <?php echo $pmpro_currency_symbol?><?php echo $current_user->membership_level->billing_amount?>/Month</strong></li>
            <li>Your next payment is <?php echo $pmpro_currency_symbol?><?php echo $current_user->membership_level->billing_amount?> on <strong><?php $nextpayment = pmpro_next_payment(); echo date("F j, Y", $nextpayment)?></strong></li>
            
        <div class="btns"><a class="green" href="/upgrade/">Switch Plan</a> <a class="grey" href="/membership-account/membership-cancel/?level=<?php echo $current_user->membership_level->cycle_number?>">Cancel Plan</a></div>
            </ul>
            </div>
<!--
			<?php //if($current_user->membership_level->cycle_number > 1) { ?>
				per <?php //echo $current_user->membership_level->cycle_number?> <?php //echo sornot($current_user->membership_level->cycle_period,$current_user->membership_level->cycle_number)?>
			<?php //} elseif($current_user->membership_level->cycle_number == 1) { ?>
				per <?php //echo $current_user->membership_level->cycle_period?>
			<?php //} ?>
-->
		<?php } ?>						

<!--
		<?php //if($current_user->membership_level->billing_limit) { ?>
			<li><strong>Duration:</strong> <?php //echo $current_user->membership_level->billing_limit.' '.sornot($current_user->membership_level->cycle_period,$current_user->membership_level->billing_limit)?></li>
		<?php //} ?>
		
		<?php //if($current_user->membership_level->enddate) { ?>
			<li><strong>Membership Expires:</strong> <?php //echo date(get_option('date_format'), $current_user->membership_level->enddate)?></li>
		<?php //} ?>
		
		<?php //if($current_user->membership_level->trial_limit) { ?>
			Your first <?php //echo $current_user->membership_level->trial_limit?> <?php //echo sornot("payment",$current_user->membership_level->trial_limit)?> will cost $<?php //echo $current_user->membership_level->trial_amount?>.
		<?php //} ?>   
-->

		<?php
			//the nextpayment code is not tight yet
			/*
			$nextpayment = pmpro_next_payment();
			if($nextpayment)
			{
			?>
				<li><strong>Next Invoice:</strong> <?php echo date("F j, Y", $nextpayment)?></li>
			<?php
			}
			*/
		?>
		
		
		<div class="pmpro_left">
			<div class="pmpro_box myaccount">
				<?php get_currentuserinfo(); ?> 
				<h3><a class="pmpro_a-right" href="<?php echo admin_url('profile.php')?>">Edit</a>My Account</h3>
				<p>
				<?php if($current_user->user_firstname) { ?>
					<?php echo $current_user->user_firstname?> <?php echo $current_user->user_lastname?><br />
				<?php } ?>
				<small>
					<strong>Username:</strong> <?php echo $current_user->user_login?><br />
					<strong>Email:</strong> <?php echo $current_user->user_email?><br />
					<strong>Password:</strong> ****** <small><a href="<?php echo admin_url('profile.php')?>">change</a></small>				
				</small>
			</div>
			<?php
				//last invoice for current info
				//$ssorder = $wpdb->get_row("SELECT *, UNIX_TIMESTAMP(timestamp) as timestamp FROM $wpdb->pmpro_membership_orders WHERE user_id = '$current_user->ID' AND membership_id = '" . $current_user->membership_level->ID . "' AND status = 'success' ORDER BY timestamp DESC LIMIT 1");				
				$ssorder = new MemberOrder();
				$ssorder->getLastMemberOrder();
				$invoices = $wpdb->get_results("SELECT *, UNIX_TIMESTAMP(timestamp) as timestamp FROM $wpdb->pmpro_membership_orders WHERE user_id = '$current_user->ID' ORDER BY timestamp DESC");				
				if(!empty($ssorder->id) && $ssorder->gateway != "check" && $ssorder->gateway != "paypalexpress")
				{
					//default values from DB (should be last order or last update)
					$bfirstname = get_user_meta($current_user->ID, "pmpro_bfirstname", true);
					$blastname = get_user_meta($current_user->ID, "pmpro_blastname", true);
					$baddress1 = get_user_meta($current_user->ID, "pmpro_baddress1", true);
					$baddress2 = get_user_meta($current_user->ID, "pmpro_baddress2", true);
					$bcity = get_user_meta($current_user->ID, "pmpro_bcity", true);
					$bstate = get_user_meta($current_user->ID, "pmpro_bstate", true);
					$bzipcode = get_user_meta($current_user->ID, "pmpro_bzipcode", true);
					$bcountry = get_user_meta($current_user->ID, "pmpro_bcountry", true);
					$bphone = get_user_meta($current_user->ID, "pmpro_bphone", true);
					$bemail = get_user_meta($current_user->ID, "pmpro_bemail", true);
					$bconfirmemail = get_user_meta($current_user->ID, "pmpro_bconfirmemail", true);
					$CardType = get_user_meta($current_user->ID, "pmpro_CardType", true);
					$AccountNumber = hideCardNumber(get_user_meta($current_user->ID, "pmpro_AccountNumber", true), false);
					$ExpirationMonth = get_user_meta($current_user->ID, "pmpro_ExpirationMonth", true);
					$ExpirationYear = get_user_meta($current_user->ID, "pmpro_ExpirationYear", true);	
				?>
            <div class="credit-card">	
				<div class="pmpro_box">				
					<h2><?php if((isset($ssorder->status) && $ssorder->status == "success") && (isset($ssorder->gateway) && in_array($ssorder->gateway, array("authorizenet", "paypal", "stripe")))) { ?>
<!--                        <a class="pmpro_a-right" href="<?php //echo pmpro_url("billing", "")?>">Edit</a>-->
                        <?php } ?>Credit Card</h2>
					<?php if(!empty($baddress1)) { ?>
					<p>
						<strong>Billing Address</strong><br />
						<?php echo $bfirstname . " " . $blastname?>
						<br />		
						<?php echo $baddress1?><br />
						<?php if($baddress2) echo $baddress2 . "<br />";?>
						<?php if($bcity && $bstate) { ?>
							<?php echo $bcity?>, <?php echo $bstate?> <?php echo $bzipcode?> <?php echo $bcountry?>
						<?php } ?>                         
						<br />
						<?php echo formatPhone($bphone)?>
					</p>
					<?php } ?>
                    <ul>
					<li>
<!--						<strong>Payment Method</strong><br />-->
						Your credit card on file is <strong><?php echo $CardType?>: xxxx-xxxx-xxxx-<?php echo last4($AccountNumber)?> (<?php echo $ExpirationMonth?>/<?php echo $ExpirationYear?>)</strong>
					</li>
                        <div class="btns"><a class="green" href="/edit-billing/">Edit Billing Details</a></div>
                    </ul>
				</div>	
            </div>
			<?php
			}
			?>
			<div class="pmpro_box memblinks">
				<h3>Member Links</h3>
				<ul>
					<?php 
						do_action("pmpro_member_links_top");
					?>
					<?php if((isset($ssorder->status) && $ssorder->status == "success") && (isset($ssorder->gateway) && in_array($ssorder->gateway, array("authorizenet", "paypal", "stripe")))) { ?>
						<li><a href="<?php echo pmpro_url("billing", "", "https")?>">Update Billing Information</a></li>
					<?php } ?>
					<?php if($current_user->membership_level->id == $free_membership_level) { ?>
						<li><a href="<?php echo pmpro_url("checkout")?>?level=6">Activate Your Membership Account &raquo;</a></li>             
					<?php } ?>
					<li><a href="<?php echo pmpro_url("cancel")?>">Cancel Membership</a></li>
					<?php 
						do_action("pmpro_member_links_bottom");
					?>
				</ul>
			</div>
		</div> <!-- end pmpro_left -->
		
<div class="history">	
		<div class="pmpro_right">
			<?php if(!empty($invoices)) { ?>
			<div class="pmpro_box">
				<h2>Payment History</h2>
				<ul>
					<?php 
						$count = 0;
						foreach($invoices as $invoice) 
						{ 
					?>
					<li <?php if($count++ > 10) { ?>class="pmpro_hidden pmpro_invoice"<?php } ?>>
<!--                        <a href="<?php //echo pmpro_url("invoice", "?invoice=" . $invoice->code)?>">-->
                           <p><?php echo date("F j, Y", $invoice->timestamp)?> - <?php echo $pmpro_currency_symbol?><?php echo $invoice->total?></p>
<!--                        </a>-->
                    </li>
					<?php } ?>
					<?php if($count > 10) { ?>
						<li class="pmpro_more pmpro_invoice"><a href="javascript: jQuery('.pmpro_more.pmpro_invoice').hide(); jQuery('.pmpro_hidden.pmpro_invoice').show(); void(0);">show <?php echo (count($invoices) - 10)?> more</a></li>
					<?php 
						} 
					?>
				</ul>
			</div>
			<?php } ?>
		</div>
</div><!-- end pmpro_right -->
		
<?php
	}
