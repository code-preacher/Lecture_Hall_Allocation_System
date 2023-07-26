<?php
session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
?>
<?php
include '../config.php';
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
     <meta name="description" content="NAITES LECTURE HALL ">
    <meta name="keywords" content="NAITES LECTURE HALL ">

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
        <script>
      function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
      </script>
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

   
                                <?php

$x=mysqli_query($con,"select * from user where matno='".$_SESSION['matno']."'");
$xx=mysqli_fetch_array($x);
$level=$xx['level'];
$department=$xx['department_id'];
                                ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View <?php echo strtoupper($level); ?> LECTURE HALL</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">

                                <h4><?php echo strtoupper($level); ?> LECTURE HALL (FIRST SEMESTER)</h4>
                              
                            </div>
                            <div class="card-body">

                                 <div class="form-group">
                             
                              <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"  placeholder="Search for day....."  required>
                            </div>
                                   
  
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-hover table-bordered ">
                                        <thead>
                                            <tr>
                                                
                                                <th>Day</th>
                                                <th>7-9am</th>
                                                <th>9-11am</th>
                                                <th>11-1pm</th>
                                                <th>1-3pm</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
<?php

function Name($table,$val){
include '../config.php';
$k=mysqli_query($con,"select name from {$table} where id='$val'");
$kk=mysqli_fetch_array($k);
if (empty($kk['name'])) {
echo "No info at the moment";
}else{
echo strtoupper($kk['name']);
}
}
?>

<?php
$a1=mysqli_query($con,"select * from data where level='$level' and department_id='$department' and semester='first' and day='monday' ");
$a11=mysqli_fetch_array($a1);
?>  
                                   <tr>
                                    
                                       <td><?php echo strtoupper($a11['day']);  ?></td>
                                        <td><?php echo Name('course', $a11['c1']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a11['h1']);  ?>)</td>
                                        <td><?php echo Name('course', $a11['c2']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a11['h2']);  ?>)</td>
                                         <td><?php echo Name('course', $a11['c3']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a11['h3']);  ?>)</td>
                                       <td><?php echo Name('course', $a11['c4']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a11['h4']);  ?>)</td>

                                   </tr> 

  <?php
$a2=mysqli_query($con,"select * from data where level='$level' and department_id='$department' and semester='first' and day='tuesday' ");
$a12=mysqli_fetch_array($a2);
?>  
                                   <tr>
                                    
                                      <td><?php echo strtoupper($a12['day']);  ?></td>
                                        <td><?php echo Name('course', $a12['c1']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a12['h1']);  ?>)</td>
                                        <td><?php echo Name('course', $a12['c2']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a12['h2']);  ?>)</td>
                                         <td><?php echo Name('course', $a12['c3']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a12['h3']);  ?>)</td>
                                       <td><?php echo Name('course', $a12['c4']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a12['h4']);  ?>)</td>
                                   </tr>  

 <?php
$a3=mysqli_query($con,"select * from data where level='$level' and department_id='$department' and semester='first' and day='wednesday' ");
$a13=mysqli_fetch_array($a3);
?>  
                                   <tr>

                                    <td><?php echo strtoupper($a13['day']);  ?></td>
                                        <td><?php echo Name('course', $a13['c1']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a13['h1']);  ?>)</td>
                                        <td><?php echo Name('course', $a13['c2']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a13['h2']);  ?>)</td>
                                         <td><?php echo Name('course', $a13['c3']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a13['h3']);  ?>)</td>
                                       <td><?php echo Name('course', $a13['c4']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a13['h4']);  ?>)</td>

                                   </tr>  


                                   <?php
$a4=mysqli_query($con,"select * from data where level='$level' and department_id='$department' and semester='first' and day='thursday' ");
$a14=mysqli_fetch_array($a4);
?>  
                                   <tr>
                                    <td><?php echo strtoupper($a14['day']);  ?></td>
                                        <td><?php echo Name('course', $a14['c1']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a14['h1']);  ?>)</td>
                                        <td><?php echo Name('course', $a14['c2']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a14['h2']);  ?>)</td>
                                         <td><?php echo Name('course', $a14['c3']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a14['h3']);  ?>)</td>
                                       <td><?php echo Name('course', $a14['c4']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a14['h4']);  ?>)</td>

                                   </tr>    

   <?php
