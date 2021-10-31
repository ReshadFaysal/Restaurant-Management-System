<?php
include("connect.php");
include('functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: http://localhost/projects/rms/login.php');
  }

if(isset($_POST['delete']))
{
	$id = $_POST['id'];
	$sql = "DELETE FROM users WHERE id='$id' AND user_type='admin'";

	if (mysqli_query($conn, $sql)) {
	   	 echo"<script>window.location='http://localhost/projects/rms/modify_admin.php'</script>";
	} else {
		echo '<script>alert("Error deleting record!")</script>';
  		echo"<script>window.location='http://localhost/projects/rms/modify_admin.php'</script>";	 
	}
}


if(isset($_POST['update']))
{
	$id = $_POST['id'];
	$sql = "SELECT name, email, phonenumber, password FROM users NATURAL JOIN admin WHERE id='$id' AND user_type='admin'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($result) {
		$name = $row["name"];
	   	$email = $row["email"];
	   	$phonenumber = $row["phonenumber"];
	   	$password = $row["password"];
	} else {
  		 echo"<script>window.location='http://localhost/projects/rms/modify_admin.php'</script>";
  		 echo '<script>alert("Error fetching record!")</script>';
	}
}


?>


<?php
include("connect.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Admin</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>
<body>



<div class="container" style="padding-top: 75px; padding-left: 100px;">

	<h3>Update Admin Info (ID: <?php echo $id?>)</h3>
	<hr class="mb-6">
	<form action="update_admin.php" method="post">
		<!---<div class="container">--->
			<div class="">
				<div class="row">
					<div class="">

						<label for="name"><b>Admin Name</b></label>
						<input class="form-control" id="name" type="text" name="name" value="<?php echo $name; ?>" style="width: 800px;" required>

						<label for="email"><b>Email Address</b></label>
						<input class="form-control" id="email"  type="email" name="email" value="<?php echo $email; ?>" style="width: 800px;" required>

						<label for="phonenumber"><b>Phone Number</b></label>
						<input class="form-control" id="phonenumber"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="phonenumber" value="<?php echo $phonenumber; ?>" style="width: 300px;" required>


						<label for="password"><b>Password</b></label>

						<input class="form-control" id="password"  type="text" name="password" value="<?php echo $row["password"]; ?>" style="width: 300px;" required>

						<input type="hidden" name="hidden_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="hidden_mail" value="<?php echo $email; ?>">

						<hr class="mb-1">
						<input class="btn btn-success" type="reset" value="Reset">
						<input class="btn btn-warning" type="submit" id="update" name="done" value="Update">
						<a href="http://localhost/projects/rms/modify_admin.php" class="btn btn-secondary " role="button">Cancel</a>
						<!--<input class="btn btn-secondary" type="button" id="cancel" name="cancel" value="Cancel">-->
					</div>
					</div>

				</div>
			</div>
		<!---</div>--->
	</form>

</div>


<?php
if(isset($_POST['done'])){

	$id = $_POST["hidden_id"];
	$oldmail = $_POST["hidden_mail"];
	$upname = $_POST["name"];
	$upemail = $_POST["email"];
	$uppassword = $_POST["password"];
	$upphonenumber = $_POST["phonenumber"];

	$sql3 = "UPDATE users SET name = '$upname', email = '$upemail', password = '$uppassword' WHERE id = '$id'";;

	$sql4 = "UPDATE admin SET name = '$upname', email = '$upemail', phonenumber = '$upphonenumber' WHERE email = '$oldmail'";

	if(mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)){
		echo '<script>alert("Record has been updated!")</script>';
        echo '<script>window.location="modify_admin.php"</script>';
	}else{
		echo '<script>alert("Error updating record!")</script>';
	}
}else{
	/*echo 'No data';*/
}

?>


</body>
</html>