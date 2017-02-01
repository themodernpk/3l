<?php
/*
Template Name: Search
*/
?>  
<?php
global $wp_query;
$total_results = $wp_query->post_count;;
?>
<?php get_template_part('header-dashboard');?>

<?php TP::css('plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min'); ?>
<?php TP::css('common'); ?>
<?php TP::css('search'); ?>

<section class="get_tutor mrg_top">

	<div class="container">

		<div class="filter_tutor">

			<div class="row">

				<div class="nav_btn">

					<button class="filter_nav visible-xs">

						<span></span>

					</button>

				</div>



				<div class="col-md-4 col-sm-5 mrg_left">

					<div class="filters">

						<div class="a_ques hidden-xs">

							<h4 class="ask">

								<a href="#" data-toggle="modal" data-target="#myModal">Ask a Question with Multiple</a>

							</h4>

						</div>

						<div class="find_here">

							<h5>Filter By</h5>

							<div class="form-group">

								<div class="chk_it">

									<div class="chkbox">

										<input type="checkbox" name="" id="f">

										<label class="checkbox" for="f">Highest Ratings</label>

									</div>

									<div class="chkbox">

										<input type="checkbox" name="" id="g">

										<label class="checkbox" for="g">Online</label>

									</div>

								</div>

							</div>

							<h5>Additional Subjects</h5>

							<div class="form-group">

								<input type="text" name="" class="form-control" placeholder="Choose Subjects">

							</div>

							<h5>Gender Prefrences</h5>

							<div class="form-group">

								<div class="chk_it">

									<div class="chkbox">

										<input type="checkbox" name="" id="h">

										<label class="checkbox" for="h">No Prefrence</label>

									</div>

									<div class="chkbox">

										<input type="checkbox" name="" id="i">

										<label class="checkbox" for="i">Male</label>

									</div>

									<div class="chkbox">

										<input type="checkbox" name="" id="j">

										<label class="checkbox" for="j">Female</label>

									</div>

								</div>

							</div>

							<h5>Keyword</h5>

							<div class="form-group">

								<input type="text" name="" class="form-control" placeholder="eg. Texas, Lorem ipsum">

							</div>

							<h6>Popular Subjects:</h6>

							<div class="subjects">

								<a href="#">Math</a>

								<a href="#">English</a>

								<a href="#">Science</a>

								<a href="#">Spanish</a>

								<a href="#">History</a>

								<a href="#">French</a>

								<a href="#">ESL</a>

								<a href="#">Physics</a>

								<a href="#">Algebra</a>

								<a href="#">Chemistry</a>

								<a href="#">Test Preparation</a>

							</div>

						</div>

						<h4 class="why"><a href="#">Why <b>3lemni?</b></a></h4>

					</div>

				</div>

				<div class="col-md-8 col-sm-7">

					<div class="results">

						<div class="a_ques visible-xs">

							<h4 class="ask">

								<a href="#" data-toggle="modal" data-target="#myModal">Ask a Question with Multiple</a>

							</h4>

						</div>

						<h4>Maths Tutors</h4>

						<p><b>3000</b> maths tutors found.</p>

						<div class="row">

							<div class="col-sm-6 col-xs-6">

								<div class="tutors verified box">

									<div class="eql_height">

										<a href="#" class="tutor_pro">

											<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/tutor1.jpg">

											<span class="online"></span>

										</a>

										<h5>Mathew James</h5>

										<p>Mathematics And Physical Sciences<br>University Of Stellenbosch</p>

										<span>A class above. Guaranteed</span>

									</div>

									<div class="ask_book_cont">

										<div class="ask_book">

											<a href="#" class="btn ask_q" data-toggle="modal" data-target="#myModal">Ask a Question</a>

											<a href="http://staging.webreinvent.com/demo/projects/3lemni/dev/book-session/" class="btn book">Book a Session</a>

										</div>

										<div class="radial-progress poor" data-score="4">

											<div class="circle">

												<div class="mask full">

													<div class="fill"></div>

												</div>

												<div class="mask half">

													<div class="fill"></div>

													<div class="fill fix"></div>

												</div>

											</div>

											<div class="inset"><span class='big'>4.0</span><!--  <span class='little'>/ 5</span> --></div>

										</div>

										<div class="contact_tutor">

											<a href="#">Contact Mathew</a>

										</div>

									</div>

									<span class="bdrs brd-top"></span>

									<span class="bdrs brd-bottom"></span>

								</div>

							</div>

							<div class="col-sm-6 col-xs-6">

								<div class="tutors box">

									<div class="eql_height">

										<a href="#" class="tutor_pro">

											<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/tutor2.jpg">

											<span class="offline"></span>

										</a>

										<h5>Samantha Gilbert</h5>

										<p>Mathematics And Physical Sciences<br>University Of Stellenbosch</p>

										<span></span>

									</div>

									<div class="ask_book_cont">

										<div class="ask_book">

											<a href="#" class="btn ask_q" data-toggle="modal" data-target="#myModal">Ask a Question</a>

											<a href="http://staging.webreinvent.com/demo/projects/3lemni/dev/book-session/" class="btn book">Book a Session</a>

										</div>

										<div class="radial-progress best" data-score="7">

											<div class="circle">

												<div class="mask full">

													<div class="fill"></div>

												</div>

												<div class="mask half">

													<div class="fill"></div>

													<div class="fill fix"></div>

												</div>

											</div>

											<div class="inset"> <span class='big'>7.0</span></div>

										</div>

										<div class="contact_tutor">

											<a href="#">Contact Mathew</a>

										</div>

									</div>

									<span class="bdrs brd-top"></span>

									<span class="bdrs brd-bottom"></span>

								</div>

							</div>

						</div>

						<div class="row">

							<div class="col-sm-6 col-xs-6">

								<div class="tutors box">

									<div class="eql_height">

										<a href="#" class="tutor_pro">

											<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/tutor3.jpg">

											<span class="away"></span>

										</a>

										<h5>Mathew James</h5>

										<p>Mathematics And Physical Sciences<br>University Of Stellenbosch</p>

										<span>A class above. Guaranteed</span>

									</div>

									<div class="ask_book_cont">

										<div class="ask_book">

											<a href="#" class="btn ask_q" data-toggle="modal" data-target="#myModal">Ask a Question</a>

											<a href="http://staging.webreinvent.com/demo/projects/3lemni/dev/book-session/" class="btn book">Book a Session</a>

										</div>

										

										<div class="radial-progress best" data-score="10">

											<div class="circle">

												<div class="mask full">

													<div class="fill"></div>

												</div>

												<div class="mask half">

													<div class="fill"></div>

													<div class="fill fix"></div>

												</div>

											</div>

											<div class="inset"><span class='big'>10</span><!--  <span class='little'>/ 5</span> --></div>

										</div>

										<div class="contact_tutor">

											<a href="#">Contact Mathew</a>

										</div>

									</div>

									<span class="bdrs brd-top"></span>

									<span class="bdrs brd-bottom"></span>

								</div>

							</div>

							<div class="col-sm-6 col-xs-6">

								<div class="tutors verified box">

									<div class="eql_height">

										<a href="#" class="tutor_pro">

											<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/tutor4.jpg">

											<span class="online"></span>

										</a>

										<h5>Mathew James</h5>

										<p>Mathematics And Physical Sciences<br>University Of Stellenbosch</p>

										<span>A class above. Guaranteed</span>

									</div>

									<div class="ask_book_cont">

										<div class="ask_book">

											<a href="#" class="btn ask_q" data-toggle="modal" data-target="#myModal">Ask a Question</a>

											<a href="http://staging.webreinvent.com/demo/projects/3lemni/dev/book-session/" class="btn book">Book a Session</a>

										</div>



										<div class="radial-progress avg" data-score="5">

											<div class="circle">

												<div class="mask full">

													<div class="fill"></div>

												</div>

												<div class="mask half">

													<div class="fill"></div>

													<div class="fill fix"></div>

												</div>

											</div>

											<div class="inset"><span class='big'>5.0</span> <!-- <span class='little'>/ 5</span> --></div>

										</div>



										<div class="contact_tutor">

											<a href="#">Contact Mathew</a>

										</div>

									</div>

									<span class="bdrs brd-top"></span>

									<span class="bdrs brd-bottom"></span>

								</div>

							</div>

							<div class="col-xs-12">

								<div class="loas_mr">

									<a href="#" class="btn l_more">Load More</a>

								</div>

							</div>

						</div>

						

					</div>

				</div>

			</div>

		</div>

	</div>

