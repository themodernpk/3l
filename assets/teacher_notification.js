
////////////////// Ajax Accepting session request ////////////////////////

$(document).ready(function(){
	$(".accept_session").on("click",function(e){
		e.preventDefault();
		var student_id 			= $(this).attr('studentid');		
		var teacher_id 			= $(this).attr('teacherid');
		var teacher_name 		= $(this).attr('teachername');
		var session_subject	 	= $(this).attr('sessionsubject');
		var session_duration 	= $(this).attr('sessionduration');
		var session_date 		= $(this).attr('sessiondate');
		var session_type 		= $(this).attr('sessiontype');	
		var teacher_image 		= $(this).attr('teacherimage');
		var class_start_time 	= $(this).attr('start_time');
		var book_by 			= $(this).attr('bookby');
		var book_user_image		= $(this).attr('bookuserimage');
		var booked_class_id 	= $(this).attr('bookedclassid');
		var book_problem 		= $(this).attr('bookproblem');

	$.ajax({
        url : ajax_url,
        method  : 'post',
        data   : { action: 'accept_session', 
				   get_student_id		: student_id ,
				   get_teacher_id		: teacher_id ,
				   get_teacher_image 	: teacher_image,
				   get_teacher_name		: teacher_name,
				   get_session_subject 	: session_subject,
				   get_session_duration	: session_duration,
				   get_session_date		: session_date,
				   get_session_type		: session_type,
				   get_book_by_name		: book_by,
				   get_book_user_image	: book_user_image, 
				   get_class_id 		: booked_class_id,
				   get_book_problem 	: book_problem,
				   get_class_start_time	: class_start_time

				},
       success: function (response) {
       	if(response == "Successfully Confirmed Session"){
       		window.location.href = "teacher-dashboard";
       	}else{$('p.notify').addClass("error") ;
       			$('p.notify').text(response) ;   }  			

     			}
  });   
});
});

////////////////// Ajax Rejecting session request ////////////////////////

$(document).ready(function(){
$(".cancel_session").on("click",function(e){
		e.preventDefault();	
		var student_id 			= $(this).attr('studentid');		
		var teacher_id 			= $(this).attr('teacherid');
		var teacher_name 		= $(this).attr('teachername');
		var session_subject	 	= $(this).attr('sessionsubject');
		var session_duration 	= $(this).attr('sessionduration');
		var session_date 		= $(this).attr('sessiondate');
		var session_type 		= $(this).attr('sessiontype');	
		var teacher_image 		= $(this).attr('teacherimage');
		var book_by 			= $(this).attr('bookby');
		var book_user_image		= $(this).attr('bookuserimage');
		var booked_class_id 	= $(this).attr('bookedclassid');
		var book_problem 		= $(this).attr('bookproblem');

	$.ajax({
        url : ajax_url,
        method  : 'post',
        data   : { action: 'decline_session', 
        		   get_student_id		: student_id ,
				   get_teacher_id		: teacher_id ,
				   get_teacher_image 	: teacher_image,
				   get_teacher_name		: teacher_name,
				   get_session_subject 	: session_subject,
				   get_session_duration	: session_duration,
				   get_session_date		: session_date,
				   get_session_type		: session_type,
				   get_class_id 		: booked_class_id,
				   get_book_problem 	: book_problem

				},
				   
       success: function (respond) {
       		if(respond == "Successfully Rejected Session"){
       		window.location.href = "teacher-notification";
       		}else{ 
       			$('p.notify').addClass("error") ;
       			$('p.notify').text(respond) ;  }  
     			}
  });   
});
});

////////////////// Ajax Accepting Question request ////////////////////////

