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
	$sql = "DELETE FROM users WHERE id='$id' AND user_type='deliman'";

	if (mysqli_query($conn, $sql)) {
	   	echo"<script>window.location='http://localhost/projects/rms/modify_deliman.php'</script>";
	} else {
	   	echo '<script>alert("Error deleting record!")</script>';
  		echo"<script>window.location='http://localhost/projects/rms/modify_deliman.php'</script>";
	}
}


if(isset($_POST['update']))
{
	$id = $_POST['id'];
	$sql = "SELECT name, email, phonenumber, password, salary, address, region FROM users NATURAL JOIN deliman WHERE id='$id' AND user_type='deliman'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($result) {
		$name = $row["name"];
	   	$email = $row["email"];
	   	$phonenumber = $row["phonenumber"];
	   	$password = $row["password"];
	   	$salary = $row["salary"];
	   	$address = $row["address"];
	   	$region = $row["region"];
	} else {
  		 echo"<script>window.location='http://localhost/projects/rms/modify_deliman.php'</script>";
  		 echo '<script>alert("Error fetching record!")</script>';
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Deliman</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>
<body>



<div class="container" style="padding-top: 75px; padding-left: 100px;">

	<h3>Update Delivery-man Info (ID: <?php echo $id?>)</h3>
	<hr class="mb-6">
	<form action="update_deliman.php" method="post">
		<!---<div class="container">--->
			<div class="">
				<div class="row">
					<div class="">

						<label for="name"><b>Employee Name</b></label>
						<input class="form-control" id="name" type="text" name="name" value="<?php echo $name; ?>" style="width: 800px;" required>

						<label for="email"><b>Email Address</b></label>
						<input class="form-control" id="email"  type="email" name="email" value="<?php echo $email; ?>" style="width: 800px;" required>

						<label for="address"><b>Address</b></label>
						<input class="form-control" id="address" type="text" name="address" value="<?php echo $address; ?>" style="width: 800px;" required>

						<label for="region"><b>Region</b></label>
						<input class="form-control" id="region" type="text" name="region" value="<?php echo $region; ?>" style="width: 800px;" required>

						<label for="phonenumber"><b>Phone Number</b></label>
						<input class="form-control" id="phonenumber"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="phonenumber" value="<?php echo $phonenumber; ?>" style="width: 300px;" required>

						<label for="salary"><b>Salary</b></label>
						<input class="form-control" id="salary"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="salary" value="<?php echo $salary; ?>" style="width: 300px;" required>

						<label for="password"><b>Password</b></label>

						<input class="form-control" id="password"  type="text" name="password" value="<?php echo $row["password"]; ?>" style="width: 300px;" required>

						<input type="hidden" name="hidden_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="hidden_mail" value="<?php echo $email; ?>">

						<hr class="mb-1">
						<input class="btn btn-success" type="reset" value="Reset">
						<input class="btn btn-warning" type="submit" id="update" name="done" value="Update">
						<a href="http://localhost/projects/rms/modify_deliman.php" class="btn btn-secondary " role="button">Cancel</a>
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
	$upsalary = $_POST["salary"];
	$upaddress = $_POST["address"];
	$upregion = $_POST["region"];

	$sql3 = "UPDATE users SET name = '$upname', email = '$upemail', password = '$uppassword' WHERE id = '$id'";;

	$sql4 = "UPDATE deliman SET name = '$upname', email = '$upemail', phonenumber = '$upphonenumber', salary = '$upsalary', address = '$upaddress', upregion = '$region' WHERE email = '$oldmail'";

	if(mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)){
		echo '<script>alert("Record has been updated!")</script>';
        echo '<script>window.location="modify_deliman.php"</script>';
	}else{
		echo '<script>alert("Error updating record!")</script>';
	}
}else{
	/*echo 'No data';*/
}

?>


</body>
</html>