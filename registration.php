<?php
include("connect.php");
 echo '<script>window.location="http://localhost/projects/rms/home/registration.php"</script>';  
?>


<!DOCTYPE html>
<html>
<head>
	<title>Customer Registration</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_registration.css">
</head>
<body>

<div class="header">
	<img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">
</div>

<div class="pagetitle">
	<h3>Customer Registration</h3>
</div>

<div>
	<form action="registration.php" method="post">
		<!---<div class="container">--->
			<div class="regform">
				<div class="row">
					<div class="col-sm-4">

						<p>Fill up the form with correct values.</p>

						<label for="name"><b>Name</b></label>
						<input class="form-control" id="name" type="text" name="name" required>

						<label for="email"><b>Email Address</b></label>
						<input class="form-control" id="email"  type="email" name="email" required>

						<label for="phonenumber"><b>Phone Number</b></label>
						<input class="form-control" id="phonenumber"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="phonenumber" required>

						<label for="password"><b>Password</b></label>
						<input class="form-control" id="password"  type="password" name="password" required>

						<hr class="mb-1">
						<input class="btn btn-danger" type="reset" value="Reset">
						<input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
						<a href="http://localhost/projects/rms/home.php" class="btn btn-secondary " role="button" aria-pressed="true">Cancel</a>
						<!--<input class="btn btn-secondary" type="button" id="cancel" name="cancel" value="Cancel">-->
						<p>
							Already a member? <a href="login.php">Sign in</a>
						</p>
					</div>
				</div>
			</div>
		<!---</div>--->
	</form>
</div>



<?php
if(isset($_POST['create'])){

/*
	$name 			= $_POST['name'];
	$email 			= $_POST['email'];
	$phonenumber	= $_POST['phonenumber'];
	$password 		= $_POST['password']; */

		$sql1 = "INSERT INTO users (name, email, password, user_type) 
		VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["password"]."', 'customer')";

		$sql2 = "INSERT INTO customer (name, email, phonenumber) 
		VALUES ('".$_POST["name"]."','".$_POST["email"]."', '".$_POST["phonenumber"]."')";

		if(mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)){
			echo '<script>alert("Registration complete!")</script>';
            echo '<script>window.location="login.php"</script>';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	/*echo 'No data';*/
}

?>


</body>
</html>