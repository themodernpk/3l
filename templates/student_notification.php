<?php
/*
Template Name: student_notification
*/
?>
<?php
	$user = wp_get_current_user();
	if(is_user_logged_in() && $user->roles[0] == "student"){
?>
<?php get_template_part('header-dashboard'); ?>
<?php TP::css('dashboard'); ?>
<?php TP::css('notification'); ?>
<?php $student_meta = get_user_meta($user->ID);
$arr_status = $student_meta['booking_status'];
/*echo"<pre>";
print_r($student_meta);
echo"</pre>";
die();*/
$accept_at_date 			=  $student_meta['accept_question_at_date'];
$accept_at_time  			=  $student_meta['accept_question_at_time'];
$accept_by_teacher 			=  $student_meta['accept_question_by_teacher_name'];
$accept_by_teacher_image	=  $student_meta['accept_teacher_image'];
$accept_ask_problem			=  $student_meta['accept_ask_problem'];
$accept_ques_by_teacher_id  =  $student_meta['accept_question_by_teacher_id'];
$reject_at_date 			=  $student_meta['reject_question_at_date'];
$reject_at_time  			=  $student_meta['reject_question_at_time'];
$reject_by_teacher 			=  $student_meta['reject_question_by_teacher_name'];
$reject_by_teacher_image	=  $student_meta['reject_teacher_image'];
$reject_ask_problem			=  $student_meta['reject_ask_problem'];
$reject_ques_by_teacher_id  =  $student_meta['reject_question_by_teacher_id'];

$confirm_by_teacher 		=  $student_meta['confirm_session_for_teacher'];
$confirm_at_date			=  $student_meta['confirm_session_at_date'];
$confirm_teacher_id 	    =  $student_meta['confirm_teacher_id'];
$confirm_at_time			=  $student_meta['confirm_session_at_time'];
$confirm_subject			=  $student_meta['confirm_session_for_subject'];
$confirm_session_hours		=  $student_meta['confirm_session_hours'];
$confirm_session_for_date	=  $student_meta['confirm_session_for_date'];
$confirm_class_start_time	=  $student_meta['confirm_class_start_time'];
$confirm_for_session		=  $student_meta['confirm_for_session'];
$confirm_class_id 			=  $student_meta['confirm_class_id'];
$confirm_teacher_image		=  $student_meta['confirm_session_teacher_image'];
 $booking_status			=  $student_meta['booking_status'];
 
$reschedule_by				=  $student_meta['reschedule_by'];
$reschedule_by_id 		 	=  $student_meta['reschedule_by_id'];
$reschedule_class_id		=  $student_meta['reschedule_class_id'];
$reschedule_subject			=  $student_meta['reschedule_subject'];
$reschedule_session_type 	=  $student_meta['reschedule_session_type'];
$reschedule_old_start_date  =  $student_meta['reschedule_old_start_date'];
$reschedule_old_start_time  =  $student_meta['reschedule_old_start_time'];
$reschedule_new_start_time	=  $student_meta['reschedule_new_start_time'];
$reschedule_new_start_date  =  $student_meta['reschedule_new_start_date'];
$reschedule_by_image 		=  $student_meta['reschedule_by_image'];
$reschedule_at_time	 		=  $student_meta['reschedule_at_time'];
$reschedule_at_date			=  $student_meta['reschedule_at_date'];
?>
<div class="container-fluid display-table v-align margin_top_second pos-rel" style="">
	<div class="row display-table-row">
		<button class="vk_toggle vk_toggle--htla visible-xs">
			<span>toggle menu</span>
		</button>
		<div class="display-table-cell v-align dash_left_side" id="navigation_left">
			
			<div class="side_bar">

				<h6>MENU</h6>
				<ul>
					<li class="db_dashboard "><a href="<?php echo site_url(); ?>/student-dashboard/">
						<i></i> <span class="hidden-sm hidden-xs"> Dashboard</span>
					</a></li>	

					<li class="db_profile "><a href="<?php echo site_url(); ?>/student-profile/">
						<i></i> <span class="hidden-sm hidden-xs"> Profile</span>
					</a></li>


					<li class="db_notification active"><a href="<?php echo site_url(); ?>/student-notification">
						<i></i> <span class="hidden-sm hidden-xs">  Notification</span>
					</a></li>

					<li class="db_wallet"><a href="<?php echo site_url(); ?>/student-wallet/">
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
				
				<div class="myheading ">
					<h3>Notification</h3>
				</div>

				<div class="notification_section">
				 <?php if(empty($accept_at_date || $confirm_at_date || $reschedule_at_date)){
                        echo "<h5 style='text-align:center;'>There is No Notification</h5>"; 
                        } ?>
					<ul class="notification_ul">

						<?php
///////////////////////////////Question Accept or Reject ////////////////////////////////////

							if(!empty($accept_at_date)){	
								krsort($accept_at_date);
							foreach ($accept_at_date as $key => $date ) { 
						 ?>
						<li>
							<div class="n_time">
								<h4><i class="fa fa-circle-o" aria-hidden="true"></i><?php echo $accept_at_date[$key]; ?>, <?php echo $accept_at_time[$key]; ?></h4>
							</div>

							<div class="n_about">
								<div class="media un_confirm">
									<a class="media-left " href="#">
										<img class="media-object ys_user" src="<?php if (!empty($accept_by_teacher_image[$key])) {
                                                             echo $accept_by_teacher_image[$key];
                                                         } else {
                                                            
                                                             echo 'http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png';
                                                         } ?>" alt="Generic placeholder image">
										<i class="fa fa-question" aria-hidden="true"></i>
									</a>
									<div class="media-body">
										<h4 class="media-heading"><span><?php echo $accept_by_teacher[$key]; ?></span> answered your <span>question</span></h4>
										<p><?php echo $accept_ask_problem[$key]; ?></p>
										<!-- <ul class="attachment_ul">
											<li>MathsQuestion.JPG</li>
										</ul> -->
									</div>
								</div>
							</div>

							<div class="n_chat">					
								<a href="javascript:void(0)"onclick="javascript:jqcc.cometchat.chatWith('<?php echo $accept_ques_by_teacher_id[$key]; ?>');" class="btn"> Chat Now</a>
							</div>

						</li>
						<?php } }
						 elseif (!empty($reject_at_date)){
						 	krsort($reject_at_date);
							foreach (array_reverse($reject_at_date) as $key => $date ) { 
						 ?>
						<li>
							<div class="n_time">
								<h4><i class="fa fa-circle-o" aria-hidden="true"></i><?php echo $reject_at_date[$key]; ?>, <?php echo $reject_at_time[$key]; ?></h4>
							</div>

							<div class="n_about">
								<div class="media un_confirm">
									<a class="media-left " href="#">
										<img class="media-object ys_user" src="<?php if (!empty($reject_by_teacher_image[$key])) {
                                                             echo $reject_by_teacher_image[$key];
                                                         } else {
                                                            $source = get_template_directory_uri();
                                                             echo 'http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png';
                                                         } ?>" alt="Generic placeholder image">
										<i class="fa fa-question" aria-hidden="true"></i>
									</a>
									<div class="media-body">
										<h4 class="media-heading"><span><?php echo $reject_by_teacher[$key]; ?></span> rejected your <span>question</span></h4>
										<p><?php echo $reject_ask_problem[$key]; ?></p>
										<!-- <ul class="attachment_ul">
											<li>MathsQuestion.JPG</li>
										</ul> -->
									</div>
								</div>
							</div>

							<div class="n_chat">
								<a href="javascript:void(0)"onclick="javascript:jqcc.cometchat.chatWith('<?php echo $reject_ques_by_teacher_id[$key]; ?>');" class="btn"> Chat Now</a>
							</div>

						</li>
						<?php } }	

