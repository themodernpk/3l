						<!--  	Join our Community -->
						<section class="join_community">
							<div class="container">
								<?php 
								$join_head = ot_get_option('join_community'); 
								$join 	   = explode('-',$join_head);								

								?>
								<h2><?php echo $join[0]; ?><span><?php echo $join[1]; ?></span></h2>

								<div class="col-md-10 col-md-offset-1 col-sm-12 join_community_inner">
									<div class="row">
										<div class="col-sm-6 col-xs-6">
											<div class="iamtutor wow fadeInDown ">
												<div class="my_dp">
													<img src="<?php echo ot_get_option('join_teacher'); ?>">
												</div>
												<a href="#register-form" class="popup-with-zoom-anim btn registering"  data-name="teacher" ><?php echo ot_get_option('teacher_title'); ?></a>
											</div>
										</div>

										<div class="col-sm-6 col-xs-6">
											<div class="iamtutor imstudent wow fadeInUp ">
												<div class="my_dp">
													<img src="<?php echo ot_get_option('join_student'); ?>">
												</div>
												<a href="#register-form" class="popup-with-zoom-anim btn registering"  data-name="student" ><?php echo ot_get_option('student_title'); ?></a>
											</div>
										</div>

									</div>
								</div>
							</div><!--container-->
						</section>
						<!--  	Join our Community?  END   -->