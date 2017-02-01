<?php
/*
Template Name: student_profile
*/
?>
<?php
$user = wp_get_current_user();
if(is_user_logged_in() && $user->roles[0] == "student"){
    ?>
    <?php     
//////////////////////////////  Change Password  /////////////////////////

    if (isset($_POST['confirm'])) {
        $current_user = wp_get_current_user();
        $check = wp_check_password($_POST['old_password'], $current_user->data->user_pass,    $current_user->data->ID);
        if ($check) {
            $new_password = $_POST['new_password'];
            wp_set_password($new_password, $current_user->data->ID);
            $response = '<div class="alert alert-success" role="alert"><b>Well done!</b> You successfully changed your password</div>';
        } else {
            $response = '<div class="alert alert-danger" role="alert"><b>Oh snap!</b> Error while changing password</div>';
        }
    }

////////////////////  Updation of meta field and profile Pic  ///////////

    get_template_part('inc/imageupload');
    if(isset($_POST['update'])){
     $user_id = get_current_user_id();
     $lastname = $_POST['profile_lastname'];
     $test = $_POST['profile_name'];
     $loe =$_POST['student_education'];
     $dob = $_POST['dob'] ;
     $image=$_FILES['profile_pic'];
     $updated = wp_update_user(array('ID'=>$user_id,'display_name'=>$test,'last_name'=>$lastname));
     if(!is_wp_error($updated)){
         $gender = $_POST['profile_gender'];
         $meta_update = update_user_meta($user_id,'wpcf-gender',$gender);
         $added = update_user_meta($user_id,'wpcf-student_education',$loe);
         $added1 = update_user_meta($user_id,'wpcf-date-of-birth',$dob);
         if($added || $updated || $meta_update || $added1 ) {
           $response ='<div class="alert alert-success" role="alert"><b>Great!</b> Profile updated successfully</div>';
       }
   }
}

//////////////////////////   Send Verification Link  ////////////////////

if(isset($_POST['click_here'])){
    $current_user = wp_get_current_user();
    $user_id = get_current_user_id();
    $meta =get_user_meta($user_id);
    $hash = $meta['status'][0];
        $to      =$current_user->data->user_login; // Send email to our user
        $subject = 'User | Verification'; // Give the email a subject 
        $message = 'You need to verify your account by Clicking the url below. 

        Please click this link to verify your account:
        http://staging.webreinvent.com/demo/projects/3lemni/dev/verification/?id='.$user_id.'&hash='.$hash.''; 

$headers = 'From:Testing@3lemni.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers);
}

/////////////////////////////////////////////////////////////////////

get_template_part('header-dashboard'); 
$meta =get_user_meta($current_user->ID);
/*echo"<pre>";
print_r($meta);
echo"</pre>";*/
?>
<?php /*if (is_user_logged_in()) {*/
    $current_user = wp_get_current_user(); ?>
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

                        <li class="db_profile active"><a href="<?php echo site_url(); ?>/student-profile/">
                            <i></i> <span class="hidden-sm hidden-xs"> Profile</span>
                        </a></li>


                        <li class="db_notification"><a href="<?php echo site_url(); ?>/student-notification">
                            <i></i> <span class="hidden-sm hidden-xs">  Notification</span>
                        </a></li>

                        <li class="db_wallet"><a href="<?php echo site_url(); ?>/student-wallet/">
                            <i></i> <span class="hidden-sm hidden-xs"> My Wallet</span>
                        </a></li>
                        <?php $redirect = site_url() . '/logout' ; ?>
                        <li class="db_logout"><a href="<?php echo wp_logout_url($redirect); ?>">
                            <i></i> <span class="hidden-sm hidden-xs">  Logout</span>
                        </a></li>

                    </ul>
                </div>
            </div><!---dash_ left _side-->

            <div class=" display-table-cell v-align dash_right_side">
               
                    <div class="dash_right_side_inner">

                        <div class="myheading pos-rel">
                            <h3>My Profile</h3>

                            <a href="#change-password-popup" class="btn change_psw popup-with-zoom-anim"> Change
                                Password</a>
                            </div>
                            <div class="profile_section">
                                <?php echo $response; ?>
                                <div class="row">

                                    <form class="profile-form" data-parsley-validate="" method="POST" action="#" novalidate="" enctype="multipart/form-data">

                                        <div class="col-md-4">
                                            <fieldset class="temp disabled" disabled>

                                                <div class="profile_dp">
                                                    <?php 
                                                    $user_image= $meta['profile_image'][0];
                                                    if($user_image){ ?>
                                                      <img src="<?php echo $meta['profile_image'][0];  ?>" id="image">
                                                      <?php }else{ ?>
                                                          <img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png" id="image">
                                                          <?php } ?>
                                                          <div class="upload_dp">
                                                            <input type="file" name="profile_pic" class="form-control img" id="uplaod_dp">
                                                            <label for="uplaod_dp"><i class="fa fa-camera"
                                                              aria-hidden="true"></i></label>
                                                          </div>

                                                      </div>
                                                      <p class="error"></p>
                                                      </fieldset>
                                                  </div>

                                                  <div class="col-md-8">

                                                    <div class="row">
                                                        <fieldset class="temp disabled" disabled>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name">Name</label>

                                                                    <input type="text" placeholder=" " class="form-control " id="name"
                                                                    name="profile_name" value="<?php echo $current_user->display_name; ?>" required data-parsley-pattern="^[A-Z a-z]*$">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="lastname">Last Name</label>

                                                                    <input type="text" placeholder=" " class="form-control "
                                                                    id="lastname" name="profile_lastname" value="<?php

                                                                    echo $meta['last_name'][0];
                                                                    ?>" required data-parsley-pattern="^[A-Z a-z]*$">
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>


                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name">Gender</label>
                                                                  
                                                                      <?php $gender = $meta['wpcf-gender'][0]; ?>
                                                                
                                                                    <select class="selectpicker" title="Gender" required="" name="profile_gender" value="<?php echo $meta['wpcf-gender'][0]; ?>">
                                                                        <option value="Male" <?php if ($gender == "Male") {
                                                            echo "selected";
                                                        } ?>>Male</option>
                                                                        <option value="Female"<?php if ($gender == "Female") {
                                                            echo "selected";
                                                        } ?>>Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email ID</label>

                                                                    <input type="email" class="form-control" id="email" name="profile_email" value="<?php echo $current_user->user_email; ?>"
                                                                    required="">
                                                                </div>
                                                            </div>

                                                            <div class="clearfix"></div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name">Level Of Education</label>
                                                                    <?php
                                                                    $education = $meta['wpcf-student_education'][0];

                                                                    ?>
                                                                    <select class="selectpicker" title="education" name="student_education" required="">
                                                                        <option value="College" <?php if($education == 'College'){ echo "selected";} ?>>College</option>
                                                                        <option value="School" <?php if($education == 'School'){ echo "selected";} ?>>School</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-6">

                                                                <div class="form-group">
                                                                    <label for="dob">Date Of Birth</label>
                                                                    <div class="pos-rel"><input type="text" class="form-control datepicker" id="dob"
                                                                        name="dob" value="<?php echo $meta['wpcf-date-of-birth'][0]; ?>" data-date-end-date="0d">
                                                                        <span class="form-gp-icon"><i class="fa fa-calendar-o"
                                                                          aria-hidden="true"></i></span>
                                                                      </div>
                                                                  </div>


                                                              </div>
                                                          </fieldset>
                                                      </div>


                                                      <button type="submit" class="btn btn-default btn-block update_profile"
                                                      name="update">Update Profile
                                                  </button>
                                                  <button type="submit" class="btn btn-default btn-block edit_profile"
                                                  name="edit">Edit Profile
                                              </button>
                                              <style type="text/css">
                                                .update_profile{display:none;}
                                                fieldset.temp.disabled input{cursor:pointer;}
                                            </style>



                                        </div>
                                    </div>
                                </div><!--profile_section-->
                            </div>


                        </div><!---dash_right_side-->
                    </form>

                </div><!--row-->
            </div><!-- container-fluid display-table v-align margin_top_second pos-rel-->


            <div class="clearfix"></div>

            <!-- Change Your Password -->
            <div id="change-password-popup" class="zoom-anim-dialog mfp-hide">

                <div class="register_inner  chang_password_popup">

                    <div class="myheading">
                        <h3>Change Your Password</h3>
                    </div>

                    <form class="" data-parsley-validate="" method="POST" action="#">
                        <div class="form-group">
                            <input type="password" placeholder="Current Password" class="form-control" id=""
                            name="old_password" required="" value="">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="New Password" class="form-control" id="new_pwd"
                            name="new_password" required="" value="">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Confirm Password" class="form-control" id="cpwd"
                            name="confirm_password" data-parsley-equalto="#new_pwd" required="" value="">
                        </div>
                        <button type="submit" class="btn btn-default btn-block" name="confirm">Confirm</button>
                    </form>

                </div><!-- logo_login -->

            </div><!--  Change Your Password -->
<?php /*} else {
    $msg = "Please Login First!";
    echo "<script type='text/javascript'>alert('$msg');</script>";
}*/ ?>



<?php get_footer(); ?>


<?php TP::js('plugins/bootstrap-datepicker/js/bootstrap-datepicker'); ?>

<?php TP::js('dashboard'); ?>
<?php TP::js('profile'); ?>
<?php TP::js('testing_edgePreload'); ?>

<script>
    $(document).ready(function(){
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#uplaod_dp").change(function(){
            readURL(this);
        });
    });
</script>
<script>
$("#uplaod_dp").change(function () {
            var fileExtension = ['jpg','jpeg','png','gif'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                $('p.error').text("Only " + fileExtension.join(', ') + " formats are allowed");
                $('p.error').css('color','#B94A48');
                   $('p.error').css('font-size','14px');
                $("#uplaod_dp").uploadifyCancel(q);
                return false;
            }
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