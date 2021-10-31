<?php

include("connect.php");
include('functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: http://localhost/projects/rms/login.php');
  }

	if(isset($_POST['delete']))
	{
		$id = $_POST['id'];
		$sql = "DELETE FROM item WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			echo '<script>alert("Item deleted!")</script>';
	   		echo"<script>window.location='http://localhost/projects/rms/modify_food_menu.php'</script>";
		} else {
	   		echo '<script>alert("Error deleting record!")</script>';
  			echo"<script>window.location='http://localhost/projects/rms/modify_deliman.php'</script>";
		}

		mysqli_close($conn);
	}

	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
		$sql = "SELECT pname, image, price, itype, descr FROM item WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		if ($result) {
			$pname = $row["pname"];
		   	$image = $row["image"];
		   	$price = $row["price"];
		   	$itype = $row["itype"];
		   	$descr = $row["descr"];
		} else {
			echo '<script>alert("Error fetching record!")</script>';
	  		echo"<script>window.location='http://localhost/projects/rms/modify_food_menu.php'</script>";	 
		}
	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Deliman</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>
<body>

<div class="container" style="padding-top: 75px; padding-left: 100px;">

	<h3>Update Item Info (ID: <?php echo $id?>)</h3>
	<hr class="mb-6">
	<form action="update_item.php" method="post">
			<div class="">
				<div class="row">
					<div class="">

						<label for="name"><b>Item Name</b></label>
						<input class="form-control" id="pname" type="text" name="pname" value="<?php echo $pname; ?>" style="width: 800px;" required>

						<label for="image"><b>Image</b></label>
						<input class="form-control" id="image"  type="text" name="image" value="<?php echo $image; ?>" style="width: 800px;" required>

						<label for="itype"><b>Item Type</b></label>
						<input class="form-control" id="itype" type="text" name="itype" value="<?php echo $itype; ?>" style="width: 300px;" required>

						<label for="price"><b>Price</b></label>
						<input class="form-control" id="price"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="price" value="<?php echo $price; ?>" style="width: 300px;" required>

						<label for="descr"><b> Item Description</b></label>
                		<textarea class="form-control" cols="50" rows="5"  id="descr" type="text" name="descr" required><?php echo $descr;?></textarea>

						<input type="hidden" name="hidden_id" value="<?php echo $id; ?>">

						<hr class="mb-1">
						<input class="btn btn-success" type="reset" value="Reset">
						<input class="btn btn-warning" type="submit" id="update" name="done" value="Update">
						<a href="http://localhost/projects/rms/modify_food_menu.php" class="btn btn-secondary " role="button">Cancel</a>
					</div>
					</div>

				</div>
			</div>
	</form>

</div>

<?php

    if(isset($_POST['done'])){

    echo $id 		   = $_POST['hidden_id'];
    echo $pname         = $_POST['pname'];
    echo $image         = $_POST['image'];
   	echo $itype         = $_POST['itype'];
    echo $price         = $_POST['price'];
    echo $descr         = $_POST['descr'];

    $sql = "UPDATE item SET pname = '$pname', image = '$image', itype = '$itype', price = '$price', descr = '$descr' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
      echo '<script>alert("Item data updated!")</script>';
      echo"<script>window.location='modify_food_menu.php'</script>";
    }else{
      echo 'There were erros while updating the data.';
    }
	}else{
  		echo 'No data';
	}

?>

</body>
</html>