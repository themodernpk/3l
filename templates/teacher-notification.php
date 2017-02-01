<?php
/*
Template Name: Teacher Notification
*/
?>
<?php
$user = wp_get_current_user();
if (is_user_logged_in() && $user->roles[0] == "teacher") {
    ?>
    <!-- /////////////// Start Teacher Notification ////////////////////////// -->

    <?php get_template_part("header-dashboard"); ?>
    <?php TP::css('dashboard'); ?>
    <?php TP::css('notification'); ?>
    <?php TP::css('teacher-notification'); ?>
    <?php TP::css('plugins/hover-master/hover'); ?>
    <?php $user_id = get_current_user_id();
//$user_meta = get_user_meta($user_id);
    $user_meta = array_filter(array_map(function ($a) {
        return $a;
    }, get_user_meta($user_id)));

    $arr_status  = $user_meta['booking_status'];   

    $ques_status = $user_meta['question_status'];

    $ask_ques_id = $user_meta['question_id'];
    $ask_date = $user_meta['asked_date'];
    $ask_time = $user_meta['asked_time'];
    $ask_by = $user_meta['asked_by'];
    $ask_subject = $user_meta['asked_for_subject'];
    $ask_hours = $user_meta['asked_for_hours'];
    $ask_select_date = $user_meta['asked_for_select_date'];
    $ask_problem = $user_meta['asked_for_problem'];
    $question_image = $user_meta['question_image'];
    $ask_session = $user_meta['asked_for_session'];
    $ask_user_image = $user_meta['asked_user_image'];
    $ask_by_user_id = $user_meta['asked_by_user_id'];

    $book_date = $user_meta['booked_at_date'];
    $book_time = $user_meta['book_at_time'];
    $book_by = $user_meta['book_by_user'];
    $book_user_image = $user_meta['book_user_image'];
    $book_subject = $user_meta['book_for_subject'];
    $book_start_time = $user_meta['book_start_time'];
    $book_hours = $user_meta['book_needed_hours'];
    $book_select_date = $user_meta['book_for_date'];
    $book_problem = $user_meta['book_for_problem'];
    $book_class_id = $user_meta['booked_class_id'];
    $book_session = $user_meta['book_for_session'];
    $book_user_image = $user_meta['book_user_image'];
    $booker_user_id = $user_meta['book_by_user_id'];

    $booking_status = $user_meta['booking_status'];

    $reschedule_by = $user_meta['reschedule_by'];
    $reschedule_by_id = $user_meta['reschedule_by_id'];
    $reschedule_class_id = $user_meta['reschedule_class_id'];
    $reschedule_subject = $user_meta['reschedule_subject'];
    $reschedule_session_type = $user_meta['reschedule_session_type'];
    $reschedule_old_start_date = $user_meta['reschedule_old_start_date'];
    $reschedule_old_start_time = $user_meta['reschedule_old_start_time'];
    $reschedule_new_start_time = $user_meta['reschedule_new_start_time'];
    $reschedule_new_start_date = $user_meta['reschedule_new_start_date'];
    $reschedule_by_image = $user_meta['reschedule_by_image'];
    $reschedule_at_time = $user_meta['reschedule_at_time'];
    $reschedule_at_date = $user_meta['reschedule_at_date'];
    ?>

    <div class="container-fluid display-table v-align margin_top_second pos-rel" style="">
        <div class="row display-table-row">
            <button class="vk_toggle vk_toggle--htla visible-xs">
                <span>toggle menu</span>
            </button>
            <div class=" display-table-cell v-align dash_left_side" id="navigation_left">

                <div class="side_bar">
                    <style>
                        p.notify.error {
                            background: rgba(214, 82, 68, 0.41);
                            color: rgba(255, 0, 0, 0.89);
                            font-weight: inherit;
                            font-size: 17px;
                        }
                    </style>
                    <h6>MENU</h6>
                    <ul>
                        <li class="db_dashboard "><a href="<?php echo site_url(); ?>/teacher-dashboard/">
                                <i></i> <span class="hidden-sm hidden-xs"> Dashboard</span>
                            </a></li>

                        <li class="db_profile"><a href="<?php echo site_url(); ?>/teacher-edit-profile//">
                                <i></i> <span class="hidden-sm hidden-xs"> Profile</span>
                            </a></li>

                        <li class="db_notification active"><a href="<?php echo site_url(); ?>/teacher-notification/">
                                <i></i> <span class="hidden-sm hidden-xs">  Notification</span>
                            </a></li>

                        <li class="db_paymenthistory"><a href="<?php echo site_url(); ?>/teacher-payment-history/">
                                <i></i> <span class="hidden-sm hidden-xs">Payment History</span>
                            </a></li>

                        <?php $redirect = site_url() . '/logout'; ?>
                        <li class="db_logout"><a href="<?php echo wp_logout_url($redirect); ?>">
                                <i></i> <span class="hidden-sm hidden-xs">  Logout</span>
                            </a></li>

                    </ul>
                </div>
            </div>


            <div class="display-table-cell v-align dash_right_side">

                <div class="dash_right_side_inner">

                    <div class="myheading">
                        <h3>Notification</h3>
                    </div>
                    <p class="notify"></p>
                    <div class="notification_section">
                    <?php if(empty($ask_date || $book_date || $reschedule_at_date)){
                        echo "<h5 style='text-align:center;'>There is No Notification</h5>"; 
                        } ?>
                        <ul class="notification_ul">
                            <?php

                            // The Query
                            if (!empty($ask_date)) {
                                krsort($ask_date);
                                foreach ($ask_date as $key => $date) {
                                    ?>
                                    <li>
                                        <div class="n_time">
                                            <h4><i class="fa fa-circle-o" aria-hidden="true"></i>
                                                <?php echo $date; ?>,
                                                <?php echo $ask_time[$key]; ?> </h4>
                                        </div>

                                        <div class="n_about">
                                            <div class="media confirm">
                                                <a class="media-left " href="#">
                                                    <img class="media-object ys_user"
                                                         src="<?php if (!empty($ask_user_image[$key])) {
                                                             echo $ask_user_image[$key];
                                                         } else {
                                                             echo 'http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png';
                                                         } ?>" alt="Generic placeholder image">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <span><?php echo $ask_by[$key]; ?> </span> requested a <span>question</span>
																<span
                                                                    class="not_status <?php if (is_array($ques_status)) {
                                                                                        if (in_array('accepted' . $ask_ques_id[$key]
                                                                                                , $ques_status, true)) {
	                                                                                            echo "accepted";
	                                                                                        } elseif (in_array('cancelled' . $ask_ques_id[$key]
	                                                                                            , $ques_status, true)) {
	                                                                                            echo 'cancelled';
	                                                                                        } else {
	                                                                                            echo 'pending';
	                                                                                        }
                                                                                    } ?>">
																	<?php
                                                                     if (is_array($ques_status)) {
                                                                                        if (in_array('accepted' . $ask_ques_id[$key]
                                                                                                , $ques_status, true)) {
	                                                                                            echo "accepted";
	                                                                                        } elseif (in_array('cancelled' . $ask_ques_id[$key]
	                                                                                            , $ques_status, true)) {
	                                                                                            echo 'cancelled';
	                                                                                        } else {
	                                                                                            echo 'pending';
	                                                                                        }
                                                                                    } ?></span></h4>
                                                    <p><?php echo $ask_problem[$key]; ?></p>
                                                    <?php if(!empty($exp_arr)) { ?>
                                                   <ul class="attachment_ul">
                                                   <?php 
                                                        $exp_arr = explode('"',$question_image[$key]);
                                                        $count = 0;
                                                        if(!empty($exp_arr)){
                                                        foreach ($exp_arr as $index => $value) {
                                                            if($count%2 == 1){
                                                               $prob_img = explode('/',$value);
                                                         ?><li><a href="<?php echo $value; ?>" target="_blank"> <?php echo  end($prob_img); ?></a></li>
                                                         <?php
                                                        }
                                                        $count++;
                                                            }}

                                                   ?></ul>
                                                   <?php } ?>
                                                    <ul class="confirm_li">
                                                        <li><b>Subject :</b><?php echo $ask_subject[$key]; ?></li>
                                                        <li><b>Duration:</b> <?php echo $ask_hours[$key]; ?> hours</li>
                                                        <li><b>Date & Time:</b> <?php echo $ask_select_date[$key]; ?>
                                                        </li>
                                                        <li><b>Session Type:</b> <?php echo $ask_session[$key]; ?>
                                                            Session
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="n_chat action_detail">
                                            <ul>
                                                <form action="" method="post" id="ys_accept_question">
                                                    <?php 
                                                    if(empty($ques_status)) { ?>
                                                         <li>
                                                            <a class="accept_a hvr-icon-pop hvr-icon-ok accept_question" data-question_id="<?php echo $ask_ques_id[$key]; ?>"
                                                               data-student_id="<?php echo $ask_by_user_id[$key]; ?>"
                                                               data-teacher_id="<?php echo $user->ID; ?>"
                                                               data-teacher_name="<?php echo $user->data->display_name; ?>"
                                                               data-ask_subject="<?php echo $ask_subject[$key]; ?>"
                                                               data-ask_hours="<?php echo $ask_hours[$key]; ?>"
                                                               ask_select_date="<?php echo $ask_select_date[$key]; ?>"
                                                               data-ask_problem="<?php echo $ask_problem[$key]; ?>"
                                                               data-ask_session="<?php echo $ask_session[$key]; ?>"
                                                               data-ask_teacher_image="<?php echo $user_meta['profile_image'][0]; ?>">

                                                                <input type="submit" value="Accept" id="accept_question"
                                                                       name="accept_question">

                                                            </a></li>
                                                        <li><a class="decline_a hvr-icon-sink-away reject_question" data-question_id="<?php echo $ask_ques_id[$key]; ?>"
                                                               data-student_id="<?php echo $ask_by_user_id[$key]; ?>"
                                                               data-teacher_id="<?php echo $user->ID; ?>"
                                                               data-teacher_name="<?php echo $user->data->display_name; ?>"
                                                               data-ask_subject="<?php echo $ask_subject[$key]; ?>"
                                                               data-ask_hours="<?php echo $ask_hours[$key]; ?>"
                                                               ask_select_date="<?php echo $ask_select_date[$key]; ?>"
                                                               data-ask_problem="<?php echo $ask_problem[$key]; ?>"
                                                               data-ask_session="<?php echo $ask_session[$key]; ?>"
                                                               data-ask_teacher_image="<?php echo $user_meta['profile_image'][0]; ?>">
                                                                <input type="submit" value="Decline"
                                                                       id="reject_question"/></a></li>
                                                  <?php  }                                                                                                  
                                                   elseif (in_array('accepted' . $ask_ques_id[$key], $ques_status, true) || in_array('cancelled' . $ask_ques_id[$key], $ques_status, true)) { ?>
                                                        <style>
                                                            .accept_question, .cancel_question {
                                                                display: none;
                                                            }
                                                        </style>
                                                    <?php }  else { ?>
                                                        <li>
                                                            <a class="accept_a hvr-icon-pop hvr-icon-ok accept_question" data-question_id="<?php echo $ask_ques_id[$key]; ?>"
                                                               data-student_id="<?php echo $ask_by_user_id[$key]; ?>"
                                                               data-teacher_id="<?php echo $user->ID; ?>"
                                                               data-teacher_name="<?php echo $user->data->display_name; ?>"
                                                               data-ask_subject="<?php echo $ask_subject[$key]; ?>"
                                                               data-ask_hours="<?php echo $ask_hours[$key]; ?>"
                                                               ask_select_date="<?php echo $ask_select_date[$key]; ?>"
                                                               data-ask_problem="<?php echo $ask_problem[$key]; ?>"
                                                               data-ask_session="<?php echo $ask_session[$key]; ?>"
                                                               data-ask_teacher_image="<?php echo $user_meta['profile_image'][0]; ?>">

                                                                <input type="submit" value="Accept" id="accept_question"
                                                                       name="accept_question">

                                                            </a></li>
                                                        <li><a class="decline_a hvr-icon-sink-away reject_question" data-question_id="<?php echo $ask_ques_id[$key]; ?>"
                                                               data-student_id="<?php echo $ask_by_user_id[$key]; ?>"
                                                               data-teacher_id="<?php echo $user->ID; ?>"
                                                               data-teacher_name="<?php echo $user->data->display_name; ?>"
                                                               data-ask_subject="<?php echo $ask_subject[$key]; ?>"
                                                               data-ask_hours="<?php echo $ask_hours[$key]; ?>"
                                                               ask_select_date="<?php echo $ask_select_date[$key]; ?>"
                                                               data-ask_problem="<?php echo $ask_problem[$key]; ?>"
                                                               data-ask_session="<?php echo $ask_session[$key]; ?>"
                                                               data-ask_teacher_image="<?php echo $user_meta['profile_image'][0]; ?>">
                                                                <input type="submit" value="Decline"
                                                                       id="reject_question"/></a></li>
                                                    <?php } ?>
                                                    <li><a href="javascript:void(0)"
                                                           onclick="javascript:jqcc.cometchat.chatWith('<?php echo $ask_by_user_id[$key]; ?>');"
                                                           class="chat_now_a_second hvr-icon-drop"> Chat now</a></li>
                                                </form>
                                            </ul>
                                        </div>

                                    </li>
                                <?php }
                            } ?>

                            <?php
                            if (!empty($book_date)) {
                                krsort($book_date);
                                foreach ($book_date as $key => $date) {
                                    ?>
                                    <li>
                                        <div class="n_time">
                                            <h4><i class="fa fa-circle-o"
                                                   aria-hidden="true"></i><?php echo $date . ',' . $book_time[$key]; ?>
                                            </h4>
                                        </div>

                                        <div class="n_about">
                                            <div class="media confirm">
                                                <a class="media-left " href="#">
                                                    <img class="media-object ys_user"
                                                         src="<?php if (!empty($book_user_image[$key])) {
                                                             echo $book_user_image[$key];
                                                         } else {
                                                             echo 'http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png';
                                                         } ?>" alt="Generic placeholder image">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><span><?php
                                                            echo $book_by[$key]; ?>  </span> requested a
                                                        <span>session</span>

																					<span class="not_status
																					<?php
                                                                                    if (is_array($arr_status)) {
                                                                                        if (in_array('accepted' . $book_class_id[$key]
                                                                                                , $arr_status, true) || in_array('consumed' . $book_class_id[$key]
                                                                                                , $arr_status, true) || in_array('rescheduled' . $book_class_id[$key]
                                                                                                , $arr_status, true)
                                                                                        ) {
                                                                                            echo "accepted";
                                                                                        } elseif (in_array('cancelled' . $book_class_id[$key]
                                                                                            , $arr_status, true)) {
                                                                                            echo "cancelled";
                                                                                        } else {
                                                                                            echo "pending";
                                                                                        }
                                                                                    } ?>">
<?php
if (is_array($arr_status)) {
    if (in_array('accepted' . $book_class_id[$key]
            , $arr_status, true) || in_array('consumed' . $book_class_id[$key]
            , $arr_status, true) || in_array('rescheduled' . $book_class_id[$key]
            , $arr_status, true)
    ) {
        echo "accepted";
    } elseif (in_array('cancelled' . $book_class_id[$key]
        , $arr_status, true)) {
        echo "cancelled";
    } else {
        echo "pending";
    }
} ?>
</span>
                                                    </h4>
                                                    <ul class="confirm_li">
                                                        <li><b>Subject :</b> <?php echo $book_subject[$key]; ?> </li>

                                                        <li><b>Duration:</b> <?php echo $book_hours[$key]; ?></li>
                                                        <li><b>Date & Time:</b> <?php echo $book_select_date[$key]; ?>
                                                            , <?php echo $book_start_time[$key]; ?>  </li>
                                                        <li><b>Session Type:</b> <?php echo $book_session[$key]; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="n_chat action_detail">
                                            <ul>
                                                <form action="" method="post" id="ys_accept_session">
                                                     <?php 
                                                    if(empty($arr_status)) { ?>
                                                    <li>
                                                                <a class="accept_a hvr-icon-pop hvr-icon-ok accept_session"
                                                                   studentid="<?php echo $booker_user_id[$key]; ?>"
                                                                   teacherid="<?php echo $user->ID; ?>"
                                                                   teachername="<?php echo $user->data->display_name; ?>"
                                                                   sessionsubject="<?php echo $book_subject[$key]; ?>"
                                                                   sessionduration="<?php echo $book_hours[$key]; ?>"
                                                                   sessiondate="<?php echo $book_select_date[$key]; ?>"
                                                                   sessiontype="<?php echo $book_session[$key]; ?>"
                                                                   teacherimage="<?php echo $user_meta['profile_image'][0]; ?>"
                                                                   bookby="<?php echo $book_by[$key]; ?>"
                                                                   bookuserimage="<?php echo $book_user_image[$key]; ?>"
                                                                   bookedclassid="<?php echo $book_class_id[$key]; ?> "
                                                                   bookproblem="<?php echo $book_problem[$key]; ?> "
                                                                   start_time="<?php echo $book_start_time[$key]; ?>">
                                                                    <input type="submit" class="ys_accept" name="accept_session"
                                                                           value="Accept">
                                                                </a>

                                                            </li>
                                                            <li>
                                                                <a href=""
                                                                   class="decline_a hvr-icon-sink-away cancel_session"
                                                                   studentid="<?php echo $booker_user_id[$key]; ?>"
                                                                   teacherid="<?php echo $user->ID; ?>"
                                                                   teachername="<?php echo $user->data->display_name; ?>"
                                                                   sessionsubject="<?php echo $book_subject[$key]; ?>"
                                                                   sessionduration="<?php echo $book_hours[$key]; ?>"
                                                                   sessiondate="<?php echo $book_select_date[$key]; ?>"
                                                                   sessiontype="<?php echo $book_session[$key]; ?>"
                                                                   teacherimage="<?php echo $user_meta['profile_image'][0]; ?>"
                                                                   bookby="<?php echo $book_by[$key]; ?>"
                                                                   bookuserimage="<?php echo $book_user_image[$key]; ?>"
                                                                   bookedclassid="<?php echo $book_class_id[$key]; ?> "
                                                                   bookproblem="<?php echo $book_problem[$key]; ?> ">
                                                                    <input type="submit" class="ys_decline" name="cancel_session"
                                                                           value="Decline"></a></li>
                                                    <?php } elseif (in_array('accepted' . $book_class_id[$key], $arr_status, true)  || 
                                                            in_array('cancelled' . $book_class_id[$key], $arr_status, true) ||
                                                            in_array('consumed' . $book_class_id[$key], $arr_status, true) ) {
                                                            ?>
                                                            <style>
                                                                .accept_session, .cancel_session {
                                                                    display: none;
                                                                }
                                                            </style>
                                                        <?php }  else { ?>
                                                            <li>
                                                                <a class="accept_a hvr-icon-pop hvr-icon-ok accept_session"
                                                                   studentid="<?php echo $booker_user_id[$key]; ?>"
                                                                   teacherid="<?php echo $user->ID; ?>"
                                                                   teachername="<?php echo $user->data->display_name; ?>"
                                                                   sessionsubject="<?php echo $book_subject[$key]; ?>"
                                                                   sessionduration="<?php echo $book_hours[$key]; ?>"
                                                                   sessiondate="<?php echo $book_select_date[$key]; ?>"
                                                                   sessiontype="<?php echo $book_session[$key]; ?>"
                                                                   teacherimage="<?php echo $user_meta['profile_image'][0]; ?>"
                                                                   bookby="<?php echo $book_by[$key]; ?>"
                                                                   bookuserimage="<?php echo $book_user_image[$key]; ?>"
                                                                   bookedclassid="<?php echo $book_class_id[$key]; ?> "
                                                                   bookproblem="<?php echo $book_problem[$key]; ?> "
                                                                   start_time="<?php echo $book_start_time[$key]; ?>">
                                                                    <input type="submit" class="ys_accept" name="accept_session"
                                                                           value="Accept">
                                                                </a>

                                                            </li>
                                                            <li>
                                                                <a href=""
                                                                   class="decline_a hvr-icon-sink-away cancel_session"
                                                                   studentid="<?php echo $booker_user_id[$key]; ?>"
                                                                   teacherid="<?php echo $user->ID; ?>"
                                                                   teachername="<?php echo $user->data->display_name; ?>"
                                                                   sessionsubject="<?php echo $book_subject[$key]; ?>"
                                                                   sessionduration="<?php echo $book_hours[$key]; ?>"
                                                                   sessiondate="<?php echo $book_select_date[$key]; ?>"
                                                                   sessiontype="<?php echo $book_session[$key]; ?>"
                                                                   teacherimage="<?php echo $user_meta['profile_image'][0]; ?>"
                                                                   bookby="<?php echo $book_by[$key]; ?>"
                                                                   bookuserimage="<?php echo $book_user_image[$key]; ?>"
                                                                   bookedclassid="<?php echo $book_class_id[$key]; ?> "
                                                                   bookproblem="<?php echo $book_problem[$key]; ?> ">
                                                                    <input type="submit" class="ys_decline" name="cancel_session"
                                                                           value="Decline"></a></li>
                                                        <?php }  ?>
                                                    <li><a href="javascript:void(0)"
                                                           onclick="javascript:jqcc.cometchat.chatWith('<?php echo $booker_user_id[$key]; ?>');"
                                                           class="chat_now_a_second hvr-icon-drop"> Chat now</a></li>
                                                </form>
                                            </ul>
                                        </div>
                                    </li>
                                <?php }
                            } ?>

                            <?php
                            if (!empty($reschedule_at_date)) {
                                krsort($reschedule_at_date);
                                foreach ($reschedule_at_date as $key => $date) {
                                    ?>
                                    <li>
                                        <div class="n_time">
                                            <h4><i class="fa fa-circle-o" aria-hidden="true"></i><?php echo $date; ?>,
                                                <?php echo $reschedule_at_time[$key]; ?></h4>
                                        </div>

                                        <div class="n_about">
                                            <div class="media confirm">
                                                <a class="media-left " href="#">
                                                    <img class="media-object ys_user"
                                                         src="<?php if (!empty($reschedule_by_image[$key])) {
                                                             echo $reschedule_by_image[$key];
                                                         } else {
                                                             echo 'http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png';
                                                         } ?>">
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
                                                            <?php echo $reschedule_new_start_date[$key]; ?>
                                                            , <?php echo $reschedule_new_start_time[$key]; ?>  </li>
                                                        <li><b>Session Type:</b>
                                                            <?php echo $reschedule_session_type[$key]; ?> Session
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="n_chat action_detail">
                                            <ul>
                                                <li>
                                                    <a class="accept_a hvr-icon-pop hvr-icon-ok accept_reschedule"
                                                       data-student_id="<?php echo $reschedule_by_id[$key]; ?>"
                                                       data-teacher_id="<?php echo $user->ID; ?>"
                                                       data-class_id="<?php echo $reschedule_class_id[$key]; ?>"
                                                       data-new_date="<?php echo $reschedule_new_start_date[$key]; ?>"
                                                       data-new_time="<?php echo $reschedule_new_start_time[$key]; ?>"
                                                       data-old_date="<?php echo $reschedule_old_start_date[$key]; ?>"
                                                       data-old_time="<?php echo $reschedule_old_start_time[$key]; ?>">Accept</a>
                                                </li>
                                                <li>
                                                    <a class="decline_a hvr-icon-sink-away cancel_reschedule"
                                                       data-student_id="<?php echo $reschedule_by_id[$key]; ?>"
                                                       data-teacher_id="<?php echo $user->ID; ?>"
                                                       data-class_id="<?php echo $reschedule_class_id[$key]; ?>">Decline</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                       onclick="javascript:jqcc.cometchat.chatWith('<?php echo $reschedule_by_id[$key]; ?>');"
                                                       class="btn"> Chat Now</a></li>
                                            </ul>
                                        </div>

                                    </li>

                                <?php }
                            } ?>

                        </ul>
                    </div>

                </div>
            </div><!--display-table-cell v-align dash_right_side-->

        </div>
    </div><!--container-fluid display-table v-align margin_top_second pos-rel-->

    <?php get_footer(); ?>

    <?php TP::js('dashboard'); ?>
    <?php TP::js('teacher_notification'); ?>
    <?php TP::js('testing_edgePreload'); ?>

    <?php get_template_part('inc/document_end'); ?>

<?php } elseif (is_user_logged_in() && $user->roles[0] == "student") {
    $url = site_url('student-dashboard');
    wp_redirect($url);
} else {
    $url = site_url();
    wp_redirect($url);
}
?>
