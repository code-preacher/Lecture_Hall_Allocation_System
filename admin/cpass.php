<?php
 session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
  include('../config.php');

if(isset($_POST['sub'])){
$uname=$_POST['uname'];
$pass=$_POST['pwd'];


$ql=mysqli_query($con,"update admin set username='$uname',password='$pass' where username='".$_SESSION['username']."'");

if($ql){
$_SESSION['pmsg']='<span style="color:green;">'."Data was successfully updated".'</span>';
$_SESSION['username']=$uname;
}
else{
$_SESSION['pmsg']='<span style="color:red;">'."Data was not successfully updated".'</span>';    
}
}

 header("location:profile.php");
?>