<?php
/*
Template Name: teacher_profile_edit
*/
?>
<?php
$user = wp_get_current_user();
if (is_user_logged_in() && $user->roles[0] == "teacher") {
    $meta = get_user_meta($user->ID);
    $qd = $meta['wpcf-qualification_documents'][0];
    $doc = unserialize($qd);
  
    $post = $meta['post_id'][0];

////////////////////////////////////  Update Teacher //////////////////////////
    get_template_part('inc/imageupload');
    if (isset($_POST['update'])) {    
        extract($_POST);    
        $image = $_FILES['profile_pic'];
        $key_value = array(
            'wpcf-university' => $university,            
            'wpcf-subjects-of-expertise' => $subject_expertise,
            'wpcf-subjects-tutored' => $subject_tutored,
            'wpcf-teaching-experience' => $experience,
            'wpcf-extracurricular-interests' => $interest,
            'wpcf-location' => $location,
            'wpcf-teacher-gender' => $gender,
            'wpcf-time-to-contact' => $time_to_contact,
            'wpcf-teacher-moto' => $moto,
            'wpcf-top-subject' => $top_subject,
            'wpcf-top-subject-description' => $top_subject_description,
            'wpcf-start-time-to-contact' => $start_time_to_contact,           
            'wpcf-end-time-to-contact' => $end_time_to_contact
            
        );
    
    foreach ($key_value as $key => $val) {
            $added[] = update_user_meta($user->ID, $key, $val);
            $added1[] = update_post_meta($post, $key, $val);
            $added_meta = update_post_meta($post, 'user_id', $user->ID);
        }
    
   $no_row = count( get_field('language') );   
  if($no_row >= 1){
    $count=0;
         foreach ($language as $lang) {    
           if($count > 0){
            print_r($lang);
                 add_row('language', $lang, $post); 
                } $count++; }        
         }    


     if (!function_exists('wp_handle_upload'))
            require_once(ABSPATH . '/wp-load.php');
        require_once(ABSPATH . 'wp-admin' . '/includes/file.php');
        require_once(ABSPATH . 'wp-admin' . '/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $uploaddir = wp_upload_dir();
        $myDirUrl = $uploaddir['url'];
        $required_documents = $_FILES['document']['name'];

        foreach ($required_documents as $documents) {
            $documents_path[] = $myDirUrl . '/' . $documents;
            $qualification_documents = update_user_meta($user->ID, 'wpcf-qualification_documents', $documents_path);
        }

    if(!empty(is_array($added))){
                $response = '<div class="alert alert-success" role="alert"><b>Well done!</b> You successfully Updated your account</div>';
                
        }else{
                $response = '<div class="alert alert-danger" role="alert"><b>Oh snap!</b>Error while updating account</div>';
                $url      = site_url('/teacher-edit-profile/');
                            wp_redirect($url);
        }
}

/////////////////////////////////////  Change Password  /////////////////////////
    if (isset($_POST['confirm'])) {
        $current_user = wp_get_current_user();
        $check = wp_check_password($_POST['old_password'], $current_user->data->user_pass, $current_user->data->ID);
        if ($check) {
            $new_password = $_POST['new_password'];
            wp_set_password($new_password, $current_user->data->ID);
            $response = '<div class="alert alert-success" role="alert"><b>Well done!</b> You successfully changed your password</div>';
        } else {
            $response = '<div class="alert alert-danger" role="alert"><b>Oh snap!</b>Error while changing password</div>';
        }
    }

///////////////////////////////// check user verified //////////////////////

    $verify = $meta['active'][0];
    if ($verify != 1) { ?>
        <style>
            h3.heading {
                background-color: #de5b5b !important;
            }
        </style>
        <?php
    }

    ?>
    <?php get_template_part("header-dashboard"); ?>
    <?php TP::css('dashboard'); ?>
    <?php TP::css('profile'); ?>
    <?php TP::css('plugins/jQuery.filer/jquery.filer'); ?>
    <?php TP::css('plugins/bootstrap-datepicker/css/datepicker'); ?>
    <?php TP::css('teacher_profile_edit'); ?>


    <div class="container-fluid display-table v-align margin_top_second pos-rel" style="">
        <div class="row display-table-row">
            <button class="vk_toggle vk_toggle--htla visible-xs">
                <span>toggle menu</span>
            </button>
            <div class=" display-table-cell v-align dash_left_side" id="navigation_left">

                <div class="side_bar">

                    <h6>MENU</h6>
                    <ul>
                        <li class="db_dashboard "><a href="<?php echo site_url(); ?>/teacher-dashboard/">
                                <i></i> <span class="hidden-sm hidden-xs"> Dashboard</span>
                            </a></li>

                        <li class="db_profile active"><a href="<?php echo site_url(); ?>/teacher-edit-profile/">
                                <i></i> <span class="hidden-sm hidden-xs"> Profile</span>
                            </a></li>


                        <li class="db_notification "><a href="<?php echo site_url(); ?>/teacher-notification/">
                                <i></i> <span class="hidden-sm hidden-xs">  Notification</span>
                            </a></li>

                        <li class="db_paymenthistory "><a href="<?php echo site_url(); ?>/teacher-payment-history/">
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


                    <div class="width1170px">

                        <div class="edit_profile"><!--container-->
                            <?php echo $response; 
                            if(!empty($response)){ ?>
                                <script>
                                   window.onload = function() {
                                    if(!window.location.hash) {
                                        window.location = window.location + '#loaded';
                                        window.location.reload();
                                    }
                                }
                               </script>
                            <?php }
                            ?>
                            <form action="" method="POST" data-parsley-validate="" novalidate=""
                                  enctype="multipart/form-data">

                                <div class="btn_set">
                                    <a href="#change-password-popup" class="btn popup-with-zoom-anim change_pswd ">Change
                                        Password</a>
                                    <button type="submit" class="btn save_n_update" name="update">Save and update
                                    </button>
                                </div>
                                <div class="profile_div">
                                    <h3 class="heading">My Profile</h3>
                                    <div class="content">
                                        <div class="profile_dp">
                                            <?php
                                            $user_image = $meta['profile_image'][0];
                                            if ($user_image) { ?>
                                                <img src="<?php echo $meta['profile_image'][0]; ?>" id="image">
                                            <?php } else { ?>
                                                <img
                                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/default-user-image.png"
                                                    id="image">
                                            <?php } ?>
                                            <div class="upload_dp">
                                                <input type="file" name="profile_pic" class="form-control img"
                                                       id="uplaod_dp">
                                                <label for="uplaod_dp"><i class="fa fa-camera"
                                                                          aria-hidden="true"></i></label>
                                            </div>

                                        </div>
                                    </div><!--content over-->
                                    <p class="error"></p>
                                    <div class="clearfix"></div>
                                </div><!--profile_div-->


                                <!-- OVER TOP PART-->
                                <div class="clearfix"></div>

                                <div class="flex_container">
                                    <div class="flex_content abt_me_container">
                                        <div class="abt_me">
                                            <h3 class="heading">About Me</h3>
                                            <div class="content">

                                                <div class="form-group">
                                                    <label for="text">Name</label>
                                                    <input type="text" placeholder="Name" class="form-control"
                                                           id="t_name" name="user_name"
                                                           value="<?php echo $user->data->display_name; ?>">
                                                </div>
                                                <input type="hidden" name="location_value" id="country"
                                                       value="<?php echo $meta['wpcf-location'][0]; ?>">
                                                <div class="form-group">
                                                    <label for="text">Location</label>
                                                    <select class="selectpicker country" placeholder="vikas"
                                                            name="location"
                                                            value="<?php echo $meta['wpcf-location'][0]; ?>" required>
                                                        <!-- <option>Select Your Country</option> -->
                                                        <option
                                                            value=""><?php echo $meta['wpcf-location'][0]; ?></option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="Åland Islands">Åland Islands</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antarctica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia, Plurinational State of">Bolivia,
                                                            Plurinational State of
                                                        </option>
                                                        <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint
                                                            Eustatius and Saba
                                                        </option>
                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                                        </option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="BV">Bouvet Island</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="BN">Brunei Darussalam</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CX">Christmas Island</option>
                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CG">Congo</option>
                                                        <option value="CD">Congo, the Democratic Republic of the
                                                        </option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CI">Côte d'Ivoire</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CW">Curaçao</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GQ">Equatorial Guinea</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="TF">French Southern Territories</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GG">Guernsey</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HM">Heard Island and McDonald Islands</option>
                                                        <option value="VA">Holy See (Vatican City State)</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran, Islamic Republic of</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JE">Jersey</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KP">Korea, Democratic People's Republic of
                                                        </option>
                                                        <option value="KR">Korea, Republic of</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Lao People's Democratic Republic</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macao</option>
                                                        <option value="MK">Macedonia, the former Yugoslav Republic of
                                                        </option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="YT">Mayotte</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="FM">Micronesia, Federated States of</option>
                                                        <option value="MD">Moldova, Republic of</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="MP">Northern Mariana Islands</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PW">Palau</option>
                                                        <option value="PS">Palestinian Territory, Occupied</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RE">Réunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russian Federation</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="BL">Saint Barthélemy</option>
                                                        <option value="SH">Saint Helena, Ascension and Tristan da
                                                            Cunha
                                                        </option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint Lucia</option>
                                                        <option value="MF">Saint Martin (French part)</option>
                                                        <option value="PM">Saint Pierre and Miquelon</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="WS">Samoa</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="ST">Sao Tome and Principe</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="GS">South Georgia and the South Sandwich
                                                            Islands
                                                        </option>
                                                        <option value="SS">South Sudan</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syrian Arab Republic</option>
                                                        <option value="TW">Taiwan, Province of China</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania, United Republic of</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TL">Timor-Leste</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TK">Tokelau</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad and Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TC">Turks and Caicos Islands</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US">United States</option>
                                                        <option value="UM">United States Minor Outlying Islands</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                        <option value="VN">Viet Nam</option>
                                                        <option value="VG">Virgin Islands, British</option>
                                                        <option value="VI">Virgin Islands, U.S.</option>
                                                        <option value="WF">Wallis and Futuna</option>
                                                        <option value="EH">Western Sahara</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="email" placeholder="Email" class="form-control"
                                                           id="t_email" value="<?php echo $user->data->user_email; ?>">
                                                </div>


<div class="form-group">
<div class="select2Source hide" id="languageSource">

        <div class="outer-feild">
            <div class="feild1">
                <input type="text" placeholder="Language"
                       class="form-control" id="t_lang1" name="language[]"
                       value="">
            </div>
            <div class="feild2">

                <select class="select-list select2"
                        style="width:300px;" name="language_proficiency[]" >
                    <option value="">Select Proficiency</option>
                    <option value="Expert">Expert</option>
                    <option value="Good">Good</option>
                    <option value="Bad">Bad</option>
                </select>

            </div>
            <div class="feild3">
                <a class="btn-add" data-target="#languageSource"
                data-destination="#languageDestination"></a>

            </div>
        </div>
    </div>

    <div class="select2Container" id="languageDestination">
        <label>Language</label>

        <div class="outer-feild">
            <div class="feild1">
                <input type="text" placeholder="Language"
                       class="form-control" id="t_lang1" name="language[]"
                       value="">
            </div>
            <div class="feild2">

                <select class="select-list select2"
                        style="width:300px;" name="language_proficiency[]">
                    <option value="">Select Proficiency</option>
                    <option value="Expert">Expert</option>
                    <option value="Good">Good</option>
                    <option value="Bad">Bad</option>
                </select>

            </div>
            <div class="feild3">
                <a class="btn-add" data-target="#languageSource"
                data-destination="#languageDestination"></a>

            </div>
        </div>
    </div>
    </div>

                                                <!-- Language -->

                                                <div class="form-group radio_gp">
                                                    <label for="gender">Gender*</label>
                                                    <?php $gender = $meta['wpcf-gender'][0]; ?>
                                                    <span>
														<input id="t_male" type="radio" name="gender" value="Male"
                                                               required="" <?php if ($gender == "male") {
                                                            echo "checked";
                                                        } ?> >
														<label for="t_male" class="radio-inline">Male</label>
													</span>
													<span>
														<input id="t_female" type="radio" name="gender" value="Female"
                                                               required="" <?php if ($gender == "female") {
                                                            echo "checked";
                                                        } ?> >
														<label for="t_female" class="radio-inline"> Female </label>
													</span>
                                                    <div class="clearfix"></div>
                                                </div>


                                                <div class="clearfix"></div>

                                                <div class="form-group">
                                                    <label>Preffered Time to Contact</label>

                                                    <div class="outer-feild2">
                                                        <div class="basis">
                                                            <div class="form-group">
                                                                <div class='input-group date'>
                                                                    <input type='text' name="start_time_to_contact" class="form-control"
                                                                           id='time_start' placeholder="Select Time"/>
                                                                    <span class="form-gp-icon"><i class="fa fa-clock-o"
                                                                                                  aria-hidden="true"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="basis">
                                                            To
                                                        </div>

                                                        <div class="basis">
                                                            <div class="form-group">
                                                                <div class='input-group date'>
                                                                    <input type='text' class="form-control"
                                                                           id='time_end' name="end_time_to_contact" placeholder="Select Time"/>
                                                                    <span class="form-gp-icon"><i class="fa fa-clock-o"
                                                                                                  aria-hidden="true"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mymoto">
                                                    <label for="comment">My Moto: (Optional )</label>
                                                    <textarea class="form-control" name="moto" id="comment"><?php echo $meta['wpcf-teacher-moto'][0]; ?></textarea>
                                                </div>

                                            </div><!--content-->
                                        </div>
                                    </div>
                                    <!--abt_me_container-->

                                    <div class="flex_content education_container">
                                        <div class="education">
                                            <h3 class="heading">Education</h3>
                                            <div class="content">
                                                <div class="form-group">
                                                    <label for="text">University*</label>
                                                    <input type="text" placeholder="" class="form-control" id="t_name"
                                                           name="university"
                                                           value="<?php echo $meta['wpcf-university'][0]; ?>" required="">
                                                </div>

                                                <div class="form-group" id="outerr_qual">


                                                <div class="select2Source hide" id="qualification">

                                                   <div class="outer-feild">
                                                       <div class="feild1">
                                                           <input type="text" placeholder="Qualification"
                                                                       class="form-control" name="qualification[]"
                                                                       value="">
                                                       </div>
                                                       <div class="feild2">

                                                      <select class="select-list select2" name="qualification_type[]"  >
                                                        <option value="" >Expertise*</option>
                                                        <option value="Major" >Major </option>
                                                        <option value="Minor" >Minor</option>
                                                        <option value="opt3" >Option 3</option>
                                                    </select>

                                                       </div>
                                                       <div class="feild3">
                                                         <a class="btn-add" data-target="#qualification"
                                                         data-destination="#qualificationContainer"
                                                         ></a>
                                                       </div>
                                                   </div>
                                               </div>

                                               <div class="select2Container" id="qualificationContainer">
                                               <label>Qualification(s)</label>

                                                <div class="outer-feild">
                                                    <div class="feild1">
                                                         <input type="text" placeholder="Qualification"
                                                                       class="form-control"  name="qualification[]"
                                                                       value="">
                                                    </div>
                                                    <div class="feild2">
                                                    <select class="select-list select2" name="qualification_type[]"  >
                                                        <option value="" >Expertise*</option>
                                                        <option value="Major" >Major </option>
                                                        <option value="Minor" >Minor</option>
                                                        <option value="opt3" >Option 3</option>
                                                    </select>



                                                    </div>
                                                     <div class="feild3">
                                                         <a class="btn-add" data-target="#qualification"
                                                         data-destination="#qualificationContainer"

                                                         ></a>

                                                     </div>
                                                   </div>
                                                   </div>

                                                </div>
                                                <div class="form-group">
                                                    <label for="text">Subjects of Expertise (Major )*</label>
                                                    <input type="text" placeholder="" class="form-control" id="t_name"
                                                           name="subject_expertise"
                                                           value="<?php echo $meta['wpcf-subjects-of-expertise'][0]; ?>" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="text">Subjects Tutored*</label>
                                                    <input type="text" placeholder="" class="form-control" id="t_name"
                                                           name="subject_tutored"
                                                           value="<?php echo $meta['wpcf-subjects-tutored'][0]; ?>" required="">
                                                </div>

                                                <div class="form-group textarea2">
                                                    <label for="comment">Teaching Experience*</label>
                                                    <textarea class="form-control" placeholder="Teaching Experience*"
                                                              id="comment" name="experience"
                                                              required=""><?php echo $meta['wpcf-teaching-experience'][0]; ?></textarea>
                                                </div>

                                                <div class="form-group textarea2">
                                                    <label for="text">Extracurricular Interests</label>
                                                    <textarea class="form-control"
                                                              placeholder="Lorem ipsum dorem sit emit" id="comment"
                                                              name="interest"
                                                              required><?php echo $meta['wpcf-extracurricular-interests'][0]; ?></textarea>

                                                </div>

                                                <div class="form-group upload_doc">
                                                    <label for="">Your Qualification Document*</label>
                                                    <p>(This documents will not be shared in public )</p>
                                                    <div class="top_tag"></div>
                                                    <input type="file" name="document" id="filer_input"
                                                           multiple="multiple" >                                                   
                                                </div>

                                            </div><!--content-->
                                        </div>
                                    </div>
                                    <!--education_container-->


                                </div>
                                <!--flex_container-->

                                <div class="top_subject">
                                    <h3 class="heading">Top Subject(s)</h3>
                                    <div class="content ys_sub_content">

                                        <div id="outerr_top_subject">
                                                                                              <div class="select2Source hide" id="subject">

                                                       <div class="outer-feild">
                                                         <div class="feild1">
                                                             <div class="form-group">
                                                              <label for="t_subjectname">Subject Name:</label>
                                                                 <input type="text" placeholder="" class="form-control"  name="top_subject" value="physics">
                                                            </div>
                                                         </div>
                                                         <div class="feild2">
                                                            <div class="form-group">
                                                             <label for="t_subjectdesc">Description*</label>
                                                             <input type="text" placeholder="Lorem ipsum dorem sit emit" class="form-control" name="top_subject_description" value="">
                                                            </div>
                                                         </div>
                                                         <div class="feild3">
                                                         <a class="btn-add" data-target="#subject"
                                                         data-destination="#subjectContainer"></a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="select2Container" id="subjectContainer">

                                                   <div class="outer-feild">
                                                      <div class="feild1">
                                                        <div class="form-group">
                                                          <label for="t_subjectname">Subject Name:</label>
                                                          <input type="text" placeholder="" class="form-control"  name="top_subject" value="physics">
                                                        </div>
                                                      </div>
                                                      <div class="feild2">
                                                        <div class="form-group">
                                                           <label for="t_subjectdesc">Description*</label>
                                                          <input type="text" placeholder="Lorem ipsum dorem sit emit" class="form-control" name="subject_description" value="">
                                                        </div>
                                                      </div>
                                                     <div class="feild3">
                                                         <a class="btn-add" data-target="#subject"
                                                         data-destination="#subjectContainer"></a>
                                                     </div>
                                                   </div>
                                                  </div>
                                        </div>


                                    </div><!--content-->
                                    <div class="clearfix"></div>
                                </div><!--top_subject-->


                                <div class="submit_btn_div">
                                    <a type="" class="btn btn_preview"
                                       href="<?php echo site_url(); ?>/teacher-profile/">View Profile</a>
                                    <button type="submit" class="btn" name="update">Save and update</button>
                                </div>


                            </form>
                        </div><!--container-->
                    </div><!--main-->

                </div><!--dash_right_side_inner-->
            </div><!--display-table-cell v-align dash_right_side-->


        </div>
    </div><!--container-fluid display-table v-align margin_top_second pos-rel-->

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

     <?php TP::js('teacher_profile_edit'); ?>
    <?php get_footer(); ?>   
    <?php TP::js('plugins/jQuery.filer/jquery.filer'); ?>
    <?php TP::js('plugins/bootstrap-datetimepicker/js/moment'); ?>
    <?php TP::js('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min'); ?>  
    <?php TP::js('dashboard'); ?>
  <?php //TP::js('testing_edgePreload'); ?>

<?php } elseif (is_user_logged_in() && $user->roles[0] == "student") {
    $url = site_url('student-dashboard');
    wp_redirect($url);
} else {
    $url = site_url();
    wp_redirect($url);
}
?>
<?php get_template_part('inc/document_end'); ?>