// FAQ SECTION

$('#navigation-menu a[href^="#"]').on('click',function (e) {
	e.preventDefault();
	var target = this.hash;
	var $target = $(target);
	var nv_ht = $(".vk_dashboard_navbar").height()+30;
       // console.log(nv_ht);

       if($(window).width() <= 991){
       	$('html, body').stop().animate({
       		'scrollTop': $target.offset().top
       	}, 900, 'swing', function () {
       		window.location.hash = target;
       	});
       }
       else{

       	$('html, body').stop().animate({
       		'scrollTop': $target.offset().top-nv_ht
       	}, 900, 'swing', function () {
       		window.location.hash = target;
       	});

       }
   });

$('#navigation-menu ul li a').click(function(e) {
	e.preventDefault();
	$('#navigation-menu ul li a').removeClass('active');
	$(this).addClass('active');
});

if($(window).width() <= 767){
       // console.log("test");
       $('.panel-collapse').on('shown.bs.collapse', function(e) {
       	var $panel = $(this).closest('.panel');
       	$('html,body').animate({
       		scrollTop: $panel.offset().top
       	}, 500);
       });
   }
   else{
   	$('.panel-collapse').on('shown.bs.collapse', function(e) {
          //  console.log("test1");
          var nv_ht = $(".vk_dashboard_navbar").height()+30;
          var $panel = $(this).closest('.panel');
          $('html,body').animate({
          	scrollTop: $panel.offset().top-nv_ht
          }, 500);
      });
   }

   (function() {

   	$(".panel").on("show.bs.collapse hide.bs.collapse", function(e) {
            //
            // console.log("subrat");
            if (e.type=='show'){
            	$(this).addClass('actives');
            }else{
            	$(this).removeClass('actives');
            }
        });

   }).call(this);


var Average = function() {

	var result = r.getValue() + g.getValue() + b.getValue();
	var finalresult = result / 3;


	$('.Averagevalue').text( finalresult.toFixed(1) )
	return Math.round(finalresult * 10) / 10;
};

var r = $('.ex1').slider()
.on('slide', Average)
.data('slider');

var g = $('.ex2').slider()
.on('slide', Average)
.data('slider');

var b = $('.ex3').slider()
.on('slide', Average)
.data('slider');


$(".ex1").on("slide", function(slideEvt) {
	$(".ex1SliderVal1").text(slideEvt.value);
		//console.log(Average());

		$('.third.circle').circleProgress({
			value: Average()/10 ,
			fill: {gradient: ['#6faa6a', '#87bf5c']}
		})
		.on('circle-animation-progress', function(event, progress, stepValue) {
			$(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));
		});
	});

$(".ex2").on("slide", function(slideEvt) {
	$(".ex1SliderVal2").text(slideEvt.value);
	$('.third.circle').circleProgress({
		value: Average()/10 ,
		fill: {gradient: ['#6faa6a', '#87bf5c']}
	})
	.on('circle-animation-progress', function(event, progress, stepValue) {
		$(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));
	});
});

$(".ex3").on("slide", function(slideEvt) {
	$("#.x1SliderVal3").text(slideEvt.value);
	$('.third.circle').circleProgress({
		value: Average()/10 ,
		fill: {gradient: ['#6faa6a', '#87bf5c']}
	})
	.on('circle-animation-progress', function(event, progress, stepValue) {
		$(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));
	});
});


/*$('.third.circle').circleProgress({
	value: 0.5,
	fill: {gradient: ['#6faa6a', '#87bf5c']}
})
.on('circle-animation-progress', function(event, progress, stepValue) {
	$(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));
});
*/
//RATE REVIEW POPUP
$(document).ready(function(){
var avg_val = $('.third.circle.averagevalue span.Averagevalue:first').text();
	// alert(test);
	$('.third.circle').circleProgress({
	value: avg_val/10,
	fill: {gradient: ['#6faa6a', '#87bf5c']}
})
.on('circle-animation-progress', function(event, progress, stepValue) {
	$(this).find('strong').text(String(stepValue.toFixed(2)).substr(1));
});

});

//EASY RESPONSIVE TABS
$('#profile_tabs').easyResponsiveTabs({
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
//EASY RESPONSIVE TABS





$(".toggle_vv").on("click", function(){
	$(this).parent().siblings(".lower_rating").fadeToggle( "fast", "linear" );
	$(this).toggleClass("btn-del");
})

$('.datepicker').datepicker({
  format: 'yyyy-mm-dd' 
  });




