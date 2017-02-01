// equalheight for our packages section



equalheight = function(results){


	var currentTallest = 0,

	currentRowStart = 0,

	rowDivs = new Array(),

	$el,

	topPosition = 0;

	$(results).each(function() {



		$el = $(this);

		$($el).height('auto')

		topPostion = $el.position().top;



		if (currentRowStart != topPostion) {

			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {

				rowDivs[currentDiv].height(currentTallest);

			}

     rowDivs.length = 0; // empty the array

     currentRowStart = topPostion;

     currentTallest = $el.height();

     rowDivs.push($el);

 } else {

 	rowDivs.push($el);

 	currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);

 }

 for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {

 	rowDivs[currentDiv].height(currentTallest);

 }

});

}

$(window).load(function() {
	equalheight('.tutors .eql_height');
});


$(window).resize(function(){
	equalheight('.tutors .eql_height');
});





$(document).ready(function(){
	$(function () {
		$('.filter_nav').on('click', function() {
			$(".mrg_left").toggleClass("show_nav");
		});
	});

})

$(document).ready(function(){

	(function() {
		"use strict";
		var toggles = document.querySelectorAll(".filter_nav");

		for (var i = toggles.length - 1; i >= 0; i--) {
			var toggle = toggles[i];
			toggleHandler(toggle);
		};

		function toggleHandler(toggle) {
			toggle.addEventListener( "click", function(e) {
				e.preventDefault();
				(this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
			});
		}

	})();


});





$(document).ready(function(){
	$('#filer_input').filer({
		showThumbs: true,
		addMore: true,
		allowDuplicates: false,
		appendTo: '.n_img',
		extensions: ["jpg", "png", "gif"],
	});
});





$(function () {
	$('.datetimepicker1').datetimepicker({
	});
});


// datepicker

//Date Picker
$('.datepicker').datepicker({
	format:	'yyyy-mm-dd'
});
//Date Picker


//Date Time Picker
$(function () {
	$('.datetimepicker3').datetimepicker({
		format: 'LT'
	});
});

//Date Time Picker