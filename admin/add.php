<?php
session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
?>
<?php
include '../config.php';
extract($_POST);
if(isset($_POST['sub'])){
// $c=mysqli_query($con,"select * from data WHERE day='$day' AND department_id='$department_id' AND level='$level' AND semester='$semester' AND h1='$h1'");
// $d=mysqli_query($con,"select * from data WHERE day='$day' AND department_id='$department_id' AND level='$level' AND semester='$semester' AND h2='$h2'");
// $e=mysqli_query($con,"select * from data WHERE day='$day' AND department_id='$department_id' AND level='$level' AND semester='$semester' AND h3='$h3'");
// $f=mysqli_query($con,"select * from data WHERE day='$day' AND department_id='$department_id' AND level='$level' AND semester='$semester' AND h4='$h4'");

$c=mysqli_query($con,"select * from data WHERE day='$day' AND semester='$semester' AND h1='$h1'");
$d=mysqli_query($con,"select * from data WHERE day='$day' AND semester='$semester' AND h2='$h2'");
$e=mysqli_query($con,"select * from data WHERE day='$day' AND  semester='$semester' AND h3='$h3'");
$f=mysqli_query($con,"select * from data WHERE day='$day' AND  semester='$semester' AND h4='$h4'");

if(mysqli_num_rows($c) > 0){
 $_SESSION['pmsg']='<span style="color:red;">'."Lecture Hall is Already occupied on ".$day." from 7-9am".'</span>';
}else if(mysqli_num_rows($d) > 0){
  $_SESSION['pmsg']='<span style="color:red;">'."Lecture Hall is Already occupied on ".$day." from 9-11am".'</span>';
}else if(mysqli_num_rows($e) > 0){
  $_SESSION['pmsg']='<span style="color:red;">'."Lecture Hall is Already occupied on ".$day." from 11 to 1pm".'</span>';
}else if(mysqli_num_rows($f) > 0){
  $_SESSION['pmsg']='<span style="color:red;">'."Lecture Hall is Already occupied on ".$day." from 1pm to 3pm".'</span>';
}
else{

$g=mysqli_query($con,"select * from data WHERE day='$day' AND department_id='$department_id' AND level='$level' AND semester='$semester'");

if(mysqli_num_rows($g) > 0){
  $_SESSION['pmsg']='<span style="color:red;">'."Activity for ".$day." Already Exist".'</span>';
  }else{

$qr=mysqli_query($con,"insert into data(day,department_id,level,semester,h1,c1,h2,c2,h3,c3,h4 ,c4) values('$day','$department_id','$level','$semester','$h1','$c1','$h2','$c2','$h3','$c3','$h4','$c4')");
if ($qr) {
$_SESSION['pmsg']='<span style="color:green;">'."Data was added successfully....".'</span>';
} else {
    $_SESSION['pmsg']='<span style="color:red;">'."Data was not successfully added".'</span>';
}

}

 
}



}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
    <!-- important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>NAITES LECTURE HALL DASHBOARD</title>
    
    <!-- Basic SEO -->
     <meta name="description" content="NAITES LECTURE HALL DASHBOARD ">
    <meta name="keywords" content="NAITES LECTURE HALL DASHBOARD ">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/">
 
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->


    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
         <?php
include "inc/header.php";
   ?> 
   <!-- End header header -->
        <!-- Left Sidebar  -->
   <?php
