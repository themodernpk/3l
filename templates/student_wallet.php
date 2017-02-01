<?php
/*
Template Name: student_wallet
*/
?>
<?php get_template_part('header-dashboard'); ?>


<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
<?php TP::css('dashboard'); ?>
<?php TP::css('mywallet'); ?>



<div class="container-fluid display-table v-align margin_top_second pos-rel" style="">
	<div class="row display-table-row">
		<button class="vk_toggle vk_toggle--htla visible-xs">
			<span>toggle menu</span>
		</button>
		<div class=" display-table-cell v-align dash_left_side" id="navigation_left">
			
			<div class="side_bar">

				<h6>MENU</h6>
				<ul>
					<li class="db_dashboard "><a href="<?php echo site_url(); ?>/student-dashboard/">
						<i></i> <span class="hidden-sm hidden-xs"> Dashboard</span>
					</a></li>	

					<li class="db_profile "><a href="<?php echo site_url(); ?>/student-profile/">
						<i></i> <span class="hidden-sm hidden-xs"> Profile</span>
					</a></li>


					<li class="db_notification "><a href="<?php echo site_url(); ?>/student-notification">
						<i></i> <span class="hidden-sm hidden-xs">  Notification</span>
					</a></li>

					<li class="db_wallet active"><a href="<?php echo site_url(); ?>/student-wallet/">
						<i></i> <span class="hidden-sm hidden-xs"> My Wallet</span>
					</a></li>

					<?php $redirect = site_url() . '/logout' ?>
					<li class="db_logout"><a href="<?php echo wp_logout_url($redirect); ?>">
						<i></i> <span class="hidden-sm hidden-xs">  Logout</span>
					</a></li>

				</ul>
			</div>
		</div><!---dash_ left _side-->

		<div class="display-table-cell v-align dash_right_side">

			<div class="dash_right_side_inner">
				
				<div class="myheading pos-rel">
					<h3>My Wallet</h3>
					<a href="#refill-popup" class="btn wallet_btn popup-with-zoom-anim"><i class="fa fa-plus" aria-hidden="true"></i> Recharge Wallet</a>
				</div>

				<div class="mywallet_section">						

					<ul class="nav nav-tabs">
						<span class="line"></span>
						<li class=" active wallet_col">
							<a data-toggle="tab" href="#balance_slide" class="wallet_ring">
								<div class="wallet_balance">
									<div class="min-height-div">
										<img class="static_coin" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/coins.png" alt="">
										<img class="bouncing_coin" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/Coin-dark.gif" alt="">
									</div>
									<h2>2000</h2>
								</div>
							</a>
							<h4>Current Balance</h4>
						</li>
						<li class="wallet_col wallet_col2">
							<a data-toggle="tab" class="wallet_ring" href="#package_slide">
								<div class="wallet_packages">
									<h1>A</h1>
								</div>
							</a>
							<h4>My Package</h4>
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
								<span class="cell">Amount</span>

							</div>
							<div class="row">
								<input type="checkbox" name="expand" checked>
								<span class="cell primary" data-label="Date">March 29,  2016</span>
								<span class="cell wallet_credit" data-label="Detail"><span class="ico"></span>Added to wallet by Credit Card/Debit Card/Internet Banking</span>
								<span class="cell amount_tr" data-label="Amount">SAR 300</span>

							</div>
							<div class="row">
								<input type="checkbox" name="expand">
								<span class="cell primary" data-label="Date">March 19,  2016</span>
								<span class="cell wallet_refund" data-label="Detail"><span class="ico"></span>Refunded to Wallet for Session Id #3256</span>
								<span class="cell amount_tr" data-label="Amount">SAR 300</span>

							</div>								

						</div>

					</div><!--mywallet_slide-->


					<div class="mywallet_slide mywallet_slide_packages tab-pane fade"  id="package_slide">
						<div class="title_of_slide">
							<p>My Package </p>
						</div>


						<div class="table mytable">

							<div class="row">
								<input type="checkbox" name="expand" checked="">
								<span class="cell primary package_tr" data-label="Package">
									<p>Package</p>
									<div class="wallet_ring ">
										<div class="wallet_packages">
											<h1>A</h1>
										</div>
									</div>
								</span>
								<span class="cell package_dt_tr " data-label="Package Details">
									<h4>Package Details</h4>
									<ul>
										<li>Save extra 10% on live sessions</li>
										<li>Free extra 5 hours on daily lucky draw</li>
										<li>Schedule session time without deductions</li>
									</ul>
								</span>
								<span class="cell package_tm_tr" data-label="Package Hours">
									<h4>Package Hours</h4>
									<p>Total: <span>10 hours</span></p>
									<p>Remaining:<span> 2 hours</span></p>
								</span>
								<span class="cell package_tr_btns" >
									<a href="" class="btn btn-block renew">Renew</a>
									<a href="" class="btn btn-block change">Change</a>
								</span>

							</div>								

						</div>


						<p class="hvnt_package">Do not have a package yet? <a href="">check these out!</a></p>

					</div><!--mywallet_slide-->

				</div><!--tab-content-->





			</div>


		</div><!---dash_right_side-->

	</div><!--row-->
</div><!-- container-fluid display-table v-align margin_top_second pos-rel-->


<!--Dashbord-->




</div>














<!-- REFILL POPUP -->
<div id="refill-popup"  class="zoom-anim-dialog mfp-hide">
	<div class="register_inner forgot_pass_form refill_popup">

		<div class="display-flex">
			<div class="left_side">

				<div class="my_rel_pos">

					<div class="my_character">
						<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/refili_wallet_dp.png">
					</div>
					<h1 class="visible-xs"><small>Refill</small>Wallet</h1>
				</div><!--my_rel_pos-->
			</div>

			<!-- LEFT side -->
			<div class="right_side text-center">
				<div class="my_rel_pos">

					<div class="wallet_ring">
						<div class="wallet_balance">
							<img class="" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/popup_money_ico.png" alt="">

						</div>
					</div>

					<h4><span>Your wallet has insufficent balance</span>
						Please Refill it
					</h4>

					<a class="btn" name=""> Refill Wallet</a>
					<p><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> in a rush? 
						<a href="">Use quick Payment</a>
					</p>

				</div><!--my_rel_pos-->				
			</div><!-- logo_login -->


		</div>
		<!-- right_side -->


	</div><!--display flex- -->
</div><!--  REFILL POPUP -->






<?php get_footer(); ?>

<?php TP::js('dashboard'); ?>
<?php TP::js('mywallet'); ?>
<?php TP::js('testing_edgePreload'); ?>

<?php get_template_part('inc/document_end'); ?>