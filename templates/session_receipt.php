<?php
/*
Template Name: session_receipt
*/
?>
<?php get_template_part('header-dashboard'); ?>



<?php TP::css('package_payment'); ?>
<?php TP::css('faq'); ?>
<?php TP::css('receipt'); ?>




<div class="ty_header text-center margin_top_second ">
	
	<h1>Thank You</h1>
	<h4>For Improving Your Grades</h4>

	
</div>

<div class="package_section text-center">
	<div class="container">

		<div class="package_flex">

			<div class="package_details">
				<h3>Session Invoice</h3>

				<div class="package_table" >
					<table class="table table-striped">
						<tbody>								
							<tr><td>Session ID</td><td>09632541</td></tr>
							<tr><td>Booked Date</td><td>MM/DD/YY</td></tr>
							<tr><td>Transaction ID</td><td>03216544</td></tr>
							<tr><td>Payment Method</td><td>Credit Card</td></tr>
							<tr><td>Amount Paid</td><td>AED 200</td></tr>
							<tr><td>Tutors Name</td><td>Lorem Ipsum</td></tr>	

							<tr><td>Package Selected</td><td>Plan A</td></tr>
							<tr><td>Type of Session:</td><td>Live session</td></tr>
							<tr><td>Date & Time slot</td><td>MM/DD/YY, HH:MM AM/PM</td></tr>
							<tr><td>Hours Booked</td><td>1 hours</td></tr>
							<tr><td>Subject</td><td>Algebra</td></tr>	
						</tbody>
					</table>
				</div>


				<h6><a href="">Search for more tutors</a> OR Still have a course concerns you? <a href="">Look for another help</a></h6>
				<a href="" class="btn">Continue to Dashboard</a>
			</div><!---1 - -->





			<div class="payment_details">

				<div class="share_div">
					<a href="">
						<span><i class="fa fa-share-alt" aria-hidden="true"></i></span>
						<p>Share with Friends <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
						<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/share_ch.png">
					</a>
				</div>

				<div class="share_div refer_div">
					<a href="">
						<span><i class="fa fa-comments-o" aria-hidden="true"></i></span>
						<p>Refer to a Friend <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
						<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/refer_ch.png">
					</a>
				</div>

				<div class="share_div connect_div grad_bg ">
					<div class="social_icons ">
						<p>Connect with Us </p>

						<ul>
							<li class="icon_fb">
								<a href="www.facebook.com" target="_blank">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</li>
							<li class="icon_tw">
								<a href="www.twitter.com" target="_blank">
									<i class="fa fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
							<li class="icon_pin">
								<a href="www.pinterest.com" target="_blank">
									<i class="fa fa-pinterest-p" aria-hidden="true"></i>
								</a>
							</li>
							<li class="icon_in">
								<a href="www.linkedin.com" target="_blank">
									<i class="fa fa-linkedin" aria-hidden="true"></i>
								</a>
							</li>
							<li class="icon_gp">
								<a href="www.google.co.in" target="_blank">
									<i class="fa fa-google-plus" aria-hidden="true"></i>
								</a>
							</li>
						</ul>

					</div>
				</div>




				



			</div><!---2- -->

		</div><!--flex container-->
		
	</div><!-- container -->
</div><!-- main section -->


<div class="lemni_exp">
	<div class="lemni_exp_inner hidden-xs">
		<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/3lemni_exp_bg_web.jpg">			
	</div>
	<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/3lemni_exp_bg_full.png" class="lemni_exp_full_img visible-xs">

	<div class="container ">
		<ul class="students_ul hidden-xs">
			<li class="students_li_one"> <img class="pulse-effect" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/student_vector1.png"></li>
			<li class="students_li_two"> <img class="pulse-effect pulse1" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/student_vector2.png"></li>
			<li class="students_li_three"> <img class="pulse-effect pulse2" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/student_vector3.png"></li>

			<li class="students_li_main"> <img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/student_vector_main.png"></li>

			<li class="students_li_four"> <img class="pulse-effect pulse1" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/student_vector4.png"></li>
			<li class="students_li_five"> <img class="pulse-effect" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/student_vector5.png"></li>
		</ul>


		<h1>Did you enjoy 3LEMNI experience<span>?</span> </h1>
		<p>Help us and spread the word out there</p>
	</div>
	
</div>






<?php get_footer(); ?>

<?php //TP::js('package_payment'); ?>

<?php get_template_part('inc/document_end'); ?>