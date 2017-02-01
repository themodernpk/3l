<?php
if (function_exists('ot_get_option')) {
    $payment_cards = ot_get_option('payment_cards');
    $applications = ot_get_option('applications');
    $logo = ot_get_option('footer_logo');
    $contacts = ot_get_option('contact_us');
    $social_icons = ot_get_option('social_icons');
    $benefit      = ot_get_option('online_benefits');
    $address = ot_get_option('address');
    $signature = ot_get_option('signature');
}
?>
<?php
    if(is_page(267)){ ?>
    <style>
        .stage_outer.pos-rel{ display: none;}
    </style>
  <?php  }
    get_template_part('inc/subscribe');
?>
<footer class="">
    <div class="footer_sm_logo hidden-lg hidden-md">
        <a href="<?php echo site_url(); ?>"><img src="<?php echo $logo; ?>"></a>
    </div>

    <div class="container">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-7 col-sm-6 five-three">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="footer_logo hidden-sm hidden-xs">
                                <a href="<?php echo site_url(); ?>"><img src="<?php echo $logo; ?>"></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="footer_links">
                                <h4>Links</h4>
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'secondary',
                                    'container' => 'false'
                                ));
                                ?>
                            </div><!--footer links-->
                        </div>
                        <div class="col-md-4 col-sm-6  col-xs-6">
                            <div class="footer_links">
                                <h4>Help</h4>
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'Third',
                                    'container' => 'false'
                                ));
                                ?>
                            </div><!--footer links-->
                        </div>
                    </div><!-- end inner row -->
                </div>


                <div class="col-md-5 col-sm-6 five-two">
                    <div class="row">
                        <div class=" col-sm-6  col-xs-6">
                            <div class="footer_links">
                                <h4>Online Benefits</h4>
                                <ul>
                                <?php
                                foreach ($benefit as $benefits) { ?>
                                    <li><p> <?php echo $benefits['title']; ?></p></li>
                               <?php } ?>
                               </ul>
                            </div><!--footer links-->
                        </div>
                        <div class=" col-sm-6  col-xs-6">
                            <div class="footer_links footer_contact">
                                <h4>Contact Us</h4>
                                <ul>

                                    <li><p><i class="map-marker" aria-hidden="true"></i><?php echo $address; ?>
                                        </p></li>
                                    <?php foreach ($contacts as $contact) {
                                        ?>
                                        <li><a href="<?php echo $contact['link']; ?>"><i
                                                    class="<?php echo $contact['class']; ?>"
                                                    aria-hidden="true"></i><?php echo $contact['content']; ?></a></li>

                                    <?php } ?>
                                </ul>
                            </div><!--footer links-->
                        </div>
                    </div><!-- end inner row -->
                </div>

            </div><!-- end outer row -->
        </div><!--main-col-sm-12 end-->


        <div class="clearfix"></div>

        <div class="col-sm-12 secondary_footer">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="payment_cards">
                        <img src="<?php echo $payment_cards; ?>">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class=" social_icons">
                        <ul>
                            <?php foreach ($social_icons as $social) {
                                ?>
                                <li class="<?php echo $social['main_class']; ?>">
                                    <a href="<?php echo $social['link']; ?>" target="_blank">
                                        <i class="<?php echo $social['class']; ?>" aria-hidden="true"></i>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="app_stickers">
                        <?php foreach ($applications as $app) { ?>
                            <img src="<?php echo $app['img']; ?>">
                        <?php } ?>
                    </div>
                </div>
            </div><!--row-->
        </div><!--main-col-sm-12 end-->

    </div><!--container end-->
</footer><!--footer end-->


<div class="footer_bottom">
    <div class="container">
        <div class="col-sm-6 col-xs-7 copyright">
            <p>©2016 <a href="<?php echo site_url(); ?>"> <?php echo get_bloginfo(); ?>. </a> All Rights Reserved</p>
        </div>

        <div class="col-sm-6 col-xs-5 ">
            <div class="wri_sig">
                <label id="signature"><a target="_blank" href="http://www.webreinvent.com"
                                         title="Professional Joomla, Wordpress &amp; Magento Website Design &amp; Development Company - Delhi, India"></a></label>
            </div>

        </div>
    </div><!--container-->
</div><!--footer-bottom-->


<?php TP::commonJS(); ?>
<?php TP::js('common'); ?>

<script src="<?php echo $signature; ?>"></script>