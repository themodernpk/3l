<?php
/*
Template Name: faq
*/
?>
<?php $custom = get_post_custom(); 
if(function_exists('ot_get_option')){
	$faqs = ot_get_option('faq');
}
 get_template_part( "header-dashboard" ); ?>

<section class="faq_top mrg_top">
<div class="container">
	<img src="<?php echo $custom['wpcf-faq-banner'][0]; ?>">
	<div class="faq_cont"><p><?php echo $custom['wpcf-faq-banner-content'][0]; ?></p></div>
</div>
</section>
<?php get_template_part('inc/who_i_am'); ?>

<section class="faqs">
	<div class="container">
		<div class="faq">
			<h1 class="text-center"><?php echo $custom['wpcf-faq-head'][0]; ?></h1>
			<div class="panel-group" id="accordion">

			<?php 
				$count=1;
				foreach ($faqs as $faq) 
				{ 
				$class="";
				$set = "";
					if($count==1)
					{
						$class="actives";
						$set = "in";
					}
				?>
		
				<div class="panel panel-default <?php echo $class; ?>">
					<div class="panel-heading ">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $faq['section_id']; ?>"><span><i></i></span><?php echo $faq['title']; ?></a>
						</h4>
					</div>
					<div id="<?php echo $faq['section_id']; ?>" class="panel-collapse collapse <?php echo $set; ?>">
						<div class="panel-body"><?php echo $faq['description']; ?> </div>
						</div>
					</div>
					<?php
						 $count++; }  
					?>
						</div>
					</div>
				</div>
			</section>

<?php get_footer(); ?>
<?php TP::js('faq'); ?>
<?php TP::js('testing_edgePreload'); ?>
<?php get_template_part('inc/document_end'); ?>