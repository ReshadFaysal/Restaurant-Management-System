<?php 
  include("connect.php");
  include('functions.php');

  if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: http://localhost/projects/rms/login.php');
  }
?>

<!DOCTYPE html>
<html>

<head>
  <title>Food Menu</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_foodmenu.css">
</head>

<body>

  <div class="header">
      <img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">
    </div>

    <div class="pagetitle">
    <h2>Add a New Beverage Item to the Menu</h2>
  </div>

    <div class="background">
        <form action="beverage_menu_add.php" method="post">
          <div class="form" style="width:100%; height:500px; padding-left: 200px; padding-right: 200px;">

                <label for="name"><b> Item Name</b></label>
                <input class="form-control" id="name" type="text" name="name" required>

                <label for="image"><b> Image URL</b></label>
                <input class="form-control" id="image" type="text" name="image" required>
                

                <!---
                <label for="name"><b> Item Description</b></label>
                <textarea class="form-control" name="descr" cols="50" rows="5"  id="descr" type="text" name="descr" required></textarea>
                <input class="form-control" id="descr" type="text" name="descr" required>--->

                <label for="descr"><b> Item Description</b></label>
                
                <textarea class="form-control" name="descr" cols="50" rows="5"  id="descr" type="text" name="descr" required></textarea>

                <hr class="mb-0">
                <label for="price" style="float: left; padding-right: 20px; padding-left: 380px;"><b>Price</b></label>
                <input class="form-control" id="price"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="price" style="width:10%;  padding-bottom: 20px; " required>

                <hr class="mb-1">
                <input class="btn btn-danger" type="reset" value="Reset">
                <input class="btn btn-primary" type="submit" id="register" name="create" value="Add Item">
                <a href="http://localhost/projects/rms/admin2.php" class="btn btn-secondary " role="button" aria-pressed="true">Cancel</a>

            </div>
        </form>

    </div>

<?php
    if(isset($_POST['create'])){

      $name          = $_POST['name'];
      $image         = $_POST['image'];
      $price         = $_POST['price'];
      $descr         = $_POST['descr'];

        $sql = "INSERT INTO item (pname, image, price, itype, descr) 
        VALUES ('".$_POST["name"]."','".$_POST["image"]."', '".$_POST["price"]."', 'beverage', '".$_POST["descr"]."')";

        if(mysqli_query($conn, $sql)){
          echo '<script>alert("New beverage item added!")</script>';
          /*echo"<script>window.location='login.php'</script>";*/
        }else{
          echo 'There were erros while saving the data.';
        }
    }else{
      echo 'No data';
    }

?>

</body>

</html>

