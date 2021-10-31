<?php 
	include("connect.php");
	include('functions.php');

	if (!isCustomer()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: http://localhost/projects/rms/login.php');
	}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Feddback</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_foodmenu.css">
</head>


<body>

	<div class="header">
		<img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">
	</div>
	<div class="pagetitle" style="height:70px;">
		<h2>Customer Feedback</h2>
		<h6>Please leave us your valuable feedback, Mr. <?php echo $_SESSION['user']['name']?>!</h6>
	</div>
	<div class="background" style="height:520px;">
		<form action="feedback.php" method="post">
           	<div class="form" style="padding-left:100px; padding-right: 100px; padding-top: 30px;">
				<label for="feedback"></label>
	            <textarea class="form-control" cols="50" rows="10"  id="comment" type="text" name="comment" placeholder="Please give us your valuable feedback or any complaint or comments you might have about our service..." required></textarea>

	                <hr class="mb-0">

				<hr class="mb-1">
				
	        	<input class="btn btn-secondary" type="reset" value="reset">
	        	<input class="btn btn-success" type="submit" id="submit" name="done" value="submit">
	            <a href="http://localhost/projects/rms/customer.php" class="btn btn-secondary " role="button">cancel</a>
        	</div>
        </form>
	</div>

<?php

	if(isset($_POST['done'])){
		$email = $_SESSION['user']['email'];
		$feedback = $_POST['comment'];
		$time = date("d-m-Y h:i:sa"); 

		$sql = "INSERT INTO feedback (email, comment, subtime) VALUES ('$email', '$feedback', '$time')";

		if(mysqli_query($conn, $sql))
		{
          echo '<script>alert("Thank you for your valuable feedback! We shall review it and get back to you!")</script>';

        
        }else{
          echo 'There were errors while processing your request.';
        }
    }
?>


</body>

</html>



