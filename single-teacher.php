<?php get_template_part('header-dashboard'); ?>
<?php require_once('inc/ask_question.php'); ?>
<?php TP::css('plugins/range-and-circulr-slider/bootstrap-slider.min'); ?>
<?php TP::css('plugins/bootstrap-datepicker/css/datepicker'); ?>
<?php TP::css('plugins/easy-responsive-tabs/easy-responsive-tabs'); ?>
<?php TP::css('dashboard'); ?>
<?php TP::css('teacher-profile'); ?>
<?php  while ( have_posts() ) : the_post();  ?>
		<?php 
					$post_meta   = get_post_meta(get_the_ID());
					$get_teacher = $post_meta['wpcf-teacher-email'][0];
					$get_user    = get_user_by('email',$get_teacher);
					$get_teacher_id = $get_user->ID;

						  /*echo"<pre>";
						  print_r($get_teacher_id);
						  echo"</pre>";*/ ?>
<div class="bnn_part bnn_part_self_view mrg_top" >
	<div class="container">
		<div class="flex_container row">
		
			<div class="flex_content tacher_info">

				<div class="pos-rel">
				
					<div href="#" class="tutor_dp">
						<?php                                 
                                if(has_post_thumbnail()){ 
                              echo get_the_post_thumbnail($post_id);
                          }else{ ?>
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-user-image.png" id="image">
                              <?php } ?>
						<span class="online"></span>
					</div>

					<h3><?php the_title(); ?></h3>	
					<?php if(is_user_logged_in()){ ?>
					<a href="javascript:void(0)"onclick="javascript:jqcc.cometchat.chatWith('<?php echo $get_teacher_id; ?>');" class="btn">Chat now</a>
					<?php } else { ?>
					<a href="#login-form" class="btn popup-with-zoom-anim">Chat now</a>
					<?php }	?>	
				
				</div>

			</div>


			<div class="flex_content tacher_reviews pos-rel">
				<div class="lower_rating">
				<?php 				
					$args_total = array(
                                               'posts_per_page' => -1,
                                               'orderby' => 'post_date',
                                               'order' => 'ASC',
                                               'post_type'   => 'rate-review',
                                               'post_status'     => 'publish',
                                               'meta_key'     => 'wpcf-teacher-post-id',
                                               'meta_value'   => get_the_id(),
                                               );
                                           $all_item_posts = new WP_Query($args_total);
                                            
                                           $total_post = $all_item_posts->post_count;

                                           foreach ($all_item_posts->posts as $value) {


                                           		$single_meta = get_post_meta($value->ID);

		                                           $teacher_average_rating[] = $single_meta['wpcf-teacher-rating'][0];

		                                           $teacher_exp_method_average_rating[] = $single_meta['wpcf-teacher-explaining-method-rating'][0];

		                                           $teacher_communication_average_rating[] = $single_meta['wpcf-teacher-communication-rating'][0];

		                                           $teacher_recommendable_average_rating[] = $single_meta['wpcf-teacher-recommendable-rating'][0];
                                           }

                                           $rating_sum= 0;	
                                           if(!empty($teacher_average_rating)){
                                           foreach ($teacher_average_rating as $ratings) {
                                           			$rating_sum = $rating_sum+$ratings;
                                           }
                                           $average_rating_teacher = round($rating_sum/$total_post, 2);
                                       }
                                           $explain_method_sum= 0;
                                           if(!empty($teacher_exp_method_average_rating)){	
                                           foreach ($teacher_exp_method_average_rating as $explain_ratings) {
                                           			$explain_method_sum = $explain_method_sum+$explain_ratings;
                                           }
                                           $average_explain_method_rating = round($explain_method_sum/$total_post, 2);
                                       }
                                           $comm_method_sum= 0;	
                                           if(!empty($teacher_communication_average_rating)){	
                                           foreach ($teacher_communication_average_rating as $comm_ratings) {
                                           			$comm_method_sum = $comm_method_sum+$comm_ratings;
                                           }
                                           $average_comm_method_rating = round($comm_method_sum/$total_post, 2);
                                       }
                                           $recomend_method_sum= 0;	
                                           if(!empty($teacher_recommendable_average_rating)){	
                                           foreach ($teacher_recommendable_average_rating as $recomend_ratings) {
                                           			$recomend_method_sum = $recomend_method_sum+$recomend_ratings;
                                           }
                                           $average_recomend_ratings_method_rating = round($recomend_method_sum/$total_post, 2);
                                          } 
                                           

				 ?>

					<div class="third circle averagevalue"> <span id="" class="Averagevalue"><?php if(!empty($average_rating_teacher)){ echo $average_rating_teacher; } else{ echo "NA"; } ?></span> </div>
					
					<h4>Reviews <span>(from <?php echo $total_post; ?> reviews)</span></h4>				


					<div class="form-group">
						<label for="email">Explaining Methods</label>
						<input  class="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="<?php if(!empty($average_explain_method_rating)){ echo $average_explain_method_rating; }else{ echo 0; } ?>" data-slider-tooltip="hide" data-slider-enabled="false" />
						<span  class="ratingbadge ex1SliderVal1"><?php if(!empty($average_explain_method_rating)){ echo $average_explain_method_rating; }else{ echo "NA"; } ?></span>
					</div>

					<div class="form-group">
						<label for="email">Communication</label>
						<input  class="ex2" data-slider-id='ex2Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="<?php if(!empty($average_comm_method_rating)){ echo $average_comm_method_rating; }else{ echo 0; } ?>" data-slider-tooltip="hide"  data-slider-enabled="false"/>
						<span class="ratingbadge ex1SliderVal2"><?php if(!empty($average_comm_method_rating)){ echo $average_comm_method_rating; }else{ echo "NA"; } ?></span>
					</div>

					<div class="form-group">
						<label for="email">Recommendabale</label>
						<input class="ex3" data-slider-id='ex3Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="<?php if(!empty($average_recomend_ratings_method_rating)){ echo $average_recomend_ratings_method_rating; }else{ echo 0; } ?>" data-slider-tooltip="hide" data-slider-enabled="false"/>
						<span  class="ratingbadge ex1SliderVal3"><?php if(!empty($average_recomend_ratings_method_rating)){ echo $average_recomend_ratings_method_rating; }else{ echo "NA"; } ?></span>
					</div>
					<div class="clearfix"></div>
					<div class="btnz">
						<a href="<?php echo site_url(); ?>/book-session/?email=<?php echo $post_meta['wpcf-teacher-email'][0]; ?>&subject=<?php echo $post_meta['wpcf-subjects-tutored'][0]; ?>" class="btn book_session">Book a session</a>
						<a href="#" class="btn book_askques" data-toggle="modal" data-target="#myModal">Ask a question</a>
					</div>
					
				</div>
			</div>
		</div><!--flex content-->
	</div><!--flex container-->

