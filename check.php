<?php
session_start();
error_reporting(0);
include("config.php");
if(isset($_POST['submit']))
{
$matno=Cleanse(mysqli_real_escape_string($con,$_POST['matno']));
$pass=Cleanse(mysqli_real_escape_string($con,$_POST['password']));
	
#user
$ret2=mysqli_query($con,"SELECT * FROM user WHERE matno='$matno' and password='$pass'");
$num2=mysqli_fetch_array($ret2);


if($num2>0)
{
$extra="student/dashboard.php";//
$_SESSION['matno']=$_POST['matno'];
$_SESSION['login']=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else{
	$_SESSION['msg']='<span style="color:red;">'."Invalid email or password".'</span>';
	header("location:login.php");
}


#Lecturer
$ret4=mysqli_query($con,"SELECT * FROM lecturer WHERE email='$matno' and password='$pass'");
$num4=mysqli_fetch_array($ret4);


if($num4>0)
{
$extra="lecturer/dashboard.php";//
$_SESSION['username']=$_POST['matno'];
$_SESSION['login']=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else{
	$_SESSION['msg']='<span style="color:red;">'."Invalid email or password".'</span>';
	header("location:login.php");
}


#admin
$ret3=mysqli_query($con,"SELECT * FROM admin WHERE username='$matno' and password='$pass'");
$num3=mysqli_fetch_array($ret3);


if($num3>0)
{
$extra="admin/dashboard.php";//
$_SESSION['username']=$_POST['matno'];
$_SESSION['login']=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else{
	$_SESSION['msg']='<span style="color:red;">'."Invalid email or password".'</span>';
	header("location:login.php");
}
}


function Cleanse($Data)
{
#$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
$Data = htmlentities($Data, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
$Data = stripslashes($Data); /** Add Strip Slashes Protection */
return $Data;
}
?>

