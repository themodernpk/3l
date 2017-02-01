<?php
add_action('wp_head', 'wp_ajax_url');
function wp_ajax_url()
{
	$script  = '<script>';
	$script .= 'var ajax_url = "' . admin_url('admin-ajax.php') . '";';
	$script .= '</script>';
	echo $script;
}
add_action('wp_ajax_book_session', 'book_session');

add_action('wp_ajax_nopriv_book_session', 'book_session');

function book_session() {

	$data = $_POST['mess'];
	$id   = $_POST['id'];
	$split =explode('&',$data);

	$book_subject 		 = explode('=',$split[0]);
	$book_needed_hours	 = explode('=',$split[1]);
	$book_for_date	     = explode('=',$split[2]);

	$book_start_time	= explode('=',$split[4]);
	$book_end_time		= explode('=',$split[5]);
	$book_timezone		= explode('=',$split[3]);

	$book_teacher 	 	= explode('=',$split[6]);
	$book_for_teacher   = urldecode($book_teacher[1]);

	$book_for_problem	= explode('=',$split[7]);
	$book_session_type  = explode('=',$split[8]);

	$booked_at_time 	= date("h:i:sa") ;
	$booked_at_date 	= date('d-M');

	if(!empty($id)){

		$current_user 		= wp_get_current_user();
		$current_user_meta  = get_user_meta($current_user->ID);
		$current_user_image	= $current_user_meta['profile_image'][0];
		$user 				= get_user_by('email',$book_for_teacher);

		$Teacher_name	 	= $user->data->display_name;

		$key_value 		= array(
			'book_for_subject'	=> $book_subject[1],
			'book_needed_hours'	=> $book_needed_hours[1],
			'book_for_date'		=> $book_for_date[1],
			'book_start_time'	=> urldecode($book_start_time[1]),
			'book_end_time'		=> urldecode($book_end_time[1]),
			'book_for_problem'	=> $book_for_problem[1],
			'book_for_teacher'	=> $book_for_teacher,
			'book_by_user_id'	=> $current_user->ID,
			'book_by_user'		=> $current_user->display_name,
			'book_for_session' 	=> $book_session_type[1],
			'book_at_time'		=> $booked_at_time,
			'booked_at_date'	=> $booked_at_date,
			'booked_class_id'	=> $id,
			'book_user_image'	=> $current_user_image,
			);
		foreach ($key_value as $key => $val) {
			$added = add_user_meta($user->ID, $key, $val);
		}

////////////////// Add question images //////////////////////////////

		if ( ! function_exists( 'wp_handle_upload' ) )

			require_once(ABSPATH . '/wp-load.php');
		require_once(ABSPATH . 'wp-admin' . '/includes/file.php');
		require_once(ABSPATH . 'wp-admin' . '/includes/image.php');
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		$uploaddir = wp_upload_dir();
		$myDirUrl = $uploaddir['url'];
		$uploadedfile = $_FILES['book_question']['name'];

		foreach ($uploadedfile as $ques_image)
		{
			$book_image_path = $myDirUrl.'/'.$ques_image;
				//$attach_ques = update_user_meta($user->ID,'book_question_image',$book_image_path);
		}

		$response = 'Well done! You successfully booked a session with '.$Teacher_name;
		print_r($response);
		$url = site_url('student-dashboard');
		wp_redirect($url);

	}else{
		$response = 'OOPS! Problem in booking a session ';
		print_r($response);
	}

	wp_die();
}

