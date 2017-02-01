<?php
/*
Template Name: contact
*/
?>
<?php
if(function_exists('ot_get_option')){
	$email = ot_get_option('emails');
}
if (isset($_POST['contact'])) {
	$captcha=$_POST['g-recaptcha-response'];
	if(!$captcha){
          $validate_recaptcha = 'This is required field.';
          }else{
       
	$subject = 'Message via 3lemini contact form';
	$message = '<h4>From: ' . $_POST['fullname'] . '</h4>';
	$message .= '<h4>Email: ' . $_POST['email'] . '</h4>';
	$message .= '<h4>Message: </h4><p>' . $_POST['msg'] . '</p>';
	$headers[] = 'From: 3lemni<test@3lemni.com>';
	$headers[] .= 'Content-Type: text/html; charset=UTF-8';
	$to        =  $email;
	$result = wp_mail($to, $subject, $message, $headers);
	if ($result) {
		$response = '<div class="alert alert-success" role="alert"><b>Thankyou! </b> we will contact you soon</div>';
	}else{
		$response = '<div class="alert alert-danger" role="alert"><b>Oh snap!</b>Error while Submitting the form</div>';
	}
}
}
$custom = get_post_custom();
if(function_exists('ot_get_option')){
	$faqs = ot_get_option('faq');
	$social_icons = ot_get_option('social_icons');
	$contacts = ot_get_option('contact_us');
}
get_template_part( "header-dashboard" ); ?>

<section class="faq_top mrg_top">
	<div class="container">
		<div class="contact_cont">
			<div class="ct_image">
				<?php the_post_thumbnail(); ?>
			</div>
			<h1><?php wp_title(''); ?></h1>
		</div>
	</div>
</section>
<?php get_template_part('inc/who_i_am'); ?>
<div class="contact">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 pull-right ">
				<div class="cont_form">
					<h4 class="success"> <?php echo $response; ?>  </h4>
					<h3><?php echo $custom['wpcf-contact-form-heading'][0]; ?></h3>
					<form action="" method="POST"  data-parsley-validate="" id="contact-form">
						<div class="form-group cont_dtls ">
							<div class="col-sm-6">
								<input type="text" placeholder="Name" class="form-control" id="name" name="fullname" value="<?php echo (isset($_POST['fullname']) ? $_POST['fullname'] : ''); ?>" data-parsley-minlength="2" data-parsley-maxlength="50" data-parsley-trigger="change" required="">
							</div>
							<div class="col-sm-6">
								<input type="text" placeholder="Email" class="form-control" id="email" name="email" data-parsley-trigger="change" data-parsley-type="email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : ''); ?>" required="">
							</div>
							<div class="col-sm-12">
								<textarea placeholder="Message" class="form-control" name="msg" value="<?php echo (isset($_POST['msg']) ? $_POST['msg'] : ''); ?>" required="" data-parsley-minlength="5" data-parsley-maxlength="500"></textarea>
							</div>
							<div class="col-xs-6">
								<div class="g-recaptcha" data-sitekey="6Ldg_wsUAAAAADR6RD_s76eqVOUXqodDNYro3lkD" data-callback="onReturnCallback" required=""></div>
								<span class="validate"><?php echo $validate_recaptcha; ?></span>
							</div>
							<div class="col-xs-6">
								<button type="submit" class="btn btn-defaultsub " name="contact">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-6 cont_us">
				<div class="contact_us">
					<h1>Contact Us</h1>
					<p><?php echo $custom['wpcf-contact-head'][0]; ?></p>
					<div class="cont_dtls">
						<div class="eql_hgt">
							<div class="flex-column grad_bg adrs wow fadeIn" data-wow-delay="0s">
								<p class="add">Registered Address:
									<span><?php echo ot_get_option('address'); ?></span>
								</p>
							</div>
							<div class="flex-column grad_bg numb wow fadeIn" data-wow-delay="1s">
								<p class="num"><?php echo $contacts[1]['title']; ?>
									<span>
										<a href="tel:(+1) 917.525.2548"><?php echo $contacts[1]['content']; ?></a>

									</span>
								</p>
							</div>
						</div>
					</div>
					<div class="cont_dtls">
						<div class="eql_hgt">
							<div class="flex-column grad_bg email wow fadeIn" data-wow-delay="2s">
								<p class="mail"><?php echo $contacts[2]['title']; ?>
									<span><a href="mailto:abc@example.com"><?php echo $contacts[2]['content']; ?></a></span>
								</p>
							</div>
							<div class="flex-column grad_bg ico_social wow fadeIn" data-wow-delay="3s">
								<div class="social_icons">
									<p class="con">Connect with us</p>
									<ul>
										<?php foreach ($social_icons as $social) {
											?>
											<li class="<?php echo $social['main_class']; ?>">
												<a href="<?php echo $social['link']; ?>" target="_blank">
													<i class="<?php echo $social['class']; ?>" aria-hidden="true"></i>
												</a>
											</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?php //tp::js('faq'); ?>
	<script type="text/javascript">
		var onReturnCallback = function(response) {
    //alert('g-recaptcha-response: ' + grecaptcha.getResponse());
    var url='proxy.php?url=' + 'https://www.google.com/recaptcha/api/siteverify';
    $.ajax({ 'url' : url,
    	dataType: 'json',
    	data: { response: response},
    	success: function( data  ) {
    		var res = data.success.toString();
    		alert( "User verified: " + res);
    		if (res ==  'true') {
    			document.getElementById('g-recaptcha').innerHTML = 'THE CAPTCHA WAS SUCCESSFULLY SOLVED';
    		}
                           } // end of success:
         }); // end of $.ajax
}; // end of onReturnCallback
</script>
<?php get_footer(); ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js'></script>
<script>
	function scaleCaptcha(elementWidth) {
		// Width of the reCAPTCHA element, in pixels
		var reCaptchaWidth = 304;
		// Get the containing element's width
		var containerWidth = $('.cont_dtls .col-xs-6').width();

		// Only scale the reCAPTCHA if it won't fit
		// inside the container
		if($(window).width() <= 550){
			console.log('test');
			// Calculate the scale
			var captchaScale = containerWidth / reCaptchaWidth;
			console.log(captchaScale);
			// Apply the transformation
			$('.g-recaptcha').css({
				'transform':'scale('+captchaScale+')'
			});
		}
	}

	if($(window).width() <= 550){
		$(function() {
		// Initialize scaling
		scaleCaptcha();

		// Update scaling on window resize
		// Uses jQuery throttle plugin to limit strain on the browser
		$(window).resize( $.throttle( 100, scaleCaptcha ) );

	});
	}
</script>
<?php wp_footer(); ?>
<?php TP::js('testing_edgePreload'); ?>
<?php get_template_part('inc/document_end'); ?>