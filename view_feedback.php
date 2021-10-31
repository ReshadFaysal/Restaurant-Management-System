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
	<title>Update Admin</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>
<body>

	<div class="container" style="padding-top: 50px">
		<h1>Customer Feedback</h1>
		<h6>sorted by submission time</h6>
		<hr class="mb-6">

		<?php 
					$query = "SELECT name, email, phonenumber, comment, subtime FROM customer NATURAL JOIN feedback ORDER BY subtime ASC";

					$result = mysqli_query($conn, $query);
					/*if($result){echo "TEST";}*/

					echo "<br>";
					echo "<table border='1'>";
					echo "<td>Name</td> <td>Email</td> <td>Phone</td> <td>Feedback</td> <td>Submission time</td>";
					while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
						foreach ($row as $field => $value) {
							echo "<td>" . $value . "</td>";
						}
						echo "</tr>";
					}
					echo "</table>";

		?>
	</div>

</body>
</html>