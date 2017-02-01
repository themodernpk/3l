<?php
/*
Template Name: Book_Session
*/
?>
<?php    
    session_start();
    $timezone = $_SESSION['time'];
?>
<?php $teacher_email = $_GET['email'];
      $teacher_subject = $_GET['subject'];
 
$teacher = get_user_by('email',$teacher_email);
$teacher_meta = get_user_meta($teacher->ID);
/*echo"<pre>";
print_r($teacher_meta);
echo"</pre>";*/
?>
<?php get_template_part('header-dashboard'); ?>
<div class="book_session mrg_top">
	<div class="Book_Your_Session">
		<h4>Book Your Session</h4>
		<div class="modal_logo">
    <?php $image = $teacher_meta['profile_image'][0]; ?>
			<img src="<?php if($image){ echo $image; }else{ echo site_url().'/wp-content/uploads/2016/11/user.png'; } ?>">
		</div>
	</div>
	<div class="container">
		<div class="book_now">
			<span>Your Tutor</span>
			<h5><?php echo $teacher->data->display_name; ?></h5>    
			<div class="modal-body choose_content">
				<form data-parsley-validate="" id="book_form" method="POST" action="" enctype="multipart/form-data" >
					<div class="row">
						<div class="col-xs-6">
							<div class="select_group">
								<div class="form-group">
									<input class="form-control" type="text" name="title" value="<?php echo $teacher_subject; ?>" id="sub" required="">
								</div>
								<div class="form-group">
									<select class="selectpicker" name="time" id="time"  title="Select Hours Needed" required="">
										<option>Hours</option>
										<option>01</option>
										<option>02</option>
										<option>03</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text"  placeholder="Select Date" class="form-control datepicker" id="date" name="date" required="" value=""  data-date-start-date="0d">
									<span class="form-gp-icon"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
								</div>
							</div>
						</div><!--main col-xs-6-->

						<div class="col-xs-6">



             <!-- <label class="span1 hasTip"  title="timezone">Time Zone:</label> -->
             <!-- <div class="controls"> -->
             <div class="form-group">
              <select name="timezone" id="timezone" class="valid selectpicker" data-placeholder="Time Zone:" value="" required>
                <option value="">Select Time Zone:</option>
                <option title="GMT Standard Time" value="28">(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                <option title="Greenwich Standard Time" value="30">(GMT) Monrovia, Reykjavik</option>
                <option title="W. Europe Standard Time" value="72">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                <option title="Romance Standard Time" value="53">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                <option title="Central European Standard Time" value="14">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                <option title="W. Central Africa Standard Time" value="71">(GMT+01:00) West Central Africa</option>
                <option title="Jordan Standard Time" value="83">(GMT+02:00) Amman</option>
                <option title="Middle East Standard Time" value="84">(GMT+02:00) Beirut</option>
                <option title="Egypt Standard Time" value="24">(GMT+02:00) Cairo</option>
                <option title="South Africa Standard Time" value="61">(GMT+02:00) Harare, Pretoria</option>
                <option title="FLE Standard Time" value="27">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                <option title="Jerusalem Standard Time" value="35">(GMT+02:00) Jerusalem</option>
                <option title="E. Europe Standard Time" value="21">(GMT+02:00) Minsk</option>
                <option title="Namibia Standard Time" value="86">(GMT+02:00) Windhoek</option>
                <option title="GTB Standard Time" value="31">(GMT+03:00) Athens, Istanbul, Minsk</option>
                <option title="Arabic Standard Time" value="2">(GMT+03:00) Baghdad</option>
                <option title="Arab Standard Time" value="49">(GMT+03:00) Kuwait, Riyadh</option>
                <option title="Russian Standard Time" value="54">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                <option title="E. Africa Standard Time" value="19">(GMT+03:00) Nairobi</option>
                <option title="Georgian Standard Time" value="87">(GMT+03:00) Tbilisi</option>
                <option title="Iran Standard Time" value="34">(GMT+03:30) Tehran</option>
                <option title="Arabian Standard Time" value="1">(GMT+04:00) Abu Dhabi, Muscat</option>
                <option title="Azerbaijan Standard Time" value="88">(GMT+04:00) Baku</option>
                <option title="Caucasus Standard Time" value="9">(GMT+04:00) Baku, Tbilisi, Yerevan</option>
                <option title="Mauritius Standard Time" value="89">(GMT+04:00) Port Louis</option>
                <option title="Afghanistan Standard Time" value="47">(GMT+04:30) Kabul</option>
                <option title="Ekaterinburg Standard Time" value="25">(GMT+05:00) Ekaterinburg</option>
                <option title="Pakistan Standard Time" value="90">(GMT+05:00) Islamabad, Karachi</option>
                <option title="West Asia Standard Time" value="73">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                <option title="India Standard Time" value="33">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                <option title="Sri Lanka Standard Time" value="62">(GMT+05:30) Sri Jayawardenepura</option>
                <option title="Nepal Standard Time" value="91">(GMT+05:45) Kathmandu</option>
                <option title="N. Central Asia Standard Time" value="42">(GMT+06:00) Almaty, Novosibirsk</option>
                <option title="Central Asia Standard Time" value="12">(GMT+06:00) Astana, Dhaka</option>
                <option title="Myanmar Standard Time" value="41">(GMT+06:30) Rangoon</option>
                <option title="SE Asia Standard Time" value="59">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                <option title="North Asia Standard Time" value="50">(GMT+07:00) Krasnoyarsk</option>
                <option title="China Standard Time" value="17">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                <option title="North Asia East Standard Time" value="46">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                <option title="Malay Peninsula Standard Time" value="60">(GMT+08:00) Kuala Lumpur, Singapore</option>
                <option title="W. Australia Standard Time" value="70">(GMT+08:00) Perth</option>
                <option title="Taipei Standard Time" value="63">(GMT+08:00) Taipei</option>
                <option title="Tokyo Standard Time" value="65">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                <option title="Korea Standard Time" value="77">(GMT+09:00) Seoul</option>
                <option title="Yakutsk Standard Time" value="75">(GMT+09:00) Yakutsk</option>
                <option title="Cen. Australia Standard Time" value="10">(GMT+09:30) Adelaide</option>
                <option title="AUS Central Standard Time" value="4">(GMT+09:30) Darwin</option>
                <option title="E. Australia Standard Time" value="20">(GMT+10:00) Brisbane</option>
                <option title="AUS Eastern Standard Time" value="5">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                <option title="West Pacific Standard Time" value="74">(GMT+10:00) Guam, Port Moresby</option>
                <option title="Tasmania Standard Time" value="64">(GMT+10:00) Hobart</option>
                <option title="Vladivostok Standard Time" value="69">(GMT+10:00) Vladivostok</option>
                <option title="Central Pacific Standard Time" value="15">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                <option title="New Zealand Standard Time" value="44">(GMT+12:00) Auckland, Wellington</option>
                <option title="Fiji Standard Time" value="26">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                <option title="Azores Standard Time" value="6">(GMT-01:00) Azores</option>
                <option title="Cape Verde Standard Time" value="8">(GMT-01:00) Cape Verde Is.</option>
                <option title="Mid-Atlantic Standard Time" value="39">(GMT-02:00) Mid-Atlantic</option>
                <option title="E. South America Standard Time" value="22">(GMT-03:00) Brasilia</option>
                <option title="Argentina Standard Time" value="94">(GMT-03:00) Buenos Aires</option>
                <option title="SA Eastern Standard Time" value="55">(GMT-03:00) Buenos Aires, Georgetown</option>
                <option title="Greenland Standard Time" value="29">(GMT-03:00) Greenland</option>
                <option title="Montevideo Standard Time" value="95">(GMT-03:00) Montevideo</option>
                <option title="Newfoundland Standard Time" value="45">(GMT-03:30) Newfoundland</option>
                <option title="Atlantic Standard Time" value="3">(GMT-04:00) Atlantic Time (Canada)</option>
                <option title="SA Western Standard Time" value="57">(GMT-04:00) Georgetown, La Paz, San Juan</option>
                <option title="Central Brazilian Standard Time" value="96">(GMT-04:00) Manaus</option>
                <option title="Pacific SA Standard Time" value="51">(GMT-04:00) Santiago</option>
                <option title="Venezuela Standard Time" value="76">(GMT-04:30) Caracas</option>
                <option title="SA Pacific Standard Time" value="56">(GMT-05:00) Bogota, Lima, Quito</option>
                <option title="Eastern Standard Time" value="23">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                <option title="US Eastern Standard Time" value="67">(GMT-05:00) Indiana (East)</option>
                <option title="Central America Standard Time" value="11">(GMT-06:00) Central America</option>
                <option title="Central Standard Time" value="16">(GMT-06:00) Central Time (US &amp; Canada)</option>
                <option title="Mexico Standard Time" value="37">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                <option title="Canada Central Standard Time" value="7">(GMT-06:00) Saskatchewan</option>
                <option title="US Mountain Standard Time" value="68">(GMT-07:00) Arizona</option>
                <option title="Mexico Standard Time" value="38">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                <option title="Mountain Standard Time" value="40">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                <option title="Pacific Standard Time" value="52">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                <option title="Pacific Standard Time (Mexico)" value="104">(GMT-08:00) Tijuana, Baja California</option>
                <option title="Alaskan Standard Time" value="48">(GMT-09:00) Alaska</option>
                <option title="Hawaiian Standard Time" value="32">(GMT-10:00) Hawaii</option>
                <option title="Samoa Standard Time" value="58">(GMT-11:00) Midway Island, Samoa</option>
                <option title="Dateline Standard Time" value="18">(GMT-12:00) International Date Line West</option>
                <option title="Eastern Daylight Time" value="105">(GMT-4:00) Eastern Daylight Time (US &amp; Canada)</option>
                <option title="Central Europe Standard Time" value="13">GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
              </select>

            </div>

            <div class="row select_time_row form-group ">
              <div class="col-xs-6">
                <div class="form-group date">
                  <input type="text"  id='start_time' placeholder="Select Start Time" class="form-control datetimepicker3"  name="start_time" required="" value="">
                  <span class="form-gp-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                </div>              
              </div>

              <div class="col-xs-6">
                <div class="form-group date">
                  <input type="text"  id='end_time' placeholder="Select End Time" class="form-control datetimepicker3" name="end_time" required="" value="">
                  <span class="form-gp-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <input class="form-control" id="t_id" type="hidden" name="ask_teacher_email" value="<?php echo $teacher_email; ?>">             
            </div>
            <div class="form-group">
              <textarea class="form-control" id="problem" name="problem" placeholder="Describe your problem" required=""></textarea>

            </div>
          </div> <!-- main col-xs-6 (2) -->



          <div class="image_group col-xs-12">
           <div class="upload_new">
            <p>If your question is complex you can upload image from your device (optional )</p>

            <div class="upload">
             <input type="file" name="book_question" id="filer_input" multiple="multiple">
             <!-- <label for="newtutor">Upload</label> -->
           </div>
         </div>
         <div class="n_img"></div>
       </div><!--image_group-->


     </div>



     <div class="submit_hr text-center">
      <span>(Note: Please attend to the classroom link "Start Session" on your dashboard, which will be active upon confirming session 3-4 mins before the session starts)
      </span>
      <div class="form-group choose_here">

       <label>
        <p>Choose session Type :</p>
      </label>
      <div class="input_grp">
        <div>
         <input id="live" type="radio" name="session_type" value="live" id="session_type" required="">
         <label for="live" class="radio-inline">Live Session</label>
       </div>
       <div>
         <input id="written" type="radio" name="session_type" value="written" required="" id="session_type">
         <label for="written" class="radio-inline">Written Session</label>
       </div>
     </div>
   </div>
   <button type="submit" name="book_now" class="btn book btn-default">Book Now</button>
 </div>
</form>
</div>
</div>
</div>
</div>



<?php get_footer(); ?>

<?php TP::js('plugins/bootstrap-datepicker/js/bootstrap-datepicker'); ?>

<?php TP::js('plugins/bootstrap-datetimepicker/js/moment'); ?>

<?php TP::js('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min'); ?>

<?php TP::js('plugins/jQuery.filer/jquery.filer'); ?>

<?php TP::js('search'); ?>

<script>
  var class_id;
  $(".book_now").on("submit", "#book_form", function (e) {

   e.preventDefault();

   var data = $(this).serialize();


   var test ="https://api.braincert.com/v2/schedule?apikey=PFwjLqc9NNDzyHFJb6q4";

   $.ajax({
     type: "POST",
     url: test,
     data: data,    
     context: this,
     error: function (xhr, ajaxOptions, thrownError) {
       console.log("error") ; 
     },
     success: function (respond){

      var obj  =  JSON.parse(respond);    
      class_id = obj.class_id;
      callThis();
      $('#class_id').attr('value',class_id);     
    }
  }); 

   function callThis(){
    $.ajax({
      url : ajax_url,
      method  : 'post',
      data   : { action: 'book_session', mess: data, id: class_id},

      success: function (response) {
       alert(response); 
      window.location.href = "student-dashboard";     
   }
 });   
  }
});  
</script>

<script type="text/javascript">
    $(document).ready(function() {
        if("<?php echo $timezone; ?>".length==0){
            var visitortime = new Date();
            var visitortimezone = "GMT " + -visitortime.getTimezoneOffset()/60;
            $('span#select2-timezone-container').text(visitortimezone);        
        }
    });
</script>
<?php get_template_part('inc/document_end'); ?>