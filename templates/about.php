<?php
/*
Template Name: about
*/
?>
<?php $custom = get_post_custom();
if (function_exists('ot_get_option')) {
    $teams = ot_get_option('our_team');
}
?>
<?php get_template_part('header-dashboard'); ?>

    <div class="abt_banner">
        <?php the_post_thumbnail(); ?>
    </div>

    <div class="our_story">
        <div class="container">
            <div class="col-sm-5 ">
                <div class="image_part story">
                    <img src="<?php echo $custom['wpcf-our-story-image'][0]; ?>">
                </div>
            </div>

            <div class="col-sm-7 ">
                <div class="text_part">
                <h2>Our Story</h2>
                    <p><?php echo $custom['wpcf-our-story-content'][0]; ?></p>
                </div>
            </div>
        </div>

    </div>
    <div class="our_story our_mission">
        <div class="container">
            <div class="col-sm-5 pull-right">
                <div class="image_part mission">
                    <img src="<?php echo $custom['wpcf-our-mission-image'][0]; ?>">
                </div>
            </div>

            <div class="col-sm-7 ">
                <div class=" text_part">
                <h2>Our Mission</h2>
                    <p><?php echo $custom['wpcf-our-mission-content'][0]; ?></p>
                </div>
            </div>
        </div>

    </div>

    <section class="out_team">
        <div class="container">
            <div class="our_team_heading">
                <h2>Our Team</h2>
                <p><?php echo $custom['wpcf-our-team-content'][0]; ?></p>
            </div>


            <div class="team_members">
                <div class="row">
                    <?php foreach ($teams as $team) { ?>
                        <div class="col-xs-4">
                            <div class="mem_img <?php echo $team['title']; ?>">
                                <a href="<?php echo $team['link']; ?>">
                                    <div class="img_con">
                                        <img src="<?php echo $team['image']; ?>">
                                    </div>
                                    <div class="hover_efct">
                                        <div class="cont_efct">
                                            <h6><?php echo $team['name']; ?></h6>
                                            <span><?php echo $team['position']; ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <section class="join_us">
        <div class="container pos-rel">
            <img src="<?php echo $custom['wpcf-join-us-image'][0]; ?>">
            <div class="join_team">

                <h1>Interested in <b>joining our team?</b></h1>
                <p>We are happy to have you!</p>
                <a href="<?php echo site_url(); ?>/contact-us/" class="btn join">join us</a>
            </div>
        </div>
    </section>

<?php get_template_part('inc/start_learning'); ?>
<?php get_template_part('inc/community'); ?>
<?php get_footer(); ?>


<?php TP::css('plugins/wow/animate'); ?>
<?php TP::js('plugins/wow/wow.min'); ?>
    <script>
        new WOW().init();
    </script>

<?php TP::js('home'); ?>
<?php TP::js('about'); ?>
<?php TP::js('testing_edgePreload'); ?>

<?php wp_footer(); ?>
<?php get_template_part('inc/document_end'); ?>