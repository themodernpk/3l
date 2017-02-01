<?php
/*
Template Name: teacher-payment-history
*/
?>
<?php get_template_part('header-dashboard'); ?>


<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
<?php TP::css('dashboard'); ?>
<?php TP::css('mywallet'); ?>
<?php TP::css('teacher-payment-history'); ?>



<div class="container-fluid display-table v-align margin_top_second pos-rel" style="">
	<div class="row display-table-row">
		<button class="vk_toggle vk_toggle--htla visible-xs">
			<span>toggle menu</span>
		</button>
		<div class=" display-table-cell v-align dash_left_side" id="navigation_left">
			
			<div class="side_bar">

				<h6>MENU</h6>
				<ul>
					<li class="db_dashboard "><a href="<?php echo site_url(); ?>/teacher-dashboard/">
						<i></i> <span class="hidden-sm hidden-xs"> Dashboard</span>
					</a></li>	

					<li class="db_profile"><a href="<?php echo site_url(); ?>/teacher-edit-profile/">
						<i></i> <span class="hidden-sm hidden-xs"> Profile</span>
					</a></li>


					<li class="db_notification "><a href="<?php echo site_url(); ?>/teacher-notification/">
						<i></i> <span class="hidden-sm hidden-xs">  Notification</span>
					</a></li>

					<li class="db_paymenthistory active"><a href="<?php echo site_url(); ?>/teacher-payment-history/">
						<i></i> <span class="hidden-sm hidden-xs">Payment History</span>
					</a></li>

					<li class="db_logout"><a href="<?php echo site_url(); ?>/logout/">
						<i></i> <span class="hidden-sm hidden-xs">  Logout</span>
					</a></li>

				</ul>
			</div>
		</div><!---dash_ left _side-->

		<div class="display-table-cell v-align dash_right_side">

			<div class="dash_right_side_inner">
				
				<div class="myheading pos-rel">
					<h3>Payment History</h3>
					
				</div>

				<div class="mywallet_section">						

					<ul class="nav nav-tabs">
						<span class="line"></span>
						<li class=" active wallet_col">
							<a data-toggle="tab" href="#balance_slide" class="wallet_ring">
								<div class="wallet_balance">
									<img class="" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/coins.png" alt="">
									<h2 class="counter">2000</h2>
								</div>
							</a>
							<h4>Eligible for Withdrawal</h4>
							<p> Minimum <span>SAR 160 </span>needed for withdrawal request </p>
							
							<a href="#withdrawl-rqst" class="btn popup-with-zoom-anim">Request a Withdrawal</a>
						</li>
						<li class="wallet_col wallet_col2">
							<a data-toggle="tab" class="wallet_ring" href="#package_slide">
								<div class="wallet_packages">
									<h1><i class="fa fa-university" aria-hidden="true"></i></h1>
								</div>
							</a>
							<h4>My Bank Account</h4>
							<p>Details of your bank/Paypal accounts </p>
							
							<a href="#bank-acc-detail" class="btn popup-with-zoom-anim">Add Account</a>
						</li>							
					</ul>

				</div><!--mywallet_section-->


				<div class="tab-content">

					<div class="mywallet_slide mywallet_slide_transection tab-pane fade in active" id="balance_slide">
						<div class="title_of_slide">
							<p>Transactions </p>

							<div class="slide_dd pull-right">
								<h5>Show</h5>
								<select class="selectpicker"  title="Transactions" required="">
									<option>All Transactions</option>
									<option>Option Two</option>
									<option>Option Three</option>
								</select>

							</div>
						</div>
						<div class="clearfix"></div>

						


						<div class="table mytable">
							<div class="header-row row">
								<span class="cell primary">Date</span>
								<span class="cell">Detail</span>
								<span class="cell">Debit</span>
								<span class="cell">Credit</span>
								<span class="cell">Balance</span>

							</div>
							<div class="row">
								<input type="checkbox" name="expand" checked>
								<span class="cell primary" data-label="Date">March 29,  2016</span>
								<span class="cell detail_tr" data-label="Detail">
									<ul>
										<li><b>Session:</b> ID 021365</li>
										<li><b>Subject:</b> Algebra</li>
										<li><b>Duration:</b> 2 Hours</li>
										<li><b>Date & Time:</b> MM/DD/YY, 11 AM</li>
										<li><b>Session Type:</b> Live Session</li>
										<li><b>Account Type:</b>  Bank Tranfer</li>
									</ul>
								</span>
								<span class="cell amount_tr debit_tr" data-label="Debit">SAR 300</span>
								<span class="cell amount_tr credit_tr" data-label="Credit"> <span class="dash"></span> </span>
								<span class="cell amount_tr" data-label="Balance">SAR 3400</span>
							</div>


							<div class="row">
								<input type="checkbox" name="expand" >
								<span class="cell primary" data-label="Date">March 29,  2016</span>
								<span class="cell detail_tr" data-label="Detail">
									<ul>
										<li><b>Session:</b> ID 021365</li>
										<li><b>Subject:</b> Algebra</li>
										<li><b>Duration:</b> 2 Hours</li>
										<li><b>Date & Time:</b> MM/DD/YY, 11 AM</li>
										<li><b>Session Type:</b> Live Session</li>
										<li><b>Account Type:</b>  Bank Tranfer</li>
									</ul>
								</span>
								<span class="cell amount_tr debit_tr" data-label="Debit"> <span class="dash"></span> </span>
								<span class="cell amount_tr credit_tr" data-label="Credit">SAR 300</span>
								<span class="cell amount_tr" data-label="Balance">SAR 3400</span>
							</div>

							
						</div><!--table-->

					</div><!--mywallet_slide-->


					<div class="mywallet_slide mywallet_slide_accdetails tab-pane fade"  id="package_slide">
						<div class="title_of_slide">
							<p>Account details</p>
						</div>


						
						<div class="table mytable">
							<div class="header-row row">
								<span class="cell primary">Account type</span>
								<span class="cell">Detail</span>
								<span class="cell">Action</span>

							</div>


							<div class="row">
								<input type="checkbox" name="expand" checked>
								<span class="cell primary account_tr" data-label="Account type">
									<div class="media">
										<div class="media-left media-middle">
											<i class="fa fa-university" aria-hidden="true"></i>
										</div>
										<div class="media-body media-middle">
											<h4>Bank Account</h4>
										</div>
									</div>
								</span>
								<span class="cell detail_tr" data-label="Detail">
									<ul>
										<li><b>Payee:</b> Sarah Malik </li>
										<li><b>IBAN:</b> AE 1236 5447 8952 2236 5222 2 </li>
										<li><b>SWIFT BIC:</b> RFXLGB2L</li>
										<li><b>Bank Name:</b> Bank Al Bilad </li>
										<li><b>Branch Location:</b> Umar Ibn Abdul Aziz Branch Rd, Riyadh 12816, Saudi Arabia</li>
									</ul>
								</span>
								<span class="cell actions_tr" data-label="Action">
									<a href="" class="btn edit">Edit</a>
									<a href="" class="btn remove">Remove</a>
								</span>

							</div>



							<div class="row">
								<input type="checkbox" name="expand" >
								<span class="cell primary account_tr" data-label="Account type">
									<div class="media ">
										<div class="media-left media-middle">
											<img class="" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/paypal_ico.png" alt="">
										</div>
										<div class="media-body media-middle">
											<h4>PayPal Account</h4>
										</div>
									</div>
								</span>
								<span class="cell detail_tr" data-label="Detail">
									<ul>
										<li><b>Name:</b> Sarah Malik</li>
										<li><b>Email:</b> Sarah.Malik23@gmail.com </li>
										<li><b>Contact Number :</b> 8952-2236-52</li>
									</ul>
								</span>
								

								<span class="cell actions_tr" data-label="Action">
									<a href="" class="btn edit">Edit</a>
									<a href="" class="btn remove">Remove</a>
								</span>



							</div>


							


						</div><!--table-->

					</div><!--mywallet_slide-->

				</div><!--tab-content-->





			</div>


		</div><!---dash_right_side-->

	</div><!--row-->
