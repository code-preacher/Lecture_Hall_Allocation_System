<?php
session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
$id=$_GET['id'];
?>
<?php
include '../config.php';
extract($_POST);
$date=date("d-m-y @ g:i A");
if(isset($_POST['sub'])){
    $qd=mysqli_query($con,"update data set level='$level',semester='$semester',time1='$time1',time2='$time2',time3='$time3',time4='$time4',day='$day',date='$date' where id='$id'");

if ($qd) {
$_SESSION['xmsg']='<span style="color:green;">'."Data was updated successfully....".'</span>';
} else {
    $_SESSION['xmsg']='<span style="color:red;">'."Data was not successfully updated".'</span>';
}

}

$rt=mysqli_query($con,"select * from data where id='$id' ");
$rg=mysqli_fetch_array($rt);

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
                               
                                <?php echo $_SESSION['xmsg']; ?>
                                <?php echo $_SESSION['xmsg']=""; ?>
                            </p>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   <form action="#" method="POST">
                                       
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Level:</p>
                                            <select name="level" class="form-control input-rounded" required="required">
                                                <option value="<?php echo $rg['level']; ?>"><?php echo $rg['level']; ?></option>
                                                <option value="nd1">ND 1</option>
                                                 <option value="nd2">ND 2</option>
                                                  <option value="hnd1">HND 1</option>
                                                   <option value="hnd2">HND 2</option>
                                            </select>
                                        </div>
                                          <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Semester:</p>
                                            <select name="semester" class="form-control input-rounded" required="required">
                                                <option value="<?php echo $rg['semester']; ?>"><?php echo $rg['semester']; ?></option>
                                                <option value="first">FIRST SEMESTER</option>
                                                 <option value="second">SECOND SEMESTER</option>
                                                  
                                            </select>
                                        </div>
                                          <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Day:</p>
                                            <select name="day" class="form-control input-rounded" required="required">
                                                <option value="<?php echo $rg['day']; ?>"><?php echo $rg['day']; ?></option>
                                                <option value="monday">Monday</option>
                                                 <option value="tuesday">Tuesday</option>
                                                  <option value="wednesday">Wednesday</option>
                                                   <option value="thursday">Thursday</option>
                                                   <option value="friday">Friday</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                         <p class="text-muted m-b-15 f-s-12">Enter Course code and Hall for 7-9am:</p>
                                            <input type="text" class="form-control input-rounded" name="time1"  required="required" value="<?php echo $rg['time1']; ?>">
                                        </div>
                                         <div class="form-group">
                                         <p class="text-muted m-b-15 f-s-12">Enter Course code and Hall for 9-11am:</p>
                                            <input type="text" class="form-control input-rounded" name="time2"  required="required" value="<?php echo $rg['time2']; ?>" >
                                        </div>
                                          <div class="form-group">
                                         <p class="text-muted m-b-15 f-s-12">Enter Course code and Hall for 11-1pm:</p>
                                            <input type="text" class="form-control input-rounded" name="time3"  required="required" value="<?php echo $rg['time3']; ?>" >
                                        </div>
                                         <div class="form-group">
                                         <p class="text-muted m-b-15 f-s-12">Enter Course code and Hall for 1-3pm:</p>
                                            <input type="text" class="form-control input-rounded" name="time4"  required="required" value="<?php echo $rg['time4']; ?>">
                                        </div>
                                        
                                        <div class="form-actions">
                                        <button type="submit" name="sub" class="btn btn-success"> <i class="fa fa-check"></i>Update Data</button>
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