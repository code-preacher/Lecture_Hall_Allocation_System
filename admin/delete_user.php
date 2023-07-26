<?php
 session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
  $id=$_GET['id'];
  include('../config.php');
 $j=mysqli_query($con,"delete from user where id='$id'");
 if ($j) {
  $_SESSION['msg3']= '<span style="color:green;">'."Student was successfully deleted".'</span>';
 header("location:user.php");
 } else {
  $_SESSION['msg3']= '<span style="color:red;">'."Student was not successfully deleted".'</span>';
 header("location:user.php");
 }
 

?>