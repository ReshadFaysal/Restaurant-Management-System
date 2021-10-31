<?php
include("connect.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Deliman Registration</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_registration.css">
</head>
<body>

<div class="header">
	<img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">
</div>

<div class="pagetitle">
	<h3>Admin Controlled Delivery-man Registration</h3>
</div>

<div>
	<form action="registration_deliman.php" method="post">
		<!---<div class="container">--->
			<div class="regform_admin">
				<div class="row">
					<div class="col-sm-4">

						<label for="name"><b>Delivery-man Name</b></label>
						<input class="form-control" id="name" type="text" name="name" required>

						<label for="salary"><b>Salary</b></label>
						<input class="form-control" id="salary"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="salary" required>

						<label for="address"><b>Address</b></label>
						<input class="form-control" id="address"  type="address" name="address" required>

						</div>

						<div class="col-sm-4">

							<label for="email"><b>Email Address</b></label>
							<input class="form-control" id="email"  type="email" name="email" required>

							<label for="phonenumber"><b>Phone Number</b></label>
							<input class="form-control" id="phonenumber"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="phonenumber" required>

							<label for="region"><b>Delivery Region</b></label>
							<input class="form-control" id="region" type="text" name="region" required>

						</div>

						<div class="col-sm-4"></div>

						<div class="buttons">
							<label for="password"><b>Password</b></label>
							<input class="form-control" id="password"  type="password" name="password" required>

							<hr class="mb-1">
							<input class="btn btn-danger" type="reset" value="Reset">
							<input class="btn btn-primary" type="submit" id="register" name="create" value="Add">
							<a href="http://localhost/projects/rms/admin2.php" class="btn btn-secondary " role="button">Cancel</a>
							<!--<input class="btn btn-secondary" type="button" id="cancel" name="cancel" value="Cancel">-->
						</div>
					</div>

				</div>
			</div>
		<!---</div>--->
	</form>

</div>



<?php
if(isset($_POST['create'])){

		$sql1 = "INSERT INTO users (name, email, password, user_type) 
		VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["password"]."', 'deliman')";

		$sql2 = "INSERT INTO deliman (name, email, phonenumber, salary, address, region) 
		VALUES ('".$_POST["name"]."','".$_POST["email"]."', '".$_POST["phonenumber"]."', '".$_POST["salary"]."', '".$_POST["address"]."', '".$_POST["region"]."')";

		if(mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)){
			echo '<script>alert("New Delivery-man added!")</script>';
            echo '<script>window.location="registration_deliman.php"</script>';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	/*echo 'No data';*/
}

?>


</body>
</html>