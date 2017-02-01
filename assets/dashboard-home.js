//RATE REVIEW POPUP

var Average = function() {

	var result = r.getValue() + g.getValue() + b.getValue();
	var finalresult = result / 3;


	if( finalresult < 3.5){
		$(".rating_mood").addClass("sad_ch");	
		$(".rating_mood").removeClass("happy_ch");
		$(".rating_mood").removeClass("poke_ch");		
	}

	if(finalresult > 3.5 && finalresult < 6.5){
		$(".rating_mood").addClass("poke_ch");
		$(".rating_mood").removeClass("happy_ch");
		$(".rating_mood").removeClass("sad_ch");	
	}

	if(finalresult > 6.5){			
		$(".rating_mood").addClass("happy_ch");
		$(".rating_mood").removeClass("poke_ch");
		$(".rating_mood").removeClass("sad_ch");
	}

	$('#Averagevalue').text( finalresult.toFixed(1) )
	return Math.round(finalresult * 10) / 10;
};

var r = $('#ex1').slider()
.on('slide', Average)
.data('slider');

var g = $('#ex2').slider()
.on('slide', Average)
.data('slider');

var b = $('#ex3').slider()
.on('slide', Average)
.data('slider');


$("#ex1").on("slide", function(slideEvt) {
	$("#ex1SliderVal1").text(slideEvt.value);
		//console.log(Average());

		$('.third.circle').circleProgress({
			value: Average()/10 ,
			fill: {gradient: ['#6faa6a', '#87bf5c']}
		})
		.on('circle-animation-progress', function(event, progress, stepValue) {
			$(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));
		});
	});

$("#ex2").on("slide", function(slideEvt) {
	$("#ex1SliderVal2").text(slideEvt.value);
	$('.third.circle').circleProgress({
		value: Average()/10 ,
		fill: {gradient: ['#6faa6a', '#87bf5c']}
	})
	.on('circle-animation-progress', function(event, progress, stepValue) {
		$(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));
	});
});

$("#ex3").on("slide", function(slideEvt) {
	$("#ex1SliderVal3").text(slideEvt.value);
	$('.third.circle').circleProgress({
		value: Average()/10 ,
		fill: {gradient: ['#6faa6a', '#87bf5c']}
	})
	.on('circle-animation-progress', function(event, progress, stepValue) {
		$(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));
	});
});


$('.third.circle').circleProgress({
	value: 0.0 ,
	fill: {gradient: ['#6faa6a', '#87bf5c']}
})
.on('circle-animation-progress', function(event, progress, stepValue) {
	$(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));
});


//RATE REVIEW POPUP






//Easy Responsive Tabs
$('#vk_tabs').easyResponsiveTabs({
		type: 'default', //Types: default, vertical, accordion
		width: 'auto', //auto or any width like 600px
		fit: true, // 100% fit in a container
		tabidentify: 'hor_1', // The tab groups identifier
		activate: function(event) { // Callback function if tab is switched
			var $tab = $(this);
			var $info = $('#nested-tabInfo');
			var $name = $('span', $info);
			$name.text($tab.text());
			$info.show();
		}
	});
//Easy Responsive Tabs





//Date Picker
$('.datepicker').datepicker()
//Date Picker





//Date Time Picker
$(function () {
	$('#datetimepicker3').datetimepicker({
		format: 'LT'
	});
});
//Date Time Picker
