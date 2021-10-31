<?php 
include("connect.php");
include('functions.php');

if (!isAdmin()) {
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
		<div>
			<h1>Cancel Online Orders</h1>
			<a href="http://localhost/projects/rms/admin.php" class="btn btn-secondary " role="button" aria-pressed="true">Go Back</a>
			<?php 
			$wemail = $_SESSION['user']['email'];
			$query = "SELECT * FROM online_order WHERE dmail = '' ORDER BY order_no";
			$result = mysqli_query($conn,$query);
			while ($row = mysqli_fetch_assoc($result)) {
				$order_no = $row["order_no"]; echo "<br>";
				?>
				<hr class="mb-1">
				<form method="post" action="cancel_online_order.php">
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

					$query3 = "SELECT payment_method FROM payment WHERE order_id = '$order_no'";
					$result3 = mysqli_query($conn,$query3);

					echo "<td>Item Name</td> <td>Quantity</td> <td>Unit Price</td> <td>Total Price</td>";

					// $paymentRow = mysqli_fetch_assoc($result3);
					while ($row2 = mysqli_fetch_assoc($result2)) {
						echo "<tr>";
						foreach ($row2 as $field2 => $value2) {
							echo "<td>" . $value2 . "</td>";
						}
					}
					echo "</table>";
					// echo "order no ".$order_no;
					$paymentStatus="";

					if ($result3->num_rows > 0) {
						while($p = $result3->fetch_assoc()) {
							$paymentStatus= $p["payment_method"];
						}
					} else {
						$paymentStatus= "Cash On Delivery";
					}

					?>
					<br>
					
					
					<b>Total Bill: <?php echo $row["bill"]; echo "<br>"; ?></b>
					<b>Payment Status: <?php echo $paymentStatus; echo "<br>"; ?></b>
					<br>
					<input class="btn btn-danger" type="submit" id="done" name="done" value="Cancel Order">
					<hr class="mb-1">
				</form>
				<?php
			}


			?>
		</div>
		<div class="deletenav" style="position: fixed; width: 100%px; float: left; z-index: 1; top: 0; right: 0; padding-top: 150px; padding-right: 250px;">
			<form method="post" action="cancel_online_order.php">
				<!---<div class="container">--->
					<div class="">
						<div class="row">
							<div class="">
								<p>Input order no. to cancel an order.</p>
								<hr class="mb-1">
								<label for="id"><b>ID No.</b></label>
								<input class="form-control" id="order_num"  type="text" name="order_num" required>
								<hr class="mb-1">

								<div class="buttons">
									<button type="submit" class="btn btn-danger" name="done">Cancel Order</button>
									<a href="http://localhost/projects/rms/admin.php" class="btn btn-secondary " role="button" aria-pressed="true">Go Back</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<?php


		if(isset($_POST["done"])){
			$order_num = $_POST["order_num"];
			$querry0 =  "DELETE FROM online_order WHERE  order_no = $order_num";
			$querry1 =  "DELETE FROM payment WHERE  order_id = $order_num";

			if(mysqli_query($conn, $querry0)){
				mysqli_query($conn, $querry1);
				echo '<script>window.location="cancel_online_order.php"</script>';
			}
		}




		?>

	</body>
	</html>