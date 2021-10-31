<?php
include("connect.php");
include('functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: http://localhost/projects/rms/login.php');
}



$cname = $_SESSION['user']['name'];
$email = $_SESSION['user']['email'];


if (isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"item_id");
        if (!in_array($_GET["id"],$item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="cart.php"</script>';
        }else{
            echo '<script>alert("Item is already added to Cart")</script>';
            echo '<script>window.location="cart.php"</script>';
        }
    }else{
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
        foreach ($_SESSION["cart"] as $keys => $value){
            if ($value["item_id"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Item has been removed!")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }
    }
}
?>

<!doctype html>
<html>
<head>

    <title>Cart</title>

    
    <!---<script src="http://localhost/projects/rms/tools/js/bootstrap.js"></script>--->

    <link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/projects/rms/tools/css/style_foodmenu.css">

</head>


<body>


    <div class="header" style="position:fixed;  height: 100px; margin-top: 0px; margin-bottom: 0px;">
        <img style="float: center; margin: 0px 15px 15px 0px;" src="http://localhost/projects/rms/tools/img/logo.png">       
    </div>

    

    <div class="nav" style="position: fixed; padding-top: 15px; padding-right: 2px;">
        <a href="#billdetails" class="btn btn-danger " role="button" aria-pressed="true" style="width: 100px">Check Bill</a>
        <!---<a href="#fooditems" class="btn btn-danger " role="button" aria-pressed="true" style="width: 100px">Food</a>
            <a href="#beverage" class="btn btn-danger " role="button" aria-pressed="true" style="width: 100px">Beverage</a>--->
            <a href="http://localhost/projects/rms/clear_cart.php" class="btn btn-secondary " role="button" style="width: 100px">  Cancel  </a>
        </div>

        <div class="background" style="padding-top: 80px;">

            <div class="fooditems" id="fooditems">
                <?php
                $query = "SELECT * FROM item WHERE itype='food' ORDER BY pname ASC ";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                        ?>
                        <div style="float: left; width: 25%;">

                            <form method="post" action="Cart.php?action=add&id=<?php echo $row["id"]; ?>">

                                <div class="item2">
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
                                    <hr class="mb-1">
                                    <div class="cartbuttons">
                                        <input type="number" name="quantity" class="form-control" value="1" min="1" max="10">
                                        <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                        <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                        value="Add to Cart">
                                    </div>                          
                                </div>
                            </form>
                        </div>
                        
                        <?php
                    }
                    ?>
                    <?php
                }
                ?>
            </div>
            <div class="beverage" id="beverage">
                <?php
                $query = "SELECT * FROM item WHERE itype='beverage' ORDER BY pname ASC ";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                        ?>
                        <div style="float: left; width: 25%;">

                            <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">

                                <div class="item2">
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
                                    <hr class="mb-1">
                                    <div class="cartbuttons">
                                        <input type="number" name="quantity" class="form-control" value="1" min="1" max="20">
                                        <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                        <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                        value="Add to Cart">
                                    </div>                          
                                </div>
                            </form>
                        </div>
                        
                        <?php
                    }
                    ?>
                    <?php
                }
                ?>
            </div>

            <div style="clear: both"></div>

            <div class="bilbanner" id="billdetails"><h3>Bill Details</h3></div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Item Name</th>
                        <th width="10%">Quantity</th>
                        <th width="13%">Price Details</th>
                        <th width="10%">Total Price</th>
                        <th width="17%">Remove Item</th>
                    </tr>

                    <?php
                    if(!empty($_SESSION["cart"])){
                        $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value["item_name"]; ?></td>
                                <td><?php echo $value["item_quantity"]; ?></td>
                                <td>$ <?php echo $value["item_price"]; ?></td>
                                <td>
                                    $ <?php echo $value["item_quantity"] * $value["item_price"]; ?></td>
                                    <td><a href="Cart.php?action=delete&id=<?php echo $value["item_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>



                                    </tr>
                                    <?php
                                    $total = $total + ($value["item_quantity"] * $value["item_price"]);
                                }
                                ?>
                                <tr>
                                    <td colspan="3" align="right">Total</td>
                                    <th align="right">$ <?php echo number_format($total, 2); ?></th>
                                    <td></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>

                    <div class="checkout">
                        <form method="post" action = "cart.php">
                            <label for="address" style="width:100%; text-align: left;"><b>Address</b></label>
                            <div class="form-inline">
                                <input class="form-control" id="address" type="text" name="address" style="width:70%;" required>

                                <select id="district" name="district" class="form-control" style="width:20%; margin-left: 10px" required>
                                    <option>Dhaka</option>
                                    <option>Others</option>

                                </select>

                            </div>
                            <label for="phonenumber" style="width:100%; text-align: left;"><b>Phone Number</b></label>
                            <input class="form-control" id="phonenumber"  type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="phonenumber" style="width:20%; text-align: left;" required>  <br>

                            <input type="submit" name="confirm" style="margin-top: 10px; margin-bottom: 20px; float: left;" class="btn btn-success" value="Confirm Order">
                            <input type="button" name="cancel" style="margin-top: 10px; margin-left: 2px; margin-bottom: 20px; float: left;" class="btn btn-secondary" value="Cancel" onClick="window.location.href='http://localhost/projects/rms/clear_cart.php';">

                            <!---<a style="float: left; margin-left: 3px; margin-top: 10px;" href="http://localhost/projects/rms/customer.php" class="btn btn-secondary " role="button" aria-pressed="true" >Cancel Order</a>--->

                        </form>
                    </div>

                </div>


            </body>

            <?php 

            if (isset($_POST["confirm"])){



                $address = $_POST["address"];
                $district = $_POST["district"];
                $phone = $_POST["phonenumber"];
                $time = date("d-m-Y h:i:sa");


// echo "dis" .$district;
                $order_array = array(
                    'address' => $address,
                    'phone' => $phone,
                    'total' => $total,
                    'time' => $time,
                    'district' => $district,
                );
                $_SESSION["mOrder"] = $order_array;

                echo '<script>window.location="payment.php"</script>';


            }


                /*if (isset($_POST["cancel"])){
                        echo '<script>window.location="customer.php"</script>';
                        unset($_SESSION["cart"]);
                    
                    }*/

                    ?>

                    </html>





