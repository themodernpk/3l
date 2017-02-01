<?php
/*
Template Name: Teacher Dashboard
*/
?>
<?php 
	$user = wp_get_current_user();
	if(is_user_logged_in() && $user->roles[0] == "teacher") {
 ?>
<?php
$user_meta = get_user_meta($user->ID);
$arr_status = $user_meta['booking_status'];

$confirm_session_of   		= $user_meta['confirm_session_by_student'];
$confirm_student_image 		= $user_meta['confirm_session_student_image'];
$book_subject   			= $user_meta['confirm_session_for_subject'];
$book_hours   				= $user_meta['confirm_session_hours'];
$book_select_date 			= $user_meta['confirm_session_for_date'];
$book_problem 				= $user_meta['confirm_book_problem'];
$book_class_id				= $user_meta['confirm_class_id'];
$book_session   			= $user_meta['confirm_for_session'];
$booking_status				= $user_meta['booking_status'];
$book_by_user_id			= $user_meta['book_by_user_id'];
$confirm_student_id			= $user_meta['confirm_student_id'];
$confirm_class_start_time   = $user_meta['confirm_class_start_time'];
$teacher_image 				= $user_meta['profile_image'][0];
$cancelledby 				= $user_meta['cancelledby'];
$reason 					= $user_meta['reason'];

$reschedule_by   				= $user_meta['reschedule_by'];
$reschedule_by_id 				= $user_meta['reschedule_by_id'];
$reschedule_by_image 			= $user_meta['reschedule_by_image'];	
$reschedule_subject   			= $user_meta['reschedule_subject'];
$book_hours   					= $user_meta['confirm_session_hours'];
$reschedule_new_start_date 		= $user_meta['reschedule_new_start_date'];
$reschedule_class_id			= $user_meta['reschedule_class_id'];
$reschedule_session_type   		= $user_meta['reschedule_session_type'];
$booking_status					= $user_meta['booking_status'];
$reschedule_new_start_time		= $user_meta['reschedule_new_start_time'];

 ?>
<?php get_template_part( "header-dashboard" );?>
<?php TP::css('dashboard'); ?>
<?php TP::css('teacher-dashboard'); ?>

<?php TP::css('plugins/range-and-circulr-slider/bootstrap-slider.min'); ?>
<?php TP::css('plugins/bootstrap-datepicker/css/datepicker'); ?>
<?php TP::css('plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min'); ?>

<?php TP::css('plugins/easy-responsive-tabs/easy-responsive-tabs'); ?>

<?php TP::css('plugins/hover-master/hover'); ?>

<div class="container-fluid display-table v-align margin_top_second pos-rel" style="">
	<div class="row display-table-row">
		<button class="vk_toggle vk_toggle--htla visible-xs">
			<span>toggle menu</span>
		</button>
		<div class=" display-table-cell v-align dash_left_side" id="navigation_left">
			
			<div class="side_bar">

				<h6>MENU</h6>
				<ul>
					<li class="db_dashboard active"><a href="<?php echo site_url(); ?>/teacher-dashboard/">
						<i></i> <span class="hidden-sm hidden-xs"> Dashboard</span>
					</a></li>	

					<li class="db_profile"><a href="<?php echo site_url(); ?>/teacher-edit-profile/">
						<i></i> <span class="hidden-sm hidden-xs"> Profile</span>
					</a></li>

					<li class="db_notification"><a href="<?php echo site_url(); ?>/teacher-notification/">
						<i></i> <span class="hidden-sm hidden-xs">  Notification</span>
					</a></li>

					<li class="db_paymenthistory"><a href="<?php echo site_url(); ?>/teacher-payment-history/">
						<i></i> <span class="hidden-sm hidden-xs">Payment History</span>
					</a></li>

					<?php $redirect = site_url() . '/logout' ; ?>
					<li class="db_logout"><a href="<?php echo wp_logout_url($redirect); ?>">
						<i></i> <span class="hidden-sm hidden-xs">  Logout</span>
					</a></li>
				</ul>
			</div>
		</div>
		<div class="display-table-cell v-align dash_right_side">

			<div class="dash_right_side_inner">
				
				<div class="myheading">
					<h3>Sessions</h3>
				</div>

				<div class="mycontent"  id="vk_tabs"> 
					<ul class="nav nav-tabs  resp-tabs-list hor_1">
						<li class="resp-tab-"><div>Scheduled Sessions  <span class="badge" id="schedule_session_count"> <?php 	
									//$vals = array_count_values($arr_status);
									$mycount = 0; 
									if(!empty($arr_status)){
									foreach ($arr_status as $key => $value){ 
											if ($value == "accepted".$book_class_id[$key])
												{ 
													$mycount++; 	
												} 
										}
									}
											echo $mycount;
 							?></span></div></li>
						<li><div>Delivered Sessions  <span class="badge" id="consumed_session_count"> <?php 	
									//$vals = array_count_values($arr_status);
									$mycount = 0; 
									if(!empty($arr_status)){
									foreach ($arr_status as $key => $value){ 
											if ($value == "consumed".$book_class_id[$key])
												{ 
													$mycount++; 	
												} 
										}
									}
											echo $mycount;
 							?></span></div></li>
						<li><div>Cancelled Sessions <span class="badge" id="cancelled_session_count"> <?php 	
									//$vals = array_count_values($arr_status);
									$mycount = 0; 
									if(!empty($arr_status)){
									foreach ($arr_status as $key => $value){ 
											if ($value == "cancelled".$book_class_id[$key])
												{ 
													$mycount++; 	
												} 
										}
									}
											echo $mycount;
 							?></span></div></li>
					</ul>


					<div class=" resp-tabs-container esp-tabs-container hor_1">
						<div class="fade in">
							<div class="sessions">
							<p id="msg"></p>
								<ul class="sessions_ul">
								<?php						
							if(!empty($book_class_id)){
								krsort($book_class_id);
						foreach ($book_class_id as $key => $date ) { 
							if(in_array('accepted'.$book_class_id[$key]
											, $arr_status,true)){
						 ?>
									<li>
										<div class="person_detail">
											<div class="media">
												<a class="media-left" href="#">
													<img class="media-object" src="<?php 
													if(!empty($confirm_student_image[$key])){
													echo $confirm_student_image[$key];}else{
												echo 'http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png';} ?>" alt="Generic placeholder image">

												</a>
												<div class="media-body">
													<h4 class="media-heading ys_heading"><?php echo $confirm_session_of[$key]; ?></h4>
													<ul>
														<li><b>Date &amp; Time :</b><br><?php echo $book_select_date[$key]; ?>, <?php echo $confirm_class_start_time[$key]; ?></li>
														<li><b>Session ID :</b> <?php echo $book_class_id[$key]; ?></li>
													</ul>
													<a href="javascript:void(0)" class="chat_link" onclick="javascript:jqcc.cometchat.chatWith('<?php echo $confirm_student_id[$key]; ?>');">Chat Now</a>
												</div>
											</div>
										</div>
										<!--person_detail-->

										<div class="question_detail">
											<h4><i class="fa fa-circle-o" aria-hidden="true"></i> Question Details</h4>
											<p><?php echo urldecode($book_problem[$key]);  ?></p>
										</div>
										<!--question_detail  -->

										<div class="session_detail">
											<h4><i class="fa fa-circle-o" aria-hidden="true"></i> Session Details</h4>
											<ul>
												<li>Subject: <?php echo $book_subject[$key]; ?></li>
												<li>Duration: <?php echo $book_hours[$key];?>h</li>
												<li>Session type: <?php echo $book_session[$key]; ?></li>
											</ul>

										</div>
										<!--session_detail  -->
										<?php TP::css('plugins/hover-master/hover'); ?>
										<div class="action_detail">
											<ul>
												<li><a href="#" class="book_again hvr-icon-forward start_sessions" clas_id="<?php echo $book_class_id[$key]; ?>" user_id="<?php echo $user->ID; ?>"  isTeacher="1" lessonname="<?php echo $book_subject[$key]; ?>" coursename="<?php echo $book_subject[$key]; ?>" username="<?php echo $user->display_name; ?>" >
												<form action="" id="start_session_form" method="post">

												<input type="hidden" name="class_id" id="start_classid" value="<?php echo $book_class_id[$key]; ?>">

												<input type="hidden" name="user_id" id="start_userId" value="<?php echo $user->ID; ?>">

												<input type="hidden" name="userName" id="start_username" value="<?php echo $user->display_name; ?>">

												<input type="hidden" name="isTeacher" id="check_teacher" value="1">

												<input type="hidden" name="lessonName" id="start_lessonName" value="<?php echo $book_subject[$key]; ?>">

												<input type="hidden" name="courseName" id="start_coursename" value="<?php echo $book_subject[$key]; ?>">

												<input type="submit" name="submit" id="start_submit" value="Start Session">

												</form>


												</a></li>
												<li><a href="#reschedule-session-popup" class="rate_reschedule popup-with-zoom-anim hvr-icon-spin reschedule_session" data-student_id="<?php echo $confirm_student_id[$key]	; ?>" data-teacher_id="<?php echo $user->ID; ?>" data-class_id="<?php echo $book_class_id[$key]; ?>" data-start_date="<?php echo $book_select_date[$key]; ?> " data-start_time="<?php echo $confirm_class_start_time[$key]; ?>" data-subject="<?php echo $book_subject[$key]; ?>" data-session_type="<?php echo $book_session[$key]; ?>" data-teacher_image="<?php echo $teacher_image; ?>" data-teacher_name="<?php echo $user->display_name; ?>"> Reschedule</a></li>
												<li><a href="#cancel-session-popup" class="session_cancel popup-with-zoom-anim hvr-icon-sink-away" tid="<?php echo $user->ID; ?>" sid="<?php echo $confirm_student_id[$key]; ?>" value="<?php echo $book_class_id[$key]; ?>"> Cancel</a></li>
											</ul>
										</div>
										
									</li> 
									<?php  } } } ?>

<?php
/////////////////////// Reschedule session  ///////////////////////////												
							if(!empty($reschedule_class_id)){
								krsort($reschedule_class_id);
								
						foreach ($reschedule_class_id as $key => $date ) {
						if(in_array('rescheduled'.$reschedule_class_id[$key]
											, $arr_status,true)){ 						
						 ?>
									<li>
										<div class="person_detail">
											<div class="media">
												<a class="media-left" href="#">
													<img class="media-object" src="<?php echo $reschedule_by_image[$key]; ?>" alt="Generic placeholder image">

												</a>
												<div class="media-body">
													<h4 class="media-heading ys_heading"><?php echo $reschedule_by[$key]; ?></h4>
													<ul>
														<li><b>Date &amp; Time :</b><br><?php echo $reschedule_new_start_date[$key]; ?>, <?php echo $reschedule_new_start_time[$key]; ?></li>
														<li><b>Session ID :</b> <?php echo $reschedule_class_id[$key]; ?></li>
													</ul>
													<a href="javascript:void(0)" class="chat_link" onclick="javascript:jqcc.cometchat.chatWith('<?php echo $confirm_student_id[$key]; ?>');">Chat Now</a>
												</div>
											</div>
										</div>
										<!--person_detail-->

										<div class="question_detail">
											<h4><i class="fa fa-circle-o" aria-hidden="true"></i> Question Details</h4>
											<p><?php //echo urldecode($book_problem[$key]);  ?></p>
										</div>
										<!--question_detail  -->

										<div class="session_detail">
											<h4><i class="fa fa-circle-o" aria-hidden="true"></i> Session Details</h4>
											<ul>
												<li>Subject: <?php echo $reschedule_subject[$key]; ?></li>
												<li>Duration: <?php echo $book_hours[$key];?>h</li>
												<li>Session type: <?php echo $reschedule_session_type[$key]; ?></li>
											</ul>

										</div>
										<!--session_detail  -->
										<?php TP::css('plugins/hover-master/hover'); ?>
										<div class="action_detail">
											<ul>
												<li><a href="#" class="book_again hvr-icon-forward start_sessions" clas_id="<?php echo $reschedule_class_id[$key]; ?>" user_id="<?php echo $user->ID; ?>"  isTeacher="0" lessonname="<?php echo $reschedule_subject[$key]; ?>" coursename="<?php echo $reschedule_subject[$key]; ?>" username="<?php echo $user->display_name; ?>" >
												<form action="" id="start_session_form" method="post">

												<input type="hidden" name="class_id" id="start_classid" value="<?php echo $reschedule_class_id[$key]; ?>">

												<input type="hidden" name="user_id" id="start_userId" value="<?php echo $user->ID; ?>">

												<input type="hidden" name="userName" id="start_username" value="<?php echo $user->display_name; ?>">

												<input type="hidden" name="isTeacher" id="check_teacher" value="0">

												<input type="hidden" name="lessonName" id="start_lessonName" value="<?php echo $reschedule_subject[$key]; ?>">

												<input type="hidden" name="courseName" id="start_coursename" value="<?php echo $reschedule_subject[$key]; ?>">

												<input type="submit" name="submit" id="start_submit" value="Start Session">

												</form>


												</a></li>
												<li><a href="#reschedule-session-popup" class="rate_reschedule popup-with-zoom-anim hvr-icon-spin reschedule_session" data-student_id="<?php echo $user->ID; ?>" data-teacher_id="<?php echo $confirm_teacher_id[$key]; ?>" data-class_id="<?php echo $book_class_id[$key]; ?>" data-start_date="<?php echo $book_select_date[$key]; ?> " data-start_time="<?php echo $confirm_class_start_time[$key]; ?>" data-subject="<?php echo $book_subject[$key]; ?>" data-session_type="<?php echo $book_session[$key]; ?>" data-student_image="<?php echo $student_image; ?>" data-student_name="<?php echo $user->display_name; ?>"> Reschedule</a></li>
												<li><a href="#cancel-session-popup" class="session_cancel popup-with-zoom-anim hvr-icon-sink-away" tid="<?php echo $confirm_teacher_id[$key]; ?>" sid="<?php echo $user->ID; ?>" value="<?php echo $book_class_id[$key]; ?>"> Cancel</a></li>
											</ul>
										</div>
										<!--action_detail  -->
									</li>	

<?php } } } ?>

									
									</ul>
									<div class="clearfix"></div>
								</div>

							</div>
							<!--##- Scheduled Sessions  TAB 1 END- ##-->

							<div class="fade in">
								<div class="sessions">
								<p id="msg1"></p>
									<ul class="sessions_ul consumed_sessions_ul">
									<?php						
							if(!empty($book_class_id)){
								krsort($book_class_id);
						foreach ($book_class_id as $key => $date ) { 
							if(in_array('consumed'.$book_class_id[$key]
											, $arr_status,true)){
						 ?>
										<li>
											<div class="person_detail">
												<div class="media">
													<a class="media-left" href="#">
														<img class="media-object" src="<?php 
													if(!empty($confirm_student_image[$key])){
													echo $confirm_student_image[$key];}else{
												echo 'http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png';} ?>" alt="Generic placeholder image">

													</a>
													<div class="media-body">
														<h4 class="media-heading"><?php echo $confirm_session_of[$key]; ?></h4>
														<ul>
															<li><b>Date &amp; Time :</b><br><?php echo $book_select_date[$key]; ?>, <?php echo $confirm_class_start_time[$key]; ?></li>
														<li><b>Session ID :</b> <?php echo $book_class_id[$key]; ?></li>
														</ul>
													</div>
												</div>
											</div>
											<!--person_detail-->


											<div class="session_detail">
												<h4><i class="fa fa-circle-o" aria-hidden="true"></i> Session Details</h4>
												<ul>
													<li>Subject: <?php echo $book_subject[$key]; ?></li>
												<li>Duration: <?php echo $book_hours[$key];?>h</li>
												<li>Session type: <?php echo $book_session[$key]; ?></li>
												</ul>
											</div>
											<!--session_detail  -->

											<div class="action_detail">
												<ul>
													<li><a href="javascript:void(0)" class="chat_now_a" onclick="javascript:jqcc.cometchat.chatWith('<?php echo $confirm_student_id[$key]; ?>');"> Chat Now</a></li>
													<li><a href="" class="rate_review hvr-icon-spin" > View History</a></li>
												</ul>
											</div>
											<!--action_detail  -->
										</li> <!-- li 1st end -->


									<?php } } } ?>

									</ul>
								</div>
							</div>
							<!--##- Consumed Sessions  TAB 1 END- ##-->

							<div class="fade in">
								<div class="sessions">
								<p id="msg2"></p>
									<ul class="sessions_ul cancelled_sessions_ul">

										<?php	
										if(!empty($book_class_id)){			
								krsort($book_class_id);
									foreach ($book_class_id as $key => $date ) { 
											
									if(in_array('cancelled'.$book_class_id[$key]
											, $arr_status,true)){
						 			?>
										<li>
											<div class="person_detail">
												<div class="media">
													<a class="media-left" href="#">
														<img class="media-object" src="<?php echo $confirm_student_image[$key]; ?>" alt="Generic placeholder image">

													</a>
													<div class="media-body">
														<h4 class="media-heading ys_heading"><?php echo $confirm_session_of[$key]; ?></h4>
														<ul>
														<li><b>Date &amp; Time :</b><br><?php echo $book_select_date[$key]; ?>, <?php echo $confirm_class_start_time[$key]; ?></li>
														<li><b>Session ID :</b> <?php echo $book_class_id[$key]; ?></li>
													</ul>
													</div>
												</div>
											</div>
											<!--person_detail-->


											<div class="session_detail">
												<h4><i class="fa fa-circle-o" aria-hidden="true"></i> Session Details</h4>
												<ul>
												<li>Subject: <?php echo $book_subject[$key]; ?></li>
												<li>Duration: <?php echo $book_hours[$key];?>h</li>
												<li>Session type: <?php echo $book_session[$key]; ?></li>
											</ul>
											</div>
											<!--session_detail  -->

											<div class="question_detail cancelby_detail">
												<div class="cancelby_ico cancelby_student"></div>
												<p>Cancelled By <?php echo $cancelledby[$key]; ?></p>
											</div>

											<div class="question_detail reason_detail">
												<h4><i class="fa fa-circle-o" aria-hidden="true"></i> Reason for Cancellation</h4>
												<p><?php echo $reason[$key]; ?></p>
											</div>

											<div class="question_detail refund_detail action_detail">
												<ul>
													<li><a href="javascript:void(0)" class="chat_now_a" onclick="javascript:jqcc.cometchat.chatWith('<?php echo $confirm_student_id[$key]; ?>');"> Chat Now</a></li>
												</ul>
											</div>

										</li> <!-- li 1st end -->
										<?php } }}  ?>
										
									</ul>
								</div>

							</div>
							<!--##- Cancelled Sessions  TAB 1 END- ##-->

						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<!-- rate-review-popup -->
	<!-- rate-review-popup -->

	<div id="rate-review-popup"  class="zoom-anim-dialog mfp-hide rating_form">
		<div class="upper_heading">
			<h3>ratings and reviews.</h3>
		</div>

		<div class="lower_rating">
			<div class="lower_rating_img">
				<img class="" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/dashboard_dp.png" alt="">
			</div>
			<h4>Samanth Gomes</h4>
			<p>Please provide your ratings and reviews.</p>

			<form  data-parsley-validate="" method="POST" action="#" novalidate="">

				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="rating_ch">
							<div class="rating_mood sad_ch">
							</div>


							<div class="third circle averagevalue"> <span id="Averagevalue" class="">0</span> </div>
						</div>
					</div>

					<div class="col-md-9 col-sm-8">
						<div class="form-group">
							<label for="email">Explaining Methods</label>
							<input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="0" data-slider-tooltip="hide" required=""/>
							<span id="ex1SliderVal1" class="ratingbadge">0</span>
						</div>

						<div class="form-group">
							<label for="email">Communication</label>
							<input id="ex2" data-slider-id='ex2Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="0" data-slider-tooltip="hide" required=""/>
							<span id="ex1SliderVal2" class="ratingbadge">0</span>
						</div>

						<div class="form-group">
							<label for="email">Recommendabale</label>
							<input id="ex3" data-slider-id='ex3Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="0" data-slider-tooltip="hide" required=""/>
							<span id="ex1SliderVal3" class="ratingbadge">0</span>
						</div>


						<div id="Averagevalue"></div>

					</div>
				</div>

				<!-- rate_review_ch -->
				<div class="form-group commnet_rate_form">
					<textarea class="form-control " rows="5" id="comment" placeholder="Write your comments" required=""></textarea>
				</div>

				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
	<!-- rate-review-popup END-->
	<!-- rate-review-popup END-->

	<!-- Cancel Session -->
	<div id="cancel-session-popup"  class="zoom-anim-dialog mfp-hide">
		<div class="register_inner forgot_pass_form cancel_session_popup">

			<div class="display-flex">
				<div class="left_side">
					<div class="my_rel_pos">
						<div class="my_character">
							<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/cancel_session_character.png">
						</div>
						<h1 class="visible-xs"><small>Cancel your</small>Session</h1>
					</div><!--my_rel_pos -->
				</div>
				<!-- LEFT side -->
				<div class="right_side">
					<div class="my_rel_pos">
						<div class="logo_login">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="119px" height="119px">
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
					<h4>Cancel Session
						<span>You won't be entitled to any refund if you cancel the session.</span>
					</h4>

					<form  id="cancel_session_form" data-parsley-validate="" method="POST" action="#">

						<div class="form-group">
							<div class="pos-rel">
								<select class="selectpicker" id="select_reason"  title="" required="">
									<option  value=" ">Select a Reason</option>
									<option value="Reason1">Reason One</option>
									<option value="Reason2">Reason Two</option>
									<option value="Reason3">Reason Three</option>
								</select>
							</div>
						</div>
						<div class="form-group ">
						<input type="hidden" id="teachername" name="teachername" value="teacher">
						<input type="hidden" id="class_id" name="cid" value="">
						<input type="hidden" id="teacher_id" name="teacher_id" value="">
						<input type="hidden" id="student_id" name="student_id" value="">

							<textarea class="form-control" rows="5" id="" placeholder="Write your reason" required="" id="other_reason" ></textarea>
						</div>

						<button type="submit" class="btn btn-default btn-block decline_session" name="decline_session" >Confirm</button>

					</form>

				</div><!--my_rel_pos -->
			</div>
			<!-- right_side -->


		</div><!--display flex- -->


	</div><!--  Cancel Session -->
</div>

<!-- Reschedule Session -->
<div id="reschedule-session-popup"  class="zoom-anim-dialog mfp-hide">
	<div class="register_inner forgot_pass_form cancel_session_popup reschedule_session_popup">

		<div class="display-flex">
			<div class="left_side">

				<div class="my_character">
					<img class="" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/reschedulle-session-ch.png" alt="">
				</div>
				<h1 class="visible-xs"><small>Reschedule</small>Session</h1>
			</div>
			<!-- LEFT side -->
			<div class="right_side">
				<div class="logo_login">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="120px" height="120px">
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
			<h4>Reschedule Session
				<span>Select a new Date and Time for the Session</span>
			</h4>

			<form  id="reschedule_form" data-parsley-validate="" method="POST" action="#">

				<div class="form-group">
					<input type="text"  placeholder="Select Date" class="form-control datepicker" id="new_date" name="" required="" value="" data-date-start-date="0d">
					<span class="form-gp-icon"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
				</div>
				<div class="form-group">
				<input type="hidden" id="student_id" name="student_id" value="">
				<input type="hidden" id="teacher_id" name="reschedule_by_id" value="">
				<input type="hidden" id="select_date" name="select_date" value="">
				<input type="hidden" id="select_time" name="select_time" value="">
				<input type="hidden" id="class_id" name="class_id" value="">
				<input type="hidden" id="select_subject" name="select_subject" value="">
				<input type="hidden" id="select_session" name="select_session" value="">
				<input type="hidden" id="select_teacher_name" name="select_teacher_name"  value="">
				<input type="hidden" id="select_teacher_image" name="select_teacher_image"  value="">
</div>
				<div class="form-group date">
					<input type="text"  id='datetimepicker3' placeholder="Select Time" class="form-control " id="new_time" name="" required="" value="">
					<span class="form-gp-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
				</div>

				<div class="pos-rel">
					<div class="form-group form_grp_width">
						<input id="iapprove" name="iapprove" value="" required="" data-parsley-multiple="iapprove" data-parsley-id="5116" type="checkbox">
						<label for="iapprove" class="checkbox">Rescheduling will be approved once student agrees to it </label>
					</div>
				</div>

				<button type="submit" class="btn btn-default btn-block" name="">Reschedule</button>

			</form>

		</div><!-- logo_login -->

	</div>
	<!-- right_side -->

</div><!--display flex- -->

</div><!--  Reschedule Session -->
</div>

<?php get_footer(); ?>

<?php TP::js('plugins/easy-responsive-tabs/easyResponsiveTabs'); ?>

<?php TP::js('plugins/range-and-circulr-slider/circle-progress'); ?>

<?php TP::js('plugins/range-and-circulr-slider/bootstrap-slider.min'); ?>

<?php TP::js('plugins/bootstrap-datepicker/js/bootstrap-datepicker'); ?>


<?php TP::js('plugins/bootstrap-datetimepicker/js/moment'); ?>
<?php TP::js('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min'); ?>

<?php TP::js('dashboard'); ?>
<?php TP::js('dashboard-home'); ?>
<?php TP::js('teacher_dashboard'); ?>
<?php TP::js('testing_edgePreload'); ?>
<script>
$(document).ready(function(){
$('.reschedule_session').click(function(){
		var student_id 		= $(this).data('student_id');
		var teacher_id 		= $(this).data('teacher_id');
		var class_id 		= $(this).data('class_id');
		var start_date 		= $(this).data('start_date');
		var start_time 		= $(this).data('start_time');
		var subject 		= $(this).data('subject');
		var session 		= $(this).data('session_type');
		var teacher_name 	= $(this).data('teacher_name');
		var teacher_image 	= $(this).data('teacher_image');

		$('#student_id').val(student_id);
		$('#teacher_id').val(teacher_id);
		$("#select_date").val(start_date);
		$("#select_time").val(start_time);
		$("#class_id").val(class_id);
		$("#select_subject").val(subject);
		$("#select_session").val(session);
		$("#select_teacher_name").val(teacher_name);
		$("#select_teacher_image").val(teacher_image);
});
});
</script>
<script>
$(document).ready(function(){
	$(".right_side").on("submit", "#reschedule_form", function (e) {
	e.preventDefault();
	var data = $(this).serialize();
	var new_time = $('input#datetimepicker3').val();
	var new_date = $('input#new_date').val();	
	  $.ajax({
        url : ajax_url,
        method  : 'post',
        data   : {action: 'reschedule_session',content: data, get_time: new_time, get_date: new_date },

       success: function (response) {
       alert(response);      
    }
  });   

	});
	});

</script>
<script>
$(document).ready(function(){
	var id= $('#start_userId').val();
	//alert(id);
$.ajax({
        url : ajax_url,
        method  : 'post',
        data   : { action: 'check_session',user_id: id },

       success: function (response) {
       console.log(response);      
    }
  });   
});
</script>
<script>
var schedule_session_value = $('#schedule_session_count').text();
var consume_session_value = $('#consumed_session_count').text();
var cancel_session_value = $('#cancelled_session_count').text();
if(schedule_session_value == 0){
	$('#msg').text('No session scheduled');
}
if(consume_session_value == 0){
$('#msg1').text('No session delivered');
}
if(cancel_session_value == 0){
$('#msg2').text('No session cancelled');	
}
</script>

<?php get_template_part('inc/document_end'); ?>

<?php } elseif(is_user_logged_in() && $user->roles[0] == "student"){
	$url= site_url('student-dashboard');
	wp_redirect($url);
}else{
	$url = site_url();
	wp_redirect($url);
}
?>