$(document).ready(function(){
	$(".accept_question").on("click",function(e){

		e.preventDefault();
		var ques_id 			= $(this).data('question_id');
		var student_id 			= $(this).data('student_id');		
		var teacher_id 			= $(this).data('teacher_id');
		var teacher_name 		= $(this).data('teacher_name');		
		var teacher_image 		= $(this).data('ask_teacher_image');		
		var ask_problem 		= $(this).data('ask_problem');
		
	$.ajax({
        url : ajax_url,
        method  : 'post',
        data   : { action: 'accept_question', 
        		   get_question_id 		: ques_id,
				   get_student_id		: student_id ,
				   get_teacher_id		: teacher_id ,
				   get_teacher_image 	: teacher_image,
				   get_teacher_name		: teacher_name,				  
				   get_ask_problem  	: ask_problem,
				   
				},
       success: function (response) {

     				if(response == "Succesfully accepted question"){
       		window.location.href = "teacher-notification";
       		}else{ 
       			$('p.notify').addClass("error") ;
       			$('p.notify').text(response) ;  } 
     			}
  });   
});
});

////////////////// Ajax Rejecting Question request ////////////////////////

$(document).ready(function(){
	$(".reject_question").on("click",function(e){

		e.preventDefault();
		var ques_id 			= $(this).data('question_id');
		var student_id 			= $(this).data('student_id');		
		var teacher_id 			= $(this).data('teacher_id');
		var teacher_name 		= $(this).data('teacher_name');		
		var teacher_image 		= $(this).data('ask_teacher_image');		
		var ask_problem 		= $(this).data('ask_problem');
		//alert(ask_problem);
	$.ajax({
        url : ajax_url,
        method  : 'post',
        data   : { action: 'reject_question',
        		   get_question_id 		: ques_id, 
				   get_student_id		: student_id ,
				   get_teacher_id		: teacher_id ,
				   get_teacher_image 	: teacher_image,
				   get_teacher_name		: teacher_name,				  
				   get_ask_problem  	: ask_problem,
				   
				},
       success: function (response) {
     					if(response == "Succesfully Rejected question"){
       		window.location.href = "teacher-notification";
       		}else{ 
       			$('p.notify').addClass("error") ;
       			$('p.notify').text(response) ;  }  
     			}
  });   
});
});

////////////////// Ajax Accepting Reschedule request ////////////////////////

$(document).ready(function(){
	$('.accept_reschedule').on('click',function(){
		var student_id = $(this).data('student_id');
		var teacher_id = $(this).data('teacher_id');
		var class_id   = $(this).data('class_id');
		var new_date = $(this).data('new_date');
		var new_time   = $(this).data('new_time');
		var old_date = $(this).data('old_date');
		var old_time   = $(this).data('old_time');
		$.ajax({
        url : ajax_url,
        method  : 'post',
        data   : { action: 'accept_reschedule', 
        		   get_student_id : student_id ,
				   get_teacher_id : teacher_id ,				  
				   get_class_id   : class_id,
				   get_new_date   : new_date ,				  
				   get_new_time   : new_time,
				   get_old_date   : old_date ,				  
				   get_old_time   : old_time,
				},
				   
       success: function (response) {
     		if(response == "Successfully Accepted Reschedule Request"){
       		window.location.href = "teacher-dashboard";
       		}else{ 
       			$('p.notify').addClass("error") ;
       			$('p.notify').text(response) ;  } 
     			}
  });   
	});
});

////////////////// Ajax Reschedule Cancel request ////////////////////////

$(document).ready(function(){
	$('.cancel_reschedule').on('click',function(){	
		var student_id = $(this).data('student_id');
		var teacher_id = $(this).data('teacher_id');
		var class_id   = $(this).data('class_id');
		$.ajax({
        url : ajax_url,
        method  : 'post',
        data   : { action: 'reschedule_cancel', 
        		   get_student_id : student_id ,
				   get_teacher_id : teacher_id ,				  
				   get_class_id   : class_id,				   
				},
				   
       success: function (response) {
     		if(response == "Successfully Cancelled Reschedule Request"){
       		window.location.href = "teacher-notification";
       		}else{ 
       			$('p.notify').addClass("error") ;
       			$('p.notify').text(response) ;  } 
     			}
  });	
		
	});
});
