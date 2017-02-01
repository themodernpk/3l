<div id="forgot-pass-form"  class="zoom-anim-dialog mfp-hide">
	<div class="register_inner forgot_pass_form">

		<div class="display-flex">
			<div class="left_side">
				<div class="my_rel_pos">
					<div class="my_character">
						<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/forgot_pass_character.png">
					</div>
					<h1><small>Lost your</small>Password?</h1>
				</div><!--my_rel_pos -->
			</div>
			<!-- LEFT side -->
			<div class="right_side">
				<div class="my_rel_pos">
					<div class="logo_login">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="140px" height="140px">
						<style type="text/css">
							.sty{clip-path:url(#SVGID_2_);fill:url(#SVGID_3_);}
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
									<use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
								</clipPath>

								<linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-396.554" y1="199.0926" x2="-396.1655" y2="199.0926" gradientTransform="matrix(60.7775 0 0 -60.7775 24101.75 12112.3516)">
									<stop  offset="0" 	style="stop-color:#A6CE39"/>
									<stop  offset="0.5413" 	style="stop-color:#58C5C7"/>
									<stop  offset="1" 	style="stop-color:#84D5F7"/>
								</linearGradient>
								<rect x="0.2" y="0.2" class="sty" width="23.6" height="23.6"/>
							</g>
						</g>
					</svg>
				</div>
				<h4>Enter your registered E-mail Id
					<span>on which the link will be send</span>
				</h4>

				<form  class="" data-parsley-validate="" method="POST" action="#">

					<div class="form-group">
						<?php $user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : ''; ?>
						<input type="text"  placeholder="Please enter your e-mail id" class="form-control " id="reg_email user_login" name="user_login" required="" value="<?php echo $user_login; ?>">
					</div>
					<input type="hidden" name="action" value="reset" />
					<button type="submit" class="btn btn-default btn-block" name="">Submit Request</button>

				</form>
			</div><!-- logo_login -->

		</div><!--my_rel_pos -->
	</div>
	<!-- right_side -->


</div><!--display flex- -->


</div> <!-- REGISTER INNER forgot-pass-form FORM -->
</div>