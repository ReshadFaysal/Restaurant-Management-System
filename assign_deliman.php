<?php 
	include("connect.php");
	include('functions.php');

	if (!isAdmin()) {
		header('location: http://localhost/projects/rms/login.php');
	}

	
	$order_num = $_SESSION["delivery"];

	$sql0 = "SELECT * FROM online_order WHERE order_no = '$order_num'";
	$result = mysqli_query($conn, $sql0);
	$row = mysqli_fetch_assoc($result);
	$address = $row['address'];

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>
<body>
	<div class="container" style="padding-top: 50px; padding-left: 150px;">
		<h3><b>Assigning delivery-man for order no. <?php echo $order_num  ?></b></h3>
		<h6><b>Delivery Address: <?php echo $address  ?></b></h6>
		<hr class="mb-1">
		<h6><b>List of available delivery-man:</b></h6>
		<?php
			

				$query = "SELECT id, name, email, phonenumber, region FROM users NATURAL JOIN deliman WHERE user_type='deliman' ORDER BY name ASC";
				$result = mysqli_query($conn, $query);

				echo "<table border='1'>";
				echo "<td>ID</td> <td>name</td> <td>email</td> <td>phone no.</td> <td>region</td>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
					foreach ($row as $field => $value) {
						echo "<td>" . $value . "</td>";
						
					} echo "</tr>";
				}
				echo "</table>";
			
		?>	

	</div>

	<div class="deletenav" style="position: fixed; width: 100%px; float: left; z-index: 1; top: 0; right: 0; padding-top: 150px; padding-right: 250px;">
		<form method="post" action="assign_deliman.php">
				<div class="">
					<div class="row">
						<div class="">
							<p>Input ID no. to assign a delivery man.</p>
							<hr class="mb-1">
							<label for="id"><b>ID No.</b></label>
							<input class="form-control" id="id"  type="text" name="id" required>
							<hr class="mb-1">

							<div class="buttons">
								<button type="submit" class="btn btn-primary" name="assign">assign</button>
								<a href="http://localhost/projects/rms/admin.php" class="btn btn-secondary " role="button" aria-pressed="true">Cancel</a>
							</div>
						</div>
					</div>
				</div>
		</form>
	</div>


	<?php

	if(isset($_POST["assign"])){

		$id = $_POST['id'];
		$sql1 = "SELECT * FROM users WHERE id = '$id' AND user_type = 'deliman'";
		$result = mysqli_query($conn, $sql1);
		$row = mysqli_fetch_assoc($result);

		$dmail = $row["email"];

		$sql2 = "UPDATE online_order SET dmail = '$dmail' WHERE order_no = '$order_num'";
		$result2 = mysqli_query($conn, $sql2);


		if($result2){
			echo '<script>alert("Delivery-man has been assigned!")</script>';
	        echo '<script>window.location="check_online_order.php"</script>';
		}else{
			echo '<script>alert("There was an error while processing your request!")</script>';
		}
	}else{
		/*echo 'No data';*/
	}

	?>


</body>
</html>