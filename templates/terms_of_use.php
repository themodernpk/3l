<?php
/*
Template Name: terms
*/
?>
<?php
$termsofuse = ot_get_option('terms');
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
							<?php foreach ($termsofuse as $term) { ?>
									<li><a href="#<?php echo $term['section_id'];?>"><?php echo $term['title']; ?></a></li>
						<?php	} ?>


							</ul>
						</nav>

						<div id="content">
						<?php foreach ($termsofuse as $term) { ?>

							<section id="<?php echo $term['section_id'];?>">
								<div class="content">
									<h5><?php echo $term['title'];?></h5>
									<p><?php echo $term['content'];?> </p>
								</div>
							</section>
							<?php } ?>

						</div>
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