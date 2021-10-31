<?php
include('functions.php');
session_start();
unset($_SESSION["cart"]);

if(isCustomer()){
	echo '<script>window.location="customer.php"</script>';
}
elseif(isWaiter()){
	echo '<script>window.location="waiter.php"</script>';
}
?>