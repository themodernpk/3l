<?php get_template_part('inc/custom-forms'); ?>
<?php
if (function_exists('ot_get_option')) {
    $shrink_logo = ot_get_option('shrink_header_logo');
}
?>
<!DOCTYPE html>
<html lang="en" class="demo-loading no-js">
<head>
<link type="text/css" href="/demo/projects/3lemni/dev/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="/demo/projects/3lemni/dev/cometchat/cometchatjs.php" charset="utf-8"></script>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id"
    content="962756112105-9un9qoucn0922mf718apuqd1bj1oer13.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (is_page('home')) { ?>
    <title><?php echo get_bloginfo(); ?></title>
    <?php } else {
        ?>
        <title><?php wp_title(''); ?>&nbsp;|&nbsp;3lemni</title>
        <?php } ?>
        <?php TP::commonCSS(); ?>
        <?php TP::css('style'); ?>
        <?php TP::css('common'); ?>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700,900|Roboto:300,400,500,700,900"
        rel="stylesheet">

        <?php wp_head(); ?>
        <?php TP::css('plugins/wow/animate'); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <div class="hamburger hidden-md visible-sm visible-xs " data-toggle="collapse" data-target="#myNavbar">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a class="mobile_logo navbar-brand hidden-md visible-sm visible-xs " href="">
                            <img src="<?php echo $shrink_logo; ?>">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse vk_menu" id="myNavbar">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_class' => 'nav navbar-nav',
                            'container' => 'true'
                            ));
                            ?>

                        </div>

                    </div>
                </div>

                



            </nav>
            <?php get_template_part('inc/Register'); ?>
            <?php get_template_part('inc/login'); ?>
            <?php get_template_part('inc/lost_password'); ?>
            <?php get_template_part('inc/reset_password'); ?>

        </header>