</section>





<!-- Modal -->

<div class="modal fade" id="myModal" role="dialog">

	<div class="modal-dialog">



		<!-- Modal content-->

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<h4 class="modal-title">Please describe your problem</h4>

				<div class="modal_logo">

					<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/abt_logo.png">

				</div>

			</div>

			<div class="modal-body content">

				<form data-parsley-validate="" method="POST" action="" id="">

					<div class="row">

						<div class="form-group select_here">

							<label><p>Required By:</p></label>

							<div class="input_grp"> <div>

								<input id="live" type="radio" name="session_type" value="live" required="">

								<label for="live" class="radio-inline">Live Session</label>

							</div>

							<div>

								<input id="written" type="radio" name="session_type" value="written" required="">

								<label for="written" class="radio-inline">Written Session</label>

							</div>

						</div>

					</div>

					<div class="col-sm-6 col-xs-6">

						<div class="select_group">

							<div class="form-group">

								<input class="form-control" type="text" name="subject" placeholder="Physics">

							</div>

							<div class="form-group">

								<select class="selectpicker"  title="" required="" name="hours_needed">

									<option data-hidden="true" value="">Select Hours Needed</option>

									<option value="1">01</option>

									<option value="2">02</option>

									<option value="3">03</option>

								</select>	

							</div>

							<div class="form-group">

								<input type="text"  placeholder="Select Date" class="form-control datetimepicker1 " id="Date" name="date" required="" value="">

								<span class="form-gp-icon"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>

							</div>

						</div>

					</div>

					<div class="col-sm-6 col-xs-6">

						<div class="form-group">

							<textarea class="form-control" id="comment" placeholder="Describe your problem" required="" name="question"></textarea>

						</div>

					</div>

					<div class="image_group col-sm-12">

						<div class="col-md-6 pull-right">

							<div class="upload_new">

								<div class="add_img col-sm-8">

									<p>If your question is complex you can upload image (optional )</p>

									<div class="n_img"></div>

								</div>

								<div class="upload col-sm-4">



									<input type="file" name="files[]" id="filer_input" multiple="multiple">

									<!-- <label for="newtutor">Upload</label> -->

								</div>



							</div>

						</div>

						<div class="col-md-6">

							<div class="tutors_imgs">

								<div class="t_img">

									<a href="#">

										<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/teach.jpg">

										<span>&times;</span>

									</a>

								</div>

							<!-- 	<div class="t_img">

									<a href="#">

										<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/teach1.jpg">

										<span>&times;</span>

									</a>

								</div>

								<div class="t_img">

									<a href="#">

										<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/teach2.jpg">

										<span>&times;</span>

									</a>

								</div>

								<div class="t_img">

									<a href="#">

										<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/teach3.jpg">

										<span>&times;</span>

									</a>

								</div> -->

							</div>

						</div>



					</div>

				</div>

				<div class="submit_hr text-center">

					<p>Tutors who can help will message you shortly to discuss setting up a lesson.</p>

					<button type="submit" class="btn sub btn-default" name="ask_question">submit</button>

				</div>

			</form>

		</div>

	</div>

</div>



</div>




<?php get_footer(); ?>



<?php TP::js('plugins/bootstrap-datetimepicker/js/moment'); ?>

<?php TP::js('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min'); ?>

<?php TP::js('plugins/jQuery.filer/jquery.filer'); ?>

<?php TP::js('search'); ?>
