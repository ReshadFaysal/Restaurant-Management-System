<?php
include("connect.php");
include('functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: http://localhost/projects/rms/login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Details</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>
<body>

<div class="container" style="padding-top: 50px; padding-bottom: 50px;">

	<?php
	if(isset($_SESSION['data']))
	{
		$id = $_SESSION['data'];
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$email = $row["email"];

		if ($row["user_type"] == 'waiter') {

			/*$sql1 = "SELECT * FROM users NATURAL JOIN waiter WHERE id='$id'";*/
			$sql1 = "SELECT name, email, phonenumber, password, salary, address FROM users NATURAL JOIN waiter WHERE id='$id'";
			$result1 = mysqli_query($conn, $sql1);
			
			if($result1){

				$row1 = mysqli_fetch_assoc($result1);
				$name = $row1["name"];
			   	$email = $row1["email"];
			   	$phonenumber = $row1["phonenumber"];
			   	$password = $row1["password"];
			   	$address = $row1["address"];
		   		$salary = $row1["salary"];
		   	}
	?>

			<h3>Waiter Info (ID: <?php echo $id?>)</h3>
			<hr class="mb-1">
			<a href="http://localhost/projects/rms/employee_list.php" class="btn btn-secondary " role="button" aria-pressed="true">Go Back</a>
			<hr class="mb-6">
			<form action="" method="">
				<!---<div class="container">--->
					<div class="">
						<div class="row">
							<div class="">

								<label for="name"><b>Employee Name</b></label>
								<input class="form-control" id="name" type="text" name="name" value="<?php echo $name; ?>" style="width: 800px;" readonly>

								<label for="email"><b>Email Address</b></label>
								<input class="form-control" id="email"  type="email" name="email" value="<?php echo $email; ?>" style="width: 800px;" readonly>

								<label for="address"><b>Address</b></label>
								<input class="form-control" id="address" type="text" name="address" value="<?php echo $address; ?>" style="width: 800px;" readonly>

								<label for="phonenumber"><b>Phone Number</b></label>
								<input class="form-control" id="phonenumber"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="phonenumber" value="<?php echo $phonenumber; ?>" style="width: 300px;" readonly>

								<label for="salary"><b>Salary</b></label>
								<input class="form-control" id="salary"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="salary" value="<?php echo $salary; ?>" style="width: 300px;" readonly>

								<label for="password"><b>Password</b></label>

								<input class="form-control" id="password"  type="text" name="password" value="<?php echo $row["password"]; ?>" style="width: 300px;" readonly>


								<hr class="mb-1">
								<!--<input class="btn btn-secondary" type="button" id="cancel" name="cancel" value="Cancel">-->
							</div>
							</div>

						</div>
					
				<!---</div>--->
			</form>
		<hr class="mb-6">
		<h1>Employee History</h1>
		<h5>Served orders from the tables under Mr. <?php echo $name; ?></h5>
		<hr class="mb-6">

		<?php 
			$query0 = "SELECT * FROM irl_order WHERE wemail = '$email' AND served = 1 ORDER BY subtime DESC";
            $result0 = mysqli_query($conn,$query0);
            while ($row0 = mysqli_fetch_assoc($result0)) {
            	$order_no = $row0["order_no"]; echo "<br>";
					?>
				<hr class="mb-1">
				<form method="" action="">
					Order No: 
					<input class="form-control" id="order_num" type="text" name="order_num" value="<?php echo $order_no; ?>" style="width: 50px;" readonly>
	            	<h5><b>Customer name: <?php echo $row0["cname"]; echo "<br>"; ?></b></h5>
	            	<b>Table No: <?php echo $row0["tableno"]; echo "<br>"; ?></b>
	            	<b>Date and Time: <?php echo $row0["subtime"]; echo "<br>"; ?></b>
	            	<br>
						
					<?php
					echo "<table border='1'>";

					$query2 = "SELECT item_name, quantity, unit_price, total_price FROM irl_order_item WHERE order_no = '$order_no'";
	            	$result2 = mysqli_query($conn,$query2);
	            	echo "<td>Item Name</td> <td>Quantity</td> <td>Unit Price</td> <td>Total Price</td>";
					while ($row2 = mysqli_fetch_assoc($result2)) {
						echo "<tr>";
						foreach ($row2 as $field2 => $value2) {
							echo "<td>" . $value2 . "</td>";
						}
					}
					echo "</table>"; ?>
					<br>
					<b>Total Bill: <?php echo $row0["bill"]; echo "<br>"; ?></b>
					<br>
				</form>
				</div>
				<?php
			}
				

			
		} 
		elseif ($row["user_type"] == 'deliman')
		{
			$sql1 = "SELECT id, name, email, phonenumber, password, address, salary, region FROM users NATURAL JOIN deliman WHERE id='$id'";
			$result1 = mysqli_query($conn, $sql1);
			$row1 = mysqli_fetch_assoc($result1);

			$name = $row1["name"];
		   	$email = $row1["email"];
		   	$phonenumber = $row1["phonenumber"];
		   	$password = $row1["password"];
		   	$address = $row1["address"];
		   	$region = $row1["region"];
		   	$salary = $row1["salary"];

		   	?>

		   	<h3>Delivery-man Info (ID: <?php echo $id?>)</h3>
			<hr class="mb-1">
			<a href="http://localhost/projects/rms/employee_list.php" class="btn btn-secondary " role="button" aria-pressed="true">Go Back</a>
			<hr class="mb-6">
			<form action="" method="">
				<!---<div class="container">--->
					<div class="">
						<div class="row">
							<div class="">

								<label for="name"><b>Employee Name</b></label>
								<input class="form-control" id="name" type="text" name="name" value="<?php echo $name; ?>" style="width: 800px;" readonly>

								<label for="email"><b>Email Address</b></label>
								<input class="form-control" id="email"  type="email" name="email" value="<?php echo $email; ?>" style="width: 800px;" readonly>

								<label for="address"><b>Address</b></label>
								<input class="form-control" id="address" type="text" name="address" value="<?php echo $address; ?>" style="width: 800px;" readonly>

								<label for="region"><b>Region</b></label>
								<input class="form-control" id="region" type="text" name="region" value="<?php echo $region; ?>" style="width: 800px;" readonly>

								<label for="phonenumber"><b>Phone Number</b></label>
								<input class="form-control" id="phonenumber"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="phonenumber" value="<?php echo $phonenumber; ?>" style="width: 300px;" readonly>

								<label for="salary"><b>Salary</b></label>
								<input class="form-control" id="salary"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="salary" value="<?php echo $salary; ?>" style="width: 300px;" readonly>

								<label for="password"><b>Password</b></label>
								<input class="form-control" id="password"  type="text" name="password" value="<?php echo $row["password"]; ?>" style="width: 300px;" readonly>


								<hr class="mb-1">
								<!--<input class="btn btn-secondary" type="button" id="cancel" name="cancel" value="Cancel">-->
							</div>
							</div>

						</div>
					
				<!---</div>--->
			</form>

		<hr class="mb-6">
		<h1>Employee History</h1>
		<h5>Home deliveries completed by Mr. <?php echo $name; ?></h5>
		<hr class="mb-6">

		<?php 
			$query0 = "SELECT * FROM online_order WHERE dmail = '$email' AND delivered = 1 ORDER BY subtime DESC";
            $result0 = mysqli_query($conn,$query0);
            while ($row0 = mysqli_fetch_assoc($result0)) {
            	$order_no = $row0["order_no"]; echo "<br>";
					?>
				<hr class="mb-1">
				<form method="" action="">
					Order No: 
					<input class="form-control" id="order_num" type="text" name="order_num" value="<?php echo $order_no; ?>" style="width: 50px;" readonly>
	            	<h5><b>Customer name: <?php echo $row0["cname"]; echo "<br>"; ?></b></h5>
	            	<b>Address: <?php echo $row0["address"]; echo "<br>"; ?></b>
	            	<?php echo "<br>"; ?>
	            	<b>Order submitted at: <?php echo $row0["subtime"]; echo "<br>"; ?></b>
	            	<b>Order delivered at: <?php echo $row0["deltime"]; echo "<br>"; ?></b>
	            	<br>
						
					<?php
					echo "<table border='1'>";

					$query2 = "SELECT item_name, quantity, unit_price, total_price FROM online_order_item WHERE order_no = '$order_no'";
	            	$result2 = mysqli_query($conn,$query2);
	            	echo "<td>Item Name</td> <td>Quantity</td> <td>Unit Price</td> <td>Total Price</td>";
					while ($row2 = mysqli_fetch_assoc($result2)) {
						echo "<tr>";
						foreach ($row2 as $field2 => $value2) {
							echo "<td>" . $value2 . "</td>";
						}
					}
					echo "</table>"; ?>
					<br>
					<b>Total Bill: <?php echo $row0["bill"]; echo "<br>"; ?></b>
					<br>
				</form>
				</div>
				<?php
			}
				

		 ?>

	<?php
		}
		elseif ($row["user_type"] == 'admin')
		{
			$sql1 = "SELECT * FROM users NATURAL JOIN admin WHERE id='$id'";
			$result1 = mysqli_query($conn, $sql1);
			$row1 = mysqli_fetch_assoc($result1);

			$name = $row1["name"];
		   	$email = $row1["email"];
		   	$phonenumber = $row1["phonenumber"];
		   	$password = $row1["password"];

		   			   	?>

		   	<h3>Admin Info (ID: <?php echo $id?>)</h3>
			<hr class="mb-1">
			<a href="http://localhost/projects/rms/employee_list.php" class="btn btn-secondary " role="button" aria-pressed="true">Go Back</a>
			<hr class="mb-6">
			<form action="" method="">
				<!---<div class="container">--->
					<div class="">
						<div class="row">
							<div class="">

								<label for="name"><b>Admin Name</b></label>
								<input class="form-control" id="name" type="text" name="name" value="<?php echo $name; ?>" style="width: 800px;" readonly>

								<label for="email"><b>Email Address</b></label>
								<input class="form-control" id="email"  type="email" name="email" value="<?php echo $email; ?>" style="width: 800px;" readonly>

								<label for="phonenumber"><b>Phone Number</b></label>
								<input class="form-control" id="phonenumber"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="phonenumber" value="<?php echo $phonenumber; ?>" style="width: 300px;" readonly>

								<label for="password"><b>Password</b></label>
								<input class="form-control" id="password"  type="text" name="password" value="<?php echo $row["password"]; ?>" style="width: 300px;" readonly>


								<hr class="mb-1">
								<!--<input class="btn btn-secondary" type="button" id="cancel" name="cancel" value="Cancel">-->
							</div>
							</div>

						</div>
					</div>
				<!---</div>--->
			</form>
	<?php
		}
		else {
			echo '<script>alert("Error fetching record!")</script>';
	  		echo"<script>window.location='http://localhost/projects/rms/employee_list.php'</script>";	 
		}
	}


	?>

</div>

</body>
</html>