add_action('wp_ajax_accept_session', 'accept_session');
add_action('wp_ajax_nopriv_accept_session', 'accept_session');
function accept_session() {
	$booker_id 				= $_POST['get_student_id'];
	$booked_teacher_id 		= $_POST['get_teacher_id'];
	$clas_id 					= $_POST['get_class_id'];
	$book_problem 				= $_POST['get_book_problem'];
	$booked_teacher_name 		= $_POST['get_teacher_name'];
	$booked_teacher_image 		= $_POST['get_teacher_image'];
	$booked_teacher_subject 	= $_POST['get_session_subject'];
	$booked_teacher_hours 		= $_POST['get_session_duration'];
	$booked_teacher_date 		= $_POST['get_session_date'];
	$booked_teacher_session 	= $_POST['get_session_type'];
	$booked_student_image 		= $_POST['get_book_user_image'];
	$booked_student_name	 	= $_POST['get_book_by_name'];
	$confirm_class_start_time  = $_POST['get_class_start_time'];
	$confirm_at_time 			= date("h:i:sa") ;
	$confirm_at_date 			= date('d-M');
	$class_id 					= rtrim($clas_id,' ');

	$key_value_student = array(
		'confirm_class_id' 				=> $class_id,
		'confirm_teacher_id'			=> $booked_teacher_id,
		'confirm_book_problem'			=> $book_problem,
		'confirm_session_for_subject'	=> $booked_teacher_subject,
		'confirm_session_hours'			=> $booked_teacher_hours,
		'confirm_session_for_date'		=> $booked_teacher_date,
		'confirm_session_for_teacher'	=> $booked_teacher_name,
		'confirm_for_session' 			=> $booked_teacher_session,
		'confirm_session_at_time'		=> $confirm_at_time,
		'confirm_session_at_date'		=> $confirm_at_date ,
		'confirm_session_teacher_image'	=> $booked_teacher_image,
		'confirm_class_start_time' 		=> $confirm_class_start_time,
		'booking_status'				=> "accepted".$class_id);

	$key_value_teacher = array(
		'confirm_class_id' 				=> $class_id,
		'confirm_student_id'			=> $booker_id,
		'confirm_book_problem'			=> $book_problem,
		'confirm_session_for_subject'	=> $booked_teacher_subject,
		'confirm_session_hours'			=> $booked_teacher_hours,
		'confirm_session_for_date'		=> $booked_teacher_date,
		'confirm_session_by_student'	=> $booked_student_name,
		'confirm_for_session' 			=> $booked_teacher_session,
		'confirm_session_at_time'		=> $confirm_at_time,
		'confirm_session_at_date'		=> $confirm_at_date ,
		'confirm_session_student_image'	=> $booked_student_image,
		'confirm_class_start_time'		=> $confirm_class_start_time,
		'booking_status'				=> "accepted".$class_id

		);


	foreach ($key_value_student as $key => $val) {
		$add  = add_user_meta($booker_id,$key,$val);
	}



	foreach ($key_value_teacher as $key => $val) {
		$add1  = add_user_meta($booked_teacher_id,$key,$val);
	}

	if($add && $add1){
		echo "Successfully Confirmed Session";
	}else{
		echo "Error while Accepting Session";
	}

	wp_die();
}



add_action('wp_ajax_accept_question', 'accept_question');
add_action('wp_ajax_nopriv_accept_question', 'accept_question');
function accept_question() {
	extract($_POST);

//$student_id = $get_student_id;
	$key_value_student = array(
		'accept_question_id' 			 => $get_question_id,
		'accept_question_by_teacher_id'  => $get_teacher_id,
		'accept_question_by_teacher_name'=> $get_teacher_name,
		'accept_teacher_image'			 => $get_teacher_image,
		'accept_ask_problem'			 => $get_ask_problem,
		'accept_question_at_date'		 => date('d-M'),
		'accept_question_at_time'		 => date("h:i:sa"),
		'question_status'				 => "accepted".$get_question_id
		);

	$key_value_teacher = array(
		'accept_question_id' 			 => $get_question_id,
		'accept_question_of_student_id'  => $get_student_id,
		'accept_ask_problem'			 => $get_ask_problem,
		'accept_question_at_date'		 => date('d-M'),
		'accept_question_at_time'		 => date("h:i:sa"),
		'question_status'				 => "accepted".$get_question_id
		);

	foreach ($key_value_student as $key => $val) {
		$add  = add_user_meta($get_student_id,$key,$val);
	}
	foreach ($key_value_teacher as $key => $val) {
		$add1  = add_user_meta($get_teacher_id,$key,$val);
	}
	if($add1 && $add){
		echo"Succesfully accepted question";
	}
	wp_die();
}

