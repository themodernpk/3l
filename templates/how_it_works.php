<?php
/*
Template Name: how_it_work
*/
?>
<?php

$custom = get_post_custom();
$we_do = ot_get_option('what_we_do');
$slider = ot_get_option('our_benefits_slider');
get_template_part('header-dashboard');

?>

    <div class="how_it_work mrg_top">
        <div class="container">
            <h1><?php wp_title(''); ?></h1>
        </div>
        <?php the_post_thumbnail(); ?>

    </div>

    <section class="how_it">
        <div class="container">
            <h1><?php wp_title(''); ?></h1>
            <p><?php echo $custom['wpcf-how-it-works-content'][0]; ?></p>

            <div class="owl-carousel owl-theme" id="packages_owl">
            <?php
            if(!empty($slider)){
            foreach ($slider as $slider) { ?>
                <div class="item"><img  src="<?php echo $slider['image']; ?>"/>
                    <h6><?php echo $slider['title']; ?></h6></div>
               <?php } } ?>

            </div>

            <div class="main_number"><span>1</span></div>

        </div>
    </section>

    <section class="what_we_do">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="cir_group">
                        <div class="cir1">
                            <div class="cir_img">
                                <?php
                                if(!empty($we_do)){
                                foreach ($we_do as $we) { ?>

                                    <div class="img_tool <?php echo $we['title']; ?>" data-toggle="tooltip"
                                         title="Find Favorite Teacher " data-placement="<?php echo $we['data_placement']; ?>">
                                        <img src="<?php echo $we['image']; ?>">
                                    </div>
                                <?php } } ?>
                                <span class="bullet one"></span>
                                <span class="bullet two"></span>
                                <span class="bullet three"></span>
                                <span class="bullet four"></span>
                            </div>
                            <div class="cir2">
                                <img
                                    src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/inner_logo.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="text_part">
                        <h2><?php echo $custom['wpcf-what-we-do-head'][0]; ?></h2>
                        <p><?php echo $custom['wpcf-what-we-do-content'][0]; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="watch_vdo">
        <div class="container">
            <p>Curious to know more ?</p>
            <h1>Watch Our Latest Video</h1>
            <div class="popup">
                <img src="<?php echo $custom['wpcf-video-image'][0]; ?>">
                <div class="clip">
                    <a class="popup-youtube" href="<?php echo $custom['wpcf-video-url'][0]; ?>">
                        <img
                            src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/play.png">
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php get_template_part('inc/start_learning'); ?>
    <section class="learn_tech bg_gray">
        <div class="container">
            <div class="learn">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="image_part">
                            <img class="" src="<?php echo $custom['wpcf-learn-technology-image'][0]; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text_part">
                            <h2>Learn with technology</h2>
                            <p><?php echo $custom['wpcf-learn-technology-content'][0]; ?></p>
                            <a href="<?php echo site_url(); ?>/?s" class="btn subs">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="learn_tech help">
        <div class="container">
            <div class="ins_help">
                <div class="row">
                    <div class="col-sm-6 pull-right">
                        <div class="image_part">
                            <img class="hlp" src="<?php echo $custom['wpcf-instant-help'][0]; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text_part">
                            <h2>Instant help</h2>
                            <p><?php echo $custom['wpcf-instant-help-content'][0]; ?></p>
                            <!--  <a href="#" class="btn subs">Subscribe</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_template_part('inc/community'); ?>
<?php get_footer(); ?>
<?php TP::css('plugins/wow/animate'); ?>
<?php TP::js('plugins/wow/wow.min'); ?>
    <script>
        new WOW().init();

        $('#packages_owl').owlCarousel({
            loop:true,
            margin:0,
            nav:false,
            autoHeight:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            // merge:true,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
        var owl = $('.owl-carousel');
        owl.on('changed.owl.carousel', function(event) {
            var children=$('.owl-dots').children();

            //console.log(children);
            children.each(function () {
                if($( this ).hasClass( "active" )){
                    //console.log($( this ));
                    var content= $(this).index()+1;
                    $('.main_number').children().text(content);
                }
            });
           /* console.log(content);
            $('.main_number').text(content);*/
        });

        function goToByScroll(id){
            var myMarginTop = parseInt( $(".mrg_top").css("marginTop") );
                       // Scroll
            $('html,body').animate({
                    scrollTop: $("#packages_owl").offset().top - myMarginTop + 70},
                'slow');
        }

        $(".owl-dots .owl-dot").click(function(e) {
            // Prevent a page reload when a link is pressed
            e.preventDefault();
            // Call the scroll function
            goToByScroll($(this).attr("id"));
        });




    </script>

<?php wp_footer(); ?>
<?php TP::js('how_it_works'); ?>
<?php TP::js('testing_edgePreload'); ?>

<?php get_template_part('inc/document_end'); ?>