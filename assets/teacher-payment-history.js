


$( "input#via_bank_acc" ).on( "click", function() {
	$(".via_bank").addClass("current");
	$(".via_paypal").removeClass("current");
});


$( "input#via_paypal" ).on( "click", function() {
	$(".via_bank").removeClass("current");
	$(".via_paypal").addClass("current");
});







