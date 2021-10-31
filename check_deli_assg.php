<?php 
	include("connect.php");
	include('functions.php');

	if (!isDeliman()) {
		header('location: http://localhost/projects/rms/login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>
<body>
	
	<div class="container" style="padding-top: 20px;">
		<h1>Current Delivery Assignments</h1>
		<h5>For Mr. <?php echo $_SESSION['user']['name']; ?></h5>
		<a href="http://localhost/projects/rms/deliman.php" class="btn btn-secondary " role="button" aria-pressed="true">Go Back</a>
		<?php 
			$dmail = $_SESSION['user']['email'];
			$query = "SELECT * FROM online_order WHERE delivered = 0 AND dmail = '$dmail' ORDER BY order_no";
            $result = mysqli_query($conn,$query);
            while ($row = mysqli_fetch_assoc($result)) {
            	$order_no = $row["order_no"]; echo "<br>";
					?>
				<hr class="mb-1">
				<form method="post" action="check_deli_assg.php">
					<h6><b>Order No:</b></h6> 
					<input class="form-control" id="order_num" type="text" name="order_num" value="<?php echo $order_no; ?>" style="width: 50px;" readonly>
	            	<h5><b>Customer name: <?php echo $row["cname"]; echo "<br>"; ?></b></h5>
	            	<b>Address: <?php echo $row["address"]; echo "<br>"; ?></b>
	            	<b>Phone : <?php echo $row["phone"]; echo "<br>"; ?></b>
	            	<b>Submission time: <?php echo $row["subtime"]; echo "<br>"; ?> </b>
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
					<b>Total Bill: <?php echo $row["bill"]; echo "<br>"; ?></b>
					<br>
					<input class="btn btn-success" type="submit" id="done" name="done" value="Delivered">
					<hr class="mb-1">
				</form>
				<?php
			}
				

		 ?>
	</div>

<?php
	
	if(isset($_POST["done"])){
		$order_num = $_POST["order_num"];
		$time = date("d-m-Y h:i:sa");
		
		$querry0 =  "UPDATE online_order SET delivered = 1, deltime = '$time' WHERE  order_no = $order_num";

		if(mysqli_query($conn, $querry0)){
			echo '<script>alert("Delivery completed!")</script>';
			echo '<script>window.location="check_deli_assg.php"</script>';
		}
	}

?>

</body>
</html>