<?php 
  include("connect.php");
  include('functions.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>Food Menu</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_foodmenu.css">
</head>

<body>

	<div class="header" style="position:fixed; margin-top: 0px;">
    	<img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">
  	</div>

  	<div class="pagetitle">
		<h2>Menu</h2>
	</div>

	<div class="orderbtn">
	<?php if (!isAdmin() && !isWaiter() && !isDeliman()) { ?>
	
		<a href="http://localhost/projects/rms/cart.php" class="btn btn-danger" role="button" aria-pressed="true">Order Now!</a>
	
	<?php } ?>
	</div>

	<?php if (!isAdmin() && !isWaiter() && !isDeliman()) { ?>
	<div class="nav" style="position: fixed; width: 120px; padding-top: 25px; padding-right: 10px;">
        <a href="http://localhost/projects/rms/cart.php" class="btn btn-danger " role="button" aria-pressed="true" style="width: 120px">Order Now!</a>
        <?php if (isLoggedIn()){ ?>
        	<a href="http://localhost/projects/rms/customer.php" class="btn btn-secondary " role="button" aria-pressed="true" style="width: 120px">  Go Back  </a>
        <?php } ?>
    </div>
    <?php } ?>

  	<div class="background ">
  		<div class="fooditems">
			<?php
	            $query = "SELECT * FROM item WHERE itype='food' ORDER BY pname ASC";
	            $result = mysqli_query($conn,$query);
	            if(mysqli_num_rows($result) > 0) {

	                while ($row = mysqli_fetch_array($result)) {

	                    ?>
	                    <div style="float: left; width: 25%; background-color: #474787;">

                            <div class="item">
                            	<div class="foodpic">
	                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
	                            </div>
	                            <div class="description">
	                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
	                                <h6 class="text-secondary"><?php echo $row["descr"]; ?></h6>
	                            </div>
	                            <div class="pricetag">
	                                <h5 class="text-danger">Tk.<?php echo $row["price"]; ?></h5>
	                            </div>                            
                            </div>
	                        
	                    </div>
	                    
	                    <?php
	                }
	                
	            }
	        ?>
        </div>

        <div class="beverage">
			<?php
	            $query = "SELECT * FROM item WHERE itype='beverage' ORDER BY pname ASC ";
	            $result = mysqli_query($conn,$query);
	            if(mysqli_num_rows($result) > 0) {

	                while ($row = mysqli_fetch_array($result)) {

	                    ?>
	                    <div style="float: left; width: 25%; background-color: #474787;">

	                            <div class="item">
	                            	<div class="foodpic">
		                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
		                            </div>
		                            <div class="description">
		                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
		                                <h6 class="text-secondary"><?php echo $row["descr"]; ?></h6>
		                            </div>
		                            <div class="pricetag">
		                                <h5 class="text-danger">Tk.<?php echo $row["price"]; ?></h5>
		                            </div>                            
	                            </div>
	                        
	                    </div>
	                    
	                    <?php
	                }
	                
	            }
	        ?>
        </div>
	</div>

    
	<?php if (!isAdmin() && !isWaiter() && !isDeliman()) { ?>
		<div class="orderbtn">
			<a href="http://localhost/projects/rms/cart.php" class="btn btn-danger" role="button" aria-pressed="true">Order Now!</a>
		</div>
	
	<?php } ?>
	
<?php if (!isAdmin() && !isWaiter() && !isDeliman()) { ?>
	<footer class="footer">
	<div class="row">
	  	<div class="col-sm-4">
			<h6 class="">Opening Hours</h6>
	         <li>On weekdays: 9:00am – 10:00pm</li>
	         <li>On weekends: 5:00pm – 10:00pm</li>
	  	</div>
	  	<div class="col-sm-4">
			<h6 class="">Address</h6>
			<li>Jahurul Islam City Gate,</li>
			<li>A/2 Jahurul Islam Ave, Dhaka 1212</li>
	  	</div>
	 	<div class="col-sm-4">
		  	<h6 class="">Contact Information</h6>
		  	<li> <a href="http://leschefs@leschefs.com">email: leschefs@leschefs.com </a> </li>
		    <li>phone: +8801234567891, +8801234567892</li>
	  	</div>
	</div>
	</footer>
<?php } ?>


  	

</body>

</html>