$a5=mysqli_query($con,"select * from data where level='$level' and department_id='$department' and semester='first' and day='friday' ");
$a15=mysqli_fetch_array($a5);
?>  
                                   <tr>
                                     <td><?php echo strtoupper($a15['day']);  ?></td>
                                        <td><?php echo Name('course', $a15['c1']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a15['h1']);  ?>)</td>
                                        <td><?php echo Name('course', $a15['c2']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a15['h2']);  ?>)</td>
                                         <td><?php echo Name('course', $a15['c3']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a15['h3']);  ?>)</td>
                                       <td><?php echo Name('course', $a15['c4']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a15['h4']);  ?>)</td>

                                   </tr>                                                                                            


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->


                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->




              <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4><?php echo strtoupper($level); ?> LECTURE HALL (SECOND SEMESTER)</h4>
                              
                            </div>
                            <div class="card-body">

                                 <div class="form-group">
                             
                              <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"  placeholder="Search for day....."  required>
                            </div>
                                   
  
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-hover table-bordered ">
                                        <thead>
                                            <tr>
                                                
                                                <th>Day</th>
                                                <th>7-9am</th>
                                                <th>9-11am</th>
                                                <th>11-1pm</th>
                                                <th>1-3pm</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$a6=mysqli_query($con,"select * from data where level='$level' and department_id='$department' and semester='second' and day='monday' ");
$a16=mysqli_fetch_array($a6);
?>  
                                   <tr>
                                  <td><?php echo strtoupper($a16['day']);  ?></td>
                                        <td><?php echo Name('course', $a16['c1']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a16['h1']);  ?>)</td>
                                        <td><?php echo Name('course', $a16['c2']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a16['h2']);  ?>)</td>
                                         <td><?php echo Name('course', $a16['c3']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a16['h3']);  ?>)</td>
                                       <td><?php echo Name('course', $a16['c4']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a16['h4']);  ?>)</td>

                                   </tr> 

  <?php
$a7=mysqli_query($con,"select * from data where level='$level' and department_id='$department' and semester='second' and day='tuesday' ");
$a17=mysqli_fetch_array($a7);
?>  
                                   <tr>
                                    <td><?php echo strtoupper($a17['day']);  ?></td>
                                        <td><?php echo Name('course', $a17['c1']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a17['h1']);  ?>)</td>
                                        <td><?php echo Name('course', $a17['c2']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a17['h2']);  ?>)</td>
                                         <td><?php echo Name('course', $a17['c3']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a17['h3']);  ?>)</td>
                                       <td><?php echo Name('course', $a17['c4']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a17['h4']);  ?>)</td>
                                   </tr>  

 <?php
$a8=mysqli_query($con,"select * from data where level='$level' and department_id='$department' and semester='second' and day='wednesday' ");
$a18=mysqli_fetch_array($a8);
?>  
                                   <tr>
                                    <td><?php echo strtoupper($a18['day']);  ?></td>
                                        <td><?php echo Name('course', $a18['c1']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a18['h1']);  ?>)</td>
                                        <td><?php echo Name('course', $a18['c2']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a18['h2']);  ?>)</td>
                                         <td><?php echo Name('course', $a18['c3']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a18['h3']);  ?>)</td>
                                       <td><?php echo Name('course', $a18['c4']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a18['h4']);  ?>)</td>
                                   </tr>  


                                   <?php
$a9=mysqli_query($con,"select * from data where level='$level' and department_id='$department' and semester='second' and day='thursday' ");
$a19=mysqli_fetch_array($a9);
?>  
                                   <tr>
                                    <td><?php echo strtoupper($a19['day']);  ?></td>
                                        <td><?php echo Name('course', $a19['c1']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a19['h1']);  ?>)</td>
                                        <td><?php echo Name('course', $a19['c2']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a19['h2']);  ?>)</td>
                                         <td><?php echo Name('course', $a19['c3']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a19['h3']);  ?>)</td>
                                       <td><?php echo Name('course', $a19['c4']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a19['h4']);  ?>)</td>

                                   </tr>    

   <?php
$a20=mysqli_query($con,"select * from data where level='$level' and department_id='$department' and semester='second' and day='friday' ");
$a20=mysqli_fetch_array($a20);
?>  
                                   <tr>
                                    <td><?php echo strtoupper($a20['day']);  ?></td>
                                        <td><?php echo Name('course', $a20['c1']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a20['h1']);  ?>)</td>
                                        <td><?php echo Name('course', $a20['c2']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a20['h2']);  ?>)</td>
                                         <td><?php echo Name('course', $a20['c3']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a20['h3']);  ?>)</td>
                                       <td><?php echo Name('course', $a20['c4']);  ?><br>( Lecture Venue: <?php echo Name('lecture_hall', $a20['h4']);  ?>)</td>
                                   </tr>                                                                                            


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
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