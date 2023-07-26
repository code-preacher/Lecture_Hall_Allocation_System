<?php
//include '../config.php';
$qj=mysqli_query($con,"select username from admin where username='".$_SESSION['username']."'");
$tr=mysqli_fetch_array($qj);

?>
     <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="../images/logo.png" alt="naites image" class="dark-logo" /></b>
                        <!--End Logo icon -->
                    
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                      
                        
                   
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/pix.png" alt="user image" class="profile-pic img-responsive img-circle" /></a>
                            Welcome,  <?php echo $tr['username'];  ?>  
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="../admin/profile.php"><i class="ti-user"></i> Profile</a></li>
                                   
                                    <li><a href="../admin/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>