////////////////////////// Session Confirmation ////////////////////////////////

							if(!empty($confirm_at_date)){
								krsort($confirm_at_date);        // sorting key in reverse order
							foreach ($confirm_at_date as $key => $date ) { 			
						 ?>
						<li>
							<div class="n_time">
								<h4><i class="fa fa-circle-o" aria-hidden="true"></i><?php echo $date; ?>, 
								<?php echo $confirm_at_time[$key]; ?></h4>
							</div>

							<div class="n_about">
								<div class="media confirm">
									<a class="media-left " href="#">
										<img class="media-object ys_user" src="<?php if(!empty($confirm_teacher_image[$key])){
											echo $confirm_teacher_image[$key];
											}else{
												echo 'http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png';} ?>">
										<i class="fa fa-check" aria-hidden="true"></i>
									</a>
									<div class="media-body">
										<h4 class="media-heading">
										<span>
										<?php echo $confirm_by_teacher[$key]; ?> 
										</span>										
										<?php									
										if(is_array($arr_status)){
										 if(in_array('cancelled'.$confirm_class_id[$key]
											, $arr_status,true)) { ?> cancelled your <span>session</span><?php }
											 else { ?>
										 confirmed your <span>session</span><?php } } ?>
										</h4>
										<ul class="confirm_li">
											<li><b>Subject :</b> 
											<?php echo $confirm_subject[$key]; ?>  </li>
											<li><b>Duration:</b>  
											<?php echo $confirm_session_hours[$key]; ?> hours </li>
											<li><b>Date & Time:</b> 
											<?php echo $confirm_session_for_date[$key]; ?>, <?php echo $confirm_class_start_time[$key]; ?>  </li> 
											<li><b>Session Type:</b> 
											 <?php echo $confirm_for_session[$key]; ?> Session</li>
										</ul>
									</div>
								</div>
							</div>					

							<div class="n_chat">
								<a href="javascript:void(0)"onclick="javascript:jqcc.cometchat.chatWith('<?php echo $confirm_teacher_id[$key]; ?>');" class="btn"> Chat Now</a>
							</div>

						</li>

						<?php } } 