include "inc/sidebar.php";
   ?>     
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">NAITES LECTURE HALL DASHBOARD</h3> 

                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add Data</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>ADD DATA</h4>

                                <p>
                               
                                <?php echo $_SESSION['pmsg']; ?>
                                <?php echo $_SESSION['pmsg']=""; ?>
                            </p>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   <form action="#" method="POST">

                                    <div class="row">
                                         <div class="col-md-3">
                                      <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Day:</p>
                                            <select name="day" class="form-control input-rounded" required="required">
                                                <option value="monday">Monday</option>
                                                 <option value="tuesday">Tuesday</option>
                                                  <option value="wednesday">Wednesday</option>
                                                   <option value="thursday">Thursday</option>
                                                   <option value="friday">Friday</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                       <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Department:</p>
                                            <select name="department_id" class="form-control input-rounded" required="required">
                                                <?php
                                                $a1=mysqli_query($con,"select * from department order by id desc ");
                                                    foreach ($a1 as $q) {
                                                    ?>  
                                                <option value="<?=$q['id']?>"><?=$q['name']?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>

                                       <div class="col-md-3">
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Level:</p>
                                            <select name="level" class="form-control input-rounded" required="required">
                                                <option value="nd1">ND 1</option>
                                                 <option value="nd2">ND 2</option>
                                                  <option value="hnd1">HND 1</option>
                                                   <option value="hnd2">HND 2</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                          <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Semester:</p>
                                            <select name="semester" class="form-control input-rounded" required="required">
                                                <option value="first">FIRST SEMESTER</option>
                                                 <option value="second">SECOND SEMESTER</option>
                                                  
                                            </select>
                                        </div>
                                    </div>

                                                <div class="col-md-3">
                                              <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Lecture Hall for 7-9am:</p>
                                            <select name="h1" class="form-control input-rounded" required="required">
                                                <?php
                                                $a2=mysqli_query($con,"select * from lecture_hall order by id desc ");
                                                    foreach ($a2 as $q) {
                                                    ?>  
                                                <option value="<?=$q['id']?>"><?=$q['name']?></option>
                                                <?php  } ?>
                                                <option value="">No Lecture At this Time</option>
                                            </select>
                                        </div>
                                    </div>


                                            <div class="col-md-3">
                                            <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Course for 7-9am:</p>
                                            <select name="c1" class="form-control input-rounded" required="required">

                                                <?php
                                                $a3=mysqli_query($con,"select * from course order by id desc ");
                                                    foreach ($a3 as $q) {
                                                    ?>  
                                                <option value="<?=$q['id']?>"><?=$q['name']?></option>
                                                <?php  } ?>
                                                <option value="">No Course At this Time</option>
                                            </select>
                                        </div>
                                    </div>

                                            <div class="col-md-3">
                                         <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Lecture Hall for 9-11am:</p>
                                            <select name="h2" class="form-control input-rounded" required="required">

                                                <?php
                                                $a4=mysqli_query($con,"select * from lecture_hall order by id desc ");
                                                    foreach ($a4 as $q) {
                                                    ?>  
                                                <option value="<?=$q['id']?>"><?=$q['name']?></option>
                                                <?php  } ?>
                                                <option value="">No Lecture At this Time</option>
                                            </select>
                                        </div>
                                    </div>


                                            <div class="col-md-3">
                                            <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Course for 9-11am:</p>
                                            <select name="c2" class="form-control input-rounded" required="required">

                                                <?php
                                                $a5=mysqli_query($con,"select * from course order by id desc ");
                                                    foreach ($a5 as $q) {
                                                    ?>  
                                                <option value="<?=$q['id']?>"><?=$q['name']?></option>
                                                <?php  } ?>
                                                <option value="">No Course At this Time</option>
                                            </select>
                                        </div>
                                    </div>
                                        
                                        <div class="col-md-3">
                                         <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Lecture Hall for 11-1pm:</p>
                                            <select name="h3" class="form-control input-rounded" required="required">

                                                <?php
                                                $a6=mysqli_query($con,"select * from lecture_hall order by id desc ");
                                                    foreach ($a6 as $q) {
                                                    ?>  
                                                <option value="<?=$q['id']?>"><?=$q['name']?></option>
                                                <?php  } ?>
                                                <option value="">No Lecture At this Time</option>
                                            </select>
                                        </div>
                                    </div>

                                            <div class="col-md-3">
                                            <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Course for 11-1pm:</p>
                                            <select name="c3" class="form-control input-rounded" required="required">

                                                <?php
                                                $a7=mysqli_query($con,"select * from course order by id desc ");
                                                    foreach ($a7 as $q) {
                                                    ?>  
                                                <option value="<?=$q['id']?>"><?=$q['name']?></option>
                                                <?php  } ?>
                                                <option value="">No Course At this Time</option>
                                            </select>
                                        </div>
                                    </div>

                                            <div class="col-md-3">
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Lecture Hall for 1-3pm:</p>
                                            <select name="h4" class="form-control input-rounded" required="required">

                                                <?php
                                                $a8=mysqli_query($con,"select * from lecture_hall order by id desc ");
                                                    foreach ($a8 as $q) {
                                                    ?>  
                                                <option value="<?=$q['id']?>"><?=$q['name']?></option>
                                                <?php  } ?>
                                                <option value="">No Lecture At this Time</option>
                                            </select>
                                        </div>
                                    </div>

                                            <div class="col-md-3">
                                            <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Course for 1-3pm::</p>
                                            <select name="c4" class="form-control input-rounded" required="required">

                                                <?php
                                                $a9=mysqli_query($con,"select * from course order by id desc ");
                                                    foreach ($a9 as $q) {
                                                    ?>  
                                                <option value="<?=$q['id']?>"><?=$q['name']?></option>
                                                <?php  } ?>
                                                <option value="">No Course At this Time</option>
                                            </select>
                                        </div>
                                    </div>

                                    </div>

                                        <div class="form-actions">
                                        <button type="submit" name="sub" class="btn btn-success"> <i class="fa fa-check"></i>Add Data</button>
                                        <button type="reset" class="btn btn-inverse">Clear</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->

<!-- FOOTER REGION -->
<?php
include "inc/footer.php";
?>

            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/scripts.js"></script>

</body>

</html>