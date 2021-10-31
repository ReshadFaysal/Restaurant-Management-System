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
    <h2>Update Database</h2>
    <h6>Logged in as: Mr. <?php echo $_SESSION['user']['name']?></h6>
  </div>

  <div class="background" style="padding-top: 105px;">
      <div class="row" style="padding-left: 290px;">
        <div class="column">
          <ul>
            
            <li><a href="http://localhost/projects/rms/registration_waiter.php">Add Waiter</li>
            <li><a href="http://localhost/projects/rms/registration_deliman.php">Add Delivery-man</li>
            <li><a href="http://localhost/projects/rms/food_menu_add.php">Add a New Food Item</li>
            <li><a href="http://localhost/projects/rms/beverage_menu_add.php">Add a New Beverage Item</li>

          </ul>
        </div>
        <div class="column">
          <ul>
            <li><a href="http://localhost/projects/rms/modify_admin.php">Update or Remove Admin</li>
            <li><a href="http://localhost/projects/rms/modify_waiter.php">Update or Delete Waiter</li>
            <li><a href="http://localhost/projects/rms/modify_deliman.php">Update or Delete Delivery-man</li>
            <li><a href="http://localhost/projects/rms/modify_food_menu.php">Update or Remove Menu Item</li>
            
            <hr class="mb-1">
          </ul>
        </div>

      <div class="logout_button" style="padding-left: 155px;">
        <ul style="width: 353px; padding-left: 110px"><li><a href="http://localhost/projects/rms/registration_admin.php">Add New Admin</li></ul>
        <a href="http://localhost/projects/rms/admin.php" class="btn btn-secondary " role="button" style="width: 242px; height: 50px; padding-top: 10px; margin-top:2px; margin-left:2px; margin-right:2px; margin-bottom: :2px; background-color: #747571; ">Back to Admin Panel</a>
        <a href="http://localhost/projects/rms/logout.php" class="btn btn-secondary " role="button" style="width: 242px; height: 50px; padding-top: 10px; margin-top:2px; margin-left:2px; margin-right:2px; margin-bottom: :2px; background-color: #AD0000; ">Log Out</a>
      </div>
      
  </div>

</div>

</body>
</html>