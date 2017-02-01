<?php
global $wpdb;
global $current_user;
get_currentuserinfo();
$email = $_POST['username'];
$user = get_user_by('email', $email);
if ($user) {
    wp_set_current_user($user->ID, $user->user_login);
    wp_set_auth_cookie($user->ID);
    do_action('wp_login', $user->user_login);
}

///////////////////   Create or Register user  /////////////////////////////////////

if (isset($_POST['submit'])) {
    $userdata = array(
        'display_name' => $_POST['fullname'],
        'user_login' => $_POST['email'],
        'user_email' => $_POST['email'],
        'user_pass' => $_POST['password'],
        'first_name' => $_POST['fullname']
    );
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $exists = email_exists($email);
    if ($exists) {
        //  echo "User already exists with this email Id";
        $message = "User already exists with this Email Id";
        echo "<script type='text/javascript'>alert('$message');event.preventDefault();</script>";
    } else {
        $user_id = wp_insert_user($userdata);
         wp_set_auth_cookie( $user_id );
         wp_set_current_user( $user_id );
         $url = site_url('/thankyou');
         wp_redirect($url);
    }

    if (!is_wp_error($user_id)) {
        $gender = $_POST['gender'];
        $user = get_userdata($user_id);

        if (($user->roles[0]) == "teacher") {
            $post = wp_insert_post(array('post_title' => $user->data->display_name, 'post_type' => 'teacher', 'post_status' => 'publish'));
            $add_post_meta = add_post_meta($post,'wpcf-teacher-gender',$gender);
            $add_post_meta1 = add_post_meta($post,'wpcf-teacher-email',$user->user_email);

        }
        $hash = md5(rand(0, 1000)); // Generate random 32 character hash and assign it to a local variable.
        $added = add_user_meta($user_id, 'wpcf-gender', $gender);
        $status = add_user_meta($user_id, 'status', $hash);
        $add_post_id = add_user_meta($user_id,'post_id',$post);
        $active = add_user_meta($user_id, 'active', $active);
        $to = $email; // Send email to our user
        $subject = 'New User | Verification'; // Give the email a subject
        $message = 'Thanks for signing up!
Your account has been created, you need to verify your account by Clicking the url below. 

------------------------
Username: ' . $email . '
Password: ' . $pass . '
------------------------ 
Please click this link to verify your account:
http://staging.webreinvent.com/demo/projects/3lemni/dev/verification/?id=' . $user_id . '&hash=' . $hash . '
 
'; // Our message above including the link

        $headers = 'From:Testing@3lemni.com' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers);

    }
}
//////////////////////////////  User login  ////////////////////////////////////////

if (isset($_POST['login'])) {
    $user_login = $_POST['username'];
    $user_pass = $_POST['pass'];

    $creds = array('user_login' => $user_login,
        'user_password' => $user_pass
    );

    $user = wp_signon($creds, 'false');

    if (!is_wp_error($user)) {
         $user = wp_get_current_user();
        if (is_user_logged_in() && $user->roles[0] == "student") {
            $url = site_url('/student-dashboard/');
            wp_redirect($url);
        } elseif (is_user_logged_in() && $user->roles[0] == "teacher") {
            $url = site_url('/teacher-dashboard/');
            wp_redirect($url);
        }
       
    } else {
        $error = strip_tags($user->get_error_message());
        echo "<script type='text/javascript'>alert('$error');event.preventDefault();</script>";
    }
}

////////////////////////  Forgot password mail sender  /////////////////////

global $wpdb;
$error = '';
$success = '';

if (isset($_POST['action']) && 'reset' == $_POST['action']) {
    $email = trim($_POST['user_login']);

    if (empty($email)) {
        $error = 'Enter a username or e-mail address..';
    } else if (!is_email($email)) {
        $error = 'Invalid username or e-mail address.';
    } else if (!email_exists($email)) {
        $error = 'There is no user registered with that email address.';
    } else {

        $user = get_user_by('email', $email);

        $nonce = wp_create_nonce('reset_password_' . $user->ID);
        if ($user) {
            $to = $email;
            $subject = 'Your new password';
            $sender = get_option('name');

            $message = ' For Your new password';
            $message .= '<a href="' . get_permalink(123) . '/?user_id=' . $user->ID . '&action=reset_password&_wpnonce=' . $nonce . '">Click Here</a>';
            $headers[] = 'MIME-Version: 1.0' . "\r\n";
            $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers[] = "X-Mailer: PHP \r\n";
            $headers[] = 'From: ' . $sender . ' < ' . $email . '>' . "\r\n";

            $mail = wp_mail($to, $subject, $message, $headers);
            if ($mail)
                $success = 'Check your email address for you new password link.';

        } else {
            $error = 'Oops! Something went wrong updating your account.';
        }

    }

    if (!empty($error))
        echo "<script type='text/javascript'>alert('$error');event.preventDefault();</script>";

    if (!empty($success))
        echo "<script type='text/javascript'>alert('$success');event.preventDefault();</script>";
}

////////////////// Subscription ////////////////////////////////


if (isset($_POST['subscribe'])) {
    $subject = 'Subscribed 3lemni subscription';
    $message = '<h4>From: ' . $_POST['email'] . '</h4>';
    $message .= '<h4>'."Succesfully Subscribed 3lemni".'</h4>';
    $headers[] = 'From: test@3lemni.com';
    $headers[] .= 'Content-Type: text/html; charset=UTF-8';
    $to        =  "yash.wri50@webreinvent.com";
    $result = wp_mail($to, $subject, $message, $headers);
    if ($result) {
        $url = site_url('/thankyou');
        wp_redirect($url);
    }
}
?>