<?php 
	include("connect.php");
	include('functions.php');

	if (!isAdmin()) {
		header('location: http://localhost/projects/rms/login.php');
	}


	if(isset($_POST["done"])){

		$query = "SELECT id, name, email, phonenumber, region FROM users NATURAL JOIN deliman WHERE user_type='deliman' ORDER BY name ASC";
		$result = mysqli_query($conn, $query);

		echo "<br>";
		echo "<table border='1'>";
		echo "<td>ID</td> <td>name</td> <td>email</td> <td>phone no.</td> <td>address</td>";
		while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
			foreach ($row as $field => $value) {
				echo "<td>" . $value . "</td>";
				
			}
			echo $dmail = $row['email'];
			$query1 = "SELECT * FROM online_order NATURAL JOIN deliman WHERE dmail = '$dmail'";
			$result1 = mysqli_query($conn, $query1);

			if($result1){
				echo "bruh";
				$n = mysqli_num_rows($result1);
			}
			echo "<td>" . $n . "</td>";

				echo "</tr>";
		}
		echo "</table>";

	}



	if(isset($_POST["assign"])){
		$order_num = $_POST["order_num"];
		$dname = '';
		
		$query0 =  "UPDATE online_order SET dmail = '$dmail' WHERE  order_no = $order_num";

		if(mysqli_query($conn, $query0)){
			echo "success!";
			echo '<script>window.location="check_online_order.php"</script>';
		}
	}

?>