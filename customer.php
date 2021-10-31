<?php 
	include('functions.php');

	if (!isCustomer()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: http://localhost/projects/rms/login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Page</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_user.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>

<body>

	<div class="header">
		<img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">
	</div>

	<div class="pagetitle">
		<h2>Customer Homepage</h2>
		<h6>Welcome, Mr. <?php echo $_SESSION['user']['name'];?>!</h6>
	</div>

	<div class="background">
		<!---<div class="">
			<ul>
				<li><a href="http://localhost/projects/rms/food_menu.php">Browse Our Menu</li>
				<li><a href="http://localhost/projects/rms/cart.php">Order Online</li>
				<li><a href="http://localhost/projects/rms/cuscheck.php">Check Order Status</li>
				<li><a href="http://localhost/projects/rms/reserve_table.php">Reserve Table</li>
				<li><a href="http://localhost/projects/rms/feedback.php">Give Feedback</li>
			</ul>
		</div>--->
		<div class="logout_button">
			<a href="http://localhost/projects/rms/food_menu.php" class="btn btn-secondary " role="button" style="width: 242px; height: 50px; padding-top: 10px; margin-top:1px; margin-left:1px; margin-right:1px; margin-bottom: :1px; background-color: #474787; ">Browse Our Menu</a>
			<a href="http://localhost/projects/rms/cart.php" class="btn btn-secondary " role="button" style="width: 242px; height: 50px; padding-top: 10px; margin-top:1px; margin-left:1px; margin-right:1px; margin-bottom: :1px; background-color: #474787; ">Order Online</a>
			<a href="http://localhost/projects/rms/cuscheck.php" class="btn btn-secondary " role="button" style="width: 242px; height: 50px; padding-top: 10px; margin-top:1px; margin-left:1px; margin-right:1px; margin-bottom: :1px; background-color: #474787; ">Check Order Status</a>
			<a href="http://localhost/projects/rms/feedback.php" class="btn btn-secondary " role="button" style="width: 242px; height: 50px; padding-top: 10px; margin-top:1px; margin-left:1px; margin-right:1px; margin-bottom: :1px; background-color: #474787; ">Give Feedback</a>
      		<a href="http://localhost/projects/rms/logout.php" class="btn btn-secondary " role="button" style="width: 242px; height: 50px; padding-top: 10px; margin-top:1px; margin-left:1px; margin-right:1px; margin-bottom: :1px; background-color: #AD0000; ">Log Out</a>
  		</div>		
	</div>
	
</body>

</html>