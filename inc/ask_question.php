<?php
$current_user = wp_get_current_user();
$user_meta = get_user_meta($current_user->ID);
$user_image = $user_meta['profile_image'][0];
if (isset($_POST['ask_question'])) {

    require_once(ABSPATH . '/wp-load.php');
	require_once(ABSPATH . 'wp-admin' . '/includes/file.php');
	require_once(ABSPATH . 'wp-admin' . '/includes/image.php');

    $uploadedfile[] = $_FILES['attachments']['name'];
    $all_file = $uploadedfile[0];

    $asked_session_type = $_POST['ask_session_type'];
    $asked_subject = $_POST['ask_subject'];
    $asked_hours = $_POST['ask_hours_needed'];
    $asked_select_date = $_POST['ask_select_date'];
    $asked_problem = $_POST['ask_problem'];
    $asked_from_teacher = $_POST['ask_teacher'];
    $asked_from_teacher_email = $_POST['ask_teacher_email'];
    $asked_time = date("h:i:sa");
    $asked_date = date('d-M');
    $users = get_user_by('email', $asked_from_teacher_email);

    $ques_id = rand(0, 10000);


if(!empty($all_file)){
foreach ($all_file as $key => $value) {
 
	$uploaddir = wp_upload_dir(); 
				
	$myDirPath = $uploaddir['path'];
	$myDirUrl = $uploaddir['baseurl'];
	
	$image_path = $myDirPath.'/'.$value;
	
	move_uploaded_file($_FILES['attachments']['tmp_name'][$key],$image_path);

	$file = $value;
	$uploadfile = $myDirPath.'/' . basename( $file );
	$filename = basename( $uploadfile );

	$wp_filetype = wp_check_filetype(basename($filename), null );
	

	$attachment = array(
	'guid'           => $myDirPath. '/' . basename( $filename ),
	'post_mime_type' => $wp_filetype['type'],
	'post_content' => "",
	'post_status' => 'inherit'
	);
	$attachment_id = wp_insert_attachment( $attachment, $uploadfile );
	
	$attach_data = wp_generate_attachment_metadata( $attachment_id, $uploadfile );

	$attachimage_url[] = $myDirUrl.'/'.$attach_data['file'] ;

	wp_update_attachment_metadata( $attachment_id, $attach_data );	
}

$attach_ques = add_user_meta($users->ID, 'question_image', $attachimage_url);
}
    $key_value = array(
        'asked_for_session' => $asked_session_type,
        'asked_for_subject' => $asked_subject,
        'asked_for_hours' => $asked_hours,
        'asked_for_select_date' => $asked_select_date,
        'asked_for_problem' => $asked_problem,
        'asked_by_user_id' => $current_user->ID,
        'asked_by' => $current_user->display_name,
        'asked_time' => $asked_time,
        'asked_user_image' => $user_image,
        'asked_date' => $asked_date,
        'question_id'=> $ques_id
    );
    foreach ($key_value as $key => $val) {
        $added = add_user_meta($users->ID, $key, $val);
    }
    if ($added) {
        $response = '<div class="alert alert-success" role="alert"><b>Well done!</b> You successfully asked a question from ' . $users->display_name . '</div>';
    } else {
        $response = '<div class="alert alert-danger" role="alert"><b>Oh snap!</b> Error while Asking Question</div>';
    }
}

?>