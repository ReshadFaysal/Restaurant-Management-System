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
	<title>Delete Item</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>
<body>
	 <div class="container" style="width: 70%; float: left; padding-left: 50PX;"> 
	 	<hr class="mb-6">
	 	<h1>List of Food Items in Database</h1>
		<?php 
			$query = "SELECT id, pname, price, itype, descr, image FROM item ORDER BY pname ASC";
			$result = mysqli_query($conn, $query);
			echo "<br>";
			echo "<table border='1'>";
			echo "<td>ID</td> <td>name</td> <td>price</td> <td>type</td> <td>description</td> <td>image-url</td>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				foreach ($row as $field => $value) {
					echo "<td>" . $value . "</td>";
				}
				echo "</tr>";
			}
		echo "</table>";
		 ?>
		 <hr class="mb-6">

		
		<div class="deletenav" style="position: fixed; width: 100%px; float: left; z-index: 1; top: 0; right: 0; padding-top: 100px; padding-right: 50px;">
			<form method="post" action="update_item.php">
				<!---<div class="container">--->
					<div class="">
						<div class="row">
							<div class="">
								<p>Input Id no. to update or delete an entry.</p>
								<hr class="mb-1">
								<label for="id"><b>ID No.</b></label>
								<input class="form-control" id="id"  type="text" name="id" required>
								<hr class="mb-1">

								<div class="buttons">
									<button type="submit" class="btn btn-success" name="update">update</button>
									<button type="submit" class="btn btn-danger" name="delete">delete</button>
									<a href="http://localhost/projects/rms/admin2.php" class="btn btn-secondary " role="button" aria-pressed="true">Cancel</a>
								</div>
								<!--<input class="btn btn-secondary" type="button" id="cancel" name="cancel" value="Cancel">-->
							</div>
						</div>
					</div>
				<!---</div>--->
			</form>
		</div>

	 </div>

</body>


</html>