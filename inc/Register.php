<div id="register-form" class="zoom-anim-dialog mfp-hide">
    <div class="register_inner">

        <div class="display-flex">
            <div class="left_side">
                <div class="my_rel_pos">
                    <div class="logo_login">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="141px"
                        height="141px">
                        <style type="text/css">
                            .stz {
                                clip-path: url(#SVGID_2_);
                                fill: url(#SVGID_3_);
                            }
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
                                    <use xlink:href="#SVGID_1_" style="overflow:visible;"/>
                                </clipPath>

                                <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-396.554" y1="199.0926"
                                x2="-396.1655" y2="199.0926"
                                gradientTransform="matrix(60.7775 0 0 -60.7775 24101.75 12112.3516)">
                                <stop offset="0" style="stop-color:#A6CE39"/>
                                <stop offset="0.5413" style="stop-color:#58C5C7"/>
                                <stop offset="1" style="stop-color:#84D5F7"/>
                            </linearGradient>
                            <rect x="0.2" y="0.2" class="stz" width="23.6" height="23.6"/>
                        </g>
                    </g>
                </svg>
            </div><!-- logo_login -->

            <h3>Register with us</h3>

            <form data-parsley-validate="" method="POST" action="<?php  ?>" id="register">

                <div class="form-group form_grp_width">
                    <div class="row">

                        <div class="col-sm-3 col-xs-3"><label>I Am a:</label></div>

                        <div class="col-sm-4 col-xs-4 col-xs-offset-1">
                            <input id="teacher" type="radio" name="iam" value="teacher" required="">
                            <label for="teacher" class="radio-inline">Teacher</label>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <input id="student" type="radio" name="iam" value="student"  required="">
                            <label for="student" class="radio-inline">Student </label>
                        </div>


                    </div>
                </div>


                <div class="form-group ">
                    <input type="text" name="fullname" placeholder="Full Name" class="form-control" id="fullname"
                    required="" data-parsley-length="[2,30]">
                </div>


                <div class="form-group form_grp_width">
                    <div class="row">
                        <div class="col-sm-3 col-xs-3"><label>Gender:</label></div>

                        <div class="col-sm-4 col-xs-4 col-xs-offset-1">
                            <input id="male" type="radio" name="gender" value="Male" required="">
                            <label for="male" class="radio-inline">Male</label>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <input id="female" type="radio" name="gender" value="female" required="">
                            <label for="female" class="radio-inline">Female </label>
                        </div>

                    </div>
                </div>


                <div class="form-group">
                    <input type="email" name="email" placeholder="Email ID" class="form-control" id="email"
                    required="" data-parsley-maxlength="50">
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control" id="pwd"
                    required="" data-parsley-minlength="6">
                </div>


                <div class="form-group">
                    <input type="password" placeholder="Confirm Password" class="form-control" id="cnf_pwd"
                    data-parsley-equalto="#pwd" required="" data-parsley-minlength="6">
                </div>

                <div class="pos-rel">
                    <div class="form-group form_grp_width">
                        <input id="iagree" type="checkbox" name="iagree" value="" required="">
                        <label for="iagree" class="checkbox">I agree with <a href="<?php echo site_url('/term-of-use/'); ?>" target="_blank">terms & condition</a> </label>
                    </div>
                </div>

                <div class="pos-rel">
                    <div class="form-group form_grp_width">
                        <input id="updates" type="checkbox" name="updates" value="">
                        <label for="updates" class="checkbox">Keep me updated 3lemni news </label>
                    </div>
                </div>

                <button type="submit" id="reg" name="submit" class="btn btn-default btn-block">Register</button>
            </form>
            <div id="contactResponse"></div>
        </div><!--my_rel_pos -->
    </div>
    <div class="right_side">
        <div class="my_rel_pos">
            <div class="table_div">
                <div class="social_connect_img">
                    <img
                    src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/social_connect.png">
                </div>
                <div class="social_connect_btns">
                    <h1>
                        <small>Connect with</small>
                        social
                    </h1>
                    <ul class="login_social">
                        <li>
                            <script>
                                window.fbAsyncInit = function () {
                                    FB.init({
                                        appId: '1160695307349126',
                                            cookie: true, // enable cookies to allow the server to access the session
                                            xfbml: true // parse XFBML
                                        });

                                };

                                function fb_login() {
                                    FB.login(function (response) {

                                        if (response.authResponse) {
                                            console.log('Welcome!  Fetching your information.... ');
                                                //console.log(response); // dump complete info
                                                access_token = response.authResponse.accessToken; //get access token
                                                user_id = response.authResponse.userID; //get FB UID

                                                FB.api('/me', {fields: 'email'}, function (response) {
                                                    user_email = response.email; //get user email
                                                    console.log(user_email);

                                                    // you can store this data into your database
                                                });

                                            } else {
                                                //user hit cancel button
                                                console.log('User cancelled login or did not fully authorize.');

                                            }
                                        }, {
                                            scope: 'publish_stream,email'
                                        });
}
(function () {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
                                        //document.getElementById('fb-root').appendChild(e);
                                    }());

</script>

<a href="#" class="reg_fb" onclick="fb_login();"><i class="fa fa-facebook"
    aria-hidden="true"></i> Register
    with Facebook</a>

    <div id="status"></div>
</li>
<li>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

</li>
</ul>
</div>
</div>
</div><!--my_rel_pos -->
</div><!--  RIGHT SIDE -->


</div><!--display_flex-->


</div><!---REgister INNER - -->
</div>
<!-- END REGISTER FPRM -->