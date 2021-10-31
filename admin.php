<?php 
  include('functions.php');

  if (!isAdmin()) {
    header('location: http://localhost/projects/rms/login.php');
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_admin.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
</head> 

<body>

  <div class="header">
    <img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">
  </div>

  <div class="pagetitle">
    <h2>Admin Panel</h2>
    <h6>Welcome, Mr. <?php echo $_SESSION['user']['name']?>!</h6>
  </div>

  <div class="background">
      <div class="row">
        <div class="column">
          <ul>
            <li><a href="http://localhost/projects/rms/cancel_online_order.php">Cancel Online Order</li>
            <li><a href="http://localhost/projects/rms/cancel_irl_order.php">Cancel Table Order</li>
            <li><a href="http://localhost/projects/rms/check_online_order.php">Assign Delivery-man</li>
            <li><a href="http://localhost/projects/rms/view_feedback.php">View Customer Feedback</li>
          </ul>
        </div>
        <div class="column">
          <ul>
            <li><a href="http://localhost/projects/rms/admin2.php">Update Database</li>
            <li><a href="http://localhost/projects/rms/food_menu.php">View Food List</li>
            <li><a href="http://localhost/projects/rms/customer_list.php">View Customer List</li>
            <li><a href="http://localhost/projects/rms/employee_list.php">View Employee List</li>
            <hr class="mb-1">
          </ul>
        </div>
      
  </div>
  <div class="logout_button">
      <a href="http://localhost/projects/rms/logout.php" class="btn btn-secondary " role="button" style="width: 20%; height: 50px; padding-top: 10px; margin-left:2px; margin-right:5px; margin-bottom: :2px; background-color: #AD0000; ">Log Out</a>
  </div>
</div>

</body>
</html>