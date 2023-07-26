<?php
  session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
  include('../config.php');
$id=$_GET['id'];

if(isset($_POST['sub'])){
$matno=$_POST['matno'];
$pass=$_POST['pwd'];
$fname=$_POST['fname'];
$level=$_POST['level'];

$ql=mysqli_query($con,"update user set matno='$matno',password='$pass',fullname='$fname',level='$level' where id='$id'");

if($ql){
$_SESSION['pmsg']='<span style="color:green;">'."Data was successfully updated".'</span>';
}
else{
$_SESSION['pmsg']='<span style="color:red;">'."Data was not successfully updated".'</span>';    
}
}

 header("location:edit_user.php?id=$id");
?>