add_action('wp_ajax_reject_question', 'reject_question');
add_action('wp_ajax_nopriv_reject_question', 'reject_question');
function reject_question() {
	extract($_POST);
//$student_id = $get_student_id;
	$key_value_student = array(
		'reject_question_id' 			 => $get_question_id,
		'reject_question_by_teacher_id'  => $get_teacher_id,
		'reject_question_by_teacher_name'=> $get_teacher_name,
		'reject_teacher_image'			 => $get_teacher_image,
		'reject_ask_problem'			 => $get_ask_problem,
		'reject_question_at_date'		 => date('d-M'),
		'reject_question_at_time'		 => date("h:i:sa"),
		'question_status'				 => "cancelled".$get_question_id
		);

	$key_value_teacher = array(
		'reject_question_id' 			 => $get_question_id,
		'reject_question_of_student_id'  => $get_student_id,
		'reject_ask_problem'			 => $get_ask_problem,
		'reject_question_at_date'		 => date('d-M'),
		'reject_question_at_time'		 => date("h:i:sa"),
		'question_status'				 => "cancelled".$get_question_id
		);

	foreach ($key_value_student as $key => $val) {
		$add  = add_user_meta($get_student_id,$key,$val);
	}
	foreach ($key_value_teacher as $key => $val) {
		$add1  = add_user_meta($get_teacher_id,$key,$val);
	}
	if($add1 && $add){
		echo"Succesfully Rejected question";
	}
	wp_die();
}




add_action('wp_ajax_decline_session', 'decline_session');
add_action('wp_ajax_nopriv_decline_session', 'decline_session');
function decline_session() {
	$clas_id 					= $_POST['get_class_id'];
	$class_id 					= rtrim($clas_id,' ');
	$booker_id 				= $_POST['get_student_id'];
	$booked_teacher_id 		= $_POST['get_teacher_id'];
	$booked_teacher_name 		= $_POST['get_teacher_name'];
	$booked_teacher_image 		= $_POST['get_teacher_image'];
	$booked_teacher_subject 	= $_POST['get_session_subject'];
	$booked_teacher_hours 		= $_POST['get_session_duration'];
	$booked_teacher_date 		= $_POST['get_session_date'];
	$booked_teacher_session 	= $_POST['get_session_type'];
	$confirm_at_time 			= date("h:i:sa") ;
	$confirm_at_date 			= date('d-M');

	$key_value = array(
		'confirm_session_for_subject'	=> $booked_teacher_subject,
		'confirm_session_hours'			=> $booked_teacher_hours,
		'confirm_session_for_date'		=> $booked_teacher_date,
		'confirm_session_for_teacher'	=> $booked_teacher_name,
		'confirm_for_session' 			=> $booked_teacher_session,
		'confirm_session_at_time'		=> $confirm_at_time,
		'confirm_session_at_date'		=> $confirm_at_date ,
		'confirm_session_teacher_image'	=> $booked_teacher_image,
		'confirm_class_id'				=> $class_id,
		'booking_status'				=> "cancelled".$class_id
		);
	foreach ($key_value as $key => $val) {
		$add = add_user_meta($booker_id,$key,$val);
	}
	$add1 = add_user_meta($booked_teacher_id,'booking_status','cancelled'.$class_id);
	if($add && $add1){
		echo "Successfully Rejected Session";
	}else{
		echo "Error in Cancel Session";
	}
	wp_die();
}

