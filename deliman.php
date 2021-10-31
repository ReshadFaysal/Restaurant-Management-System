<?php 
	include('functions.php');

	if (!isDeliman()) {
		header('location: http://localhost/projects/rms/login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delivery-man Page</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_user.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>

<body>

	<div class="header">
		<img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">
	</div>

	<div class="pagetitle">
		<h2>Delivery-man Homepage</h2>
		<h6>Welcome, Mr. <?php echo $_SESSION['user']['name']?>!</h6>
	</div>

	<div class="background" style="padding-top: 100px">
		<div>
			<ul>
				<!---<li><a href="http://localhost/projects/rms/check_online_order.php">Check Available Orders</li>--->
				<li><a href="http://localhost/projects/rms/check_deli_assg.php">Check Assignments</li>
				<li><a href="http://localhost/projects/rms/food_menu.php">Menu</li>
			</ul>
			
		</div>
		<div class="logout_button">
      	<a href="http://localhost/projects/rms/logout.php" class="btn btn-secondary " role="button" style="width: 242px; height: 50px; padding-top: 10px; margin-top:2px; margin-left:2px; margin-right:2px; margin-bottom: :2px; background-color: #AD0000; ">Log Out</a>
  		</div>
  	</div>		
</body>


</html>