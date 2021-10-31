<?php 
  include('functions.php');
  include("connect.php");

  if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
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
		<h1>Cancel Table Orders</h1>
		<h6>Logged in as: Mr. <?php echo $_SESSION['user']['name']; ?></h6>
		<a href="http://localhost/projects/rms/admin.php" class="btn btn-secondary " role="button" aria-pressed="true">Go Back</a>
		<?php 
			$wemail = $_SESSION['user']['email'];
			$query = "SELECT * FROM irl_order WHERE served = 0 ORDER BY order_no";
            $result = mysqli_query($conn,$query);
            while ($row = mysqli_fetch_assoc($result)) {
            	$order_no = $row["order_no"]; echo "<br>";
					?>
				<hr class="mb-1">
				<form method="post" action="cancel_irl_order.php">
					Order No: 
					<input class="form-control" id="order_num" type="text" name="order_num" value="<?php echo $order_no; ?>" style="width: 50px;" readonly>
	            	<h5><b>Customer name: <?php echo $row["cname"]; echo "<br>"; ?></b></h5>
	            	<b>Table No: <?php echo $row["tableno"]; echo "<br>"; ?></b>
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
					<b>Total Bill: <?php echo $row["bill"]; echo "<br>"; ?></b>
					<br>
					<input class="btn btn-danger" type="submit" id="done" name="done" value="Cancel Order">
					<hr class="mb-1">
				</form>
				<?php
			}
				

		 ?>
		</div>
		 <div class="deletenav" style="position: fixed; width: 100%px; float: left; z-index: 1; top: 0; right: 0; padding-top: 180px; padding-right: 250px;">
			<form method="post" action="cancel_irl_order.php">
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
		$querry0 =  "DELETE FROM irl_order WHERE  order_no = $order_num";

		if(mysqli_query($conn, $querry0)){
			echo '<script>window.location="cancel_irl_order.php"</script>';
		}
	}

?>

</body>
</html>