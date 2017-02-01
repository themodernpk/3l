<?php
/* Template Name: Verify */
?>
<?php
 global $wpdb;
  if(isset($_GET['id']) && !empty($_GET['id']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $id =$_GET['id']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable                      

    $search =  $wpdb->get_results("SELECT * FROM ar_usermeta where user_id='$id'"); 
    $meta =get_user_meta($id);
    $test = $meta['status'][0];
    //$match  = mysql_num_rows($search);

if($test === $hash ){
  $test1 = update_user_meta($id,'active',1);
  echo '<script type="text/javascript">'; 
  echo 'alert("user verified successfully");'; 
  echo 'window.location.href = "http://staging.webreinvent.com/demo/projects/3lemni/dev/";';
  echo '</script>';
  }
}
?>