</div><!--container-->
</div><!--bnn part -->
<div class="main_section">
	<div class="container">
		<div class="row">
			<ul class="tutor_ul">
		
				<li class="li_uni">
					<div class="media">
						<div class="media-left">
							<div class="li_img"></div>						
						</div>
						<div class="media-body media-middle">
						<h4>University</h4>
							<p><?php echo $post_meta['wpcf-university'][0]; ?></p>
							<p>(Malaysia)</p>
						</div>
					</div>
				</li>

				<li class="li_deg">
					<div class="media">
						<div class="media-left">
							<div class="li_img"></div>						
						</div>
						<div class="media-body media-middle">
						<h4>Qualification</h4>
						<h4><?php echo $post_meta['wpcf-qualification'][0]; ?></h4>
							<p>(Physics hons)</p>

						</div>
					</div>
				</li>


				<li class="li_loc">
					<div class="media">
						<div class="media-left">
							<div class="li_img"></div>						
						</div>
						<div class="media-body media-middle">
							<h4>Location</h4>
							<p><?php echo $post_meta['wpcf-location'][0]; ?></p>

						</div>
					</div>
				</li>

				<li class="li_email">
					<div class="media">
						<div class="media-left">
							<div class="li_img"></div>						
						</div>
						<div class="media-body media-middle">
							<h4>Email</h4>
							<p><?php echo $post_meta['wpcf-teacher-email'][0]; ?></p>

						</div>
					</div>
				</li>
				<li class="li_gender">
					<div class="media">
						<div class="media-left">
							<div class="li_img"></div>						
						</div>
						<div class="media-body media-middle">
							<h4>Gender</h4>
						</div>
						<p><?php echo $post_meta['wpcf-teacher-gender'][0]; ?></p>

					</div>
				</li>

				<li class="li_time">
					<div class="media">
						<div class="media-left">
							<div class="li_img"></div>						
						</div>
						<div class="media-body media-middle">
							<h4>Preferred Time to Contact</h4>
						<p><?php echo $meta['wpcf-start-time-to-contact'][0]." "."To"." ".$meta['wpcf-end-time-to-contact'][0] ?></p>

						</div>
					</div>
				</li>
			</ul>

			<div id="profile_tabs" class="tab_section">          
				<ul class="nav nav-tabs  resp-tabs-list hor_1 ">
					<li class="tab_abt resp-tab-"><div><a>About Me</a></div></li>
					<li class="tab_rev"><div><a>Reviews</a></div></li>
					<li class="tab_faq"><div><a>FAQs</a></div></li>
				</ul>
				<div class=" resp-tabs-container esp-tabs-container hor_1 tab-content">

					<div class="tab_content_abt">
						<ul>
							<li class="lang_know">
								<h4>Languages known : </h4>
								<p><?php echo $post_meta['wpcf-language'][0]; ?></p>
							</li>						

							<li>
								<h4>University</h4>
								<p><?php echo $post_meta['wpcf-university'][0]; ?></p>
							</li>

							<li>
								<h4>Teaching Experience : </h4>
								<p><?php echo $post_meta['wpcf-teaching-experience'][0]; ?></p>
							</li>

							<li>
								<h4>Extracurricular Interests :</h4>
								<p><?php echo $post_meta['wpcf-extracurricular-interests'][0]; ?> </p>
							</li>
						</ul>

						<h3>Top subject</h3>
						<ul>
							<li>
								<h4>Subject Name :</h4>
								<p><?php echo $post_meta['wpcf-top-subject'][0]; ?></p>
							</li>

							<li>
								<h4>Description : </h4>
								<p><?php echo $post_meta['wpcf-top-subject-description'][0]; ?></p>
							</li>
						</ul>
					</div>
					<!--TAB ONE END-->
					<!--TAB ONE END-->
					<!--TAB ONE END-->

					<div> 
						<div class="tab_content_rev"> 
							<ul>
								<?php 				
								    $args_total = array(
		                                               'posts_per_page' => -1,
		                                               'orderby' => 'post_date',
		                                               'order' => 'ASC',
		                                               'post_type'   => 'rate-review',
		                                               'post_status'     => 'publish',
		                                               'meta_key'     => 'wpcf-teacher-post-id',
		                                               'meta_value'   => get_the_id(),
		                                               );
                                           $all_item_posts = new WP_Query($args_total);
                                           if(!empty($all_item_posts)){
                                           foreach ($all_item_posts->posts as $value) {
                                           		$post = get_posts($value);
                                           		$single_meta = get_post_meta($value->ID);
                                           		$student_meta = get_user_meta($single_meta['wpcf-student-id'][0]);
                                           	/*	echo"<pre>";
                                           		print_r($post);
                                           		echo"</pre>";*/                                           	
                                           	?>
								<li>
									<div class="media">
										<a class="media-left" href="#">
											<img src="<?php echo $student_meta['profile_image'][0]; ?>" alt="">
										</a>
										<div class="media-body">
											<p> <?php echo $post[0]->post_content; ?></p>

											<div class="lower_rating">
												<div class="flex_container">
													<div class="side1">
														<div class="rating_ch">
															<div class="rating_mood poke_ch">
															</div>
															<div class="ys third circle averagevalue"> <span id="mycirclevalue" class="Averagevalue"><?php echo $single_meta['wpcf-teacher-rating'][0]; ?></span> </div>
														</div>
													</div>				

													<div class="side2">
														<div class="form-group">
															<label for="email">Explaining Methods</label>
															<input  class="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-tooltip="hide"  data-slider-enabled="false"/>
															<span class="ratingbadge ex1SliderVal1"><?php echo $em = $single_meta['wpcf-teacher-explaining-method-rating'][0]; ?></span>
														</div>

														<div class="form-group">
															<label for="email">Communication</label>
															<input  class="ex2" data-slider-id='ex2Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-tooltip="hide"  data-slider-enabled="false"/>
															<span  class="ratingbadge ex1SliderVal2"><?php echo $cr = $single_meta['wpcf-teacher-communication-rating'][0]; ?></span>
														</div>

														<div class="form-group">
															<label for="email">Recommendabale</label>
															<input   class="ex3" data-slider-id='ex3Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-tooltip="hide"  data-slider-enabled="false"/>
															<span  class="ratingbadge ex1SliderVal3"><?php echo $rr = $single_meta['wpcf-teacher-recommendable-rating'][0]; ?></span>
														</div>
														

													</div>
												</div>			

												<!-- rate_review_ch -->


											</div>

											<div class="rating_toggle">
												<span class="rating_mood poke_ch"></span><a class="btn-add toggle_vv"></a>
											</div>

										</div><!--media body-->
									</div>
								</li>

								<?php } } ?>
								<?php if(empty($er || $cr || $rr)){ echo "<h5 style='text-align:center;'>Not Rated Yet</h5>"; } ?>
							</ul>
						</div>
					</div>
					<!--TAB 2 END-->
					<!--TAB 2 END-->
					<!--TAB 2 END-->

					<div> 
						<div class="tab_content_faq"> 

							<div class="panel-group" id="accordion">


								<div class="panel panel-default actives">
									<div class="panel-heading ">
										<h2 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span><i></i></span>How do lessons work?</a>
										</h2>
									</div>
									<div id="collapse1" class="panel-collapse collapse in">
										<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. </div>
									</div>
								</div>

								<div class="panel panel-default ">
									<div class="panel-heading ">
										<h2 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span><i></i></span>How much does tutoring cost?</a>
										</h2>
									</div>
									<div id="collapse2" class="panel-collapse collapse ">
										<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. </div>
									</div>
								</div>

								<div class="panel panel-default ">
									<div class="panel-heading ">
										<h2 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span><i></i></span>How do I set up my first lesson?</a>
										</h2>
									</div>
									<div id="collapse3" class="panel-collapse collapse ">
										<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. </div>
									</div>
								</div>

								<div class="panel panel-default ">
									<div class="panel-heading ">
										<h2 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><span><i></i></span>How much does tutoring cost?</a>
										</h2>
									</div>
									<div id="collapse4" class="panel-collapse collapse ">
										<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. </div>
									</div>
								</div>

								<div class="panel panel-default ">
									<div class="panel-heading ">
										<h2 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><span><i></i></span>Proven tutors, recruited from top universities, for high school and college subjects?</a>
										</h2>
									</div>
									<div id="collapse5" class="panel-collapse collapse ">
										<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. </div>
									</div>
								</div>


							</div>
						</div>
						<!--tab content Faq-->


					</div>

					<!--TAB THREE END-->
					<!--TAB THREE END-->
					<!--TAB THREE END-->
				</div>
			</div>
		</div>  
	</row><!--row-->
</div><!--container-->
</div><!--main_section-->


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

<?php endwhile;  ?>
<?php get_footer(); ?>

<?php TP::js('plugins/easy-responsive-tabs/easyResponsiveTabs'); ?>
<?php TP::js('plugins/range-and-circulr-slider/circle-progress'); ?>
<?php TP::js('plugins/range-and-circulr-slider/bootstrap-slider.min'); ?>
<?php TP::js('plugins/bootstrap-datepicker/js/bootstrap-datepicker'); ?>
<?php TP::js('plugins/jQuery.filer/jquery.filer'); ?>

<?php TP::js('teacher-profile'); ?>
<?php TP::js('teacher-single'); ?>

<?php TP::js('testing_edgePreload'); ?>
<?php get_template_part('inc/document_end'); ?>