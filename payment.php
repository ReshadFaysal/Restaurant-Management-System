
<?php
include("connect.php");
include('functions.php');

// include('CreditCard.php');
// require( 'CreditCard.php');
// require_once 'Validate/FI.php';

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: http://localhost/projects/rms/login.php');
}



$cname = $_SESSION['user']['name'];
$email = $_SESSION['user']['email'];

if(isset($_SESSION['mOrder'])){
    	// echo $_SESSION['mOrder']['total'];
	$address = $_SESSION['mOrder']['address'];
	$phone = $_SESSION['mOrder']['phone'];
	$time = $_SESSION['mOrder']['time'];
	$total = $_SESSION['mOrder']['total'];
	$district = $_SESSION['mOrder']['district'];

	// $district="Dhaka";

}else{
	echo '<script>window.location="customer.php"</script>';
}

?>

<!doctype html>
<html>
<head>
	<title>Payment</title>

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<style>
		.bg {
			background-color: #4CAF50; /* Green */
		}
	</style>

</head>

<body style="position: absolute; /*or fixed*/; width: 1000px; height: 300px; left: 34%; top:100px; margin: 0 0 0 0">

	<div class="container" >
		<div class="row">
			<form method="post" action = "payment.php">
				<div class="col-xs-12 col-md-5">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Payment Details
							</h3>
							
						</div>
						<div class="panel-body">

							<!-- <div class="form-group">
								<label for="cardNumber">
								CARD NUMBER</label>
								<div class="input-group">
									<input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="4111 1111 1111 1111"
									required autofocus />
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								</div>
							</div> -->

							<div class="row">
								<div style="margin-left: 18px" >
									<div class="form-group">
										<label for="expityMonth">
										Card Number</label>
										<div class="form-inline">
											<input id="first" type="text" class="form-control" style="width:20%" autocomplete="off" minlength="4" maxlength="4" pattern="\d{4}" title="First four digits" required>
											<input id="second" type="text" class="form-control" style="width:20%" autocomplete="off" minlength="4" maxlength="4" pattern="\d{4}" title="Second four digits" required>
											<input id="third" type="text" class="form-control" style="width:20%" autocomplete="off" minlength="4" maxlength="4" pattern="\d{4}" title="Third four digits" required>
											<input id="fourth" type="text" class="form-control" style="width:20%" autocomplete="off" minlength="3" maxlength="4" pattern="\d{3,4}" title="Third four digits" required>

										</div>
									</div>
								</div>

							</div>


							<div class="row">
								<div class="col-xs-7 col-md-7">
									<div class="form-group">
										<label for="expityMonth">
										EXPIRY DATE</label>
										<div class="form-inline">
											<select class="form-control" style="width:45%" required>
							
												<option>January</option>
												<option>February</option>
												<option>March</option>
												<option>April</option>
												<option>May</option>
												<option>June</option>
												<option>July</option>
												<option>August</option>
												<option>September</option>
												<option>October</option>
												<option>November</option>
												<option>December</option>
												
											</select>
											<span style="width:10%; text-align: center"> / </span>
											<select class="form-control" style="width:45%" required>
												<option>2017</option>
												<option>2018</option>
												<option>2019</option>
												<option>2020</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-xs-5 col-md-5 pull-right">
									<div class="form-group">
										<label for="cvCode">
										CV CODE</label>
										<input type="password" class="form-control" id="cvCode" name="cvCode" placeholder="0965" autocomplete="off" minlength="3" maxlength="4" pattern="\d{3,4}" title="Password" required />
									</div>
								</div>
							</div>

						</div>
					</div>
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a><span class="badge pull-right">   <span class="glyphicon glyphicon-usd"></span><?php echo $total ?>   </span>Cost</a>
						</li>

						<li class="active"><a><span class="badge pull-right">   <span class="glyphicon glyphicon-usd"></span><?php
						if ($district=="Dhaka") {
							$charge=0;
						}else {
							$charge=100;
						}
						echo $charge ?>   </span>Delivery Charge</a>
						
						</li>
						<li class="active"><a><span class="badge pull-right">   <span class="glyphicon glyphicon-usd"></span><?php
						$query = "SELECT * FROM online_order WHERE email='$email'";
						$result = mysqli_query($conn,$query);
						$discount=0;
						if (mysqli_num_rows($result)==0) {
							$discount=$total*0.2;
							echo "-".$discount;
						}
						else{
							echo "0";
						}
						?>  </span>Discount</a>

						<li  class="active"><a><span class="badge pull-right">   <span class="glyphicon glyphicon-usd"></span><?php $total=$total+$charge-$discount;  echo $total ?>   </span>Final Payment</a>
						</li>

					</li>
					<!-- <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span>4200</span><?php $total ?></a></li> -->
				</ul>
				<br/>



				<input type="submit" name="pay" class="btn btn-success btn-lg btn-block" value="Pay">
			</form>

			<form method="post" action = "payment.php">
				<br>
				<input type="submit" name="cash-on-delivery" class="btn btn-success btn-lg btn-block" value="Cash On Delivery">
				<!---<a style="float: left; margin-left: 3px; margin-top: 10px;" href="http://localhost/projects/rms/customer.php" class="btn btn-secondary " role="button" aria-pressed="true" >Cancel Order</a>--->
			</form>




			<!-- <a type="submit" name="confirm" class="btn btn-success btn-lg btn-block" role="button">Pay</a> -->
			<!-- <br/> -->
			<!-- <a href="http://www.jquery2dotnet.com" class="btn btn-success btn-lg btn-block" role="button">Cash On Delivery</a> -->
		</div>
	</div>
