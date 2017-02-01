
$('.datepicker').datepicker();
//$('fieldset.temp input').attr('title','Click on Edit Profile to edit thid field');
$('.edit_profile').click(function(){
	event.preventDefault();
	$('.temp').prop('disabled',false);
	$('fieldset.temp').removeClass('disabled');
	$(this).hide();
	$('button.btn.dropdown-toggle.selectpicker').removeClass('disabled');
	$('.bootstrap-select.btn-group .dropdown-menu li').removeClass('disabled');
	$('.update_profile').show();

})
