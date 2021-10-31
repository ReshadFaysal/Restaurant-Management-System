<?php
include("connect.php");
include("functions.php");
echo '<script>window.location="http://localhost/projects/rms/home/login.php"</script>';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_login.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head>

<body>

	<div class="header">
		<img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">
	</div>
	<div class="pagetitle">
		<h2>Sign In</h2>
		<h6>Sign In to enjoy our online services!</h6>
	</div>


<div>

	<form method="post" action="login.php">
		<!---<div class="container">--->
			<div class="loginform">
				<div class="row">
					<div class="col-sm-4">
						<p>Fill up the form with correct values.</p>
						<hr class="mb-1">
						<label for="email"><b>Email Address</b></label>
						<input class="form-control" id="email"  type="email" name="email" required>

						<label for="password"><b>Password</b></label>
						<input class="form-control" id="password"  type="password" name="password" required>
						<hr class="mb-1">

						<div class="buttons">
							<button type="submit" class="btn btn-primary" name="login">Sign In</button>
							<a href="http://localhost/projects/rms/home.php" class="btn btn-secondary " role="button" aria-pressed="true">Cancel</a>
						</div>
						<p>
							Not yet a member? <a href="registration.php">Sign up</a>
						</p>
						<!--<input class="btn btn-secondary" type="button" id="cancel" name="cancel" value="Cancel">-->
					</div>
				</div>
			</div>
		<!---</div>--->
	</form>

</body>

<?php
   
   if(isset($_POST['login'])){

		 $email = $_POST['email'];
		 $password = $_POST['password'];

		 $query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
		 $results = mysqli_query($conn, $query);

		 if(mysqli_num_rows($results)==1){
		 	

		/*$row=mysqli_fetch_array($run);*/

	 	$user_data = mysqli_fetch_assoc($results);

		 	if ($user_data['user_type'] == 'admin') {

					$_SESSION['user'] = $user_data;
					header('location: http://localhost/projects/rms/admin.php');		  
			}
			elseif($user_data['user_type'] == 'customer'){
					$_SESSION['user'] = $user_data;

					header('location: http://localhost/projects/rms/customer.php');
			}
			elseif($user_data['user_type'] == 'deliman'){
					$_SESSION['user'] = $user_data;

					header('location: http://localhost/projects/rms/deliman.php');
			}
			elseif($user_data['user_type'] == 'waiter'){
					$_SESSION['user'] = $user_data;

					header('location: http://localhost/projects/rms/waiter.php');
			}
			else{
		    		echo '<script>alert("Failed to sign in!")</script>';
		    }

		 	/*echo"<script>window.location='admin.php'</script>";*/


		 }else{
		    echo '<script>alert("Invalid email or password!")</script>';
		 }

	 }

?>

</html>


	