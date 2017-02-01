$(document).ready(function(){
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

  });