add_action('wp_ajax_cancelled_session', 'cancelled_session');
add_action('wp_ajax_nopriv_cancelled_session', 'cancelled_session');
function cancelled_session() {
	global $wpdb;

	$data = $_POST['content'];
	$reason =$_POST['get_reason'];
	$data_split = explode('&',$data);

	$get_cid = explode('=',$data_split[1]);
	$cid = $get_cid[1];

	$get_tid = explode('=',$data_split[2]);
	$tid = $get_tid[1];

	$get_sid = explode('=',$data_split[3]);
	$sid = $get_sid[1];

	$get_cancel_by = explode('=',$data_split[0]);
	$cancelby= $get_cancel_by[1];

	$teacher_res = $wpdb->query("Update ". $wpdb->prefix . "usermeta
		Set meta_value = 'cancelled".$cid."'
		Where user_id = ".$tid." and
		meta_key ='booking_status' and meta_value = 'accepted".$cid."'");

	$add_teacher = add_user_meta($tid,'reason',$reason);
	$add_teacher1 = add_user_meta($tid,'cancelledby',$cancelby);

	$student_res = $wpdb->query("Update ". $wpdb->prefix . "usermeta
		Set meta_value = 'cancelled".$cid."'
		Where user_id = ".$sid." and
		meta_key ='booking_status' and meta_value = 'accepted".$cid."'");

	$add_student = add_user_meta($sid,'reason',$reason);
	$add_student1 = add_user_meta($sid,'cancelledby',$cancelby);
	if($student_res == 1 && $teacher_res ==1){
		echo"Session Cancelled Successfully by".$cancelby;
	}else{
		echo"Error Occurs in session Cancellation Session";
	}
/*echo"<pre>";
print_r($student_res.'=>'.$teacher_res);
echo"</pre>";*/

wp_die();
}

add_action('wp_ajax_reschedule_session', 'reschedule_session');
add_action('wp_ajax_nopriv_reschedule_session', 'reschedule_session');
function reschedule_session() {
	$data  			 = $_POST['content'];
	$start_time      = $_POST['get_time'];
	$start_date      = $_POST['get_date'];
	$old_start_time  = $_POST['get_old_time'];
	$old_start_date  = $_POST['get_old_date'];

	$split 			 = explode('&',$data);
	$get_access_id  		 = explode('=',$split[0]);

	$access_id 			 = $get_access_id[1];

	$reschedule_id   		  = explode('=',$split[1]);
	$reschedule_by_id = $reschedule_id[1];

	$get_reschedule_by  = explode('=',$split[7]);
	$reschedule_by 	 = $get_reschedule_by[1];

	$get_clas_id 	     = explode('=', $split[4]);
	$class_id 		     = $get_clas_id[1];

	$get_old_time  		  = explode('=',$split[3]);
	$old_start_time  	  = $get_old_time[1];

	$get_old_date 		  = explode('=',$split[2]);
	$old_start_date  	  = $get_old_date[1];

	$get_subject  		  = explode('=',$split[5]);
	$reschedule_subject   = $get_subject[1];

	$get_session  		  = explode('=',$split[6]);
	$reschedule_session   = $get_session[1];

	$get_teacher_image  = explode('=',$split[8]);
	$profile_image      = $get_teacher_image[1];

	$reschedule = array(
		'reschedule_by'   			=> $reschedule_by,
		'reschedule_by_id'			=> $reschedule_by_id,
		'reschedule_class_id' 		=> $class_id,
		'reschedule_subject'		=> $reschedule_subject,
		'reschedule_session_type'	=> $reschedule_session,
		'reschedule_new_start_time' =>urldecode($start_time),
		'reschedule_new_start_date' =>urldecode($start_date),
		'reschedule_old_start_time' =>urldecode($old_start_time),
		'reschedule_old_start_date' =>urldecode($old_start_date),
		'reschedule_by_image'       =>urldecode($profile_image),
		'reschedule_at_time'        =>date("h:i:sa")  ,
		'reschedule_at_date'        => date("d-M"),
		);
	foreach ($reschedule as $key => $value) {
		$re_schedule = add_user_meta($access_id,$key,$value);
		$re_scheduleby = add_user_meta($reschedule_by,$key,$value);
	}
	if($re_schedule){
		echo "Reschedule notification sent  succesfully";
	}
	wp_die();
}

add_action('wp_ajax_accept_reschedule', 'accept_reschedule');
add_action('wp_ajax_nopriv_accept_reschedule', 'accept_reschedule');
function accept_reschedule() {
	global $wpdb;
	extract($_POST);
	echo"<pre>";
	print_r($student_res.'=>'.$teacher_res);
	echo"</pre>";
	$teacher_res =  $wpdb->query("Update ". $wpdb->prefix . "usermeta
		Set meta_value = 'rescheduled".$get_class_id."'
		Where user_id = ".$get_teacher_id." and
		meta_key ='booking_status' and meta_value = 'accepted".$get_class_id."'");

	$student_res =$wpdb->query("Update ". $wpdb->prefix . "usermeta
		Set meta_value = 'rescheduled".$get_class_id."'
		Where user_id = ".$get_student_id." and
		meta_key ='booking_status' and meta_value = 'accepted".$get_class_id."'");
	if($teacher_res && $student_res){
		echo "Successfully Accepted Reschedule Request";
	}else{
		echo "Error! While Accepting Reschedule Request";
	}
	wp_die();
}

add_action('wp_ajax_reschedule_cancel', 'reschedule_cancel');
add_action('wp_ajax_nopriv_reschedule_cancel', 'reschedule_cancel');
function reschedule_cancel() {
	global $wpdb;
	extract($_POST);

	$teacher_res =  $wpdb->query("Update ". $wpdb->prefix . "usermeta
		Set meta_value = 'cancelled".$get_class_id."'
		Where user_id = ".$get_teacher_id." and
		meta_key ='booking_status' and meta_value = 'accepted".$get_class_id."'");

	$student_res =$wpdb->query("Update ". $wpdb->prefix . "usermeta
		Set meta_value = 'cancelled".$get_class_id."'
		Where user_id = ".$get_student_id." and
		meta_key ='booking_status' and meta_value = 'accepted".$get_class_id."'");
	if($teacher_res && $student_res){
		echo "Successfully Cancelled Reschedule Request";
	}else{
		echo "Error! While Accepting Reschedule Request";
	}
	wp_die();
}

add_action('wp_ajax_check_session', 'check_session');
add_action('wp_ajax_nopriv_check_session', 'check_session');
function check_session() {
	global $wpdb;
	$user_id =$_POST['user_id'];
	$user_meta = get_user_meta($user_id);
	echo"<pre>";
	print_r($user_meta);
	echo"</pre>";
	$confirm_date = $user_meta['confirm_session_for_date'];
	$confirm_time = $user_meta['confirm_class_start_time'];
	$class_id 	  = $user_meta['confirm_class_id'];

	foreach ($class_id as $key => $value) {

		$get_class_id = $value;

		date_default_timezone_set('Asia/Kolkata');

		$diff=date_diff($current_date1,$session_date1);

		$current_date =  strtotime(date("Y-m-d h:i a"));
		$session_date =  strtotime($confirm_date[$key].' '.$confirm_time[$key]);

		if($session_date > $current_date){
			echo "session_date is bigger"."\n";

		}
		else{
			echo "current_date is bigger"."\n".$get_class_id;


			$set =$wpdb->query("Update ". $wpdb->prefix . "usermeta
				Set meta_value = 'consumed".$get_class_id."'
				Where user_id = ".$user_id." and
				meta_key ='booking_status' and meta_value = 'accepted".$get_class_id."'");

		}
	}
	wp_die();
}

add_action('wp_ajax_rate_teacher', 'rate_teacher');
add_action('wp_ajax_nopriv_rate_teacher', 'rate_teacher');
function rate_teacher() {
	global $wpdb;
	$s_name  		 = $_POST['student_name'];
	$s_id  			 = $_POST['student_ID'];
	$t_name  		 = $_POST['teacher_name'];
	$rating 		 = $_POST['get_rating'];
	$review  		 = $_POST['get_review'];
	$em_rating  	 = $_POST['get_em_rating'];
	$comm_rating 	 = $_POST['get_comm_rating'];
	$recmnd_rating 	 = $_POST['get_recmnd_rating'];
	$posttitle 		 = $t_name;
	
	$postid = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'" );

	$post_id = wp_insert_post(array('post_title'=>$s_name, 'post_type'=>'rate-review','post_status'  => 'publish','post_content'=>$review));

	$post_value =   array('wpcf-student-id'		   		   =>  $s_id,
		'wpcf-teacher-post-id'		       =>  $postid,
		'wpcf-teacher-rating' 	  		   => $rating,
		'wpcf-teacher-explaining-method-rating'		=>  $em_rating,
		'wpcf-teacher-communication-rating' 	  		=> $comm_rating,
		'wpcf-teacher-recommendable-rating' 	  		=> $recmnd_rating,
		);
	foreach ($post_value as $key => $value) {
		$added = add_post_meta($post_id, $key, $value);
	}
	if($added){
		echo 'rated succesfully' ;
		
	}
	wp_die();
}
?>