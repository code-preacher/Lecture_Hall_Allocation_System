<?php
 session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
  $id=$_GET['id'];
  include('../config.php');
 $j=mysqli_query($con,"delete from lecture_hall where id='$id'");
 if ($j) {
  $_SESSION['msg3']= '<span style="color:green;">'."Lecture Hall was successfully deleted".'</span>';
 header("location:view-l.php");
 } else {
  $_SESSION['msg3']= '<span style="color:red;">'."Lecture Hall was not successfully deleted".'</span>';
 header("location:view-l.php");
 }
 

?>