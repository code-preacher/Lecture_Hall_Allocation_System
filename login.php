<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>LECTURE HALL SYSTEM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="check.php" method="post">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>
				<p>
								<?php echo $_SESSION['msg']; ?>
								<?php echo $_SESSION['msg']=""; ?>
							</p>
							<br/>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Please enter your user id">
					<input class="input100" type="text" name="matno" placeholder="User id">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Please enter your password">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="submit">
						Sign In
					</button>
				</div>

				<div class="text-center p-t-57 p-b-40">
					
				</div>

				<div class="flex-c p-b-112">
				
						<img src="images/images.jpeg" alt="naites images"><br/>

						<div class="text-center">
					<a href="#" class="txt2 hov1">
						LECTURE HALL SYSTEM&copy;&nbsp;<?php  echo date('Y');?>
					</a>|<a href="index.php" class="txt2 hov1 text-danger">
						Back to Home
					</a>
				</div>
					
				</div>

				

				
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>