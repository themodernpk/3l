<?php 
get_template_part('inc/custom-forms');     
?>
<!DOCTYPE html>
<html lang="en" class="demo-loading no-js">
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id"
content="962756112105-9un9qoucn0922mf718apuqd1bj1oer13.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<link type="text/css" href="/demo/projects/3lemni/dev/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="/demo/projects/3lemni/dev/cometchat/cometchatjs.php" charset="utf-8"></script>
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
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <?php TP::css('plugins/wow/animate'); ?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <nav class="navbar vk_dashboard_navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <div class="hamburger hidden-md visible-sm visible-xs " data-toggle="collapse" data-target="#myNavbar">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <a class="navbar-brand" href="<?php echo site_url(); ?>">
              <img src="<?php echo ot_get_option('header_logo'); ?>">
            </a>
            <?php if (is_user_logged_in()) {  ?>

              <form class="vk-search-container" role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" data-parsley-validate="" autocomplete="off">

                <input type="search" id="vk-search-bar" placeholder="Enter a subject (Eg:Physics )" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" required data-parsley-pattern="^[A-Z a-z]*$" data-parsley-error-message="Please write some word">

                <a href="#"><img class="vk-search-icon"
                 src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/themes/3lemni/assets/img/search_icon.png"></a>

               </form>
               <?php } ?>
             </div><!--navbar-header-->
             <!--visible-sm visible-xs-->

             <div class="">
               <?php if (is_user_logged_in()) { 
                $current_user = wp_get_current_user();              
                $meta =get_user_meta($current_user->ID);      
                ?>
                <div class=" vk_dashboard_menu mobi_vk_dashboard_menu pull-right" style="">
                  <ul class="nav navbar-nav  ">
                    <li class="messages_li"><a href="#"><i></i><span class="badge"></span></a></li>
                    <li class="notification_li"><a href="<?php  if( $current_user->roles[0] == "student"){ echo site_url('/student-notification/'); }else { echo site_url('/teacher-notification/');} ?>"><i></i><span class="badge"></span></a></li>

                    <li class="user_li">
                      <?php
                      if( $current_user->roles[0] == "student"){
                        $link = site_url().'/student-profile';
                      }else{
                        $link = site_url().'/teacher-edit-profile';
                      }
                      ?>
                      <a href=""   data-toggle="dropdown"  id="dropdownMenuLink">
                        <?php// echo $link; ?>
                        <div class="media">
                          <div class="media-left" href="#">
                            <?php 
                            $meta =get_user_meta($current_user->ID);
                            $user_image= $meta['profile_image'][0];

                            if($user_image){ ?>
                            <img src="<?php echo $user_image;  ?>">
                            <?php }else{ ?>
                            <img src="http://staging.webreinvent.com/demo/projects/3lemni/dev/wp-content/uploads/2016/11/user.png">
                            <?php } ?>
                          </div>
                          <div class="media-body">
                            <p class="media-heading">Hi,<?php echo $current_user->display_name; ?></p>
                          </div>
                        </div>
                      </a>

                      <ul class="dropdown-menu new_dd"  aria-labelledby="dropdownMenuLink">

                        <li><a href="<?php  if( $current_user->roles[0] == "student"){ echo site_url('student-dashboard'); }else{ echo site_url('teacher-dashboard');} ?>">Dashboard</a></li>

                        <li><a href="<?php  if( $current_user->roles[0] == "student"){ echo site_url('student-profile'); }else{ echo site_url('teacher-profile');} ?>">Profile</a></li>
                        <?php $redirect = site_url() . '/logout' ; ?>
                        <li><a href="<?php echo wp_logout_url($redirect); ?>">Logout</a></li>

                      </ul>
                    </li>                 
                  </ul>
                </div>
                <?php } ?>
                <div class="animatingg collapse navbar-collapse vk_dashboard_menu pull-right" id="myNavbar" style="">
                 <?php if (is_user_logged_in()) {       

                   wp_nav_menu(array(
                    'theme_location' => 'login-menu',
                    'menu_class' => 'nav navbar-nav',
                    'container' => 'true'
                    ));
                    ?>               
                    <?php } else { ?>
                    <?php
                    wp_nav_menu(array(
                      'theme_location' => 'fith',
                      'menu_class' => 'nav navbar-nav navbar-right',
                      'container' => 'true'
                      ));
                      ?>
                      <?php } ?>
                    </div><!--collapse navbar-->
                  </div><!--anim-->
                </div>
              </nav>
              <?php get_template_part('inc/Register'); ?>
              <?php get_template_part('inc/login'); ?>
              <?php get_template_part('inc/lost_password'); ?>
              <?php get_template_part('inc/reset_password'); ?>
            </header>