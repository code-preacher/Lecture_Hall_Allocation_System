<?php
 session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
  $id=$_GET['id'];
  include('../config.php');
 $j=mysqli_query($con,"delete from lecturer where id='$id'");
 if ($j) {
  $_SESSION['msg3']= '<span style="color:green;">'."Lecturer was successfully deleted".'</span>';
 header("location:view-lecturer.php");
 } else {
  $_SESSION['msg3']= '<span style="color:red;">'."Lecturer was not successfully deleted".'</span>';
 header("location:view-lecturer.php");
 }
 

?>