<?php
/*
Template Name: session_summary
*/
?>
<?php get_template_part('header-dashboard'); ?>



<?php TP::css('package_payment'); ?>
<?php TP::css('session_summary'); ?>





<div class="package_section text-center margin_top_second">
	<div class="container">
		<h2>Package Summary</h2>


		<div class="package_flex">

			<div class="package_details">
				<h3>Package Details</h3>

				<div class="package_table" >
					<table class="table table-striped">
						<tbody>								
							<tr><td>Tutors Name</td><td>Lorem Ipsum</td></tr>
							<tr><td>Type of Session</td><td>Live  Session</td></tr>
							<tr><td>Date & Time</td><td>MM/DD/YY, HH:MM AM/PM</td></tr>
							<tr><td>Duration</td><td>1 hour</td></tr>
							<tr><td>Subject (Discount)</td><td>Algebra</td></tr>
							<tr class="ques_tr"><td>Your Question</td><td>Lorem ipsum dolor sit amet, consectetur adipiscingelit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan </td></tr>	

						</tbody>
					</table>
				</div>
			</div><!---1 - -->

			<div class="payment_details">
				<h3>Payment Details</h3>
				<div class="package_table">
					<table class="table table-striped">
						<tbody>
							<tr> <td>Base Price</td> <td>AED 1200</td> </tr>
							<tr> <td>Tax (Add)</td> <td>AED 120</td> </tr>
							<!-- payment via wallet only-->
							<tr class="amt_payable via_wallet"> <td>Amount Paid via Wallet</td> <td>AED 1320</td> </tr>
							<!-- payment via wallet end-->
							<tr class="amt_payable"> <td>Amount Payable</td> <td>AED 1320</td> </tr>
						</tbody>
					</table>
					<a href="#" class="btn">Confirm Session Request</a>
				</div>
			</div><!---2- -->

		</div><!--flex container-->
		
	</div><!-- container -->
</div><!-- main section -->





<?php get_footer(); ?>

<?php// TP::js('package_payment'); ?>

<?php get_template_part('inc/document_end'); ?>