<?php
 session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
  $id=$_GET['id'];
  include('../config.php');
 $j=mysqli_query($con,"delete from course where id='$id'");
 if ($j) {
  $_SESSION['msg3']= '<span style="color:green;">'."Course was successfully deleted".'</span>';
 header("location:view-c.php");
 } else {
  $_SESSION['msg3']= '<span style="color:red;">'."Course was not successfully deleted".'</span>';
 header("location:view-c.php");
 }
 

?>