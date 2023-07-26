<?php
  session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
  $id=$_GET['id'];
  include('../config.php');
 $j=mysqli_query($con,"delete from data where id='$id'");
 if ($j) {
  $_SESSION['msg1']= '<span style="color:green;">'."Data was successfully deleted".'</span>';
 header("location:hnd2.php");
 } else {
  $_SESSION['msg1']= '<span style="color:red;">'."Data was not successfully deleted".'</span>';
 header("location:hnd2.php");
 }
 

?>