<section class="tutor_std">
	<div class="container">
		<div class="i_am_tutor">
			<?php if(is_page(26)){ ?>
			<div class="top_heading">
				<h2>What type of assistance do you need?</h2>
				<p>Proven tutors, recruited from top universities, for high school and college subjects</p>
			</div>
			<?php } ?>
			<div class="row">
				<div class="col-sm-6">
					<div class="tutor wow fadeInDown">
						<a href="<?php echo site_url(); ?>/faqs/">
							<img src="<?php echo ot_get_option('teacher_image'); ?>">
							<h3><?php echo ot_get_option('teacher_title'); ?></h3>
							<p><?php echo ot_get_option('teacher_content'); ?></p>
						</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="tutor student wow fadeInUp">
						<a href="<?php echo site_url(); ?>/faqs/">
							<img src="<?php echo ot_get_option('student_image'); ?>">
							<h3><?php echo ot_get_option('student_title'); ?></h3>
							<p><?php echo ot_get_option('student_content'); ?></p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>