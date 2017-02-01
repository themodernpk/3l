<?php
/*
Template Name: privacy_policy
*/
?>
<?php
 $policies = ot_get_option('policy');
 get_template_part( "header-dashboard" );
 ?>

<section class="terms mrg_top">
	<div class="term text-center">
		<h1><?php wp_title(''); ?></h1>		
	</div>
	<div class="bg">
		<div class="container">
			<div class="bg_white">
				<div class="terms_list">
					<div class="bdr_bl">
						<?php
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post();
								the_content();
							}
						}
						?>
						<nav id="navigation-menu">
							<ul>
								<?php foreach ($policies as $policy) { ?>
									<li><a href="#<?php echo $policy['section_name'];?>"><?php echo $policy['title']; ?></a></li>
						<?php	} ?>
							</ul>
						</nav>

						<div id="content">
							<?php foreach ($policies as $policy) { ?>

							<section id="<?php echo $policy['section_name'];?>">
								<div class="content">
									<h5><?php echo $policy['title'];?></h5>
									<p><?php echo $policy['content'];?> </p>
								</div>
							</section>
							<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
<?php TP::js('faq'); ?>
<?php wp_footer(); ?>
<?php TP::js('testing_edgePreload'); ?>
<?php get_template_part('inc/document_end'); ?>