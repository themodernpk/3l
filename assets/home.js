
// Ready to Tutor Now
var sync1 = $("#sync1");
var sync2 = $("#sync2");
	var slidesPerPage = 4; //globaly define number of elements per page
	var syncedSecondary = true;

	sync1.owlCarousel({
		items : 1,
		slideSpeed : 2000,
		nav: false,
		autoplay: true,
		dots: false,
		loop: true,
		responsiveRefreshRate : 200,
	}).on('changed.owl.carousel', syncPosition);

	sync2
	.on('initialized.owl.carousel', function () {
		sync2.find(".owl-item").eq(0).addClass("current");
	})
	.owlCarousel({
		items : slidesPerPage,
		dots:false,
		responsive:{
			0:{ items:1 },
			450:{ items:1 },
			550:{ items:2 },
			767:{ items:4 },
			1000:{ items:5 },
			1200:{ items:6 },
		},
		nav: false,
		smartSpeed: 200,
		slideSpeed : 500,
			slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
			responsiveRefreshRate : 100
		}).on('changed.owl.carousel', syncPosition2);

	function syncPosition(el) {
		//if you set loop to false, you have to restore this next line
		//var current = el.item.index;

		//if you disable loop you have to comment this block
		var count = el.item.count-1;
		var current = Math.round(el.item.index - (el.item.count/2) - .5);

		if(current < 0) {
			current = count;
		}
		if(current > count){
			current = 0;
		}

		//end block

		sync2
		.find(".owl-item")
		.removeClass("current")
		.eq(current)
		.addClass("current");
		var onscreen = sync2.find('.owl-item.active').length - 1;
		var start = sync2.find('.owl-item.active').first().index();
		var end = sync2.find('.owl-item.active').last().index();

		if (current > end) {
			sync2.data('owl.carousel').to(current, 100, true);
		}
		if (current < start) {
			sync2.data('owl.carousel').to(current - onscreen, 100, true);
		}
	}

	function syncPosition2(el) {
		if(syncedSecondary) {
			var number = el.item.index;
			sync1.data('owl.carousel').to(number, 100, true);
		}
	}

	sync2.on("click", ".owl-item", function(e){
		e.preventDefault();
		var number = $(this).index();
		sync1.data('owl.carousel').to(number, 300, true);
	});


// Ready to Tutor Now END







// Packages


$('#packages_owl').owlCarousel({
	loop:true,
	margin:30,
	nav:true,
	// merge:true,
	dots:false,
	responsive:{
		0:{
			nav:false,
			items:1
		},
		600:{
			nav:false,
			items:2
		},
		1000:{
			nav:true,
			items:3
		}
	}
})

// Packages END





// What people say about us


$(function() {
	$('#rotate-menu').rMenu({
		menuSize			: 420,
		menuRotateDuration	: 500,
		linkColor			: '#333',
		linkSize			: 60,
		linkPadding			: 0,
		border				: false,
			//borderColor			: '#e7e7e7',
			//borderSize			: 1,
			image				: false,
			imageSize			: 240,
			imageBorderSize		: 2,
			imageBorderColor		: '#999',
			imageBgColor		: '#ddd',
			imageOverlayBgColor		: '#fff',
			imageOverlayDuration	: 100,
			contentWrapper		: '',
			contentType			: 'tabs',
			onBeforeLoad			: function() {},
			onAfterLoad				: function() {},
			onMenuClick				: function() {},
			onAjaxLoaded			: function() {},
		});
});

// What people say about us END









//BEAR SVG VIVED

function easeOutBounce (x) {
	var base = -Math.cos(x * (0.5 * Math.PI)) + 1;
	var rate = Math.pow(base,1.5);
	var rateR = Math.pow(1 - x, 2);
	var progress = -Math.abs(Math.cos(rate * (2.5 * Math.PI) )) + 1;
	return (1- rateR) + (progress * rateR);
}

var timing,
timingProps = {
	type: 'delayed',
	duration: 150,
	start: 'autostart',
	pathTimingFunction: Vivus.LINEAR,
	animTimingFunction: Vivus.LINEAR
};

function timingTest (buttonEl, property, type) {
	var activeSibling = buttonEl.parentNode.querySelector('button.active');
	activeSibling.classList.remove('active');
	buttonEl.classList.add('active');

	timingProps.type = (property === 'type') ? type : timingProps.type;
	timingProps.pathTimingFunction = (property === 'path') ? Vivus[type] : timingProps.pathTimingFunction;
	timingProps.animTimingFunction = (property === 'anim') ? Vivus[type] : timingProps.animTimingFunction;

	timing && timing.stop().destroy();
	timing = new Vivus('timing-example', timingProps);
}

var hi = new Vivus('hi-bear', {type: 'scenario-sync', duration: 2, start: 'autostart', dashGap: 20, forceRender: false},
	function () {
		if (window.console) {
		//console.log('Animation finished. [log triggered from callback]');
		$(".st6").css("fill","#22b1c8");
		$(".st1").css("fill","#12a3bd");
		$(".st4").css("fill","#006A8B");
		$(".st0.st_late").css("stroke","#006A8B");
		$(".st5").css('fill',"#008aa6");
		//$(".st0.my_fade").css('opacity',".4");
	}
}),
obt1 = new Vivus('obturateur1', {type: 'delayed', duration: 150}),
obt2 = new Vivus('obturateur2', {type: 'async', duration: 150}),
obt3 = new Vivus('obturateur3', {type: 'oneByOne', duration: 150}),
pola = new Vivus('polaroid', {type: 'scenario-sync', duration: 20, forceRender: false});










