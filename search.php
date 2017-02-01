<?php
global $wp_query;
$total_results = $wp_query->post_count;
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
<?php get_template_part('header-dashboard'); ?>
<?php TP::css('plugins/bootstrap-datepicker/css/datepicker'); ?>
<?php TP::css('plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min'); ?>
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

                                    <a href="#" data-toggle="modal" data-target="#myModal">Ask a Question with
                                        Multiple</a>

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

                                    <input type="text" name="" class="form-control"
                                           placeholder="eg. Texas, Lorem ipsum">

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

                                    <a href="#" data-toggle="modal" data-target="#myModal">Ask a Question with
                                        Multiple</a>

                                </h4>

                            </div>
                            <span style="text-align: center;"><?php echo $response; ?></span>
                            <h4><?php
                                $search = esc_attr(get_search_query());
                                echo $search; ?> Tutors</h4>

                            <?php
                            $args = array(
                                'post_type' => 'teacher',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                'meta_query' => array(array(
                                    'key' => 'wpcf-subjects-tutored',
                                    'value' => $search,
                                    'compare' => 'LIKE',
                                ),
                                ),
                            );
                            $post = get_posts($args);
                            if (empty($post)) {
                                echo "Sorry, No Result Found";
                            } else {
                                $total = count($post);
                                ?>
                                <p><b><?php echo $total; ?></b> <?php echo $search; ?> tutors found.</p>

                            <?php }
                            $count = 1;
                            foreach ($post as $posts) {
                                $post_id = $posts->ID;
                                $get_meta = get_post_meta($post_id);
                              
                                ?>
                                <?php
                                if ($count % 2 == 1) { ?>
                                    <div class="row">
                                <?php } ?>
                                <div class="col-sm-6 col-xs-6">

                                    <div class="tutors verified box">

                                        <div class="eql_height">

                                            <a href="#" class="tutor_pro">
                                                <?php
                                                if(has_post_thumbnail()){
                                                 echo get_the_post_thumbnail($posts->ID); 
                                                }else{ ?>
                                                  <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/default-user-image.png">
                                                <?php } ?>
                                                <span class="online"></span>

                                            </a>
                                            <?php $teacher_name = $posts->post_title; ?>
                                            <h5 class="t_name"><?php echo $teacher_name; ?></h5>

                                            <p><?php echo $get_meta['wpcf-subjects-tutored'][0]; ?>
                                                <br><?php echo $get_meta['wpcf-university'][0]; ?></p>

                                            <?php $sub = $get_meta['subject'][0];
                                            $subject = explode(" ", $sub);
                                            ?>
                                            <span>A class above. Guaranteed</span>

                                        </div>

                                        <?php
                                        $args_total = array(
                                            'posts_per_page' => -1,
                                            'orderby' => 'post_date',
                                            'order' => 'ASC',
                                            'post_type' => 'rate-review',
                                            'post_status' => 'publish',
                                            'meta_key' => 'wpcf-teacher-post-id',
                                            'meta_value' => $posts->ID,
                                        );
                                        $all_item_posts = new WP_Query($args_total);

                                        $total_post = $all_item_posts->post_count;

                                        if (!empty($all_item_posts)) {
                                            foreach ($all_item_posts->posts as $value) {
                                                $meta = get_post_meta($value->ID);

                                                $teacher_average_rating[] = $meta['wpcf-teacher-rating'][0];
                                            }
                                        }
                                        $rating_sum = 0;
                                        if (!empty($teacher_average_rating)) {
                                            foreach ($teacher_average_rating as $ratings) {
                                                $rating_sum = $rating_sum + $ratings;
                                            }
                                        }
                                        if (!empty($total_post)) {
                                            $average_rating_teacher = round($rating_sum / $total_post, 2);
                                        }
                                        ?>

                                        <div class="ask_book_cont">

                                            <div class="ask_book">
                                                <?php $meta = get_post_meta($value->ID); ?>
                                                <a href="#" class="btn ask_q" data-toggle="modal" data-target="#myModal"
                                                   img_id="<?php echo get_the_post_thumbnail_url($post_id); ?>"
                                                   value="<?php echo $teacher_name; ?>"
                                                   name="<?php echo $get_meta['wpcf-teacher-email'][0]; ?>">Ask a
                                                    Question</a>

                                                <a href="<?php echo site_url(); ?>/book-session/?email=<?php echo $get_meta['wpcf-teacher-email'][0]; ?>&subject=<?php echo $get_meta['wpcf-subjects-tutored'][0]; ?>"
                                                   class="btn book">Book a Session</a>

                                            </div>

                                            <div class="radial-progress <?php
                                            if ($average_rating_teacher >= 7.50) {
                                                echo "best";
                                            } elseif ($average_rating_teacher >= 5) {
                                                echo "avg";
                                            } elseif ($average_rating_teacher >= 3) {
                                                echo "poor";
                                            } else {
                                                echo "very_poor";
                                            }
                                            ?>" data-score="<?php echo $average_rating_teacher; ?>">

                                                <div class="circle">

                                                    <div class="mask full">

                                                        <div class="fill"></div>

                                                    </div>

                                                    <div class="mask half">

                                                        <div class="fill"></div>

                                                        <div class="fill fix"></div>

                                                    </div>

                                                </div>

                                                <div class="inset"><span
                                                        class='big'><?php if (!empty($average_rating_teacher)) {
                                                            echo $average_rating_teacher;
                                                        } else {
                                                            echo "NA";
                                                        } ?></span><!--  <span class='little'>/ 5</span> --></div>

                                            </div>

                                            <div class="contact_tutor">

                                                <a href="#">Contact <?php echo $posts->post_title; ?></a>

                                            </div>

                                        </div>

                                        <span class="bdrs brd-top"></span>

                                        <span class="bdrs brd-bottom"></span>

                                    </div>

                                </div>

                                <?php
                                if ($count % 2 == 0) { ?>
                                    </div>
                                <?php } ?>

                                <?php $count++;
                            }
                            ?>

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

                        <img
                            src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/abt_logo.png">

                    </div>

                </div>

                <div class="modal-body content">

                    <form data-parsley-validate="" method="POST" action="" enctype="multipart/form-data">

                        <div class="row">

                            <div class="form-group select_here">

                                <label><p>Required By:</p></label>

                                <div class="input_grp">
                                    <div>

                                        <input id="live" type="radio" name="ask_session_type" value="live" required="">

                                        <label for="live" class="radio-inline">Live Session</label>

                                    </div>

                                    <div>

                                        <input id="written" type="radio" name="ask_session_type" value="written"
                                               required="">

                                        <label for="written" class="radio-inline">Written Session</label>

                                    </div>

                                </div>

                            </div>

                            <div class="col-sm-6 col-xs-6">

                                <div class="select_group">

                                    <div class="form-group">

                                        <input class="form-control" type="text" name="ask_subject" placeholder="Physics"
                                               value="<?php echo $subject[0]; ?>">

                                        <input class="form-control" id="t_name" type="hidden" name="ask_teacher">

                                        <input class="form-control" id="post_id" type="hidden" name="post_id">

                                        <input class="form-control" id="t_id" type="hidden" name="ask_teacher_email">

                                    </div>

                                    <div class="form-group">

                                        <select class="selectpicker" title="" required="" name="ask_hours_needed">

                                            <option data-hidden="true" value="">Select Hours Needed</option>

                                            <option value="1">01</option>

                                            <option value="2">02</option>

                                            <option value="3">03</option>

                                        </select>

                                    </div>

                                    <div class="form-group">

                                        <input type="text" placeholder="Select Date" class="form-control datepicker"
                                               id="" name="ask_select_date" required="" value="" data-date-start-date="0d">

                                        <span class="form-gp-icon"><i class="fa fa-calendar-o"
                                                                      aria-hidden="true"></i></span>
                                       <input type="hidden" id="path" value="<?php echo get_template_directory_uri(); ?>/assets/img/default-user-image.png">
                                    </div>

                                </div>

                            </div>

                            <div class="col-sm-6 col-xs-6">

                                <div class="form-group">

                                    <textarea class="form-control" id="comment" placeholder="Describe your problem"
                                              name="ask_problem" required=""></textarea>

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


                                            <input type="file" name="attachments" id="filer_input" multiple="multiple">

                                            <!-- <label for="newtutor">Upload</label> -->

                                        </div>


                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="tutors_imgs">

                                        <div class="t_img">

                                            <a href="#" class="teacher_image">

                                                <img src="">

                                                <span>&times;</span>

                                            </a>

                                        </div>

                                        <!-- <div class="t_img">

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


<?php TP::js('plugins/bootstrap-datepicker/js/bootstrap-datepicker'); ?>

<?php TP::js('plugins/bootstrap-datetimepicker/js/moment'); ?>

<?php TP::js('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min'); ?>

<?php TP::js('plugins/jQuery.filer/jquery.filer'); ?>

<?php TP::js('search'); ?>
<?php TP::js('testing_edgePreload'); ?>
    <script>
        $(document).ready(function () {
            $('.ask_q').click(function () {
                $('h5.t_name').text();
                var sub = $(this).attr('value');
                var email = $(this).attr('name');
                var path  = $('#path').val();
                var post_img = $(this).attr('img_id');
                $('#t_name').attr('value', sub);
                $('#t_id').attr('value', email);
                $('#p_id').attr('value', post_id);
                if(post_img){
                $('.teacher_image img').attr('src', post_img);
                }else{ 
                     $('.teacher_image img').attr('src',path);
                }           
                 });
        });
    </script>
<?php get_template_part('inc/document_end'); ?>