</div>
</body>


<?php 


if (isset($_POST["cash-on-delivery"])){

					// echo "string";
					// echo '<script>window.location="home.php"</script>';



	$query = "INSERT INTO online_order (cname, email, address, phone, bill, subtime)
	VALUES ('$cname', '$email', '$address', '$phone', '$total', '$time')";                    
	$result = mysqli_query($conn, $query);
	$order_no = $conn->insert_id;
	echo $order_no;

	if($result) {

		foreach ($_SESSION["cart"] as $key => $value) {


			$item_name = $value["item_name"];
			$quantity = $value["item_quantity"];
			$price = $value["item_price"]; 
			$itotal = $value["item_quantity"] * $value["item_price"];

			$query2 = "INSERT INTO online_order_item (order_no, item_name, quantity, unit_price, total_price)
			VALUES ('$order_no', '$item_name', '$quantity', '$price', '$itotal')";

			$result2 = mysqli_query($conn, $query2);



		}

		if($result2)
		{
			unset($_SESSION["cart"]);
			unset($_SESSION["mOrder"]);
			$query3 = "INSERT INTO payment (order_id, payment_method)
			VALUES ('$order_no', 'Cash On Delivery')";

			$result3 = mysqli_query($conn, $query3);
			echo '<script>alert("Your order has been confirmed and will be delivered shortly!")</script>';
			echo '<script>window.location="customer.php"</script>';
		}
		else
		{
			echo '<script>alert("There were errors in processing your order!")</script>';
		}


	}
}else if (isset($_POST["pay"])) {


	// luhn_check()
	// $cardNumber = $_POST["cardNumber"];
	// $cvCode = $_POST["cvCode"];

	// $pCard = explode(" ", $cardNumber);
	// $isValidCardNumbe=0;
	// $cardNumberCount=0;
	// $isValid=0;
	// if (sizeof($pCard)==4) {
	// 	foreach ($pCard as $key => $value) {
	// 		if (filter_var($value, FILTER_VALIDATE_INT)) {
	// 			$isValidCardNumbe+=1;
	// 			$cardNumberCount+=strlen($value);
	// 		} else {
	// 			$isValidCardNumbe=0;
	// 			break;
	// 		}
	// 	}
		
	// }

	// // echo $isValidCardNumbe;
	// // echo $cardNumberCount;
	// if ($isValidCardNumbe==0) {
	// 	if (filter_var($cardNumber, FILTER_VALIDATE_INT)) {
	// 		$isValidCardNumbe=4;
	// 		$cardNumberCount+=strlen($cardNumber);
	// 	} else {
	// 		$isValidCardNumbe=0;
	// 	}
	// }

	// if ($isValidCardNumbe==4) {
	// 	if ($cardNumberCount>14 && $cardNumberCount<17) {
	// 		$isValid+=1;
	// 	}
	// }

	// if (filter_var($cvCode, FILTER_VALIDATE_INT)) {
	// 	if (strlen($cvCode)==3 || strlen($cvCode)==4) {
	// 		$isValid+=1;
	// 	}
		
	// }



	if (true) {
		# code...


		$query = "INSERT INTO online_order (cname, email, address, phone, bill, subtime)
		VALUES ('$cname', '$email', '$address', '$phone', '$total', '$time')";                    
		$result = mysqli_query($conn, $query);
		$order_no = $conn->insert_id;
		echo $order_no;

		if($result) {

			foreach ($_SESSION["cart"] as $key => $value) {


				$item_name = $value["item_name"];
				$quantity = $value["item_quantity"];
				$price = $value["item_price"]; 
				$itotal = $value["item_quantity"] * $value["item_price"];

				$query2 = "INSERT INTO online_order_item (order_no, item_name, quantity, unit_price, total_price)
				VALUES ('$order_no', '$item_name', '$quantity', '$price', '$itotal')";

				$result2 = mysqli_query($conn, $query2);



			}

			if($result2)
			{
				$query3 = "INSERT INTO payment (order_id, payment_method)
				VALUES ('$order_no', 'Paid')";

				$result3 = mysqli_query($conn, $query3);

				unset($_SESSION["cart"]);
				unset($_SESSION["mOrder"]);
				echo '<script>alert("Your order has been confirmed and will be delivered shortly!")</script>';
				echo '<script>window.location="customer.php"</script>';
			}
			else
			{
				echo '<script>alert("There were errors in processing your order!")</script>';
			}


		}

	}else{
		echo '<script>alert("Invalid Card Info!!")</script>';	
	}


}

function validateChecksum($number) {

    // Remove non-digits from the number
	$number=preg_replace('/\D/', '', $number);

    // Get the string length and parity
	$number_length = strlen($number);
	$parity = $number_length % 2;

    // Split up the number into single digits and get the total
	$total=0;
	for ($i=0; $i<$number_length; $i++) {
		$digit=$number[$i];

        // Multiply alternate digits by two
		if ($i % 2 == $parity) {
			$digit*=2;

            // If the sum is two digits, add them together
			if ($digit > 9) {
				$digit-=9;
			}
		}

        // Sum up the digits
		$total+=$digit;
	}

    // If the total mod 10 equals 0, the number is valid
	return ($total % 10 == 0) ? TRUE : FALSE;

}


?>

</html>