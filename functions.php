<?php
include('inc/tp.php');
include_once 'ajax.php';
function lemni_setup(){
  load_theme_textdomain( 'lemni', get_template_directory() .'/languages');

  add_theme_support( 'title-tag' );

  add_theme_support( 'post-thumbnails' );

}
add_action( 'after_setup_theme', 'lemni_setup' );


function lemni_scripts()
{
  wp_enqueue_style('3lemni-style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'lemni_scripts' );

/////////////////////// Set Menus //////////////////////////////

register_nav_menus(array(
  'primary'   => 'Primary Menu',
  'secondary' => 'Footer link Menu',
  'Third'		  => 'Help Menu',
  'Fourth'	  => 'Online Benefit menu',
  'fifth'     => 'header-inner menu',
  'login-menu'=>'header-login menu'
  ));

add_filter( 'menu_image_default_sizes', function($sizes){
// remove the default 36x36 size
  unset($sizes['menu-36x36']);
  $sizes['menu-109x158'] = array(109,158);
  return $sizes;

});

///////////////////  Set User Role  ////////////////////////////

add_action('admin_init', 'cloneRole');
function cloneRole()    {
 global $wp_roles;
 if ( ! isset( $wp_roles ) )
   $wp_roles   = new WP_Roles();
 $author     =   $wp_roles->get_role('author');
 $subscriber =   $wp_roles->get_role('subscriber');
 $wp_roles->add_role('student', 'Student', $author->capabilities);
 $wp_roles->add_role('teacher', 'Teacher', $subscriber->capabilities);
}

add_action( 'set_user_role', function( $user_id )
{
  $user = new WP_User( $user_id );
  $user->remove_role( 'subscriber' );
  $role = $_POST['iam'];
  wp_update_user(array(
    'ID' => $user_id,
    'role' => $role,
    ));
  wp_set_password( $_POST['password'],$user_id );

  $user->set_role($role);

} );

///////////////////////  Includes Stylesheets  //////////////////////////

function wpdocs_theme_name_scripts() {

 if(is_page(5)){
   wp_enqueue_style( 'sh_style_rotate', get_template_directory_uri() . '/assets/plugins/rotating_tabs/jquery.rotate.menu.css' );
   wp_enqueue_style( 'sh_style_home', get_template_directory_uri() . '/assets/home.css' );
 }

 if(is_page(8)){
  wp_enqueue_style( 'sh_style_home', get_template_directory_uri() . '/assets/home.css' );
  wp_enqueue_style( 'sh_style_common', get_template_directory_uri() . '/assets/common.css' );
  wp_enqueue_style( 'sh_style_about', get_template_directory_uri() . '/assets/about.css' );
}

if(is_page(10)){
  wp_enqueue_style( 'sh_style_home', get_template_directory_uri() . '/assets/home.css' );
  wp_enqueue_style( 'sh_style_common', get_template_directory_uri() . '/assets/common.css' );
  wp_enqueue_style( 'sh_style_how_it_works', get_template_directory_uri() . '/assets/how_it_works.css' );
}

if(is_page(12)){
 wp_enqueue_style( 'sh_style_progressbar', get_template_directory_uri() . '/assets/plugins/CircularProgressBar/jQuery-plugin-progressbar.css' );
 wp_enqueue_style( 'sh_style_package', get_template_directory_uri() . '/assets/package.css' );
}    

if(is_page(22) || is_page(24) || is_page(26) || is_page(28)){
 wp_enqueue_style( 'sh_style_faq', get_template_directory_uri() . '/assets/faq.css' );      
}
if(is_page(113)){
 wp_enqueue_style( 'sh_style_dashboard', get_template_directory_uri() . '/assets/dashboard.css' );
 wp_enqueue_style( 'sh_style_bootstrap-slider', get_template_directory_uri() . '/assets/plugins/range-and-circulr-slider/bootstrap-slider.min.css' ); 
 wp_enqueue_style( 'sh_style_datepicker', get_template_directory_uri() . '/assets/plugins/bootstrap-datepicker/css/datepicker.css' ); 
 wp_enqueue_style( 'sh_style_bootstrap-datetimepicker', get_template_directory_uri() . '/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css' ); 
 wp_enqueue_style( 'sh_style_easy-responsive-tabs', get_template_directory_uri() . '/assets/plugins/easy-responsive-tabs/easy-responsive-tabs.css' ); 
}

if(is_page(150)){
 wp_enqueue_style( 'sh_style_datepicker', get_template_directory_uri() . '/assets/plugins/bootstrap-datepicker/css/datepicker.css' ); 
 wp_enqueue_style( 'sh_style_dashboard', get_template_directory_uri() . '/assets/dashboard.css' );
 wp_enqueue_style( 'sh_style_profile', get_template_directory_uri() . '/assets/profile.css' );
}
if(is_page(165)){      
  wp_enqueue_style( 'sh_style_logout', get_template_directory_uri() . '/assets/logout.css' );       
}


if(is_page(171)){
  wp_enqueue_style( 'sh_style_package_payment', get_template_directory_uri() . '/assets/package_payment.css' );
}

if(is_page(216)){
  wp_enqueue_style( 'sh_style_bootstrap_datetimepicker', get_template_directory_uri() . '/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css' ); 

  wp_enqueue_style( 'sh_style_datepicker', get_template_directory_uri() . '/assets/plugins/bootstrap-datepicker/css/datepicker.css' ); 

  wp_enqueue_style( 'sh_style_jquery_filer', get_template_directory_uri() . '/assets/plugins/jQuery.filer/jquery.filer.css' ); 

  wp_enqueue_style( 'sh_style_common', get_template_directory_uri() . '/assets/common.css' );  

  wp_enqueue_style( 'sh_style_search', get_template_directory_uri() . '/assets/search.css' );   

}
if(is_page(267)){

 wp_enqueue_style( 'sh_style_bootstrap_datetimepicker', get_template_directory_uri() . '/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css' ); 

 wp_enqueue_style( 'sh_style_datepicker', get_template_directory_uri() . '/assets/plugins/bootstrap-datepicker/css/datepicker.css' ); 

 wp_enqueue_style( 'sh_style_jquery_filer', get_template_directory_uri() . '/assets/plugins/jQuery.filer/jquery.filer.css' ); 

 wp_enqueue_style( 'sh_style_common', get_template_directory_uri() . '/assets/common.css' );  

 wp_enqueue_style( 'sh_style_search', get_template_directory_uri() . '/assets/book_session.css' );   
}
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

///////////// Remove admin bar after login /////////////////////////////

add_filter('show_admin_bar', '__return_false');

///////////////////////// user login  //////////////////////////////////

function login_with_email_address( &$username ) {
  $cookie_email =  $_COOKIE['email'];
  setcookie ($cookie_email, "", time() - 1800);
  $user = get_user_by( 'email', $cookie_email);
  if ( !empty( $user->user_login ) )
    $username = $user->user_login;
  return $username;
}

if(isset($_POST['login'])){
  $cookie_pass = $_COOKIE['cookie_pass'];
  setcookie ($cookie_pass, "", time() - 1800);
  if(!empty($cookie_pass) && $pass == $cookie_pass) {
    add_action( 'wp_authenticate','login_with_email_address' );

  }
}