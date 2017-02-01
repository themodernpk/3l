<?php
/*
Template Name: 404
*/
?>


<?php TP::css('404'); ?>


<?php get_template_part('header-dashboard'); ?>
<div class="main404 margin_top_second pos-rel">

	<div class="abs_404">
		<img class="" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/gif_404.gif?<?php echo date("Ymdgis");?>"> <!-- 404img.png  4o4-->
		<div class="abs_text">
			<p>Oops, Requested page does not exist.</p>
			<a href="<?php echo site_url(); ?>" class="btn">Homepage</a>
		</div>
	</div>

	

	<img class="bg404" src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/404_v6.jpg">
</div>


<?php get_footer(); ?>


<?php// TP::js('logout'); ?>

<?php get_template_part('inc/document_end'); ?>