
$(document).ready(function(){
	$(function () {
		$('.vk_toggle').on('click', function() {
			$("#navigation_left").toggleClass("show_nav");
		});
	});

})

$(document).ready(function(){

	(function() {
		"use strict";
		var toggles = document.querySelectorAll(".vk_toggle");

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


})

/*jQuery*/

$(document).ready(function(){
	var ink, d, x, y;
	$(".action_detail a").hover(function(e){
		if($(this).find(".ink").length === 0){
			$(this).prepend("<span class='ink'></span>");
		}

		ink = $(this).find(".ink");
		ink.removeClass("animate");

		if(!ink.height() && !ink.width()){
			d = Math.max($(this).outerWidth(), $(this).outerHeight());
			ink.css({height: d, width: d});
		}

		x = e.pageX - $(this).offset().left - ink.width()/2;
		y = e.pageY - $(this).offset().top - ink.height()/2;

		ink.css({top: y+'px', left: x+'px'}).addClass("animate");
	});
});