</div><!-- container-fluid display-table v-align margin_top_second pos-rel-->


<!--Dashbord-->




</div>


















<!-- /*POPUP DETAIL OF YOUR bank Account*/ -->

<div id="bank-acc-detail"  class="zoom-anim-dialog mfp-hide">
	<div class="register_inner forgot_pass_form bank_acc_popup">

		<div class="display-flex">
			<div class="left_side">
				<div class="my_rel_pos">
					<div class="my_character">
						<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/bank_acc_ch.png">
					</div>
					<h1><small>Detail of your</small>Bank Account</h1>
				</div><!--my_rel_pos -->
			</div>
			<!-- LEFT side -->
			<div class="right_side">
				<div class="my_rel_pos">
					<div class="logo_login">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="90px" height="90px">
						<style type="text/css">
							.sty{clip-path:url(#SVGID_2_);fill:url(#SVGID_3_);}
						</style>
						<g>
							<g>
								<defs>
									<path id="SVGID_1_" d="M10.2,7.4C10,8.1,9.8,8.9,9.8,9.7c0,0.8,0.1,1.5,0.4,2.2c-0.6,0.5-1,1.2-1.2,1.9c-0.2,0.7-0.2,1.5-0.1,2.3
									c0.2,0.8,0.5,1.5,1,2l1.4-1.2c-0.5-0.3-0.8-0.8-0.9-1.3c-0.1-0.5,0-1,0.2-1.5c0.2-0.5,0.6-0.8,1.2-1c0,0,0,0,0,0H12h0.3h0.6h1
									h1.4v-1.8h-2.4c-0.6,0-1-0.1-1.2-0.2c-0.1-0.1-0.2-0.2-0.3-0.3c-0.1-0.3-0.1-0.6-0.1-0.9c0-0.2,0-0.3,0-0.4h2.5l0.5-1.8H10.2z
									M2.4,12c0-5.3,4.3-9.6,9.6-9.6c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6C6.7,21.6,2.4,17.3,2.4,12 M0.2,12
									c0,6.5,5.3,11.8,11.8,11.8c6.5,0,11.8-5.3,11.8-11.8c0-6.5-5.3-11.8-11.8-11.8C5.5,0.2,0.2,5.5,0.2,12"/>
								</defs>
								<clipPath id="SVGID_2_">
									<use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
								</clipPath>

								<linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-396.554" y1="199.0926" x2="-396.1655" y2="199.0926" gradientTransform="matrix(60.7775 0 0 -60.7775 24101.75 12112.3516)">
									<stop  offset="0" 	style="stop-color:#A6CE39"/>
									<stop  offset="0.5413" 	style="stop-color:#58C5C7"/>
									<stop  offset="1" 	style="stop-color:#84D5F7"/>
								</linearGradient>
								<rect x="0.2" y="0.2" class="sty" width="23.6" height="23.6"/>
							</g>
						</g>
					</svg>
				</div>
				<h4> 
					<span>We'll need your bank details so that we can transfer money into your bank account</span>
				</h4>

				<form  class="" data-parsley-validate="" method="POST" action="#">

					<div class="form-group form_grp_width">
						<div class="">
							<label>Transfer to:</label>	
							<span>
								<input id="via_bank_acc" type="radio" name="transfer" value="bank" required="" checked >
								<label for="via_bank_acc" class="radio-inline">Bank Account</label>
							</span>
							<span>
								<input id="via_paypal"   type="radio" name="transfer"  value="paypal" required="" >
								<label for="via_paypal" class="radio-inline"> PayPal </label>
							</span>
						</div>
					</div>


					<div class="via_bank current">
						<div class="form-group">
							<input type="text" name="" placeholder="Payee Name" class="form-control" id="" required="">
						</div>

						<div class="form-group">
							<input type="text" name="" placeholder="Name of Bank" class="form-control" id="" required="">
						</div>

						<div class="form-group">
							<input type="text" name="" placeholder="Bank  Address" class="form-control" id="" required="">
						</div>

						<div class="form-group">
							<input type="text" name="" placeholder="Internation Bank Account Number" class="form-control" id="" required="">
						</div>

						<div class="form-group">
							<input type="text" name="" placeholder="SWIFT BIC" class="form-control" id="" required="">
						</div>
					</div>

					<div class="via_paypal">
						<div class="form-group">
							<input type="email" name="" placeholder="Email*" class="form-control" id="" required="">
						</div>

						<div class="form-group">
							<input type="text" name="" placeholder="Contact number*" class="form-control" id="" required="">
						</div>						
					</div>

					<button type="submit" class="btn btn-default btn-block" name="">Save Details</button>
					<p class="payment_in">Your Currency of payment is <span>Saudi Riyals</span></p>

				</form>
			</div><!-- logo_login -->

		</div><!--my_rel_pos -->
	</div>
	<!-- right_side -->


</div><!--display flex- -->


</div> <!-- REGISTER INNER -->
</div>

<!-- /*POPUP DETAIL OF YOUR bank Account*/ -->





<!-- /* ### POPUP REQUEST FOR WITHDRAWL ### */ -->

<div id="withdrawl-rqst"  class="zoom-anim-dialog mfp-hide">
	<div class="register_inner forgot_pass_form bank_acc_popup withdrawl_rqst">

		<div class="display-flex">
			<div class="left_side">
				<div class="my_rel_pos">
					<div class="my_character">
						<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/withdrawl_rqst_ch.png">
					</div>
					<h1><small>Request a</small>WithDrawal</h1>
				</div><!--my_rel_pos -->
			</div>
			<!-- LEFT side -->
			<div class="right_side">
				<div class="my_rel_pos">
					<div class="logo_login">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="140px" height="140px">
						<style type="text/css">
							.sty{clip-path:url(#SVGID_2_);fill:url(#SVGID_3_);}
						</style>
						<g>
							<g>
								<defs>
									<path id="SVGID_1_" d="M10.2,7.4C10,8.1,9.8,8.9,9.8,9.7c0,0.8,0.1,1.5,0.4,2.2c-0.6,0.5-1,1.2-1.2,1.9c-0.2,0.7-0.2,1.5-0.1,2.3
									c0.2,0.8,0.5,1.5,1,2l1.4-1.2c-0.5-0.3-0.8-0.8-0.9-1.3c-0.1-0.5,0-1,0.2-1.5c0.2-0.5,0.6-0.8,1.2-1c0,0,0,0,0,0H12h0.3h0.6h1
									h1.4v-1.8h-2.4c-0.6,0-1-0.1-1.2-0.2c-0.1-0.1-0.2-0.2-0.3-0.3c-0.1-0.3-0.1-0.6-0.1-0.9c0-0.2,0-0.3,0-0.4h2.5l0.5-1.8H10.2z
									M2.4,12c0-5.3,4.3-9.6,9.6-9.6c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6C6.7,21.6,2.4,17.3,2.4,12 M0.2,12
									c0,6.5,5.3,11.8,11.8,11.8c6.5,0,11.8-5.3,11.8-11.8c0-6.5-5.3-11.8-11.8-11.8C5.5,0.2,0.2,5.5,0.2,12"/>
								</defs>
								<clipPath id="SVGID_2_">
									<use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
								</clipPath>

								<linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-396.554" y1="199.0926" x2="-396.1655" y2="199.0926" gradientTransform="matrix(60.7775 0 0 -60.7775 24101.75 12112.3516)">
									<stop  offset="0" 	style="stop-color:#A6CE39"/>
									<stop  offset="0.5413" 	style="stop-color:#58C5C7"/>
									<stop  offset="1" 	style="stop-color:#84D5F7"/>
								</linearGradient>
								<rect x="0.2" y="0.2" class="sty" width="23.6" height="23.6"/>
							</g>
						</g>
					</svg>
				</div>
				<h3> Your Current Balance in <small>SAR</small> is </h3>

				<h1>
					<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/coins2.png">
					<span class="counter2">2000<span>
					</h1>

					<form  class="" data-parsley-validate="" method="POST" action="#">

						<div class="form-group form_grp_width">
							<div class="">
								<label>Select Currency :</label>	
								<span>
									<input id="currency_sar" type="radio" name="currency" value="sar" required="" checked >
									<label for="currency_sar" class="radio-inline">SAR</label>
								</span>
								<span>
									<input id="currency_usd"   type="radio" name="currency"  value="usd" required="" >
									<label for="currency_usd" class="radio-inline"> USD </label>
								</span>
							</div>
						</div>





						<div class="form-group">
							<input type="text" name="" placeholder="Please enter the amount" class="form-control" id="" required="">
						</div>	

						<div class="form-group">
							<select class="selectpicker"  required>
								<option data-hidden="true" value="">Select your account</option>
								<option value="acc_1">Account One</option>
								<option value="acc_2">Account Two</option>
								<option value="acc_3">Account Three</option>
							</select>
						</div>				


						<button type="submit" class="btn btn-default btn-block" name="">Submit Request</button>

					</form>
				</div><!-- logo_login -->

			</div><!--my_rel_pos -->
		</div>
		<!-- right_side -->


	</div><!--display flex- -->


</div> <!-- REGISTER INNER -->
</div>

<!-- /* ### POPUP REQUEST FOR WITHDRAWL ### */ -->

















<?php get_footer(); ?>


<?php TP::js('plugins/counter-up/waypoints.min'); ?>
<?php TP::js('plugins/counter-up/jquery.counterup.min'); ?>



<?php TP::js('dashboard'); ?>
<?php TP::js('mywallet'); ?>

<?php TP::js('teacher-payment-history'); ?>
<?php TP::js('testing_edgePreload'); ?>



<?php get_template_part('inc/document_end'); ?>