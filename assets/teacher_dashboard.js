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
     	//alert(respond);
     	 var obj  =  JSON.parse(respond); 
     	 url = obj.encryptedlaunchurl;
     	 error = obj.error;     	   	
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
/*	var cid	 = $('.decline_session').attr('class_id');
	var teacher_id = $(".decline_session").attr('teacher_id');	
	var student_id = $('.decline_session').attr('student_id');*/
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
   	cancel_session_by = $('#teachername').val();

  $.ajax({
        url : ajax_url,
        method  : 'post',
        data   : { action: 'cancelled_session',content: data, get_reason: reason, cancelledby: cancel_session_by},

       success: function (response) {
       alert(response);      
    }
  });   
}
	});
	});