$(document).ready(function(){	
	$('.session_cancel').click(function(){
		var class_id =$(this).attr("value");
		var teacher_id =$(this).attr("tid");
		var student_id =$(this).attr("sid");	
		$('#class_id').val(class_id);
		$('#teacher_id').val(teacher_id);
		$('#student_id').val(student_id);
	});
});

$(document).ready(function(){
	$(".action_detail").on("submit", "#start_session_form", function (e){
		e.preventDefault();
		alert('working');	
		var data = $(this).serialize();
		var class_id = $(this).attr('clas_id');
		var Teacher_id = $(this).attr('user_id');
		var Teacher_name = $(this).attr('username');
		var isteacher = $(this).attr('isTeacher');
		var course = $(this).attr('coursename');
		var lesson = $(this).attr('lessonname');
	// alert(data);

	var test ="https://api.braincert.com/v2/getclasslaunch?apikey=PFwjLqc9NNDzyHFJb6q4"; 
	$.ajax({
		type: "POST",
		url: test,
		data: data,    
		context: this,

		success: function (respond){ 
			var obj  =  JSON.parse(respond); 
			url = obj.encryptedlaunchurl;
			error = obj.error; 
			alert(respond);    	
			if(!error){
				window.location.href = url;
			}     
		}
	}); 
});
});

$(document).ready(function(){
	$(".right_side").on("submit", "#cancel_session_form", function (e) {
		e.preventDefault();			
		var data = $(this).serialize();
		var test ="https://api.braincert.com//v2/removeclass?apikey=PFwjLqc9NNDzyHFJb6q4";    
		$.ajax({
			type: "POST",
			url: test,
			data: data,    
			context: this,       
			success: function (respond){ 
				callThis();     	
			}
		});
		function callThis(){
			var reason = $('#select_reason').val();   
			$.ajax({
				url : ajax_url,
				method  : 'post',
				data   : { action: 'cancelled_session',content: data, get_reason: reason},

				success: function (response) {
					alert(response);      
				}
			});   
		}
	});
});

$(document).ready(function(){
	$('.reschedule_session').click(function(){
		var student_id 		= $(this).data('student_id');
		var teacher_id 		= $(this).data('teacher_id');
		var class_id 		= $(this).data('class_id');
		var start_date 		= $(this).data('start_date');
		var start_time 		= $(this).data('start_time');
		var subject 		= $(this).data('subject');
		var session 		= $(this).data('session_type');
		var student_name 	= $(this).data('student_name');
		var student_image 	= $(this).data('student_image');

		$('#student_id').val(student_id);
		$('#teacher_id').val(teacher_id);
		$("#select_date").val(start_date);
		$("#select_time").val(start_time);
		$("#class_id").val(class_id);
		$("#select_subject").val(subject);
		$("#select_session").val(session);
		$("#select_student_name").val(student_name);
		$("#select_student_image").val(student_image);
	});
});

$(document).ready(function(){
	$(".right_side").on("submit", "#reschedule_form", function (e) {
		e.preventDefault();
		var data = $(this).serialize();
		var new_time = $('input#datetimepicker3').val();
		var new_date = $('input#new_date').val();	
		$.ajax({
			url : ajax_url,
			method  : 'post',
			data   : {action: 'reschedule_session',content: data, get_time: new_time, get_date: new_date },

			success: function (response) {
				alert(response);      
			}
		});   

	});
});


$(document).ready(function(){
	var id= $('#start_userId').val();
	//alert(id);
	$.ajax({
		url : ajax_url,
		method  : 'post',
		data   : { action: 'check_session',user_id: id },

		success: function (response) {
			console.log(response);      
		}
	});   
});

$(document).ready(function(){
	$('.rate_review').click(function(){
		var t_name  = $(this).data('teacher_name');
		var t_image = $(this).data('teacher_image');
		$('.rating_t_image').attr('src',t_image);
		$('.rating_t_name').text(t_name);
	});
});

$(document).ready(function(){
	$(".lower_rating").on("submit", "#rate_review_form", function (e) {
		e.preventDefault();
		var studentname = $('input.studentname').val();
		var student_id = $('input.studentID').val();

		var rating = $('#Averagevalue').text();
		var t_name = $('.rating_t_name').text();
		var review = $('.review_comment').val();

		var explain_method     = $('span#ex1SliderVal1').text();
		var communication      = $('span#ex1SliderVal2').text();
		var Recommendabale     = $('span#ex1SliderVal3').text();
		
		$.ajax({
			url : ajax_url,
			method  : 'post',
			data   : { action: 'rate_teacher',
			student_name 	 : studentname,
			Student_ID 		 : student_id,
			teacher_name 	 : t_name, 
			get_rating 		 : rating, 
			get_review		 : review, 
			get_em_rating     : explain_method,
			get_comm_rating   : communication,
			get_recmnd_rating : Recommendabale,
		},

		success: function (response) {
			alert(response); 			
		//  $('.rating_given').html("Rated Successfully");    
		}
	});
	});
});