//////////////////////////  Reschedule session notification  ///////////////////////////

							if(!empty($reschedule_at_date)){
							krsort($reschedule_at_date); 	
							foreach ($reschedule_at_date as $key => $date ) { 
						 ?>
						<li>
							<div class="n_time">
								<h4><i class="fa fa-circle-o" aria-hidden="true"></i><?php echo $date; ?>, 
								<?php echo $reschedule_at_time[$key]; ?></h4>
							</div>

							<div class="n_about">
								<div class="media confirm">
									<a class="media-left " href="#">
										<img class="media-object ys_user" src="<?php if(!empty($reschedule_by_image[$key])){
											echo $reschedule_by_image[$key];
											}else{
												echo 'http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png';} ?>">
										<i class="fa fa-check" aria-hidden="true"></i>
									</a>
									<div class="media-body">
										<h4 class="media-heading">
										<span>
										<?php echo $reschedule_by[$key]; ?> 
										</span>
										want to Reschedule Your 
										<span>Session</span>
										</h4>
										<ul class="confirm_li">
											<li><b>Subject :</b> 
											<?php echo $reschedule_subject[$key]; ?>  </li>
											<li><b>Class ID:</b>  
											<?php echo $reschedule_class_id[$key]; ?></li>
											<li><b>Date & Time:</b> 
											<?php echo $reschedule_new_start_date[$key]; ?>, <?php echo $reschedule_new_start_time[$key]; ?>  </li> 
											<li><b>Session Type:</b> 
											 <?php echo $reschedule_session_type[$key]; ?> Session</li>
										</ul>
									</div>
								</div>
							</div>					

							<div class="n_chat action_detail">
								<ul>
									<li>											
											 <a class="accept_a hvr-icon-pop hvr-icon-ok accept_reschedule" data-student_id="<?php echo $user->ID; ?>" data-teacher_id="<?php echo $reschedule_by_id[$key]; ?>" data-class_id="<?php echo $reschedule_class_id[$key]; ?>" data-new_date="<?php echo $reschedule_new_start_date[$key]; ?>" data-new_time="<?php echo $reschedule_new_start_time[$key]; ?>" data-old_date="<?php echo $reschedule_old_start_date[$key]; ?>" data-old_time="<?php echo $reschedule_old_start_time[$key]; ?>">Accept</a>	</li>
									<li>
									<a class="decline_a hvr-icon-sink-away cancel_reschedule" data-student_id="<?php echo $user->ID; ?>" data-teacher_id="<?php echo $reschedule_by_id[$key]; ?>" data-class_id="<?php echo $reschedule_class_id[$key]; ?>">Decline</a></li>
									<li>
								<a href="javascript:void(0)"onclick="javascript:jqcc.cometchat.chatWith('<?php echo $reschedule_by_id[$key]; ?>');" class="btn"> Chat Now</a></li>
								</ul>
							</div>

						</li>

						<?php } } ?>

					</ul>
				</div>
			</div>
		</div><!---dash_right_side-->
	</div><!--row-->
</div><!-- container-fluid display-table v-align margin_top_second  pos-rel-->


<?php get_footer(); ?>
<?php TP::js('dashboard'); ?>
<?php TP::js('testing_edgePreload'); ?>

<script>
$(document).ready(function(){
	$('.accept_reschedule').on('click',function(){
		var student_id = $(this).data('student_id');
		var teacher_id = $(this).data('teacher_id');
		var class_id   = $(this).data('class_id');
		var new_date = $(this).data('new_date');
		var new_time   = $(this).data('new_time');
		var old_date = $(this).data('old_date');
		var old_time   = $(this).data('old_time');
		$.ajax({
        url : ajax_url,
        method  : 'post',
        data   : { action: 'accept_reschedule', 
        		   get_student_id : student_id ,
				   get_teacher_id : teacher_id ,				  
				   get_class_id   : class_id,
				   get_new_date   : new_date ,				  
				   get_new_time   : new_time,
				   get_old_date   : old_date ,				  
				   get_old_time   : old_time,
				},
				   
       success: function (response) {
     				alert(response) ; 
     			}
  });   
	});
});
</script>

<script>
$(document).ready(function(){
	$('.cancel_reschedule').on('click',function(){	
		var student_id = $(this).data('student_id');
		var teacher_id = $(this).data('teacher_id');
		var class_id   = $(this).data('class_id');
		$.ajax({
        url : ajax_url,
        method  : 'post',
        data   : { action: 'reschedule_cancel', 
        		   get_student_id : student_id ,
				   get_teacher_id : teacher_id ,				  
				   get_class_id   : class_id,				   
				},
				   
       success: function (response) {
     				alert(response) ; 
     			}
  });	
		
	});
});
</script>

<?php get_template_part('inc/document_end'); ?>

	<?php } elseif(is_user_logged_in() && $user->roles[0] == "teacher"){
	$url= site_url('teacher-dashboard');
	wp_redirect($url);
	}else{
	$url = site_url();
	wp_redirect($url);
}
?>