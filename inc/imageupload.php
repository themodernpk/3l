<?php
	global $current_user;
	get_currentuserinfo(); 				
	$current_user_id = $current_user->ID;
	$meta =get_user_meta($current_user_id);
   $post_id = $meta['post_id'][0];

	if (isset($_POST['update'])){

	require_once(ABSPATH . '/wp-load.php');
	require_once(ABSPATH . 'wp-admin' . '/includes/file.php');
	require_once(ABSPATH . 'wp-admin' . '/includes/image.php');

	$filename =  $_FILES['profile_pic']['name'];
	if(!empty($filename)){
	
	$uploaddir = wp_upload_dir(); 
				
	$myDirPath = $uploaddir['path'];
	$myDirUrl = $uploaddir['baseurl'];

	$MyImage = $_FILES['profile_pic']['name'];
	$image_path = $myDirPath.'/'.$MyImage;
	
	move_uploaded_file($_FILES['profile_pic']['tmp_name'],$image_path);

	$file = $MyImage;
	$uploadfile = $myDirPath.'/' . basename( $file );
	$filename = basename( $uploadfile );

	$wp_filetype = wp_check_filetype(basename($filename), null );
	

	$attachment = array(
	'guid'           => $myDirPath. '/' . basename( $filename ),
	'post_mime_type' => $wp_filetype['type'],
	'post_content' => "",
	'post_status' => 'inherit'
	);
	$attachment_id = wp_insert_attachment( $attachment, $uploadfile,$post_id );
	/*	echo"<pre>";
		print_r($attachment_id);
		echo"</pre>";
		die();*/
	$attach_data = wp_generate_attachment_metadata( $attachment_id, $uploadfile );

	$attachimage_url = $myDirUrl.'/'.$attach_data['file'] ;

	wp_update_attachment_metadata( $attachment_id, $attach_data );	 
	if($current_user->roles[0] == "teacher"){
	 	 set_post_thumbnail( $post_id, $attachment_id );
	 	 }	 
	$image = update_user_meta( $current_user_id ,'profile_image',$attachimage_url);
}

	}
?>