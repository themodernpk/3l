<?php
/*
Template Name: pricing
*/
?>
<?php
$custom = get_post_custom();
$pricing = ot_get_option('package');
$features = ot_get_option('package_features');
?>
<?php get_template_part('header-dashboard'); ?>


<?php // TP::css('plugins/CircularProgressBar/jQuery-plugin-progressbar'); ?>
<?php // TP::css('package'); ?>

<section id="grid" class="our_packages  grid clearfix mrg_top">
    <div class="container">
        <div class="my_packages">

            <h1><?php echo $custom['wpcf-pricing-head'][0]; ?></h1>
            <p><?php echo $custom['wpcf-pricing-content'][0]; ?></p>
            <div class="row">
                <?php
                $count = 1;
                foreach ($pricing as $packages) {
                   
                    ?>
                    <div class="col-sm-3 col-xs-6">

                        <a href="<?php echo site_url('package-payment'); ?>/?type=<?php echo $packages['title']; ?>"
                         data-path-hover="M25,0 C25,0 237,0 237,0 C250.807,0 262,11.193 262,25 C262,25 262,63 262,63 C262,63 230.832,63 130,63 C30.835,63 0,63 0,63 C0,63 0,25 0,25 C0,11.193 11.193,0 25,0 Z">
                         <figure>
                            <div class="packages">
                                <div class="content">
                                    <img
                                    src="<?php echo $packages['img']; ?>">
                                    <div class="fake_space">
                                    </div>

                                    <div class="content_hover">
                                        <div class="head"><h6><?php echo $packages['percentage']; ?></h6>
                                        </div>
                                        <div class="hd_cont">

                                            <div class="progress-bar"></div>
                                            <p><b>Save </b>on extra hours</p>
                                            <span>Extra hours 120/hr</span>

                                        </div>
                                        <div class="head un"><h6>Unlimited support tickets</h6>
                                        </div>
                                        <?php foreach ($features as $feature) { ?>
                                        <div class="head lo"><h6><?php echo $feature['feature']; ?></h6>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="circle_grad">
                                    <div class="cir_1">
                                        <div class="cir_inner">
                                            <?php if ($count == 4) { ?>
                                            <p class="no_plan"><span><?php echo $packages['price']; ?></span>
                                            </p>
                                            <?php } else { ?>

                                            <h2><?php echo $packages['price']; ?></h2>
                                            <p><span>SAR </span>MONTHLY</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <svg width="100%" height="103px" viewBox="0 0 262 103" preserveAspectRatio="none">
                                <path
                                d="M25,0 C25,0 237,0 237,0 C250.807,0 262,11.193 262,25 C262,25 262,103 262,103 C262,103 230.832,63 130,63 C30.835,63 0,103 0,103 C0,103 0,25 0,25 C0,11.193 11.193,0 25,0 Z "/>
                                <defs>
                                    <linearGradient id="PSgrad_0" x1="0%" x2="100%" y1="0%" y2="0%">
                                        <stop offset="0%" stop-color="rgb(150,195,63)" stop-opacity="1"/>
                                        <stop offset="100%" stop-color="rgb(72,176,210)" stop-opacity="1"/>
                                    </linearGradient>

                                </defs>
                            </svg>
                            <figcaption>
                                <h4><?php echo $packages['title']; ?></h4>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <?php $count++;
            } ?>

        </div>
    </div>
</div>
</section>


<?php get_footer(); ?>


<?php TP::js('plugins/ShapeHoverEffectSVG/js/snap.svg-min'); ?>

<?php TP::js('plugins/CircularProgressBar/jQuery-plugin-progressbar'); ?>


<script>
    (function () {

        function init() {
            var speed = 330,
            easing = mina.backout;

            [].slice.call(document.querySelectorAll('#grid a')).forEach(function (el) {
                var s = Snap(el.querySelector('svg')), path = s.select('path'),
                pathConfig = {
                    from: path.attr('d'),
                    to: el.getAttribute('data-path-hover')
                };

                el.addEventListener('mouseenter', function () {
                    path.animate({'path': pathConfig.to}, speed, easing);
                });

                el.addEventListener('mouseleave', function () {
                    path.animate({'path': pathConfig.from}, speed, easing);
                });
            });
        }

        init();

    })();
</script>


<script type="text/javascript">
    $(".progress-bar").loading();
</script>





<?php wp_footer(); ?>
<?php TP::js('testing_edgePreload'); ?>
<?php get_template_part('inc/document_end'); ?>