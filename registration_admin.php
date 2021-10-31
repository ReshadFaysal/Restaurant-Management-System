<?php
include("connect.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_registration.css">
</head>
<body>

<div class="header">
	<img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">
</div>

<div class="pagetitle">
	<h3>Add New Admin</h3>
</div>

<div>
	<form action="registration_admin.php" method="post">
		<!---<div class="container">--->
			<div class="regform_admin">
				<div class="row">

					<div class="col-sm-4">

						<label for="name"><b>Admin Name</b></label>
						<input class="form-control" id="name" type="text" name="name" required>

						<label for="phonenumber"><b>Phone Number</b></label>
						<input class="form-control" id="phonenumber"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="phonenumber" required>

					</div>

					<div class="col-sm-4">

						<label for="email"><b>Email Address</b></label>
						<input class="form-control" id="email"  type="email" name="email" required>
						<label for="password"><b>Password</b></label>
						<input class="form-control" id="password"  type="password" name="password" required>

					</div>

					<div class="col-sm-4"></div>

					<div class="buttons">

						<hr class="mb-1">
						<input class="btn btn-danger" type="reset" value="Reset">
						<input class="btn btn-primary" type="submit" id="register" name="create" value="Add">
						<a href="http://localhost/projects/rms/admin2.php" class="btn btn-secondary " role="button" aria-pressed="true">Cancel</a>
						<!--<input class="btn btn-secondary" type="button" id="cancel" name="cancel" value="Cancel">-->
					</div>
				</div>

			</div>
		<!---</div>--->
	</form>

</div>



<?php
if(isset($_POST['create'])){

		$sql1 = "INSERT INTO users (name, email, password, user_type) 
		VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["password"]."', 'admin')";

		$sql2 = "INSERT INTO admin (name, email, phonenumber) 
		VALUES ('".$_POST["name"]."','".$_POST["email"]."', '".$_POST["phonenumber"]."')";

		if(mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)){
			echo '<script>alert("New admin added!")</script>';
            echo '<script>window.location="registration_admin.php"</script>';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	/*echo 'No data';*/
}

?>


</body>
</html>