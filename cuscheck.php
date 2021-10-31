<?php 
include("connect.php");
include('functions.php');

if (!isCustomer()) {
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
		<h1>Active Orders</h1>
		<h5>Home delivery orders given by Mr. <?php echo $_SESSION['user']['name']; ?></h5>
		<hr class="mb-1">
		<h6><b>*. To cancel an order please contact 'Les Chefs' management: phone: +8801234567891, +8801234567892.</b></h6>
		<h6><b>*. If a delivery-man has been assigned to your order you can see his name and phonenumber here.</b></h6>
		<hr class="mb-1">
		<a href="http://localhost/projects/rms/customer.php" class="btn btn-secondary " role="button" aria-pressed="true">Go Back</a>
		<?php 
		$email = $_SESSION['user']['email'];
		$query = "SELECT * FROM online_order WHERE email = '$email' && delivered = 0 ORDER BY order_no";
		$result = mysqli_query($conn,$query);
		while ($row = mysqli_fetch_assoc($result)) {
			$order_no = $row["order_no"]; echo "<br>";
			?>
			<hr class="mb-1">
			<form method="post" action="check_irl_order.php">
				Order No: 
				<input class="form-control" id="order_num" type="text" name="order_num" value="<?php echo $order_no; ?>" style="width: 50px;" readonly>
				<h5><b>Customer name: <?php echo $row["cname"]; echo "<br>"; ?></b></h5>
				<b>Delivery Address: <?php echo $row["address"]; echo "<br>"; ?></b>

				<?php
				$dmail = $row["dmail"];
				$query1 = "SELECT * FROM deliman WHERE email = '$dmail'";
				$result1 = mysqli_query($conn,$query1);
				$row1 = mysqli_fetch_assoc($result1); 

				if(mysqli_num_rows($result1)==1){ ?>
					<b>Delivery-man: <?php echo $row1["name"]; echo "<br>"; ?></b>
					<b>Delivery-man phone: <?php echo $row1["phonenumber"]; echo "<br>"; ?></b>
					<br>
				<?php }else
				{
					echo "<b>No delivery man assigned yet!";
				}

				echo "<table border='1'>";

				$query2 = "SELECT item_name, quantity, unit_price, total_price FROM online_order_item WHERE order_no = '$order_no'";
				$result2 = mysqli_query($conn,$query2);

				$query3 = "SELECT payment_method FROM payment WHERE order_id = '$order_no'";
				$result3 = mysqli_query($conn,$query3);

				echo "<td>Item Name</td> <td>Quantity</td> <td>Unit Price</td> <td>Total Price</td>";
				while ($row2 = mysqli_fetch_assoc($result2)) {
					echo "<tr>";
					foreach ($row2 as $field2 => $value2) {
						echo "<td>" . $value2 . "</td>";
					}
				}

					$paymentStatus="";

					if ($result3->num_rows > 0) {
						while($p = $result3->fetch_assoc()) {
							$paymentStatus= $p["payment_method"];
						}
					} else {
						$paymentStatus= "Cash On Delivery";
					}

				echo "</table>"; ?>
				<br>
				<b>Total Bill: <?php echo $row["bill"]; echo "<br>"; ?></b>
				<b>Payment Status: <?php echo $paymentStatus; echo "<br>"; ?></b>
				<br>
			</form>
			<?php
		}


		?>
	</div>

	<?php
	
	if(isset($_POST["done"])){
		$order_num = $_POST["order_num"];
		$querry0 =  "UPDATE irl_order SET served = 1 WHERE  order_no = $order_num";

		if(mysqli_query($conn, $querry0)){
			echo '<script>window.location="check_irl_order.php"</script>';
		}
	}

	?>

</body>
</html>