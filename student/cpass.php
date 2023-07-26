<?php
  session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
  include('../config.php');

if(isset($_POST['sub'])){
$matno=$_POST['matno'];
$pass=$_POST['pwd'];
$fname=$_POST['fname'];


$ql=mysqli_query($con,"update user set password='$pass',fullname='$fname' where matno='".$_SESSION['matno']."'");

if($ql){
$_SESSION['pmsg']='<span style="color:green;">'."Data was successfully updated".'</span>';
$_SESSION['matno']=$matno;
}
else{
$_SESSION['pmsg']='<span style="color:red;">'."Data was not successfully updated".'</span>';    
}
}

 header("location:profile.php");
?>