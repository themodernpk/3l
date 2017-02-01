window.randomize = function() {
  $('.radial-progress').each(function() {
    var transform_styles = ['-webkit-transform', '-ms-transform', 'transform'];
    $(this).find('span').fadeTo('slow', 1);
    var score = $(this).data('score');
    var deg = (((100 / 10) * score) / 100) * 180;
    var rotation = deg;
    var fill_rotation = rotation;
    var fix_rotation = rotation * 2;
    for(i in transform_styles) {
      $(this).find('.circle .fill, .circle .mask.full').css(transform_styles[i], 'rotate(' + fill_rotation + 'deg)');
      $(this).find('.circle .fill.fix').css(transform_styles[i], 'rotate(' + fix_rotation + 'deg)');
    }
  });
}
setTimeout(window.randomize, 200);

new WOW().init();

$('.hamburger').on('click', function () {
  $(this).toggleClass('opened');
});

$(window).scroll(function () {
  if ($(this).scrollTop() > 200) {
    $('.navbar').addClass("shrink");
  }
  else {
    $('.navbar').removeClass("shrink");
  }
});

$(window).load(function () {
  $('ul#menu-header-menu li a').addClass('link link--hover');
});


$(window).load(function () {
  $('li#menu-item-80 a').addClass('navbar-brand');
  $('li#menu-item-80 a').removeClass('link link--hover');
});


$(window).load(function () {
  $('li#menu-item-80 a').after('<a class="navbar-brand shrink_logo" href="#"><img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/10/logo_shrink.png"></a>');
});

$(" ul#menu-header-menu li.login_li a").addClass("popup-with-zoom-anim");
$(" ul#menu-header-menu li.register_li a").addClass("popup-with-zoom-anim");
$(" ul#menu-header-menu li.reset_li a").addClass("popup-with-zoom-anim");

$(" ul#menu-header-inner-menu li.login_li a").addClass("popup-with-zoom-anim");
$(" ul#menu-header-inner-menu li.register_li a").addClass("popup-with-zoom-anim");
$(" ul#menu-header-inner-menu li.reset_li a").addClass("popup-with-zoom-anim");

$(" ul#menu-link-menu li.tutor_li a").addClass("popup-with-zoom-anim");

$('.popup-with-zoom-anim').magnificPopup({
  type: 'inline',
  fixedContentPos: false,
  fixedBgPos: true,
  overflowY: 'auto',
  closeBtnInside: true,
  preloader: false,
  midClick: true,
  removalDelay: 300,
  mainClass: 'my-mfp-zoom-in'
});

function statusChangeCallback(response) {
  console.log('statusChangeCallback');
  console.log(response);

  if (response.status === 'connected') {

    testAPI();
  } else if (response.status === 'not_authorized') {

  } else {
    document.getElementById('status').innerHTML = 'Please log ' +
    'into Facebook.';
  }
}

function checkLoginState() {
  FB.getLoginStatus(function (response) {
    statusChangeCallback(response);
  });
}

window.fbAsyncInit = function () {
  FB.init({
    appId: '1160695307349126',
    cookie: true,
    xfbml: true,
    version: 'v2.5'
  });


  FB.getLoginStatus(function (response) {
    statusChangeCallback(response);
  });

};

(function (d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s);
  js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function testAPI() {
  console.log('Welcome!  Fetching your information.... ');
  FB.api('/me', {fields: 'email'}, function (response) {
    console.log(response.gender);

            // document.getElementById('status').innerHTML =	response.email;
            var email = response.email;
            if (email) {
              $('#email').val(email);
              $('#username').val(email);
            }
            //document.getElementById('email').innerHTML = response.email;

          });
}
// book_session

$(".selectpicker").select2({
  // placeholder: "Select Hours Needed"
});
// book_session

function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
      //  console.log('Full Name: ' + profile.getName());
      console.log('Given Name: ' + profile.getGivenName());
      console.log('Family Name: ' + profile.getFamilyName());
      console.log("Image URL: " + profile.getImageUrl());
      console.log("Image URL: " + profile.getEmail());
      var email = profile.getEmail();
      document.cookie = "email="+email+"";
        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        //console.log("ID Token: " + id_token);
        var name = profile.getName();
        if(name){
          $('#fullname').val(name);
        }
        if (email) {
          $('#email').val(email);
          $('#username').val( email);

        }
      };

      // console.log("hover s");

      $(document).on('mouseenter' ,'nav.navbar.vk_dashboard_navbar.shrink' , function () {
        $( this ).addClass("parenthover").removeClass("leavehover");
        console.log("hover e");
      })
      .on('mouseleave' , 'nav.navbar.vk_dashboard_navbar.shrink' ,  function(){
        $( this ).removeClass("parenthover").addClass("leavehover");
      });

      // $("a.navbar-brand").hover( function(){
      //   console.log("inside");
      //   $('nav.vk_dashboard_navbar.navbar.shrink').addClass("parenthover").removeClass("leavehover");
      // })

$( ".cog, .admin-text" ).on( "click", function()
{
  $( ".menu" ).stop().fadeToggle( "fast" );
});


$(document).ready(function(){
 $('div#status').css("display","none");
});

$(document).ready(function(){
$('.registering').on('click',function(){
    var role = $(this).data('name');
  if(role == "teacher"){
    $('#teacher').attr("checked",'checked');
  }if(role == "student"){
    $('#student').attr("checked","checked");
  }
});
});

$(document).ready(function(){
$('ul#menu-link-menu li a').last().attr('id','become_tutor');
$('ul#menu-link-menu li a').last().attr('name','teacher');
$('#become_tutor').on('click',function(){
 var tutor = $(this).attr('name');
 if(tutor="teacher"){
 $('#teacher').attr("checked",'checked');
}
});
});






