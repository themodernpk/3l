<?php
$newletter = ot_get_option('newsletter');
?>
<style>
	.edgeLoad-sb_newsletter { visibility:hidden; }
</style>

<div class="stage_outer pos-rel">

	<div class="stay_updated1">
		<h2><?php echo $newletter[0]['title']; ?></h2>
		<p><?php echo $newletter[0]['content']; ?></p>
	</div>

	<div id="Stage" class="sb_newsletter "> </div>
	
	<div class="newsletter">
		<div class="container">

			<div class="col-md-8 col-md-offset-4 col-xs-10  col-xs-offset-1">
				<form class="form-inline" data-parsley-validate="" method="POST" action="" >

					<div class="form-group">
						<input type="email" placeholder="Email Your Email address" class="form-control" id="email" name="email" data-parsley-trigger="change" required=""> 
					</div>

					<button type="submit" class="btn btn-default" name='subscribe'>Subscribe</button>
				</form>
			</div>
		</div>
	</div>
</div>