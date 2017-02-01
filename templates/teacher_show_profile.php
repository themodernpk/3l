<?php
/*
Template Name: teacher-show-profile
*/
?>
<?php 
	$user = wp_get_current_user();
	if(is_user_logged_in() && $user->roles[0] == "teacher") {
 ?>
<?php get_template_part('header-dashboard'); ?>

<?php TP::css('plugins/range-and-circulr-slider/bootstrap-slider.min'); ?>

<?php TP::css('plugins/easy-responsive-tabs/easy-responsive-tabs'); ?>
<?php TP::css('dashboard'); ?>

<?php TP::css('teacher-profile'); ?>

<div class="bnn_part bnn_part_student_view margin_top_second" >
	<div class="container">
		<div class="flex_container row">
			<div class="flex_content tacher_info">

				<div class="pos-rel">
					<div href="#" class="tutor_dp">
						<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/tutor1.jpg">
						<span class="online"></span>
					</div>
					<h3>Samanth Gomes</h3>
					<h5>Likelihood Of Reply: <b>98%</b></h5>
					<h5>Expected Response Time: <b>2 Hours</b></h5>
					<a href="#" class="btn">Chat Now</a>
				</div>

			</div>


			<div class="flex_content tacher_reviews pos-rel">
				<div class="lower_rating">
					<div class="third circle averagevalue"> <span id="" class="Averagevalue">7.3</span> </div>
					
					<h4>Reviews <span>(from 100 reviews)</span></h4>				


					<div class="form-group">
						<label for="email">Explaining Methods</label>
						<input  class="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="7" data-slider-tooltip="hide" data-slider-enabled="false" />
						<span  class="ratingbadge ex1SliderVal1">7</span>
					</div>

					<div class="form-group">
						<label for="email">Communication</label>
						<input  class="ex2" data-slider-id='ex2Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="6" data-slider-tooltip="hide"  data-slider-enabled="false"/>
						<span class="ratingbadge ex1SliderVal2">6</span>
					</div>

					<div class="form-group">
						<label for="email">Recommendabale</label>
						<input class="ex3" data-slider-id='ex3Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="9" data-slider-tooltip="hide" data-slider-enabled="false"/>
						<span  class="ratingbadge ex1SliderVal3">9</span>
					</div>
					<div class="clearfix"></div>
					<div class="btnz">
						<a href="" class="btn book_session">Book a session</a>
						<a href="" class="btn book_askques">Ask a question</a>
						<div class="clearfix"></div>
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
				<li class="li_time">
					<div class="media">
						<div class="media-left">
							<div class="li_img"></div>						
						</div>
						<div class="media-body media-middle">
							<h4>Preferred Time to Contact</h4>
							<p>15:00 To 20:30</p>
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
							<p>Female</p>

						</div>
					</div>
				</li>

				<li class="li_deg">
					<div class="media">
						<div class="media-left">
							<div class="li_img"></div>						
						</div>
						<div class="media-body media-middle">
							<h4>B.Sc Science</h4>
							<p>(Physics hons)</p>

						</div>
					</div>
				</li>
				<li class="li_cources">
					<div class="media">
						<div class="media-left">
							<div class="li_img"></div>						
						</div>
						<div class="media-body media-middle">
							<h4>Courses Taught</h4>
							<ul class="profile_pills">
								<li><p>Maths</p></li><li><p>Science</p></li><li><p>Biology</p></li>

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
								<p>St. Benard Church, Dalat, Sarawak, Malaysia</p>

							</div>
						</div>
					</li>


					<li class="li_lang">
						<div class="media">
							<div class="media-left">
								<div class="li_img"></div>						
							</div>
							<div class="media-body media-middle">
								<h4>Languages Known</h4>

								<ul class="profile_pills">
									<li>
										<p>English</p>
										<ul class="lang_rate">
											<i class="fa fa-star i_green" aria-hidden="true"></i>
											<i class="fa fa-star i_green" aria-hidden="true"></i>
											<i class="fa fa-star i_green" aria-hidden="true"></i>
										</ul>
									</li><li>
									<p>Malay</p>
									<ul class="lang_rate">
										<i class="fa fa-star i_green" aria-hidden="true"></i>
										<i class="fa fa-star i_green" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</ul>
								</li>
								
							</ul>

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
								<p>English  -<span>Expert</span></p>
								<p>Malaysian  -<span>Expert</span></p>
								<p>English  -<span>Good</span></p>
							</li>


							<li class="qual_doc">
								<h4>Qualification Document :</h4>
								<ul>
									<li>Last_BSC-document.JPG</li>
									<li>Last_BSC-document.JPG</li>
									<li>Last_BSC-document.JPG</li>
								</ul>
							</li>



							<li>
								<h4>University</h4>
								<p>Segi University (Malaysia)</p>
							</li>

							<li>
								<h4>Teaching Experience : </h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate.</p>
							</li>

							<li>
								<h4>Extracurricular Interests :</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. </p>
							</li>
						</ul>

						<h3>Top subject</h3>
						<ul>
							<li>
								<h4>Subject Name :</h4>
								<p>Organic Chemistry</p>
							</li>

							<li>
								<h4>Description : </h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. </p>
							</li>
						</ul>
					</div>
					<!--TAB ONE END-->
					<!--TAB ONE END-->
					<!--TAB ONE END-->




					<div> 
						<div class="tab_content_rev"> 
							<ul>
								<li>
									<div class="media">
										<a class="media-left" href="#">
											<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/tutor1.jpg" alt="">
										</a>
										<div class="media-body">
											<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. </p>

											<div class="lower_rating">
												<div class="flex_container">
													<div class="side1">
														<div class="rating_ch">
															<div class="rating_mood poke_ch">
															</div>
															<div class="third circle averagevalue"> <span id="" class="Averagevalue">5</span> </div>
														</div>
													</div>				

													<div class="side2">
														<div class="form-group">
															<label for="email">Explaining Methods</label>
															<input  class="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-tooltip="hide"  data-slider-enabled="false"/>
															<span class="ratingbadge ex1SliderVal1">5</span>
														</div>

														<div class="form-group">
															<label for="email">Communication</label>
															<input  class="ex2" data-slider-id='ex2Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-tooltip="hide"  data-slider-enabled="false"/>
															<span  class="ratingbadge ex1SliderVal2">5</span>
														</div>

														<div class="form-group">
															<label for="email">Recommendabale</label>
															<input   class="ex3" data-slider-id='ex3Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-tooltip="hide"  data-slider-enabled="false"/>
															<span  class="ratingbadge ex1SliderVal3">5</span>
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

								<li>
									<div class="media">
										<a class="media-left" href="#">
											<img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/tutor1.jpg" alt="">
										</a>
										<div class="media-body">
											<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. </p>


											<div class="lower_rating">
												<div class="flex_container">
													<div class="side1">
														<div class="rating_ch">
															<div class="rating_mood poke_ch">
															</div>
															<div class="third circle averagevalue"> <span id="" class="Averagevalue">5</span> </div>
														</div>
													</div>				

													<div class="side2">
														<div class="form-group">
															<label for="email">Explaining Methods</label>
															<input  class="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-tooltip="hide"  data-slider-enabled="false"/>
															<span class="ratingbadge ex1SliderVal1">5</span>
														</div>

														<div class="form-group">
															<label for="email">Communication</label>
															<input  class="ex2" data-slider-id='ex2Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-tooltip="hide"  data-slider-enabled="false"/>
															<span  class="ratingbadge ex1SliderVal2">5</span>
														</div>

														<div class="form-group">
															<label for="email">Recommendabale</label>
															<input   class="ex3" data-slider-id='ex3Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-tooltip="hide"  data-slider-enabled="false"/>
															<span  class="ratingbadge ex1SliderVal3">5</span>
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
<?php get_footer(); ?>

<?php TP::js('plugins/easy-responsive-tabs/easyResponsiveTabs'); ?>
<?php TP::js('plugins/range-and-circulr-slider/circle-progress'); ?>
<?php TP::js('plugins/range-and-circulr-slider/bootstrap-slider.min'); ?>

<?php TP::js('teacher-profile'); ?>

<?php get_template_part('inc/document_end'); ?>

	<?php } elseif(is_user_logged_in() && $user->roles[0] == "student"){
	$url= site_url('student-dashboard');
	wp_redirect($url);
	}else{
	$url = site_url();
	wp_redirect($url);
}
?>